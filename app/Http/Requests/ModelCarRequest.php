<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModelCarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'brand' => 'required', 'numeric', 'gt:0'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Название" не введено',
            'brand.gt' => 'Бренд не выбран',
        ];
    }
}
