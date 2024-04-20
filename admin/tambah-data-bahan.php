<?php
require_once '../config/db.php'
?>
<?php require_once './layouts/atas.php' ?>
<!-- / Content -->
<div class="container-xxl mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah menu</h5>
                </div>

                <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="proses.php">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nama makanan" name="nama">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Stok</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" placeholder="Jumlah stok makanan" name="stok">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Satuan</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" placeholder="Satuan makanan" name="satuan">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" placeholder="Foto makanan" name="foto">
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="tambah-data-bahan">Send</button>
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