<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'old_password' => 'required|string|min:6',
            'password' => 'required|confirmed|string|min:6',
        ];
    }
}
