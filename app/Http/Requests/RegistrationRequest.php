<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'name'     => 'required',
            'phone'    => 'required|regex:/^380[0-9]{9}$/|unique:users,phone',
            'email'    => "required|email|unique:users,email",
            'password' => "required|confirmed|min:6",
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'email.required' => 'Поле email не заповнено',
            'email.email'    => 'Некорректный email',
            'email.unique'   => 'Email вже занятий',

            'password.required'  => 'Поле пароль не заповнено',
            'password.confirmed' => 'Паролі не збігаються',
            'password.min'       => 'Пароль повинен бути від 6 до 30 символів',

            'phone.required' => 'Поле телефон не заповнено',
            'phone.regex'    => 'Правильний формат телефону 380ххххххххх',
            'phone.unique'   => 'Номер телефону вже занятий',
        ];
    }
}
