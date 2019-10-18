-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2019 at 04:37 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surveyweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(32) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(12) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `tanggal`, `harga`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Beras Premium', '2019-10-18', 17000, 2, '2019-10-17 00:00:00', '2019-10-18 09:29:45'),
(2, 'Beras Medium', '2019-10-17', 12000, 2, '2019-10-17 00:00:00', '2019-10-18 07:31:47'),
(3, 'Beras KW III', '2019-10-19', 15000, 2, '2019-10-18 00:48:08', '2019-10-18 07:31:44'),
(4, 'Ubi Kayu', '2019-10-16', 12500, 2, '2019-10-18 04:24:47', '2019-10-18 06:29:14'),
(5, 'Cabe Merah Keriting', '2019-10-19', 35000, 2, '2019-10-18 09:15:18', '2019-10-18 09:31:50'),
(6, 'Daging Sapi', '2019-10-19', 45500, 2, '2019-10-18 09:15:47', '2019-10-18 09:31:53'),
(7, 'Gula', '2019-10-19', 15500, 1, '2019-10-18 09:16:13', '2019-10-18 09:30:56');

--
-- Triggers `barang`
--
DELIMITER $$
CREATE TRIGGER `logupdate` BEFORE UPDATE ON `barang` FOR EACH ROW BEGIN
INSERT INTO log_barang
	SET nama_barang = old.nama_barang,
    harga = old.harga,
    tanggal = old.tanggal,
    status =old.status;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_barang`
--

CREATE TABLE `log_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(32) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_barang`
--

INSERT INTO `log_barang` (`id`, `nama_barang`, `tanggal`, `harga`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Beras Premium', '2019-10-19', 14000, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Beras Premium', '2019-10-20', 16000, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Beras Medium', '0000-00-00', 10000, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Beras Medium', '2019-10-17', 12000, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Beras KW III', '0000-00-00', 14000, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Beras KW III', '2019-10-19', 15000, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Beras KW III', '2019-10-19', 15000, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Beras Medium', '2019-10-17', 12000, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Gula', '2019-10-18', 13500, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Daging Sapi', '2019-10-18', 18500, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Cabe Merah Keriting', '2019-10-18', 25000, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Beras Premium', '2019-10-20', 16000, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Beras Premium', '2019-10-20', 16000, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Beras Premium', '2019-10-18', 17000, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Beras Premium', '2019-10-18', 17000, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Cabe Merah Keriting', '2019-10-18', 25000, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Cabe Merah Keriting', '2019-10-19', 35000, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Daging Sapi', '2019-10-18', 18500, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Daging Sapi', '2019-10-19', 45500, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Gula', '2019-10-18', 13500, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Gula', '2019-10-19', 15500, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Cabe Merah Keriting', '2019-10-19', 35000, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Daging Sapi', '2019-10-19', 45500, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Belum Validasi'),
(2, 'Tervalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `remember_token`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$9//VwRQ1w9CwpojqVqwO6OhjfCY0yG7Kjtbjqk81Hicj82nxQb5LG', 1, ''),
(2, 'surveyor', 'surveyor@admin.com', '$2y$10$9//VwRQ1w9CwpojqVqwO6OhjfCY0yG7Kjtbjqk81Hicj82nxQb5LG', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_barang`
--
ALTER TABLE `log_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log_barang`
--
ALTER TABLE `log_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
