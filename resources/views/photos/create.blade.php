@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2">
              <div class="card">
            <div class="card-header text-center">
                <h2>Upload Photo</h2>
            </div>
            <div class="card-body">
                <form action="{{route('photos.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Title:</label>
                        <input type="text" name="title" id="" class="form-control" placeholder="photo  title">
                    </div>
                    <div class="form-group">
                        <label for="name">Description:</label>
                        <textarea name="description" id="" class="form-control" cols="30" placeholder="photo Description" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">Image:</label>
                        <input type="file" name="photo" id="" class="form-control" placeholder="photo">
                    </div>
                    <input type="hidden" name="album_id" value="{{$album_id}}">
                    {{ csrf_field() }}
                    <input type="submit" value="Create" class="btn btn-success">
                    <a href="/albums/{{$album_id}}" class="btn btn-primary">Back To Photos</a>
                </form>
            </div>
        </div>
        </div>

    </div>
@endsection
