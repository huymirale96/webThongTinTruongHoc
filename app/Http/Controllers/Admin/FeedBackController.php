<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\FeedBacks;
use App\Account;
use DB;

class FeedBackController extends Controller
{
    //
    public function list()
    {
        $feedBacks = FeedBacks::with('account')->orderBy('created_at','DESC')->get();
       
        return view('admin.feedbacks.list',[ 'feedBacks' => $feedBacks] );
    }

    public function confirmFeedback(Request $request)
    {
        //FeedBacks::find($request->id)->delete();
        FeedBacks::where('id',$request->id)->update(['account_id' => Auth::guard('account')->user()->id,'status'=> 1]);
        return back()->with('success','Xác Nhận Thành Công');
    }
}
