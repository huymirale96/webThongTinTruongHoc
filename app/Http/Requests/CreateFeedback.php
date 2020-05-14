<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFeedback extends FormRequest
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
            'fullName'=>'required',
            'email'=>'required',
            'cmt'=>'required',
            
        ];
    }
    public function messages()
    {
        return [
            'fullName.required'=>'Phải Nhập Tên ',
            'email.required'=>'Phải Nhập Email ',
            'cmt.required'=>'Phải Nhập Nội Dung. ',
            
        ];
    }
}
