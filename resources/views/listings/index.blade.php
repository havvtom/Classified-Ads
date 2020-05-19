@extends('layouts.app')

@section('content')

	@include('listings.partials._search')
    <h5>{{$category->parent->name}} &nbsp; > &nbsp; {{$category->name}}</h5>
    <hr>
    @forelse($listings as $listing)
        @include('listings.partials._listing', compact('listing'))

        {{ $listings->links() }}
    @empty
        <p>There are currently no listings</p>
    @endforelse
@endsection

