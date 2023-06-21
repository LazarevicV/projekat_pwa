@extends('layout.main')

@section('content')
    <div class="container">
        <h3>Neprocitano</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Ime</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unread_messages as $message)
                    <tr>
                        <th>{{ $message->name }}</th>
                        <th>{{ $message->email }}</th>
                        <th>{{ $message->message }}</th>
                        <th><a href="{{route('change-message-status', $message->id)}}" class="btn btn-primary">Change status</a></th>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Procitano</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Ime</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($read_messages as $message)
                    <tr>
                        <th>{{ $message->name }}</th>
                        <th>{{ $message->email }}</th>
                        <th>{{ $message->message }}</th>
                        <th><a href="{{route('delete-message', $message->id)}}" class="btn btn-danger">Delete</a></th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
