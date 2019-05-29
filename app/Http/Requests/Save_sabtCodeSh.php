<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class Save_sabtCodeSh extends FormRequest
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
        $codePro=$parametr['codePro'];
        $num_farsi=array('/(\x{06F0})/ui','/(\x{06F1})/ui','/(\x{06F2})/ui','/(\x{06F3})/ui','/(\x{06F4})/ui','/(\x{06F5})/ui','/(\x{06F6})/ui','/(\x{06F7})/ui','/(\x{06F8})/ui','/(\x{06F9})/ui');
        $num_english=array(0,1,2,3,4,5,6,7,8,9);
        if(!empty($id)and !is_numeric($id)){
          Request::merge([
            'codePro'=>preg_replace($num_farsi, $num_english, $codePro),
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
            'codePro'=>'required|numeric',
        ];
    }
}
