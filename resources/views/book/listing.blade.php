@extends('layout.main')


@section('content')

    <div class="row mt-5 mb-5">
        <div class="col">


            <h3>Book Listing</h3>

            <a href="{{route('book-create')}}" class="btn btn-primary">Add new book</a>
            <table class="table">
                <thead class="tr">
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>PRICE</th>
                    <th>ACTION</th>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{$book->id}}</td>

                        <td>
                            <a href="{{route('book-single',$book->id)}}">
                            {{$book->title}}
                        
                            </a>
                        </td>

                        <td>RM {{$book->price}}</td>
                        <th><a class="btn btn-sm btn-primary" href="{{route('book-edit',$book->id)}}">EDIT</a></th>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$books->links()}}

        </div>
    </div>
@endsection