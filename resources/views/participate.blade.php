<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html, body {
            background: url(img/background_75.png) no-repeat center center fixed;
            background-size:100% 100%;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            color: white;
            height: 100vh;
            margin: 0;
        }
        .top-right > a
        {
            color: white;
        }
        .titleparticipate
        {
            text-align: center;
        }
        .participate
        {
            background-color: orange;
            border-color: orange;
            color: black;
            border-radius: 0px;
            margin: 0 auto;
        }
        .participate:hover
        {
            background-color: black;
            border-color: black;
            color: orange;
        }
        .errors
        {
            padding: 0px;
            list-style-type: none;
            color: red;
        }

    </style>
</head>
<body>
<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                    <div class="titleparticipate"><h1>Participate!</h1></div>

                    {{ Html::ul($errors->all(),array('class' => 'errors')) }}

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
                        {{ Form::label('question', 'What year is AS Adventure founded?') }}
                        {{ Form::text('question', Input::old('question'), array('class' => 'form-control')) }}
                    </div>

                    {{ Form::submit('Participate!', array('class' => 'btn btn-primary participate')) }}

                    {{ Form::close() }}

                </div>
        </div>
    </div>
</div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
