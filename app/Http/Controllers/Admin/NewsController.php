<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\NewsType;
use App\News;
use Carbon\carbon;
use DB;

class NewsController extends Controller
{
    //
    public function hien()
    {
        return view('admin.index');
    }

    public function createNews()
    {
        $newsTypes = DB::table('newstypes')->get();
        //dd($newsTypes);
        return view('admin.news.create',['newsTypes'=>$newsTypes]);
    }

    public function storeNews(Request $request)
    {  
        if(News::where('slug_description',Str::slug($request->description))->get()->count() > 0 )
        {
            return back()->with('error','Tiêu Đề Tin Đã Tồn Tại');
        }
        else
        {
        $fileName = '';
        if ($request->hasFile('firstImage')) 
        {
            $fileName =  $request->firstImage->getClientOriginalName();//.'_' . $request->firstImage->extension();
            $request->firstImage->storeAs('public/news', $fileName); // getClientOriginalName();   
            //$this->new->image = $fileName;
        $news = new News();
        $news -> newstype_id = $request -> newsType;
        $news -> description = $request -> description;
        $news -> slug_description = Str::slug($request->description);
        $news -> content = $request -> content; 
        $news -> urlimage = $fileName;
        $news -> account_id = 1;
        $news -> dateCreateNew = Carbon::now();
        $news -> save();
        }
        else
        {
            $news = new News();
            $news -> newstype_id = $request -> newsType;
            $news -> description = $request -> description;
            $news -> slug_description = Str::slug($request->description);
            $news -> content = $request -> content; 
            $news -> urlimage = '';
            $news -> account_id = 1;
            $news -> dateCreateNew = Carbon::now();
            $news -> save();
        }
        return redirect()->route('admin.news.list')->with('success','Thêm Tin Thành Công');
        }
        //echo "id cua news da tao la: ".$news->id;
     //   echo $request->description." +  ".$request->content." _ ".$request->newsType. "   file: ".$fileName. Auth::guard('account')->user()->id;
    }

    public function list(Request $request)
    {
    
       // $news = DB::table('news')->paginate(10);  take(20) :: in (1,20)
        $news =  News::with('account','newstype')->orderBy('created_at','desc')->withTrashed()->paginate(10);
    // dd($news);
        return view('admin.news.list',['news'=>$news]);
    }

    public function get_updateNews(Request $request)
    {
     $newsTypes = DB::table('newstypes')->get();
     $news = News::findOrFail($request->id);
     return view('admin.news.update',['newsTypes'=>$newsTypes,'news'=>$news]);
    }

    public function post_updateNews(Request $request)
    {
        
     $news = News::findOrFail($request->id);
     
     if ($news) {
        if ($request->hasFile('firstImage')) {
           // echo storage_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . $news->urlimage;
             if($news->urlImage != '')
             {
                unlink(storage_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . $news->urlimage);
             }
            $fileName = $request->firstImage->getClientOriginalName();
            $request->firstImage->storeAs('public/news', $fileName);
            $news -> description = $request->description;
            $news -> slug_description = Str::slug($request->description);
            $news -> content = $request->content;
            $news -> newstype_id = $request->newsType;
            $news -> urlImage = $fileName;
            $news->save();
            return redirect()->route('admin.news.list')->with('success', 'Cập Nhật Thành Công');
        }
        else
        {
            $news -> description = $request->description;
            $news -> content = $request->content;
            $news -> newstype_id = $request->newsType;
            $news->save();
            return redirect()->route('admin.news.list')->with('success', 'Cập Nhật Thành Công');
        }
     }
     else
     {
         return back()->with("error","Sửa Không Thành Công");
     }
    }
    public function deleteNews(Request $request)
    {
        $news = News::findOrFail($request->id);
        if ($news) {
            $news->delete();
            return redirect()->back()->with('success', 'Xóa Tin Mã '.$news->id.' Thành Công.');
        }
        else
        {
            return redirect()->back()->with('error', 'Xóa Tin Mã '.$news->id.' Không Thành Công.');
        }
    }

   
    public function restoreNews(Request $request)
    { 
        $news = News::onlyTrashed()->findOrFail($request->id);
       
        if ($news) {
            $news->restore();
            return redirect()->route('admin.news.list')->with('success', 'Khôi Phục Tin Mã '.$news->id.' Thành Công.');
        }
        else
        {
            return redirect()->route('admin.news.list')->with('error', 'Khôi Phục Mã '.$news->id.' Không Thành Công.');
        }
    }

    




}
