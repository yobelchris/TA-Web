-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2016 at 01:19 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_olshopp`
--

CREATE TABLE `tb_olshopp` (
  `id` int(100) NOT NULL,
  `nama_brg` text NOT NULL,
  `detail_brg` text NOT NULL,
  `spek_brg` text NOT NULL,
  `harga_brg` int(20) NOT NULL,
  `gbr_brg` varchar(100) NOT NULL,
  `jenis_brg` varchar(20) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `diskon` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_olshopp`
--

INSERT INTO `tb_olshopp` (`id`, `nama_brg`, `detail_brg`, `spek_brg`, `harga_brg`, `gbr_brg`, `jenis_brg`, `jk`, `diskon`) VALUES
(1, 'T-Shirt Kain', 'Pakaian Ini Sangat Nyaman', 'Bahan : Sutra', 200000, '1.jpg', 'Baju', 'Perempuan', NULL),
(2, 'T-Shirt Kain', 'Pakaian Ini Sangat Nyaman', 'Bahan : Sutra', 200000, '5.jpg', 'Baju', 'Perempuan', NULL),
(3, 'T-Shirt Kain Coy', 'Pakaian Ini Sangat Nyaman', 'Bahan : Sutra', 400000, '2.jpg', 'Baju', 'Perempuan', NULL),
(4, 'T-Shirt Kain 2', 'Pakaian Ini Sangat Nyaman', 'Bahan : Sutra', 20000, '3.jpg', 'Baju', 'Perempuan', NULL),
(5, 'T-Shirt Kain Wokeh', 'Pakaian Ini Sangat Nyaman', 'Bahan : Sutra', 500000, '4.jpg', 'Baju', 'Perempuan', NULL),
(6, 'Celana Jeans', 'Pakaian Ini Sangat Nyaman', 'Bahan : Sutra', 50000, '16.jpg', 'Celana', 'Perempuan', NULL),
(7, 'Celana Jeans Coy', 'Pakaian Ini Sangat Nyaman', 'Bahan : Sutra', 100000, '17.jpg', 'Celana', 'Perempuan', NULL),
(8, 'Batik', 'Pakaian Ini Sangat Nyaman', 'Bahan : Sutra', 500000, '19.jpg', 'Baju', 'Laki-laki', NULL),
(9, 'Batik Mantabzz', 'Pakaian Ini Sangat Nyaman', 'Bahan : Sutra', 200000, '21.jpg', 'Baju', 'Laki-laki', NULL),
(10, 'Celana Pendek', 'Pakaian Ini Sangat Nyaman', 'Bahan : Sutra', 500000, '22.jpg', 'Celana', 'Laki-laki', NULL),
(11, 'Celana Pendek Ini', 'Pakaian Ini Sangat Nyaman', 'Bahan : Sutra', 500000, '23.jpg', 'Celana', 'Laki-laki', NULL),
(12, 'Celana Pendek Mantabzz', 'Pakaian Ini Sangat Nyaman', 'Bahan : Sutra', 20000, '24.jpg', 'Celana', 'Laki-laki', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_promo`
--

CREATE TABLE `tb_promo` (
  `id` int(20) NOT NULL,
  `gbr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_promo`
--

INSERT INTO `tb_promo` (`id`, `gbr`) VALUES
(1, 'slide.png'),
(2, 'slider.jpg'),
(3, 'desain butik modern.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `pass_user` varchar(100) NOT NULL,
  `nama_user` text,
  `no_telp` int(20) DEFAULT NULL,
  `email` text,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`pass_user`, `nama_user`, `no_telp`, `email`, `username`) VALUES
('d033e22ae348aeb5660fc2140aec35850c4da997', NULL, NULL, NULL, 'admin'),
('4a4022636a060a56ec3ec1b41b82a7cb75377bfd', 'Yobel Galih', 2147483647, 'yobel@gmail.com', 'yobelchris');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_olshopp`
--
ALTER TABLE `tb_olshopp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_promo`
--
ALTER TABLE `tb_promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_olshopp`
--
ALTER TABLE `tb_olshopp`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_promo`
--
ALTER TABLE `tb_promo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
