<?php

namespace App\Interfaces\Backend;

interface PurchaseInterface
{
    public function allPurchase();
    public function addPuchase();
    public function storePurchase($request);
    public function editPurchase($id);
    public function updatePurchase($request);
    public function deletePurchase($id);
}
