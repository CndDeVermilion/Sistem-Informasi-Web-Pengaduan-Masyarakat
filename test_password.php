<?php
// Koneksi ke database
require "conn.php";

// Username yang ingin diuji
$username = "yudd";

// Password yang ingin diuji
$password_input = "yudd123";
$password = "admin123"; // Password yang akan di-hash
$hashed_password = password_hash($password, PASSWORD_DEFAULT);


// Query untuk mengambil hash password dari database
$query = "SELECT password FROM petugas WHERE username = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $hash_password = $data['password'];

    // Verifikasi password
    if (password_verify($password_input, $hash_password)) {
        echo "Password valid!";
    } else {
        echo "Password tidak valid.";
    }
} else {
    echo "Username tidak ditemukan.";
}

// Tutup koneksi
$stmt->close();
$db->close();
?>
