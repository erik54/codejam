-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2017 at 05:24 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codejam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `IDadmin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `IDjawaban` int(11) NOT NULL,
  `IDsoal` int(11) NOT NULL,
  `IDparticipants` int(11) NOT NULL,
  `waktu` time NOT NULL,
  `fileJawaban` varchar(255) NOT NULL,
  `fileAlgoritma` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`IDjawaban`, `IDsoal`, `IDparticipants`, `waktu`, `fileJawaban`, `fileAlgoritma`) VALUES
(1, 2, 1, '10:13:00', '3', 'blablabla'),
(2, 1, 3, '10:12:05', 'wow', ''),
(3, 2, 3, '10:15:04', 'lopoo', '');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `IDparticipants` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `tingkat` enum('SMA','Mahasiswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`IDparticipants`, `username`, `nama`, `college`, `tingkat`) VALUES
(1, 'peserta1', 'Afgan', 'UNJ', 'Mahasiswa'),
(2, 'peserta2', 'Achiel', 'UNJ', 'Mahasiswa'),
(3, 'peserta3', 'Esa', 'UNJ', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `IDsoal` int(11) NOT NULL,
  `tingkat` enum('SMA','Mahasiswa') NOT NULL,
  `soal` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`IDsoal`, `tingkat`, `soal`, `tanggal`, `waktu`) VALUES
(1, 'Mahasiswa', '1 + 1 = ?', '2017-11-02', '10:00:00'),
(2, 'Mahasiswa', '5 - 2 = ?', '2017-11-02', '10:00:00'),
(3, 'Mahasiswa', '9 - 1 = ?', '2017-11-02', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `level`) VALUES
('admin', 'admin@defaultunj.com', 'admin', 1),
('peserta1', 'peserta1@gmail.com', '$2y$10$VfsvkSix1yGitdF1LyuPWeWzXmJdWZ2FhchXFVZVHW2WptOrFQDOu', 2),
('peserta2', 'peserta2@gmail.com', '$2y$10$gPFOVZzWwnSxI5CSSFe97Oj8ioleAMZp9KKMiHFl54OwDr6wlCNnW', 2),
('peserta3', 'peserta3@gmail.com', '$2y$10$x14TGMq/b5WQXd5t.DxJKO73Lgo/5W9x5iHiI7r9hFouOiXdsVui2', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IDadmin`),
  ADD KEY `users_admin_username` (`username`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`IDjawaban`),
  ADD KEY `IDsoal_jawaban_soal` (`IDsoal`),
  ADD KEY `IDparticipants_jawaban_Participants` (`IDparticipants`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`IDparticipants`),
  ADD KEY `users_participants_username` (`username`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`IDsoal`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `IDadmin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `IDjawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `IDparticipants` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `IDsoal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `users_admin_username` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `IDparticipants_jawaban_Participants` FOREIGN KEY (`IDparticipants`) REFERENCES `participants` (`IDparticipants`),
  ADD CONSTRAINT `IDsoal_jawaban_soal` FOREIGN KEY (`IDsoal`) REFERENCES `soal` (`IDsoal`);

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `users_participants_username` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
