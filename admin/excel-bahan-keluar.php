<?php
// ambil library dan koneksi
require_once('../config/db.php');
// convert file ke excel
$dari = $_POST['dari'];
$sampai = $_POST['sampai'];
header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=\"Laporan bahan keluar $dari s/d $sampai.xls\"");
header('Cache-Control: max-age=0');

$data = mysqli_query($conn, "SELECT * FROM bahan_keluar INNER JOIN bahan ON bahan.id_bahan = bahan_keluar.id_bahan WHERE tanggal_keluar >= '$dari' AND tanggal_keluar <= '$sampai'");
?>
<h3>Laporan Bahan keluar <?php echo "$dari s/d $sampai" ?></h3>
<table width="100%" border="1" class="text-center">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>Nama</th>
            <th>Penambahan Stok</th>
            <th>Keterangan</th>
            <th>Tanggal_keluar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($data as $b_keluar) { ?>
            <tr class="text-center">
                <td><?= $no++; ?></td>
                <td><?= $b_keluar['nama']; ?></td>
                <td><?= $b_keluar['jumlah_keluar']; ?></td>
                <td><?= $b_keluar['keterangan']; ?></td>
                <td><?= $b_keluar['tanggal_keluar']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>