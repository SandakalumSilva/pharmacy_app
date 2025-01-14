<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExpenseRequest;
use App\Interfaces\Backend\ExpenseInterface;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    protected $expenseRepository;

    public function __construct(ExpenseInterface $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }

    public function allExpense(){
        return $this->expenseRepository->allExpense();
    }
    public function addExpenses(){
        return $this->expenseRepository->addExpenses();
    }

    public function storeExpenses(ExpenseRequest  $request){
        return $this->expenseRepository->storeExpenses($request);
    }

    public function editExpenses($id){
        return $this->expenseRepository->editExpenses($id);
    }
    public function updateExpenses(ExpenseRequest $request){
        return $this->expenseRepository->updateExpenses($request);
    }

    public function deleteExpenses($id){
        return $this->expenseRepository->deleteExpenses($id);
    }

    public function expenseSearch(Request $request){
        return $this->expenseRepository->expenseSearch($request);
    }
}
