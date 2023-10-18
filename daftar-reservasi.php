<?php
require_once './config/db.php';
session_start();

if (!isset($_SESSION['role'])) {
    echo "<script>alert('silahkan login terlebih dahulu')</script>";
    echo "<script>document.location.href = 'login.php'</script>";
}
$user_id = $_SESSION['id_user'];


$q = "SELECT * FROM reservasi WHERE id_user = '$user_id'";
$dataReservasi = mysqli_query($conn, $q);
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
            <h4 class="card-header">Data reservasi <?= $_SESSION['username']; ?></h4>
            <div class=" ">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Tanggal</td>
                            <td>Jumlah Orang</td>
                            <td>Pesan</td>
                            <td>Bukti TF</td>
                            <td>Status</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataReservasi as $reservasi) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $reservasi['tanggal']; ?></td>
                                <td><?= $reservasi['jumlah_orang']; ?></td>
                                <td><?= $reservasi['pesan']; ?></td>
                                <?php if ($reservasi['bukti_tf'] == null) { ?>
                                    <td>Belum upload bukti tf</td>
                                <?php } else { ?>
                                    <td><a href="foto/bukti_tf_reservasi/<?= $reservasi['bukti_tf']; ?>" target="_blank">Lihat</a></td>
                                <?php }  ?>
                                <td><?= $reservasi['status']; ?></td>

                                <td>
                                    <a href="bukti-tf-reservasi.php?e=<?= $reservasi['id_reservasi']; ?>" class="badge badge-primary">Edit</a>
                                    |
                                    <a href="proses.php?deletereservasi=<?= $reservasi['id_reservasi'] ?>" class="badge badge-danger">Hapus</a>
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