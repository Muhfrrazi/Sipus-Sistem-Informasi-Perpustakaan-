<?php
$id_buku = $_GET['id'];
$q_tampil_buku = mysqli_query($db, "SELECT * FROM tbbuku WHERE idbuku='$id_buku'");
$r_tampil_buku = mysqli_fetch_array($q_tampil_buku);
if (empty($r_tampil_buku['foto']) or ($r_tampil_buku['foto'] == '-')) {
    $foto = "buku-no-photo.png";
} else {
    $foto = $r_tampil_buku['foto'];
}
?>
<p class="nmHalaman">Edit Data Buku</p>
<h1><?php echo $r_tampil_buku['judul']; ?></h1>
<form action="./proses/buku-edit-proses.php" method="post" enctype="multipart/form-data">
    <table id="formanggota" class="formanggota">
        <tr>
            <td>Foto</td>
            <td><img src="./images/buku/<?php echo $foto; ?>" width="70px height=70px" alt="<?php echo $foto; ?>">
                <input type="file" class="inputAnggota text-input" accept="image/png, image/gif, image/jpeg" name="foto" id="foto">
            </td>
            <input type="hidden" name="foto_awal" value="<?php echo $r_tampil_buku['foto']; ?>">
        </tr>
        <tr>
            <td>ID Buku <span style="color:red">*</span></td>
            <td><input type="text" required class="text-input isian-formulir isian-formulir-border" name="id_buku" id="id_buku" style="background-color: #c4c4c4;" readonly value="<?php echo $r_tampil_buku['idbuku']; ?>"></td>
        </tr>
        <tr>
            <td>Judul<span style="color:red">*</span></td>
            <td><input type="text" required value="<?php echo $r_tampil_buku['judul']; ?>" class="text-input isian-formulir isian-formulir-border" name="judul" id="judul"></td>
        </tr>
        <tr>
            <td>Pengarang<span style="color:red">*</span></td>
            <td><input type="text" required value="<?php echo $r_tampil_buku['pengarang']; ?>" class="text-input isian-formulir isian-formulir-border" name="pengarang" id="pengarang"></td>
        </tr>
        <tr>
            <td>Penerbit<span style="color:red">*</span></td>
            <td><input type="text" required value="<?php echo $r_tampil_buku['penerbit']; ?>" class="text-input isian-formulir isian-formulir-border" name="penerbit" id="penerbit"></td>
        </tr>
        <tr>
            <td>Tahun<span style="color:red">*</span></td>
            <td><input type="number" required value="<?php echo $r_tampil_buku['tahun']; ?>" class="text-input isian-formulir isian-formulir-border" name="tahun" id="tahun"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="simpan" class="tombol-simpan" value="simpan" onclick="return confirm('Anda Yakin Ingin Mengubah Data Ini?')"></td>
            <td></td>
        </tr>
    </table>