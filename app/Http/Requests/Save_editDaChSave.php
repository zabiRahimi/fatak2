<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class Save_editDaChSave extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function validationData() {
        $parametr=$this->all();
        $codemly=$parametr['codemly'];
        $mobail=$parametr['mobail'];
        $accountNumber=$parametr['accountNumber'];
        $cart=$parametr['cart'];
        $num_farsi=array('/(\x{06F0})/ui','/(\x{06F1})/ui','/(\x{06F2})/ui','/(\x{06F3})/ui','/(\x{06F4})/ui','/(\x{06F5})/ui','/(\x{06F6})/ui','/(\x{06F7})/ui','/(\x{06F8})/ui','/(\x{06F9})/ui');
        $num_english=array(0,1,2,3,4,5,6,7,8,9);
        if(!empty($codemly)and !is_numeric($codemly)){
          Request::merge([
            'codemly'=>preg_replace($num_farsi, $num_english, $codemly),
          ]);
        }
        if(!empty($mobail)and !is_numeric($mobail)){
          Request::merge([
            'mobail'=>preg_replace($num_farsi, $num_english, $mobail),
          ]);
        }
        if(!empty($accountNumber)and !is_numeric($accountNumber)){
          Request::merge([
            'accountNumber'=>preg_replace($num_farsi, $num_english, $accountNumber),
          ]);
        }
        if(!empty($cart)and !is_numeric($cart)){
          Request::merge([
            'cart'=>preg_replace($num_farsi, $num_english, $cart),
          ]);
        }
        return $this->all();
    }
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
          'codemly'=>'required|codemly|unique:channels,codemly,'.$id,
          'name'=>'required|name|min:5',
          'mobail'=>'required|mobail|unique:channels,mobail,'.$id,
          'email'=>'nullable|email|unique:channels,email,'.$id,
          'ostan'=>'required',
          'city'=>'required',
          'address'=>'required|address',
          // 'codepost'=>'required',
          'accountNumber'=>'required|numeric',
          'cart'=>'required|numeric',
          'master'=>'required|name',
          'bank'=>'required|farsi',

        ];
    }
}
