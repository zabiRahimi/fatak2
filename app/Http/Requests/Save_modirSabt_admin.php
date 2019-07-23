<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Save_modirSabt_admin extends FormRequest
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
          'mobail'=>'required|mobail|unique:managements',
          'karbary'=>'required|pas|min:6|unique:managements',
          'pas'=>'required|pas|min:6',

          'access'=>'required|numeric',
          'show'=>'required|numeric',
          
        ];
    }
}
