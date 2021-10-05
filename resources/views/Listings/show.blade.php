@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
    <div class="card-header text-center">
        <h3>Edit Listing</h3>
    </div>
    <div class="card-body">
        <form action="{{route('listings.update', $listing->id)}}" method="POST">
            {{--  @include('inc.messages')  --}}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="" disabled value="{{$listing->name}}" class="form-control" placeholder="company name">
            </div>
            <div class="form-group">
                <label for="name">Email:</label>
                <input type="email" name="email" disabled id="" value="{{$listing->email}}" class="form-control" placeholder="company email">
            </div>
            <div class="form-group">
                <label for="name">Website:</label>
                <input type="text" name="website" disabled id="" value="{{$listing->website}}" class="form-control" placeholder="company website">
            </div>
            <div class="form-group">
                <label for="name">Address:</label>
                <input type="text" name="address" disabled id="" value="{{$listing->address}}" class="form-control" placeholder="company address">
            </div>
            <div class="form-group">
                <label for="name">Phone Number:</label>
                <input type="tel" name="phoneNumber" disabled value="{{$listing->phoneNumber}}" id="" class="form-control" placeholder="company Phone Number">
            </div>
            <div class="form-group">
                <label for="name">Bio:</label>
                <textarea name="bio" id="" cols="30" disabled  class="form-control" rows="5" placeholder="company Bio">{{$listing->bio}}</textarea>
            </div>
            <a href="/" class="btn btn-primary">Go Back</a>
        </form>
    </div>
</div>
</div>
@endsection
