@extends('layouts.app')

@section('content')
    @forelse($listings as $listing)
        @include('listings.partials._favorite_listing', compact('listing'))
    @empty
        <p>There are currently no favorite listings</p>
    @endforelse

    {{$listings->links()}}
@endsection