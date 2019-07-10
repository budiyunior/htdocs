-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2019 at 06:14 PM
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

--
-- Dumping data for table `alamat_kirim`
--

INSERT INTO `alamat_kirim` (`id_alamat_kirim`, `id_provinsi`, `nama_provinsi`, `id_kota`, `nama_kota`, `kode_pos`, `alamat_langkap`) VALUES
('sentadd0001', '11', 'Jawa Timur', '42', 'Banyuwangi', '68416', 'Jalan suka-suka gang buntu nomor 5');

-- --------------------------------------------------------

--
-- Table structure for table `alamat_origin`
--

CREATE TABLE `alamat_origin` (
  `id_alamat_origin` int(11) NOT NULL,
  `id_provinsi` varchar(2) DEFAULT NULL,
  `nama_provinsi` varchar(64) DEFAULT NULL,
  `id_kota` varchar(3) DEFAULT NULL,
  `nama_kota` varchar(64) DEFAULT NULL,
  `kode_pos` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat_origin`
--

INSERT INTO `alamat_origin` (`id_alamat_origin`, `id_provinsi`, `nama_provinsi`, `id_kota`, `nama_kota`, `kode_pos`) VALUES
(1, '11', 'Jawa Timur', '86', 'Bondowoso', '68219');

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

--
-- Dumping data for table `alamat_pengguna`
--

INSERT INTO `alamat_pengguna` (`id_alamat`, `id_pengguna`, `id_provinsi`, `nama_provinsi`, `id_kota`, `nama_kota`, `kode_pos`, `alamat_lengkap`, `nomor_telp`) VALUES
('addres0001', 'cus5d21546c61851', '11', 'Jawa Timur', '42', 'Banyuwangi', '68416', 'Jalan suka-suka gang buntu nomor 5', '082123123123');

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
('0a1c7441-7d17-405f-9aa3-b83edb', '1562748752', 'item0001', '', 'S', NULL, 150, 100000),
('desain00001', 'cus5d21546c61851', 'item0004', 'Kaos Tim Kelas A SMP 2 Banyuwangi', 'L', 'kaostimkelasasmp2bwi.jpg', 150, 110000),
('desain00002', 'cus5d21546c61851', 'item0004', 'Kaos Tim Kelas A SMP 2 Banyuwangi', 'XL', 'kaostimkelasasmp2bwi.jpg', 150, 110000),
('desain00003', 'cus5d21546c61851', 'item0004', 'Jersey ML FNDC', 'L', 'jerseymlfndc.jpg', 150, 110000),
('desain00004', 'cus5d21546c61851', 'item0002', 'Kaos Pribadi Setia', 'L', 'kaospribadisetia.jpg', 150, 110000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_cart`
--

CREATE TABLE `detail_cart` (
  `id_desain` varchar(30) NOT NULL,
  `id_pengguna` varchar(20) DEFAULT NULL,
  `id_item` varchar(10) DEFAULT NULL,
  `nama_desain` varchar(64) DEFAULT NULL,
  `ukuran_shirt` varchar(3) DEFAULT NULL,
  `gambar` varchar(128) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal_berat` int(11) DEFAULT NULL,
  `subtotal_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_cart`
--

INSERT INTO `detail_cart` (`id_desain`, `id_pengguna`, `id_item`, `nama_desain`, `ukuran_shirt`, `gambar`, `jumlah`, `subtotal_berat`, `subtotal_harga`) VALUES
('6348472e-1d99-4f87-aa2f-bb1872', '1562748752', 'item0001', '', 'S', NULL, 1, 150, 100000);

--
-- Triggers `detail_cart`
--
DELIMITER $$
CREATE TRIGGER `total_hargak_update` AFTER UPDATE ON `detail_cart` FOR EACH ROW BEGIN
    INSERT INTO cart
    set id_pengguna = OLD.id_pengguna,
    total_harga=SUM(desain_cart.subtotal_harga);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` bigint(20) NOT NULL,
  `id_transaksi` varchar(30) DEFAULT NULL,
  `nama_desain` varchar(64) NOT NULL,
  `ukuran_shirt` varchar(3) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `nama_item` varchar(64) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL,
  `cetak` varchar(10) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal_berat` int(11) DEFAULT NULL,
  `subtotal_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `nama_desain`, `ukuran_shirt`, `gambar`, `nama_item`, `nama_jenis`, `cetak`, `harga_satuan`, `jumlah`, `subtotal_berat`, `subtotal_harga`) VALUES
(1, 'trans0001', '', '0', '', '', '', '', 0, 10, 1500, 1100000),
(2, 'trans0001', '', '0', '', '', '', '', 0, 2, 300, 220000),
(3, 'trans0002', '', '0', '', '', '', '', 0, 5, 750, 550000);

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
('cus', 'PELANGGAN'),
('su', 'SUPERUSER');

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
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `nama_item`, `id_jenis_item`, `harga_satuan`, `berat_satuan`, `deskripsi`, `gambar`) VALUES
('item0001', 'Jersey Futsal Lengan Pendek', 'Dryfit', 100000, 150, 'Jersey Futsal Lengan Pendek, V Neck', ''),
('item0002', 'Kaos Oblong O-Neck L-Pendek', 'combed', 90000, 150, 'Kaos oblong, O-neck, Lengan Pendek, Bahan Katun Combed, Sablon', ''),
('item0003', 'Kaos Oblong V-Neck L-Pendek', 'polyester', 100000, 150, 'Kaos Oblong, V-neck, Sablon', ''),
('item0004', 'Kaos Oblong V-Neck L-Panjang', 'hyget', 110000, 150, 'Kaos Oblong Print, Lengan Panjang, V-Neck', '');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_item`
--

CREATE TABLE `jenis_item` (
  `id_jenis_item` varchar(10) NOT NULL,
  `nama_jenis` varchar(30) DEFAULT NULL,
  `cetak` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_item`
