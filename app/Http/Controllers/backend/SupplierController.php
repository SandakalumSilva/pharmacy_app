<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Interfaces\Backend\SupplierInterface;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    protected $supplierRepository;

    public function __construct(SupplierInterface $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function allSupplier()
    {
        return $this->supplierRepository->allSupplier();
    }

    public function addSupplier()
    {
        return $this->supplierRepository->addSupplier();
    }

    public function storeSupplier(SupplierRequest $request)
    {
        return $this->supplierRepository->storeSupplier($request);
    }

    public function editSupplier($id)
    {
        return $this->supplierRepository->editSupplier($id);
    }

    public function updateSupplier(SupplierRequest $request){
        return $this->supplierRepository->updateSupplier($request);
    }

    public function deleteSupplier($id){
        return $this->supplierRepository->deleteSupplier($id);
    }
}
