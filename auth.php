<?php
require_once './config/db.php';
// loogin
if (isset($_POST['login'])) {
    // ambil username dan password
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // jika username adalah admin
    if ($username == 'admin') {
        // dan passwordnya juga admin
        if ($password == "21232f297a57a5a743894a0e4a801fc3") {
            // session start dengan nama user dan role
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'admin';

            // kembalikan ke halaman admin/index dengan tambahan alert
            echo "<script>alert('Selamat datang admin')</script>";
            echo "<script>document.location.href = 'admin/index.php'</script>";
            die;
        }
        // jika password salah
        echo "<script>alert('Username atau Password salah')</script>";
        echo "<script>document.location.href = 'login.php'</script>";
        die;
    }else if($username == 'admin_bahan'){
        // dan passwordnya juga admin
        if ($password == "21232f297a57a5a743894a0e4a801fc3") {
            // session start dengan nama user dan role
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'admin_bahan';

            // kembalikan ke halaman admin/index dengan tambahan alert
            echo "<script>alert('Selamat datang admin bahan')</script>";
            echo "<script>document.location.href = 'admin/index.php'</script>";
            die;
        }
        // jika password salah
        echo "<script>alert('Username atau Password salah')</script>";
        echo "<script>document.location.href = 'login.php'</script>";
    }else if($username == 'manager'){
        // dan passwordnya juga admin
        if ($password == "1d0258c2440a8d19e716292b231e3190") {
            // session start dengan nama user dan role
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'manager';

            // kembalikan ke halaman admin/index dengan tambahan alert
            echo "<script>alert('Selamat datang manager')</script>";
            echo "<script>document.location.href = 'admin/index.php'</script>";
            die;
        }
        // jika password salah
        echo "<script>alert('Username atau Password salah')</script>";
        echo "<script>document.location.href = 'login.php'</script>";
    }else {
        // jika yang login bukan admin, ambil data username yang ada
        $query = "SELECT * FROM users WHERE username = '$username'";
        $dataUser = mysqli_query($conn, $query);

        $data = mysqli_fetch_assoc($dataUser);

        // jika users kosong
        if ($data == null) {
            echo "<script>alert('Username tidak ditemukan')</script>";
            echo "<script>document.location.href = 'login.php'</script>";
            die;
            // jika password salah
        } else if ($data['password'] <> $password) {
            echo "<script>alert('Password salah')</script>";
            echo "<script>document.location.href = 'login.php'</script>";
            die;
            // jika benar username dan passwordnya
        } else {
            // berikan session
            session_start();
            $_SESSION['role'] = 'user';
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['no_telp'] = $data['no_telp'];

            // arahkan ke halaman index
            echo "<script>alert('Berhasil login')</script>";
            echo "<script>document.location.href = 'index.php'</script>";
            die;
        }
    }
}


// register
if (isset($_POST['register'])) {
    // ambil inputan usres
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $name = $_POST['name'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];

    // cari apakah ada users yang sama
    $query = "SELECT * FROM users WHERE username = '$username'";
    $dataUsername = mysqli_query($conn, $query);

    $check = mysqli_fetch_assoc($dataUsername);

    // jika tidak ada users yang sama, maka buatkan akun baru
    if ($check == null) {
        // insert ke database
        $query = "INSERT INTO `users` 
        (`id_user`, `nama`, `username`, `password`, `no_telp`, `email`) 
        VALUES 
        (NULL, '$name', '$username', '$password', '$no_telp', '$email');";
        mysqli_query($conn, $query);

        // berikan alert dan arahkan ke halaman login
        echo "<script>alert('Berhasil register!')</script>";
        echo "<script>document.location.href = 'login.php'</script>";
        die;
    } else {
        // jika sudah ada username yang sama
        echo "<script>alert('Username sudah dipakai, silahkan memakai username lain')</script>";
        echo "<script>document.location.href = 'register.php'</script>";
        die;
    }
}
