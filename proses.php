<?php
require_once './config/db.php';
session_start();
if (!isset($_SESSION['role'])) {
    echo "<script>document.location.href = 'login.php'</script>";
}


if (isset($_POST['send-order'])) {
    $id_user = $_SESSION['id_user'];
    $total = $_POST['total'];
    $tanggal = date('Y-m-d');
    $keterangan = $_POST['keterangan'];

    if (!isset($_SESSION['role'])) {
        echo "<script>alert('silahkan login terlebih dahulu')</script>";
        echo "<script>document.location.href = 'order.php'</script>";
    }

    $q = "    INSERT INTO `orderan` 
        (`id_order`, `total`, `id_user`,`keterangan`) 
        VALUES 
        (NULL, '$total', '$id_user', '$keterangan');";
    mysqli_query($conn, $q);

    // tampilkan alert dan ke file lain
    echo "<script>alert('berhasil order menu')</script>";
    echo "<script>document.location.href = 'daftar-order.php'</script>";
}

if (isset($_POST['send-bukti-tf'])) {
    $id_order = $_POST['id_order'];

    $bukti_tf = $_POST['bukti_tf_check'];
    if ($bukti_tf == '') {
        // ubah nama
        $namaFile = date('YmdHis') . '.jpg';

        // ambil nama lain dari $post['foto']
        $namaLama = $_FILES['bukti_tf']['tmp_name'];
        $folderUpload = "foto/bukti_tf/";

        // dipindahkan ke folder baru
        move_uploaded_file($namaLama, $folderUpload . $namaFile);

        $q = "UPDATE `orderan` SET 
        `bukti_tf` = '$namaFile' 
        WHERE 
        `orderan`.`id_order` = '$id_order';";
        mysqli_query($conn, $q);

        // tampilkan alert dan ke file lain
        echo "<script>alert('berhasil upload bukti tf')</script>";
        echo "<script>document.location.href = 'daftar-order.php'</script>";
        die;
    } else {
        // hapus foto lama
        unlink('foto/bukti_tf/' . $bukti_tf);

        // kirim foto baru
        $namaFile = date('YmdHis') . '.jpg';
        $namaLama = $_FILES['bukti_tf']['tmp_name'];
        $folderUpload = "foto/bukti_tf/";
        move_uploaded_file($namaLama, $folderUpload . $namaFile);

        // quey untuk update obat
        $query = "UPDATE orderan SET
            bukti_tf = '$namaFile'
            WHERE id_order = '$id_order'
        ;";

        // jalankan query dan arahkan halaman lain
        mysqli_query($conn, $query);
        echo "<script>alert('berhasil edit bukti tf')</script>";
        echo "<script>document.location.href = 'daftar-order.php'</script>";
        die;
    }
}

if (isset($_GET['deleteOrder'])) {
    $id = $_GET['deleteOrder'];
    $id_user = $_SESSION['id'];

    $q = "SELECT * FROM orderan WHERE id_order = '$id';";
    $dataOrder = mysqli_query($conn, $q);
    $order = mysqli_fetch_assoc($dataOrder);

    if ($order['id_user'] == $id_user) {

        $delete = "DELETE FROM orderan WHERE id_order = '$id';";

        if ($order['bukti_tf'] != null) {
            unlink('foto/bukti_tf/' . $order['foto']);
        }

        mysqli_query($conn, $delete);

        // tampilkan alert dan ke file lain
        echo "<script>alert('berhasil hapus order')</script>";
        echo "<script>document.location.href = 'daftar-order.php'</script>";
    } else {

        // tampilkan alert dan ke file lain
        echo "<script>alert('anda bukan usernya')</script>";
        echo "<script>document.location.href = 'daftar-order.php'</script>";
    }
}

if (isset($_POST['change-status'])) {
    $id_order = $_POST['id_order'];
    $status = $_POST['status'];

    $q = "UPDATE `orderan` SET `status` = '$status' WHERE `orderan`.`id_order` = '$id_order';";
    mysqli_query($conn, $q);

    echo "<script>alert('berhasil ganti status pemsanan')</script>";
    echo "<script>document.location.href = 'orderan.php'</script>";
}

