@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h2>Photo Albums</h2>
            </div>
            <div class="card-body">
                <a href="/albums/create" class="btn btn-default">Create Albums</a> <br><br>
                <div class="row">
                @foreach ($albums as $album)


                        <div class="col-md-4">
                            <a href="/albums/{{$album->id}}">
                            <img style="height: 300px" src="storage/album_covers/{{$album->cover_image}}" class="img-thumbnail" alt="Cinque Terre">
                                <h4 class="">{{$album->name}}</h4>
                            </a>
                            </div>


                 @endforeach
                </div>


            </div>
        </div>
    </div>
@endsection
