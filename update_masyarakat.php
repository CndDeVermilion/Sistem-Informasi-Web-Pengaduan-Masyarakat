<?php
require "conn.php";

if(isset($_POST["register"])) {
    $id_petugas = $_POST['id_petugas']; // Ensure this is the primary key or unique identifier
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $telp = $_POST["telp"];

    // Query to update data in the database
    $sql = "UPDATE `akun` 
            SET `nama`='$nama', `username`='$username', `password`='$password', `telp`='$telp' 
            WHERE `nik`='$nik'";

    if($db->query($sql)) {
        // If query is successfully executed
        echo '<script>';
        echo 'alert("Akun berhasil diupdate!");';
        echo 'window.location.href = "admin.php?url=akun_masyarakat";';
        echo '</script>';
    } else {
        // If there is an error executing the query
        echo '<script>';
        echo 'alert("Gagal mengupdate data: ' . $db->error . '");';
        echo 'window.location.href = "admin.php?url=edit_masyarakat&inik=' . $inik. '";'; // Redirect to the edit page if there is an error
        echo '</script>';
    }
}
?>
