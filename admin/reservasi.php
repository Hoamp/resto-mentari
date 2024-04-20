<?php
require_once '../config/db.php';
$q = "SELECT * FROM `reservasi` INNER JOIN users ON reservasi.id_user = users.id_user;";
$dataReservasi = mysqli_query($conn, $q);

$no = 1;

?>
<?php require_once './layouts/atas.php' ?>
<!-- / Content -->
<div class="container-xxl mt-4">
    <div class="card">
        <h5 class="card-header">Data semua reservasi</h5>
        <div class="table-responsive text-nowrap ">
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Pesan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0 ">

                    <?php foreach ($dataReservasi as $reservasi) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $reservasi['nama']; ?></td>
                            <td><?= $reservasi['tanggal']; ?></td>
                            <td><?= $reservasi['pesan']; ?></td>
                            <td><?= $reservasi['status']; ?></td>
                            <td>
                                <a href="reservasi-detail.php?id=<?= $reservasi['id_reservasi']; ?>" class="btn btn-primary">Detail</a>
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