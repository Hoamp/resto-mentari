<?php
if(!isset($_SESSION['role'])){
    session_start();
}

if (!isset($_SESSION['role'])) {
    echo "<script>document.location.href = '../index.php'</script>";
    if ($_SESSION['role'] !== 'admin' || $_SESSION['role'] !== 'admin_bahan') {
        echo "<script>document.location.href = '../index.php'</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Halaman admin</title>

    <meta name="description" content="" />

    <?php require_once("css.php") ?>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php require_once 'aside.php' ?>

            <!-- Layout container -->
            <div class="layout-page">
                <?php require_once 'navbar.php' ?>

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->