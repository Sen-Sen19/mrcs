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
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>MRCS</title>

  <link rel="icon" href="dist/img/machine.png" type="image/x-icon" />
  <link rel="stylesheet" href="dist/css/font.min.css">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <style>
    /* @font-face {
      font-family: 'Poppins';
      src: url('dist/font/poppins/Poppins-Regular.ttf') format('truetype');
    } */

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;

      overflow: hidden;
    }

    .wrapper {
      width: 100%;
      min-height: 100vh;
      background-image: url('dist/img/furukawa-bg.jpg');
      background-repeat: no-repeat;
      background-size: cover;
    }

    input {
      background-color: rgba(255, 255, 255, 0.90);
    }

    input::placeholder {
      font-size: 14px;
    }

    img {
      max-width: 100%;
      height: auto;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="row p-5">
      <div class="col-4 p-2">
        <img src="dist/img/fas-name.png" alt="FAS Logo" style="height: 85%">
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-1 offset-3 d-flex justify-content-end"
        style="background-color: rgba(0, 45, 77, 0.35); border-radius: 15px 0px 0px 15px;">
        <img class="align-self-center" style="height: 90px" src="dist/img/machine.png" alt="System Logo">
      </div>
      <div class="col-2 d-flex justify-content-start" style="background-color: rgba(0, 45, 77, 0.35);">
        <h1 class="align-self-center text-white text-bold" style="font-size: 43px;">Machine <br> Requirments <br> Computation System
      </div>

      <div class="col-3" style="background-color: #FEFEFE; border-radius: 0px 15px 15px 0px; width: 450px;">
        <p class="text-center p-0 m-0 pt-5" style="font-size: 25px; font-weight: bold;">Sign In</p>
        <p class="text-center p-0 m-0" style="font-size: 13px; color: #444;">Health and Safety First! Kindly enter your
          details.</p>

        <form method="POST" id="login_form" class="mt-5 mr-5 ml-5">
          <div class="input-group mb-3">
            <label class="m-0 p-0" style="font-weight: normal; font-size: 15px; color: #252525;">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autocomplete="off"
              style="width: 100%; height: 43px; border-radius: 15px; border-color: #E9E9E9; transition: 0.4s ease;"
              onfocus="this.style.borderColor='#0F78DC';" onblur="this.style.borderColor='#E9E9E9';"
              onmouseover="this.style.borderColor='#0F78DC';" onmouseout="this.style.borderColor='#E9E9E9';" required>
          </div>

          <div class="input-group mb-4">
            <label class="m-0 p-0" style="font-weight: normal; font-size: 15px; color: #252525;">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password"
              autocomplete="off"
              style="width: 100%; height: 43px; border-radius: 15px; border-color: #E9E9E9; transition: 0.4s ease;"
              onfocus="this.style.borderColor='#0F78DC';" onblur="this.style.borderColor='#E9E9E9';" 
              onmouseover="this.style.borderColor='#0F78DC';" onmouseout="this.style.borderColor='#E9E9E9';" required>
          </div>

          <div class="input-group mb-3">
            <button type="submit" class="btn bg-primary btn-block" name="Login"
              style="background-color: #0F78DC; color: #fff; border-radius: 15px; height: 43px;"
              onmouseover="this.style.backgroundColor='#00497A'; this.style.color='#fff';"
              onmouseout="this.style.backgroundColor='#0F78DC'; this.style.color='#fff';">Sign In</button>
          </div>

          <div style="display: flex; align-items: center;">
            <hr style="flex: 1; border: none; border-top: 1px solid #E0E0E0;">
            <p class="text-center" style="font-size: 12px; color: #BCBCBC; margin: 0 10px;">PROCEED TO</p>
            <hr style="flex: 1; border: none; border-top: 1px solid #E0E0E0;">
          </div>

          <div class="row mt-3 mb-5">
            <div class="col-6 d-flex justify-content-center">
              <button class="btn btn-block"
                style="color: #353535; border-radius: 15px; border-color: #E9E9E9; height: 40px; font-size: 13px;"
                onmouseover="this.style.backgroundColor='#00497A'; this.style.color='#fff';"
                onmouseout="this.style.backgroundColor='#f9f9f9'; this.style.color='#353535';"><i
                  class="far fa-file"></i>&nbsp;Work Instruction</button>
            </div>
            <div class="col-6 d-flex justify-content-center">
              <button class="btn btn-block"
                style="color: #353535; border-radius: 15px; border-color: #E9E9E9; height: 40px; font-size: 13px;"
                onmouseover="this.style.backgroundColor='#00497A'; this.style.color='#fff';"
                onmouseout="this.style.backgroundColor='#f9f9f9'; this.style.color='#353535';"><i
                  class="far fa-eye"></i>&nbsp;Viewer Page</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-12 d-flex justify-content-center mt-5">
        <p class="text-white mt-5" style="font-size: 13px; text-shadow: 4px 4px 6px rgba(0, 0, 0, 1);">Copyright 2024.
          All Rights Reserved. Furukawa Automotive Systems Lima Philippines Inc.
          | Version 1.0.0</p>
      </div>
    </div>
  </div>
</body>


<!-- jQuery -->
<script src="plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</html>