--

INSERT INTO `jenis_item` (`id_jenis_item`, `nama_jenis`, `cetak`) VALUES
('combed', 'Katun Combed', 'Sablon'),
('Dryfit', 'Dryfit (Untuk Jersey)', 'Print'),
('hyget', 'Hyget', 'Print'),
('polyester', 'Polyester', 'Sablon');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_transaksi` varchar(30) DEFAULT NULL,
  `harus_dibayar` int(11) DEFAULT NULL,
  `bank_tujuan` varchar(32) NOT NULL,
  `bank_asal` varchar(32) NOT NULL,
  `atas_nama` varchar(64) NOT NULL,
  `no_rek_asal` varchar(20) NOT NULL,
  `total_pembayaran` int(11) DEFAULT NULL,
  `bukti_pembayaran` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`id_konfirmasi`, `id_transaksi`, `harus_dibayar`, `bank_tujuan`, `bank_asal`, `atas_nama`, `no_rek_asal`, `total_pembayaran`, `bukti_pembayaran`) VALUES
(1, 'trans0001', 1320000, 'BRI', 'MANDIRI', 'Pelanggan Setia', '1234567890123', 1320000, 'buktipembayaran001.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(20) NOT NULL,
  `nama_pengguna` varchar(64) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_akses` varchar(5) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `nomor_telp` varchar(13) DEFAULT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `tanggal_lahir`, `id_akses`, `email`, `password`, `nomor_telp`, `foto`) VALUES
