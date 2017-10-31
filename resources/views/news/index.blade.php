@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>News</h1>
                </div>
                {!! Form::open(['route' => 'news.search']) !!}
                    <input type="text" name="search_phtas" placeholder="поиск" class="input" />

                    <select name="select2" name="authors[]">
                        <option selected="selected">Выберите автора</option>
                        @foreach ($authors_list as $authors)
                            <option>{{$authors->authors}}</option>
                        @endforeach
                        </select>
                    <input type="checkbox" name="exact_phrase" value="Yes" >точная фраза?<Br>
                    <input type="date" name="created">
                    <input type="date" name="finished">
                    <input type="submit" name="" value="поиск" class="submit" />



                {!! Form::close()!!}
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
                                <a href='/{{ $news->alias }}/'>Читать далее...</a>
                            </article>
                        @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@stop
