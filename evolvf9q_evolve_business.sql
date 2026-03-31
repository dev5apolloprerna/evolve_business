-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2026 at 12:45 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evolvf9q_evolve_business`
--

-- --------------------------------------------------------

--
-- Table structure for table `Adminfrontimage`
--

CREATE TABLE `Adminfrontimage` (
  `id` int(11) NOT NULL,
  `Title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Adminfrontimage`
--

INSERT INTO `Adminfrontimage` (`id`, `Title`, `photo`, `button_link`, `iStatus`, `isDelete`, `created_at`, `update_at`) VALUES
(1, 'Evolve Business Community', '1754650643.jpeg', 'tcf', 1, 0, '2024-03-21 06:46:09', '2025-08-13 07:38:18'),
(3, 'At Evolv, we nurture an ecosystem where women entrepreneurs flourish. Our approach goes beyond traditional networking by offering holistic support—personal development, targeted trainings, and a community that celebrates collaboration over competition.', '1754906451.jpeg', 'contact-us', 1, 0, '2024-03-21 08:45:08', '2025-08-11 10:00:51'),
(5, 'Evolve Business Community', '1754919680.jpeg', 'contact-us', 1, 0, '2025-01-30 10:32:00', '2025-08-11 13:41:20'),
(6, 'Evolve Business Community', '1758713424.jpeg', 'Contact -Us', 1, 0, '2025-09-24 11:30:24', NULL),
(11, 'Join us as visitor in our meet', '1760527433.jpg', 'Contact -Us', 1, 0, '2025-10-15 11:23:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Adminuser_permission`
--

