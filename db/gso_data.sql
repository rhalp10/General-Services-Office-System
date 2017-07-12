-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 12, 2017 at 10:24 AM
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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `bincard_issued_record`
--

INSERT INTO `bincard_issued_record` (`ID`, `ItemSetID`, `itemCode`, `bin_ID`, `recpnt`, `issued_date`, `qty`) VALUES
(1, 'SP-01', 'SET SP-01', 2, 'darren', '2017-07-12', 1),
(2, 'SP-02', 'SET SP-02', 1, 'darren', '2017-07-12', 1),
(3, 'SP-03', 'SET SP-03', 2, 'darren', '2017-07-12', 1),
(6, 'SP-04', 'SET SP-04', 7, '2017-07-18', '0000-00-00', 1),
(7, 'SP-05', 'SET SP-05', 7, 'fae', '2017-07-21', 5),
(8, 'SP-06', 'SET SP-06', 7, 'markzuckingbird', '2017-07-21', 44),
(9, 'SP-07', 'SET SP-07', 2, 'ewewe', '2017-07-21', 2),
(12, 'SP-08', 'SET SP-08', 2, '123', '2017-07-31', 1);

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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `bincard_record`
--

INSERT INTO `bincard_record` (`ID`, `bin_Date`, `Supplier`, `Descrp`, `Qty`, `Issued`, `Balance`) VALUES
(1, '2017-07-19', '666as6d6', '66asd66', '50', 1, 49),
(2, '2016-11-11', 'New Lines', 'laptop', '5', 2, 0),
(7, '2017-07-14', 'supliwer', 'aslkdj', '50', 0, 0),
(8, '2017-07-06', 'asdasd', '31231', '32', 0, 0);

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
(14, 11, 'SP-14', 'SET SP-14', 'T-457-16', 1, 'unit', 'Plate No. SCB-837', '1 SN. MMLYKS01623C12311', 'OT-09-98', 0, 'null', 'i and i 9/12/2013', '0000-00-00'),
(15, 1, 'SP-15', 'SET SP-15', 'T-457-16', 1, 'unit', 'Calculator HL-107 10 digits', '1 SN. MMLYKS01623C12311', 'OT-09-98', 0, 'Adoracion Mojica', 'Formerly to Adoracion Mojica', '0000-00-00'),
(18, 4, 'SP-18', 'PART SP-16', 'T-457-16', 0, 'unit', 'Plate No. SCB-840', '1 SN. MMLYKS01623C12311', 'OT-09-98', 0, 'null', '', '2017-06-08'),
(19, 4, 'SP-19', 'PART SP-16', 'T-457-16', 0, 'unit', 'Plate No. SCB-841', '1 SN. MMLYKS01623C12311', 'OT-09-98', 6, 'null', '', '2017-06-15'),
(20, 4, 'SP-20', 'PART SP-16', 'T-457-16', 0, 'unit', 'Plate No. SCB-842', '1 SN. MMLYKS01623C12311', 'OT-09-98', 0, 'null', '', '0000-00-00'),
(21, 4, 'SP-21', 'PART SP-16', 'T-457-16', 0, 'unit', 'Plate No. SCB-843', '1 SN. MMLYKS01623C12311', 'OT-09-98', 1321, 'null', '', '0000-00-00'),
(25, 4, 'SP-16', 'SET SP-16', 'T-457-16', 1, 'unit', 'Calculator HL-107 10 digits', '1 SN. MMLYKS01623C12311', 'OT-09-98', 0, 'null', 'Formerly to Adoracion Mojica', '0000-00-00'),
(26, 4, 'SP-22', 'SET SP-22', 'asd', 1, '', '', '', '', 0, 'null', '', '0000-00-00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `emp_accounts_record`
--

INSERT INTO `emp_accounts_record` (`accID`, `accLevel`, `username`, `password`, `fullName`, `Age`, `Gender`, `Address`, `Email`, `Pos`, `Mobile`, `image`) VALUES
(0, '0', 'admin', 'Tzabaoth10', 'Rhalp Darren Cabrera', 20, 'male', 'Blk 38 Lot 11 Phase 2b Brgy Aguado TMC', '555@yahoo.com', '55', '0965489844', 'img/emp_profile/temp.jpg'),
(1, '1', 'employee', 'employee', 'mark', 20, 'Unknown', 'Mars', 'marcalien@gmail.com', 'staff', '09169158798', 'img/emp_profile/temp.jpg'),
(8, '1', '987', '987', 'yehye', 978, '987', '444444444', '987@yhoo.com', '987', '0905454587', 'img/emp_profile/temp.jpg'),
(10, '0', 'asasdkld', '321', 'iouqou', 0, 'khakdhk', 'hhhhh', 'oiuoiu@yahoo.com', 'kkjh', '0904545454', 'img/emp_profile/temp.jpg'),
(14, '1', 'iou', '555', 'franz1', 50, 'male', 'Blk 38 Lot 11 Phase 2b Brgy Aguado TMC', 'jalksjd@yahoo.com', 'jklasdjd', '0915611894', 'img/emp_profile/temp.jpg'),
(15, '1', '9999', '9', 'tryyyyyyyyyyyyyyyyyyyyy', 50, '9', '9', '987@aksd.com', '9', '0905454984', 'img/emp_profile/temp.jpg'),
(17, '1', '8', '8', 'panget', 8, '8', '8', '8@yahoo.com', '8', '9900000000', 'img/emp_profile/temp.jpg'),
(18, '1', 'darren321', '321', 'OMAR DAUD', 15, 'Male', 'NAIC', '321@yahoo.com', '155', '0906545644', 'img/emp_profile/temp.jpg'),
(19, '1', 'rd2h1fs8jk2b6cz', 'yth3xk5slz8bd', 'Omar', 20, 'Male', 'Bucal 3-B, Maragondon, Cavite', 'Omardaud21000@gmail.com', '.....', '09355173381', 'img/emp_profile/temp.jpg'),
(20, '3', 'bano12315', '55555', 'asdasdasd', 30, 'Male', 'wazhing', 'k4@yaho1111.c1om1', '4k', '0954564546', 'img/emp_profile/temp.jpg'),
(21, '0', 'Asada', '555', 'Franz Marc Cabrera', 50, 'Male', 'Blk 38 Lot 11 Ph2b Southville2 Trece Martirez City', 'franzmarccabrera123@gmail.com', 'ADMIN', '0915151613', 'img/emp_profile/temp.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `emp_pgc_record`
--

INSERT INTO `emp_pgc_record` (`accID`, `fullName`, `office`, `designation`, `note`) VALUES
(1, 'Rhalp Darren R. Cabrera ', 'IT DEP', 'IT DEP', ''),
(4, 'New Line ', 'New Line', 'New Line', ''),
(6, 'JOBELLE B. PELINA', 'Agency Employee', 'KAHIT SAAN', ''),
(9, 'htrhrth', 'Emergency Employee', 'asatrh', ''),
(11, 'thfghfgh', 'IT DEP', 'fghfghfgh', ''),
(13, 'Princess Mononoke', 'Agency Employee', 'mountain', ''),
(14, 'sample 1 sample 2', 'Agency Employee', 'dasdasd', ''),
(15, 'jhgjj', 'Emergency Employee', 'cbcbcf', ''),
(16, 'Mark Christopher dArc', 'Agency Employee', 'hgh', ''),
(17, 'xfgdfjk', 'IT DEP', 'hdfsdf', ''),
(18, 'sdfsdfsdf', 'IT DEP', 'sdfsdfs', ''),
(22, 'Omar Raouf A. Daud', 'Property Management Section', 'Administrative Officer III', ''),
(23, 'Ains Ooal Gown1', ' Nazareth', 'KAHIT SAAN', 'dasd'),
(24, 'Marc Kevin Manalo', 'BIDA OR FEED', 'BIDA GAMING', ''),
(26, 'wazhin', 'xhing', 'Ceeeeeeeerrrrrrrrrrrrbellllllllls', 'wazak'),
(27, '1111111', '11111', '11111', 'retiradp'),
(28, 'arc', 'Arc', 'Arc', 'Arc');

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
  `ID` int(11) NOT NULL,
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
  `ICS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invent_custodian_slip`
--

INSERT INTO `invent_custodian_slip` (`ID`, `Qty`, `Unit`, `Descrp`, `Invent_Item_No`, `Ez_Useful_Life`, `ReceivedBy_Name`, `ReceivedBy_Position`, `ReceiveBy_Date`, `ReceivedFrom_Name`, `ReceivedFrom_Position`, `ReceiveFrom_Date`, `ICS`) VALUES
(0, 0, 'sdas', 'dasd', 'asdas', 'dasdasd', 'asdasda', 'asdasdasd', '2017-06-01', 'asdasd', 'asdasd', '2017-06-08', 0),
(0, 0, 'dsadasd', 'dasdasd', 'asdasd', 'asdasd', 'qwdqwd', 'wqdqwd', '0055-05-05', 'da5wd5aw5d', '5aw5daw5d5555', '2017-05-31', 0);

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
  `ICS` varchar(12) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `property_accountability_receipt_record`
--

INSERT INTO `property_accountability_receipt_record` (`ID`, `Qty`, `Unit`, `Descrp`, `PropNo`, `ReceivedFrom_Name`, `ReceivedFrom_Position`, `ReceivedFrom_Date`, `ReceivedBy_Name`, `ReceivedBy_Position`, `ReceivedBy_Date`, `ICS`) VALUES
(1, 0, 'asdas', 'dasd', 'asdasd', 'asd', 'asdasd', '2017-06-14', '132', '3', '0321-01-13', 'asdasd'),
(2, 0, 'asdas', 'dasdas', 'dasdasd', '65464', '65465', '0054-06-04', 'sad', '545', '0064-04-05', 'a');

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
  `MrNo` varchar(50) NOT NULL,
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
  PRIMARY KEY (`ID`),
  KEY `prs_purpose_dictionary` (`PurposeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `property_return_slip_record`
--

INSERT INTO `property_return_slip_record` (`ID`, `LGU_Name`, `PurposeID`, `Qty`, `Unit`, `Descrp`, `Serial_Num`, `Prop_Number`, `MrNo`, `Name_of_Enduser`, `Unit_Value`, `Total_Value`, `Status`, `ReceiveBy_Name`, `ReceiveBy_Position`, `ReceiveBy_Date`, `ReceiveFrom_Name`, `ReceiveFrom_Position`, `ReceiveFrom_Date`) VALUES
(1, 'Lumil NHS, Silang', 3, 1, 'unit', 'Lenovo Tab-A7-30 Mld. Lenovo A3300-GV', 'SN-HGC7VGW7', '', 'T-192-15', 'Lucia M. Diesta', 0, 7095, 'Unserviceable', '', '', '0000-00-00', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `prs_purpose_dictionary`
--

CREATE TABLE IF NOT EXISTS `prs_purpose_dictionary` (
  `ID` int(10) NOT NULL,
  `Pupose_Type` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prs_purpose_dictionary`
--

INSERT INTO `prs_purpose_dictionary` (`ID`, `Pupose_Type`) VALUES
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
