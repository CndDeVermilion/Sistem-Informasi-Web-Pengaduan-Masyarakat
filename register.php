<?php
  require "conn.php";

  if(isset($_POST["register"])) {
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $telp = $_POST["telp"];

    // Prepare the SQL statement
    $stmt = $db->prepare("INSERT INTO `akun`(`nik`, `nama`, `username`, `password`, `telp`) VALUES (?, ?, ?, ?, ?)");
    
    // Bind parameters
    $stmt->bind_param("sssss", $nik, $nama, $username, $password, $telp);

    // Execute the statement
    if($stmt->execute()) {
        echo '<script>';
        echo 'alert("Akun berhasil dibuat!");';
        echo 'window.location.href = "index.php";';
        echo '</script>';
    } else {
        // Display detailed error message
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>APM | Daftar</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Card Body -->
            <div class="row">
              <div class="col-lg-0 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Hai Warga👋</h1>
                    <p>Silahkan buat akun jika belum mempunyai akun</p>
                  </div>
                  <!-- Form -->
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="nik" name="nik" aria-describedby="text" placeholder="Masukan NIK" required>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="nama" name="nama" aria-describedby="text" placeholder="Masukan Nama" required>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="text" placeholder="Masukan Username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="telp" name="telp" aria-describedby="text" placeholder="Masukan Nomor Telepon" required>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" href="index.php" role="button" type="submit" name="register">Buat Akun</button>
                    </input>
                  </form>
                  <!-- End Form -->
                  <hr>
                  <div class="text-center">
                    <p>Sudah Mempunyai Akun?
                    <a href="index.php"><b>Masuk</b></a>
                    </p>
                    <br>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
