<?php 

$conn = mysqli_connect("localhost", "root", "", "borang_tmj", 33060);

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function register($data)
{
    global $conn;
    $username = strtolower(stripcslashes($data['username']));
    $nip = $data['nip'];
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // cek username apakah sudah digunakan atau belum
    $cek_uname = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($cek_uname)) {
        echo "<script>
                alert('Username telah digunakan');
              </script>";
        return 0;
    }

    // cek nip apakah sudah ada atau belum
    $cek_nip = mysqli_query($conn, "SELECT nip_user FROM user WHERE nip_user = '$nip'");
    if (mysqli_fetch_assoc($cek_nip)) {
        echo "<script>
                alert('NIP telah digunakan');
              </script>";
        return 0;
    }

    // cek password apakah sudah sama dengan password konfirmasi
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
              </script>";
        return 0;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // masukkan data ke database
    $query = "INSERT INTO user VALUES ('', '$nip', '$username', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>