<?php
require "conn.php";

if(isset($_GET["id_petugas"])) {
    $id_petugas = $_GET['id_petugas']; 

    // First, delete the related records in the `tanggapan` table
    $sql_tanggapan = "DELETE FROM `tanggapan` WHERE `id_petugas`='$id_petugas'";
    if($db->query($sql_tanggapan)) {
        // Then, delete the record in the `petugas` table
        $sql_petugas = "DELETE FROM `petugas` WHERE `id_petugas`='$id_petugas'";
        if($db->query($sql_petugas)) {
            // If both queries are successfully executed
            echo '<script>';
            echo 'alert("Akun berhasil dihapus!");';
            echo 'window.location.href = "admin.php?url=akun_admin";';
            echo '</script>';
        } else {
            // If there is an error executing the second query
            echo '<script>';
            echo 'alert("Gagal menghapus data dari tabel petugas: ' . $db->error . '");';
            echo 'window.location.href = "admin.php?url=akun_admin&id_petugas=' . $id_petugas . '";'; // Redirect to the edit page if there is an error
            echo '</script>';
        }
    } else {
        // If there is an error executing the first query
        echo '<script>';
        echo 'alert("Gagal menghapus data dari tabel tanggapan: ' . $db->error . '");';
        echo 'window.location.href = "admin.php?url=akun_admin&id_petugas=' . $id_petugas . '";'; // Redirect to the edit page if there is an error
        echo '</script>';
    }
}
?>
