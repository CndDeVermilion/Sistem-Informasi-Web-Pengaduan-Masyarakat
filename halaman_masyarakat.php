<?php
session_start();

if (!isset($_SESSION['nama'])) {
    header('Location: index.php');
    exit();
}

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    switch ($url) {
        case 'tulis_laporan':
            include 'tulis_laporan.php';
            break;
        case 'lihat_laporan':
            include 'lihat_laporan.php';
            break;
        case 'detail_laporan':
            include 'detail_laporan.php';
            break;
        case 'lihat_tanggapan':
            include 'lihat_tanggapan.php'; // Pastikan tidak ada kesalahan sintaks di sini
            break;
        default:
            echo 'Halaman tidak ditemukan';
    }
} else {
    ?>
    <div class="card bg-primary card-white">
        <div class="card-body" style="color: white;">
            <marquee behavior="scroll" direction="left" style="font-size: 32px;">
                Selamat datang di Aplikasi Pengaduan Masyarakat (APM). Gunakan dengan bijak untuk kebaikan bersama.
            </marquee>
            <hr class="white-hr">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <h5>Anda login sebagai : <b><?php echo $_SESSION['nama']; ?></b></h5>
                    <hr>
                    <h5>Aplikasi Pengaduan Masyarakat (APM) adalah platform digital yang memungkinkan masyarakat untuk menyampaikan keluhan, laporan, atau aspirasi terkait pelayanan publik kepada penyelenggara layanan.
                        <br>
                        <hr class="hr-white">
                        <b>Panduan :</b>
                        <ul>
                            <li>Menu Tulis Laporan, untuk memasukkan laporan</li>
                            <li>Menu Lihat Laporan, untuk melihat detail laporan</li>
                        </ul>
                    </h5>
                </div>
                <div>
                    <img src="img/2.png" width="800" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
