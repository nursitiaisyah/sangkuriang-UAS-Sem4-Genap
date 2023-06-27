-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 06:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sangkuriang2`
--

-- --------------------------------------------------------

--
-- Table structure for table `r_harini`
--

CREATE TABLE `r_harini` (
  `tggl` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_gunor`
--

CREATE TABLE `t_gunor` (
  `idGuru` char(4) NOT NULL,
  `jenis` char(1) NOT NULL,
  `tgMasuk` date DEFAULT NULL,
  `GaPok` int(11) NOT NULL,
  `idxHR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_guri`
--

CREATE TABLE `t_guri` (
  `idGuru` char(4) NOT NULL,
  `idTari` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_guru`
--

CREATE TABLE `t_guru` (
  `ID` char(4) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `JK` char(1) NOT NULL,
  `tpLahir` varchar(15) NOT NULL,
  `tgLahir` date DEFAULT NULL,
  `alamat` varchar(30) NOT NULL,
  `noHP` varchar(14) NOT NULL,
  `aktif` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_guru`
--

INSERT INTO `t_guru` (`ID`, `nama`, `JK`, `tpLahir`, `tgLahir`, `alamat`, `noHP`, `aktif`) VALUES
('RF08', 'Wita Des', 'W', 'Lumajang', '1999-09-08', 'Malang', '0897764543298', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `t_siswa`
--

CREATE TABLE `t_siswa` (
  `ID` char(6) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `JK` char(1) NOT NULL,
  `tpLahir` varchar(15) NOT NULL,
  `tgLahir` date DEFAULT NULL,
  `alamat` varchar(30) NOT NULL,
  `noHP` varchar(14) NOT NULL,
  `tgMasuk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_siswa`
--

INSERT INTO `t_siswa` (`ID`, `nama`, `JK`, `tpLahir`, `tgLahir`, `alamat`, `noHP`, `tgMasuk`) VALUES
('', 'Fita Amaro ', 'W', 'Lumajang', '2023-06-02', 'Jl. Gading Griya Lestari Blok ', '0897764543290', '2023-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `t_tari`
--

CREATE TABLE `t_tari` (
  `kode` char(4) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jenis` char(1) NOT NULL,
  `lama` tinyint(4) NOT NULL,
  `aktif` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_tari`
--

INSERT INTO `t_tari` (`kode`, `nama`, `jenis`, `lama`, `aktif`) VALUES
('A014', 'Breakdance', 'M', 16, 'T'),
('BA01', 'Balet', 'M', 16, 'T');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_gunor`
--
ALTER TABLE `t_gunor`
  ADD PRIMARY KEY (`idGuru`);

--
-- Indexes for table `t_guru`
--
ALTER TABLE `t_guru`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_tari`
--
ALTER TABLE `t_tari`
  ADD PRIMARY KEY (`kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
