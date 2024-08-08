<?php
session_start(); 

require 'conn.php';

if (!isset($_SESSION['nama'])) {
    header('Location: admin.php'); 
    exit();
}

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    switch($url) {
        case 'validasi_laporan':
            include 'validasi_laporan.php';
            break;
        case 'detail_validasi':
            include 'detail_validasi.php'; 
            break;
        case 'detail_laporan':
            include 'detail_laporan.php';
            break;
        case 'lihat_validasi':
            include 'lihat_validasi.php';
            break;
        case 'lihat_validasi_laporan':
            include 'lihat_validasi_laporan.php';
            break;
        case 'tanggapan':
            include 'tanggapan.php'; 
            break;
        case 'laporan_selesai':
            include 'laporan_selesai.php';
            break;
        case 'cek_laporan_selesai':
            include 'cek_laporan_selesai.php'; 
            break;
        case 'akun_masyarakat':
            include 'akun_masyarakat.php'; 
            break;
        case 'edit_masyarakat':
            include 'edit_masyarakat.php'; 
                break;
        case 'akun_admin':
            include 'akun_admin.php'; 
            break;
        case 'tambah_petugas':
            include 'tambah_petugas.php'; 
            break;
        case 'simpan_petugas':
            include 'akun_admin.php'; 
            break;
        case 'edit_petugas':
            include 'edit_petugas.php'; 
            break;
        default:
            echo 'Halaman tidak ditemukan';
    }
} else {
    ?>
    <?php 
    $query_masuk = mysqli_query($db, "SELECT COUNT(*) AS total FROM pengaduan WHERE status='0'");
    $query_selesai = mysqli_query($db, "SELECT COUNT(*) AS total FROM pengaduan WHERE status='selesai'");

    if ($query_masuk && $query_selesai) {
        $data_masuk = mysqli_fetch_assoc($query_masuk);
        $data_selesai = mysqli_fetch_assoc($query_selesai);

        $jumlah_masuk = $data_masuk['total'];
        $jumlah_selesai = $data_selesai['total'];
    ?>
    

<style>
    .fixed-height {
        height: 500px;
    }
    .mt-3 {
        margin-top: 1rem;
    }
</style>
<!-- Konten disini-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card bg-primary card-white h-100">
                <div class="card-body" style="color: white;">
                    <!-- Your content 1 here -->
                    <h1 class="display-4"><b>Selamat Datang!</b></h1>
                    <hr class="border border-3">
                    <h5>Kamu login sebagai Admin :<b> <?php echo $_SESSION['nama']; ?></b></h5>
                    <br>
                    <p>Jika Anda memerlukan bantuan atau informasi lebih lanjut, jangan ragu untuk menghubungi tim support kami. Terima kasih telah berpartisipasi dalam menciptakan lingkungan pelayanan publik yang lebih baik.</p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card bg-primary card-white fixed-height">
                <div class="card-body d-flex justify-content-center align-items-center" style="color: white;">
                    <!-- Your content 2 here -->
                    <img src="img/admin2.png" class="img-fluid" alt="Admin Image">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
            <a href="?url=validasi_laporan" class="text-decoration-none">
                <div class="card bg-warning card-white h-100">
                    <div class="card-body d-flex justify-content-between align-items-center" aria-readonly="true">
                        <div class="col mr-2">
                            <div class="text-m font-weight-bold text-white text-uppercase mb-1">Laporan Masuk</div>
                            <hr class="border border-2">
                            <div class="h5 mb-0 font-weight-bold text-white">Ada <?php echo $jumlah_masuk; ?> dari masyarakat</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-inbox fa-4x text-white"></i>
                            <span class="badge badge-danger badge-counter"><?php echo $jumlah_masuk; ?></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-6 col-md-6 mb-4">
            <a href="?url=laporan_selesai" class="text-decoration-none">
                <div class="card bg-success card-white h-100">
                    <div class="card-body d-flex justify-content-between align-items-center" aria-readonly="true">
                        <div class="col mr-2">
                            <div class="text-m font-weight-bold text-white text-uppercase mb-1">Laporan Selesai</div>
                            <hr class="border border-2">
                            <div class="h5 mb-0 font-weight-bold text-white">Ada <?php echo $jumlah_selesai; ?> dari masyarakat</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-4x text-white"></i>
                            <span class="badge badge-danger badge-counter"><?php echo $jumlah_selesai; ?></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>


<!-- Konten disini-->
    
    <?php
    } else {
        echo "Error: " . mysqli_error($db); // Menampilkan pesan error jika query tidak berhasil
    }
}
?>
