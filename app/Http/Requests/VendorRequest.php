<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Rules\UniqueCheck;
use App\Models\Vendor;

class VendorRequest extends FormRequest
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
            'vendor_name.required' => 'This is required',
            'vendor_no.required' => 'This is required',
            'trn_no.required' => 'This is required',
            'address.required' => 'This is required',
            'telephone_no.required' => 'This is required',
            'fax_no.required' => 'This is required',
            'email.required' => 'This is required',
            'attention.required' => 'This is required',
            'attention_designation.required' => 'This is required',
            'mobile_no.required' => 'This is required'

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
            'vendor_name' => [
                'required',
                'max:60'
            ],
            'vendor_no' => [
                'required',
                'max:50',
                new UniqueCheck(Vendor::class)
            ],
            'trn_no' => [
                'required',
                'max:60'
            ],
            'address' => [
               // 'required',
                'max:100',
            ],
            'telephone_no' => [
                //'required',
                'max:50'
            ],
            'fax_no'=> [
                //'required',
                'max:50'
            ],
            'email'=> [
                'required',  
                'email',
                'max:40',
                new UniqueCheck(Vendor::class)
            ],
            'attention'=> [
                'required',
                'max:50'
            ],
            'attention_designation'=> [
                'required',
                'max:50'
            ]
            /*'mobile_no'=> [
                'required',
                'max:20'
            ]*/
        ];
    }
}
