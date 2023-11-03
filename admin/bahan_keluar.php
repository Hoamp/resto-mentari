<?php
require_once '../config/db.php';

$q = "SELECT * FROM bahan_keluar INNER JOIN bahan ON bahan_keluar.id_bahan = bahan.id_bahan";
$dataBahankeluar = mysqli_query($conn, $q);

$no = 1;

if (isset($_POST['tampil'])) {
    $dari = mysqli_real_escape_string($conn, $_POST['dari']);
    $sampai = mysqli_real_escape_string($conn, $_POST['sampai']);

    $dataBahankeluar = mysqli_query($conn, "SELECT * FROM bahan_keluar INNER JOIN bahan ON bahan.id_bahan = bahan_keluar.id_bahan WHERE tanggal_keluar >= '$dari' AND tanggal_keluar <= '$sampai'");
} else {
    $q = "SELECT * FROM bahan_keluar INNER JOIN bahan ON bahan_keluar.id_bahan = bahan.id_bahan";
    $dataBahankeluar = mysqli_query($conn, $q);
}

?>
<?php require_once './layouts/atas.php' ?>
<!-- / Content -->
<div class="container-xxl mt-4">
    <div class="card">
        <h5 class="card-header ">Data bahan keluar</h5>
        <div class="table-responsive text-nowrap ">
            <?php if($_SESSION['role'] !== 'manager'): ?>
            <a class="card-title btn btn-primary ms-3 text-white" href="tambah-bahan-keluar.php">Tambah bahan keluar</a>
            <?php endif; ?>
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Stok keluar</th>
                        <th>Tanggal keluar</th>
                        <th>Keterangan</th>
                        <?php if($_SESSION['role'] !== 'manager'): ?>
                            <th>Aksi</th>
                        <?php endif; ?>
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


                            <?php if($_SESSION['role'] !== 'manager'): ?>
                            <td>
                                <a href="proses.php?hapus_keluar=<?= $bahan['id_bahan_keluar']; ?>" class="btn btn-danger">Hapus</a>
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
                    <form action="excel-bahan-keluar.php" method="post">
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