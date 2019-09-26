<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Save_searchDateShop extends FormRequest
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
       $day1=$parametr['day1'];
       $month1=$parametr['month1'];
       $year1=$parametr['year1'];
       $day2=$parametr['day2'];
       $month2=$parametr['month2'];
       $year2=$parametr['year2'];
       $num_farsi=array('/(\x{06F0})/ui','/(\x{06F1})/ui','/(\x{06F2})/ui','/(\x{06F3})/ui','/(\x{06F4})/ui','/(\x{06F5})/ui','/(\x{06F6})/ui','/(\x{06F7})/ui','/(\x{06F8})/ui','/(\x{06F9})/ui');
       $num_english=array(0,1,2,3,4,5,6,7,8,9);
       if(!empty($day1)and !is_numeric($day1)){
         Request::merge([
           'day1'=>preg_replace($num_farsi, $num_english, $day1),
         ]);
       }
       if(!empty($month1)and !is_numeric($month1)){
         Request::merge([
           'month1'=>preg_replace($num_farsi, $num_english, $month1),
         ]);
       }
       if (!empty($year1)and !is_numeric($year1)) {
         Request::merge([
           'year2'=>preg_replace($num_farsi, $num_english, $year1),
         ]);
       }
       if(!empty($day2)and !is_numeric($day2)){
         Request::merge([
           'day2'=>preg_replace($num_farsi, $num_english, $day2),
         ]);
       }
       if(!empty($month2)and !is_numeric($month2)){
         Request::merge([
           'month2'=>preg_replace($num_farsi, $num_english, $month2),
         ]);
       }
       if (!empty($year2)and !is_numeric($year2)) {
         Request::merge([
           'year2'=>preg_replace($num_farsi, $num_english, $year2),
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
          'nameCookie'=>'required|alpha_num',
          'nameCookieD1'=>'required|alpha_num',
          'nameCookieD2'=>'required|alpha_num',
          'day1'=>'required|numeric|min:1|max:31',
          'month1'=>'required|numeric|min:1|max:12',
          'year1'=>'required|numeric|min:1390|max:1490',
          'day2'=>'required|numeric|min:1|max:31',
          'month2'=>'required|numeric|min:1|max:12',
          'year2'=>'required|numeric|min:1390|max:1490',
        ];
    }
}
