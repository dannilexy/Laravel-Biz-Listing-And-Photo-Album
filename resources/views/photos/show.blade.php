@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ $photo->title}}</h3>
    <p>{{ $photo->description}}</p>
    <a href="/albums/{{ $photo->album_id}}" class="btn btn-default">Back To Album</a>
    <hr>
    <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" class="img-thumbnail float-center" alt="{{$photo->name}}">
    <hr>
    <form action="{{route('photos.destroy',$photo->id)}}" method="POST">
        <input type="hidden" name="_method" value="Delete">
        <input type="hidden" name="id" value="{{$photo->id}}">
        {{ csrf_field() }}
        <input type="submit" value="Delete" class="btn btn-danger"><br>
        <small>Size: {{$photo->size}}</small>
    </form>
</div>
@endsection
