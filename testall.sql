-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2021 at 10:23 AM
-- Server version: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testall`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_22_062358_create_students_table', 1),
(5, '2021_04_22_074627_alter_students_table', 2);

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `studentname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fathername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mothername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `studentname`, `fathername`, `mothername`, `email`, `date`, `education`, `country`, `image`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'palvi dhadwal', 'salinder', 'anita devi', 'anita123@gmail.com', '2021-04-01', 'BCA,MCA,BBA', 'Pakistan', '1619075436.png', 'dasuya', '2021-04-22 01:40:36', '2021-04-22 06:31:50', NULL),
(3, 'Gaganpreet', 'Lakhi', 'Satwinder', 'gaganpreet123@gmail.com', '2021-03-31', 'BCA,MCA,BBA', 'Pakistan', '1619078115.png', 'dasuya', '2021-04-22 02:25:15', '2021-04-22 04:30:07', NULL),
(4, 'Nayra', 'aman kumar', 'Shivani kaushal', 'nayra123@gmail.com', '2017-08-01', 'BCA,MCA,BBA', 'Pakistan', '1619089219.png', 'fatehpur', '2021-04-22 05:30:19', '2021-04-22 05:33:56', NULL),
(5, 'palvi', 'salinder singh', 'anita devi', 'superadmin@edufirm.com', '2021-04-22', 'BCA,MCA', 'Canada', '1619092684.png', 'fathpur', '2021-04-22 06:28:04', '2021-04-22 06:28:04', NULL),
(6, 'palvi', 'salinder singh', 'anita devi', 'kwcmeerut@gmail.com', '2021-04-01', 'BCA,MCA', 'Pakistan', '1619095823.png', 'fatehpur', '2021-04-22 07:20:23', '2021-04-25 23:01:08', NULL),
(7, 'nayra', 'amankumar', 'shivanikaushal', 'nayra123@gmail.com', '2017-8-01', 'MCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:01:34', '2021-04-23 00:01:34', NULL),
(8, 'nayra', 'amankumar', 'shivanikaushal', 'nayra123@gmail.com', '2017-08-01', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:03:00', '2021-04-23 00:03:00', NULL),
(9, 'shivan', 'amankumar', 'shivanikaushal', 'shivan123@gmail.com', '2021-04-15', 'BCA,MCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:15:15', '2021-04-23 00:28:50', NULL),
(10, 'shivan', 'amankumar', 'shivanikaushal', 'shivan123@gmail.com', '2021-04-13', 'BCA,MCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:16:11', '2021-04-23 00:19:46', NULL),
(11, 'shivan1', 'amankumar1', 'shivanikaushal1', '1shivan123@gmail.com', '1998-08-25', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(12, 'shivan2', 'amankumar2', 'shivanikaushal2', '2shivan123@gmail.com', '1998-08-26', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(13, 'shivan3', 'amankumar3', 'shivanikaushal3', '3shivan123@gmail.com', '1998-08-27', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(14, 'shivan4', 'amankumar4', 'shivanikaushal4', '4shivan123@gmail.com', '1998-08-28', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(15, 'shivan5', 'amankumar5', 'shivanikaushal5', '5shivan123@gmail.com', '1998-08-29', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(16, 'shivan6', 'amankumar6', 'shivanikaushal6', '6shivan123@gmail.com', '1998-08-30', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(17, 'shivan7', 'amankumar7', 'shivanikaushal7', '7shivan123@gmail.com', '1998-08-31', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(18, 'shivan8', 'amankumar8', 'shivanikaushal8', '8shivan123@gmail.com', '1998-09-01', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(19, 'shivan9', 'amankumar9', 'shivanikaushal9', '9shivan123@gmail.com', '1998-09-02', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(20, 'shivan10', 'amankumar10', 'shivanikaushal10', '10shivan123@gmail.com', '1998-09-03', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(21, 'shivan11', 'amankumar11', 'shivanikaushal11', '11shivan123@gmail.com', '1998-09-04', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(22, 'shivan12', 'amankumar12', 'shivanikaushal12', '12shivan123@gmail.com', '1998-09-05', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(23, 'shivan13', 'amankumar13', 'shivanikaushal13', '13shivan123@gmail.com', '1998-09-06', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(24, 'shivan14', 'amankumar14', 'shivanikaushal14', '14shivan123@gmail.com', '1998-09-07', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(25, 'shivan15', 'amankumar15', 'shivanikaushal15', '15shivan123@gmail.com', '1998-09-08', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(26, 'shivan16', 'amankumar16', 'shivanikaushal16', '16shivan123@gmail.com', '1998-09-09', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(27, 'shivan17', 'amankumar17', 'shivanikaushal17', '17shivan123@gmail.com', '1998-09-10', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(28, 'shivan18', 'amankumar18', 'shivanikaushal18', '18shivan123@gmail.com', '1998-09-11', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(29, 'shivan19', 'amankumar19', 'shivanikaushal19', '19shivan123@gmail.com', '1998-09-12', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(30, 'shivan20', 'amankumar20', 'shivanikaushal20', '20shivan123@gmail.com', '1998-09-13', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 00:26:30', '2021-04-23 00:26:30', NULL),
(31, 'shivan1', 'amankumar1', 'shivanikaushal1', '1shivan123@gmail.com', '1998-08-25', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(32, 'shivan2', 'amankumar2', 'shivanikaushal2', '2shivan123@gmail.com', '1998-08-26', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(33, 'shivan3', 'amankumar3', 'shivanikaushal3', '3shivan123@gmail.com', '1998-08-27', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(34, 'shivan4', 'amankumar4', 'shivanikaushal4', '4shivan123@gmail.com', '1998-08-28', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(35, 'shivan5', 'amankumar5', 'shivanikaushal5', '5shivan123@gmail.com', '1998-08-29', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(36, 'shivan6', 'amankumar6', 'shivanikaushal6', '6shivan123@gmail.com', '1998-08-30', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(37, 'shivan7', 'amankumar7', 'shivanikaushal7', '7shivan123@gmail.com', '1998-08-31', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(38, 'shivan8', 'amankumar8', 'shivanikaushal8', '8shivan123@gmail.com', '1998-09-01', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(39, 'shivan9', 'amankumar9', 'shivanikaushal9', '9shivan123@gmail.com', '1998-09-02', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(40, 'shivan10', 'amankumar10', 'shivanikaushal10', '10shivan123@gmail.com', '1998-09-03', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(41, 'shivan11', 'amankumar11', 'shivanikaushal11', '11shivan123@gmail.com', '1998-09-04', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(42, 'shivan12', 'amankumar12', 'shivanikaushal12', '12shivan123@gmail.com', '1998-09-05', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(43, 'shivan13', 'amankumar13', 'shivanikaushal13', '13shivan123@gmail.com', '1998-09-06', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(44, 'shivan14', 'amankumar14', 'shivanikaushal14', '14shivan123@gmail.com', '1998-09-07', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(45, 'shivan15', 'amankumar15', 'shivanikaushal15', '15shivan123@gmail.com', '1998-09-08', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(46, 'shivan16', 'amankumar16', 'shivanikaushal16', '16shivan123@gmail.com', '1998-09-09', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(47, 'shivan17', 'amankumar17', 'shivanikaushal17', '17shivan123@gmail.com', '1998-09-10', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(48, 'shivan18', 'amankumar18', 'shivanikaushal18', '18shivan123@gmail.com', '1998-09-11', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(49, 'shivan19', 'amankumar19', 'shivanikaushal19', '19shivan123@gmail.com', '1998-09-12', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL),
(50, 'shivan20', 'amankumar20', 'shivanikaushal20', '20shivan123@gmail.com', '1998-09-13', 'MCA,BCA', 'India', '1619078115.png', 'fatehpur', '2021-04-23 01:05:19', '2021-04-23 01:05:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
