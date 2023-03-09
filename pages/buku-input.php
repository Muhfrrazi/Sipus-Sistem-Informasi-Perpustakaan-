<p class="nmHalaman">Input Data Buku</p>
<h1>TAMBAH DATA BUKU</h1>
<form action="proses/buku-input-proses.php" method="post" enctype="multipart/form-data">
    <table class="formanggota">
        <tr>
            <td>ID Buku<span style="color:red">*</span></td>
            <td><input type="text" class="text-input" name="id_buku" id="id_buku" required></td>
        </tr>
        <tr>
            <td>Judul<span style="color:red">*</span></td>
            <td><input type="text" class="text-input" name="judul" id="judul" required></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td><input type="file" class="text-input" accept="image/png, image/gif, image/jpeg" name="foto" id="foto"></td>
        </tr>
        <tr>
            <td>Pengarang<span style="color:red">*</span></td>
            <td><input type="text" class="text-input" name="pengarang" id="pengarang" required></td>
        </tr>
        <tr>
            <td>Penerbit<span style="color:red">*</span></td>
            <td><input type="text" class="text-input" name="penerbit" id="penerbit" required></td>
        </tr>
        <tr>
            <td>Tahun<span style="color:red">*</span></td>
            <td><input type="number" class="text-input" name="tahun" required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="simpan" name="simpan" class="tombol-simpan" style="cursor:pointer;" onclick="return confirm('Apakah data sudah benar?')">
                <a href="index.php?p=buku" class="tombol-simpan" style="margin-left: 20px;">Kembali</a>
            <td></td>
        </tr>
    </table>
</form>