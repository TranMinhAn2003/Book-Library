<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable=([
        'id','name','date_of_birth','nationality','biography','gender','profile_picture'
    ]);
    public function books(){
        return $this->belongsToMany(Book::class,'author_book','author_id','book_id');
    }
}
