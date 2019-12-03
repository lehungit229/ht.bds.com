-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2019 at 07:12 AM
-- Server version: 5.7.20
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `canonical` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catalogueid` int(11) DEFAULT NULL,
  `catalogue` text COLLATE utf8_unicode_ci,
  `tag` text COLLATE utf8_unicode_ci,
  `order` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `album` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `viewed` int(11) DEFAULT NULL,
  `publish` tinyint(1) DEFAULT NULL,
  `publish_time` datetime DEFAULT NULL,
  `meta_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userid_created` int(11) DEFAULT NULL,
  `userid_updated` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `amp` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `name`, `slug`, `canonical`, `catalogueid`, `catalogue`, `tag`, `order`, `image`, `album`, `description`, `viewed`, `publish`, `publish_time`, `meta_name`, `meta_keyword`, `meta_description`, `userid_created`, `userid_updated`, `created_at`, `updated_at`, `amp`) VALUES
(1, 'test1', NULL, 'test', 1, NULL, NULL, NULL, NULL, NULL, '<p>1231</p>', NULL, 0, NULL, 'test11', NULL, 'test11', NULL, NULL, '2019-11-22 01:21:08', '2019-11-22 01:23:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article_catalogues`
--

CREATE TABLE `article_catalogues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `canonical` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` tinyint(4) DEFAULT NULL,
  `parentid` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `userid_created` int(11) DEFAULT NULL,
  `userid_updated` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_catalogues`
--

INSERT INTO `article_catalogues` (`id`, `name`, `slug`, `description`, `canonical`, `meta_name`, `meta_description`, `image`, `publish`, `parentid`, `level`, `lft`, `rgt`, `userid_created`, `userid_updated`, `created_at`, `updated_at`) VALUES
(1, 'nổi bật', NULL, '<p>123</p>', 'noi-bat', 'nỏi bật 1', 'mô tả 123', NULL, 0, 0, 1, 2, 5, NULL, NULL, '2019-11-21 17:49:55', '2019-11-21 17:58:54'),
(2, 'Tin quốc tế', NULL, '<p>nóng bỏng</p>', 'tin-quoc-te', 'ti n quốc tế 1', 'ti n quốc tế 1111', NULL, 0, 1, 2, 3, 4, NULL, NULL, '2019-11-21 17:59:29', '2019-11-21 18:00:04');

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
(7, '2014_10_12_000000_create_users_catalogue_table', 1),
(13, '2014_10_12_000000_create_users_table', 2),
(14, '2019_11_08_040006_create_user_catalogues_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `router`
--

CREATE TABLE `router` (
  `id` int(11) NOT NULL,
  `canonical` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `crc32` bigint(20) DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `param` tinytext COLLATE utf8_unicode_ci,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userid_created` int(11) DEFAULT NULL,
  `userid_updated` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `router`
--

INSERT INTO `router` (`id`, `canonical`, `crc32`, `uri`, `param`, `type`, `meta_title`, `meta_keyword`, `meta_description`, `userid_created`, `userid_updated`, `created`, `updated`) VALUES
(1, 'noi-bat', 434161435, 'article/frontend/catalogue/view', '1', 'number', NULL, NULL, NULL, NULL, NULL, '2019-11-21 22:03:22', NULL),
(2, 'noi-bat', 434161435, 'article/frontend/catalogue/view', '1', 'number', NULL, NULL, NULL, NULL, NULL, '2019-11-22 07:49:55', NULL),
(3, 'tin-quoc-te', 2604896668, 'article/frontend/catalogue/view', '2', 'number', NULL, NULL, NULL, NULL, NULL, '2019-11-22 07:59:29', NULL),
(4, 'test', 3632233996, 'article/frontend//view', '1', 'number', NULL, NULL, NULL, NULL, NULL, '2019-11-22 08:21:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catalogue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `married` tinyint(4) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remote_addr` int(11) DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `userid_created` int(11) DEFAULT NULL,
  `userid_updated` int(11) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `otp_time_live` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `catalogue`, `name`, `email`, `password`, `phone`, `address`, `gender`, `married`, `birthday`, `avatar`, `note`, `remote_addr`, `user_agent`, `last_login`, `userid_created`, `userid_updated`, `otp`, `otp_time_live`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '7', 'Gloria Strosinnd', 'kaitlyn.leuschke@example.net', '', '+1997347708922', '2463 VonRueden Gateway Suite 260\nNew Alex, MS 47587-2244', 1, 0, '1983-04-13 17:13:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-08 20:59:04', NULL),
