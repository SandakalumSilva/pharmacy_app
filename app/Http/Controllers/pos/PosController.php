<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;
use App\Interfaces\Pos\PosInterface;
use Illuminate\Http\Request;

class PosController extends Controller
{
    protected $posRepository;
    public function __construct(PosInterface $posRepository){
        $this->posRepository =$posRepository;
    }

    public function pos(){
        return $this->posRepository->pos();
    }
    public function addCart(Request $request,$id){
        return $this->posRepository->addCart($request,$id);
    }

    public function deleteCart($id){
        return $this->posRepository->deleteCart($id);
    }
}
