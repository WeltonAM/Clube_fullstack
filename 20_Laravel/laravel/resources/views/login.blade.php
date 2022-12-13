@extends('loginLayout', ['title' => 'Login'])

@section('content')

@if (session()->has('success'))
<x-alert key="success" :message="session()->get('success')" />
@endif

<div class="log_card">
    <div class="log_logo">
        <p>Access the system</p>
        <img src="assets/images/icons/icons8-laravel-is-a-free,-open-source-php-web-framework.-48.png" alt="">
    </div>

    <form action="{{ route('login.store') }}" method="post">
        @csrf
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">

        <div id="check-login">
            <input type="checkbox" name="remember">
            <label for="remember">Remember</label>
        </div>


        <x-Button>
            Login
        </x-Button>

        {{ $errors->first('email') }}

    </form>

</div>


@endsection

