<?php 
session_start();
$idStandart = isset($_GET['standar']) ? $_GET['standar'] : 0;
$idSubStandart1 = isset($_GET['sub_standar1']) ? $_GET['sub_standar1'] : 0;
$idUrut = isset($_GET['urut']) ? $_GET['urut'] : 0;
require 'functions.php';

if (isset($_POST['submit'])) {
  
  $nip = $_POST['nip'];
  $password = $_POST['password'];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE nip_user = '$nip'");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    
    if (password_verify($password, $row['user_password'])) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $row['username'];
        $_SESSION['timer'] = time();
        header('Location: content.php?mod=borang&standar='.$idStandart.'&sub_standar1='.$idSubStandart1.'&urut='.$idUrut);
        exit;
      }
    }else {
      echo "<script>
            alert('Nip / Password salah');
          </script>" ;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SITEBOT LOGIN</title>

 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
 <!-- Ionicons -->
 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 <!-- Tempusdominus Bootstrap 4 -->
 <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
 <!-- iCheck -->
 <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
 <!-- Theme style -->
 <link rel="stylesheet" href="dist/css/adminlte.min.css">  
 <!-- overlayScrollbars -->
 <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
 <!-- Daterange picker -->
 <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
 <!-- Hover link -->
 <link rel="stylesheet" href="dist/css/text-link.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Site</b>Bot</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Log in dengan akun Sitebot Anda</p>

      <form action="" method="post" id="form" name="login">
        <div class="input-group mb-3">
          <input type="nip" class="form-control" placeholder="Nip" name="nip" id="nip">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span id="alert" style="color: red; font-size: 0.9em;"></span>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Ingat Saya
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block" >Log In</button>
          </div>
          <!-- /.col -->
        </div>
        <p class="mb-0">
          <a href="register.php" class="text-center">Buat akun Sitebot</a>
        </p>
      </form>

      
     
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
