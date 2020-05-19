@extends('layouts.app')

@section('content')
   <div class="row">
   		@if(Auth::check())
	   		<div class="col-md-3">
	   			<div class="card">
	   				<div class="card-body">
	   					<nav class="nav flex-column">
	   						<li><a href="">Email to a friend</a></li>
                        @if(!$listing->isFavoritedBy(Auth::user()))
	   						<li>
                           <a href="#" onclick="event.preventDefault(); document.getElementById('listings-favorite-form').submit();">Add to favorite</a>
                           <form 
                              action="{{ route('listing.favorite.store', [$area, $listing]) }}"
                              method="POST"
                              id="listings-favorite-form"
                              class="hidden" 
                           >
                              @csrf
                           </form>
                        </li>
                        @endif
	   					</nav>
	   				</div>
	   			</div>
	   		</div>
   		@endif
   		<div class="col-md-9">
   			<div class="card">
   				<div class="card-header">
   					<h4>{{ $listing->title }} in <span class="text-muted">{{ $area->name }}</span></h4>
   				</div>
   				<div class="card-body">
   					{!! nl2br(e($listing->body)) !!}
   					<hr>
   					<p>Viewed {{$listing->views()}} times</p>
   				</div>
   			</div>
   			<div class="card mt-3">
   				<div class="card-header">
   					Contact {{$listing->user->name}}(Advertiser)
   				</div>
   				<div class="card-body">
   					@if(Auth()->guest())
   						<p class="text-muted"><a href="{{route('register')}}">Sign up</a> or <a href="{{route('login')}}">Sign in</a> to contact the advertiser</p>
   					@else
   					<form method="POST" action="{{ route('listings.contact.store', [$area, $listing]) }}">
   						@csrf
   						<div class="form-group">
   							<label id="message" class="form-control-label">Message</label>
   							<textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" cols="30" rows="5">
   								
   							</textarea> 
                        @error('message') 
                           <form-text class="text-danger"> {{ $message }} </form-text>
                        @enderror 							
   						</div>
   						<div class="form-group">
   							<button type="submit" class="btn btn-primary">Send Message</button>
   							<span class="text-muted">
   								This will email {{ $listing->user->name }} and they will contact you by email.
   							</span>
   						</div>
   					</form>
   					@endif
   				</div>
   			</div>
   		</div>
   </div>
@endsection


