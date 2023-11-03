<?php
require_once '../config/db.php';
session_start();    
if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager'){
    // menu
    $menuAll = mysqli_query($conn, "SELECT COUNT(*) as total FROM menu");
    $menu = mysqli_fetch_assoc($menuAll);

    $orderanAll = mysqli_query($conn, "SELECT COUNT(*) as total FROM orderan");
    $orderan = mysqli_fetch_assoc($orderanAll);

    $reservasiAll = mysqli_query($conn, "SELECT COUNT(*) as total FROM reservasi");
    $reservasi = mysqli_fetch_assoc($reservasiAll);
}

if($_SESSION['role'] == 'admin_bahan' || $_SESSION['role'] == 'manager'){
    $bahanAll = mysqli_query($conn, "SELECT COUNT(*) as total FROM bahan");
    $bahan = mysqli_fetch_assoc($bahanAll);

    $bahan_masukAll = mysqli_query($conn, "SELECT COUNT(*) as total FROM bahan_masuk");
    $bahan_masuk = mysqli_fetch_assoc($bahan_masukAll);

    $bahan_keluarAll = mysqli_query($conn, "SELECT COUNT(*) as total FROM bahan_keluar");
    $bahan_keluar = mysqli_fetch_assoc($bahan_keluarAll);
}

?>
<?php require_once './layouts/atas.php' ?>
<!-- / Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <?php if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager'): ?>
    <div class="row">
        <div class="col-lg-4 mb-4 order-0">
            <div class="card p-1">
                <div class="card-body">
                    <h4>Jumlah menu</h4>
                    <h5><?= $menu['total']; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4 order-0">
            <div class="card p-1">
                <div class="card-body">
                    <h4>Jumlah reservasi</h4>
                    <h5><?= $reservasi['total']; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4 order-0">
            <div class="card p-1">
                <div class="card-body">
                    <h4>Jumlah orderan</h4>
                    <h5><?= $orderan['total']; ?></h5>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if($_SESSION['role'] == 'admin_bahan' || $_SESSION['role'] == 'manager'): ?>
        <div class="row">
        <div class="col-lg-4 mb-4 order-0">
            <div class="card p-1">
                <div class="card-body">
                    <h4>Jumlah bahan</h4>
                    <h5><?= $bahan['total']; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4 order-0">
            <div class="card p-1">
                <div class="card-body">
                    <h4>Jumlah bahan masuk</h4>
                    <h5><?= $bahan_masuk['total']; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4 order-0">
            <div class="card p-1">
                <div class="card-body">
                    <h4>Jumlah bahan keluar</h4>
                    <h5><?= $bahan_keluar['total']; ?></h5>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-12">
            
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Selamat datang <?= $_SESSION['role']; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<?php require_once './layouts/bawah.php' ?>