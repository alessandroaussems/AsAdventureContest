@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Periods</div>
                        <ul>
                            @foreach($periods as $key => $value)
                                <li><a href="{{ URL::to('periods/' . $value->id . '/edit') }}">{{ $value->title }}</a></li>
                            @endforeach
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection