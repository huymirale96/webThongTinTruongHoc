<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\CreateFeedback;
use Carbon\carbon;
use App\News;
use App\Documents;
use App\DocumentsType;
use App\NewsType;
use App\Account;
use App\FeedBacks;
use App\Introduces;
use DB;

class PageController extends Controller
{
    public function getListNews($slug_newstype)
    {
       
       /* $id = NewsType::where('slug_newtype',$slug_newstype)->value('id');
        //$idType = NewsType::find(1)->news()->get();
        $data['news'] = News::findOrFail($id);*/
       /*$data = News::whereHas('newstype', function(Builder $query) { //
            $query->select('id', 'nametyspe')->where('id', '=',"1");
        })->withTrashed()->get();*/
        //dd($data);


       //echo (DB::table('News')->count());

       //$data = DB::table('news')->join('newstypes','news.newstype_id','newstypes.id')->get();

      /* $data = DB::table('news')->join('newstypes', function($join){
        $join->on('news.newstype_id','newstypes.id')->where('newstypes.id', 4 );
       })->select('news.*','newstypes.nametype as huy')->get(); ->paginate(8) */                         //->select('description','slug_description','urlimage','news.content','newstypes.nametype')->pagenate();
       //$users = DB::table('news')->paginate(15);
       $news = DB::table('news')->join('newstypes','news.newstype_id','newstypes.id')->where('newstypes.slug_newtype', $slug_newstype)->orderBy('news.created_at','desc')->paginate(2,['description','slug_description','urlimage','news.content','newstypes.slug_newtype']);
       //dd($news->links()); ->orderBy('id', 'DESC')
    //    $news = News::with(array('newstype'=>function($query){
    //     $query->select('id','nametype');
    // }))->orderBy('id', 'DESC')->get(['id'])->toArray();
    //    dd($news);
       return view('website.news.listNews')->with(compact('news'));
    }

    public function getNews( $slug_newstype, $slug_description )
    {
        
        DB::table('news')->where('slug_description',$slug_description)->increment('views',1);
        $data = News::with('newstype')->where('slug_description', $slug_description)->get();
        //$newsOrther = NewsType::where('slug_newtype', $slug_newstype)->news()->take(6)->get(['description','slug_description']);
        $newsOrthers = DB::table('news')->join('newstypes','news.newstype_id','newstypes.id')->where('newstypes.slug_newtype', $slug_newstype)->take(5)->get(['description','slug_description','nametype']);
        return view('website.news.news')->with(compact('data','newsOrthers'));
       
    }

    public function getAllIntroduces()
    {
        $introduces = Introduces::all('slug_description','description');
        $data = Introduces::first(['content','slug_description']);
       // dd($introduces['slug_description']);
        //$data = DB::table('news')->join('newstypes','news.newstype_id','newstypes.id')->where('newstypes.slug_newtype','gioi-thieu')->first(); 
         
        //$introduces =  DB::table('news')->join('newstypes','news.newstype_id','newstypes.id')->where('newstypes.slug_newtype','gioi-thieu')->get(['description','slug_description']);
        //dd($introduces);
        return view('website.introduce.introduce')->with(compact('introduces','data'));
       
    }

    public function getIntroduces($slug_introduce) 
    {
        //$data = News::where('slug_description',$slug_introduce)->select('content', 'slug_description')->first();
        //dd($data);
        $data = Introduces::where('slug_description',$slug_introduce)->select('content', 'slug_description')->first();
        $introduces = Introduces::all('slug_description','description');
        //$data = Introduces::first(['content','slug_description']);
       
        if($data)
        {
            ///$introduces = DB::table('news')->join('newstypes','news.newstype_id','newstypes.id')->where('newstypes.slug_newtype','gioi-thieu')->get(['description','slug_description']);
            return view('website.introduce.introduce')->with(compact('introduces','data'));
        }
        else
        {
            $data = ['content' => 'Không Có Dữ Liệu','slug_description' => 'null'];
            //dd($data['content']);
            //$introduces = DB::table('news')->join('newstypes','news.newstype_id','newstypes.id')->where('newstypes.slug_newtype','gioi-thieu')->get(['description','slug_description']);
            return view('website.introduce.introduce')->with(compact('introduces','data'));
            //$introduces = NewsType::where('namestype','gioi-thieu')->news->get();
          //  return view('website.introduce.introduce')->with(compact('introduces'));
        }
        
    }

    public function seachPage()
    {
        return view('website.search.search');
    }

