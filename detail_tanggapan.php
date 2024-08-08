<?php
require 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tgl = $_POST['tgl_pengaduan'];
    $nik = $_POST['nik'];
    $isi = $_POST['isi_laporan'];
    $ft = $_FILES['foto']['name'];
    $file = $_FILES['foto']['tmp_name'];
    $st = 0;

    // Escape input to prevent SQL injection
    $tgl = mysqli_real_escape_string($db, $tgl);
    $nik = mysqli_real_escape_string($db, $nik);
    $isi = mysqli_real_escape_string($db, $isi);
    $ft = mysqli_real_escape_string($db, $ft);

    // Check if file upload is successful
    if (move_uploaded_file($file, "foto/" . $ft)) {
        $sql = "INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan, foto, status) 
                VALUES ('$tgl', '$nik', '$isi', '$ft', '$st')";

        if ($db->query($sql)) {
            ?>
            <script type="text/javascript">
                alert("Data Berhasil Diinput");
                window.location = "masyarakat.php";
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                alert("Data Gagal Diinput: <?php echo $db->error; ?>");
                window.location = "masyarakat.php";
            </script>
            <?php
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("Gagal mengunggah file.");
            window.location = "masyarakat.php";
        </script>
        <?php
    }
}
?>
