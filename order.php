<?php
require_once './config/db.php';
session_start();

$q = "SELECT * FROM menu";
$dataMenu = mysqli_query($conn, $q);
$no = 1;

$len = 0;
foreach ($dataMenu as $key => $val) {
    $len++;
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
    <div class="container mb-4" style="margin-top: 140px;">
        <form action="proses.php" method="post">
            <div class="row justify-content-center">
                <?php foreach ($dataMenu as $menu) : ?>
                    <div class="col-md-4 col-sm-6 col-lg-3 my-3 ">
                        <div class="card shadow" style="width: 300px; height: 300px; ">
                            <img src="./foto/<?= $menu['foto']; ?>" class="card-img-top" alt="..." height="200px">
                            <div class="card-body">
                                <h5 class="card-title"><?= $menu['nama']; ?></h5>
                                <small class="card-text text-muted">Stok : <?= $menu['stok']; ?></small>
                                <p class="card-text"><?= $menu['deskripsi']; ?></p>
                                <p class="card-text mb-3"><?= rupiah($menu['harga']); ?></p>
                                <input type="number" class="input<?= $no; ?> form-control" onkeyup="hitung()" placeholder="Jumlah beli">

                                <input type="hidden" class="harga<?= $no; ?>" value="<?= $menu['harga']; ?>">
                                <input type="hidden" class="nama<?= $no; ?>" value="<?= $menu['nama']; ?>">
                            </div>
                        </div>
                    </div>
                <?php $no++;
                endforeach; ?>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-4 border">
                    <div class="container py-3">
                        <h4>Struk</h4>
                        <p>Total : Rp. <span id="total-box"></span></p>
                        <ul class="list-beli">
                            <li>List Pembelian : </li>
                            <a href="#lihat" id="lihat" onclick="lihatList()">Sudah yakinkah anda?</a>
                        </ul>
                        <button type="submit" name="send-order" class="btn btn-primary mt-3 d-none">Order</button>

                    </div>
                </div>
                <input type="hidden" id="total-box-send" name="total">
                <input type="hidden" id="keterangan-box" name="keterangan">
            </div>
        </form>
    </div>


    <script>
        const jumlah = <?= $len; ?>;
        const listMenu = document.querySelector('.list-beli');
        const ketBox = document.querySelector('#keterangan-box');
        let list = ``;
        let int = 0;

        function hitung() {
            let total = 0;
            const totalBox = document.getElementById('total-box');

            for (let i = 1; i <= jumlah; i++) {
                let sementara = document.querySelector(".input" + i).value;
                let jumlah = document.querySelector(".harga" + i).value;
                let nama = document.querySelector(".nama" + i).value;

                total += sementara * jumlah;
            }

            document.getElementById('total-box-send').value = total;
            totalBox.innerHTML = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')
        }

        function lihatList() {
            document.getElementById('lihat').remove()

            for (let i = 1; i <= jumlah; i++) {
                let jumlah = document.querySelector(".input" + i).value;
                let nama = document.querySelector(".nama" + i).value;

                if (jumlah > 0) {
                    const menuW = `${nama} ${jumlah}x`;
                    const el = document.createElement('li');
                    const textNode = document.createTextNode(menuW);
                    el.appendChild(textNode);
                    listMenu.appendChild(el)

                    if (int == 0) {
                        list += `${menuW}`;
                    } else {
                        list += `, ${menuW}`;
                    }
                    int++;
                }
            }
            ketBox.value = list;

            document.querySelector('.d-none').classList.toggle('d-none')
        }
    </script>
</body>

</html>