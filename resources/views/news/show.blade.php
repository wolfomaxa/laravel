@extends('layouts.app')

@section('content')
    <article>
        <h1>{{ $news->title }}</h1>
        <p>Pub on {{ $news->date}}</p>
        <p>{!!   $news->bodytext !!}</p>
        <p>{!!   $news->replace_bodytext !!}</p>


    </article>
@stop
