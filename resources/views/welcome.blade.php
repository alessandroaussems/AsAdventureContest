<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} | Contest</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background: url(img/background.jpg) no-repeat center center fixed;
                background-size:100% 100%;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                color: white;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .participate
            {
                background-color: orange;
                border-color: orange;
                color: black;
                border-radius: 0px;
            }
            .participate:hover
            {
                background-color: black;
                border-color: black;
                color: orange;
            }
            .top-right > a
            {
                color: white;
            }
            .winner
            {
                color: white;
                font-size: 14pt;
                font-weight: bold;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Admin</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img src="/img/logo.png" alt="Logo van As Adventure."><br>
                    <h1>Win a voucher of €500</h1>
                </div>
                <a href="/participate" class="btn btn-primary participate">Participate!</a>
                @if(count($winners) > 0)
                <h2>Previous winners:</h2>
                <ul id="previouswinners">
                    @foreach($winners as $key => $value)
                    <li class="winner">Winnaar {{$value->title}}: {{$value->name}}</li>
                    @endforeach
                </ul>
                @endif

            </div>
        </div>
    </body>
</html>
