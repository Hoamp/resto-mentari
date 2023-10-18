-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2023 at 01:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto_`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(10) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `foto` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama`, `harga`, `stok`, `deskripsi`, `foto`) VALUES
(11, 'Teh', 4000, 100, 'bisa es / anget', '20230914131919.jpg'),
(12, 'Jeruk', 4500, 122, 'bisa es / anget', '20230914132247.jpg'),
(13, 'Nasi Goreng', 13000, 111, 'sosis / bakso / telur', '20230914132904.jpg'),
(14, 'Ayam', 15000, 99, 'bakar / goreng', '20230914133333.jpg'),
(15, 'soto', 8000, 89, 'besar / kecil', '20230914133414.jpg'),
(16, 'rawon', 14000, 111, 'biasa', '20230923045331.jpg'),
(17, 'esh', 6000, 22, 'esh', '20230924044247.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE `orderan` (
  `id_order` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(222) NOT NULL DEFAULT 'pending',
  `bukti_tf` varchar(222) DEFAULT NULL,
  `tanggal` date DEFAULT current_timestamp(),
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`id_order`, `total`, `id_user`, `status`, `bukti_tf`, `tanggal`, `keterangan`) VALUES
(2, 89000, 2, 'pending', '20230925091754.jpg', '2023-09-20', NULL),
(3, 44500, 3, 'pending', '20230923043755.jpg', '2023-09-06', NULL),
(5, 8000, 0, 'pending', NULL, '2023-09-15', NULL),
(6, 46000, 3, 'diproses', NULL, '2023-09-22', 'Teh 1x, Nasi Goreng 2x, soto 2x'),
(7, 135000, 3, 'pending', NULL, '2023-09-22', 'Ayam 9x'),
(8, 23000, 0, 'pending', NULL, NULL, 'Teh 2x, Ayam 1x'),
(9, 36000, 0, 'pending', NULL, NULL, 'Teh 2x, Nasi Goreng 1x, Ayam 1x');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(222) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(22) NOT NULL DEFAULT 'user',
  `no_telp` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `role`, `no_telp`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL),
(2, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'user', NULL),
(3, 'alex', 'alex', '534b44a19bf18d20b71ecc4eb77c572f', 'user', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orderan`
--
ALTER TABLE `orderan`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
