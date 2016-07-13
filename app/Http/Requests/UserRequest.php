<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Validator;

class UserRequest extends Request
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'confirmed|min:6',
            'password_confirmation' => 'min:6',
        ];
    }

    public function messages(){

        return [
            'name.required' => 'The :attribute field is required.',
            'email.requred' => 'The :attribute field is required.',
            'password.min' => 'The :attribute  must be at least 6 characters.',                     
        ];
    }

}
