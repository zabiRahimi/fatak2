<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class Save_edit_pro_admin extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name'=>'required|min:2',
          'vahed'=>'required',
          'seller'=>'required',
          'price'=>'required|numeric|min:3',
          'old_price'=>'nullable|numeric|min:3',
          'dimension_stamp'=>'required|numeric',
          'gram'=>'required',
          'gram_post'=>'required',
          'pakat_price'=>'required|numeric|min:3',
          'dis'=>'required',
          'mavad'=>'nullable',
          'date_m'=>'nullable',
          'date_n'=>'nullable',
          'dimension'=>'nullable',
          'sponsor'=>'nullable',
          'term'=>'nullable',
          'bake'=>'nullable',
          'made'=>'nullable',
          'model'=>'nullable',
          'show'=>'required|numeric|max:2',
          'img1' => 'required',
          // 'img2' => 'nullable',
          // 'img3' => 'nullable',
          // 'img4' => 'nullable',
          // 'img5' => 'nullable',
          // 'img6' => 'nullable',
        ];
    }
}
