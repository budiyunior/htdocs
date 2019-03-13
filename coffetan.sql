-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2019 at 08:19 AM
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
-- Database: `coffetan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tmst_artikel`
--

CREATE TABLE `tmst_artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(40) DEFAULT NULL,
  `isi` text,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmst_jenis_produk`
--

CREATE TABLE `tmst_jenis_produk` (
  `id_jenis_produk` int(11) NOT NULL,
  `nama_jenis_produk` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmst_keranjang`
--

CREATE TABLE `tmst_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_jenis_produk` int(11) NOT NULL,
  `id_pengguna` bigint(20) NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `jumlah_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmst_level`
--

CREATE TABLE `tmst_level` (
  `id_level` int(11) NOT NULL,
  `hak_akses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmst_pengguna`
--

CREATE TABLE `tmst_pengguna` (
  `id_pengguna` bigint(20) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `email` varchar(320) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `id_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmst_produk`
--

CREATE TABLE `tmst_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(20) DEFAULT NULL,
  `foto` blob NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` text,
  `berat` int(11) DEFAULT NULL,
  `ukuran_panjang` int(11) DEFAULT NULL,
  `ukuran_tinggi` int(11) DEFAULT NULL,
  `lebar` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `id_jenis_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmst_ulasan`
--

CREATE TABLE `tmst_ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `komentar` text,
  `penilaian` smallint(6) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tmst_artikel`
--
ALTER TABLE `tmst_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tmst_jenis_produk`
--
ALTER TABLE `tmst_jenis_produk`
  ADD PRIMARY KEY (`id_jenis_produk`);

--
-- Indexes for table `tmst_keranjang`
--
ALTER TABLE `tmst_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_jenis_produk` (`id_jenis_produk`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tmst_level`
--
ALTER TABLE `tmst_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tmst_pengguna`
--
ALTER TABLE `tmst_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `tmst_produk`
--
ALTER TABLE `tmst_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_jenis_produk` (`id_jenis_produk`);

--
-- Indexes for table `tmst_ulasan`
--
ALTER TABLE `tmst_ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tmst_produk`
--
ALTER TABLE `tmst_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmst_ulasan`
--
ALTER TABLE `tmst_ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tmst_keranjang`
--
ALTER TABLE `tmst_keranjang`
  ADD CONSTRAINT `tmst_keranjang_ibfk_1` FOREIGN KEY (`id_jenis_produk`) REFERENCES `tmst_jenis_produk` (`id_jenis_produk`),
  ADD CONSTRAINT `tmst_keranjang_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `tmst_pengguna` (`id_pengguna`);

--
-- Constraints for table `tmst_pengguna`
--
ALTER TABLE `tmst_pengguna`
  ADD CONSTRAINT `tmst_pengguna_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tmst_level` (`id_level`);

--
-- Constraints for table `tmst_produk`
--
ALTER TABLE `tmst_produk`
  ADD CONSTRAINT `tmst_produk_ibfk_1` FOREIGN KEY (`id_jenis_produk`) REFERENCES `tmst_jenis_produk` (`id_jenis_produk`);

--
-- Constraints for table `tmst_ulasan`
--
ALTER TABLE `tmst_ulasan`
  ADD CONSTRAINT `tmst_ulasan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tmst_produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
