<?php

namespace App\Repositories\Backend;

use App\Interfaces\Backend\SalesInterface;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Sales;
use App\Models\SalesItem;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class SalesRepository implements SalesInterface
{
    public function purchase($request)
    {
        try {
            $id = Auth::user()->id;
            $sale =  Sales::create([
                'user_id' => $id,
                'amount' => $request->fullAmount,
                'created_at' => Carbon::now()
            ]);

            $cartItems = Cart::where('user_id', $id)->get();

            foreach ($cartItems as $cartItem) {
                $product = Product::findOrFail($cartItem->product_id);
                SalesItem::create([
                    'sales_id'  => $sale->id,
                    'product_id' => $cartItem->product_id,
                    'qty' => $cartItem->qty,
                    'amount' => $product->selling_price
                ]);
            }

            Cart::where('user_id', $id)->delete();

            $notification = [
                'message' => 'Product purchase Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('pos')->with($notification);
        } catch (Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }
}
