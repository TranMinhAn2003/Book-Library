<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StatusController;
use App\Http\Middleware\CheckLoginMiddleware;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'register'], function () {
    Route::get('',[RegisterController::class,'register'])->name('register.step1');
    Route::post('storeStep1',[RegisterController::class,'registerStore1'])->name('register.store1');
    Route::get('step2',[RegisterController::class,'register2'])->name('register.step2');
    Route::post('storeStep2',[RegisterController::class,'registerStore2'])->name('register.store2');
});
Route::get('/active/{user}/{token}',[RegisterController::class,'active'])->name('register.active');
Route::get('login',[LoginController::class,'login'])->name('login');
Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::post('login/process',[LoginController::class,'loginProcess'])->name('login.process');
Route::get('',[HomeController::class,'home'])->name('home');

Route::group(['prefix'=>'genre'],function(){
    Route::get('index',[GenreController::class,'index'])->name('genre.index');
    Route::get('create',[GenreController::class,'create'])->name('genre.create');
    Route::post('store',[GenreController::class,'store'])->name('genre.store');
    Route::get('edit/{id}',[GenreController::class,'edit'])->name('genre.edit');
    Route::put('update/{id}',[GenreController::class,'update'])->name('genre.update');
    Route::delete('destroy/{id}',[GenreController::class,'destroy'])->name('genre.destroy');
});
Route::group(['prefix'=>'author'],function(){
   Route::get('index',[AuthorController::class,'index'])->name('author.index');
   Route::get('create',[AuthorController::class,'create'])->name('author.create');
   Route::post('store',[AuthorController::class,'store'])->name('author.store');
   Route::get('edit/{id}',[AuthorController::class,'edit'])->name('author.edit');
   Route::put('update/{id}',[AuthorController::class,'update'])->name('author.update');
   Route::delete('destroy/{id}',[AuthorController::class,'destroy'])->name('author.destroy');
});
Route::get('',[BookController::class,'index'])->name('book.index');
Route::group(['prefix'=>'book'],function(){

   Route::get('create',[BookController::class,'create'])->name('book.create');
   Route::post('store',[BookController::class,'store'])->name('book.store');
   Route::get('edit/{id}',[BookController::class,'edit'])->name('book.edit');
   Route::get('show/{id}',[BookController::class,'show'])->name('book.show');
   Route::put('update/{id}',[BookController::class,'update'])->name('book.update');
   Route::delete('destroy/{id}',[BookController::class,'destroy'])->name('book.destroy');
});
Route::group(['prefix'=>'borrow'],function(){
    Route::get('add/{id}',[BorrowController::class,'add'])->name('borrow.add')->middleware(CheckLoginMiddleware::class);  ;
    Route::post('store',[BorrowController::class,'store'])->name('borrow.store');
});
Route::group(['prefix'=>'status'],function(){
   Route::get('index',[StatusController::class,'index'])->name('status.index');
    Route::post('accept/{id}',[StatusController::class,'accept'])->name('status.accept');
});
