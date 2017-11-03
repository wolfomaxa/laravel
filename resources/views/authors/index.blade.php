@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Auhtors have news</h1>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        @foreach ($authors_list_news as $authors)
                            <article>
                                <h2>{{ $authors->authors }}</h2>

                            </article>
                        @endforeach
                        SQL Code: SELECT `authors` FROM `authors` WHERE `id` IN (SELECT `author_id` FROM `news` WHERE news.author_id = authors.id)
                </div>
            </div>
        </div>
    </div>
</div>
@stop
