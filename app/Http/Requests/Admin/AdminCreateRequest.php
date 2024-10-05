<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:admins',
        ];
    }
}
