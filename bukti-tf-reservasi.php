<?php
require_once './config/db.php';
session_start();
$user_id = $_SESSION['id_user'];
$reservasi_id = $_GET['e'];

$q = "SELECT * FROM reservasi WHERE id_reservasi = '$reservasi_id'";
$datareservasi = mysqli_query($conn, $q);
$reservasi = mysqli_fetch_assoc($datareservasi);

if ($reservasi['id_user'] !== $user_id) {
    echo "<script>document.location.href = 'index.php'</script>";
}


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
        <div class="card shadow">
            <h4 class="card-header">Data reservasi <?= $reservasi['tanggal']; ?></h4>
            <div class="card-body">
                <h4 class="card-text">Bukti TF</h4>
                <small>Silahkan TF ke nomer 08888888 , lalu kirimkan bukti tf di form di bawah</small>
                <form action="proses.php" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="file" name="bukti_tf" class="form-control">
                            <input type="hidden" value="<?= $reservasi['bukti_tf']; ?>" name="bukti_tf_check">
                            <input type="hidden" value="<?= $reservasi['id_reservasi']; ?>" name="id_reservasi">
                        </div>
                        <button type="submit" name="send-bukti-tf-reservasi" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require_once './layouts/js.php' ?>
</body>

</html>