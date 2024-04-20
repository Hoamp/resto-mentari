<?php
require_once '../config/db.php';

$no = 1;
$check = '';

$query = "SELECT * FROM menu";
$dataMenu = mysqli_query($conn, $query);

foreach ($dataMenu as $d) {
    $check = $d;
}
?>
<?php require_once './layouts/atas.php' ?>
<!-- / Content -->
<div class="container-xxl mt-4">
    <div class="card">
        <h5 class="card-header">Data semua menu</h5>
        <div class=" my-3 ms-4">
            <?php if($_SESSION['role'] !== 'manager'): ?>
            <a href="tambah-menu.php" class="btn btn-primary">Tambah menu</a>
            <?php endif; ?>
        </div>
        <div class="table-responsive text-nowrap ">
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <?php if($_SESSION['role'] !== 'manager'): ?>
                        <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0 ">
                    <?php if ($check == null) { ?>
                        <tr>
                            <td colspan="7" class="alert-warning text-center">Tidak ada menu disini</td>
                        </tr>
                    <?php } else { ?>
                        <?php foreach ($dataMenu as $menu) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><img src="../foto/<?= $menu['foto']; ?>" width="50px" height="50px" alt=""></td>
                                <td><?= $menu['nama']; ?></td>
                                <td><?= $menu['deskripsi']; ?></td>
                                <td><?= rupiah($menu['harga']); ?></td>

                                <?php if($_SESSION['role'] !== 'manager'): ?>
                                    <td>
                                        <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="edit-menu.php?e=<?= $menu['foto']; ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="proses.php?d=<?= $menu['foto']; ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                                <?php endif; ?>
                            </tr>
                        <?php $no++;
                        endforeach ?>
                    <?php } ?>


                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- / Content -->
<?php require_once './layouts/bawah.php' ?>