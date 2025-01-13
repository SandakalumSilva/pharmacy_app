<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'productName' => 'required',
            'category' => 'required',
            'price' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'productName.required' => "Please Enter Product Name.",
            'category.required' => "Please Select Category.",
            'price.required' => 'Please Enter Product Price.'
        ];
    }
}
