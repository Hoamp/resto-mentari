<?php
require_once './config/db.php';
session_start();

if (!isset($_SESSION['role'])) {
    echo "<script>alert('silahkan login terlebih dahulu')</script>";
    echo "<script>document.location.href = 'login.php'</script>";
}
$user_id = $_SESSION['id_user'];


$q = "SELECT * FROM orderan WHERE id_user = '$user_id'";
$dataOrder = mysqli_query($conn, $q);
$no = 1;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resto <?= $resto; ?></title>
    <?php require_once './layouts/css.php' ?>
</head>

<body>
    <?php require_once './layouts/header.php' ?>
    <div class="container" style="margin-top: 140px;">
        <a href="" class="btn btn-primary mb-3">Petunjuk</a>
        <div class="card shadow">
            <h4 class="card-header">Data orderan <?= $_SESSION['username']; ?></h4>
            <div class=" ">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Tanggal</td>
                            <td>Total</td>
                            <td>Status</td>
                            <td>Keterangan</td>
                            <td>Bukti TF</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataOrder as $order) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $order['tanggal']; ?></td>
                                <td><?= rupiah($order['total']); ?></td>
                                <td><?= $order['status']; ?></td>
                                <td><?= $order['keterangan']; ?></td>
                                <?php if ($order['bukti_tf'] == null) { ?>
                                    <td>Belum upload bukti tf</td>
                                <?php } else { ?>
                                    <td><a href="foto/bukti_tf/<?= $order['bukti_tf']; ?>" target="_blank">Lihat</a></td>
                                <?php }  ?>
                                <td>
                                    <a href="bukti-tf.php?e=<?= $order['id_order']; ?>" class="badge badge-primary">Edit</a>
                                    |
                                    <a href="proses.php?deleteOrder=<?= $order['id_order'] ?>" class="badge badge-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php require_once './layouts/js.php' ?>
</body>

</html>