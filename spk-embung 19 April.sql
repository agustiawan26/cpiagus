-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2020 at 03:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-embung`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `alternatif_id` int(11) NOT NULL,
  `alternatif` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`alternatif_id`, `alternatif`, `kecamatan`) VALUES
(1, 'Dadapayam', 'Suruh'),
(2, 'Mluweh', 'Ungaran Timur'),
(3, 'Lebak', 'Bringin'),
(4, 'Pakis', 'Bringin'),
(5, 'Jatikurung', 'Bergas'),
(6, 'Gogodalem', 'Bringin'),
(7, 'Kandangan', 'Bawen'),
(8, 'Ngrawan', 'Getasan');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `bobot` double NOT NULL,
  `tren` enum('positif','negatif') NOT NULL DEFAULT 'negatif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kriteria_id`, `kriteria`, `bobot`, `tren`) VALUES
(1, 'Volume material timbunan', 0.700926126612452, 'negatif'),
(2, 'Luas daerah yang akan dibebaskan', 1.84695463245222, 'negatif'),
(3, 'Volume tampungan efektif', 0.981563571167843, 'positif'),
(4, 'Lama operasi', 1.17282616992441, 'negatif'),
(5, 'Harga air/m3', 0.95258250076859, 'negatif'),
(6, 'Akses jalan menuju site bendungan', 0.752140793374472, 'negatif'),
(7, 'Vegetasi area genangan embung', 0.936521389397292, 'negatif');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_tbl`
--

CREATE TABLE `nilai_tbl` (
  `nilai_id` int(11) NOT NULL,
  `nilai_kriteria_id` int(11) NOT NULL,
  `nilai_alternatif_id` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_tbl`
--

INSERT INTO `nilai_tbl` (`nilai_id`, `nilai_kriteria_id`, `nilai_alternatif_id`, `nilai`) VALUES
(1, 1, 1, 7280),
(2, 1, 2, 196390),
(3, 1, 3, 99140),
(4, 1, 4, 11430),
(5, 1, 5, 29280),
(6, 1, 6, 54722.35),
(7, 1, 7, 46406.3),
(8, 1, 8, 28740),
(9, 2, 1, 4.2),
(10, 2, 2, 2.202),
(11, 2, 3, 2.4),
(12, 2, 4, 3.4),
(13, 2, 5, 5.3),
(14, 2, 6, 7.32),
(15, 2, 7, 2.83),
(16, 2, 8, 4.3),
(17, 3, 1, 538922.375),
(18, 3, 2, 3172333.3),
(19, 3, 3, 783976.8),
(20, 3, 4, 1346651.091),
(21, 3, 5, 39039.746),
(22, 3, 6, 318778),
(23, 3, 7, 35907),
(24, 3, 8, 18750),
(25, 4, 1, 57),
(26, 4, 2, 113),
(27, 4, 3, 57),
(28, 4, 4, 57),
(29, 4, 5, 10),
(30, 4, 6, 63),
(31, 4, 7, 2),
(32, 4, 8, 22),
(33, 5, 1, 30333),
(34, 5, 2, 8322.59),
(35, 5, 3, 8335.12),
(36, 5, 4, 10092.48),
(37, 5, 5, 375650.85),
(38, 5, 6, 74434.54),
(39, 5, 7, 549291.92),
(40, 5, 8, 858700.26),
(41, 6, 1, 2),
(42, 6, 2, 3),
(43, 6, 3, 2),
(44, 6, 4, 2),
(45, 6, 5, 2),
(46, 6, 6, 2),
(47, 6, 7, 2),
(48, 6, 8, 3),
(49, 7, 1, 2),
(50, 7, 2, 5),
(51, 7, 3, 2),
(52, 7, 4, 2),
(53, 7, 5, 5),
(54, 7, 6, 5),
(55, 7, 7, 3),
(56, 7, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

CREATE TABLE `parameter` (
  `parameter_id` int(11) NOT NULL,
  `kriteria_id` varchar(64) NOT NULL,
  `nama_parameter` varchar(64) NOT NULL,
  `nilai_parameter` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` enum('admin','manager') NOT NULL DEFAULT 'admin',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(64) NOT NULL DEFAULT 'user.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `full_name`, `phone`, `role`, `last_login`, `photo`, `created_at`, `is_active`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'administrator', '098765', 'admin', '2020-04-05 01:13:00', '1.jpg', '2020-01-28 13:41:55', 0),
(2, 'manager', '$2y$10$C4s7l6Cde7m2/C1l/c5VseVa3FTFgGwaid0dMQ9urK8U859QQe4A.', 'manager@manager.com', 'manager', '082242376950', 'manager', '2020-03-31 01:30:25', '2.png', '2020-03-18 03:21:37', 0),
(3, 'agus', 'agus', 'agus@agus.com', 'Agustiawan', '082242376950', 'admin', '2020-04-04 14:21:36', '3.png', '2020-04-04 14:21:36', 0),
(6, 'admin123', 'password', 'agustiawan0798@gmail.com', 'Agustiawan', '082242376950', 'manager', '2020-04-07 04:33:00', '.jpg', '2020-04-07 04:33:00', 0),
(7, 'apin', '$2y$10$oMcUbNQTgbvFTJyeyHmByOkCOLUHqPW5xL6t7qXD2hkwT.6lVRehG', 'apin@apin.com', 'apin', '082242376950', 'admin', '2020-04-07 07:07:46', 'user.png', '2020-04-07 07:07:46', 0),
(8, 'agustiawan', '$2y$10$WeDtQ.wXUL6osbR6TQEEdOt7HaBxbyY8Wye2RM60.lw9ekHWfX.8u', 'agus@agus.com', 'Agustiawan', '082242376950', 'admin', '2020-04-13 07:47:23', 'user.png', '2020-04-13 07:47:23', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`alternatif_id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `nilai_tbl`
--
ALTER TABLE `nilai_tbl`
  ADD PRIMARY KEY (`nilai_id`);

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`parameter_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `alternatif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nilai_tbl`
--
ALTER TABLE `nilai_tbl`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `parameter_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
