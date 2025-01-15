<?php 
namespace App\Interfaces\Pos;

interface PosInterface{
    public function pos();
    public function addCart($request,$id);
    public function deleteCart($id);
}