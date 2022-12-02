<div class="header">
    <ul class="header-links">
        <li><a href="/">Home</a></li>
        <li><a href="/login">Login</a></li>
    </ul>

    <div class="header-status-login">
        @if (Auth::user())
            User, {{ Auth::user()->firstName }} | <a href="/logout">Logout</a>
        @else
            Visitor
        @endif
    </div>
</div>