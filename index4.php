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
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .rectangle {
      width: 50%; 
      height: 50vh; 
      background: linear-gradient(to right, rgba(0, 67, 165, 0.2) 50%, white 50%); /* Transparent #0043a5 */
      border-radius: 3%;
      position: relative;
    }

    .login-container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
    }

    .login-container h2 {
      font-size: 24px;
      margin-bottom: 15px;
    }

    .login-container p {
      font-size: 16px;
      margin-bottom: 20px;
      color: #444;
    }

    .login-container label {
      display: block;
      text-align: left;
      margin-bottom: 5px;
    }

    .login-container input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    .login-container button {
      width: 100%;
      padding: 10px;
      background-color: #0043a5;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 18px;
      cursor: pointer;
    }

    .login-container button:hover {
      background-color: #003385;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="rectangle">
      <div class="login-container">
        <h2>Sign In</h2>
        <p>Health and Safety First! Kindly enter your details.</p>
        <form action="process/login.php" method="POST">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Enter your username" required>

          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" required>

          <button type="submit" name="login">Login</button>
        </form>
      </div>
    </div>
  </div>

  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>
