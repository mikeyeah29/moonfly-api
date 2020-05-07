@extends('layouts.app')


@section('content')

<div class="container">

	<div class="d-flex justify-content-between align-items-center">
		<h1>Unavailable Dates</h1>
		<a href="{{ route('unavailable.create') }}" class="btn btn-primary">Add Date</a>
	</div>

	<div class="row">

		<table class="table">
			<tr>
				<th>Date</th>
				<th>Reason</th>
			</tr>
			@foreach($dates as $date)

				<tr>
					<td>{{ $date->date }}</td>
					<td>{{ $date->reason }}</td>
				</tr>

			@endforeach
		</table>

	</div>

</div>

@endsection