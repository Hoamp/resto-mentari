<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'resto_';
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

$resto = 'Mentari';
$urlResto = '/resto_mentari/';

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
function rupiahNoRp($angka)
{
    $hasil_rupiah = number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}
