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

  <title>APM | Detail Laporan</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
<div id="page-top">

    <div class="card shadow">
        <div class="card-header">Tanggapan</div>
        <div class="card-body">
        <div class="form-groub cols-sm-6">
            <a href="?url=lihat_validasi_laporan" class="btn btn-success"> 
                <span class="icon text-white-100">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
            <hr>
            <form action="simpan_tanggapan.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group cols-sm-6">
                    <label>ID Pengaduan</label>
                    <input type="text" name="id" value="<?php  echo $_GET['id']; ?>" class="form-control" readonly>
                </div>
                <br>

                <div class="form-group cols-sm-6">
                    <label>Tanggal Tanggapan</label>
                    <input type="text" name="tgl_tanggapan" value="<?php echo date('d-m-y'); ?>" class="form-control" readonly>
                </div>
                <br>

                <div class="form-group cols-sm-6">
                    <label>Tulis Tanggapan</label>
                    <textarea class="form-control" rows="7" name="tanggapan">
                    </textarea>
                </div>
                <br>

                <div class="form-group cols-sm-6">
                    <label>Nama Petugas</label>
                    <input type="text" name="id_petugas" value="<?php echo $_SESSION['id_petugas']; ?>" class="form-control" readonly >
                </div>  

                <hr>
                <input type="submit" class="btn btn-success btn-user" value="Tanggapi">
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