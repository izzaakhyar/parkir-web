-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 02:52 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkirtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(57, '2023_03_31_053455_create_users_table', 1),
(58, '2023_03_31_061553_create_parkir_table', 1),
(59, '2023_04_01_063203_create_ruangan_table', 1),
(60, '2023_04_18_064119_create_parkir3_table', 1),
(61, '2023_04_18_064418_create_parkir2_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parkir`
--

CREATE TABLE `parkir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `platNomor` varchar(8) NOT NULL,
  `ruangParkir` varchar(3) DEFAULT NULL,
  `sudah_masuk` tinyint(4) NOT NULL DEFAULT 0,
  `pernah_masuk` tinyint(4) NOT NULL DEFAULT 0,
  `tarif` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parkir`
--

INSERT INTO `parkir` (`id`, `platNomor`, `ruangParkir`, `sudah_masuk`, `pernah_masuk`, `tarif`, `created_at`, `updated_at`) VALUES
(1, 'L123DAS', 'B4', 1, 3, 10000, NULL, '2023-04-18 05:31:22'),
(2, 'L4738ASD', NULL, 0, 1, 5000, NULL, '2023-04-18 04:36:45'),
(3, 'L7834HYU', 'B8', 1, 1, 0, NULL, '2023-04-18 04:35:51'),
(4, 'L8374HY', 'A6', 1, 1, 0, NULL, '2023-04-18 04:39:04'),
(5, 'DK3642Y', 'A10', 1, 1, 0, NULL, '2023-04-18 04:39:11'),
(6, 'L2341UER', NULL, 1, 1, 0, '2023-04-18 05:32:14', '2023-04-18 05:32:14'),
(7, 'ASDA', NULL, 0, 1, 5000, '2023-04-18 05:37:17', '2023-04-18 05:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `parkir2`
--

CREATE TABLE `parkir2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `platNomor` varchar(8) NOT NULL,
  `ruangParkir` varchar(3) DEFAULT NULL,
  `sudah_masuk` tinyint(4) NOT NULL DEFAULT 0,
  `pernah_masuk` tinyint(4) NOT NULL DEFAULT 0,
  `tarif` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parkir2`
--

INSERT INTO `parkir2` (`id`, `platNomor`, `ruangParkir`, `sudah_masuk`, `pernah_masuk`, `tarif`, `created_at`, `updated_at`) VALUES
(2, 'ASDA', NULL, 0, 1, 5000, NULL, '2023-04-18 05:36:55'),
(3, 'L2341UER', NULL, 0, 1, 5000, NULL, '2023-04-18 02:21:50'),
(4, 'L1237DAS', NULL, 0, 1, 5000, NULL, '2023-04-18 04:46:04'),
(5, 'L7484HU', 'D3', 1, 1, 0, NULL, '2023-04-18 04:45:22'),
(6, 'L8341GH', 'D10', 1, 1, 0, NULL, '2023-04-18 04:45:30'),
(7, 'L6434YU', 'D1', 1, 1, 0, NULL, '2023-04-18 04:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `parkir3`
--

CREATE TABLE `parkir3` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `platNomor` varchar(8) NOT NULL,
  `ruangParkir` varchar(3) DEFAULT NULL,
  `sudah_masuk` tinyint(4) NOT NULL DEFAULT 0,
  `pernah_masuk` tinyint(4) NOT NULL DEFAULT 0,
  `tarif` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parkir3`
--

INSERT INTO `parkir3` (`id`, `platNomor`, `ruangParkir`, `sudah_masuk`, `pernah_masuk`, `tarif`, `created_at`, `updated_at`) VALUES
(1, 'S1234HYD', 'G8', 1, 1, 0, NULL, '2023-04-18 01:45:22'),
(2, 'S8492IU', NULL, 0, 1, 5000, NULL, '2023-04-18 04:54:48'),
(3, 'S9028DE', NULL, 1, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ruang` varchar(3) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `mall` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `mall`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$54hBwn0MjJi7l1kKtt492OyAjGD2COJKDMVXxG5wnyWhShAtr2tcm', 'Admin', 'Admin', NULL, NULL),
(2, 'pmasuk1', '$2y$10$O2.IluwtgOGWueOIPrH6S.CeLqXmEA1QlYMZLjpPVSciI5udD7S3O', 'Petugas Masuk 1', 'Mall 01', NULL, NULL),
(3, 'pruang1', '$2y$10$MzlQJiFCP3dNUOJ3qy9U5utm9D1OaSoNrrneqrm1iDeMmV/fJf.q.', 'Petugas Ruang 1', 'Mall 01', NULL, NULL),
(4, 'pkeluar1', '$2y$10$on0vKPud9ZMwct3W6HP7LelTxHDCALj.QolrIBvaDrApnoJAI.JsO', 'Petugas Keluar 1', 'Mall 01', NULL, NULL),
(5, 'pmasuk2', '$2y$10$IAEFTSwS9Qm7GBKD4X5ApueTuBYL6jITGeU9jCipblKjs1H1EfAtS', 'Petugas Masuk 2', 'Mall 02', NULL, NULL),
(6, 'pruang2', '$2y$10$EIJnqDVoU5so7z3SpYvR1uPy0A1WIfS8wiL8bs8OwkGWlvz66YV.6', 'Petugas Ruang 2', 'Mall 02', NULL, NULL),
(7, 'pkeluar2', '$2y$10$2XM7dNRd/9BfzMSDIBsyb.GOj878BCI7ItGZ5c3Cn8zlhYALdDmBC', 'Petugas Keluar 2', 'Mall 02', NULL, NULL),
(8, 'pmasuk3', '$2y$10$48YxWo9Fcm0ELRNOi/iEbeeCW.ZTF0.z1CSuWuKvqCQMOLI92a0iy', 'Petugas Masuk 3', 'Mall 03', NULL, NULL),
(9, 'pruang3', '$2y$10$dK5e87CRunKx53sWG/FpmOn.uLh/DdRNjAwUT0wgKSrUxgwRHKbh2', 'Petugas Ruang 3', 'Mall 03', NULL, NULL),
(10, 'pkeluar3', '$2y$10$NgKNr4Kb7plmdo74Kng1u.YC8iPq5AObF287GBvt5c016Z7e6rZ9C', 'Petugas Keluar 3', 'Mall 03', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkir`
--
ALTER TABLE `parkir`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parkir_platnomor_unique` (`platNomor`);

--
-- Indexes for table `parkir2`
--
ALTER TABLE `parkir2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parkir2_platnomor_unique` (`platNomor`);

--
-- Indexes for table `parkir3`
--
ALTER TABLE `parkir3`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parkir3_platnomor_unique` (`platNomor`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ruangan_ruang_unique` (`ruang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `parkir`
--
ALTER TABLE `parkir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parkir2`
--
ALTER TABLE `parkir2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parkir3`
--
ALTER TABLE `parkir3`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
