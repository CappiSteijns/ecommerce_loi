-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2025 at 03:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

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
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2021-02-02 14:36:52', '$2y$10$jMpKEXI7/23Gn78XFm/.yuDTPgHmtegPUK89X1QG5lWrzgSCBO8By', 'POcmttlUlGhjf6y6vJXTc4ScKjj0hYMle04Effzw02gWnDkomrfsh8kSxJfd', NULL, '202507311104p18.jpg', '2021-02-02 14:36:52', '2025-07-31 09:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name_en` varchar(255) NOT NULL,
  `brand_name_hin` varchar(255) NOT NULL,
  `brand_slug_en` varchar(255) NOT NULL,
  `brand_slug_hin` varchar(255) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_en`, `brand_name_hin`, `brand_slug_en`, `brand_slug_hin`, `brand_image`, `created_at`, `updated_at`) VALUES
(1, 'Douwe Egberts', 'Douwe Egberts', 'douwe-egberts', '', 'upload/brand/1827549562350787.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(255) NOT NULL,
  `category_name_nl` varchar(255) NOT NULL,
  `category_slug_en` varchar(255) NOT NULL,
  `category_slug_nl` varchar(255) NOT NULL,
  `category_icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_en`, `category_name_nl`, `category_slug_en`, `category_slug_nl`, `category_icon`, `created_at`, `updated_at`) VALUES
