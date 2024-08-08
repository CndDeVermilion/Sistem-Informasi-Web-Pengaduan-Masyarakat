<?php
$hostname = "localhost";
$username = "id22365748_apm";
$password = "APM.4B.Pagi";
$database_name  = "id22365748_db_apm";

// Membuat koneksi ke database
$db = mysqli_connect($hostname, $username, $password, $database_name);

// Memeriksa koneksi
if($db->connect_error) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    die("Error!");
}

// No output should be here, ensure there's no whitespace or HTML before <?php tag.
?>
