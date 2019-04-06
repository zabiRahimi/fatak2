<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Save_login_user extends FormRequest
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
          'karbary'=>'required',
          'pas'=>'required',
          'amniat'=>'required|captcha',
        ];
    }
}
