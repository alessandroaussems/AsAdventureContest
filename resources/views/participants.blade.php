@extends('layouts.app')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    <a href="{{ route("excel") }}" class="btn btn-info pull-right">To Excel.</a>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Adress</td>
            <td>City</td>
            <td>IP</td>
            <td>Question</td>
            <td>Period</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($participants as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->adress }}</td>
                <td>{{ $value->city }}</td>
                <td>{{ $value->ip }}</td>
                <td>{{ $value->question }}</td>
                <td>{{ $value->period }}</td>
                <td>

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <form ></form>
                    {{ Form::open(array('url' => 'participants/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection