-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 15, 2023 at 06:22 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baliwagc_aics_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal_bite_form`
--

CREATE TABLE `animal_bite_form` (
  `abf_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `biting_animal` varchar(50) NOT NULL,
  `pet_type` varchar(50) NOT NULL,
  `place` varchar(150) NOT NULL,
  `exposure` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `animal_status` varchar(50) NOT NULL,
  `prophylaxis` varchar(50) NOT NULL,
  `washing` varchar(50) NOT NULL,
  `generic_name` varchar(50) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `route` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `animal_bite_form`
--

INSERT INTO `animal_bite_form` (`abf_id`, `transaction_id`, `biting_animal`, `pet_type`, `place`, `exposure`, `category`, `animal_status`, `prophylaxis`, `washing`, `generic_name`, `brand_name`, `route`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 3, 'Quasi quia dolor mol', 'Unvaccinated', 'Tempor exercitation ', 'Est consequatur Eu', 'Category 1', 'Dead', 'Post-Exposure Prophylaxis', 'Proident quia ea ve', 'Jaime Gill', 'Alexa Richard', 'IM', '0000-00-00 00:00:00', 9, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assistance_list`
--

CREATE TABLE `assistance_list` (
  `assistance_id` int(11) NOT NULL,
  `assistance_name` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assistance_list`
--

INSERT INTO `assistance_list` (`assistance_id`, `assistance_name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'Animal Bite', '2023-08-13 19:26:07', 1, NULL, NULL, NULL),
(2, 'Financial Assistance', '2023-08-13 19:26:07', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `partner_id` int(11) NOT NULL,
  `partner_name` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`partner_id`, `partner_name`, `created_at`, `created_by`, `deleted_at`) VALUES
(1, 'Partner 1', '2023-08-13 19:13:13', 1, NULL),
(2, 'Partner 2', '2023-08-13 19:13:13', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `qrcode` varchar(50) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `assistance_given` varchar(250) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `recommendations` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `qrcode`, `client_name`, `partner_id`, `assistance_given`, `amount`, `recommendations`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, '123abc', 'Egie Santos', 1, '1', '300', 'Transaction 1', '2023-08-13 20:08:29', 4, NULL, NULL, NULL),
(2, '123abc', 'Egie Santos', 2, '2', '200.00', '200 lang po dapat.', '2023-08-13 20:10:41', 4, NULL, NULL, NULL),
(3, 'RGC-281942-200915', 'Richter Jr Cortez', 2, '1', '500.00', 'Wag ka na uulit!', '2023-08-13 22:26:58', 4, NULL, NULL, NULL),
(4, 'RGC-281942-200915', 'Richter Jr Cortez', 2, '2', '800.00', 'Umulit ka nanaman!', '2023-08-13 23:35:49', 4, NULL, NULL, NULL),
(5, 'RGC-281942-200915', 'Richter Jr Cortez', 1, '1', '100.00', 'sample rec', '2023-08-14 13:51:47', 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_logs`
--

CREATE TABLE `transaction_logs` (
  `tl_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `actor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_logs`
--

INSERT INTO `transaction_logs` (`tl_id`, `transaction_id`, `remarks`, `created_at`, `created_by`, `actor`) VALUES
(1, 1, 'Added record for Egie Santos', '2023-08-13 20:08:29', 4, 'Florence Alcantara'),
(2, 2, 'Added record for Egie Santos', '2023-08-13 20:10:41', 4, 'Florence Alcantara'),
(3, 3, 'Added record for Richter Jr Cortez', '2023-08-13 22:26:58', 4, 'Florence Alcantara'),
(4, 4, 'Added record for Richter Jr Cortez', '2023-08-13 23:35:49', 4, 'Florence Alcantara'),
(5, 5, 'Added record for Richter Jr Cortez', '2023-08-14 13:51:47', 4, 'Florence Alcantara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal_bite_form`
--
ALTER TABLE `animal_bite_form`
  ADD PRIMARY KEY (`abf_id`);

--
-- Indexes for table `assistance_list`
--
ALTER TABLE `assistance_list`
  ADD PRIMARY KEY (`assistance_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transaction_logs`
--
ALTER TABLE `transaction_logs`
  ADD PRIMARY KEY (`tl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal_bite_form`
--
ALTER TABLE `animal_bite_form`
  MODIFY `abf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assistance_list`
--
ALTER TABLE `assistance_list`
  MODIFY `assistance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `partner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction_logs`
--
ALTER TABLE `transaction_logs`
  MODIFY `tl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
