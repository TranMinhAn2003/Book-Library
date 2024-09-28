<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        $author=Author::paginate(10);
        $template='author.index';
        return view('dashboard.index',compact('template','author'));
    }
    public function create(){
        $template='author.create';
        return view('dashboard.index',compact('template'));
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'gender'=>'required'
        ]);
        $date_of_birthday=Carbon::parse($request->input('date_of_birthday'))->format('Y-m-d');
        $profile_picture=$request->file('profile_picture');
        $path = $profile_picture->store('profile_picture', 'public');
        $gender=$request->input('gender');
        if (isset($gender)) {
            switch ($gender) {
                case '0':
                    $gender = 'Nam';
                    break;
                case '1':
                    $gender = 'Nữ';
                    break;

            }
        }

        $author=Author::create([
           'name'=>$request->input('name'),
            'date_of_birth'=>$date_of_birthday,
            'nationality'=>$request->input('nationality'),
            'biography'=>$request->input('biography'),
            'gender'=>$gender,
            'profile_picture'=>$path,
            ]);
        if($author){
            flash()->success('Thêm thành công');
            return redirect()->route('author.index');
        }else{
            flash()->error('Thêm không thành công');
            return redirect()->route('author.create');
        }
    }
    public function edit($id){
        $author=Author::find($id);
        $template='author.edit';
        return view('dashboard.index',compact('template','author'));
    }
    public function update(Request $request,$id){
        $author=Author::find($id);
        if ($request->file('profile_picture')) {
            $profile_picture = $request->file('profile_picture');
            $path = $profile_picture->store('profile_picture', 'public');
        } else {
            $profile_picture = $author->profile_picture;
            $path = $profile_picture;
        }

        $date_of_birthday=Carbon::parse($request->input('date_of_birthday'))->format('Y-m-d');
        $gender=$request->input('gender');
        if (isset($gender)) {
            switch ($gender) {
                case '0':
                    $gender = 'Nam';
                    break;
                case '1':
                    $gender = 'Nữ';
                    break;
            }
        }
        $author->update([
            'name'=>$request->input('name'),
            'date_of_birth'=>$date_of_birthday,
            'nationality'=>$request->input('nationality'),
            'biography'=>$request->input('biography'),
            'gender'=>$gender,
            'profile_picture'=>$path,
        ]);
        return redirect()->route('author.index');
    }
    public function destroy($id){
        $author=Author::find($id);
        $author->delete();
        return redirect()->route('author.index');
    }
}
