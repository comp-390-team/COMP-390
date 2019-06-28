-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 27, 2019 at 05:25 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PIG_FARM`
--

-- --------------------------------------------------------

--
-- Table structure for table `breeds`
--

CREATE TABLE `breeds` (
  `breed` varchar(30) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `breeds`
--

INSERT INTO `breeds` (`breed`, `date_added`) VALUES
('American white', '2019-06-11'),
('New Zealand blue', '2019-06-11'),
('Boers', '2019-06-12'),
('Kienyeji', '2019-06-14'),
('F', '2019-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `ID` varchar(10) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `s_name` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `phone_no` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`ID`, `f_name`, `s_name`, `address`, `phone_no`) VALUES
('0987', 'Dennis', 'Masesi', '768, Mayoe', '8u88888898989'),
('1', 'd', 'adada', '56, Avenue', '0798793248'),
('111111', 'Dennis', 'Masesi', '45, Avenue Gikomo', '8976000000'),
('12', 'Mousa Kiprangat', 'Waweru', '3434', '23rrwererwer'),
('121211', 'Mike ', 'Welsh', '67, thetaro', '0798793248'),
('1212121', '212`', '`2`2`', '`2`', 'qqeq133113'),
('12233232', '1', 'w121', 'qwqw', 'qwq'),
('123123', '12312321', '12312312', '1323123', '1312312'),
('12345', 'were', 'John', '234, mombasa', '123456789'),
('123456', 'Debra', 'Owiny', '45, lane 456, Mara', '0678945634'),
('12345678', 'Jack', 'Mliwa', '567, bunhlu', '+254789703123'),
('131131', '121313131', '21313131', '213131313', '31313131'),
('131232', '12312', '12312', '13123', '13123'),
('1w113', 'wwqwq', 'qwqw', 'q', '2312321'),
('2', 'Dsdada', 'ZSASaS', 'ASAS', 'ASASA'),
('233123112', '2312312', '123123', '2312', '123123'),
('23433', 'Dawe', 'Moraya', '45, Avenue', '13243564'),
('234567', 'Mikel', 'Arteta', '345, Round clock', '+254798546906'),
('33821021', 'Dan', 'mel', '45, Avenue', '123456712'),
('456778888', 'Biko', 'Arnold', '456, Keiyo', '23444242424'),
('5678', 'Mike ', 'Dean', '456, Nyabeta', '097690765'),
('adaSDA', 'daD', 'AXaDA', 'aDdaD', 'ASaDA'),
('qw', 'w12', '2312', '1231232', '13123'),
('sddasdad', 'rew43', 'q', 'ew', 'e');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `ID` varchar(20) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `s_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(13) NOT NULL,
  `job_tittle` varchar(100) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `passcode` varchar(60) DEFAULT NULL,
  `profile_picture` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ID`, `f_name`, `s_name`, `email`, `phone_no`, `job_tittle`, `nationality`, `passcode`, `profile_picture`) VALUES
('098765', 'Dean ', 'Ambrose', 'abro@gmail.com', '0987654399', 'Section attendant', 'Kenyan', '$2y$10$yru/nMYW8rBBAkSh4BlwQuYQGZM0E4L/QAqWYur/chmHu0wqT8./u', 'avatar.png'),
('2345678', 'Mike ', 'Asuswa', 'Asuswa@gmail.com', '0798798888', 'Section attendant', 'Kenyan', '$2y$10$9oHDnQArlwQYrxIpW1oPX.gJO3JFl9GizqxS.ocDOHk5V4yrnu3a6', '080127025416254643.jpg'),
('EU/1567/18', 'Ojwang', 'Opunda', 'dave@gmail.com', '0756789034', 'Section attendant', 'Kenyan', '$2y$10$c4lBEuL8aydjSee09CLUjuee/ya5gu905OIi18FrM0BXfnTrk7yKW', '521500U77865619811E.jpg'),
('EU/1567/19', 'Peter', 'Kiri', 'dau@gmail.com', '', 'Manager', 'Kenyan', '$2y$10$RNTFe2ZkVCqNeAzQjvRtZ.n6ArfoQIAWYbC3s8hMkQR6N0NCbYQem', '136E56870011153U670.jpg'),
('EU/1567/20', 'Musa ', 'Waweru', 'waweru@gmail.com', '', 'StoreKeeper', 'Kenyan', '$2y$10$dTciauUxOZyFfh2QYE8WdO809TBPyBJ4qBBUCBhGSDckx/uq0a1O2', '5096E52U28375100612.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE `feed` (
  `Name` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feed`
