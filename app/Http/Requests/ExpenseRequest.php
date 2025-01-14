<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'expenses' => ['required'],
            'expensesDate' => ['required', 'date'],
            'amount' => ['required', 'numeric']
        ];
    }

    public function messages()
    {
        return [
            'expenses.required' => 'Please Enter expenses.',
            'amount.required' => 'Please Enter Expenses Amount.',
            'amount.numeriuc' => 'Please Enter Valid Expenses Amount.',
            'expensesDate.required' => 'Please Enter Expenses Date.'
        ];
    }
}
