@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Participate</div>

                    {{ Html::ul($errors->all()) }}

                    {{ Form::open(array('url' => 'participants')) }}

                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('adress', 'Adress') }}
                        {{ Form::text('adress', Input::old('adress'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('city', 'City') }}
                        {{ Form::text('city', Input::old('city'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('question', 'What is the exact price of the article with productcode: 4432D70003?') }}
                        {{ Form::text('question', Input::old('question'), array('class' => 'form-control')) }}
                    </div>

                    {{ Form::submit('Participate!', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection