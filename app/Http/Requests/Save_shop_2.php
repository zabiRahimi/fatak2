<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class Save_shop_2 extends FormRequest
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
    public function validationData() {
       $parametr=$this->all();
       $codemly=$parametr['codemly'];
       $tel=$parametr['tel'];
       $codepost=$parametr['codepost'];
       $accountNumber=$parametr['accountNumber'];
       $cart=$parametr['cart'];
       $num_farsi=array('/(\x{06F0})/ui','/(\x{06F1})/ui','/(\x{06F2})/ui','/(\x{06F3})/ui','/(\x{06F4})/ui','/(\x{06F5})/ui','/(\x{06F6})/ui','/(\x{06F7})/ui','/(\x{06F8})/ui','/(\x{06F9})/ui');
       $num_english=array(0,1,2,3,4,5,6,7,8,9);
       if(!empty($codemly)and !is_numeric($codemly)){
         Request::merge([
           'codemly'=>preg_replace($num_farsi, $num_english, $codemly),
         ]);
       }
       if(!empty($tel)and !is_numeric($tel)){
         Request::merge([
           'tel'=>preg_replace($num_farsi, $num_english, $tel),
         ]);
       }
       if(!empty($codepost)and !is_numeric($codepost)){
         Request::merge([
           'codepost'=>preg_replace($num_farsi, $num_english, $codepost),
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
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'shop'=>'required|pas|min:4|unique:shops',
          'codemly'=>'required|codemly|unique:shops',
          'ostan'=>'required',
          'city'=>'required',
          'address'=>'required|address',
          'codepost'=>'required|codepost',
          'tel'=>'nullable|tel',
          'email'=>'nullable|email|unique:shops',
          'accountNumber'=>'required|numeric',
          'cart'=>'required|numeric',
          'master'=>'required|name',
          'bank'=>'required|farsi',
          'allowGhanon'=>'accepted',
        ];
    }
}
