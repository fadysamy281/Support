<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionsRequest extends FormRequest
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
            'question'=>'required|string|min:3|max:100',
            //phone is actually validated by sending v-code to user
            'answer'=>'required|text',
            'category_id'=>'required|integer|exists:categories,id',
        ];
    }
    public function messages(){
        return [
            'question.required'=>' question is required.',
            'question.string'  =>' question should consist of valid characters.',
            'question.min'     =>' question can not have less than 3 characters.',
            'question.max'     =>' question can not have more than 100 characters.',
            'answer.required'  =>'answer is required.',
            'answer.text'      =>'answer should consist of valid characters.',
            'category_id.required'=>' category is required.',
            'category_id.integer'=>' provide valid category. ',
            'category_id.exists'  =>' category does not exist.',
         

                   ];
    }


}