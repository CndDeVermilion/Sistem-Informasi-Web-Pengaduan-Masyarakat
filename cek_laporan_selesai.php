<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>APM | Lihat Semua Tanggapan</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <h1 class="h3 mb-0 text-gray-800">Semua Tanggapan</h1>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Card -->
          <div class="card shadow">
            <div class="card-body">
              <div class="form-group cols-sm-6">
                <a href="?url=laporan_selesai" class="btn btn-success"> 
                  <span class="icon text-white-100">
                    <i class="fas fa-arrow-left"></i>
                  </span>
                  <span class="text">Kembali</span>
                </a>
              </div>
              <hr>

              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>ID Tanggapan</th>
                      <th>ID Pengaduan</th>
                      <th>Tanggal Tanggapan</th>
                      <th>Tanggapan</th>
                      <th>ID Petugas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    require 'conn.php';
                    
                    // Query untuk mengambil semua data tanggapan
                    $query = "SELECT * FROM tanggapan";
                    $result = mysqli_query($db, $query);
                    $no = 1;

                    // Loop untuk menampilkan data tanggapan
                    while ($data = mysqli_fetch_assoc($result)) {  
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['id_tanggapan']; ?></td>
                      <td><?php echo $data['id_pengaduan']; ?></td>
                      <td><?php echo $data['tgl_tanggapan']; ?></td>
                      <td><?php echo $data['tanggapan']; ?></td>
                      <td><?php echo $data['id_petugas']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- End Card -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->

      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