CREATE TABLE `Adminuser_permission` (
  `permission_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `MasterEntry` int(11) DEFAULT '0',
  `city` int(11) DEFAULT '0',
  `city_group` int(11) DEFAULT '0',
  `categories` int(11) DEFAULT '0',
  `membershipplans` int(11) DEFAULT '0',
  `overteem` int(11) DEFAULT '0',
  `Banner` int(11) DEFAULT '0',
  `members` int(11) DEFAULT '0',
  `Products_service` int(11) DEFAULT '0',
  `Renewalhistory` int(11) DEFAULT '0',
  `Business` int(11) DEFAULT '0',
  `reports` int(11) DEFAULT '0',
  `Adminuser` int(11) DEFAULT '0',
  `Utility` int(11) DEFAULT '0',
  `Blog` int(11) DEFAULT '0',
  `gallery` int(11) DEFAULT '0',
  `videogallery` int(11) DEFAULT '0',
  `Event` int(11) DEFAULT '0',
  `BannerImage` int(11) DEFAULT '0',
  `RegisterInquiry` int(11) DEFAULT '0',
  `EventInquiry` int(11) DEFAULT '0',
  `ContactInquiry` int(11) DEFAULT '0',
  `istatus` int(11) NOT NULL DEFAULT '1',
  `Isdelete` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Adminuser_permission`
--

INSERT INTO `Adminuser_permission` (`permission_id`, `user_id`, `MasterEntry`, `city`, `city_group`, `categories`, `membershipplans`, `overteem`, `Banner`, `members`, `Products_service`, `Renewalhistory`, `Business`, `reports`, `Adminuser`, `Utility`, `Blog`, `gallery`, `videogallery`, `Event`, `BannerImage`, `RegisterInquiry`, `EventInquiry`, `ContactInquiry`, `istatus`, `Isdelete`, `created_at`, `updated_at`) VALUES
(27, 81, 1, 0, 0, 0, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '2024-05-14 08:33:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Announcement`
--

CREATE TABLE `Announcement` (
  `id` int(11) NOT NULL,
  `Title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Announcement_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Banners`
--

CREATE TABLE `Banners` (
  `banner_id` int(11) NOT NULL,
  `Title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strIP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Banners`
--

INSERT INTO `Banners` (`banner_id`, `Title`, `photo`, `iStatus`, `isDelete`, `strIP`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(8, 'test', '1713425342.png', 1, 0, '103.1.100.226', NULL, NULL, '2024-04-18 01:59:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Blogs`
--

CREATE TABLE `Blogs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blogTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `rejectedcomments` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strIP` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `blogImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blogDescription` text COLLATE utf8mb4_unicode_ci,
  `metaTitle` text COLLATE utf8mb4_unicode_ci,
  `metaKeyword` text COLLATE utf8mb4_unicode_ci,
  `metaDescription` text COLLATE utf8mb4_unicode_ci,
  `blogDate` date DEFAULT NULL,
  `blog_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Business`
--

CREATE TABLE `Business` (
  `business_id` int(11) NOT NULL,
  `business_type` int(11) DEFAULT NULL,
  `business_from` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_to` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Business_amount` int(11) NOT NULL,
  `business_Date` date DEFAULT NULL,
  `isapproved_status` int(11) NOT NULL DEFAULT '0',
  `approved_by` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by_id` int(11) DEFAULT NULL,
  `businesscomment` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approveddatetime` datetime DEFAULT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strIP` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `gu_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_from_id` int(11) DEFAULT NULL,
  `business_to_id` int(11) DEFAULT NULL,
  `Business_received_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Business`
--

INSERT INTO `Business` (`business_id`, `business_type`, `business_from`, `business_to`, `Business_amount`, `business_Date`, `isapproved_status`, `approved_by`, `approved_by_id`, `businesscomment`, `approveddatetime`, `iStatus`, `isDelete`, `strIP`, `created_at`, `updated_at`, `created_by`, `updated_by`, `gu_id`, `business_from_id`, `business_to_id`, `Business_received_date`) VALUES
(1, 1, 'prerna parekh', 'krunal shah', 25000, '2026-03-17', 1, NULL, NULL, NULL, NULL, 1, 0, '49.36.69.251', '2026-03-19 09:59:22', '0000-00-00 00:00:00', 245, NULL, 'aypjS3cF3o', 245, 244, NULL),
(2, 2, 'prerna parekh', 'krunal shah', 50000, '2026-03-19', 1, 'User', 244, NULL, NULL, 1, 0, '49.36.69.251', '2026-03-19 10:07:15', '0000-00-00 00:00:00', 245, NULL, 'BeyccNJozj', 245, 244, '2026-03-19'),
(3, 1, 'krunal shah', 'prerna parekh', 25000, '2026-03-19', 1, NULL, NULL, NULL, NULL, 1, 0, '49.36.69.251', '2026-03-19 10:08:00', '0000-00-00 00:00:00', 244, NULL, 'KHcBqmyQF8', 244, 245, NULL),
(4, 1, 'krunal shah', 'prerna parekh', 25000, '2026-03-19', 2, 'User', 245, 'asfkfhfj', NULL, 1, 0, '49.36.69.251', '2026-03-19 10:20:22', '0000-00-00 00:00:00', 244, NULL, 'dmDF98rWKI', 244, 245, NULL),
(5, 1, 'prerna parekh', 'krunal shah', 15000, '2026-03-19', 2, 'User', 244, 'ok', NULL, 1, 0, '49.36.69.251', '2026-03-19 13:44:34', '0000-00-00 00:00:00', 245, NULL, 'rmy5kBwUHD', 245, 244, '2026-03-19'),
(6, 2, 'krunal shah', 'prerna parekh', 150000, '2026-03-20', 2, 'User', 245, 'test reject', NULL, 1, 0, '49.36.69.251', '2026-03-19 10:21:29', '0000-00-00 00:00:00', 244, NULL, '4ffyjHtIPW', 244, 245, NULL),
(7, 1, 'krunal shah', 'prerna parekh', 14000, '2026-03-16', 1, NULL, NULL, NULL, NULL, 1, 0, '49.36.69.251', '2026-03-19 10:26:17', '0000-00-00 00:00:00', 244, NULL, '2KZBxEWA3t', 244, 245, NULL),
(8, 2, 'krunal shah', 'prerna parekh', 17000, '2026-03-17', 2, 'User', 244, 'test reject for muktiple business', NULL, 1, 0, '49.36.69.251', '2026-03-19 10:27:00', '0000-00-00 00:00:00', 244, NULL, 'vktZLvq2MT', 244, 245, NULL),
(9, 1, 'krunal shah', 'prerna parekh', 18000, '2026-03-09', 1, NULL, NULL, NULL, NULL, 1, 0, '49.36.69.251', '2026-03-19 10:33:56', '0000-00-00 00:00:00', 244, NULL, 'FEksiqr3EI', 244, 245, NULL),
(10, 2, 'krunal shah', 'prerna parekh', 20000, '2026-03-10', 1, 'Admin', 1, NULL, NULL, 1, 0, '49.36.69.251', '2026-03-19 10:42:52', '0000-00-00 00:00:00', 244, NULL, 'hovC8mx0Gi', 244, 245, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strIP` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `photo`, `category_slug`, `iStatus`, `isDelete`, `strIP`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(24, 'Lawyer', '1710938664.png', 'lawyer', 1, 0, '103.1.100.226', '2024-05-15 02:23:04', '2024-05-15 02:23:04', NULL, NULL),
(25, 'Travel Agent', '1710938654.png', 'travel-agent', 1, 0, '103.1.100.226', '2024-05-21 05:45:11', '2024-05-21 05:45:11', NULL, NULL),
(26, 'Real Estate Agent', '1710938614.png', 'real-estate-agent', 1, 0, '103.1.100.226', '2025-11-10 06:02:19', '2025-11-10 06:02:19', NULL, NULL),
(27, 'Educator / NGO', '1710938598.png', 'educator-ngo', 1, 0, '103.1.100.226', '2024-05-21 04:59:52', '2024-05-21 04:59:52', NULL, NULL),
(28, 'Food Consultant', '1710938580.png', 'food-consultant', 1, 0, '103.1.100.226', '2024-10-14 03:30:35', '2024-10-14 03:30:35', NULL, NULL),
(29, 'Fashion Designers', '1710938567.png', 'fashion-designers', 1, 0, '103.1.100.226', '2024-05-21 05:00:13', '2024-05-21 05:00:13', NULL, NULL),
(30, 'Photographers/ Videographers', '1710938550.png', 'photographers-videographers', 1, 0, '103.1.100.226', '2024-05-21 05:45:49', '2024-05-21 05:45:49', NULL, NULL),
(31, 'Retail Chain owners ( Opticals )', '1710938537.png', 'retail-chain-owners-opticals', 1, 0, '103.1.100.226', '2024-05-21 05:46:30', '2024-05-21 05:46:30', NULL, NULL),
(32, 'Retail Chain owners ( Electronics )', '1710938406.png', 'retail-chain-owners-electronics', 1, 0, '103.1.100.226', '2024-05-21 05:46:25', '2024-05-21 05:46:25', NULL, NULL),
(33, 'Retail Chain owners ( Wellness and Medicinal )', '1710938456.png', 'retail-chain-owners-wellness-and-medicinal', 1, 0, '103.1.100.226', '2024-05-21 05:45:29', '2024-05-21 05:45:29', NULL, NULL),
(34, 'Retail Chain owners ( Sports )', '1710938333.png', 'retail-chain-owners-sports', 1, 0, '103.1.100.226', '2024-05-21 05:46:45', '2024-05-21 05:46:45', NULL, NULL),
(35, 'Gold & Diamond Jewellers', '1710938244.png', 'gold-diamond-jewellers', 1, 0, '103.1.100.226', '2024-05-21 05:00:35', '2024-05-21 05:00:35', NULL, NULL),
(36, 'Real Stones - Gems dealer', '1710938230.png', 'real-stones-gems-dealer', 1, 0, '103.1.100.226', '2024-05-21 05:46:19', '2024-05-21 05:46:19', NULL, NULL),
(37, 'Eye Specialist', '1710938216.png', 'eye-specialist', 1, 0, '103.1.100.226', '2024-06-15 02:32:52', '2024-06-15 02:32:52', NULL, NULL),
(38, 'Doctors Dentist', '1710937896.png', 'doctors-dentist', 1, 0, '103.1.100.226', '2024-05-21 04:59:35', '2024-05-21 04:59:35', NULL, NULL),
(39, 'Doctors Dermat', '1710937873.png', 'doctors-dermat', 1, 0, '103.1.100.226', '2024-05-21 04:59:41', '2024-05-21 04:59:41', NULL, NULL),
(40, 'Multispeciality Hospital', '1710937863.png', 'multispeciality-hospital', 1, 0, '103.1.100.226', '2024-05-21 05:47:44', '2024-05-21 05:47:44', NULL, NULL),
(41, 'Make up artists / Salon chains', '1710937853.png', 'make-up-artists-salon-chains', 1, 0, '103.1.100.226', '2024-05-21 05:47:19', '2024-05-21 05:47:19', NULL, NULL),
(42, 'Digital Marketing Agency', '1710937838.png', 'digital-marketing-agency', 1, 0, '103.1.100.226', '2024-05-21 04:59:15', '2024-05-21 04:59:15', NULL, NULL),
(43, 'Event Management', '1710937768.png', 'event-management', 1, 0, '103.1.100.226', '2024-05-21 05:00:04', '2024-05-21 05:00:04', NULL, NULL),
(44, 'Financial Service ( Mutual Funds / Insurance )', '1710937757.png', 'financial-service-mutual-funds-insurance', 1, 0, '103.1.100.226', '2024-05-21 05:00:18', '2024-05-21 05:00:18', NULL, NULL),
(46, 'Home Furniture', '1710937676.png', 'home-furniture', 1, 0, '103.1.100.226', '2024-05-21 05:48:13', '2024-05-21 05:48:13', NULL, NULL),
(47, 'Gym', '1710937666.png', 'gym', 1, 0, '103.1.100.226', '2024-05-21 05:00:47', '2024-05-21 05:00:47', NULL, NULL),
(48, 'Occult Science', '1710937653.png', 'occult-science', 1, 0, '103.1.100.226', '2024-05-21 05:45:37', '2024-05-21 05:45:37', NULL, NULL),
(49, 'Cosmetic products', '1710937639.png', 'cosmetic-products', 1, 0, '103.1.100.226', '2024-05-21 04:59:06', '2024-05-21 04:59:06', NULL, NULL),
(50, 'Bakery and confectionary', '1710937629.png', 'bakery-and-confectionary', 1, 0, '103.1.100.226', '2024-05-21 04:58:02', '2024-05-21 04:58:02', NULL, NULL),
(51, 'Logistics / courier', '1710937619.png', 'logistics-courier', 1, 0, '103.1.100.226', '2024-05-21 05:48:37', '2024-05-21 05:48:37', NULL, NULL),
(52, 'Architect and Interior', '1710937601.png', 'architect-and-interior', 1, 0, '103.1.100.226', '2024-05-21 04:57:26', '2024-05-21 04:57:26', NULL, NULL),
(53, 'IT Web developers', '1710937589.png', 'it-web-developers', 1, 0, '103.1.100.226', '2024-05-21 05:48:50', '2024-05-21 05:48:50', NULL, NULL),
(54, 'Packaging and product designers', '1710937578.png', 'packaging-and-product-designers', 1, 0, '103.1.100.226', '2024-05-21 05:45:45', '2024-05-21 05:45:45', NULL, NULL),
(55, 'Automobile', '1710937563.png', 'automobile', 1, 0, '103.1.100.226', '2024-07-18 23:57:36', '2024-07-18 23:57:36', NULL, NULL),
(56, 'Corporate gifting / Trousseau Packaging', '1710937511.png', 'corporate-gifting-trousseau-packaging', 1, 0, '103.1.100.226', '2024-05-21 04:58:44', '2024-05-21 04:58:44', NULL, NULL),
(57, 'Caterers', '1710937489.png', 'caterers', 1, 0, '103.1.100.226', '2024-05-21 04:58:13', '2024-05-21 04:58:13', NULL, NULL),
(58, 'Market research and branding', '1710937481.png', 'market-research-and-branding', 1, 0, '103.1.100.226', '2024-05-21 05:49:23', '2024-05-21 05:49:23', NULL, NULL),
(59, 'Choreographers and dance academy', '1710937466.png', 'choreographers-and-dance-academy', 1, 0, '103.1.100.226', '2024-05-21 04:58:19', '2024-05-21 04:58:19', NULL, NULL),
(60, 'Ground staff providers / HR', '1710937452.png', 'ground-staff-providers-hr', 1, 0, '103.1.100.226', '2024-05-21 05:00:41', '2024-05-21 05:00:41', NULL, NULL),
(61, 'Corporate trainers', '1710937432.png', 'corporate-trainers', 1, 0, '103.1.100.226', '2024-08-12 04:56:34', '2024-08-12 04:56:34', NULL, NULL),
(62, 'Garment Manufacturer / Dealers', '1710937418.png', 'garment-manufacturer-dealers', 1, 0, '103.1.100.226', '2024-05-21 05:00:30', '2024-05-21 05:00:30', NULL, NULL),
(63, 'Sports Academy / Management / Accessories outlet', '1710937398.png', 'sports-academy-management-accessories-outlet', 1, 0, '103.1.100.226', '2024-05-21 05:45:25', '2024-05-21 05:45:25', NULL, NULL),
(64, 'Overseas Education', '1710937386.png', 'overseas-education', 1, 0, '103.1.100.226', '2024-05-21 05:45:41', '2024-05-21 05:45:41', NULL, NULL),
(65, 'Kitchen accessories', '1710937374.png', 'kitchen-accessories', 1, 0, '103.1.100.226', '2024-05-21 05:49:41', '2024-05-21 05:49:41', NULL, NULL),
(66, 'Physiotherapist', '1710937359.png', 'physiotherapist', 1, 0, '103.1.100.226', '2024-05-21 05:45:55', '2024-05-21 05:45:55', NULL, NULL),
(67, 'Equity Commodity brokers', '1710937340.png', 'equity-commodity-brokers', 1, 0, '103.1.100.226', '2024-05-21 04:59:57', '2024-05-21 04:59:57', NULL, NULL),
(68, 'Yoga / pilates / health coach', '1710937201.png', 'yoga-pilates-health-coach', 1, 0, '103.1.100.226', '2024-05-21 05:45:06', '2024-05-21 05:45:06', NULL, NULL),
(69, 'CA / CS', '1710937185.png', 'ca-cs', 1, 0, '103.1.100.226', '2024-05-21 04:58:07', '2024-05-21 04:58:07', NULL, NULL),
(70, 'Artists  - Art work', '1710937171.png', 'artists-art-work', 1, 0, '103.1.100.226', '2024-05-21 04:57:31', '2024-05-21 04:57:31', NULL, NULL),
(71, 'PMS', '1710937153.png', 'pms', 1, 0, '103.1.100.226', '2024-05-21 05:45:59', '2024-05-21 05:45:59', NULL, NULL),
(73, 'Accupressure', '1710937133.png', 'accupressure', 1, 0, '103.1.100.226', '2024-05-21 04:57:20', '2024-05-21 04:57:20', NULL, NULL),
(87, 'Copper products', '1714650105.png', 'copper-products', 1, 0, '122.170.76.6', '2024-05-21 04:58:36', '2024-05-21 04:58:36', NULL, NULL),
(88, 'Holistic Healing (Sujok Therapy)', '1714650077.png', 'holistic-healing-sujok-therapy', 1, 0, '223.226.217.176', '2024-05-21 05:01:08', '2024-05-21 05:01:08', NULL, NULL),
(89, 'printing services-', '1714650210.png', 'printing-services', 1, 0, '223.226.217.176', '2024-05-21 05:46:05', '2024-05-21 05:46:05', NULL, NULL),
(90, 'Meditation', '1714650269.png', 'meditation', 1, 0, '223.226.217.176', '2024-05-21 05:50:05', '2024-05-21 05:50:05', NULL, NULL),
(91, 'Ayurveda', '1714650292.png', 'ayurveda', 1, 0, '223.226.217.176', '2024-05-21 04:57:56', '2024-05-21 04:57:56', NULL, NULL),
(93, 'DNE & DMIT (Fingerprint Analysis)', '1716025313.png', 'dne-dmit-fingerprint-analysis', 1, 0, '223.226.217.176', '2024-05-21 04:59:20', '2024-05-21 04:59:20', NULL, NULL),
(94, 'Mental Health (Occult Science )', '1719206436.png', 'mental-health-occult-science', 1, 0, '223.226.217.176', '2024-06-23 23:50:36', '2024-06-23 23:50:36', NULL, NULL),
(95, 'Health Care Professional', '1719206312.png', 'health-care-professional', 1, 0, '223.226.217.176', '2024-06-23 23:48:32', '2024-06-23 23:48:32', NULL, NULL),
(97, 'Success Abundance Strategist (Coaching and Mentor)', '1719206492.png', 'success-abundance-strategist-coaching-and-mentor', 1, 0, '223.226.217.176', '2024-06-23 23:51:32', '2024-06-23 23:51:32', NULL, NULL),
(99, 'Doctor Pediatrics', '1719206287.png', 'doctor-pediatrics', 1, 0, '182.69.30.199', '2024-06-23 23:48:07', '2024-06-23 23:48:07', NULL, NULL),
(100, 'Fitness Trainer & Aerial Yoga Coach', '1719206460.png', 'fitness-trainer-aerial-yoga-coach', 1, 0, '182.69.30.199', '2024-07-23 01:51:42', '2024-07-23 01:51:42', NULL, NULL),
(101, 'Real Estate Advisor', '1719206476.png', 'real-estate-advisor', 1, 0, '122.170.189.105', '2024-06-23 23:51:16', '2024-06-23 23:51:16', NULL, NULL),
(102, 'IT Hardware and Services', '1719206409.png', 'it-hardware-and-services', 1, 0, '122.170.189.105', '2024-06-23 23:50:09', '2024-06-23 23:50:09', NULL, NULL),
(103, 'Associate Director', '1719206096.png', 'associate-director', 1, 0, '122.170.189.105', '2024-06-23 23:44:56', '2024-06-23 23:44:56', NULL, NULL),
(104, 'Investment Banker', '1719206397.png', 'investment-banker', 1, 0, '122.170.189.105', '2024-06-23 23:49:57', '2024-06-23 23:49:57', NULL, NULL),
(105, 'chess coach', '1718873250.jfif', 'chess-coach', 1, 0, '122.170.189.105', '2024-06-20 03:17:30', '0000-00-00 00:00:00', NULL, NULL),
(106, 'Chocolatier', '1719212206.jpg', 'chocolatier', 1, 0, '122.170.17.1', '2024-06-24 01:26:46', '0000-00-00 00:00:00', NULL, NULL),
(107, 'Mobile Sales and Service', '1719213197.png', 'mobile-sales-and-service', 1, 0, '122.170.17.1', '2024-06-24 01:43:17', '0000-00-00 00:00:00', NULL, NULL),
(110, 'Financial Investment Products and services', '1719576512.webp', 'financial-investment-products-and-services', 1, 0, '122.170.17.1', '2024-06-28 06:38:32', '0000-00-00 00:00:00', NULL, NULL),
(111, 'FRP & GRC Products', '1720514261.webp', 'frp-grc-products', 1, 0, '122.170.17.1', '2024-07-09 03:07:41', '0000-00-00 00:00:00', NULL, NULL),
(112, 'Silver jewellery retail and wholesale', '1720514709.jpg', 'silver-jewellery-retail-and-wholesale', 1, 0, '122.170.17.1', '2024-07-09 03:15:09', '0000-00-00 00:00:00', NULL, NULL),
(113, 'Master of Occupational Therapy', '1720515485.avif', 'master-of-occupational-therapy', 1, 0, '122.170.17.1', '2024-07-09 03:28:05', '0000-00-00 00:00:00', NULL, NULL),
(114, 'Lifestyle Products', '1720685598.jfif', 'lifestyle-products', 1, 0, '122.170.17.1', '2024-07-11 02:43:18', '0000-00-00 00:00:00', NULL, NULL),
(115, 'Founder', '1720686309.avif', 'founder', 1, 0, '122.170.17.1', '2024-07-11 02:55:09', '0000-00-00 00:00:00', NULL, NULL),
(116, 'Surgical Equipments', '1721036559.jpg', 'surgical-equipments', 1, 0, '122.170.17.1', '2024-07-15 04:12:39', '0000-00-00 00:00:00', NULL, NULL),
(117, 'Mutual Funds', '1721366120.jpg', 'mutual-funds', 1, 0, '122.170.17.1', '2024-07-18 23:45:20', '0000-00-00 00:00:00', NULL, NULL),
(118, 'School Consultant', '1721461488.jpg', 'school-consultant', 1, 0, '122.170.17.1', '2024-07-20 02:14:48', '0000-00-00 00:00:00', NULL, NULL),
(119, 'Design & Brand Communications', '1721902697.jpg', 'design-brand-communications', 1, 0, '106.200.212.195', '2024-07-25 04:48:17', '0000-00-00 00:00:00', NULL, NULL),
(120, 'Fitness Trainer', '1722236849.jpg', 'fitness-trainer', 1, 0, '106.200.212.195', '2024-07-29 01:37:29', '0000-00-00 00:00:00', NULL, NULL),
(121, 'GIft Hamper Curator', '1722578887.avif', 'gift-hamper-curator', 1, 0, '106.200.212.195', '2024-08-05 02:16:56', '2024-08-05 02:16:56', NULL, NULL),
(122, 'Pathology Laboratory', '1723104586.jpg', 'pathology-laboratory', 1, 0, '106.200.212.195', '2024-08-08 02:39:46', '0000-00-00 00:00:00', NULL, NULL),
(123, 'Insurance Broker', '1723195805.avif', 'insurance-broker', 1, 0, '106.200.212.195', '2024-08-09 04:00:05', '0000-00-00 00:00:00', NULL, NULL),
(124, 'Labour Law - HR & Statutory Legal', '1724488617.jpg', 'labour-law-hr-statutory-legal', 1, 0, '103.250.137.99', '2024-08-24 03:06:57', '0000-00-00 00:00:00', NULL, NULL),
(125, 'Robotic Gastrointestinal, Bariatric & Hernia - AWR', '1724493160.', 'robotic-gastrointestinal-bariatric-hernia-awr-surgeon', 1, 0, '103.250.137.99', '2024-08-24 04:22:40', '0000-00-00 00:00:00', NULL, NULL),
(126, 'Turnkey Projects', '1724740244.', 'turnkey-projects', 1, 0, '43.250.165.240', '2024-08-27 01:00:44', '0000-00-00 00:00:00', NULL, NULL),
(127, 'Doctor - Women Private-Intimate Health (Pelvic Flo', '1728895418.webp', 'doctor-women-private-intimate-health-pelvic-floor-rehab', 1, 0, '122.167.197.219', '2024-10-17 04:42:35', '2024-10-17 04:42:35', NULL, NULL),
(128, 'Healthy Nuts And Bars', '1728896344.avif', 'healthy-nuts-and-bars', 1, 0, '122.167.197.219', '2024-10-14 03:29:04', '0000-00-00 00:00:00', NULL, NULL),
(129, 'Gifting (Candles, Bath Salts & Soaps)', '1733469130.', 'gifting-candles-bath-salts-soaps', 1, 0, '122.167.197.219', '2024-12-06 01:42:10', '2024-12-06 01:42:10', NULL, NULL),
(130, 'Futuristic Real Estate Developer', '1728898111.avif', 'futuristic-real-estate-developer', 1, 0, '122.167.197.219', '2024-10-14 03:58:31', '0000-00-00 00:00:00', NULL, NULL),
(131, 'Recruiting - HR', '1732774564.jpg', 'recruiting-hr', 1, 0, '182.69.69.198', '2024-11-28 00:46:04', '0000-00-00 00:00:00', NULL, NULL),
(132, 'Loan Facilitor', '1735817855.', 'loan-facilitor', 1, 0, '182.69.214.56', '2025-01-02 06:07:35', '0000-00-00 00:00:00', NULL, NULL),
(133, 'Stock Broker', '1737709560.', 'stock-broker', 1, 0, '122.161.81.123', '2025-01-24 03:36:00', '0000-00-00 00:00:00', NULL, NULL),
(134, 'Blood Bank & Health Service', '1739605391.avif', 'blood-bank-health-service', 1, 0, '122.161.81.123', '2025-02-15 02:13:11', '0000-00-00 00:00:00', NULL, NULL),
(135, 'Homeopathy', '1740730679.jpg', 'homeopathy', 1, 0, '122.170.38.4', '2025-02-28 02:47:59', '0000-00-00 00:00:00', NULL, NULL),
(136, 'Home Decor Products (Plywood Laminates Veneers)', '1742450636.jpg', 'home-decor-products-plywood-laminates-veneers', 1, 0, '182.69.70.83', '2025-03-20 00:33:56', '0000-00-00 00:00:00', NULL, NULL),
(137, 'NLP Training & Counselling', '1742451352.jpg', 'nlp-training-counselling', 1, 0, '182.69.70.83', '2025-03-20 00:45:52', '0000-00-00 00:00:00', NULL, NULL),
(138, 'Image consultancy', '1744784183.jpg', 'image-consultancy', 1, 0, '122.175.77.248', '2025-04-16 00:46:23', '0000-00-00 00:00:00', NULL, NULL),
(139, 'Entertainment, Events, Corporate', '1744884688.avif', 'entertainment-events-corporate', 1, 0, '122.175.77.248', '2025-04-17 04:41:28', '0000-00-00 00:00:00', NULL, NULL),
(140, 'Ortho Specialist', '1747221523.jpg', 'ortho-specialist', 1, 0, '122.170.175.56', '2025-05-14 05:48:43', '0000-00-00 00:00:00', NULL, NULL),
(141, 'Food & Beverages ( Dry fruits &  Gourmet Snacks )', '1752836294.png', 'food-beverages-dry-fruits-gourmet-snacks', 1, 0, '117.99.105.194', '2025-07-18 05:28:14', '0000-00-00 00:00:00', NULL, NULL),
(142, 'PMC - Project Management Company', '1753348847.jpg', 'pmc-project-management-company', 1, 0, '106.212.180.123', '2025-07-24 03:50:47', '0000-00-00 00:00:00', NULL, NULL),
(143, 'E - Locker Solutions', '1753778928.webp', 'e-locker-solutions', 1, 0, '106.212.180.123', '2025-07-29 03:18:48', '0000-00-00 00:00:00', NULL, NULL),
(144, 'Dietician', '1754025696.jpg', 'dietician', 1, 0, '106.212.180.123', '2025-07-31 23:51:36', '0000-00-00 00:00:00', NULL, NULL),
(145, 'Doctor - Endocrinologist & Diabetologist', '1758794013.png', 'doctor-endocrinologist-diabetologist', 1, 0, '122.175.81.246', '2025-09-25 04:23:33', '0000-00-00 00:00:00', NULL, NULL),
(146, 'Business Growth Coach', '1762774387.png', 'business-growth-coach', 1, 0, '117.98.135.17', '2025-11-10 06:03:07', '0000-00-00 00:00:00', NULL, NULL),
(147, 'HVAC ( AIR-CONDITIONING )', '1762774598.png', 'hvac-air-conditioning', 1, 0, '117.98.135.17', '2025-11-10 06:06:38', '0000-00-00 00:00:00', NULL, NULL),
(148, 'Restaurant (Niche)', '1768033790.png', 'restaurant-niche', 1, 0, '136.185.112.155', '2026-01-10 02:59:50', '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strIP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`, `iStatus`, `isDelete`, `strIP`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Ahmedabad', 1, 0, '127.0.0.1', '2026-03-17 08:30:21', '2026-03-17 08:31:02', NULL, NULL),
(2, 'Rajkot', 1, 0, '127.0.0.1', '2026-03-17 08:30:29', '2026-03-17 08:31:09', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city_groups`
--

CREATE TABLE `city_groups` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `group_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strIP` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city_groups`
--

INSERT INTO `city_groups` (`id`, `city_id`, `group_name`, `iStatus`, `isDelete`, `strIP`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Triton', 1, 0, '127.0.0.1', NULL, NULL, '2026-03-17 08:31:47', NULL),
(2, 1, 'Antila', 1, 0, '127.0.0.1', NULL, NULL, '2026-03-17 08:32:23', NULL),
(3, 1, 'Asttra', 1, 0, '127.0.0.1', NULL, NULL, '2026-03-17 08:32:53', NULL),
(4, 1, 'Despina', 1, 0, '127.0.0.1', NULL, NULL, '2026-03-17 08:32:59', NULL),
(5, 1, 'Atlanta', 1, 0, '127.0.0.1', NULL, NULL, '2026-03-17 08:33:10', NULL),
(6, 1, 'Fortuna', 1, 0, '127.0.0.1', NULL, NULL, '2026-03-17 08:33:17', NULL),
(7, 1, 'Esther', 1, 0, '127.0.0.1', NULL, NULL, '2026-03-17 08:33:25', NULL),
(8, 2, 'Andromeda', 1, 0, '127.0.0.1', NULL, NULL, '2026-03-17 08:33:35', NULL),
(9, 2, 'Vega', 1, 0, '127.0.0.1', NULL, NULL, '2026-03-17 08:33:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Clusterfest_feedback`
--

CREATE TABLE `Clusterfest_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_experience` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience_feedback` enum('Beyond Expectation','As Per Expectation','Below Expectation') COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_next_meet` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `preferred_date` enum('23 September, 4:00 PM to 6:00 PM','24 September, 8:15 AM to 9:15 AM','25 September, 5:30 PM to 7:30 PM') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Clusterfish`
--

CREATE TABLE `Clusterfish` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Brand_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `City` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phonenumber` bigint(20) DEFAULT NULL,
  `Buisness_Category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Buisness_Profile_in_Brief_` text COLLATE utf8mb4_unicode_ci,
  `Buisness_Model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Referred_By` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Eventtype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Payment_Status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Cluster_Meet`
--

CREATE TABLE `Cluster_Meet` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `city_group_id` int(11) NOT NULL,
  `Meeting_title` text COLLATE utf8mb4_unicode_ci,
  `start_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `End_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Cluster_Meet`
--

INSERT INTO `Cluster_Meet` (`id`, `city_id`, `city_group_id`, `Meeting_title`, `start_date`, `End_date`, `iStatus`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'monthly meet', '02.04.26 10:00', '02.04.26 12:00', 1, 0, '2026-03-30 11:48:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Cluster_Meet_Member_meeting`
--

CREATE TABLE `Cluster_Meet_Member_meeting` (
  `id` int(11) NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `strIP` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Failed_jobs`
--

CREATE TABLE `Failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Induction_meet`
--

CREATE TABLE `Induction_meet` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phonenumber` bigint(20) DEFAULT NULL,
  `referred_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checktime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Gst_numbar` bigint(20) DEFAULT NULL,
  `cluster_meet` int(11) NOT NULL DEFAULT '0',
  `Payment_Status` int(11) NOT NULL DEFAULT '0',
  `Opportunity_meet_flag` int(11) NOT NULL DEFAULT '0',
  `visitor_registration_paid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Inquiry`
--

CREATE TABLE `Inquiry` (
  `inquiry_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileNumber` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci,
  `strIp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Ipmaster`
--

CREATE TABLE `Ipmaster` (
  `id` int(11) NOT NULL,
  `ipaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Logtable`
--

CREATE TABLE `Logtable` (
  `id` int(11) NOT NULL,
  `request` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `response` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strIP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Memberblog_comment`
--

CREATE TABLE `Memberblog_comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `strIp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `Contact_person` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `companyname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Brand_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `citygroup_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategories_id` int(11) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `gstnumber` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budgecount` int(11) DEFAULT NULL,
  `Member_status` int(11) NOT NULL DEFAULT '1',
  `brand_establish_year` year(4) DEFAULT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strIP` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `SubscriptionExpiredDate` date DEFAULT NULL,
  `renewalhistory_id` int(11) DEFAULT NULL,
  `Book_Your_Podcast` date DEFAULT NULL,
  `Book_Your_Member_of_the_week` date DEFAULT NULL,
  `Member_of_the_week_enddate` date DEFAULT NULL,
  `facebook_link` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_link` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Company_logo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `work_anniversary_date` date DEFAULT NULL,
  `Book_week_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Arrival_flag` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `user_id`, `Contact_person`, `companyname`, `Brand_name`, `phonenumber`, `email`, `address`, `city_id`, `citygroup_id`, `category_id`, `subcategories_id`, `pincode`, `gstnumber`, `budgecount`, `Member_status`, `brand_establish_year`, `iStatus`, `isDelete`, `strIP`, `created_at`, `updated_at`, `created_by`, `updated_by`, `SubscriptionExpiredDate`, `renewalhistory_id`, `Book_Your_Podcast`, `Book_Your_Member_of_the_week`, `Member_of_the_week_enddate`, `facebook_link`, `youtube_link`, `instagram_link`, `linkedin_link`, `google_link`, `profile_photo`, `Company_logo`, `date_of_birth`, `work_anniversary_date`, `Book_week_time`, `Arrival_flag`) VALUES
(1, 244, 'krunal shah', 'Apollo', NULL, '9824773136', 'shahkrunal83@gmail.com', 'Sola', 1, 4, 61, 0, 380060, '54547878', NULL, 1, '2000', 1, 0, '103.1.100.226', '2026-03-19 09:50:54', '2026-03-30 11:49:42', 1, 1, '2027-03-30', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1984-03-19', NULL, NULL, 0),
(2, 245, 'prerna parekh', 'Apollo', NULL, '9987654321', 'dev5.apolloinfotech@gmail.com', 'Sola', 1, 5, 53, NULL, 380060, '54547878', NULL, 1, '2020', 1, 0, '49.36.69.251', '2026-03-19 09:52:01', '0000-00-00 00:00:00', 1, NULL, '2027-03-19', 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1994-06-09', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `membership_plans`
--

CREATE TABLE `membership_plans` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_in_days` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `discountamout` int(11) DEFAULT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strIP` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membership_plans`
--

INSERT INTO `membership_plans` (`id`, `plan_name`, `duration_in_days`, `amount`, `discount`, `discountamout`, `iStatus`, `isDelete`, `strIP`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'yearly membership', 365, 23000, 0, 0, 1, 0, '127.0.0.1', '2026-03-17 08:47:45', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Member_Activity`
--

CREATE TABLE `Member_Activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `strIP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Member_category`
--

CREATE TABLE `Member_category` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strIP` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Member_news_comment`
--

CREATE TABLE `Member_news_comment` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companyname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `businesscategory` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strIP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `referred_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Payment_Status` int(11) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL DEFAULT '0',
  `ispaid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_services`
--

CREATE TABLE `member_services` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` int(11) DEFAULT NULL,
  `min_price` int(11) DEFAULT NULL,
  `max_price` int(11) DEFAULT NULL,
  `product_category_Id` int(11) DEFAULT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strIP` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Hash_Tag` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_starts`
--

CREATE TABLE `member_starts` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `badgescollected` int(11) NOT NULL,
  `Comments` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strIP` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meta_data`
--

CREATE TABLE `meta_data` (
  `id` int(11) NOT NULL,
  `pagename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h1tag` text COLLATE utf8mb4_unicode_ci,
  `h1taggrey` text COLLATE utf8mb4_unicode_ci,
  `metaTitle` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metaKeyword` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metaDescription` varchar(8000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_12_173356_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_and_events`
--

CREATE TABLE `news_and_events` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `eventstart_date` date DEFAULT NULL,
  `eventend_date` date DEFAULT NULL,
  `ispaid` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `limitedset` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setnumber` int(11) DEFAULT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strIP` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `event_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `overteem`
--

CREATE TABLE `overteem` (
  `Overteem_id` int(11) NOT NULL,
  `Overteem_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Overteem_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `designation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isteam` int(11) NOT NULL DEFAULT '0',
  `strIP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(30, 'testuser@mailinator.com', 'FhlRZg1vQA', NULL),
(40, 'ai.dev.laravel9@gmail.com', 'vTiMflTNt9', NULL),
(41, 'ai.dev.laravel9@gmail.com', 'dvn9Y8JwjX', NULL),
(43, 'payal@snehaljoshi.com', 'EwrOolUc6A', NULL),
(44, 'nisarg.sut@gmail.com', 'aEunRdI1Yz', NULL),
(46, 'nisarg.sut@gmail.com', 'hKQ6dain9H', NULL),
(47, 'shahutsav029@gmail.com', '8qzplQfpQi', NULL),
(48, 'k.krupa0101@gmail.com', 'dE1YR3DH4B', NULL),
(49, 'k.krupa0101@gmail.com', 'VjcUQECRU7', NULL),
(50, 'PRAHITDFC@GMAIL.COM', '51VjcrLo19', NULL),
(51, 'PRAHITDFC@GMAIL.COM', '20Ej6j0eeN', NULL),
(52, 'PRAHITDFC@GMAIL.COM', 'ND2H0uCJP4', NULL),
(55, 'glimmersofwisdom@gmail.com', 'BBm35O1hPP', NULL),
(56, 'glimmersofwisdom@gmail.com', 'ok3lSAfJIa', NULL),
(57, 'glimmersofwisdom@gmail.com', 'fOJNSIXwrb', NULL),
(61, 'nkshahinvestment@gmail.com', '9OuhifKJCU', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user-list', 'web', '2022-09-12 04:33:06', '2022-09-12 04:33:06'),
(2, 'user-create', 'web', '2022-09-12 04:33:06', '2022-09-12 04:33:06'),
(3, 'user-edit', 'web', '2022-09-12 04:33:06', '2022-09-12 04:33:06'),
(4, 'user-delete', 'web', '2022-09-12 04:33:06', '2022-09-12 04:33:06'),
(5, 'role-create', 'web', '2022-09-12 04:33:06', '2022-09-12 04:33:06'),
(6, 'role-edit', 'web', '2022-09-12 04:33:06', '2022-09-12 04:33:06'),
(7, 'role-list', 'web', '2022-09-12 04:33:06', '2022-09-12 04:33:06'),
(8, 'role-delete', 'web', '2022-09-12 04:33:06', '2022-09-12 04:33:06'),
(9, 'permission-list', 'web', '2022-09-12 04:33:06', '2022-09-12 04:33:06'),
(10, 'permission-create', 'web', '2022-09-12 04:33:06', '2022-09-12 04:33:06'),
(11, 'permission-edit', 'web', '2022-09-12 04:33:06', '2022-09-12 04:33:06'),
(12, 'permission-delete', 'web', '2022-09-12 04:33:06', '2022-09-12 04:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_gallery`
--

CREATE TABLE `photo_gallery` (
  `gallery_id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventId` int(11) DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strIP` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `photo_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_gallery_detail`
--

CREATE TABLE `photo_gallery_detail` (
  `gallery_detail_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `photo` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strEntryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `strIP` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ProductInquiry`
--

CREATE TABLE `ProductInquiry` (
  `id` int(11) NOT NULL,
  `Member_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Phone_Number` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Reference`
--

CREATE TABLE `Reference` (
  `Reference_id` int(11) NOT NULL,
  `Reference_from` int(11) DEFAULT NULL,
  `Reference_to` int(11) DEFAULT NULL,
  `Reference_Name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Reference_Date` date DEFAULT NULL,
  `isapproved_status` int(11) NOT NULL DEFAULT '0',
  `approved_by` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by_id` int(11) DEFAULT NULL,
  `Referencecomment` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approveddatetime` datetime DEFAULT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strIP` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `gu_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Reference_received_date` date DEFAULT NULL,
  `Company_Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Refer_for_message` text COLLATE utf8mb4_unicode_ci,
  `reject_comment` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Reference`
--

INSERT INTO `Reference` (`Reference_id`, `Reference_from`, `Reference_to`, `Reference_Name`, `Reference_Date`, `isapproved_status`, `approved_by`, `approved_by_id`, `Referencecomment`, `approveddatetime`, `iStatus`, `isDelete`, `strIP`, `created_at`, `updated_at`, `created_by`, `updated_by`, `gu_id`, `Reference_received_date`, `Company_Name`, `Email`, `phonenumber`, `Refer_for_message`, `reject_comment`) VALUES
(4, 243, 240, 'test', '2026-03-19', 1, 'User', 243, 'ysuggh', NULL, 1, 0, '49.36.69.251', '2026-03-18 19:56:23', '0000-00-00 00:00:00', 243, NULL, 'eomfFAb5eR', NULL, 'Apollo', 'dev1.apolloinfotech@gmail.com', '9987654321', 'test', NULL),
(5, 244, 245, 'test connection', '2026-03-19', 2, 'User', 245, 'test', NULL, 1, 0, '49.36.69.251', '2026-03-19 10:23:17', '0000-00-00 00:00:00', 244, NULL, 'KvckyuNk83', NULL, 'apollo', 'shahkrunal83@gmail.com', '9824773136', 'test refer message', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `register_frontview`
--

CREATE TABLE `register_frontview` (
  `id` int(11) NOT NULL,
  `reg_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phonenumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_business_segment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_businessFirm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_OfficeAddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_Other_Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_Inceptionyear` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_annual_turnover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_documents_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` int(11) DEFAULT NULL,
  `industry_subcategory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representative_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chapter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_establishment_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strIp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `Status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='1';

-- --------------------------------------------------------

--
-- Table structure for table `renewal_history`
--

CREATE TABLE `renewal_history` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `renewal_date` date DEFAULT NULL,
  `paymentrefNo` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `substartdate` date DEFAULT NULL,
  `stbenddate` date DEFAULT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strIP` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `renewal_history`
--

INSERT INTO `renewal_history` (`id`, `member_id`, `plan_id`, `renewal_date`, `paymentrefNo`, `substartdate`, `stbenddate`, `iStatus`, `isDelete`, `strIP`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, '2026-03-18', '1235464654', '2026-03-30', '2027-03-30', 1, 0, NULL, '2026-03-30 11:49:42', '2026-03-30 11:49:42', 1, 1),
(2, 2, 1, '2026-03-17', '1235464654', '2026-03-17', '2027-03-17', 1, 0, NULL, '2026-03-17 09:27:41', '0000-00-00 00:00:00', 1, NULL),
(3, 3, 1, '2026-03-17', '1235464654', '2026-03-17', '2027-03-17', 1, 0, NULL, '2026-03-17 09:35:15', '0000-00-00 00:00:00', 1, NULL),
(4, 4, 1, '2026-03-19', '1235464654', '2026-03-19', '2027-03-19', 1, 0, NULL, '2026-03-18 19:33:57', '0000-00-00 00:00:00', 1, NULL),
(5, 5, 1, '2026-03-19', '1235464654', '2026-03-19', '2027-03-19', 1, 0, NULL, '2026-03-18 19:37:19', '0000-00-00 00:00:00', 1, NULL),
(6, 6, 1, '2026-03-19', '1235464654', '2026-03-19', '2027-03-19', 1, 0, NULL, '2026-03-18 19:40:45', '0000-00-00 00:00:00', 1, NULL),
(7, 1, 1, '2026-03-18', '1235464654', '2026-03-30', '2027-03-30', 1, 0, NULL, '2026-03-30 11:49:42', '2026-03-30 11:49:42', 1, 1),
(8, 2, 1, '2026-03-19', NULL, '2026-03-19', '2027-03-19', 1, 0, NULL, '2026-03-19 09:52:01', '0000-00-00 00:00:00', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-09-12 04:33:06', '2022-09-12 04:33:06'),
(2, 'Member', 'web', '2022-09-12 04:33:06', '2022-09-12 04:33:06'),
(3, 'AdminUser', 'web', '2022-09-12 04:33:06', '2022-09-12 04:33:06');

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
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sendemaildetails`
--

CREATE TABLE `sendemaildetails` (
  `id` int(11) NOT NULL,
  `strSubject` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strTitle` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strFromMail` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ToMail` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strCC` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strBCC` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sendemaildetails`
--

INSERT INTO `sendemaildetails` (`id`, `strSubject`, `strTitle`, `strFromMail`, `ToMail`, `strCC`, `strBCC`) VALUES
(1, 'Business Reminder ', 'Evolve Business Community', 'support@evolv.co.in', NULL, NULL, NULL),
(2, 'Business Given', 'Evolve Business Community', 'support@evolv.co.in', NULL, NULL, NULL),
(3, 'Member Login Detail', 'Evolve Business Community', 'support@evolv.co.in', NULL, NULL, NULL),
(4, 'Contact Inquiry', 'Evolve Business Community', 'support@evolv.co.in', 'support@evolv.co.in', '', ''),
(5, 'Book Your Podcast', 'Evolve Business Community', 'support@evolv.co.in', 'support@evolv.co.in', NULL, NULL),
(6, 'Book Member of the week', 'Evolve Business Community', 'support@evolv.co.in', 'support@evolv.co.in', NULL, NULL),
(7, 'Product Inquiry', 'Evolve Business Community', 'support@evolv.co.in', 'support@evolv.co.in', 'support@evolv.co.in', NULL),
(8, 'Forget Password', 'Evolve Business Community', 'support@evolv.co.in', NULL, NULL, NULL),
(9, 'Order', 'Evolve Business Community', 'support@evolv.co.in', NULL, NULL, NULL),
(10, 'Book Your Podcast status', 'Evolve Business Community', 'support@evolv.co.in', NULL, NULL, NULL),
(11, 'Book Your Member of the week', 'Evolve Business Community', 'support@evolv.co.in', NULL, NULL, NULL),
(12, 'refrence given', 'Evolve Business Community', 'support@evolv.co.in', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider`
--

CREATE TABLE `serviceprovider` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `strIP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strIP` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `iStatus`, `isDelete`, `strIP`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(16, 53, 'java', 1, 0, '103.1.100.226', NULL, NULL, '2024-02-26 10:59:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2' COMMENT '1=Admin, 2=TA/TP',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `user_type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `mobile_number`, `email_verified_at`, `password`, `role_id`, `status`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'Admin', 'admin@admin.com', '7405067311', NULL, '$2y$10$CaIZzG2tKnV89FFjKd.Rpe.qOuEH9CK0pWqzh8I7xpHBaJ1L0OJXK', 1, 1, 'Admin', 'cHzFfOq4dTd423bGb2AvUkgPN9KLDNWR0wmpV4J1XSlTZL9JEMdXz7QnJAE5', '2022-09-12 04:33:06', '2024-06-21 14:59:29'),
(244, 'krunal shah', NULL, 'shahkrunal83@gmail.com', '9824773136', NULL, '$2y$10$ZJSyN.lR4JN7hp4Ugy.T6O4h26CmfTbpwKDcJNIl7xchLxyZ7xg.O', 2, 1, 'User', NULL, '2026-03-19 09:50:54', '2026-03-30 11:49:42'),
(245, 'prerna parekh', NULL, 'dev5.apolloinfotech@gmail.com', '9987654321', NULL, '$2y$10$9SOqRYhE6ifubXjbu6SS4OkS9z.AYlhHj9bAXKWTJR4fIScnN6vpG', 2, 1, 'User', NULL, '2026-03-19 09:52:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video_gallery`
--

CREATE TABLE `video_gallery` (
  `video_id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventid` int(11) DEFAULT NULL,
  `vidoeurl` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strIP` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `video_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `interested_category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `is_ready` int(11) NOT NULL DEFAULT '0',
  `iStatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `strIP` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `youngleaders`
--

CREATE TABLE `youngleaders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_category_id` int(11) DEFAULT NULL,
  `company_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `community_participation` int(11) DEFAULT NULL,
  `community_name` text COLLATE utf8mb4_unicode_ci,
  `joining_reason` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `vibe_1` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vibe_2` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vibe_3` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vibe_4` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vibe_5` varchar(252) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vibe_6` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Adminfrontimage`
--
ALTER TABLE `Adminfrontimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Adminuser_permission`
--
ALTER TABLE `Adminuser_permission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `Announcement`
--
ALTER TABLE `Announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Banners`
--
ALTER TABLE `Banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `Blogs`
--
ALTER TABLE `Blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Business`
--
ALTER TABLE `Business`
  ADD PRIMARY KEY (`business_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_groups`
--
ALTER TABLE `city_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Clusterfest_feedback`
--
ALTER TABLE `Clusterfest_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Clusterfish`
--
ALTER TABLE `Clusterfish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Cluster_Meet`
--
ALTER TABLE `Cluster_Meet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Cluster_Meet_Member_meeting`
--
ALTER TABLE `Cluster_Meet_Member_meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Failed_jobs`
--
ALTER TABLE `Failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `Induction_meet`
--
ALTER TABLE `Induction_meet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Inquiry`
--
ALTER TABLE `Inquiry`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `Ipmaster`
--
ALTER TABLE `Ipmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Logtable`
--
ALTER TABLE `Logtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Memberblog_comment`
--
ALTER TABLE `Memberblog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_plans`
--
ALTER TABLE `membership_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Member_Activity`
--
ALTER TABLE `Member_Activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Member_category`
--
ALTER TABLE `Member_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Member_news_comment`
--
ALTER TABLE `Member_news_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_services`
--
ALTER TABLE `member_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_starts`
--
ALTER TABLE `member_starts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_data`
--
ALTER TABLE `meta_data`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `news_and_events`
--
ALTER TABLE `news_and_events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `overteem`
--
ALTER TABLE `overteem`
  ADD PRIMARY KEY (`Overteem_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `photo_gallery_detail`
--
ALTER TABLE `photo_gallery_detail`
  ADD PRIMARY KEY (`gallery_detail_id`);

--
-- Indexes for table `ProductInquiry`
--
ALTER TABLE `ProductInquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Reference`
--
ALTER TABLE `Reference`
  ADD PRIMARY KEY (`Reference_id`);

--
-- Indexes for table `register_frontview`
--
ALTER TABLE `register_frontview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renewal_history`
--
ALTER TABLE `renewal_history`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sendemaildetails`
--
ALTER TABLE `sendemaildetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video_gallery`
--
ALTER TABLE `video_gallery`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youngleaders`
--
ALTER TABLE `youngleaders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Adminfrontimage`
--
ALTER TABLE `Adminfrontimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Adminuser_permission`
--
ALTER TABLE `Adminuser_permission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `Announcement`
--
ALTER TABLE `Announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Banners`
--
ALTER TABLE `Banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Blogs`
--
ALTER TABLE `Blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Business`
--
ALTER TABLE `Business`
  MODIFY `business_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city_groups`
--
ALTER TABLE `city_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Clusterfest_feedback`
--
ALTER TABLE `Clusterfest_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Clusterfish`
--
ALTER TABLE `Clusterfish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Cluster_Meet`
--
ALTER TABLE `Cluster_Meet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Cluster_Meet_Member_meeting`
--
ALTER TABLE `Cluster_Meet_Member_meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Failed_jobs`
--
ALTER TABLE `Failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Induction_meet`
--
ALTER TABLE `Induction_meet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Inquiry`
--
ALTER TABLE `Inquiry`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Ipmaster`
--
ALTER TABLE `Ipmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Logtable`
--
ALTER TABLE `Logtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Memberblog_comment`
--
ALTER TABLE `Memberblog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `membership_plans`
--
ALTER TABLE `membership_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Member_Activity`
--
ALTER TABLE `Member_Activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Member_category`
--
ALTER TABLE `Member_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Member_news_comment`
--
ALTER TABLE `Member_news_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_services`
--
ALTER TABLE `member_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member_starts`
--
ALTER TABLE `member_starts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meta_data`
--
ALTER TABLE `meta_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news_and_events`
--
ALTER TABLE `news_and_events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `overteem`
--
ALTER TABLE `overteem`
  MODIFY `Overteem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_gallery_detail`
--
ALTER TABLE `photo_gallery_detail`
  MODIFY `gallery_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ProductInquiry`
--
ALTER TABLE `ProductInquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Reference`
--
ALTER TABLE `Reference`
  MODIFY `Reference_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `register_frontview`
--
ALTER TABLE `register_frontview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `renewal_history`
--
ALTER TABLE `renewal_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sendemaildetails`
--
ALTER TABLE `sendemaildetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `video_gallery`
--
ALTER TABLE `video_gallery`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `youngleaders`
--
ALTER TABLE `youngleaders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
