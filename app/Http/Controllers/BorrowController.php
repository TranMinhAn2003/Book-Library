<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BorrowController extends Controller
{
    public function add($id){
     $book=Book::with('author','genre')->find($id);
     $user=Auth::user();
     $template='borrow.borrow';
     return view('dashboard.index',compact('template','book','user'));
    }
    public function store(Request $request){
        $borrow=Borrow::create([
            'user_id'=>Auth::id(),
            'book_id'=>$request->book_id,
            'borrowed_at'=>$request->borrowed_at,
            'due_date'=>$request->due_date,
        ]);
        if($borrow){
            Mail::send('email.borrow',compact('borrow'),function($message) use($borrow){
                $message->subject('Book Library - Muợn sách');
                $message->to($borrow->user->email,$borrow->user->name);
            });
        }
        flash()->success('Đã mượn sách thành công');
        return redirect()->route('book.index');
    }
}
