<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
public function index(){
    $books=Book::select(['id','title','price','author_id'])->paginate(10);
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

        $validated_data=$request->validate([
            'title'=>'required|min:5|max:255',
            'price'=>'required|numeric',
            'synopsis'=>'required|min:20|max:1000'
        ]);

        $book->title=$request->title;
        $book->price=$request->price;
        $book->synopsis=$request->synopsis;

        $book->save();
        return back()->with('success','Book has been updated');
        // dd($request);
    }

    public function create(){
        return view('book.create');
    }

    public function store(Request $request){
        $validated_data=$request->validate([
            'title'=>'required|min:5|max:255',
            'price'=>'required|numeric',
            'synopsis'=>'required|min:20|max:1000'
        ]);
        // dd($request);
        $book=Book::create($validated_data);
        return redirect()->route('book-listing')->with('success','You book has been added');
    }

    public function destroy($id){
        $book=Book::findOrFail($id);
        $book->delete();
    
    return redirect()->route('book-listing')->with('success','You book has been deleted');
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
