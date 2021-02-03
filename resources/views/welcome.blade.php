@extends('app.master')


@section('title','logins pages')

@section('title','login page')


@section('scrips')
    <script> src="/js/index.js"</script>
@endsection

@section('styles')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@include('sidebar')
    
@section('content')
    <h1>welcome tco trainings</h1>
    <ul>
        @foreach($users as $user)
        <li>{{$user['name']}} : {{$user['age']}}</li>
        @endforeach
    </ul>
@endsection