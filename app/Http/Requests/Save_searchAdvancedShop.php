<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class Save_searchAdvancedShop extends FormRequest
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
       $date1=$parametr['date1'];
       $date2=$parametr['date2'];
       $num_farsi=array('/(\x{06F0})/ui','/(\x{06F1})/ui','/(\x{06F2})/ui','/(\x{06F3})/ui','/(\x{06F4})/ui','/(\x{06F5})/ui','/(\x{06F6})/ui','/(\x{06F7})/ui','/(\x{06F8})/ui','/(\x{06F9})/ui');
       $num_english=array(0,1,2,3,4,5,6,7,8,9);

         Request::merge([
           'date1'=>preg_replace($num_farsi, $num_english, $date1),
         ]);
         Request::merge([
           'date2'=>preg_replace($num_farsi, $num_english, $date2),
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
          'ostan'=>'nullable',
          'city'=>'nullable',
          'pro'=>'nullable',
          'day1'=>'nullable|numeric|min:1|max:31',
          'month1'=>'nullable|numeric|min:1|max:12',
          'year1'=>'nullable|numeric|min:1390|max:1490',
          'day2'=>'nullable|numeric|min:1|max:31',
          'month2'=>'nullable|numeric|min:1|max:12',
          'year2'=>'nullable|numeric|min:1390|max:1490',
        ];
    }
}
