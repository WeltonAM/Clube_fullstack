<nav class="navbar fixed-top navbar-expand-lg bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span><i class="bi bi-list"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/user/create">Sign up</a>
          </li>
        </ul>
      </div>

      <div class="log">
        <?php if(isLogged()):  ?>
          <p>
            User, <?php echo auth()->firstName; ?>
          </p>
          <a href="/logout" class="log-btn">Log out</a>
        <?php else:  ?>
          <p>
            Visitor,
          </p>
          <a href="/login" class="log-btn">Log in</a>
        <?php endif;  ?>

      </div>

    </div>
  </nav>