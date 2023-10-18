<?php
require_once './config/db.php';
session_start();
if (isset($_SESSION['username'])) {
    echo "<script>document.location.href = 'index.php'</script>";
}
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
    <section class=" py-3" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form action="auth.php" method="post">

                                <h3 class="mb-5">register form</h3>

                                <div class="form-outline mb-4">
                                    <input type="text" id="typeEmailX-2" class="form-control form-control-lg" name="name" />
                                    <label class="form-label" for="typeEmailX-2">Name</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="text" id="typeEmailX-2" class="form-control form-control-lg" name="username" />
                                    <label class="form-label" for="typeEmailX-2">Username</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="text" id="typeEmailX-2" class="form-control form-control-lg" name="no_telp" />
                                    <label class="form-label" for="typeEmailX-2">No Telp</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="email" id="typeEmailX-2" class="form-control form-control-lg" name="email" />
                                    <label class="form-label" for="typeEmailX-2">Email</label>
                                </div>


                                <div class="form-outline mb-4">
                                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" />
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                </div>



                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="register">Register</button>
                                <p class="mt-3">Sudah ada akun? <a href="login.php">login</a></p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once './layouts/js.php' ?>
</body>

</html>