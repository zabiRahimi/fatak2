<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class Save_editCodeRahgirySh extends FormRequest
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
       $codeRahgiry=$parametr['codeRahgiry'];
       $num_farsi=array('/(\x{06F0})/ui','/(\x{06F1})/ui','/(\x{06F2})/ui','/(\x{06F3})/ui','/(\x{06F4})/ui','/(\x{06F5})/ui','/(\x{06F6})/ui','/(\x{06F7})/ui','/(\x{06F8})/ui','/(\x{06F9})/ui');
       $num_english=array(0,1,2,3,4,5,6,7,8,9);
       if(!empty($id)and !is_numeric($id)){
         Request::merge([
           'codeRahgiry'=>preg_replace($num_farsi, $num_english, $codeRahgiry),
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
        $id=Request::input('id');
        return [
            'codeRahgiry'=>'required|numeric|unique:pro_shops,codeRahgiry,'.$id,
        ];
    }
}
