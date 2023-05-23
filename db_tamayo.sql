-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 23, 2023 at 03:18 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tamayo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` int NOT NULL,
  `account_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `account_type`) VALUES
(1, 'admin', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(40, 'keemmee', 'inalyn@gmail.com', 'hello\r\n', '2023-05-23 15:10:12'),
(39, 'apapappa', 'reisheen02@gmail.com', 'sadsadsadsa', '2023-05-16 11:27:34'),
(38, 'dsadsasd', 'atheenakia0@gmail.com', 'sadsadsa', '2023-05-16 11:25:46'),
(37, 'Inalyn Kim Tamayo', 'dasd@gmail.com', 'sadasfas', '2023-05-16 11:08:01'),
(36, '', 'inalynkimtamayo@gmail.com', 'HELLLOOO', '2023-05-16 11:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `edited_texts`
--

DROP TABLE IF EXISTS `edited_texts`;
CREATE TABLE IF NOT EXISTS `edited_texts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section_id` int NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_highlights`
--

DROP TABLE IF EXISTS `photo_highlights`;
CREATE TABLE IF NOT EXISTS `photo_highlights` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `photo_highlights`
--

INSERT INTO `photo_highlights` (`id`, `filename`) VALUES
(14, 'icecream.jpg'),
(9, 'pic.jpg'),
(12, 'aa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `account_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `account_type`) VALUES
(1, 'user', 'user123', 'user'),
(14, '1dgtdsg', '$2y$10$KeHdQ66Gey7HemsnKNZcQ.Z/taDeEvhgrq0wCcm1d1TVxnN2Xrg16', ''),
(13, 'root', '', ''),
(15, 'admin', '$2y$10$n/xvyiSHlMvc8IlMzuQn9u7vDmQBlIYlPm1sCfdtx08KeDHgE9kku', ''),
(16, 'admin', '$2y$10$UBuzX0i3JIpcUpPlNQp6FuPhSbUiIqqVYx./sAJcPUIuJUGhQe/qK', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
