<?php
require 'process/login.php';

if (isset($_SESSION['username'])) {
  if ($_SESSION['type'] == 'user') {
    header('location: page/user/plan_from_pc.php');
    exit;
  } elseif ($_SESSION['type'] == 'admin') {
    header('location: page/admin/admin.php');
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MRCS</title>

  <link rel="icon" href="dist/img/machine.png" type="image/x-icon" />

  <link rel="stylesheet" href="dist/css/font.min.css">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <style>
    body {
      background-image: url('dist/img/background2.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }


    .card {
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.4);
      border-radius: 10px;
    }

    .login-card-body {
      border-radius: 10px;
    }
  </style>
</head>
<div class="card">

  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <img src="dist/img/machine.png" style="height:150px; margin-top: 30px;">

        <h2><b>Machine Requirements<br>Computation System</b></h2>
      </div>

      <div class="card-body login-card-body">


        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="login_form">
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                autocomplete="off" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                autocomplete="off" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col">
              <button type="submit" class="btn bg-primary btn-block" name="Login" value="login">Login</button>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col">
              <a href="mrcs_work_instruction.pdf" target="_blank" class="btn bg-danger btn-block">Work Instruction</a>
            </div>
          </div>
          <div class="row">
            <div class="col">

            </div>
          </div>
        </form>
      </div>
    </div>
</div>
</body>


<script src="plugins/jquery/dist/jquery.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>

<noscript>
  <br>
  <span>We are facing <strong>Script</strong> issues. Kindly enable <strong>JavaScript</strong>!!!</span>
  <br>
  <span>Call IT Personnel Immediately!!! They will fix it right away.</span>
</noscript>

</body>

</html>