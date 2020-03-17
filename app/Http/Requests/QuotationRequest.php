<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Rules\UniqueCheck;
use App\Models\Quotation;

class QuotationRequest extends FormRequest
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
            'vendor_id.required' => 'Vendor is required',
            'quotation_no.required' => 'This is required',
            'quotation_date.required' => 'Quotation date is required',
            'subject.required' => 'Subject is required',
            'subject.total' => 'Total is required',
            'discount.numeric' => 'Discount must be numeric',
            'job_description.' => 'This is required',
            'quantity.required' => 'This is required',
            'quantity.numeric' => 'Quantity must be numeric',
            'quantity.min' => 'Must be greater than 0',
            'service_per_year.required' => 'This is required',
            'service_per_year.min' => 'Must be greater than 0',
            'service_per_year.numeric' => 'This must be numeric',
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
            'vendor_id' => 'required',
            'quotation_date' => [
                'required',
                'date'
            ],
            'subject' => [
                'required',
                'max:255'
            ],
            'total_discount' => [
                'numeric'
            ],
            'job_description.*' => [
                'required',
                'max:255'
            ],           
            'quantity.*'=> [
                'required',  
                'numeric',
                'min:1'
            ],
            'service_per_year.*'=> [
                'required',
                'numeric',
                'min:1'
            ]
        ];
    }
}
