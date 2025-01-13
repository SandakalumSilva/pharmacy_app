<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseRequest;
use App\Interfaces\Backend\PurchaseInterface;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    protected $purchaseRepository;
    public function __construct(PurchaseInterface $purchaseRepository)
    {
        $this->purchaseRepository = $purchaseRepository;
    }

    public function allPurchase()
    {
        return $this->purchaseRepository->allPurchase();
    }

    public function addPuchase()
    {
        return $this->purchaseRepository->addPuchase();
    }
    public function storePurchase(PurchaseRequest $request)
    {
        return $this->purchaseRepository->storePurchase($request);
    }

    public function editPurchase($id)
    {
        return $this->purchaseRepository->editPurchase($id);
    }

    public function updatePurchase(PurchaseRequest $request)
    {
        return $this->purchaseRepository->updatePurchase($request);
    }

    public function deletePurchase($id)
    {
        return $this->purchaseRepository->deletePurchase($id);
    }
}
