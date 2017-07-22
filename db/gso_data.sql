-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2017 at 10:27 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `bincard_issued_record`
--

INSERT INTO `bincard_issued_record` (`ID`, `ItemSetID`, `itemCode`, `bin_ID`, `recpnt`, `issued_date`, `qty`, `DateAdded`) VALUES
(24, 'SP-24', 'SET SP-24', 16, 'omar', '2017-07-21', 5, '2017-07-19 01:17:53'),
(25, 'SP-25', 'SET SP-25', 16, 'darren', '2017-07-08', 4, '2017-07-19 01:18:13'),
(26, 'SP-26', 'SET SP-26', 16, 'franz', '2017-07-08', 1, '2017-07-19 02:21:28');

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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `bincard_record`
--

INSERT INTO `bincard_record` (`ID`, `bin_Date`, `Supplier`, `Descrp`, `Qty`, `Issued`, `Balance`, `DateAdded`) VALUES
(16, '2017-07-14', '21351', 'laptop', '30', 10, 20, '2017-07-19 02:53:59');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `emp_accountability_card`
--

INSERT INTO `emp_accountability_card` (`ID`, `Emp_ID`, `ItemSetID`, `itemCode`, `ParNo`, `Qty`, `Unit`, `Descrp`, `SN`, `PropNo`, `Amount`, `TransferTo`, `Remarks`, `DateTurnOver`) VALUES
(1, 1, 'SP-01', 'SET SP-01', 'T-457-16', 1, 'unit', 'SET1', '1 SN. MMLYKS01623C12311', '1995', 800, '', '', '0000-00-00'),
(2, 1, 'SP-02', 'PART SP-01', 'T-457-16', 0, 'unit', 'Calculator HL-102 10 digits', '1 SN. MMLYKS01623C12311', 'OT-09-98', 0, '', '', '0000-00-00'),
(4, 1, 'SP-04', 'SET SP-04', 'T-457-16', 0, 'unit', 'Calculator HL-104 10 digits', '1 SN. MMLYKS01623C12311', 'OT-09-98', 3.40282e38, '', '', '2010-10-30'),
(5, 1, 'SP-05', 'PART SP-04', 'T-457-16', 0, 'unit', 'Calculator HL-105 10 digits', '1 SN. MMLYKS01623C12311', 'OT-09-98', 3.40282e38, '', '', '2010-10-30'),
(6, 1, 'SP-06', 'PART SP-04', 'T-457-16', 0, 'unit', 'Calculator HL-106 10 digits', '1 SN. MMLYKS01623C12311', 'OT-09-98', 0, 'null', '', '0000-00-00'),
(7, 1, 'SP-07', 'PART SP-04', 'T-457-16', 0, 'unit', 'Plate No. SCB-830', '1 SN. MMLYKS01623C12311', 'OT-09-98', 0, 'null', '', '0000-00-00'),
(8, 1, 'SP-08', 'SET SP-08', 'T-457-16', 0, 'unit', 'Plate No. SCB-831', '1 SN. MMLYKS01623C12311', 'OT-09-98', 321, 'null', '', '0000-00-00'),
(9, 1, 'SP-09', 'SET SP-09', 'T-457-16', 0, 'unit', 'Plate No. SCB-831', '1 SN. MMLYKS01623C12311', 'OT-09-98', 0, 'null', '', '0000-00-00'),
(10, 1, 'SP-10', 'SET SP-10', 'T-457-16', 0, 'unit', 'Plate No. SCB-833', '1 SN. MMLYKS01623C12311', 'OT-09-98', 0, 'null', '', '0000-00-00'),
(11, 1, 'SP-11', 'SET SP-11', 'T-457-16', 52, 'unit', 'SET2', '1 SN. MMLYKS01623C12311', 'OT-09-98', 0, 'null', '', '0058-02-28'),
(12, 1, 'SP-12', 'PART SP-11', 'T3', 0, 'unit', 'Plate No. SCB-835', '1 SN. MMLYKS01623C12311', 'OT-09-98', 0, 'null', '33333333333', '0000-00-00'),
(13, 23, 'SP-13', 'SET SP-13', 'T-457-16', 1, 'unit', 'Plate No. SCB-836', '1 SN. MMLYKS01623C12311', 'OT-09-98', 0, 'null', '', '0000-00-00'),
(15, 1, 'SP-15', 'SET SP-15', 'T-457-16', 1, 'unit', 'Calculator HL-107 10 digits', '1 SN. MMLYKS01623C12311', 'OT-09-98', 0, 'Adoracion Mojica', 'Formerly to Adoracion Mojica', '0000-00-00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `emp_accounts_record`
--

INSERT INTO `emp_accounts_record` (`accID`, `accLevel`, `username`, `password`, `fullName`, `Age`, `Gender`, `Address`, `Email`, `Pos`, `Mobile`, `image`) VALUES
(0, '0', 'admin', 'Tzabaoth10', 'Rhalp Darren Cabrera', 20, 'male', 'Blk 38 Lot 11 Phase 2b Brgy Aguado TMC', '555@yahoo.com', '55', '0965489844', 'img/emp_profile/temp.jpg'),
(1, '1', 'employee', 'employee', 'mark', 20, 'Unknown', 'Mars', 'marcalien@gmail.com', 'staff', '09169158798', 'img/emp_profile/temp.jpg'),
(10, '0', 'asasdkld', '321', 'iouqou', 0, 'khakdhk', 'hhhhh', 'oiuoiu@yahoo.com', 'kkjh', '0904545454', 'img/emp_profile/temp.jpg'),
(14, '1', 'iou', '555', 'franz1', 50, 'male', 'Blk 38 Lot 11 Phase 2b Brgy Aguado TMC', 'jalksjd@yahoo.com', 'jklasdjd', '0915611894', 'img/emp_profile/temp.jpg'),
(15, '1', '9999', '9', 'tryyyyyyyyyyyyyyyyyyyyy', 50, '9', '9', '987@aksd.com', '9', '0905454984', 'img/emp_profile/temp.jpg'),
(18, '1', 'darren321', '321', 'OMAR DAUD', 15, 'Male', 'NAIC', '321@yahoo.com', '155', '0906545644', 'img/emp_profile/temp.jpg'),
(19, '1', 'rd2h1fs8jk2b6cz', 'yth3xk5slz8bd', 'Omar', 20, 'Male', 'Bucal 3-B, Maragondon, Cavite', 'Omardaud21000@gmail.com', '.....', '09355173381', 'img/emp_profile/temp.jpg'),
(21, '0', 'Asada', '555', 'Franz Marc Cabrera', 50, 'Male', 'Blk 38 Lot 11 Ph2b Southville2 Trece Martirez City', 'franzmarccabrera123@gmail.com', 'ADMIN', '0915151613', 'img/emp_profile/temp.jpg'),
(22, '0', 'Keita210000', 'darkdemon12', 'Omar', 2147483647, 'Male', 'Bucal 3-B, Maragondon, Cavite', 'omardaud2100000@gmail.com', 'oiadskniqwijooqihweihoqwe', '09355173381', 'img/emp_profile/temp.jpg'),
(23, '0', 'Keita1200', 'darkdemon12', 'Omar Raouf A. Daud', 20, 'Male', 'bucal 3b maragondon cavite', 'Omardaud21000@gmail.com', 'Kahit ano', '09363398243', 'img/emp_profile/temp.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `emp_pgc_record`
--

INSERT INTO `emp_pgc_record` (`accID`, `fullName`, `office`, `designation`, `note`) VALUES
(1, 'Rhalp Darren R. Cabrera ', 'IT DEP', 'IT DEP', '');

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
-- Table structure for table `invent_241-1-07-06-010_motor_vehicles`
--

CREATE TABLE IF NOT EXISTS `invent_241-1-07-06-010_motor_vehicles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `No` int(11) NOT NULL,
  `Type_of_Vehicle_Make` varchar(300) NOT NULL,
  `PlateNo` varchar(50) NOT NULL,
  `Acquisition_Date` date NOT NULL,
  `Acquisition_Cost` int(11) NOT NULL,
  `Office` varchar(150) NOT NULL,
  `Accountable_Person` varchar(150) NOT NULL,
  `Status_Condition_Worthiness` varchar(150) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `invent_241-1-07-06-010_motor_vehicles`
--

INSERT INTO `invent_241-1-07-06-010_motor_vehicles` (`ID`, `No`, `Type_of_Vehicle_Make`, `PlateNo`, `Acquisition_Date`, `Acquisition_Cost`, `Office`, `Accountable_Person`, `Status_Condition_Worthiness`) VALUES
(1, 123131, 'HONDA', 'a5s5w9', '2017-06-15', 15199999, 'GSO', 'Rhalp', 'GOOD99999999999999999');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `invent_custodian_slip`
--

INSERT INTO `invent_custodian_slip` (`ID`, `Qty`, `Unit`, `Descrp`, `Invent_Item_No`, `Ez_Useful_Life`, `ReceivedBy_Name`, `ReceivedBy_Position`, `ReceiveBy_Date`, `ReceivedFrom_Name`, `ReceivedFrom_Position`, `ReceiveFrom_Date`, `ICS`, `DateAdded`) VALUES
(1, 2, 'unit', 'KOTCHENG KUBA', '213', '2', 'RHALP DARREN R. CABRERA', 'ADMIN', '2017-07-05', 'ENGR. ENRICO M. ALVAREZ', 'General Services Officer', '2017-07-12', 3123, '2017-07-21 07:24:02'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `invent_custodian_slip_descrp`
--

INSERT INTO `invent_custodian_slip_descrp` (`ID`, `icsID`, `Descrp`, `Invent_Item_No`) VALUES
(1, 1, 'Color: White', ''),
(9, 1, 'Engine No: QR20730030A', ''),
(10, 1, 'asdasd', '');

-- --------------------------------------------------------

--
-- Table structure for table `office_dictionary`
--

CREATE TABLE IF NOT EXISTS `office_dictionary` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `officeName` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `officeName` (`officeName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `office_dictionary`
--

INSERT INTO `office_dictionary` (`ID`, `officeName`) VALUES
(1, 'Agency Employee'),
(2, 'Emergency Employee	');

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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `property_accountability_receipt_record`
--

INSERT INTO `property_accountability_receipt_record` (`ID`, `Qty`, `Unit`, `Descrp`, `PropNo`, `ReceivedFrom_Name`, `ReceivedFrom_Position`, `ReceivedFrom_Date`, `ReceivedBy_Name`, `ReceivedBy_Position`, `ReceivedBy_Date`, `PAR`) VALUES
(1, 0, 'asdas', 'dasd', 'asdasd', 'asd', 'asdasd', '2017-06-14', '132', '3', '0321-01-13', 'asdasd'),
(2, 0, 'asdas', 'dasdas', 'dasdasd', '65464', '65465', '0054-06-04', 'sad', '545', '0064-04-05', 'a'),
(3, 123123, '12312312', '3123123', '123123123', '123123', 'qweqweqwe', '0000-00-00', '12312312', '3123123', '0123-03-12', '123'),
(4, 2147483647, 'wrwerwer', '123123123', 'werwerwerw12313123', 'oiuoiwurquiow', 'uqwioruqioewuu', '0000-00-00', 'iauoiuseowueiru', 'iouwioeurweiruio', '0000-00-00', '1234123'),
(5, 23, 'unit', 'asdj', 'hasd', 'sadas', 'dasdasd', '2017-07-13', 'xxx', 'asdas', '2017-07-11', '123r'),
(6, 2314567, 'q', 'q', 'q', 'q', 'q', '2017-07-06', 'q', 'q', '2017-07-04', 'q');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `property_return_slip_record`
--

INSERT INTO `property_return_slip_record` (`ID`, `LGU_Name`, `PurposeID`, `Qty`, `Unit`, `Descrp`, `Serial_Num`, `Prop_Number`, `ParNo`, `Name_of_Enduser`, `Unit_Value`, `Total_Value`, `Status`, `ReceiveBy_Name`, `ReceiveBy_Position`, `ReceiveBy_Date`, `ReceiveFrom_Name`, `ReceiveFrom_Position`, `ReceiveFrom_Date`, `DateAdded`) VALUES
(1, 'Lumil NHS, Silang', 2, 1, 'unit', 'Lenovo Tab-A7-30 Mld. Lenovo A3300-GV', 'SN-HGC7VGW7', 'd213', 'T-192-15', 'Lucia M. Diesta', 0, 7095, 'Unserviceable', 'xcv', 'wadasd', '2017-07-19', 'sddasd', 'xcxvcx', '2017-07-19', '2017-07-19 06:26:34'),
(21, 'XWWWWWWWWWWWWWW ', 3, 1, 'unit', 'asdasD', '2ADAWD', 'DAWD', 'ASDASD', 'AWD', 2313, 123, 'Unserviceable', 'asdASD', 'asdaSD', '2017-07-07', '2017-07-07', 'asdASD', '2017-07-13', '2017-07-21 07:50:54');

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
