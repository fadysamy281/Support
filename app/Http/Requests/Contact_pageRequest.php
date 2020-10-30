<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Contact_pageRequest extends FormRequest
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
            'title'              =>'required|text|min:7|max:150',
            'description'        =>'required|text',
            'main_branch'        =>'required|text',
            'main_branch_address'=>'required|text',
            'branch'             =>'required|text',
            'branch_address'     =>'required|text',

        ];
    }
    public function messages(){
        return [
            'title.required'=>' title is required.',
            'title.string'  =>' title should consist of valid characters.',
            'title.min'     =>' title can not have less than 7 characters.',
            'title.max'     =>' title can not have more than 150 characters.',
            'description.required'=>' description is required.',
            'description.text'  =>'provide valid text.',
            'main_branch.required'=>' main_branch is required.',
            'main_branch.text'  =>'provide valid text.',            
            'main_branch_address.required'=>' main_branch_address is required.',
            'main_branch_address.text'  =>'provide valid text.',
            'branch.required'=>' branch is required.',
            'branch.text'  =>'provide valid text.',
            'branch_address.required'=>' branch_address is required.',
            'branch_address.text'  =>'provide valid text.',                                 
        ];
    }}
