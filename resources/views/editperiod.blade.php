@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit period!</div>

                    {{ Html::ul($errors->all(),array('class' => 'errors')) }}

                    {{ Form::model($period, array('route' => array('periods.update', $period->id), 'method' => 'PUT')) }}

                    <div class="form-group">
                        {{ Form::label('startdate', 'Startdate') }}
                        {{ Form::text('startdate', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('enddate', 'Enddate') }}
                        {{ Form::text('enddate', null,['class' => 'form-control']) }}
                    </div>


                    {{ Form::submit('Edit!', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection