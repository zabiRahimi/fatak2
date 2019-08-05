<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SaveOrderBackEdit extends FormRequest
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
        $id=Request::input('backPro_id');
        return [
          'backPro_id'=>'nullable|numeric',
          'code_rahgiry'=>'required|numeric|unique:back_pros,code_rahgiry,'. $id,
          'date_post'=>'required|date_format:Y/m/d',
          'price_post'=>'required|numeric',
          'buyer_dis'=>'nullable',
          'technician_dis'=>'required',
          'pay_buyer'=>'nullable|numeric',
        ];
    }
}
