@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h2>
                    Latest Listings
                </h2>
            </div>
            <div class="card-body">
                @if (count($listings))
                    <ul class="list-group">
                        @foreach ($listings as $listing )
                        <li class="list-group-item"><a href="listings/{{$listing->id}}">{{$listing->name}}</a></li>
                        @endforeach
                    </ul>
                @else

                @endif
            </div>
        </div>
    </div>

@endsection
