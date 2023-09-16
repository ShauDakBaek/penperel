-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 16, 2023 at 04:25 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penperel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int NOT NULL,
  `kata` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `kata`) VALUES
(1, '$2y$10$tK6g16cfIro73YhGcT4fcujPif27U5s2zDHPvCM2U/3I60KSM2O1K');

-- --------------------------------------------------------

--
-- Table structure for table `pelajar`
--

CREATE TABLE `pelajar` (
  `idpelajar` int NOT NULL,
  `warden` int NOT NULL,
  `namapelajar` varchar(200) NOT NULL,
  `nokppelajar` varchar(12) NOT NULL,
  `kata` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelajar`
--

INSERT INTO `pelajar` (`idpelajar`, `warden`, `namapelajar`, `nokppelajar`, `kata`) VALUES
(5, 11, 'Shodiqin', '030504100095', '$2y$10$bSYFx4wcDD7CCpFdIIKXQu8bHjJgdyc45KSLzl7TmYuBrwnxfVj02');

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `idperalatan` int NOT NULL,
  `pelajar` int NOT NULL,
  `jenisperalatan` varchar(200) NOT NULL,
  `jenama` varchar(200) NOT NULL,
  `nosiri` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peralatan`
--

INSERT INTO `peralatan` (`idperalatan`, `pelajar`, `jenisperalatan`, `jenama`, `nosiri`) VALUES
(9, 5, 'Gergaji Elektrik', 'Bosch', 'X0002');

-- --------------------------------------------------------

--
-- Table structure for table `warden`
--

CREATE TABLE `warden` (
  `idwarden` int NOT NULL,
  `namawarden` varchar(200) NOT NULL,
  `nokpwarden` varchar(12) NOT NULL,
  `kata` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `warden`
--

INSERT INTO `warden` (`idwarden`, `namawarden`, `nokpwarden`, `kata`) VALUES
(11, 'Shaqiff', '030504100096', '$2y$10$GOA6EEafEdjkBY8ElrcCxOZ3Tad6q/yPuoHsAm0Qa.N89PtMN4B7K'),
(12, 'Shauqi', '030504100097', '$2y$10$BKX9xZvgFHithiipC2FHdOt.et4V9cELKX2srB9GPozpL1h3nBnXu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD PRIMARY KEY (`idpelajar`),
  ADD KEY `warden` (`warden`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`idperalatan`),
  ADD KEY `pelajar` (`pelajar`);

--
-- Indexes for table `warden`
--
ALTER TABLE `warden`
  ADD PRIMARY KEY (`idwarden`),
  ADD UNIQUE KEY `nokpwarden` (`nokpwarden`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelajar`
--
ALTER TABLE `pelajar`
  MODIFY `idpelajar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `idperalatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `warden`
--
ALTER TABLE `warden`
  MODIFY `idwarden` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD CONSTRAINT `pelajar_ibfk_1` FOREIGN KEY (`warden`) REFERENCES `warden` (`idwarden`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD CONSTRAINT `peralatan_ibfk_1` FOREIGN KEY (`pelajar`) REFERENCES `pelajar` (`idpelajar`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
