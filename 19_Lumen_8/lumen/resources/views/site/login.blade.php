@extends('site.master')

@section('content')
    <h2>Login</h2>

    <div id="messages"></div>

    <form>
        <input type="text" name="email">
        <input type="password" name="password">
        <button id="btn-login">Login</button>
    </form>

    @section('scripts')
        <script src="/dist/login.js"></script>
    @endsection

@endsection
