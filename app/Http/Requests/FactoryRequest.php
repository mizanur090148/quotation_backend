<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Rules\UniqueCheck;
use App\Models\Factory;

class FactoryRequest extends FormRequest
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
            'name.required' => 'Factory name is required',
            'address.required' => 'Address is required',
            'email.required' => 'Email is required'
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
            'name' => [
                'required',
                'max:40',
                new UniqueCheck(Factory::class)
            ],
            'address' => [
                'required',
                'max:120'
            ],
            'responsible_person' => [
                'max:50',
                'required',
            ],
            'email' => [
                'email',
                'max:30'
            ],
            'mobile_no'=> [
                'nullable',
                'max:20'
            ]
        ];
    }
}
