<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
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
            'des'=>"required"
        ];
    }

    public function messages(){
        return [
            'name.min'=>'The Name field must be at least :min',
            'des.min'=>'The Description field must be at least :min',
            'des.required'=>'The Description field is required.'
        ];
    }
}
