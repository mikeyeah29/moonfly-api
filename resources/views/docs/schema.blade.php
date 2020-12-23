@extends('layouts.docs')

@section('side_bar')

	<div class="side_bar">

	</div>

@endsection

@section('content')

<div class="row d-flex justify-content-center">
    <div class="col-sm-9 col-lg-8">

    	<h1 class="pt-4 pb-5" style="font-size: 36px;">Database Schema</h1>
    	<a href="https://dbdiagram.io">https://dbdiagram.io</a>

    	<pre>
    	<code>
Table users {
  id int
  first_name varchar
  last_name varchar
  roles text
  avatar varchar
  email varchar
  email_verified_at datetime
  password varchar
}

Table password_resets {
  email varchar
  token varchar
  created_at datetime
}
    	</code>
    </pre>

	</div>
</div>

@endsection