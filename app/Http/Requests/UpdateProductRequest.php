<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:255',
            'type' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'supplier_id' => 'sometimes|exists:suppliers,id',
            'unit_of_measure' => 'sometimes|string|max:255',
            'stock_level' => 'nullable|integer|min:0',
            'regular_price' => 'sometimes|numeric|min:0',
            'minimum_stock_threshold' => 'nullable|integer|min:0',
            'type_other' => 'required_if:type,Others|string|max:255',
        ];
    }
}