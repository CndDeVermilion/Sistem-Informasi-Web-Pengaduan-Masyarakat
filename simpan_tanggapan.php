<?php
require 'conn.php';

// Pastikan nama field pada $_POST sesuai dengan form HTML yang mengirimkan data
$id_pengaduan = $_POST['id']; // Mengambil nilai dari field tgl_pengaduan pada form
$tgl_tanggapan =$_POST['tgl_tanggapan']; // Menggunakan format tanggal yang sesuai dengan kolom tgl_tanggapan di database
$tanggapan = $_POST['tanggapan']; // Mengambil nilai dari field isi_laporan pada form
$id_petugas = $_POST['id_petugas']; // Mengambil nilai dari field id_petugas pada form
$st = 'selesai';

// Menggunakan variabel $db dari file conn.php untuk koneksi ke database
$sql = mysqli_query($db, "INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) 
                          VALUES ('$id_pengaduan', '$tgl_tanggapan', '$tanggapan', '$id_petugas')");

$update_st = mysqli_query($db, "UPDATE pengaduan SET status='$st' WHERE id_pengaduan='$id_pengaduan'");

if ($sql && $update_st) {
    ?>
    <script type="text/javascript">
        alert('Data sudah ditanggapi');
        window.location = "admin.php?url=lihat_validasi_laporan";
    </script>
    <?php
} else {
    echo "Error: " . mysqli_error($db);
}
?>
