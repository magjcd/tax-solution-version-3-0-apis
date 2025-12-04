<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JVRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'jv_date' => ['required'],
            'client_info' => ['required'],
            'fee_type_id' => ['required'],
            'fee_year' => ['required'],
            'details' => ['required'],
            // 'debit_amount' => ['required'],
            // 'credit_amount' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'jv_date.required' => 'JV date is required',
            'client_info.required' => 'Client information is required',
            'fee_type_id.required' => 'Fee Type is required',
            'fee_year.required' => 'Fee Year is required',
            'details.required' => 'short detail is required',
            // 'debit_amount.required' => 'Debit amount is required',
            // 'credit_amount.required' => 'Credit amount is required',
        ];
    }
}
