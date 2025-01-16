<?php 
namespace App\Interfaces\Backend;

interface SalesInterface{
    public function purchase($request);
    public function invoiceGenerate($id);
    public function invoicePrint($id);
    public function allSales();
    public function deleteInvoice($id);
    public function deletedSales();
    public function deletedInvoice($id);
    public function deletedInvoiceDelete($id);
}