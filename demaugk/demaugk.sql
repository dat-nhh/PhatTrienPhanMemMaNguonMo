-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 03:04 PM
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
-- Database: `demaugk`
--

-- --------------------------------------------------------

--
-- Table structure for table `chuyenbay`
--

CREATE TABLE `chuyenbay` (
  `MaCB` int(5) NOT NULL,
  `SoCB` int(5) NOT NULL,
  `KhoiHanh` int(5) NOT NULL,
  `NgayKH` date NOT NULL,
  `KetThuc` int(5) NOT NULL,
  `NgayKT` date NOT NULL,
  `Gia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chuyenbay`
--

INSERT INTO `chuyenbay` (`MaCB`, `SoCB`, `KhoiHanh`, `NgayKH`, `KetThuc`, `NgayKT`, `Gia`) VALUES
(211, 1, 121, '2024-10-01', 111, '2024-10-02', 100000),
(212, 2, 121, '2024-10-03', 111, '2024-10-04', 100000),
(213, 3, 121, '2024-10-05', 111, '2024-10-06', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `quocgia`
--

CREATE TABLE `quocgia` (
  `MaQG` int(5) NOT NULL,
  `TenQG` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quocgia`
--

INSERT INTO `quocgia` (`MaQG`, `TenQG`) VALUES
(1, 'Viet Nam'),
(2, 'Nhat Ban'),
(3, 'My');

-- --------------------------------------------------------

--
-- Table structure for table `thanhpho`
--

CREATE TABLE `thanhpho` (
  `MaTP` int(5) NOT NULL,
  `TenTP` varchar(50) NOT NULL,
  `BangTinh` varchar(50) NOT NULL,
  `MaQG` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thanhpho`
--

INSERT INTO `thanhpho` (`MaTP`, `TenTP`, `BangTinh`, `MaQG`) VALUES
(111, 'Vip', 'Pro', 3),
(121, 'Nha Trang', 'Khanh Hoa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chuyenbay`
--
ALTER TABLE `chuyenbay`
  ADD PRIMARY KEY (`MaCB`),
  ADD KEY `KhoiHanh` (`KhoiHanh`),
  ADD KEY `KetThuc` (`KetThuc`);

--
-- Indexes for table `quocgia`
--
ALTER TABLE `quocgia`
  ADD PRIMARY KEY (`MaQG`),
  ADD KEY `MaQG` (`MaQG`);

--
-- Indexes for table `thanhpho`
--
ALTER TABLE `thanhpho`
  ADD PRIMARY KEY (`MaTP`,`MaQG`),
  ADD KEY `MaTP` (`MaTP`,`MaQG`),
  ADD KEY `FK_QuocGia` (`MaQG`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chuyenbay`
--
ALTER TABLE `chuyenbay`
  ADD CONSTRAINT `FK_KetThuc` FOREIGN KEY (`KetThuc`) REFERENCES `thanhpho` (`MaTP`),
  ADD CONSTRAINT `FK_KhoiHanh` FOREIGN KEY (`KhoiHanh`) REFERENCES `thanhpho` (`MaTP`);

--
-- Constraints for table `thanhpho`
--
ALTER TABLE `thanhpho`
  ADD CONSTRAINT `FK_QuocGia` FOREIGN KEY (`MaQG`) REFERENCES `quocgia` (`MaQG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
