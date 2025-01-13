<?php

namespace App\Repositories\Backend;

use App\Interfaces\Backend\ProductInterface;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;

class ProductRepository implements ProductInterface
{

    public function allProduct()
    {
        $allProducts = Product::latest()->get();
        return view('backend.products.all_products', compact('allProducts'));
    }

    public function addProduct()
    {
        $allCategory = Category::all();
        return view('backend.products.add_product', compact('allCategory'));
    }

    public function storeProduct($request)
    {
        Product::create([
            'name' => $request->productName,
            'category_id' => $request->category,
            'selling_price' => $request->price,
            'description' => $request->description,
            'created_at' => Carbon::now()
        ]);

        $notification = [
            'message' => 'Product Added Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.product')->with($notification);
    }

    public function editproduct($id)
    {
        $product = Product::find($id);
        $allCategory = Category::all();
        return view('backend.products.edit_product', compact('allCategory', 'product'));
    }

    public function updateProduct($request)
    {
        $id = $request->id;
        Product::find($id)->update([
            'name' => $request->productName,
            'category_id' => $request->category,
            'selling_price' => $request->price,
            'description' => $request->description,
            'updated_at' => Carbon::now()
        ]);

        $notification = [
            'message' => 'Product Updated Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.product')->with($notification);
    }

    public function deleteProduct($id)
    {
        Product::find($id)->delete();

        $notification = [
            'message' => 'Product Deleted Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.product')->with($notification);
    }
}
