<?php
require "conn.php";

// Ensure no output here before session_start()

session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $db->prepare("SELECT * FROM akun WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $cek = $result->num_rows;

    if ($cek > 0) {
        $data = $result->fetch_assoc();

        $_SESSION["nama"] = $data["nama"];
        $_SESSION["nik"] = $data["nik"];
        header('Location: masyarakat.php');
        exit();
    } else {
        echo '<script type="text/javascript">
            alert("Username atau Password Salah");
            window.location="login.php";
        </script>';
        exit(); // Ensure script stops execution after redirect
    }

    $stmt->close();
}
?>
