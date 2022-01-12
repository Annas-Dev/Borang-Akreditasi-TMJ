<!-- Content Header (Page header) -->
<?php
$idStandart = isset($_GET['standar']) ? $_GET['standar'] : 0;
$idSubStandart1 = isset($_GET['sub_standar1']) ? $_GET['sub_standar1'] : 0;
$idSubStandart2 = isset($_GET['sub_standar2']) ? $_GET['sub_standar2'] : 0;
$idUrut = isset($_GET['urut']) ? $_GET['urut'] : 0;
$sql = mysqli_query($conn, "SELECT * FROM tb_sub_standar WHERE id_sub_standar = $idSubStandart1");
$data = mysqli_fetch_array($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
</head>

<body>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 id="id-sub-standar">Standar <?php echo $idStandart; ?>.<?php echo $idUrut; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#" id="id-standar">Standar<?php echo $idStandart; ?></a></li>
            <li class="breadcrumb-item active" id="id-sub-standar">Standar <?php echo $idStandart; ?>.<?php echo $idUrut; ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <form action="" method="post" enctype="multipart/form-data">
            <?php
            if (isset($_SESSION['login'])) { ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title" id="nama-standar"><?php echo $data['nm_sub_standar']; ?></h3>
                    </div>

                    <div class="card-body">
                        <textarea id="editor" name="editor"><?php echo $data['isi_sub_standar']; ?></textarea>
                    </div>
                    
                    <div class="card-footer">
                      <input type="submit" name="simpan_borang" value="Simpan" class="btn btn-primary float-right">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title" id="nama-standar">Data Pendukung <?php echo $data['nm_sub_standar']; ?></h3>
                    </div>

                    <div class="card-body">
                      <div class="dropzone" name="isi"></div>
                    </div>

                    <div class="card-footer">
                      <div class="col-lg-4 ">
                        <div class="btn-group w-100 float-right">
                          <button type="submit" class="btn btn-primary col start" id="startUpload">
                            <i class="fas fa-upload"></i>
                            <span>Start upload</span>
                          </button>
                          <button type="reset" class="btn btn-warning col cancel">
                            <i class="fas fa-times-circle"></i>
                            <span>Cancel upload</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            <?php } else { ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title" id="nama-standar"><?php echo $data['nm_sub_standar']; ?></h3>
                    </div>
                    <div class="card-body">
                      <?php
                      $kontent = $data['isi_sub_standar'];
                      if ($kontent != "") { ?>
                        <p id="isi-standar"><?php echo $kontent; ?></p>
                        <!-- <embed src="uploads/<?php //echo $kontent 
                                                  ?>" type="application/pdf" width="100%" height="700"> -->
                      <?php } else { ?>
                        <p style="height: 100px;" class="d-flex justify-content-center d-flex align-items-center" id="isi-standar">Data tidak ditemukan</p>
                      <?php } ?>
                    </div>
                    <div class="card-footer">
                      <a href="login.php?standar=<?php echo $idStandart; ?>&sub_standar1=<?php echo $idSubStandart1; ?>&urut=<?php echo $idUrut; ?>">Silahkan login untuk mengisi borang</a>
                    </div>

                  </div>
                </div>
              </div>
            <?php } ?>

          </form>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</body>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script>
  //Disabling autoDiscover
  Dropzone.autoDiscover = false;

  $(function() {
    //Dropzone class
    var myDropzone = new Dropzone(".dropzone", {
      url: "upload.php?standar=<?php echo $idStandart; ?>&sub_standar1=<?php echo $idSubStandart1; ?>",
      paramName: "file",
      maxFilesize: 2,
      maxFiles: 10,
      acceptedFiles: "image/*,application/pdf",
      autoProcessQueue: false
    });

    $('#startUpload').click(function() {
      myDropzone.processQueue();
    });
  });
</script>

<script>
  CKEDITOR.replace('editor');
</script>

</html>

<?php
if (isset($_POST['simpan_borang'])) {
  $konten = $_POST['editor'];
  // masukkan data ke database
  if ($konten != "") {
    $query = "UPDATE tb_sub_standar set isi_sub_standar = '$konten' WHERE id_sub_standar=$idSubStandart1";
    $update = mysqli_query($conn, $query);
    if ($update) {
      echo "<script>
          alert('Data berhasil di simpan');
          window.location.href = 'content.php?mod=borang&standar=$idStandart&sub_standar1=$idSubStandart1&urut=$idUrut';
        </script>";
    } else {
      echo "<script>
          alert('Data Gagal di simpan');
          window.location.href = 'content.php?mod=borang&standar=$idStandart&sub_standar1=$idSubStandart1&urut=$idUrut';
        </script>";
    }
  } else {
    echo "<script>
          alert('tidak');
          window.location.href = 'content.php?mod=borang&standar=$idStandart&sub_standar1=$idSubStandart1&urut=$idUrut';
        </script>";
  }
}
?>