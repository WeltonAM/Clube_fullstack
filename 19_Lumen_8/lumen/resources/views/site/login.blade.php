@extends('site.master')

@section('content')
    <h2>Login</h2>

    <form action="/login" method="post">
        <input type="text" name="email" value="isom.hoppe@gmail.com">
        <input type="password" name="password" value="123">
        <button type="submit">Login</button>
    </form>

@endsection
