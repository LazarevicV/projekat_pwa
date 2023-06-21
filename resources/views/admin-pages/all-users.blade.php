@extends('layout.main')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <th>{{ $user->first_name }}</th>
                        <th>{{ $user->last_name }}</th>
                        <th>{{ $user->email }}</th>
                        @if ($user->roll == 1)
                            <th>Admin</th>
                        @else
                            <th>User</th>
                        @endif
                        <th><a href="{{route('delete-user', $user->id)}}" class="btn btn-danger">Delete</a></th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
