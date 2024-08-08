<?php

require 'conn.php';
$query = mysqli_query($db, "UPDATE pengaduan SET status='Proses' WHERE id_pengaduan='$_GET[id]'");
if($query) {
    header("Location:admin.php?url=validasi_laporan");
}

?>