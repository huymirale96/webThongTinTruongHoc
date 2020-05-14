<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAdmin extends FormRequest
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
            'fullName'=>'required|min:4',
            'email'=>'required|email',
            'numberPhone'=>'required',
            'userName'=>'required|min:5',
            'passWord'=>'required|min:6',
            'repeatPassWord'=>'required|min:6',

            //
        ];
    }
    public function messages(){
        return [
            'fullName.required'=>'Tên Không Được Trống.',
            'email.required'=>'Email Không Được Trống',
            'numberPhone.required'=>'SĐT Không Được Trống.',
            'userName.required'=>'Tên Đăng Nhập Không Được Trống.',
            'passWord.required'=>'Mật Khẩu Không Được Trống',
            'email.email'=>'Email Không Đúng',
           // 'passWord'=>'',
           // 'repeatPassWord'=>'',
           
        ];
    }
}


