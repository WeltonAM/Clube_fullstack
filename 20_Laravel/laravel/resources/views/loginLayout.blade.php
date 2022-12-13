<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="assets/css/pageStyle.css">

    <link rel="shortcut icon" href="assets/images/icons/icons8-laravel-is-a-free,-open-source-php-web-framework.-48.png" type="image/x-icon">

    <title>Laravel-Course-{{ $title }}</title>
</head>
<body>

    <div class="spinner-wrapper">
        <div class="spinner-border text-info" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list icon-white"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav float-start">
              <a class="nav-link" href="/login">Login</a>
              <a class="nav-link" href="/signup">Sign Up</a>
            </div>
          </div>
        </div>
    </nav>

    <div class="content">
        @yield('content')
    </div>

    <footer class="mt-auto text-center text-lg-start">

        <div class="text-center p-4">
          © 2022 Copyright:
          <a target="_blank" class="text-reset fw-bold" href="https://github.com/WeltonAM">DevWeltonAM</a>
        </div>

    </footer>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="assets/js/pageScript.js"></script>

</body>
</html>
