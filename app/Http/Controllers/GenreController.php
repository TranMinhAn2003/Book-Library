<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
        $genre=Genre::all();
        $template='genre.index';
        return view('dashboard.index',compact('template','genre'));
    }
    public function create(){
        $template='genre.create';
        return view('dashboard.index',compact('template'));
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
        ]);
        $genre=Genre::create(['name'=>$request->input('name')]);
        return redirect()->route('genre.index');
    }
    public function edit($id){
        $genre=Genre::find($id);
        $template='genre.edit';
        return view('dashboard.index',compact('template','genre'));
    }
    public function update($id,Request $request){
        $genre=Genre::find($id);
        $genre->update(['name'=>$request->input('name')]);
        if($genre){
            flash()->success('Cập nhật thành công');
            return redirect()->route('genre.index');
        }else{
            flash()->error('Cập nhật thất bại');
            return redirect()->route('genre.edit');
        }
    }
    public function destroy($id)
    {
        $genres=Genre::find($id);
        $genres->delete();
        if($genres){
            flash()->success('Xóa thành công');
            return redirect()->route('genre.index');
        }else{
            flash()->error('Xóa thất bại');
            return redirect()->route('genre.index');
        }
    }
}
