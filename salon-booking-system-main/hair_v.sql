-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2025 at 06:05 PM
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
-- Database: `hair_v`
--

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `cat_id`, `slug`, `name`, `duration`, `price`, `status`, `created_at`) VALUES
(1, 1, 'hair-cut-colour', 'Basic Cut', '30 minutes', '$20.00', 1, '2025-12-24 17:48:18'),
(2, 1, 'hair-cut-colour', 'Full Colour', '60 minutes', '$50.00', 1, '2025-12-24 17:48:20'),
(3, 2, 'hair-scalp-treatments', 'Deep Conditioning', '40 minutes', '$30.00', 1, '2025-12-24 17:48:25'),
(4, 2, 'hair-scalp-treatments', 'Scalp Massage', '60 minutes', '$45.00', 1, '2025-12-24 17:48:27'),
(5, 3, 'hair-styling-stes', 'Updo', '30 minutes', '$15.00', 1, '2025-12-24 17:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `service_cat`
--

CREATE TABLE `service_cat` (
  `id` int(11) NOT NULL,
  `s_name` varchar(100) DEFAULT NULL,
  `s_slug` varchar(100) NOT NULL,
  `s_image` varchar(200) NOT NULL,
  `s_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_cat`
--

INSERT INTO `service_cat` (`id`, `s_name`, `s_slug`, `s_image`, `s_status`, `created_at`) VALUES
(1, 'Hair Cuts & Colour', 'hair-cut-colour\r\n', 'https://atoley.com/cdn/shop/files/Atoley_march24-1-4.jpg?v=1754440135&width=3200', 1, '2025-12-24 17:28:01'),
(2, 'Hair & Scalp Treatments', 'hair-scalp-treatments', 'https://qimassageandnaturalhealingspa.com/wp-content/uploads/2025/01/Website.jpg', 1, '2025-12-24 17:28:01'),
(3, 'Hair Styling & Sets', 'hair-styling-stes', 'https://www.cloudninehair.com/cdn/shop/articles/35_Quick_and_easy_updos_Feature_Image_1024x.png?v=1760515844', 1, '2025-12-24 17:28:43');

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `id` int(11) NOT NULL,
  `slot` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`id`, `slot`, `status`, `created_at`) VALUES
(1, '10:00 am', 0, '2024-10-10 14:13:23'),
(3, '11:00 am', 0, '2024-10-10 14:03:20'),
(5, '12:00 pm', 0, '2024-10-10 14:03:35'),
(7, '01:00 pm', 0, '2024-10-10 14:03:51'),
(9, '02:00 pm', 0, '2024-10-10 14:04:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_cat`
--
ALTER TABLE `service_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_cat`
--
ALTER TABLE `service_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
