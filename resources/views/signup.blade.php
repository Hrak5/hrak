@extends('app.master')

@section('content')

@include('messages')

<form action="/registr" method="post">
	@csrf
	<div>
		<label>name</label>
		<input type="text" name="name">
	</div>
	<div>
		<label>email</label>
		<input type="text" name="email">
	</div>
	<div>
		<label>age</label>
		<input type="number" name="age">
	</div>
	<div>
		<label>password</label>
		<input type="password" name="password">
	</div>
	<div>
		<input type="submit" value="submit form">
	</div>
</form>

@endsection