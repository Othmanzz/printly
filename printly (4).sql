-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2021 at 11:46 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `printly`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `more` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `city`, `area`, `street`, `more`) VALUES
(2, 1, '2', '2', '54545', '0'),
(3, 7, '2', '2', 'edsfsd', 'fsdf');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `city_id`, `name`, `created_at`, `updated_at`, `price`) VALUES
(2, 2, 'السلمانية', '2021-09-05 07:59:55', '2021-09-05 07:59:55', 10);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accepted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branchs`
--

CREATE TABLE `branchs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_map` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `type`, `user_id`, `product_id`, `ip`, `quantity`, `created_at`, `updated_at`) VALUES
(33, 1, 7, 34, '::1', '1', NULL, NULL),
(40, 1, 1, 42, '::1', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'جدة', '2021-09-05 07:41:49', '2021-09-05 07:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `comission`
--

CREATE TABLE `comission` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `coupon_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comission`
--

INSERT INTO `comission` (`id`, `user_id`, `total`, `order_id`, `coupon_id`, `created_at`, `updated_at`) VALUES
(1, 7, ' 0.6184', 19, 1, '2021-09-16 17:44:08', '2021-09-16 17:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uses_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uses_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `name`, `user_id`, `code`, `type`, `discount`, `total`, `date_start`, `date_end`, `uses_total`, `uses_customer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'saad', '7', 'SAAD-10', '1', '20', '0', '2021-09-16', '2021-09-17', '3', '2', '', '2021-09-16 04:02:07', '2021-09-17 05:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_history`
--

CREATE TABLE `coupon_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_added` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_history`
--

INSERT INTO `coupon_history` (`id`, `coupon_id`, `order_id`, `customer_id`, `amount`, `date_added`, `created_at`, `updated_at`) VALUES
(4, 1, 19, 1, '10', '2021-09-16 01:28:49', '2021-09-15 22:28:49', '2021-09-15 22:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_product`
--

CREATE TABLE `coupon_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cover_files_orders`
--

