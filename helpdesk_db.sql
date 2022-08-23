-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2021 at 11:39 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `role_id`
--

CREATE TABLE `role_id` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_id`
--

INSERT INTO `role_id` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `no_tiket` varchar(25) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar_tiket` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status_tiket` int(2) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `no_tiket`, `judul`, `deskripsi`, `gambar_tiket`, `user_id`, `status_tiket`, `tgl_daftar`) VALUES
(1, '12345', 'komputer tidak konek internet', 'PC diskonect', '1.jpg', 2, 0, '2021-06-09 16:54:20'),
(2, '22345', 'printer ', 'printer tidak bisa menyala', '', 1, 2, '2021-06-10 11:36:43'),
(3, '32345', 'monitor ', 'monitor tidak menyala', '', 6, 1, '2021-06-10 11:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `deskripsi_masalah` text NOT NULL,
  `detail_masalah` text NOT NULL,
  `role_id` int(2) NOT NULL,
  `is_active` int(2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `departement`, `deskripsi_masalah`, `detail_masalah`, `role_id`, `is_active`, `image`, `created`, `modified`) VALUES
(1, 'Ari', 'arimuliansyah@gmail.com', '$2y$10$uDc99DEU1FiWHIOkzorncOpPfRIeXsdckULlcvHyFToxfp1Psgv3S', 'IT', '', '', 1, 1, 'default.jpg', '0000-00-00 00:00:00', '2021-06-09 13:46:10'),
(2, 'Vania', 'vaniafadilla@gmail.com', '$2y$10$BldKpLYetDxAX3qbEO6vQ.aIbd6TTS6T8XPns3f3ZNGQfwYwvFWMG', 'Akuntansi', '', '', 2, 1, ' default.jpg', '0000-00-00 00:00:00', '2021-06-09 13:47:55'),
(6, 'pasya', 'pasya@gmail.com', '$2y$10$rGy8v9PoAMUdMeGrTTaH4Oc8BHpFvNxpDUlAVT8bLbj06DnLiuKA2', 'IT', '', '', 2, 1, 'default.jpg\r\n\r\n', '0000-00-00 00:00:00', '2021-06-09 16:34:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `role_id`
--
ALTER TABLE `role_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `role_id`
--
ALTER TABLE `role_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
