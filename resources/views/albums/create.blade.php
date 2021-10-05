@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2">
              <div class="card">
            <div class="card-header text-center">
                <h2>Create Albums</h2>
            </div>
            <div class="card-body">
                <form action="{{route('albums.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="" class="form-control" placeholder="Album name">
                    </div>
                    <div class="form-group">
                        <label for="name">Description:</label>
                        <textarea name="description" id="" class="form-control" cols="30" placeholder="Album Description" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">Cover_Image:</label>
                        <input type="file" name="cover_image" id="" class="form-control" placeholder="Album Cover_Photo">
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" value="Create" class="btn btn-success">
                    <a href="/albums" class="btn btn-primary">Back To Albums</a>
                </form>
            </div>
        </div>
        </div>

    </div>
@endsection
