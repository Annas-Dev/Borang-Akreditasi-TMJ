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
  <title>CONTENT SITEBOT</title>

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

  <style>
    .submenuaktif {
      background: #DDD;
      color: #000;
    }
  </style>
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
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

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
        } else { ?>
          <a class="nav-link" href="login.php" role="button">
            <i class="nav-icon fas fa-sign-in-alt" name="logout"></i>
          </a>
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
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <!-- CONTENT ISI BORANG  -->
          <li class="nav-header">ISI BORANG</li>

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
                  Standar <?= $std['id_standar'] ?>
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
                        <i class="nav-icon"><?php echo $std['id_standar'] . " . " ?><?php echo $j; ?></i>
                      </a>
                    <?php } else { ?>
                      <a href="content.php?mod=borang&standar=<?php echo $idStandar; ?>&sub_standar1=<?php echo $idSubstandar1; ?>&urut=<?php echo $j; ?>" class="nav-link">
                        <i class="nav-icon"><?php echo $std['id_standar'] . " . " ?><?php echo $j; ?></i>
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






  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="container">
    <?php include "route.php"; ?>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-pre
    </div>
    <strong>Copyright &copy; TMJ 2020-2025 <a href="index.php">SITEBOT</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->




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
  <!-- script ajax -->

  <!-- CKEditor -->
  <script src="ckeditor5-build-decoupled-document/ckeditor.js"></script>
  <script>
    DecoupledEditor
      .create(document.querySelector('#editor'))
      .then(editor => {
        const toolbarContainer = document.querySelector('#toolbar-container');

        toolbarContainer.appendChild(editor.ui.view.toolbar.element);
      })
      .catch(error => {
        console.error(error);
      });
  </script>
</body>

</html>