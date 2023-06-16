-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 12:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kodingpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `username`, `password`) VALUES
(5, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `idMentor` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `hp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`idMentor`, `nama`, `email`, `alamat`, `hp`) VALUES
(3, 'Calvin', 'calvinsnjy@yahoo.co.id', 'padang', '08523339231238124124'),
(5, 'Mufid', 'rizkimufid.rm@gmail.com', 'Padang', '08972312381'),
(7, 'Pajok', 'pajok@kodingpro.com', 'Padang Pariaman', '018230123'),
(10, 'Beni', 'beni@124', 'pisang', '08129764124');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `idPaket` int(11) NOT NULL,
  `namaPaket` varchar(255) DEFAULT NULL,
  `durasi` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`idPaket`, `namaPaket`, `durasi`, `level`) VALUES
(2, 'JavaScript DOM', '16', 'Intermediate'),
(9, 'PHP CRUD', '8', 'Beginner'),
(11, 'Laravel CRUD', '16', 'Intermediate'),
(12, 'React JS', '8', 'Intermediate'),
(14, 'Flutter Lanjutan', '8', 'Expert'),
(15, 'Php', '16', 'Expert');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `idRegistrasi` int(11) NOT NULL,
  `teamLeader` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `hari` varchar(255) DEFAULT NULL,
  `idPaket` int(11) NOT NULL,
  `idMentor` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`idRegistrasi`, `teamLeader`, `email`, `whatsapp`, `hari`, `idPaket`, `idMentor`, `status`) VALUES
(9, 'Aulia Rahman simanjuntak', 'aulcenol@gmail.com', '0812312312', 'Rabu', 12, 5, 'Progres'),
(12, 'Ismat Naufal', 'cimet@keke.com', '08216273812', 'Senin', 9, 7, 'Selesai'),
(13, 'Beni Adam', 'adama@shih.com', '0712738123', 'Jumat', 11, 5, 'Selesai'),
(14, 'Wulan Fadhilah', 'walan@gmail.com', '082371231', 'Sabtu', 12, 5, 'Selesai'),
(15, 'asd', 'aasdas@gmail.com', '123123', 'Senin', 2, 3, 'Progres');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`idMentor`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`idPaket`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`idRegistrasi`),
  ADD KEY `idPaket` (`idPaket`),
  ADD KEY `idMentor` (`idMentor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mentor`
--
ALTER TABLE `mentor`
  MODIFY `idMentor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `idPaket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `idRegistrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD CONSTRAINT `registrasi_ibfk_1` FOREIGN KEY (`idPaket`) REFERENCES `paket` (`idPaket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registrasi_ibfk_2` FOREIGN KEY (`idMentor`) REFERENCES `mentor` (`idMentor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
