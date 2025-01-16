<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Interfaces\Backend\SalesInterface;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    protected $salesRepository;
    public function __construct(SalesInterface $salesRepository)
    {
        $this->salesRepository = $salesRepository;
    }

    public function purchase(Request $request)
    {
        return $this->salesRepository->purchase($request);
    }

    public function invoiceGenerate($id)
    {
        return $this->salesRepository->invoiceGenerate($id);
    }

    public function invoicePrint($id)
    {
        return $this->salesRepository->invoicePrint($id);
    }

    public function allSales()
    {
        return $this->salesRepository->allSales();
    }

    public function deleteInvoice($id)
    {
        return $this->salesRepository->deleteInvoice($id);
    }
    public function deletedSales(){
        return $this->salesRepository->deletedSales();
    }

    public function deletedInvoice($id){
        return $this->salesRepository->deletedInvoice($id);
    }

    public function deletedInvoiceDelete($id){
        return $this->salesRepository->deletedInvoiceDelete($id);
    }
}
