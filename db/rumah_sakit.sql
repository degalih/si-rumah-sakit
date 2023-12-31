-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 03:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah_sakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(5) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `spesialis` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `noHp` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `spesialis`, `alamat`, `noHp`) VALUES
(1, 'Syahda Alya', 'Penyakit Dalam', 'Perum Bumi Suci Permai Blok A No. 13', '624974478321'),
(2, 'Mega Fatria', 'Saraf', 'Jl. Raya Simpang No.009', '624780480470'),
(3, 'Nabilah Fitri', 'Gigi', 'Jl. Kaum No. 25', '624094804809');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `no` int(5) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`no`, `nama`, `harga`, `jumlah`, `jenis`) VALUES
(1, 'Melati', 219000, 30, 'Reguler II'),
(2, 'Anggrek', 876000, 15, 'Reguler I'),
(3, 'Suite Room', 2146000, 5, 'VVIP');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(5) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `goldar` char(3) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenisKelamin` char(1) NOT NULL,
  `tgLahir` date NOT NULL,
  `noHp` char(15) NOT NULL,
  `pendamping` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `goldar`, `alamat`, `jenisKelamin`, `tgLahir`, `noHp`, `pendamping`) VALUES
(1, 'Dwitiyana Rahayu', 'A', 'Perum Cijati Asri Blok K No. 10', 'L', '2000-12-17', '628966528531', 'Naila Salmahana'),
(2, 'Yogi Ikhsanoga', 'B', 'Jl. H. Hasan Arif No. 22', 'L', '2002-02-18', '625321691717', 'Salma Raisani'),
(3, 'Reyhan Maswari', 'O', 'Jl. Raya Samarang No. 17', 'L', '2001-04-25', '62222322632', 'Tiya Nurmala');

-- --------------------------------------------------------

--
-- Table structure for table `perawat`
--

CREATE TABLE `perawat` (
  `id` int(5) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jenisKelamin` char(1) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `noHp` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perawat`
--

INSERT INTO `perawat` (`id`, `nama`, `jenisKelamin`, `alamat`, `noHp`) VALUES
(1, 'Nanda Nur M', 'P', 'Perum Jaya Asri 2 Blok E No. 17', '621078452782'),
(2, 'Ilvia Restu', 'P', 'Jl. Candramerta No.121', '628750384704'),
(3, 'M Syahrul SP', 'L', 'Jl. Raya Bayongbong KM 10', '624853672323');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` int(5) NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `id_pasien` int(5) NOT NULL,
  `id_dokter` int(5) NOT NULL,
  `id_perawat` int(5) NOT NULL,
  `no_kamar` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `tgl_masuk`, `tgl_keluar`, `id_pasien`, `id_dokter`, `id_perawat`, `no_kamar`) VALUES
(3, '2021-06-01', '2021-06-06', 1, 2, 1, 3),
(4, '2021-06-03', '2021-06-05', 3, 1, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perawat`
--
ALTER TABLE `perawat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_perawat` (`id_perawat`),
  ADD KEY `no_kamar` (`no_kamar`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perawat`
--
ALTER TABLE `perawat`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_perawat`) REFERENCES `perawat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`no_kamar`) REFERENCES `kamar` (`no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_5` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
