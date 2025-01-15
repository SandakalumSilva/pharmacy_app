<?php

namespace App\Repositories\Pos;

use App\Interfaces\Pos\PosInterface;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class PosRepository implements PosInterface
{
    public function pos()
    {
        $allProducts = Purchase::with('product')->selectRaw('product_id, SUM(qty) as stock')->groupBy('product_id')->get();
        $userId = Auth::user()->id;
        $allSell = Cart::with('product')->where('user_id', $userId)->get();
        
        return view('pos.pos', compact('allProducts', 'allSell'));
    }

    public function addCart($request, $id)
    {
        try {
            $request->validate([
                'buyQty' => 'required'
            ], [
                'buyQty.required' => 'Product Quantity Rquired'
            ]);

            $product = Product::findOrFail($id);
            /// check available quantity
            if ($product->qty < $request->buyQty) {
                $notification = [
                    'message' => 'Product Quantity not enough to purchase this item.',
                    'alert-type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }

            ///check product buying quantity zero or not
            if ($request->buyQty == 0) {
                $notification = [
                    'message' => 'Product Quantity can not be Zero.',
                    'alert-type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }
          

            Cart::create([
                'product_id' => $id,
                'qty' => $request->buyQty,
                'user_id' => Auth::user()->id,
            ]);

            $newQty =  $product->qty - $request->buyQty;

            ///product quantity update
            $product->qty = $newQty;
            $product->save();

            // $allSell = Cart::findOrFail(Auth::user()->id);

            $notification = [
                'message' => 'Product purchase Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('pos')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function deleteCart($id)
    {
        try {
            $cartItem = Cart::findOrFail($id);

            /// product quantity update
            $product = Product::findOrFail($cartItem->product_id);
            $newQty =  $product->qty + $cartItem->qty;
            $product->qty = $newQty;
            $product->save();
            //cart Item delete
            $cartItem->delete();

            $notification = [
                'message' => 'Product Deleted Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('pos')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }
}
