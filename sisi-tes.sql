-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 02, 2023 at 04:24 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisi-tes`
--

-- --------------------------------------------------------

--
-- Table structure for table `i_error_application`
--

CREATE TABLE `i_error_application` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `error_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modules` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `function` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `error_line` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `error_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `param` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_mark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_level` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_mark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `id_level`, `menu_name`, `menu_link`, `menu_icon`, `parent_id`, `create_by`, `delete_mark`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 2, 'My Profile', 'user', 'fas fa-fw fa-user', '1', '0', '0', '0', NULL, NULL),
(2, 2, 'Menu Settings', 'user', '	\r\nfas fa-fw fa-pencil', '2', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_level`
--

CREATE TABLE `menu_level` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_level`
--

INSERT INTO `menu_level` (`id`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_user`
--

CREATE TABLE `menu_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `delete_mark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_user`
--

INSERT INTO `menu_user` (`id`, `id_user`, `menu_id`, `delete_mark`, `update_by`, `created_at`, `updated_at`) VALUES
(3, 8, 1, '0', '0', NULL, NULL),
(4, 8, 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_mark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_user`, `username`, `password`, `email`, `no_hp`, `pin`, `id_jenis_user`, `status_user`, `delete_mark`, `created_at`, `updated_at`) VALUES
(3, 'asdsa', 'sadsa', '$2y$10$9UaNfhqyzNdz9SKyGgxrLer/l1Zleo.G4DkCayCvGQ45Fp83Y8hEO', 'asd@gmail.com', '21321423', '1234', '2', '1', '', '0000-00-00 00:00:00', NULL),
(4, 'assdsddd', 'sdadas44', '$2y$10$zX5BNWBS/X4bju38pjoZLOuPzWuAHYQSfdSReJcanIoju4mJVAoPa', 'jiji@gmail.com', '92801390089', '1234', '2', '1', '', '0000-00-00 00:00:00', NULL),
(5, 'cdfnngf', 'fdghg', '$2y$10$XKw9R6XwxJBV2lxDj8JnZuFR6lXiV.elUksLZtpd0u/Wog4TqXMke', 'koko@gmail.com', '98932129', '1234', '2', '1', '', NULL, NULL),
(6, 'dsfsdfs', 'dfsfsd', '$2y$10$auQZMalfyr4N4nPtleiwwOYlhPE6FP03y4fpp53g/K6ZP6XtEJ2Ua', 'aja@gmail.com', '088389', '1234', '2', '1', '', '2023-09-01 18:30:32', NULL),
(7, 'sadasd', 'dsfsdf', '$2y$10$3siF/o5/cuU975lCmStosuTMQADejb.FsBOPBhnVrrid58i73UcIC', 'opo@gmail.com', '03829289', '1234', '2', '1', '', '2023-09-01 18:31:45', NULL),
(8, 'Aji R', 'aji', '$2y$10$h3Rti.mLGddX.0JSJB1EseFb4oz.qNn17m8fzU5Yngzay8pj13Ym6', 'aji@gmail.com', '0912828191', '1234', '1', '1', '', '2023-09-02 01:32:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_mark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_foto`
--

CREATE TABLE `user_foto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_mark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `i_error_application`
--
ALTER TABLE `i_error_application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `i_error_applications_id_user_foreign` (`id_user`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_id_level_foreign` (`id_level`);

--
-- Indexes for table `menu_level`
--
ALTER TABLE `menu_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_user`
--
ALTER TABLE `menu_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_users_id_user_foreign` (`id_user`),
  ADD KEY `menu_users_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_no_hp_unique` (`no_hp`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activities_id_user_foreign` (`id_user`);

--
-- Indexes for table `user_foto`
--
ALTER TABLE `user_foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fotos_id_user_foreign` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `i_error_application`
--
ALTER TABLE `i_error_application`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_level`
--
ALTER TABLE `menu_level`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_user`
--
ALTER TABLE `menu_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_foto`
--
ALTER TABLE `user_foto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menus_id_level_foreign` FOREIGN KEY (`id_level`) REFERENCES `menu_level` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_user`
--
ALTER TABLE `menu_user`
  ADD CONSTRAINT `menu_users_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `menu_users_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

--
-- Constraints for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD CONSTRAINT `user_activities_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_foto`
--
ALTER TABLE `user_foto`
  ADD CONSTRAINT `user_fotos_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
