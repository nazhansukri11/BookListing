@extends('layout.main')


@section('content')

<div class="row mt-5">
    <div class="col">
    <a href="{{route('book-listing')}}">Back To Book Listing</a>
    <h4>Edit Book</h4>

   
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{$book->title}}">
  </div>

  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="text" class="form-control" id="title" name="price" value="{{$book->price}}">
  </div>

  <div class="mb-3">
    <label for="synopsis" class="form-label">Synopsis</label>
    <textarea name="synopsis" id="synopsis" class="form-control" rows="10" value="{{$book->synopsis}}"></textarea>
  </div>

  <button class="btn btn-primary">SAVE</button>


    </div>
</div>

@endsection