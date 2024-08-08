<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>APM | Lihat Laporan</title>


  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Lihat Laporan</h1>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Detail Laporan</h5>
      </div>
      <div class="card-body">
        <h6>Laporan yang telah anda buat</h6>
        <div class="table-responsive">
<!-- Tabel -->
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Laporan</th>
                <th>NIK</th>
                <th>Isi Laporan</th>
                <th>Foto</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              require 'conn.php';
              $result = mysqli_query($db, "SELECT * FROM pengaduan WHERE nik='$_SESSION[nik]'");
              $no = 1;
              while ($data = mysqli_fetch_array($result)) {  
              ?>
              <tr>
                <td>
                  <?php echo $no++; ?>
                </td>
                <td>
                  <?php echo $data['tgl_pengaduan']; ?>
                </td>
                <td>
                  <?php echo $data['nik']; ?>
                </td>
                <td>
                  <?php echo $data['isi_laporan']; ?>
                </td>
                <td>
                  <?php echo $data['foto']; ?>
                </td>
                <td>
                  <?php echo $data['status']; ?>
                </td>
                <td>
                  <a href="?url=detail_laporan&id=<?php echo $data['id_pengaduan']; ?>" 
                  class="btn btn-warning btn-icon-split">
                  <span class="icon tet-white-50">
                    <i class="fas fa-info"></i>
                  </span>
                  <span class="text">detail</span>
                  </a>

                  <a href="?url=lihat_tanggapan&id=<?php echo $data['id_pengaduan']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-eye"></i>
                    </span>
                    <span class="text">Lihat Tanggapan</span>
                  </a>
                </td>
                <br>
              </tr>
              
              <?php } ?>
            </tbody>
          </table>
<!-- Tabel -->
        </div>
      </div>
    </div>
  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="js/demo/datatables-demo.js"></script>
</body>
</html>