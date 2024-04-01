-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 06:45 AM
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
-- Database: `zakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_beras`
--

CREATE TABLE `tb_beras` (
  `id_beras` int(50) NOT NULL,
  `harga_beras` int(10) NOT NULL,
  `harga_zakat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_beras`
--

INSERT INTO `tb_beras` (`id_beras`, `harga_beras`, `harga_zakat`) VALUES
(1, 10000, 35000),
(3, 10500, 36750),
(4, 11000, 38500),
(5, 11500, 40250),
(6, 12000, 42000),
(7, 12500, 43750),
(8, 13000, 45500),
(9, 13500, 47250),
(10, 14000, 49000),
(11, 14500, 50750);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(80) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('1c8756f4-eea9-11ee-a503-b00cd1cf28d0', 'Muhamad Erik Setiawan', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_zakat`
--

CREATE TABLE `tb_zakat` (
  `id_zakat` int(50) NOT NULL,
  `nama_muzakki` varchar(80) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jml_jiwa` int(2) NOT NULL,
  `id_beras` int(50) NOT NULL,
  `tagihan_zakat` int(10) NOT NULL,
  `jumlah_uang` int(10) NOT NULL,
  `kembalian` int(10) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_zakat`
--

INSERT INTO `tb_zakat` (`id_zakat`, `nama_muzakki`, `alamat`, `jml_jiwa`, `id_beras`, `tagihan_zakat`, `jumlah_uang`, `kembalian`, `tanggal_transaksi`) VALUES
(2, 'Ahmad Darmawan', 'Jl. Arjuna', 7, 6, 294000, 300000, 6000, '2024-04-01'),
(3, 'Bayu Budianto', 'Jl. Perkutut', 5, 11, 253750, 300000, 46250, '2024-04-02'),
(4, 'Furqan Luqman', 'Jl. Kenari', 3, 8, 136500, 150000, 13500, '2024-04-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_beras`
--
ALTER TABLE `tb_beras`
  ADD PRIMARY KEY (`id_beras`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_zakat`
--
ALTER TABLE `tb_zakat`
  ADD PRIMARY KEY (`id_zakat`),
  ADD KEY `id_beras` (`id_beras`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_beras`
--
ALTER TABLE `tb_beras`
  MODIFY `id_beras` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_zakat`
--
ALTER TABLE `tb_zakat`
  MODIFY `id_zakat` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_zakat`
--
ALTER TABLE `tb_zakat`
  ADD CONSTRAINT `tb_zakat_ibfk_1` FOREIGN KEY (`id_beras`) REFERENCES `tb_beras` (`id_beras`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
