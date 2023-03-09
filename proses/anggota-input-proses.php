<?php
include '../koneksi.php';

$id_anggota = $_POST['id_anggota'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$status = "Tidak Meminjam";

if (isset($_POST['simpan'])) {
    extract($_POST);
    $nama_file = $_FILES['foto']['name'];
    if (!empty($nama_file)) {
        //baca lokasi sementara dan nama file dari form (fupload)
        $lokasi_file = $_FILES['foto']['tmp_name'];
        $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $file_foto = $id_anggota . "." . $tipe_file;

        //tentukan folder untuk menyimpan file
        $folder = "../images/$file_foto";
        //Apabila file berhasil di upload
        move_uploaded_file($lokasi_file, "$folder");
    } else {
        $file_foto = "-";
    }

    $sql =
        "INSERT INTO tbanggota VALUES ('$id_anggota', '$nama', '$jenis_kelamin', '$alamat', '$status', '$file_foto')";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header("location:../index.php?p=anggota");
    } else {
        echo "<script>alert('Gagal menambahkan anggota');</script>";
        // kembali ke halaman anggota-input)
        echo "<meta http-equiv='refresh' content='1 url=../index.php?p=anggota-input'>";
    }
}
