<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class Save_data_buyer extends FormRequest
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
            'name'=>'required|name',
            'mobail'=>'required|mobail',
            'tel'=>'nullable|tel',
            'email'=>'nullable|email',
            'ostan'=>'required|name',
            'city'=>'required|name',
            'codepost'=>'required|codepost',
            'address'=>'required|address',
            'amniat' => 'required|captcha',
        ];
    }
}
