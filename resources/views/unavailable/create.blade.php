@extends('layouts.app')

@section('content')

<div class="container">

	<h1>Create Unavailable Date</h1>

	<form action="{{ route('unavailable.store') }}" method="post">

		@csrf
		
		<div class="form-group">
			<label>Date</label>
			<input type="date" name="date" class="form-control" value="{{ old('date') }}" />
		</div>

		<div class="form-group">
			<label>Reason</label>
			<input type="text" name="reason" class="form-control" value="{{ old('reason') }}" />
		</div>

		<div class="form-group">
			<button class="btn btn-primary" type="submit">Add Date</button>
		</div>

	</form>

</div>

@if($errors->any())
	<div class="alert alert-warning" role="alert">
	  	{{ $errors->first() }}
	</div>
@endif

@endsection