-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 10:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ktpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `MaGV` varchar(10) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `NTNS` date NOT NULL,
  `QueQuan` varchar(50) NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Khoa` varchar(10) NOT NULL,
  `HocVan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`MaGV`, `HoTen`, `NTNS`, `QueQuan`, `GioiTinh`, `SDT`, `Email`, `Khoa`, `HocVan`) VALUES
('1000', 'nguyen van a', '0000-00-00', 'nha trang', 1, '0321654978', 'a@gmail.com', 'CNTT', 'tien'),
('1001', 'dada', '2024-10-31', 'adadwda', 0, '0132665', 'dasdawd', 'CNTP', 'thac'),
('1002', 'dasd', '2024-11-23', 'dasd', 1, 'asda', 'dasd', 'NN', 'tien');

-- --------------------------------------------------------

--
-- Table structure for table `hocvi`
--

CREATE TABLE `hocvi` (
  `MaHocVan` varchar(10) NOT NULL,
  `TenHocVan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hocvi`
--

INSERT INTO `hocvi` (`MaHocVan`, `TenHocVan`) VALUES
('thac', 'Thạc sĩ'),
('tien', 'Tiến sĩ');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `MaKhoa` varchar(10) NOT NULL,
  `TenKhoa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`MaKhoa`, `TenKhoa`) VALUES
('CK', 'Cơ khí'),
('CNTP', 'Công nghệ Thực phẩm'),
('CNTT', 'Công nghệ Thông tin'),
('DDT', 'Điện - Điện tử'),
('DL', 'Du lịch'),
('KHXHNV', 'Khoa học Xã hội & Nhân văn'),
('KT', 'Kinh tế'),
('KTGT', 'Kỹ thuật Giao thông'),
('KTTC', 'Kế toán Tài chính'),
('NN', 'Ngoại ngữ'),
('XD', 'Xây dựng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`MaGV`,`HocVan`,`Khoa`),
  ADD KEY `MaGV` (`MaGV`,`Khoa`,`HocVan`),
  ADD KEY `FK_MaKhoa` (`Khoa`),
  ADD KEY `FK_MaHocVan` (`HocVan`);

--
-- Indexes for table `hocvi`
--
ALTER TABLE `hocvi`
  ADD PRIMARY KEY (`MaHocVan`),
  ADD KEY `MaHocVan` (`MaHocVan`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`MaKhoa`),
  ADD KEY `MaKhoa` (`MaKhoa`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `FK_HocVan` FOREIGN KEY (`HocVan`) REFERENCES `hocvi` (`MaHocVan`),
  ADD CONSTRAINT `FK_Khoa` FOREIGN KEY (`Khoa`) REFERENCES `khoa` (`MaKhoa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
