-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 06:16 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cakeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(30) NOT NULL,
  `id_staff` int(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `id_staff`, `username`, `pass`, `email`, `level`) VALUES
(901, 100, 'purnomo98', '123456', '411212070@mahasiswa.undira.ac.id', 2),
(902, 102, 'arie', '111', 'arifadhudin@gmail.com', 1),
(903, 101, 'alvin', '321', 'artfree03@gmail.com', 1),
(904, 103, 'df', '11', 'exxxxe3@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(30) NOT NULL,
  `nama_customer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`) VALUES
(5031, 'alvin'),
(5026, 'Arie Fadhudin'),
(5027, 'Denny'),
(5028, 'Tio');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(30) NOT NULL,
  `id_customer` int(30) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `tgl_order` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kode_pos` int(8) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `catatan` varchar(150) NOT NULL,
  `paymethod` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_customer`, `nama_customer`, `tgl_order`, `alamat`, `kota`, `provinsi`, `kode_pos`, `telepon`, `catatan`, `paymethod`) VALUES
(898, 5026, 'Arie Fadhudin', '2023-06-16', 'Jalan Pantai Indah Kapuk No.1', 'Jakarta Utara', 'DKI Jakarta', 14410, '081527158857', 'Kalau bisa dikirim di jam 4 sore', 'OVO'),
(899, 5027, 'Denny', '2023-06-17', 'Jakarta ', 'Jakarta Utara', 'DKI', 14410, '081527158689', 'juydhdhdhdhsg tsyyhdd', 'Bank DKI');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_detail`
--

CREATE TABLE `keranjang_detail` (
  `id_keranjang` int(30) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(15) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `subtotal_harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang_detail`
--

INSERT INTO `keranjang_detail` (`id_keranjang`, `nama_produk`, `harga_produk`, `jumlah`, `subtotal_harga`) VALUES
(898, 'Bika Ambon', 20000, 1, 20000),
(899, 'Lapis Legit', 45000, 2, 90000),
(899, 'Roti Buaya', 40000, 1, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(30) NOT NULL,
  `foto_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `stok_produk` int(5) NOT NULL,
  `harga_produk` int(15) NOT NULL,
  `tgl_prod` date NOT NULL,
  `tgl_exp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `foto_produk`, `nama_produk`, `stok_produk`, `harga_produk`, `tgl_prod`, `tgl_exp`) VALUES
(243, 'croissant.jpg', 'Croissant', 18, 15000, '2023-07-01', '2023-07-01'),
(246, 'bagel.jpg', 'Bagel', 50, 12000, '2023-07-01', '2023-07-01'),
(248, 'bikaambon.jpg', 'Bika Ambon', 7, 20000, '2023-07-01', '2023-07-01'),
(303, 'buaya.jpg', 'Roti Buaya', 5, 40000, '2023-07-01', '2023-07-01'),
(305, 'cucur.jpg', 'Cucur', 25, 3000, '2023-07-01', '2023-07-01'),
(307, 'lapislegit.jpg', 'Lapis Legit', 10, 45000, '2023-07-01', '2023-07-01'),
(405, 'srikaya.jpg', 'Srikaya Roll', 20, 15000, '2023-07-01', '2023-07-01'),
(445, 'odading.jpg', 'Odading', 30, 5000, '2023-07-01', '2023-07-01'),
(487, 'lapis.jpg', 'Lapis', 15, 4000, '2023-07-01', '2023-07-01'),
(907, 'savory.jpg', 'Savory Beef', 10, 25000, '2023-07-01', '2023-07-01'),
(969, 'serabi.jpg', 'Serabi', 24, 5000, '2023-07-01', '2023-07-01'),
(996, 'putuayu.jpg', 'Putu Ayu', 30, 3000, '2023-07-01', '2023-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(30) NOT NULL,
  `nama_staff` varchar(50) NOT NULL,
  `posisi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `nama_staff`, `posisi`) VALUES
(100, 'Reza', 'Marketing'),
(101, 'Alvin', 'Head Store'),
(102, 'Arie', 'IT'),
(103, 'Denny', 'IT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `id_akun` (`id_akun`,`id_staff`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD UNIQUE KEY `id_customer` (`id_customer`),
  ADD KEY `nama_customer` (`nama_customer`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD UNIQUE KEY `id_keranjang` (`id_keranjang`),
  ADD KEY `nama_customer` (`nama_customer`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `keranjang_detail`
--
ALTER TABLE `keranjang_detail`
  ADD KEY `id_keranjang` (`id_keranjang`),
  ADD KEY `nama_produk` (`nama_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `id_produk_2` (`id_produk`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `nama_produk` (`nama_produk`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`),
  ADD UNIQUE KEY `id_staff` (`id_staff`),
  ADD KEY `nama_staff` (`nama_staff`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5032;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=904;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`nama_customer`) REFERENCES `customer` (`nama_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keranjang_detail`
--
ALTER TABLE `keranjang_detail`
  ADD CONSTRAINT `keranjang_detail_ibfk_2` FOREIGN KEY (`nama_produk`) REFERENCES `produk` (`nama_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_detail_ibfk_3` FOREIGN KEY (`id_keranjang`) REFERENCES `keranjang` (`id_keranjang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
