-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 01, 2023 at 01:11 PM
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
-- Database: `zenulovic`
--

-- --------------------------------------------------------

--
-- Table structure for table `kontakti`
--

CREATE TABLE `kontakti` (
  `soba` varchar(50) NOT NULL,
  `imeprezime` varchar(255) NOT NULL,
  `tel` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kontakti`
--

INSERT INTO `kontakti` (`soba`, `imeprezime`, `tel`, `ID`) VALUES
('Panorama', 'test', 0, 1),
('Crazy Time', 'test', 1232312, 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_views`
--

CREATE TABLE `page_views` (
  `room_name` text NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_views`
--

INSERT INTO `page_views` (`room_name`, `views`) VALUES
('dahlia', 2),
('summer', 2),
('crazy_time', 1),
('panorama', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pitanja`
--

CREATE TABLE `pitanja` (
  `ime` text NOT NULL,
  `email` text NOT NULL,
  `dodInfo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pitanja`
--

INSERT INTO `pitanja` (`ime`, `email`, `dodInfo`) VALUES
('dwajawj', 'jwdajdjajdwa@ga', 'wdajjawdjdwaj'),
('Ado', 'test@gmail.com', 'Kako ste?');

-- --------------------------------------------------------

--
-- Table structure for table `posete_soba`
--

CREATE TABLE `posete_soba` (
  `id` int(11) NOT NULL,
  `ime_stranice` varchar(255) NOT NULL,
  `vreme_posete` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posete_soba`
--

INSERT INTO `posete_soba` (`id`, `ime_stranice`, `vreme_posete`) VALUES
(1, 'dahlia', '2023-09-08 20:42:26'),
(38, 'dahlia', '2023-09-01 12:34:56'),
(39, 'panorama', '2023-09-02 14:34:16'),
(40, 'crazy_time', '2023-09-02 08:24:33'),
(41, 'summer', '2023-09-03 19:14:55'),
(42, 'dahlia', '2023-09-03 11:22:30'),
(43, 'panorama', '2023-09-04 07:15:42'),
(44, 'crazy_time', '2023-09-04 22:18:59'),
(45, 'summer', '2023-09-05 13:07:21'),
(46, 'dahlia', '2023-09-05 05:06:12'),
(47, 'panorama', '2023-09-06 03:54:17'),
(48, 'crazy_time', '2023-09-06 20:32:19'),
(49, 'summer', '2023-09-07 16:23:58'),
(50, 'dahlia', '2023-09-07 09:18:46'),
(51, 'panorama', '2023-09-08 04:32:10'),
(52, 'crazy_time', '2023-09-08 21:45:37'),
(58, 'panorama', '2023-09-08 21:31:24'),
(59, 'panorama', '2023-09-08 21:31:32'),
(60, 'panorama', '2023-09-08 21:31:40'),
(61, 'panorama', '2023-09-08 21:32:05'),
(62, 'panorama', '2023-09-08 21:32:16'),
(63, 'panorama', '2023-09-08 21:33:20'),
(64, 'panorama', '2023-09-08 21:33:27'),
(65, 'panorama', '2023-09-08 21:34:14'),
(66, 'panorama', '2023-09-08 21:34:16'),
(67, 'panorama', '2023-09-08 21:34:18'),
(68, 'panorama', '2023-09-08 21:35:22'),
(69, 'dahlia', '2023-09-08 21:37:32'),
(70, 'crazy_time', '2023-09-08 21:42:31'),
(71, 'crazy_time', '2023-09-10 21:42:42'),
(72, 'crazy_time', '2023-09-09 11:02:28'),
(73, 'crazy_time', '2023-09-09 12:59:14'),
(74, 'dahlia', '2023-09-09 12:59:23'),
(75, 'panorama', '2023-09-09 13:52:17'),
(76, 'dahlia', '2023-09-09 13:52:31'),
(77, 'panorama', '2023-09-09 14:08:53'),
(78, 'summer', '2023-09-09 14:36:24'),
(79, 'summer', '2023-09-09 14:36:30'),
(80, 'summer', '2023-09-09 14:36:33'),
(81, 'crazy_time', '2023-09-11 15:07:41'),
(82, 'dahlia', '2023-09-11 18:06:48'),
(83, 'dahlia', '2023-09-11 18:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `raspolozivost`
--

CREATE TABLE `raspolozivost` (
  `model_choose` text NOT NULL,
  `adresa` text NOT NULL,
  `brTel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `raspolozivost`
--

INSERT INTO `raspolozivost` (`model_choose`, `adresa`, `brTel`) VALUES
('Dahlia', 'wdadwa', 312312321),
('Dahlia', 'Adnan Zenulovic', 60123456),
('Crazy Time', 'DWADWA', 1231231),
('Panorama', 'Adnan Zenulovic', 120312301);

-- --------------------------------------------------------

--
-- Table structure for table `registrovani`
--

CREATE TABLE `registrovani` (
  `ID` int(11) NOT NULL,
  `ime` varchar(255) DEFAULT NULL,
  `prezime` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `vrsta` varchar(2) DEFAULT NULL,
  `pol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `registrovani`
--

INSERT INTO `registrovani` (`ID`, `ime`, `prezime`, `username`, `email`, `password`, `vrsta`, `pol`) VALUES
(1, 'Ado', 'Zenulovic', 'ado', 'ado@gmail.com', 'doa', 'AD', 'M'),
(3, 'Marko', 'Milic', 'marko', 'marko@gmail.com', 'marko', 'KO', 'M'),
(4, 'Marija', 'Spanovic', 'marija', 'marija@gmail.com', 'marija', 'KO', 'Z'),
(5, 'Tanja', 'Perovic', 'tanja', 'tanja@gmail.com', 'tanja', 'KO', 'Z'),
(10, 'fwada', 'jdwajdjwaj', 'wdjajdwajaw', 'djwajd@gmail.com', 'dawdwadwawd', 'KO', 'Z');

-- --------------------------------------------------------

--
-- Table structure for table `room_clicks`
--

CREATE TABLE `room_clicks` (
  `id` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `click_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `room` text NOT NULL,
  `broj` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`room`, `broj`) VALUES
('dada', 'dada'),
('dada', 'dada'),
('dada', 'dada'),
('dahlia', 'dahlia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posete_soba`
--
ALTER TABLE `posete_soba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrovani`
--
ALTER TABLE `registrovani`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `room_clicks`
--
ALTER TABLE `room_clicks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posete_soba`
--
ALTER TABLE `posete_soba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `registrovani`
--
ALTER TABLE `registrovani`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `room_clicks`
--
ALTER TABLE `room_clicks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
