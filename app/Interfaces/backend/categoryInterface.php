<?php 
namespace App\Interfaces\Backend;

interface CategoryInterface{
    public function allCategory();
    public function addCategory();
    public function storeCategory($request);
    public function deleteCategory($id);
    public function editCategory($id);
    public function updateCategory($request);
}