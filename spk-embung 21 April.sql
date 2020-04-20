-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 20, 2020 at 08:28 PM
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
(3, 'Lebakk', 'Bringin'),
(4, 'Pakis', 'Bringinnnnn'),
(5, 'Jatikurung', 'Bergas'),
(6, 'Gogodalem', 'Bringin'),
(7, 'Kandangan', 'Bawen'),
(8, 'Ngrawan', 'Getasan'),
(24, 'Dadapayam', 'Suruh'),
(27, 'Mluweh', 'Ungaran Timur');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `bobot` double NOT NULL,
  `tren` varchar(10) NOT NULL DEFAULT 'negatif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kriteria_id`, `kriteria`, `bobot`, `tren`) VALUES
(1, 'Volume material timbunan', 0.700926126612453, 'positif'),
(2, 'Luas daerah yang akan dibebaskan', 1.84695463245222, 'Positif'),
(3, 'Volume tampungan efektif', 0.981563571167843, 'Positif'),
(4, 'Lama operasi', 1.17282616992441, 'Negatif'),
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
(37, 5, 5, 5),
(38, 5, 6, 5),
(39, 5, 7, 2),
(40, 5, 8, 9),
(45, 6, 5, 5),
(46, 6, 6, 5),
(47, 6, 7, 2),
(48, 6, 8, 9),
(53, 7, 5, 5),
(54, 7, 6, 5),
(55, 7, 7, 3),
(56, 7, 8, 9),
(191, 5, 24, 8),
(192, 6, 24, 8),
(193, 7, 24, 8),
(323, 2, 5, 5),
(324, 2, 6, 6),
(325, 2, 7, 2),
(326, 2, 8, 9),
(327, 2, 24, 8),
(331, 3, 5, 5),
(332, 3, 6, 6),
(333, 3, 7, 2),
(334, 3, 8, 9),
(335, 3, 24, 8),
(339, 4, 5, 5),
(340, 4, 6, 6),
(341, 4, 7, 2),
(342, 4, 8, 9),
(343, 4, 24, 8),
(377, 2, 27, 67),
(378, 3, 27, 78),
(379, 4, 27, 5),
(380, 5, 27, 7),
(381, 6, 27, 57),
(382, 7, 27, 75),
(392, 1, 5, 7),
(393, 1, 6, 444),
(394, 1, 7, 9),
(395, 1, 8, 7),
(396, 1, 24, 88),
(397, 1, 27, 687),
(398, 1, 3, 1),
(399, 2, 3, 5),
(400, 3, 3, 5),
(401, 4, 3, 5),
(402, 5, 3, 5),
(403, 6, 3, 5),
(404, 7, 3, 5),
(405, 1, 4, 333),
(406, 2, 4, 3),
(407, 3, 4, 3),
(408, 4, 4, 3),
(409, 5, 4, 3),
(410, 6, 4, 3),
(411, 7, 4, 3);

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
  MODIFY `alternatif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `nilai_tbl`
--
ALTER TABLE `nilai_tbl`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;

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
