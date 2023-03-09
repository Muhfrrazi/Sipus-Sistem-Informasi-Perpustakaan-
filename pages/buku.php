<p class="nmHalaman">Tampil Data Buku</p>
<div id="content">
    <p id="tombol-tambah-container">
        <a href="index.php?p=buku-input" class="tombol tombol-tambah">Tambah Buku</a>
    </p>

    <form class="form-inline" method="POST">
        <div align="right">
            <form method="POST">
                <input type="text" name="pencarian">
                <input type="submit" name="search" value="search" class="tombol tombol-cetak-halaman">
            </form>
        </div>
    </form>
    <table id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</td>
            <th>ID Buku</th>
            <th>Judul</th>
            <th>Foto</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th id="label-opsi">Opsi</th>
        </tr>

        <?php
        $batas = 5;
        extract($_GET);
        if (empty($hal)) {
            $posisi = 0;
            $hal = 1;
            $nomor = 1;
        } else {
            $posisi = ($hal - 1) * $batas;
            $nomor = $posisi + 1;
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
            if ($pencarian != '') {
                $sql = "SELECT * FROM tbbuku WHERE judul LIKE '%$pencarian%'
                            OR idbuku LIKE '%$pencarian%'
                            OR pengarang LIKE '%$pencarian%'
                            OR penerbit LIKE '%$pencarian%'
                            OR tahun LIKE '%$pencarian%'";
                $query = $sql;
                $queryJml = $sql;
            } else {
                $query = "SELECT * FROM tbbuku LIMIT $posisi, $batas";
                $queryJml = "SELECT * FROM tbbuku";
                $no = $posisi * 1;
            }
        } else {
            $query = "SELECT * FROM tbbuku LIMIT $posisi, $batas";
            $queryJml = "SELECT * FROM tbbuku";
            $no = $posisi * 1;
        }

        $q_tampil_buku = mysqli_query($db, $query);
        if (mysqli_num_rows($q_tampil_buku) > 0) {
            while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
                if (empty($r_tampil_buku['foto']) or ($r_tampil_buku['foto'] == '-'))
                    $foto = "buku-no-photo.png";
                else
                    $foto = $r_tampil_buku['foto'];
        ?>
                <tr>
                    <td style="text-align: center;"><?php echo $nomor; ?></td>
                    <td><?php echo $r_tampil_buku['idbuku']; ?></td>
                    <td><?php echo $r_tampil_buku['judul']; ?></td>
                    <td style="text-align: center;"><img src="./images/buku/<?php echo $foto; ?>" width="70px height=70px" alt=""></td>
                    <td><?php echo $r_tampil_buku['pengarang']; ?></td>
                    <td><?php echo $r_tampil_buku['penerbit']; ?></td>
                    <td><?php echo $r_tampil_buku['tahun']; ?></td>
                    <td>
                        <div class="tombol-opsi-container">
                            <a style="font-size:16px;" href="index.php?p=buku-edit&id=<?php echo $r_tampil_buku['idbuku']; ?>" class="tombol tombol-edit">Edit</a>
                        </div>
                        <div class="tombol-opsi-container">
                            <a style="font-size:16px;" href="proses/buku-hapus-proses.php?id=<?php echo $r_tampil_buku['idbuku']; ?>" class="tombol tombol-hapus" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data ini?')">Hapus</a>
                        </div>
                    </td>
                </tr>
        <?php $nomor++;
            }
        } else {
            echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
        } ?>
    </table>
    <?php
    if (isset($_POST['pencarian'])) {
        if ($_POST['pencarian'] != '') {
            echo "<div style=\"float:left;\">";
            $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
            echo "Data Hasil Pencarian: <b>$jml</b>";
            echo "</div>";
        }
    } else { ?>
        <div style="float:left;">
            <?php
            $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
            echo "Jumlah Data : <b>$jml</b>";
            ?>
        </div>
        <div class="pagination">
            <?php
            $jml_hal = ceil($jml / $batas);
            for ($i = 1; $i <= $jml_hal; $i++) {
                if ($i != $hal) {
                    echo "<a href=\"?p=buku&hal=$i\">$i</a>";
                } else {
                    echo "<a class=\"active\">$i</a>";
                }
            }
            ?>
        </div>
    <?php
    }
    ?>
</div>