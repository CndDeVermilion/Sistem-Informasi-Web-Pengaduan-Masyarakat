<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>APM | Akun</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <h1 class="h3 mb-0 text-gray-800">Akun Masyarakat</h1>
        </nav>

        <div class="container-fluid">
          <div class="card shadow">
            <div class="card-body">
            <h5>Data Akun Masyarakat</h5>
              <hr>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Telepon</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                <?php 
                require 'conn.php';
                $query = "SELECT * FROM akun";
                $result = mysqli_query($db, $query);
                $no = 1;

                while ($data = mysqli_fetch_assoc($result)) {  
                ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['nik']; ?></td>
                      <td><?php echo $data['nama']; ?></td>
                      <td><?php echo $data['username']; ?></td>
                      <td><?php echo $data['password']; ?></td>
                      <td><?php echo $data['telp']; ?></td>
                      <td class="text-center">
                        <a class="btn btn-success btn-circle" href="admin.php?url=edit_masyarakat&nik=<?php echo $data['nik']; ?>">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-circle" href="#" onclick="confirmDelete('<?php echo $data['nik']; ?>')">
                          <i class="fa fa-trash"></i>
                        </a>
                      </td>
                    </tr>

                <?php } ?>
                  </tbody>

            </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>

<script>
function confirmDelete(nik) {
    if (confirm("Apakah Anda yakin ingin menghapus akun ini?")) {
        window.location.href = "hapus_akun_masyarakat.php?nik=" + nik;
    }
}
</script>

</body>
</html>
