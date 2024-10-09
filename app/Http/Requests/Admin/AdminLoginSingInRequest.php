<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginSingInRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'password' => 'required',
            'email' => ['required', 'email']
        ];
    }
}
