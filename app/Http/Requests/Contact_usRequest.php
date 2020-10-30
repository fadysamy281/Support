<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Contact_usRequest extends FormRequest
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
            //often, it contains '-' characters
            'post_code'=>'nullable|text',

            'message'=>'required|text',

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
            'post_code.text'=>'provide valid post_code',
            'message.required'=>' message is required.',
            'message.string'  =>'provide valid text.',            

                   ];
    }
}
