@extends('usermanaging::layouts.master')

@section('content')
    <form method="post" action="{{ route('mylogin.post') }}">
        @csrf
        <h1>Login</h1>
        <span>Username: </span><input type="text" placeholder="Username" name="username" required="">
        <span>Password: </span><input placeholder="Password" name="password" type="password" required="">
        <input type="submit" value="Submit">
    </form>
@endsection
