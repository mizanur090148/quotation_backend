<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Rules\UniqueCheck;
use App\Models\User;

class UserRequest extends FormRequest
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
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'mobile_no.required' => 'Mobile no is required',
            'role_id.required' => 'Role selection is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
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
            'first_name' => [
                'required',
                'max:30'
            ],
            'last_name' => [
                'required',
                'max:30'
            ],
            'mobile_no' => [
                'required',
                'max:22',
            ],
            'email' => [
                'required',
                'email',
                'max:30',
                new UniqueCheck(User::class)
            ],
            'role_id'=> [
                'required'
            ],
            'password'=> [
                'required',
                'min:6',
                'same:confirm_password'
            ],
            'confirm_password'=> [
                'required'
            ]
        ];
    }
}
