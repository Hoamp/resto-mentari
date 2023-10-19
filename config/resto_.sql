-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2023 at 06:35 AM
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
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(11) NOT NULL,
  `nama` varchar(222) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(222) NOT NULL,
  `foto` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama`, `stok`, `satuan`, `foto`) VALUES
(1, 'minyak', 45, 'liter', NULL),
(2, 'sabun', 22, 'batang', NULL),
(3, 'te', 787, '54', NULL),
(4, 'asd', 123, '123', '20231012094634.jpg'),
(5, 'weq', 123, '132', '20231012094653.jpg'),
(6, 'weq', 123, '132', '20231012094711.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_keluar`
--

CREATE TABLE `bahan_keluar` (
  `id_bahan_keluar` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `keterangan` varchar(222) NOT NULL,
  `tanggal_keluar` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan_keluar`
--

INSERT INTO `bahan_keluar` (`id_bahan_keluar`, `id_bahan`, `jumlah_keluar`, `keterangan`, `tanggal_keluar`) VALUES
(1, 3, 400, 'qwe', '2023-10-18 14:25:49');

--
-- Triggers `bahan_keluar`
--
DELIMITER $$
CREATE TRIGGER `cancel_bahan_keluar` AFTER DELETE ON `bahan_keluar` FOR EACH ROW BEGIN
	UPDATE bahan SET
    stok = stok + old.jumlah_keluar
    WHERE id_bahan = old.id_bahan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_bahan_keluar` AFTER INSERT ON `bahan_keluar` FOR EACH ROW BEGIN
	UPDATE bahan SET
    stok = stok - new.jumlah_keluar
    WHERE id_bahan = new.id_bahan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bahan_masuk`
--

CREATE TABLE `bahan_masuk` (
  `id_bahan_masuk` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `keterangan` varchar(222) NOT NULL,
  `tanggal_masuk` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan_masuk`
--

INSERT INTO `bahan_masuk` (`id_bahan_masuk`, `id_bahan`, `jumlah_masuk`, `keterangan`, `tanggal_masuk`) VALUES
(1, 2, 4, 'kk', '2023-10-18 12:38:35'),
(9, 1, 22, '22', '2023-10-18 13:18:35'),
(10, 3, 1133, '123', '2023-10-18 14:03:02'),
(11, 1, 12, 'iugkhhjhjkhhjkl', '2023-10-19 10:44:02');

--
-- Triggers `bahan_masuk`
--
DELIMITER $$
CREATE TRIGGER `cancel_bahan_masuk` AFTER DELETE ON `bahan_masuk` FOR EACH ROW BEGIN
	UPDATE bahan SET
    stok = stok - old.jumlah_masuk
    WHERE id_bahan = old.id_bahan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_bahan_masuk` AFTER INSERT ON `bahan_masuk` FOR EACH ROW BEGIN
		
    UPDATE bahan SET
    stok = stok + new.jumlah_masuk
    WHERE id_bahan = new.id_bahan;
    
END
$$
DELIMITER ;

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
(17, 'esh', 6000, 22, 'esh', '20230924044247.jpg'),
(18, 'asd', 0, 212, '', '20231012092909.jpg');

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
  `tanggal` datetime DEFAULT current_timestamp(),
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`id_order`, `total`, `id_user`, `status`, `bukti_tf`, `tanggal`, `keterangan`) VALUES
(2, 89000, 2, 'pending', '20230925091754.jpg', '2023-09-20 00:00:00', NULL),
(3, 44500, 3, 'pending', '20230923043755.jpg', '2023-09-06 00:00:00', NULL),
(13, 26000, 3, 'pending', NULL, NULL, 'Nasi Goreng 2x'),
(19, 26000, 3, 'pending', NULL, '2023-10-11 20:17:27', 'Nasi Goreng 2x'),
(20, 40000, 3, 'pending', NULL, '2023-10-12 11:24:31', 'Nasi Goreng 2x, rawon 1x'),
(21, 48000, 0, 'pending', NULL, '2023-10-12 13:52:42', 'Teh 2x, rawon 2x, esh 2x'),
(22, 71000, 3, 'diproses', '20231012085357.jpg', '2023-10-12 13:53:08', 'Jeruk 2x, Nasi Goreng 2x, soto 1x, rawon 2x');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `keperluan` varchar(222) NOT NULL,
  `pesan` varchar(222) NOT NULL,
  `jumlah_orang` int(5) NOT NULL,
  `status` varchar(222) DEFAULT 'pending',
  `bukti_tf` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_user`, `tanggal`, `keperluan`, `pesan`, `jumlah_orang`, `status`, `bukti_tf`) VALUES
(4, 3, '2023-10-11 14:29:00', 'pesta', '2', 2, 'diproses', '20231011151935.jpg'),
(6, 3, '2023-10-11 19:45:00', 'pernikahan', 'mau makan es teh 8', 11, 'pending', ''),
(7, 2, '2023-10-11 20:23:00', 'pesta', 'ww', 2, 'pending', NULL);

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
  `no_telp` varchar(22) DEFAULT NULL,
  `email` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `role`, `no_telp`, `email`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL, 'admin@gmail.com'),
(2, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'user', '00', 'a@gmail.com'),
(3, 'alex', 'alex', '534b44a19bf18d20b71ecc4eb77c572f', 'user', '123', 'alex@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `bahan_keluar`
--
ALTER TABLE `bahan_keluar`
  ADD PRIMARY KEY (`id_bahan_keluar`);

--
-- Indexes for table `bahan_masuk`
--
ALTER TABLE `bahan_masuk`
  ADD PRIMARY KEY (`id_bahan_masuk`);

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
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bahan_keluar`
--
ALTER TABLE `bahan_keluar`
  MODIFY `id_bahan_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bahan_masuk`
--
ALTER TABLE `bahan_masuk`
  MODIFY `id_bahan_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orderan`
--
ALTER TABLE `orderan`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
