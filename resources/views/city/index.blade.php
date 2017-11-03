@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>City</h1>
                </div>
                <div class="row">
                    <div class="panel-body">
                        <div class="form-group">

                            {!! Form::text('search_text', null, array('placeholder' => 'Search Text','class' => 'form-control','id'=>'search_text')) !!}
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        src = "{{ route('searchajax') }}";
                        $("#search_text").autocomplete({
                            source: function(request, response) {
                                $.ajax({
                                    url: src,
                                    dataType: "json",
                                    data: {
                                        term : request.term
                                    },
                                    success: function(data) {
                                        response(data);

                                    }
                                });
                            },
                            minLength: 1,

                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
@stop