// reservasi
if (isset($_POST['reservasi'])) {

    if (!isset($_SESSION['role'])) {
        echo "<script>alert('Mohon login terlebih dahulu')</script>";
        echo "<script>document.location.href = 'login.php'</script>";
    }

    $jumlah_orang = $_POST['jumlah_orang'];
    $tanggal = $_POST['tanggal'];
    $keperluan = $_POST['keperluan'];
    $pesan = $_POST['pesan'];
    $id_user = $_SESSION['id_user'];

    $query = "INSERT INTO `reservasi` 
    (`id_reservasi`, `id_user`, `tanggal`, `keperluan`, `pesan`, `jumlah_orang`) 
    VALUES 
    (NULL, '$id_user', '$tanggal', '$keperluan', '$pesan', '$jumlah_orang');";

    mysqli_query($conn, $query);

    echo "<script>alert('Berhasil pesan reservasi')</script>";
    echo "<script>document.location.href = 'daftar-reservasi.php'</script>";
}

if (isset($_POST['send-bukti-tf-reservasi'])) {
    $id_reservasi = $_POST['id_reservasi'];

    $bukti_tf = $_POST['bukti_tf_check'];
    if ($bukti_tf == '') {
        // ubah nama
        $namaFile = date('YmdHis') . '.jpg';

        // ambil nama lain dari $post['foto']
        $namaLama = $_FILES['bukti_tf']['tmp_name'];
        $folderUpload = "foto/bukti_tf_reservasi/";

        // dipindahkan ke folder baru
        move_uploaded_file($namaLama, $folderUpload . $namaFile);

        $q = "UPDATE `reservasi` SET 
        `bukti_tf` = '$namaFile' 
        WHERE 
        `reservasi`.`id_reservasi` = '$id_reservasi';";
        mysqli_query($conn, $q);

        // tampilkan alert dan ke file lain
        echo "<script>alert('berhasil upload bukti tf')</script>";
        echo "<script>document.location.href = 'daftar-reservasi.php'</script>";
        die;
    } else {
        // hapus foto lama
        unlink('foto/bukti_tf_reservasi/' . $bukti_tf);

        // kirim foto baru
        $namaFile = date('YmdHis') . '.jpg';
        $namaLama = $_FILES['bukti_tf']['tmp_name'];
        $folderUpload = "foto/bukti_tf_reservasi/";
        move_uploaded_file($namaLama, $folderUpload . $namaFile);

        // quey untuk update obat
        $query = "UPDATE reservasi SET
        bukti_tf = '$namaFile'
        WHERE id_reservasi = '$id_reservasi'
    ;";

        // jalankan query dan arahkan halaman lain
        mysqli_query($conn, $query);
        echo "<script>alert('berhasil edit bukti tf')</script>";
        echo "<script>document.location.href = 'daftar-reservasi.php'</script>";
        die;
    }
}
 
if (isset($_GET['deletereservasi'])) {
    $id = $_GET['deletereservasi'];
    $id_user = $_SESSION['id_user'];

    $q = "SELECT * FROM reservasi WHERE id_reservasi = '$id';";
    $datareservasi = mysqli_query($conn, $q);
    $reservasi = mysqli_fetch_assoc($datareservasi);

    if ($reservasi['id_user'] == $id_user) {

        $delete = "DELETE FROM reservasi WHERE id_reservasi = '$id';";

        if ($reservasi['bukti_tf'] != null) {
            unlink('foto/bukti_tf_reservasi/' . $reservasi['foto']);
        }

        mysqli_query($conn, $delete);

        // tampilkan alert dan ke file lain
        echo "<script>alert('berhasil delete reservasi')</script>";
        echo "<script>document.location.href = 'daftar-reservasi.php'</script>";
    } else {
        // tampilkan alert dan ke file lain
        echo "<script>alert('anda belum login')</script>";
        echo "<script>document.location.href = 'daftar-reservasi.php'</script>";
    }
}
