<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $mysqli = require __DIR__ . "/conn.php";

  $sql = sprintf(
    "SELECT * FROM user
                  WHERE email = '%s'",
    $mysqli->real_escape_string($_POST["email"])
  );

  $result = $mysqli->query($sql);

  $user = $result->fetch_assoc();

  if ($user) {
    if (password_verify($_POST["password"], $user["password_hash"])) {
      die("Login Successful");
    }
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="main.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
  <title>Document</title>
</head>

<body>

  <!-- ----------------------------------------NAVBAR------------------------------------------------------------ -->
  <nav class="navbar navbar-expand-md fixed-top bg-light">
    <div class="container-fluid">
      <img class="bastonlogo" src="logo.png" alt="" />
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-sm-1" type="search" placeholder="Search" aria-label="Search" />
          <button style="background-color: var(--blue)" id="search" name="search" class="btn bi bi-search text-light"></button>
        </form>
        <a href="#" class="btn btn-danger m-lg-1" type="submit">
          <i class="bi bi-person-circle"></i>
          Login
        </a>
        <a href="signup.html" class="btn btn-outline-danger" type="submit">
          <i class="bi bi-door-open"></i>
          Sign-Up
        </a>
      </div>
    </div>
  </nav>
  <!-- ----------------------------------------NAVBAR------------------------------------------------------------ -->
  <!-- ---------------------------------------FORM BODY------------------------------------------------------------ -->
  <div class="global-container">
    <div style="background-color: var(--gray); height: 350px;" class="card login-form p-2">
      <div class="card-body">
        <h1 class="card-title text-center">LOG IN</h1>
        <div class="card-text">
          <form class="login" method="post">
            <div class="form-group">
              <label class="text-light-emphasis" for="">Email Address</label>
              <input class="form-control form-control-sm" id="email" type="email" name="email" />
            </div>
            <div class="form-group">
              <label class="text-light-emphasis" for="">Password</label>
              <a href="#" type="forgetpassword" style="float: right; font-size: 8px">
                Forgot Password?</a>
              <input class="form-control form-control-sm" id="password" type="password" name="password" />
            </div>
            <div style="margin-top: 55px;">
              <button style="border-bottom: 5px" class="btn btn-danger" type="submit">
                Log In
              </button>
              <div style="margin-top: 15px;" class="sign-up">Don't have an account?</div>
              <a href="signup.html" style="font-size: 8px" type="donthaveaccount">Create one here</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>