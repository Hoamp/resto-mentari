<?php
require_once './config/db.php';
session_start();
$query = "SELECT * FROM menu ORDER BY id_menu desc LIMIT 6 ";
$dataMenu = mysqli_query($conn, $query);
$max = 3;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Resto <?= $resto; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php require_once './layouts/css.php' ?>
</head>

<body>
    <?php require_once './layouts/header.php' ?>

    <!-- ***** Main Banner Area Start ***** -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
                            <h4>Resto <?= $resto; ?></h4>
                            <h6>Kenikmatan di sebuah kemegahan</h6>
                            <div class="main-white-button scroll-to-section">
                                <a href="#reservation">Buat Reservasi</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <img src="assets/images/slide-01.jpg" alt="">
                                </div>
                            </div>
                            <!-- // Item -->
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <img src="assets/images/slide-02.jpg" alt="">
                                </div>
                            </div>
                            <!-- // Item -->
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <img src="assets/images/slide-03.jpg" alt="">
                                </div>
                            </div>
                            <!-- // Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Tentang Kita</h6>
                            <h2>Kemewahan setiap detiknya</h2>
                        </div>
                        <p>Resto <?= $resto; ?> adalah restoran yang akan memberikan anda nuansa megah di setiap saatnya
                            <br><br>
                            Begitu banyak pilihan menu yang bisa kami tawarkan
                        </p>
                        <div class="row">
                            <?php foreach ($dataMenu as $menu) : ?>

                                <?php if ($max > 0) { ?>
                                    <div class="col-4">
                                        <img src="foto/<?= $menu['foto']; ?>" alt="menu">
                                    </div>
                                <?php } else {
                                    continue;
                                } ?>

                            <?php $max--;
                            endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
                            <a rel="nofollow" href="http://youtube.com"><i class="fa fa-play"></i></a>
                            <img src="assets/images/about-video-bg.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->

    <!-- ***** Menu Area Starts ***** -->
    <section class="section" id="offers">
        <div class="container">
            <div class="row ">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Beberapa Menu Kami</h6>
                        <h2>Menu Kami Untuk Anda Rasakan</h2>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <div class="row" id="tabs">
                        <div class="col-lg-12">
                            <section class='tabs-content'>
                                <article>
                                    <div class="row ">
                                        <?php foreach ($dataMenu as $menu) : ?>
                                            <div class="col-lg-6">
                                                <div class="tab-item">
                                                    <img src="foto/<?= $menu['foto']; ?>" alt="">
                                                    <h4><?= $menu['nama']; ?></h4>
                                                    <p><?= $menu['deskripsi']; ?></p>
                                                    <div class="price">
                                                        <h6><?= rupiahNoRp($menu['harga']); ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </article>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Menu Area Ends ***** -->

    <!-- ***** Chefs Area Starts ***** -->
    <section class="section" id="chefs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Our Chefs</h6>
                        <h2>We offer the best ingredients for you</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="chef-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            <img src="assets/images/chefs-01.jpg" alt="Chef #1">
                        </div>
                        <div class="down-content">
                            <h4>Randy Walker</h4>
                            <span>Pastry Chef</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="chef-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                            <img src="assets/images/chefs-02.jpg" alt="Chef #2">
                        </div>
                        <div class="down-content">
                            <h4>David Martin</h4>
                            <span>Cookie Chef</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="chef-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                            </ul>
                            <img src="assets/images/chefs-03.jpg" alt="Chef #3">
                        </div>
                        <div class="down-content">
                            <h4>Peter Perkson</h4>
                            <span>Pancake Chef</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Chefs Area Ends ***** -->

    <!-- ***** Reservation Us Area Starts ***** -->
    <section class="section" id="reservation">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Reservasi</h6>
                            <h2>Disini anda dapat memesan tempat duduk untuk kemudian hari</h2>
                        </div>
                        <p>Donec pretium est orci, non vulputate arcu hendrerit a. Fusce a eleifend riqsie, namei sollicitudin urna diam, sed commodo purus porta ut.</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="phone">
                                    <i class="fa fa-phone"></i>
                                    <h4>Nomor Hp Owner</h4>
                                    <span><a href="#">080-090-0990</a><br><a href="#">080-090-0880</a></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="message">
                                    <i class="fa fa-envelope"></i>
                                    <h4>Emails Owner</h4>
                                    <span><a href="#">hello@company.com</a><br><a href="#">info@company.com</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <form id="contact" action="proses.php" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>Table Reservasi</h4>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <fieldset>
                                        <input name="nama" type="text" id="name" placeholder="Nama : " required="" value="<?= (isset($_SESSION['nama'])) ? $_SESSION['nama'] : ""; ?>" readonly>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="text" id="email" placeholder="email : " required="" value="<?= (isset($_SESSION['email'])) ? $_SESSION['email'] : ""; ?>" readonly>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <fieldset>
                                        <input name="no_telp" type="text" id="phone" placeholder="Nomor Telp : " required="" value="<?= (isset($_SESSION['no_telp'])) ? $_SESSION['no_telp'] : ""; ?>" readonly>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input name="jumlah_orang" type="number" id="jumlah_orang" placeholder="Jumlah Orang : " required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <div id="filterDate2">
                                        <div class="">
                                            <input name="tanggal" id="date" type="text" class="form-control" required onfocus="this.type = 'datetime-local'" placeholder="tanggal reservasi">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <select value="time" name="keperluan" id="time">
                                            <option value="time">Keperluan</option>
                                            <option value="pesta">pesta</option>
                                            <option value="meeting">meeting</option>
                                            <option value="pernikahan">pernikahan</option>
                                            <option value="date">date</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="pesan" rows="6" id="message" placeholder="Pesan untuk pemesanan" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button-icon" name="reservasi">Reservasi</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Reservation Area Ends ***** -->



    <?php require_once './layouts/footer.php' ?>

    <?php require_once './layouts/js.php' ?>
</body>

</html>