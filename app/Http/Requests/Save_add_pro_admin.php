<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Save_add_pro_admin extends FormRequest
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
          'name'=>'required|min:4',
          'seller'=>'required',
          'price'=>'required|numeric|min:3',
          'old_price'=>'nullable|numeric|min:3',
          'gram'=>'required',
          'gram_post'=>'required',
          'pakat_price'=>'required|numeric|min:3',
          'dis'=>'required',
          // 'img1' => 'required',
          // 'img2' => 'nullable',
          // 'img3' => 'nullable',
          // 'img4' => 'nullable',
          // 'img5' => 'nullable',
          // 'img6' => 'nullable',
        ];
    }
}
