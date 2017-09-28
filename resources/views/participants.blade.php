@extends('layouts.app')

@section('content')
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Adress</td>
            <td>City</td>
            <td>IP</td>
            <td>Question</td>
        </tr>
        </thead>
        <tbody>
        @foreach($participants as $key => $value)
            @if($value->enabled==1)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->adress }}</td>
                <td>{{ $value->city }}</td>
                <td>{{ $value->ip }}</td>
                <td>{{ $value->question }}</td>
                <td>

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <form ></form>
                    {{ Form::open(array('url' => 'participants/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this Nerd', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}

                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endsection