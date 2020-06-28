<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Rules\UniqueQuotationService;
use App\Models\QuotationService;

class QuotationServiceRequest extends FormRequest
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
     * Get the validation messages that apply to the erroneous request.
     *
     * @return bool
     */
    public function messages()
    {
        return [
            'quotation_id.required' => 'Quotation name is required',
            'service_id.required' => 'Service name is required'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'quotation_id' => [
                'required',
                'integer',
                new UniqueQuotationService(QuotationService::class)
            ],
            'service_id' => [
                'required',
                'integer'
            ]
        ];
    }
}
