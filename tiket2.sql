-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 05:57 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket2`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `kode_pemesanan` varchar(20) NOT NULL,
  `kode_jadwal` varchar(10) NOT NULL,
  `tarif_tiket` int(11) NOT NULL,
  `jumlah_pemesanan` int(11) NOT NULL,
  `tarif_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`kode_pemesanan`, `kode_jadwal`, `tarif_tiket`, `jumlah_pemesanan`, `tarif_total`) VALUES
('PS439', 'AB001', 200000, 1, 200000),
('PS803', 'AW002', 210000, 3, 630000),
('PS767', 'CR001', 210000, 2, 420000),
('PS819', 'AL002', 185000, 2, 370000);

-- --------------------------------------------------------

--
-- Table structure for table `header_pemesanan`
--

CREATE TABLE `header_pemesanan` (
  `kode_pemesanan` varchar(20) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `nama_customer` varchar(50) DEFAULT NULL,
  `tgl_berangkat` date DEFAULT NULL,
  `status_pembayaran` enum('Lunas','Belum Lunas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_pemesanan`
--

INSERT INTO `header_pemesanan` (`kode_pemesanan`, `tgl_pemesanan`, `nama_customer`, `tgl_berangkat`, `status_pembayaran`) VALUES
('PS439', '2021-05-28', 'faul', '2021-05-31', 'Lunas'),
('PS767', '2021-05-28', 'Rudi', '2021-05-29', 'Lunas'),
('PS803', '2021-05-28', 'Adit', '2021-05-29', 'Lunas'),
('PS819', '2021-05-28', 'Wati', '2021-05-30', 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_jadwal` varchar(10) NOT NULL,
  `kode_kereta` int(6) NOT NULL,
  `tujuan` varchar(20) NOT NULL,
  `waktu_keberangkatan` time NOT NULL,
  `tarif_tiket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kode_jadwal`, `kode_kereta`, `tujuan`, `waktu_keberangkatan`, `tarif_tiket`) VALUES
('AB001', 1, 'Jakarta', '09:00:00', 200000),
('AB002', 1, 'Surabaya', '20:30:00', 200000),
('AC001', 5, 'Tegal', '06:15:00', 160000),
('AC002', 5, 'Cirebon', '15:30:00', 160000),
('AL001', 3, 'Jakarta', '08:30:00', 185000),
('AL002', 3, 'Solo', '20:00:00', 185000),
('AP001', 13, 'Bandung', '14:25:00', 90000),
('AP002', 13, 'Jakarta', '19:30:00', 90000),
('AS001', 4, 'Semarang', '16:15:00', 165000),
('AS002', 4, 'Jakarta', '07:00:00', 165000),
('AW001', 2, 'Bandung', '07:00:00', 210000),
('AW002', 2, 'Surabaya', '20:00:00', 210000),
('BR001', 12, 'Blitar', '13:39:00', 180000),
('CR001', 9, 'Bandung', '06:30:00', 210000),
('CR002', 9, 'Semarang', '17:00:00', 210000),
('DW001', 11, 'Surabaya', '08:25:00', 160000),
('JT001', 14, 'Purwosari', '07:00:00', 125000),
('JT002', 14, 'Jakarta', '16:00:00', 125000),
('ML001', 6, 'Malang', '05:15:00', 230000),
('MP001', 15, 'Malang', '22:00:00', 180000),
('MT001', 8, 'Jakarta', '08:50:00', 200000),
('MT002', 8, 'Solo', '21:05:00', 200000),
('RJ001', 7, 'Cirebon', '05:00:00', 250000),
('SU001', 10, 'Purworejo', '07:00:00', 130000),
('SU002', 10, 'Surabaya', '17:15:00', 130000);

-- --------------------------------------------------------

--
-- Table structure for table `kereta`
--

CREATE TABLE `kereta` (
  `kode_kereta` int(6) NOT NULL,
  `nama_kereta` varchar(50) NOT NULL,
  `jumlah_gerbong` int(6) NOT NULL,
  `jumlah_kursi` int(6) NOT NULL,
  `jalur` varchar(100) NOT NULL,
  `kelas` enum('Eksekutif','Ekonomi','Bisnis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kereta`
--

INSERT INTO `kereta` (`kode_kereta`, `nama_kereta`, `jumlah_gerbong`, `jumlah_kursi`, `jalur`, `kelas`) VALUES
(1, 'Argo Bromo Anggrek', 4, 160, 'Jakarta-Surabaya', 'Eksekutif'),
(2, 'Argo Wilis', 5, 200, 'Surabaya-Bandung', 'Eksekutif'),
(3, 'Argo Lawu', 4, 160, 'Jakarta-Solo', 'Eksekutif'),
(4, 'Argo Sindoro', 5, 200, 'Semarang-Jakarta', 'Eksekutif'),
(5, 'Argo Cheribon', 4, 160, 'Cirebon-Tegal', 'Eksekutif'),
(6, 'Malabar', 3, 150, 'Malang-Bandung', 'Bisnis'),
(7, 'Ranggajati', 4, 200, 'Jember-Cirebon', 'Bisnis'),
(8, 'Mataram', 5, 250, 'Solo-Jakarta', 'Bisnis'),
(9, 'Ciremai', 4, 200, 'Semarang-Bandung', 'Bisnis'),
(10, 'Sancaka Utara', 5, 250, 'Surabaya-Purworejo', 'Bisnis'),
(11, 'Dharmawangsa', 5, 250, 'Jakarta-Surabaya', 'Ekonomi'),
(12, 'Brantas', 4, 200, 'Blitar-Jakarta', 'Ekonomi'),
(13, 'Argo Parahyangan', 3, 150, 'Bandung-Jakarta', 'Ekonomi'),
(14, 'Jaka Tingkir', 5, 250, 'Purwosari-Jakarta', 'Ekonomi'),
(15, 'Majapahit', 5, 250, 'Jakarta-Malang', 'Ekonomi');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kode_pembayaran` varchar(20) NOT NULL,
  `kode_pemesanan` varchar(20) NOT NULL,
  `rekening` int(11) NOT NULL,
  `nama_b` varchar(50) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `tarif_total` int(11) NOT NULL,
  `tagihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`kode_pembayaran`, `kode_pemesanan`, `rekening`, `nama_b`, `tgl_pembayaran`, `tarif_total`, `tagihan`) VALUES
('PS767-L5', 'PS767', 255353, 'Rudi', '2021-05-28', 420000, 0),
('PS803-L62', 'PS803', 55444, 'Adit', '2021-05-28', 630000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD KEY `kode_pemesanan1` (`kode_pemesanan`),
  ADD KEY `kode_jadwal` (`kode_jadwal`);

--
-- Indexes for table `header_pemesanan`
--
ALTER TABLE `header_pemesanan`
  ADD PRIMARY KEY (`kode_pemesanan`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode_jadwal`),
  ADD KEY `kode_kereta` (`kode_kereta`);

--
-- Indexes for table `kereta`
--
ALTER TABLE `kereta`
  ADD PRIMARY KEY (`kode_kereta`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kode_pembayaran`),
  ADD KEY `kode_pemesanan2` (`kode_pemesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kereta`
--
ALTER TABLE `kereta`
  MODIFY `kode_kereta` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `kode_jadwal` FOREIGN KEY (`kode_jadwal`) REFERENCES `jadwal` (`kode_jadwal`),
  ADD CONSTRAINT `kode_pemesanan1` FOREIGN KEY (`kode_pemesanan`) REFERENCES `header_pemesanan` (`kode_pemesanan`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `kode_kereta` FOREIGN KEY (`kode_kereta`) REFERENCES `kereta` (`kode_kereta`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `kode_pemesanan2` FOREIGN KEY (`kode_pemesanan`) REFERENCES `header_pemesanan` (`kode_pemesanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
