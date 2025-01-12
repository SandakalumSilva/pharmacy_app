<?php

namespace App\Repositories\Backend;

use App\Interfaces\Backend\CategoryInterface;
use App\Models\Category;
use Carbon\Carbon;

class CategoryRepositoy implements CategoryInterface
{

    public function allCategory()
    {
        $allCategory = Category::latest()->get();
        return view('backend.category.all_category', compact('allCategory'));
    }

    public function addCategory()
    {
        return view('backend.category.add_category');
    }

    public function storeCategory($request)
    {
        Category::create([
            'name' => $request->categoryName,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Category Added Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.category')->with($notification);
    }

    public function deleteCategory($id)
    {
        Category::find($id)->delete();

        $notification = [
            'message' => 'Category Deleted Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.category')->with($notification);
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit_category', compact('category'));
    }

    public function updateCategory($request)
    {
        $id = $request->id;
        Category::find($id)->update([
            'name' => $request->categoryName
        ]);

        $notification = [
            'message' => 'Category Updated Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.category')->with($notification);
    }
}
