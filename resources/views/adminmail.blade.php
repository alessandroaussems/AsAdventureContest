@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Mail!</div>

                    {{ Html::ul($errors->all(),array('class' => 'errors')) }}

                    {{ Form::model($adminmail, array('route' => array('adminmail.update', $adminmail->id), 'method' => 'PUT')) }}

                    <div class="form-group">
                        {{ Form::label('adminmail', 'AdminMail') }}
                        {{ Form::text('adminmail', $adminmail->email, ['class' => 'form-control']) }}
                    </div>

                    {{ Form::submit('Edit!', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}
                    <p class=".text-muted"><small>* please leave this as default, due to Mailgun free account limits.</small></p>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection