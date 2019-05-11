<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class Save_order1 extends FormRequest
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
       $numPro=$parametr['numPro'];
       $mobail=$parametr['mobail'];
       $amniat=$parametr['amniat'];
       $num_farsi=array('/(\x{06F0})/ui','/(\x{06F1})/ui','/(\x{06F2})/ui','/(\x{06F3})/ui','/(\x{06F4})/ui','/(\x{06F5})/ui','/(\x{06F6})/ui','/(\x{06F7})/ui','/(\x{06F8})/ui','/(\x{06F9})/ui');
       $num_english=array(0,1,2,3,4,5,6,7,8,9);
       if(!empty($mobail)and !is_numeric($mobail)){
         Request::merge([
           'mobail'=>preg_replace($num_farsi, $num_english, $mobail),
         ]);
       }
       if(!empty($numPro)and !is_numeric($numPro)){
         Request::merge([
           'numPro'=>preg_replace($num_farsi, $num_english, $numPro),
         ]);
       }
       if(!empty($amniat)and !is_numeric($amniat)){
         Request::merge([
           'amniat'=>preg_replace($num_farsi, $num_english, $amniat),
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
          'namePro'=>'required' ,
          'squad'=>'nullable' ,
          'vahedPro'=>'required',
          'numPro'=>'required|numeric',
          'dis'=>'nullable',
          'mobail'=>'required|mobail' ,
          'ostan'=>'required' ,
          'city'=>'required' ,
          'amniat'=>'required|captcha'
        ];
    }
}
