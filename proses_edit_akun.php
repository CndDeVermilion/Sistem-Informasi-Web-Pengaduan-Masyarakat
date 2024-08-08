<?php
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_akun'])) {
    $id_akun = $_POST['id_akun'];
    $password = $_POST['password'];

    // Enkripsi password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk update password
    $query = "UPDATE akun SET password = '$hashed_password' WHERE id_akun = '$id_akun'";

    if (mysqli_query($db, $query)) {
        // Redirect ke halaman akun.php setelah berhasil
        header("Location: akun.php");
        exit();
    } else {
        // Jika terjadi kesalahan dalam update
        echo "Error: " . $query . "<br>" . mysqli_error($db);
    }
} else {
    // Jika permintaan tidak valid
    echo "Permintaan tidak valid";
}
?>
