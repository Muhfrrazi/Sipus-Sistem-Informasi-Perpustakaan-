<?php

include 'koneksi.php';
session_start();

$nama = $_SESSION['nama'];

if (!isset($_SESSION['id_admin'])) {
    echo "<meta http-equiv='refresh' content='0; url=login.php'>";
    echo "<script>alert('Anda belum login, Silahkan login Dahulu!');</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERPUSTAKAAN UMUM</title>
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="./images/logo.png" alt="Logo">
        </div>
        <div class="header-text">
            <h1 class="title">PERPUSTAKAAN UMUM</h1>
            <p class="subtitle">Jl. Lembah Abang No.11, Telp: (021)55555555</p>
        </div>
    </header>
    <div class="user">
        <p>Hai <?php echo "$nama" ?> ! </p>
    </div>
    <section>
        <nav class="nav-menu">
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li class="nav-title">Entry Data dan Transaksi</li>
                <li><a href="index.php?p=anggota">Data Anggota</a></li>
                <li><a href="index.php?p=buku">Data Buku</a></li>
                <li><a href="#">Transaksi Peminjaman</a></li>
                <li class="nav-title">Laporan</li>
                <li><a href="#">Laporan Data Anggota</a></li>
                <li><a href="#">Laporan Data Buku</a></li>
            </ul>
        </nav>
        <article>
            <?php
            if (isset($_GET['p']) && $_GET['p'] == 'anggota') {
                include './pages/anggota.php';
            } elseif (isset($_GET['p']) && $_GET['p'] == 'anggota-input') {
                include './pages/anggota-input.php';
            } elseif (isset($_GET['p']) && $_GET['p'] == 'anggota-edit') {
                include './pages/anggota-edit.php';
            } elseif (isset($_GET['p']) && $_GET['p'] == 'buku') {
                include './pages/buku.php';
            } elseif (isset($_GET['p']) && $_GET['p'] == 'buku-input') {
                include './pages/buku-input.php';
            } elseif (isset($_GET['p']) && $_GET['p'] == 'buku-edit') {
                include './pages/buku-edit.php';
            } else {

                echo '<p class="nmHalaman">Beranda</p>
                    <h1>"SELAMAT DATANG DI SISTEM INFORMASI PERPUSTAKAAN"
                    <p class="isi">"MEMBACA ADALAH JENDELA DUNIA"</p>';
            }
            ?>
        </article>
    </section>
    <footer>
        <p>Sistem Informasi Perpustakaan (Sipus) | Praktikum</p>
    </footer>
    <script type="text/javascript">
        $(function() {
            $("#date").datepicker({
                dateFormat: 'yy'
            });
        });
    </script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
</body>

</html>