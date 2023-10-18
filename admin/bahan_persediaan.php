<?php
require_once '../config/db.php';

$q = "SELECT * FROM bahan";
$dataBahan = mysqli_query($conn, $q);

$no = 1;

?>
<?php require_once './layouts/atas.php' ?>
<!-- / Content -->
<div class="container-xxl mt-4">
    <div class="card">
        <h5 class="card-header">Data persediaan bahan</h5>
        <div class="table-responsive text-nowrap ">
            <a class="card-title btn btn-primary ms-3 text-white" href="tambah-data-bahan.php">Tambah data bahan</a>
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Status</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0 ">

                    <?php foreach ($dataBahan as $bahan) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $bahan['nama']; ?></td>
                            <td><?= $bahan['stok']; ?></td>
                            <td><?= $bahan['satuan']; ?></td>
                            <td><?= $bahan['status']; ?></td>
                            <?php if ($bahan['foto'] == '') { ?>
                                <td>Tidak ada foto bahan</td>
                            <?php } else { ?>
                                <td>ada foto bahan</td>

                            <?php } ?>


                            <td>
                                <a href="" class="btn btn-primary">Detail</a>
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