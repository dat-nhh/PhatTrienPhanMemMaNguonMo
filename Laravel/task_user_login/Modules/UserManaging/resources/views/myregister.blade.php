@extends('usermanaging::layouts.master')

@section('content')
    <form method="post" action="{{ route('myregister.post') }}">
        @csrf
        <h1>Register</h1>
        <span>Username: </span><input type="text" placeholder="Username" name="username" required="">
        <span>Password: </span><input placeholder="Password" name="password" type="password" required="">
        <span>Confirm password: </span><input placeholder="Confirm password" name="cpassword" type="password" required="">
        <input type="submit" value="Submit">
    </form>
@endsection