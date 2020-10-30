<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplaintsRequest extends FormRequest
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
            'name'=>'required|string|min:3|max:50',
            //phone is actually validated by sending v-code to user
            'phone'=>'required|string|min:9|max:25',
            'email'=>'required|email',
            'photo'=>'nullable|image|mimes:jpg,png,jpeg,gif,svg',
            'question_type'=>'required|exists:question_types,id',
            'service_link'=>'nullable|url',
            'question'=>'required|text',

        ];
    }
    public function messages(){
        return [
            'name.required'=>' name is required.',
            'name.string'  =>' name should consist of valid characters.',
            'name.min'     =>' name can not have less than 3 characters.',
            'name.max'     =>'category name can not have more than 50 characters.',
            'phone.required'=>'category phone is required.',
            'phone.string'  =>'category phone should consist of valid characters.',
            'phone.min'     =>'category phone can not have less than 3 characters.',
            'phone.max'     =>'category phone can not have more than 50 characters.', 
            'email.required'=>' email is required.',
            'email.string'  =>'provide valid email.',
            'photo.mimes'   =>'provide valid photo(i.e,of extensions : jpg,png,jpeg,gif,svg)',
            'question_type.required' =>' question_type is required.',
            'question_type.exists' =>'provide existed type .',
            'service_link.url'=>'provide valid url.',
            'question.required'=>' question is required.',
            'question.string'  =>'provide valid text.',            

                   ];
    }

}
