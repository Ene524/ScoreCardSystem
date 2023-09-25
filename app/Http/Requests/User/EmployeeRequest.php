<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'department_id' => 'required|integer',
            'position_id' => 'required|integer',
            'salary_id' => 'required|integer',
            'employment_date' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Ad Soyad alanı zorunludur.',
            'full_name.string' => 'Ad Soyad alanı metin tipinde olmalıdır.',
            'full_name.max' => 'Ad Soyad alanı en fazla 255 karakter olmalıdır.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'E-posta alanı e-posta formatında olmalıdır.',
            'email.unique' => 'E-posta alanı daha önce kayıt edilmiş.',
            'department_id.required' => 'Departman alanı zorunludur.',
            'department_id.integer' => 'Departman alanı sayı tipinde olmalıdır.',
            'position_id.required' => 'Pozisyon alanı zorunludur.',
            'position_id.integer' => 'Pozisyon alanı sayı tipinde olmalıdır.',
            'salary_id.required' => 'Maaş alanı zorunludur.',
            'salary_id.integer' => 'Maaş alanı sayı tipinde olmalıdır.',
            'employment_date.required' => 'İşe Giriş Tarihi alanı zorunludur.',
            'employment_date.date' => 'İşe Giriş Tarihi alanı tarih tipinde olmalıdır.',
        ];
    }
}
