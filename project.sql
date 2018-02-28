-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2018 at 03:02 PM
-- Server version: 5.7.21-0ubuntu0.17.10.1
-- PHP Version: 7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_rooms`
--

CREATE TABLE `booked_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `hotel_id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `reservation_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booked_rooms`
--

INSERT INTO `booked_rooms` (`id`, `date`, `hotel_id`, `room_id`, `reservation_id`, `created_at`, `updated_at`) VALUES
(1, '2018-02-12', 1, 1, 4, '2018-02-10 10:07:52', '2018-02-10 10:07:52'),
(2, '2018-02-12', 1, 2, 1, NULL, NULL),
(3, '2018-02-22', 1, 1, 5, '2018-02-22 11:34:24', '2018-02-22 11:34:24'),
(4, '2018-02-22', 1, 3, 6, '2018-02-22 11:35:38', '2018-02-22 11:35:38'),
(7, '2018-02-23', 1, 1, 9, '2018-02-22 12:15:35', '2018-02-22 12:15:35'),
(8, '2018-02-23', 1, 3, 10, '2018-02-22 12:43:34', '2018-02-22 12:43:34'),
(9, '2018-02-25', 1, 1, 11, '2018-02-25 06:35:37', '2018-02-25 06:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `facility` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `facility`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Bar', 'null', '2018-02-10 08:56:20', '2018-02-10 08:56:20'),
(2, 'Bath Tub', 'null', '2018-02-10 08:56:20', '2018-02-10 08:56:20'),
(3, 'Car', 'null', '2018-02-10 08:56:20', '2018-02-10 08:56:20'),
(4, 'TV', 'null', '2018-02-10 08:56:20', '2018-02-10 08:56:20'),
(5, 'Refrigerator', 'null', '2018-02-10 08:56:20', '2018-02-10 08:56:20'),
(6, 'Aircon', 'null', '2018-02-10 08:56:20', '2018-02-10 08:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `hotelName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starRating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noOfRoom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `user_id`, `hotelName`, `starRating`, `street_number`, `route`, `locality`, `city`, `state`, `noOfRoom`, `description`, `phoneNumber`, `country`, `created_at`, `updated_at`) VALUES
(1, 2, 'Su Hnin Wai', '3', NULL, 'Sule Pagoda Road', 'blah', 'Yangon', 'Yangon Region', '10', 'yummy yummy', '0123456789', 'Myanmar (Burma)', '2018-02-10 08:56:20', '2018-02-10 09:46:06'),
(2, 3, 'Calista', '1', NULL, 'U Tun Lin Chan Street', NULL, 'Yangon', 'Yangon Region', '4', 'User service very good', '123456', 'Myanmar (Burma)', '2018-02-10 09:05:03', '2018-02-10 09:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_facility`
--

CREATE TABLE `hotel_facility` (
  `hotel_id` int(10) UNSIGNED NOT NULL,
  `facility_id` int(10) UNSIGNED NOT NULL,
  `data` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_facility`
--

INSERT INTO `hotel_facility` (`hotel_id`, `facility_id`, `data`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-02-10 08:56:20', '2018-02-10 08:56:20'),
(1, 2, 0, '2018-02-10 08:56:20', '2018-02-10 08:56:20'),
(1, 3, 0, '2018-02-10 08:56:20', '2018-02-10 08:56:20'),
(1, 4, 0, '2018-02-10 08:56:20', '2018-02-10 08:56:20'),
(1, 5, 0, '2018-02-10 08:56:20', '2018-02-10 08:56:20'),
(1, 6, 0, '2018-02-10 08:56:20', '2018-02-10 08:56:20'),
(2, 1, 0, '2018-02-10 09:05:03', '2018-02-10 09:05:03'),
(2, 2, 1, '2018-02-10 09:05:03', '2018-02-10 09:05:03'),
(2, 3, 0, '2018-02-10 09:05:03', '2018-02-10 09:05:03'),
(2, 4, 0, '2018-02-10 09:05:04', '2018-02-10 09:05:04'),
(2, 5, 0, '2018-02-10 09:05:04', '2018-02-10 09:05:04'),
(2, 6, 0, '2018-02-10 09:05:04', '2018-02-10 09:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_images`
--

CREATE TABLE `hotel_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `hotel_id` int(10) UNSIGNED NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_extension` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_resets_table', 1),
(27, '2017_12_01_175906_create_Hotels_table', 1),
(28, '2018_01_23_170732_create_room_types_table', 1),
(29, '2018_01_26_204035_create_facilities_table', 1),
(30, '2018_01_26_204057_create_hotel_facility_table', 1),
(31, '2018_01_26_204124_create_hotel_images_table', 1),
(32, '2018_01_26_204137_create_rooms_table', 1),
(33, '2018_01_26_204216_create_reservations_table', 1),
(34, '2018_01_26_204233_create_booked_rooms_table', 1),
(35, '2018_01_26_204250_create_notifications_table', 1),
(36, '2018_02_08_092247_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'You are created at 12-01-2018.', '2018-02-10 08:56:20', '2018-02-10 08:56:20'),
(2, 1, 'You are created at 12-01-2018.', '2018-02-10 08:56:20', '2018-02-10 08:56:20'),
(3, 1, 'You are created at 12-01-2018.', '2018-02-10 08:56:20', '2018-02-10 08:56:20'),
(4, 1, 'You have changed your password.', '2018-02-10 08:56:21', '2018-02-10 08:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `roomId` int(10) UNSIGNED NOT NULL,
  `customerId` int(10) UNSIGNED NOT NULL,
  `hotelId` int(10) UNSIGNED NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `roomId`, `customerId`, `hotelId`, `checkIn`, `checkOut`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2018-01-06', '2018-01-07', '2018-02-10 08:56:21', '2018-02-10 08:56:21'),
(2, 2, 2, 1, '2018-01-06', '2018-01-07', '2018-02-10 08:56:21', '2018-02-10 08:56:21'),
(3, 3, 1, 1, '2018-01-06', '2018-01-07', '2018-02-10 08:56:21', '2018-02-10 08:56:21'),
(4, 1, 2, 1, '2018-02-12', '2018-02-13', '2018-02-10 10:07:51', '2018-02-10 10:07:51'),
(5, 1, 2, 1, '2018-02-22', '2018-02-23', '2018-02-22 11:34:23', '2018-02-22 11:34:23'),
(6, 3, 2, 1, '2018-02-22', '2018-02-23', '2018-02-22 11:35:38', '2018-02-22 11:35:38'),
(9, 1, 2, 1, '2018-02-23', '2018-02-24', '2018-02-22 12:15:35', '2018-02-22 12:15:35'),
(10, 3, 2, 1, '2018-02-23', '2018-02-24', '2018-02-22 12:43:34', '2018-02-22 12:43:34'),
(11, 1, 3, 1, '2018-02-25', '2018-02-26', '2018-02-25 06:35:37', '2018-02-25 06:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `hotel_id` int(10) UNSIGNED NOT NULL,
  `roomName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `hotel_id`, `roomName`, `type`, `description`, `price`, `unit`, `created_at`, `updated_at`) VALUES
(1, 1, '203', 1, 'ohoh', 500, 'MMK', '2018-02-10 08:56:21', '2018-02-10 08:56:21'),
(2, 2, 'Cherry', 2, 'ohoh', 500, 'MMK', '2018-02-10 08:56:21', '2018-02-10 08:56:21'),
(3, 1, 'Sakura', 1, 'ohoh', 500, 'MMK', '2018-02-10 08:56:21', '2018-02-10 08:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Single', '2018-02-10 08:56:21', '2018-02-10 08:56:21'),
(2, 'Double', '2018-02-10 08:56:21', '2018-02-10 08:56:21'),
(3, 'Dulux', '2018-02-10 08:56:21', '2018-02-10 08:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super@gmail.com', '$2y$10$DX85qcyb56ih30l0ZFA6LuYildS5Y/9efdREpb4hbp54p5BsqfHJe', 'super', '0QzHr9xLPjPDWAyrslTN3CEBn9cv79c480DRibbDNHpk2hZh1c6lyhTu5ygX', NULL, NULL),
(2, 'Hotel Admin', 'hotel@gmail.com', '$2y$10$HSrNs4KBZ6irR60NtkSDK.gS/IwHAEMS.SS7XZkVhsFrCdu5KcCaO', 'admin', 'eBoNkTarYtR6SvWvrTypL95elCXlCYvPRKl10iF8iyKxQ5fQzEcjFBif8aMJ', NULL, NULL),
(3, 'Calista', 'calista@gmail.com', '$2y$10$16QfwfyCOuuuSuNoJpLEg.3OPXtToQsmhD11lBK2KMAkXyoR9v3RS', 'customer', '7jQlyGzMysqWuucW9gzBu4NW802Q3dHc376vnqT5ZI5J40PXDI8ZQ31bWjHs', '2018-02-10 09:03:25', '2018-02-10 09:03:25'),
(4, 'Phyo Wai', 'phyowai@gmail.com', '$2y$10$pDAnLM2eDfSEADkzgSe00.0O4iKn.GdIQISBZ6dOzQwZ6glafliMS', 'customer', 'GJga7qikEM2UZr7qLPmGRdtFi6n2xrcOHsf3affgUD2iObBCy56AiD6AJRMm', '2018-02-23 11:27:44', '2018-02-23 11:27:44'),
(5, 'Yuki', 'yuki@gmail.com', '$2y$10$snki3lEMwMSEY0OWQvbozu0uGHzYFp9whyWxmHrUAxfuHxzrYGhum', 'customer', '9O95N0cpjRovpSnWdN4oMpvo3WTBDMIjPHJMdbL0L7qaLTcVQ8erQiGLN1MA', '2018-02-24 14:45:11', '2018-02-24 14:45:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_rooms`
--
ALTER TABLE `booked_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booked_rooms_hotel_id_foreign` (`hotel_id`),
  ADD KEY `booked_rooms_room_id_foreign` (`room_id`),
  ADD KEY `booked_rooms_reservation_id_foreign` (`reservation_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotels_user_id_foreign` (`user_id`);

--
-- Indexes for table `hotel_facility`
--
ALTER TABLE `hotel_facility`
  ADD UNIQUE KEY `hotel_facility_hotel_id_facility_id_unique` (`hotel_id`,`facility_id`),
  ADD KEY `hotel_facility_facility_id_foreign` (`facility_id`);

--
-- Indexes for table `hotel_images`
--
ALTER TABLE `hotel_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hotel_images_image_name_unique` (`image_name`),
  ADD KEY `hotel_images_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_customerid_foreign` (`customerId`),
  ADD KEY `reservations_roomid_foreign` (`roomId`),
  ADD KEY `reservations_hotelid_foreign` (`hotelId`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_type_foreign` (`type`),
  ADD KEY `rooms_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_rooms`
--
ALTER TABLE `booked_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hotel_images`
--
ALTER TABLE `hotel_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_rooms`
--
ALTER TABLE `booked_rooms`
  ADD CONSTRAINT `booked_rooms_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booked_rooms_reservation_id_foreign` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booked_rooms_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotel_facility`
--
ALTER TABLE `hotel_facility`
  ADD CONSTRAINT `hotel_facility_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hotel_facility_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotel_images`
--
ALTER TABLE `hotel_images`
  ADD CONSTRAINT `hotel_images_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_customerid_foreign` FOREIGN KEY (`customerId`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_hotelid_foreign` FOREIGN KEY (`hotelId`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_roomid_foreign` FOREIGN KEY (`roomId`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_type_foreign` FOREIGN KEY (`type`) REFERENCES `room_types` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
