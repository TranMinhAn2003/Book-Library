<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(){
        return view('register.step1');
    }
    public function registerStore1(Request $request){
        $request->validate([
            'email' => 'required|unique:users,email',
            'password'=>'required|string|min:8',
            're_password'=>'required|string|same:password',
        ]);
        session([
           'email'=>$request->input('email'),
           'password'=>Hash::make($request->input('password')),

        ]);
        return redirect()->route('register.step2');
    }
    public function register2(){
        return view('register.step2');
    }
    public function registerStore2(Request $request)
    {
        $token=strtoupper(Str::random(10));
        $gender=$request->input('gender');
        if(isset($gender)){
            switch ($gender){
                case '1':
                    $gender='Nam';
                    break;
                case '2':
                    $gender='Nữ';
                    break;
            }
        }
        $request->validate([
            'name' => 'required',
            'gender'=>'required',
            'phone'=>'required',
            'birthday'=>'required',
            'address'=>'required',
        ]);
        $user=User::create([

            'name'=>$request->input('name'),
            'email'=>session('email'),
            'phone'=>$request->input('phone'),
            'gender'=>$gender,
            'birthday'=>$request->input('birthday'),
            'address'=>$request->input('address'),
            'password'=>session('password'),
            'token'=>$token
        ]);
        session()->forget(['email','password']);
        if($user){
            Mail::send('email.accept_register',compact('user'),function($email) use($user){
               $email->subject('Book History - Xác nhận tài khoản');
               $email->to($user->email,$user->name);
            });
            auth()->login($user);
            flash()->success( 'Xác nhận đã được gửi đến mail của bạn. Vui lòng xác nhận tài khoản');
            return redirect()->route('login');
        }
        else{
       flash()->error( 'Đăng ký tài khoản thất bại. Vui lòng thử lai');
            return redirect()->route('register.step1');
        }

    }
    public function active(User $user,$token){
    if($user->token===$token){
        $user->update(['status'=>1,'token'=>null]);
        flash()->success( 'Xác nhận thành công');
        return redirect()->route('login');
    }else{
    flash()->error('Xác nhận không thành. Vui lòng thử lai');
        return redirect()->route('login');
    }
    }
}
