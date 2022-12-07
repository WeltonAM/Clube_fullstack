@extends('master', ['title' => 'Login'])

@section('content')

<h2>Login</h2>

<form action="{{ route('login.post') }}" method="post">
    @csrf
    <input type="text" name="firstName">

    <x-Button>
        Login
    </x-Button>
    
</form>

@endsection

