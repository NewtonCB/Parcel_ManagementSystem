-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 24, 2024 at 11:04 AM
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
-- Database: `cmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(50) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `MobileNumber` varchar(16) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(3, 'Nashon Israel', 'Shon', '+255712803740', 'israelnashon90@gmail.com', 'e9c6da636905409f77a439078a6649cf', '2023-12-19 03:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblbranch`
--

DROP TABLE IF EXISTS `tblbranch`;
CREATE TABLE IF NOT EXISTS `tblbranch` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BranchName` varchar(120) DEFAULT NULL,
  `BranchContactnumber` bigint(11) DEFAULT NULL,
  `BranchEmail` varchar(120) DEFAULT NULL,
  `BranchAddress` varchar(120) DEFAULT NULL,
  `BranchCity` varchar(120) DEFAULT NULL,
  `BranchState` varchar(120) DEFAULT NULL,
  `BranchPincode` varchar(120) DEFAULT NULL,
  `BranchCountry` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `BranchName` (`BranchName`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbranch`
--

INSERT INTO `tblbranch` (`ID`, `BranchName`, `BranchContactnumber`, `BranchEmail`, `BranchAddress`, `BranchCity`, `BranchState`, `BranchPincode`, `BranchCountry`, `PostingDate`) VALUES
(15, 'Dar es salaam Branch', 255679956215, 'info@mkombeparcel.com', 'Shekilango Ubungo Busines Park, Ubungo Dar es salaam', 'Dar es salaam', '', '', 'Tanzania', '2023-12-22 12:50:33'),
(16, 'Johannesburg Branch', 227604749717, 'info@mkombeparcel.com', 'Johannesburg,143-Pritchard', 'Johannesburg', '', '', 'SouthAfrica', '2023-12-22 12:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplains`
--

DROP TABLE IF EXISTS `tblcomplains`;
CREATE TABLE IF NOT EXISTS `tblcomplains` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `TicketNumber` int(10) DEFAULT NULL,
  `TrackingNumber` varchar(120) DEFAULT NULL,
  `NatureofComplain` varchar(200) DEFAULT NULL,
  `IssuesDesc` mediumtext,
  `CompDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(50) DEFAULT NULL,
  `Remark` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `TrackingNumber` (`TrackingNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomplains`
--

INSERT INTO `tblcomplains` (`ID`, `TicketNumber`, `TrackingNumber`, `NatureofComplain`, `IssuesDesc`, `CompDate`, `Status`, `Remark`, `UpdationDate`) VALUES
(1, 977131, '884766920', 'Test Complaint', 'This is for testing.', '2021-09-26 08:06:12', 'Closed', 'Issue Resolved', '2021-09-26 08:10:45'),
(2, 289982, '809274137', 'PAckage Not recevied', 'I have not received my package yet.', '2021-09-27 16:20:31', 'Closed', 'Package deliver to customer succesffuly', '2021-09-27 16:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

DROP TABLE IF EXISTS `tblcontact`;
CREATE TABLE IF NOT EXISTS `tblcontact` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext,
  `MsgDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsRead` int(5) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `Name`, `MobileNumber`, `Email`, `Message`, `MsgDate`, `IsRead`) VALUES
(1, 'Rahul Singh', 9879879797, 'rahul@gmail.com', 'Send price list of courier', '2021-05-07 18:30:00', 1),
(2, 'Anuj', 1234567890, 'ak@gahgha.com', 'This is for testing.', '2021-09-27 16:22:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcourier`
--

DROP TABLE IF EXISTS `tblcourier`;
CREATE TABLE IF NOT EXISTS `tblcourier` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `RefNumber` varchar(120) DEFAULT NULL,
  `SenderBranch` varchar(120) DEFAULT NULL,
  `SenderName` varchar(120) DEFAULT NULL,
  `SenderContactnumber` varchar(255) DEFAULT NULL,
  `SenderCity` varchar(120) DEFAULT NULL,
  `SenderPincode` varchar(120) DEFAULT NULL,
  `SenderCountry` varchar(120) DEFAULT NULL,
  `RecipientName` varchar(120) DEFAULT NULL,
  `RecipientContactnumber` varchar(255) DEFAULT NULL,
  `RecipientCity` varchar(120) DEFAULT NULL,
  `RecipientPincode` varchar(120) DEFAULT NULL,
  `RecipientCountry` varchar(120) DEFAULT NULL,
  `CourierDes` varchar(250) DEFAULT NULL,
  `ParcelWeight` varchar(120) DEFAULT NULL,
  `TZSprice` decimal(50,0) DEFAULT NULL,
  `ZARprice` decimal(50,0) DEFAULT NULL,
  `Status` varchar(124) DEFAULT NULL,
  `CourierDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `branchname` (`SenderBranch`),
  KEY `RefNumber` (`RefNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcourier`
--

INSERT INTO `tblcourier` (`ID`, `RefNumber`, `SenderBranch`, `SenderName`, `SenderContactnumber`, `SenderCity`, `SenderPincode`, `SenderCountry`, `RecipientName`, `RecipientContactnumber`, `RecipientCity`, `RecipientPincode`, `RecipientCountry`, `CourierDes`, `ParcelWeight`, `TZSprice`, `ZARprice`, `Status`, `CourierDate`) VALUES
(1, '8749', 'Dar es salaam Branch', 'Nashon Israel', '25712803740', 'Dar es salaam', 'mb003', 'Tanzania', 'Deogratias Kulwa', '2274567689', 'JohanessBug', 'mb003', 'SouthAfrica', 'bad', '15kg', '10000', '1300', '0', '2024-01-20 17:23:13'),
(2, '1094', 'Dar es salaam Branch', 'MIchael William Denis', '+255712803745', 'Dar es salaam', 'mb003', 'Tanzania', 'Deogratias Kulwa', '+2274567689', 'JohanessBug', 'mb003', 'SouthAfrica', 'Heavy Bulky', '10kg', '40000', '286', 'Transported', '2024-01-20 17:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `tblcouriertracking`
--

DROP TABLE IF EXISTS `tblcouriertracking`;
CREATE TABLE IF NOT EXISTS `tblcouriertracking` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CourierId` int(11) DEFAULT NULL,
  `remark` mediumtext,
  `status` varchar(255) DEFAULT NULL,
  `StatusDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `refrenceid` (`CourierId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcouriertracking`
--

INSERT INTO `tblcouriertracking` (`ID`, `CourierId`, `remark`, `status`, `StatusDate`) VALUES
(1, 2, ' Courier Shipped', 'Shipped', '2021-03-30 18:30:00'),
(2, 2, ' ipo njian', 'Transported', '2024-01-20 18:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

DROP TABLE IF EXISTS `tblpage`;
CREATE TABLE IF NOT EXISTS `tblpage` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext,
  `PageDescription` mediumtext,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(3, 'contactus', 'Contact', '<ul><li>    <b><u>DAR ES SALAAM OFFICE:</u></b> SHEKILANGO UBUNGO BUSSINESS PARK, Call(+255679959215)</li><li>&nbsp;<b><u>JOHANNESBURG OFFICE:</u></b> 143 - PRITCHARD STREET, Call(+227604749717, +255 688 768 194)</li></ul>', 'info@mkombeparcel.com', '+255679959215/+227688768194', '2023-12-22 12:45:01'),
(4, 'aboutus', 'About', 'Our bus schedule indicates that we <b>depart once a week</b>. Our bus is <b>luxurious</b>, featuring <b>comfortable reclining seats</b>, an <b>onboard toilet</b>, <b>free Wi-Fi</b>, and <b>full air conditioning</b>. Additionally, we provide transportation services for parcels and cargo from <b>Tanzania to South Africa</b>, as well as from <b>South Africa to Tanzania</b>', 'info@mkombeparcel.com', '+255679959215/+227688768194', '2023-12-22 12:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

DROP TABLE IF EXISTS `tblstaff`;
CREATE TABLE IF NOT EXISTS `tblstaff` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `BranchName` varchar(120) DEFAULT NULL,
  `StaffName` varchar(120) DEFAULT NULL,
  `StaffMobilenumber` varchar(16) DEFAULT NULL,
  `StaffEmail` varchar(120) DEFAULT NULL,
  `StaffPassword` varchar(120) DEFAULT NULL,
  `StaffRegdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `branchid` (`BranchName`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstaff`
--

INSERT INTO `tblstaff` (`ID`, `BranchName`, `StaffName`, `StaffMobilenumber`, `StaffEmail`, `StaffPassword`, `StaffRegdate`, `status`) VALUES
(10, 'Dar es salaam Branch', 'Muddy', '+2556789556', 'info@mkombe.com', '827ccb0eea8a706c4c34a16891f84e7b', '2023-12-19 11:48:23', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcomplains`
--
ALTER TABLE `tblcomplains`
  ADD CONSTRAINT `refnoid` FOREIGN KEY (`TrackingNumber`) REFERENCES `tblcourier` (`RefNumber`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblcourier`
--
ALTER TABLE `tblcourier`
  ADD CONSTRAINT `branchname` FOREIGN KEY (`SenderBranch`) REFERENCES `tblbranch` (`BranchName`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblcouriertracking`
--
ALTER TABLE `tblcouriertracking`
  ADD CONSTRAINT `refrenceid` FOREIGN KEY (`CourierId`) REFERENCES `tblcourier` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD CONSTRAINT `branchid` FOREIGN KEY (`BranchName`) REFERENCES `tblbranch` (`BranchName`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
