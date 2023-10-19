<?php
require_once '../config/db.php';
date_default_timezone_set('Asia/Jakarta');

// Create
if (isset($_POST['tambah-menu'])) {
    $nama = $_POST['nama'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    // ubah nama
    $namaFile = date('YmdHis') . '.jpg';

    // ambil nama lain dari $post['foto']
    $namaLama = $_FILES['foto']['tmp_name'];
    $folderUpload = "../foto/";

    // dipindahkan ke folder baru
    move_uploaded_file($namaLama, $folderUpload . $namaFile);

    $query = "INSERT INTO `menu` 
        (`id_menu`, `nama`, `harga`, `stok`, `deskripsi`, `foto`) 
        VALUES 
        (NULL, '$nama', '$harga', '$stok', '$deskripsi', '$namaFile');";

    mysqli_query($conn, $query);

    // tampilkan alert dan ke file lain
    echo "<script>alert('berhasil tambah menu')</script>";
    echo "<script>document.location.href = 'menu.php'</script>";
}

// Delete
if (isset($_GET['d'])) {
    // ambil uniknya / foto
    $delFot = $_GET['d'];

    // hapus foto
    unlink('../foto/' . $delFot);

    // jalankan hapus data di db
    $query = "DELETE FROM menu WHERE foto = '$delFot'";
    mysqli_query($conn, $query);

    // arahkan ke halaman lain
    echo "<script>alert('berhasil')</script>";
    echo "<script>document.location.href = 'menu.php'</script>";
}

// Edit
if (isset($_POST['edit-menu'])) {
    // ambil semua inputan
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // untuk melakukan pengecekan jika user memberikan foto
    $foto = $_POST['foto'];
    if ($_FILES['foto']['name'] == "") {
        // jika tidak ada foto yang dikirim
        $query = "UPDATE `menu` SET 
            `nama` = '$nama', 
            `harga` = '$harga', 
            `stok` = '$stok', 
            `deskripsi` = '$deskripsi' 
            WHERE `menu`.`id_menu` = '$id';";

        // jalankan querynya
        mysqli_query($conn, $query);
        echo "<script>alert('berhasil edit menu')</script>";
        echo "<script>document.location.href = 'menu.php'</script>";
        die;
    } else {
        // jika ada foto yang dikirim
        $delFot = $_POST['foto'];
        // hapus foto lama
        unlink('../foto/' . $delFot);

        // kirim foto baru
        $namaFile = date('YmdHis') . '.jpg';
        $namaLama = $_FILES['foto']['tmp_name'];
        $folderUpload = "../foto/";
        move_uploaded_file($namaLama, $folderUpload . $namaFile);

        // quey untuk update obat
        $query = "UPDATE menu SET
            nama = '$nama',
            deskripsi = '$deskripsi',
            harga = '$harga',
            stok = '$stok',
            foto = '$namaFile'
            WHERE id_menu = '$id'
        ;";

        // jalankan query dan arahkan halaman lain
        mysqli_query($conn, $query);
        echo "<script>alert('berhasil edit menu')</script>";
        echo "<script>document.location.href = 'menu.php'</script>";
        die;
    }
}

if (isset($_POST['tambah-data-bahan'])) {
    $nama = $_POST['nama'];
    $stok = $_POST['stok'];
    $satuan = $_POST['satuan'];
    $foto = $_FILES['foto']['tmp_name'];
    if ($foto == '') {
        $q = "INSERT INTO `bahan` 
        (`id_bahan`, `nama`, `stok`, `satuan`,  `foto`) 
        VALUES 
        (NULL, '$nama', '$stok', '$satuan',  NULL);";

        mysqli_query($conn, $q);

        echo "<script>alert('berhasil tambah bahan')</script>";
        echo "<script>document.location.href = 'bahan_persediaan.php'</script>";
        die;
    } else {
        // ubah nama
        $namaFile = date('YmdHis') . '.jpg';

        // ambil nama lain dari $post['foto']
        $namaLama = $_FILES['foto']['tmp_name'];
        $folderUpload = "./foto/bahan/";

        // dipindahkan ke folder baru
        move_uploaded_file($namaLama, $folderUpload . $namaFile);

        $q = "INSERT INTO `bahan` 
        (`id_bahan`, `nama`, `stok`, `satuan`, `foto`) 
        VALUES 
        (NULL, '$nama', '$stok', '$satuan', '$namaFile');";

        mysqli_query($conn, $q);


        echo "<script>alert('berhasil tambah bahan')</script>";
        echo "<script>document.location.href = 'bahan_persediaan.php'</script>";
    }
}

if (isset($_POST['tambah-bahan-masuk'])) {
    $id_bahan = $_POST['id_bahan'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];

    $q = "INSERT INTO `bahan_masuk` 
    (`id_bahan_masuk`, `id_bahan`, `jumlah_masuk`, `keterangan`) 
    VALUES 
    (NULL, '$id_bahan', '$jumlah', '$keterangan');";
    $do_q = mysqli_query($conn, $q);

    // arahkan ke halaman lain
    echo "<script>alert('Berhasil tambah bahan masuk');</script>";
    echo "<script>window.location.href = 'bahan_masuk.php';</script>";
}

if (isset($_POST['tambah-bahan-keluar'])) {
    $id_bahan = $_POST['id_bahan'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];

    $q = "INSERT INTO `bahan_keluar` 
    (`id_bahan_keluar`, `id_bahan`, `jumlah_keluar`, `keterangan`) 
    VALUES 
    (NULL, '$id_bahan', '$jumlah', '$keterangan');";
    $do_q = mysqli_query($conn, $q);

    // arahkan ke halaman lain
    echo "<script>alert('Berhasil tambah bahan keluar');</script>";
    echo "<script>window.location.href = 'bahan_keluar.php';</script>";
}

if (isset($_GET['hapus_keluar'])) {
    $id_bahan = $_GET['hapus_keluar'];

    $q = "DELETE FROM bahan_keluar WHERE id_bahan_keluar = '$id_bahan'";
    $do_q = mysqli_query($conn, $q);

    // arahkan ke halaman lain
    echo "<script>alert('Berhasil delete bahan keluar');</script>";
    echo "<script>window.location.href = 'bahan_keluar.php';</script>";
}

if (isset($_GET['hapus_masuk'])) {
    $id_bahan = $_GET['hapus_masuk'];

    $q = "DELETE FROM bahan_masuk WHERE id_bahan_masuk = '$id_bahan'";
    $do_q = mysqli_query($conn, $q);

    // arahkan ke halaman lain
    echo "<script>alert('Berhasil delete bahan masuk');</script>";
    echo "<script>window.location.href = 'bahan_masuk.php';</script>";
}
