@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h3>Create Listing</h3>
        </div>
        <div class="card-body">


            <form action="{{route('listings.store')}}" method="POST">
                {{--  @include('inc.messages')  --}}
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="company name">
                </div>
                <div class="form-group">
                    <label for="name">Email:</label>
                    <input type="email" name="email" id="" class="form-control" placeholder="company email">
                </div>
                <div class="form-group">
                    <label for="name">Website:</label>
                    <input type="text" name="website" id="" class="form-control" placeholder="company website">
                </div>
                <div class="form-group">
                    <label for="name">Address:</label>
                    <input type="text" name="address" id="" class="form-control" placeholder="company address">
                </div>
                <div class="form-group">
                    <label for="name">Phone Number:</label>
                    <input type="tel" name="phoneNumber" id="" class="form-control" placeholder="company Phone Number">
                </div>
                <div class="form-group">
                    <label for="name">Bio:</label>
                    <textarea name="bio" id="" cols="30" class="form-control" rows="5" placeholder="company Bio"></textarea>
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