('11', 'adigagas', '2019-07-20', 'cus', 'adigagas@gmail.com', 'adigagas', '081111111111', 'cus155d2206c92f585.jpg'),
('1562748752', 'bahtiar', NULL, 'cus', 'bahtiar@gmail.com', 'bahtiar', '082234495676', ''),
('adm5d148186b2d0e', 'Admin', '1111-11-11', 'adm', 'admin@gmail.com', '$2y$10$d2b3XLqYxIix8PO6.HXKIOGjVOjEqbIyphwCY.KkL4v1Gz0oU0Amu', '12345678', 'adm5d148186b2d0e.jpg'),
('cus5d21546c61851', 'Pelanggan Setia', '1999-06-15', 'cus', 'pelanggan@gmail.com', 'pelanggan', '082123123123', '5d21546c61851.jpg'),
('cusb1urz', 'budi', '2019-07-02', 'cus', 'budi@gmail.com', 'budi', '081111111111', 'cusb1urzbnt4n.PNG'),
('su5d1482494444b', 'Super User', '2000-02-22', 'su', 'superuser@gmail.com', '$2y$10$u6XcyS4K4GDu1VT2zLyX9uc19GWiT74op1KJZlxGCokFKSHAUgbv2', '12345670', 'su5d1482494444b.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` varchar(30) NOT NULL,
  `nama_ekspedis` varchar(30) DEFAULT NULL,
  `servis` varchar(30) DEFAULT NULL,
  `catatan` varchar(64) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `etd` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `nama_ekspedis`, `servis`, `catatan`, `harga`, `etd`) VALUES
