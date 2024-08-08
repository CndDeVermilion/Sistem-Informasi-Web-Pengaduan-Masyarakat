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
  <title>APM | Edit Petugas</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
<div id="page-top">
    <div class="card shadow">
        <div class="card-header">Edit Masyarakat</div>
        <div class="card-body">
        <a href="?url=akun_masyarakat" class="btn btn-success"> 
            <span class="icon text-white-100">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        <hr>

        <?php 
            require 'conn.php';
                $sql = mysqli_query($db, "SELECT * FROM akun WHERE nik='$_GET[nik]'");
                if ($data = mysqli_fetch_array($sql)) {  
        ?>
        
            <form action="update_masyarakat.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group cols-sm-6">
                    <label>NIK</label>
                    <input type="text" name="nik" value="<?php echo $data['nik']; ?>" class="form-control" readonly>
                </div>
                <br>
                <div class="form-group cols-sm-6">
                    <label>Nama</label>
                    <input type="text" name="nama" value="<?php echo $data['nama']; ?>" class="form-control" >
                </div>
                <br>
                <div class="form-group cols-sm-6">
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $data['username']; ?>" class="form-control" >
                </div>
                <br>
                <div class="form-group cols-sm-6">
                    <label>Password</label>
                    <input type="text" name="password" value="<?php echo $data['password']; ?>" class="form-control">
                </div>
                <br>
                <div class="form-group cols-sm-6">
                    <label>Telepon</label>
                    <input type="text" name="telp" value="<?php echo $data['telp']; ?>" class="form-control" >
                </div>
                <br>
                <div class="form-group cols-sm-6">
                    <input type="submit" name="register" value="Update Akun" class="btn btn-primary">
                    <input type="reset" value="Reset" class="btn btn-danger">
                </div>
            </form>

        <?php
            }                   
        ?>

        </div>
    </div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
</body>
</html>
