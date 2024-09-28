<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable=([
        'id','name','description','page','year_written','year_published','image'
    ]);
    public function author(){
        return $this->belongsToMany(Author::class,'author_book','book_id','author_id');
    }
    public function genre(){
        return $this->belongsToMany(Genre::class,'book_genre','book_id','genre_id');
    }
    public function borrow(){
        return $this->hasMany(Borrow::class);
    }
}
