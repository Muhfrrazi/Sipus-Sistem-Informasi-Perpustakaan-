<?php
include '../koneksi.php';

$id_buku = $_POST['id_buku'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];

if (isset($_POST['simpan'])) {
    extract($_POST);
    $nama_file = $_FILES['foto']['name'];
    if (!empty($nama_file)) {
        // baca lokasi file sementara dan nama file dari form (fupload)
        $lokasi_file = $_FILES['foto']['tmp_name'];
        $tipe_file   = pathinfo($nama_file, PATHINFO_EXTENSION);
        $file_foto = $id_buku . "." . $tipe_file;
        // tentukan folder untuk menyimpan file
        $folder = "../images/buku/$file_foto";
        @unlink($folder);
        // apabila file berhasil di upload
        move_uploaded_file($lokasi_file, "$folder");
    } else {
        $file_foto = $foto_awal;
    }
    mysqli_query(
        $db,
        "UPDATE tbbuku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun='$tahun', foto='$file_foto' WHERE idbuku='$id_buku'"
    );
    header("location:../index.php?p=buku");
}
