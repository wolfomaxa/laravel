@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Example Code</h1>
                    </div>

                    <p class="panel-body">
                        <p>Старый массив</p>
                        <p>
                        @foreach ($old_array1 as $old)
                             {{ $old }}
                        @endforeach
                        </p>
                        <p>Новый массив</p>
                        <p>
                        @foreach ($new as $ne)
                        {{ $ne }}
                        @endforeach
                        </p>
                        <p>Новый массив за допомогою in_array</p>
                        <p>
                        @foreach ($new1 as $ne1)
                        {{ $ne1 }}
                        @endforeach
                        </p>
                        <p>Первый елемент массива new: {{$first_el}}</p>
                        <p>Последний елемент массива new: {{$last_el}}</p>

                        <p>
                            Створити масив від 0 до 100, вивести на екран елементи масиву кратно 5 до 50 а після 50 кратно 10 за допомогою одног циклу.
                            массив:   @foreach ($arrr as $ar)
                                {{ $ar }}
                            @endforeach
                    <p>кратно 5 до 50 и после 50 кратно 10:</p>
                            @foreach ($arrr as $ar)
                                @if ($ar <= 50)
                            @if (($ar % 5) == 0)
                                {{ $ar  }}
                                @endif
                             @elseif($ar > 50)
                            @if (($ar % 10) == 0)
                            {{ $ar  }}
                            @endif
                                @endif
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
