<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\News;
use App\NewsType;

class NewsTypeController extends Controller
{
    //
    public function postcreate(Request $request)
    {
        //echo 'dds '.$request->nameNewsType;
        $newsType = new NewsType();
        $newsType->nametype = $request->nameNewsType;
        $newsType->slug_newType = Str::slug($request->nameNewsType);
        $newsType->save();
        $data = NewsType::all();
        return view('admin.newstype.list',['newstype'=> $data])->with('success','đâs'); //trans('flash-message.add-newstype-success')
       
    }

    public function getcreate()
    {
        return view('admin.newstype.create');
    }
    
    public function list()
    {
      $data = NewsType::withTrashed()->get();;

     // dd( $data );
      return view('admin.newstype.list',['newstype'=> $data]);
    }

    public function detele(Request $request)
    {
        $newsType = NewsType::findOrFail($request->id);
        $newsType->delete();
        $data = NewsType::all();
      return view('admin.newstype.list',['newstype'=> $data]);
    }
}
