-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2022 at 03:47 PM
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
-- Database: `supermarket_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender` varchar(100) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `sender_message` longtext NOT NULL,
  `receiver_reply` longtext DEFAULT NULL,
  `chat_session_id` varchar(100) NOT NULL,
  `sent_on` date NOT NULL,
  `sent_at` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `sender`, `receiver`, `sender_message`, `receiver_reply`, `chat_session_id`, `sent_on`, `sent_at`) VALUES
(1, 'admin@queenssupermarket.com', 'admin@yosil.com', 'K2ZCdThjVnBXOVZBZG0rakQxdlZ3UT09', 'eWNDZFBGQ1hhN3BzRDNhUkk0cDM2dmVkeUJnOGVWeEpxeGlmcmIrN3B4VT0=', 'chat_620f825b3cfc37.76872175', '2022-02-18', '12:28:59'),
(2, 'admin@queenssupermarket.com', 'admin@yosil.com', 'Y2U5RUwzWEdsQXcxRWozcG8ybE1mOGpaRmR6UFRncFN6TGtndlhmbmQxU2JvRXIzZnUwQ3JQUW45SllzKy81Ug==', 'OGhRV1RLSUVQWXlsL0NCN0EyRERUdU5YRDRaWjNjbERpV0xwWnJ2bTU1bz0=', 'chat_620f825b3cfc37.76872175', '2022-02-18', '12:34:43'),
(3, 'admin@queenssupermarket.com', 'admin@yosil.com', 'VnIrZmkwTTAzT1ZKblJxczllSGk4OGtvY1JYdmg2UVd2OEF5NlIvUkRRcHRKbGpnYmJHVXlUajl2cGNsTUhGYQ==', 'ZWUwNWxuRVF2RjBuUFVNTFRGN2E5dkpGT2dQOEc2TUxHdUtrUVQzQU1iUT0=', 'chat_620f825b3cfc37.76872175', '2022-02-18', '12:44:42'),
(4, 'admin@queenssupermarket.com', 'admin@yosil.com', 'ZnF4ZEhIaHJnZTdqN0pWQ2tHOFJoRzYxWlZyU2FhTFBTOUUzTWtyVDc5a2IrZ09GdGFNSUduU1ljYjNJa3RtL3B4YkFFR1F6UmNJM0JNV0xKWi8xemc9PQ==', 'NkR2dzErWlkwSnlwTW85Z1ZUK1d0SUtSKzloKzdnYlRHdHgzOU1QZXYxdVZoem5tQjJYRFlkazFrTDRoMWRCaw==', 'chat_620f825b3cfc37.76872175', '2022-02-18', '12:52:08'),
(5, 'admin@queenssupermarket.com', 'admin@yosil.com', 'Nmg2YXhTNjVVa2NJTVQvRlgxWWk3OVV4RitvN2dCVUJDTXBZNm5UR3daeHZYTVNvakdxdTFKQmpvcXc2dWtoVVM3ZkpENENGcm4zRTgrTjk2YlVKMngxLytiYWFTbkhCR0EzU2xKTy81OHJXR3k3bGlveTd6dGpYZHJiV3NhV1MwaXdDSnlEVy9ZZk0rSkhoTkZ3dS9nPT0=', 'aHRsVW1BQWVRMmF1M1E1aUFsWjZwZXhvUU5NTVFGT0hDbGk2d0s4WTFyYmVSSll3L0xBZkhiNmRqR3BhL0N3eg==', 'chat_620f825b3cfc37.76872175', '2022-02-18', '13:09:49'),
(6, 'admin@queenssupermarket.com', 'admin@yosil.com', 'cWh2MVM3d1VCNnA0TTcyVDNGdFZNVldFN2x4SlhLZFVtclp4ZlQrWUhEV3hKcW5uQzdpOUIvZG9MYkQ2di9BRQ==', 'ZUk5amJ5SU5Xc2RBTkVJc0FxMERPTlBhSnJKazJsVUxYeFBLR3Bld2RkeGNxQ2dpbVA1eGRoV1kwU1FmbEhqSw==', 'chat_620f825b3cfc37.76872175', '2022-02-18', '13:21:09'),
(7, 'admin@queenssupermarket.com', 'admin@yosil.com', 'bFpLNWdBLzg0OS9YNHE0ckh2QzlMSHhsbXo3T0hhb0ljeWFjQm9oK1FHST0=', 'VVVIbTVXREQxMzJXd1hVbS9LVFJtYnNrLzJWT2tsM1FsQVk0YzQ2c3BqRT0=', 'chat_620f825b3cfc37.76872175', '2022-02-18', '13:26:49'),
(9, 'admin@queenssupermarket.com', 'admin@yosil.com', 'bHpLZldtcUo3Z04yQzQxdk1ucHdvbG9qQmEvbDVucUQrcnZaekpLQWdjTkNwY3BCS2Yzb2FvV0dEcTltMkd3T2h3SE1qSHB0anNWNjA3MXQ3NXNtUy8wbGtSTVhsMDZRdGRMcFBCd1QxUG89', 'T0NLak1hRDJCdnJISStnQThVenRGdz09', 'chat_620f825b3cfc37.76872175', '2022-02-18', '14:15:02'),
(10, 'admin@yosil.com', 'admin@queenssupermarket.com', 'V0laZEViQytnUXlCSENQM3Y5ejVuQT09', 'L2k1WURLdmQvb1k1SGNrSkRXZ2Nhdz09', 'chat_620f825b3cfc37.76872175', '2022-02-18', '14:17:16'),
(11, 'admin@queenssupermarket.com', 'admin@yosil.com', '', NULL, 'chat_620f825b3cfc37.76872175', '2022-02-18', '14:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `chat_requests`
--

CREATE TABLE `chat_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_by` varchar(100) NOT NULL,
  `respondent` varchar(100) DEFAULT NULL,
  `reason` longtext NOT NULL,
  `session_id` varchar(100) DEFAULT NULL,
  `sent_on` date NOT NULL,
  `sent_at` time NOT NULL,
  `request_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_requests`
--

INSERT INTO `chat_requests` (`id`, `request_by`, `respondent`, `reason`, `session_id`, `sent_on`, `sent_at`, `request_status`) VALUES
(1, 'admin@queenssupermarket.com', 'admin@yosil.com', 'Request for a new feature.', 'chat_620f825b3cfc37.76872175', '2022-02-18', '14:26:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chat_typings`
--

CREATE TABLE `chat_typings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_key` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'online',
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_typings`
--

INSERT INTO `chat_typings` (`id`, `user_key`, `status`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 'admin@queenssupermarket.com', 'online', '2022-02-18 14:28:38', NULL, NULL),
(2, 'admin@yosil.com', 'online', '2022-02-18 14:30:26', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `migration` varchar(100) NOT NULL,
  `migrated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `migrated_at`) VALUES
(1, '2021_10_28_004229_create_users_table', '2022-01-04 15:02:36'),
(2, '2021_10_28_005147_create_password_resets_table', '2022-01-04 15:02:37'),
(3, '2021_10_28_005455_create_supermarkets_table', '2022-01-04 15:02:38'),
(4, '2021_12_29_093639_create_supermarket_items_table', '2022-01-04 15:02:38'),
(5, '2021_12_29_094544_create_searched_items_table', '2022-01-04 15:02:39'),
(6, '2022_01_04_175043_create_shopping_lists_table', '2022-01-04 15:02:39'),
(7, '2022_01_04_175301_create_shopping_list_items_table', '2022-01-04 15:02:40'),
(8, '2022_02_08_153658_create_notebooks_table', '2022-02-08 15:16:29'),
(9, '2022_02_12_211212_create_supermarket_visitors_table', '2022-02-12 18:17:45'),
(10, '2022_02_16_145600_create_transactions_table', '2022-02-16 11:56:43'),
(11, '2022_02_16_171525_create_chats_table', '2022-02-16 14:46:24'),
(12, '2022_02_16_172148_create_chat_requests_table', '2022-02-16 14:47:07'),
(13, '2022_02_18_140323_create_chat_typings_table', '2022-02-18 11:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `notebooks`
--

CREATE TABLE `notebooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `note_name` varchar(60) NOT NULL,
  `supermarket_name` varchar(100) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notebooks`
--

INSERT INTO `notebooks` (`id`, `user_id`, `note_name`, `supermarket_name`, `notes`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 'ascendemmy9@gmail.com', 'NB_08022022191733', 'supermarket_queens', 'Soap, Bread, Rice,Soda', '2022-02-08 19:17:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(35) NOT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `shopping_lists`
--

CREATE TABLE `shopping_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `list_name` varchar(20) NOT NULL,
  `list_status` varchar(10) NOT NULL DEFAULT 'active',
  `list_owner` varchar(60) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopping_lists`
--

INSERT INTO `shopping_lists` (`id`, `list_name`, `list_status`, `list_owner`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 'Wed-05-Jan-2022-16:3', 'diactivate', 'ascendemmy9@gmail.com', '2022-01-05 16:37:23', NULL, NULL),
(2, 'Tue-08-Feb-2022-14:1', 'active', 'ascendemmy9@gmail.com', '2022-02-08 14:15:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_list_items`
--

CREATE TABLE `shopping_list_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopping_list_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_column_number` varchar(20) NOT NULL,
  `item_position` varchar(10) NOT NULL,
  `supermarket` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopping_list_items`
--

INSERT INTO `shopping_list_items` (`id`, `shopping_list_id`, `item_name`, `item_price`, `item_column_number`, `item_position`, `supermarket`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 1, 'White Star Soap', 4000, '4', 'middle-lef', 'SUPERMARKET QUEENS', '2022-01-05 16:56:45', NULL, NULL),
(2, 1, 'White Star Soap', 4000, '4', 'middle-lef', 'SUPERMARKET QUEENS', '2022-01-05 17:28:15', NULL, NULL),
(3, 1, 'Magic Washing Powder', 200, '4', 'top-left', 'SUPERMARKET QUEENS', '2022-01-05 17:28:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supermarkets`
--

CREATE TABLE `supermarkets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `db_name` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `expires` date NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `fee` int(11) NOT NULL DEFAULT 100000,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supermarkets`
--

INSERT INTO `supermarkets` (`id`, `name`, `db_name`, `user_id`, `expires`, `expired`, `fee`, `created_at`, `update_at`) VALUES
(3, 'Queens Supermarket', 'supermarket_queens', 1, '2022-03-16', 0, 100000, '2022-01-04 18:12:11', '2022-01-04 16:11:19');

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

-- --------------------------------------------------------

--
-- Table structure for table `supermarket_visitors`
--

CREATE TABLE `supermarket_visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor_email` varchar(40) NOT NULL,
  `supermarket_name` varchar(100) NOT NULL,
  `visited_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `no_of_visits` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supermarket_visitors`
--

INSERT INTO `supermarket_visitors` (`id`, `visitor_email`, `supermarket_name`, `visited_on`, `no_of_visits`) VALUES
(1, 'ascendemmy9@gmail.com', 'supermarket_queens', '2022-02-12 17:13:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(40) NOT NULL,
  `amount` int(11) UNSIGNED NOT NULL,
  `txt_ref` varchar(50) NOT NULL,
  `transaction_id` varchar(15) NOT NULL,
  `transaction_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `expires_on` date DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `email`, `amount`, `txt_ref`, `transaction_id`, `transaction_at`, `expires_on`, `deleted_at`) VALUES
(1, 'superadmin@queenssupermarket.com', 100000, '', '3138978', '2022-02-16 12:10:11', '2022-03-16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `account` varchar(100) NOT NULL DEFAULT 'customer',
  `password` varchar(100) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `roles` longtext NOT NULL DEFAULT 'view items,',
  `has_supermarket` int(11) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'offline',
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phone`, `account`, `password`, `img_url`, `roles`, `has_supermarket`, `status`, `created_at`, `update_at`) VALUES
(1, 'Ssebagala', 'Hams', 'admin@queenssupermarket.com', '0358964782', 'admin', '$2y$10$5CjgKiEDK6j3EztlcjPer.FPDaX5n3x.f6D5fUJvLVHUdozvDC5sa', NULL, 'view items,view-users,add-users,', 3, 'offline', '2022-01-04 18:10:37', NULL),
(2, 'Batembe', 'Emmy', 'ascendemmy9@gmail.com', '256785702557', 'customer', '$2y$10$6InNGnlXSqaPgclPMEj/uee5QwXyOGJEfXWRWaywnnp4j0oL7vLRm', NULL, 'view items', NULL, 'offline', '2022-01-05 16:17:51', NULL),
(4, 'ASCEND', 'EMMY', 'admin@yosil.com', '0785702557', 'super', '$2y$10$t.dvDgEIrLpe5tV.eDd/su3JqGYEmF9kIftKWebilgv1T0V01mwoW', NULL, 'view-users,add-users,edit-users,delete-users,add-supermarkets,view-supermarkets,edit-supermarkets,delete-supermarkets,view-charts', NULL, 'offline', '2022-02-12 16:00:12', '2022-02-12 13:57:45'),
(7, 'Rodgers', 'Nturanabo', 'superadmin@queenssupermarket.com', '02345678901', 'admin', '$2y$10$u2gU.QmLgPfTasY9.bOnReeT16PTGMCfBiFLaUjT3HFVt3/lSSE0C', NULL, 'view-users,add-users,edit-users,delete-users,add-supermarket-items,view-supermarket-items,edit-supermarket-items,delete-supermarket-items,view-most-searched-items,view-found-searched-items,view-not-found-searched-items,view-charts', 3, 'offline', '2022-02-15 23:40:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_requests`
--
ALTER TABLE `chat_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `session_id` (`session_id`);

--
-- Indexes for table `chat_typings`
--
ALTER TABLE `chat_typings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notebooks`
--
ALTER TABLE `notebooks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `note_name` (`note_name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `searched_items`
--
ALTER TABLE `searched_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_lists`
--
ALTER TABLE `shopping_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_list_items`
--
ALTER TABLE `shopping_list_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shopping_list_items_shopping_list_id` (`shopping_list_id`);

--
-- Indexes for table `supermarkets`
--
ALTER TABLE `supermarkets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_supermarkets_user_id` (`user_id`);

--
-- Indexes for table `supermarket_items`
--
ALTER TABLE `supermarket_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supermarket_visitors`
--
ALTER TABLE `supermarket_visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chat_requests`
--
ALTER TABLE `chat_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat_typings`
--
ALTER TABLE `chat_typings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notebooks`
--
ALTER TABLE `notebooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `searched_items`
--
ALTER TABLE `searched_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_lists`
--
ALTER TABLE `shopping_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shopping_list_items`
--
ALTER TABLE `shopping_list_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supermarkets`
--
ALTER TABLE `supermarkets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supermarket_items`
--
ALTER TABLE `supermarket_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supermarket_visitors`
--
ALTER TABLE `supermarket_visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `searched_items`
--
ALTER TABLE `searched_items`
  ADD CONSTRAINT `fk_searched_items_item_id` FOREIGN KEY (`item_id`) REFERENCES `supermarket_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shopping_list_items`
--
ALTER TABLE `shopping_list_items`
  ADD CONSTRAINT `fk_shopping_list_items_shopping_list_id` FOREIGN KEY (`shopping_list_id`) REFERENCES `shopping_lists` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `supermarkets`
--
ALTER TABLE `supermarkets`
  ADD CONSTRAINT `fk_supermarkets_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
