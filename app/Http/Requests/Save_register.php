<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Save_register extends FormRequest
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
       $karbary=$parametr['karbary'];
       $mobail=$parametr['mobail'];
       $amniat=$parametr['amniat'];
       $pas=$parametr['pas'];
       $num_farsi=array('/(\x{06F0})/ui','/(\x{06F1})/ui','/(\x{06F2})/ui','/(\x{06F3})/ui','/(\x{06F4})/ui','/(\x{06F5})/ui','/(\x{06F6})/ui','/(\x{06F7})/ui','/(\x{06F8})/ui','/(\x{06F9})/ui');
       $num_english=array(0,1,2,3,4,5,6,7,8,9);
       if(!empty($mobail)and !is_numeric($mobail)){
         Request::merge([
           'mobail'=>preg_replace($num_farsi, $num_english, $mobail),
         ]);
       }
       if(!empty($amniat)and !is_numeric($amniat)){
         Request::merge([
           'amniat'=>preg_replace($num_farsi, $num_english, $amniat),
         ]);
       }
       Request::merge([
         'pas'=>preg_replace($num_farsi, $num_english, $pas),
       ]);
       Request::merge([
         'karbary'=>preg_replace($num_farsi, $num_english, $karbary),
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
          'name'=>'required|name|min:5',
          'karbary'=>'required|pas|min:4|unique:registers',
          'pas'=>'required|pas|min:4',
          'mobail'=>'required|mobail|unique:registers',
          'email'=>'nullable|email|unique:registers',
          'amniat'=>'required|captcha',
        ];
    }
}
