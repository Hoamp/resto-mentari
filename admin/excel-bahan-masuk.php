<?php
// ambil library dan koneksi
require_once('../config/db.php');
// convert file ke excel
$dari = $_POST['dari'];
$sampai = $_POST['sampai'];
header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=\"Laporan bahan masuk $dari s/d $sampai.xls\"");
header('Cache-Control: max-age=0');

$data = mysqli_query($conn, "SELECT * FROM bahan_masuk INNER JOIN bahan ON bahan.id_bahan = bahan_masuk.id_bahan WHERE tanggal_masuk >= '$dari' AND tanggal_masuk <= '$sampai'");
?>
<h3>Laporan Bahan Masuk <?php echo "$dari s/d $sampai" ?></h3>
<table width="100%" border="1" class="text-center">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>Nama</th>
            <th>Penambahan Stok</th>
            <th>Keterangan</th>
            <th>Tanggal_masuk</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($data as $b_masuk) { ?>
            <tr class="text-center">
                <td><?= $no++; ?></td>
                <td><?= $b_masuk['nama']; ?></td>
                <td><?= $b_masuk['jumlah_masuk']; ?></td>
                <td><?= $b_masuk['keterangan']; ?></td>
                <td><?= $b_masuk['tanggal_masuk']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>