<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRahgiryCodeAd extends FormRequest
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
          'code_rahgiry'=>'required|numeric|unique:buys',
          'buy_id'=>'required|numeric',
          'datePost'=>'required|date_format:Y/m/d',

        ];
    }
}
