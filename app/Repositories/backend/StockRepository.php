<?php

namespace App\Repositories\Backend;

use App\Interfaces\Backend\StockInterface;
use App\Models\Product;
use App\Models\Purchase;

class StockRepository implements StockInterface
{

    public function allStock()
    {
        $products = Product::all();

        $allStock = Purchase::with('product')->selectRaw('product_id, SUM(qty) as purchase_stock')->groupBy('product_id')->get();

        return view('backend.stock.all_stock', compact('allStock', 'products'));
    }

    public function searchStock($request)
    {

        try {

            $request->validate(
                [
                    'productId' => ['required']
                ]
            );

            $products = Product::all();
            $id = $request->productId;
            $allStock = Purchase::with('product')->selectRaw('product_id, SUM(qty) as purchase_stock')->where('product_id', $id)->groupBy('product_id')->get();

            return view('backend.stock.all_stock', compact('allStock', 'products'));
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }
}
