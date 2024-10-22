-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 06:59 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catur_spm`
--
CREATE DATABASE IF NOT EXISTS `catur_spm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `catur_spm`;

-- --------------------------------------------------------

--
-- Table structure for table `hakim`
--

CREATE TABLE `hakim` (
  `Kod_Hakim` varchar(4) NOT NULL,
  `Nama_Hakim` varchar(100) NOT NULL,
  `Katalaluan_hakim` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hakim`
--

INSERT INTO `hakim` (`Kod_Hakim`, `Nama_Hakim`, `Katalaluan_hakim`) VALUES
('H01', 'Aisyah Humaira', 'AH11'),
('H02', 'Siti Nurhaliza', 'SN22'),
('H03', 'Kok Leong Seng', 'KLS33'),
('H04', 'potato', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pertandingan`
--

CREATE TABLE `pertandingan` (
  `Kod_Peserta` varchar(12) NOT NULL,
  `Kod_Hakim` varchar(4) NOT NULL,
  `Markah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertandingan`
--

INSERT INTO `pertandingan` (`Kod_Peserta`, `Kod_Hakim`, `Markah`) VALUES
('P01', 'H01', 1),
('P01', 'H02', 1),
('P01', 'H03', 1),
('P02', 'H02', 1),
('P02', 'H03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `Kod_Peserta` varchar(12) NOT NULL,
  `Nama_Peserta` varchar(50) NOT NULL,
  `Nombor_Telefon` varchar(10) NOT NULL,
  `Umur` int(2) NOT NULL,
  `Jantina` varchar(9) NOT NULL,
  `Katalaluan_Peserta` varchar(5) NOT NULL,
  `Kod_Sekolah` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`Kod_Peserta`, `Nama_Peserta`, `Nombor_Telefon`, `Umur`, `Jantina`, `Katalaluan_Peserta`, `Kod_Sekolah`) VALUES
('P01', 'Siti Salaha', '0123084040', 16, 'Perempuan', 'SS11', 'PEA1094'),
('P02', 'Ivan Simoth', '0122848392', 17, 'Lelaki', 'IS22', 'PEB1108'),
('P03', 'Lim Jun Hao', '0163514839', 17, 'Lelaki', 'LJH33', 'PEB1106'),
('P04', 'Cheng Jia Sheng', '0126898679', 17, 'Lelaki', 'CJS44', 'PEB1103');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `Kod_Sekolah` varchar(7) NOT NULL,
  `Nama_Sekolah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`Kod_Sekolah`, `Nama_Sekolah`) VALUES
('PEA1094', 'SMK Air Itam'),
('PEB1103', 'SMK Heng Ee'),
('PEB1106', 'SMK Methodist'),
('PEB1108', 'SMJK Phor Tay'),
('PEB1111', 'SMK TESTa'),
('PEB2222', 'SMK TESTb'),
('PEB3333', 'SMK TESTc'),
('PEB4444', 'SMK TESTd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hakim`
--
ALTER TABLE `hakim`
  ADD PRIMARY KEY (`Kod_Hakim`);

--
-- Indexes for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD PRIMARY KEY (`Kod_Peserta`,`Kod_Hakim`),
  ADD KEY `ID_Peserta` (`Kod_Peserta`),
  ADD KEY `ID_Hakim` (`Kod_Hakim`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`Kod_Peserta`),
  ADD KEY `Kod_Sekolah` (`Kod_Sekolah`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`Kod_Sekolah`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD CONSTRAINT `pertandingan_ibfk_1` FOREIGN KEY (`Kod_Peserta`) REFERENCES `peserta` (`Kod_Peserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pertandingan_ibfk_2` FOREIGN KEY (`Kod_Hakim`) REFERENCES `hakim` (`Kod_Hakim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`Kod_Sekolah`) REFERENCES `sekolah` (`Kod_Sekolah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
