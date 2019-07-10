-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2019 at 12:26 PM
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
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` varchar(10) NOT NULL,
  `nama_item` varchar(64) DEFAULT NULL,
  `id_jenis_item` varchar(10) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `berat_satuan` int(11) DEFAULT NULL,
  `deskripsi` text,
  `foto` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `nama_item`, `id_jenis_item`, `harga_satuan`, `berat_satuan`, `deskripsi`, `foto`) VALUES
('item0002', 'Kaos Oblong O-Neck L-Pendek', 'combed', 90000, 150, 'Kaos oblong, O-neck, Lengan Pendek, Bahan Katun Combed, Sablon', 'item0002.jpg'),
('item0003', 'Kaos Oblong V-Neck L-Pendek', 'combed', 100000, 150, 'Kaos Oblong, V-neck, Sablon', 'item0003.jpg'),
('item0004', 'Kaos Oblong V-Neck L-Panjang', 'combed', 110000, 150, 'Kaos Oblong Print, Lengan Panjang, V-Neck', 'item0004.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_jenis_item` (`id_jenis_item`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`id_jenis_item`) REFERENCES `jenis_item` (`id_jenis_item`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
