<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login.login');
    }
    public function loginProcess(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
       $login=([
           'email'=>$request->input('email'),
           'password'=>$request->input('password'),
       ]);
       if(Auth::attempt($login)){
           $user=Auth::user();
           if($user->status==1){
               flash()->success('Đăng nhập thành công');
               return redirect()->route('book.index');
           }else{
               flash()->error('Tài khoản bằng email này đã đăng ký, vui lòng kích hoạt tài khoản');
               return redirect()->route('login');
           }
       }else{
           return redirect()->route('login')->withErrors([
               'email'=>'Email hoặc mật khẩu không đúng'
           ]);
       }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('book.index');
    }
}
