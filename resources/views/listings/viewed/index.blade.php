@extends('layouts.app')

@section('content')
	<p>Showing {{$index}} last viewed listings</p>
    @forelse($listings as $listing)
        @include('listings.partials._listing', compact('listing'))
    @empty
        <p>There are currently no viewed listings</p>
    @endforelse

@endsection