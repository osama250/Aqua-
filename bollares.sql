-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 03:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bollares`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `created_at`, `updated_at`) VALUES
(1, '2023-08-01 07:06:22', '2023-08-01 04:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `about_us_translations`
--

CREATE TABLE `about_us_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_us_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `seo` varchar(255) NOT NULL,
  `keywords` varchar(225) NOT NULL,
  `focus_keyword` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us_translations`
--

INSERT INTO `about_us_translations` (`id`, `about_us_id`, `locale`, `title`, `description`, `seo`, `keywords`, `focus_keyword`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Who is Bollaris', '<ol><li>booking Enginge</li><li>book with us</li></ol>', 'Laborum Atque eiusm', 'Nisi perspiciatis n', 'Temporibus dolores v', '2023-08-01 08:05:41', '2023-08-14 05:52:32'),
(2, 1, 'ar', 'من نحن', '<ol><li>موقع حجز</li><li>احجز معنا</li></ol>', '', '', '', '2023-08-01 08:05:41', '2023-08-01 09:09:16'),
(3, 1, 'es', 'Omnis qui soluta ut', '<ol><li>Reserva Enginge</li><li>\r\nreserva con nosotros</li></ol>', 'Voluptate dolores fa', 'Id aut vitae non te', 'Minus tempora dolore', '2023-08-07 04:09:32', '2023-08-14 05:52:14'),
(4, 1, 'pt', 'Quasi adipisci culpa', '<ol><li>motor de reservas</li><li>\r\nreserve conosco</li></ol>', 'Est labore eaque nih', 'Laboris sunt omnis', 'Delectus eaque exce', '2023-08-07 04:09:32', '2023-08-14 05:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `additional_trips`
--

CREATE TABLE `additional_trips` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `additional_trips`
--

INSERT INTO `additional_trips` (`id`, `price`, `img`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 600.00, 'Admins/iAgw8Q7xYanOvzmG5qardd0gDOu0iUZ8vpGJpbBO.jpg', '2023-08-21 11:11:30', '2023-08-21 11:11:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `additional_trip_translations`
--

CREATE TABLE `additional_trip_translations` (
  `trans_id` int(10) UNSIGNED NOT NULL,
  `additional_trip_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `additional_trip_translations`
--

