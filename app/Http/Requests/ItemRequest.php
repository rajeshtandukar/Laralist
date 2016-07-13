<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Validator;

class ItemRequest extends Request
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
            'title' => 'required',
            'category_id' => 'required',
            'country_id' => 'required',
        ];
    }

    public function messages(){

        return [
            'title.required' => 'The :attribute field is required.',
            'category_id.requred' => 'The :attribute field is required.',
            'country_id.required' => 'The :attribute field is required.',           
        ];
    }

}
