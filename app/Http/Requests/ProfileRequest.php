<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name'  => 'required|min:5|max:15',
            'email' => 'required|email|min:6|max:32'
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            //Поле name
            'name.required' => 'Поле name обязательна для заполнения!',
            'name.min' => 'Минимальное количество символов: 5',
            'name.max' => 'Максимальное количество символов: 15',

            //Поле email
            'email.required' => 'Поле email обязательна для заполнения!',
            'email.email' => 'Ваш email не соответствует нашему шаблону!',
            'email.min' => 'Минимальное количество символов: 6',
            'email.max' => 'Максимальное количество символов: 32'
        ];
    }
}