CREATE TABLE `cover_files_orders` (
  `id` bigint(20) NOT NULL,
  `file` bigint(11) NOT NULL,
  `order` int(11) NOT NULL,
  `m_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cover_files_orders`
--

INSERT INTO `cover_files_orders` (`id`, `file`, `order`, `m_id`) VALUES
(29, 170, 0, 120),
(30, 171, 0, 121),
(47, 170, 0, 132),
(48, 171, 0, 132),
(49, 170, 0, 133),
(50, 171, 0, 134),
(51, 170, 0, 135),
(52, 171, 0, 135),
(62, 175, 1, 144),
(63, 176, 1, 145),
(64, 175, 1, 146),
(65, 176, 2, 146),
(66, 177, 1, 147),
(67, 178, 2, 147);

-- --------------------------------------------------------

--
-- Table structure for table `cover_type`
--

CREATE TABLE `cover_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_type` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cover_type`
--

INSERT INTO `cover_type` (`id`, `name`, `photo`, `price_type`, `created_at`, `updated_at`) VALUES
(2, 'تغليف حراري', '1631015488.jpg', 0, '2021-09-07 09:55:22', '2021-09-07 09:55:22'),
(3, 'سلك حديد حلزوني', '1631015532.jpeg', 0, '2021-09-07 11:53:58', '2021-09-07 11:53:58'),
(4, 'التغليف الحراري', '1631445807.png', 1, '2021-09-12 08:30:45', '2021-09-12 08:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `cover_type_price`
--

CREATE TABLE `cover_type_price` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cover_id` bigint(20) UNSIGNED NOT NULL,
  `star_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cover_type_price`
--

INSERT INTO `cover_type_price` (`id`, `cover_id`, `star_from`, `end_to`, `price`) VALUES
(2, 1, '0', '1', '10'),
(3, 1, '2', '50', '20'),
(9, 3, '1', '20', '4'),
(10, 3, '21', '60', '8'),
(14, 2, '0', '1', '3.5'),
(16, 4, '0', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `universty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `college` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialist` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `user_id`, `universty`, `college`, `specialist`) VALUES
(1, 10, 'alex', 'gdfgdf', 'com');

-- --------------------------------------------------------

--
-- Table structure for table `custom_products`
--

CREATE TABLE `custom_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `complete` int(11) NOT NULL DEFAULT 0,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_products`
--

INSERT INTO `custom_products` (`id`, `user_id`, `complete`, `total`, `created_at`, `updated_at`) VALUES
(38, 1, 2, '886.65', '2021-09-19 00:27:28', '2021-09-19 00:27:28'),
(39, 1, 2, '36.15', '2021-09-20 03:45:02', '2021-09-20 03:45:02'),
(40, 1, 2, '0.15', '2021-09-20 05:09:34', '2021-09-20 05:09:34'),
(41, 1, 2, '58117.15', '2021-09-20 06:29:45', '2021-09-20 06:29:45'),
(42, 1, 1, '57876.15', '2021-09-20 06:32:40', '2021-09-20 06:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `custom_products_files`
--

CREATE TABLE `custom_products_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custom_product` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `number_of_pages` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `combind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `fileId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preview_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_type` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `cover_side` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `cover_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `paper_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `printer_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `printer_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `paper_slice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `printer_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `from` int(11) NOT NULL DEFAULT 0,
  `to` int(11) NOT NULL DEFAULT 0,
  `price_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_products_files`
--

INSERT INTO `custom_products_files` (`id`, `custom_product`, `number_of_pages`, `parent`, `combind`, `fileId`, `file`, `preview_name`, `price`, `cover_type`, `cover_side`, `quantity`, `total`, `cover_price`, `paper_type`, `printer_method`, `printer_type`, `paper_slice`, `printer_color`, `from`, `to`, `price_id`) VALUES
(138, 34, '4', '0', '0', '0', '226518__D8_AA_D9_82_D8_B1_D9_8A_D8_B1_20_D8_AE_D8_B7_D8_A9_20_D8_A7_D9_84_D8_A3_D9_86_D8_B4_D8_B7_D8_A9_20_D8_A7_D9_84_D8_AA_D8_AD_D8_B3_D9_8A_D9_86_D9_8A_D8_A9.docx', '', '2.5', 0, '0', '1', '10', '0', '0', '0', '0', '0', '0', 0, 4, 5),
(142, 33, '1', '0', '0', '0', '5375637_1629024648.pdf', '', '2.5', 0, '0', '2', '2.5', '0', '0', '0', '0', '0', '0', 0, 1, 5),
(143, 36, '1', '0', '0', '0', '1375637_1629024648.pdf', '1629024648.pdf', '0.15', 0, '0', '1', '0.15', '0', '0', '0', '0', '0', '0', 0, 1, 5),
(167, 37, '10', '0', '0', '0', '53914734_03914734_papa.pdf', '03914734_papa.pdf', '0.15', 0, '0', '1', '1.5', '0', '0', '0', '0', '0', '0', 1, 10, 8),
(170, 38, '240', '0', '0', '0', '23914734_03914734_papa.pdf', '03914734_papa.pdf', '0.15', 0, '0', '1', '36', '0', '0', '0', '0', '0', '0', 0, 240, 5),
(171, 38, '1', '0', '0', '0', '511570_9_20page_20(1).docx', '9_20page_20(1).docx', '0.15', 0, '0', '1', '0.15', '0', '0', '0', '0', '0', '0', 0, 1, 5),
(172, 39, '240', '0', '0', '0', '33914734_03914734_papa.pdf', '03914734_papa.pdf', '0.15', 0, '0', '1', '36', '0', '0', '0', '0', '0', '0', 0, 240, 5),
(173, 39, '1', '0', '0', '0', '011570_9_20page_20(1).docx', '9_20page_20(1).docx', '0.15', 0, '0', '1', '0.15', '0', '0', '0', '0', '0', '0', 0, 1, 5),
(174, 40, '1', '0', '0', '0', '011570_9_20page_20(1).docx', '9_20page_20(1).docx', '0.15', 0, '0', '1', '0.15', '0', '0', '0', '0', '0', '0', 0, 1, 5),
(175, 41, '1', '0', '0', '0', '111570_9_20page_20(1).docx', '9_20page_20(1).docx', '0.15', 0, '0', '1', '0.15', '0', '0', '0', '0', '0', '0', 0, 1, 5),
(176, 41, '240', '0', '0', '0', '23914734_03914734_papa.pdf', '03914734_papa.pdf', '0.15', 0, '0', '1', '36', '0', '0', '0', '0', '0', '0', 0, 240, 5),
(177, 42, '1', '0', '0', '0', '111570_9_20page_20(1).docx', '9_20page_20(1).docx', '0.15', 0, '0', '1', '0.15', '0', '0', '0', '0', '0', '0', 0, 1, 5),
(178, 42, '240', '0', '0', '0', '43914734_03914734_papa.pdf', '03914734_papa.pdf', '0.15', 0, '0', '1', '36', '0', '0', '0', '0', '0', '0', 0, 240, 5);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files_parts`
--

CREATE TABLE `files_parts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files_parts`
--

INSERT INTO `files_parts` (`id`, `file_id`, `from`, `to`) VALUES
(401, 41, '1', '2'),
(402, 41, '2', '3');

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `markter_men`
--

CREATE TABLE `markter_men` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merged_files`
--

CREATE TABLE `merged_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custom_product` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `cover_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `files` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merged_files_cover`
--

CREATE TABLE `merged_files_cover` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custom_product` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `cover_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_side` int(11) NOT NULL,
  `number_of_pages` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merged_files_cover`
--

INSERT INTO `merged_files_cover` (`id`, `custom_product`, `cover_id`, `price`, `cover_side`, `number_of_pages`) VALUES
(132, 38, 2, '3.5', 0, 241),
(133, 38, 2, '840', 1, 240),
(134, 38, 2, '3.5', 1, 1),
(135, 38, 2, '3.5', 0, 241),
(144, 41, 4, '1', 1, 1),
(145, 41, 4, '240', 1, 240),
(146, 41, 4, '57840', 0, 241),
(147, 42, 4, '57840', 0, 241);

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
(4, '2021_04_14_155313_create_orders_table', 1),
(5, '2021_04_14_155322_create_products_table', 1),
(6, '2021_04_14_155420_create_carts_table', 1),
(7, '2021_04_14_155432_create_settings_table', 1),
(8, '2021_04_14_155524_create_branches_table', 1),
(9, '2021_04_14_155723_create_papers_table', 1),
(10, '2021_04_14_203229_create_custom_products_table', 1),
(11, '2021_04_14_230230_create_categories_table', 1),
(12, '2021_04_15_102045_create_publishers_table', 1),
(13, '2021_04_15_212319_create_representatives_table', 1),
(14, '2021_04_26_110350_create_print_men_table', 1),
(15, '2021_04_26_123834_create_markter_men_table', 1),
(16, '2021_06_30_162315_create_stickers_table', 1),
(17, '2021_07_02_073327_create_personal_cards_table', 1),
(18, '2021_07_02_091058_create_rollups_table', 1),
(19, '2021_07_02_095249_create_posters_table', 1),
(20, '2021_07_02_112907_create_wallets_table', 1),
(21, '2021_07_02_182542_create_drivers_table', 1),
(22, '2021_07_02_194303_create_wishlists_table', 1),
(23, '2021_07_17_164557_create_faqs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_id` int(11) DEFAULT NULL,
  `read` int(11) NOT NULL DEFAULT 0,
  `flashed` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `normal_user` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `content`, `route`, `content_id`, `read`, `flashed`, `created_at`, `updated_at`, `normal_user`) VALUES
(1, 1, 'اشتراك جديد من hend', '/admin/users/5?notification_id=1', 0, 0, 1, '2021-09-03 23:26:40', '2021-09-03 23:26:40', 1),
(2, 1, 'طلب جديد من admin', '/admin/show_aorder/4?notification_id=2', 0, 0, 1, '2021-09-03 23:28:46', '2021-09-03 23:28:46', 1),
(3, 1, 'اشتراك جديد من ammar', '/admin/users/6?notification_id=3', 0, 0, 1, '2021-09-03 23:34:59', '2021-09-03 23:34:59', 1),
(4, 1, 'طلب جديد من admin', '/admin/show_aorder/5?notification_id=4', 0, 0, 1, '2021-09-04 23:48:46', '2021-09-04 23:48:46', 1),
(5, 1, 'طلب جديد من admin', '/admin/show_aorder/6?notification_id=5', 0, 0, 1, '2021-09-06 01:57:43', '2021-09-06 01:57:43', 1),
(6, 1, 'طلب جديد من admin', '/admin/show_aorder/7?notification_id=6', 0, 0, 1, '2021-09-06 07:02:02', '2021-09-06 07:02:02', 1),
(7, 1, 'طلب جديد من admin', '/admin/show_aorder/8?notification_id=7', 0, 0, 1, '2021-09-07 10:00:35', '2021-09-07 10:00:35', 1),
(8, 1, 'طلب جديد من admin', '/admin/show_aorder/9?notification_id=8', 0, 0, 1, '2021-09-14 03:55:03', '2021-09-14 03:55:03', 1),
(9, 1, 'طلب جديد من admin', '/admin/show_aorder/10?notification_id=9', 0, 0, 1, '2021-09-14 04:05:15', '2021-09-14 04:05:15', 1),
(10, 1, 'اشتراك جديد من saad', '/admin/users/7?notification_id=10', 0, 0, 1, '2021-09-15 06:46:34', '2021-09-15 06:46:34', 1),
(11, 1, 'اشتراك جديد من gfdg', '/admin/users/8?notification_id=11', 0, 0, 1, '2021-09-15 06:49:49', '2021-09-15 06:49:49', 1),
(12, 1, 'طلب جديد من admin', '/admin/show_aorder/11?notification_id=12', 0, 0, 1, '2021-09-15 07:44:35', '2021-09-15 07:44:35', 1),
(13, 7, 'طلب جديد من saad', '/admin/show_aorder/12?notification_id=13', 0, 0, 1, '2021-09-16 04:21:12', '2021-09-16 04:21:12', 1),
(14, 7, 'طلب جديد من saad', '/admin/show_aorder/13?notification_id=14', 0, 0, 1, '2021-09-16 04:31:35', '2021-09-16 04:31:35', 1),
(15, 1, 'طلب جديد من admin', '/admin/show_aorder/14?notification_id=15', 0, 0, 1, '2021-09-16 09:34:51', '2021-09-16 09:34:51', 1),
(16, 1, 'طلب جديد من admin', '/admin/show_aorder/15?notification_id=16', 0, 0, 1, '2021-09-16 09:36:53', '2021-09-16 09:36:53', 1),
(17, 1, 'طلب جديد من admin', '/admin/show_aorder/16?notification_id=17', 0, 0, 1, '2021-09-15 22:08:37', '2021-09-15 22:08:37', 1),
(18, 1, 'طلب جديد من admin', '/admin/show_aorder/17?notification_id=18', 0, 0, 1, '2021-09-15 22:17:04', '2021-09-15 22:17:04', 1),
(19, 1, 'طلب جديد من admin', '/admin/show_aorder/18?notification_id=19', 0, 0, 1, '2021-09-15 22:22:20', '2021-09-15 22:22:20', 1),
(20, 1, 'طلب جديد من admin', '/admin/show_aorder/19?notification_id=20', 0, 0, 1, '2021-09-15 22:28:49', '2021-09-15 22:28:49', 1),
(21, 1, 'طلب جديد من admin', '/admin/show_aorder/20?notification_id=21', 0, 0, 1, '2021-09-17 04:31:07', '2021-09-17 04:31:07', 1),
(22, 1, 'اشتراك جديد من customer', '/admin/users/10?notification_id=22', 0, 0, 1, '2021-09-17 08:53:39', '2021-09-17 08:53:39', 1),
(23, 1, 'طلب جديد من admin', '/admin/show_aorder/21?notification_id=23', 0, 0, 0, '2021-09-17 01:59:23', '2021-09-17 01:59:23', 1),
(24, 1, 'طلب جديد من admin', '/admin/show_aorder/22?notification_id=24', 0, 0, 0, '2021-09-20 03:33:37', '2021-09-20 03:33:37', 1),
(25, 1, 'طلب جديد من admin', '/admin/show_aorder/23?notification_id=25', 0, 0, 0, '2021-09-20 06:32:27', '2021-09-20 06:32:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `payment_confirm` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `checkout_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `represnt_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `code_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `total`, `user_id`, `payment_method`, `currency`, `address`, `city`, `zone`, `payment_confirm`, `status`, `checkout_id`, `represnt_id`, `code`, `code_price`, `created_at`, `updated_at`) VALUES
(11, 'admin', '22', 3, 'cod', 'SAR', '2', '', '', 1, 1, '', 0, '', '', '2021-09-15 07:44:34', '2021-09-15 07:44:34'),
(12, 'saad', '16', 2, 'cod', 'SAR', '3', '', '', 1, 1, '', 0, '', '', '2021-09-16 04:21:11', '2021-09-16 04:21:11'),
(13, 'saad', '15.46', 2, 'cod', 'SAR', '3', '', '', 1, 1, '', 0, '', '', '2021-09-16 04:31:35', '2021-09-16 04:31:35'),
(14, 'admin', '5.46', 3, 'cod', 'SAR', '2', '', '', 0, 1, '', 0, '', '', '2021-09-16 09:34:50', '2021-09-16 09:34:50'),
(15, 'admin', '15.46', 3, 'cod', 'SAR', '2', '', '', 0, 1, '', 0, '', '', '2021-09-16 09:36:53', '2021-09-16 09:36:53'),
(17, 'admin', '20.92', 3, 'cod', 'SAR', '2', '', '', 0, 1, '', 0, '', '', '2021-09-15 22:17:03', '2021-09-15 22:17:03'),
(18, 'admin', '15.46', 3, 'cod', 'SAR', '2', '', '', 0, 1, '', 0, '', '', '2021-09-15 22:22:20', '2021-09-15 22:22:20'),
(19, 'admin', '15.46', 3, 'cod', 'SAR', '2', '', '', 1, 1, '', 0, '', '', '2021-09-15 22:28:48', '2021-09-15 22:28:48'),
(20, 'admin', '12', 3, 'cod', 'SAR', '2', '', '', 1, 1, '', 0, '', '', '2021-09-17 04:31:07', '2021-09-17 04:31:07'),
(21, 'admin', '3.65', 1, 'cod', 'SAR', '2', '', '', 1, 1, '', 0, '', '', '2021-09-17 01:59:23', '2021-09-17 01:59:23'),
(22, 'admin', '886.65', 1, 'cod', 'SAR', '', '', '', 1, 1, '', 0, '', '', '2021-09-20 03:33:36', '2021-09-20 03:33:36'),
(23, 'admin', '58153.45', 1, 'cod', 'SAR', '2', '', '', 1, 1, '', 0, '', '', '2021-09-20 06:32:26', '2021-09-20 06:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL DEFAULT 0,
  `order_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `product_id`, `type`, `quantity`, `total`, `order_id`) VALUES
(17, 24, 1, 1, 6, 11),
(18, 25, 1, 1, 6, 11),
(19, 26, 1, 1, 6, 12),
(20, 27, 1, 1, 6, 13),
(21, 28, 1, 1, 6, 14),
(22, 29, 1, 1, 6, 15),
(23, 30, 1, 1, 6, 16),
(24, 30, 1, 1, 12, 17),
(25, 31, 1, 1, 6, 18),
(26, 32, 1, 1, 6, 19),
(27, 33, 1, 1, 12, 20),
(28, 36, 1, 1, 4, 21),
(29, 38, 1, 1, 887, 22),
(30, 39, 1, 1, 36, 23),
(31, 40, 1, 1, 0, 23),
(32, 41, 1, 1, 58117, 23);

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'طلب جديد', NULL, NULL),
(2, 'تم طباعة الطلب', NULL, NULL),
(3, 'تم التغليف', NULL, NULL),
(4, ' جاهز للاستلام', NULL, NULL),
(5, ' جار التوصيل', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `papers_size`
--

CREATE TABLE `papers_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paper_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `printer_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `printer_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `printer_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `papers_slice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `covers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `papers_size`
--

INSERT INTO `papers_size` (`id`, `name`, `paper_type`, `printer_type`, `printer_color`, `printer_method`, `papers_slice`, `covers`, `created_at`, `updated_at`) VALUES
(3, 'A4', '5,4', '2,1', '2,1', '1,2', '4,3', '3,2,4', '2021-09-07 11:54:34', '2021-09-07 11:54:34'),
(4, 'A5', '5', '1', '2,1', '1,2', '4', '3,4', '2021-09-07 12:04:29', '2021-09-07 12:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `papers_slice`
--

CREATE TABLE `papers_slice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paper_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `papers_slice`
--

INSERT INTO `papers_slice` (`id`, `name`, `paper_count`, `photo`, `created_at`, `updated_at`) VALUES
(3, 'شريحه واحدة - عرضي', '1', '1631015570.jpg', '2021-09-07 11:52:50', '2021-09-07 11:52:50'),
(4, 'شريحيتن طولي', '2', '1631015584.png', '2021-09-07 11:53:04', '2021-09-07 11:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `papers_type`
--

CREATE TABLE `papers_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `papers_type`
--

INSERT INTO `papers_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'ورق عادي', '2021-09-07 11:53:14', '2021-09-07 11:53:14'),
(5, 'ورق مقوى', '2021-09-07 11:53:22', '2021-09-07 11:53:22');

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
-- Table structure for table `personal_cards_prices`
--

CREATE TABLE `personal_cards_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_type` bigint(20) UNSIGNED NOT NULL,
  `card_size` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_cards_products`
--

CREATE TABLE `personal_cards_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `price_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_cards_size`
--

CREATE TABLE `personal_cards_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_cards_type`
--

CREATE TABLE `personal_cards_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posters_products`
--

CREATE TABLE `posters_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `price_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posters_size`
--

CREATE TABLE `posters_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price_list`
--

CREATE TABLE `price_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paper_id` bigint(20) UNSIGNED NOT NULL,
  `printer_type` bigint(20) UNSIGNED NOT NULL,
  `paper_type` bigint(20) UNSIGNED NOT NULL,
  `printer_method` bigint(20) UNSIGNED NOT NULL,
  `printer_color` bigint(20) UNSIGNED NOT NULL,
  `paper_slice` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_extra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_list`
--

INSERT INTO `price_list` (`id`, `name`, `paper_id`, `printer_type`, `paper_type`, `printer_method`, `printer_color`, `paper_slice`, `price`, `price_extra`, `created_at`, `updated_at`) VALUES
(5, 'A4-ورق عادي-أسود-- وجه واحد-شريحه واحدة - عرضي', 3, 1, 4, 0, 1, 3, '0.15', '0', '2021-09-07 11:55:16', '2021-09-07 11:55:16'),
(6, 'A4-ورق عادي-أسود--وجهين-شريحه واحدة - عرضي', 3, 2, 4, 0, 1, 3, '0.15', '0', '2021-09-07 11:55:33', '2021-09-07 11:55:33'),
(7, 'A4-ورق عادي-أسود-- وجه واحد-شريحيتن طولي', 3, 1, 4, 0, 1, 4, '0.15', '0', '2021-09-07 08:18:51', '2021-09-07 08:18:51'),
(8, 'A4-ورق عادي-أسود--وجهين-شريحيتن طولي', 3, 2, 4, 0, 1, 4, '0.15', '2', '2021-09-07 09:47:59', '2021-09-07 09:47:59'),
(11, 'A5-ورق مقوى-ملون-- وجه واحد-شريحيتن طولي', 4, 1, 5, 0, 2, 4, '0.15', '0', '2021-09-07 12:14:06', '2021-09-07 12:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `printer_color`
--

CREATE TABLE `printer_color` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `printer_color`
--

INSERT INTO `printer_color` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'أسود', 0, NULL, NULL),
(2, 'ملون', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `printer_method`
--

CREATE TABLE `printer_method` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `printer_method`
--

INSERT INTO `printer_method` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'طولي', NULL, NULL),
(2, 'عرضي', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `printer_type`
--

CREATE TABLE `printer_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `printer_type`
--

INSERT INTO `printer_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, ' وجه واحد', NULL, NULL),
(2, 'وجهين', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `print_men`
--

CREATE TABLE `print_men` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `category` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `accepted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `representatives`
--

CREATE TABLE `representatives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rollups_products`
--

CREATE TABLE `rollups_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `price_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rollups_size`
--

CREATE TABLE `rollups_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stickers_paper_prices`
--

CREATE TABLE `stickers_paper_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paper_type` bigint(20) UNSIGNED NOT NULL,
  `paper_size` bigint(20) UNSIGNED NOT NULL,
  `paper_shape` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stickers_paper_shape`
--

CREATE TABLE `stickers_paper_shape` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stickers_paper_size`
--

CREATE TABLE `stickers_paper_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stickers_paper_type`
--

CREATE TABLE `stickers_paper_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stickers_products`
--

CREATE TABLE `stickers_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `price_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 0, 2, '2021-09-06 14:41:18', '2021-09-02 14:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_messages`
--

CREATE TABLE `ticket_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `has_file` int(11) NOT NULL DEFAULT 0,
  `company_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `admin_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `read` int(11) NOT NULL DEFAULT 0,
  `ticket_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_messages`
--

INSERT INTO `ticket_messages` (`id`, `message`, `file`, `type`, `has_file`, `company_id`, `admin_id`, `read`, `ticket_id`, `created_at`, `updated_at`) VALUES
(1, 'test', '', 0, 0, 2, 1, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wallet_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `profit` int(11) NOT NULL DEFAULT 0,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `type` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `block` int(11) NOT NULL DEFAULT 0,
  `block_to` timestamp NULL DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `phone2`, `profit`, `photo`, `gender`, `country`, `type`, `remember_token`, `created_at`, `updated_at`, `block`, `block_to`, `reason`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$2cIRGH5aynF27rPOQyYZBeaulYanVSKjYhbYOkov79mvxxs0EhGbK', '0000000000', '', 0, '', '1', '', 1, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 'frefsdfsdf'),
(2, 'saad', 'saadm7625@gmail.com', NULL, '$2y$10$s3rRNb/GMnxhf52XUfP.DeTwTerTkc3yLrgp.jECM4zEGKmeOYa5O', '214324324324324324', '', 0, '', '', '', 0, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 'frefsdfsdf'),
(3, 'othman', 'othman@yahoo.com', NULL, '$2y$10$kgDv/NwHeTNYD2eSBJuSXOco50wSMiYDbncLzUWpBtrxSK5wWQO6G', '3424234324', '', 0, '', '', '', 0, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 'frefsdfsdf'),
(7, 'saad', 'saad@saad.com', NULL, '$2y$10$jy2zBqd7Ss4A98IZNIly.u.8/PcbQsheipPyWqDY5dizaj/Q9/sXS', '12434535', '', 4, '', '', '', 3, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 'frefsdfsdf'),
(10, 'customer', 'customer@saad.com', NULL, '$2y$10$Q2vM6j9LZBsuTlqBRiqUTuxMmQaYm0ePMqiaQquFbF0PqKWVwghgW', '5435435354', '45345345', 0, '', '', '', 0, NULL, NULL, NULL, 0, '2021-09-17 21:00:00', 'vbvbbvcb');

-- --------------------------------------------------------

--
-- Table structure for table `users_coupons`
--

CREATE TABLE `users_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allowed` int(11) NOT NULL DEFAULT 0,
  `used` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_coupons`
--

INSERT INTO `users_coupons` (`id`, `user_id`, `code`, `allowed`, `used`) VALUES
(1, 6, '606', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_promo_codes`
--

CREATE TABLE `user_promo_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 6, 5000, '2021-09-03 23:34:59', '2021-09-03 23:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `product_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branchs`
--
ALTER TABLE `branchs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comission`
--
ALTER TABLE `comission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_history`
--
ALTER TABLE `coupon_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_product`
--
ALTER TABLE `coupon_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cover_files_orders`
--
ALTER TABLE `cover_files_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cover_type`
--
ALTER TABLE `cover_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cover_type_price`
--
ALTER TABLE `cover_type_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_products`
--
ALTER TABLE `custom_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_products_files`
--
ALTER TABLE `custom_products_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files_parts`
--
ALTER TABLE `files_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markter_men`
--
ALTER TABLE `markter_men`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merged_files`
--
ALTER TABLE `merged_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merged_files_cover`
--
ALTER TABLE `merged_files_cover`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papers_size`
--
ALTER TABLE `papers_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papers_slice`
--
ALTER TABLE `papers_slice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papers_type`
--
ALTER TABLE `papers_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_cards_prices`
--
ALTER TABLE `personal_cards_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_cards_products`
--
ALTER TABLE `personal_cards_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_cards_size`
--
ALTER TABLE `personal_cards_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_cards_type`
--
ALTER TABLE `personal_cards_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posters_products`
--
ALTER TABLE `posters_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posters_size`
--
ALTER TABLE `posters_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_list`
--
ALTER TABLE `price_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printer_color`
--
ALTER TABLE `printer_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printer_method`
--
ALTER TABLE `printer_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printer_type`
--
ALTER TABLE `printer_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `print_men`
--
ALTER TABLE `print_men`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `representatives`
--
ALTER TABLE `representatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rollups_products`
--
ALTER TABLE `rollups_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rollups_size`
--
ALTER TABLE `rollups_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stickers_paper_prices`
--
ALTER TABLE `stickers_paper_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stickers_paper_shape`
--
ALTER TABLE `stickers_paper_shape`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stickers_paper_size`
--
ALTER TABLE `stickers_paper_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stickers_paper_type`
--
ALTER TABLE `stickers_paper_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stickers_products`
--
ALTER TABLE `stickers_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_coupons`
--
ALTER TABLE `users_coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_coupons_code_unique` (`code`);

--
-- Indexes for table `user_promo_codes`
--
ALTER TABLE `user_promo_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branchs`
--
ALTER TABLE `branchs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comission`
--
ALTER TABLE `comission`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupon_history`
--
ALTER TABLE `coupon_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupon_product`
--
ALTER TABLE `coupon_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cover_files_orders`
--
ALTER TABLE `cover_files_orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `cover_type`
--
ALTER TABLE `cover_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cover_type_price`
--
ALTER TABLE `cover_type_price`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `custom_products`
--
ALTER TABLE `custom_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `custom_products_files`
--
ALTER TABLE `custom_products_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files_parts`
--
ALTER TABLE `files_parts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `markter_men`
--
ALTER TABLE `markter_men`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merged_files`
--
ALTER TABLE `merged_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merged_files_cover`
--
ALTER TABLE `merged_files_cover`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `papers_size`
--
ALTER TABLE `papers_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `papers_slice`
--
ALTER TABLE `papers_slice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `papers_type`
--
ALTER TABLE `papers_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_cards_prices`
--
ALTER TABLE `personal_cards_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_cards_products`
--
ALTER TABLE `personal_cards_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_cards_size`
--
ALTER TABLE `personal_cards_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_cards_type`
--
ALTER TABLE `personal_cards_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posters_products`
--
ALTER TABLE `posters_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posters_size`
--
ALTER TABLE `posters_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price_list`
--
ALTER TABLE `price_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `printer_color`
--
ALTER TABLE `printer_color`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `printer_method`
--
ALTER TABLE `printer_method`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `printer_type`
--
ALTER TABLE `printer_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `print_men`
--
ALTER TABLE `print_men`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `representatives`
--
ALTER TABLE `representatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rollups_products`
--
ALTER TABLE `rollups_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rollups_size`
--
ALTER TABLE `rollups_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stickers_paper_prices`
--
ALTER TABLE `stickers_paper_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stickers_paper_shape`
--
ALTER TABLE `stickers_paper_shape`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stickers_paper_size`
--
ALTER TABLE `stickers_paper_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stickers_paper_type`
--
ALTER TABLE `stickers_paper_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stickers_products`
--
ALTER TABLE `stickers_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_coupons`
--
ALTER TABLE `users_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_promo_codes`
--
ALTER TABLE `user_promo_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
