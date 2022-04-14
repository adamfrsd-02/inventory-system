-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 07:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rohs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_document`
--

CREATE TABLE `tb_document` (
  `id_document` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `document_title` varchar(255) NOT NULL,
  `document_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_document`
--

INSERT INTO `tb_document` (`id_document`, `id_user`, `document_title`, `document_name`) VALUES
(3, 1, 'Job Vacancy', 'absensi.docx');

-- --------------------------------------------------------

--
-- Table structure for table `tb_material`
--

CREATE TABLE `tb_material` (
  `id_material` int(12) NOT NULL,
  `id_material_type` int(12) NOT NULL,
  `part_name` varchar(100) NOT NULL,
  `part_number` int(10) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `lego_design_no` int(10) NOT NULL,
  `ss_code` varchar(100) NOT NULL,
  `accesibility_status` enum('Accessible','Not Accessible') NOT NULL,
  `lab_test_date` datetime NOT NULL,
  `expired_time` datetime NOT NULL,
  `psh3_chemical` enum('Standard','Risk') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_material`
--

INSERT INTO `tb_material` (`id_material`, `id_material_type`, `part_name`, `part_number`, `model_name`, `supplier`, `lego_design_no`, `ss_code`, `accesibility_status`, `lab_test_date`, `expired_time`, `psh3_chemical`) VALUES
(20, 3, 'Chain', 333, 'CH-215', 'PT. Mechanical Engineering', 442, '44', 'Accessible', '2022-04-10 14:06:00', '2022-04-30 14:06:00', 'Standard');

-- --------------------------------------------------------

--
-- Table structure for table `tb_material_type`
--

CREATE TABLE `tb_material_type` (
  `id_type` int(12) NOT NULL,
  `material_type` varchar(100) NOT NULL,
  `own_type` enum('Make','Buy') NOT NULL,
  `supplier_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_material_type`
--

INSERT INTO `tb_material_type` (`id_type`, `material_type`, `own_type`, `supplier_name`) VALUES
(3, 'Nylon', 'Make', 'PT. Tunasbangsa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(12) NOT NULL,
  `id_user_profile` int(12) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_user_profile`, `username`, `password`, `user_type`) VALUES
(1, 7, 'admin', 'admin', 'Admin'),
(6, 15, 'user', '123456', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_profile`
--

CREATE TABLE `tb_user_profile` (
  `id_user_profile` int(12) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_profile`
--

INSERT INTO `tb_user_profile` (`id_user_profile`, `fullname`, `department`, `phone_number`) VALUES
(7, 'Adam Firdaus', 'IT System', '0871264311'),
(15, 'Yulia Wulandari', 'Quality Check', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_document`
--
ALTER TABLE `tb_document`
  ADD PRIMARY KEY (`id_document`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_material`
--
ALTER TABLE `tb_material`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `id_material_type` (`id_material_type`);

--
-- Indexes for table `tb_material_type`
--
ALTER TABLE `tb_material_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user_profile` (`id_user_profile`);

--
-- Indexes for table `tb_user_profile`
--
ALTER TABLE `tb_user_profile`
  ADD PRIMARY KEY (`id_user_profile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_document`
--
ALTER TABLE `tb_document`
  MODIFY `id_document` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_material`
--
ALTER TABLE `tb_material`
  MODIFY `id_material` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_material_type`
--
ALTER TABLE `tb_material_type`
  MODIFY `id_type` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user_profile`
--
ALTER TABLE `tb_user_profile`
  MODIFY `id_user_profile` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_document`
--
ALTER TABLE `tb_document`
  ADD CONSTRAINT `tb_document_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_material`
--
ALTER TABLE `tb_material`
  ADD CONSTRAINT `tb_material_ibfk_1` FOREIGN KEY (`id_material_type`) REFERENCES `tb_material_type` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_user_profile`) REFERENCES `tb_user_profile` (`id_user_profile`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
