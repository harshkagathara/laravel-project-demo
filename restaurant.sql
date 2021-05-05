-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2021 at 06:11 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `addons_category_id` bigint(20) UNSIGNED NOT NULL,
  `active` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`id`, `name`, `price`, `restaurant_id`, `addons_category_id`, `active`, `created_at`, `updated_at`) VALUES
(8, 'cheese d', '150.00', 8, 1, 'on', NULL, NULL),
(10, 'dd', '10.00', 8, 5, 'on', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `addons_categories`
--

CREATE TABLE `addons_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addons_categories`
--

INSERT INTO `addons_categories` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'cheese gandics', 'SINGLE', NULL, NULL),
(5, 'cheese 3', 'SINGLE', NULL, NULL),
(6, 'cheese 1', 'SINGLE', NULL, NULL),
(8, 'cheese', 'SINGLE', NULL, NULL),
(10, 'cheese 2', 'SINGLE', NULL, NULL),
(11, 'parag kavar', 'SINGLE', NULL, NULL),
(12, 'parag kavar', 'SINGLE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reciever_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(151) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_type` enum('PERCENTAGE','FIXED') COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `max_usage` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `description`, `coupon_code`, `discount_type`, `discount`, `expiry_date`, `max_usage`, `active`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(5, 'sqsq', 'ssqassq', '124aqwsd', 'FIXED', 120, '2021-04-24', '120', 'on', 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(44) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(44) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav_cuisine` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav_restaurant` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(151) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joined_date` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `education`, `image`, `profession`, `dob`, `gender`, `phone`, `fav_cuisine`, `fav_restaurant`, `username`, `email`, `password`, `joined_date`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'csdc', 'sdcdscdsc', 'cdsdc', 'scdcscd', 'cdcsdc', '0000-00-00', 'male', '9773207180', '1', '1', 'kagu29', 'harshkagu29@gmail.com', '123456789', '2021-04-12 10:54:34', 1, '2021-04-12 05:24:34', '2021-04-12 05:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount_price` decimal(8,2) NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_veg` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `glu_free` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calories` decimal(8,2) DEFAULT NULL,
  `protien` decimal(8,2) DEFAULT NULL,
  `sodium` decimal(8,2) DEFAULT NULL,
  `cholesterol` decimal(8,2) DEFAULT NULL,
  `active` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addons_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `dish_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id`, `name`, `description`, `image`, `price`, `discount_price`, `type`, `is_veg`, `glu_free`, `calories`, `protien`, `sodium`, `cholesterol`, `active`, `addons_category_id`, `restaurant_id`, `dish_category_id`, `created_at`, `updated_at`) VALUES
(1, 'harsh kagu', 'kagu made by best kaju badam', 'pexels-ella-olsson-1640777.jpg', '150.00', '11.00', 'food', 'on', 'on', '0.00', '0.00', '0.00', '0.00', 'on', 1, 1, 1, NULL, NULL),
(3, 'parag kavar', 'ssqassq', 'kfc.png', '150.00', '150.00', 'drink', 'on', 'on', '0.00', '0.00', '0.00', '0.00', 'on', NULL, 3, 13, NULL, NULL),
(4, 'parag kavar', 'dsadsazdfsadsadsad', 'kfc.png', '190.00', '20.00', 'meal', 'on', 'on', '0.00', '0.00', '0.00', '0.00', 'on', 3, 3, 13, NULL, NULL),
(7, 'harsh', 'Relax in our flowered Roof Garden overlooking Florence roofs and hills. Enjoy a drink from the Honesty Bar and feel ‘at Home in Florence’', 'kfc.png', '150.00', '150.00', 'food', 'on', 'on', '0.00', '0.00', '0.00', '0.00', 'on', 1, 8, 3, NULL, NULL),
(8, 'harsh', 'Relax in our flowered Roof Garden overlooking Florence roofs and hills. Enjoy a drink from the Honesty Bar and feel ‘at Home in Florence’', 'kfc.png', '150.00', '150.00', 'food', 'on', 'on', '0.00', '0.00', '0.00', '0.00', 'on', 1, 8, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dish_categories`
--

CREATE TABLE `dish_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `active` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dish_categories`
--

INSERT INTO `dish_categories` (`id`, `name`, `image`, `restaurant_id`, `active`, `created_at`, `updated_at`) VALUES
(15, 'cheese', 'kfc.png', 8, 'on', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `review_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourite_restaurants`
--

CREATE TABLE `favourite_restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `favourite_restaurants_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourite_wepppis`
--

CREATE TABLE `favourite_wepppis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `favourite_wepppis_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow_ups`
--

CREATE TABLE `follow_ups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `request_by` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `wepppies` int(11) NOT NULL,
  `purpose` varchar(151) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `status` varchar(151) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wepppi_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drink` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_instruction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `follow_ups`
--

INSERT INTO `follow_ups` (`id`, `restaurant_id`, `request_by`, `order_id`, `wepppies`, `purpose`, `date`, `time`, `amount`, `status`, `wepppi_id`, `comment`, `food`, `drink`, `meal`, `special_instruction`, `created_at`, `updated_at`) VALUES
(3, 2, 3, 3, 1, 'soicals', '1999-11-11', '12:10:10', '100.00', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-08 15:19:49', '2021-04-08 15:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `foodtypes`
--

CREATE TABLE `foodtypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foodtypes`
--

INSERT INTO `foodtypes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'American', NULL, NULL),
(2, 'Asian', NULL, NULL),
(3, 'Indian', NULL, NULL),
(4, 'Italian', NULL, NULL),
(5, 'Cafe & Bakery', NULL, NULL),
(6, 'Middle Eastern', NULL, NULL),
(7, 'Healthy', NULL, NULL),
(8, 'Mediterranean', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `review_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live_requests`
--

CREATE TABLE `live_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `request_by` bigint(20) UNSIGNED NOT NULL,
  `wepppies` int(11) NOT NULL,
  `purpose` varchar(151) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(151) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `live_requests`
--

INSERT INTO `live_requests` (`id`, `restaurant_id`, `request_by`, `wepppies`, `purpose`, `date`, `time`, `status`, `created_at`, `updated_at`) VALUES
(3, 8, 3, 1, 'soicals', '1999-11-11', '12:10:10', '1', '2021-04-08 15:17:09', '2021-04-08 15:17:09'),
(4, 8, 8, 2, 'w', '2021-04-14', '00:00:00', 'w', '2021-04-12 05:24:34', '2021-04-12 05:24:34'),
(5, 8, 8, 2, 'w', '2021-04-14', '10:10:10', 'w', '2021-04-12 05:24:34', '2021-04-12 05:24:34');

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
(4, '2021_02_05_092927_create_foodtypes_table', 1),
(5, '2021_02_06_062306_create_restaurants_table', 1),
(6, '2021_02_07_093241_create_restaurant_addresses_table', 1),
(7, '2021_02_08_122948_create_dish_categories_table', 1),
(8, '2021_02_09_135912_create_addons_categories_table', 1),
(9, '2021_02_10_174421_create_addons_table', 1),
(10, '2021_02_11_112753_create_dishes_table', 1),
(11, '2021_02_12_145131_create_coupons_table', 1),
(12, '2021_03_05_063449_create_patnerwithuses_table', 1),
(13, '2021_03_05_123215_create_customers_table', 1),
(14, '2021_03_17_112713_create_reviews_table', 1),
(15, '2021_03_18_035520_create_blocks_table', 1),
(16, '2021_03_31_105914_create_likes_table', 1),
(17, '2021_04_01_052354_create_dislikes_table', 1),
(18, '2021_04_01_062608_create_promotions_table', 1),
(19, '2021_04_01_062824_create_favourite_wepppis_table', 1),
(20, '2021_04_01_062844_create_favourite_restaurants_table', 1),
(21, '2021_04_01_145135_create_live_requests_table', 1),
(22, '2021_04_01_145157_create_follow_ups_table', 1),
(23, '2021_04_05_124337_create_wepppi_order_reqs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patnerwithuses`
--

CREATE TABLE `patnerwithuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sur_name` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_loc` int(11) NOT NULL,
  `type_of_cuisine` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promotion_code` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_type` enum('PERCENTAGE','FIXED') COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `max_usage` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(151) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` decimal(10,2) DEFAULT NULL,
  `delivery_time` smallint(6) DEFAULT NULL,
  `delivery_radius` smallint(6) DEFAULT NULL,
  `for_two` smallint(6) DEFAULT NULL,
  `mon` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mon_opentime` time DEFAULT NULL,
  `mon_closetime` time DEFAULT NULL,
  `tue` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tue_opentime` time DEFAULT NULL,
  `tue_closetime` time DEFAULT NULL,
  `wed` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wed_opentime` time DEFAULT NULL,
  `wed_closetime` time DEFAULT NULL,
  `thu` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thu_opentime` time DEFAULT NULL,
  `thu_closetime` time DEFAULT NULL,
  `fri` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fri_opentime` time DEFAULT NULL,
  `fri_closetime` time DEFAULT NULL,
  `sat` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sat_opentime` time DEFAULT NULL,
  `sat_closetime` time DEFAULT NULL,
  `sun` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sun_opentime` time DEFAULT NULL,
  `sun_closetime` time DEFAULT NULL,
  `is_veg` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `foodtype_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `description`, `image`, `phone`, `email`, `rating`, `delivery_time`, `delivery_radius`, `for_two`, `mon`, `mon_opentime`, `mon_closetime`, `tue`, `tue_opentime`, `tue_closetime`, `wed`, `wed_opentime`, `wed_closetime`, `thu`, `thu_opentime`, `thu_closetime`, `fri`, `fri_opentime`, `fri_closetime`, `sat`, `sat_opentime`, `sat_closetime`, `sun`, `sun_opentime`, `sun_closetime`, `is_veg`, `active`, `user_id`, `foodtype_id`, `created_at`, `updated_at`) VALUES
(8, 'harsh', 'dsadsazdfsadsadsad', 's4TBBMH3XlJ216w9oTOSRW20mcLsx09QHkS9IC6f.webp', '09773207180', 'paragkavar@gmail.com', NULL, 10, 10, 10, 'on', NULL, NULL, 'on', NULL, NULL, 'on', NULL, NULL, 'on', NULL, NULL, 'on', NULL, NULL, 'on', NULL, NULL, 'on', NULL, NULL, 'on', 'on', 2, 1, '2021-04-13 06:52:23', '2021-04-13 08:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_addresses`
--

CREATE TABLE `restaurant_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(11) NOT NULL,
  `city` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` decimal(8,2) DEFAULT NULL,
  `long` decimal(8,2) DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_addresses`
--

INSERT INTO `restaurant_addresses` (`id`, `name`, `address`, `pincode`, `city`, `lat`, `long`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(8, 'harsh', 'modpar', 363640, 'morbi', '10.00', '10.00', 8, '2021-04-13 06:52:23', '2021-04-13 08:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reciever_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(151) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `usertype`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '+123456890', 'admin', 'admin@gmail.com', NULL, '123456789', NULL, '2021-04-09 23:43:38', NULL),
(2, 'harsh', '+123456890', 'owner', 'owner1@gmail.com', NULL, '123456789', NULL, '2021-04-09 23:43:38', NULL),
(3, 'dhiraj', '+123456890', 'owner', 'owner2@gmail.com', NULL, '123456789', NULL, '2021-04-09 23:43:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wepppi_order_reqs`
--

CREATE TABLE `wepppi_order_reqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `follow_up_id` bigint(20) UNSIGNED NOT NULL,
  `wepppi_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(151) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drink` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_instruction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addons_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `addons_addons_category_id_foreign` (`addons_category_id`);

--
-- Indexes for table `addons_categories`
--
ALTER TABLE `addons_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blocks_reciever_id_foreign` (`reciever_id`),
  ADD KEY `blocks_sender_id_foreign` (`sender_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_code_unique` (`coupon_code`),
  ADD KEY `coupons_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dishes_addons_category_id_foreign` (`addons_category_id`),
  ADD KEY `dishes_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `dishes_dish_category_id_foreign` (`dish_category_id`);

--
-- Indexes for table `dish_categories`
--
ALTER TABLE `dish_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dish_categories_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dislikes_review_id_foreign` (`review_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favourite_restaurants`
--
ALTER TABLE `favourite_restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourite_restaurants_user_id_foreign` (`user_id`);

--
-- Indexes for table `favourite_wepppis`
--
ALTER TABLE `favourite_wepppis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourite_wepppis_user_id_foreign` (`user_id`);

--
-- Indexes for table `follow_ups`
--
ALTER TABLE `follow_ups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follow_ups_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `follow_ups_request_by_foreign` (`request_by`),
  ADD KEY `follow_ups_order_id_foreign` (`order_id`);

--
-- Indexes for table `foodtypes`
--
ALTER TABLE `foodtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_review_id_foreign` (`review_id`);

--
-- Indexes for table `live_requests`
--
ALTER TABLE `live_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `live_requests_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `live_requests_request_by_foreign` (`request_by`);

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
-- Indexes for table `patnerwithuses`
--
ALTER TABLE `patnerwithuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patnerwithuses_user_id_foreign` (`user_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promotions_promotion_code_unique` (`promotion_code`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurants_user_id_foreign` (`user_id`),
  ADD KEY `restaurants_foodtype_id_foreign` (`foodtype_id`);

--
-- Indexes for table `restaurant_addresses`
--
ALTER TABLE `restaurant_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_addresses_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_reciever_id_foreign` (`reciever_id`),
  ADD KEY `reviews_sender_id_foreign` (`sender_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wepppi_order_reqs`
--
ALTER TABLE `wepppi_order_reqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wepppi_order_reqs_follow_up_id_foreign` (`follow_up_id`),
  ADD KEY `wepppi_order_reqs_wepppi_id_foreign` (`wepppi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `addons_categories`
--
ALTER TABLE `addons_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dish_categories`
--
ALTER TABLE `dish_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourite_restaurants`
--
ALTER TABLE `favourite_restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourite_wepppis`
--
ALTER TABLE `favourite_wepppis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow_ups`
--
ALTER TABLE `follow_ups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `foodtypes`
--
ALTER TABLE `foodtypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `live_requests`
--
ALTER TABLE `live_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `patnerwithuses`
--
ALTER TABLE `patnerwithuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `restaurant_addresses`
--
ALTER TABLE `restaurant_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wepppi_order_reqs`
--
ALTER TABLE `wepppi_order_reqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addons`
--
ALTER TABLE `addons`
  ADD CONSTRAINT `addons_addons_category_id_foreign` FOREIGN KEY (`addons_category_id`) REFERENCES `addons_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `addons_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blocks`
--
ALTER TABLE `blocks`
  ADD CONSTRAINT `blocks_reciever_id_foreign` FOREIGN KEY (`reciever_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blocks_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
