<?php

include '../koneksi.php';

//membuat proses hapus
if (isset($_GET['id'])) {
    $id_buku = $_GET['id'];
    $sql = "DELETE FROM tbbuku WHERE idbuku = '$id_buku'";
    $query = mysqli_query($db, $sql);
    if ($query) {
        header("location:../index.php?p=buku");
    } else {
        echo "Gagal";
    }
}
