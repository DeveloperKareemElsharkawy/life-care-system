-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2022 at 07:24 PM
-- Server version: 10.3.37-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elwa_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `mobile` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `status`, `mobile`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super_admin@app.com', 1, '01000000000', NULL, '$2y$10$eNCUGceE8pRl3q1qKi7Xd.XtLKqVLSVOHQ6NtyVrC21mHYuvs0PxC', NULL, '2022-05-28 12:00:06', '2022-05-28 12:00:06'),
(2, 'Super Admin', 'admin@app.com', 1, '01000000001', 'admin-panel/system/users/lpNxdz1DpYdaba8Cqqmv3El08BXrjmDmqaoESlgU.jpg', '$2y$10$jFGlNWEApQr77Pq8Ap3enOB0wUu//yIxyUxttZ7YyKkZ/VSH55zzG', NULL, '2022-05-28 12:00:06', '2022-06-02 10:44:40'),
(3, 'Mohammed Khalifa', 'tester@gmail.com', 1, '01097605373', 'admin-panel/system/users/fRTKlW5dhfucMxEfrdCOU0ICz9ihQxROUzKJ73lx.jpg', '$2y$10$eNCUGceE8pRl3q1qKi7Xd.XtLKqVLSVOHQ6NtyVrC21mHYuvs0PxC', NULL, '2022-06-02 06:43:28', '2022-06-02 11:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

CREATE TABLE `admin_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_settings`
--

INSERT INTO `admin_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'theme', 'light-mode', NULL, NULL),
(2, 'aside_menu', 'light-menu', NULL, NULL),
(3, 'header_menu', 'light-header', NULL, NULL),
(4, 'aside_menu_style', 'default-menu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_facebook` varchar(255) DEFAULT NULL,
  `app_twitter` varchar(255) DEFAULT NULL,
  `app_instagram` varchar(255) DEFAULT NULL,
  `app_linkedin` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `building` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `app_facebook`, `app_twitter`, `app_instagram`, `app_linkedin`, `latitude`, `longitude`, `building`, `address`, `email`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 'app_facebook', 'app_twitter', 'app_instagram', 'app_linkedin', '31.4151', '31.8115', 'مبنى الوعب', 'شارع الخيام - لوسيل - قطر', 'alim.mohamed@gmail.com', '+2019588128512', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `color`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'خادم', 'azure', 'admin-panel/users/7i6SFYnllYU94jFAkTUdWtfDGMREiKNbbSx0DtQF.png', 1, '2022-05-28 12:00:09', '2022-07-06 20:49:38'),
