<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Save_pro_search extends FormRequest
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
       $mobail=$parametr['id'];
       $num_farsi=array('/(\x{06F0})/ui','/(\x{06F1})/ui','/(\x{06F2})/ui','/(\x{06F3})/ui','/(\x{06F4})/ui','/(\x{06F5})/ui','/(\x{06F6})/ui','/(\x{06F7})/ui','/(\x{06F8})/ui','/(\x{06F9})/ui');
       $num_english=array(0,1,2,3,4,5,6,7,8,9);
       if(!empty($id)and !is_numeric($id)){
         Request::merge([
           'id'=>preg_replace($num_farsi, $num_english, $id),
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
            'nameCookieCheck'=>'required|alpha_dash',
            'nameCookie'=>'required|alpha_dash',
            'check' => 'required|alpha',
            'pro' => 'required_if:check,pro|nullable|alpha_dash',
            'id' =>'required_if:check,id|nullable|numeric',
        ];
    }
}
