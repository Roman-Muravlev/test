<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }
}
