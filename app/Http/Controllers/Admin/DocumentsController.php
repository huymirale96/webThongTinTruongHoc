<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Documents;
use App\DocumentsType;

class DocumentsController extends Controller
{
    //
    public function createDocuments(){
        $documentsTypes = DocumentsType::all();
        return view('admin.documents.create',["documentsTypes"=>$documentsTypes]);
    }

    public function storeDocuments(CreateDocument $request){
       /* $request->validate([
            'documents_type'=>'required',
            'documents_file'=>'required|file|',
            'documents_name'=>'required|min:2|',
        ],[
            'documents_type.required'=>'Phải Có Kiểu Tài Liệu. ',
            'documents_name.required'=>'Phải Nhập Tên Tài Liệu',
            'documents_name.min'=>'Tên Tài Liệu Ít Nhất 2 Kí Tự.',
            'documents_file.file'=>'Tải Lên Phải Là Một File.',
            'documents_file.required'=>'Phải Chọn Tài Liệu.',
        ]);*/
      
        $fileName = $request->documents_file->getClientOriginalName(); 
        $request->documents_file->storeAs('public/documents',$fileName);
        $documents = new Documents();
        $documents->name_documents = $request->documents_name;
        $documents->slug_name_documents = Str::slug($request->documents_name);
        $documents->documentstype_id = $request->documents_type;
        $documents->account_id = '1';
        $documents->url_documents = $fileName;
        $documents->save();
        return redirect()->route('admin.documents.list')->with('success','Thêm Tài Liêu Thành Công.');

        
        
    }

    public function list(){
        $documents = Documents::with('documentstype','account')->withTrashed()->paginate(10);;
       // dd( $documents);
        return view('admin.documents.list',["documents" => $documents]);
    }

    public function deleteDocuments(Request $request)
    {
        $id  = $request->id;
        Documents::findOrFail($id)->delete();
        return redirect()->route('admin.documents.list')->with('success','Xóa Tài Liêu Thành Công.');
    }
    
    public function restoreDocuments(Request $request)
    {
        $id  = $request->id;
        Documents::withTrashed()->where('id',$id)->restore();
        return redirect()->route('admin.documents.list')->with('success','Khôi Phục Tài Liêu Thành Công.');
    }
}
