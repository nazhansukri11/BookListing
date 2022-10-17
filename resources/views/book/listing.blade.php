@extends('layout.main')


@section('content')

    <div class="row mt-5 mb-5">
        <div class="col">
            <h3>Book Listing</h3>
            <table class="table">
                <thead class="tr">
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>PRICE</th>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$books->links()}}

        </div>
    </div>
@endsection