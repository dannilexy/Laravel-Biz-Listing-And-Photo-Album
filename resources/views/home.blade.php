@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>User Listings</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a class="btn btn-primary" href="listings/create">create Listing</a> </br> <br>
                        <div class="row">
                            <table class="table table-strip">
                                <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                @if(count($listings) > 0)
                                @foreach ($listings as $listing)
                                <tr>
                                    <td>{{$listing->name}}</td>
                                    <td><a href="/listings/{{$listing->id}}/edit" class="btn btn-warning">Edit</a></td>
                                    <td>
                                        <form action="{{route('listings.destroy', $listing->id)}}" method="post">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                    <td>No Listings to display</td>
                                @endif

                                </tbody>


                            </table>
                        </div>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
