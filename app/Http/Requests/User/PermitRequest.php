<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PermitRequest extends FormRequest
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
            'employee_id' => 'required|exists:employees,id',
            'start_date'  => 'date',
            'end_date'    => 'date|after:start_date',
            'permit_type_id' => 'required|int',
            'permit_status_id' => 'required|int',
        ];
    }

    public function messages()
    {
       return[
           'end_date.after' => 'Bitiş tarihi, başlangıç tarihinden sonraki bir tarih olmalıdır.',
       ];
    }
}
