<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveEditStageOrderAdmin extends FormRequest
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
          'buy_id'=>'required|numeric',
          'stage'=>'required|numeric',
          'code_rahgiry'=>'nullable|numeric',
          'date_post'=>'nullable|date_format:Y/m/d',
        ];
    }
}
