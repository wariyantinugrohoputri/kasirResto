-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2021 at 02:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_admin`
--

INSERT INTO `tabel_admin` (`ID_ADMIN`, `USERNAME`, `PASSWORD`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_menu`
--

CREATE TABLE `tabel_menu` (
  `ID_MENU` int(11) NOT NULL,
  `NAMA_MENU` varchar(50) DEFAULT NULL,
  `JENIS` varchar(10) DEFAULT NULL,
  `HARGA` int(11) DEFAULT NULL,
  `DELETE_STATUS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_menu`
--

INSERT INTO `tabel_menu` (`ID_MENU`, `NAMA_MENU`, `JENIS`, `HARGA`, `DELETE_STATUS`) VALUES
(1, 'Hotdog + Keju', 'Makanan', 20000, 1),
(2, 'Spaghetti', 'Makanan', 25000, 1),
(3, 'Steak', 'Makanan', 30000, 0),
(4, 'Milshake', 'Minuman', 15000, 0),
(5, 'Ice Lemon Tea', 'Minuman', 10000, 0),
(6, 'dorayaki', 'makanan', 8000, 0),
(7, 'jus salak', 'minuman', 2000, 0),
(8, 'Aqua Gelas', 'minuman', 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_nota`
--

CREATE TABLE `tabel_nota` (
  `ID_NOTA` int(11) NOT NULL,
  `ID_PELANGGAN` int(11) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `TOTAL_BAYAR` int(11) DEFAULT NULL,
  `BAYAR_TUNAI` int(11) DEFAULT NULL,
  `KEMBALIAN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_nota`
--

INSERT INTO `tabel_nota` (`ID_NOTA`, `ID_PELANGGAN`, `TANGGAL`, `TOTAL_BAYAR`, `BAYAR_TUNAI`, `KEMBALIAN`) VALUES
(1, 1, '2021-07-03', 175000, 200000, 25000),
(2, 2, '2021-07-03', 105000, 150000, 45000),
(3, 3, '2021-07-04', 90000, 100000, 10000),
(4, 4, '2021-07-04', 30000, 50000, 20000),
(5, 5, '2021-09-22', 76000, 100000, 24000),
(6, 6, '2021-09-22', 12000, NULL, NULL),
(7, 7, '2021-09-22', 15000, 20000, 5000),
(8, 8, '2021-09-22', 10000, 10000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pelanggan`
--

CREATE TABLE `tabel_pelanggan` (
  `ID_PELANGGAN` int(11) NOT NULL,
  `ID_NOTA` int(11) DEFAULT NULL,
  `NAMA_PELANGGAN` varchar(50) DEFAULT NULL,
  `NO_MEJA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pelanggan`
--

INSERT INTO `tabel_pelanggan` (`ID_PELANGGAN`, `ID_NOTA`, `NAMA_PELANGGAN`, `NO_MEJA`) VALUES
(1, 1, 'Wariyanti', 2),
(2, 2, 'Avia', 4),
(3, 3, 'Ima', 3),
(4, 4, 'Sifu', 5),
(5, 5, 'Nadhif', 2),
(6, 6, 'I Wayan', 2),
(7, 7, 'Vero', 1),
(8, 8, 'Boogie', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pembelian`
--

CREATE TABLE `tabel_pembelian` (
  `ID_PESANAN` int(11) NOT NULL,
  `ID_PELANGGAN` int(11) DEFAULT NULL,
  `ID_NOTA` int(11) DEFAULT NULL,
  `ID_MENU` int(11) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL,
  `BAYAR_ITEM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pembelian`
--

INSERT INTO `tabel_pembelian` (`ID_PESANAN`, `ID_PELANGGAN`, `ID_NOTA`, `ID_MENU`, `JUMLAH`, `BAYAR_ITEM`) VALUES
(1, 1, 1, 1, 5, 100000),
(2, 1, 1, 4, 5, 75000),
(3, 2, 2, 2, 3, 75000),
(4, 2, 2, 5, 3, 30000),
(5, 3, 3, 3, 2, 60000),
(55, 5, 5, 3, 1, 30000),
(56, 5, 5, 4, 2, 30000),
(57, 5, 5, 6, 2, 16000),
(58, 6, 6, 5, 1, 10000),
(59, 6, 6, 7, 1, 2000),
(60, 7, 7, 4, 1, 15000),
(61, 8, 8, 6, 1, 8000),
(62, 8, 8, 7, 1, 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`ID_ADMIN`),
  ADD UNIQUE KEY `TABEL_ADMIN_PK` (`ID_ADMIN`);

--
-- Indexes for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  ADD PRIMARY KEY (`ID_MENU`),
  ADD UNIQUE KEY `TABEL_MENU_PK` (`ID_MENU`);

--
-- Indexes for table `tabel_nota`
--
ALTER TABLE `tabel_nota`
  ADD PRIMARY KEY (`ID_NOTA`),
  ADD UNIQUE KEY `TABEL_NOTA_PK` (`ID_NOTA`),
  ADD KEY `MENERIMA2_FK` (`ID_PELANGGAN`);

--
-- Indexes for table `tabel_pelanggan`
--
ALTER TABLE `tabel_pelanggan`
  ADD PRIMARY KEY (`ID_PELANGGAN`),
  ADD UNIQUE KEY `TABEL_PELANGGAN_PK` (`ID_PELANGGAN`),
  ADD KEY `MENERIMA_FK` (`ID_NOTA`);

--
-- Indexes for table `tabel_pembelian`
--
ALTER TABLE `tabel_pembelian`
  ADD PRIMARY KEY (`ID_PESANAN`),
  ADD UNIQUE KEY `TABEL_PEMBELIAN_PK` (`ID_PESANAN`),
  ADD KEY `MEMESAN_FK` (`ID_PELANGGAN`),
  ADD KEY `MERINCI_PESANAN_MAKANAN_FK` (`ID_MENU`),
  ADD KEY `FK_TABEL_PE_MENDATA_TABEL_NO` (`ID_NOTA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  MODIFY `ID_MENU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tabel_nota`
--
ALTER TABLE `tabel_nota`
  MODIFY `ID_NOTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tabel_pelanggan`
--
ALTER TABLE `tabel_pelanggan`
  MODIFY `ID_PELANGGAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tabel_pembelian`
--
ALTER TABLE `tabel_pembelian`
  MODIFY `ID_PESANAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_nota`
--
ALTER TABLE `tabel_nota`
  ADD CONSTRAINT `FK_TABEL_NO_MENERIMA2_TABEL_PE` FOREIGN KEY (`ID_PELANGGAN`) REFERENCES `tabel_pelanggan` (`ID_PELANGGAN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_pelanggan`
--
ALTER TABLE `tabel_pelanggan`
  ADD CONSTRAINT `FK_TABEL_PE_MENERIMA_TABEL_NO` FOREIGN KEY (`ID_NOTA`) REFERENCES `tabel_nota` (`ID_NOTA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_pembelian`
--
ALTER TABLE `tabel_pembelian`
  ADD CONSTRAINT `FK_TABEL_PE_MEMESAN_TABEL_PE` FOREIGN KEY (`ID_PELANGGAN`) REFERENCES `tabel_pelanggan` (`ID_PELANGGAN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TABEL_PE_MENDATA_TABEL_NO` FOREIGN KEY (`ID_NOTA`) REFERENCES `tabel_nota` (`ID_NOTA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TABEL_PE_MERINCI_P_TABEL_ME` FOREIGN KEY (`ID_MENU`) REFERENCES `tabel_menu` (`ID_MENU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