('sent0001', 'JNE', 'REG', NULL, 12000, '2-3'),
('sent0002', 'JNE', 'OKE', NULL, 10000, '2-3');

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
('done', 'SELESAI'),
('fail', 'DITOLAK'),
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
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pengguna`, `tanggal_transaksi`, `total_harga`, `total_berat`, `id_alamat_kirim`, `id_pengiriman`, `id_status`) VALUES
('1562511243', '11', '2019-07-07', NULL, NULL, NULL, NULL, 'maked'),
('1562511246', '11', '2019-07-07', NULL, NULL, NULL, NULL, 'maked'),
('1562748829', '1562748752', '2019-07-10', NULL, NULL, NULL, NULL, 'maked'),
('1562748830', '1562748752', '2019-07-10', NULL, NULL, NULL, NULL, 'maked'),
('1562748831', '1562748752', '2019-07-10', NULL, NULL, NULL, NULL, 'maked'),
('trans0001', 'cus5d21546c61851', '2019-07-07', 1320000, 1800, 'sentadd0001', 'sent0001', 'payed'),
('trans0002', 'cus5d21546c61851', '2019-07-07', 550000, 750, 'sentadd0001', 'sent0002', 'maked');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_item`
-- (See below for the actual view)
--
CREATE TABLE `v_item` (
`id_item` varchar(10)
,`nama_item` varchar(64)
,`harga_satuan` int(11)
,`berat_satuan` int(11)
,`deskripsi` text
,`id_jenis_item` varchar(10)
,`nama_jenis` varchar(30)
,`cetak` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pengguna`
-- (See below for the actual view)
--
CREATE TABLE `v_pengguna` (
`id_pengguna` varchar(20)
,`nama_pengguna` varchar(64)
,`tanggal_lahir` date
,`email` varchar(64)
,`password` varchar(64)
,`nomor_telp` varchar(13)
,`foto` varchar(200)
,`id_akses` varchar(5)
,`nama_akses` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_trans`
-- (See below for the actual view)
--
CREATE TABLE `v_trans` (
`id_transaksi` varchar(30)
,`tanggal_transaksi` date
,`total_harga` int(11)
,`total_berat` int(11)
,`id_pengguna` varchar(20)
,`nama_pengguna` varchar(64)
,`nomor_telp` varchar(13)
,`id_alamat_kirim` varchar(30)
,`id_provinsi` varchar(2)
,`nama_provinsi` varchar(64)
,`id_kota` varchar(3)
,`nama_kota` varchar(64)
,`kode_pos` varchar(5)
,`alamat_langkap` text
,`id_pengiriman` varchar(30)
,`nama_ekspedis` varchar(30)
,`servis` varchar(30)
,`catatan` varchar(64)
,`harga` int(11)
,`etd` varchar(10)
,`id_status` varchar(5)
,`nama_status` varchar(10)
);

-- --------------------------------------------------------

--
-- Structure for view `v_item`
--
DROP TABLE IF EXISTS `v_item`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_item`  AS  select `item`.`id_item` AS `id_item`,`item`.`nama_item` AS `nama_item`,`item`.`harga_satuan` AS `harga_satuan`,`item`.`berat_satuan` AS `berat_satuan`,`item`.`deskripsi` AS `deskripsi`,`jenis_item`.`id_jenis_item` AS `id_jenis_item`,`jenis_item`.`nama_jenis` AS `nama_jenis`,`jenis_item`.`cetak` AS `cetak` from (`item` join `jenis_item`) where (`item`.`id_jenis_item` = `jenis_item`.`id_jenis_item`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pengguna`
--
DROP TABLE IF EXISTS `v_pengguna`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pengguna`  AS  select `pengguna`.`id_pengguna` AS `id_pengguna`,`pengguna`.`nama_pengguna` AS `nama_pengguna`,`pengguna`.`tanggal_lahir` AS `tanggal_lahir`,`pengguna`.`email` AS `email`,`pengguna`.`password` AS `password`,`pengguna`.`nomor_telp` AS `nomor_telp`,`pengguna`.`foto` AS `foto`,`hak_akses`.`id_akses` AS `id_akses`,`hak_akses`.`nama_akses` AS `nama_akses` from (`pengguna` join `hak_akses`) where (`pengguna`.`id_akses` = `hak_akses`.`id_akses`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_trans`
--
DROP TABLE IF EXISTS `v_trans`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_trans`  AS  select `transaksi`.`id_transaksi` AS `id_transaksi`,`transaksi`.`tanggal_transaksi` AS `tanggal_transaksi`,`transaksi`.`total_harga` AS `total_harga`,`transaksi`.`total_berat` AS `total_berat`,`pengguna`.`id_pengguna` AS `id_pengguna`,`pengguna`.`nama_pengguna` AS `nama_pengguna`,`pengguna`.`nomor_telp` AS `nomor_telp`,`alamat_kirim`.`id_alamat_kirim` AS `id_alamat_kirim`,`alamat_kirim`.`id_provinsi` AS `id_provinsi`,`alamat_kirim`.`nama_provinsi` AS `nama_provinsi`,`alamat_kirim`.`id_kota` AS `id_kota`,`alamat_kirim`.`nama_kota` AS `nama_kota`,`alamat_kirim`.`kode_pos` AS `kode_pos`,`alamat_kirim`.`alamat_langkap` AS `alamat_langkap`,`pengiriman`.`id_pengiriman` AS `id_pengiriman`,`pengiriman`.`nama_ekspedis` AS `nama_ekspedis`,`pengiriman`.`servis` AS `servis`,`pengiriman`.`catatan` AS `catatan`,`pengiriman`.`harga` AS `harga`,`pengiriman`.`etd` AS `etd`,`status_transaksi`.`id_status` AS `id_status`,`status_transaksi`.`nama_status` AS `nama_status` from ((((`transaksi` join `pengguna`) join `alamat_kirim`) join `pengiriman`) join `status_transaksi`) where ((`transaksi`.`id_pengguna` = `pengguna`.`id_pengguna`) and (`transaksi`.`id_alamat_kirim` = `alamat_kirim`.`id_alamat_kirim`) and (`transaksi`.`id_pengiriman` = `pengiriman`.`id_pengiriman`) and (`transaksi`.`id_status` = `status_transaksi`.`id_status`)) ;

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
  ADD PRIMARY KEY (`id_alamat_origin`);

--
-- Indexes for table `alamat_pengguna`
--
ALTER TABLE `alamat_pengguna`
  ADD PRIMARY KEY (`id_alamat`),
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
  ADD PRIMARY KEY (`id_desain`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`);

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
  MODIFY `id_alamat_origin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alamat_pengguna`
--
ALTER TABLE `alamat_pengguna`
  ADD CONSTRAINT `alamat_pengguna_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `desain_pengguna`
--
ALTER TABLE `desain_pengguna`
  ADD CONSTRAINT `desain_pengguna_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `desain_pengguna_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`);

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
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
