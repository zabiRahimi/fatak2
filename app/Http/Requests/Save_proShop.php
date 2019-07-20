<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class Save_proShop extends FormRequest
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
       $price=$parametr['price'];
       $num=$parametr['num'];
       $vazn=$parametr['vazn'];
       $vaznPost=$parametr['vaznPost'];
       $pakat=$parametr['pakat'];
       $num_farsi=array('/(\x{06F0})/ui','/(\x{06F1})/ui','/(\x{06F2})/ui','/(\x{06F3})/ui','/(\x{06F4})/ui','/(\x{06F5})/ui','/(\x{06F6})/ui','/(\x{06F7})/ui','/(\x{06F8})/ui','/(\x{06F9})/ui');
       $num_english=array(0,1,2,3,4,5,6,7,8,9);
       if(!empty($price)and !is_numeric($price)){
         Request::merge([
           'price'=>preg_replace($num_farsi, $num_english, $price),
         ]);
       }
       if(!empty($num)and !is_numeric($num)){
         Request::merge([
           'num'=>preg_replace($num_farsi, $num_english, $num),
         ]);
       }
       if(!empty($vazn)and !is_numeric($vazn)){
         Request::merge([
           'vazn'=>preg_replace($num_farsi, $num_english, $vazn),
         ]);
       }
       if(!empty($vaznPost)and !is_numeric($vaznPost)){
         Request::merge([
           'vaznPost'=>preg_replace($num_farsi, $num_english, $vaznPost),
         ]);
       }
       if(!empty($pakat)and !is_numeric($pakat)){
         Request::merge([
           'pakat'=>preg_replace($num_farsi, $num_english, $pakat),
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
          'id' =>'required|numeric' ,
          'stamp' =>'required|numeric' ,
          'namePro'=>'required',
          'maker'=>'nullable',
          'brand'=>'nullable',
          'model'=>'nullable',
          'price'=>'required|numeric',
          'vahed'=>'required',
          'num'=>'nullable|numeric',
          'dimension' =>'required|numeric' ,
          'vazn'=>'nullable|numeric',
          'vaznPost'=>'required|numeric',
          'pakat'=>'nullable|numeric',
          'dis'=>'nullable',
          'dateMake'=>'nullable',
          'dateExpiration'=>'nullable',
          'term'=>'nullable',
          'img1'=>'nullable',
          'img2'=>'nullable',
          'img3'=>'nullable',
          'img4'=>'nullable',
          'img5'=>'nullable',
          'img6'=>'nullable',
        ];
    }
}
