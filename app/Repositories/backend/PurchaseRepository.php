<?php

namespace App\Repositories\Backend;

use App\Interfaces\Backend\PurchaseInterface;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PurchaseRepository implements PurchaseInterface
{
    public function allPurchase()
    {
        $allPurchase = Purchase::latest()->get();
        return view('backend.purchase.all_purchase', compact('allPurchase'));
    }

    public function addPuchase()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('backend.purchase.add_purchase', compact('products', 'suppliers'));
    }

    public function storePurchase($request)
    {
        try {
            $manager = new ImageManager(new Driver());
            $saveUrl = null;

            if ($request->file('image')) {
                $image = $request->file('image');
                $nameGen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $file = $manager->read($image);
                $file->resize(300, 300)->save('upload/product/' . $nameGen);

                $saveUrl = 'upload/product/' . $nameGen;
            }

            Purchase::create([
                'product_id' => $request->productId,
                'supplier_id' => $request->suppliertId,
                'cost_price' => $request->productCost,
                'qty' => $request->qty,
                'pur_date' => $request->purchaseDate,
                'exp_date' => $request->expireDate,
                'image' => $saveUrl,
                'created_at' => Carbon::now()
            ]);

            $product = Product::findOrFail($request->productId);
            $productQty = $product->qty + $request->qty;
            $product->qty = $productQty;
            $product->save();

            $notification = [
                'message' => 'Purchase Added Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.purchase')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function editPurchase($id)
    {
        try {
            $products = Product::all();
            $suppliers = Supplier::all();

            $purchase = Purchase::findOrFail($id);
            return view('backend.purchase.edit_purchase', compact('purchase', 'products', 'suppliers'));
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function updatePurchase($request)
    {
        try {
            $manager = new ImageManager(new Driver());
            $id = $request->id;
            $saveUrl = null;
            if ($request->file('image')) {
                $image = $request->file('image');
                $nameGen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $file = $manager->read($image);
                $file->resize(300, 300)->save('upload/product/' . $nameGen);

                $saveUrl = 'upload/product/' . $nameGen;

                $purchaseImg =  Purchase::findOrFail($id);

                if ($purchaseImg->image) {
                    unlink($purchaseImg->image);
                }
            }

            $purchase = Purchase::findOrFail($id);

            Purchase::findOrFail($id)->update([
                'product_id' => $request->productId,
                'supplier_id' => $request->suppliertId,
                'cost_price' => $request->productCost,
                'qty' => $request->qty,
                'pur_date' => $request->purchaseDate,
                'exp_date' => $request->expireDate,
                'image' => $saveUrl,
                'created_at' => Carbon::now()
            ]);

            if ($request->qty) {
                $product = Product::findOrFail($request->productId);
                $productQty = ($product->qty - $purchase->qty) + $request->qty;
                $product->qty = $productQty;
                $product->save();
            }

            $notification = [
                'message' => 'Purchase Updated Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.purchase')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function deletePurchase($id)
    {
        try {
            $purchase =  Purchase::findOrFail($id);
            if ($purchase->image) {
                unlink($purchase->image);
            }
            $purchase->delete();

            $product = Product::findOrFail($purchase->product_id);
            $productQty = $product->qty - $purchase->qty;
            $product->qty = $productQty;
            $product->save();

            $notification = [
                'message' => 'Purchase Deleted Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.purchase')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }
}
