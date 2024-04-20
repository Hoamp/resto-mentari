<?php
require_once '../config/db.php';
$id_reservasi = $_GET['id'];
$q = "SELECT * FROM `reservasi` INNER JOIN users ON reservasi.id_user = users.id_user WHERE id_reservasi = '$id_reservasi';";
$datareservasi = mysqli_query($conn, $q);
$reservasi = mysqli_fetch_assoc($datareservasi);

if (isset($_POST['change-status'])) {
    $id_reservasi = $_POST['id_reservasi'];
    $status = $_POST['status'];

    $q = "UPDATE `reservasi` SET `status` = '$status' WHERE `reservasi`.`id_reservasi` = '$id_reservasi';";
    mysqli_query($conn, $q);

    echo "<script>alert('berhasil ganti status pemesanan')</script>";
    echo "<script>document.location.href = 'reservasi.php'</script>";
}

?>
<?php require_once './layouts/atas.php' ?>
<!-- / Content -->
<div class="container-xxl mt-4">
    <div class="card">
        <h5 class="card-header">Data id reservasi <?= $reservasi['id_reservasi']; ?></h5>
        <div class="card-body my-2">
            <p class="card-text">Nama Pemesan : <?= $reservasi['nama']; ?></p>
            <p class="card-text">Tanggal Pemesanan : <?= $reservasi['tanggal']; ?></p>
            <p class="card-text">No Telp : <?= $reservasi['no_telp']; ?></p>
            <p class="card-text">Keterangan : <?= $reservasi['pesan']; ?></p>
            <?php if ($reservasi['bukti_tf'] == null) { ?>
                <p>Belum ada transfer</p>
            <?php } else { ?>
                <p><a href="../foto/bukti_tf_reservasi/<?= $reservasi['bukti_tf']; ?>" target="_blank"><img src="../foto/bukti_tf_reservasi/<?= $reservasi['bukti_tf']; ?>" width="50px" height="50px" alt=""></a></p>
            <?php }  ?>
            <p>Status : <?= $reservasi['status']; ?></p>
            <?php if($_SESSION['role'] !== 'manager'): ?>
                <form action="" method="post">
                    <label for="" class="fw-bold">Ganti Status Pemesanan</label>
                <input type="hidden" name="id_reservasi" value="<?= $reservasi['id_reservasi']; ?>">
                <div class="row">
                    <div class="col-md-4">

                        <select name="status" id="" class="form-select my-3">
                            <option value="pending">pending</option>
                            <option value="ditolak">ditolak</option>
                            <option value="diproses">diproses</option>
                            <option value="selesai">selesai</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="change-status" class="btn btn-primary" value="asdf">Ubah status</button>
            </form>
            <?php endif; ?>

        </div>
    </div>
</div>
<!-- / Content -->
<?php require_once './layouts/bawah.php' ?>