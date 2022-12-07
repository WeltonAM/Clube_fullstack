@extends('loginLayout', ['title' => 'Login'])

@section('content')

<div class="log_card">
    <div class="log_logo">
        <p>Access the system</p>
        <img src="assets/images/icons/icons8-laravel-is-a-free,-open-source-php-web-framework.-48.png" alt="">
    </div>

    <form action="{{ route('login.store') }}" method="post">
        @csrf
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">

        <x-Button>
            Login
        </x-Button>

    </form>

</div>


@endsection

