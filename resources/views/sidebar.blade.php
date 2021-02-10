<ul>
    <li> <a href="/">Home</a></li>
    @if(!Auth::check())
    <li> <a href="{{route('login')}}">login</a></li>
    <li> <a href="{{route('signup')}}">sign up</a></li>
    @endif
</ul>