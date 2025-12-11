-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2025 at 03:32 PM
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
-- Database: `irms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gender_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_id`, `name`) VALUES
(0, 'Unspecified'),
(1, 'Male'),
(2, 'Female'),
(3, 'Transgender'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `incident`
--

CREATE TABLE `incident` (
  `incident_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `odiongan_barangay_id` int(10) UNSIGNED NOT NULL,
  `sub_location` varchar(100) DEFAULT NULL,
  `date_of_incident` date NOT NULL,
  `date_reported` date NOT NULL DEFAULT current_timestamp(),
  `date_investigation_started` date DEFAULT NULL,
  `date_resolved` date DEFAULT NULL,
  `incident_status_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `incident`
--

INSERT INTO `incident` (`incident_id`, `title`, `description`, `odiongan_barangay_id`, `sub_location`, `date_of_incident`, `date_reported`, `date_investigation_started`, `date_resolved`, `incident_status_id`) VALUES
(5, 'Bon Bakery Fire', 'The Bon Bakery was on fire because of a faulty oven.', 2, 'Building #12', '2025-02-15', '2025-02-15', '2025-03-15', '2025-04-15', 2),
(7, 'Hala', 'away', 2, 'Court', '2025-12-11', '2025-12-11', '2025-12-11', '2025-12-11', 0),
(8, 'Oh my Gah', 'hello', 0, '', '0000-00-00', '2025-12-11', '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `incident_status`
--

CREATE TABLE `incident_status` (
  `incident_status_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `incident_status`
--

INSERT INTO `incident_status` (`incident_status_id`, `name`) VALUES
(0, 'None'),
(1, 'Not Started'),
(2, 'Ongoing'),
(3, 'Resolved'),
(4, 'Cancelled'),
(5, 'On Hold');

-- --------------------------------------------------------

--
-- Table structure for table `involved_person`
--

CREATE TABLE `involved_person` (
  `involved_person_id` int(10) UNSIGNED NOT NULL,
  `person_id` int(10) UNSIGNED NOT NULL,
  `incident_id` int(10) UNSIGNED NOT NULL,
  `involvement_type_id` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `involved_person`
--

INSERT INTO `involved_person` (`involved_person_id`, `person_id`, `incident_id`, `involvement_type_id`, `description`) VALUES
(1, 7, 5, 5, ''),
(2, 18, 5, 2, 'Cry'),
(3, 17, 5, 1, 'Nagreport');

-- --------------------------------------------------------

--
-- Table structure for table `involvement_type`
--

CREATE TABLE `involvement_type` (
  `involvement_type_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(12) NOT NULL,
  `description` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `involvement_type`
--

INSERT INTO `involvement_type` (`involvement_type_id`, `name`, `description`) VALUES
(0, 'Participant', 'One who is generally involved in the incident without a specific type.'),
(1, 'Reporter', 'One who reported the incident.'),
(2, 'Affected', 'One who is affected by the incident such as the victim or the complainer.'),
(3, 'Responsible', 'One who is responsible for the incident such as the respondent, suspect, offender, or defendant.'),
(4, 'Witness', 'One who observed or witnessed the incident.'),
(5, 'Handler', 'One who handled the incident such as the investigator.');

-- --------------------------------------------------------

--
-- Table structure for table `odiongan_barangay`
--

CREATE TABLE `odiongan_barangay` (
  `odiongan_barangay_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `odiongan_barangay`
--

INSERT INTO `odiongan_barangay` (`odiongan_barangay_id`, `name`) VALUES
(0, 'Unknown Odiongan Barangay'),
(1, 'Amatong'),
(2, 'Anahao'),
(3, 'Bangon'),
(4, 'Batiano'),
(5, 'Budiong'),
(6, 'Canduyong'),
(7, 'Dapawan'),
(8, 'Gabawan'),
(9, 'Libertad'),
(10, 'Ligaya'),
(11, 'Liwanag'),
(12, 'Liwayway'),
(13, 'Malilico'),
(14, 'Mayha'),
(15, 'Panique'),
(16, 'Pato-o'),
(17, 'Poctoy'),
(18, 'Progreso Este'),
(19, 'Progreso Weste'),
(20, 'Rizal'),
(21, 'Tabing Dagat'),
(22, 'Tabobo-an'),
(23, 'Tuburan'),
(24, 'Tumingad'),
(25, 'Tulay');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `person_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender_id` int(10) UNSIGNED NOT NULL DEFAULT 5,
  `odiongan_barangay_id` int(10) UNSIGNED NOT NULL,
  `sub_location` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `face_image_file` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `gender_id`, `odiongan_barangay_id`, `sub_location`, `occupation`, `face_image_file`) VALUES
(7, 'Carlos', 'Herve', 'Sainz', '2003-08-17', 1, 3, 'Sitio Sikat-Araw', 'Student', '../../uploads/693ad45b39d917.93640634.jpg'),
(11, 'Charles', 'Perceval', 'Leclerc', '1997-10-16', 1, 13, NULL, 'Convenience Store Manager', ''),
(12, 'Max', 'Emilian', 'Verstappen', '1997-09-30', 1, 3, NULL, 'Professor', ''),
(13, 'Oscar', 'Jack', 'Piastri', '2001-04-06', 1, 12, NULL, 'Policeman', ''),
(14, 'Alexander', 'Philippe', 'Albon', '1996-03-23', 1, 15, NULL, 'Property Insurance Claims Adjuster', ''),
(15, 'Isack', 'Alexandre', 'Hadjar', '2004-09-28', 1, 9, NULL, 'Vehicle Insurance Claims Adjuster', ''),
(16, 'Erica', 'Makaluma', 'Basilio', '2003-08-01', 2, 7, NULL, 'Baker/Bakery Manager', ''),
(17, 'Kyla', 'Ng', 'Corpuz', '1995-03-10', 2, 7, NULL, 'Baker', ''),
(18, 'Ridz', 'Coloma', 'Soriano', '2003-08-17', 0, 1, 'House #1', 'Student', ''),
(19, 'Rfael', 'Coloma', 'Soriano', '2025-12-01', 0, 0, 'Court', 'Student', ''),
(20, 'Liam', 'Carlson', 'Liam Lawson', '2003-02-01', 0, 0, 'House #95', 'Student', ''),
(21, 'Liam', 'Carlson', 'Liam Lawson', '2003-02-01', 0, 0, 'House #95', 'Student', ''),
(22, 'Liam', 'Carlson', 'Liam Lawson', '2003-02-01', 0, 0, 'House #95', 'Student', ''),
(23, 'Liam', 'Carlson', 'Liam Lawson', '2003-02-01', 0, 0, 'House #95', 'Student', ''),
(24, 'Liam', '', 'Lawson', '0000-00-00', 0, 0, '', '', ''),
(25, 'Liam', '', 'Lawson', '0000-00-00', 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `system_user`
--

CREATE TABLE `system_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `person_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `system_user`
--

INSERT INTO `system_user` (`user_id`, `person_id`, `username`, `password`, `created_at`, `is_admin`) VALUES
(1, 7, 'Smooth Operator', '$2y$12$qFgoG3hUo5HGg2HHnTtcje3WpHWs4sKqpksn3ahF5YupKhkZcQBqG', '2025-11-30', 0),
(2, 17, 'Ridz Ridz', '$2y$12$FyNdATyg5ByYKLAmCxxzTedzMsyovf/w/5YBbm1B3dNJf2ywW6ULq', '2025-12-11', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `incident`
--
ALTER TABLE `incident`
  ADD PRIMARY KEY (`incident_id`),
  ADD KEY `odiongan_barangay_id` (`odiongan_barangay_id`),
  ADD KEY `incident_status_id` (`incident_status_id`);

--
-- Indexes for table `incident_status`
--
ALTER TABLE `incident_status`
  ADD PRIMARY KEY (`incident_status_id`);

--
-- Indexes for table `involved_person`
--
ALTER TABLE `involved_person`
  ADD PRIMARY KEY (`involved_person_id`),
  ADD UNIQUE KEY `composite_unique_incident_person_involvement_type` (`incident_id`,`person_id`,`involvement_type_id`),
  ADD KEY `involvement_type_id_ref` (`involvement_type_id`),
  ADD KEY `person_id_ref` (`person_id`);

--
-- Indexes for table `involvement_type`
--
ALTER TABLE `involvement_type`
  ADD PRIMARY KEY (`involvement_type_id`);

--
-- Indexes for table `odiongan_barangay`
--
ALTER TABLE `odiongan_barangay`
  ADD PRIMARY KEY (`odiongan_barangay_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`person_id`),
  ADD KEY `odiongan_barangay_id` (`odiongan_barangay_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `system_user`
--
ALTER TABLE `system_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `person_id` (`person_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `incident`
--
ALTER TABLE `incident`
  MODIFY `incident_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `incident_status`
--
ALTER TABLE `incident_status`
  MODIFY `incident_status_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `involved_person`
--
ALTER TABLE `involved_person`
  MODIFY `involved_person_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `involvement_type`
--
ALTER TABLE `involvement_type`
  MODIFY `involvement_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `odiongan_barangay`
--
ALTER TABLE `odiongan_barangay`
  MODIFY `odiongan_barangay_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `person_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `system_user`
--
ALTER TABLE `system_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `incident`
--
ALTER TABLE `incident`
  ADD CONSTRAINT `incident_ibfk_1` FOREIGN KEY (`odiongan_barangay_id`) REFERENCES `odiongan_barangay` (`odiongan_barangay_id`),
  ADD CONSTRAINT `incident_ibfk_2` FOREIGN KEY (`incident_status_id`) REFERENCES `incident_status` (`incident_status_id`);

--
-- Constraints for table `involved_person`
--
ALTER TABLE `involved_person`
  ADD CONSTRAINT `incident_id_ref` FOREIGN KEY (`incident_id`) REFERENCES `incident` (`incident_id`),
  ADD CONSTRAINT `involvement_type_id_ref` FOREIGN KEY (`involvement_type_id`) REFERENCES `involvement_type` (`involvement_type_id`),
  ADD CONSTRAINT `person_id_ref` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`);

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`odiongan_barangay_id`) REFERENCES `odiongan_barangay` (`odiongan_barangay_id`),
  ADD CONSTRAINT `person_ibfk_2` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`gender_id`);

--
-- Constraints for table `system_user`
--
ALTER TABLE `system_user`
  ADD CONSTRAINT `system_user_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
