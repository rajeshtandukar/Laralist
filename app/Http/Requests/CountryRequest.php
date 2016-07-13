<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Validator;

class CountryRequest extends Request
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
            'name' => 'required',
            'country_code' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'The :attribute field is required.',
            'country_code.requred' => 'The :attribute field is required.',
        ];
    }

}
