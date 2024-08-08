<?php
require "conn.php";

if(isset($_POST["register"])) {
    $id_petugas = $_POST['id_petugas'];
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $telp = $_POST["telp"];

    // Gunakan prepared statement
    $sql = "INSERT INTO `petugas`(`id_petugas`, `nik`, `nama`, `username`, `password`, `telp`) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $db->prepare($sql);
    $stmt->bind_param("isssss", $id_petugas, $nik, $nama, $username, $password, $telp);

    if($stmt->execute()) {
        // Jika query berhasil dijalankan
        echo '<script>';
        echo 'alert("Akun berhasil dibuat!");';
        echo 'window.location.href = "admin.php?url=akun_admin";';
        echo '</script>';
    } else {
        // Jika terjadi kesalahan saat menjalankan query
        echo '<script>';
        echo 'alert("Gagal menyimpan data: ' . $stmt->error . '");';
        echo 'window.location.href = "admin.php?url=tambah_petugas";';
        echo '</script>';
    }

    // Tutup statement
    $stmt->close();
}
?>
