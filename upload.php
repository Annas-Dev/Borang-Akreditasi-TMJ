<?php
if (!empty($_FILES)) {
  // Include the database configuration file 
  require 'functions.php';
  $idStandart = isset($_GET['standar']) ? $_GET['standar'] : 0;
  $idSubStandart1 = isset($_GET['sub_standar1']) ? $_GET['sub_standar1'] : 0;
  $idSubStandart2 = isset($_GET['sub_standar2']) ? $_GET['sub_standar2'] : 0;
  $idUrut = isset($_GET['urut']) ? $_GET['urut'] : 0;
  // File path configuration 
  
  $uploadDir = "DataPendukung/"."Standar"."$idStandart/$idSubStandart1/";
  if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
  }

  $fileName = basename($_FILES['file']['name']);
  $fileType = basename($_FILES['file']['type']);
  $fileSize = basename($_FILES['file']['size']);
  $uploadFilePath = $uploadDir . $fileName;

  // Upload file to server 
  if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath)) {
    // Insert file information in the database 
    echo "<script>
            alert('Data berhasil di simpan');
            
          </script>";

    $query = "INSERT INTO tb_lampiran (`id_lampiran`, `id_sub_sub_sub_standar`, `id_sub_sub_standar`, `id_sub_standar`, `id_standar`, `nama_lampiran`, `tipe_lampiran`, `ukuran_lampiran`) 
              VALUES (NULL, NULL, NULL, '$idSubStandart1', '$idStandart', '$fileName', '$fileType', '$fileSize');";

    $insert = mysqli_query($conn, $query);
    if ($insert) {
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
    alert('GAGAL');
  </script>";
  }
}
