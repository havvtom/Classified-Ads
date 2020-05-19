@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Listing</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('listing.store', $area) }}">
                        @csrf
                        <div class="form-group">
                            @include('listings.partials.forms._areas')
                            @include('listings.partials.forms._categories')
                            <label for="name">Title</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">Listing</label>
                            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" cols="30" rows="5">
                                
                            </textarea>
                            @error('body')
                                <span class="invalid-feedback" role="alert"> 
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
