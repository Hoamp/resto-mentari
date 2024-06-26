<?php
require_once '../config/db.php';

$no = 1;

if (isset($_POST['tampil'])) {
    $dari = mysqli_real_escape_string($conn, $_POST['dari']);
    $sampai = mysqli_real_escape_string($conn, $_POST['sampai']);

    $dataBahanMasuk = mysqli_query($conn, "SELECT * FROM bahan_masuk INNER JOIN bahan ON bahan.id_bahan = bahan_masuk.id_bahan WHERE tanggal_masuk >= '$dari' AND tanggal_masuk <= '$sampai'");
} else {
    $q = "SELECT * FROM bahan_masuk INNER JOIN bahan ON bahan_masuk.id_bahan = bahan.id_bahan";
    $dataBahanMasuk = mysqli_query($conn, $q);
}

?>
<?php require_once './layouts/atas.php' ?>
<!-- / Content -->
<div class="container-xxl mt-4">
    <div class="card">
        <h5 class="card-header ">Data bahan masuk</h5>
        <div class="table-responsive text-nowrap ">
            <?php if($_SESSION['role'] !== 'manager'): ?>
            <a class="card-title btn btn-primary ms-3 text-white" href="tambah-bahan-masuk.php">Tambah bahan masuk</a>
            <?php endif; ?> 
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Stok masuk</th>
                        <th>Tanggal masuk</th>
                        <th>Keterangan</th>
                        <?php if($_SESSION['role'] !== 'manager'): ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0 ">
                    <?php foreach ($dataBahanMasuk as $bahan) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $bahan['nama']; ?></td>
                            <td><?= $bahan['jumlah_masuk']; ?></td>
                            <td><?= $bahan['tanggal_masuk']; ?></td>
                            <td><?= $bahan['keterangan']; ?></td>
                            <?php if($_SESSION['role'] !== 'manager'): ?>
                            <td>
                                <a href="proses.php?hapus_masuk=<?= $bahan['id_bahan_masuk']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php $no++;
                    endforeach ?>
                </tbody>
            </table>
            <div class="container py-4">
                <div class="mt-5">
                    <h4>Pencarian</h4>
                    <form action="" method="POST">
                        <div class="my-2 col-md-3">
                            <input name="dari" onfocus="(this.type ='date')" class="form-control" placeholder="Masukan Tanggal Awal" required>
                        </div>
                        <div class="my-2 col-md-3">
                            <input name="sampai" onfocus="(this.type ='date')" class="form-control" placeholder="Masukan Tanggal Akhir" required>
                        </div>
                        <div class="my-2">
                            <button class="btn btn-primary tampil" type="submit" name="tampil">
                                Tampilkan
                            </button>
                        </div>
                    </form>
                    <form action="excel-bahan-masuk.php" method="post">
                        <input type="hidden" name="dari" value="<?= $dari; ?>">
                        <input type="hidden" name="sampai" value="<?= $sampai; ?>">
                        <div class="col-lg-3 mt-3">
                            <button class="btn btn-success " type="submit">
                                Export Excel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<?php require_once './layouts/bawah.php' ?>