<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Ajax and PHP course</title>
</head>
<body>

    <div class="container">
        <div class="row">

            <ul class="nav nav-tabs">
                <li class="nav-item" role="presentation"><a class="nav-link"    href="#home" data-bs-toggle="tab">Users</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#signup" data-bs-toggle="tab">Sign up</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#search" data-bs-toggle="tab">Search</a></li>
            </ul>

            <div class="tab-content">
                <div id="home" role="tabpanel" class="tab-pane fade show">
                    <br>
                    <button class="btn btn-outline-info btn-sm" id="btn-users">Users</button>
                    
                    <hr>
                    
                    <div id="div-users"></div>
                </div>
                
                <div id="signup" role="tabpanel" class="tab-pane fade">
                    <br>

                    <div id="div-create"></div>

                    <br>

                    <form action="" method="POST" role="form" id="form-signup" enctype="multipart/form-data">

                        <div class="form-group">
                            <input type="text" class="form-control" name="firstName" placeholder="Name">
                        </div>
                        
                        <br>

                        <div class="form-group">
                            <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                        </div>

                        <br>
                        
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        
                        <br>
                        
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        
                        <br>

                        <button id="btn-signup" type="submit" class="btn btn-outline-info btn-sm" id="btn-users">Sign up</button>
                    </form>
                </div>

                <div id="search" role="tabpanel" class="tab-pane fade">
                    <br>

                    <form class="d-flex" role="search" action="" method="POST" role="form" id="form-search">

                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="name">
                        <button class="btn btn-outline-success btn-sm" type="submit">Search</button>
                        
                    </form>
                    
                    <hr>
                    <div id="div-search"></div>
                </div>

            </div>

        </div>
    </div>
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
   
    <script src="https://kit.fontawesome.com/cea34a366f.js" crossorigin="anonymous"></script>
    
    <script src="assets/js/xhttp.js"></script>
    <script src="assets/js/user.js"></script>
    
</body>
</html>