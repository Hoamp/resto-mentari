    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky shadow-sm">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.php" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                            <li class="scroll-to-section"><a href="index.php#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#reservation">Reservation</a></li>
                            <li class="scroll-to-section"><a href="order.php">Order</a></li>

                            <?php if (isset($_SESSION['role'])) { ?>
                                <li class="scroll-to-section"><a href="daftar-order.php">My Order</a></li>
                                <li class="scroll-to-section"><a href="daftar-reservasi.php">My Reserv</a></li>
                                <li class="scroll-to-section"><a href="logout.php">Logout</a></li>
                            <?php } else { ?>
                                <li class="scroll-to-section"><a href="login.php">Login</a></li>
                            <?php } ?>


                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->