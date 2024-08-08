<?php
require "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $db->prepare("SELECT * FROM petugas WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $cek = $result->num_rows;

    if ($cek > 0) {
        $data = $result->fetch_assoc();
        session_start();
        $_SESSION["id_petugas"] = $data["id_petugas"];
        $_SESSION["nama"] = $data["nama"];
        $_SESSION["nik"] = $data["nik"];
        $stmt->close(); // Tutup statement setelah selesai menggunakan
        header('Location: admin.php');
        exit();
    } else {
        $stmt->close(); // Tutup statement jika login gagal
        echo '<script type="text/javascript">
            alert("Username atau Password Salah");
            window.location="login_admin.php";
        </script>';
        exit(); // Keluar dari skrip setelah menampilkan pesan
    }
}
?>
