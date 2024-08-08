<?php
include "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>APM | Tambah Petugas</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
<div id="page-top">
    <div class="card shadow">
        <div class="card-header">Tambah Petugas</div>
        <div class="card-body">
        <a href="?url=validasi_laporan" class="btn btn-success"> 
            <span class="icon text-white-100">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        <hr>
            <form action="simpan_petugas.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group cols-sm-6">
                    <label>ID Petugas</label>
                        <?php
                        // Ambil id_petugas terakhir dari database untuk ditampilkan
                        $query = "SELECT id_petugas FROM petugas ORDER BY id_petugas DESC LIMIT 1";
                        $result = $db->query($query);
                        if ($result && $result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $next_id = $row['id_petugas'] + 1;
                        } else {
                            $next_id = 1; // Jika tabel masih kosong, maka id_petugas dimulai dari 1
                        }
                        ?>
                    <input type="text" name="id_petugas" value="<?php echo $next_id; ?>" class="form-control" readonly>
                </div>
                <div class="form-group cols-sm-6">
                    <label>NIK</label>
                    <input type="text" name="nik" value="" class="form-control">
                </div>
                <br>
                <div class="form-group cols-sm-6">
                    <label>Nama Petugas</label>
                    <input type="text" name="nama" value="" class="form-control">
                </div>
                <br>
                <div class="form-group cols-sm-6">
                    <label>Username</label>
                    <input type="text" name="username" value="" class="form-control">
                </div>
                <br>
                <div class="form-group cols-sm-6">
                    <label>Password</label>
                    <input type="password" name="password" value="" class="form-control">
                </div>
                <br>
                <div class="form-group cols-sm-6">
                    <label>Telepon</label>
                    <input type="text" name="telp" value="" class="form-control">
                </div>
                <br>
                <div class="form-group cols-sm-6">
                    <input type="submit" name="register" value="Buat Akun" class="btn btn-primary">
                    <input type="reset" value="Reset" class="btn btn-danger">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
</body>
</html>
