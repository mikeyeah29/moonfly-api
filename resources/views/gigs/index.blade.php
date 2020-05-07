@extends('layouts.app')


@section('content')

<div class="container">

	<div class="d-flex justify-content-between align-items-center">
		<h1>Gigs</h1>
		<a href="{{ route('gigs.create') }}" class="btn btn-primary">Add Gig</a>
	</div>

	<div class="row">

		<table class="table">
			<tr>
				<th>Date</th>
				<th>Venue</th>
				<th>Address Line One</th>
				<th>Postcode</th>
				<th>Revenue</th>
				<th>Rider</th>
				<th></th>
			</tr>

			@foreach($gigs as $gig)

				<tr>
					<td>{{ $gig->date }}</td>
					<td>{{ $gig->venue }}</td>
					<td>{{ $gig->address_line_one }}</td>
					<td>{{ $gig->postcode }}</td>
					<td>{{ $gig->revenue }}</td>
					<td>{{ $gig->rider }}</td>
					<td>
						<div class="btn btn-danger">Delete</div>
					</td>
				</tr>

			@endforeach
		</table>

	</div>

</div>

@if($errors->any())
	<div class="alert alert-warning" role="alert">
	  	{{ $errors->first() }}
	</div>
@endif

@if(session()->has('success'))
	<div class="alert alert-success" role="alert">
		{{ session()->get('success') }}
	</div>
@endif

@endsection