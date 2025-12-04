<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        if (request()->isMethod('post')) {

            return [
                'business_status_id' => ['required', 'numeric'],
                'client_name' => ['required'],
                // 'header_id' => ['required', 'numeric'],
                // 'sub_header_id' => ['required', 'numeric'],
                'cnic_ntn_no' => ['required', 'alpha_num'],
                'business_name' => ['required'],
                'city_id' => ['required', 'numeric'],
            ];
        } else {
            return [
                'business_status_id' => ['required', 'numeric'],
                'client_name' => ['required'],
                // 'header_id' => ['required', 'numeric'],
                // 'sub_header_id' => ['required', 'numeric'],
                'cnic_ntn_no' => ['required', 'alpha_num'],
                'city_id' => ['required', 'numeric'],
            ];
        }
    }

    public function messages()
    {
        return [
            'business_status_id.required' => 'Business status is required',
            'client_name.required' => 'Client Name is required',
            'client_name.alpha_num' => 'Client Name must contain Alpha Numeric',
            'business_name.required' => 'Business name is required',
            'city_id.required' => 'City is required',
            'cnic_ntn_no.required' => 'CNIC / NTN no. is required',
        ];
    }
}
