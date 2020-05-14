<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\RegisterAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Account;

class AuthController extends Controller
{
    //

    public function getLogin()
    {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
            //echo $request->userName.'  '. $request->remember_;
            $remember = null;
            if( $request->remember_ === 'on')
            {
                $remember = true;
            }
            else{
                $remember = false;
            }
           // dd($remember);
            $arr = [
                'username' => $request->userName,
                'password' => $request->passWord,
            ];
            if(Auth::guard('account')->attempt($arr,$remember)) //Auth::guard('account')->user()->email;
            {
               return redirect()->route('admin.index');
            }
            else{
               /// return redirect()->route('admin.getlogin')->with('error', 'Thông Tin Không Đúng.');  gionh nhau
               return back()->with('error', 'Thông Tin Không Đúng.');
            }

    }
    public function getRegister()
    {
        return view('admin.auth.register');
    }
    public function postRegister(RegisterAdmin $request)
    {
            $account = new Account();
            $account-> fullname = $request-> fullName;
            $account-> email = $request->email;
            $account-> phone= $request-> numberPhone;
            $account-> username = $request-> userName;
            $account-> password = Hash::make($request-> passWord);
            $account->save();
            return redirect()->route('admin.getlogin')->with("success","Tạo Tài Khoản Thành Công");

    }

    public function logout()
    {
        Auth::guard('account')->logout();
        return redirect()->route('admin.getlogin')->with("success","Đã Đăng Xuất");
    }
}
