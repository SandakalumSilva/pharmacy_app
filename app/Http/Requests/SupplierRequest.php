<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'name' => ['required'],
            'phone' => ['required', 'digits:10'],
            'address' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter Supplier Name.',
            'phone.required' => 'Please Enter Supplier Phone Number.',
            'phone.digits' => 'Please Enter valid Phone number.',
            'address.required' => "Please Enter Supplier Address."
        ];
    }
}
