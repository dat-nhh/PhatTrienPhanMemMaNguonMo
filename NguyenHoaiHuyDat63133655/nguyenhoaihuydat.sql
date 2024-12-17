-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2024 at 03:19 AM
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
-- Database: `nguyenhoaihuydat`
--

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `MaGV` varchar(5) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `NTNS` date NOT NULL,
  `QueQuan` varchar(50) NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Khoa` varchar(5) NOT NULL,
  `HocVan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`MaGV`, `HoTen`, `NTNS`, `QueQuan`, `GioiTinh`, `SDT`, `Email`, `Khoa`, `HocVan`) VALUES
('11111', '1111111', '2024-10-21', 'ghghjhjghj', 1, '12;lkjl', 'bjjghj', 'cnoto', 'tien'),
('123', 'nguyen van a', '0000-00-00', 'nha trang', 1, '0321654978', 'a@gmail.com', 'cntt', 'tien'),
('141', 'nguyen van b', '2024-10-31', 'nha trang', 1, '08262626', 'vip@mail.com', 'luat', 'tien');

-- --------------------------------------------------------

--
-- Table structure for table `hocvi`
--

CREATE TABLE `hocvi` (
  `MaHocVan` varchar(5) NOT NULL,
  `TenHocVan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hocvi`
--

INSERT INTO `hocvi` (`MaHocVan`, `TenHocVan`) VALUES
('cao', 'Cao đẳng'),
('cu', 'Cử nhân'),
('thac', 'Thạc sĩ'),
('tien', 'Tiến sĩ');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `MaKhoa` varchar(5) NOT NULL,
  `TenKhoa` varchar(50) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `SDT` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`MaKhoa`, `TenKhoa`, `DiaChi`, `Email`, `SDT`) VALUES
('cnoto', 'Công nghệ ô tô', 'Tầng 7 Nhà Đa Năng', 'cnoto@ntu.edu.vn', '0123456788'),
('cntp', 'Công nghệ thực phẩm', 'Tầng 7 Nhà Đa Năng', 'cntp@ntu.edu.vn', '0123456787'),
('cntt', 'Công nghệ thông tin', 'Tầng 7 Nhà Đa Năng', 'khoacntt@ntu.edu.vn', '0123456789'),
('luat', 'Luật', 'Tầng 7 Nhà Đa Năng', 'luat@ntu.edu.vn', '0123456786');

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
  ADD CONSTRAINT `FK_MaHocVan` FOREIGN KEY (`HocVan`) REFERENCES `hocvi` (`MaHocVan`),
  ADD CONSTRAINT `FK_MaKhoa` FOREIGN KEY (`Khoa`) REFERENCES `khoa` (`MaKhoa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
