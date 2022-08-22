-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 05:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `showcase`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id_author` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `angkatan` varchar(11) NOT NULL,
  `programStudi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id_author`, `npm`, `nama`, `angkatan`, `programStudi`) VALUES
(1, 2117051066, 'muzaki', '2021', 'Ilmu Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `judul` varchar(70) NOT NULL,
  `projectThumbnail` varchar(100) NOT NULL,
  `projectVideo` varchar(100) NOT NULL,
  `githubUrl` varchar(70) NOT NULL,
  `projectDescription` text NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `judul`, `projectThumbnail`, `projectVideo`, `githubUrl`, `projectDescription`, `author`) VALUES
(3, 'aplikasi djaya', 'img/djaya.png', 'https://www.youtube.com/embed/hVKwS9x8Nn4', 'https://github.com/faizmuzaki/showcase', 'Pagination is the process of separating print or digital content into discrete pages. For print documents and some online content, pagination also refers to the automated process of adding consecutive numbers to identify the sequential order of pages.', 1),
(4, 'testtt', 'img/djaya.png', 'https://www.youtube.com/embed/hVKwS9x8Nn4', 'github.com', 'test', 1),
(5, 'testtt', 'img/djaya.png', 'https://www.youtube.com/embed/hVKwS9x8Nn4', 'github.com', 'test', 1),
(6, 'testtt', 'img/djaya.png', 'https://www.youtube.com/embed/hVKwS9x8Nn4', 'github.com', 'test', 1),
(7, 'testtt', 'img/djaya.png', 'https://www.youtube.com/embed/hVKwS9x8Nn4', 'github.com', 'test', 1),
(8, 'testtt', 'img/djaya.png', 'https://www.youtube.com/embed/hVKwS9x8Nn4', 'github.com', 'test', 1),
(9, 'testtt', 'img/djaya.png', 'https://www.youtube.com/embed/hVKwS9x8Nn4', 'github.com', 'test', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id_author`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id_author` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`author`) REFERENCES `author` (`id_author`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
