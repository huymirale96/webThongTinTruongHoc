<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewIntroduce extends FormRequest
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
            'descriptionIntroduce' =>'required|min:5|',
            'contentIntroduce' =>'required|min:5|',
        ];
    }

    public function messages()
    {
        return [
            'descriptionIntroduce.required' =>'Phải Nhập Tiêu Đề',
            'descriptionIntroduce.min' =>'Tiêu Đề Phải Hơn 5 Kí Tự',
            'contentIntroduce.required' =>'Phải Nhập Nội Dung',
            'contentIntroduce.required' =>'Nội Dung Phải Hơn 5 Kí Tự',
        ];
    }
}
