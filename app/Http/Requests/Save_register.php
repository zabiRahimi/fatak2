<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Save_register extends FormRequest
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
          'name'=>'required|name|min:5',
          'karbary'=>'required|pas|min:4|unique:registers',
          'pas'=>'required|pas|min:4',
          'mobail'=>'required|mobail|unique:registers',
          'email'=>'nullable|email|unique:registers',
          'amniat'=>'required|captcha',
        ];
    }
}
