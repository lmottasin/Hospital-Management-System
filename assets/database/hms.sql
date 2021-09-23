-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 08:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `salary` int(6) NOT NULL,
  `role` varchar(20) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `join_date` date NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `updated_at` varchar(20) DEFAULT NULL,
  `created_at` varchar(20) NOT NULL DEFAULT current_timestamp(),
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `salary`, `role`, `phone_number`, `join_date`, `status`, `updated_at`, `created_at`, `password`) VALUES
(1, 'Md. Mottasin Lemon', 20000, 'doctor', '01959211329', '2020-09-10', 'active', NULL, '2021-09-21 16:03:00', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `id` int(10) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `age` int(3) NOT NULL,
  `blood_group` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `created_at` varchar(20) NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(20) DEFAULT NULL,
  `patient_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`id`, `phone_number`, `address`, `age`, `blood_group`, `password`, `status`, `created_at`, `updated_at`, `patient_name`) VALUES
(40, '01780976220', 'Gaibandha.', 20, 'A+', '1234', 'active', '2021-09-23 12:39:56', '2021-09-23 12:40:18', 'Mottasin Lemon');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(10) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `payment_status` varchar(11) NOT NULL DEFAULT 'NOT PAID',
  `created_at` varchar(20) NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(20) DEFAULT NULL,
  `patient_id` int(10) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `payment_amount` int(10) NOT NULL,
  `txd_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `file_name`, `payment_status`, `created_at`, `updated_at`, `patient_id`, `doctor_id`, `payment_amount`, `txd_id`) VALUES
(16, '730ce38a7455538f93cdd2848ede7bb2Md. Mottasin Lemon.pdf', 'PAID', '2021-09-23 20:56:21', '2021-09-23 23:27:22', 40, 1, 0, 'SSLCZ_TEST_614cb8f9f254b'),
(17, '3cb50ffb3fc30f7726e36c4423680bc8Md. Mottasin Lemon.pdf', 'NOT PAID', '2021-09-23 21:01:24', '2021-09-23 23:27:22', 40, 1, 0, 'SSLCZ_TEST_614cb8f9f254b'),
(18, '4b4f5c73f727434621439a8ce7f8690cMd. Mottasin Lemon.pdf', 'PAID', '2021-09-23 21:03:24', '2021-09-23 23:43:15', 40, 1, 0, 'SSLCZ_TEST_614cbcb363f2e'),
(19, 'f17da2f15760e0f284ebb4d653dda520Md. Mottasin Lemon.pdf', 'PAID', '2021-09-23 21:03:47', '2021-09-23 23:27:22', 40, 1, 0, 'SSLCZ_TEST_614cb8f9f254b'),
(20, '93dd05ef253d9068d63c99703c4ede1cMd. Mottasin Lemon.pdf', 'PAID', '2021-09-23 21:04:10', '2021-09-23 23:27:22', 40, 1, 0, 'SSLCZ_TEST_614cb8f9f254b'),
(21, '705310b14258912609c71142895d41e8Md. Mottasin Lemon.pdf', 'PAID', '2021-09-23 21:06:18', '2021-09-23 23:27:22', 40, 1, 0, 'SSLCZ_TEST_614cb8f9f254b'),
(22, 'cd0c14acf976abb7f7116e954aafb493Md. Mottasin Lemon.pdf', 'PAID', '2021-09-23 21:10:08', '2021-09-23 23:27:22', 40, 1, 0, 'SSLCZ_TEST_614cb8f9f254b'),
(23, '1b542afaafa93acf4837336823d208e1Md. Mottasin Lemon.pdf', 'PAID', '2021-09-23 21:11:27', '2021-09-23 23:27:22', 40, 1, 0, 'SSLCZ_TEST_614cb8f9f254b'),
(24, 'd28a91de6dfa0c98f057335161f6594fMd. Mottasin Lemon.pdf', 'PAID', '2021-09-23 21:12:27', '2021-09-23 23:27:22', 40, 1, 0, 'SSLCZ_TEST_614cb8f9f254b'),
(25, 'e2e22e8a727b4a6e9c6ef85eeef436c8Md. Mottasin Lemon.pdf', 'PAID', '2021-09-23 21:13:00', '2021-09-23 23:27:22', 40, 1, 0, 'SSLCZ_TEST_614cb8f9f254b'),
(26, 'f0c99a1821df20519ef232dc3ee8a4feMd__Mottasin_Lemon.pdf', 'PAID', '2021-09-23 22:36:33', '2021-09-23 23:53:23', 40, 1, 500, 'SSLCZ_TEST_614cbf13731ce'),
(27, 'f87f4d37c67fa7566aa6142a0dee7609Md__Mottasin_Lemon.pdf', 'NOT PAID', '2021-09-23 23:58:22', NULL, 40, 1, 500, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_info` (`id`),
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `employee` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
