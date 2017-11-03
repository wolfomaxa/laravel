@extends('layouts.app')

@section('content')
    <article>
        <h1>{{ $news->title }}</h1>
        <p>Pub on {{ $news->created_at->format('d.m.Y H:i:s')}}</p>
        <p>{!!   $news->bodytext !!}</p>
        <p>{!!   $news->replace_bodytext !!}</p>


    </article>
@stop