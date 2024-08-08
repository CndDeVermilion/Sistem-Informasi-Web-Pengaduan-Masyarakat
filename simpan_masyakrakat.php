<?php
  require "conn.php";
  
  if(isset($_POST["register"])) {
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $telp = $_POST["telp"];

    $sql = "INSERT INTO `akun`(`nik`, `nama`, `username`, `password`, `telp`) VALUES
    ('$nik','$nama','$username','$password','$telp')";

    if($db->query($sql)) {
        echo '<script>';
        echo 'alert("Akun berhasil dibuat!");';
        echo 'window.location.href = "index.php";';
        echo '</script>';
    } else {
        echo "data tidak masuk";
    }
  }
?>