@extends('layouts.app')

@section('content')
    <article>
        <h1>{{ $news->title }}</h1>
        <p>Pub on {{ $news->created_at->format('d.m.Y H:i:s')}}</p>
        <p>{{ $news->content }}</p>
    </article>
@stop