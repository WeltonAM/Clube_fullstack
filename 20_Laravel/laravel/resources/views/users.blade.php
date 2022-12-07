@extends('master', ['title' => 'Home'])

@section('content')

<div class="card">
    <h2>Users</h2>

    <ul>

        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
    {{ $users->links() }}
</div>

@endsection

