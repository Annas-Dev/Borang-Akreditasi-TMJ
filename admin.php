<?php 

session_start();
if (!isset($_SESSION['login'])) {
  header('Location: login.php');
}

if ((time() - $_SESSION['timer']) > 60) {
  header('Location: login.php');
}

if(isset($_POST['logout'])){
  unset($_SESSION['login']);
  session_destroy();
  header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADMIN SITEBOT</title>
  <!-- CKEditor -->
  <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
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
          <form action="" method="post">
            <button type="submit" name="logout">
              <a class="nav-link"  role="button">
                <i class="nav-icon fas fa-sign-in-alt"></i>
              </a>
            </button>
            
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
  
      <!-- ASIDE CONTENT -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <!-- LOGO SITEBOT -->
        <a href="index3.html" class="brand-link">
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
              <div class="d-block" style="color: #fff;">Admin 42619023</div>
            </div>
          </div>
    
          <!-- NAVIGASI MENU -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

              <!-- HOME MENU -->
              <li class="nav-item">
                <a href="#" class="nav-link"  >
                  <i class="nav-icon fas fa-home" ></i>
                  <p>
                    Editor
                  </p>
                </a>
              </li>

              
              <!-- CONTENT DATA PENDUKUNG 
              <li class="nav-header">DATA PENDUKUNG</li> -->

              <!-- PRFILE TMJ 
              <li class="nav-item bottom">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>Profil TMJ</p>
                </a>
              </li>-->
              
            </ul>
            <!-- /.NAVIGASI MENU -->
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>


      <div class="content-wrapper">

      <br>
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <!-- Default box -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Sitebot Editor</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <br>
                  <center><h1>Editor Borang</h1></center>
                  <br>
                  <form action="" method="post">
                      <textarea name="content" id="editor" placeholder="Isilah Konten Di sini">

                      </textarea>
                      <br>
                      <center>
                      <p><input type="submit" value="Submit"></p>
                    </center>
                  </form>
                  <script>
                      ClassicEditor
                          .create( document.querySelector( '#editor' ) )
                          .catch( error => {
                              console.error( error );
                          } );
                  </script>
                  <!-- /.card-body -->

                  <!-- /.card-footer-->
                </div>
                <!-- /.card -->
              </div>
            </div>
          </div>
        </section>
        <!-- /.content -->
      </div>


      


<!-- KUMPULAN SCRIPT -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<script src="dist/js/adminlte.js"></script>
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
<!-- CK Editor -->
<script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
</body>
</html>
