<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminMarkerRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'lat'  => 'required|min:3|max:30',
            'lng' => 'required|min:3|max:30'
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            //Поле lat
            'lat.required' => 'Поле lat обязательна для заполнения!',
            'lat.min' => 'Минимальное количество символов: 3',
            'lat.max' => 'Максимальное количество символов: 30',

            //Поле lng
            'lng.required' => 'Поле lng обязательна для заполнения!',
            'lng.min' => 'Минимальное количество символов: 3',
            'lng.max' => 'Максимальное количество символов: 30'
        ];
    }
}
