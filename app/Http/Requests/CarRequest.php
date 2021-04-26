<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $rules[ 'color' ] = 'required';
        $rules[ 'number' ] = 'required';
        $rules[ 'transmission' ] = 'required|numeric|gt:0';
        $rules[ 'model' ] = 'required|numeric|gt:0';
        $rules[ 'rent_price_per_day' ] = 'required';
        $rules[ 'year' ] = 'required';

        $data = $this->validationData();
        
        $method = $this->method();//POST || PUT

        //update -> PUT 
        if ( $method ===  "PUT"  )
        {
            if ( isset( $data[ 'fileuploader-list-file' ] ) && !empty( $data[ 'fileuploader-list-file' ] ) )
            {
                $rules[ 'file.*' ] = 'required|mimes:jpeg,jpg,png|max:1024';
            }
        } else
        {
            $rules[ 'file.*' ] = 'required|mimes:jpeg,jpg,png|max:1024';
            $rules[ 'fileuploader-list-file' ] = 'required';
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
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
