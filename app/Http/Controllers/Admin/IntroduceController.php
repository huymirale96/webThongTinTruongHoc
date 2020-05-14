<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\NewIntroduce;
use Illuminate\Support\Str;
use App\Introduces;
use App\Account;

class IntroduceController extends Controller
{
    //
    public function createIntroduce()
    {
        return view('admin.introduce.create');
    }

    public function list()
    {
        $introduces = Introduces::with('Account')->get();
       // dd($introduces);
        return view('admin.introduce.list',['introduces' => $introduces ]);
    }

    public function storeIntroduce(NewIntroduce $request)
    {
        $introduces = new Introduces();
        $introduces -> description = $request->descriptionIntroduce;
        $introduces -> slug_description = Str::slug($request->descriptionIntroduce);
        $introduces -> content = $request->contentIntroduce;
        $introduces -> account_id =  1;
        $introduces -> save();

        return redirect()->route('admin.introduces.list')->with('success','Tạo Thành Công');        
    }

}