INSERT INTO `additional_trip_translations` (`trans_id`, `additional_trip_id`, `locale`, `name`, `location`, `details`) VALUES
(9, 3, 'en', 'Engkish', 'Cairo', 'Testing'),
(10, 3, 'es', 'Spain', 'Spain', 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bollares', 'bollars-admin@email.com', NULL, '$2y$10$eN2p5kNxVBrbfPPtvUkjieF18uVEW4F.96cPdkMixMV52.BZKoYFa', NULL, '2023-07-17 08:15:44', '2023-07-17 08:15:44'),
(2, 'Admin', 'admin@email.com', NULL, '$2y$10$UpCtDjG6Bf3mBDd0Bvjcnu2vAthxexAlyDHpwInYw4XRconVUCD2W', NULL, '2023-08-13 06:45:43', '2023-08-13 06:45:43'),
(3, 'editor', 'editor@email.com', NULL, '$2y$10$VHuFiRfD8i3fjYU6Ty9ImufSfGF6Ewdks5Kx1.xmy5g1vlIIleGGG', NULL, '2023-08-13 06:46:18', '2023-08-13 06:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `title` text NOT NULL,
  `subject` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `title`, `subject`, `created_at`, `updated_at`) VALUES
(1, 'M Mohsen', 'm.mohsen@gmail.com', '01111111111', 'title', 'this is subject', '2023-08-07 05:42:13', '2023-08-07 05:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, '2023-08-16 09:18:52', '2023-08-16 09:18:52', NULL),
(5, '2023-08-16 09:47:53', '2023-08-16 09:52:36', '2023-08-16 09:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `country_translations`
--

CREATE TABLE `country_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_translations`
--

INSERT INTO `country_translations` (`id`, `country_id`, `locale`, `name`) VALUES
(1, 4, 'en', 'Egypt'),
(2, 4, 'es', 'Egypt edit'),
(3, 4, 'pt', 'Egypt edit'),
(4, 5, 'en', 'Test'),
(5, 5, 'es', 'Test'),
(6, 5, 'pt', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `limit` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1',
  `value` int(11) NOT NULL,
  `type` enum('1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `limit`, `remaining`, `start_date`, `end_date`, `status`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'xdW', 5, 5, '2023-08-23', '2023-12-01', '1', 25, '1', '2023-08-02 04:39:06', '2023-08-13 03:58:27'),
(3, 'Madeson Carroll', 20, 10, '2023-08-03', '2023-08-15', '1', 50, '2', '2023-08-02 05:50:44', '2023-08-13 04:02:56'),
(4, 'Karyn Murray', 81, 81, '1994-08-17', '1990-08-28', '1', 54, '1', '2023-08-13 04:00:57', '2023-08-13 04:00:57'),
(5, 'Nathaniel Colon', 21, 21, '1989-08-16', '1990-08-25', '1', 47, '2', '2023-08-13 04:01:52', '2023-08-13 04:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `decks`
--

CREATE TABLE `decks` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `decks`
--

INSERT INTO `decks` (`id`, `file`, `created_at`, `updated_at`) VALUES
(15, 'Admins/iAgw8Q7xYanOvzmG5qardd0gDOu0iUZ8vpGJpbBO.jpg', '2023-08-20 06:12:10', '2023-08-20 06:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `deck_translations`
--

CREATE TABLE `deck_translations` (
  `trans_id` int(10) UNSIGNED NOT NULL,
  `deck_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deck_translations`
--

INSERT INTO `deck_translations` (`trans_id`, `deck_id`, `locale`, `title`, `content`) VALUES
(39, 15, 'en', 'Test Decks Edit', 'asd Edit&nbsp; And Edit&nbsp;'),
(40, 15, 'es', 'Test Decks Edit', 'Test Decks&nbsp;'),
(41, 15, 'pt', 'Test Decks Edit', 'Test Decks&nbsp;');

-- --------------------------------------------------------

--
-- Table structure for table `facilites`
--

CREATE TABLE `facilites` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_photo` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilites`
--

INSERT INTO `facilites` (`id`, `main_photo`, `created_at`, `updated_at`) VALUES
(4, '1691492271.LOGO-01.png', '2023-08-08 07:44:54', '2023-08-08 07:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `facilite_photos`
--

CREATE TABLE `facilite_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facilite_id` int(10) UNSIGNED NOT NULL,
  `photo` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilite_photos`
--

INSERT INTO `facilite_photos` (`id`, `facilite_id`, `photo`, `created_at`, `updated_at`) VALUES
(16, 4, '1691492215.success1.png', '2023-08-08 07:56:58', '2023-08-08 07:56:58'),
(17, 4, '1691492215.news1.png', '2023-08-08 07:56:59', '2023-08-08 07:56:59'),
(18, 4, '1691492245.football1.png', '2023-08-08 07:57:53', '2023-08-08 07:57:53'),
(19, 4, '1691498595.news-reporter1.png', '2023-08-08 09:43:17', '2023-08-08 09:43:17'),
(20, 4, '1691498609.trophy(1)1.png', '2023-08-08 09:43:30', '2023-08-08 09:43:30'),
(21, 4, '1691498647.default.png', '2023-08-08 09:44:09', '2023-08-08 09:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `facilite_translations`
--

CREATE TABLE `facilite_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facilite_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilite_translations`
--

INSERT INTO `facilite_translations` (`id`, `facilite_id`, `locale`, `title`, `description`, `created_at`, `updated_at`) VALUES
(10, 4, 'en', 'Voluptatibus dolor easd edit', 'Dolore totam dolorem.asda edit', '2023-08-08 07:44:54', '2023-08-08 07:57:53'),
(11, 4, 'es', 'Natus quia asperioreasd edit', 'Ad qui ut optio, nat.asda edit', '2023-08-08 07:44:54', '2023-08-08 07:57:53'),
(12, 4, 'pt', 'asdasd edit', 'Ex eius culpa, anim .asd edit', '2023-08-08 07:44:54', '2023-08-08 07:57:53');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `photo`, `created_at`, `updated_at`) VALUES
(44, '1691326769.LOGO-01.png', '2023-08-06 09:59:29', '2023-08-06 09:59:29'),
(46, '1691391982.LOGO-04.png', '2023-08-07 04:06:22', '2023-08-07 04:06:22'),
(63, '1691658700.social-media(1)1.png', '2023-08-10 06:11:41', '2023-08-10 06:11:41'),
(64, '1691658701.success1.png', '2023-08-10 06:11:41', '2023-08-10 06:11:41'),
(66, '1691658708.news1.png', '2023-08-10 06:11:48', '2023-08-10 06:11:48'),
(68, '1691658709.football1.png', '2023-08-10 06:11:49', '2023-08-10 06:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(2, 'Key', 'Value', NULL, NULL),
(3, 'Info Testing Update', 'Test Only Again', '2023-08-17 05:18:31', '2023-08-17 05:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `itineraries`
--

CREATE TABLE `itineraries` (
  `id` int(10) UNSIGNED NOT NULL,
  `trip_category_id` int(10) UNSIGNED NOT NULL,
  `day` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itineraries`
--

INSERT INTO `itineraries` (`id`, `trip_category_id`, `day`, `created_at`, `updated_at`) VALUES
(1, 6, 7, '2023-08-22 07:31:30', '2023-08-22 07:31:30'),
(2, 5, 1, '2023-08-22 09:31:02', '2023-08-22 09:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary_details`
--

CREATE TABLE `itinerary_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `itinerary_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itinerary_details`
--

INSERT INTO `itinerary_details` (`id`, `itinerary_id`, `created_at`, `updated_at`) VALUES
(5, 2, '2023-08-22 09:49:12', '2023-08-22 09:49:12'),
(7, 1, '2023-08-22 10:07:00', '2023-08-22 10:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary_detail_translations`
--

CREATE TABLE `itinerary_detail_translations` (
  `trans_id` int(10) UNSIGNED NOT NULL,
  `itinerary_detail_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(2) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itinerary_detail_translations`
--

INSERT INTO `itinerary_detail_translations` (`trans_id`, `itinerary_detail_id`, `locale`, `text`) VALUES
(10, 5, 'en', 'Add ItineraryDetails'),
(11, 5, 'es', 'ItineraryDetails'),
(12, 5, 'pt', 'ItineraryDetails'),
(16, 7, 'en', 'Add ItineraryDetails  again'),
(17, 7, 'es', 'Add ItineraryDetails  again'),
(18, 7, 'pt', 'Add ItineraryDetails  again');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'Metas update', '2023-08-17 06:23:03', '2023-08-17 06:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `meta_translations`
--

CREATE TABLE `meta_translations` (
  `trans_id` int(10) UNSIGNED NOT NULL,
  `meta_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `keywords` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meta_translations`
--

INSERT INTO `meta_translations` (`trans_id`, `meta_id`, `locale`, `title`, `description`, `keywords`) VALUES
(10, 4, 'en', 'Metas update', 'play', 'Metas update'),
(11, 4, 'es', 'Metas update', 'play', 'Metas update'),
(12, 4, 'pt', 'Metas update', 'play', 'Metas update');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_17_105828_create_admins_table', 1),
(6, '2023_07_18_071923_create_permission_tables', 2),
(10, '2023_08_01_122448_create_social_media_table', 4),
(11, '2023_08_01_131054_create_coupons_table', 5),
(12, '2023_08_03_091155_create_sliders_table', 6),
(13, '2023_08_06_060910_create_settings_table', 7),
(14, '2023_08_06_073547_create_setting_translations_table', 8),
(15, '2023_08_06_082518_create_galleries_table', 9),
(16, '2023_08_07_072835_create_contact_us_table', 10),
(17, '2023_08_07_100259_create_pages_table', 11),
(18, '2023_08_07_100342_create_page_translations_table', 12),
(20, '2023_08_08_060743_create_facilites_table', 13),
(21, '2023_08_08_060825_create_facilite_photos_table', 14),
(22, '2023_08_08_061549_create_facilite_translations_table', 15),
(23, '2023_08_08_110724_create_side_seeings_table', 16),
(24, '2023_08_08_110804_create_side_seeing_photos_table', 17),
(25, '2023_08_08_111422_create_side_seeing_translations_table', 18),
(26, '2023_08_13_100124_create_slider_translations_table', 19),
(27, '2023_08_14_091553_create_subscribers_table', 20),
(28, '2023_08_14_111524_create_newsletters_table', 21),
(29, '2023_08_14_113737_create_jobs_table', 22),
(30, '2023_08_16_094038_create_countries_table', 23),
(32, '2023_08_16_114626_create_country_translations_table', 24),
(33, '2023_08_16_134500_create_metas_table', 25),
(34, '2023_08_16_180944_create_meta_translations_table', 25),
(35, '2023_08_17_064912_create_infos_table', 26),
(36, '2023_08_17_101948_create_decks_table', 27),
(37, '2023_08_17_104818_create_deck_translations_table', 28),
(38, '2023_08_19_174156_create_partners_table', 29),
(39, '2023_08_20_094628_create_trip_categories_table', 30),
(40, '2023_08_20_101539_create_trip_category_translations_table', 31),
(41, '2023_08_20_130338_create_trips_table', 32),
(42, '2023_08_21_071606_create_reservations_table', 33),
(43, '2023_08_21_095043_create_additional_trips_table', 34),
(44, '2023_08_21_100806_create_additional_trip_translations_table', 35),
(45, '2023_08_22_072135_create_itineraries_table', 36),
(46, '2023_08_22_095620_create_itinerary_details_table', 37),
(47, '2023_08_22_103038_create_itineraries_table', 38),
(48, '2023_08_22_103233_create_itinerary_details_table', 39),
(49, '2023_08_22_103340_create_itinerary_detail_translations_table', 40);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(2, 'App\\Models\\Admin', 2),
(4, 'App\\Models\\Admin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Et quia sit incidunt', 'Molestias esse sequi. ff', '2023-08-14 10:07:11', '2023-08-14 10:07:11'),
(2, 'Rerum sit sit labore f', 'Velit, sapiente labo. f', '2023-08-14 10:11:44', '2023-08-14 10:11:44'),
(3, 'Enim accusantium num f', 'Molestias minima vol. f', '2023-08-14 10:19:08', '2023-08-14 10:19:08'),
(4, 'Corporis dolore eius d', 'Quis ut eius est cup. d', '2023-08-14 10:26:29', '2023-08-14 10:26:29'),
(5, 'Adipisicing in ut qu f', 'Veniam, error aute s. f', '2023-08-14 10:30:56', '2023-08-14 10:30:56'),
(6, 'Totam id magnam nec f', 'Quis quia labore qua. f', '2023-08-14 10:32:18', '2023-08-14 10:32:18'),
(7, 'Recusandae Sunt ven f', 'Aliqua. Rerum debiti. f', '2023-08-14 10:37:34', '2023-08-14 10:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `created_at`, `updated_at`) VALUES
(2, '2023-08-07 09:28:56', '2023-08-07 09:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` longtext NOT NULL,
  `description` longtext NOT NULL,
  `seo` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_translations`
--

INSERT INTO `page_translations` (`id`, `page_id`, `locale`, `title`, `description`, `seo`, `created_at`, `updated_at`) VALUES
(4, 2, 'en', 'Consequatur Reprehe', 'haitham Test', 'Qui non tempore ali', '2023-08-07 09:28:57', '2023-08-17 06:39:48'),
(5, 2, 'es', 'Eaque provident dol', 'haitham', 'Excepteur omnis in m', '2023-08-07 09:28:57', '2023-08-07 09:28:57'),
(6, 2, 'pt', 'Eum est vel laborio', 'haitham', 'Minus laborum Dolor', '2023-08-07 09:28:57', '2023-08-07 09:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `photo`, `url`, `created_at`, `updated_at`) VALUES
(4, 'Admins/3cerzo8dihyxVmVr1BQB0s12FmSAAtzasU8cY7Q6.jpg', 'https://www.youtube.com/watch?v=sPCCghdj9UE', '2023-08-21 08:57:17', '2023-08-21 08:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'View Admins', 'web', '2023-07-31 10:26:41', '2023-07-31 10:30:17'),
(2, 'Add Admin', 'web', '2023-07-31 10:27:05', '2023-07-31 10:27:05'),
(3, 'Edit Admin', 'web', '2023-07-31 10:27:21', '2023-07-31 10:27:21'),
(4, 'Delete Admin', 'web', '2023-07-31 10:27:31', '2023-07-31 10:27:31'),
(5, 'View Roles', 'web', '2023-07-31 10:27:52', '2023-07-31 10:27:52'),
(6, 'Add Role', 'web', '2023-07-31 10:28:01', '2023-07-31 10:28:01'),
(7, 'Edit Role', 'web', '2023-07-31 10:28:09', '2023-07-31 10:28:09'),
(8, 'Delete Role', 'web', '2023-07-31 10:28:18', '2023-07-31 10:28:18'),
(9, 'View Aboutus', 'web', '2023-08-01 03:42:34', '2023-08-01 03:42:34'),
(11, 'Edit Aboutus', 'web', '2023-08-01 03:42:59', '2023-08-01 03:42:59'),
(13, 'View Social', 'web', '2023-08-01 09:31:46', '2023-08-01 09:31:46'),
(14, 'Add Social', 'web', '2023-08-01 09:32:06', '2023-08-01 09:32:06'),
(15, 'Edit Social', 'web', '2023-08-01 09:32:15', '2023-08-01 09:32:15'),
(16, 'Delete Social', 'web', '2023-08-01 09:32:32', '2023-08-01 09:32:32'),
(17, 'View Coupon', 'web', '2023-08-01 10:14:25', '2023-08-01 10:14:25'),
(18, 'Add Coupon', 'web', '2023-08-01 10:14:36', '2023-08-01 10:14:36'),
(19, 'Edit Coupon', 'web', '2023-08-01 10:14:47', '2023-08-01 10:14:47'),
(20, 'Delete Coupon', 'web', '2023-08-01 10:15:00', '2023-08-01 10:15:00'),
(21, 'View User', 'web', '2023-08-02 07:08:33', '2023-08-02 07:08:33'),
(23, 'Edit User', 'web', '2023-08-02 07:08:53', '2023-08-02 07:08:53'),
(25, 'View Slider', 'web', '2023-08-03 06:15:00', '2023-08-03 06:15:00'),
(26, 'Add Slider', 'web', '2023-08-03 06:15:11', '2023-08-03 06:15:11'),
(27, 'Edit Slider', 'web', '2023-08-03 06:15:22', '2023-08-03 06:15:22'),
(28, 'Delete Slider', 'web', '2023-08-03 06:15:34', '2023-08-03 08:12:33'),
(29, 'Send Email', 'web', '2023-08-03 09:23:45', '2023-08-03 09:23:45'),
(30, 'Edit Setting', 'web', '2023-08-06 03:18:47', '2023-08-06 03:18:47'),
(31, 'View Gallery', 'web', '2023-08-06 05:30:09', '2023-08-06 05:30:09'),
(32, 'Add Gallery', 'web', '2023-08-06 05:30:20', '2023-08-06 05:30:20'),
(34, 'Delete Gallery', 'web', '2023-08-06 05:37:25', '2023-08-06 05:37:25'),
(35, 'View Messages', 'web', '2023-08-07 05:45:07', '2023-08-13 02:59:19'),
(40, 'View Facilite', 'web', '2023-08-08 03:11:27', '2023-08-08 03:11:27'),
(41, 'Add Facilite', 'web', '2023-08-08 03:11:42', '2023-08-08 03:11:42'),
(42, 'Edit Facilite', 'web', '2023-08-08 03:12:03', '2023-08-08 03:12:03'),
(43, 'Delete Facilite', 'web', '2023-08-08 03:12:30', '2023-08-08 03:12:30'),
(44, 'View SideSeeing', 'web', '2023-08-08 08:30:36', '2023-08-08 08:30:36'),
(45, 'Add SideSeeing', 'web', '2023-08-08 08:30:48', '2023-08-08 08:30:48'),
(46, 'Edit SideSeeing', 'web', '2023-08-08 08:31:02', '2023-08-08 08:31:02'),
(47, 'Delete SideSeeing', 'web', '2023-08-08 08:31:14', '2023-08-08 08:31:14'),
(49, 'View Subscriber', 'web', '2023-08-14 06:38:42', '2023-08-14 06:38:42'),
(50, 'View Newsletter', 'web', '2023-08-14 08:19:07', '2023-08-14 08:19:07'),
(51, 'Add Newsletter', 'web', '2023-08-14 08:19:19', '2023-08-14 08:19:19'),
(56, 'View Countries', 'web', '2023-08-16 04:32:55', '2023-08-16 04:32:55'),
(57, 'Add Countries', 'web', '2023-08-16 04:33:10', '2023-08-16 04:33:10'),
(58, 'Edit Countries', 'web', '2023-08-16 04:35:50', '2023-08-16 04:35:50'),
(59, 'Delete Countries', 'web', '2023-08-16 04:36:01', '2023-08-16 04:36:01'),
(60, 'View Pages', 'web', '2023-08-16 10:20:32', '2023-08-16 10:20:32'),
(61, 'Add Pages', 'web', '2023-08-16 10:20:43', '2023-08-16 10:20:43'),
(62, 'Edit Pages', 'web', '2023-08-16 10:20:58', '2023-08-16 10:20:58'),
(63, 'Delete Pages', 'web', '2023-08-16 10:21:11', '2023-08-16 10:21:11'),
(64, 'View Metas', 'web', '2023-08-16 15:15:45', '2023-08-16 15:15:45'),
(65, 'Add Metas', 'web', '2023-08-16 15:16:09', '2023-08-16 15:16:09'),
(66, 'Edit Metas', 'web', '2023-08-16 15:16:18', '2023-08-16 15:16:18'),
(67, 'Delete Metas', 'web', '2023-08-16 15:16:28', '2023-08-16 15:16:28'),
(68, 'View Infos', 'web', '2023-08-17 03:58:46', '2023-08-17 03:58:46'),
(69, 'Add Infos', 'web', '2023-08-17 03:58:59', '2023-08-17 03:58:59'),
(70, 'Edit Infos', 'web', '2023-08-17 03:59:10', '2023-08-17 03:59:10'),
(71, 'Delete Infos', 'web', '2023-08-17 03:59:20', '2023-08-17 03:59:20'),
(72, 'View Decks', 'web', '2023-08-17 07:28:17', '2023-08-17 07:28:17'),
(73, 'Add Decks', 'web', '2023-08-17 07:28:27', '2023-08-17 07:28:27'),
(74, 'Edit Decks', 'web', '2023-08-17 07:28:37', '2023-08-17 07:28:37'),
(75, 'Delete Decks', 'web', '2023-08-17 07:28:47', '2023-08-17 07:28:47'),
(76, 'View Partner', 'web', '2023-08-19 17:54:52', '2023-08-19 17:54:52'),
(77, 'Add Partner', 'web', '2023-08-19 17:54:52', '2023-08-19 17:54:52'),
(78, 'Edit Partner', 'web', '2023-08-19 17:55:44', '2023-08-19 17:55:44'),
(79, 'Delete Partner', 'web', '2023-08-19 17:55:44', '2023-08-19 17:55:44'),
(80, 'View TripCategory', 'web', '2023-08-20 09:50:12', '2023-08-20 09:50:12'),
(81, 'Add TripCategory', 'web', '2023-08-20 09:50:12', '2023-08-20 09:50:12'),
(82, 'Edit TripCategory', 'web', '2023-08-20 09:51:16', '2023-08-20 09:51:16'),
(83, 'Delete TripCategory', 'web', '2023-08-20 09:51:16', '2023-08-20 09:51:16'),
(84, 'View Trips', 'web', '2023-08-20 13:12:02', '2023-08-20 13:12:02'),
(85, 'Add Trips', 'web', '2023-08-20 13:12:02', '2023-08-20 13:12:02'),
(86, 'Edit Trips', 'web', '2023-08-20 13:12:38', '2023-08-20 13:12:38'),
(87, 'Delete Trips', 'web', '2023-08-20 13:12:38', '2023-08-20 13:12:38'),
(88, 'View Reservation', 'web', '2023-08-21 07:20:08', '2023-08-21 07:20:08'),
(89, 'Add Reservation', 'web', '2023-08-21 07:20:08', '2023-08-21 07:20:08'),
(90, 'Edit Reservation', 'web', '2023-08-21 07:21:33', '2023-08-21 07:21:33'),
(91, 'Delete Reservation', 'web', '2023-08-21 07:21:33', '2023-08-21 07:21:33'),
(92, 'View AdditionalTrip', 'web', '2023-08-21 10:01:42', '2023-08-21 10:01:42'),
(93, 'Add AdditionalTrip', 'web', '2023-08-21 10:01:42', '2023-08-21 10:01:42'),
(94, 'Edit AdditionalTrip', 'web', '2023-08-21 10:02:19', '2023-08-21 10:02:19'),
(95, 'Dekete AdditionalTrip', 'web', '2023-08-21 10:02:19', '2023-08-21 10:02:19'),
(96, 'View Itinerary', 'web', '2023-08-22 07:35:01', '2023-08-22 07:35:01'),
(97, 'Add Itinerary', 'web', '2023-08-22 07:35:01', '2023-08-22 07:35:01'),
(98, 'Edit Itinerary', 'web', '2023-08-22 07:35:38', '2023-08-22 07:35:38'),
(99, 'Delete Itinerary', 'web', '2023-08-22 07:35:38', '2023-08-22 07:35:38'),
(100, 'View ItineraryDetail', 'web', '2023-08-22 10:03:21', '2023-08-22 10:03:21'),
(101, 'Add ItineraryDetail', 'web', '2023-08-22 10:03:21', '2023-08-22 10:03:21'),
(102, 'Edit ItineraryDetail', 'web', '2023-08-22 10:04:01', '2023-08-22 10:04:01'),
(103, 'Delete ItineraryDetail', 'web', '2023-08-22 10:04:01', '2023-08-22 10:04:01');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `comment` text DEFAULT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT 'null => pending, 0 => failed, 1 => success',
  `payment_res_code` varchar(255) DEFAULT NULL,
  `payment_res_msg` text DEFAULT NULL,
  `payment_res_full` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `trip_id`, `user_id`, `price`, `comment`, `uuid`, `status`, `payment_res_code`, `payment_res_msg`, `payment_res_full`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 5, 100.00, 'test', '1245 5236', 0, 'null', 'null', 'null', '2023-08-21 07:53:22', '2023-08-21 07:53:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2023-07-31 10:19:00', '2023-07-31 10:19:00'),
(2, 'admin', 'web', '2023-07-31 10:32:58', '2023-07-31 10:32:58'),
(4, 'editor', 'web', '2023-08-13 06:45:05', '2023-08-13 06:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
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
(9, 4),
(11, 1),
(11, 2),
(11, 4),
(13, 1),
(13, 2),
(13, 4),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(15, 4),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(17, 4),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(19, 4),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(21, 4),
(23, 1),
(23, 2),
(23, 4),
(25, 1),
(25, 2),
(25, 4),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(27, 4),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(40, 1),
(40, 2),
(40, 4),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(42, 4),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(44, 4),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(46, 4),
(47, 1),
(47, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_name` text NOT NULL,
  `logo` text NOT NULL,
  `footer_logo` text NOT NULL,
  `location` text NOT NULL,
  `points_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `app_name`, `logo`, `footer_logo`, `location`, `points_price`, `created_at`, `updated_at`) VALUES
(1, 'Bollaris', '1692011444.LOGO-04.png', '1691561099.LOGO-01.png', 'https://www.googlemap.com/lol', 25, '2023-08-06 04:05:49', '2023-08-14 08:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `footer_description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_translations`
--

INSERT INTO `setting_translations` (`id`, `setting_id`, `locale`, `footer_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'ar', '<p><strong>نظام الحجوزات رقم واحد</strong></p>', '2023-08-06 08:03:22', '2023-08-06 05:12:02'),
(2, 1, 'en', '<p><strong>#1 Booking System</strong></p>', '2023-08-06 08:03:22', '2023-08-06 05:12:02'),
(3, 1, 'es', '<p>#1 Sistema de Reservas</p>', '2023-08-06 10:04:25', '2023-08-06 10:04:25'),
(4, 1, 'pt', '<p>#1 Sistema de Reservas</p>', '2023-08-06 10:04:25', '2023-08-06 10:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `side_seeings`
--

CREATE TABLE `side_seeings` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_photo` text NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `side_seeings`
--

INSERT INTO `side_seeings` (`id`, `main_photo`, `price`, `created_at`, `updated_at`) VALUES
(5, '1691498153.LOGO-01.png', 25, '2023-08-08 09:35:55', '2023-08-13 03:10:25'),
(6, '1691907283.blank.jpg', 884, '2023-08-13 03:14:43', '2023-08-13 03:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `side_seeing_photos`
--

CREATE TABLE `side_seeing_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `side_seeing_id` int(10) UNSIGNED NOT NULL,
  `photo` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `side_seeing_photos`
--

INSERT INTO `side_seeing_photos` (`id`, `side_seeing_id`, `photo`, `created_at`, `updated_at`) VALUES
(29, 5, '1691498143.social-media(1)1.png', '2023-08-08 09:35:55', '2023-08-08 09:35:55'),
(30, 5, '1691498144.Gamer_new@3x.png', '2023-08-08 09:35:55', '2023-08-08 09:35:55'),
(31, 5, '1691498149.success1.png', '2023-08-08 09:35:55', '2023-08-08 09:35:55'),
(32, 5, '1691498149.news1.png', '2023-08-08 09:35:55', '2023-08-08 09:35:55'),
(33, 5, '1691498149.news-reporter1.png', '2023-08-08 09:35:56', '2023-08-08 09:35:56'),
(36, 5, '1691498738.default.png', '2023-08-08 09:45:41', '2023-08-08 09:45:41'),
(37, 6, '1691907272.social-media(1)1.png', '2023-08-13 03:14:44', '2023-08-13 03:14:44'),
(38, 6, '1691907273.Gamer_new@3x.png', '2023-08-13 03:14:44', '2023-08-13 03:14:44'),
(39, 6, '1691907278.success1.png', '2023-08-13 03:14:44', '2023-08-13 03:14:44'),
(40, 6, '1691907278.news1.png', '2023-08-13 03:14:44', '2023-08-13 03:14:44'),
(41, 6, '1691907279.news-reporter1.png', '2023-08-13 03:14:44', '2023-08-13 03:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `side_seeing_translations`
--

CREATE TABLE `side_seeing_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `side_seeing_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `long_description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `side_seeing_translations`
--

INSERT INTO `side_seeing_translations` (`id`, `side_seeing_id`, `locale`, `title`, `short_description`, `long_description`, `created_at`, `updated_at`) VALUES
(1, 5, 'en', 'Animi quasi magnam', 'Odit officia unde qu', 'In aute amet, offici.', '2023-08-08 09:35:55', '2023-08-08 09:38:45'),
(2, 5, 'es', 'Sit placeat volupt', 'Assumenda veniam pa', 'Fugiat, eveniet, quo.', '2023-08-08 09:35:55', '2023-08-08 09:38:45'),
(3, 5, 'pt', 'Facere deleniti et s', 'Optio debitis volup', 'Harum iste est accus.', '2023-08-08 09:35:55', '2023-08-08 09:38:45'),
(4, 6, 'en', 'Perspiciatis est ob g', 'Aspernatur labore pe g', 'Recusandae. Temporib. g', '2023-08-13 03:14:43', '2023-08-13 03:14:43'),
(5, 6, 'es', 'Magna necessitatibus g', 'Veniam deserunt qui g', 'Mollit et ea ut volu. g', '2023-08-13 03:14:43', '2023-08-13 03:14:43'),
(6, 6, 'pt', 'Voluptatem quasi pr g', 'Reprehenderit volup g', 'Velit ipsum cupidata. g', '2023-08-13 03:14:43', '2023-08-13 03:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `media` longtext NOT NULL,
  `type` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `media`, `type`, `created_at`, `updated_at`) VALUES
(7, '1691064127.pexels-pixabay-856787-1920x1080-30fps.mp4', 'video', '2023-08-03 08:58:27', '2023-08-03 09:02:07'),
(8, '1691063926.LOGO-01.png', 'image', '2023-08-03 08:58:46', '2023-08-03 08:58:46'),
(10, '1691064039.trophy(1)1.png', 'image', '2023-08-03 09:00:39', '2023-08-03 09:00:39'),
(11, '1691412179.LOGO-04.png', 'image', '2023-08-07 09:42:59', '2023-08-07 09:42:59'),
(12, '1691921826.social-media(1)1.png', 'image', '2023-08-13 07:17:06', '2023-08-13 07:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `slider_translations`
--

CREATE TABLE `slider_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_translations`
--

INSERT INTO `slider_translations` (`id`, `slider_id`, `locale`, `title`, `sub_title`, `created_at`, `updated_at`) VALUES
(1, 12, 'en', 'Laboriosam veritati', 'Qui qui sed consecte', '2023-08-13 07:17:06', '2023-08-13 07:17:06'),
(2, 12, 'es', 'Ab non enim veniam', 'Magna recusandae El', '2023-08-13 07:17:06', '2023-08-13 07:17:06'),
(3, 12, 'pt', 'Voluptatem aut fugit', 'Tempora quidem est r', '2023-08-13 07:17:06', '2023-08-13 07:17:06'),
(4, 10, 'en', NULL, NULL, '2023-08-13 07:26:16', '2023-08-13 07:26:16'),
(5, 10, 'es', NULL, NULL, '2023-08-13 07:26:16', '2023-08-13 07:26:16'),
(6, 10, 'pt', NULL, NULL, '2023-08-13 07:26:16', '2023-08-13 07:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(4, 'Facebook', 'https:/www.facebook.com', '2023-08-01 10:05:54', '2023-08-01 10:06:03'),
(5, 'Twitter', 'http://www.twitter.com', '2023-08-01 10:06:22', '2023-08-01 10:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'user@mail.com', '2023-08-14 06:31:40', '2023-08-14 06:31:40'),
(2, 'user1@mail.com', '2023-08-14 06:34:54', '2023-08-14 06:34:54'),
(3, 'user2@mail.com', '2023-08-14 06:35:02', '2023-08-14 06:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(10) UNSIGNED NOT NULL,
  `trip_category_id` int(10) UNSIGNED NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `cabin_count` tinyint(3) UNSIGNED NOT NULL,
  `suite_count` tinyint(3) UNSIGNED NOT NULL,
  `cabin_available` tinyint(3) UNSIGNED NOT NULL,
  `suite_available` tinyint(3) UNSIGNED NOT NULL,
  `cabin_price` decimal(8,2) NOT NULL COMMENT 'double',
  `suite_price` decimal(8,2) NOT NULL COMMENT 'double',
  `single_cabin_price` decimal(8,2) NOT NULL COMMENT 'single',
  `single_suite_price` decimal(8,2) NOT NULL COMMENT 'single',
  `is_home` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => not in Home, 1 => in Home',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `trip_category_id`, `check_in`, `check_out`, `cabin_count`, `suite_count`, `cabin_available`, `suite_available`, `cabin_price`, `suite_price`, `single_cabin_price`, `single_suite_price`, `is_home`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 5, '2023-08-20', '2023-08-20', 1, 1, 1, 1, 1.00, 1.00, 1.00, 1.00, 0, '2023-08-20 17:22:15', '2023-08-20 17:22:15', NULL),
(3, 6, '2023-08-20', '2023-08-26', 11, 11, 11, 100, 100.00, 1.00, 12.00, 12.00, 0, '2023-08-20 15:28:38', '2023-08-20 15:43:29', NULL),
(4, 6, '2023-08-21', '2023-08-24', 1, 1, 1, 2, 1.00, 1.00, 1.00, 1.00, 0, '2023-08-21 09:09:37', '2023-08-21 09:09:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trip_categories`
--

CREATE TABLE `trip_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) NOT NULL,
  `map` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trip_categories`
--

INSERT INTO `trip_categories` (`id`, `photo`, `map`, `created_at`, `updated_at`) VALUES
(5, 'Admins/NagVikjLFVF5DK7PNKRsMGmm3E343ctrdZSnQZGH.jpg', 'Admins/D0nhLC0DmAh2ge2JQlokfRnMf0fXzFn8WSZaofoP.jpg', '2023-08-20 09:28:47', '2023-08-20 09:28:47'),
(6, 'Admins/SXwoP9wzBAB7XSfuXqsbn7fHIplgi03bgXvME112.jpg', 'Admins/rKbDb5eoEYraZWEMO49JYTrqNi6wLWxuKB4x84gg.jpg', '2023-08-20 14:26:08', '2023-08-20 14:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `trip_category_translations`
--

CREATE TABLE `trip_category_translations` (
  `trans_id` int(10) UNSIGNED NOT NULL,
  `trip_category_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `rate_plan` text NOT NULL,
  `desc` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trip_category_translations`
--

INSERT INTO `trip_category_translations` (`trans_id`, `trip_category_id`, `locale`, `name`, `duration`, `rate_plan`, `desc`, `created_at`, `updated_at`) VALUES
(1, 5, 'en', 'Egypt ', 'Egypt edit', 'Egypt edit\r\n                                Egypt edit\r\n                                Egypt edit\r\n                                Egypt edit', 'Egypt edit\r\n                                Egypt edit\r\n                                Egypt edit\r\n                                Egypt edit', NULL, NULL),
(2, 5, 'es', 'Egypt', 'Egypt edit', 'Egypt edit\r\n                                Egypt edit\r\n                                Egypt edit\r\n                                Egypt edit', 'Egypt edit\r\n                                Egypt edit\r\n                                Egypt edit\r\n                                Egypt edit', NULL, NULL),
(3, 5, 'pt', 'Egypt', 'Egypt edit', 'Egypt edit\r\n                                Egypt edit\r\n                                Egypt edit\r\n                                Egypt edit', 'Egypt edit\r\n                                Egypt edit\r\n                                Egypt edit\r\n                                Egypt edit', NULL, NULL),
(4, 6, 'en', 'Spain', 'Spain', 'Spain', 'Spain', NULL, NULL),
(5, 6, 'es', 'Spain', 'Spain', 'Spain', 'Spain', NULL, NULL),
(6, 6, 'pt', 'Spain', 'Spain', 'Spain', 'Spain', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `reset_code` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `status` enum('1','2') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `code`, `reset_code`, `remember_token`, `points`, `status`, `created_at`, `updated_at`) VALUES
(4, 'M M Osman', 'm.m.osman@gmail.com', '2023-07-30 21:00:00', '$2y$10$sM2oI7KeHWDClkui9y/OR.cO.vijPBeaWEEhmBmBnJzIYlpB9Licq', 116637, 811139, NULL, 0, '2', '2023-07-31 04:21:22', '2023-08-03 09:19:17'),
(5, 'M Mohsen', 'm.mohsen@gmail.com', NULL, '$2y$10$bVSjYLiFF1josrlkJr1NXO71N2/OmmSxbQwMiEdetSycz74y2/FqW', 777287, 280328, NULL, 0, '1', '2023-07-31 10:03:47', '2023-08-09 02:53:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us_translations`
--
ALTER TABLE `about_us_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_us_foreign` (`about_us_id`);

--
-- Indexes for table `additional_trips`
--
ALTER TABLE `additional_trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `additional_trip_translations`
--
ALTER TABLE `additional_trip_translations`
  ADD PRIMARY KEY (`trans_id`),
  ADD UNIQUE KEY `additional_trip_translations_additional_trip_id_locale_unique` (`additional_trip_id`,`locale`),
  ADD KEY `additional_trip_translations_locale_index` (`locale`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_translations`
--
ALTER TABLE `country_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country_translations_country_id_locale_unique` (`country_id`,`locale`),
  ADD KEY `country_translations_locale_index` (`locale`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_name_unique` (`name`);

--
-- Indexes for table `decks`
--
ALTER TABLE `decks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deck_translations`
--
ALTER TABLE `deck_translations`
  ADD PRIMARY KEY (`trans_id`),
  ADD UNIQUE KEY `deck_translations_deck_id_locale_unique` (`deck_id`,`locale`),
  ADD KEY `deck_translations_locale_index` (`locale`);

--
-- Indexes for table `facilites`
--
ALTER TABLE `facilites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilite_photos`
--
ALTER TABLE `facilite_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facilite_foreign` (`facilite_id`);

--
-- Indexes for table `facilite_translations`
--
ALTER TABLE `facilite_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facilite_foreign_translation` (`facilite_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itineraries`
--
ALTER TABLE `itineraries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itineraries_trip_category_id_foreign` (`trip_category_id`);

--
-- Indexes for table `itinerary_details`
--
ALTER TABLE `itinerary_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itinerary_details_itinerary_id_foreign` (`itinerary_id`);

--
-- Indexes for table `itinerary_detail_translations`
--
ALTER TABLE `itinerary_detail_translations`
  ADD PRIMARY KEY (`trans_id`),
  ADD UNIQUE KEY `itinerary_detail_translations_itinerary_detail_id_locale_unique` (`itinerary_detail_id`,`locale`),
  ADD KEY `itinerary_detail_translations_locale_index` (`locale`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_translations`
--
ALTER TABLE `meta_translations`
  ADD PRIMARY KEY (`trans_id`),
  ADD UNIQUE KEY `meta_translations_meta_id_locale_unique` (`meta_id`,`locale`),
  ADD KEY `meta_translations_locale_index` (`locale`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_foreign` (`page_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_trip_id_foreign` (`trip_id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_foreign` (`setting_id`);

--
-- Indexes for table `side_seeings`
--
ALTER TABLE `side_seeings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `side_seeing_photos`
--
ALTER TABLE `side_seeing_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `side_seeing_foreign` (`side_seeing_id`);

--
-- Indexes for table `side_seeing_translations`
--
ALTER TABLE `side_seeing_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `side_seeing_foreign_translation` (`side_seeing_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_translations`
--
ALTER TABLE `slider_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slider_foreign` (`slider_id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trips_trip_category_id_foreign` (`trip_category_id`);

--
-- Indexes for table `trip_categories`
--
ALTER TABLE `trip_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_category_translations`
--
ALTER TABLE `trip_category_translations`
  ADD PRIMARY KEY (`trans_id`),
  ADD UNIQUE KEY `trip_category_translations_trip_category_id_locale_unique` (`trip_category_id`,`locale`),
  ADD KEY `trip_category_translations_locale_index` (`locale`);

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
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_us_translations`
--
ALTER TABLE `about_us_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `additional_trips`
--
ALTER TABLE `additional_trips`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `additional_trip_translations`
--
ALTER TABLE `additional_trip_translations`
  MODIFY `trans_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `country_translations`
--
ALTER TABLE `country_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `decks`
--
ALTER TABLE `decks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `deck_translations`
--
ALTER TABLE `deck_translations`
  MODIFY `trans_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `facilites`
--
ALTER TABLE `facilites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `facilite_photos`
--
ALTER TABLE `facilite_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `facilite_translations`
--
ALTER TABLE `facilite_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `itineraries`
--
ALTER TABLE `itineraries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `itinerary_details`
--
ALTER TABLE `itinerary_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `itinerary_detail_translations`
--
ALTER TABLE `itinerary_detail_translations`
  MODIFY `trans_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `meta_translations`
--
ALTER TABLE `meta_translations`
  MODIFY `trans_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `side_seeings`
--
ALTER TABLE `side_seeings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `side_seeing_photos`
--
ALTER TABLE `side_seeing_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `side_seeing_translations`
--
ALTER TABLE `side_seeing_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slider_translations`
--
ALTER TABLE `slider_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trip_categories`
--
ALTER TABLE `trip_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trip_category_translations`
--
ALTER TABLE `trip_category_translations`
  MODIFY `trans_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_us_translations`
--
ALTER TABLE `about_us_translations`
  ADD CONSTRAINT `about_us_foreign` FOREIGN KEY (`about_us_id`) REFERENCES `about_us` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `additional_trip_translations`
--
ALTER TABLE `additional_trip_translations`
  ADD CONSTRAINT `additional_trip_translations_additional_trip_id_foreign` FOREIGN KEY (`additional_trip_id`) REFERENCES `additional_trips` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `country_translations`
--
ALTER TABLE `country_translations`
  ADD CONSTRAINT `country_translations_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deck_translations`
--
ALTER TABLE `deck_translations`
  ADD CONSTRAINT `deck_translations_deck_id_foreign` FOREIGN KEY (`deck_id`) REFERENCES `decks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `facilite_photos`
--
ALTER TABLE `facilite_photos`
  ADD CONSTRAINT `facilite_foreign` FOREIGN KEY (`facilite_id`) REFERENCES `facilites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `facilite_translations`
--
ALTER TABLE `facilite_translations`
  ADD CONSTRAINT `facilite_foreign_translation` FOREIGN KEY (`facilite_id`) REFERENCES `facilites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `itineraries`
--
ALTER TABLE `itineraries`
  ADD CONSTRAINT `itineraries_trip_category_id_foreign` FOREIGN KEY (`trip_category_id`) REFERENCES `trip_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `itinerary_details`
--
ALTER TABLE `itinerary_details`
  ADD CONSTRAINT `itinerary_details_itinerary_id_foreign` FOREIGN KEY (`itinerary_id`) REFERENCES `itineraries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `itinerary_detail_translations`
--
ALTER TABLE `itinerary_detail_translations`
  ADD CONSTRAINT `itinerary_detail_translations_itinerary_detail_id_foreign` FOREIGN KEY (`itinerary_detail_id`) REFERENCES `itinerary_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meta_translations`
--
ALTER TABLE `meta_translations`
  ADD CONSTRAINT `meta_translations_meta_id_foreign` FOREIGN KEY (`meta_id`) REFERENCES `metas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD CONSTRAINT `page_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD CONSTRAINT `setting_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `side_seeing_photos`
--
ALTER TABLE `side_seeing_photos`
  ADD CONSTRAINT `side_seeing_foreign` FOREIGN KEY (`side_seeing_id`) REFERENCES `side_seeings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `side_seeing_translations`
--
ALTER TABLE `side_seeing_translations`
  ADD CONSTRAINT `side_seeing_foreign_translation` FOREIGN KEY (`side_seeing_id`) REFERENCES `side_seeings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slider_translations`
--
ALTER TABLE `slider_translations`
  ADD CONSTRAINT `slider_foreign` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_trip_category_id_foreign` FOREIGN KEY (`trip_category_id`) REFERENCES `trip_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trip_category_translations`
--
ALTER TABLE `trip_category_translations`
  ADD CONSTRAINT `trip_category_translations_trip_category_id_foreign` FOREIGN KEY (`trip_category_id`) REFERENCES `trip_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
