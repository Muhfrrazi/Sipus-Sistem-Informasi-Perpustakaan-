<?php

    include '../koneksi.php';
    
    //membuat proses hapus
    if(isset($_GET['id'])){
        $id_anggota = $_GET['id'];
        $sql = "DELETE FROM tbanggota WHERE idanggota = '$id_anggota'";
        $query = mysqli_query($db, $sql);
        if($query){
            header("location:../index.php?p=anggota");
        }else{
            echo "Gagal";
        }
    }
