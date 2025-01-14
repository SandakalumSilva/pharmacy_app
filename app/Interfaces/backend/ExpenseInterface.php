<?php 
namespace App\Interfaces\Backend;

interface ExpenseInterface{
    public function allExpense();
    public function addExpenses();
    public function storeExpenses($request);
    public function editExpenses($id);
    public function updateExpenses($request);
    public function deleteExpenses($id);
    public function expenseSearch($request);
}