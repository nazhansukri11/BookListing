@extends('layout.main')


@section('content')

    <div class="row mt-5 mb-5">
        <div class="col">
            @if(session('success'))
            <p class="alert alert-success">{{session('success')}}</p>
            @endif

            <h3>Book Listing</h3>

            <a href="{{route('book-create')}}" class="btn btn-primary">Add new book</a>
            <table class="table">
                <thead class="tr">
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>AUTHOR</th>
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
                        <td>John Doe</td>
                        <td>RM {{$book->price}}</td>
                        <td>
                        <a class="btn btn-sm btn-primary" href="{{route('book-edit',$book->id)}}">EDIT</a>
                        <form action="{{route('book-destroy',$book->id)}}" method="POST" 
                        class="d-inline"
                        onsubmit="return confirm('Are you sure you want to delte book titled {{$book->title}}')">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit">DELETE</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$books->links()}}

        </div>
    </div>
@endsection