(2, 'ممرض', 'yellow', 'admin-panel/users/gSIVV733Q35OUh9vEusecfNOTanX7er1ImJv4JFQ.jpg', 1, '2022-05-28 12:00:09', '2022-06-01 18:14:20'),
(3, 'سائق', 'azure', 'admin-panel/users/iqMyqbHapRcYwsdKhSTdevGBgojKgvN5PEa4JL8Q.jpg', 1, '2022-05-28 12:00:09', '2022-06-01 18:20:09'),
(4, 'جليسه اطفال', 'yellow', 'admin-panel/users/qQ1FIKOOsrSXJjoEnIHTj6yhduhu7M9dq6A99XT2.jpg', 1, '2022-05-28 12:00:09', '2022-06-01 18:20:57'),
(5, 'طباخ', 'green', 'admin-panel/users/9k8B7ZyQjJh9F9DJ5XgCpHpoxwExeIaw4YXvjtZF.jpg', 1, '2022-05-28 12:00:09', '2022-06-02 07:03:04'),
(8, 'سائقيين VIP', 'red', 'admin-panel/category/Tv4axX8lAeyM4RCGz8x7S87pEvnpOXphMvpwyp2w.jpg', 1, '2022-07-06 20:53:26', '2022-07-06 20:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `category_worker`
--

CREATE TABLE `category_worker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `worker_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_worker`
--

INSERT INTO `category_worker` (`id`, `category_id`, `worker_id`) VALUES
(7, 1, 4),
(8, 2, 4),
(9, 3, 4),
(10, 5, 4),
(11, 2, 3),
(12, 5, 3),
(13, 3, 6),
(14, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone_number`, `subject`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'kareem elsharkawy', 'kareimovich@gmail.com', '01097605373', 'Title Here', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi euismod erat eros, id volutpat sem mattis vitae. Nam sit amet ipsum sed ante efficitur sagittis at eget sem. In consequat quis ipsum ac iaculis. Maecenas et lectus consectetur, placerat tellus ac, consequat nunc. Vestibulum ut orci et diam feugiat vehicula vel non sapien. Proin at efficitur mi.', 1, '2022-06-23 03:15:08', '2022-06-27 10:39:01'),
(2, 'karamm', 'cc@cc.cc', '01007095855', 'hdddhdhdhdh', 'cnvncncncncn', 0, '2022-07-01 19:18:04', '2022-07-01 19:18:04'),
(3, 'محمد محمود', 'm.f.keshk@gmail.com', '66497607', 'اقتراح', 'نرجو من سيادتكم النظر فى الشكوى المقدمة', 1, '2022-07-06 21:41:41', '2022-07-06 21:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'user_id',
  `favoriteable_type` varchar(255) NOT NULL,
  `favoriteable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `favoriteable_type`, `favoriteable_id`, `created_at`, `updated_at`) VALUES
(7, 2, 'App\\Models\\Worker', 3, '2022-06-18 03:47:55', '2022-06-18 03:47:55'),
(16, 6, 'App\\Models\\Worker', 4, '2022-07-02 01:02:43', '2022-07-02 01:02:43'),
(78, 7, 'App\\Models\\Worker', 3, '2022-07-05 07:40:09', '2022-07-05 07:40:09'),
(79, 7, 'App\\Models\\Worker', 4, '2022-07-05 07:40:11', '2022-07-05 07:40:11'),
(80, 10, 'App\\Models\\Worker', 3, '2022-07-05 07:47:17', '2022-07-05 07:47:17'),
(82, 10, 'App\\Models\\Worker', 4, '2022-07-05 19:06:52', '2022-07-05 19:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_logger_activity`
--

CREATE TABLE `laravel_logger_activity` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` longtext NOT NULL,
  `details` longtext DEFAULT NULL,
  `userType` varchar(255) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `route` longtext DEFAULT NULL,
  `ipAddress` varchar(45) DEFAULT NULL,
  `userAgent` text DEFAULT NULL,
  `locale` varchar(255) DEFAULT NULL,
  `referer` longtext DEFAULT NULL,
  `methodType` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laravel_logger_activity`
--

INSERT INTO `laravel_logger_activity` (`id`, `description`, `details`, `userType`, `userId`, `route`, `ipAddress`, `userAgent`, `locale`, `referer`, `methodType`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Viewed admin/activity', NULL, 'Registered', 3, 'http://127.0.0.1:9090/admin/activity', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36 Edg/101.0.1210.53', 'en-US,en;q=0.9,ar;q=0.8', NULL, 'GET', '2022-06-02 09:34:54', '2022-06-02 09:34:54', NULL),
(2, 'Viewed admin/activity', NULL, 'Registered', 3, 'http://127.0.0.1:9090/admin/activity', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36 Edg/101.0.1210.53', 'en-US,en;q=0.9,ar;q=0.8', NULL, 'GET', '2022-06-02 09:34:59', '2022-06-02 09:34:59', NULL),
(3, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36 Edg/101.0.1210.53', 'en-US,en;q=0.9,ar;q=0.8', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-02 09:55:34', '2022-06-02 09:55:34', NULL),
(4, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36 Edg/101.0.1210.53', 'en-US,en;q=0.9,ar;q=0.8', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-02 09:57:52', '2022-06-02 09:57:52', NULL),
(5, 'Logging this activity.', 'Additional activity details.', 'Registered', 3, 'http://127.0.0.1:9090/admin/system/users/3/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36 Edg/101.0.1210.53', 'en-US,en;q=0.9,ar;q=0.8', 'http://127.0.0.1:9090/admin/system/users/3/edit', 'POST', '2022-06-02 10:48:30', '2022-06-02 10:48:30', NULL),
(6, 'تعديل بيانات  name:', 'Additional activity details.', 'Registered', 3, 'http://127.0.0.1:9090/admin/system/users/3/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36 Edg/101.0.1210.53', 'en-US,en;q=0.9,ar;q=0.8', 'http://127.0.0.1:9090/admin/system/users/3/edit', 'POST', '2022-06-02 11:22:38', '2022-06-02 11:22:38', NULL),
(7, 'تعديل بيانات  admin', 'Additional activity details.', 'Registered', 3, 'http://127.0.0.1:9090/admin/system/users/3/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36 Edg/101.0.1210.53', 'en-US,en;q=0.9,ar;q=0.8', 'http://127.0.0.1:9090/admin/system/users/3/edit', 'POST', '2022-06-02 11:22:58', '2022-06-02 11:22:58', NULL),
(8, 'تعديل بيانات  admin', '{\"_token\":\"N4LRv9LlJxSAssYEXwPuwRt59yVMrzbcSIr9eYWG\",\"admin_id\":\"3\",\"name\":\"Mohammed Khalifa\",\"email\":\"tester@gmail.com\",\"mobile\":\"01097605373\",\"password\":null,\"roles\":[\"1\",\"2\"],\"status\":1}', 'Registered', 3, 'http://127.0.0.1:9090/admin/system/users/3/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36 Edg/101.0.1210.53', 'en-US,en;q=0.9,ar;q=0.8', 'http://127.0.0.1:9090/admin/system/users/3/edit', 'POST', '2022-06-02 11:26:01', '2022-06-02 11:26:01', NULL),
(9, 'تعديل بيانات  admin', '{\"admin_id\":\"3\",\"name\":\"Mohammed Khalifa\",\"email\":\"tester@gmail.com\",\"mobile\":\"01097605373\",\"roles\":[\"1\",\"2\"]}', 'Registered', 3, 'http://127.0.0.1:9090/admin/system/users/3/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36 Edg/101.0.1210.53', 'en-US,en;q=0.9,ar;q=0.8', 'http://127.0.0.1:9090/admin/system/users/3/edit', 'POST', '2022-06-02 11:30:25', '2022-06-02 11:30:25', NULL),
(10, 'Logged In', NULL, 'Guest', NULL, 'https://mohamedkeshk.com/admin/login', '154.181.140.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8', 'https://mohamedkeshk.com/admin/login', 'POST', '2022-06-03 17:48:44', '2022-06-03 17:48:44', NULL),
(11, 'Logged Out', NULL, 'Registered', 1, 'http://mohamedkeshk.com/admin/logout', '154.181.140.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8', 'http://mohamedkeshk.com/admin', 'GET', '2022-06-03 17:50:07', '2022-06-03 17:50:07', NULL),
(12, 'Failed Login Attempt', NULL, 'Guest', NULL, 'http://mohamedkeshk.com/admin/login', '154.181.140.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8', 'http://mohamedkeshk.com/admin/login', 'POST', '2022-06-03 17:50:18', '2022-06-03 17:50:18', NULL),
(13, 'Failed Login Attempt', NULL, 'Guest', NULL, 'http://mohamedkeshk.com/admin/login', '154.181.140.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8', 'http://mohamedkeshk.com/admin/login', 'POST', '2022-06-03 17:50:22', '2022-06-03 17:50:22', NULL),
(14, 'Failed Login Attempt', NULL, 'Guest', NULL, 'http://mohamedkeshk.com/admin/login', '154.181.140.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8', 'http://mohamedkeshk.com/admin/login', 'POST', '2022-06-03 17:50:25', '2022-06-03 17:50:25', NULL),
(15, 'Failed Login Attempt', NULL, 'Guest', NULL, 'http://mohamedkeshk.com/admin/login', '154.181.140.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8', 'http://mohamedkeshk.com/admin/login', 'POST', '2022-06-03 17:50:31', '2022-06-03 17:50:31', NULL),
(16, 'Logged In', NULL, 'Guest', NULL, 'http://mohamedkeshk.com/admin/login', '154.181.140.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8', 'http://mohamedkeshk.com/admin/login', 'POST', '2022-06-03 17:50:56', '2022-06-03 17:50:56', NULL),
(17, 'تعديل بيانات  admin', '{\"id\":2,\"name\":\"Super Admin\",\"email\":\"admin@app.com\",\"status\":\"1\",\"mobile\":\"01000000001\",\"image\":\"admin-panel\\/system\\/users\\/lpNxdz1DpYdaba8Cqqmv3El08BXrjmDmqaoESlgU.jpg\",\"created_at\":\"2022-05-28T05:00:06.000000Z\",\"updated_at\":\"2022-06-02T03:44:40.000000Z\",\"imageUrl\":\"http:\\/\\/mohamedkeshk.com\\/storage\\/admin-panel\\/system\\/users\\/lpNxdz1DpYdaba8Cqqmv3El08BXrjmDmqaoESlgU.jpg\"}', 'Registered', 3, 'http://mohamedkeshk.com/admin/system/users/2/update', '154.181.140.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8', 'http://mohamedkeshk.com/admin/system/users/2/edit', 'POST', '2022-06-03 17:54:09', '2022-06-03 17:54:09', NULL),
(18, 'Logged Out', NULL, 'Registered', 3, 'http://mohamedkeshk.com/admin/logout', '154.181.140.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8', 'http://mohamedkeshk.com/admin/roles', 'GET', '2022-06-03 17:56:17', '2022-06-03 17:56:17', NULL),
(19, 'Logged In', NULL, 'Guest', NULL, 'http://mohamedkeshk.com/admin/login', '154.181.140.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8', 'http://mohamedkeshk.com/admin/login', 'POST', '2022-06-03 17:56:23', '2022-06-03 17:56:23', NULL),
(20, 'Logged Out', NULL, 'Registered', 1, 'http://mohamedkeshk.com/admin/logout', '154.181.140.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8', 'http://mohamedkeshk.com/admin', 'GET', '2022-06-03 17:56:43', '2022-06-03 17:56:43', NULL),
(21, 'Logged In', NULL, 'Guest', NULL, 'http://mohamedkeshk.com/admin/login', '172.225.229.27', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/102.0.5005.67 Mobile/15E148 Safari/604.1', 'en-GB,en-US;q=0.9,en;q=0.8', 'http://mohamedkeshk.com/admin/login', 'POST', '2022-06-03 21:40:36', '2022-06-03 21:40:36', NULL),
(22, 'Logged In', NULL, 'Guest', NULL, 'http://mohamedkeshk.com/admin/login', '78.101.150.200', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36', 'en-US,en;q=0.9', 'http://mohamedkeshk.com/admin/login', 'POST', '2022-06-03 23:06:39', '2022-06-03 23:06:39', NULL),
(23, 'Logged In', NULL, 'Guest', NULL, 'http://mohamedkeshk.com/admin/login', '178.153.29.81', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.5 Safari/605.1.15', 'ar', 'http://mohamedkeshk.com/admin/login', 'POST', '2022-06-03 23:38:55', '2022-06-03 23:38:55', NULL),
(24, 'Logged In', NULL, 'Guest', NULL, 'http://mohamedkeshk.com/admin/login', '156.197.64.49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8', 'http://mohamedkeshk.com/admin/login', 'POST', '2022-06-04 17:00:38', '2022-06-04 17:00:38', NULL),
(25, 'Logged In', NULL, 'Guest', NULL, 'http://mohamedkeshk.com/admin/login', '78.101.150.200', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36', 'en-US,en;q=0.9', 'http://mohamedkeshk.com/admin/login', 'POST', '2022-06-04 17:01:53', '2022-06-04 17:01:53', NULL),
(26, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-05 08:02:58', '2022-06-05 08:02:58', NULL),
(27, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-05 11:13:53', '2022-06-05 11:13:53', NULL),
(28, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-05 14:26:04', '2022-06-05 14:26:04', NULL),
(29, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-06 14:28:07', '2022-06-06 14:28:07', NULL),
(30, 'تعديل بيانات  workerArchives', '{\"id\":2,\"worker_id\":4,\"title\":\"test\",\"description\":\"test\",\"images\":\"[\\\"workerArchives\\\\\\/ouVuZtd83m_service.png\\\",\\\"workerArchives\\\\\\/VW9kqZcGDs_service.png\\\",\\\"workerArchives\\\\\\/lAxBFEpZSU_service.png\\\",\\\"workerArchives\\\\\\/K3nAH24tE1_service.png\\\"]\",\"created_at\":\"2022-06-06T20:59:52.000000Z\",\"updated_at\":\"2022-06-06T20:59:52.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/workers-archive/2/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/workers-archive/worker/4/archive/2/edit', 'POST', '2022-06-06 19:29:47', '2022-06-06 19:29:47', NULL),
(31, 'تعديل بيانات  workerArchives', '{\"id\":1,\"worker_id\":4,\"title\":\"tes\",\"description\":\"trst\",\"images\":\"[\\\"workerArchives\\\\\\/CpAIFSV9eW_service.png\\\",\\\"workerArchives\\\\\\/SS7q3jNSB1_service.png\\\"]\",\"created_at\":\"2022-06-06T20:01:45.000000Z\",\"updated_at\":\"2022-06-06T20:01:45.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/workers-archive/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/workers-archive/worker/4/archive/1/edit', 'POST', '2022-06-06 19:29:58', '2022-06-06 19:29:58', NULL),
(32, 'تعديل بيانات  workerArchives', '{\"id\":1,\"worker_id\":4,\"title\":\"tes\",\"description\":\"trst\",\"images\":\"[\\\"workerArchives\\\\\\/4YwYsuQhrp_service.png\\\"]\",\"created_at\":\"2022-06-06T20:01:45.000000Z\",\"updated_at\":\"2022-06-06T21:31:20.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/workers-archive/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/workers-archive/worker/4/archive/1/edit', 'POST', '2022-06-06 19:31:20', '2022-06-06 19:31:20', NULL),
(33, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-07 05:21:13', '2022-06-07 05:21:13', NULL),
(34, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-07 05:21:13', '2022-06-07 05:21:13', NULL),
(35, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.30', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-07 12:24:09', '2022-06-07 12:24:09', NULL),
(36, 'تعديل بيانات  workerArchives', '{\"id\":1,\"worker_id\":4,\"title\":\"tes\",\"description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"images\":\"[\\\"workerArchives\\\\\\/QcvaWLSLyv_service.png\\\"]\",\"created_at\":\"2022-06-06T20:01:45.000000Z\",\"updated_at\":\"2022-06-07T16:36:45.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/workers-archive/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.33', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/workers-archive/worker/4/archive/1/edit', 'POST', '2022-06-07 14:36:45', '2022-06-07 14:36:45', NULL),
(37, 'تعديل بيانات  workerArchives', '{\"id\":1,\"worker_id\":4,\"title\":\"tes\",\"description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"images\":\"[\\\"workerArchives\\\\\\/KHtxTplFPt_service.png\\\"]\",\"created_at\":\"2022-06-06T20:01:45.000000Z\",\"updated_at\":\"2022-06-07T16:56:26.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/workers-archive/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.33', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/workers-archive/worker/4/archive/1/edit', 'POST', '2022-06-07 14:56:26', '2022-06-07 14:56:26', NULL),
(38, 'تعديل بيانات  workerArchives', '{\"id\":1,\"worker_id\":4,\"title\":\"tes\",\"description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"images\":\"[\\\"workerArchives\\\\\\/I0V3AvxN3m_service.png\\\"]\",\"created_at\":\"2022-06-06T20:01:45.000000Z\",\"updated_at\":\"2022-06-07T17:16:59.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/workers-archive/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.33', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/workers-archive/worker/4/archive/1/edit', 'POST', '2022-06-07 15:16:59', '2022-06-07 15:16:59', NULL),
(39, 'تعديل بيانات  workerArchives', '{\"id\":1,\"worker_id\":4,\"title\":\"tes\",\"description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &amp;#039;Content here, content here&amp;#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &amp;#039;lorem ipsum&amp;#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"images\":\"[\\\"workerArchives\\\\\\/VbTJjyyVWS_service.png\\\"]\",\"created_at\":\"2022-06-06T20:01:45.000000Z\",\"updated_at\":\"2022-06-07T17:18:44.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/workers-archive/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.33', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/workers-archive/worker/4/archive/1/edit', 'POST', '2022-06-07 15:18:44', '2022-06-07 15:18:44', NULL),
(40, 'تعديل بيانات  workerArchives', '{\"id\":1,\"worker_id\":4,\"title\":\"tes\",\"description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &amp;amp;#039;Content here, content here&amp;amp;#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &amp;amp;#039;lorem ipsum&amp;amp;#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"images\":\"[\\\"workerArchives\\\\\\/maC0ktWGKM_service.png\\\",\\\"workerArchives\\\\\\/ppIkjCC0Qe_service.png\\\"]\",\"created_at\":\"2022-06-06T20:01:45.000000Z\",\"updated_at\":\"2022-06-07T17:34:53.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/workers-archive/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.33', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/workers-archive/worker/4/archive/1/edit', 'POST', '2022-06-07 15:34:53', '2022-06-07 15:34:53', NULL),
(41, 'تعديل بيانات  userArchive', '{\"id\":1,\"user_id\":1,\"title\":\"test\",\"description\":\"test\",\"images\":\"[\\\"userArchive\\\\\\/qEeTtlIXPr_service.png\\\",\\\"userArchive\\\\\\/EEvyC4PFi9_service.png\\\",\\\"userArchive\\\\\\/ep2Cl2imwg_service.png\\\",\\\"userArchive\\\\\\/VGKdnWJDWh_service.png\\\"]\",\"created_at\":\"2022-06-07T19:09:21.000000Z\",\"updated_at\":\"2022-06-07T19:30:02.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/users-archive/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.33', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/users-archive/user/1/archive/1/edit', 'POST', '2022-06-07 17:30:02', '2022-06-07 17:30:02', NULL),
(42, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.33', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-08 19:19:39', '2022-06-08 19:19:39', NULL),
(43, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.39', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-17 21:15:01', '2022-06-17 21:15:01', NULL),
(44, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36 Edg/102.0.1245.39', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-17 21:35:03', '2022-06-17 21:35:03', NULL),
(45, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-19 14:51:31', '2022-06-19 14:51:31', NULL),
(46, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-20 00:31:25', '2022-06-20 00:31:25', NULL),
(47, 'تعديل بيانات  nationalityProcessStep', '{\"id\":1,\"title\":\"\\u062e\\u0637\\u0648\\u0647 \\u0631\\u0642\\u0645 1\",\"description\":null,\"order\":null,\"status\":0,\"created_at\":\"2022-06-20T04:07:27.000000Z\",\"updated_at\":\"2022-06-20T04:07:27.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/nationality-process-steps/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/nationality-process-steps/1/edit', 'POST', '2022-06-20 02:36:41', '2022-06-20 02:36:41', NULL),
(48, 'تعديل بيانات  nationalityProcessStep', '{\"id\":1,\"title\":\"\\u062e\\u0637\\u0648\\u0647 \\u0631\\u0642\\u0645 1\",\"description\":null,\"order\":null,\"status\":0,\"created_at\":\"2022-06-20T04:07:27.000000Z\",\"updated_at\":\"2022-06-20T04:07:27.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/nationality-process-steps/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/nationality-process-steps/1/edit', 'POST', '2022-06-20 02:38:12', '2022-06-20 02:38:12', NULL),
(49, 'تعديل بيانات  nationalityProcessStep', '{\"id\":1,\"title\":\"\\u062e\\u0637\\u0648\\u0647 \\u0631\\u0642\\u0645 1\",\"description\":null,\"order\":null,\"status\":1,\"created_at\":\"2022-06-20T04:07:27.000000Z\",\"updated_at\":\"2022-06-20T04:40:57.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/nationality-process-steps/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/nationality-process-steps/1/edit', 'POST', '2022-06-20 02:40:57', '2022-06-20 02:40:57', NULL),
(50, 'تعديل بيانات  nationalityProcessStep', '{\"id\":1,\"title\":\"\\u062e\\u0637\\u0648\\u0647 \\u0631\\u0642\\u0645 1\",\"description\":\"\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0647\\u0648 \\u0645\\u062b\\u0627\\u0644 \\u0644\\u0646\\u0635 \\u064a\\u0645\\u0643\\u0646 \\u0623\\u0646 \\u064a\\u0633\\u062a\\u0628\\u062f\\u0644 \\u0641\\u064a \\u0646\\u0641\\u0633 \\u0627\\u0644\\u0645\\u0633\\u0627\\u062d\\u0629\\u060c \\u0644\\u0642\\u062f \\u062a\\u0645 \\u062a\\u0648\\u0644\\u064a\\u062f \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0645\\u0646 \\u0645\\u0648\\u0644\\u062f \\u0627\\u0644\\u0646\\u0635 \\u0627\\u0644\\u0639\\u0631\\u0628\\u0649\\u060c \\u062d\\u064a\\u062b \\u064a\\u0645\\u0643\\u0646\\u0643 \\u0623\\u0646 \\u062a\\u0648\\u0644\\u062f \\u0645\\u062b\\u0644 \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0623\\u0648 \\u0627\\u0644\\u0639\\u062f\\u064a\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0646\\u0635\\u0648\\u0635 \\u0627\\u0644\\u0623\\u062e\\u0631\\u0649 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0625\\u0644\\u0649 \\u0632\\u064a\\u0627\\u062f\\u0629 \\u0639\\u062f\\u062f \\u0627\\u0644\\u062d\\u0631\\u0648\\u0641 \\u0627\\u0644\\u062a\\u0649 \\u064a\\u0648\\u0644\\u062f\\u0647\\u0627 \\u0627\\u0644\\u062a\\u0637\\u0628\\u064a\\u0642.\",\"order\":null,\"status\":1,\"created_at\":\"2022-06-20T04:07:27.000000Z\",\"updated_at\":\"2022-06-20T04:43:26.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/nationality-process-steps/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/nationality-process-steps/1/edit', 'POST', '2022-06-20 02:43:26', '2022-06-20 02:43:26', NULL),
(51, 'تعديل بيانات  nationality', '{\"id\":1,\"name\":\"\\u0627\\u0644\\u0647\\u0646\\u062f\",\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-20T05:05:09.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/nationalities/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/nationalities/1/edit', 'POST', '2022-06-20 03:05:09', '2022-06-20 03:05:09', NULL),
(52, 'تعديل بيانات  nationality', '{\"id\":1,\"name\":\"\\u0627\\u0644\\u0647\\u0646\\u062f\",\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-20T05:05:09.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/nationalities/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/nationalities/1/edit', 'POST', '2022-06-20 03:05:16', '2022-06-20 03:05:16', NULL),
(53, 'تعديل بيانات  nationality', '{\"id\":3,\"name\":\"\\u0633\\u0648\\u0631\\u064a\\u0627\",\"created_at\":\"2022-05-29T20:00:36.000000Z\",\"updated_at\":\"2022-06-20T05:05:25.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/nationalities/3/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/nationalities/3/edit', 'POST', '2022-06-20 03:05:25', '2022-06-20 03:05:25', NULL),
(54, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-20 07:05:39', '2022-06-20 07:05:39', NULL),
(55, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-20 13:30:00', '2022-06-20 13:30:00', NULL),
(56, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-20 16:58:47', '2022-06-20 16:58:47', NULL),
(57, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-20 16:58:47', '2022-06-20 16:58:47', NULL),
(58, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-21 08:51:32', '2022-06-21 08:51:32', NULL),
(59, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-21 17:54:40', '2022-06-21 17:54:40', NULL),
(60, 'تعديل بيانات  workerArchives', '{\"id\":1,\"worker_id\":4,\"title\":\"tes\",\"description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &amp;amp;amp;#039;Content here, content here&amp;amp;amp;#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &amp;amp;amp;#039;lorem ipsum&amp;amp;amp;#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"images\":\"[\\\"workerArchives\\\\\\/L2SFQhsIob_service.png\\\",\\\"workerArchives\\\\\\/F2TgE8Keu0_service.png\\\"]\",\"created_at\":\"2022-06-06T20:01:45.000000Z\",\"updated_at\":\"2022-06-22T05:17:00.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/workers-archive/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/workers-archive/worker/4/archive/1/edit', 'POST', '2022-06-22 03:17:00', '2022-06-22 03:17:00', NULL),
(61, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-22 19:33:30', '2022-06-22 19:33:30', NULL),
(62, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-23 02:02:06', '2022-06-23 02:02:06', NULL),
(63, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-24 02:45:19', '2022-06-24 02:45:19', NULL),
(64, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-24 05:48:05', '2022-06-24 05:48:05', NULL),
(65, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-24 15:26:50', '2022-06-24 15:26:50', NULL),
(66, 'تعديل بيانات  orderArchive', '{\"id\":1,\"order_id\":55,\"title\":\"test\",\"description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &amp;amp;amp;amp;#039;Content here, content here&amp;amp;amp;amp;#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &amp;amp;amp;amp;#039;lorem ipsum&amp;amp;amp;amp;#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"images\":\"[\\\"orderArchive\\\\\\/MY2sjKDj4T_service.png\\\",\\\"orderArchive\\\\\\/GQQzp5dAMc_service.png\\\"]\",\"created_at\":\"2022-06-22T05:24:13.000000Z\",\"updated_at\":\"2022-06-25T04:03:36.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/orders-archive/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/orders-archive/order/55/archive/1/edit', 'POST', '2022-06-25 02:03:38', '2022-06-25 02:03:38', NULL),
(67, 'تعديل بيانات  orderArchive', '{\"id\":1,\"order_id\":55,\"title\":\"test\",\"description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &amp;amp;amp;amp;amp;#039;Content here, content here&amp;amp;amp;amp;amp;#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &amp;amp;amp;amp;amp;#039;lorem ipsum&amp;amp;amp;amp;amp;#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"images\":\"[\\\"orderArchive\\\\\\/Y8THALNdwj_service.png\\\",\\\"orderArchive\\\\\\/TigxZiVUpO_service.png\\\",\\\"orderArchive\\\\\\/dH1CABIgn5_service.png\\\"]\",\"created_at\":\"2022-06-22T05:24:13.000000Z\",\"updated_at\":\"2022-06-25T04:03:51.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/orders-archive/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/orders-archive/order/55/archive/1/edit', 'POST', '2022-06-25 02:03:51', '2022-06-25 02:03:51', NULL),
(68, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-25 09:43:33', '2022-06-25 09:43:33', NULL),
(69, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-26 01:27:43', '2022-06-26 01:27:43', NULL),
(70, 'تعديل بيانات  worker', '{\"id\":3,\"name\":\"reda ashraf\",\"dob\":\"1996-06-26\",\"age\":26,\"experience\":6,\"gender\":\"male\",\"marital_status\":\"single\",\"status\":0,\"no_of_children\":3,\"religion\":\"muslim\",\"nationality_id\":\"1\",\"category_id\":\"1\",\"place_of_birth\":\"\\u0645\\u0635\\u0631\",\"living_town\":\"\\u0627\\u0644\\u0645\\u0646\\u0635\\u0648\\u0631\\u0647\",\"passport_number\":\"06161616100606061\",\"release_date\":\"05\\/04\\/2022\",\"expiry_date\":\"05\\/22\\/2022\",\"place_of_issue\":\"\\u0645\\u0635\\u0631\",\"scientific_degree\":\"\\u062f\\u0628\\u0644\\u0648\\u0645\",\"languages\":[\"arabic\",\"english\"],\"height\":\"170\",\"weight\":\"70\",\"skin_colour\":\"\\u0627\\u0633\\u0648\\u062f\",\"salary\":2000,\"contract_full\":\"2\",\"face_image\":\"admin-panel\\/users\\/cvI5cnOQSt9jCieURAMgKtmhRWsCxDTGYoxgSnmX.jpg\",\"worker_image\":\"admin-panel\\/users\\/u3Z5jULY0UW4IDHwBiUbHTzzGKly0qWGCHpujWaU.jpg\",\"created_at\":\"2022-05-29T11:39:06.000000Z\",\"updated_at\":\"2022-05-29T19:54:32.000000Z\",\"faceImageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/cvI5cnOQSt9jCieURAMgKtmhRWsCxDTGYoxgSnmX.jpg\",\"workerImageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/u3Z5jULY0UW4IDHwBiUbHTzzGKly0qWGCHpujWaU.jpg\",\"additional_skills\":[{\"id\":2,\"name\":\"\\u0645\\u0645\\u0631\\u0636\",\"color\":\"yellow\",\"image\":\"admin-panel\\/users\\/gSIVV733Q35OUh9vEusecfNOTanX7er1ImJv4JFQ.jpg\",\"status\":1,\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-01T20:14:20.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/gSIVV733Q35OUh9vEusecfNOTanX7er1ImJv4JFQ.jpg\",\"pivot\":{\"worker_id\":3,\"category_id\":2}},{\"id\":5,\"name\":\"\\u0637\\u0628\\u0627\\u062e\",\"color\":\"green\",\"image\":\"admin-panel\\/users\\/9k8B7ZyQjJh9F9DJ5XgCpHpoxwExeIaw4YXvjtZF.jpg\",\"status\":1,\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-02T09:03:04.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/9k8B7ZyQjJh9F9DJ5XgCpHpoxwExeIaw4YXvjtZF.jpg\",\"pivot\":{\"worker_id\":3,\"category_id\":5}}]}', 'Registered', 1, 'http://127.0.0.1:9090/admin/workers/3/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/workers/3/edit', 'POST', '2022-06-26 03:23:35', '2022-06-26 03:23:35', NULL),
(71, 'تعديل بيانات  worker', '{\"id\":3,\"name\":\"reda ashraf\",\"dob\":\"1996-06-26\",\"age\":26,\"experience\":6,\"gender\":\"male\",\"marital_status\":\"single\",\"status\":0,\"no_of_children\":3,\"religion\":\"muslim\",\"nationality_id\":\"1\",\"category_id\":\"1\",\"place_of_birth\":\"\\u0645\\u0635\\u0631\",\"living_town\":\"\\u0627\\u0644\\u0645\\u0646\\u0635\\u0648\\u0631\\u0647\",\"passport_number\":\"06161616100606061\",\"release_date\":\"05\\/04\\/2022\",\"expiry_date\":\"05\\/22\\/2022\",\"place_of_issue\":\"\\u0645\\u0635\\u0631\",\"scientific_degree\":\"\\u062f\\u0628\\u0644\\u0648\\u0645\",\"languages\":[\"arabic\",\"english\"],\"height\":\"170\",\"weight\":\"70\",\"skin_colour\":\"\\u0627\\u0633\\u0648\\u062f\",\"salary\":2000,\"contract_full\":\"2\",\"face_image\":\"admin-panel\\/users\\/cvI5cnOQSt9jCieURAMgKtmhRWsCxDTGYoxgSnmX.jpg\",\"worker_image\":\"admin-panel\\/users\\/u3Z5jULY0UW4IDHwBiUbHTzzGKly0qWGCHpujWaU.jpg\",\"created_at\":\"2022-05-29T11:39:06.000000Z\",\"updated_at\":\"2022-05-29T19:54:32.000000Z\",\"faceImageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/cvI5cnOQSt9jCieURAMgKtmhRWsCxDTGYoxgSnmX.jpg\",\"workerImageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/u3Z5jULY0UW4IDHwBiUbHTzzGKly0qWGCHpujWaU.jpg\",\"additional_skills\":[{\"id\":2,\"name\":\"\\u0645\\u0645\\u0631\\u0636\",\"color\":\"yellow\",\"image\":\"admin-panel\\/users\\/gSIVV733Q35OUh9vEusecfNOTanX7er1ImJv4JFQ.jpg\",\"status\":1,\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-01T20:14:20.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/gSIVV733Q35OUh9vEusecfNOTanX7er1ImJv4JFQ.jpg\",\"pivot\":{\"worker_id\":3,\"category_id\":2}},{\"id\":5,\"name\":\"\\u0637\\u0628\\u0627\\u062e\",\"color\":\"green\",\"image\":\"admin-panel\\/users\\/9k8B7ZyQjJh9F9DJ5XgCpHpoxwExeIaw4YXvjtZF.jpg\",\"status\":1,\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-02T09:03:04.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/9k8B7ZyQjJh9F9DJ5XgCpHpoxwExeIaw4YXvjtZF.jpg\",\"pivot\":{\"worker_id\":3,\"category_id\":5}}]}', 'Registered', 1, 'http://127.0.0.1:9090/admin/workers/3/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/workers/3/edit', 'POST', '2022-06-26 03:23:47', '2022-06-26 03:23:47', NULL),
(72, 'تعديل بيانات  worker', '{\"id\":3,\"name\":\"reda ashraf\",\"dob\":\"1996-06-26\",\"age\":26,\"experience\":6,\"gender\":\"male\",\"marital_status\":\"single\",\"status\":0,\"no_of_children\":3,\"religion\":\"muslim\",\"nationality_id\":\"1\",\"category_id\":\"1\",\"place_of_birth\":\"\\u0645\\u0635\\u0631\",\"living_town\":\"\\u0627\\u0644\\u0645\\u0646\\u0635\\u0648\\u0631\\u0647\",\"passport_number\":\"06161616100606061\",\"release_date\":\"05\\/04\\/2022\",\"expiry_date\":\"05\\/22\\/2022\",\"place_of_issue\":\"\\u0645\\u0635\\u0631\",\"scientific_degree\":\"\\u062f\\u0628\\u0644\\u0648\\u0645\",\"languages\":[\"arabic\",\"english\"],\"height\":\"170\",\"weight\":\"70\",\"skin_colour\":\"\\u0627\\u0633\\u0648\\u062f\",\"salary\":2000,\"contract_full\":\"2\",\"face_image\":\"admin-panel\\/users\\/cvI5cnOQSt9jCieURAMgKtmhRWsCxDTGYoxgSnmX.jpg\",\"worker_image\":\"admin-panel\\/users\\/u3Z5jULY0UW4IDHwBiUbHTzzGKly0qWGCHpujWaU.jpg\",\"created_at\":\"2022-05-29T11:39:06.000000Z\",\"updated_at\":\"2022-05-29T19:54:32.000000Z\",\"faceImageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/cvI5cnOQSt9jCieURAMgKtmhRWsCxDTGYoxgSnmX.jpg\",\"workerImageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/u3Z5jULY0UW4IDHwBiUbHTzzGKly0qWGCHpujWaU.jpg\",\"additional_skills\":[{\"id\":2,\"name\":\"\\u0645\\u0645\\u0631\\u0636\",\"color\":\"yellow\",\"image\":\"admin-panel\\/users\\/gSIVV733Q35OUh9vEusecfNOTanX7er1ImJv4JFQ.jpg\",\"status\":1,\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-01T20:14:20.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/gSIVV733Q35OUh9vEusecfNOTanX7er1ImJv4JFQ.jpg\",\"pivot\":{\"worker_id\":3,\"category_id\":2}},{\"id\":5,\"name\":\"\\u0637\\u0628\\u0627\\u062e\",\"color\":\"green\",\"image\":\"admin-panel\\/users\\/9k8B7ZyQjJh9F9DJ5XgCpHpoxwExeIaw4YXvjtZF.jpg\",\"status\":1,\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-02T09:03:04.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/9k8B7ZyQjJh9F9DJ5XgCpHpoxwExeIaw4YXvjtZF.jpg\",\"pivot\":{\"worker_id\":3,\"category_id\":5}}]}', 'Registered', 1, 'http://127.0.0.1:9090/admin/workers/3/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/workers/3/edit', 'POST', '2022-06-26 03:24:18', '2022-06-26 03:24:18', NULL),
(73, 'تعديل بيانات  worker', '{\"id\":3,\"name\":\"reda ashraf\",\"dob\":\"1996-06-26\",\"age\":26,\"experience\":6,\"gender\":\"male\",\"marital_status\":\"single\",\"status\":0,\"no_of_children\":3,\"religion\":\"muslim\",\"nationality_id\":\"1\",\"category_id\":\"1\",\"place_of_birth\":\"\\u0645\\u0635\\u0631\",\"living_town\":\"\\u0627\\u0644\\u0645\\u0646\\u0635\\u0648\\u0631\\u0647\",\"passport_number\":\"06161616100606061\",\"release_date\":\"05\\/04\\/2022\",\"expiry_date\":\"05\\/22\\/2022\",\"place_of_issue\":\"\\u0645\\u0635\\u0631\",\"scientific_degree\":\"\\u062f\\u0628\\u0644\\u0648\\u0645\",\"languages\":[\"arabic\",\"english\"],\"height\":\"170\",\"weight\":\"70\",\"skin_colour\":\"\\u0627\\u0633\\u0648\\u062f\",\"salary\":2000,\"contract_full\":\"2\",\"face_image\":\"admin-panel\\/users\\/cvI5cnOQSt9jCieURAMgKtmhRWsCxDTGYoxgSnmX.jpg\",\"worker_image\":\"admin-panel\\/users\\/u3Z5jULY0UW4IDHwBiUbHTzzGKly0qWGCHpujWaU.jpg\",\"created_at\":\"2022-05-29T11:39:06.000000Z\",\"updated_at\":\"2022-05-29T19:54:32.000000Z\",\"faceImageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/cvI5cnOQSt9jCieURAMgKtmhRWsCxDTGYoxgSnmX.jpg\",\"workerImageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/u3Z5jULY0UW4IDHwBiUbHTzzGKly0qWGCHpujWaU.jpg\",\"additional_skills\":[{\"id\":2,\"name\":\"\\u0645\\u0645\\u0631\\u0636\",\"color\":\"yellow\",\"image\":\"admin-panel\\/users\\/gSIVV733Q35OUh9vEusecfNOTanX7er1ImJv4JFQ.jpg\",\"status\":1,\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-01T20:14:20.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/gSIVV733Q35OUh9vEusecfNOTanX7er1ImJv4JFQ.jpg\",\"pivot\":{\"worker_id\":3,\"category_id\":2}},{\"id\":5,\"name\":\"\\u0637\\u0628\\u0627\\u062e\",\"color\":\"green\",\"image\":\"admin-panel\\/users\\/9k8B7ZyQjJh9F9DJ5XgCpHpoxwExeIaw4YXvjtZF.jpg\",\"status\":1,\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-02T09:03:04.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/9k8B7ZyQjJh9F9DJ5XgCpHpoxwExeIaw4YXvjtZF.jpg\",\"pivot\":{\"worker_id\":3,\"category_id\":5}}]}', 'Registered', 1, 'http://127.0.0.1:9090/admin/workers/3/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/workers/3/edit', 'POST', '2022-06-26 03:25:13', '2022-06-26 03:25:13', NULL);
INSERT INTO `laravel_logger_activity` (`id`, `description`, `details`, `userType`, `userId`, `route`, `ipAddress`, `userAgent`, `locale`, `referer`, `methodType`, `created_at`, `updated_at`, `deleted_at`) VALUES
(74, 'تعديل بيانات  worker', '{\"id\":3,\"name\":\"reda ashraf\",\"dob\":\"1996-06-26\",\"age\":26,\"experience\":6,\"gender\":\"male\",\"marital_status\":\"single\",\"status\":0,\"no_of_children\":3,\"religion\":\"muslim\",\"nationality_id\":\"1\",\"category_id\":\"1\",\"place_of_birth\":\"\\u0645\\u0635\\u0631\",\"living_town\":\"\\u0627\\u0644\\u0645\\u0646\\u0635\\u0648\\u0631\\u0647\",\"passport_number\":\"06161616100606061\",\"release_date\":\"05\\/04\\/2022\",\"expiry_date\":\"05\\/22\\/2022\",\"place_of_issue\":\"\\u0645\\u0635\\u0631\",\"scientific_degree\":\"\\u062f\\u0628\\u0644\\u0648\\u0645\",\"languages\":[\"arabic\",\"english\"],\"height\":\"170\",\"weight\":\"70\",\"skin_colour\":\"\\u0627\\u0633\\u0648\\u062f\",\"salary\":2000,\"contract_full\":\"2\",\"face_image\":\"admin-panel\\/users\\/cvI5cnOQSt9jCieURAMgKtmhRWsCxDTGYoxgSnmX.jpg\",\"worker_image\":\"admin-panel\\/users\\/u3Z5jULY0UW4IDHwBiUbHTzzGKly0qWGCHpujWaU.jpg\",\"created_at\":\"2022-05-29T11:39:06.000000Z\",\"updated_at\":\"2022-05-29T19:54:32.000000Z\",\"faceImageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/cvI5cnOQSt9jCieURAMgKtmhRWsCxDTGYoxgSnmX.jpg\",\"workerImageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/u3Z5jULY0UW4IDHwBiUbHTzzGKly0qWGCHpujWaU.jpg\",\"additional_skills\":[{\"id\":2,\"name\":\"\\u0645\\u0645\\u0631\\u0636\",\"color\":\"yellow\",\"image\":\"admin-panel\\/users\\/gSIVV733Q35OUh9vEusecfNOTanX7er1ImJv4JFQ.jpg\",\"status\":1,\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-01T20:14:20.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/gSIVV733Q35OUh9vEusecfNOTanX7er1ImJv4JFQ.jpg\",\"pivot\":{\"worker_id\":3,\"category_id\":2}},{\"id\":5,\"name\":\"\\u0637\\u0628\\u0627\\u062e\",\"color\":\"green\",\"image\":\"admin-panel\\/users\\/9k8B7ZyQjJh9F9DJ5XgCpHpoxwExeIaw4YXvjtZF.jpg\",\"status\":1,\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-02T09:03:04.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/9k8B7ZyQjJh9F9DJ5XgCpHpoxwExeIaw4YXvjtZF.jpg\",\"pivot\":{\"worker_id\":3,\"category_id\":5}}]}', 'Registered', 1, 'http://127.0.0.1:9090/admin/workers/3/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/workers/3/edit', 'POST', '2022-06-26 03:25:42', '2022-06-26 03:25:42', NULL),
(75, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-26 14:46:00', '2022-06-26 14:46:00', NULL),
(76, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-27 00:24:25', '2022-06-27 00:24:25', NULL),
(77, 'تعديل بيانات  page', '{\"id\":1,\"title\":\"About us\",\"slug\":\"about-us\",\"content\":\"<div>\\r\\n    THAT. Then again--\\\"BEFORE SHE HAD THIS FIT--\\\" you never even introduced to a day-school, too,\' said Alice; not that she ran out of breath, and said \'That\'s very curious.\' \'It\'s all her wonderful Adventures, till she had never seen such a noise inside, no one could possibly hear you.\' And certainly there was nothing so VERY much out of sight before the officer could get away without being seen, when she found to be listening, so she went on for some time with the lobsters, out to sea!\\\" But the.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Caterpillar. \'Well, perhaps you were all writing very busily on slates. \'What are you getting on now, my dear?\' it continued, turning to the little door, had vanished completely. Very soon the Rabbit actually TOOK A WATCH OUT OF ITS WAISTCOAT-POCKET, and looked at the moment, \'My dear! I wish you were INSIDE, you might knock, and I never knew whether it would be quite as safe to stay with it as she spoke--fancy CURTSEYING as you\'re falling through the door, and the reason and all would change.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Footman continued in the middle, wondering how she was quite surprised to find her in a hot tureen! Who for such dainties would not open any of them. \'I\'m sure I\'m not the smallest idea how confusing it is almost certain to disagree with you, sooner or later. However, this bottle was a real nose; also its eyes were nearly out of sight. Alice remained looking thoughtfully at the end of the baby, the shriek of the words \'DRINK ME\' beautifully printed on it in large letters. It was so small as.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Alice, in a large rabbit-hole under the table: she opened it, and then keep tight hold of anything, but she knew the right size, that it might end, you know,\' Alice gently remarked; \'they\'d have been changed for any lesson-books!\' And so it was her turn or not. So she sat on, with closed eyes, and feebly stretching out one paw, trying to touch her. \'Poor little thing!\' said Alice, a little girl she\'ll think me at all.\' \'In that case,\' said the Cat, \'if you only walk long enough.\' Alice felt so.\\r\\n<\\/div>\",\"created_at\":null,\"updated_at\":\"2022-06-27T02:59:22.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/pages/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/pages/1/edit', 'POST', '2022-06-27 00:59:22', '2022-06-27 00:59:22', NULL),
(78, 'تعديل بيانات  page', '{\"id\":1,\"title\":\"About us\",\"slug\":\"about-us\",\"content\":\"<div>\\r\\n    THAT. Then again--\\\"BEFORE SHE HAD THIS FIT--\\\" you never even introduced to a day-school, too,\' said Alice; not that she ran out of breath, and said \'That\'s very curious.\' \'It\'s all her wonderful Adventures, till she had never seen such a noise inside, no one could possibly hear you.\' And certainly there was nothing so VERY much out of sight before the officer could get away without being seen, when she found to be listening, so she went on for some time with the lobsters, out to sea!\\\" But the.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Caterpillar. \'Well, perhaps you were all writing very busily on slates. \'What are you getting on now, my dear?\' it continued, turning to the little door, had vanished completely. Very soon the Rabbit actually TOOK A WATCH OUT OF ITS WAISTCOAT-POCKET, and looked at the moment, \'My dear! I wish you were INSIDE, you might knock, and I never knew whether it would be quite as safe to stay with it as she spoke--fancy CURTSEYING as you\'re falling through the door, and the reason and all would change.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Footman continued in the middle, wondering how she was quite surprised to find her in a hot tureen! Who for such dainties would not open any of them. \'I\'m sure I\'m not the smallest idea how confusing it is almost certain to disagree with you, sooner or later. However, this bottle was a real nose; also its eyes were nearly out of sight. Alice remained looking thoughtfully at the end of the baby, the shriek of the words \'DRINK ME\' beautifully printed on it in large letters. It was so small as.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Alice, in a large rabbit-hole under the table: she opened it, and then keep tight hold of anything, but she knew the right size, that it might end, you know,\' Alice gently remarked; \'they\'d have been changed for any lesson-books!\' And so it was her turn or not. So she sat on, with closed eyes, and feebly stretching out one paw, trying to touch her. \'Poor little thing!\' said Alice, a little girl she\'ll think me at all.\' \'In that case,\' said the Cat, \'if you only walk long enough.\' Alice felt so.\\r\\n<\\/div>\",\"created_at\":null,\"updated_at\":\"2022-06-27T02:59:22.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/pages/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/pages/1/edit', 'POST', '2022-06-27 00:59:42', '2022-06-27 00:59:42', NULL),
(79, 'تعديل بيانات  page', '{\"id\":1,\"title\":\"About us\",\"slug\":\"about-us\",\"content\":\"<div>\\r\\n    THAT. Then again--\\\"BEFORE SHE HAD THIS FIT--\\\" you never even introduced to a day-school, too,\' said Alice; not that she ran out of breath, and said \'That\'s very curious.\' \'It\'s all her wonderful Adventures, till she had never seen such a noise inside, no one could possibly hear you.\' And certainly there was nothing so VERY much out of sight before the officer could get away without being seen, when she found to be listening, so she went on for some time with the lobsters, out to sea!\\\" But the.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Caterpillar. \'Well, perhaps you were all writing very busily on slates. \'What are you getting on now, my dear?\' it continued, turning to the little door, had vanished completely. Very soon the Rabbit actually TOOK A WATCH OUT OF ITS WAISTCOAT-POCKET, and looked at the moment, \'My dear! I wish you were INSIDE, you might knock, and I never knew whether it would be quite as safe to stay with it as she spoke--fancy CURTSEYING as you\'re falling through the door, and the reason and all would change.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Footman continued in the middle, wondering how she was quite surprised to find her in a hot tureen! Who for such dainties would not open any of them. \'I\'m sure I\'m not the smallest idea how confusing it is almost certain to disagree with you, sooner or later. However, this bottle was a real nose; also its eyes were nearly out of sight. Alice remained looking thoughtfully at the end of the baby, the shriek of the words \'DRINK ME\' beautifully printed on it in large letters. It was so small as.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Alice, in a large rabbit-hole under the table: she opened it, and then keep tight hold of anything, but she knew the right size, that it might end, you know,\' Alice gently remarked; \'they\'d have been changed for any lesson-books!\' And so it was her turn or not. So she sat on, with closed eyes, and feebly stretching out one paw, trying to touch her. \'Poor little thing!\' said Alice, a little girl she\'ll think me at all.\' \'In that case,\' said the Cat, \'if you only walk long enough.\' Alice felt so.\\r\\n<\\/div>\",\"created_at\":null,\"updated_at\":\"2022-06-27T02:59:22.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/pages/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/pages/1/edit', 'POST', '2022-06-27 00:59:55', '2022-06-27 00:59:55', NULL),
(80, 'تعديل بيانات  page', '{\"id\":1,\"title\":\"About us\",\"slug\":\"about-us\",\"images\":null,\"content\":\"<div>\\r\\n    THAT. Then again--\\\"BEFORE SHE HAD THIS FIT--\\\" you never even introduced to a day-school, too,\' said Alice; not that she ran out of breath, and said \'That\'s very curious.\' \'It\'s all her wonderful Adventures, till she had never seen such a noise inside, no one could possibly hear you.\' And certainly there was nothing so VERY much out of sight before the officer could get away without being seen, when she found to be listening, so she went on for some time with the lobsters, out to sea!\\\" But the.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Caterpillar. \'Well, perhaps you were all writing very busily on slates. \'What are you getting on now, my dear?\' it continued, turning to the little door, had vanished completely. Very soon the Rabbit actually TOOK A WATCH OUT OF ITS WAISTCOAT-POCKET, and looked at the moment, \'My dear! I wish you were INSIDE, you might knock, and I never knew whether it would be quite as safe to stay with it as she spoke--fancy CURTSEYING as you\'re falling through the door, and the reason and all would change.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Footman continued in the middle, wondering how she was quite surprised to find her in a hot tureen! Who for such dainties would not open any of them. \'I\'m sure I\'m not the smallest idea how confusing it is almost certain to disagree with you, sooner or later. However, this bottle was a real nose; also its eyes were nearly out of sight. Alice remained looking thoughtfully at the end of the baby, the shriek of the words \'DRINK ME\' beautifully printed on it in large letters. It was so small as.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Alice, in a large rabbit-hole under the table: she opened it, and then keep tight hold of anything, but she knew the right size, that it might end, you know,\' Alice gently remarked; \'they\'d have been changed for any lesson-books!\' And so it was her turn or not. So she sat on, with closed eyes, and feebly stretching out one paw, trying to touch her. \'Poor little thing!\' said Alice, a little girl she\'ll think me at all.\' \'In that case,\' said the Cat, \'if you only walk long enough.\' Alice felt so.\\r\\n<\\/div>\",\"created_at\":null,\"updated_at\":\"2022-06-27T02:59:22.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/pages/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/pages/1/edit', 'POST', '2022-06-27 01:41:19', '2022-06-27 01:41:19', NULL),
(81, 'تعديل بيانات  page', '{\"id\":1,\"title\":\"About us\",\"slug\":\"about-us\",\"images\":null,\"content\":\"<div>\\r\\n    THAT. Then again--\\\"BEFORE SHE HAD THIS FIT--\\\" you never even introduced to a day-school, too,\' said Alice; not that she ran out of breath, and said \'That\'s very curious.\' \'It\'s all her wonderful Adventures, till she had never seen such a noise inside, no one could possibly hear you.\' And certainly there was nothing so VERY much out of sight before the officer could get away without being seen, when she found to be listening, so she went on for some time with the lobsters, out to sea!\\\" But the.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Caterpillar. \'Well, perhaps you were all writing very busily on slates. \'What are you getting on now, my dear?\' it continued, turning to the little door, had vanished completely. Very soon the Rabbit actually TOOK A WATCH OUT OF ITS WAISTCOAT-POCKET, and looked at the moment, \'My dear! I wish you were INSIDE, you might knock, and I never knew whether it would be quite as safe to stay with it as she spoke--fancy CURTSEYING as you\'re falling through the door, and the reason and all would change.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Footman continued in the middle, wondering how she was quite surprised to find her in a hot tureen! Who for such dainties would not open any of them. \'I\'m sure I\'m not the smallest idea how confusing it is almost certain to disagree with you, sooner or later. However, this bottle was a real nose; also its eyes were nearly out of sight. Alice remained looking thoughtfully at the end of the baby, the shriek of the words \'DRINK ME\' beautifully printed on it in large letters. It was so small as.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Alice, in a large rabbit-hole under the table: she opened it, and then keep tight hold of anything, but she knew the right size, that it might end, you know,\' Alice gently remarked; \'they\'d have been changed for any lesson-books!\' And so it was her turn or not. So she sat on, with closed eyes, and feebly stretching out one paw, trying to touch her. \'Poor little thing!\' said Alice, a little girl she\'ll think me at all.\' \'In that case,\' said the Cat, \'if you only walk long enough.\' Alice felt so.\\r\\n<\\/div>\",\"created_at\":null,\"updated_at\":\"2022-06-27T02:59:22.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/pages/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/pages/1/edit', 'POST', '2022-06-27 01:42:02', '2022-06-27 01:42:02', NULL),
(82, 'تعديل بيانات  page', '{\"id\":1,\"title\":\"About us\",\"slug\":\"about-us\",\"images\":null,\"content\":\"<div>\\r\\n    THAT. Then again--\\\"BEFORE SHE HAD THIS FIT--\\\" you never even introduced to a day-school, too,\' said Alice; not that she ran out of breath, and said \'That\'s very curious.\' \'It\'s all her wonderful Adventures, till she had never seen such a noise inside, no one could possibly hear you.\' And certainly there was nothing so VERY much out of sight before the officer could get away without being seen, when she found to be listening, so she went on for some time with the lobsters, out to sea!\\\" But the.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Caterpillar. \'Well, perhaps you were all writing very busily on slates. \'What are you getting on now, my dear?\' it continued, turning to the little door, had vanished completely. Very soon the Rabbit actually TOOK A WATCH OUT OF ITS WAISTCOAT-POCKET, and looked at the moment, \'My dear! I wish you were INSIDE, you might knock, and I never knew whether it would be quite as safe to stay with it as she spoke--fancy CURTSEYING as you\'re falling through the door, and the reason and all would change.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Footman continued in the middle, wondering how she was quite surprised to find her in a hot tureen! Who for such dainties would not open any of them. \'I\'m sure I\'m not the smallest idea how confusing it is almost certain to disagree with you, sooner or later. However, this bottle was a real nose; also its eyes were nearly out of sight. Alice remained looking thoughtfully at the end of the baby, the shriek of the words \'DRINK ME\' beautifully printed on it in large letters. It was so small as.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Alice, in a large rabbit-hole under the table: she opened it, and then keep tight hold of anything, but she knew the right size, that it might end, you know,\' Alice gently remarked; \'they\'d have been changed for any lesson-books!\' And so it was her turn or not. So she sat on, with closed eyes, and feebly stretching out one paw, trying to touch her. \'Poor little thing!\' said Alice, a little girl she\'ll think me at all.\' \'In that case,\' said the Cat, \'if you only walk long enough.\' Alice felt so.\\r\\n<\\/div>\",\"created_at\":null,\"updated_at\":\"2022-06-27T02:59:22.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/pages/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/pages/1/edit', 'POST', '2022-06-27 01:43:40', '2022-06-27 01:43:40', NULL),
(83, 'تعديل بيانات  page', '{\"id\":1,\"title\":\"About us\",\"slug\":\"about-us\",\"images\":null,\"content\":\"<div>\\r\\n    THAT. Then again--\\\"BEFORE SHE HAD THIS FIT--\\\" you never even introduced to a day-school, too,\' said Alice; not that she ran out of breath, and said \'That\'s very curious.\' \'It\'s all her wonderful Adventures, till she had never seen such a noise inside, no one could possibly hear you.\' And certainly there was nothing so VERY much out of sight before the officer could get away without being seen, when she found to be listening, so she went on for some time with the lobsters, out to sea!\\\" But the.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Caterpillar. \'Well, perhaps you were all writing very busily on slates. \'What are you getting on now, my dear?\' it continued, turning to the little door, had vanished completely. Very soon the Rabbit actually TOOK A WATCH OUT OF ITS WAISTCOAT-POCKET, and looked at the moment, \'My dear! I wish you were INSIDE, you might knock, and I never knew whether it would be quite as safe to stay with it as she spoke--fancy CURTSEYING as you\'re falling through the door, and the reason and all would change.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Footman continued in the middle, wondering how she was quite surprised to find her in a hot tureen! Who for such dainties would not open any of them. \'I\'m sure I\'m not the smallest idea how confusing it is almost certain to disagree with you, sooner or later. However, this bottle was a real nose; also its eyes were nearly out of sight. Alice remained looking thoughtfully at the end of the baby, the shriek of the words \'DRINK ME\' beautifully printed on it in large letters. It was so small as.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Alice, in a large rabbit-hole under the table: she opened it, and then keep tight hold of anything, but she knew the right size, that it might end, you know,\' Alice gently remarked; \'they\'d have been changed for any lesson-books!\' And so it was her turn or not. So she sat on, with closed eyes, and feebly stretching out one paw, trying to touch her. \'Poor little thing!\' said Alice, a little girl she\'ll think me at all.\' \'In that case,\' said the Cat, \'if you only walk long enough.\' Alice felt so.\\r\\n<\\/div>\",\"created_at\":null,\"updated_at\":\"2022-06-27T02:59:22.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/pages/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/pages/1/edit', 'POST', '2022-06-27 01:43:51', '2022-06-27 01:43:51', NULL),
(84, 'تعديل بيانات  page', '{\"id\":1,\"title\":\"About us\",\"slug\":\"about-us\",\"images\":\"[\\\"page\\\\\\/FmUyaQSHIC_service.png\\\",\\\"page\\\\\\/zN94vajmyy_service.png\\\"]\",\"content\":\"<div>\\r\\n    THAT. Then again--\\\"BEFORE SHE HAD THIS FIT--\\\" you never even introduced to a day-school, too,\' said Alice; not that she ran out of breath, and said \'That\'s very curious.\' \'It\'s all her wonderful Adventures, till she had never seen such a noise inside, no one could possibly hear you.\' And certainly there was nothing so VERY much out of sight before the officer could get away without being seen, when she found to be listening, so she went on for some time with the lobsters, out to sea!\\\" But the.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Caterpillar. \'Well, perhaps you were all writing very busily on slates. \'What are you getting on now, my dear?\' it continued, turning to the little door, had vanished completely. Very soon the Rabbit actually TOOK A WATCH OUT OF ITS WAISTCOAT-POCKET, and looked at the moment, \'My dear! I wish you were INSIDE, you might knock, and I never knew whether it would be quite as safe to stay with it as she spoke--fancy CURTSEYING as you\'re falling through the door, and the reason and all would change.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Footman continued in the middle, wondering how she was quite surprised to find her in a hot tureen! Who for such dainties would not open any of them. \'I\'m sure I\'m not the smallest idea how confusing it is almost certain to disagree with you, sooner or later. However, this bottle was a real nose; also its eyes were nearly out of sight. Alice remained looking thoughtfully at the end of the baby, the shriek of the words \'DRINK ME\' beautifully printed on it in large letters. It was so small as.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Alice, in a large rabbit-hole under the table: she opened it, and then keep tight hold of anything, but she knew the right size, that it might end, you know,\' Alice gently remarked; \'they\'d have been changed for any lesson-books!\' And so it was her turn or not. So she sat on, with closed eyes, and feebly stretching out one paw, trying to touch her. \'Poor little thing!\' said Alice, a little girl she\'ll think me at all.\' \'In that case,\' said the Cat, \'if you only walk long enough.\' Alice felt so.\\r\\n<\\/div>\",\"created_at\":null,\"updated_at\":\"2022-06-27T03:44:59.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/pages/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/pages/1/edit', 'POST', '2022-06-27 01:44:59', '2022-06-27 01:44:59', NULL),
(85, 'تعديل بيانات  page', '{\"id\":1,\"title\":\"About us\",\"slug\":\"about-us\",\"images\":\"[\\\"page\\\\\\/z3EoVphjUL_service.png\\\",\\\"page\\\\\\/q3ditvw3M9_service.png\\\"]\",\"content\":\"<div>\\r\\n    THAT. Then again--\\\"BEFORE SHE HAD THIS FIT--\\\" you never even introduced to a day-school, too,\' said Alice; not that she ran out of breath, and said \'That\'s very curious.\' \'It\'s all her wonderful Adventures, till she had never seen such a noise inside, no one could possibly hear you.\' And certainly there was nothing so VERY much out of sight before the officer could get away without being seen, when she found to be listening, so she went on for some time with the lobsters, out to sea!\\\" But the.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Caterpillar. \'Well, perhaps you were all writing very busily on slates. \'What are you getting on now, my dear?\' it continued, turning to the little door, had vanished completely. Very soon the Rabbit actually TOOK A WATCH OUT OF ITS WAISTCOAT-POCKET, and looked at the moment, \'My dear! I wish you were INSIDE, you might knock, and I never knew whether it would be quite as safe to stay with it as she spoke--fancy CURTSEYING as you\'re falling through the door, and the reason and all would change.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Footman continued in the middle, wondering how she was quite surprised to find her in a hot tureen! Who for such dainties would not open any of them. \'I\'m sure I\'m not the smallest idea how confusing it is almost certain to disagree with you, sooner or later. However, this bottle was a real nose; also its eyes were nearly out of sight. Alice remained looking thoughtfully at the end of the baby, the shriek of the words \'DRINK ME\' beautifully printed on it in large letters. It was so small as.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Alice, in a large rabbit-hole under the table: she opened it, and then keep tight hold of anything, but she knew the right size, that it might end, you know,\' Alice gently remarked; \'they\'d have been changed for any lesson-books!\' And so it was her turn or not. So she sat on, with closed eyes, and feebly stretching out one paw, trying to touch her. \'Poor little thing!\' said Alice, a little girl she\'ll think me at all.\' \'In that case,\' said the Cat, \'if you only walk long enough.\' Alice felt so.\\r\\n<\\/div>\",\"created_at\":null,\"updated_at\":\"2022-06-27T03:45:50.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/pages/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/pages/1/edit', 'POST', '2022-06-27 01:45:50', '2022-06-27 01:45:50', NULL),
(86, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-27 05:17:35', '2022-06-27 05:17:35', NULL),
(87, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:9090/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/login', 'POST', '2022-06-27 22:01:34', '2022-06-27 22:01:34', NULL),
(88, 'تعديل بيانات  slider', '{\"id\":1,\"title\":\"Odio saepe facere voluptas excepturi.\",\"description\":\"Veniam eos dolorem iste architecto ratione sunt. Ea nisi vitae facilis omnis nulla excepturi. Molestiae laboriosam quis soluta eos eaque. Ipsam dicta praesentium consequuntur ut at.\",\"image\":\"admin-panel\\/users\\/mrjZna8L0k7av7zKdlousDyN1duzzE5j381JkM3b.jpg\",\"url\":\"https:\\/\\/www.sawayn.com\\/eum-quia-impedit-ut-ratione-possimus-nihil-eos\",\"target\":\"url\",\"order\":0,\"category_id\":null,\"worker_id\":null,\"status\":1,\"created_at\":\"2022-06-18T03:00:54.000000Z\",\"updated_at\":\"2022-06-28T00:24:43.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/mrjZna8L0k7av7zKdlousDyN1duzzE5j381JkM3b.jpg\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/slider/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/slider/1/edit', 'POST', '2022-06-27 22:24:43', '2022-06-27 22:24:43', NULL),
(89, 'تعديل بيانات  slider', '{\"id\":1,\"title\":\"Odio saepe facere voluptas excepturi. updaed\",\"description\":\"Veniam eos dolorem iste architecto ratione sunt. Ea nisi vitae facilis omnis nulla excepturi. Molestiae laboriosam quis soluta eos eaque. Ipsam dicta praesentium consequuntur ut at. updaed\",\"image\":\"admin-panel\\/users\\/mrjZna8L0k7av7zKdlousDyN1duzzE5j381JkM3b.jpg\",\"url\":\"https:\\/\\/www.sawayn.com\\/eum-quia-impedit-ut-ratione-possimus-nihil-eos updaed\",\"target\":\"url\",\"order\":0,\"category_id\":null,\"worker_id\":null,\"status\":1,\"created_at\":\"2022-06-18T03:00:54.000000Z\",\"updated_at\":\"2022-06-28T00:36:42.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/mrjZna8L0k7av7zKdlousDyN1duzzE5j381JkM3b.jpg\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/slider/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/slider/1/edit', 'POST', '2022-06-27 22:36:42', '2022-06-27 22:36:42', NULL),
(90, 'تعديل بيانات  slider', '{\"id\":2,\"title\":\"Assumenda quia minus explicabo facilis quis voluptas sit necessitatibus.\",\"description\":\"Quia consequatur voluptas culpa iste deleniti perspiciatis. Est qui maiores aut explicabo. Ut minima illo numquam aliquid eos.\",\"image\":\"admin-panel\\/users\\/TtNuAJwZ69XLDmU61MXDDsXpFkSNufFDJzUhZGgx.jpg\",\"url\":\"http:\\/\\/www.casper.com\\/autem-voluptatem-facilis-repellat-consequuntur.html\",\"target\":\"url\",\"order\":0,\"category_id\":null,\"worker_id\":null,\"status\":1,\"created_at\":\"2022-06-18T03:00:54.000000Z\",\"updated_at\":\"2022-06-28T01:12:38.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/TtNuAJwZ69XLDmU61MXDDsXpFkSNufFDJzUhZGgx.jpg\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/slider/2/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/slider/2/edit', 'POST', '2022-06-27 23:12:38', '2022-06-27 23:12:38', NULL),
(91, 'تعديل بيانات  slider', '{\"id\":3,\"title\":\"Dicta libero reiciendis perferendis.\",\"description\":\"Sed neque sed quia voluptatem qui eius impedit. Neque culpa neque laudantium repellat cum aliquid.\",\"image\":\"admin-panel\\/users\\/cR30L7PgzyIeVMPZ1wQ9adMx1g202asIEDDf4w4Y.jpg\",\"url\":\"http:\\/\\/hyatt.com\\/nostrum-et-et-facilis-dolor-eius-magnam-aut-non\",\"target\":\"url\",\"order\":0,\"category_id\":null,\"worker_id\":null,\"status\":1,\"created_at\":\"2022-06-18T03:00:54.000000Z\",\"updated_at\":\"2022-06-28T01:12:43.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/cR30L7PgzyIeVMPZ1wQ9adMx1g202asIEDDf4w4Y.jpg\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/slider/3/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/slider/3/edit', 'POST', '2022-06-27 23:12:43', '2022-06-27 23:12:43', NULL),
(92, 'تعديل بيانات  slider', '{\"id\":4,\"title\":\"Quia facilis et molestiae.\",\"description\":\"Voluptatem at alias voluptas odit nihil aut. Est quasi a eveniet voluptatem qui. Ipsum et minima quam iure.\",\"image\":\"admin-panel\\/users\\/qePnyKkyGIMVKQapkWMYsUImCn3lCATOOnkitLBS.jpg\",\"url\":\"http:\\/\\/blanda.com\\/asperiores-ut-iusto-assumenda-incidunt\",\"target\":\"url\",\"order\":0,\"category_id\":null,\"worker_id\":null,\"status\":1,\"created_at\":\"2022-06-18T03:00:54.000000Z\",\"updated_at\":\"2022-06-28T01:12:48.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/qePnyKkyGIMVKQapkWMYsUImCn3lCATOOnkitLBS.jpg\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/slider/4/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/slider/4/edit', 'POST', '2022-06-27 23:12:49', '2022-06-27 23:12:49', NULL),
(93, 'تعديل بيانات  slider', '{\"id\":5,\"title\":\"Dolor assumenda illum est odio inventore.\",\"description\":\"Est et inventore possimus. Qui accusamus voluptatem dicta minus. Earum nostrum aut illo quod dolores est molestiae.\",\"image\":\"admin-panel\\/users\\/fnrtSbIBMTK1QhV5clNFGjwx97PYjcrnLHVujGOB.jpg\",\"url\":\"http:\\/\\/braun.com\\/\",\"target\":\"url\",\"order\":0,\"category_id\":null,\"worker_id\":null,\"status\":1,\"created_at\":\"2022-06-18T03:00:54.000000Z\",\"updated_at\":\"2022-06-28T01:13:02.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/fnrtSbIBMTK1QhV5clNFGjwx97PYjcrnLHVujGOB.jpg\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/slider/5/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/slider/5/edit', 'POST', '2022-06-27 23:13:02', '2022-06-27 23:13:02', NULL),
(94, 'تعديل بيانات  slider', '{\"id\":6,\"title\":\"Animi ducimus nemo facilis impedit natus consequatur magnam.\",\"description\":\"Sapiente consequatur et sequi odio quasi. Ipsum maiores cupiditate dolores veritatis. Beatae iusto repudiandae rem et ex est nobis. Eum velit aut totam repudiandae suscipit suscipit aliquid ab.\",\"image\":\"https:\\/\\/via.placeholder.com\\/800x600.png\\/0077ee?text=et\",\"url\":\"http:\\/\\/www.mcdermott.com\\/voluptate-aperiam-harum-sed\",\"target\":\"url\",\"order\":0,\"category_id\":null,\"worker_id\":null,\"status\":1,\"created_at\":\"2022-06-18T03:00:54.000000Z\",\"updated_at\":\"2022-06-27T14:22:46.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/https:\\/\\/via.placeholder.com\\/800x600.png\\/0077ee?text=et\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/slider/6/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/slider/6/edit', 'POST', '2022-06-27 23:13:04', '2022-06-27 23:13:04', NULL),
(95, 'تعديل بيانات  slider', '{\"id\":6,\"title\":\"Animi ducimus nemo facilis impedit natus consequatur magnam.\",\"description\":\"Sapiente consequatur et sequi odio quasi. Ipsum maiores cupiditate dolores veritatis. Beatae iusto repudiandae rem et ex est nobis. Eum velit aut totam repudiandae suscipit suscipit aliquid ab.\",\"image\":\"admin-panel\\/users\\/rL3NVQxBWkgYo3QJ6tpWCZwfjYXkEkMngPACXqU0.jpg\",\"url\":\"http:\\/\\/www.mcdermott.com\\/voluptate-aperiam-harum-sed\",\"target\":\"url\",\"order\":0,\"category_id\":null,\"worker_id\":null,\"status\":1,\"created_at\":\"2022-06-18T03:00:54.000000Z\",\"updated_at\":\"2022-06-28T01:13:14.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/rL3NVQxBWkgYo3QJ6tpWCZwfjYXkEkMngPACXqU0.jpg\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/slider/6/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/slider/6/edit', 'POST', '2022-06-27 23:13:14', '2022-06-27 23:13:14', NULL),
(96, 'تعديل بيانات  nationality', '{\"id\":1,\"name\":\"\\u0627\\u0644\\u0647\\u0646\\u062f\",\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-20T05:05:09.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/nationalities/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/nationalities/1/edit', 'POST', '2022-06-28 00:33:27', '2022-06-28 00:33:27', NULL),
(97, 'تعديل بيانات  nationality', '{\"id\":1,\"name\":\"\\u0627\\u0644\\u0647\\u0646\\u062f\",\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-20T05:05:09.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/nationalities/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/nationalities/1/edit', 'POST', '2022-06-28 00:33:48', '2022-06-28 00:33:48', NULL),
(98, 'تعديل بيانات  nationality', '{\"id\":1,\"name\":\"\\u0627\\u0644\\u0647\\u0646\\u062f\",\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-20T05:05:09.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/nationalities/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/nationalities/1/edit', 'POST', '2022-06-28 00:34:04', '2022-06-28 00:34:04', NULL),
(99, 'تعديل بيانات  nationality', '{\"id\":1,\"name\":\"\\u0627\\u0644\\u0647\\u0646\\u062f\",\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-20T05:05:09.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/nationalities/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/nationalities/1/edit', 'POST', '2022-06-28 00:34:46', '2022-06-28 00:34:46', NULL),
(100, 'تعديل بيانات  userArchive', '{\"id\":1,\"user_id\":1,\"title\":\"test\",\"description\":\"test\",\"images\":\"[\\\"userArchive\\\\\\/t6g8HiZANH_service.png\\\",\\\"userArchive\\\\\\/fdAFZwDlpg_service.png\\\",\\\"userArchive\\\\\\/sH2XATM7Pw_service.png\\\"]\",\"created_at\":\"2022-06-07T19:09:21.000000Z\",\"updated_at\":\"2022-06-28T03:02:56.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/users-archive/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/users-archive/user/2/archive/1/edit', 'POST', '2022-06-28 01:02:56', '2022-06-28 01:02:56', NULL),
(101, 'تعديل بيانات  userArchive', '{\"id\":1,\"user_id\":1,\"title\":\"test\",\"description\":\"test\",\"images\":\"[\\\"userArchive\\\\\\/lDGulykkTx_service.png\\\",\\\"userArchive\\\\\\/En6UbsLAYK_service.png\\\",\\\"userArchive\\\\\\/LxEP2yvDJ3_service.png\\\"]\",\"created_at\":\"2022-06-07T19:09:21.000000Z\",\"updated_at\":\"2022-06-28T03:03:25.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/users-archive/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/users-archive/user/2/archive/1/edit', 'POST', '2022-06-28 01:03:25', '2022-06-28 01:03:25', NULL),
(102, 'تعديل بيانات  userArchive', '{\"id\":1,\"user_id\":1,\"title\":\"test\",\"description\":\"\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0647\\u0648 \\u0645\\u062b\\u0627\\u0644 \\u0644\\u0646\\u0635 \\u064a\\u0645\\u0643\\u0646 \\u0623\\u0646 \\u064a\\u0633\\u062a\\u0628\\u062f\\u0644 \\u0641\\u064a \\u0646\\u0641\\u0633 \\u0627\\u0644\\u0645\\u0633\\u0627\\u062d\\u0629\\u060c \\u0644\\u0642\\u062f \\u062a\\u0645 \\u062a\\u0648\\u0644\\u064a\\u062f \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0645\\u0646 \\u0645\\u0648\\u0644\\u062f \\u0627\\u0644\\u0646\\u0635 \\u0627\\u0644\\u0639\\u0631\\u0628\\u0649\\u060c \\u062d\\u064a\\u062b \\u064a\\u0645\\u0643\\u0646\\u0643 \\u0623\\u0646 \\u062a\\u0648\\u0644\\u062f \\u0645\\u062b\\u0644 \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0623\\u0648 \\u0627\\u0644\\u0639\\u062f\\u064a\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0646\\u0635\\u0648\\u0635 \\u0627\\u0644\\u0623\\u062e\\u0631\\u0649 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0625\\u0644\\u0649 \\u0632\\u064a\\u0627\\u062f\\u0629 \\u0639\\u062f\\u062f \\u0627\\u0644\\u062d\\u0631\\u0648\\u0641 \\u0627\\u0644\\u062a\\u0649 \\u064a\\u0648\\u0644\\u062f\\u0647\\u0627 \\u0627\\u0644\\u062a\\u0637\\u0628\\u064a\\u0642. \\u0625\\u0630\\u0627 \\u0643\\u0646\\u062a \\u062a\\u062d\\u062a\\u0627\\u062c \\u0625\\u0644\\u0649 \\u0639\\u062f\\u062f \\u0623\\u0643\\u0628\\u0631 \\u0645\\u0646 \\u0627\\u0644\\u0641\\u0642\\u0631\\u0627\\u062a \\u064a\\u062a\\u064a\\u062d \\u0644\\u0643 \\u0645\\u0648\\u0644\\u062f \\u0627\\u0644\\u0646\\u0635 \\u0627\\u0644\\u0639\\u0631\\u0628\\u0649 \\u0632\\u064a\\u0627\\u062f\\u0629 \\u0639\\u062f\\u062f \\u0627\\u0644\\u0641\\u0642\\u0631\\u0627\\u062a \\u0643\\u0645\\u0627 \\u062a\\u0631\\u064a\\u062f\\u060c\",\"images\":\"[\\\"userArchive\\\\\\/UGxq8hcYoC_service.png\\\",\\\"userArchive\\\\\\/HX55wTukPA_service.png\\\",\\\"userArchive\\\\\\/bxvfbontnH_service.png\\\"]\",\"created_at\":\"2022-06-07T19:09:21.000000Z\",\"updated_at\":\"2022-06-28T03:06:48.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/users-archive/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/users-archive/user/1/archive/1/edit', 'POST', '2022-06-28 01:06:48', '2022-06-28 01:06:48', NULL),
(103, 'تعديل بيانات  userArchive', '{\"id\":1,\"user_id\":1,\"title\":\"test\",\"description\":\"\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0647\\u0648 \\u0645\\u062b\\u0627\\u0644 \\u0644\\u0646\\u0635 \\u064a\\u0645\\u0643\\u0646 \\u0623\\u0646 \\u064a\\u0633\\u062a\\u0628\\u062f\\u0644 \\u0641\\u064a \\u0646\\u0641\\u0633 \\u0627\\u0644\\u0645\\u0633\\u0627\\u062d\\u0629\\u060c \\u0644\\u0642\\u062f \\u062a\\u0645 \\u062a\\u0648\\u0644\\u064a\\u062f \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0645\\u0646 \\u0645\\u0648\\u0644\\u062f \\u0627\\u0644\\u0646\\u0635 \\u0627\\u0644\\u0639\\u0631\\u0628\\u0649\\u060c \\u062d\\u064a\\u062b \\u064a\\u0645\\u0643\\u0646\\u0643 \\u0623\\u0646 \\u062a\\u0648\\u0644\\u062f \\u0645\\u062b\\u0644 \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0623\\u0648 \\u0627\\u0644\\u0639\\u062f\\u064a\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0646\\u0635\\u0648\\u0635 \\u0627\\u0644\\u0623\\u062e\\u0631\\u0649 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0625\\u0644\\u0649 \\u0632\\u064a\\u0627\\u062f\\u0629 \\u0639\\u062f\\u062f \\u0627\\u0644\\u062d\\u0631\\u0648\\u0641 \\u0627\\u0644\\u062a\\u0649 \\u064a\\u0648\\u0644\\u062f\\u0647\\u0627 \\u0627\\u0644\\u062a\\u0637\\u0628\\u064a\\u0642. \\u0625\\u0630\\u0627 \\u0643\\u0646\\u062a \\u062a\\u062d\\u062a\\u0627\\u062c \\u0625\\u0644\\u0649 \\u0639\\u062f\\u062f \\u0623\\u0643\\u0628\\u0631 \\u0645\\u0646 \\u0627\\u0644\\u0641\\u0642\\u0631\\u0627\\u062a \\u064a\\u062a\\u064a\\u062d \\u0644\\u0643 \\u0645\\u0648\\u0644\\u062f \\u0627\\u0644\\u0646\\u0635 \\u0627\\u0644\\u0639\\u0631\\u0628\\u0649 \\u0632\\u064a\\u0627\\u062f\\u0629 \\u0639\\u062f\\u062f \\u0627\\u0644\\u0641\\u0642\\u0631\\u0627\\u062a \\u0643\\u0645\\u0627 \\u062a\\u0631\\u064a\\u062f\\u060c\",\"images\":\"[\\\"userArchive\\\\\\/SS65laot8w_service.png\\\",\\\"userArchive\\\\\\/VrQ8pTcsYd_service.png\\\",\\\"userArchive\\\\\\/m3nnd0AurX_service.png\\\"]\",\"created_at\":\"2022-06-07T19:09:21.000000Z\",\"updated_at\":\"2022-06-28T03:06:53.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/users-archive/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/users-archive/user/1/archive/1/edit', 'POST', '2022-06-28 01:06:53', '2022-06-28 01:06:53', NULL),
(104, 'تعديل بيانات  userArchive', '{\"id\":3,\"user_id\":1,\"title\":\"test\",\"description\":\"\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0647\\u0648 \\u0645\\u062b\\u0627\\u0644 \\u0644\\u0646\\u0635 \\u064a\\u0645\\u0643\\u0646 \\u0623\\u0646 \\u064a\\u0633\\u062a\\u0628\\u062f\\u0644 \\u0641\\u064a \\u0646\\u0641\\u0633 \\u0627\\u0644\\u0645\\u0633\\u0627\\u062d\\u0629\\u060c \\u0644\\u0642\\u062f \\u062a\\u0645 \\u062a\\u0648\\u0644\\u064a\\u062f \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0645\\u0646 \\u0645\\u0648\\u0644\\u062f \\u0627\\u0644\\u0646\\u0635 \\u0627\\u0644\\u0639\\u0631\\u0628\\u0649\\u060c \\u062d\\u064a\\u062b \\u064a\\u0645\\u0643\\u0646\\u0643 \\u0623\\u0646 \\u062a\\u0648\\u0644\\u062f \\u0645\\u062b\\u0644 \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0623\\u0648 \\u0627\\u0644\\u0639\\u062f\\u064a\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0646\\u0635\\u0648\\u0635 \\u0627\\u0644\\u0623\\u062e\\u0631\\u0649 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0625\\u0644\\u0649 \\u0632\\u064a\\u0627\\u062f\\u0629 \\u0639\\u062f\\u062f \\u0627\\u0644\\u062d\\u0631\\u0648\\u0641 \\u0627\\u0644\\u062a\\u0649 \\u064a\\u0648\\u0644\\u062f\\u0647\\u0627 \\u0627\\u0644\\u062a\\u0637\\u0628\\u064a\\u0642. \\u0625\\u0630\\u0627 \\u0643\\u0646\\u062a \\u062a\\u062d\\u062a\\u0627\\u062c \\u0625\\u0644\\u0649 \\u0639\\u062f\\u062f \\u0623\\u0643\\u0628\\u0631 \\u0645\\u0646 \\u0627\\u0644\\u0641\\u0642\\u0631\\u0627\\u062a \\u064a\\u062a\\u064a\\u062d \\u0644\\u0643 \\u0645\\u0648\\u0644\\u062f \\u0627\\u0644\\u0646\\u0635 \\u0627\\u0644\\u0639\\u0631\\u0628\\u0649 \\u0632\\u064a\\u0627\\u062f\\u0629 \\u0639\\u062f\\u062f \\u0627\\u0644\\u0641\\u0642\\u0631\\u0627\\u062a \\u0643\\u0645\\u0627 \\u062a\\u0631\\u064a\\u062f\\u060c\",\"images\":\"[\\\"userArchive\\\\\\/bIyGs05Cyk_service.png\\\",\\\"userArchive\\\\\\/sgAbGDHrpU_service.png\\\",\\\"userArchive\\\\\\/mFFXzAt3EC_service.png\\\",\\\"userArchive\\\\\\/CyG7rjofj6_service.png\\\"]\",\"created_at\":\"2022-06-07T19:23:58.000000Z\",\"updated_at\":\"2022-06-28T03:08:24.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/users-archive/3/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/users-archive/user/1/archive/3/edit', 'POST', '2022-06-28 01:08:24', '2022-06-28 01:08:24', NULL);
INSERT INTO `laravel_logger_activity` (`id`, `description`, `details`, `userType`, `userId`, `route`, `ipAddress`, `userAgent`, `locale`, `referer`, `methodType`, `created_at`, `updated_at`, `deleted_at`) VALUES
(105, 'تعديل بيانات  userArchive', '{\"id\":3,\"user_id\":1,\"title\":\"test\",\"description\":\"\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0647\\u0648 \\u0645\\u062b\\u0627\\u0644 \\u0644\\u0646\\u0635 \\u064a\\u0645\\u0643\\u0646 \\u0623\\u0646 \\u064a\\u0633\\u062a\\u0628\\u062f\\u0644 \\u0641\\u064a \\u0646\\u0641\\u0633 \\u0627\\u0644\\u0645\\u0633\\u0627\\u062d\\u0629\\u060c \\u0644\\u0642\\u062f \\u062a\\u0645 \\u062a\\u0648\\u0644\\u064a\\u062f \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0645\\u0646 \\u0645\\u0648\\u0644\\u062f \\u0627\\u0644\\u0646\\u0635 \\u0627\\u0644\\u0639\\u0631\\u0628\\u0649\\u060c \\u062d\\u064a\\u062b \\u064a\\u0645\\u0643\\u0646\\u0643 \\u0623\\u0646 \\u062a\\u0648\\u0644\\u062f \\u0645\\u062b\\u0644 \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0623\\u0648 \\u0627\\u0644\\u0639\\u062f\\u064a\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0646\\u0635\\u0648\\u0635 \\u0627\\u0644\\u0623\\u062e\\u0631\\u0649 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0625\\u0644\\u0649 \\u0632\\u064a\\u0627\\u062f\\u0629 \\u0639\\u062f\\u062f \\u0627\\u0644\\u062d\\u0631\\u0648\\u0641 \\u0627\\u0644\\u062a\\u0649 \\u064a\\u0648\\u0644\\u062f\\u0647\\u0627 \\u0627\\u0644\\u062a\\u0637\\u0628\\u064a\\u0642. \\u0625\\u0630\\u0627 \\u0643\\u0646\\u062a \\u062a\\u062d\\u062a\\u0627\\u062c \\u0625\\u0644\\u0649 \\u0639\\u062f\\u062f \\u0623\\u0643\\u0628\\u0631 \\u0645\\u0646 \\u0627\\u0644\\u0641\\u0642\\u0631\\u0627\\u062a \\u064a\\u062a\\u064a\\u062d \\u0644\\u0643 \\u0645\\u0648\\u0644\\u062f \\u0627\\u0644\\u0646\\u0635 \\u0627\\u0644\\u0639\\u0631\\u0628\\u0649 \\u0632\\u064a\\u0627\\u062f\\u0629 \\u0639\\u062f\\u062f \\u0627\\u0644\\u0641\\u0642\\u0631\\u0627\\u062a \\u0643\\u0645\\u0627 \\u062a\\u0631\\u064a\\u062f\\u060c\",\"images\":\"[\\\"userArchive\\\\\\/St3rXT6Kex_service.png\\\",\\\"userArchive\\\\\\/k3z0YLzhPv_service.png\\\",\\\"userArchive\\\\\\/3zS3dP9tAa_service.png\\\"]\",\"created_at\":\"2022-06-07T19:23:58.000000Z\",\"updated_at\":\"2022-06-28T03:32:13.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/users-archive/3/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/users-archive/user/1/archive/3/edit', 'POST', '2022-06-28 01:32:13', '2022-06-28 01:32:13', NULL),
(106, 'تعديل بيانات  category', '{\"id\":1,\"name\":\"\\u062e\\u0627\\u062f\\u0645\",\"color\":\"white\",\"image\":\"admin-panel\\/users\\/7i6SFYnllYU94jFAkTUdWtfDGMREiKNbbSx0DtQF.png\",\"status\":true,\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-28T03:39:22.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/7i6SFYnllYU94jFAkTUdWtfDGMREiKNbbSx0DtQF.png\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/categories/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/categories/1/edit', 'POST', '2022-06-28 01:39:22', '2022-06-28 01:39:22', NULL),
(107, 'تعديل بيانات  category', '{\"id\":1,\"name\":\"\\u062e\\u0627\\u062f\\u0645\",\"color\":\"white\",\"image\":\"admin-panel\\/users\\/7i6SFYnllYU94jFAkTUdWtfDGMREiKNbbSx0DtQF.png\",\"status\":true,\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-28T03:39:41.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/7i6SFYnllYU94jFAkTUdWtfDGMREiKNbbSx0DtQF.png\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/categories/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/categories/1/edit', 'POST', '2022-06-28 01:39:41', '2022-06-28 01:39:41', NULL),
(108, 'تعديل بيانات  category', '{\"id\":1,\"name\":\"\\u062e\\u0627\\u062f\\u0645\",\"color\":\"white\",\"image\":\"admin-panel\\/users\\/7i6SFYnllYU94jFAkTUdWtfDGMREiKNbbSx0DtQF.png\",\"status\":true,\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-28T03:39:51.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/7i6SFYnllYU94jFAkTUdWtfDGMREiKNbbSx0DtQF.png\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/categories/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/categories/1/edit', 'POST', '2022-06-28 01:39:51', '2022-06-28 01:39:51', NULL),
(109, 'تعديل بيانات  nationality', '{\"id\":1,\"name\":\"\\u0627\\u0644\\u0647\\u0646\\u062f\",\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-20T05:05:09.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/nationalities/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/nationalities/1/edit', 'POST', '2022-06-28 01:40:38', '2022-06-28 01:40:38', NULL),
(110, 'تعديل بيانات  nationalityProcessStep', '{\"id\":1,\"title\":\"\\u062e\\u0637\\u0648\\u0647 \\u0631\\u0642\\u0645 1\",\"description\":\"\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0647\\u0648 \\u0645\\u062b\\u0627\\u0644 \\u0644\\u0646\\u0635 \\u064a\\u0645\\u0643\\u0646 \\u0623\\u0646 \\u064a\\u0633\\u062a\\u0628\\u062f\\u0644 \\u0641\\u064a \\u0646\\u0641\\u0633 \\u0627\\u0644\\u0645\\u0633\\u0627\\u062d\\u0629\\u060c \\u0644\\u0642\\u062f \\u062a\\u0645 \\u062a\\u0648\\u0644\\u064a\\u062f \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0645\\u0646 \\u0645\\u0648\\u0644\\u062f \\u0627\\u0644\\u0646\\u0635 \\u0627\\u0644\\u0639\\u0631\\u0628\\u0649\\u060c \\u062d\\u064a\\u062b \\u064a\\u0645\\u0643\\u0646\\u0643 \\u0623\\u0646 \\u062a\\u0648\\u0644\\u062f \\u0645\\u062b\\u0644 \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0623\\u0648 \\u0627\\u0644\\u0639\\u062f\\u064a\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0646\\u0635\\u0648\\u0635 \\u0627\\u0644\\u0623\\u062e\\u0631\\u0649 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0625\\u0644\\u0649 \\u0632\\u064a\\u0627\\u062f\\u0629 \\u0639\\u062f\\u062f \\u0627\\u0644\\u062d\\u0631\\u0648\\u0641 \\u0627\\u0644\\u062a\\u0649 \\u064a\\u0648\\u0644\\u062f\\u0647\\u0627 \\u0627\\u0644\\u062a\\u0637\\u0628\\u064a\\u0642.\",\"order\":null,\"status\":1,\"created_at\":\"2022-06-20T04:07:27.000000Z\",\"updated_at\":\"2022-06-20T04:43:26.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/nationality-process-steps/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/nationality-process-steps/1/edit', 'POST', '2022-06-28 01:40:46', '2022-06-28 01:40:46', NULL),
(111, 'تعديل بيانات  nationalityProcessStep', '{\"id\":1,\"title\":\"\\u062e\\u0637\\u0648\\u0647 \\u0631\\u0642\\u0645 1\",\"description\":\"\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0647\\u0648 \\u0645\\u062b\\u0627\\u0644 \\u0644\\u0646\\u0635 \\u064a\\u0645\\u0643\\u0646 \\u0623\\u0646 \\u064a\\u0633\\u062a\\u0628\\u062f\\u0644 \\u0641\\u064a \\u0646\\u0641\\u0633 \\u0627\\u0644\\u0645\\u0633\\u0627\\u062d\\u0629\\u060c \\u0644\\u0642\\u062f \\u062a\\u0645 \\u062a\\u0648\\u0644\\u064a\\u062f \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0645\\u0646 \\u0645\\u0648\\u0644\\u062f \\u0627\\u0644\\u0646\\u0635 \\u0627\\u0644\\u0639\\u0631\\u0628\\u0649\\u060c \\u062d\\u064a\\u062b \\u064a\\u0645\\u0643\\u0646\\u0643 \\u0623\\u0646 \\u062a\\u0648\\u0644\\u062f \\u0645\\u062b\\u0644 \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0646\\u0635 \\u0623\\u0648 \\u0627\\u0644\\u0639\\u062f\\u064a\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0646\\u0635\\u0648\\u0635 \\u0627\\u0644\\u0623\\u062e\\u0631\\u0649 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0625\\u0644\\u0649 \\u0632\\u064a\\u0627\\u062f\\u0629 \\u0639\\u062f\\u062f \\u0627\\u0644\\u062d\\u0631\\u0648\\u0641 \\u0627\\u0644\\u062a\\u0649 \\u064a\\u0648\\u0644\\u062f\\u0647\\u0627 \\u0627\\u0644\\u062a\\u0637\\u0628\\u064a\\u0642.\",\"order\":null,\"status\":1,\"created_at\":\"2022-06-20T04:07:27.000000Z\",\"updated_at\":\"2022-06-20T04:43:26.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/nationality-process-steps/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/nationality-process-steps/1/edit', 'POST', '2022-06-28 01:41:30', '2022-06-28 01:41:30', NULL),
(112, 'تعديل بيانات  worker', '{\"id\":3,\"name\":\"reda ashraf\",\"dob\":\"1996-06-26\",\"age\":26,\"experience\":6,\"gender\":\"male\",\"marital_status\":\"single\",\"status\":0,\"no_of_children\":3,\"religion\":\"muslim\",\"nationality_id\":\"1\",\"category_id\":\"1\",\"place_of_birth\":\"\\u0645\\u0635\\u0631\",\"living_town\":\"\\u0627\\u0644\\u0645\\u0646\\u0635\\u0648\\u0631\\u0647\",\"passport_number\":\"06161616100606061\",\"release_date\":\"05\\/04\\/2022\",\"expiry_date\":\"05\\/22\\/2022\",\"place_of_issue\":\"\\u0645\\u0635\\u0631\",\"scientific_degree\":\"\\u062f\\u0628\\u0644\\u0648\\u0645\",\"languages\":[\"arabic\",\"english\"],\"height\":\"170\",\"weight\":\"70\",\"skin_colour\":\"\\u0627\\u0633\\u0648\\u062f\",\"salary\":2000,\"contract_full\":\"2\",\"face_image\":\"admin-panel\\/users\\/cvI5cnOQSt9jCieURAMgKtmhRWsCxDTGYoxgSnmX.jpg\",\"worker_image\":\"admin-panel\\/users\\/u3Z5jULY0UW4IDHwBiUbHTzzGKly0qWGCHpujWaU.jpg\",\"created_at\":\"2022-05-29T11:39:06.000000Z\",\"updated_at\":\"2022-06-27T14:05:53.000000Z\",\"faceImageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/cvI5cnOQSt9jCieURAMgKtmhRWsCxDTGYoxgSnmX.jpg\",\"workerImageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/u3Z5jULY0UW4IDHwBiUbHTzzGKly0qWGCHpujWaU.jpg\",\"additional_skills\":[{\"id\":2,\"name\":\"\\u0645\\u0645\\u0631\\u0636\",\"color\":\"yellow\",\"image\":\"admin-panel\\/users\\/gSIVV733Q35OUh9vEusecfNOTanX7er1ImJv4JFQ.jpg\",\"status\":1,\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-01T20:14:20.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/gSIVV733Q35OUh9vEusecfNOTanX7er1ImJv4JFQ.jpg\",\"pivot\":{\"worker_id\":3,\"category_id\":2}},{\"id\":5,\"name\":\"\\u0637\\u0628\\u0627\\u062e\",\"color\":\"green\",\"image\":\"admin-panel\\/users\\/9k8B7ZyQjJh9F9DJ5XgCpHpoxwExeIaw4YXvjtZF.jpg\",\"status\":1,\"created_at\":\"2022-05-28T14:00:09.000000Z\",\"updated_at\":\"2022-06-02T09:03:04.000000Z\",\"imageUrl\":\"http:\\/\\/127.0.0.1:9090\\/storage\\/admin-panel\\/users\\/9k8B7ZyQjJh9F9DJ5XgCpHpoxwExeIaw4YXvjtZF.jpg\",\"pivot\":{\"worker_id\":3,\"category_id\":5}}]}', 'Registered', 1, 'http://127.0.0.1:9090/admin/workers/3/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/workers/3/edit', 'POST', '2022-06-28 01:41:47', '2022-06-28 01:41:47', NULL),
(113, 'تعديل بيانات  page', '{\"id\":1,\"title\":\"About us\",\"slug\":\"about-us\",\"images\":\"[\\\"page\\\\\\/AwCXJv68y1_service.png\\\",\\\"page\\\\\\/wo0gb8rUdq_service.png\\\"]\",\"content\":\"<div>\\r\\n    THAT. Then again--\\\"BEFORE SHE HAD THIS FIT--\\\" you never even introduced to a day-school, too,\' said Alice; not that she ran out of breath, and said \'That\'s very curious.\' \'It\'s all her wonderful Adventures, till she had never seen such a noise inside, no one could possibly hear you.\' And certainly there was nothing so VERY much out of sight before the officer could get away without being seen, when she found to be listening, so she went on for some time with the lobsters, out to sea!\\\" But the.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Caterpillar. \'Well, perhaps you were all writing very busily on slates. \'What are you getting on now, my dear?\' it continued, turning to the little door, had vanished completely. Very soon the Rabbit actually TOOK A WATCH OUT OF ITS WAISTCOAT-POCKET, and looked at the moment, \'My dear! I wish you were INSIDE, you might knock, and I never knew whether it would be quite as safe to stay with it as she spoke--fancy CURTSEYING as you\'re falling through the door, and the reason and all would change.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Footman continued in the middle, wondering how she was quite surprised to find her in a hot tureen! Who for such dainties would not open any of them. \'I\'m sure I\'m not the smallest idea how confusing it is almost certain to disagree with you, sooner or later. However, this bottle was a real nose; also its eyes were nearly out of sight. Alice remained looking thoughtfully at the end of the baby, the shriek of the words \'DRINK ME\' beautifully printed on it in large letters. It was so small as.\\r\\n<\\/div>\\r\\n<div>\\r\\n    Alice, in a large rabbit-hole under the table: she opened it, and then keep tight hold of anything, but she knew the right size, that it might end, you know,\' Alice gently remarked; \'they\'d have been changed for any lesson-books!\' And so it was her turn or not. So she sat on, with closed eyes, and feebly stretching out one paw, trying to touch her. \'Poor little thing!\' said Alice, a little girl she\'ll think me at all.\' \'In that case,\' said the Cat, \'if you only walk long enough.\' Alice felt so.\\r\\n<\\/div>\",\"created_at\":null,\"updated_at\":\"2022-06-28T03:42:09.000000Z\"}', 'Registered', 1, 'http://127.0.0.1:9090/admin/pages/1/update', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:9090/admin/pages/1/edit', 'POST', '2022-06-28 01:42:09', '2022-06-28 01:42:09', NULL),
(114, 'Logged Out', NULL, 'Registered', 1, 'http://mohamedkeshk.com/admin/logout', '154.181.127.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://mohamedkeshk.com/admin', 'GET', '2022-06-28 18:38:32', '2022-06-28 18:38:32', NULL),
(115, 'Logged In', NULL, 'Guest', NULL, 'http://mohamedkeshk.com/admin/login', '37.186.55.166', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'en-US,en;q=0.9', 'http://mohamedkeshk.com/admin/login', 'POST', '2022-06-28 18:39:37', '2022-06-28 18:39:37', NULL),
(116, 'Logged In', NULL, 'Guest', NULL, 'http://mohamedkeshk.com/admin/login', '154.181.127.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://mohamedkeshk.com/admin/login', 'POST', '2022-06-28 18:40:49', '2022-06-28 18:40:49', NULL),
(117, 'Logged In', NULL, 'Guest', NULL, 'http://mohamedkeshk.com/admin/login', '37.186.55.166', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'en-US,en;q=0.9', 'http://mohamedkeshk.com/admin/login', 'POST', '2022-06-28 18:42:54', '2022-06-28 18:42:54', NULL),
(118, 'Logged In', NULL, 'Guest', NULL, 'http://mohamedkeshk.com/admin/login', '37.186.55.166', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'en-US,en;q=0.9', 'http://mohamedkeshk.com/admin/login', 'POST', '2022-06-28 18:42:54', '2022-06-28 18:42:54', NULL),
(119, 'تعديل بيانات  nationality', '{\"id\":1,\"name\":\"\\u0627\\u0644\\u0647\\u0646\\u062f\",\"created_at\":\"2022-05-28T05:00:09.000000Z\",\"updated_at\":\"2022-06-19T20:05:09.000000Z\"}', 'Registered', 1, 'http://mohamedkeshk.com/admin/nationalities/1/update', '154.181.127.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://mohamedkeshk.com/admin/nationalities/1/edit', 'POST', '2022-06-28 18:46:29', '2022-06-28 18:46:29', NULL),
(120, 'Logged In', NULL, 'Guest', NULL, 'http://mohamedkeshk.com/admin/login', '78.101.150.200', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'en-US,en;q=0.9', 'http://mohamedkeshk.com/admin/login', 'POST', '2022-06-30 00:42:12', '2022-06-30 00:42:12', NULL),
(121, 'Logged In', NULL, 'Guest', NULL, 'http://mohamedkeshk.com/admin/login', '78.101.150.200', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'en-US,en;q=0.9', 'http://mohamedkeshk.com/admin/login', 'POST', '2022-06-30 00:42:13', '2022-06-30 00:42:13', NULL),
(122, 'Logged In', NULL, 'Guest', NULL, 'http://mohamedkeshk.com/admin/login', '196.153.27.212', 'Mozilla/5.0 (Linux; Android 11; RMX1971) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 'en-US,en;q=0.9', 'http://mohamedkeshk.com/admin/login', 'POST', '2022-06-30 01:54:04', '2022-06-30 01:54:04', NULL),
(123, 'تعديل بيانات  nationalityProcessStep', '{\"id\":6,\"title\":\"\\u062e\\u0637\\u0648\\u0647 \\u0661\\u062f\\u0647\\u0647\\u0647\\u0647\\u0647\",\"description\":\"\\u062e\\u0637\\u0648\\u0629 \\u0639\\u0632\\u064a\\u0632\\u0629\\u0667\",\"order\":null,\"status\":1,\"created_at\":\"2022-06-29T18:56:26.000000Z\",\"updated_at\":\"2022-06-29T18:57:07.000000Z\"}', 'Registered', 1, 'http://mohamedkeshk.com/admin/nationality-process-steps/6/update', '196.153.27.212', 'Mozilla/5.0 (Linux; Android 11; RMX1971) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 'en-US,en;q=0.9', 'http://mohamedkeshk.com/admin/nationality-process-steps/6/edit', 'POST', '2022-06-30 01:57:07', '2022-06-30 01:57:07', NULL),
(124, 'تعديل بيانات  nationalityProcessStep', '{\"id\":6,\"title\":\"\\u062e\\u0637\\u0648\\u0647 \\u0661\\u062f\\u0647\\u0647\\u0647\\u0647\\u0647\",\"description\":\"\\u062e\\u0637\\u0648\\u0629 \\u0639\\u0632\\u064a\\u0632\\u0629\\u0667\",\"order\":null,\"status\":1,\"created_at\":\"2022-06-29T18:56:26.000000Z\",\"updated_at\":\"2022-06-29T18:57:07.000000Z\"}', 'Registered', 1, 'http://mohamedkeshk.com/admin/nationality-process-steps/6/update', '196.153.27.212', 'Mozilla/5.0 (Linux; Android 11; RMX1971) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 'en-US,en;q=0.9', 'http://mohamedkeshk.com/admin/nationality-process-steps/6/edit', 'POST', '2022-06-30 01:57:28', '2022-06-30 01:57:28', NULL),
(125, 'تعديل بيانات  nationalityProcessStep', '{\"id\":6,\"title\":\"\\u0660\\u0661\\u0660\\u0660\\u0660\\u0660\\u06600\\u0660\\u0660\\u0660\\u0669\\u0663\\u0668\",\"description\":\"\\u062e\\u0637\\u0648\\u0629 \\u0639\\u0632\\u064a\\u0632\\u0629\\u0667\",\"order\":null,\"status\":1,\"created_at\":\"2022-06-29T18:56:26.000000Z\",\"updated_at\":\"2022-06-29T18:58:30.000000Z\"}', 'Registered', 1, 'http://mohamedkeshk.com/admin/nationality-process-steps/6/update', '196.153.27.212', 'Mozilla/5.0 (Linux; Android 11; RMX1971) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 'en-US,en;q=0.9', 'http://mohamedkeshk.com/admin/nationality-process-steps/6/edit', 'POST', '2022-06-30 01:58:30', '2022-06-30 01:58:30', NULL),
(126, 'تعديل بيانات  nationalityProcessStep', '{\"id\":6,\"title\":\"\\u0660\\u0661\\u0660\\u0660\\u0660\\u0660\\u06600\\u0660\\u0660\\u0660\\u0669\\u0663\\u0668\",\"description\":\"\\u062e\\u0637\\u0648\\u0629 \\u0639\\u0632\\u064a\\u0632\\u0629\\u0667\",\"order\":null,\"status\":1,\"created_at\":\"2022-06-29T18:56:26.000000Z\",\"updated_at\":\"2022-06-29T18:58:30.000000Z\"}', 'Registered', 1, 'http://mohamedkeshk.com/admin/nationality-process-steps/6/update', '196.153.27.212', 'Mozilla/5.0 (Linux; Android 11; RMX1971) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 'en-US,en;q=0.9', 'http://mohamedkeshk.com/admin/nationality-process-steps/6/edit', 'POST', '2022-06-30 01:58:31', '2022-06-30 01:58:31', NULL),
(127, 'تعديل بيانات  nationalityProcessStep', '{\"id\":6,\"title\":\"\\u0660\\u0661\\u0660\\u0660\\u0660\\u0660\\u06600\\u0660\\u0660\\u0660\\u0669\\u0663\\u0668\",\"description\":\"\\u062e\\u0637\\u0648\\u0629 \\u0639\\u0632\\u064a\\u0632\\u0629\\u0667\",\"order\":null,\"status\":1,\"created_at\":\"2022-06-29T18:56:26.000000Z\",\"updated_at\":\"2022-06-29T18:58:30.000000Z\"}', 'Registered', 1, 'http://mohamedkeshk.com/admin/nationality-process-steps/6/update', '196.153.27.212', 'Mozilla/5.0 (Linux; Android 11; RMX1971) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 'en-US,en;q=0.9', 'http://mohamedkeshk.com/admin/nationality-process-steps/6/edit', 'POST', '2022-06-30 01:58:32', '2022-06-30 01:58:32', NULL),
(128, 'تعديل بيانات  nationalityProcessStep', '{\"id\":6,\"title\":\"\\u0660\\u0661\\u0660\\u0660\\u0660\\u0660\\u06600\\u0660\\u0660\\u0660\\u0669\\u0663\\u0668\",\"description\":\"\\u062e\\u0637\\u0648\\u0629 \\u0639\\u0632\\u064a\\u0632\\u0629\\u0667\",\"order\":null,\"status\":1,\"created_at\":\"2022-06-29T18:56:26.000000Z\",\"updated_at\":\"2022-06-29T18:58:30.000000Z\"}', 'Registered', 1, 'http://mohamedkeshk.com/admin/nationality-process-steps/6/update', '196.153.27.212', 'Mozilla/5.0 (Linux; Android 11; RMX1971) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 'en-US,en;q=0.9', 'http://mohamedkeshk.com/admin/nationality-process-steps/6/edit', 'POST', '2022-06-30 01:58:33', '2022-06-30 01:58:33', NULL),
(129, 'Logged In', NULL, 'Guest', NULL, 'http://127.0.0.1:8000/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.53 Safari/537.36 Edg/103.0.1264.37', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'http://127.0.0.1:8000/admin/login', 'POST', '2022-06-30 01:50:14', '2022-06-30 01:50:14', NULL),
(130, 'Failed Login Attempt', NULL, 'Guest', NULL, 'https://elwa3b.makkah-tech.com/admin/login', '154.182.3.48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.66 Safari/537.36 Edg/103.0.1264.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'https://elwa3b.makkah-tech.com/admin/login', 'POST', '2022-07-05 16:04:14', '2022-07-05 16:04:14', NULL),
(131, 'Logged In', NULL, 'Guest', NULL, 'https://elwa3b.makkah-tech.com/admin/login', '154.182.3.48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.66 Safari/537.36 Edg/103.0.1264.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'https://elwa3b.makkah-tech.com/admin/login', 'POST', '2022-07-05 16:04:17', '2022-07-05 16:04:17', NULL),
(132, 'Logged In', NULL, 'Guest', NULL, 'https://elwa3b.makkah-tech.com/admin/login', '154.181.166.145', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.66 Safari/537.36 Edg/103.0.1264.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'https://elwa3b.makkah-tech.com/admin/login', 'POST', '2022-07-06 20:08:38', '2022-07-06 20:08:38', NULL),
(133, 'Logged Out', NULL, 'Registered', 1, 'https://elwa3b.makkah-tech.com/admin/logout', '154.181.166.145', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.66 Safari/537.36 Edg/103.0.1264.44', 'en-GB,en;q=0.9,en-US;q=0.8,ar;q=0.7', 'https://elwa3b.makkah-tech.com/admin/users', 'GET', '2022-07-06 20:09:06', '2022-07-06 20:09:06', NULL),
(134, 'Logged In', NULL, 'Guest', NULL, 'https://elwa3b.makkah-tech.com/admin/login', '37.211.146.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'en-US,en;q=0.9', 'https://elwa3b.makkah-tech.com/admin/login', 'POST', '2022-07-06 20:09:45', '2022-07-06 20:09:45', NULL),
(135, 'تعديل بيانات  category', '{\"id\":1,\"name\":\"\\u062e\\u0627\\u062f\\u0645\",\"color\":\"azure\",\"image\":\"admin-panel\\/users\\/7i6SFYnllYU94jFAkTUdWtfDGMREiKNbbSx0DtQF.png\",\"status\":true,\"created_at\":\"2022-05-28T12:00:09.000000Z\",\"updated_at\":\"2022-07-06T20:49:38.000000Z\",\"imageUrl\":\"https:\\/\\/elwa3b.makkah-tech.com\\/storage\\/admin-panel\\/users\\/7i6SFYnllYU94jFAkTUdWtfDGMREiKNbbSx0DtQF.png\"}', 'Registered', 1, 'https://elwa3b.makkah-tech.com/admin/categories/1/update', '37.211.146.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'en-US,en;q=0.9', 'https://elwa3b.makkah-tech.com/admin/categories/1/edit', 'POST', '2022-07-06 20:49:38', '2022-07-06 20:49:38', NULL),
(136, 'Logged In', NULL, 'Guest', NULL, 'https://elwa3b.makkah-tech.com/admin/login', '37.208.177.247', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'en-US,en;q=0.9,ar;q=0.8,en-GB;q=0.7', 'https://elwa3b.makkah-tech.com/admin/login', 'POST', '2022-08-08 13:32:35', '2022-08-08 13:32:35', NULL),
(137, 'Logged In', NULL, 'Guest', NULL, 'https://elwa3b.makkah-tech.com/admin/login', '156.197.70.194', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.81 Safari/537.36 Edg/104.0.1293.54', 'en-GB,en;q=0.9,en-US;q=0.8', 'https://elwa3b.makkah-tech.com/admin/login', 'POST', '2022-08-13 22:14:18', '2022-08-13 22:14:18', NULL);

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
(1, '2011_05_19_105202_create_states_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(7, '2016_06_01_000004_create_oauth_clients_table', 1),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2022_02_14_135712_create_admins_table', 1),
(12, '2022_02_14_161109_laratrust_setup_tables', 1),
(13, '2022_05_21_121503_create_categories_table', 1),
(14, '2022_05_21_221035_create_tags_table', 1),
(15, '2022_05_25_172523_create_nationalities_table', 1),
(20, '2022_05_26_144513_create_workers_table', 2),
(23, '2022_05_29_111221_create_category_worker_table', 3),
(24, '2017_11_04_103444_create_laravel_logger_activity_table', 4),
(26, '2022_06_04_124413_create_worker_archives_table', 5),
(27, '2022_06_07_105516_create_user_archives_table', 6),
(40, '2022_06_08_161651_create_order_statuses_table', 7),
(42, '2022_06_17_235834_create_sliders_table', 8),
(44, '2018_12_14_000000_create_favorites_table', 9),
(46, '2022_06_09_044622_create_nationality_process_steps_table', 10),
(48, '2022_06_20_050807_create_worker_experiences_table', 11),
(49, '2022_06_08_150330_create_orders_table', 12),
(52, '2022_06_21_081644_create_order_processes_table', 14),
(53, '2022_06_21_084017_create_nationality_steps_table', 15),
(54, '2022_06_22_031720_create_order_archives_table', 16),
(55, '2022_06_22_074753_create_religions_table', 17),
(56, '2022_06_23_044109_create_pages_table', 18),
(57, '2022_06_23_045314_create_contacts_table', 18),
(59, '2022_06_23_054020_create_notifications_table', 20),
(60, '2022_06_21_080206_create_order_notes_table', 21),
(61, '2022_06_23_050036_create_app_settings_table', 22),
(62, '2022_06_27_103103_create_replies_table', 23),
(63, '2014_10_00_000000_create_settings_table', 24),
(64, '2014_10_00_000001_add_group_column_on_settings_table', 24),
(65, '2022_06_28_074207_create_admin_settings_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'الهند', '2022-05-28 12:00:09', '2022-06-20 03:05:09'),
(3, 'سوريا', '2022-05-29 18:00:36', '2022-06-20 03:05:25'),
(4, 'السودان', '2022-06-20 03:05:33', '2022-06-20 03:05:33'),
(5, 'test', '2022-06-28 00:41:09', '2022-06-28 00:41:09'),
(6, 'الفلبين', '2022-07-06 20:56:29', '2022-07-06 20:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `nationality_process_steps`
--

CREATE TABLE `nationality_process_steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationality_process_steps`
--

INSERT INTO `nationality_process_steps` (`id`, `title`, `description`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'خطوه رقم 1', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.', NULL, 1, '2022-06-20 02:07:27', '2022-06-20 02:43:26'),
(2, 'خطوه رقم 2', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.', NULL, 1, '2022-06-20 02:46:15', '2022-06-20 02:46:15'),
(3, 'خطوه رقم 3', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.', NULL, 1, '2022-06-20 02:46:15', '2022-06-20 02:46:15'),
(4, 'خطوه رقم 4', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.', NULL, 1, '2022-06-20 02:46:15', '2022-06-20 02:46:15'),
(5, 'خطوه رقم 5', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.', NULL, 1, '2022-06-20 02:46:15', '2022-06-20 02:46:15'),
(7, 'خطوه رقم 6', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.', NULL, 1, '2022-07-05 16:07:20', '2022-07-05 16:07:20'),
(8, 'خطوه رقم 7', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.', NULL, 0, '2022-07-05 16:07:54', '2022-07-05 16:07:54'),
(9, 'خطوة 10', 'خطوة 10', NULL, 1, '2022-07-06 20:59:00', '2022-07-06 20:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `nationality_steps`
--

CREATE TABLE `nationality_steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nationality_id` bigint(20) UNSIGNED NOT NULL,
  `nationality_process_step_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationality_steps`
--

INSERT INTO `nationality_steps` (`id`, `nationality_id`, `nationality_process_step_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(4, 3, 1, NULL, NULL),
(5, 3, 2, NULL, NULL),
(6, 3, 3, NULL, NULL),
(7, 4, 1, NULL, NULL),
(8, 4, 2, NULL, NULL),
(9, 4, 3, NULL, NULL),
(10, 1, 5, NULL, NULL),
(11, 5, 2, NULL, NULL),
(12, 6, 1, NULL, NULL),
(13, 6, 2, NULL, NULL),
(14, 6, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('32037817-124f-408d-87fd-0bd9040bc635', 'App\\Notifications\\OrderStatusNotification', 'users', 2, '[{\"badge\":1,\"body\":\"your Order number 123456789 has been approved\",\"user_id\":2}]', NULL, '2022-06-23 04:24:56', '2022-06-23 04:24:56'),
('99eedd74-9383-43fa-99b1-94e02d53a948', 'App\\Notifications\\OrderStatusNotification', 'users', 2, '[{\"badge\":2,\"body\":\"your Order number 123456789 has been approved\",\"user_id\":2}]', NULL, '2022-06-23 04:24:51', '2022-06-23 04:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('01d9acefffeda692412b3a435ec2cc4bf34167f596957557e183532a861360a846f09333ef122c6b', 7, 5, 'Laravel', '[]', 1, '2022-07-04 09:01:49', '2022-07-04 09:01:49', '2023-07-04 09:01:49'),
('01f146dd0b33d4b3da9e487445984056f83a71386110705eb880ccc1c030011e4f3e19dcc063d13a', 2, 5, 'Laravel', '[]', 0, '2022-06-30 06:50:07', '2022-06-30 06:50:07', '2023-06-30 06:50:07'),
('129407fc2d61d33c81b2a05a3eb3713c93deead98f5b9fcd0a9c3058e12aab47ff0b39877a9f53d6', 2, 5, 'Laravel', '[]', 0, '2022-06-30 06:50:04', '2022-06-30 06:50:04', '2023-06-30 06:50:04'),
('16b4a1ffbc270a9205ac4f9ed0ca7a7ddf5c904767c18facb7bc664e17899c0e96c4ff3dd0aebf10', 7, 5, 'Laravel', '[]', 1, '2022-07-02 07:05:25', '2022-07-02 07:05:25', '2023-07-02 07:05:25'),
('18175afd8c6123e8d267771320d3b427994660a485995c732fe0cb514480c28c53521e7f384290be', 7, 5, 'Laravel', '[]', 1, '2022-07-02 06:46:55', '2022-07-02 06:46:55', '2023-07-02 06:46:55'),
('1b478b6038e1e14c23d9d933b0ccf86bc83092be3f66f1268e257c69b68595a037ff9ff764fd6feb', 9, 5, 'Laravel', '[]', 0, '2022-07-02 06:54:38', '2022-07-02 06:54:38', '2023-07-02 06:54:38'),
('2b769e45c49dd30605616f5d26351a4ec1ad0573b6729bdabb25a527952474fee0155ca92ca444a4', 7, 5, 'Laravel', '[]', 0, '2022-07-04 11:51:47', '2022-07-04 11:51:47', '2023-07-04 11:51:47'),
('3161e496381b5a5ed437eb5e517d4f61482ee2169c95eb61b704ebb3b59d89d99f18f32fa3ac1262', 7, 5, 'Laravel', '[]', 1, '2022-07-07 13:06:38', '2022-07-07 13:06:38', '2023-07-07 13:06:38'),
('3222976504660089b0e098446ee08dbdd1430622e0c0a82c9473cc46eb3ab7dd7c1ed7e718e9f1ad', 9, 5, 'Laravel', '[]', 0, '2022-07-02 06:29:23', '2022-07-02 06:29:23', '2023-07-02 06:29:23'),
('32b471bec1d95d0eb79b365df673b4025006230dc42fc054acc556aa9471e463c85fc85fb6f73331', 7, 5, 'Laravel', '[]', 0, '2022-07-06 21:53:55', '2022-07-06 21:53:55', '2023-07-06 21:53:55'),
('36e33e73319b187e917ec27a867e4a560c5d684f50e2382f2b5edcf5b467920133be38902d793cb3', 7, 5, 'Laravel', '[]', 1, '2022-07-04 02:16:07', '2022-07-04 02:16:07', '2023-07-04 02:16:07'),
('3778990f7f6a063eb15c213d621eb76ce48d55943b2b67515c083e93520c8f1ae00693ae98897b5d', 7, 5, 'Laravel', '[]', 1, '2022-07-02 06:47:42', '2022-07-02 06:47:42', '2023-07-02 06:47:42'),
('49b86c4d6959165887da66c5d6f87dc5f896cecb6f3cf89ebc0b2f9261d49b0924a009e3a877adad', 9, 5, 'Laravel', '[]', 0, '2022-07-02 06:54:34', '2022-07-02 06:54:34', '2023-07-02 06:54:34'),
('49cc9392cf4888f22781ab6ac285847bc50c9b96a32033fb07b03e14da1acac9ac86d25b246a7bf5', 7, 5, 'Laravel', '[]', 0, '2022-07-05 07:39:51', '2022-07-05 07:39:51', '2023-07-05 07:39:51'),
('5118cb2bf5bc2ca1985499913f7dc81c19411b4fa81449b95ce2e7c699c49ec43846e6ace7f389f6', 7, 5, 'Laravel', '[]', 1, '2022-07-06 23:55:50', '2022-07-06 23:55:50', '2023-07-06 23:55:50'),
('512eb8b28ca35b280b5c177e9c94740c5dff7fc478ac4b1935789e61e375885089392ca941230e76', 7, 5, 'Laravel', '[]', 1, '2022-07-02 06:49:58', '2022-07-02 06:49:58', '2023-07-02 06:49:58'),
('599c54d2d0e0b744660f509a80924c12185c956214bc2f20f159591c8bc6b9d8084d0656919f5137', 7, 5, 'Laravel', '[]', 1, '2022-07-04 06:54:24', '2022-07-04 06:54:24', '2023-07-04 06:54:24'),
('60bd288bdb6b5d6ff6ec878aa2c78b785ce98ee2744752312dcf69e900d7cebc5860abc09cb745ed', 9, 5, 'Laravel', '[]', 1, '2022-07-02 07:08:33', '2022-07-02 07:08:33', '2023-07-02 07:08:33'),
('687824975cb71da7207446dbf69fe54dc9b2ffca403bc78faeca57b72e5732f4f9132f7e70683e1b', 2, 5, 'Laravel', '[]', 0, '2022-07-02 06:29:40', '2022-07-02 06:29:40', '2023-07-02 06:29:40'),
('69ba5d50e972d69b978d6dbdc62535fa8d59e24b84222767e77251a156825549ba4a80e06ff78cfe', 7, 5, 'Laravel', '[]', 0, '2022-07-02 17:03:32', '2022-07-02 17:03:32', '2023-07-02 17:03:32'),
('6ad114495daeb28f61e3c65dabeb74e345bbcbbc474f64f0d2f1148101e66d510fe1413056081cf9', 9, 5, 'Laravel', '[]', 0, '2022-07-02 14:27:20', '2022-07-02 14:27:20', '2023-07-02 14:27:20'),
('6ee1d06e73c032ae3630a44fd1f06ae99fc978379f672a5ebda6ccca22686d71094a57a3f7f1ffa0', 7, 5, 'Laravel', '[]', 0, '2022-07-07 06:04:38', '2022-07-07 06:04:38', '2023-07-07 06:04:38'),
('70091d91bedf101a98531997cdfe3512c882ce0499d4f46002ee0824606522930a2b1a480820088d', 7, 5, 'Laravel', '[]', 1, '2022-07-02 07:40:06', '2022-07-02 07:40:06', '2023-07-02 07:40:06'),
('82b34d976dc13a12db2dbf75ce8f448d9307488899be835e36a88907b187593ae31064edbdb76221', 7, 5, 'Laravel', '[]', 1, '2022-07-02 06:47:12', '2022-07-02 06:47:12', '2023-07-02 06:47:12'),
('870447369de61f31fcd5a968c78b27a7fb8d55fb71712d79eba1e1b4f44d538dcb4707b8d3109276', 9, 5, 'Laravel', '[]', 0, '2022-07-02 06:54:43', '2022-07-02 06:54:43', '2023-07-02 06:54:43'),
('8e43eeb99b36174fcf23ac32a15ab42478ab855da313ec1cdce5086d21645f328f190afbe581df36', 2, 5, 'Laravel', '[]', 0, '2022-07-02 06:29:52', '2022-07-02 06:29:52', '2023-07-02 06:29:52'),
('93787e6c3860aedaa8e4bdf3513f928a4e7ac1d454558961c9a8e8ee321459d63de9cf35ff3ca231', 9, 5, 'Laravel', '[]', 1, '2022-07-02 06:50:07', '2022-07-02 06:50:07', '2023-07-02 06:50:07'),
('9715a64d812c223063061e456d5b307bd0586be3cb7350a6f95e51b4f5e44316b5c2ab5f7b98a1d6', 10, 5, 'Laravel', '[]', 0, '2022-07-06 20:50:22', '2022-07-06 20:50:22', '2023-07-06 20:50:22'),
('9dd548be6da520fabfa001d6c4eecf796ac2cf3ebfa6cc8d0c8d4e8eb18fae963993284934ff30ce', 5, 5, 'Laravel', '[]', 1, '2022-07-02 00:16:25', '2022-07-02 00:16:25', '2023-07-02 00:16:25'),
('a60338036532ffb934254f046d2791ee5d5b1cd40cc7cb99b779e87984cbc17d80a6aef4cb0e1000', 9, 5, 'Laravel', '[]', 1, '2022-07-02 06:50:45', '2022-07-02 06:50:45', '2023-07-02 06:50:45'),
('a8d2ad87f266a85657fc0c68ce02dba2298d4b576b0813e65915467b396950174c26ad0fde36c85d', 7, 5, 'Laravel', '[]', 0, '2022-07-02 17:33:52', '2022-07-02 17:33:52', '2023-07-02 17:33:52'),
('ad71519cea52e46fffe607afbf59a55d391692c16653b039a82a0bea0cd7cd0e22786421a2f7c326', 7, 5, 'Laravel', '[]', 0, '2022-07-04 16:25:50', '2022-07-04 16:25:50', '2023-07-04 16:25:50'),
('afb693b7a557f9927d885b05c87d935ef9067c288b6b4fa44e93e8a69b7b452655a2957d96b63149', 7, 5, 'Laravel', '[]', 0, '2022-07-05 02:21:55', '2022-07-05 02:21:55', '2023-07-05 02:21:55'),
('b92354340b94a7ab9df29cab9df34988f904a95c07852c34a92376b76d26d259f8117453927dd04f', 7, 5, 'Laravel', '[]', 0, '2022-07-02 16:09:03', '2022-07-02 16:09:03', '2023-07-02 16:09:03'),
('bdd4f759094ba3e6a8ef2d25c798d5249eeec24d3ad2d74f622f41ca386b81c60336413c8faa4fbe', 7, 5, 'Laravel', '[]', 1, '2022-07-02 05:01:46', '2022-07-02 05:01:46', '2023-07-02 05:01:46'),
('c383cf25b091fdd37e1d13a12d9b6837a05101e070306b1640d46646a36c431866a2b8d51a591c7a', 2, 5, 'Laravel', '[]', 0, '2022-06-18 03:37:41', '2022-06-18 03:37:41', '2023-06-18 05:37:41'),
('d51780f39537511519b52c111c0f5b90fe5dca72c2ceee8ec330ed98efb5d15670c00fa4a73bfd6c', 8, 5, 'Laravel', '[]', 0, '2022-07-02 06:26:09', '2022-07-02 06:26:09', '2023-07-02 06:26:09'),
('d7347775df866a6752ea247ff2860ba685ebd6a4856a1f922cbe74f57e6af2dd082d8f6228411f24', 7, 5, 'Laravel', '[]', 0, '2022-07-02 18:44:40', '2022-07-02 18:44:40', '2023-07-02 18:44:40'),
('d92723fdb08e6ffb5fc12ddf9fe9b7696a5174dfc022db371857b98b0b87e91dd140600dff02f9c6', 10, 5, 'Laravel', '[]', 1, '2022-07-05 07:45:50', '2022-07-05 07:45:50', '2023-07-05 07:45:50'),
('de98cdecab5339c76abd4c4722c9e85220c239c4bf3e669a0ddf181f51654fa0cae811d354d45170', 2, 5, 'Laravel', '[]', 0, '2022-06-30 04:46:24', '2022-06-30 04:46:24', '2023-06-30 06:46:24'),
('e044f8203427d51cdc4491813fd8715f392c7f6118474fe411beb799740112372046a8fb248e583f', 4, 5, 'Laravel', '[]', 1, '2022-07-01 19:25:31', '2022-07-01 19:25:31', '2023-07-01 19:25:31'),
('e9c2f4935573947f34e86c3d5c25a7dabe37df9a5ee51c5c33fff4ab453aea528f1f94eab700a18a', 2, 5, 'Laravel', '[]', 0, '2022-07-02 06:29:10', '2022-07-02 06:29:10', '2023-07-02 06:29:10'),
('f0151b8785b8c7a2f4f670b2759e88ef4807882012d528b0ca3ae53cee340011cee3be8dc60f41e0', 9, 5, 'Laravel', '[]', 0, '2022-07-02 06:51:14', '2022-07-02 06:51:14', '2023-07-02 06:51:14'),
('f1ade72b2d7f5fd09c49392cc9ee0686d479c41c3b6575e7fbd81368979e427a6799481b4469bb25', 2, 5, 'Laravel', '[]', 0, '2022-06-18 03:37:55', '2022-06-18 03:37:55', '2023-06-18 05:37:55'),
('f1b57c65a775faed59bc6cae4c8f14cb5f533815c2ed6503b285d11be024f900a2cd9e7b92e5a1e0', 9, 5, 'Laravel', '[]', 0, '2022-07-05 06:49:32', '2022-07-05 06:49:32', '2023-07-05 06:49:32'),
('f55bbe72a832d67fea9295bec5ee4b377125327725af6e70fee5b72a547cc48979c5e70ff6f1ffd8', 7, 5, 'Laravel', '[]', 0, '2022-07-02 07:08:49', '2022-07-02 07:08:49', '2023-07-02 07:08:49'),
('f57a12146c0fb1abd21ff6f5a12c0a2f0381014d99ce9253b114aea77ffacd1fed69a3ccab1a3db9', 6, 5, 'Laravel', '[]', 0, '2022-07-02 00:37:23', '2022-07-02 00:37:23', '2023-07-02 00:37:23'),
('f88717a99335c73b2fca677cb897b6312d1c5c4af9f0665e782d30a1528dff1bd5fdd6d2eeac638d', 2, 5, 'Laravel', '[]', 0, '2022-07-02 06:25:39', '2022-07-02 06:25:39', '2023-07-02 06:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'gvlO3yitdT3GP8KMxgn0cRPzPw2kWTTN66kArHuM', NULL, 'http://localhost', 1, 0, 0, '2022-05-28 12:00:06', '2022-05-28 12:00:06'),
(2, NULL, 'Laravel Password Grant Client', 'sFhoy0QLasO1vA13opzxktIydh8xZ9ttIFMXQY5h', 'users', 'http://localhost', 0, 1, 0, '2022-05-28 12:00:06', '2022-05-28 12:00:06'),
(3, NULL, 'Laravel Personal Access Client', '8JwMbw0ZuYEqWmvd4u3kfnFNGAdu4S4uy9vBFPL0', NULL, 'http://localhost', 1, 0, 0, '2022-06-02 08:55:56', '2022-06-02 08:55:56'),
(4, NULL, 'Laravel Password Grant Client', 'Pc3aABd58x6z7scQVC6BZO73lvCfQC3MY5BhBt0p', 'users', 'http://localhost', 0, 1, 0, '2022-06-02 08:55:56', '2022-06-02 08:55:56'),
(5, NULL, 'Laravel Personal Access Client', 'wMKq7CRDIqPOCY5mMpNsarWbQtRItVyQ3NbX0tZA', NULL, 'http://localhost', 1, 0, 0, '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(6, NULL, 'Laravel Password Grant Client', 'oIe60Kr3vZjISa8PtkdfUJnPZXbJcGxI85PNnD4e', 'users', 'http://localhost', 0, 1, 0, '2022-06-02 08:56:17', '2022-06-02 08:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-05-28 12:00:06', '2022-05-28 12:00:06'),
(2, 3, '2022-06-02 08:55:56', '2022-06-02 08:55:56'),
(3, 5, '2022-06-02 08:56:17', '2022-06-02 08:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `worker_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','accepted','rejected','completed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_number`, `worker_id`, `status`, `created_at`, `updated_at`) VALUES
(55, 2, 'EA26493499540', 3, 'completed', '2022-06-21 18:35:20', '2022-06-22 00:31:53'),
(56, 2, 'EA26493511853', 4, 'pending', '2022-06-21 18:48:10', '2022-06-21 18:48:10'),
(60, 1, 'EA26498634284', 4, 'pending', '2022-06-25 11:44:02', '2022-06-25 11:44:02'),
(61, 4, 'EA26507256810', 4, 'pending', '2022-07-01 19:25:50', '2022-07-01 19:25:50'),
(62, 6, 'EA26507557874', 3, 'pending', '2022-07-02 00:39:26', '2022-07-02 00:39:26'),
(63, 6, 'EA26507579624', 4, 'pending', '2022-07-02 01:02:06', '2022-07-02 01:02:06'),
(64, 7, 'EA26507932609', 3, 'pending', '2022-07-02 07:09:47', '2022-07-02 07:09:47'),
(65, 7, 'EA26507977343', 4, 'pending', '2022-07-02 07:56:23', '2022-07-02 07:56:23'),
(66, 10, 'EA26512725161', 3, 'pending', '2022-07-05 18:22:02', '2022-07-05 18:22:02'),
(67, 10, 'EA26514284712', 6, 'accepted', '2022-07-06 21:26:34', '2022-07-06 21:34:23'),
(68, 9, 'EA26519137873', 4, 'pending', '2022-07-10 09:41:56', '2022-07-10 09:41:56'),
(69, 9, 'EA26548599224', 3, 'pending', '2022-07-31 17:10:51', '2022-07-31 17:10:51'),
(70, 10, 'EA26566248389', 4, 'pending', '2022-08-13 11:35:24', '2022-08-13 11:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_archives`
--

CREATE TABLE `order_archives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_archives`
--

INSERT INTO `order_archives` (`id`, `order_id`, `title`, `description`, `images`, `created_at`, `updated_at`) VALUES
(1, 55, 'عنوان الأرشيف', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.\nإذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد،', '[\"orderArchive\\/Y8THALNdwj_service.png\",\"orderArchive\\/TigxZiVUpO_service.png\",\"orderArchive\\/dH1CABIgn5_service.png\"]', '2022-06-22 03:24:13', '2022-06-25 02:03:51'),
(2, 55, 'عنوان الأرشيف 2', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.\r\nإذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد،', '[\"orderArchive\\/Y8THALNdwj_service.png\",\"orderArchive\\/TigxZiVUpO_service.png\",\"orderArchive\\/dH1CABIgn5_service.png\"]', '2022-06-22 03:24:13', '2022-06-25 02:03:51'),
(3, 67, 'صورة البطاقة', 'صورة البطاقة', '[\"orderArchive\\/e7KQVdClMx_service.png\"]', '2022-07-06 21:35:49', '2022-07-06 21:35:49'),
(4, 67, 'صورة بطاقة', 'صورة بطاقة', '[\"orderArchive\\/ZIDArkIgru_service.png\"]', '2022-07-06 21:36:12', '2022-07-06 21:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_notes`
--

CREATE TABLE `order_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `note` text NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `note_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_notes`
--

INSERT INTO `order_notes` (`id`, `order_id`, `note`, `admin_id`, `note_date`, `created_at`, `updated_at`) VALUES
(21, 60, 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.\n', 1, '2022-06-25', '2022-06-25 11:44:02', '2022-06-25 11:44:02'),
(24, 55, 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.\r\nإذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد،', 1, '2022-06-26', '2022-06-28 01:41:57', '2022-06-28 01:41:57'),
(25, 55, 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.\r\nإذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد،', 1, '2022-06-12', '2022-06-28 01:41:57', '2022-06-28 01:41:57'),
(27, 67, 'بسم الله الرحمن الرحيم', 1, '2022-07-06', '2022-07-06 21:34:23', '2022-07-06 21:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `order_processes`
--

CREATE TABLE `order_processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `process_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','completed') NOT NULL DEFAULT 'pending',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_processes`
--

INSERT INTO `order_processes` (`id`, `order_id`, `process_id`, `status`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(55, 55, 1, 'completed', '2022-06-21', '2022-06-23', '2022-06-21 18:35:20', '2022-06-28 01:41:57'),
(56, 55, 2, 'completed', '2022-06-26', '2022-07-26', '2022-06-21 18:35:20', '2022-06-28 01:41:57'),
(57, 55, 3, 'completed', '2022-06-26', '2022-06-26', '2022-06-21 18:35:20', '2022-06-28 01:41:57'),
(58, 56, 1, 'pending', '2022-06-21', NULL, '2022-06-21 18:48:10', '2022-06-21 18:48:10'),
(59, 56, 2, 'pending', NULL, NULL, '2022-06-21 18:48:10', '2022-06-21 18:48:10'),
(60, 56, 3, 'pending', NULL, NULL, '2022-06-21 18:48:10', '2022-06-21 18:48:10'),
(61, 55, 4, 'pending', NULL, NULL, '2022-06-21 18:35:20', '2022-06-28 01:41:57'),
(62, 55, 5, 'pending', NULL, NULL, '2022-06-21 18:35:20', '2022-06-28 01:41:57'),
(63, 57, 1, 'pending', '2022-06-25', NULL, '2022-06-25 11:42:50', '2022-06-25 11:42:50'),
(64, 57, 2, 'pending', NULL, NULL, '2022-06-25 11:42:50', '2022-06-25 11:42:50'),
(65, 57, 3, 'pending', NULL, NULL, '2022-06-25 11:42:50', '2022-06-25 11:42:50'),
(66, 58, 1, 'pending', '2022-06-25', NULL, '2022-06-25 11:43:18', '2022-06-25 11:43:18'),
(67, 58, 2, 'pending', NULL, NULL, '2022-06-25 11:43:18', '2022-06-25 11:43:18'),
(68, 58, 3, 'pending', NULL, NULL, '2022-06-25 11:43:18', '2022-06-25 11:43:18'),
(69, 59, 1, 'pending', '2022-06-25', NULL, '2022-06-25 11:43:41', '2022-06-25 11:43:41'),
(70, 59, 2, 'pending', NULL, NULL, '2022-06-25 11:43:41', '2022-06-25 11:43:41'),
(71, 59, 3, 'pending', NULL, NULL, '2022-06-25 11:43:41', '2022-06-25 11:43:41'),
(72, 60, 1, 'pending', '2022-06-25', NULL, '2022-06-25 11:44:02', '2022-06-25 11:44:02'),
(73, 60, 2, 'pending', NULL, NULL, '2022-06-25 11:44:02', '2022-06-25 11:44:02'),
(74, 60, 3, 'pending', NULL, NULL, '2022-06-25 11:44:02', '2022-06-25 11:44:02'),
(75, 61, 1, 'pending', '2022-07-01', NULL, '2022-07-01 19:25:50', '2022-07-01 19:25:50'),
(76, 61, 2, 'pending', NULL, NULL, '2022-07-01 19:25:50', '2022-07-01 19:25:50'),
(77, 61, 5, 'pending', NULL, NULL, '2022-07-01 19:25:50', '2022-07-01 19:25:50'),
(78, 62, 1, 'pending', '2022-07-02', NULL, '2022-07-02 00:39:26', '2022-07-02 00:39:26'),
(79, 62, 2, 'pending', NULL, NULL, '2022-07-02 00:39:26', '2022-07-02 00:39:26'),
(80, 62, 5, 'pending', NULL, NULL, '2022-07-02 00:39:26', '2022-07-02 00:39:26'),
(81, 63, 1, 'pending', '2022-07-02', NULL, '2022-07-02 01:02:06', '2022-07-02 01:02:06'),
(82, 63, 2, 'pending', NULL, NULL, '2022-07-02 01:02:06', '2022-07-02 01:02:06'),
(83, 63, 5, 'pending', NULL, NULL, '2022-07-02 01:02:06', '2022-07-02 01:02:06'),
(84, 64, 1, 'pending', '2022-07-02', NULL, '2022-07-02 07:09:47', '2022-07-02 07:09:47'),
(85, 64, 2, 'pending', NULL, NULL, '2022-07-02 07:09:47', '2022-07-02 07:09:47'),
(86, 64, 5, 'pending', NULL, NULL, '2022-07-02 07:09:47', '2022-07-02 07:09:47'),
(87, 65, 1, 'pending', '2022-07-02', NULL, '2022-07-02 07:56:23', '2022-07-02 07:56:23'),
(88, 65, 2, 'pending', NULL, NULL, '2022-07-02 07:56:23', '2022-07-02 07:56:23'),
(89, 65, 5, 'pending', NULL, NULL, '2022-07-02 07:56:23', '2022-07-02 07:56:23'),
(90, 55, 7, 'pending', '2022-06-26', '2022-07-26', '2022-06-21 18:35:20', '2022-06-28 01:41:57'),
(91, 55, 8, 'pending', NULL, NULL, '2022-06-21 18:35:20', '2022-06-28 01:41:57'),
(92, 66, 1, 'pending', '2022-07-05', NULL, '2022-07-05 18:22:02', '2022-07-05 18:22:02'),
(93, 66, 2, 'pending', NULL, NULL, '2022-07-05 18:22:02', '2022-07-05 18:22:02'),
(94, 66, 5, 'pending', NULL, NULL, '2022-07-05 18:22:02', '2022-07-05 18:22:02'),
(95, 67, 1, 'completed', '2022-07-06', NULL, '2022-07-06 21:26:34', '2022-07-06 21:34:23'),
(96, 67, 2, 'pending', NULL, NULL, '2022-07-06 21:26:34', '2022-07-06 21:34:23'),
(97, 67, 3, 'pending', NULL, NULL, '2022-07-06 21:26:34', '2022-07-06 21:34:23'),
(98, 68, 1, 'pending', '2022-07-10', NULL, '2022-07-10 09:41:56', '2022-07-10 09:41:56'),
(99, 68, 2, 'pending', NULL, NULL, '2022-07-10 09:41:56', '2022-07-10 09:41:56'),
(100, 68, 5, 'pending', NULL, NULL, '2022-07-10 09:41:56', '2022-07-10 09:41:56'),
(101, 69, 1, 'pending', '2022-07-31', NULL, '2022-07-31 17:10:51', '2022-07-31 17:10:51'),
(102, 69, 2, 'pending', NULL, NULL, '2022-07-31 17:10:51', '2022-07-31 17:10:51'),
(103, 69, 5, 'pending', NULL, NULL, '2022-07-31 17:10:51', '2022-07-31 17:10:51'),
(104, 70, 1, 'pending', '2022-08-13', NULL, '2022-08-13 11:35:24', '2022-08-13 11:35:24'),
(105, 70, 2, 'pending', NULL, NULL, '2022-08-13 11:35:24', '2022-08-13 11:35:24'),
(106, 70, 5, 'pending', NULL, NULL, '2022-08-13 11:35:24', '2022-08-13 11:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `images` varchar(191) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `images`, `content`, `created_at`, `updated_at`) VALUES
(1, 'About us', 'about-us', '[\"page\\/AwCXJv68y1_service.png\",\"page\\/wo0gb8rUdq_service.png\"]', '<div>\r\n    THAT. Then again--\"BEFORE SHE HAD THIS FIT--\" you never even introduced to a day-school, too,\' said Alice; not that she ran out of breath, and said \'That\'s very curious.\' \'It\'s all her wonderful Adventures, till she had never seen such a noise inside, no one could possibly hear you.\' And certainly there was nothing so VERY much out of sight before the officer could get away without being seen, when she found to be listening, so she went on for some time with the lobsters, out to sea!\" But the.\r\n</div>\r\n<div>\r\n    Caterpillar. \'Well, perhaps you were all writing very busily on slates. \'What are you getting on now, my dear?\' it continued, turning to the little door, had vanished completely. Very soon the Rabbit actually TOOK A WATCH OUT OF ITS WAISTCOAT-POCKET, and looked at the moment, \'My dear! I wish you were INSIDE, you might knock, and I never knew whether it would be quite as safe to stay with it as she spoke--fancy CURTSEYING as you\'re falling through the door, and the reason and all would change.\r\n</div>\r\n<div>\r\n    Footman continued in the middle, wondering how she was quite surprised to find her in a hot tureen! Who for such dainties would not open any of them. \'I\'m sure I\'m not the smallest idea how confusing it is almost certain to disagree with you, sooner or later. However, this bottle was a real nose; also its eyes were nearly out of sight. Alice remained looking thoughtfully at the end of the baby, the shriek of the words \'DRINK ME\' beautifully printed on it in large letters. It was so small as.\r\n</div>\r\n<div>\r\n    Alice, in a large rabbit-hole under the table: she opened it, and then keep tight hold of anything, but she knew the right size, that it might end, you know,\' Alice gently remarked; \'they\'d have been changed for any lesson-books!\' And so it was her turn or not. So she sat on, with closed eyes, and feebly stretching out one paw, trying to touch her. \'Poor little thing!\' said Alice, a little girl she\'ll think me at all.\' \'In that case,\' said the Cat, \'if you only walk long enough.\' Alice felt so.\r\n</div>', NULL, '2022-06-28 01:42:09'),
(2, 'Terms & Conditions', 'terms-conditions', NULL, '<p>\r\n    Queen was to eat some of them hit her in such long ringlets, and mine doesn\'t go in at the picture.) \'Up, lazy thing!\' said Alice, swallowing down her anger as well say that \"I see what the flame of a tree. By the use of repeating all that green stuff be?\' said Alice. \'Come, let\'s try the thing Mock Turtle a little bottle on it, or at any rate a book of rules for shutting people up like a Jack-in-the-box, and up I goes like a snout than a real Turtle.\' These words were followed by a row of.\r\n</p>\r\n<p>\r\n    KNOW IT TO BE TRUE--\" that\'s the jury, who instantly made a memorandum of the bread-and-butter. Just at this moment the door and went on eagerly: \'There is such a hurry to change them--\' when she next peeped out the Fish-Footman was gone, and, by the time he had come back and finish your story!\' Alice called after it; and the White Rabbit returning, splendidly dressed, with a round face, and large eyes full of tears, but said nothing. \'Perhaps it hasn\'t one,\' Alice ventured to remark. \'Tut.\r\n</p>\r\n<p>\r\n    I should be free of them didn\'t know it was all dark overhead; before her was another long passage, and the Hatter and the cool fountains. CHAPTER VIII. The Queen\'s Croquet-Ground A large rose-tree stood near the centre of the house, and have next to her. The Cat seemed to be an old Crab took the regular course.\' \'What was that?\' inquired Alice. \'Reeling and Writhing, of course, Alice could not tell whether they were nowhere to be sure! However, everything is queer to-day.\' Just then her head.\r\n</p>\r\n<p>\r\n    Alice; but she was playing against herself, for she was surprised to see that queer little toss of her hedgehog. The hedgehog was engaged in a great many more than nine feet high. \'Whoever lives there,\' thought Alice, and, after glaring at her feet in a more subdued tone, and everybody else. \'Leave off that!\' screamed the Pigeon. \'I\'m NOT a serpent, I tell you!\' But she went on, \'--likely to win, that it\'s hardly worth while finishing the game.\' The Queen had never before seen a rabbit with.\r\n</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `code` bigint(20) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `mobile`, `code`, `token`, `created_at`) VALUES
('developer.essam@gmail.com', '01000709271', 9999, NULL, '2022-07-02 00:31:54'),
('m@m.com', '012654566', 9999, NULL, '2022-07-06 20:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `model`, `created_at`, `updated_at`) VALUES
(1, 'create-dashboard', 'Create Dashboard', 'Create Dashboard', 'Dashboard', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(2, 'read-dashboard', 'Read Dashboard', 'Read Dashboard', 'Dashboard', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(3, 'update-dashboard', 'Update Dashboard', 'Update Dashboard', 'Dashboard', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(4, 'delete-dashboard', 'Delete Dashboard', 'Delete Dashboard', 'Dashboard', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(5, 'create-roles', 'Create Roles', 'Create Roles', 'Roles', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(6, 'read-roles', 'Read Roles', 'Read Roles', 'Roles', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(7, 'update-roles', 'Update Roles', 'Update Roles', 'Roles', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(8, 'delete-roles', 'Delete Roles', 'Delete Roles', 'Roles', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(9, 'create-admins', 'Create Admins', 'Create Admins', 'Admins', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(10, 'read-admins', 'Read Admins', 'Read Admins', 'Admins', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(11, 'update-admins', 'Update Admins', 'Update Admins', 'Admins', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(12, 'delete-admins', 'Delete Admins', 'Delete Admins', 'Admins', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(13, 'create-users', 'Create Users', 'Create Users', 'Users', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(14, 'read-users', 'Read Users', 'Read Users', 'Users', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(15, 'update-users', 'Update Users', 'Update Users', 'Users', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(16, 'delete-users', 'Delete Users', 'Delete Users', 'Users', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(17, 'create-pages', 'Create Pages', 'Create Pages', 'Pages', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(18, 'read-pages', 'Read Pages', 'Read Pages', 'Pages', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(19, 'update-pages', 'Update Pages', 'Update Pages', 'Pages', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(20, 'delete-pages', 'Delete Pages', 'Delete Pages', 'Pages', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(21, 'create-settings', 'Create Settings', 'Create Settings', 'Settings', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(22, 'read-settings', 'Read Settings', 'Read Settings', 'Settings', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(23, 'update-settings', 'Update Settings', 'Update Settings', 'Settings', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(24, 'delete-settings', 'Delete Settings', 'Delete Settings', 'Settings', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(25, 'create-nationalities', 'Create Nationalities', 'Create Nationalities', 'Nationalities', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(26, 'read-nationalities', 'Read Nationalities', 'Read Nationalities', 'Nationalities', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(27, 'update-nationalities', 'Update Nationalities', 'Update Nationalities', 'Nationalities', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(28, 'delete-nationalities', 'Delete Nationalities', 'Delete Nationalities', 'Nationalities', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(29, 'create-categories', 'Create Categories', 'Create Categories', 'Categories', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(30, 'read-categories', 'Read Categories', 'Read Categories', 'Categories', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(31, 'update-categories', 'Update Categories', 'Update Categories', 'Categories', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(32, 'delete-categories', 'Delete Categories', 'Delete Categories', 'Categories', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(33, 'create-workers', 'Create Workers', 'Create Workers', 'Workers', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(34, 'read-workers', 'Read Workers', 'Read Workers', 'Workers', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(35, 'update-workers', 'Update Workers', 'Update Workers', 'Workers', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(36, 'delete-workers', 'Delete Workers', 'Delete Workers', 'Workers', '2022-06-02 08:56:17', '2022-06-02 08:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(15, 2),
(15, 3),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(29, 3),
(30, 1),
(30, 2),
(30, 3),
(31, 1),
(31, 2),
(31, 3),
(32, 1),
(32, 2),
(32, 3),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `religions`
--

INSERT INTO `religions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'muslim', NULL, NULL),
(2, 'christian', NULL, NULL),
(3, 'buddhist', NULL, NULL),
(4, 'hindu', NULL, NULL),
(5, 'other', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `contact_id`, `admin_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد،\n', '2022-06-27 09:11:49', '2022-06-27 09:11:49'),
(9, 1, 1, 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد،', '2022-06-27 09:25:11', '2022-06-27 09:25:11'),
(10, 1, 1, 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد،', '2022-06-27 09:26:09', '2022-06-27 09:26:09'),
(11, 3, 1, 'شكرا للتواصل', '2022-07-06 21:42:46', '2022-07-06 21:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 1, 'Super Admin', 'Super Admin', '2022-06-02 08:56:17', '2022-06-02 08:56:17'),
(2, 'Tester', 1, 'Tester', 'Tester', '2022-06-02 08:56:46', '2022-06-02 08:56:46'),
(3, 'مستخدمين وتصنيفات', 1, 'مستخدمين وتصنيفات', 'ررررررررررررر', '2022-07-06 20:16:53', '2022-07-06 20:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'admins'),
(1, 2, 'admins'),
(2, 2, 'admins'),
(1, 3, 'admins'),
(2, 3, 'admins');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `val` text DEFAULT NULL,
  `group` varchar(255) NOT NULL DEFAULT 'default',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `val`, `group`, `created_at`, `updated_at`) VALUES
(779, 'company', 'الوعب', 'app', '2022-07-06 21:51:24', '2022-07-06 21:51:24'),
(780, 'email', 'elwab@app.com', 'app', '2022-07-06 21:51:24', '2022-07-06 21:51:24'),
(781, 'mobile', '01097643123', 'app', '2022-07-06 21:51:24', '2022-07-06 21:51:24'),
(782, 'address', 'شارع الخيام - لوسيل - قطر', 'app', '2022-07-06 21:51:24', '2022-07-06 21:51:24'),
(783, 'latitude', '25.267667', 'app', '2022-07-06 21:51:24', '2022-07-06 21:51:24'),
(784, 'longitude', '51.408937', 'app', '2022-07-06 21:51:24', '2022-07-06 21:51:24'),
(785, 'facebook_link', 'app_facebook', 'app', '2022-07-06 21:51:24', '2022-07-06 21:51:24'),
(786, 'twitter_link', 'app_twitter', 'app', '2022-07-06 21:51:24', '2022-07-06 21:51:24'),
(787, 'instagram_link', 'app_instagram', 'app', '2022-07-06 21:51:24', '2022-07-06 21:51:24'),
(788, 'linkedin_link', 'app_linkedin', 'app', '2022-07-06 21:51:24', '2022-07-06 21:51:24'),
(809, 'theme', 'dark-mode', 'admin', '2022-08-13 22:28:00', '2022-08-13 22:28:00'),
(810, 'aside_menu', 'dark-menu', 'admin', '2022-08-13 22:28:00', '2022-08-13 22:28:00'),
(811, 'header_menu', 'dark-header', 'admin', '2022-08-13 22:28:00', '2022-08-13 22:28:00'),
(812, 'aside_menu_style', 'sideicon-menu', 'admin', '2022-08-13 22:28:00', '2022-08-13 22:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `target` enum('url','category','worker') DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `worker_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `url`, `target`, `order`, `category_id`, `worker_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Odio saepe facere voluptas excepturi. updaed', 'Veniam eos dolorem iste architecto ratione sunt. Ea nisi vitae facilis omnis nulla excepturi. Molestiae laboriosam quis soluta eos eaque. Ipsam dicta praesentium consequuntur ut at. updaed', 'admin-panel/users/mrjZna8L0k7av7zKdlousDyN1duzzE5j381JkM3b.jpg', 'https://www.sawayn.com/eum-quia-impedit-ut-ratione-possimus-nihil-eos updaed', 'url', 0, NULL, NULL, 1, '2022-06-18 01:00:54', '2022-06-27 22:36:42'),
(2, 'Assumenda quia minus explicabo facilis quis voluptas sit necessitatibus.', 'Quia consequatur voluptas culpa iste deleniti perspiciatis. Est qui maiores aut explicabo. Ut minima illo numquam aliquid eos.', 'admin-panel/users/TtNuAJwZ69XLDmU61MXDDsXpFkSNufFDJzUhZGgx.jpg', 'http://www.casper.com/autem-voluptatem-facilis-repellat-consequuntur.html', 'url', 0, NULL, NULL, 1, '2022-06-18 01:00:54', '2022-06-27 23:12:38'),
(3, 'Dicta libero reiciendis perferendis.', 'Sed neque sed quia voluptatem qui eius impedit. Neque culpa neque laudantium repellat cum aliquid.', 'admin-panel/users/cR30L7PgzyIeVMPZ1wQ9adMx1g202asIEDDf4w4Y.jpg', 'http://hyatt.com/nostrum-et-et-facilis-dolor-eius-magnam-aut-non', 'url', 0, NULL, NULL, 1, '2022-06-18 01:00:54', '2022-06-27 23:12:43'),
(4, 'Quia facilis et molestiae.', 'Voluptatem at alias voluptas odit nihil aut. Est quasi a eveniet voluptatem qui. Ipsum et minima quam iure.', 'admin-panel/users/qePnyKkyGIMVKQapkWMYsUImCn3lCATOOnkitLBS.jpg', 'http://blanda.com/asperiores-ut-iusto-assumenda-incidunt', 'url', 0, NULL, NULL, 1, '2022-06-18 01:00:54', '2022-06-27 23:12:48'),
(5, 'Dolor assumenda illum est odio inventore.', 'Est et inventore possimus. Qui accusamus voluptatem dicta minus. Earum nostrum aut illo quod dolores est molestiae.', 'admin-panel/users/fnrtSbIBMTK1QhV5clNFGjwx97PYjcrnLHVujGOB.jpg', 'http://braun.com/', 'url', 0, NULL, NULL, 1, '2022-06-18 01:00:54', '2022-06-27 23:13:02'),
(8, 'سائق VIP', 'سائق VIPسائق VIPسائق VIPسائق VIPسائق VIP', 'admin-panel/slider/npyLdr3hxqYRZFuBbVAX9Hq9MeJpCv5puozdoHSC.jpg', NULL, NULL, 0, NULL, NULL, 1, '2022-07-06 21:03:17', '2022-07-06 21:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'الدوحة', 1, '2022-05-28 12:00:09', '2022-05-28 12:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `mobile` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `zone` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `provider` varchar(191) DEFAULT NULL,
  `social_id` varchar(191) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `mobile`, `email_verified_at`, `image`, `state_id`, `zone`, `street`, `provider`, `social_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'fahd', 'fahd@gmail.com', 1, '0100552512515', NULL, 'admin-panel/system/users/BkSqRWOQuW0Y8uZvUhBOcKWt8hIXtXGsvWQFiXZA.gif', 1, 'qatrer', 'qatrer', NULL, NULL, '$2y$10$szjfa0GaPlbRYJg6iIycGOJwrqXgsVWx6f7BJZm2Qoq7Ak2hcQKG.', NULL, '2022-06-07 07:52:42', '2022-06-07 15:49:48'),
(2, 'DeveloperEssam', 'developer.essam@gmail.com', 1, '01000709271', NULL, 'admin-panel/users/t0jUOcvbdxww5qeIHP4FY3dKEA7thYNJmKfqIl2E.jpg', 1, 'Domitta', '123 street example', NULL, NULL, '$2y$10$vKfKkHfbnwI2XRVWLuiHw.wNA.ZtH5Ezs5hWtEye3iGHzd0RNHSRW', NULL, '2022-06-18 03:37:41', '2022-06-28 01:55:35'),
(4, 'eman eng', 'developer.essam2@gmail.com', 1, '01000709279', NULL, 'admin-panel/users/dp44hOGFQS7A6IgobCEpzk4cOwoFQfKUUt0I4Zbf.jpg', 1, 'bbbnnhb', 'naserr', NULL, NULL, '$2y$10$yvZRFfhmGmHCNtEGZg42/u/dLp5R6VufIjcA/XhXZ2am4ExDapaKu', NULL, '2022-07-01 19:25:31', '2022-07-01 19:33:46'),
(5, 'essammmm', 'hehssjjshssjss@hehejjs.enjsjs', 1, '01000000000', NULL, 'admin-panel/users/Ug7UXaf2qQFNHz2V94FsBlFM5a97Ci0zzm6SRCud.jpg', 1, 'jdjzzz', 'djjdjsjzjsjzzj', NULL, NULL, '$2y$10$YB58f4GJ2E6.J4u5BTD2PuAI7iBzct.eP0MXARIwGIl8jb0tWksmm', NULL, '2022-07-02 00:16:25', '2022-07-02 00:21:09'),
(6, 'essam adel', 'essam@gmail.com', 1, '01000000099', NULL, 'admin-panel/users/Vh18U5JDysEI2RgpKkVHAEf5QVa6zPrJcnli5qFo.jpg', 1, 'gyhhhy', 'ghhhhy', NULL, NULL, '$2y$10$o8MqZA.RUlD5wBfGyp0Ffekf4jJkISG92cASvF.VIxfJwFxYNlHgy', NULL, '2022-07-02 00:37:23', '2022-07-02 00:37:23'),
(7, 'abdallah ayyousha', 'abdo.5e4a@gmail.com', 1, '01095325915', NULL, 'admin-panel/users/nhOBpogWiD2f0dFAslSqYZm35G327L9ECDUDVkkt.png', 1, 'new Damietaa', 'Damietta', NULL, NULL, '$2y$10$lfHrR2fuUeecFMJyvAqfV.5to/Gc7Swbo31YrPaxClSxWCyh8pdJO', NULL, '2022-07-02 05:01:46', '2022-07-05 08:00:59'),
(8, 'DeveloperEssamas', 'developer.esssam@gmail.com', 1, '01000709272', NULL, 'admin-panel/users/RZ1RMcVmmqOtUnUgXjn0SNtnVnBUkPEGUSW3Byco.png', 1, 'Domitta', '123 street example', NULL, NULL, '$2y$10$YnYCGamVbChBPR3hquYiPONAaIMu6F/MokypFTH6gm41C01grn40i', NULL, '2022-07-02 06:26:09', '2022-07-02 06:26:09'),
(9, 'DeveloperEssam', 'developer.essamg@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'facebook', '123456789', NULL, NULL, '2022-07-02 06:29:23', '2022-07-02 06:29:23'),
(10, 'mohamed', 'm.f.keshk@gmail.com', 1, '12345678', NULL, 'admin-panel/users/GyCQT1x3VUI0i2VGUUCPmZDsaA40KGdQi0XKmbLu.jpg', 1, 'jjjhuuuu', 'jjiiiiuy', NULL, NULL, '$2y$10$UsZCdSsSHi1P9UKQKGnBO.3gJW5HXOA9mJPLhe1N/OVDn//URDr5C', NULL, '2022-07-05 07:45:49', '2022-07-06 20:31:13'),
(11, 'محمد', 'm@m.com', 1, '012654566', NULL, 'admin-panel/system/users/H2Sock84Cyh5WwluVqJTbFmLOkaOEVJpDAPhEefx.jpg', 1, 'الدفنة', 'الدفنة', NULL, NULL, '123456789', NULL, '2022-07-06 20:41:37', '2022-07-06 20:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_archives`
--

CREATE TABLE `user_archives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_archives`
--

INSERT INTO `user_archives` (`id`, `user_id`, `title`, `description`, `images`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد،', '[\"userArchive\\/SS65laot8w_service.png\",\"userArchive\\/VrQ8pTcsYd_service.png\",\"userArchive\\/m3nnd0AurX_service.png\"]', '2022-06-07 17:09:21', '2022-06-28 01:06:53'),
(3, 1, 'test', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد،', '[\"userArchive\\/St3rXT6Kex_service.png\",\"userArchive\\/k3z0YLzhPv_service.png\",\"userArchive\\/3zS3dP9tAa_service.png\"]', '2022-06-07 17:23:58', '2022-06-28 01:32:13'),
(5, 2, 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum efficitur luctus augue, vulputate interdum turpis tempor a.', '[\"userArchive\\/jWF7Zbt8Yt_service.png\",\"userArchive\\/oGEkbNpC4d_service.png\"]', '2022-06-28 18:45:24', '2022-06-28 18:45:24'),
(6, 10, 'صورة البطاقة', 'صورة البطاقة', '[\"userArchive\\/3w8Ar5ACam_service.png\"]', '2022-07-06 20:37:29', '2022-07-06 20:37:29');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` bigint(20) NOT NULL,
  `experience` int(11) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `marital_status` enum('single','divorced','married') NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `no_of_children` varchar(255) NOT NULL,
  `religion` enum('muslim','christian','buddhist','hindu','other') NOT NULL,
  `nationality_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `living_town` varchar(255) NOT NULL,
  `passport_number` varchar(255) NOT NULL,
  `release_date` varchar(255) NOT NULL,
  `expiry_date` varchar(255) NOT NULL,
  `place_of_issue` varchar(255) NOT NULL,
  `scientific_degree` varchar(255) NOT NULL,
  `languages` text NOT NULL,
  `height` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `skin_colour` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `contract_full` varchar(255) NOT NULL,
  `face_image` varchar(255) NOT NULL,
  `worker_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `name`, `dob`, `age`, `experience`, `gender`, `marital_status`, `status`, `no_of_children`, `religion`, `nationality_id`, `category_id`, `place_of_birth`, `living_town`, `passport_number`, `release_date`, `expiry_date`, `place_of_issue`, `scientific_degree`, `languages`, `height`, `weight`, `skin_colour`, `salary`, `contract_full`, `face_image`, `worker_image`, `created_at`, `updated_at`) VALUES
(3, 'reda ashraf', '1996-06-26', 26, 6, 'male', 'single', 0, '3', 'muslim', 1, 1, 'مصر', 'المنصوره', '06161616100606061', '05/04/2022', '05/22/2022', 'مصر', 'دبلوم', '[\"arabic\",\"english\"]', '170', '70', 'اسود', '2000', '2', 'admin-panel/users/cvI5cnOQSt9jCieURAMgKtmhRWsCxDTGYoxgSnmX.jpg', 'admin-panel/users/u3Z5jULY0UW4IDHwBiUbHTzzGKly0qWGCHpujWaU.jpg', '2022-05-29 09:39:06', '2022-06-27 12:05:53'),
(4, 'ibrahim Elsordi', '1996-06-26', 26, 5, 'male', 'divorced', 1, '6', 'hindu', 1, 1, 'مصر', 'دمياط', '0106491061616155', '05/04/2022', '05/10/2022', 'اسرائيل', 'دبلوم', '[\"arabic\",\"english\"]', '180', '80', 'أسود', '5000', '24', 'admin-panel/users/W7wVhPZ2XnRyrFy4EGySzrfJUi1lPizSPEjV1aRR.jpg', 'admin-panel/users/iC9VjhJOgvC9sqcfQU9hpMGWHFD08u6c16m4FDRg.jpg', '2022-05-29 09:43:22', '2022-06-27 12:05:54'),
(6, 'محمد', '2022-07-13', 0, 2, 'female', 'married', 0, '2', 'muslim', 6, 8, 'الفلبين', 'الفلبين', '356465', '2001-07-10', '2022-07-20', 'الفلبين', 'جامعى', '[\"arabic\",\"english\"]', '160', '90', 'ابيض', '2', '30', 'admin-panel/worker/dxyMxQJOc9gFcADfexTxyDxLReGC9UZ8pYYW3hGW.jpg', 'admin-panel/worker/PGRV5QcaW7gSnHCc4taB6cW2RGIdU4hbFISesK7H.jpg', '2022-07-06 21:24:27', '2022-07-06 21:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `worker_archives`
--

CREATE TABLE `worker_archives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `worker_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `worker_archives`
--

INSERT INTO `worker_archives` (`id`, `worker_id`, `title`, `description`, `images`, `created_at`, `updated_at`) VALUES
(1, 4, 'tes', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &amp;amp;amp;#039;Content here, content here&amp;amp;amp;#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &amp;amp;amp;#039;lorem ipsum&amp;amp;amp;#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '[\"workerArchives\\/L2SFQhsIob_service.png\",\"workerArchives\\/F2TgE8Keu0_service.png\"]', '2022-06-06 18:01:45', '2022-06-22 03:17:00'),
(2, 4, 'test', 'test', '[\"workerArchives\\/ouVuZtd83m_service.png\",\"workerArchives\\/VW9kqZcGDs_service.png\",\"workerArchives\\/lAxBFEpZSU_service.png\",\"workerArchives\\/K3nAH24tE1_service.png\"]', '2022-06-06 18:59:52', '2022-06-06 18:59:52'),
(3, 4, 'test', 'test', '[\"workerArchives\\/TC7tShcAzv_service.png\",\"workerArchives\\/yoOORA3VZN_service.png\",\"workerArchives\\/EklHrBZhY2_service.png\",\"workerArchives\\/pd2sEUfwQT_service.png\"]', '2022-06-06 19:03:19', '2022-06-06 19:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `worker_experiences`
--

CREATE TABLE `worker_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `worker_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nationality_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `worker_experiences`
--

INSERT INTO `worker_experiences` (`id`, `worker_id`, `nationality_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(3, 4, 1, '2015-06-04', '2018-06-07', NULL, NULL),
(4, 4, 3, '2015-06-04', '2018-06-07', NULL, NULL),
(9, 3, 5, '2015-06-04', '2018-06-07', '2022-06-28 01:41:47', '2022-06-28 01:41:47'),
(10, 3, 1, '2019-06-13', '2021-06-09', '2022-06-28 01:41:47', '2022-06-28 01:41:47'),
(11, 3, 1, '2022-06-21', '2022-06-13', '2022-06-28 01:41:47', '2022-06-28 01:41:47'),
(12, 3, 1, '2022-06-06', '2022-06-06', '2022-06-28 01:41:47', '2022-06-28 01:41:47'),
(13, 6, 6, '2022-07-11', '2022-07-11', '2022-07-06 21:24:27', '2022-07-06 21:24:27'),
(14, 6, 3, '2022-07-11', '2022-07-10', '2022-07-06 21:24:27', '2022-07-06 21:24:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_mobile_unique` (`mobile`);

--
-- Indexes for table `admin_settings`
--
ALTER TABLE `admin_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_worker`
--
ALTER TABLE `category_worker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_worker_category_id_foreign` (`category_id`),
  ADD KEY `category_worker_worker_id_foreign` (`worker_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_favoriteable_type_favoriteable_id_index` (`favoriteable_type`,`favoriteable_id`),
  ADD KEY `favorites_user_id_index` (`user_id`);

--
-- Indexes for table `laravel_logger_activity`
--
ALTER TABLE `laravel_logger_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationality_process_steps`
--
ALTER TABLE `nationality_process_steps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationality_steps`
--
ALTER TABLE `nationality_steps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`);

--
-- Indexes for table `order_archives`
--
ALTER TABLE `order_archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_notes`
--
ALTER TABLE `order_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_processes`
--
ALTER TABLE `order_processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD UNIQUE KEY `password_resets_email_unique` (`email`),
  ADD KEY `password_resets_mobile_index` (`mobile`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD KEY `users_state_id_foreign` (`state_id`);

--
-- Indexes for table `user_archives`
--
ALTER TABLE `user_archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workers_nationality_id_foreign` (`nationality_id`);

--
-- Indexes for table `worker_archives`
--
ALTER TABLE `worker_archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worker_experiences`
--
ALTER TABLE `worker_experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `worker_experiences_worker_id_foreign` (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_settings`
--
ALTER TABLE `admin_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category_worker`
--
ALTER TABLE `category_worker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `laravel_logger_activity`
--
ALTER TABLE `laravel_logger_activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nationality_process_steps`
--
ALTER TABLE `nationality_process_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nationality_steps`
--
ALTER TABLE `nationality_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `order_archives`
--
ALTER TABLE `order_archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_notes`
--
ALTER TABLE `order_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_processes`
--
ALTER TABLE `order_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=813;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_archives`
--
ALTER TABLE `user_archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `worker_archives`
--
ALTER TABLE `worker_archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `worker_experiences`
--
ALTER TABLE `worker_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_worker`
--
ALTER TABLE `category_worker`
  ADD CONSTRAINT `category_worker_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_worker_worker_id_foreign` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `workers_nationality_id_foreign` FOREIGN KEY (`nationality_id`) REFERENCES `nationalities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `worker_experiences`
--
ALTER TABLE `worker_experiences`
  ADD CONSTRAINT `worker_experiences_worker_id_foreign` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
