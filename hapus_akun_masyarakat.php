<?php
require "conn.php";

if(isset($_GET["nik"])) {
    $nik = $_GET['nik']; // Ensure this is the primary key or unique identifier

    // Prepare statement to delete data from `akun` table
    $delete_akun = $db->prepare("DELETE FROM `akun` WHERE `nik` = ?");
    $delete_akun->bind_param("s", $nik);

    // Execute query to delete data from `akun`
    if($delete_akun->execute()) {
        // If query is successfully executed
        echo '<script>';
        echo 'alert("Akun berhasil dihapus!");';
        echo 'window.location.href = "admin.php?url=akun_masyarakat";';
        echo '</script>';
    } else {
        // If there is an error executing the query
        echo '<script>';
        echo 'alert("Gagal menghapus akun: ' . $db->error . '");';
        echo 'window.location.href = "admin.php?url=akun_masyarakat&nik=' . $nik . '";'; // Redirect to the edit page if there is an error
        echo '</script>';
    }

    // Close prepared statement
    $delete_akun->close();
}
?>
