<?php
require_once '../config/db.php';
$id_order = $_GET['id'];
$q = "SELECT nama,no_telp,total,bukti_tf,keterangan,tanggal,status,id_order FROM `orderan` INNER JOIN users ON orderan.id_user = users.id_user WHERE id_order = '$id_order';";
$dataOrder = mysqli_query($conn, $q);
$order = mysqli_fetch_assoc($dataOrder);



if (isset($_POST['change-status'])) {
    $id_order = $_POST['id_order'];
    $status = $_POST['status'];

    $q = "UPDATE `orderan` SET `status` = '$status' WHERE `orderan`.`id_order` = '$id_order';";
    mysqli_query($conn, $q);

    echo "<script>alert('berhasil ganti status pemesanan')</script>";
    echo "<script>document.location.href = 'orderan.php'</script>";
}

?>
<?php require_once './layouts/atas.php' ?>
<!-- / Content -->
<div class="container-xxl mt-4">
    <div class="card">
        <h5 class="card-header">Data id order <?= $order['id_order']; ?></h5>
        <div class="card-body my-2">
            <p class="card-text">Nama Pemesan : <?= $order['nama']; ?></p>
            <p class="card-text">Tanggal Pemesanan : <?= $order['tanggal']; ?></p>
            <p class="card-text">No Telp : <?= $order['no_telp']; ?></p>
            <p class="card-text">Total : <?= rupiah($order['total']); ?></p>
            <p class="card-text">Keterangan : <?= $order['keterangan']; ?></p>
            <?php if ($order['bukti_tf'] == null) { ?>
                <p>Belum ada transfer</p>
            <?php } else { ?>
                <p><a href="../foto/bukti_tf/<?= $order['bukti_tf']; ?>" target="_blank"><img src="../foto/bukti_tf/<?= $order['bukti_tf']; ?>" width="50px" height="50px" alt=""></a></p>
            <?php }  ?>
            <p>Status : <?= $order['status']; ?></p>
            <form action="" method="post">
                <label for="" class="fw-bold">Ganti Status Pemesanan</label>
                <input type="hidden" name="id_order" value="<?= $order['id_order']; ?>">
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

        </div>
    </div>
</div>
<!-- / Content -->
<?php require_once './layouts/bawah.php' ?>