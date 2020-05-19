@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Continue Editing
                    @if($listing->live())
                        <span class="float-right"><a href="{{ route('listing.show', [$area, $listing]) }}">Go to listing</a></span>
                    @endif
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('listing.update',[$area, $listing]) }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            @include('listings.partials.forms._areas')
                            @include('listings.partials.forms._categories')
                            <label for="name">Title</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $listing->title ?: old('title') }}" autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">Listing</label>
                            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" cols="30" rows="5">
                                {{$listing->body ?: old('body')}}
                            </textarea>
                            @error('body')
                                <span class="invalid-feedback" role="alert"> 
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-secondary">
                            Update
                        </button>

                        @if(!$listing->live()) 
                            <button name="payment" type="submit" value="true" class="btn btn-primary float-right">
                                Continue to payment
                            </button>
                        @endif                          

                        @if($listing->live())
                            <input type="hidden" name="category_id" value="{{$listing->category_id}}">
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
