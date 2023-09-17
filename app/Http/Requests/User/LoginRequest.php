<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        return [
            "email" => ["email", "exists:users", "required"],
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "Email alanı boş bırakılamaz.",
            "email.email" => "Geçerli bir email adresi giriniz.",
        ];
    }
}
