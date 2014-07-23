-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2014 at 05:23 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `osnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `announcement_title` varchar(100) NOT NULL,
  `duration_start` date NOT NULL,
  `duration_end` date NOT NULL,
  `announcement_message` text NOT NULL,
  `archive` date DEFAULT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `user_id`, `feature_id`, `feedback`, `announcement_title`, `duration_start`, `duration_end`, `announcement_message`, `archive`) VALUES
(4, 0, 0, 'feedback', 'test edited', '2014-07-16', '2014-07-17', 'dalsk<br><br>', NULL),
(5, 0, 0, 'feedback', 'new new neww neww neww neww neww neww neww neww neww neww neww neww neww neww neww neww neww', '2014-07-17', '2014-07-18', 'test', NULL),
(6, 0, 0, 'feedback', 'again', '2014-07-14', '2014-07-17', 'saasf', '2014-07-16'),
(7, 0, 0, 'feedback', 'new', '2014-07-15', '2014-07-16', 'test2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'Web Development'),
(2, 'Doggy'),
(3, 'Piggy'),
(4, 'Fishy'),
(5, 'Prison'),
(6, 'Quagmire');

-- --------------------------------------------------------

--
-- Table structure for table `department_manager`
--

CREATE TABLE IF NOT EXISTS `department_manager` (
  `department_manager_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  PRIMARY KEY (`department_manager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department_team`
--

CREATE TABLE IF NOT EXISTS `department_team` (
  `department_team_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  PRIMARY KEY (`department_team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE IF NOT EXISTS `feature` (
  `feature_id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_name` char(50) NOT NULL,
  PRIMARY KEY (`feature_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`feature_id`, `feature_name`) VALUES
(1, 'Home'),
(2, 'My Profile'),
(3, 'View Payslip'),
(4, 'Employee List'),
(5, 'Add Employee'),
(6, 'Edit Employee'),
(7, 'Print Payslip'),
(8, 'Edit Payroll'),
(9, 'Apply Leave'),
(10, 'Leave Statistics'),
(11, 'Leave List'),
(12, 'Infractions List'),
(13, 'Feedback'),
(14, 'Role Manager'),
(15, 'Team List'),
(16, 'Department List'),
(17, 'Feedback Manager');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `date_created` datetime NOT NULL,
  `status` enum('solved','pending') NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `feature_id`, `subject`, `text`, `date_created`, `status`) VALUES
(1, 201038998, 1, 'Ben10', 'Ben10', '2014-07-14 23:16:41', 'pending'),
(2, 201038998, 1, 'Hello', 'Yellow!', '2014-07-14 23:18:21', 'pending'),
(3, 201038998, 1, 'Hello', 'World', '2014-07-14 23:20:39', 'pending'),
(4, 201038998, 1, 'as', 'as', '2014-07-14 23:23:03', 'pending'),
(5, 201038998, 3, 'Lol', 'What', '2014-07-16 00:29:49', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `infractions`
--

CREATE TABLE IF NOT EXISTS `infractions` (
  `infraction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `infraction_type_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `details` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`infraction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `infractions`
--

INSERT INTO `infractions` (`infraction_id`, `user_id`, `infraction_type_id`, `date`, `details`) VALUES
(1, 1, 1, '2014-07-17 00:00:00', 'test 1'),
(2, 1, 1, '2014-07-17 00:00:00', 'test 2'),
(3, 1, 1, '2014-07-17 00:00:00', 'test 3'),
(4, 5, 5, '2014-07-18 00:00:00', 'test something'),
(5, 1, 3, '2014-07-17 00:00:00', 'test'),
(6, 1, 2, '2014-07-17 00:00:00', 'test excused'),
(7, 1, 2, '0000-00-00 00:00:00', '222222'),
(8, 1, 4, '1970-01-01 00:00:00', '123'),
(9, 2, 1, '1970-01-01 00:00:00', '222'),
(10, 2, 2, '2014-01-01 00:00:00', '12'),
(11, 1, 2, '2011-11-11 00:00:00', '222222222'),
(12, 1, 2, '1970-01-01 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `infraction_type`
--

CREATE TABLE IF NOT EXISTS `infraction_type` (
  `infraction_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`infraction_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `infraction_type`
--

INSERT INTO `infraction_type` (`infraction_type_id`, `name`) VALUES
(1, 'Unexcused Absent'),
(2, 'Excused Absent'),
(3, 'No Call No Show (NCNS)'),
(4, 'No Notification'),
(5, 'Late');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `manager_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`manager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_type` enum('superadmin','hr-admin','manager','team leader','regular user') NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_type`) VALUES
(1, 'superadmin'),
(2, 'hr-admin'),
(3, 'manager'),
(4, 'team leader'),
(5, 'regular user');

-- --------------------------------------------------------

--
-- Table structure for table `role_feature`
--

CREATE TABLE IF NOT EXISTS `role_feature` (
  `role_feature_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  PRIMARY KEY (`role_feature_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `role_feature`
--

INSERT INTO `role_feature` (`role_feature_id`, `role_id`, `feature_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(255) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `team_leader`
--

CREATE TABLE IF NOT EXISTS `team_leader` (
  `team_leader_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`team_leader_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE IF NOT EXISTS `user_information` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `registered_address` text NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `birth_date` datetime NOT NULL,
  `gender` varchar(50) NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  `tax_code` varchar(255) NOT NULL,
  `sss` varchar(100) NOT NULL,
  `phic` varchar(50) NOT NULL,
  `tin` varchar(50) NOT NULL,
  `hdmf` varchar(50) NOT NULL,
  `spouse_last_name` varchar(255) NOT NULL,
  `spouse_first_name` varchar(255) NOT NULL,
  `spouse_middle_name` varchar(255) NOT NULL,
  `spouse_suffix` varchar(255) NOT NULL,
  `previous_employer` varchar(255) NOT NULL,
  `date_ended` datetime NOT NULL,
  `address` text NOT NULL,
  `employment_number` varchar(25) NOT NULL,
  `date_started` datetime NOT NULL,
  `employment_type` varchar(255) NOT NULL,
  `contract_period` varchar(155) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook_url` varchar(455) NOT NULL,
  `branch_site` varchar(255) NOT NULL,
  `department` varchar(155) NOT NULL,
  `immediate_superior` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `salary_type` varchar(155) NOT NULL,
  `payreg_names` varchar(255) NOT NULL,
  `bank_account_number` varchar(255) NOT NULL,
  `status` varchar(55) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`user_id`, `department_id`, `role_id`, `last_name`, `first_name`, `middle_name`, `suffix`, `registered_address`, `zip_code`, `birth_date`, `gender`, `marital_status`, `tax_code`, `sss`, `phic`, `tin`, `hdmf`, `spouse_last_name`, `spouse_first_name`, `spouse_middle_name`, `spouse_suffix`, `previous_employer`, `date_ended`, `address`, `employment_number`, `date_started`, `employment_type`, `contract_period`, `email`, `facebook_url`, `branch_site`, `department`, `immediate_superior`, `position`, `salary_type`, `payreg_names`, `bank_account_number`, `status`, `password`) VALUES
(19, 0, 0, 'H', 'h', 'h', 'h', 'h', 'h', '0000-00-00 00:00:00', 'Male', 'Single', 'h', 'h', 'h', 'h', 'h', 'h', 'h', 'h', 'h', 'h', '0000-00-00 00:00:00', 'h', 'h', '0000-00-00 00:00:00', 'h', 'h', 'h', 'h', 'h', 'Web Development', 'h', '', 'h', '', '', 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `user_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`user_login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_login_id`, `user_id`, `username`, `password`) VALUES
(1, 201038998, 'mdingding', '0d721ae915ecbc769fcbb1dc4b5d699e');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_role` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role`, `user_id`, `role_id`) VALUES
(1, 201038998, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