--

INSERT INTO `feed` (`Name`, `Quantity`, `date_added`, `type`) VALUES
('Whatever', 30, '2019-05-02', 'For piglets'),
('A', 22, '2019-06-21', 'aDDADASDAS');

-- --------------------------------------------------------

--
-- Table structure for table `feeds_used`
--

CREATE TABLE `feeds_used` (
  `Name` varchar(100) NOT NULL,
  `EmployeeID` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `datePicked` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feeds_used`
--

INSERT INTO `feeds_used` (`Name`, `EmployeeID`, `Quantity`, `datePicked`) VALUES
('A', 'EU/1567/20', 12, '2019-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `pigs`
--

CREATE TABLE `pigs` (
  `ID` varchar(30) NOT NULL,
  `Date_farrowed` date NOT NULL,
  `Breed` varchar(20) NOT NULL,
  `Weight` text NOT NULL,
  `Sex` varchar(1) NOT NULL,
  `sell_request` varchar(1) DEFAULT NULL,
  `sellStatus` varchar(2) DEFAULT NULL,
  `Weight_history` longtext,
  `mother` varchar(30) DEFAULT NULL,
  `deleteStatus` varchar(1) DEFAULT NULL,
  `deleteReason` text,
  `addedBy` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pigs`
--

INSERT INTO `pigs` (`ID`, `Date_farrowed`, `Breed`, `Weight`, `Sex`, `sell_request`, `sellStatus`, `Weight_history`, `mother`, `deleteStatus`, `deleteReason`, `addedBy`) VALUES
('1234', '2017-10-05', 'Boers', '34', 'M', 'Y', 'S', '2019-06-13=>33\r\n', '3456', 'N', NULL, NULL),
('12345454', '2019-05-01', 'Boers', '45', 'F', 'N', 'NR', '2019-05-01=>33,2019-06-1=>35,2019-06-05=>45,2019-06-8=>43,2019-06-11=>70,2019-06-13=>40,2019-06-15=>45', '3456', 'N', NULL, NULL),
('1313e', '2019-05-01', 'Boers', '150', 'M', 'Y', 'A', '2019-05-13=>100,2019-06-9=>90,2019-06-13=>150,2019-06-15=>150', NULL, 'N', NULL, NULL),
('13456', '2019-06-03', 'Sephire', '56', 'M', 'N', 'NR', '2019-06-13=>56', NULL, 'N', NULL, NULL),
('24242', '2019-05-01', 'Boers', '34', 'M', 'N', 'NR', '2019-06-13=>33', NULL, 'N', NULL, NULL),
('24hh', '2019-05-15', 'Boer', '34', 'F', 'Y', 'S', '2019-06-13=>33', NULL, 'N', NULL, NULL),
('6788', '2019-04-01', 'Kienyeji', '22', 'F', 'N', 'NR', '2019-06-15=>22', '', 'N', NULL, NULL),
('a', '2019-06-10', 'Boers', '33', 'M', 'N', 'NR', '2019-06-13=>33', NULL, 'D', 'Wrong entry', NULL),
('A345', '2017-05-01', 'Kienyeji', '67', 'F', 'N', 'NR', '2019-06-13=>33', NULL, 'N', NULL, NULL),
('E10245', '2015-05-01', 'Boers', '23', 'M', 'Y', 'S', '2019-06-13=>33', NULL, 'N', NULL, NULL),
('E1034', '2019-05-20', 'Boers', '33', 'M', 'N', 'NR', '2019-06-15=>33', '', 'N', NULL, NULL),
('E12367', '2017-12-01', 'Boers', '200', 'M', 'Y', 'A', '2019-06-13=>33', NULL, 'N', NULL, NULL),
('E34', '2019-05-01', 'Boers', '20', 'M', 'N', 'NR', '2019-06-13=>33', NULL, 'N', NULL, NULL),
('e3424', '2019-05-22', 'Boers', '23', 'M', 'N', 'NR', '2019-06-13=>33', NULL, 'N', NULL, NULL),
('E345', '2010-06-01', 'Boers', '33', 'M', 'N', 'NR', '2019-06-13=>33', NULL, 'N', NULL, NULL),
('E4454', '2019-05-15', 'Boers', '23', 'F', 'N', 'NR', '2019-06-13=>33', NULL, 'N', NULL, NULL),
('E4567', '2018-11-01', 'Kienyeji', '98', 'M', 'N', 'NR', '2019-06-15=>98', '11', 'N', NULL, NULL),
('E51234', '2019-06-05', 'Boers', '20', 'M', 'N', 'NR', '2019-06-13=>33', NULL, 'N', NULL, NULL),
('EU15734', '2019-04-01', 'Boers', '30', 'M', 'N', 'NR', '2019-06-13=>33', NULL, 'N', NULL, NULL),
('EU7890', '2018-05-15', 'Boaers', '20', 'M', 'Y', 'A', '2019-06-13=>33', NULL, 'N', NULL, NULL),
('Eve345', '2019-05-01', 'Kenyan', '12', 'F', 'N', 'NR', '2019-06-13=>33', NULL, 'N', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `Name` text NOT NULL,
  `fileName` text NOT NULL,
  `Date produced` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`Name`, `fileName`, `Date produced`) VALUES
('First report the year 2018/2019', 'First report the year 2018_2019.pdf', '2019-06-26'),
('First report the year 2019/2020', 'First report the year 2019_2020.pdf', '2019-06-26'),
('Third report the year 2019/2020', 'Third report the year 2019_2020.pdf', '2019-06-26'),
('General report to show the system performance this period of the year', 'General report to show the system performance this period of the year.pdf', '2019-06-26'),
('dddddddddddddddddddddddddd', 'dddddddddddddddddddddddddd.pdf', '2019-06-26'),
('Managers first report', 'Managers first report.pdf', '2019-06-26'),
('Third report producrd', 'Third report producrd.pdf', '2019-06-27'),
('First report for the day', 'First report for the day.pdf', '2019-06-27'),
('Generated by Kemboi', 'Generated by Kemboi.pdf', '2019-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `ID` varchar(30) NOT NULL,
  `date_sold` date NOT NULL,
  `customer_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`ID`, `date_sold`, `customer_id`) VALUES
('A345', '2019-06-09', '33821021'),
('1234', '2019-06-09', '33821021'),
('EU7890', '2019-06-09', '33821021'),
('24hh', '2019-06-10', '33821021'),
('1234', '2019-06-11', '33821021'),
('A345', '2019-06-11', '5678'),
('EU7890', '2019-06-11', '33821021'),
('E10245', '2019-06-11', '33821021'),
('E12367', '2019-06-11', '33821021'),
('1234', '2019-06-11', '33821021'),
('24hh', '2019-06-11', '33821021'),
('A345', '2019-06-11', '33821021'),
('E10245', '2019-06-14', '33821021'),
('New Zealand blue', '2019-06-27', ''),
('Boers', '2019-06-27', ''),
('Kienyeji', '2019-06-27', ''),
('New Zealand blue', '2019-06-27', ''),
('Boers', '2019-06-27', ''),
('Kienyeji', '2019-06-27', ''),
('New Zealand blue', '2019-06-27', ''),
('Kienyeji', '2019-06-27', ''),
('Boers', '2019-06-27', ''),
('New Zealand blue', '2019-06-27', ''),
('Boers', '2019-06-27', ''),
('Kienyeji', '2019-06-27', ''),
('New Zealand blue', '2019-06-27', ''),
('Boers', '2019-06-27', ''),
('Kienyeji', '2019-06-27', '');

-- --------------------------------------------------------

--
-- Table structure for table `sellAccepted`
--

CREATE TABLE `sellAccepted` (
  `ID` varchar(20) NOT NULL,
  `quoted_price` double NOT NULL,
  `date_approved` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellAccepted`
--

INSERT INTO `sellAccepted` (`ID`, `quoted_price`, `date_approved`) VALUES
('1234', 4000, '2019-06-05'),
('1313e', 4000, '2019-06-22'),
('24hh', 5000, '2019-06-09'),
('A345', 5000, '2019-06-08'),
('E10245', 5000, '2019-06-09'),
('E12367', 2000, '2019-05-19'),
('EU7890', 4000, '2019-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `sellRejected`
--

CREATE TABLE `sellRejected` (
  `ID` varchar(30) NOT NULL,
  `date_rejected` date NOT NULL,
  `remark` longtext NOT NULL,
  `rejection_status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellRejected`
--

INSERT INTO `sellRejected` (`ID`, `date_rejected`, `remark`, `rejection_status`) VALUES
('E12367', '2019-05-19', 'Too young we can keep it for the future', NULL),
('E10245', '2019-06-05', 'No sales this week', 'C'),
('A345', '2019-06-05', 'No sales this week', 'C'),
('E345', '2019-06-08', 'NOT SELLING THIS WEEK', 'C'),
('E345', '2019-06-12', 'I love this pig so much', 'C'),
('A345', '2019-06-24', 'nononnknk', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `sellSettings`
--

CREATE TABLE `sellSettings` (
  `min_age` date NOT NULL,
  `min_weight` double NOT NULL,
  `sex` varchar(3) NOT NULL,
  `breeds` text NOT NULL,
  `date_set` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellSettings`
--

INSERT INTO `sellSettings` (`min_age`, `min_weight`, `sex`, `breeds`, `date_set`) VALUES
('2018-05-01', 20, 'ALL', 'American white,New Zealand blue,Boers,Kienyeji', '2019-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `tools_picked`
--

CREATE TABLE `tools_picked` (
  `Name` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `EmployeeID` varchar(15) NOT NULL,
  `datePicked` date NOT NULL,
  `dateReturned` date NOT NULL,
  `return_status` varchar(2) DEFAULT NULL,
  `remark` text,
  `timePicked` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools_picked`
--

INSERT INTO `tools_picked` (`Name`, `Quantity`, `EmployeeID`, `datePicked`, `dateReturned`, `return_status`, `remark`, `timePicked`) VALUES
('1233', 3, 'EU/1567/20', '2019-06-21', '2019-06-22', NULL, 'Good condition', NULL),
('1233', 5, 'EU/1567/20', '2019-06-21', '2019-06-22', NULL, 'Good condition', NULL),
('1233', 33, 'EU/1567/20', '2019-06-21', '2019-06-22', NULL, 'Good condition', NULL),
('1233', 33, 'EU/1567/20', '2019-06-21', '2019-06-22', NULL, 'Good condition', NULL),
('1233', 33, 'EU/1567/20', '2019-06-21', '2019-06-22', NULL, 'Good condition', NULL),
('1233', 33, 'EU/1567/20', '2019-06-21', '2019-06-22', NULL, 'Good condition', NULL),
('1233', 33, 'EU/1567/20', '2019-06-21', '2019-06-22', NULL, 'Good condition', NULL),
('1233', 33, 'EU/1567/20', '2019-06-21', '2019-06-22', NULL, 'Good condition', NULL),
('1233', 33, 'EU/1567/20', '2019-06-21', '2019-06-22', NULL, 'Good condition', NULL),
('1233', 33, 'EU/1567/20', '2019-06-21', '2019-06-22', NULL, 'Good condition', NULL),
('1233', 33, 'EU/1567/20', '2019-06-21', '2019-06-22', NULL, 'Good condition', NULL),
('1233', 33, 'EU/1567/20', '2019-06-21', '2019-06-22', NULL, 'Good condition', NULL),
('1233', 3, 'EU/1567/20', '2019-06-22', '2019-06-22', 'R', 'Returned in good condition', NULL),
('1233', 3, 'EU/1567/20', '2019-06-22', '2019-06-22', 'R', 'Returned in good condition', NULL),
('1233', 3, 'EU/1567/20', '2019-06-22', '2019-06-22', 'R', 'Returned in good condition', NULL),
('1233', 3, 'EU/1567/20', '2019-06-22', '2019-06-22', 'R', 'Returned in good condition', NULL),
('1233', 6, 'EU/1567/20', '2019-06-22', '0000-00-00', 'U', NULL, '1561196488'),
('A', 33, 'EU/1567/20', '2019-06-27', '0000-00-00', 'U', NULL, '1561648785');

-- --------------------------------------------------------

--
-- Table structure for table `toos`
--

CREATE TABLE `toos` (
  `Name` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toos`
--

INSERT INTO `toos` (`Name`, `Quantity`, `date_added`, `Description`) VALUES
('Jembe', 12, '2019-06-20', 'Used  bought at 1200/='),
('1233', 30, '2019-06-20', '333'),
('Je', 33, '2019-06-21', 'Bought yesterday');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pigs`
--
ALTER TABLE `pigs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sellAccepted`
--
ALTER TABLE `sellAccepted`
  ADD PRIMARY KEY (`ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sellAccepted`
--
ALTER TABLE `sellAccepted`
  ADD CONSTRAINT `fk_ID` FOREIGN KEY (`ID`) REFERENCES `pigs` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
