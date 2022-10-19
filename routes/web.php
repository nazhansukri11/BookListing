<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// //redirect
// Route::redirect('/home','/');

// //view
// Route::view('/nazhan','pelajar',
//     [
//         'nama'=>'nazhankacak'
//     ]
// );

// //controller
// Route::get('jadual',[JadualController::class,'index']);

//model binding
// Route::get('/teacher/{teacher}
// function(Teacher $teacher){
//     echo $teacher->name;
// }
// );

// Route::get('/clear',[UserController::class],'show');

Route::resource('user',UserController::class);

//BOOKS CONTROLLER

Route::get('/book/create',[BookController::class,'create'])->name('book-create');

Route::get('/book/{id}',[BookController::class,'show'])->name('book-single');

Route::get('/book/{id}/edit',[BookController::class,'edit'])->name('book-edit');

Route::post('/book/{id}',[BookController::class,'update'])->name('book-update');

Route::get('/books',[BookController::class,'index'])->name('book-listing');

Route::post('/book',[BookController::class,'store'])->name('book-store');
