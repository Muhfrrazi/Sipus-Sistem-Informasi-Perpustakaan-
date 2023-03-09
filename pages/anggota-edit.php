<?php
include "./koneksi.php";


$id_anggota = $_GET['id'];
$nama = $_SESSION['nama'];
$q_tampil_anggota = mysqli_query($db, "SELECT * FROM tbanggota WHERE idanggota='$id_anggota'");
$r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota);
if (empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto'] == '-')) {
    $foto = 'admin-no-photo.png';
} else {
    $foto = $r_tampil_anggota['foto'];
}
?>
<div class="nmHalaman">
    <h3>Edit Data Anggota</h3>
</div>
<div id="content">
    <form action="proses/anggota-edit-proses.php" method="POST" enctype="multipart/form-data">
        <table id="formanggota" class="formanggota">
            <tr>
                <td>Foto</td>
                <input type="hidden" name="foto_awal" value="<?php echo $r_tampil_anggota['foto']; ?>">
                <td><img src="./images/<?php echo $foto; ?>" width="70px" height="70px" alt="<?php echo $foto; ?>">
                    <input type="file" class="inputAnggota text-input" accept="image/png, image/gif, image/jpeg, image/jpg" name="foto" id="foto">
                </td>

            </tr>
            <tr>
                <td class="label-formulir">ID Anggota<span style="color:red">*</span></td>
                <td class="isian-formulir"><input type="text" name="id_anggota" value="<?php echo $r_tampil_anggota['idanggota']; ?>" readonly="readonly" class="text-input isian-formulir isian-formulir-border warna-formulir-disabled"></td>
            </tr>
            <tr>
                <td class="label-formulir">Nama<span style="color:red">*</span></td>
                <td class="isian-formulir"><input type="text" name="nama" value="<?php echo $r_tampil_anggota['nama']; ?>" class="text-input isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin<span style="color:red">*</span></td>
                <td>
                    <?php
                    if ($r_tampil_anggota['jeniskelamin'] == 'Pria') {
                        echo '<input type="radio" class="radioAnggota" name="jenis_kelamin" value="Pria" checked> Pria <br>
                            <input type="radio" class="radioAnggota" name="jenis_kelamin" value="Wanita"> Wanita';
                    } else {
                        echo '<input type="radio" class="radioAnggota" name="jenis_kelamin" value="Pria"> Pria <br>
                            <input type="radio" class="radioAnggota" name="jenis_kelamin" value="Wanita" checked> Wanita';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Alamat<span style="color:red">*</span></td>
                <td>
                    <textarea type="text" class="inputAnggota" name="alamat" id="alamat" cols="75" rows="5"><?php echo $r_tampil_anggota['alamat']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan" class="tombol-simpan" onclick="return confirm('Apakah data yang diubah sudah benar?')"></td>
        </table>
    </form>
</div>