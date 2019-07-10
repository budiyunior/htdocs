-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2019 at 12:28 PM
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
-- Structure for view `v_item`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_item`  AS  select `item`.`id_item` AS `id_item`,`item`.`nama_item` AS `nama_item`,`item`.`harga_satuan` AS `harga_satuan`,`item`.`berat_satuan` AS `berat_satuan`,`item`.`deskripsi` AS `deskripsi`,`jenis_item`.`id_jenis_item` AS `id_jenis_item`,`jenis_item`.`nama_jenis` AS `nama_jenis`,`jenis_item`.`cetak` AS `cetak`,`item`.`foto` AS `foto` from (`item` join `jenis_item`) where (`item`.`id_jenis_item` = `jenis_item`.`id_jenis_item`) ;

--
-- VIEW  `v_item`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
