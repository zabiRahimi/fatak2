<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class SaveEditRahgiryCodeAd extends FormRequest
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
        $id=Request::input('buy_id');
        return [
          'code_rahgiry'=>'required|numeric|unique:buys,code_rahgiry,'.$id,
          'buy_id'=>'required|numeric',
          'datePost'=>'required|date_format:Y/m/d',
        ];
    }
}
