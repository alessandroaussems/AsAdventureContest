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
                    <a class="btn btn-small btn-danger" href="{{ URL::to('nerds/' . $value->id) }}">Disable</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection