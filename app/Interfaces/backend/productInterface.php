<?php 
namespace   App\Interfaces\Backend;
interface ProductInterface{
    public function allProduct();
    public function addProduct();
    public function storeProduct($request);
    public function editproduct($id);
    public function updateProduct($request);
    public function deleteProduct($id);
}