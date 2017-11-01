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

                <div class="form-group">
                    {!! Form::label('Фраза') !!}
                    {!! Form::text('phrase', null, ['class'=>'form-control'] ) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Выберите автора') !!}
                    <select name="select2" name="authors[]" class="form-control">
                        <option disabled selected>Выберите автора</option>
                        @foreach ($authors_list as $authors)
                            <option value="{{$authors->id}}">{{$authors->authors}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {!! Form::label('точная фраза?  ') !!}
                    {!! Form::checkbox('corectly', null, false) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Поиск по дате') !!}

                    <input type="date" name="created" class="form-control" value="">
                </div>

                <div class="form-group">
                    {!! Form::submit('Поиск', ['class'=>'btn btn-primary']) !!}
                </div>


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
