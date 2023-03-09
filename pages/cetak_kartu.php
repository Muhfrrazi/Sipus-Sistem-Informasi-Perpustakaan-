<?php
include "../koneksi.php";
$id_anggota = $_GET['id'];
$q_tampil_anggota = mysqli_query($db, "SELECT * FROM tbanggota WHERE idanggota = '$id_anggota'");
$r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota);
if (empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto'] == '-'))
    $foto = "admin-no-photo.png";
else
    $foto = $r_tampil_anggota['foto'];
?>
<div id="label-page">
    <h3>Kartu Anggota</h3>
</div>
<div id="content">
    <table id="tabel-input" style="
    border: 3px solid black; border-radius: 20px; padding:20px">
        <tr>
            <td class=" label-formulir"><b>FOTO</b></td>
            <td></td>
            <td class="isian-formulir">
                <img src="../images/<?php echo $foto; ?>" alt="foto" width="70px" height="70px">
            </td>
        </tr>
        <tr>
            <td class="label-formulir">ID Anggota</td>
            <td style="padding-left: 20px;">:</td>
            <td class="isian-formulir"><?php echo $r_tampil_anggota['idanggota']; ?></td>
        </tr>
        <tr>
            <td class="label-formulir">Nama</td>
            <td style="padding-left: 20px;">:</td>
            <td class="isian-formulir"><?php echo $r_tampil_anggota['nama']; ?></td>
        </tr>
        <tr>
            <td class="label-formulir">Jenis Kelamin</td>
            <td style="padding-left: 20px;">:</td>
            <td class="isian-formulir"><?php echo $r_tampil_anggota['jeniskelamin']; ?></td>
        </tr>
        <tr>
            <td class="label-formulir">Alamat</td>
            <td style="padding-left: 20px;">:</td>
            <td class="isian-formulir"><?php echo $r_tampil_anggota['alamat']; ?></td>
        </tr>
    </table>
</div>
<script>
    window.print();
</script>