<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\TestExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\CheckLogin;
use App\News;
use App\NewsType;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::group(['prefix' => 'gioi-thieu'], function () {
    Route::get('/{giotieu}', function ($giotieu) {
        dd($giotieu);
    });

});*/


Route::get('a11', function () {
   return 'User ss   '. storage_path();
 
});

Route::get('/test', function () {
    //$data = App\News::orderBy('created_at', 'desc')->take(6)->get(); //sortByDesc  where('slug_newtype','tin-the-thao')
   // $data = NewsType::find(1)->news()->orderBy('created_at','desc')->get(['id','description','slug_description']); //with('NewsType:id')->where('newstypes.id', 8)->get();
   $data = NewsType::find(4)->news;
   dd($data);
  //  DB::table('documents')->where('id',1)->increment('downloads',1);
    //return view('admin.news.create');
    //public function export() 
    //{
      //  return Excel::download(new TestExport, 'TestExport.xlsx');
    //}
  //  session()->push('user.teams', 323);
   // session(['key' => 'value']);
    //$dataSession = session('key','This is default value');  k dung dc $request->
    //session()->forget('key');  session()->forget(['key1', 'key2']);
   // dd(session()->has('key'));
    // session()->flash('status', 'Task was successful!');  
  // session()->flush();
  //session()->pull('key', 'default');
   //dd( session('user.teams') ?? 'ko co key stastys');
//return view('website.news.listNews');
    //dd(asset('assets/admin'));   public.path(); -> c// admin//...
  //  session(['cart' => 'huyhuy']);
    //dd(session('cart'));
    //$files = App\News::with('account')->take(20)->get();
    //dd($id);
   // dd(App\NewsType::count());
    //$files = Storage::files('news');
  // // Storage::makeDirectory('ten-thu-muc'); // tao trong storage  asset('storage/filename')
  //  echo asset('storage/news/ads.txt');
        //$data = App\News::find(1)->with('account');
        //$files = App\News::find(6)->account->fullname;
        //dd( Str::slug('Awesome Title', '-'));

     //   dd(public_path());
    // $collection = Str::of('foo-bar-baz-12z34')->explode('-');
     //dd($collection[count($collection)-1]);
      //  $data['data1'] = "data1";
       // $data['data2'] = "data2";
       // dd($data);
     //dd(is_numeric($collection[count($collection)-1]));
        // foreach($files as $file)
        // {
        //     echo($file->account['fullname']);///->account->fullname;
        // }
       // $data = NewsType::find(1)->news()->get(['id','crseated_at']);
      /// $data = App\News::with('newstype')->get();
       // dd($data);
       //  return view('website.introduce.introduce');
});
Route::get('/', function () {
 //   echo 'huy';
    //return redirect()->route('admin.index');
   return redirect()->route('website.home');
});

Route::get('/indexxs','NewsController@hien')->name('hien');


Route::get('user/{id}', function ($id) {
    return 'User ss'.$id;
});

Route::get('users/huy', function () {
  //$data = News::orderBy('views','desc')->take(3)->get();
  $id = NewsType::where('slug_newtype','tin-the-thao')->first('id')->id;  
 
  $data = News::where('newstype_id',$id)->orderBy('views','desc')->take(3)->get();
  
  dd($data);
});