(2, '4', 'Mr. Quentin Larson', 'gusikowski.salma@example.com', '', '+3362707113320', '43495 Natalie Prairie\nPort Antoniettaside, NC 16414', 2, 0, '1983-07-22 12:54:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(3, '6', 'Dr. Cheyanne Schmeler DVM', 'hprosacco@example.org', '', '+5279639658839', '329 Ocie Ramp Apt. 885\nHoytberg, LA 21505-6723', 1, 0, '2015-10-23 16:31:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(4, '2', 'Torrey Farrell PhD', 'quitzon.alexandra@example.com', '', '+3947543905921', '423 Rashawn Cove\nLake Marilou, TN 56222-7484', 2, 0, '1980-07-19 05:42:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(5, '7', 'Orrin Boyle', 'allison.mohr@example.org', '', '+9818430366556', '558 Considine Heights Suite 063\nNew Melissa, FL 71167-9028', 1, 1, '1990-10-10 08:20:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(6, '6', 'Giovanni McLaughlin', 'hane.cullen@example.net', '', '+7043003500203', '6732 Enrico Port\nEast Vickyfurt, HI 46899', 2, 0, '1975-03-12 10:29:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(7, '7', 'Donald Harber', 'rosetta.sauer@example.org', '', '+5183763536170', '99468 Nicolas Mission Apt. 958\nHollieborough, MO 26028', 0, 1, '1972-01-09 05:38:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(8, '6', 'Dane Kerluke', 'sierra.hagenes@example.org', '', '+1318743109034', '5628 Ernser Grove\nBahringerhaven, OR 93121', 2, 0, '2012-12-07 23:51:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(9, '5', 'Floy Toy', 'eondricka@example.com', '', '+4802768035295', '2589 Moore Glens\nGusikowskiborough, FL 71005-5461', 2, 1, '1985-02-07 11:54:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(10, '8', 'Dr. Mathew Ryan', 'armani.konopelski@example.org', '', '+6919204121193', '4140 Mittie Brooks\nNew Lafayette, LA 56882', 2, 2, '1984-03-22 10:37:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(11, '9', 'Dr. Cortney Goldner III', 'dooley.arianna@example.com', '', '+5213489814005', '87748 Smitham Views\nAssuntafort, MI 23272-2458', 2, 2, '1971-11-10 15:22:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(12, '8', 'Gilda Fritsch', 'daisha35@example.com', '', '+9529856780671', '7271 Heathcote Centers Suite 923\nNew Joycefurt, NM 82584-5281', 1, 0, '1981-01-06 05:28:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(13, '1', 'Ayana Jacobi', 'qkub@example.com', '', '+3431959365436', '5049 Schmeler Glen Apt. 900\nNew Adrielview, NC 56534', 2, 0, '2004-03-24 23:20:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(14, '10', 'Braden Koepp', 'jayde24@example.com', '', '+3682653543059', '303 Jeanie Centers Apt. 367\nGarettfort, AR 47681-4928', 2, 1, '1992-06-28 22:41:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(15, '6', 'Prof. Marcia Effertz Sr.', 'leuschke.reese@example.org', '', '+5678654008374', '8382 Spinka Brook Apt. 423\nArvillaside, MA 57719-7798', 0, 2, '2016-05-14 20:00:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(16, '1', 'Delia Medhurst PhD', 'zlowe@example.org', '', '+8724494016899', '817 Keeling Parks Suite 508\nSwiftville, VT 38734-1517', 0, 2, '2006-10-23 23:37:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(17, '4', 'Ms. Bailee Ward', 'durgan.ford@example.com', '', '+1189039679026', '658 Pacocha Ranch Suite 344\nSouth Alexane, TN 57405-5552', 1, 1, '2013-08-27 12:32:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(18, '4', 'Rosella Sawayn', 'stiedemann.krystina@example.com', '', '+4648545119082', '612 Braxton Mill Apt. 200\nNicholebury, MO 79418', 2, 1, '1998-09-03 18:02:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(19, '10', 'Monique Douglas', 'cummerata.marjorie@example.org', '', '+6703465422039', '3915 Ward Valley Apt. 745\nNaomiefort, GA 07897-6004', 1, 2, '1984-01-15 04:56:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(20, '6', 'Carmelo Abshire', 'schroeder.roslyn@example.org', '', '+5950070236795', '91315 Nikolaus Locks\nMoseport, WY 90198', 1, 1, '2012-08-04 19:17:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(21, '1', 'Lucienne Russel', 'nels10@example.net', '', '+5304755249055', '1095 Golda Haven\nMoenton, FL 11132', 1, 0, '1988-08-29 11:51:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(22, '7', 'Elvie Kerluke', 'smills@example.org', '', '+6391205360270', '93975 Janiya Club\nMinervachester, ID 35697', 0, 1, '2016-04-11 22:45:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(23, '3', 'Prof. Elenora Mohr IV', 'emacejkovic@example.org', '', '+4309467811061', '331 Tianna Lane\nPort Royceborough, DC 48357', 2, 1, '1999-06-04 11:40:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(24, '3', 'Hudson Wolf', 'rullrich@example.org', '', '+1833776726552', '723 Marvin Glens\nVivienville, NM 48579', 1, 2, '2009-07-18 14:17:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(25, '10', 'Lily Hegmann', 'kaya10@example.net', '', '+7394315570281', '83078 Wehner Junction\nNew Susanshire, CT 36103', 1, 0, '2015-12-02 20:45:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(26, '7', 'Malcolm Wisozk', 'bcarroll@example.org', '', '+7015608256228', '94907 Fahey Green\nNorth Karineport, WI 00689', 0, 0, '1984-05-15 11:47:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(27, '3', 'Karlie Kuvalis', 'mabelle73@example.com', '', '+9891007479799', '506 Robb Light Suite 568\nSouth Halmouth, NE 13849-6060', 0, 2, '2002-01-19 15:44:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(28, '1', 'Dr. Makenzie Medhurst DVM', 'koepp.cecelia@example.net', '', '+4539790617518', '482 Pfannerstill Canyon Apt. 769\nEast Bernard, VA 04460', 1, 2, '1979-12-13 15:58:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(29, '4', 'Cullen White', 'shirley69@example.org', '', '+6166247953493', '7380 Runolfsdottir Parkways Apt. 041\nDillanfurt, NE 87889-6421', 2, 2, '2013-10-22 09:55:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(30, '6', 'Ransom Gislason', 'deichmann@example.org', '', '+3714037555288', '3839 Vicky Mission Apt. 531\nPort Wavabury, PA 73881', 2, 1, '1999-07-16 18:43:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(31, '10', 'Clotilde Mayert', 'sherman86@example.net', '', '+6169503665924', '41213 Mabel Fort\nSatterfieldmouth, VA 39749-1597', 2, 2, '1974-06-19 09:49:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(32, '10', 'Theodore Thompson III', 'paucek.rudolph@example.com', '', '+4891890379307', '2070 Crooks River Suite 789\nNew Constantinborough, IA 98189', 2, 2, '1989-12-08 16:40:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(33, '5', 'Domenico Hickle', 'ukub@example.net', '', '+1669042453970', '44380 Sadye Alley Apt. 863\nNellieshire, MO 49667', 1, 2, '1983-05-16 18:54:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(34, '8', 'Mrs. Trisha Reinger', 'block.armani@example.org', '', '+4548946732446', '968 Olson Ville\nNorth Lexusland, KS 94801-4060', 1, 2, '1995-10-28 10:47:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(35, '4', 'Dr. Kaden Kirlin MD', 'hhand@example.net', '', '+9882487907493', '175 Kirlin Dale\nNorth Treyton, AL 50095', 2, 1, '2008-05-15 16:57:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(36, '9', 'Prof. Alyce Bruen IV', 'okon.zora@example.com', '', '+8894716482583', '367 Barrows Hollow\nDurganland, HI 10009-0122', 0, 0, '1984-07-26 12:32:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(37, '6', 'Ahmed Emmerich', 'jacobi.wilton@example.net', '', '+4417738767550', '54141 Mertz Divide\nSouth Jeffry, OH 42043', 2, 2, '1983-11-28 06:20:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(38, '2', 'Kasey Okuneva', 'klynch@example.net', '', '+5825248195048', '5252 King Forges Apt. 092\nTurcotteberg, HI 67122-3756', 0, 0, '1998-01-25 13:45:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(39, '1', 'Betsy Lakin', 'trisha.harber@example.org', '', '+8678868987864', '54022 Boyer River\nZakaryville, WI 78712', 2, 1, '1998-07-25 21:28:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(40, '7', 'Nicole Von III', 'hahn.cathryn@example.net', '', '+2131994044014', '7438 Kirlin Brook Suite 901\nPort Ottohaven, GA 81846', 1, 2, '2015-05-26 12:07:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(41, '2', 'Kristian Mann', 'lyda.kreiger@example.org', '', '+7620605428244', '7380 Angela Manors\nSchuppefurt, CO 68696-5721', 2, 2, '1979-04-16 20:41:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(42, '3', 'Otis Kassulke', 'gaylord23@example.com', '', '+3265896010100', '11379 May Bypass Suite 637\nPetrafurt, OH 15071', 2, 2, '1973-05-14 19:02:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(43, '4', 'Earnestine Kihn', 'alysha.bauch@example.net', '', '+3917948198651', '49498 Harley Terrace\nIsaiburgh, AL 62805-1148', 2, 1, '1991-10-02 00:04:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(44, '2', 'Ellsworth Ernser PhD', 'bashirian.danial@example.com', '', '+2615329420976', '7797 Hintz Light\nNorth Hildegard, ID 35246-5561', 2, 1, '1984-06-04 19:48:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(45, '2', 'Damaris Feeney', 'hickle.trystan@example.com', '', '+3009805839012', '8987 Lueilwitz Summit\nWest Lola, CA 40021', 0, 2, '2009-08-27 11:07:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(46, '7', 'Armani Jerde', 'randi04@example.org', '', '+3919619710230', '13219 Greenfelder Burg Apt. 987\nSouth Thaliashire, WA 94473-2090', 1, 2, '2008-04-09 07:40:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(47, '10', 'Alene Lang', 'roob.jena@example.org', '', '+2082056097678', '68978 Eva Wall\nStiedemannshire, OK 25189-1623', 2, 1, '1990-09-15 09:07:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(48, '4', 'Prof. Brain Huel', 'mfunk@example.com', '', '+8997670128510', '32501 Metz Mills\nPort Dana, GA 30757-2074', 1, 2, '2011-03-23 23:46:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(49, '5', 'Urban Mante I', 'dariana84@example.com', '', '+3675504968164', '9235 Kris Street\nGersonton, FL 87121', 2, 0, '2001-01-11 03:44:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(50, '9', 'Beaulah Roob', 'emard.kenneth@example.org', '', '+1372481866600', '4382 Stiedemann Pike\nBeahanland, MA 97600', 0, 2, '1979-01-10 03:53:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-07 21:44:59', '2019-11-07 21:44:59', NULL),
(51, '', 'test@gamil.com', 'test@gamil.com', '111111', '09876789', '21', 1, NULL, '1213-12-21 00:00:00', NULL, '212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-08 21:19:35', '2019-11-08 21:24:32', NULL),
(52, NULL, 'nd', 'teset2', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-08 21:26:59', '2019-11-11 01:29:53', NULL),
(53, NULL, 'test3@gmail.com', 'test3@gmail.com', '111111', '0987896567', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-08 21:28:36', '2019-11-08 21:28:36', NULL),
(54, '', 'teaasd@gmail.com', 'teaasd@gmail.com', '3', '1213121212', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-08 21:32:28', '2019-11-08 21:32:51', NULL),
(55, NULL, 'test123@gamil.com', 'test123@gamil.com', '12121', '1223454412', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-08 21:33:28', '2019-11-11 01:29:14', NULL),
(56, NULL, 'teset@gmail.com', 'teset@gmail.com', 'teset@gmail.com', 'teset@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-09 21:42:33', '2019-11-11 01:29:11', NULL),
(57, NULL, 'teset@gmail.com', 'teset@gmail.com1', 'App\\Http\\Controllers\\Session', 'teset@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-09 21:43:35', '2019-11-11 01:29:08', NULL),
(58, NULL, 'tes@gmail.com', 'tes@gmail.com', 'tes@gmail.com', 'tes@gmail.comtes@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-09 21:54:48', '2019-11-11 01:29:05', NULL),
(59, NULL, 'backend@gmail.com', 'backend@gmail.com', 'backend@gmail.com', 'backend@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-09 22:15:16', '2019-11-10 01:29:31', NULL),
(60, NULL, 'test@gmail.com', 'test@gmail.com', 'test@gmail.comtest@gmail.com', 'test@gmail.com', 'test@gmail.com', NULL, NULL, '2019-10-01 00:00:00', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-10 01:15:55', '2019-11-10 01:29:28', NULL),
(61, NULL, 'test123@gmail.com', 'test123@gmail.com', 'test123@gmail.com', 'test123@gmail.com', 'test123@gmail.com', NULL, NULL, '1998-02-10 00:00:00', NULL, 'test123@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-10 01:20:48', '2019-11-10 01:29:25', NULL),
(62, NULL, 'tets@gmil.com', 'tets@gmil.com', '$2y$10$25.u4r7rY3.VbpJAuEXO/OGII2u0DFoT0aPVMlNwfs.Nx5Aqstkz.', 'tets@gmil.com', NULL, 1, NULL, '2018-11-11 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-10 03:16:26', '2019-11-11 01:26:47', NULL),
(63, NULL, 'tesst@gmail.com', 'tesst@gmail.com', '$2y$10$s9a3VOryqQ.s6W1CMAhvOeWzSsFh/J/yDcx/CCinMCzOzOq9PNi8O', 'tesst@gmail.com', NULL, NULL, NULL, '8789-09-10 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-10 03:17:17', '2019-11-11 01:26:45', NULL),
(64, NULL, 'hùng', 'test111@gmail.com', '$2y$10$/1y8JPzLTTpuiaaRltia.OS8J4eSRLpYzu4KJJrMa1Zc9NYtpzImO', '09876789', NULL, NULL, NULL, '2019-09-10 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-10 04:16:50', '2019-11-11 01:26:43', NULL),
(65, NULL, 'hùng', 'test1112@gmail.com', '$2y$10$uAw53wz8Q2eijJEHf7fmr.u7REu3Qf2YKluNY0RgaSMy3Dz0zJzr6', '09876789', NULL, NULL, NULL, '2019-09-10 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-10 04:18:14', '2019-11-11 01:26:41', NULL),
(66, NULL, 'hùng', 'test11122@gmail.com', '$2y$10$9xIjq.Crzb/vfxz3/ZZMiuB10R.u22EVtsiTni7Rj7hmHcZ8xohqu', '09876789', NULL, NULL, NULL, '2019-09-10 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-10 04:19:44', '2019-11-11 01:26:40', NULL),
(67, NULL, 'hùng', 'test111223@gmail.com', '$2y$10$p5LN0/5PT.deP3rz8xyKPej1ZfEa2cEBxBfk1/pvYYnDJwr3PXf1q', '09876789', NULL, NULL, NULL, '2019-09-10 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-10 04:20:11', '2019-11-11 01:26:38', NULL),
(68, '', 'hùng', 'test2@gmail.com', '$2y$10$Of6EewZMh8LWSOPhpgpZ9.AAfodQjUj51XnQYjlUIfqr4DCRjMKiK', '09876789', '', 0, NULL, '9181-02-10 00:00:00', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-10 04:20:43', '2019-11-13 07:10:13', NULL),
(69, NULL, 'Hùng', 'thng@gmail.com', '$2y$10$J6FnqaHaByPZWkOJY7izAuEjtE1mrkQCtVUtgpGEu.XG95EQ1Ogdy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-10 04:22:49', '2019-11-11 01:26:35', '2019-11-12 16:10:36'),
(70, '', 'tes123t@gmail.com11', 'tes123t@gmail.com', '$2y$10$cO0zrX2oHAtBMKSeR9OG9.jFWfOSYs3/riXiDFaYGzEjbfjVbwMUS', 'test@gmail.com', '', 1, NULL, '2991-02-10 00:00:00', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-13 05:06:00', '2019-11-13 07:45:28', NULL),
(71, '', 'te111st123@gmail.com', 'test1213@gmail.com', '$2y$10$20wXSQ.gJOm/No37a5f/XeP6YPC4oS3xAqHxjJ6mS1G9I7BXhcxK2', 'test123@gmail.com', '', 1, NULL, '1997-02-10 00:00:00', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-13 07:46:20', '2019-11-15 00:46:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_catalogues`
--

CREATE TABLE `user_catalogues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid_created` int(11) DEFAULT NULL,
  `userid_updated` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_catalogues`
--

INSERT INTO `user_catalogues` (`id`, `name`, `slug`, `permission`, `userid_created`, `userid_updated`, `created_at`, `updated_at`) VALUES
(1, 'Horacio Christiansen', NULL, '0', NULL, NULL, '2019-11-07 21:44:58', '2019-11-07 21:44:58'),
(2, 'Arnaldo Pfeffer', NULL, '0', NULL, NULL, '2019-11-07 21:44:58', '2019-11-07 21:44:58'),
(3, 'Josephine Simonis', NULL, '0', NULL, NULL, '2019-11-07 21:44:58', '2019-11-07 21:44:58'),
(4, 'Prof. Onie Friesen', NULL, '0', NULL, NULL, '2019-11-07 21:44:58', '2019-11-07 21:44:58'),
(5, 'Frida Daniel', NULL, '0', NULL, NULL, '2019-11-07 21:44:58', '2019-11-07 21:44:58'),
(6, 'Mr. Augustus Boyer', NULL, '0', NULL, NULL, '2019-11-07 21:44:58', '2019-11-07 21:44:58'),
(7, 'Rosie Reilly', NULL, '0', NULL, NULL, '2019-11-07 21:44:58', '2019-11-07 21:44:58'),
(8, 'Samir Cartwright II', NULL, '0', NULL, NULL, '2019-11-07 21:44:58', '2019-11-07 21:44:58'),
(9, 'Mr. Kurt Purdy Sr.', NULL, '0', NULL, NULL, '2019-11-07 21:44:58', '2019-11-07 21:44:58'),
(10, 'Madge Greenholt I', NULL, '0', NULL, NULL, '2019-11-07 21:44:58', '2019-11-07 21:44:58'),
(11, '123123', NULL, '[\"user\\/backend\\/catalogue\\/view\",\"user\\/backend\\/user\\/delete\",\"user\\/backend\\/account\\/password\"]', NULL, NULL, '2019-11-15 00:20:16', '2019-11-15 00:20:16'),
(12, 'test123', NULL, '[\"user\\/backend\\/catalogue\\/view\",\"user\\/backend\\/catalogue\\/create\",\"user\\/backend\\/catalogue\\/update\",\"user\\/backend\\/catalogue\\/delete\",\"user\\/backend\\/user\\/view\",\"user\\/backend\\/user\\/create\",\"user\\/backend\\/user\\/update\",\"user\\/backend\\/user\\/delete\",\"user\\/backend\\/account\\/information\",\"user\\/backend\\/account\\/password\",\"user\\/backend\\/account\\/blocked\"]', NULL, NULL, '2019-11-15 00:47:22', '2019-11-15 00:48:29'),
(13, '1111', NULL, '[]', NULL, NULL, '2019-11-21 06:34:53', '2019-11-21 06:34:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_catalogues`
--
ALTER TABLE `article_catalogues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `router`
--
ALTER TABLE `router`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_catalogues`
--
ALTER TABLE `user_catalogues`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_catalogues_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `article_catalogues`
--
ALTER TABLE `article_catalogues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `router`
--
ALTER TABLE `router`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user_catalogues`
--
ALTER TABLE `user_catalogues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
