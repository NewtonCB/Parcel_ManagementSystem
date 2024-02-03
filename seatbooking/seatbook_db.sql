-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 03, 2024 at 12:55 PM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seatbook_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `session_id` bigint(20) NOT NULL,
  `seat_id` varchar(16) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`session_id`,`seat_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`session_id`, `seat_id`, `user_id`) VALUES
(1, 'A1', 999),
(1, 'A2', 999);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

DROP TABLE IF EXISTS `seats`;
CREATE TABLE IF NOT EXISTS `seats` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `seat_id` varchar(255) NOT NULL,
  `room_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `seat_id`, `room_id`) VALUES
(1, 'A1', 'ROOM-A'),
(2, 'A2', 'ROOM-A'),
(3, 'A3', 'ROOM-A'),
(4, 'A4', 'ROOM-A'),
(5, 'B1', 'ROOM-A'),
(6, 'B2', 'ROOM-A'),
(7, 'B3', 'ROOM-A'),
(8, 'B4', 'ROOM-A'),
(9, 'C1', 'ROOM-A'),
(10, 'C2', 'ROOM-A'),
(11, 'C3', 'ROOM-A'),
(12, 'C4', 'ROOM-A'),
(13, 'D1', 'ROOM-A'),
(14, 'D2', 'ROOM-A'),
(15, 'D3', 'ROOM-A'),
(16, 'D4', 'ROOM-A'),
(17, 'E1', 'ROOM-A'),
(18, 'E2', 'ROOM-A'),
(19, 'E3', 'ROOM-A'),
(20, 'E4', 'ROOM-A'),
(21, 'F1', 'ROOM-A'),
(22, 'F2', 'ROOM-A'),
(23, 'F3', 'ROOM-A'),
(24, 'F4', 'ROOM-A'),
(25, 'H1', 'ROOM-A'),
(26, 'H2', 'ROOM-A'),
(27, 'H3', 'ROOM-A'),
(28, 'H4', 'ROOM-A'),
(29, 'I1', 'ROOM-A'),
(30, 'I2', 'ROOM-A'),
(31, 'I3', 'ROOM-A'),
(32, 'I4', 'ROOM-A'),
(33, 'J1', 'ROOM-A'),
(34, 'J2', 'ROOM-A'),
(35, 'J3', 'ROOM-A'),
(36, 'J4', 'ROOM-A'),
(37, 'K1', 'ROOM-A'),
(38, 'K2', 'ROOM-A'),
(39, 'K3', 'ROOM-A'),
(40, 'K4', 'ROOM-A'),
(41, 'L1', 'ROOM-A'),
(42, 'L2', 'ROOM-A'),
(43, 'L3', 'ROOM-A'),
(44, 'L4', 'ROOM-A'),
(45, 'M1', 'ROOM-A'),
(46, 'M2', 'ROOM-A'),
(47, 'M3', 'ROOM-A'),
(48, 'M4', 'ROOM-A'),
(49, 'N1', 'ROOM-A'),
(50, 'N2', 'ROOM-A'),
(51, 'N3', 'ROOM-A'),
(52, 'N4', 'ROOM-A'),
(53, 'P1', 'ROOM-A'),
(54, 'P2', 'ROOM-A'),
(55, 'P3', 'ROOM-A'),
(56, 'P4', 'ROOM-A'),
(57, 'Q1', 'ROOM-A'),
(58, 'Q2', 'ROOM-A'),
(59, 'Q3', 'ROOM-A'),
(60, 'Q4', 'ROOM-A');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `room_id` varchar(16) NOT NULL,
  `session_date` datetime NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `room_id` (`room_id`),
  KEY `session_date` (`session_date`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `room_id`, `session_date`) VALUES
(1, 'ROOM-A', '2077-06-05 08:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
