<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUploadRequest extends FormRequest
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
            'excelFile' => 'required|mimes:xlsx, xls',
        ];
    }

    public function messages(): array
    {
        return [
            'excelFile.required' => 'Excel dosyası zorunludur',
            'excelFile.mimes' => 'Excel dosyası uzantısı xlsx olmalıdır',
        ];
    }
}
