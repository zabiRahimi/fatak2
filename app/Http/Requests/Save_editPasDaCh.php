<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class Save_editPasDaCh extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function validationData() {
        $parametr=$this->all();
        $pasOld=$parametr['pasOld'];
        $pasNew=$parametr['pasNew'];
        $num_farsi=array('/(\x{06F0})/ui','/(\x{06F1})/ui','/(\x{06F2})/ui','/(\x{06F3})/ui','/(\x{06F4})/ui','/(\x{06F5})/ui','/(\x{06F6})/ui','/(\x{06F7})/ui','/(\x{06F8})/ui','/(\x{06F9})/ui');
        $num_english=array(0,1,2,3,4,5,6,7,8,9);
        if(!empty($pasOld)){
          Request::merge([
            'pasOld'=>preg_replace($num_farsi, $num_english, $pasOld),
          ]);
        }
        if(!empty($pasNew)){
          Request::merge([
            'pasNew'=>preg_replace($num_farsi, $num_english, $pasNew),
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
        return [
            'pasOld'=>'required',
            'pasNew'=>'required|pas|min:4',
        ];
    }
}
