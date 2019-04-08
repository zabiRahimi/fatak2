<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Save_pro_answer extends FormRequest
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
          'name'=>'required|min:3',
          'mobail'=>'nullable|mobail',
          'email'=>'nullable|email',
          'answer'=>'required',
          'amniat'=>'required|captcha',
        ];
    }
}