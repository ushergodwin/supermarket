-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2022 at 03:49 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermarket_queens`
--

-- --------------------------------------------------------

--
-- Table structure for table `searched_items`
--

CREATE TABLE `searched_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `search_status` varchar(100) NOT NULL DEFAULT 'found',
  `searched_item_name` varchar(50) DEFAULT NULL,
  `number_of_searches` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `searched_items`
--

INSERT INTO `searched_items` (`id`, `item_id`, `search_status`, `searched_item_name`, `number_of_searches`, `created_at`, `update_at`) VALUES
(1, 57, 'not found', 'Bread', 2, '2022-02-10 16:09:00', NULL),
(2, 1, 'found', 'White Star Soap', 1, '2022-02-10 18:03:18', NULL),
(3, 2, 'found', 'Magic Washing Powder', 4, '2022-02-10 19:30:09', NULL),
(4, 3, 'found', 'Yoghurt', 2, '2022-02-10 19:31:13', NULL),
(5, 382, 'not found', 'Yoghurt', 1, '2022-02-10 19:34:39', NULL),
(6, 5, 'found', 'Cream', 1, '2022-02-10 19:36:19', NULL),
(7, 853, 'not found', 'Honey', 1, '2022-02-10 19:37:36', NULL),
(8, 7, 'found', 'Butter', 2, '2022-02-10 19:44:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supermarket_items`
--

CREATE TABLE `supermarket_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `column_number` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supermarket_items`
--

INSERT INTO `supermarket_items` (`id`, `name`, `price`, `category`, `column_number`, `position`, `image`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 'White Star Soap', 4000, 'Soap', '4', 'top-left', 'WhatsApp Image 2021-12-24 at 17.00.53.jpeg', '2022-01-02 11:22:00', NULL, NULL),
(2, 'Magic Washing Powder', 200, 'Washing Powder', '4', 'top-left', 'muk-logo.jpg', '2022-01-02 11:39:43', NULL, NULL),
(3, 'Yoghurt', 1000, 'Drinks', '5', 'top-left', 'yought.jpg', '2022-02-10 18:07:03', NULL, NULL),
(4, 'Milk', 3000, 'Drinks', '5', 'top-left', 'milk.jpg', '2022-02-10 18:07:44', NULL, NULL),
(5, 'Cream', 5000, 'Drinks', '5', 'middle-left', 'cream.jpg', '2022-02-10 18:08:20', NULL, NULL),
(6, 'Custard', 6000, 'Drinks', '6', 'top-right', 'custard.jpg', '2022-02-10 18:09:14', NULL, NULL),
(7, 'Butter', 4000, 'Diary', '6', 'bottom-left', 'butter.jpg', '2022-02-10 18:10:29', NULL, NULL),
(8, 'White Star Soap - 200gm', 4000, 'Soap', '4', 'middle-left', NULL, '2022-02-16 00:54:26', NULL, '2022-02-16 01:42:51'),
(9, 'White Star Soap - 100gm', 4000, 'Soap', '4', 'bottom-left', NULL, '2022-02-16 00:55:01', NULL, '2022-02-16 01:41:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `searched_items`
--
ALTER TABLE `searched_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supermarket_items`
--
ALTER TABLE `supermarket_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `searched_items`
--
ALTER TABLE `searched_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supermarket_items`
--
ALTER TABLE `supermarket_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
