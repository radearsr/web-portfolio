-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 03:31 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_project`
--

CREATE TABLE `data_project` (
  `id_project` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `id_link_download` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_project`
--

INSERT INTO `data_project` (`id_project`, `judul`, `deskripsi`, `gambar`, `tanggal`, `id_link_download`) VALUES
(4, 'asdf', 'asdf', '609864eb663e4.jpg', '2021-05-10', 13);

-- --------------------------------------------------------

--
-- Table structure for table `link_download`
--

CREATE TABLE `link_download` (
  `id_download` int(11) NOT NULL,
  `download_link` text NOT NULL,
  `github_link` text NOT NULL,
  `skema_link` text NOT NULL,
  `only_code` text DEFAULT NULL,
  `only_app` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `link_download`
--

INSERT INTO `link_download` (`id_download`, `download_link`, `github_link`, `skema_link`, `only_code`, `only_app`) VALUES
(11, 'https://www.google.com', 'https://www.google.com', 'https://www.google.com', NULL, NULL),
(12, 'https://www.google.com', 'https://www.google.com', 'https://www.google.com', NULL, NULL),
(13, 'https://www.google.com', 'https://www.google.com', 'https://www.google.com', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_project`
--
ALTER TABLE `data_project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `id_link_download` (`id_link_download`);

--
-- Indexes for table `link_download`
--
ALTER TABLE `link_download`
  ADD PRIMARY KEY (`id_download`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_project`
--
ALTER TABLE `data_project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `link_download`
--
ALTER TABLE `link_download`
  MODIFY `id_download` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_project`
--
ALTER TABLE `data_project`
  ADD CONSTRAINT `data_project_ibfk_1` FOREIGN KEY (`id_link_download`) REFERENCES `link_download` (`id_download`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
