@extends('app.master')

@section('content')

@include('sidebar')
		<h1>Welcome {{ $user->name }}</h1>
		<small>{{$user->email}}</small>

		<div class="row">
			<div class="col-md-12">
				<form action="{{route('logout')}}" method="post">
					@csrf
					<input type="submit" class="btn btn-primary" value="logout">
				</form>
			</div>
		</div>
@endsection