@extends('usermanaging::layouts.master')

@section('content')
    <h1>Hello {{$name}}</h1>    
    <button><a href="{{route('mylogout')}}" style="text-decoration: none; color: black">Logout</a></button>
@endsection