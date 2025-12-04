<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RetTrRequest extends FormRequest
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
            'transaction_date' => ['required'],
            'client_info' => ['required'],
            'fee_type_id' => ['required'],
            // 'fee_amount' => ['required'],
            'tax_years' => ['required'],
            'bar_code' => ['required'],
            'submission_date' => ['required'],
            'short_comments' => ['required'],

        ];
    }

    public function messages()
    {
        return [
            'transaction_date.required' => 'please provide the transaction date',
            'client_info.required' => 'please select a client',
            'fee_type_id.required' => 'please select a fee type',
            // 'fee_amount.required' => 'please add fee amount',
            'tax_years.required' => 'please select tax year',
            'bar_code.required' => 'please pirvpide bar code (as per IRIS)',
            'submission_date.required' => 'please provide the submission date',
            'short_comments.required' => 'please add short comments',
        ];
    }
}
