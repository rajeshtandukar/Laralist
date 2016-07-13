<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Validator;

class MailtemplateRequest extends Request
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
            'body' => 'required',
            'event' => 'required',
        ];
    }

    public function messages(){

        return [
            'title.required' => 'The :attribute field is required.',
            'body.requred' => 'The :attribute field is required.',
            'event.required' => 'The :attribute field is required.',           
        ];
    }

}
