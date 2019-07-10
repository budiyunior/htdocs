-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2019 at 03:38 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `custom_shirt`
--

-- --------------------------------------------------------

--
-- Table structure for table `desain_pengguna`
--

CREATE TABLE `desain_pengguna` (
  `id_desain` varchar(30) NOT NULL,
  `id_pengguna` varchar(20) DEFAULT NULL,
  `id_item` varchar(10) DEFAULT NULL,
  `nama_desain` varchar(64) DEFAULT NULL,
  `ukuran_shirt` varchar(3) DEFAULT NULL,
  `gambar` varchar(128) DEFAULT NULL,
  `berat_satuan` int(11) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desain_pengguna`
--

INSERT INTO `desain_pengguna` (`id_desain`, `id_pengguna`, `id_item`, `nama_desain`, `ukuran_shirt`, `gambar`, `berat_satuan`, `harga_satuan`) VALUES
('1', 'cus5d21546c61851', 'item0003', 'kaos', 'L', 'item0003.jpg', 2, 40000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desain_pengguna`
--
ALTER TABLE `desain_pengguna`
  ADD PRIMARY KEY (`id_desain`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_item` (`id_item`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `desain_pengguna`
--
ALTER TABLE `desain_pengguna`
  ADD CONSTRAINT `desain_pengguna_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `desain_pengguna_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
