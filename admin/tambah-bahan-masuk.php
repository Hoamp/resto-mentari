<?php
require_once '../config/db.php';

$q = "SELECT * FROM bahan";
$dataBahan = mysqli_query($conn, $q);
?>
<?php require_once './layouts/atas.php' ?>
<!-- / Content -->
<div class="container-xxl mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah bahan masuk</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="proses.php">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                            <div class="col-sm-10">
                                <select name="id_bahan" id="" class="form-select">
                                    <?php foreach ($dataBahan as $bahan) { ?>
                                        <option value="<?= $bahan['id_bahan']; ?>"><?= $bahan['nama'] ?> : stok <?= $bahan['stok']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Jumlah Masuk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="jumlah masuk" name="jumlah">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="keterangan makanan" name="keterangan">
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="tambah-bahan-masuk">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- / Content -->
<?php require_once './layouts/bawah.php' ?>