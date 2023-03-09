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
        //baca lokasi sementara dan nama file dari form (fupload)
        $lokasi_file = $_FILES['foto']['tmp_name'];
        $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $file_foto = $id_buku . "." . $tipe_file;

        //tentukan folder untuk menyimpan file
        $folder = "../images/buku/$file_foto";
        //Apabila file berhasil di upload
        move_uploaded_file($lokasi_file, "$folder");
    } else {
        $file_foto = "-";
    }

    $sql =
        "INSERT INTO tbbuku VALUES ('$id_buku', '$judul', '$file_foto', '$pengarang', '$penerbit', '$tahun')";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header("location:../index.php?p=buku");
    } else {
        echo "<script>alert('Gagal menambahkan buku');</script>";
        // kembali ke halaman buku-input)
        echo "<meta http-equiv='refresh' content='1 url=../index.php?p=buku-input'>";
    }
}
