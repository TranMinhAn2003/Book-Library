<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(){
        if(Auth::check() ){
            $user=Auth::user();
            $template='user.index';
            return view('dashboard.index',compact('template','user'));
        }
        redirect()->route('login');
    }
    public function edit($id){
        $user=User::find($id);
        $template='user.update';
        return view('dashboard.index',compact('template','user'));
    }
    public function update($id,Request $request){
        $user=User::find($id);
        $user->update($request->all());
       return redirect()->route('user.profile',$user->id);
    }
    public function borrow($id){
        $books=Borrow::with('book','user')->where('user_id',$id)->get();
        $template='user.user_borrow';
        return view('dashboard.index',compact('template','books'));
    }
    public function return($id){
        $borrow=Borrow::find($id);
        if($borrow->status==0){
            $borrow->status = 1;
            $borrow->returned_at = Carbon::now();
        }else{
            $borrow->status = 0;
            $borrow->returned_at = null;
        }
        $borrow->save();
        return redirect()->route('user.borrow',$borrow->user_id);

    }




}
