<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
// use Illuminate\Validation\Rule;
// use Cookie;
use Illuminate\Foundation\Http\FormRequest;

class Save_edit_user extends FormRequest
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
          'name'=>'required|name|min:5',
          'karbary'=>'required|pas|min:4|unique:registers,karbary,'.$id,
          'mobail'=>'required|mobail|unique:registers,mobail,'.$id,
          'email'=>'nullable|email|unique:registers,email,'.$id,

        ];
    }
}
