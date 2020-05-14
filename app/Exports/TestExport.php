<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\NewsType;


class TestExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
    public function collection()
    {
        return NewsType::all();
    }
    //Thêm hàng tiêu đề cho bảng
    public function headings() :array {
     return ["STT", "Tên tài khoản", "Email", "Loại"];
    }
}