Route::get('getdata', function () {
  $data_ = News::where('id',14)->with(['newstype'=>function($query){
    $query->select('id','nametype');
}])->get()->toArray();
$data = News::where('id',14)->with(['newstype'])->select('id')->toSql();//->toArray();
  dd($data);
  /*
    $data = App\News::all()->toArray();
    $dataNews = App\NewsType::find(2)->news->toArray();
    if($dataNews!= null)
    {
        echo "k rong";
    }
    else {
        echo "rong";
    }
    //dd($dataNews);*/
});
 Route::group(['namespace' => 'Admin', 'prefix'=>'admin'], function(){


//AUTH
 Route::get('login','AuthController@getLogin')->name('admin.getlogin');
 Route::post('login','AuthController@postLogin')->name('admin.postlogin');
 Route::get('register','AuthController@getRegister')->name('admin.getregister');
 Route::post('register','AuthController@postRegister')->name('admin.postregister'); 
 Route::get('logout','AuthController@logout')->name('admin.logout'); 

 Route::group(['middleware' => 'CheckLogin'], function () {
 //NEWSTYPE
 Route::get('/','HomeController@index')->name('admin.index'); 
 Route::get('trang-chu-admin','HomeController@index')->name('admin.index');  
 Route::get('postcreate','NewsTypeController@postcreate')->name('admin.newstype.postcreate');   
 Route::get('createnewstype','NewsTypeController@getcreate')->name('admin.newstype.getcreate');
 Route::get('lay-danh-sach-loai-tin','NewsTypeController@list')->name('admin.newstype.list');
 Route::get('detelenewstype','NewsTypeController@detele')->name('admin.newstype.detele');
// 
//NEWS
 Route::get('them-tin-tuc','NewsController@createNews')->name('admin.news.get_add_news'); 
 Route::post('createnews','NewsController@storeNews')->name('admin.news.post_add_news'); 
 Route::get('listnews','NewsController@list')->name('admin.news.list'); 
 Route::get('tim-tin','NewsController@searchNews')->name('admin.searchNews'); 
 Route::get('updatenews','NewsController@get_updateNews')->name('admin.news.get_updatenews');  
 Route::post('updatenews','NewsController@post_updateNews')->name('admin.news.post_updatenews');
 Route::get('deletenews','NewsController@deleteNews')->name('admin.news.deletenews');
 Route::get('restorenews','NewsController@restoreNews')->name('admin.news.restorenews');
 //
 //DOCUMENTS TYPE 
 Route::get('createdocmmentstype','DocumentsTypeController@createDocumentsType')->name('admin.documentstype.get_add_documentstype'); 
 Route::post('createdocmmentstype','DocumentsTypeController@storeDocumentsType')->name('admin.documentstype.post_add_documentstype'); 
 Route::get('listdocmmentstype','DocumentsTypeController@list')->name('admin.documentstype.list'); 
 //
 //DOCUMENTS
 Route::get('them-tai-lieu','DocumentsController@createDocuments')->name('admin.documents.get_add_documents'); 
 Route::post('createdocmments','DocumentsController@storeDocuments')->name('admin.documentst.post_add_documents'); 
 Route::get('danh-sach-tai-lieu','DocumentsController@list')->name('admin.documents.list'); 
 Route::get('deletedocument','DocumentsController@deleteDocuments')->name('admin.documents.delete'); 
 Route::get('restoredocument','DocumentsController@restoreDocuments')->name('admin.documents.restore');
 //
//FEEDBACKS
Route::get('xem-phan-hoi','FeedBackController@list')->name('admin.feedbacks.list'); 
Route::get('confirmfeedback','FeedBackController@confirmFeedback')->name('admin.feedback.confirm'); 



//INTRODUCES
 Route::get('them-gioi-thieu','IntroduceController@createIntroduce')->name('admin.introduces.get_add_introduces'); 
 Route::post('createintroduce','IntroduceController@storeIntroduce')->name('admin.introduces.post_add_introduces'); 
 Route::get('danh-sach-gioi-thieu','IntroduceController@list')->name('admin.introduces.list'); 
 Route::get('updateintroduce','IntroduceController@getIntroduce')->name('admin.introduces.getupdate'); 
 Route::post('updateintroduce','IntroduceController@updateIntroduce')->name('admin.introduces.updateintroduce'); 
// Route::get('deletedocument','DocumentsController@deleteDocuments')->name('admin.documents.delete'); 
// Route::get('restoredocument','DocumentsController@restoreDocuments')->name('admin.documents.restore');
});

});


//WEBSITE
Route::group(['namespace' => 'Website'], function(){

//Route::get('lien-he','PageController@getListNews'); 
Route::get('lien-he',function(){
    return view('website.contact.contact');
})->name('website.feedback');
Route::get('tim-kiem','PageController@seachPage');
Route::post('createfeedback','PageController@createFeedback')->name('website.post_createfeedback');
Route::get('tim-kiem-','PageController@getListNews')->name('admin.12'); 
Route::get('gioi-thieu','PageController@getAllIntroduces')->name('website.all_introduce'); 

Route::get('gioi-thieu/{slug_introduce}','PageController@getIntroduces')->name('website.introduce'); 
Route::get('tin-tuc','PageController@getListNews')->name('website.news'); 
Route::get('thu-vien','PageController@getLibrarys')->name('website.library');
Route::get('thu-vien/tai-lieu/{slug_document}','PageController@getLinks')->name('website.library3'); 
Route::get('thu-vien/{slug_documentType}','PageController@getDocumentsByType')->name('website.library4'); 
///Route::get('hinh-anh','PageController@getListNews')->name('website.photos'); 

Route::get('trang-chu','PageController@home')->name('website.home');

Route::get('{slug_newstype}','PageController@getListNews')->name('admin.1'); 
Route::get('{slug_newstype}/{slug_description}','PageController@getNews')->name('admin.2'); 

});


/*
Route::get('/{i2}/{id}', function ($i2,$id) {
    dd('thu 1 - '.$id.$i2);
});

Route::get('{i2}', function ($i2) {
    dd('thu 2 - '.$i2);
});
*/
