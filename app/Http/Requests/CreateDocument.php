<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDocument extends FormRequest
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
            'documents_type'=>'required',
            'documents_file'=>'required|file|',
            'documents_name'=>'required|min:2|',
            'documents_file' => 'mimes:pdf,xlsx,doc,docx,txt,pptx',
            //
        ];
    }
    public function messages()
    {
        return [
            'documents_type.required'=>'Phải Có Kiểu Tài Liệu. ',
            'documents_name.required'=>'Phải Nhập Tên Tài Liệu',
            'documents_name.min'=>'Tên Tài Liệu Ít Nhất 2 Kí Tự.',
            'documents_file.file'=>'Tải Lên Phải Là Một File.',
            'documents_file.required'=>'Phải Chọn Tài Liệu.',
            'documents_file.mimes'=>'Chỉ Chấp Nhập Tài Liệu .doc , .pdf, .pptx, .txt',
        ];
    }
}
