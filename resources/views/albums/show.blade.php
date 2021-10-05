@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h3>{{$album->name}}</h3>
        </div>
        <div class="card-body">
             <a href="/albums" class="btn btn-default">Go Back</a>
            <a href="/photos/create/{{$album->id}}" class="btn btn-primary">Upload Photos</a>
            <hr>
            <div class="row">
                @if(count($album->photos ) > 0)
                @foreach ($album->photos as $photo)
                <a href="/photos/{{$photo->id}}">
                    <div class="col-md-4">
                        <img style="height: 250px" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" class="img-thumbnail" alt="{{$photo->title}}">
                    </div>
                </a>

                @endforeach
                @else
                <h3 class="text-center">No Image in the Album</h3>
                @endif


            </div>

        </div>

    </div>
</div>
@endsection
