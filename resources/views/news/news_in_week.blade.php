@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>News this week</h1>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            @foreach ($news_list as $news)
                                <article>
                                    <h2>{{ $news->title }}</h2>
                                    <p>{{  str_limit($news->content, 18, ' (...)')}}</p>
                                    <a href='/news/{{ $news->alias }}/'>Читать далее...</a>
                                </article>
                            @endforeach
                        SQL Code: SELECT * FROM news WHERE WEEK(DATE, 1) = WEEK(NOW(), 1)
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
