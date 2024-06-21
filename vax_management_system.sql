-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 06:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vax_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `hw_id` int(11) NOT NULL,
  `apt_Date` date NOT NULL,
  `apt_Status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `hw_id`, `apt_Date`, `apt_Status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 3, '2024-06-16', 'schedule', '2024-06-10 15:02:18', '2024-06-20 20:52:34', '2024-06-20 20:52:34'),
(2, 3, 2, '2024-06-14', 'schedule', '2024-06-10 15:03:45', '2024-06-10 15:03:45', NULL),
(3, 3, 1, '2024-06-11', 'done', '2024-06-10 15:03:56', '2024-06-13 15:39:38', '2024-06-13 15:39:38'),
(4, 1, 2, '2024-06-20', 'schedule', '2024-06-10 15:05:10', '2024-06-13 15:41:05', '2024-06-13 15:41:05'),
(5, 3, 2, '2024-06-13', 'done', '2024-06-10 22:16:18', '2024-06-13 15:41:09', '2024-06-13 15:41:09'),
(6, 3, 3, '2024-06-14', 'done', '2024-06-12 16:07:56', '2024-06-14 16:28:48', '2024-06-14 16:28:48'),
(7, 3, 5, '2024-06-14', 'done', '2024-06-12 22:00:05', '2024-06-21 13:55:09', '2024-06-21 13:55:09'),
(8, 4, 1, '2024-06-15', 'done', '2024-06-14 16:21:12', '2024-06-20 19:35:16', NULL),
(9, 4, 3, '2024-06-18', 'done', '2024-06-14 16:21:29', '2024-06-20 19:35:24', NULL),
(10, 4, 4, '2024-06-19', 'schedule', '2024-06-14 16:21:51', '2024-06-20 20:55:20', '2024-06-20 20:55:20'),
(11, 4, 6, '2024-06-17', 'schedule', '2024-06-14 16:24:45', '2024-06-14 16:30:04', '2024-06-14 16:30:04'),
(12, 5, 6, '2024-06-15', 'schedule', '2024-06-14 16:26:40', '2024-06-14 16:26:40', NULL),
(13, 5, 1, '2024-06-20', 'schedule', '2024-06-14 16:26:50', '2024-06-14 16:26:50', NULL),
(14, 5, 3, '2024-06-17', 'schedule', '2024-06-14 16:27:03', '2024-06-14 16:29:02', '2024-06-14 16:29:02'),
(15, 6, 6, '2024-06-15', 'schedule', '2024-06-14 17:03:04', '2024-06-14 17:03:04', NULL),
(16, 6, 4, '2024-06-19', 'done', '2024-06-14 17:03:15', '2024-06-20 19:35:37', NULL),
(17, 4, 4, '2024-06-18', 'schedule', '2024-06-14 19:35:14', '2024-06-14 19:35:14', NULL),
(18, 7, 6, '2024-06-29', 'schedule', '2024-06-21 16:00:43', '2024-06-21 16:00:43', NULL),
(19, 7, 2, '2024-06-25', 'schedule', '2024-06-21 16:03:30', '2024-06-21 16:03:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `province_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `province_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lahore', 1, '2024-06-06 15:11:51', '2024-06-06 15:11:51', NULL),
(2, 'Faisalabad', 1, '2024-06-06 15:11:51', '2024-06-06 15:11:51', NULL),
(3, 'Rawalpindi', 1, '2024-06-06 15:11:51', '2024-06-06 15:11:51', NULL),
(4, 'Multan', 1, '2024-06-06 15:11:51', '2024-06-06 15:11:51', NULL),
(5, 'Gujranwala', 1, '2024-06-06 15:11:51', '2024-06-06 15:11:51', NULL),
(6, 'Bahawalpur', 1, '2024-06-06 15:11:51', '2024-06-06 15:11:51', NULL),
(7, 'Sialkot', 1, '2024-06-06 15:11:51', '2024-06-06 15:11:51', NULL),
(8, 'Gujrat', 1, '2024-06-06 15:11:51', '2024-06-06 15:11:51', NULL),
(9, 'Sheikhupura', 1, '2024-06-06 15:11:51', '2024-06-06 15:11:51', NULL),
(10, 'Jhang', 1, '2024-06-06 15:11:51', '2024-06-06 15:11:51', NULL),
(11, 'Karachi', 2, '2024-06-06 15:11:51', '2024-06-06 15:11:51', NULL),
(12, 'Hyderabad', 2, '2024-06-06 15:11:51', '2024-06-06 15:11:51', NULL),
(13, 'Sukkur', 2, '2024-06-06 15:11:51', '2024-06-06 15:11:51', NULL),
(14, 'Larkana', 2, '2024-06-06 15:11:51', '2024-06-06 15:11:51', NULL),
(15, 'Mirpur Khas', 2, '2024-06-06 15:11:51', '2024-06-06 15:11:51', NULL),
(16, 'Nawabshah', 2, '2024-06-06 15:11:52', '2024-06-06 15:11:52', NULL),
(17, 'Jacobabad', 2, '2024-06-06 15:11:52', '2024-06-06 15:11:52', NULL),
(18, 'Shikarpur', 2, '2024-06-06 15:11:52', '2024-06-06 15:11:52', NULL),
(19, 'Khairpur', 2, '2024-06-06 15:11:52', '2024-06-06 15:11:52', NULL),
(20, 'Dadu', 2, '2024-06-06 15:11:52', '2024-06-06 15:11:52', NULL),
(21, 'Peshawar', 3, '2024-06-06 15:11:52', '2024-06-06 15:11:52', NULL),
(22, 'Abbottabad', 3, '2024-06-06 15:11:52', '2024-06-06 15:11:52', NULL),
(23, 'Mardan', 3, '2024-06-06 15:11:52', '2024-06-06 15:11:52', NULL),
(24, 'Swat', 3, '2024-06-06 15:11:52', '2024-06-06 15:11:52', NULL),
(25, 'Nowshera', 3, '2024-06-06 15:11:52', '2024-06-06 15:11:52', NULL),
(26, 'Kohat', 3, '2024-06-06 15:11:52', '2024-06-06 15:11:52', NULL),
(27, 'Dera Ismail Khan', 3, '2024-06-06 15:11:52', '2024-06-06 15:11:52', NULL),
(28, 'Charsadda', 3, '2024-06-06 15:11:52', '2024-06-06 15:11:52', NULL),
(29, 'Mansehra', 3, '2024-06-06 15:11:52', '2024-06-06 15:11:52', NULL),
(30, 'Haripur', 3, '2024-06-06 15:11:52', '2024-06-06 15:11:52', NULL),
(31, 'Quetta', 4, '2024-06-06 15:11:52', '2024-06-06 15:11:52', NULL),
(32, 'Gwadar', 4, '2024-06-06 15:11:52', '2024-06-06 15:11:52', NULL),
(33, 'Khuzdar', 4, '2024-06-06 15:11:52', '2024-06-06 15:11:52', NULL),
(34, 'Chaman', 4, '2024-06-06 15:11:53', '2024-06-06 15:11:53', NULL),
(35, 'Turbat', 4, '2024-06-06 15:11:53', '2024-06-06 15:11:53', NULL),
(36, 'Sibi', 4, '2024-06-06 15:11:53', '2024-06-06 15:11:53', NULL),
(37, 'Zhob', 4, '2024-06-06 15:11:53', '2024-06-06 15:11:53', NULL),
(38, 'Hub', 4, '2024-06-06 15:11:53', '2024-06-06 15:11:53', NULL),
(39, 'Loralai', 4, '2024-06-06 15:11:53', '2024-06-06 15:11:53', NULL),
(40, 'Kharan', 4, '2024-06-06 15:11:53', '2024-06-06 15:11:53', NULL),
(41, 'Attock', 1, '2024-06-06 22:04:22', '2024-06-06 22:04:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `health_workers`
--

CREATE TABLE `health_workers` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `health_workers`
--

INSERT INTO `health_workers` (`id`, `userId`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, '2024-06-07 22:27:50', '2024-06-07 22:27:50', NULL),
(2, 12, '2024-06-07 22:27:50', '2024-06-20 20:57:41', NULL),
(3, 10, '2024-06-07 22:28:15', '2024-06-07 22:28:15', NULL),
(4, 16, '2024-06-12 16:52:34', '2024-06-20 20:57:50', NULL),
(5, 17, '2024-06-12 21:40:32', '2024-06-20 20:58:08', NULL),
(6, 19, '2024-06-14 16:22:52', '2024-06-20 20:57:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `userId`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 14, '2024-06-07 21:46:01', '2024-06-07 21:46:01', NULL),
(2, 11, '2024-06-07 22:25:34', '2024-06-20 20:58:18', NULL),
(3, 9, '2024-06-07 22:25:34', '2024-06-07 22:25:34', NULL),
(4, 18, '2024-06-14 16:20:40', '2024-06-14 16:20:40', NULL),
(5, 20, '2024-06-14 16:26:16', '2024-06-20 20:58:24', NULL),
(6, 21, '2024-06-14 16:56:12', '2024-06-14 16:56:12', NULL),
(7, 22, '2024-06-21 15:57:02', '2024-06-21 15:57:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Punjab', '2024-06-06 15:11:50', '2024-06-06 15:11:50', NULL),
(2, 'Sindh', '2024-06-06 15:11:50', '2024-06-06 15:11:50', NULL),
(3, 'KPK', '2024-06-06 15:11:50', '2024-06-06 15:11:50', NULL),
(4, 'Balochistan', '2024-06-06 15:11:51', '2024-06-06 15:11:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '2024-06-06 15:11:50', '2024-06-06 15:11:50', NULL),
(2, 'health_worker', '2024-06-06 15:11:50', '2024-06-06 15:11:50', NULL),
(3, 'patient', '2024-06-06 15:11:50', '2024-06-06 15:11:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `role_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `DOB`, `role_id`, `city_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Azhar Abbass', 'azb@gmail.com', '$2y$10$9GZi6BXnql0qtgmHf5xMNuvZTEXQMHwmZ4nA0MDHBtd5NW4HnNoE2', '1998-08-13', 2, 28, '2024-06-07 14:35:38', '2024-06-12 21:25:31', NULL),
(7, 'admin', 'admin@gmail.com', '$2y$10$2tec7XgW3nFgdYuL9PBDPuNw1HDgzxR62ZR4/JgyoWFRM.j5F0mgm', '1998-08-13', 1, 41, '2024-06-07 14:48:11', '2024-06-07 14:48:11', NULL),
(9, 'John Doe', 'malik@gmail.com', '$2y$10$AD2wZjf.ba1x9InNkFy7zOXg20XFmD6UeMkEwyH3vK9gDew0CYgUG', '1999-09-12', 3, 17, '2024-06-07 19:46:29', '2024-06-12 20:46:11', NULL),
(10, 'Abbass', 'azbwe@gmail.com', '$2y$10$sMBU9Zx5tsYcjkU4qBi32u5Z8bVsnePXlg6Hpd5g06YgCKxoT6gcq', '1994-12-31', 2, 26, '2024-06-07 19:47:08', '2024-06-07 19:47:08', NULL),
(11, 'ali', 'azbwewe@gmail.com', '$2y$10$rCZKCMd.zpQv.Mxj31RLXu5c3/2ZdSP8wTjVbTBduZ5eWeaxlXZfC', '1992-09-23', 3, 8, '2024-06-07 19:47:46', '2024-06-20 20:56:40', NULL),
(12, 'Jaffery', 'azbweqw@gmail.com', '$2y$10$NjIlonHDroSWWb7f0gWseOv5eGudfqXxsDswpH3MCbBs4YXIKzDiG', '1996-08-25', 2, 32, '2024-06-07 19:48:30', '2024-06-20 20:56:48', NULL),
(14, 'Saad Khan', 'saad@gmail.com', '$2y$10$PBlZQOZcK0ALv584C60OTuKSx86UJoiUTTV0LUqpnkjj5BxvHY6s.', '1993-01-25', 3, 21, '2024-06-07 21:46:01', '2024-06-07 21:46:01', NULL),
(15, 'Saad Khan', 'saad+1@gmail.com', '$2y$10$NJcsXi9ALs2lptvlytWH7emcDpg.KvauhaDkq6MZ0lRbC4MNbpIxO', '2000-09-12', 2, 11, '2024-06-11 22:10:52', '2024-06-21 13:53:24', '2024-06-21 13:53:24'),
(16, 'Umer Khan', 'umr@gmail.com', '$2y$10$rv6F1jjRNxI7ej3YEdglE.ledqScSmFXDFr4.CIrzQew2bZFGK6km', '1999-09-12', 2, 23, '2024-06-12 16:52:34', '2024-06-20 20:57:03', NULL),
(17, 'Asad Khan', 'asd@gmail.com', '$2y$10$ueEnm7OOX8ZbuCYKKyhIweg3ujKYsDGBXcC3opLPiVenGCBmMb78O', '1990-03-03', 2, 35, '2024-06-12 21:40:32', '2024-06-20 20:57:15', NULL),
(18, 'Taimur Rehamn', 'tmr@gmail.com', '$2y$10$cPMuJSyhJ9vfkkEfRwKiVuXhnzBu/N/AxCyoS2NypqvJPK.cXT772', '1990-03-03', 3, 36, '2024-06-14 16:20:40', '2024-06-14 16:20:40', NULL),
(19, 'Faisal Rahman', 'fas@gmail.com', '$2y$10$pL0G6HvQzXEocAdNuh8j3e4w1izSl.N8iCk2LCUVP4ktWhitT6dBa', '1991-04-05', 2, 1, '2024-06-14 16:22:52', '2024-06-20 20:57:23', NULL),
(20, 'Abrar Khalid', 'abr@gmail.com', '$2y$10$.FUtHiFEXTbMEDB/e2NryOzoErQzmpADW11zCc.WFD4erUFZuwG/m', '1990-03-11', 3, 13, '2024-06-14 16:26:16', '2024-06-20 20:57:29', NULL),
(21, 'Adeel Khan', 'adl@gmail.com', '$2y$10$aXuqbhzYJUIsHVB2G5exu.kEaKEToVMmgWeFCmJKLHyiAiWWzk1F6', '1982-08-19', 3, 37, '2024-06-14 16:56:12', '2024-06-14 16:56:12', NULL),
(22, 'Prince Gill', 'prince@gmail.com', '$2y$10$Yn8e0HWxjlfRNze7E1IfZ.Jtbm25NwckcJpB9Z.wPl0bS0xnID46q', '2000-03-11', 3, 14, '2024-06-21 15:57:02', '2024-06-21 15:57:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vaccinations`
--

CREATE TABLE `vaccinations` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `vax_Date` date NOT NULL,
  `vax_Status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccinations`
--

INSERT INTO `vaccinations` (`id`, `patient_id`, `vax_Date`, `vax_Status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 1, '2024-06-14', 'done', '2024-06-07 21:52:38', '2024-06-20 20:59:23', '2024-06-20 20:59:23'),
(9, 2, '2024-06-18', 'schedule', '2024-06-07 22:31:26', '2024-06-20 20:52:40', '2024-06-20 20:52:40'),
(10, 3, '2024-06-11', 'done', '2024-06-07 22:31:53', '2024-06-14 16:23:56', NULL),
(12, 2, '2024-06-12', 'done', '2024-06-10 22:17:39', '2024-06-14 16:23:47', '2024-06-14 16:23:47'),
(14, 1, '2024-06-12', 'done', '2024-06-12 16:44:02', '2024-06-14 16:23:17', '2024-06-14 16:23:17'),
(15, 1, '2024-06-15', 'done', '2024-06-12 16:53:16', '2024-06-21 15:53:40', NULL),
(16, 1, '2024-06-14', 'schedule', '2024-06-12 21:25:49', '2024-06-14 15:10:47', '2024-06-14 15:10:47'),
(17, 3, '2024-06-15', 'done', '2024-06-13 22:17:05', '2024-06-20 18:57:37', NULL),
(18, 4, '2024-06-15', 'done', '2024-06-14 16:23:37', '2024-06-20 21:43:58', '2024-06-20 21:43:58'),
(19, 5, '2024-06-21', 'schedule', '2024-06-20 18:56:51', '2024-06-20 20:52:51', '2024-06-20 20:52:51'),
(20, 6, '2024-06-25', 'schedule', '2024-06-20 18:59:39', '2024-06-21 16:04:28', NULL),
(21, 4, '2024-06-25', 'schedule', '2024-06-20 19:32:39', '2024-06-20 19:32:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `hw_id` (`hw_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `health_workers`
--
ALTER TABLE `health_workers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `vaccinations`
--
ALTER TABLE `vaccinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `health_workers`
--
ALTER TABLE `health_workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vaccinations`
--
ALTER TABLE `vaccinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`hw_id`) REFERENCES `health_workers` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Constraints for table `health_workers`
--
ALTER TABLE `health_workers`
  ADD CONSTRAINT `health_workers_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `vaccinations`
--
ALTER TABLE `vaccinations`
  ADD CONSTRAINT `vaccinations_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
