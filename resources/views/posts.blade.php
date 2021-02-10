@extends('app.master')

@section('content')

	<form action="{{route('store-posts')}}" method="post">
		@csrf
		<textarea name="data" id="" cols="30" rows="10"></textarea>
		<input type="submit" value="save" class="btn btn-info">
	</form>
	
@endsection