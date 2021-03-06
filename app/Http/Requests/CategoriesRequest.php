<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
            'name'=>'required|string|min:3|max:50'
        ];
    }
    public function messages(){
        return [
            'name.required'=>'category name is required.',
            'name.string'  =>'category name should consist of valid characters.',
            'name.min'     =>'category name can not have less than 3 characters.',
            'name.max'     =>'category name can not have more than 50 characters.',
        ];
    }
}
