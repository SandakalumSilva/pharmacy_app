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

    public function purchase(Request $request){
        return $this->salesRepository->purchase($request);
    }
}
