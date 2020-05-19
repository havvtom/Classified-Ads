<div class="form-group">
	<label>Areas</label>
	<select name="area_id" id="area"class="form-control @error('area_id') is-invalid @enderror">
		@foreach($areas as $country)
		<optgroup label="{{$area->name}}">
			@foreach($country->children as $province)
				<optgroup label="{{$province->name}}">
					@foreach($province->children as $city)
						<optgroup label="{{$city->name}}">
							@foreach($city->children as $surbub)

								@if(
									isset($listing) && $listing->area_id == $surbub->id || 
									$surbub->id == old('area_id'))
									<option value="{{$surbub->id}}" selected>{{$surbub->name}}</option>
								@else
									<option value="{{$surbub->id}}">{{$surbub->name}}</option>
								@endif
							@endforeach
						</optgroup>
					@endforeach
				</optgroup>
			@endforeach
		</optgroup>
		@endforeach		
	</select>
	@error('area_id')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>