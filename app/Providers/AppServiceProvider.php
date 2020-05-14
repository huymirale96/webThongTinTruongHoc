<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\News;
use App\NewsType;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::share('key123', '');
        $data1 = '23232sa';

        //$newsLastests = News::orderBy('created_at', 'desc')->take(6)->get();
        $newsNotifications = News::where('newstype_id',NewsType::where('slug_newtype','thong-bao')->first('id')->id)->orderBy('views','desc')->take(6)->select('description','slug_description','urlimage','content')->get();
        $newsLinksToOrtherWebsites = News::where('newstype_id',NewsType::where('slug_newtype','lien-ket-website')->first('id')->id)->orderBy('views','desc')->take(6)->select('description','slug_description','urlimage','content')->get();
        $newsLastests = DB::table('news')->join('newstypes','news.newstype_id','newstypes.id')->orderBy('news.created_at','desc')->limit(6)->get(); 
        //$newsNotifications = NewsType::find(2)->news()->orderBy('created_at','desc')->get(['id','description','slug_description']);
        $newsNotifications_ = DB::table('news')->join('newstypes','news.newstype_id','newstypes.id')->where('newstypes.id',2)->orderBy('news.created_at','desc')->limit(6)->get(); 
        $newsLinksToOrtherWebsites_ = DB::table('news')->join('newstypes','news.newstype_id','newstypes.id')->where('newstypes.id',1)->orderBy('news.created_at','desc')->limit(6)->get(); 
       // $newsLinksToOrtherWebsites = NewsType::find(1)->news()->orderBy('created_at','desc')->get(['id','description','slug_description']);
        View::composer(['admin.news.*','admin.newstype.*','website.*'], function($view) use ($data1, $newsLastests, $newsNotifications,$newsLinksToOrtherWebsites ) {
          // dd();
          //  $view->with('test1', $data1);
          $view->with(['test1'=> $data1, 'newsLastests'=>$newsLastests,'newsNotifications'=>$newsNotifications,'newsLinksToOrtherWebsites'=>$newsLinksToOrtherWebsites]);
        });
    }
}
