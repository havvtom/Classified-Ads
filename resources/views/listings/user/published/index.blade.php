@extends('layouts.app')

@section('content')
    @forelse($listings as $listing)
        @include('listings.partials._listing_own', compact('listing'))
    @empty
        <p>There are currently no viewed unpublished listings</p>
    @endforelse

@endsection