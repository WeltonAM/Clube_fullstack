<nav class="navbar navbar-expand-lg nav-system">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><i class="bi bi-house"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bi bi-list icon-white"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav float-end">
          <a class="nav-link" href="/users">Users</a>

          @auth
            <a class="nav-link text-red" href="{{ route('login.destroy') }}">Logout</a>
          @endauth
        </div>
      </div>
    </div>
</nav>
