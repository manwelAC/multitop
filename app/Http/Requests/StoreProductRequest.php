<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'supplier_id' => 'required|exists:suppliers,id',
            'unit_of_measure' => 'required|string|max:255',
            'stock_level' => 'nullable|integer|min:0',
            'regular_price' => 'required|numeric|min:0',
            'minimum_stock_threshold' => 'nullable|integer|min:0',
        ];
    }
}