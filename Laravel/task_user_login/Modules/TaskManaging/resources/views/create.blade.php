@extends('taskmanaging::layouts.master')

@section('content')
    <h1>Add Task</h1>

    <form action="{{route('taskmanaging.store')}}" method="post">
        @csrf
        <div>
           <span>Fill Task: </span>
            <input type="text" name="name" id="">
        </div>
        <div>
            <input type="submit" value="Add">
        </div>
    </form>
@endsection