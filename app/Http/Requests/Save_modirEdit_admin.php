<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class Save_modirEdit_admin extends FormRequest
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
        $id=Request::input('id');
        return [
          'id'=>'required|numeric',
          'name'=>'required|name|min:5',
          'mobail'=>'required|mobail|unique:managements,mobail,'.$id,
          'karbary'=>'required|pas|min:6|unique:managements,karbary,'.$id,
          'access'=>'required|numeric',
          'show'=>'required|numeric',
        ];
    }
}
