<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Interfaces\Backend\StockInterface;
use Illuminate\Http\Request;

class StockController extends Controller
{
    protected $stockRepository;

    public function __construct(StockInterface $stockRepository)
    {
        $this->stockRepository = $stockRepository;
    }

    public function allStock(){
        return $this->stockRepository->allStock();
    }
    public function searchStock(Request $request){
        return $this->stockRepository->searchStock($request);
    }
}
