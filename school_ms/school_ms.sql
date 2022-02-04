-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2022 at 05:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `cls_name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `cls_name`) VALUES
(1, '1st'),
(2, '2nd'),
(3, 'my_class'),
(4, '4th'),
(5, '5ths'),
(6, '6th'),
(7, '7th'),
(8, '8th'),
(9, '9th'),
(10, '10th'),
(11, '11th'),
(15, 'Bechelors'),
(16, 'Masters'),
(17, 'PHD'),
(18, '12th'),
(20, 'BA'),
(22, '1st'),
(23, 'we'),
(24, '34');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(1, 'male'),
(2, 'female'),
(3, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `merital_status`
--

CREATE TABLE `merital_status` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merital_status`
--

INSERT INTO `merital_status` (`id`, `name`) VALUES
(1, 'single'),
(2, 'married'),
(3, 'divorce'),
(4, 'widow');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`id`, `name`) VALUES
(2, 'BA.'),
(3, 'Matric'),
(4, 'Inter'),
(5, 'm.phil'),
(6, 'masters'),
(7, ''),
(8, 'dasdasd'),
(9, 'sasd'),
(10, 'saSA'),
(11, 'php-2'),
(12, 'sdasd'),
(13, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `std_fees`
--

CREATE TABLE `std_fees` (
  `id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `fees_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `std_fees`
--

INSERT INTO `std_fees` (`id`, `std_id`, `fees_id`, `created_at`) VALUES
(32, 17, 2000, '2022-02-01 19:11:15'),
(34, 16, 3000, '2022-02-03 08:55:21'),
(35, 22, 2000, '2022-02-03 09:01:15'),
(36, 22, 2000, '2022-02-03 13:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fees` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_of_admission` date NOT NULL DEFAULT current_timestamp(),
  `qualification` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `merital_id` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `phone_no` varchar(13) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `fees`, `date_of_birth`, `date_of_admission`, `qualification`, `age`, `merital_id`, `gender`, `phone_no`, `address`) VALUES
(16, 'Fatima', 'khan', 3000, '2022-01-31', '2022-01-31', 2, 22, 2, 2, '03341878316', 'Heerabad'),
(22, 'kamran', 'shaikh', 2000, '2022-02-02', '2022-02-16', 1, 12, 4, 1, '03341878316', 'dlashfasjfsdkf');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`) VALUES
(1, 'english'),
(2, 'urdu'),
(3, 'islamiyat'),
(4, 'physics'),
(5, 'chemistry'),
(6, 'biology');

-- --------------------------------------------------------

--
-- Table structure for table `tchr_salary`
--

CREATE TABLE `tchr_salary` (
  `id` int(11) NOT NULL,
  `tchr_id` int(11) NOT NULL,
  `salary_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tchr_salary`
--

INSERT INTO `tchr_salary` (`id`, `tchr_id`, `salary_id`, `created_at`) VALUES
(19, 15, 20000, '2022-02-01'),
(22, 13, 18000, '2022-02-01'),
(23, 16, 20000, '2022-02-01'),
(24, 18, 18000, '2022-02-01'),
(25, 8, 30000, '2022-02-01'),
(30, 26, 15000, '2022-02-02'),
(31, 26, 15000, '2022-02-02'),
(32, 0, 0, '2022-02-02'),
(33, 0, 0, '2022-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `qualification` int(11) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `marital_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `salary` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `fname`, `lname`, `age`, `qualification`, `gender`, `phone_no`, `address`, `marital_id`, `subject_id`, `class_id`, `salary`) VALUES
(24, 'John', 'ahmed', 44, 3, '3', '03341878316', 'karachi', 2, 4, 15, '30000'),
(26, 'test', 'test', 20, 2, '1', '03012839303', 'asfnsvdfhjkl', 2, 1, 1, '15000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `password`) VALUES
(1, 'Bilal', 'Ahmed', 'admin', '0192023a7bbd73250516f069df18b500'),
(12, 'hamad', 'jalil', 'admin', '12345'),
(13, 'sdf', 'sdf', 'test', '%3Bsdf'),
(14, 'admin', 'sdfsdsdf', 'sdfsdf', 'ddsfsd'),
(15, 'John', 'abro', 'bilal135', 'ghghghg'),
(19, 'dasdad', 'asdasd', 'asdasd', '3f929873c4340cd29b414d0263d77b8d'),
(20, 'asd', 'asd', 'asd', '7815696ecbf1c96e6894b779456d330e'),
(21, 'asdasd', 'asdsd', 'asdas', 'b5b037a78522671b89a2c1b21d9b80c6'),
(22, '089w', '30489', '230489', '827ccb0eea8a706c4c34a16891f84e7b'),
(23, 'asd', 'drer', '324', 'faa9afea49ef2ff029a833cccc778fd0'),
(24, '323', '321', '312', 'c854a6b52a6d1455169cdf56f02d02e3'),
(25, 'ssfsdf', 'sdfsdfd', '3432', '468171c825c02408cc99935447c785a5'),
(26, 'asd', 'asd', 'admin765432', '0aa1ea9a5a04b78d4581dd6d17742627'),
(27, 'John', 'ahmed', 'lele', '8812662dcf3e5db0247c0f85909363fc'),
(28, 'adssd', 'asdas', 'acha%20g', '3f76818f507fe7eb6422bd0703c64c88'),
(29, 'saa', 'as', 'as', 'd132c0567a5964930f9ee5f14e779e32'),
(30, 'aSA', 'ASA', '76543', '4f714c73db5191f3a71a380cba8843ed'),
(31, '345234', '345', '2342', '418806da363b5b57199e5a9f88fc69c3'),
(32, '1212121', 'abro', 'loi', '7b0c61c4ad2c8d4a9268ea2d784027f0'),
(33, '%20%20%20%20%20likpo', 'ioj%20%20%20%20%20%20%20%20%20%20', 'jjkjkljkl', 'fa0791510a5442d2a93202feab07a773');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merital_status`
--
ALTER TABLE `merital_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_fees`
--
ALTER TABLE `std_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tchr_salary`
--
ALTER TABLE `tchr_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `merital_status`
--
ALTER TABLE `merital_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `std_fees`
--
ALTER TABLE `std_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tchr_salary`
--
ALTER TABLE `tchr_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
