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
        
        return view('book.edit',[
            'book'=>$book
            
        ]);
    }

    public function update(Request $request,$id){
        $book=Book::findOrFail($id);
        $book->title=$request->title;
        $book->price=$request->price;
        $book->synopsis=$request->synopsis;

        $book->save();
        return back()->with('success','Book has been updated');
        // dd($request);
    }

    public function show($id){
        $book=Book::findOrFail($id);
        return view('book.single',['book'=>$book]);

        //dd($book);

        // echo "<strong>Title</strong>:".$book->title."<br>";
        // echo "<strong>Price</strong>: RM ".$book->price."<br>";
        // echo "<strong>Synopsis</strong>:".nl2br($book->synopsis)."<br>";
    }
}
