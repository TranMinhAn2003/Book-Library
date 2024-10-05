<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $books=Borrow::with('user','book','book.author')->paginate(20);
        $template='status.index';
        return view('dashboard.index',compact('template','books'));
    }
    public function accept($id){
        $borrow=Borrow::find($id);
        if($borrow->status==0){
            $borrow->status = 1;
            flash()->success('Đã trả sách');
        }elseif($borrow->status==1){
            $borrow->status = 2;
            flash()->success('Xác nhận trả');
        }
        $borrow->save();

        return redirect()->route('status.index');
    }
}
