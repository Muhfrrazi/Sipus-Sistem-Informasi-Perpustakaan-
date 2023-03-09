<p class="nmHalaman">Input Data Anggota</p>
<h1>TAMBAH DATA ANGGOTA</h1>
<form action="proses/anggota-input-proses.php" method="post" enctype="multipart/form-data">
    <table class="formanggota">
        <tr>
            <td>Foto</td>
            <td><input type="file" class="text-input" accept="image/png, image/gif, image/jpeg" name="foto" id="foto"></td>
        </tr>
        <tr>
            <td>ID Anggota</td>
            <td><input type="text" class="text-input" name="id_anggota" id="id_anggota" required></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" class="text-input" name="nama" id="nama" required></td>
        </tr>
        <tr>
            <td><label for="jkel">Jenis Kelamin</label></td>
            <td>
                <input type="radio" id="jkel" name="jenis_kelamin" value="Pria" style="margin :0 10px 10px 0" required>Pria <br>
                <input type="radio" id="jkel" name="jenis_kelamin" value="Wanita" style="margin :10px 10px 0 0" required>Wanita
            </td><br>
            <td></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><textarea type="text" class="inputAnggota" name="alamat" id="alamat" cols="20" rows="5" required></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="simpan" name="simpan" class="tombol-simpan" style="cursor:pointer;" onclick="return confirm('Apakah data sudah benar?')">
                <a href="index.php?p=anggota" class="tombol-simpan" style="margin-left: 20px;">Kembali</a>
            <td></td>
        </tr>
    </table>