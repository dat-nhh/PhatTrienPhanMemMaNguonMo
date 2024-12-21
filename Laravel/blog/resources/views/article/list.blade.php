@extends('layouts.app')

@section('content')
<h1>danh sach bai viet</h1>
@foreach ($articles as $article)
<div>
    {{ $article->title; }}
</div>  
@endforeach

<div>
    {{ $articles->links(); }}
</div>
@endsection