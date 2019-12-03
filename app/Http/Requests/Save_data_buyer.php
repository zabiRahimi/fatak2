<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Validator;

class Save_data_buyer extends FormRequest
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
       $mobail=$parametr['mobail'];
       $tel=$parametr['tel'];
       $codepost=$parametr['codepost'];
       $amniat=$parametr['amniat'];
       $num_farsi=array('/(\x{06F0})/ui','/(\x{06F1})/ui','/(\x{06F2})/ui','/(\x{06F3})/ui','/(\x{06F4})/ui','/(\x{06F5})/ui','/(\x{06F6})/ui','/(\x{06F7})/ui','/(\x{06F8})/ui','/(\x{06F9})/ui');
       $num_english=array(0,1,2,3,4,5,6,7,8,9);
       if(!empty($mobail)and !is_numeric($mobail)){
         Request::merge([
           'mobail'=>preg_replace($num_farsi, $num_english, $mobail),
         ]);
       }
       if(!empty($tel)and !is_numeric($tel)){
         Request::merge([
           'tel'=>preg_replace($num_farsi, $num_english, $tel),
         ]);
       }
       if(!empty($amniat)and !is_numeric($amniat)){
         Request::merge([
           'amniat'=>preg_replace($num_farsi, $num_english, $amniat),
         ]);
       }
       Request::merge([
         'codepost'=>preg_replace($num_farsi, $num_english, $codepost),
       ]);
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
            'typeBuy' =>'required|name',
            'name'=>'required|name',
            'mobail'=>'required|mobail',
            'tel'=>'nullable|tel',
            'email'=>'nullable|email',
            'ostan'=>'required|name',
            'city'=>'required|name',
            'codepost'=>'required|codepost',
            'address'=>'required|address',
            'amniat' => 'required|captcha',
        ];
    }
}
