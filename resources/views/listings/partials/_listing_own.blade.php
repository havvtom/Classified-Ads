<div class="media">
	<div class="media-body">
		<h5>
			<strong>
				@if($listing->live())
					<a href="{{ route('listing.show', [$area, $listing]) }}">{{$listing->title}}</a>
				@else
					{{$listing->title}}
				@endif
			</strong>

			in {{$listing->area->name}}
		</h5>
		<ul class="list-inline">
			<li class="list-inline-item"> Added <time>{{ $listing->created_at->diffForHumans() }}</time></li>
			<li class="list-inline-item">last updated <time>{{ $listing->updated_at->diffForHumans() }}</time></li>
		</ul>
		<ul class="list-inline">
			<li class="list-inline-item"><a href="" onclick="event.preventDefault(); document.getElementById('listing-destroy-form-{{ $listing->id }}').submit();">Remove</a></li>
			<li class="list-inline-item"><a href="{{ route('listing.edit', [$area, $listing]) }}">Edit</a></li>
		</ul>
	</div>
</div>

<form 
	method="POST" 
	action="{{ route('listing.destroy', [$area, $listing]) }}" 
	id="listing-destroy-form-{{ $listing->id }}"
>
	@csrf
	@method('DELETE')
</form>