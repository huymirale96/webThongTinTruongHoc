<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Documents;
use App\DocumentsType;

class DocumentsTypeController extends Controller
{
    //
    public function createDocumentsType(){
        return view('admin.documentstype.create');
    }

    public function storeDocumentsType(Request $request){
            $documentstype = new DocumentsType();
            $documentstype->name_type_document = $request -> nameDocumentType;
            $documentstype->slug_name_type_document = Str::slug($request -> nameDocumentType);
            $documentstype->save();
            return redirect()->route('admin.documentstype.list')->with('success','Thêm Loại Tài Liệu Thành Công.');
     }

    public function list(){
        $documentstypes = DocumentsType::withTrashed()->get();
        return view('admin.documentstype.list',["documentstypes" => $documentstypes]);
    }
}
