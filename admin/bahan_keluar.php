<?php
require_once '../config/db.php';

$q = "SELECT * FROM bahan_keluar INNER JOIN bahan ON bahan_keluar.id_bahan = bahan.id_bahan";
$dataBahankeluar = mysqli_query($conn, $q);

$no = 1;

?>
<?php require_once './layouts/atas.php' ?>
<!-- / Content -->
<div class="container-xxl mt-4">
    <div class="card">
        <h5 class="card-header ">Data bahan keluar</h5>
        <div class="table-responsive text-nowrap ">
            <a class="card-title btn btn-primary ms-3 text-white" href="tambah-bahan-keluar.php">Tambah bahan keluar</a>
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Stok keluar</th>
                        <th>Tanggal keluar</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0 ">

                    <?php foreach ($dataBahankeluar as $bahan) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $bahan['nama']; ?></td>
                            <td><?= $bahan['jumlah_keluar']; ?></td>
                            <td><?= $bahan['tanggal_keluar']; ?></td>
                            <td><?= $bahan['keterangan']; ?></td>


                            <td>
                                <a href="proses.php?hapus_keluar=<?= $bahan['id_bahan_keluar']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach ?>



                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- / Content -->
<?php require_once './layouts/bawah.php' ?>