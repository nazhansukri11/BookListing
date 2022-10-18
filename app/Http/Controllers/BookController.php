<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
public function index(){
    $books=Book::select(['id','title','price'])->paginate(10);
    return view('book.listing',[
        'books'=>$books
    ]);
}
    public function edit($id){
        $book=Book::find($id);
        echo "BOOK EDIT FROM HERE";
    }

    public function show($id){
        $book=Book::find($id);
        return view('book.single',['book'=>$book]);

        //dd($book);

        // echo "<strong>Title</strong>:".$book->title."<br>";
        // echo "<strong>Price</strong>: RM ".$book->price."<br>";
        // echo "<strong>Synopsis</strong>:".nl2br($book->synopsis)."<br>";
    }
}
