@extends('master', ['title' => 'Amdin log'])

@section('content')

<div class="card">
    <h2>Admin</h2>

    <ul>

        {{-- @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach --}}
    </ul>
    {{-- {{ $users->links() }} --}}
</div>

@endsection
