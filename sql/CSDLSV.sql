-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 26, 2024 at 02:56 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CSDLSV`
--

-- --------------------------------------------------------

--
-- Table structure for table `ThongTinLop`
--

CREATE TABLE `ThongTinLop` (
  `id` int(11) NOT NULL,
  `TenLop` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaLop` int(11) NOT NULL,
  `CVHT` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ThongTinLop`
--

INSERT INTO `ThongTinLop` (`id`, `TenLop`, `MaLop`, `CVHT`) VALUES
(2, '63cntt1', 1, 'nguyen van'),
(3, '63CNTT3', 2, 'Nguyen Van'),
(4, '63CNTT300', 3, 'Nguyen Van');

-- --------------------------------------------------------

--
-- Table structure for table `ThongTinSV`
--

CREATE TABLE `ThongTinSV` (
  `id` int(11) NOT NULL,
  `Ho` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaLop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ThongTinSV`
--

INSERT INTO `ThongTinSV` (`id`, `Ho`, `Ten`, `DiaChi`, `MaLop`) VALUES
(11, 'dasdsa', 'fsdfd', 'dsadsadasas', 3),
(12, 'dsadsa', 'dsdas', 'dasdasas', 1),
(13, 'dsadsa321321', 'dsdas21321', 'dasdasas321323', 1),
(14, 'dsadsa321321321', 'dsdas21321321', 'dasdasas32132332132', 2),
(15, '3213dsadsa321321321', 'dsdas21321321342', 'dasdasas32132332132123', 3),
(16, 'dsadas', 'fdfds1111111111', '111111', 1),
(17, '4213423', '4324', '21435324', 2),
(18, '324324', '3221321', '232148gghjg', 1),
(19, 'qqqqqqqq1', 'qqqqqqq1', '54635463', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ThongTinLop`
--
ALTER TABLE `ThongTinLop`
  ADD PRIMARY KEY (`id`,`MaLop`),
  ADD KEY `_FK_ThongTinSV_MaLop` (`MaLop`);

--
-- Indexes for table `ThongTinSV`
--
ALTER TABLE `ThongTinSV`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaLop` (`MaLop`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ThongTinLop`
--
ALTER TABLE `ThongTinLop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ThongTinSV`
--
ALTER TABLE `ThongTinSV`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ThongTinSV`
--
ALTER TABLE `ThongTinSV`
  ADD CONSTRAINT `FK_thongtinlop` FOREIGN KEY (`MaLop`) REFERENCES `ThongTinLop` (`MaLop`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
