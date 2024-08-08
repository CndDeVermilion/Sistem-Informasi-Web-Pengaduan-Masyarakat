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

  <title>APM | Lihat Tanggapan</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
<div id="page-top">
    <div class="card shadow">
        <div class="card-body">
        <h5 class="m-0 font-weight-bold text-primary">Detail Tanggapan</h5>
        <hr>
            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-groub cols-sm-6">
                <a href="?url=lihat_laporan" class="btn btn-success"> 
                <span class="icon text-white-100">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
                </a>
            </div>
            <br>
                <?php
                require 'conn.php';
                $sql = mysqli_query($db, "SELECT * FROM pengaduan,tanggapan WHERE tanggapan.id_pengaduan='$_GET[id]' AND tanggapan.id_pengaduan=pengaduan.id_pengaduan");
                
                $cek = mysqli_num_rows($sql); // Added semicolon and corrected function
                
                if ($cek < 1) {
                    echo "<font color='red'>Mohon bersabar, pengaduan belum ditanggapi!!</font>";
                } else {
                    if ($data = mysqli_fetch_array($sql)) {
                ?>

                <div class="form-group cols-sm-6">
                    <label>Tanggal Tanggapan</label>
                    <input type="text" name="tgl_pengaduan" value="<?php echo $data['tgl_tanggapan'] ?>" class="form-control" readonly>
                </div>
                <br>

                <div class="form-group cols-sm-6">
                    <label>Tulis Laporan</label>
                    <textarea class="form-control" rows="7" name="isi_laporan" readonly><?php echo $data['isi_laporan']; ?></textarea>
                </div>
                <br>

                <div class="form-group cols-sm-6">
                    <label>Tulis Tanggapan</label>
                    <textarea class="form-control" rows="7" name="isi_laporan" readonly><?php echo $data['tanggapan']; ?></textarea>
                </div>
                <br>

                <div class="form-group cols-sm-6">
                    <label>Foto</label>
                    <div>
                    <img src="foto/<?php echo $data['foto']; ?>" width="50%">
                    </div>
                </div>

                <?php 
                    }
                }
                ?>
                <br>      
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
