<?php

namespace App\Repositories\Backend;

use App\Interfaces\Backend\SupplierInterface;
use App\Models\Supplier;
use Carbon\Carbon;

class SupplierRepository implements SupplierInterface
{
    public function allSupplier()
    {
        $allSuppliers = Supplier::latest()->get();
        return view('backend.supplier.all_supplier', compact('allSuppliers'));
    }

    public function addSupplier()
    {
        return view('backend.supplier.add_supplier');
    }

    public function storeSupplier($request)
    {
        try {
            Supplier::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);

            $notification = [
                'message' => 'Supplier Added Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.supplier')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function editSupplier($id)
    {
        try {
            $supplier = Supplier::find($id);
            return view('backend.supplier.edit_supplier', compact('supplier'));
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function updateSupplier($request)
    {
        try {
            $id = $request->id;
            Supplier::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'description' => $request->description,
                'updated_at' => Carbon::now()
            ]);

            $notification = [
                'message' => 'Supplier Updated Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.supplier')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function deleteSupplier($id)
    {
        try {
            Supplier::findOrFail($id)->delete();
            $notification = [
                'message' => 'Supplier Deleted Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.supplier')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }
    }
}
