-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2024 at 07:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` bigint(20) NOT NULL,
  `seat_id` varchar(255) NOT NULL,
  `bus_id` varchar(255) NOT NULL,
  `is_taken` tinyint(1) NOT NULL DEFAULT 0,
  `is_booked` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `seat_id`, `bus_id`, `is_taken`, `is_booked`) VALUES
(1, 'A1', 'bus-A', 0, 0),
(2, 'A2', 'bus-A', 0, 0),
(3, 'A3', 'bus-A', 0, 0),
(4, 'A4', 'bus-A', 0, 0),
(5, 'B1', 'bus-A', 0, 0),
(6, 'B2', 'bus-A', 0, 0),
(7, 'B3', 'bus-A', 0, 0),
(8, 'B4', 'bus-A', 0, 0),
(9, 'C1', 'bus-A', 0, 0),
(10, 'C2', 'bus-A', 0, 0),
(11, 'C3', 'bus-A', 0, 0),
(12, 'C4', 'bus-A', 0, 0),
(13, 'D1', 'bus-A', 0, 0),
(14, 'D2', 'bus-A', 0, 0),
(15, 'D3', 'bus-A', 0, 0),
(16, 'D4', 'bus-A', 0, 0),
(17, 'E1', 'bus-A', 0, 0),
(18, 'E2', 'bus-A', 0, 0),
(19, 'E3', 'bus-A', 0, 0),
(20, 'E4', 'bus-A', 0, 0),
(21, 'F1', 'bus-A', 0, 0),
(22, 'F2', 'bus-A', 0, 0),
(23, 'F3', 'bus-A', 0, 0),
(24, 'F4', 'bus-A', 0, 0),
(25, 'H1', 'bus-A', 0, 0),
(26, 'H2', 'bus-A', 0, 0),
(27, 'H3', 'bus-A', 0, 0),
(28, 'H4', 'bus-A', 0, 0),
(29, 'I1', 'bus-A', 0, 0),
(30, 'I2', 'bus-A', 0, 0),
(31, '13', 'bus-A', 0, 0),
(32, 'I4', 'bus-A', 0, 0),
(33, 'J1', 'bus-A', 0, 0),
(34, 'J2', 'bus-A', 0, 0),
(35, 'J3', 'bus-A', 0, 0),
(36, 'J4', 'bus-A', 0, 0),
(37, 'K1', 'bus-A', 0, 0),
(38, 'K2', 'bus-A', 0, 0),
(39, 'K3', 'bus-A', 0, 0),
(40, 'K4', 'bus-A', 0, 0),
(41, 'L1', 'bus-A', 0, 0),
(42, 'L2', 'bus-A', 0, 0),
(43, 'L3', 'bus-A', 0, 0),
(44, 'L4', 'bus-A', 0, 0),
(45, 'M1', 'bus-A', 0, 0),
(46, 'M2', 'bus-A', 0, 0),
(47, 'M3', 'bus-A', 0, 0),
(48, 'M4', 'bus-A', 0, 0),
(49, 'N1', 'bus-A', 0, 0),
(50, 'N2', 'bus-A', 0, 0),
(51, 'N3', 'bus-A', 0, 0),
(52, 'N4', 'bus-A', 0, 0),
(53, 'N5', 'bus-A', 0, 0),
(54, 'A1', 'bus-B', 0, 0),
(55, 'A2', 'bus-B', 0, 0),
(56, 'A3', 'bus-B', 0, 0),
(57, 'A4', 'bus-B', 0, 0),
(58, 'B1', 'bus-B', 0, 0),
(59, 'B2', 'bus-B', 0, 0),
(60, 'B3', 'bus-B', 0, 0),
(61, 'B4', 'bus-B', 0, 0),
(62, 'C1', 'bus-B', 0, 0),
(63, 'C2', 'bus-B', 0, 0),
(64, 'C3', 'bus-B', 0, 0),
(65, 'C4', 'bus-B', 0, 0),
(66, 'D1', 'bus-B', 0, 0),
(67, 'D2', 'bus-B', 0, 0),
(68, 'D3', 'bus-B', 0, 0),
(69, 'D4', 'bus-B', 0, 0),
(70, 'E1', 'bus-B', 0, 0),
(71, 'E2', 'bus-B', 0, 0),
(72, 'E3', 'bus-B', 0, 0),
(73, 'E4', 'bus-B', 0, 0),
(74, 'F1', 'bus-B', 0, 0),
(75, 'F2', 'bus-B', 0, 0),
(76, 'F3', 'bus-B', 0, 0),
(77, 'F4', 'bus-B', 0, 0),
(78, 'G1', 'bus-B', 0, 0),
(79, 'G2', 'bus-B', 0, 0),
(80, 'G3', 'bus-B', 0, 0),
(81, 'G4', 'bus-B', 0, 0),
(82, 'H1', 'bus-B', 0, 0),
(83, 'H2', 'bus-B', 0, 0),
(84, 'H3', 'bus-B', 0, 0),
(85, 'H4', 'bus-B', 0, 0),
(86, 'I1', 'bus-B', 0, 0),
(87, 'I2', 'bus-B', 0, 0),
(88, 'I3', 'bus-B', 0, 0),
(89, 'I4', 'bus-B', 0, 0),
(90, 'J1', 'bus-B', 0, 0),
(100, 'J2', 'bus-B', 0, 0),
(101, 'J3', 'bus-B', 0, 0),
(102, 'J4', 'bus-B', 0, 0),
(103, 'K1', 'bus-B', 0, 0),
(104, 'K2', 'bus-B', 0, 0),
(105, 'K3', 'bus-B', 0, 0),
(106, 'K4', 'bus-B', 0, 0),
(107, 'L1', 'bus-B', 0, 0),
(108, 'L2', 'bus-B', 0, 0),
(109, 'L3', 'bus-B', 0, 0),
(110, 'L4', 'bus-B', 0, 0),
(111, 'M1', 'bus-B', 0, 0),
(112, 'M2', 'bus-B', 0, 0),
(113, 'M3', 'bus-B', 0, 0),
(114, 'M4', 'bus-B', 0, 0),
(115, 'N1', 'bus-B', 0, 0),
(116, 'N2', 'bus-B', 0, 0),
(117, 'N3', 'bus-B', 0, 0),
(118, 'N4', 'bus-B', 0, 0),
(119, 'N5', 'bus-B', 0, 0),
(120, 'G1', 'bus-A', 0, 0),
(121, 'G2', 'bus-A', 0, 0),
(122, 'G3', 'bus-A', 0, 0),
(123, 'G4', 'bus-A', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
