@extends('layouts.app')

@section('content')

<div class="container">

	<h1>Create Gig</h1>

	<form action="{{ route('gigs.store') }}" method="post">

		@csrf
		
		<div class="form-group">
			<label>Date</label>
			<input type="date" name="date" class="form-control" value="{{ old('date') }}" />
		</div>

		<div class="form-group">
			<label>Venue</label>
			<input type="text" name="venue" class="form-control" value="{{ old('venue') }}" />
		</div>

		<div class="form-group">
			<label>Address Line One</label>
			<input type="text" name="address_line_one" class="form-control" value="{{ old('address_line_one') }}" />
		</div>

		<div class="form-group">
			<label>Postcode</label>
			<input type="text" name="postcode" class="form-control" value="{{ old('postcode') }}" />
		</div>

		<div class="form-group">
			<label>Revenue</label>
			<input type="number" name="revenue" class="form-control" value="{{ old('revenue') }}" />
		</div>

		<div class="form-group">
			<label>Rider</label>
			<input type="text" name="rider" class="form-control" value="{{ old('rider') }}" />
		</div>

		<div class="form-group">
			<button class="btn btn-primary" type="submit">Add Gig</button>
		</div>

	</form>

</div>

@if($errors->any())
	<div class="alert alert-warning" role="alert">
	  	{{ $errors->first() }}
	</div>
@endif

@endsection