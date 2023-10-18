<?php
require_once '../config/db.php';
$q = "SELECT nama,keterangan,tanggal,status,id_order FROM `orderan` INNER JOIN users ON orderan.id_user = users.id_user;";
$dataOrder = mysqli_query($conn, $q);

$no = 1;

?>
<?php require_once './layouts/atas.php' ?>
<!-- / Content -->
<div class="container-xxl mt-4">
    <div class="card">
        <h5 class="card-header">Data semua orderan</h5>
        <div class="table-responsive text-nowrap ">
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0 ">

                    <?php foreach ($dataOrder as $order) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $order['nama']; ?></td>
                            <td><?= $order['tanggal']; ?></td>
                            <td><?= $order['keterangan']; ?></td>
                            <td><?= $order['status']; ?></td>


                            <td>
                                <a href="orderan-detail.php?id=<?= $order['id_order']; ?>" class="btn btn-primary">Detail</a>
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