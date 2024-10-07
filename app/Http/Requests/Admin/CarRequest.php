<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [];
        $rules['color'] = 'required';
        $rules['number'] = 'required';
        $rules['transmission'] = 'required|numeric|gt:0';
        $rules['model'] = 'required|numeric|gt:0';
        $rules['rent_price_per_day'] = 'required';
        $rules['year'] = 'required';

        $data = $this->validationData();

        $method = $this->method();

        if ($method === 'PUT') {
            if ( ! empty($data['fileuploader-list-file'])) {
                $rules['file.*'] = 'required|mimes:jpeg,jpg,png|max:1024';
            }
        } else {
            $rules['file.*'] = 'required|mimes:jpeg,jpg,png|max:1024';
            $rules['fileuploader-list-file'] = 'required';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'fileuploader-list-file.required' => 'Фото не выбрано',
            'color.required' => 'Цвет не выбран',
            'number.required' => 'Номер не выбран',
            'rent_price_per_day.required' => 'Цена не выбран',
            'year.required' => 'Год не выбран',
            'model.gt' => 'Модель не выбрана',
            'transmission.gt' => 'Коробка передач не выбрана',
        ];
    }

}
