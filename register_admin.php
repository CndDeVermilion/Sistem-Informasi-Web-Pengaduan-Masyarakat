<?php
require "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah semua field tersedia
    if (isset($_POST['nama_petugas'], $_POST['username'], $_POST['password'], $_POST['telp'], $_POST['level'])) {
        $nama_petugas = $_POST['nama_petugas'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $telp = $_POST['telp'];
        $level = $_POST['level'];

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Validasi input dan cegah XSS
        $nama_petugas = htmlspecialchars(strip_tags($nama_petugas));
        $username = htmlspecialchars(strip_tags($username));
        $telp = htmlspecialchars(strip_tags($telp));
        $level = htmlspecialchars(strip_tags($level));

        // Siapkan pernyataan SQL untuk menyimpan pengguna baru
        $query = "INSERT INTO petugas (nama_petugas, username, password, telp, level) VALUES (?, ?, ?, ?, ?)";
        if ($stmt = $db->prepare($query)) {
            $stmt->bind_param("sssss", $nama_petugas, $username, $hashed_password, $telp, $level);

            // Eksekusi pernyataan SQL
            if ($stmt->execute()) {
                // Redirect ke halaman login setelah registrasi berhasil
                header("Location: login_admin.php");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }

            // Tutup pernyataan
            $stmt->close();
        } else {
            echo "Error: " . $db->error;
        }

        // Tutup koneksi database
        $db->close();
    } else {
        echo "Semua field harus diisi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi Admin/Petugas</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Registrasi Admin/Petugas
          </div>
          <div class="card-body">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group">
        <label for="nama_petugas">Nama Petugas:</label>
        <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="telp">No Telp:</label>
        <input type="text" name="telp" id="telp" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="level">Jabatan:</label>
        <select name="level" id="level" class="form-control" required>
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Daftar</button>
</form>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
