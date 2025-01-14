<?php 
namespace App\Interfaces\Backend;

interface StockInterface{
    public function allStock();
    public function searchStock($request);
}