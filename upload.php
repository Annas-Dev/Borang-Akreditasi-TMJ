<?php
if (!empty($_FILES)) {
  // Include the database configuration file 
  require 'functions.php';
  $idStandart = isset($_GET['standar']) ? $_GET['standar'] : 0;
$idSubStandart1 = isset($_GET['sub_standar1']) ? $_GET['sub_standar1'] : 0;
$idSubStandart2 = isset($_GET['sub_standar2']) ? $_GET['sub_standar2'] : 0;
$idUrut = isset($_GET['urut']) ? $_GET['urut'] : 0;
  // File path configuration 
  $uploadDir = "uploads/";
  $fileName = basename($_FILES['file']['name']);
  $uploadFilePath = $uploadDir . $fileName;

  // Upload file to server 
  if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath)) {
    // Insert file information in the database 

    $query = "UPDATE tb_sub_standar set isi_sub_standar ='$fileName' WHERE id_sub_standar=$idSubStandart1";
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
  }else{
    echo "<script>
    alert('GAGAL');
  </script>";

  }
}