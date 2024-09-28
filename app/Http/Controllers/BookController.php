<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $template='book.index';
        $books=Book::with('author','genre')->paginate(10);
        return view('dashboard.index',compact('template','books'));

    }
    public function create()
    {
        $genre=Genre::all();
        $authors = Author::all(); // Hoặc phương thức nào đó để lấy danh sách tác giả

        $template='book.create';
        return view('dashboard.index',compact('template','authors','genre'));
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'author'=>'required',
        ]);
        $image=$request->file('image');
        $path = $image->store('book', 'public');
        $book=Book::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'page'=>$request->input('page'),
            'year_written'=>$request->input('year_written'),
            'year_published'=>$request->input('year_published'),
            'image'=>$path,

        ]);
        $authors = $request->input('author', []);
        $genre=$request->input('genre', []);
        if (!empty($genre)) {
            $book->genre()->attach($genre);
        }

        if (!empty($authors)) {
            $book->author()->attach($authors);
        }
        if($book){
            flash()->success('Them sach thanh cong');
            return redirect()->route('book.index');
        }else{
            flash()->error('Them sach that bai');
            return redirect()->route('book.create');
        }
    }
    public function show($id){
        $book=Book::with('author','genre')->find($id);
        $randomBook=Book::with('author','genre')->inRandomOrder()->limit(5)->get();
        $template='book.show';
        return view('dashboard.index',compact('template','book','randomBook'));
    }
}
