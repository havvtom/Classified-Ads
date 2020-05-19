<div class="form-group">
	<label for="category">Categories</label>
	<select name="category_id" id="category" class="form-control @error('category_id') is-invalid @enderror" {{ isset($listing) && $listing->live() ? 'disabled="disabled"' : ''}}>
		@foreach($categories as $category)
			<optgroup label="{{$category->name}}">
				@foreach($category->children as $catchild)

					@if (isset($listing) && $listing->category_id == $catchild->id || $catchild->id == old('category_id'))
						<option value="{{$catchild->id}}" selected>{{$catchild->name}} (	R{{number_format($category->price, 2)}})</option>
					@else
						<option value="{{$catchild->id}}">{{$catchild->name}} (	R{{number_format($category->price, 2)}})</option>
					@endif					
				@endforeach
			</optgroup>
		@endforeach
	</select>
	@error('category_id')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>