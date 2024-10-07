<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ModelCarOrderingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'ordering' => 'required', 'string',
        ];
    }
}