(1, 'Brood & Gebak', 'Brood & Gebak', 'brood-&-gebak', 'Brood-&-Gebak', 'fa fa-id-card-o', NULL, '2025-07-27 14:07:47'),
(2, 'Koffie & Thee', 'Koffie & Thee', '', '', 'fa fa-id-card-o', NULL, NULL),
(11, 'Diepvries', 'Diepvries', '', '', 'fa fa-id-card-o', NULL, NULL);

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_02_02_203839_create_sessions_table', 1),
(7, '2021_02_02_212221_create_admins_table', 1),
(8, '2024_12_18_225930_create_brands_table', 1),
(9, '2024_12_28_195720_create_categories_table', 1),
(10, '2025_01_03_182450_create_sub_categories_table', 1),
(11, '2025_01_04_143212_create_sub_sub_categories_table', 1),
(12, '2025_01_13_164801_create_products_table', 1),
(13, '2025_01_13_170757_create_multi_imgs_table', 1),
(14, '2025_03_06_211402_create_sliders_table', 1),
(15, '2025_04_17_141403_create_shippings_table', 2),
(16, '2025_04_18_110319_add_street_address_to_shippings_table', 3),
(17, '2025_04_18_133341_create_orders_table', 4),
(18, '2025_04_18_133625_create_order_items_table', 4),
(19, '2025_04_18_175004_add_delivery_fields_to_orders_table', 5),
(20, 'xxxx_xx_xx_xxxxxx_add_delivery_fields_to_orders_table', 5),
(22, '2025_04_18_175719_add_delivery_day_and_time_to_orders_table', 6),
(23, '2025_04_25_120952_create_shippings_table', 7),
(24, '2025_04_25_130005_create_orders_table', 8),
(25, '2025_04_25_130146_create_order_items_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'upload/products/multi-image/1827549965784013.jpg', '2025-03-25 06:24:24', NULL),
(2, 2, 'upload/products/multi-image/1827549988619882.jpg', '2025-03-25 06:24:46', NULL),
(3, 3, 'upload/products/multi-image/1827550000676399.jpg', '2025-03-25 06:24:57', NULL),
(4, 4, 'upload/products/multi-image/1827550024030896.jpg', '2025-03-25 06:25:19', NULL),
(5, 5, 'upload/products/multi-image/1827550046566690.jpg', '2025-03-25 06:25:41', NULL),
(12, 8, 'upload/products/multi-image/1831448973620684.jpg', '2025-05-07 06:17:28', NULL),
(13, 8, 'upload/products/multi-image/1831449227636285.jpg', '2025-05-07 06:17:28', '2025-05-07 06:21:30'),
(15, 9, 'upload/products/multi-image/1839160101863449.jpg', '2025-07-31 09:02:33', NULL),
(16, 9, 'upload/products/multi-image/1839160102003710.jpg', '2025-07-31 09:02:33', NULL),
(17, 9, 'upload/products/multi-image/1839160102091487.jpg', '2025-07-31 09:02:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `shipping_name` varchar(255) DEFAULT NULL,
  `shipping_email` varchar(255) DEFAULT NULL,
  `shipping_phone` varchar(255) DEFAULT NULL,
  `street_name` varchar(255) DEFAULT NULL,
  `house_number` varchar(255) DEFAULT NULL,
  `house_number_suffix` varchar(255) DEFAULT NULL,
  `post_code` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `delivery_day` varchar(255) DEFAULT NULL,
  `delivery_time` varchar(255) DEFAULT NULL,
  `delivery_cost` decimal(8,2) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_month` varchar(255) NOT NULL,
  `order_year` varchar(255) NOT NULL,
  `confirmed_date` varchar(255) DEFAULT NULL,
  `processing_date` varchar(255) DEFAULT NULL,
  `picked_date` varchar(255) DEFAULT NULL,
  `shipped_date` varchar(255) DEFAULT NULL,
  `delivered_date` varchar(255) DEFAULT NULL,
  `cancel_date` varchar(255) DEFAULT NULL,
  `return_date` varchar(255) DEFAULT NULL,
  `return_reason` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `division_id`, `district_id`, `state_id`, `shipping_name`, `shipping_email`, `shipping_phone`, `street_name`, `house_number`, `house_number_suffix`, `post_code`, `city`, `province`, `delivery_day`, `delivery_time`, `delivery_cost`, `notes`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `order_number`, `invoice_no`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `cancel_date`, `return_date`, `return_reason`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, NULL, NULL, NULL, 'User', 'user@gmail.com', '0683227422', 'Schalmeistraat', '28', NULL, '6217EW', 'Maastricht', 'Limburg', 'Tuesday', '19:00 - 21:00', NULL, 'Dit is een test', 'Stripe', 'Stripe', 'txn_3RJyVKH0p25G9Jys0l8Ya2fF', 'usd', 4.00, '68138b23b6ad5', 'EOS88443465', '01 May 2025', 'May', '2025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2025-05-01 12:54:31', NULL),
(5, 1, NULL, NULL, NULL, 'User', 'user@gmail.com', '0683227422', 'asdasd', 'asdas', NULL, 'dasdasd', 'asdasd', 'asdas', 'Thursday', '16:00 - 22:00', NULL, 'dasdasd', 'Stripe', 'Stripe', 'txn_3RJynHH0p25G9Jys1rtFvL9T', 'usd', 2.00, '68138f7d8cd6f', 'EOS73080559', '01 May 2025', 'May', '2025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2025-05-01 13:13:02', NULL),
(6, 1, NULL, NULL, NULL, 'User', 'user@gmail.com', '0683227422', '`12', '`12', NULL, '`12', '`12', '`12', 'Wednesday', '19:00 - 21:00', 7.50, '`12', 'Stripe', 'Stripe', 'txn_3RJyrGH0p25G9Jys0QJcri35', 'usd', 2.00, '6813907427a0b', 'EOS74832226', '01 May 2025', 'May', '2025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2025-05-01 13:17:09', NULL),
(7, 1, NULL, NULL, NULL, 'User', 'user@gmail.com', '0683227422', 'sdfsdfs', 'dfsdf', NULL, 'sdf', 'sdfs', 'dfsd', 'Tuesday', '20:00 - 22:00', 7.50, 'fsdf', 'Stripe', 'Stripe', 'txn_3RJywIH0p25G9Jys1iYPdXIw', 'usd', 9.50, '681391aca1dd5', 'EOS20009047', '01 May 2025', 'May', '2025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2025-05-01 13:22:21', NULL),
(8, 1, NULL, NULL, NULL, 'User', 'user@gmail.com', '0683227422', 'sdfsdf', 'sf', NULL, 'sdf', 'sdf', 'sdf', 'Wednesday', '16:00 - 22:00', 6.95, 'sdf', 'Stripe', 'Stripe', 'txn_3RJz16H0p25G9Jys0YxXukYk', 'usd', 8.95, '681392d6aa25c', 'EOS65357433', '01 May 2025', 'May', '2025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2025-05-01 13:27:19', NULL),
(9, 1, NULL, NULL, NULL, 'User', 'user@gmail.com', '0683227422', 'Schalmeistraat', '11311223123', NULL, '12', 'Maastricht', 'Limburg', 'Friday', '20:00 - 22:00', 7.50, '1212', 'Stripe', 'Stripe', 'txn_3RM3q2H0p25G9Jys10XBpcjk', 'usd', 9.50, '681b212c4495b', 'EOS19163480', '07 May 2025', 'May', '2025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2025-05-07 07:00:31', NULL),
(10, 1, NULL, NULL, NULL, 'User', 'user@gmail.com', '0683227422', '123', '123', NULL, '123', '123', '123', 'Tuesday', '08:00 - 12:00', 4.95, '123', 'Stripe', 'Stripe', 'txn_3Rd7yWH0p25G9Jys0GVHeCY8', 'usd', 6.95, '685931c3416a8', 'EOS18351048', '23 June 2025', 'June', '2025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2025-06-23 08:51:50', NULL),
(11, 1, NULL, NULL, NULL, 'User', 'user@gmail.com', '0683227422', '123', '123', NULL, '1231', '1231', '123', 'Thursday', '19:00 - 21:00', 7.50, '123', 'Stripe', 'Stripe', 'txn_3Rd84oH0p25G9Jys0cA7GGYu', 'usd', 11.50, '685933495215a', 'EOS10794609', '23 June 2025', 'June', '2025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2025-06-23 08:58:18', NULL),
(12, 20, NULL, NULL, NULL, 'Julian', 'test@gmail.com', '8763482376', 'Schalmeistraat', '28', NULL, '6217EW', 'Maastricht', 'Limburg', 'Thursday', '19:00 - 21:00', 7.50, 'Dit is een test notitie', 'Stripe', 'Stripe', 'txn_3Rq8y4H0p25G9Jys1eoGKjvn', 'usd', 9.50, '68888740ed2aa', 'EOS80447119', '29 July 2025', 'July', '2025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2025-07-29 06:33:07', NULL),
(13, 21, NULL, NULL, NULL, 'Julian', 'juliansteijns871999@gmail.com', '0683227422', 'Schalmeistraat', '11', NULL, '6346', 'Maastricht', 'Limburg', 'Friday', '20:00 - 22:00', 7.50, NULL, 'Stripe', 'Stripe', 'txn_3RquX5H0p25G9Jys0dNG2K07', 'usd', 13.50, '688b5178381ca', 'EOS78618475', '31 July 2025', 'July', '2025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2025-07-31 09:20:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `qty` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `color`, `size`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(3, 4, 7, NULL, NULL, '2', 2.00, '2025-05-01 12:54:31', NULL),
(4, 5, 7, NULL, NULL, '1', 2.00, '2025-05-01 13:13:02', NULL),
(5, 6, 7, NULL, NULL, '1', 2.00, '2025-05-01 13:17:09', NULL),
(6, 7, 7, NULL, NULL, '1', 2.00, '2025-05-01 13:22:21', NULL),
(7, 8, 7, NULL, NULL, '1', 2.00, '2025-05-01 13:27:19', NULL),
(8, 9, 8, NULL, NULL, '1', 2.00, '2025-05-07 07:00:31', NULL),
(9, 10, 8, NULL, NULL, '1', 2.00, '2025-06-23 08:51:50', NULL),
(10, 11, 8, NULL, NULL, '2', 2.00, '2025-06-23 08:58:18', NULL),
(11, 12, 8, NULL, NULL, '1', 2.00, '2025-07-29 06:33:07', NULL),
(12, 13, 9, NULL, NULL, '2', 3.00, '2025-07-31 09:20:27', NULL);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_id` int(11) NOT NULL,
  `product_name_en` varchar(255) NOT NULL,
  `product_name_nl` varchar(255) NOT NULL,
  `product_slug_en` varchar(255) NOT NULL,
  `product_slug_nl` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_qty` varchar(255) NOT NULL,
  `product_tags_en` varchar(255) NOT NULL,
  `product_tags_nl` varchar(255) NOT NULL,
  `product_size_en` varchar(255) DEFAULT NULL,
  `product_size_nl` varchar(255) DEFAULT NULL,
  `product_color_en` varchar(255) DEFAULT NULL,
  `product_color_nl` varchar(255) DEFAULT NULL,
  `selling_price` varchar(255) NOT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `short_descp_en` varchar(255) NOT NULL,
  `short_descp_nl` varchar(255) NOT NULL,
  `long_descp_en` varchar(700) NOT NULL,
  `long_descp_nl` varchar(700) NOT NULL,
  `product_thambnail` varchar(255) NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_en`, `product_name_nl`, `product_slug_en`, `product_slug_nl`, `product_code`, `product_qty`, `product_tags_en`, `product_tags_nl`, `product_size_en`, `product_size_nl`, `product_color_en`, `product_color_nl`, `selling_price`, `discount_price`, `short_descp_en`, `short_descp_nl`, `long_descp_en`, `long_descp_nl`, `product_thambnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(8, 1, 1, 1, 1, 'Broodgeluk - Rond Fijn Volkoren', 'Broodgeluk - Rond Fijn Volkoren', 'broodgeluk---rond-fijn-volkoren', 'Broodgeluk---Rond-Fijn-Volkoren', '123123', '27', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Small,Midium,Large', 'Small,Midium,Large', 'red,Black,Amet', 'red,Black,Large', '3', '2', 'Broodgeluk Rond Fijn Volkoren.', 'Broodgeluk Rond Fijn Volkoren.', '<div class=\"jum-collapsible open\">\r\n<div>\r\n<div class=\"content\" id=\"jum-collapsible-5\" style=\"height:auto; position:relative; visibility:visible; width:100%\">\r\n<div class=\"text-body\">\r\n<p>Heb je ons heerlijke, knapperige brood al geproefd? In ons vernieuwde recept kneden we de beste granen tot een heerlijk luchtig deeg, waarna we de oven zijn magie laten doen. Het resultaat? Elke dag knapperig vers brood, de lekkerste broodjes en maar liefst 17 soorten brood met elk een eigen, unieke smaak.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>', '<div class=\"jum-collapsible open\">\r\n<div>\r\n<div class=\"content\" id=\"jum-collapsible-5\" style=\"height:auto; position:relative; visibility:visible; width:100%\">\r\n<div class=\"text-body\">\r\n<p>Heb je ons heerlijke, knapperige brood al geproefd? In ons vernieuwde recept kneden we de beste granen tot een heerlijk luchtig deeg, waarna we de oven zijn magie laten doen. Het resultaat? Elke dag knapperig vers brood, de lekkerste broodjes en maar liefst 17 soorten brood met elk een eigen, unieke smaak.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>', 'upload/products/thambnail/1831448973510842.jpg', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(9, 1, 11, 9, 9, 'Pizza Tonijn', 'Pizza Tonijn', 'pizza-tonijn', 'Pizza-Tonijn', '12376', '12', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet,Pizzas', 'Small,Midium,Large', 'Small,Midium,Large', 'red,Black,Amet', 'red,Black,Large', '4', '3', 'Gezonde pizza', 'Gezonde pizza', '<p>Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;</p>', '<p>Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;Gezonde pizza&nbsp;</p>', 'upload/products/thambnail/1839160101579906.jpg', NULL, NULL, NULL, NULL, 1, NULL, '2025-07-31 09:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('LjIEy90atN8bbFc9htGOVdo21BQ9OqqHBjYDbBjt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVE8yT09FdXd3RnNmMkpManMyckVaclU4V2hxQmhNa3pXNEdpY2d3eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753968080),
('w0UQPc5jQtecjTrWZiuufT4zyXAePPsPYSSH0Oq8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMlFUQkZpU1UxdlB2R3RNeTNMN29YNDJlQlNwSnNwRGpDd3pibENSNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoiY2FydCI7YTowOnt9czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRrZ3hlajN5WTBtNGNDbTRsVlNhNTguOTRkc3BPZU5hcVNDbWpJQXBzTDAwcTFzRncyR0xHMiI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAka2d4ZWozeVkwbTRjQ200bFZTYTU4Ljk0ZHNwT2VOYXFTQ21qSUFwc0wwMHExc0Z3MkdMRzIiO30=', 1753960882);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_img` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name_en` varchar(255) NOT NULL,
  `subcategory_name_nl` varchar(255) NOT NULL,
  `subcategory_slug_en` varchar(255) NOT NULL,
  `subcategory_slug_nl` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name_en`, `subcategory_name_nl`, `subcategory_slug_en`, `subcategory_slug_nl`, `created_at`, `updated_at`) VALUES
(1, 1, 'Broden', 'Broden', 'broden', 'Broden', NULL, NULL),
(2, 2, 'Koffie', 'Koffie', 'koffie', 'Koffie', NULL, NULL),
(3, 2, 'Thee', 'Thee', 'thee', 'Thee', NULL, NULL),
(4, 1, 'Gebak', 'Gebak', 'gebak', 'Gebak', NULL, NULL),
(8, 11, 'Snacks', 'Snacks', 'snacks', 'Snacks', NULL, NULL),
(9, 11, 'Pizza', 'Pizza', 'pizza', 'Pizza', NULL, '2025-07-31 08:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_name_en` varchar(255) NOT NULL,
  `subsubcategory_name_nl` varchar(255) NOT NULL,
  `subsubcategory_slug_en` varchar(255) NOT NULL,
  `subsubcategory_slug_nl` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name_en`, `subsubcategory_name_nl`, `subsubcategory_slug_en`, `subsubcategory_slug_nl`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Volkoren Brood', 'Volkoren Brood', 'Volkoren_Brood', 'Volkoren_Brood', NULL, NULL),
(2, 1, 1, 'Wit Brood', 'Wit Brood', '', '', NULL, NULL),
(3, 2, 2, 'Koffiebonen', 'Koffiebonen', '', '', NULL, NULL),
(4, 2, 2, 'Oploskoffie', 'Oploskoffie', '', '', NULL, NULL),
(8, 11, 8, 'Oven Snacks', 'Oven Snacks', '', '', NULL, NULL),
(9, 11, 9, 'Oven Pizza\'s', 'Oven Pizza\'s', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', '0683227422', NULL, '$2y$10$jMpKEXI7/23Gn78XFm/.yuDTPgHmtegPUK89X1QG5lWrzgSCBO8By', NULL, NULL, NULL, NULL, '202507290749p1.jpg', '2021-02-02 13:54:02', '2025-07-29 05:49:29'),
(21, 'Julian', 'juliansteijns871999@gmail.com', '0683227422', NULL, '$2y$10$kgxej3yY0m4cCm4lVSa58.94dspOeNaqSCmjIApsL00q1sFw2GLG2', NULL, NULL, NULL, NULL, '202507311113p10.jpg', '2025-07-31 09:12:36', '2025-07-31 09:16:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
