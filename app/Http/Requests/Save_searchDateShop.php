<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Save_searchDateShop extends FormRequest
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
          'date1'=>'required|date_format:Y-m-d',
          'date2'=>'required|date_format:Y-m-d',
        ];
    }
}
