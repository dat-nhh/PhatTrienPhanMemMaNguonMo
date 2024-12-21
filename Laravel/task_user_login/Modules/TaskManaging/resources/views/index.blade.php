@extends('taskmanaging::layouts.master')

@section('content')
    <div>
        <h1>Tasks List</h1>
        @foreach ($tasks as $task)
            <div>
                {{ $task->name; }}
            </div>
        @endforeach
    </div>
    <div>
        {{ $tasks->links(); }}
    </div>
@endsection
