@component('listings.partials._base_listing', compact('listing'))

	@slot('links')
		<ul class="list-inline">
			<li class="list-inline-item">Added {{ $listing->pivot->created_at->diffForHumans() }}</li>
			<li class="list-inline-item"><a href="#" onclick="event.preventDefault(); document.getElementById('listing-favorite-destroy-{{$listing->id}}').submit();" >Delete</a></li>
			<form 
				method="POST" 
				action="{{ route('listing.favorite.destroy', [$area, $listing]) }}" 
				id="listing-favorite-destroy-{{$listing->id}}">
				@csrf
				@method('DELETE')
			</form>
		</ul>
	@endslot

@endcomponent