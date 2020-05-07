-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 08:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gis_fajar`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `cita_cita` varchar(100) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `tanggal_lahir`, `tempat_lahir`, `jk`, `cita_cita`, `latitude`, `longitude`) VALUES
(1, 'Fajar Hidayat', '2020-02-14', 'Indramayu', 'L', 'Menjadi orang kaya', '-7.0182254858302615', '110.40965795516968'),
(2, 'M. ARIEF SOELEMAN', '2020-05-15', 'Semarang', 'L', 'Dosen', '-7.014276153369434', '110.41494702004718');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
