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
				<th></th>
			</tr>
			@foreach($dates as $date)

				<tr>
					<td>{{ $date->date }}</td>
					<td>{{ $date->reason }}</td>
					<td>
						<form action="{{ route('unavailable.destroy', $date->id) }}" method="post" onsubmit="return confirm('Are you sure?');"> 
							@csrf
							 {{ method_field('DELETE') }}
							<button type="submit" class="btn btn-danger">Delete</button>
						</form>
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