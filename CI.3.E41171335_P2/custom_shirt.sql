-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2019 at 03:50 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

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
-- Table structure for table `alamat_kirim`
--

CREATE TABLE `alamat_kirim` (
  `id_alamat_kirim` varchar(30) NOT NULL,
  `id_provinsi` varchar(2) DEFAULT NULL,
  `nama_provinsi` varchar(64) DEFAULT NULL,
  `id_kota` varchar(3) DEFAULT NULL,
  `nama_kota` varchar(64) DEFAULT NULL,
  `kode_pos` varchar(5) DEFAULT NULL,
  `alamat_langkap` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `alamat_origin`
--

CREATE TABLE `alamat_origin` (
  `id_origin` int(11) NOT NULL,
  `id_provinsi` varchar(2) DEFAULT NULL,
  `nama_provinsi` varchar(64) DEFAULT NULL,
  `id_kota` varchar(3) DEFAULT NULL,
  `nama_kota` varchar(64) DEFAULT NULL,
  `kode_pos` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `alamat_pengguna`
--

CREATE TABLE `alamat_pengguna` (
  `id_alamat` varchar(10) NOT NULL,
  `id_pengguna` varchar(20) DEFAULT NULL,
  `id_provinsi` varchar(2) DEFAULT NULL,
  `nama_provinsi` varchar(64) DEFAULT NULL,
  `id_kota` varchar(3) DEFAULT NULL,
  `nama_kota` varchar(64) DEFAULT NULL,
  `kode_pos` varchar(5) DEFAULT NULL,
  `alamat_lengkap` text,
  `nomor_telp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` varchar(30) NOT NULL,
  `id_pengguna` varchar(20) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `total_berat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `detail_cart`
--

CREATE TABLE `detail_cart` (
  `id_detail_cart` int(11) NOT NULL,
  `id_cart` varchar(30) DEFAULT NULL,
  `id_desain` varchar(30) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal_berat` int(11) DEFAULT NULL,
  `subtotal_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` varchar(30) DEFAULT NULL,
  `id_desain` varchar(30) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal_berat` int(11) DEFAULT NULL,
  `subtotal_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gambar_shirt`
--

CREATE TABLE `gambar_shirt` (
  `id_gambar` varchar(30) NOT NULL,
  `id_item` varchar(10) DEFAULT NULL,
  `nama_gambar` varchar(64) DEFAULT NULL,
  `gambar` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_akses` varchar(5) NOT NULL,
  `nama_akses` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_akses`, `nama_akses`) VALUES
('adm', 'ADMIN'),
('cas', 'KASIR'),
('ctm', 'PELANGGAN'),
('dsg', 'DESAIN PRODUK'),
('prd', 'PRODUKSI');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` varchar(10) NOT NULL,
  `id_pengguna` varchar(20) DEFAULT NULL,
  `nama_item` varchar(64) DEFAULT NULL,
  `id_jenis_item` varchar(10) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `berat_satuan` int(11) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_item`
--

CREATE TABLE `jenis_item` (
  `id_jenis_item` varchar(10) NOT NULL,
  `nama_jenis` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_item`
--

INSERT INTO `jenis_item` (`id_jenis_item`, `nama_jenis`) VALUES
('jrsey', 'Jersey'),
('oblongarml', 'Kaos Oblong Armless'),
('oblonglg', 'Kaos Oblong Lengan Panjang'),
('oblongst', 'Kaos Oblong Lengan Pendek'),
('oblongtpe', 'Kaos Oblong Lengan 3/4'),
('pololg', 'Kaos Polo Lengan Panjang'),
('polost', 'Kaos Polo Lengan Pendek');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_transaksi` varchar(30) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `total_pembayaran` int(11) DEFAULT NULL,
  `bukti_pembayaran` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(20) NOT NULL,
  `nama_pengguna` varchar(64) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_akses` varchar(5) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `nomor_telp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` varchar(30) NOT NULL,
  `nama_ekspedis` varchar(30) DEFAULT NULL,
  `servis` varchar(30) DEFAULT NULL,
  `deskripsi` varchar(64) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `etd` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status_transaksi`
--

CREATE TABLE `status_transaksi` (
  `id_status` varchar(5) NOT NULL,
  `nama_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_transaksi`
--

INSERT INTO `status_transaksi` (`id_status`, `nama_status`) VALUES
('maked', 'DIBUAT'),
('payed', 'DIBAYAR'),
('pcked', 'DIKEMAS'),
('print', 'DICETAK'),
('sent', 'DIKIRIM');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(30) NOT NULL,
  `id_pengguna` varchar(20) DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `total_berat` int(11) DEFAULT NULL,
  `id_alamat_kirim` varchar(30) DEFAULT NULL,
  `id_pengiriman` varchar(30) DEFAULT NULL,
  `id_status` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat_kirim`
--
ALTER TABLE `alamat_kirim`
  ADD PRIMARY KEY (`id_alamat_kirim`);

--
-- Indexes for table `alamat_origin`
--
ALTER TABLE `alamat_origin`
  ADD PRIMARY KEY (`id_origin`);

--
-- Indexes for table `alamat_pengguna`
--
ALTER TABLE `alamat_pengguna`
  ADD PRIMARY KEY (`id_alamat`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `desain_pengguna`
--
ALTER TABLE `desain_pengguna`
  ADD PRIMARY KEY (`id_desain`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `detail_cart`
--
ALTER TABLE `detail_cart`
  ADD PRIMARY KEY (`id_detail_cart`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `id_desain` (`id_desain`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_desain` (`id_desain`);

--
-- Indexes for table `gambar_shirt`
--
ALTER TABLE `gambar_shirt`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_jenis_item` (`id_jenis_item`);

--
-- Indexes for table `jenis_item`
--
ALTER TABLE `jenis_item`
  ADD PRIMARY KEY (`id_jenis_item`);

--
-- Indexes for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`id_konfirmasi`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_akses` (`id_akses`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `status_transaksi`
--
ALTER TABLE `status_transaksi`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_alamat_kirim` (`id_alamat_kirim`),
  ADD KEY `id_pengiriman` (`id_pengiriman`),
  ADD KEY `id_status` (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat_origin`
--
ALTER TABLE `alamat_origin`
  MODIFY `id_origin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_cart`
--
ALTER TABLE `detail_cart`
  MODIFY `id_detail_cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alamat_pengguna`
--
ALTER TABLE `alamat_pengguna`
  ADD CONSTRAINT `alamat_pengguna_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `desain_pengguna`
--
ALTER TABLE `desain_pengguna`
  ADD CONSTRAINT `desain_pengguna_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `desain_pengguna_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`);

--
-- Constraints for table `detail_cart`
--
ALTER TABLE `detail_cart`
  ADD CONSTRAINT `detail_cart_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`),
  ADD CONSTRAINT `detail_cart_ibfk_2` FOREIGN KEY (`id_desain`) REFERENCES `desain_pengguna` (`id_desain`);

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_desain`) REFERENCES `desain_pengguna` (`id_desain`);

--
-- Constraints for table `gambar_shirt`
--
ALTER TABLE `gambar_shirt`
  ADD CONSTRAINT `gambar_shirt_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`id_jenis_item`) REFERENCES `jenis_item` (`id_jenis_item`);

--
-- Constraints for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD CONSTRAINT `konfirmasi_pembayaran_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_alamat_kirim`) REFERENCES `alamat_kirim` (`id_alamat_kirim`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_pengiriman`) REFERENCES `pengiriman` (`id_pengiriman`),
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `status_transaksi` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
