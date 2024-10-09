<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ModelChangeStatusRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'int'],
        ];
    }
}