    public function home()
    {
        //$id = NewsType::where('slug_newtype','tin-the-thao')->first('id')->id;  
        $data['tinTheThao'] = News::where('newstype_id',NewsType::where('slug_newtype','tin-the-thao')->first('id')->id)->orderBy('views','desc')->take(4)->select('description','slug_description','urlimage','content')->get();
        $data['hinhAnh'] = News::where('newstype_id',NewsType::where('slug_newtype','hinh-anh')->first('id')->id)->orderBy('views','desc')->take(4)->select('description','slug_description','urlimage','content')->get();
        $data['tuyenSinh'] = News::where('newstype_id',NewsType::where('slug_newtype','tuyen-sinh')->first('id')->id)->orderBy('views','desc')->take(4)->select('description','slug_description','urlimage','content')->get();
        $data['tinNhaTruong'] = News::where('newstype_id',NewsType::where('slug_newtype','tin-nha-truong')->first('id')->id)->orderBy('views','desc')->take(4)->select('description','slug_description','urlimage','content')->get();
        $data['tinGiaoDucDoDay'] = News::where('newstype_id',NewsType::where('slug_newtype','tin-giao-duc-do-day')->first('id')->id)->orderBy('views','desc')->take(4)->select('description','slug_description','urlimage','content')->get();
        $data['lienKet'] = News::where('newstype_id',NewsType::where('slug_newtype','lien-ket-website')->first('id')->id)->orderBy('views','desc')->take(6)->select('description','slug_description','urlimage','content')->get();
        $data['videoClip'] = News::where('newstype_id',NewsType::where('slug_newtype','video-clip')->first('id')->id)->orderBy('views','desc')->take(4)->select('description','slug_description','urlimage','content')->get();
        $data['thongBao'] = News::where('newstype_id',NewsType::where('slug_newtype','thong-bao')->first('id')->id)->orderBy('views','desc')->take(6)->select('description','slug_description','urlimage','content')->get();
        $data['newsViewest'] = News::orderBy('views','desc')->take(4)->select('description','slug_description','urlimage','content')->get();
        $data['newsLastest'] = News::orderBy('created_at','desc')->take(3)->select('description','slug_description','urlimage','content')->get();
        $data['videoClip'] = $data['thongBao'];
       // dd($data->tinTheThao);
       //dd(Str::replaceArray('p', ['h1', 'h2','h3','h4'],'<h1></h1><h3></h3>'));

     //echo (Carbon::parse('05/05/2015')->format('m d Y'));
        return view('website.index')->with(compact('data'));
    // 3 tin moi
    // 4 tin xem nhieu nhat
    // 6 thong bao 3 hinh anh 6 lien ket
    // nha truong , giao duc do day, tuyen sinh, video clip  4 tin moi nhat
    }
    public function createFeedback(CreateFeedback $request)
    {
        $feedBacks = new FeedBacks();
        $feedBacks -> fullName = $request->fullName;
        $feedBacks -> email    = $request->email;
        $feedBacks -> content  = $request->cmt;
        $feedBacks ->save();
        return redirect()->route('website.feedback')->with('success','Gửi Tin Thành Công');
    }

    public function getLibrarys()
    {
        $listTypeDocuments = DocumentsType::all('name_type_document','slug_name_type_document');//get(['name_type_document','slug_name_type_document']);
        $documents = Documents::first()->orderBy('created_at','desc')->get(['name_documents','slug_name_documents']);
        $currentSlugdocumentType = Documents::first()->documentsType->slug_name_type_document;
        return view('website.library.librabry')->with(compact('listTypeDocuments','documents','currentSlugdocumentType'));
    }

    public function getLinks($slug_document)
    {
        $document = Documents::where('slug_name_documents',$slug_document);
        $document->increment('downloads');
        $link = $document->get(['url_documents']);
        return redirect(asset('storage/documents'.'/'.$link[0]->url_documents));
    }

    public function getDocumentsByType($slug_documentType)
    {
        $currentSlugdocumentType = $slug_documentType;
        $listTypeDocuments = DocumentsType::all('name_type_document','slug_name_type_document');
        $id = DocumentsType::where('slug_name_type_document',$slug_documentType)->first(['id'])->id; 
        $documents = DocumentsType::find($id)->documents()->get(['name_documents','slug_name_documents']);
        return view('website.library.librabry')->with(compact('listTypeDocuments','documents','currentSlugdocumentType'));
    }
}
