<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Save_sabt_channel_1 extends FormRequest
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
          'mobail'=>'required|mobail|unique:channels',
          'email'=>'nullable|email|unique:channels',
          'pas'=>'required|pas|min:4',
          'amniat'=>'required|captcha',
        ];
    }
}
