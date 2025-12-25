<?php

namespace App\Http\Requests\Admin;

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
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $this->product->id,
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'rental_price_daily' => 'nullable|numeric|min:0',
            'rental_price_weekly' => 'nullable|numeric|min:0',
            'rental_price_monthly' => 'nullable|numeric|min:0',
            'sku' => 'required|string|max:255|unique:products,sku,' . $this->product->id,
            'stock_quantity' => 'required|integer|min:0',
            'min_stock_level' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'is_rentable' => 'boolean',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
