@section('content')
	<h1>login</h1>
@include('messages')
	<form action="{{route('post-login')}}" method="post">
		@include('sidebar')
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<div>
			<input type="text" name="email">
		</div>
		<div>
			<input type="password" name="password">
		</div>
		<div>
			<input type="submit" value="save">
		</div>
	</form>