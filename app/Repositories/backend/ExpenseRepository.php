<?php

namespace App\Repositories\Backend;

use App\Interfaces\Backend\ExpenseInterface;
use App\Models\Expense;
use Carbon\Carbon;

class ExpenseRepository implements ExpenseInterface
{

    public function allExpense()
    {
        $allexpenses = Expense::latest()->get();
        return view('backend.expenses.all_expenses', compact('allexpenses'));
    }

    public function addExpenses()
    {
        return view('backend.expenses.add_expenses');
    }

    public function storeExpenses($request)
    {
        try {
            Expense::create([
                'expense' => $request->expenses,
                'amount' => $request->amount,
                'date' => $request->expensesDate,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);
            $notification = [
                'message' => 'Expenses Added Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.expense')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function editExpenses($id)
    {
        try {
            $expenses = Expense::findOrFail($id);
            return view('backend.expenses.edit_expenses', compact('expenses'));
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }
    public function updateExpenses($request)
    {
        try {
            $id = $request->id;
            Expense::findOrFail($id)->update([
                'expense' => $request->expenses,
                'amount' => $request->amount,
                'date' => $request->expensesDate,
                'description' => $request->description,
                'updated_at' => Carbon::now()
            ]);

            $notification = [
                'message' => 'Expenses Updated Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.expense')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function deleteExpenses($id)
    {
        try {
            Expense::findOrFail($id)->delete();
            $notification = [
                'message' => 'Expenses Deleted Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.expense')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function expenseSearch($request)
    {
        try {

            $request->validate([
                'startDate' => ['required', 'date'],
                'endDate' => ['required', 'date'],
            ], [
                'startDate.required' => 'Please Select Start Date',
                'endDate.required' => 'Please Select End Date'
            ]);

            $startDate = $request->startDate;
            $endDate = $request->endDate;

            $allexpenses = Expense::whereBetween('date', [$startDate, $endDate])->orderBy('id', 'desc')->get();
            return view('backend.expenses.all_expenses', compact('allexpenses'));
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }
}
