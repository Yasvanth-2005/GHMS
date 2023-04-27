-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 10:35 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ghms`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id_number` varchar(255) NOT NULL,
  `date_of_request` varchar(255) NOT NULL,
  `complaint_type` varchar(255) NOT NULL,
  `other` varchar(255) DEFAULT NULL,
  `hostel_block` varchar(255) NOT NULL,
  `rno` varchar(255) NOT NULL,
  `complaint_desc` varchar(255) NOT NULL,
  `complaint_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id_number`, `date_of_request`, `complaint_type`, `other`, `hostel_block`, `rno`, `complaint_desc`, `complaint_status`, `created_at`) VALUES
('N210368', '25-04-2023', 'Plumbing', '', 'K1', 'FF-30', 'Yash', 'Pending', '2023-04-25 08:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_attendance`
--

CREATE TABLE `hostel_attendance` (
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` varchar(255) NOT NULL,
  `hostel` varchar(255) NOT NULL,
  `attendance_sheet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel_attendance`
--

INSERT INTO `hostel_attendance` (`created_at`, `date`, `hostel`, `attendance_sheet`) VALUES
('2023-04-25 08:34:28', '25-04-2023', 'K1', '25-04-2023-K1-644790948e97f2.80162372.exe');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id_number` varchar(255) NOT NULL,
  `date_of_request` varchar(255) NOT NULL,
  `leave_from` varchar(255) NOT NULL,
  `leave_to` varchar(255) NOT NULL,
  `leave_type` varchar(255) NOT NULL,
  `reason` varchar(400) NOT NULL,
  `leave_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id_number`, `date_of_request`, `leave_from`, `leave_to`, `leave_type`, `reason`, `leave_status`, `created_at`) VALUES
('N210368', '25-04-2023', '31-03-2023', '15-04-2023', 'sick-leave', 'wfa', 'Granted', '2023-04-25 08:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `date` varchar(255) NOT NULL,
  `title` varchar(25) NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `long_desc` varchar(2000) NOT NULL,
  `links` varchar(2000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`date`, `title`, `short_desc`, `long_desc`, `links`, `created_at`) VALUES
('April 25', 'dwasdhkd sgh, f ff f f', 'sfsfvdb fg f gsdfe dfv sv bfbvcfg ', 'qeesf cv xffvx ; dgsdx gdgv gbhsdxbbr vndvnkj bhdbv bjd jsdfn jandalks mad aksn d w nksndka n aj, ; anfcjsnfc nakasn njsncjkas nkas kjan ckmf jfn jkankjm dlmlkf lm nalamf nlaf la flaf nlawknfkn  amslkmc akl almv lkmlaksfmdwlk fmlkasmf  k', 'https://www.youtube.com', '2023-04-25 08:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `staff_registrations`
--

CREATE TABLE `staff_registrations` (
  `staff_position` varchar(255) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date_of_joining` date NOT NULL,
  `date_of_birth` date NOT NULL,
  `phno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_registrations`
--

INSERT INTO `staff_registrations` (`staff_position`, `staff_name`, `username`, `date_of_joining`, `date_of_birth`, `phno`, `email`, `photo`, `password`) VALUES
('caretaker', 'Doddi Gowtham Babu', 'gowtham', '0000-00-00', '0000-00-00', '1234567890', 'yasvanthhanumantu1@gmail.com', 'gowtham-64478e627e7b17.87721585.png', 'aaa'),
('dsw', 'Yasvanth Hanumantu', 'yash', '2023-04-12', '2023-04-27', '5675675677', 'hdoasjbdlk@gmail.com', '', 'yash');

-- --------------------------------------------------------

--
-- Table structure for table `student_registrations`
--

CREATE TABLE `student_registrations` (
  `id_number` varchar(7) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `academic_block` varchar(255) NOT NULL,
  `class_room` varchar(255) NOT NULL,
  `hostel_block` varchar(3) NOT NULL,
  `hostel_room` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `gaurdian_name` varchar(255) NOT NULL,
  `mother_phno` varchar(10) NOT NULL,
  `father_phno` varchar(10) NOT NULL,
  `gaurdian_phno` varchar(10) NOT NULL,
  `student_phno` varchar(10) NOT NULL,
  `state` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `mandal` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `pin_code` varchar(6) NOT NULL,
  `password` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_registrations`
--

INSERT INTO `student_registrations` (`id_number`, `student_name`, `academic_year`, `branch`, `academic_block`, `class_room`, `hostel_block`, `hostel_room`, `blood_group`, `mother_name`, `father_name`, `gaurdian_name`, `mother_phno`, `father_phno`, `gaurdian_phno`, `student_phno`, `state`, `district`, `mandal`, `village`, `street`, `pin_code`, `password`) VALUES
('N210368', 'Yasvanth Hanumantu', 'Engineering-1', 'CSE', 'AB-I', 'CS-06', 'K2', 'FF-32', 'B+', 'Hanumantu Laxmi', 'Hanumantu Venkata Ramana', 'Uppada veerayya', '8330930503', '8330930503', '8330930503', '', 'Andhra Pradesh', 'Srikakulam', 'Tekkali', 'Tekkali', 'edo okati', '533201', 'yash'),
('N210522', 'Sribabu', 'PUC-1', 'PUC', 'AB-I', 'cs-06', 'K1', 'ff-80a', 'B+', 'Sailaja', 'Satyanarayana', 'Balaju', '9553018167', '9505708676', '1234567890', '6303738847', 'Ap', 'Wg', 'Nidamarru', 'Tk', '13a', '534406', 'Bh-%k1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff_registrations`
--
ALTER TABLE `staff_registrations`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `student_registrations`
--
ALTER TABLE `student_registrations`
  ADD UNIQUE KEY `id_number` (`id_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
