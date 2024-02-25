-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2023 at 08:01 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_finansas`
--

-- --------------------------------------------------------

--
-- Table structure for table `bainaka`
--

CREATE TABLE IF NOT EXISTS `bainaka` (
  `id_bainaka` int(11) NOT NULL,
  `naran_bainaka` varchar(255) DEFAULT NULL,
  `imagen_baikana` varchar(500) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `data_rejistu` date DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `id_municipiu` int(11) DEFAULT NULL,
  `id_kompania` int(11) DEFAULT NULL,
  `id_tipu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bainaka`
--

INSERT INTO `bainaka` (`id_bainaka`, `naran_bainaka`, `imagen_baikana`, `sexo`, `data_rejistu`, `no_hp`, `id_municipiu`, `id_kompania`, `id_tipu`) VALUES
(1, 'fsf', 'img/1.jpg', 'f', '2023-09-08', '7676656', 3, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kompania`
--

CREATE TABLE IF NOT EXISTS `kompania` (
  `id_kompania` int(11) NOT NULL,
  `naran_kompania` varchar(255) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `obs` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kompania`
--

INSERT INTO `kompania` (`id_kompania`, `naran_kompania`, `adress`, `obs`) VALUES
(1, 'mdmdd', 'wrw', 'diak'),
(2, 'sfs', 'sfg', 'wr'),
(3, 'koko', 'koko', 'diak');

-- --------------------------------------------------------

--
-- Table structure for table `municipiu`
--

CREATE TABLE IF NOT EXISTS `municipiu` (
  `id_municipiu` int(11) NOT NULL,
  `naran_muncipiu` varchar(255) DEFAULT NULL,
  `obs` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `municipiu`
--

INSERT INTO `municipiu` (`id_municipiu`, `naran_muncipiu`, `obs`) VALUES
(3, '5r5r6', 'ygyg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id_tipo` int(11) NOT NULL,
  `naran_tipu` varchar(255) DEFAULT NULL,
  `asuntu` varchar(255) DEFAULT NULL,
  `obs` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `naran_tipu`, `asuntu`, `obs`) VALUES
(1, 'hhi', 'hjh', 'iii'),
(2, 'didas', 'das', ' dsf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bainaka`
--
ALTER TABLE `bainaka`
  ADD PRIMARY KEY (`id_bainaka`), ADD KEY `id_municipiu` (`id_municipiu`), ADD KEY `id_kompania` (`id_kompania`), ADD KEY `id_tipu` (`id_tipu`);

--
-- Indexes for table `kompania`
--
ALTER TABLE `kompania`
  ADD PRIMARY KEY (`id_kompania`);

--
-- Indexes for table `municipiu`
--
ALTER TABLE `municipiu`
  ADD PRIMARY KEY (`id_municipiu`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bainaka`
--
ALTER TABLE `bainaka`
ADD CONSTRAINT `bainaka_ibfk_1` FOREIGN KEY (`id_municipiu`) REFERENCES `municipiu` (`id_municipiu`),
ADD CONSTRAINT `bainaka_ibfk_2` FOREIGN KEY (`id_kompania`) REFERENCES `kompania` (`id_kompania`),
ADD CONSTRAINT `bainaka_ibfk_3` FOREIGN KEY (`id_tipu`) REFERENCES `tipo` (`id_tipo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
