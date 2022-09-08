<?php
session_start();
require 'functions.php';
if (isset($_SESSION['login'])) {
  if ((time() - $_SESSION['timer']) > 6000) {
    unset($_SESSION['login']);
    session_destroy();
  }
}
if (isset($_POST['logout'])) {
  unset($_SESSION['login']);
  session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SITEBOT</title>

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

<body class="hold-transition sidebar-mini layout-fixed">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Hamburger Button Menu -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- SEARCH FORM -->
      <!-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form> -->

      <!-- FULL SCREEN BUTTON -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <!-- SIGN BUTTON -->
      <li class="nav-item">
        <?php

        if (isset($_SESSION['login'])) { ?>
          <form action="" method="post">
            <button class="nav-link" type="submit" name="logout" style="border: none; background-color: transparent;">
              <i class="nav-icon fas fa-sign-in-alt"></i>
            </button>
          </form>
        <?php
        }
        ?>

      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- ASIDE CONTENT -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- LOGO SITEBOT -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/poltek.png" alt="AdminLTE Logo" class="brand-image img-circl e">
      <span class="brand-text font-weight-bold">SITEBOT</span>
    </a>

    <!-- SIDEBAR -->
    <div class="sidebar">
      <!-- PROFIL INFO -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/profile.png" alt="User Image">
        </div>
        <div class="info">
          <?php

          if (isset($_SESSION['login'])) {
          ?>
            <div class="d-block" style="color: #fff;"><?= $_SESSION['username']; ?></div>
          <?php
          } else {
          ?>
            <div class="d-block" style="color: #fff;">Guess</div>
          <?php } ?>
        </div>
      </div>

      <!-- NAVIGASI MENU -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- HOME MENU -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <!-- CONTENT ISI BORANG  -->
          <li class="nav-header">Laporan Evaluasi Diri</li>

          <?php
          $stadarAktif = isset($_GET['standar']) ? $_GET['standar'] : 0;
          $standar = mysqli_query($conn, "SELECT * FROM tb_standar;");
          $i = 1;
          while ($std = mysqli_fetch_array($standar)) {
            if ($stadarAktif == $std['id_standar']) { ?>
              <li class="nav-item menu-is-opening menu-open">
              <?php } else { ?>
              <li class="nav-item">
              <?php } ?>

              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-briefcase"></i>
                <!-- STANDAR 1 MENU  -->
                <p id="id">
                  Kriteria <?= $std['id_standar'] ?>
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <?php
                $idStandar = $std['id_standar'];
                $sub_standar = mysqli_query($conn, "SELECT * FROM tb_sub_standar WHERE id_standar = $idStandar");
                $j = 1;
                $idSubAktif = isset($_GET['sub_standar1']) ? $_GET['sub_standar1'] : 0;
                while ($sub_std = mysqli_fetch_array($sub_standar)) {
                  $idSubstandar1 = $sub_std['id_sub_standar'];
                ?>
                  <!-- SUB MENU STANDAR 1.1 -->
                  <li class="nav-item submenu" id="sub_std">
                    <?php
                    if ($idSubstandar1 == $idSubAktif) { ?>
                      <a href="content.php?mod=borang&standar=<?php echo $idStandar; ?>&sub_standar1=<?php echo $idSubstandar1; ?>&urut=<?php echo $j; ?>" class="nav-link submenuaktif">
                        <i class="nav-icon">C.<?php echo $std['id_standar'] . " . " ?><?php echo $j; ?> <?php echo $sub_std['nm_sub_standar'] ?></i>
                      </a>
                    <?php } else { ?>
                      <a href="content.php?mod=borang&standar=<?php echo $idStandar; ?>&sub_standar1=<?php echo $idSubstandar1; ?>&urut=<?php echo $j; ?>" class="nav-link">
                        <i class="nav-icon">C.<?php echo $std['id_standar'] . " . " ?><?php echo $j; ?> <?php echo $sub_std['nm_sub_standar'] ?></i>
                      </a>
                    <?php } ?>
                  </li>
                <?php $j++;
                }

                ?>

              </ul>
              </li>
            <?php $i++;
          }

            ?>

            <!-- CONTENT DATA PENDUKUNG -->
            <li class="nav-header">DATA PENDUKUNG</li>

            <!-- PRFILE TMJ -->
            <li class="nav-item bottom">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>Profil TMJ</p>
              </a>
            </li>
        </ul>
        <!-- /.NAVIGASI MENU -->
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <div class="content-wrapper">
    <!-- CONTENT WRAPPER -->

    <section class="content">
      <!-- SESI CONTENT -->
      <div class="container-fluid">
        <!-- CONTAINER CONTENT -->

        <h1 style="text-align: center; padding-top: 40px;  font-weight: bold;">Selamat Datang Di Sitebot</h1>
        <h4 style="text-align: center;  padding-bottom: 10px; font-weight: 500;">(Website Borang Teknik Multimedia dan Jaringan)</h4>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="padding: 20px 0px 20px 0px;">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="img/img2.png" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <h1 style="text-align: left; position: relative; left: -15%;">BORANG PRODI</h1>
                <h1 style="text-align: left; position: relative; left: -15%;">TEKNIK MULTIMEDIA DAN JARINGAN</h1>
                <H5 style="text-align: left; position: relative; left: -15%;">POLITEKNIK NEGERI UJUNG PANDANG</H5>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/kp2.png" alt="Second slide">
              <div class="carousel-caption d-none d-md-block">
                <h1 style="text-align: left; position: relative; left: -15%;">BORANG PRODI</h1>
                <h1 style="text-align: left; position: relative; left: -15%;">TEKNIK MULTIMEDIA DAN JARINGAN</h1>
                <H5 style="text-align: left; position: relative; left: -15%;">POLITEKNIK NEGERI UJUNG PANDANG</H5>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/img1.png" alt="Third slide">
              <div class="carousel-caption d-none d-md-block">
                <h1 style="text-align: left; position: relative; left: -15%;">BORANG PRODI</h1>
                <h1 style="text-align: left; position: relative; left: -15%;">TEKNIK MULTIMEDIA DAN JARINGAN</h1>
                <H5 style="text-align: left; position: relative; left: -15%;">POLITEKNIK NEGERI UJUNG PANDANG</H5>
              </div>
            </div>
          </div>
        </div>

        <h6 style="text-align: center; padding-top: 1%;">Teknik Multimedia dan Jaringan merupakan program studi yang berada dibawah naungan Jurusan Teknik Elektro Politeknik Negeri Ujung Pandang. Website Borang TMJ ini berguna untuk penginputan data borang akreditasi program studi ini.</h6>

        <h1 style="text-align: center; padding: 4% 0% 3% 0%;">9 Standar Kriteria Penilaian</h1>



        <div class="row">
          <!-- KOLOM CONTENT -->
          <?php
          $standar = mysqli_query($conn, "SELECT * FROM tb_standar");
          $i = 1;
          while ($std = mysqli_fetch_assoc($standar)) {
            $idStandar = $std['id_standar'];
          ?>
            <div class="col-md-4">
              <div class="small-box card collapsed-card card-header" style="background-color: #343A40;">
                <center><img style="padding-top: 35px;" src="<?= $std['gbr_standar'] ?>" alt="visi" width="<?= $std['uk_gbr_standar'] ?>">
                  <h5 style="padding: 20px 0px 20px 0px; color: white;">
                    <?php echo $std['nm_standar']; ?>
                  </h5>
                </center>

                <a href="#" class="small-box-footer btn" data-card-widget="collapse">Lihat Selengkapnya</a>
                <div class="card-body" style="color: white; position: relative; left: -25px;">
                  <ol class="ratafont">
                    <?php
                    $sub_standar = mysqli_query($conn, "SELECT * FROM tb_sub_standar WHERE id_standar = $i");
                    $urut = 1;
                    while ($sub_std = mysqli_fetch_assoc($sub_standar)) {
                      $idSubstandar1 = $sub_std['id_sub_standar'];
                    ?>
                      <li>
                        <a class="linkfont" href="content.php?mod=borang&standar=<?php echo $idStandar; ?>&sub_standar1=<?php echo $idSubstandar1; ?>&urut=<?php echo $urut; ?>"><?= $sub_std['nm_sub_standar']; ?></a>
                      </li>
                    <?php $urut++;
                    } ?>
                  </ol>
                </div>
              </div>
            </div>
          <?php
            $i++;
          }
          ?>
        </div>
    </section>
  </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-pre
    </div>
    <strong>Copyright &copy; TMJ 2020-2025 <a href="index.php">SITEBOT</a>.</strong> All rights reserved.
  </footer>

  <!-- KUMPULAN SCRIPT -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>