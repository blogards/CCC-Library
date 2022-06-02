-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 31, 2022 at 09:10 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccclms`
--

-- --------------------------------------------------------

--
-- Table structure for table `audio-visual`
--

DROP TABLE IF EXISTS `audio-visual`;
CREATE TABLE IF NOT EXISTS `audio-visual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(155) NOT NULL,
  `grade_level` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `date_received` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audio-visual`
--

INSERT INTO `audio-visual` (`id`, `barcode`, `grade_level`, `subject`, `duration`, `copyright`, `date_received`, `created_at`, `updated_at`) VALUES
(47, '12377', 'K-5', 'Science K-6 Investigating Classrooms', '40-50 mins', '', '0000-00-00', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(46, '434234', 'K-5', 'Science K-6 Investigating Classrooms', '40-50 mins', '', '0000-00-00', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(45, '123123', 'K-5', 'Science K-6 Investigating Classrooms', '40-50 mins', '', '0000-00-00', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(48, '12398', 'K-5', 'Science K-6 Investigating Classrooms', '40-50 mins', '', '0000-00-00', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(49, '123098', 'K-5', 'Science K-6 Investigating Classrooms', '40-50 mins', '', '0000-00-00', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(50, '874678', 'K-5', 'Mathline Elementary School/Math Project K-5', '40-50 mins', '', '0000-00-00', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(51, '123145', 'K-5', 'Mathline Elementary School/Math Project K-5', '40-50 mins', '', '0000-00-00', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(52, '12467', 'K-6', 'Mathline Elementary School/Math Project K-5', '40-50 mins', '', '0000-00-00', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(53, '87864', 'K-6', 'Mathline Elementary School/Math Project K-5', '40-50 mins', '', '0000-00-00', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(54, '54636', 'K-6', 'Mathline Elementary School/Math Project K-5', '40-50 mins', '', '0000-00-00', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(55, '9043', 'K-6', 'Mathline Elementary School/Math Project K-5', '40-50 mins', '', '0000-00-00', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(56, '234287', 'K-6', 'Mathline Elementary School/Math Project K-5', '40-50 mins', '', '0000-00-00', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(57, '12423', 'K-6', 'Mathline Elementary School/Math Project K-5', '40-50 mins', '', '0000-00-00', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(58, '12352352', 'K-6', 'Mathline Elementary School/Math Project K-5', '40-50 mins', '', '0000-00-00', '2022-05-29 16:40:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resources_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `resources_id`, `first_name`, `middle_name`, `last_name`, `created_at`, `updated_at`) VALUES
(5, '263', 'Naruto', 'Namikazeeeee', 'Uzumaki', '2022-05-22 04:33:56', '0000-00-00 00:00:00'),
(6, '264', 'Saturo', 'Mememe', 'Gojo', '2022-05-22 04:39:27', '0000-00-00 00:00:00'),
(7, '265', 'Hisoka', 'Mal', 'Morrow', '2022-05-22 04:46:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(150) NOT NULL,
  `edition` varchar(255) DEFAULT NULL,
  `volume` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `date_received` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `cash_price` int(11) DEFAULT NULL,
  `sof` varchar(255) DEFAULT NULL,
  `type` varchar(15) NOT NULL DEFAULT 'n/a',
  `soft_copy` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`)
) ENGINE=MyISAM AUTO_INCREMENT=194 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `barcode`, `edition`, `volume`, `author`, `publisher`, `class`, `pages`, `remarks`, `date_received`, `year`, `cash_price`, `sof`, `type`, `soft_copy`, `created_at`, `updated_at`) VALUES
(191, '229', '6th', '2', 'NA', 'NA', 'NA', 300, 'NA', '03/03/2022', '2015', 0, 'NA', 'NA', '', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(192, '230', '7th', '1', 'Paul Terry', 'NA', 'NA', 300, 'NA', '03/03/2022', '2015', 0, 'NA', 'NA', '', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(190, '228', '5th', '1', 'Norm Deska', 'Na', 'NA', 300, 'NA', '03/03/2022', '2015', 0, 'NA', 'NA', '', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(189, '227', '4th', '1', 'NA', 'NA', 'NA', 300, 'NA', '03/03/2022', '2015', 0, 'NA', 'NA', '', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(188, '226', '3rd', '1', 'Sarrah Janssen', 'NA', 'NA', 300, 'NA', '03/03/2022', '2016', 0, 'NA', 'NA', '', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(187, '225', '2nd', '1', 'Jason Nicole', 'NA', 'NA', 300, 'NA', '03/03/2022', '2016', 0, 'NA', 'NA', '', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(186, '224', '2nd', '1', 'NA', 'NA', 'NA', 300, 'NA', '03/03/2022', '2017', 0, 'NA', 'NA', '', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(185, '223', '2nd', '1', 'NA', 'Na', 'NA', 300, 'NA', '03/03/2022', '2017', 0, 'NA', 'NA', '', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(184, '222', '2nd', '1', 'NA', 'NA', 'NA', 300, 'NA', '03/03/2022', '2017', 0, 'NA', 'NA', '', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(183, '221', '2nd', '1', 'John Ed De Vera', 'NA', 'NA', 300, 'NA', '03/03/2022', '2017', 0, 'NA', 'NA', '', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(193, '1111', 'ed 1', '1', 'Author 1', 'pub 1', '1212', 456, 'n/a', '2022-05-31', '2019', 500, 'University', 'Fable', 'TOR-RevisedIAS2_17Aug2021FORPOSTING1.pdf', '2022-05-31 01:28:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

DROP TABLE IF EXISTS `borrowers`;
CREATE TABLE IF NOT EXISTS `borrowers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_no` varchar(15) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `year_level` varchar(255) DEFAULT NULL,
  `section` varchar(15) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`id`, `id_no`, `first_name`, `middle_name`, `last_name`, `course`, `year_level`, `section`, `contact`, `street`, `barangay`, `city`, `province`, `postal_code`, `created_at`, `updated_at`) VALUES
(72, '20-9965', 'Melinda ', 'Sanderson', 'Velasquez', 'BSHM', '1st Year', NULL, '9123456798', '', 'Sapul', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(71, '20-1221', 'Jaidan ', 'Bloom', 'Phillips', 'BSHM', '1st Year', NULL, '9123456797', '', 'Masipit', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(70, '20-1111', 'Ariella ', 'Cabrera', 'Huang', 'BSHM', '1st Year', NULL, '9123456796', '', 'Guinobatan', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(69, '20-1222', 'Miles ', 'Hirst', 'Easton', 'BSIS', '1st Year', NULL, '9123456795', '', 'Lumangbayan', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(68, '18-2312', 'Shane ', 'Elliott', 'Campbell', 'BSIS', '1st Year', NULL, '9123456794', '', 'Balite', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(67, '19-9123', 'Nikita ', 'Erickson', 'Britt', 'BSIS', '1st Year', NULL, '9123456793', '', 'Tibag', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(65, '20-9908', 'Veer ', 'Hastings', 'Byrd', 'BSED Mathematics', '1st Year', NULL, '9123456791', '', 'Bayanan', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(66, '19-9382', 'Jaheim ', 'Beaumont', 'Sanderson', 'BSIS', '1st Year', NULL, '9123456792', '', 'Bayanan', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(64, '18-0123', 'Milan ', 'Lutz', 'Allison', 'BSNED', '1st Year', NULL, '9123456790', '', 'Bayanan', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(63, '20-1233', 'Zhane ', 'Brandt', 'Boyle', 'BSED Mathematics', '1st Year', NULL, '9123456789', '', 'Bayanan', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(62, '20-1235', 'Shanelle ', 'Matthews', 'Alfaro', 'BSED Science', '2nd Year', NULL, '9123456789', '', 'Ibaba West', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(60, '18-0123', 'Izabella ', 'Doyle', 'Whitley', 'BSIS', '4th Year', NULL, '9123456789', '', 'San Vicente East', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(61, '19-1234', 'Caelan ', 'Kirkpatrick', 'Klein', 'BSIT', '3rd Year', NULL, '9123456789', '', 'Ibaba East', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(59, '2323222', 'Cohan ', 'Smyth', 'Escobar', 'NA', 'NA', NULL, '9123456789', '', 'Bulusan', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(58, '222445', 'Hudson ', 'Bass', 'Orr', 'NA', 'NA', NULL, '9123456789', '', 'Batino', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(57, '353454', 'Mikayla ', 'Clarkson', 'Naylor', 'NA', 'NA', NULL, '9123456789', '', 'Balite', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(56, '3453779', 'Theia', 'Merritt', 'Preston', 'NA', 'NA', NULL, '9123456789', '', 'Calero', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(55, '234688', 'Alena', 'Morrow', 'Frederick', 'NA', 'NA', NULL, '9123456789', '', 'Ilaya', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(54, '643234', 'Mackenzie', 'Rodriquez', 'Russo', 'NA', 'NA', NULL, '9123456789', '', 'Libis', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00'),
(73, '20-0065', 'Tiernan ', 'Watts', 'Robles', 'BSHM', '1st Year', NULL, '9123456799', '', 'San Antonio', 'Calapan City', 'Oriental Mindoro', '5200', '2022-05-29 17:11:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `email_setting`
--

DROP TABLE IF EXISTS `email_setting`;
CREATE TABLE IF NOT EXISTS `email_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(25) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `content_1` text NOT NULL,
  `content_2` text NOT NULL,
  `footer` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_setting`
--

INSERT INTO `email_setting` (`id`, `code`, `subject`, `content_1`, `content_2`, `footer`) VALUES
(1, 'confirm_reservation', 'Confirmation of Reservation', '                                                    \r\nGood Day!\r\n\r\nThis is a confirmation that you have successfully reserve one of library resources. Please be remind that you have to pick it up on-                                                                    ', '', '\r\n\r\nBest regards,                  \r\nCCC Library                                                              '),
(2, 'confirm_release', 'Confirmation of $category Release', '                                                                                                     \r\nGood day!\r\n\r\nThis is a confirmation that you have  successfully pick up your $category reservation on $pickup_date.\r\n\r\nYou are expected to return the $category on $due_date.\r\n\r\n\r\nBest regards,\r\n\r\n                                                                                                                                                ', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

DROP TABLE IF EXISTS `journals`;
CREATE TABLE IF NOT EXISTS `journals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(155) NOT NULL,
  `volume` varchar(255) DEFAULT NULL,
  `copy` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `issn` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `barcode`, `volume`, `copy`, `date`, `issn`, `subject`, `created_at`, `updated_at`) VALUES
(54, '801', 'Volume 1', '1', '2015', 'Bangko Sentral ng Pilipinas', 'NA', '2022-05-29 16:26:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `library-resources`
--

DROP TABLE IF EXISTS `library-resources`;
CREATE TABLE IF NOT EXISTS `library-resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(150) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Available' COMMENT 'available, reserve, to released, borrowed, returned',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`)
) ENGINE=MyISAM AUTO_INCREMENT=450 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library-resources`
--

INSERT INTO `library-resources` (`id`, `barcode`, `title`, `category`, `status`, `created_at`, `updated_at`) VALUES
(431, '702', 'Thesis1', 'Thesis/Dissertation', 'Available', '2022-05-29 16:25:38', '0000-00-00 00:00:00'),
(430, '701', 'Thesis1', 'Thesis/Dissertation', 'Available', '2022-05-29 16:25:38', '0000-00-00 00:00:00'),
(429, '605', 'Publication1', 'Government Publications', 'Available', '2022-05-29 16:25:05', '0000-00-00 00:00:00'),
(426, '602', 'Publication1', 'Government Publications', 'Available', '2022-05-29 16:25:05', '0000-00-00 00:00:00'),
(427, '603', 'Publication1', 'Government Publications', 'Available', '2022-05-29 16:25:05', '0000-00-00 00:00:00'),
(428, '604', 'Publication1', 'Government Publications', 'Available', '2022-05-29 16:25:05', '0000-00-00 00:00:00'),
(425, '601', 'Publication1', 'Government Publications', 'Available', '2022-05-29 16:25:05', '0000-00-00 00:00:00'),
(424, '560', 'Work Performance and Accountability of Deaf Employees in the City Government of Calapan: Scaffolding to a Model', 'Manuscript', 'Available', '2022-05-29 16:24:23', '0000-00-00 00:00:00'),
(423, '559', 'Development and Validation of Inclusive Education lesson among Grade 3 Pupils in Calapan Elementary Schools', 'Manuscript', 'Available', '2022-05-29 16:24:23', '0000-00-00 00:00:00'),
(421, '557', 'Entrepreneurial Skills gained by the Bachelor of Science in Hotel and Restaurant Management Students of City College of Calapan', 'Manuscript', 'Available', '2022-05-29 16:24:23', '0000-00-00 00:00:00'),
(422, '558', 'Qualities and Performance of Hospitality and Tourism Students of City Colllege of Calapan: Basis of on-the-job training (OJT) Program', 'Manuscript', 'Available', '2022-05-29 16:24:23', '0000-00-00 00:00:00'),
(420, '556', 'Employability Level of Graduate Students of Bachelor of Science in Tourism Management', 'Manuscript', 'Available', '2022-05-29 16:24:23', '0000-00-00 00:00:00'),
(419, '555', 'Problems and Challenges encountered by the Tourism Management Student Dropouts of the City College of Calapan', 'Manuscript', 'Available', '2022-05-29 16:24:23', '0000-00-00 00:00:00'),
(418, '544', 'Calapan Bay LAN-BASED Reservation and Billing System', 'Manuscript', 'Available', '2022-05-29 16:24:23', '2022-05-29 21:11:26'),
(416, '522', 'Hybrid Application for Mindeus Computers Enterprises', 'Manuscript', 'Available', '2022-05-29 16:24:23', '0000-00-00 00:00:00'),
(417, '533', 'BFP Collection and Inspection Data Recording Utility[et al.]', 'Manuscript', 'Available', '2022-05-29 16:24:23', '0000-00-00 00:00:00'),
(415, '511', 'Changes and Prospect of Bachelor in Hotel and Restaurant Management', 'Manuscript', 'Available', '2022-05-29 16:24:23', '0000-00-00 00:00:00'),
(414, '810', 'Rice the Filipino Grow and Eat', 'Journals', 'Available', '2022-05-29 16:23:56', '0000-00-00 00:00:00'),
(410, '806', 'Historical Bulletin Vol. XLVII', 'Journals', 'Available', '2022-05-29 16:23:56', '0000-00-00 00:00:00'),
(412, '808', '2014 Annual Report', 'Journals', 'Reserved', '2022-05-29 16:23:56', '2022-05-29 21:17:00'),
(413, '809', 'Youth as movers of creative industries in Southeast Asia', 'Journals', 'Available', '2022-05-29 16:23:56', '0000-00-00 00:00:00'),
(411, '807', '2013 Annual Report', 'Journals', 'Available', '2022-05-29 16:23:56', '2022-05-29 19:49:25'),
(407, '803', 'Promoting thinking in schools philosophy for children in Asia-Pacific', 'Journals', 'Available', '2022-05-29 16:23:56', '0000-00-00 00:00:00'),
(408, '804', 'SPEI Selected Philippine Economic Indicators 2014 Yearbook', 'Journals', 'Available', '2022-05-29 16:23:56', '0000-00-00 00:00:00'),
(409, '805', 'PJEPA Strengthening the Foundation for Regional Cooperation and Economic Integration', 'Journals', 'Available', '2022-05-29 16:23:56', '0000-00-00 00:00:00'),
(406, '802', 'Towards a true and clean sporting environment in Southeast Asia', 'Journals', 'Available', '2022-05-29 16:23:56', '0000-00-00 00:00:00'),
(405, '801', 'Inflation Report Second Quarter 2015', 'Journals', 'Available', '2022-05-29 16:23:56', '2022-05-29 21:11:22'),
(404, '230', 'Top 10 everything 2016', 'Books', 'Available', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(403, '229', 'Guinness world records 2016', 'Books', 'Available', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(402, '228', 'Ripley\'s Believe it or not', 'Books', 'Available', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(401, '227', 'The true NGO uncovering our hidden heroes', 'Books', 'Available', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(400, '226', 'The world almanac and book facts 2016', 'Books', 'Available', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(399, '225', 'Dictionary of Science and Technology', 'Books', 'Available', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(398, '224', 'Reader\'s Digest: Why Great Outdoors is Nature\'s Best Prescription', 'Books', 'Available', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(397, '223', 'Reader\'s Digest: Why it pays to increase your World Power', 'Books', 'Available', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(396, '222', 'Reader\'s Digest: A Reef in Crisis', 'Books', 'Available', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(395, '221', 'Reader\'s Digest: The World\'s Best Loved Magazine', 'Books', 'Available', '2022-05-29 16:23:32', '0000-00-00 00:00:00'),
(432, '703', 'Thesis1', 'Thesis/Dissertation', 'Available', '2022-05-29 16:25:38', '0000-00-00 00:00:00'),
(433, '704', 'Thesis2', 'Thesis/Dissertation', 'Available', '2022-05-29 16:25:38', '0000-00-00 00:00:00'),
(434, '705', 'Thesis2', 'Thesis/Dissertation', 'Available', '2022-05-29 16:25:38', '0000-00-00 00:00:00'),
(435, '123123', 'Assessment', 'Audio Visual Material', 'Available', '2022-05-29 16:40:03', '2022-05-29 21:11:24'),
(436, '434234', 'All Sorts of Leaves', 'Audio Visual Material', 'Reserved', '2022-05-29 16:40:03', '2022-05-29 19:58:46'),
(437, '12377', 'Introduction', 'Audio Visual Material', 'Available', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(438, '12398', 'A Conversation about teaching food thought', 'Audio Visual Material', 'Available', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(439, '123098', 'Completing the circuit', 'Audio Visual Material', 'Available', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(440, '874678', 'Money counts number sense/ computation grade 1-2', 'Audio Visual Material', 'Available', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(441, '123145', 'Change are, part 1 priobability grade 1-2', 'Audio Visual Material', 'Available', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(442, '12467', 'Tesselations wow! Geometry and special relationship grade 1', 'Audio Visual Material', 'Available', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(443, '87864', 'Spak it up number sense and computation grade 4', 'Audio Visual Material', 'Available', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(444, '54636', 'Fantasy Baseball, part 1 number and number relationship', 'Audio Visual Material', 'Available', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(445, '9043', 'Fantasy Baseball, part 2 number and number relationship', 'Audio Visual Material', 'Available', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(446, '234287', 'Introduction', 'Audio Visual Material', 'Available', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(447, '12423', 'Introduction', 'Audio Visual Material', 'Available', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(448, '12352352', 'Introduction', 'Audio Visual Material', 'Available', '2022-05-29 16:40:03', '0000-00-00 00:00:00'),
(449, '1111', 'title 1', 'Books', 'Available', '2022-05-31 01:28:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `manuscript`
--

DROP TABLE IF EXISTS `manuscript`;
CREATE TABLE IF NOT EXISTS `manuscript` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(155) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manuscript`
--

INSERT INTO `manuscript` (`id`, `barcode`, `author`, `course`, `year`, `created_at`, `updated_at`) VALUES
(63, '559', 'Laica B. Chavez [ et al. ]', '1', '2019', '2022-05-29 16:24:23', '0000-00-00 00:00:00'),
(64, '560', 'Sydney Sen C. Bacarra [ et al. ]', '1', '2019', '2022-05-29 16:24:23', '0000-00-00 00:00:00'),
(62, '558', 'Kathleen Kaye E. Adame [ et al. ]', '1', '2019', '2022-05-29 16:24:23', '0000-00-00 00:00:00'),
(61, '557', 'Chester D. Aquino, James Lee Caguete and Angelika C. Joco', '1', '2019', '2022-05-29 16:24:23', '0000-00-00 00:00:00'),
(60, '556', 'Iryn Kay M. Cleofe, Shyne Datinguinoo and Carol Jane A. Delos Reyes', '1', '2019', '2022-05-29 16:24:23', '0000-00-00 00:00:00'),
(58, '544', 'Catherine M. Corona, Xyrish Joanne Lopez, Deanne Hazel Norada', '1', '2018', '2022-05-29 16:24:23', '0000-00-00 00:00:00'),
(59, '555', 'Jeremiah De Leon, Leslie Escalona and Marleo Manibo', '1', '2019', '2022-05-29 16:24:23', '0000-00-00 00:00:00'),
(57, '533', 'Jenna Lyka P. Borromeo.]', '1', '2018', '2022-05-29 16:24:23', '0000-00-00 00:00:00'),
(55, '511', 'Jerome Montoya Fernando, Giselle Nicole Panopio and Angelica Momog Garcillano', '1', '2019', '2022-05-29 16:24:23', '0000-00-00 00:00:00'),
(56, '522', 'Mel Angelo B. Estoque, Ellaine Mae Canete, Lesty A. Limjoco', '1', '2018', '2022-05-29 16:24:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

DROP TABLE IF EXISTS `publications`;
CREATE TABLE IF NOT EXISTS `publications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(155) NOT NULL,
  `volume` varchar(255) DEFAULT NULL,
  `copy` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `issn` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bacode` (`barcode`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `barcode`, `volume`, `copy`, `date`, `issn`, `subject`, `created_at`, `updated_at`) VALUES
(62, '605', 'Volume 1', 4, '0000-00-00', '123', 'NA', '2022-05-29 16:25:05', '0000-00-00 00:00:00'),
(61, '604', 'Volume 1', 4, '0000-00-00', '123131', 'NA', '2022-05-29 16:25:05', '0000-00-00 00:00:00'),
(60, '603', 'Volume 1', 4, '0000-00-00', '12313', 'NA', '2022-05-29 16:25:05', '0000-00-00 00:00:00'),
(59, '602', 'Volume 1', 4, '0000-00-00', '123', 'NA', '2022-05-29 16:25:05', '0000-00-00 00:00:00'),
(58, '601', 'Volume 1', 4, '0000-00-00', '1231', 'NA', '2022-05-29 16:25:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `school_semester`
--

DROP TABLE IF EXISTS `school_semester`;
CREATE TABLE IF NOT EXISTS `school_semester` (
  `semester` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

DROP TABLE IF EXISTS `school_year`;
CREATE TABLE IF NOT EXISTS `school_year` (
  `year` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

DROP TABLE IF EXISTS `thesis`;
CREATE TABLE IF NOT EXISTS `thesis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(155) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`id`, `barcode`, `author`, `year`, `created_at`, `updated_at`) VALUES
(34, '705', 'NA', '2020', '2022-05-29 16:25:38', '0000-00-00 00:00:00'),
(33, '704', 'NA', '2020', '2022-05-29 16:25:38', '0000-00-00 00:00:00'),
(32, '703', 'NA', '2020', '2022-05-29 16:25:38', '0000-00-00 00:00:00'),
(31, '702', 'NA', '2020', '2022-05-29 16:25:38', '0000-00-00 00:00:00'),
(30, '701', 'NA', '2020', '2022-05-29 16:25:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `borrower_id` int(11) NOT NULL,
  `resources_id` varchar(120) NOT NULL,
  `reservation_date` date NOT NULL,
  `status` varchar(50) DEFAULT 'Reserved' COMMENT 'Reserved, Borrowed,Returned',
  `pickup_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `returned_date` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=310 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `borrower_id`, `resources_id`, `reservation_date`, `status`, `pickup_date`, `due_date`, `returned_date`, `created_at`, `updated_at`) VALUES
(306, 73, '436', '2022-05-30', 'Reserved', NULL, NULL, NULL, '2022-05-29 19:58:46', '0000-00-00 00:00:00'),
(305, 59, '405', '2022-06-01', 'Cancelled', NULL, NULL, NULL, '2022-05-29 19:58:09', '2022-05-29 21:11:22'),
(304, 59, '411', '2022-06-02', 'Returned', '2022-05-30', '2022-06-03', '2022-05-30 03:49:00', '2022-05-31 19:28:30', '2022-05-29 23:02:37'),
(303, 59, '405', '2022-06-01', 'Cancelled', NULL, NULL, NULL, '2022-05-29 19:25:32', '2022-05-29 19:27:44'),
(302, 59, '405', '2022-06-01', 'Cancelled', NULL, NULL, NULL, '2022-05-29 19:25:32', '2022-05-29 19:27:44'),
(307, 59, '435', '2022-05-30', 'Cancelled', NULL, NULL, NULL, '2022-05-29 20:54:31', '2022-05-29 21:11:24'),
(308, 59, '418', '2022-05-30', 'Cancelled', NULL, NULL, NULL, '2022-05-29 20:56:54', '2022-05-29 21:11:26'),
(309, 59, '412', '2022-05-30', 'Reserved', NULL, NULL, NULL, '2022-04-26 21:17:00', '2022-05-29 23:00:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Approved',
  `login_status` int(11) NOT NULL DEFAULT '0',
  `trans_stat` int(11) NOT NULL,
  `profile_img` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `user_type`, `status`, `login_status`, `trans_stat`, `profile_img`, `created_at`, `updated_at`) VALUES
(72, 'melinda@email.com', 'W29VNwRmUTABZAZg', 'Student', 'Approved', 0, 0, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:34:41'),
(71, 'jaidan@email.com', 'VWFQMlEzVjcAZVUz', 'Student', 'Approved', 0, 0, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:34:41'),
(70, 'ariella@email.com', 'BzMPbVY0VzZXMlE3', 'Student', 'Approved', 0, 0, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:34:41'),
(69, 'miles@email.com', 'UWUAYgBiUzIHYgBm', 'Student', 'Approved', 0, 0, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:34:41'),
(68, 'shane@email.com', 'VmJTMQVnVjcOawZg', 'Student', 'Approved', 0, 0, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:34:41'),
(67, 'nikita@email.com', 'Wm4AYlIwVzYEYQNl', 'Student', 'Approved', 0, 0, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:34:41'),
(65, 'veer@email.com', 'U2cHZQdlVTRXMgBm', 'Student', 'Approved', 0, 0, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:34:41'),
(66, 'jaheim@email.com', 'VWFUNgJgA2JUMVYw', 'Student', 'Approved', 0, 0, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:34:41'),
(64, 'milan@email.com', 'ATVSMFc1UTBVMFI0', 'Student', 'Approved', 0, 0, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:34:41'),
(63, 'zhan@email.com', 'VGAFZwVnUjMHYlE3', 'Student', 'Approved', 0, 0, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:34:41'),
(62, 'shan@email.com', 'W28DYQJgBmcHYgBm', 'Student', 'Approved', 0, 0, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:34:41'),
(61, 'cael@email.com', 'ADQPbVU3A2IEYVYw', 'Student', 'Approved', 0, 0, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:34:41'),
(60, 'izab@email.com', 'UWUCYAVnUjNUMVYw', 'Student', 'Approved', 0, 0, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:34:41'),
(59, 'coha@email.com', 'V2NUNgRmVTQEYQNlUjACZQ==', 'Teacher', 'Approved', 0, 1, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 21:17:00'),
(58, 'huds@email.com', 'V2MCYAdlAGEAZQNl', 'Teacher', 'Approved', 0, 0, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:34:41'),
(56, 'thei@email.com', 'UWVTMQVnUDFSN1A2', 'Library Staff', 'Approved', 0, 0, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:34:41'),
(57, 'mika@email.com', 'UWUPbVU3A2IEYVQy', 'Library Staff', 'Approved', 0, 0, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:34:41'),
(55, 'alen@email.com', 'Wm5UNlMxVTQHYlI0UjAFYg==', 'Admin', 'Approved', 0, 0, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:34:41'),
(54, 'mack@email.com', 'W28AYl89VjdQNVcxUzFVMg==', 'Admin', 'Approved', 0, 0, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:34:41'),
(73, 'tiernan@email.com', 'ATVTMV48VzZVMANlUzEHYA==', 'Student', 'Approved', 0, 1, 'default.jpg', '2022-05-29 20:29:39', '2022-05-29 20:37:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
