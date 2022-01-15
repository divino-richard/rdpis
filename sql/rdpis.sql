-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 07:20 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rdpis`
--

-- --------------------------------------------------------

--
-- Table structure for table `educ_record`
--

CREATE TABLE `educ_record` (
  `person_id` varchar(40) NOT NULL,
  `elem_school_name` varchar(40) NOT NULL,
  `elem_grad_sy` varchar(20) NOT NULL,
  `high_school_name` varchar(40) NOT NULL,
  `high_grad_sy` varchar(20) NOT NULL,
  `coll_school_name` varchar(40) NOT NULL,
  `coll_grad_sy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educ_record`
--

INSERT INTO `educ_record` (`person_id`, `elem_school_name`, `elem_grad_sy`, `high_school_name`, `high_grad_sy`, `coll_school_name`, `coll_grad_sy`) VALUES
('61b2cda8b07bf2.35227923', 'Mabuhay Elementary School', '2011-2015', 'Tambis National High School', '2018-2019', 'Caraga State University ', '2015-2020'),
('61b361d369bbf6.51315902', 'Mabuhay Elementary School', '2013-2014', 'Tambis National High School', '2018-2019', 'SDSSU', 'not yet'),
('61b422d7737659.44772847', 'Mabolo Elementary School', '2013-2014', 'Dumangas National High School', '2005-2006', 'University of Santo Tomas', '2010-2011'),
('61b562e911b776.45399019', 'Kalanganan Elementary School', '2011-2012', 'Bacusanon NHS', '2018-2019', 'Mindanao State University', '2017-2018'),
('61b56b139f3691.00275097', 'Mabuhay Elementary School', '2012-2013', 'Bayugan NCHS', '2018-2019', 'Caraga State University', 'Not yet'),
('61c5300fdbb1a1.82215000', 'Barobo Central Elementary School', '2005-2006', 'Barobo National High School', '2011-2012', 'SDSSU-Main Campus', '2015-2016');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `person_id` varchar(40) NOT NULL,
  `father_fname` varchar(40) NOT NULL,
  `father_mname` varchar(40) NOT NULL,
  `father_lname` varchar(40) NOT NULL,
  `mother_fname` varchar(40) NOT NULL,
  `mother_mname` varchar(40) NOT NULL,
  `mother_lname` varchar(40) NOT NULL,
  `parent_city_mun_address` varchar(40) NOT NULL,
  `parent_province_address` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`person_id`, `father_fname`, `father_mname`, `father_lname`, `mother_fname`, `mother_mname`, `mother_lname`, `parent_city_mun_address`, `parent_province_address`) VALUES
('61b2cda8b07bf2.35227923', 'Jonny', 'N/A', 'Doe', 'Jane', 'N/A', 'Doe', 'Bayugan City', 'Agusan del Sur'),
('61b361d369bbf6.51315902', 'Richard', 'N/A', 'Divino', 'Jessa', 'N/A', 'Doe', 'Bayugan City', 'Agusan del Sur'),
('61b422d7737659.44772847', 'Pedro', 'Dela', 'Cruz', 'Juanita', 'Dela', 'Cruz', 'Malolos', 'Bulacan'),
('61b562e911b776.45399019', 'Pedro ', 'Huerte', 'Gordon', 'Maria', 'Clara', 'Gordon', 'Malaybalay', 'Bukidnon'),
('61b56b139f3691.00275097', 'Rodrigo', 'Reyes', 'Sag-od', 'Emelda', 'Auman', 'Sag-od', 'Bayugan City', 'Agusan del Sur'),
('61c5300fdbb1a1.82215000', 'Jhone', 'Encabo', 'Divino', 'Jane', 'Encabo', 'Divino', 'Barobo', 'Surigao del Sur');

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `person_id` varchar(40) NOT NULL,
  `image_name` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `middlename` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `extension` varchar(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `civil_status` varchar(15) NOT NULL,
  `favorite_color` varchar(10) NOT NULL,
  `height` int(5) NOT NULL,
  `weight` int(5) NOT NULL,
  `date_of_birth` varchar(10) NOT NULL,
  `age` int(5) NOT NULL,
  `city_mun_pob` varchar(40) NOT NULL,
  `province_pob` varchar(40) NOT NULL,
  `city_mun_address` varchar(40) NOT NULL,
  `province_address` varchar(40) NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `citizenship` varchar(40) NOT NULL,
  `religion` varchar(40) NOT NULL,
  `language_spoken` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`person_id`, `image_name`, `firstname`, `middlename`, `lastname`, `extension`, `gender`, `civil_status`, `favorite_color`, `height`, `weight`, `date_of_birth`, `age`, `city_mun_pob`, `province_pob`, `city_mun_address`, `province_address`, `phone_number`, `email`, `citizenship`, `religion`, `language_spoken`) VALUES
('61b2cda8b07bf2.35227923', 'profile_61b2cda8b03823.26609605.jpeg', 'Jhone', 'N/A', 'Doe', 'Jr.', 'male', 'single', '#9e9e9e', 5, 62, '1994-10-29', 0, 'Bayugan City', 'Agusan del Sur', 'Bayugan City', 'Agusan del Sur', 9506866597, 'jhone@gmail.com', 'Filipino', 'Catholic', 'Tagalog, Bisaya,English'),
('61b361d369bbf6.51315902', 'profile_61b361d3694a60.11047725.jpeg', 'Jane', 'N/A', 'Doe', '', 'female', 'single', '#e316dd', 5, 62, '1998-11-15', 23, 'Bayugan City', 'Agusan del Sur', 'Bayugan City', 'Agusan del Sur', 9506866597, 'jane12@gmail.com', 'Filipino', 'Catholic', 'Taglog'),
('61b422d7737659.44772847', 'profile_61b422d77329e9.86965459.jpeg', 'Juan', 'Dela', 'Cruz', '', 'male', 'married', '#a6b5b2', 5, 62, '1997-10-04', 24, 'Malolos', 'Bulacan', 'Malolos', 'Bulacan', 9506866597, 'juan123@gmail.com', 'Filipino', 'Catholic', 'Tagalog, Bisaya'),
('61b562e911b776.45399019', 'profile_61b562e9073590.15421212.jpeg', 'Vanesa', 'Gordon', 'Hernandez', '', 'female', 'married', '#00babd', 171, 65, '1992-12-09', 29, 'Malaybalay', 'Bukidnon', 'Malaybalay', 'Bukidnon', 9285523151, 'vanesa234@gmail.com', 'Filipino', 'Born Again', 'Tagalog, Bisaya, English'),
('61b56b139f3691.00275097', 'profile_61b56b139ec4a0.33840456.jpeg', 'Rochelle', 'Sag-od', 'Rocero', '', 'female', 'single', '#fd91d5', 175, 63, '1999-10-13', 22, 'Bayugan City', 'Agusan del Sur', 'Bayugan City', 'Agusan del Sur', 9285523151, 'rochelle214@gmail.com', 'Filipino', 'Catholic', 'Tagalog, Bisaya, English'),
('61c5300fdbb1a1.82215000', 'profile_61c539904a2329.18397429.jpeg', 'Jason', 'Encabo', 'Divino', 'Jr.', 'male', 'married', '#aaeee3', 156, 59, '1993-02-01', 28, 'Barobo', 'Surigao del Sur', 'Barobo', 'Surigao del Sur', 9506862345, 'jason1434@gmail.com', 'Filipino', 'Catholic', 'Tagalog, Bisaya, English');

-- --------------------------------------------------------

--
-- Table structure for table `spouse`
--

CREATE TABLE `spouse` (
  `person_id` varchar(40) NOT NULL,
  `spouse_fname` varchar(40) NOT NULL,
  `spouse_mname` varchar(40) NOT NULL,
  `spouse_lname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spouse`
--

INSERT INTO `spouse` (`person_id`, `spouse_fname`, `spouse_mname`, `spouse_lname`) VALUES
('61b2cda8b07bf2.35227923', '', '', ''),
('61b361d369bbf6.51315902', '', '', ''),
('61b422d7737659.44772847', 'Juan', 'Dela', 'Cruz'),
('61b562e911b776.45399019', 'Junrey', 'Santos', 'Hernandez'),
('61b56b139f3691.00275097', '', '', ''),
('61c5300fdbb1a1.82215000', 'Lovely', 'Doe', 'Divino');

-- --------------------------------------------------------

--
-- Table structure for table `w_experience`
--

CREATE TABLE `w_experience` (
  `person_id` varchar(40) NOT NULL,
  `company_name` varchar(40) NOT NULL,
  `position` varchar(40) NOT NULL,
  `years_experience` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `w_experience`
--

INSERT INTO `w_experience` (`person_id`, `company_name`, `position`, `years_experience`) VALUES
('61b2cda8b07bf2.35227923', 'Facebook', 'Software Engineer', 4),
('61b361d369bbf6.51315902', 'Accentures', 'Software Engineer', 4),
('61b422d7737659.44772847', 'DepEd Philippines', 'Teacher III Filipino Major', 4),
('61b562e911b776.45399019', 'Accenture', 'Software Engineer', 3),
('61b56b139f3691.00275097', 'Jollibee', 'Sales Lady', 2),
('61c5300fdbb1a1.82215000', 'Apple', 'Software Developer', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `educ_record`
--
ALTER TABLE `educ_record`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `spouse`
--
ALTER TABLE `spouse`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `w_experience`
--
ALTER TABLE `w_experience`
  ADD PRIMARY KEY (`person_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `educ_record`
--
ALTER TABLE `educ_record`
  ADD CONSTRAINT `personnel_educ_record` FOREIGN KEY (`person_id`) REFERENCES `personnel` (`person_id`);

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `personnel_parents` FOREIGN KEY (`person_id`) REFERENCES `personnel` (`person_id`);

--
-- Constraints for table `spouse`
--
ALTER TABLE `spouse`
  ADD CONSTRAINT `personnel_spouse` FOREIGN KEY (`person_id`) REFERENCES `personnel` (`person_id`);

--
-- Constraints for table `w_experience`
--
ALTER TABLE `w_experience`
  ADD CONSTRAINT `personnel_w_experience` FOREIGN KEY (`person_id`) REFERENCES `personnel` (`person_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
