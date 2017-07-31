-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2017 at 09:12 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gso_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `bincard_issued_record`
--

CREATE TABLE IF NOT EXISTS `bincard_issued_record` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ItemSetID` varchar(25) NOT NULL,
  `itemCode` varchar(25) NOT NULL,
  `bin_ID` int(11) NOT NULL,
  `recpnt` varchar(50) NOT NULL,
  `issued_date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `bincard_issued_record`
--

INSERT INTO `bincard_issued_record` (`ID`, `ItemSetID`, `itemCode`, `bin_ID`, `recpnt`, `issued_date`, `qty`, `DateAdded`) VALUES
(24, 'SP-24', 'SET SP-24', 16, 'omar', '2017-07-21', 5, '2017-07-19 01:17:53'),
(25, 'SP-25', 'SET SP-25', 16, 'darren', '2017-07-08', 4, '2017-07-19 01:18:13'),
(26, 'SP-26', 'SET SP-26', 16, 'franz', '2017-07-08', 1, '2017-07-19 02:21:28'),
(31, 'SP-31', 'SET SP-31', 17, 'asd', '2017-07-14', 3, '2017-07-22 07:02:37'),
(32, 'SP-32', 'SET SP-32', 18, 'HERO', '2017-07-07', 20, '2017-07-22 07:48:30'),
(33, 'SP-33', 'SET SP-33', 19, 'FRANZ', '2017-07-01', 500, '2017-07-22 07:49:29'),
(34, 'SP-34', 'SET SP-34', 19, 'AUBREY', '2017-07-21', 50, '2017-07-22 07:49:42'),
(35, 'SP-35', 'SET SP-35', 20, 'mark1hqfegwubhdijdskml;f,b.sfboiuldfjzgnmcviadfkhu', '2017-07-15', 50, '2017-07-25 06:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `bincard_record`
--

CREATE TABLE IF NOT EXISTS `bincard_record` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `bin_Date` date NOT NULL,
  `Supplier` varchar(100) NOT NULL,
  `Descrp` varchar(250) NOT NULL,
  `Qty` varchar(10) NOT NULL,
  `Issued` int(10) NOT NULL,
  `Balance` float NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PoNo` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `bincard_record`
--

INSERT INTO `bincard_record` (`ID`, `bin_Date`, `Supplier`, `Descrp`, `Qty`, `Issued`, `Balance`, `DateAdded`, `PoNo`) VALUES
(16, '2017-07-31', 'OMAR ', 'PC', '40', 10, 30, '2017-07-31 05:02:59', '3213'),
(17, '2017-07-08', 'Ian', 'Mark', '50', 3, 47, '2017-07-31 05:05:07', 'xc'),
(18, '2017-07-08', 'FRANZ', 'ASO', '50', 20, 30, '2017-07-22 07:48:56', ''),
(19, '2017-07-13', 'PAPA', 'ISDA', '1500', 550, 950, '2017-07-22 07:49:56', ''),
(20, '2017-07-15', 'uyhjyuhjnoyhlunjm123123123123', 'iuhjwnsdcuoihjnmsdfuchvhjndsmfxcvhuljsdfngxclhkjn', '123', 50, 73, '2017-07-25 06:12:30', ''),
(21, '2017-07-12', 'qewregrdhgfnhdn', 'qwerwgfdbgfvb', '213454', 0, 213454, '2017-07-26 07:34:05', ''),
(22, '0056-05-04', 'Ian kun', 'gago', '1000000000', 0, 1000000000, '2017-07-31 05:06:41', '1553');

-- --------------------------------------------------------

--
-- Table structure for table `emp_accountability_card`
--

CREATE TABLE IF NOT EXISTS `emp_accountability_card` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_ID` int(11) NOT NULL,
  `ItemSetID` varchar(25) NOT NULL,
  `itemCode` varchar(25) NOT NULL,
  `ParNo` varchar(50) NOT NULL,
  `Qty` int(10) NOT NULL,
  `Unit` varchar(50) NOT NULL,
  `Descrp` varchar(150) NOT NULL,
  `SN` varchar(50) NOT NULL,
  `PropNo` varchar(50) NOT NULL,
  `Amount` float NOT NULL,
  `TransferTo` varchar(100) NOT NULL,
  `Remarks` varchar(200) NOT NULL,
  `DateTurnOver` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `emp_accountability_card`
--

INSERT INTO `emp_accountability_card` (`ID`, `Emp_ID`, `ItemSetID`, `itemCode`, `ParNo`, `Qty`, `Unit`, `Descrp`, `SN`, `PropNo`, `Amount`, `TransferTo`, `Remarks`, `DateTurnOver`) VALUES
(35, 7, 'SP-35', 'SET SP-35', 'N-123-17', 1, ' unit', 'tablet', 'cnu521563', '00117', 7499, 'charlotte jean', '', '2017-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `emp_accounts_record`
--

CREATE TABLE IF NOT EXISTS `emp_accounts_record` (
  `accID` int(11) NOT NULL AUTO_INCREMENT,
  `accLevel` varchar(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullName` varchar(25) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(25) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Pos` varchar(25) NOT NULL,
  `Mobile` varchar(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`accID`),
  UNIQUE KEY `User` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `emp_accounts_record`
--

INSERT INTO `emp_accounts_record` (`accID`, `accLevel`, `username`, `password`, `fullName`, `Age`, `Gender`, `Address`, `Email`, `Pos`, `Mobile`, `image`) VALUES
(1, '1', 'employee', 'employee', 'mark', 20, 'Unknown', 'Mars', 'marcalien@gmail.com', 'staff', '09169158798', 'img/emp_profile/temp.jpg'),
(10, '0', 'asasdkld', '321', 'iouqou', 0, 'khakdhk', 'hhhhh', 'oiuoiu@yahoo.com', 'kkjh', '0904545454', 'img/emp_profile/temp.jpg'),
(14, '1', 'iou', '555', 'franz1', 50, 'male', 'Blk 38 Lot 11 Phase 2b Brgy Aguado TMC', 'jalksjd@yahoo.com', 'jklasdjd', '0915611894', 'img/emp_profile/temp.jpg'),
(15, '2', 'bincard', 'bincard', 'tryyyyyyyyyyyyyyyyyyyyy', 50, '9', '9', '987@aksd.com', '9', '0905454984', 'img/emp_profile/temp.jpg'),
(18, '1', 'darren321', '321', 'OMAR DAUD', 15, 'Male', 'NAIC', '321@yahoo.com', '155', '0906545644', 'img/emp_profile/temp.jpg'),
(19, '1', 'rd2h1fs8jk2b6cz', 'yth3xk5slz8bd', 'Omar', 20, 'Male', 'Bucal 3-B, Maragondon, Cavite', 'Omardaud21000@gmail.com', '.....', '09355173381', 'img/emp_profile/temp.jpg'),
(21, '0', 'admin', 'admin', 'Rhalp Darren Cabrera', 20, 'Male', 'Blk 38 Lot 11 Ph2b Southville2 Trece Martirez City', 'rhalpdarrencabrera@gmail.com', 'ADMIN', '09169158798', 'img/emp_profile/temp.jpg'),
(22, '0', 'Keita210000', 'darkdemon12', 'Omar', 2147483647, 'Male', 'Bucal 3-B, Maragondon, Cavite', 'omardaud2100000@gmail.com', 'oiadskniqwijooqihweihoqwe', '09355173381', 'img/emp_profile/temp.jpg'),
(23, '0', 'Keita1200', 'darkdemon12', 'Omar Raouf A. Daud', 20, 'Male', 'bucal 3b maragondon cavite', 'Omardaud21000@gmail.com', 'Kahit ano', '09363398243', 'img/emp_profile/temp.jpg'),
(24, '3', 'ac', 'ac', 'Accountability', 21, 'Male', 'Bucal 3-B Maragondon, Cavite', 'omardaud2100@gmail.com', 'Administrative', '06321351', 'img/emp_profile/temp.jpg'),
(25, '4', 'icsprspar', 'a', 'icsprspar', 0, 'Male', 'icsprspar', 'icsprspar@gmail.com', 'asd', '09096545184', 'img/emp_profile/temp.jpg'),
(26, '0', 'Godz', '123456789', 'God ', 100, 'Female', 'kaytambog ', 'god@gmail.com', 'God', '123', 'img/emp_profile/temp.jpg'),
(27, '0', 'asa', 'asa', 'asa', 21, 'Male', 'asa', 'asdasd@yahoo.com', 'as', '9090', 'img/emp_profile/maletmp.png');

-- --------------------------------------------------------

--
-- Table structure for table `emp_pgc_record`
--

CREATE TABLE IF NOT EXISTS `emp_pgc_record` (
  `accID` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(150) NOT NULL,
  `office` varchar(50) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `note` varchar(50) NOT NULL,
  PRIMARY KEY (`accID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `emp_pgc_record`
--

INSERT INTO `emp_pgc_record` (`accID`, `fullName`, `office`, `designation`, `note`) VALUES
(7, 'Analie B. Rodil', 'GSO', 'Administrative Officer V', '');

-- --------------------------------------------------------

--
-- Table structure for table `inspec_report_of_unserviceable_prop.`
--

CREATE TABLE IF NOT EXISTS `inspec_report_of_unserviceable_prop.` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_dictionary`
--

CREATE TABLE IF NOT EXISTS `inventory_dictionary` (
  `Invent_ID` int(11) NOT NULL AUTO_INCREMENT,
  `AC_COA_Cir_04-08` varchar(25) NOT NULL,
  `AC_COA_Cir_015-09` varchar(25) NOT NULL,
  `AC_Name(Old)` varchar(100) NOT NULL,
  `AC_name(New)` varchar(100) NOT NULL,
  PRIMARY KEY (`Invent_ID`),
  UNIQUE KEY `AC_COA_Cir_04-08` (`AC_COA_Cir_04-08`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `inventory_dictionary`
--

INSERT INTO `inventory_dictionary` (`Invent_ID`, `AC_COA_Cir_04-08`, `AC_COA_Cir_015-09`, `AC_Name(Old)`, `AC_name(New)`) VALUES
(-1, '201', '1-07-01-010', 'Land', 'Land'),
(1, '202', '1-07-02-010', 'Land Improvements', 'Land Improvements, Aquaculture Structures'),
(2, '0', '1-07-02-990', '', 'Other Land Improvements'),
(3, '211', '1-07-04-010', 'Office Buildings', 'Buildings'),
(5, '212', '1-07-04-020', 'School Buildings', 'School Buildings'),
(6, '213', '1-07-04-030', 'Hospital & Health Centers', 'Hospital & Health Centers'),
(7, '215', '1-07-04-990', 'Other Structures', 'Other Structures'),
(8, '221', '1-07-05-020', 'Office Equipment', 'Office Equipment'),
(9, '222', '1-07-07-010', 'Furniture & Fixtures', 'Furniture & Fixtures'),
(10, '223', '1-07-05-030', 'IT Equipment & Software', 'Information & Communication Technology Equipment'),
(11, '224', '1-07-07-020', 'Library Books', 'Books'),
(12, '226', '1-07-05-010', 'Machinery', 'Machinery'),
(13, '227', '1-07-05-040', 'Agricultural, Fishery & Forestry Equipment', 'Agricultural & Forestry Equipment'),
(14, '229', '1-07-05-070', 'Communication Equipment', 'Communication Equipment'),
(15, '230', '1-07-05-080', 'Construction & Heavy Equipment', 'Construction & Heavy Equipment'),
(16, '231', '1-07-05-090', 'Disaster Response & Rescue Equipment', 'Disaster Response & Rescue Equipment'),
(17, '231-1 ', '1-07-05-090', 'Firefighting Equipment & Accessories', 'Disaster Response & Rescue Equipment'),
(18, '231-2', '1-07-05-090', 'Flood Rescue Equipment', 'Disaster Response & Rescue Equipment'),
(19, '231-3', '1-07-05-090', 'Earthquake Rescue Equipment', 'Disaster Response & Rescue Equipment'),
(20, '231-4', '1-07-05-090', 'Volcanic Eruption Rescue Equipment', 'Disaster Response & Rescue Equipment'),
(21, '231-5', '1-07-05-090', 'Landslide Rescue Equipment', 'Disaster Response & Rescue Equipment'),
(22, '232', '1-07-05-110', 'Hospital Equipment', 'Medical Equipment'),
(23, '233', '', 'Medical, Dental & Laboratory Equipment', ''),
(24, '234', '1-07-05-100', 'Military & Police Equipment', 'Military, Police & Security Equipment'),
(25, '235', '1-07-05-130', 'Sports Equipment', 'Sports Equipment'),
(26, '236', '1-07-05-140', 'Technical & Scientific Equipment', 'Technical & Scientific Equipment'),
(27, '240', '1-07-05-990', 'Other Machinery & Equipment', 'Other Machinery & Equipment'),
(28, '241', '1-07-06-010', 'Motor Vehicles', 'Motor Vehicles'),
(29, '244', '1-07-06-040', 'Watercrafts', 'Watercrafts'),
(30, '250', '1-07-99-990', 'Other Property, Plant & Equipment', 'Other Property, Plant & Equipment'),
(41, '266', '1-07-10-020', 'Conts. In Progress- Roads, Highways & Bridges', 'Construction in Progress- Infrastructure Assets'),
(42, '267', '1-07-10-020', 'Conts. In Progress- Park, Plazas & Monuments', 'Construction in Progress- Infrastructure Assets'),
(43, '269', '1-07-10-020', 'Conts. In Progress- Artesian Wells, Pumping Stations', 'Construction in Progress- Infrastructure Assets'),
(44, '270', '1-07-10-020', 'Conts. In Progress- Irrigation, Canals & Laterals', 'Construction in Progress- Infrastructure Assets'),
(45, '271', '1-07-10-020', 'Conts. In Progress- Flood Controls', 'Construction in Progress- Infrastructure Assets'),
(46, '272', '1-07-10-020', 'Conts. In Progress- Waterways, Seawalls & Others', 'Construction in Progress- Infrastructure Assets'),
(47, '273', '1-07-10-020', 'Conts. In Progress- Other Public Infrastructures', 'Construction in Progress- Infrastructure Assets');

-- --------------------------------------------------------

--
-- Table structure for table `invent_222_1_07_07_010_furniture_fixtures`
--

CREATE TABLE IF NOT EXISTS `invent_222_1_07_07_010_furniture_fixtures` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `accCode` varchar(50) NOT NULL,
  `ParNo` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Unit` varchar(100) NOT NULL,
  `Descrp` varchar(250) NOT NULL,
  `UnitCost` int(11) NOT NULL,
  `TotalCost` int(11) NOT NULL,
  `PropNo` varchar(50) NOT NULL,
  `AccPerson` varchar(200) NOT NULL,
  `Designation_office` varchar(100) NOT NULL,
  `dateRelease` date NOT NULL,
  `Supplier` varchar(150) NOT NULL,
  `Remarks` varchar(150) NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `invent_222_1_07_07_010_furniture_fixtures`
--

INSERT INTO `invent_222_1_07_07_010_furniture_fixtures` (`ID`, `accCode`, `ParNo`, `Qty`, `Unit`, `Descrp`, `UnitCost`, `TotalCost`, `PropNo`, `AccPerson`, `Designation_office`, `dateRelease`, `Supplier`, `Remarks`, `DateAdded`) VALUES
(1, '0', 123131, 0, '', '', 0, 0, '', '', '', '0000-00-00', '', '', '2017-07-27 01:32:24'),
(2, '', 0, 0, '', '', 0, 0, '', '', '', '0000-00-00', '', '', '2017-07-27 01:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `invent_custodian_slip`
--

CREATE TABLE IF NOT EXISTS `invent_custodian_slip` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Qty` int(11) NOT NULL,
  `Unit` varchar(50) NOT NULL,
  `Descrp` varchar(250) NOT NULL,
  `Invent_Item_No` varchar(50) NOT NULL,
  `Ez_Useful_Life` varchar(50) NOT NULL,
  `ReceivedBy_Name` varchar(50) NOT NULL,
  `ReceivedBy_Position` varchar(50) NOT NULL,
  `ReceiveBy_Date` date NOT NULL,
  `ReceivedFrom_Name` varchar(50) NOT NULL,
  `ReceivedFrom_Position` varchar(50) NOT NULL,
  `ReceiveFrom_Date` date NOT NULL,
  `ICS` int(11) NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `invent_custodian_slip`
--

INSERT INTO `invent_custodian_slip` (`ID`, `Qty`, `Unit`, `Descrp`, `Invent_Item_No`, `Ez_Useful_Life`, `ReceivedBy_Name`, `ReceivedBy_Position`, `ReceiveBy_Date`, `ReceivedFrom_Name`, `ReceivedFrom_Position`, `ReceiveFrom_Date`, `ICS`, `DateAdded`) VALUES
(4, 30, 'unit', 'Bagong Tabas', 's2x52', '2', 'MARK', 'EMPLOYEE', '2017-07-20', 'RHALP DARREN CABRERA', 'ADMIN', '2017-07-09', 2131561, '2017-07-21 02:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `invent_custodian_slip_descrp`
--

CREATE TABLE IF NOT EXISTS `invent_custodian_slip_descrp` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `icsID` int(11) NOT NULL,
  `Descrp` varchar(50) NOT NULL,
  `Invent_Item_No` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `invent_custodian_slip_descrp`
--

INSERT INTO `invent_custodian_slip_descrp` (`ID`, `icsID`, `Descrp`, `Invent_Item_No`) VALUES
(9, 1, 'Engine No: QR20730030A', ' '),
(10, 1, '123123123', ''),
(13, 5, '123456uiykujrqewrty', 'uyq2wetryt2t341'),
(14, 5, '1234rweqwe', 'qweqwrqwrqwrqwr'),
(15, 5, '1234rweqwe', 'qweqwrqwrqwrqwr');

-- --------------------------------------------------------

--
-- Table structure for table `office_dictionary`
--

CREATE TABLE IF NOT EXISTS `office_dictionary` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `officeName` varchar(50) NOT NULL,
  `officeCode` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `officeName` (`officeName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `office_dictionary`
--

INSERT INTO `office_dictionary` (`ID`, `officeName`, `officeCode`) VALUES
(6, 'ACCOUNTING', 'ACCTG'),
(7, 'ADMINISTRATOR', 'ADMIN'),
(8, 'AGRICULTURE', 'AGRI'),
(9, 'ASSESSOR', 'PAO'),
(10, 'BUDGET', 'PBO'),
(11, 'TREASURER', 'PTO'),
(12, 'CAVITE OFFICE OF PUBLIC SAFETY', 'COPS'),
(13, 'PROVINCIAL PROTECTION OFFICE', 'PPO'),
(14, 'ROAD SAFETY DIVISION', 'RSD'),
(15, 'ENVIRONMENTAL PROTECTION OPERATION DIVISION', 'EPOD'),
(16, 'PROVINCIAL DISASTER AND RISK REDUCTION MANAGEMENT ', 'PDRRMO'),
(17, 'PROVINCIAL HOUSING AND DEVELOPMENT MANAGEMENT OFFI', 'PHDMO'),
(18, 'HUMAN RESOURCE MANAGEMENT OFFICE', 'HRMO'),
(19, 'JAIL', 'JAIL'),
(20, 'LEGAL', 'LEGAL'),
(21, 'LIBRARY', 'LIBRARY'),
(22, 'PUBLIC EMPLOYMENT SERVICES OFFICE', 'PESO'),
(23, 'PROVINCIAL INFORMATION AND COMMUNICATION AFFAIRS D', 'PICAD'),
(24, 'PROSECUTOR', 'PROSECUTOR'),
(25, 'URBAN POOR', 'UPAO'),
(26, 'GEN. EMILIO AGUINALDO MEMORIAL HOSPITAL', 'GEAMH'),
(27, 'KOREA-PHILIPPINES FRIENDSHIP PROJECT', 'KPFP'),
(28, 'BACOOR DISTRICT HOSPITAL', 'BDH'),
(29, 'CAVITE MUNICIPAL HOSTIPAL', 'CMH'),
(30, 'DR. OLIVIA SALAMANCA MEMORIAL HOSPITAL', 'DOSMH'),
(31, 'CARMONA SILANG GMA', 'CARSIGMA'),
(32, 'KAWIT KALAYAAN HOSPITAL', 'KKH'),
(33, 'NAIC MEDICARE', 'NM'),
(34, 'PROVINCIAL ENGINEER OFFICE', 'PEO'),
(35, 'PROVINCIAL GOVERNMENT AND NATURAL RESOURCES OFFICE', 'PG-ENRO'),
(36, 'BOARD MEMBER', 'BM'),
(37, 'SANGGUNIAN PANGLALAWIGAN OF CAVITE', 'SPC'),
(38, 'OFFICE OF THE PROVINCIAL GOVERNOR', 'OPG'),
(39, 'OFFICE OF THE PROVINCIAL OF VICE GOVERNOR', 'OPVG'),
(40, 'VETERINARIAN ', 'VET'),
(41, 'GENERAL SERVICES OFFICE', 'GSO'),
(42, 'PROVINCIAL COOPERATIVE LIVELIHOOD AND ENTREPRENEUR', 'PCLEDO'),
(43, 'PROVINCIAL INFORMATION AND COMMUNICATION TECHNOLOG', 'PICTO'),
(44, 'PLANNING', 'PPDO'),
(45, 'POPCOM', 'POPCOM'),
(46, 'PSWDO', 'PSWDO'),
(47, 'TOURISM', 'TOURISM'),
(48, 'PROVINCIAL YOUTH AND SPORTS DEVELOPMENT OFFICE', 'PYSDO'),
(49, 'CAVITE CENTER FOR MENTAL HEALTH', 'CCMH'),
(50, 'CAVITE QUALITY MANAGEMENT OFFICE', 'CQMO'),
(51, 'COMMISSION ON AUDIT', 'COA'),
(52, 'PHILIPPINE NATIONAL POLICE', 'PNP'),
(53, 'REGIONAL TRIAL COURT', 'RTC'),
(54, 'MUNICIPAL TRIAL COURT', 'MTC');

-- --------------------------------------------------------

--
-- Table structure for table `property_accountability_receipt_record`
--

CREATE TABLE IF NOT EXISTS `property_accountability_receipt_record` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Qty` int(10) NOT NULL,
  `Unit` varchar(25) NOT NULL,
  `Descrp` varchar(150) NOT NULL,
  `PropNo` varchar(25) NOT NULL,
  `ReceivedFrom_Name` varchar(50) NOT NULL,
  `ReceivedFrom_Position` varchar(50) NOT NULL,
  `ReceivedFrom_Date` date NOT NULL,
  `ReceivedBy_Name` varchar(50) NOT NULL,
  `ReceivedBy_Position` varchar(50) NOT NULL,
  `ReceivedBy_Date` date NOT NULL,
  `PAR` varchar(12) NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `property_accountability_receipt_record`
--

INSERT INTO `property_accountability_receipt_record` (`ID`, `Qty`, `Unit`, `Descrp`, `PropNo`, `ReceivedFrom_Name`, `ReceivedFrom_Position`, `ReceivedFrom_Date`, `ReceivedBy_Name`, `ReceivedBy_Position`, `ReceivedBy_Date`, `PAR`, `DateAdded`) VALUES
(1, 2, 'pc', 'dasd', 'PropNo', 'RECFROm', 'asdasdasd', '2017-06-14', 'RECBY', 'asdasdasd', '2017-06-14', 'PAR 1', '2017-07-26 07:58:33'),
(10, 1, 'asda', 'asdas', '', 'dsada', 'dasdasd', '2017-07-05', 'receivebyname', 'asdasd', '2017-07-05', '12312', '2017-07-31 06:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `property_return_slip_record`
--

CREATE TABLE IF NOT EXISTS `property_return_slip_record` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LGU_Name` varchar(250) NOT NULL,
  `PurposeID` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Unit` varchar(25) NOT NULL,
  `Descrp` varchar(200) NOT NULL,
  `Serial_Num` varchar(50) NOT NULL,
  `Prop_Number` varchar(50) NOT NULL,
  `ParNo` varchar(50) NOT NULL,
  `Name_of_Enduser` varchar(50) NOT NULL,
  `Unit_Value` int(50) NOT NULL,
  `Total_Value` int(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `ReceiveBy_Name` varchar(50) NOT NULL,
  `ReceiveBy_Position` varchar(50) NOT NULL,
  `ReceiveBy_Date` date NOT NULL,
  `ReceiveFrom_Name` varchar(50) NOT NULL,
  `ReceiveFrom_Position` varchar(50) NOT NULL,
  `ReceiveFrom_Date` date NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `prs_purpose_dictionary` (`PurposeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `property_return_slip_record`
--

INSERT INTO `property_return_slip_record` (`ID`, `LGU_Name`, `PurposeID`, `Qty`, `Unit`, `Descrp`, `Serial_Num`, `Prop_Number`, `ParNo`, `Name_of_Enduser`, `Unit_Value`, `Total_Value`, `Status`, `ReceiveBy_Name`, `ReceiveBy_Position`, `ReceiveBy_Date`, `ReceiveFrom_Name`, `ReceiveFrom_Position`, `ReceiveFrom_Date`, `DateAdded`) VALUES
(1, 'Lumil NHS, Silang', 2, 1, 'unit', 'Lenovo Tab-A7-30 Mld. Lenovo A3300-GV', 'SN-HGC7VGW7', 'd213', 'T-192-15', 'Lucia M. Diesta', 0, 7095, 'Unserviceable', 'xcv', 'wadasd', '2017-07-19', 'sddasd', 'xcxvcx', '2017-07-19', '2017-07-19 06:26:34'),
(21, 'XWWWWWWWWWWWWWW ', 3, 1, 'unit', 'asdasD', '2ADAWD', 'DAWD', 'ASDASD', 'AWD', 2313, 123, 'Unserviceable', 'asdASD', 'asdaSD', '2017-07-07', 'asd', 'asdASD', '2017-07-13', '2017-07-22 10:49:59'),
(22, 'asd ', 3, 21, 'unit', 'asd', 'zxczc', 'zxczxczxc', 'asd3124', 'cfdsf', 2344324, 4234, 'Unserviceable', 'sdfawe', 'qweqwe', '2017-07-03', 'adsad', 'adawd', '2017-07-14', '2017-07-22 10:50:02'),
(25, 'qerghjfjcbxcf ', 1, 1235436, 'unit', 'hgfgvjhkfkdjshfg', '2345435yyetury', '22435435y657', '23q43w5yer6jtkuyiuoi', 'etrdyfukigjlkh', 345678798, 2147483647, 'Unserviceable', 'wyrdtfuygkjhm', 'wetrsdfhgjhkhjj', '2017-07-17', '2017-07-17', 'dsfghkjhkjgkfuyr', '2017-07-07', '2017-07-26 07:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `prs_purpose_dictionary`
--

CREATE TABLE IF NOT EXISTS `prs_purpose_dictionary` (
  `ID` int(10) NOT NULL,
  `Purpose_Type` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prs_purpose_dictionary`
--

INSERT INTO `prs_purpose_dictionary` (`ID`, `Purpose_Type`) VALUES
(1, 'Disposal'),
(2, 'Repair'),
(3, 'Return to Stock'),
(4, 'For Repair'),
(5, 'Others');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `property_return_slip_record`
--
ALTER TABLE `property_return_slip_record`
  ADD CONSTRAINT `prs_purpose_dictionary` FOREIGN KEY (`PurposeID`) REFERENCES `prs_purpose_dictionary` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
