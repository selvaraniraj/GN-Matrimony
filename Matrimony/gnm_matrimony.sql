-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2026 at 08:40 AM
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
-- Database: `gnm_matrimony`
--

-- --------------------------------------------------------

--
-- Table structure for table `associations`
--

CREATE TABLE `associations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `association_name` varchar(200) DEFAULT NULL,
  `association_phoneno` varchar(20) DEFAULT NULL,
  `secretary_number` varchar(50) DEFAULT NULL,
  `head_numer` varchar(50) DEFAULT NULL,
  `association_regno` varchar(50) DEFAULT NULL,
  `treasurer_number` varchar(50) DEFAULT NULL,
  `secretary` varchar(200) DEFAULT NULL,
  `association_head` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `taluk` varchar(100) DEFAULT NULL,
  `village` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `associations`
--

INSERT INTO `associations` (`id`, `user_id`, `association_name`, `association_phoneno`, `secretary_number`, `head_numer`, `association_regno`, `treasurer_number`, `secretary`, `association_head`, `address`, `state`, `city`, `taluk`, `village`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'SVK Matrimony Association', '1234567890', '9876543210', '8765432109', 'SVK12345', '7654321098', 'John Doe', 'Jane Smith', '123 Green St, Cityville', 'State A', 'City X', 'Taluk Y', 'Village Z', 'image1.jpg', 1, '2024-10-04 13:14:11', '2024-10-04 13:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ariyalur', 1, NULL, NULL),
(2, 1, 'Chennai', 1, NULL, NULL),
(3, 1, 'Coimbatore', 1, NULL, NULL),
(4, 1, 'Cuddalore', 1, NULL, NULL),
(5, 1, 'Dharmapuri', 1, NULL, NULL),
(6, 1, 'Dindigul', 1, NULL, NULL),
(7, 1, 'Erode', 1, NULL, NULL),
(8, 1, 'Kanchipuram', 1, NULL, NULL),
(9, 1, 'Kanyakumari', 1, NULL, NULL),
(10, 1, 'Karur', 1, NULL, NULL),
(11, 1, 'Krishnagiri', 1, NULL, NULL),
(12, 1, 'Madurai', 1, NULL, NULL),
(13, 1, 'Nagapattinam', 1, NULL, NULL),
(14, 1, 'Namakkal', 1, NULL, NULL),
(15, 1, 'Nilgiris', 1, NULL, NULL),
(16, 1, 'Perambalur', 1, NULL, NULL),
(17, 1, 'Pudukkottai', 1, NULL, NULL),
(18, 1, 'Ramanathapuram', 1, NULL, NULL),
(19, 1, 'Salem', 1, NULL, NULL),
(20, 1, 'Sivaganga', 1, NULL, NULL),
(21, 1, 'Thanjavur', 1, NULL, NULL),
(22, 1, 'Theni', 1, NULL, NULL),
(23, 1, 'Thoothukudi', 1, NULL, NULL),
(24, 1, 'Tiruchirappalli', 1, NULL, NULL),
(25, 1, 'Tirunelveli', 1, NULL, NULL),
(26, 1, 'Tiruppur', 1, NULL, NULL),
(27, 1, 'Tiruvallur', 1, NULL, NULL),
(28, 1, 'Tiruvannamalai', 1, NULL, NULL),
(29, 1, 'Tiruvarur', 1, NULL, NULL),
(30, 1, 'Vellore', 1, NULL, NULL),
(31, 1, 'Viluppuram', 1, NULL, NULL),
(32, 1, 'Virudhunagar', 1, NULL, NULL),
(33, 1, 'Kallakkurichi', 1, NULL, NULL),
(34, 1, 'Chengalpattu', 1, NULL, NULL),
(35, 1, 'Ranipet', 1, NULL, NULL),
(36, 1, 'Tiruppattur', 1, NULL, NULL),
(37, 1, 'Tenkasi', 1, NULL, NULL),
(38, 2, 'Alappuzha', 1, NULL, NULL),
(39, 2, 'Ernakulam', 1, NULL, NULL),
(40, 2, 'Idukki', 1, NULL, NULL),
(41, 2, 'Kannur', 1, NULL, NULL),
(42, 2, 'Kasaragod', 1, NULL, NULL),
(43, 2, 'Kollam', 1, NULL, NULL),
(44, 2, 'Kottayam', 1, NULL, NULL),
(45, 2, 'Kozhikode', 1, NULL, NULL),
(46, 2, 'Malappuram', 1, NULL, NULL),
(47, 2, 'Palakkad', 1, NULL, NULL),
(48, 2, 'Pathanamthitta', 1, NULL, NULL),
(49, 2, 'Thiruvananthapuram', 1, NULL, NULL),
(50, 2, 'Thrissur', 1, NULL, NULL),
(51, 2, 'Wayanad', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosam_details`
--

CREATE TABLE `dosam_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosam_details`
--

INSERT INTO `dosam_details` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Mars Dosam', 1, NULL, NULL),
(2, 'Naga Dosam', 1, NULL, NULL),
(3, 'Ketu Dosam', 1, NULL, NULL),
(4, 'Rahu Dosam', 1, NULL, NULL),
(5, 'Kala Sarpa Dosam', 1, NULL, NULL),
(6, 'Kalatra Dosam', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `name`, `department`, `is_active`, `created_at`, `updated_at`) VALUES
(0, 'Select', NULL, 1, NULL, NULL),
(1, 'School Level', NULL, 1, NULL, NULL),
(2, 'UG', NULL, 1, NULL, NULL),
(3, 'PG', NULL, 1, NULL, NULL),
(4, 'Engineering', NULL, 1, NULL, NULL),
(5, 'MBA', NULL, 1, NULL, NULL),
(6, 'Doctor', NULL, 1, NULL, NULL),
(7, 'M.COM', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `education_details`
--

CREATE TABLE `education_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `education_id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `taulk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `college_inst` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `employee_in` varchar(255) DEFAULT NULL,
  `occuption` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `income` text DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `passport_number` varchar(255) DEFAULT NULL,
  `visa_type` varchar(255) DEFAULT NULL,
  `other_country_address` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `mark_percentage` varchar(255) DEFAULT NULL,
  `completed_year` varchar(255) DEFAULT NULL,
  `medium` enum('tamil','english','hindi') NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education_details`
--

INSERT INTO `education_details` (`id`, `education_id`, `member_id`, `state_id`, `city_id`, `taulk_id`, `college_inst`, `organization`, `employee_in`, `occuption`, `company_name`, `destination`, `income`, `pincode`, `address`, `passport_number`, `visa_type`, `other_country_address`, `location`, `mark_percentage`, `completed_year`, `medium`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, 2, 14, NULL, NULL, 'Yes', 'Private', NULL, 'software professional/sr system analyst', '30,000-60,000', '600019', 'Thiruvottiyur,chennai-19', NULL, NULL, NULL, 'India', NULL, NULL, 'tamil', 1, '2024-12-03 10:59:41', '2024-12-13 07:45:55'),
(3, 3, 2, 1, 2, 17, 'IIT Kharagpur', NULL, 'Yes', 'Private', 'Eli and Lilly company', 'Analyst', '80,000-1lakh', '600007', NULL, NULL, NULL, NULL, 'India', NULL, NULL, 'tamil', 1, '2024-12-03 23:31:46', '2024-12-03 23:31:46'),
(4, 2, 3, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Private', 'Valeo', 'Quality Engineer', '30,000-60,000', NULL, NULL, NULL, NULL, NULL, 'India', NULL, NULL, 'tamil', 1, '2024-12-04 00:17:01', '2024-12-04 00:17:01'),
(5, 2, 4, 1, 2, 26, 'Computer Science', NULL, 'Yes', 'Private', 'Infosys Chennai', 'consultant', '1lakh-1.5lakh', '600119', NULL, NULL, NULL, NULL, 'India', NULL, NULL, 'tamil', 1, '2024-12-04 02:18:13', '2024-12-04 02:18:13'),
(6, 4, 5, 1, 37, 204, 'Einstein College of Engineering College in Sidaparppanallur, Tamil Nadu', NULL, 'Yes', 'Private', 'Brokenglass Designs', 'Frondend Devolper and SEO', '20,000-30,000', '627859', 'Chellasamy Complex, 1st Floor East Wing, Sivagurunathapuram, Surandai, Tamil Nadu 627859', NULL, NULL, NULL, 'India', NULL, NULL, 'tamil', 1, '2024-12-06 06:00:58', '2024-12-06 06:00:58'),
(7, 4, 6, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Private', NULL, 'QA specialist', '30,000-60,000', NULL, NULL, NULL, NULL, NULL, 'India', NULL, NULL, 'tamil', 1, '2024-12-06 08:58:25', '2024-12-06 09:06:22'),
(8, 5, 7, 1, 2, 14, NULL, NULL, 'Yes', 'Business', 'Circle of cricket', NULL, '60,000-80,000', '600081', NULL, NULL, NULL, NULL, 'India', NULL, NULL, 'tamil', 1, '2024-12-06 09:44:18', '2024-12-06 09:44:18'),
(9, 3, 8, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-06 10:53:30', '2024-12-06 10:53:30'),
(10, 5, 10, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-06 11:15:33', '2024-12-06 11:15:33'),
(11, 3, 11, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-06 11:20:45', '2024-12-06 11:20:45'),
(12, 7, 12, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-06 16:14:05', '2024-12-13 10:54:49'),
(13, 4, 13, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Government', 'Indian Railways', 'Senior Commercial cum ticket clerk', NULL, NULL, NULL, NULL, NULL, NULL, 'India', NULL, NULL, 'tamil', 1, '2024-12-07 05:24:06', '2024-12-07 05:24:06'),
(14, 4, 14, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Private', 'Capgemini Technology services pvt', 'Process Lead', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-07 05:55:36', '2024-12-13 11:08:58'),
(15, 4, 15, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Private', 'Sun Network', 'Software Engineer', NULL, NULL, NULL, NULL, NULL, NULL, 'India', NULL, NULL, 'tamil', 1, '2024-12-07 05:59:28', '2024-12-07 05:59:28'),
(16, 4, 16, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Private', 'onward technologies pvt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-07 06:26:28', '2024-12-07 06:26:28'),
(18, 0, 17, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-07 06:31:49', '2024-12-16 10:34:15'),
(19, 4, 19, 1, 2, 27, 'Meenakshi Sundararajan Engineering College', NULL, 'Yes', 'Private', 'Flex,Taramani,Chennai.', 'Research Enginner', '80,000-1lakh', '600100', 'Flex Ltd.\r\nTidel Park, 4th Floor,\r\nNo. 4, Rajiv Gandhi Salai (OMR),\r\nTaramani, Chennai – 600 100, Tamil Nadu, India.', NULL, NULL, NULL, 'India', NULL, NULL, 'tamil', 1, '2024-12-07 07:33:16', '2024-12-07 07:33:16'),
(20, 2, 21, 1, NULL, NULL, 'NIT,Trichy', NULL, 'Yes', 'Private', 'Accenture', NULL, '30,000-60,000', NULL, NULL, NULL, NULL, NULL, 'India', NULL, NULL, 'tamil', 1, '2024-12-08 05:48:34', '2024-12-08 05:48:34'),
(21, 4, 22, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Government', 'EHV cable Projects for TNEB', 'Senior Enginner', '30,000-60,000', NULL, NULL, NULL, NULL, NULL, 'India', NULL, NULL, 'tamil', 1, '2024-12-09 05:54:39', '2024-12-09 05:54:39'),
(22, 4, 24, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Private', NULL, 'IT field', '1lakh-1.5lakh', NULL, NULL, NULL, NULL, NULL, 'India', NULL, NULL, 'tamil', 1, '2024-12-09 08:03:55', '2024-12-09 08:03:55'),
(23, 3, 25, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-09 09:20:16', '2024-12-09 09:20:16'),
(24, 2, 27, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-09 10:12:25', '2024-12-09 10:12:25'),
(25, 0, 28, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-09 10:24:10', '2024-12-09 10:24:10'),
(26, 0, 29, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-09 10:34:12', '2024-12-09 10:34:12'),
(27, 3, 30, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-09 10:49:56', '2024-12-09 10:50:53'),
(28, 2, 33, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-11 10:44:54', '2024-12-11 10:44:54'),
(29, 6, 34, NULL, NULL, NULL, 'SRM Dental College,Ramapuram', NULL, 'Yes', 'Private', NULL, 'Senior Lecturer,Consultant ORTHODONIST', '30,000-60,000', NULL, NULL, NULL, NULL, NULL, 'India', NULL, NULL, 'tamil', 1, '2024-12-11 11:10:45', '2024-12-11 11:10:45'),
(30, 0, 35, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Private', 'Omnicon Media Group', 'Account Executive', NULL, NULL, NULL, NULL, NULL, NULL, 'India', NULL, NULL, 'tamil', 1, '2024-12-11 11:29:21', '2024-12-16 11:58:59'),
(31, 3, 36, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-11 14:09:37', '2024-12-11 14:09:37'),
(32, 3, 37, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-11 14:44:47', '2024-12-11 14:44:47'),
(33, 3, 38, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-12 05:50:30', '2024-12-12 05:50:30'),
(36, 3, 39, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Private', NULL, 'Data Analyst', '30,000-60,000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-12 07:53:38', '2024-12-12 08:12:35'),
(37, 4, 40, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-12 09:57:43', '2024-12-12 09:57:43'),
(38, 0, 41, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-12 10:46:55', '2024-12-12 10:50:25'),
(39, 5, 42, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-12 11:07:13', '2024-12-12 11:07:13'),
(40, 0, 43, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-12 11:20:19', '2024-12-12 11:20:19'),
(41, 2, 44, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Government', 'Auditor office', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-12 11:36:14', '2024-12-12 11:36:14'),
(42, 0, 26, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-16 10:59:16', '2024-12-16 10:59:16'),
(43, 4, 45, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Private', 'Wipro', 'Senior Project Enginner', '1lakh-1.5lakh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-17 06:29:26', '2024-12-17 06:32:17'),
(44, 4, 46, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Business', 'Sri magal traders', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-17 07:22:49', '2024-12-17 07:22:49'),
(45, 5, 47, NULL, NULL, NULL, 'Vivekananda', NULL, 'Yes', 'Private', 'Grant Thorton', 'Senior Associative', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-17 08:12:14', '2024-12-17 08:12:14'),
(46, 4, 49, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Private', 'Rithika Traders', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-17 09:47:11', '2024-12-17 09:47:11'),
(47, 4, 48, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Private', 'Cloud sense private Limited', 'Senior software developer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-17 10:08:58', '2024-12-17 10:08:58'),
(48, 4, 50, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, 'L T I Mindtree Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-17 10:24:33', '2024-12-17 10:24:33'),
(49, 2, 51, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Private', 'Apparel manufacturing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-17 10:42:17', '2024-12-17 10:42:17'),
(50, 2, 52, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Private', NULL, 'Software Engineer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-17 10:54:47', '2024-12-17 10:54:47'),
(52, 2, 53, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Private', 'PWC Sdc', 'Associate level 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-17 11:19:01', '2024-12-17 11:19:01'),
(53, 1, 54, NULL, NULL, NULL, 'PSG Tech,Coimbatore', NULL, 'Yes', 'Private', 'Tidel Park', 'Business analyst', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-17 11:33:30', '2024-12-17 11:33:30'),
(54, 3, 32, NULL, NULL, NULL, 'Stella Maris College', NULL, 'Yes', NULL, 'Omnicom Media Group', 'Account Executive', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-18 05:48:58', '2024-12-18 05:48:58'),
(55, 0, 18, 1, 2, 13, NULL, NULL, 'Yes', 'Private', 'Bolt & Nuts Fasteners', 'General Mechanic', '30,000-60,000', '600001', '61 (Old No. 28/2), Jones Street, Chennai – 600001, Tamil Nadu, India.', NULL, NULL, NULL, 'India', NULL, NULL, 'tamil', 1, '2024-12-18 06:04:04', '2024-12-18 06:04:04'),
(56, 0, 31, NULL, NULL, NULL, 'SRM Dental College', NULL, 'Yes', 'Private', NULL, 'Senior Lecturer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-18 06:20:05', '2024-12-18 06:20:05'),
(57, 5, 20, NULL, NULL, NULL, 'Valliammal Enginneering College(SRM)', NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamil', 1, '2024-12-18 07:35:09', '2024-12-18 07:35:09');

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
-- Table structure for table `family_details`
--

CREATE TABLE `family_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `family_status` varchar(255) DEFAULT NULL,
  `family_type` varchar(255) DEFAULT NULL,
  `family_values` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `father_status` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `mother_status` varchar(255) DEFAULT NULL,
  `number_of_brothers` int(11) DEFAULT NULL,
  `brothers_married` varchar(255) DEFAULT NULL,
  `number_of_sisters` int(11) DEFAULT NULL,
  `sisters_married` varchar(255) DEFAULT NULL,
  `parent_contact_number` varchar(20) DEFAULT NULL,
  `ancestral_origin` varchar(255) DEFAULT NULL,
  `family_locations` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `family_details`
--

INSERT INTO `family_details` (`id`, `member_id`, `family_status`, `family_type`, `family_values`, `father_name`, `father_status`, `mother_name`, `mother_status`, `number_of_brothers`, `brothers_married`, `number_of_sisters`, `sisters_married`, `parent_contact_number`, `ancestral_origin`, `family_locations`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, 'Ulaganatha Pandian', NULL, 'Seetha Lakshmi', NULL, 2, '2', NULL, NULL, '9446247372', 'Erasinampatti', NULL, 1, '2024-12-03 10:47:20', '2024-12-03 10:47:20'),
(2, 2, NULL, NULL, NULL, 'Sivaram .A', NULL, 'Vijaya Lakshmi', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-03 23:16:30', '2024-12-03 23:16:30'),
(3, 3, NULL, NULL, NULL, 'Ravichandran K', NULL, 'Ananthi R', 'Others', 1, NULL, NULL, NULL, '9043655449', NULL, NULL, 1, '2024-12-04 00:08:42', '2024-12-13 07:55:36'),
(4, 4, NULL, 'Nuclear', NULL, NULL, 'Business', NULL, 'Others', NULL, NULL, 1, '1', '9841384582', NULL, NULL, 1, '2024-12-04 01:56:48', '2024-12-13 08:11:20'),
(5, 5, NULL, NULL, NULL, 'Murugan', 'Business', 'selvi', 'Others', 1, '1', 1, '1', '6382682513', NULL, NULL, 1, '2024-12-06 05:52:18', '2024-12-06 05:52:18'),
(6, 6, NULL, NULL, NULL, 'Nainar M', NULL, 'Thangamani N', 'Others', 1, NULL, NULL, NULL, '7401095925', NULL, NULL, 1, '2024-12-06 08:45:14', '2024-12-13 09:48:43'),
(7, 7, NULL, NULL, NULL, 'Lingadurai', 'Government', 'Vijayavathi', 'Business', 1, NULL, NULL, NULL, '9444494597', NULL, NULL, 1, '2024-12-06 09:09:21', '2024-12-06 09:09:21'),
(8, 8, NULL, NULL, NULL, 'Anbumani', NULL, 'Umadevi', NULL, 1, 'yes', NULL, NULL, '9442639975', NULL, NULL, 1, '2024-12-06 10:41:33', '2024-12-06 10:55:11'),
(9, 10, NULL, NULL, NULL, 'Arul Murugan .M', NULL, 'Anitha .A', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-06 11:09:31', '2024-12-06 11:09:31'),
(10, 11, NULL, NULL, NULL, 'MayaKrishnan A', 'Business', 'Ponmari M', NULL, 1, NULL, 1, NULL, '9994527447', NULL, NULL, 1, '2024-12-06 11:18:11', '2024-12-06 11:20:05'),
(11, 12, NULL, NULL, NULL, 'Mariyappan', 'Business', 'Vijayalakshmi', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-06 16:08:04', '2024-12-06 16:08:04'),
(12, 13, NULL, NULL, NULL, 'Kamraj C', NULL, 'Mariammal K', NULL, 2, NULL, NULL, NULL, '9597010771', NULL, NULL, 1, '2024-12-07 05:20:40', '2024-12-13 10:58:36'),
(13, 14, NULL, 'Joint_Family', NULL, NULL, 'Business', NULL, 'Others', 2, '2', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-07 05:48:14', '2024-12-07 05:48:14'),
(14, 15, NULL, NULL, NULL, 'SankaraPandiyan G', NULL, 'Meena Kumari S', NULL, NULL, NULL, 1, 'yes', '9042328732', NULL, NULL, 1, '2024-12-07 05:51:46', '2024-12-13 11:14:42'),
(15, 16, NULL, NULL, NULL, 'Subramaniyan', 'Business', 'Uma Maheswari', 'Others', 1, NULL, 1, '1', NULL, NULL, NULL, 1, '2024-12-07 06:17:52', '2024-12-07 06:17:52'),
(16, 17, NULL, NULL, NULL, 'PonnuSamy R', NULL, 'Shanthi', 'Others', 1, 'No', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-07 06:23:25', '2024-12-16 09:16:40'),
(17, 19, NULL, NULL, NULL, 'Raja Sekaran', 'Government', 'Rani R', 'Others', NULL, NULL, 1, 'yes', '9566615798', NULL, NULL, 1, '2024-12-07 07:23:25', '2024-12-07 07:24:53'),
(18, 21, NULL, NULL, NULL, 'Selva raj P', 'Business', 'Pon Malar', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-08 05:41:38', '2024-12-16 09:50:02'),
(19, 22, NULL, NULL, NULL, 'ThangaPerumal N', 'Private', 'Marreshwari T', NULL, NULL, NULL, 1, 'yes', '9710862376', NULL, NULL, 1, '2024-12-09 05:38:28', '2024-12-16 10:00:50'),
(20, 24, NULL, NULL, NULL, 'Kamaraj R', 'Business', 'Backiya Lakshmi', 'Others', 1, 'No', 1, 'yes', '9444388749', NULL, NULL, 1, '2024-12-09 07:52:49', '2024-12-16 10:49:37'),
(21, 25, NULL, NULL, NULL, 'Selva Kumar', 'Business', 'Pushpa Rani', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-09 09:12:57', '2024-12-16 10:50:45'),
(22, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-09 09:46:03', '2024-12-09 09:46:03'),
(23, 27, NULL, NULL, NULL, 'Vasu J', 'Business', 'Jeyasri V', NULL, 1, 'no', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-09 10:07:34', '2024-12-16 11:05:52'),
(24, 28, NULL, NULL, NULL, 'Radha krishanan', 'Business', 'Selvamani', NULL, 1, 'no', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-09 10:22:28', '2024-12-16 11:07:31'),
(25, 29, NULL, NULL, NULL, 'Ayyasamy A', 'Business', 'Thangamani A', NULL, 1, 'no', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-09 10:31:59', '2024-12-16 11:12:14'),
(26, 30, NULL, NULL, NULL, 'Ponnarasan S', NULL, 'Rajeshwari', NULL, 1, 'no', NULL, NULL, '9444351060', NULL, NULL, 1, '2024-12-09 10:48:02', '2024-12-09 10:48:30'),
(27, 33, NULL, NULL, NULL, 'Arunachalasamy S N', NULL, 'Saraga aruna', NULL, NULL, NULL, 2, 'yes', '9444644482', NULL, NULL, 1, '2024-12-11 10:38:34', '2024-12-16 11:33:08'),
(28, 34, NULL, NULL, NULL, 'Jothy J', NULL, 'Usha devi J', 'Others', 1, 'NO', NULL, NULL, '9962628717', NULL, NULL, 1, '2024-12-11 11:03:07', '2024-12-16 11:43:44'),
(29, 35, NULL, NULL, NULL, 'Selapalam M.G.E', 'Business', 'Bamini', 'Others', 1, 'NO', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-11 11:24:42', '2024-12-16 11:55:54'),
(30, 36, NULL, NULL, NULL, 'Soundara Rajan R', 'Business', 'Muthu Lakshmi', NULL, 1, 'no', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-11 14:05:49', '2024-12-16 12:04:42'),
(31, 37, NULL, NULL, NULL, 'Chandrasekaran V S M', 'Private', 'Sarojini C', 'Others', NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, '2024-12-11 14:43:32', '2024-12-17 04:31:09'),
(32, 38, NULL, NULL, NULL, 'Kulandai Swamy K V', 'Business', 'Annai sivagami', NULL, 1, 'no', NULL, NULL, '9080523909', NULL, NULL, 1, '2024-12-12 05:43:08', '2024-12-17 05:18:14'),
(33, 39, NULL, NULL, NULL, 'Chamuthiram S', 'Business', 'Maheshwari', 'Others', 1, NULL, 1, NULL, '9441358958', NULL, NULL, 1, '2024-12-12 07:33:24', '2024-12-12 07:33:24'),
(34, 40, NULL, NULL, NULL, 'Kasi rajan k', NULL, 'Thamayanthi K', NULL, NULL, NULL, NULL, NULL, '9566228598', NULL, NULL, 1, '2024-12-12 09:54:00', '2024-12-12 09:54:00'),
(35, 41, NULL, NULL, NULL, 'Pandi Selvam C', 'Business', 'Ponmani P', 'Others', 1, 'no', 0, NULL, '9600019697', NULL, NULL, 1, '2024-12-12 10:44:33', '2024-12-12 10:44:33'),
(36, 42, NULL, NULL, NULL, 'Mahendra Prabhu', 'Business', 'Muthu Lakshmi M', 'Others', 0, NULL, 2, NULL, '8925305194', NULL, NULL, 1, '2024-12-12 11:03:01', '2024-12-12 11:03:01'),
(37, 43, NULL, NULL, NULL, 'Ganesh', NULL, 'Jeyanthi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-12 11:19:02', '2024-12-12 11:19:02'),
(38, 44, NULL, NULL, NULL, 'Periyasamy', 'Business', 'Maheswari', 'Others', 0, NULL, 2, '1', '9629829575', NULL, NULL, 1, '2024-12-12 11:32:46', '2024-12-12 11:32:46'),
(39, 18, NULL, NULL, NULL, 'Vijaya Raj', 'Business', 'Lakshmi V', 'Others', 0, NULL, 1, 'yes', '9360424004', NULL, NULL, 1, '2024-12-16 09:32:56', '2024-12-18 05:55:39'),
(40, 45, NULL, NULL, NULL, 'Sanjeevrajan', NULL, 'Janaki', NULL, 0, NULL, 1, 'yes', NULL, NULL, NULL, 1, '2024-12-17 06:25:31', '2024-12-17 06:25:31'),
(41, 46, NULL, NULL, NULL, 'Kartheesan nadar', NULL, 'Packiyalakshm', NULL, 0, NULL, 1, 'yes', '7708030802', NULL, NULL, 1, '2024-12-17 07:16:42', '2024-12-17 07:16:42'),
(42, 47, NULL, NULL, NULL, 'Kuber', 'Private', 'Aruna Bharathi', 'Others', 0, NULL, 1, 'yes', NULL, NULL, NULL, 1, '2024-12-17 08:05:13', '2024-12-17 08:05:13'),
(43, 49, NULL, NULL, NULL, 'Rajasekar Nadar', 'Business', 'Subetha', NULL, 1, 'yes', 1, 'no', '9444875960', NULL, NULL, 1, '2024-12-17 09:42:10', '2024-12-17 09:42:10'),
(44, 48, NULL, NULL, NULL, 'Thilagarajan', NULL, 'Malarvizhi', NULL, 1, 'yes', NULL, NULL, '9841606273', NULL, NULL, 1, '2024-12-17 10:01:54', '2024-12-17 10:01:54'),
(45, 50, NULL, NULL, NULL, 'Ganeshan Nadar', 'Business', 'Meenakshi', 'Others', 1, 'yes', 1, 'yes', '9600018700', NULL, NULL, 1, '2024-12-17 10:21:40', '2024-12-17 10:21:40'),
(46, 51, NULL, NULL, NULL, 'Velmurugan', 'Business', 'Vijayalakshmi', 'Others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-17 10:37:25', '2024-12-17 10:37:25'),
(47, 52, NULL, NULL, NULL, 'Sugumar', NULL, 'Pushparani', NULL, NULL, NULL, 1, 'yes', NULL, NULL, NULL, 1, '2024-12-17 10:51:41', '2024-12-17 10:51:41'),
(48, 53, NULL, NULL, NULL, 'Pandi selvam', 'Business', 'Ponmani', 'Others', NULL, NULL, 1, 'no', '9600019697', NULL, NULL, 1, '2024-12-17 11:14:02', '2024-12-17 11:17:11'),
(49, 54, NULL, NULL, NULL, 'Er K velayutham', 'Government', 'Umadevi V', 'Others', 1, NULL, 0, NULL, NULL, NULL, NULL, 1, '2024-12-17 11:29:35', '2024-12-17 11:29:35'),
(50, 32, NULL, NULL, NULL, 'Selapalam', 'Business', 'Bamini S', 'Others', 1, NULL, 0, NULL, NULL, NULL, NULL, 1, '2024-12-18 05:47:26', '2024-12-18 05:47:26'),
(51, 31, NULL, NULL, NULL, 'Jothy', 'Others', 'Ushadevi J', 'Others', 1, 'no', 0, NULL, '9962628717', NULL, NULL, 1, '2024-12-18 06:15:06', '2024-12-18 06:15:06'),
(52, 20, NULL, NULL, NULL, 'Manickaraj S', 'Business', 'Murugananthi M', 'Others', 1, NULL, 0, NULL, NULL, NULL, NULL, 1, '2024-12-18 07:31:59', '2024-12-18 07:31:59'),
(53, 56, 'middle_class_update', 'joint', 'traditional', 'Ramesh Kumar', 'business', 'Lakshmi Ramesh', 'homemaker', 1, '1', 2, '1', '9876543210', 'Madurai', NULL, 1, '2026-02-09 07:02:57', '2026-02-09 07:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `heights`
--

CREATE TABLE `heights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `heights`
--

INSERT INTO `heights` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(0, 'Select', 1, NULL, NULL),
(1, '3 feet/36 inches/91.44 cm', 1, NULL, NULL),
(2, '3.1 feet/37.2 inches/94.488 cm', 1, NULL, NULL),
(3, '3.2 feet/38.4 inches/97.536 cm', 1, NULL, NULL),
(4, '3.3 feet/39.6 inches/100.584 cm', 1, NULL, NULL),
(5, '3.4 feet/40.8 inches/103.632 cm', 1, NULL, NULL),
(6, '3.5 feet/42 inches/106.68 cm', 1, NULL, NULL),
(7, '3.6 feet/43.2 inches/109.728 cm', 1, NULL, NULL),
(8, '3.7 feet/44.4 inches/112.776 cm', 1, NULL, NULL),
(9, '3.8 feet/45.6 inches/115.824 cm', 1, NULL, NULL),
(10, '3.9 feet/46.8 inches/118.872 cm', 1, NULL, NULL),
(11, '4 feet/48 inches/121.92 cm', 1, NULL, NULL),
(12, '4.1 feet/49.2 inches/124.968 cm', 1, NULL, NULL),
(13, '4.2 feet/50.4 inches/128.016 cm', 1, NULL, NULL),
(14, '4.3 feet/51.6 inches/131.064 cm', 1, NULL, NULL),
(15, '4.4 feet/52.8 inches/134.112 cm', 1, NULL, NULL),
(16, '4.5 feet/54 inches/137.16 cm', 1, NULL, NULL),
(17, '4.6 feet/55.2 inches/140.208 cm', 1, NULL, NULL),
(18, '4.7 feet/56.4 inches/143.256 cm', 1, NULL, NULL),
(19, '4.8 feet/57.6 inches/146.304 cm', 1, NULL, NULL),
(20, '4.9 feet/58.8 inches/149.352 cm', 1, NULL, NULL),
(21, '5 feet/60 inches/152.4 cm', 1, NULL, NULL),
(22, '5.1 feet/61.2 inches/155.448 cm', 1, NULL, NULL),
(23, '5.2 feet/62.4 inches/158.496 cm', 1, NULL, NULL),
(24, '5.3 feet/63.6 inches/161.544 cm', 1, NULL, NULL),
(25, '5.4 feet/64.8 inches/164.592 cm', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'cooking', 1, NULL, NULL),
(2, 'nature', 1, NULL, NULL),
(3, 'Photography', 1, NULL, NULL),
(4, 'dancing', 1, NULL, NULL),
(5, 'painting', 1, NULL, NULL),
(6, 'Pet breeding', 1, NULL, NULL),
(7, 'Playing musical instruments', 1, NULL, NULL),
(8, 'puzzles', 1, NULL, NULL),
(9, 'Standardization / Landscaping', 1, NULL, NULL),
(10, 'arts/Handicraft', 1, NULL, NULL),
(11, 'Listening to music', 1, NULL, NULL),
(12, 'movies', 1, NULL, NULL),
(13, 'surfing', 1, NULL, NULL),
(14, 'traveling', 1, NULL, NULL),
(15, 'Others', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `horoscope_detail`
--

CREATE TABLE `horoscope_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `rasi_1` varchar(100) DEFAULT NULL,
  `rasi_2` varchar(100) DEFAULT NULL,
  `rasi_3` varchar(100) DEFAULT NULL,
  `rasi_4` varchar(100) DEFAULT NULL,
  `rasi_5` varchar(100) DEFAULT NULL,
  `rasi_6` varchar(100) DEFAULT NULL,
  `rasi_7` varchar(100) DEFAULT NULL,
  `rasi_8` varchar(100) DEFAULT NULL,
  `rasi_9` varchar(100) DEFAULT NULL,
  `rasi_10` varchar(100) DEFAULT NULL,
  `rasi_11` varchar(100) DEFAULT NULL,
  `rasi_12` varchar(100) DEFAULT NULL,
  `Navamsam_1` varchar(100) DEFAULT NULL,
  `Navamsam_2` varchar(100) DEFAULT NULL,
  `Navamsam_3` varchar(100) DEFAULT NULL,
  `Navamsam_4` varchar(100) DEFAULT NULL,
  `Navamsam_5` varchar(100) DEFAULT NULL,
  `Navamsam_6` varchar(100) DEFAULT NULL,
  `Navamsam_7` varchar(100) DEFAULT NULL,
  `Navamsam_8` varchar(100) DEFAULT NULL,
  `Navamsam_9` varchar(100) DEFAULT NULL,
  `Navamsam_10` varchar(100) DEFAULT NULL,
  `Navamsam_11` varchar(100) DEFAULT NULL,
  `Navamsam_12` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `horoscope_detail`
--

INSERT INTO `horoscope_detail` (`id`, `member_id`, `rasi_1`, `rasi_2`, `rasi_3`, `rasi_4`, `rasi_5`, `rasi_6`, `rasi_7`, `rasi_8`, `rasi_9`, `rasi_10`, `rasi_11`, `rasi_12`, `Navamsam_1`, `Navamsam_2`, `Navamsam_3`, `Navamsam_4`, `Navamsam_5`, `Navamsam_6`, `Navamsam_7`, `Navamsam_8`, `Navamsam_9`, `Navamsam_10`, `Navamsam_11`, `Navamsam_12`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 1, 'Su', 'Mo', 'Ma', 'Me', 'Ju', 'Ve', 'Sa', 'Ra', 'Ke', NULL, NULL, NULL, 'Su', 'Mo', 'Ma', 'Me', 'Ju', 'Ve', 'Sa', 'Ra', 'Ke', NULL, NULL, NULL, '2024-12-03 10:35:56', '2026-02-11 06:16:10', 1),
(2, 2, 'lag,ket', NULL, 'cha', NULL, 'san', NULL, NULL, 'sev', 'sur,pud,ku', 'chu', NULL, 'rag', 'rag', NULL, NULL, 'sur,pud,san', 'cha', NULL, NULL, NULL, 'sev,ku', NULL, 'lag,chu', 'ket', '2024-12-03 22:58:18', '2024-12-03 23:02:07', 1),
(3, 3, 'san,ket', NULL, 'lag,chu,sev', 'sur,pud', NULL, NULL, 'man', NULL, 'vya', NULL, NULL, 'cha,rag', 'man', NULL, 'sev', 'rag', NULL, 'cha', NULL, 'lag,san', 'sur,ket', 'pud', 'vya', 'chu', '2024-12-04 00:00:05', '2024-12-04 00:00:05', 1),
(4, 4, 'san', NULL, NULL, NULL, 'ket', NULL, 'sev', 'pud', 'sur', 'pud', 'ku,man', 'san', NULL, 'ket,sur,sev', NULL, NULL, NULL, 'sur', 'pud', NULL, 'san', NULL, 'rag', 'cha,man', '2024-12-04 01:52:47', '2024-12-04 01:52:47', 1),
(5, 5, NULL, 'ket', NULL, NULL, 'lag,san', 'chu,sur,pud', NULL, NULL, NULL, 'vya', 'rag', 'cha.sev', 'pud', 'lag,san,sev', 'cha,ket', NULL, NULL, NULL, NULL, 'chu', NULL, 'sur,vya,lag', NULL, NULL, '2024-12-06 05:46:30', '2024-12-06 05:46:30', 1),
(6, 6, 'san,ket', 'sev,sur,lag', 'pud,chu', NULL, NULL, NULL, NULL, NULL, 'gu', 'cha', NULL, 'rag', NULL, NULL, 'sev,lg', NULL, 'pud', 'rag', 'cha,ket', NULL, NULL, 'gu', 'sur,chu,san', NULL, '2024-12-06 08:16:05', '2024-12-06 08:30:15', 1),
(7, 7, 'chu', 'sur,pud,ket', 'man', NULL, 'san', 'sev,leg', NULL, NULL, 'cha', 'vya', 'rag', NULL, NULL, NULL, 'san,man', 'sur', 'sev', 'ket', 'vys,rag', 'pud,chhhhhhhu', NULL, 'cha', NULL, 'leg', '2024-12-06 09:02:56', '2024-12-06 09:02:56', 1),
(8, 8, 'chu', 'sur', 'san,gu,pud', 'rag', NULL, NULL, NULL, 'cha', 'ket,sev', NULL, NULL, 'lag', NULL, NULL, 'sev', NULL, 'rag,pud', 'gu', 'san', 'ket', NULL, 'cha', 'lag/chu', 'sur', '2024-12-06 10:35:28', '2024-12-06 10:35:28', 1),
(9, 10, 'lag', NULL, 'san', 'ku,rag', NULL, NULL, 'sev', NULL, 'ket', 'cha', 'sur', 'pud,sud', NULL, 'ku,chu', 'ket', NULL, NULL, 'pud,san', 'cha,sev', NULL, 'lag', 'sur,ku', NULL, NULL, '2024-12-06 11:06:43', '2024-12-06 11:06:43', 1),
(10, 11, NULL, 'chu,lag,man', 'pud,san', 'cha,gu,vya,rag', NULL, NULL, NULL, NULL, 'ket', 'sev', NULL, NULL, NULL, NULL, 'san,lag', NULL, 'sev', 'ket', 'cha,rag', NULL, NULL, 'gu', 'chu,vya,rag', NULL, '2024-12-06 11:16:03', '2024-12-06 11:16:03', 1),
(11, 12, NULL, NULL, 'san', 'vya,rag,lag', NULL, 'chu,sur,pud', 'san', NULL, 'sev,ket', NULL, NULL, NULL, 'cha,pud', NULL, 'san', 'sev,ket', NULL, 'sur', 'lag', NULL, 'rag', NULL, 'chu', NULL, '2024-12-06 16:03:36', '2024-12-06 16:03:36', 1),
(12, 13, 'cha', 'ket', NULL, NULL, 'san', 'lag', NULL, 'sev', 'pud', 'vya,sur', 'chu,rag', NULL, 'rag', 'sev,pud', NULL, NULL, 'sur,chu', 'cha', NULL, 'lag', NULL, 'san', NULL, 'vy,ket', '2024-12-07 05:17:37', '2024-12-07 05:17:37', 1),
(13, 14, 'cha', 'ket', 'lag', NULL, 'san', NULL, NULL, NULL, NULL, 'sev,vya,chu', 'sur,pud,rag', NULL, NULL, 'ket', NULL, NULL, 'lag,sur,vya,san', 'cha', NULL, 'chu', 'sev,pud', NULL, 'rag', NULL, '2024-12-07 05:26:39', '2024-12-07 05:26:39', 1),
(14, 15, NULL, 'ket', 'lag', NULL, 'san', NULL, NULL, NULL, 'cha', 'sev,gu', 'sur,chu', 'pud', 'lag', 'ket', 'san', 'chu', NULL, 'cha', 'sur,gu', 'pud', NULL, NULL, 'sev', NULL, '2024-12-07 05:46:55', '2024-12-07 05:46:55', 1),
(15, 16, 'lag', 'ket', NULL, NULL, 'san', NULL, NULL, NULL, NULL, 'vya', 'sev,sur,lag', 'sur,pud,chu', 'sur,sev,pud', 'ket', NULL, 'chu', 'san', NULL, NULL, 'lag', 'vya', NULL, 'cha,rag', NULL, '2024-12-07 06:15:19', '2024-12-07 06:15:19', 1),
(16, 17, NULL, 'ket', NULL, NULL, 'lag,san', 'sev', NULL, NULL, 'cha', NULL, 'gu,chu,rag,pud,', 'sur', NULL, 'gu,rag', 'sur,cha', NULL, NULL, 'sur', 'lag.cha,pud', NULL, NULL, NULL, 'ket', 'sev', '2024-12-07 06:21:12', '2024-12-07 06:21:12', 1),
(17, 19, NULL, 'ket', NULL, 'man', 'san', 'cha', NULL, NULL, NULL, 'chu,sev,vya', 'sur,pud,rag', 'lag', NULL, 'pud,ket', 'san', 'gu', 'sev,vya', 'lag', NULL, NULL, 'chu', 'man', 'rag', 'cha', '2024-12-07 07:20:45', '2024-12-07 07:20:45', 1),
(18, 21, 'san,ket,man', 'lag,sev,sur,pud', NULL, 'chu', NULL, NULL, NULL, NULL, 'vya', NULL, NULL, 'cha,rag', NULL, NULL, NULL, 'lag,sev', 'man', 'san,rag', 'ket', NULL, NULL, NULL, 'chu,vya,pud', 'sur,cha', '2024-12-08 05:39:26', '2024-12-08 05:39:26', 1),
(19, 22, NULL, 'ket', NULL, 'lag', 'sur,san', 'sev', 'pud', NULL, 'chu', 'vya', 'rag,cha', NULL, NULL, 'pud', NULL, NULL, 'rag', NULL, 'sev,vya,san', 'ket', 'sur,cha', 'chu', 'lag', NULL, '2024-12-09 05:26:41', '2024-12-09 05:33:47', 1),
(20, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-09 07:48:45', '2024-12-09 07:48:45', 1),
(21, 25, NULL, 'lag,cha,ket', NULL, NULL, 'san', NULL, NULL, NULL, 'sev,chu', 'sur,pud,gu', 'rag', NULL, 'gu', 'ket', 'cha,san', 'lag,sev', NULL, NULL, 'pud', 'chu', 'sur', NULL, 'rag', NULL, '2024-12-09 08:54:41', '2024-12-09 09:11:36', 1),
(22, 26, 'gu', 'san', NULL, 'sev,chu', 'ket', 'sur,pud', NULL, 'lag,rag', NULL, 'cha', NULL, NULL, NULL, 'gu,chu,san', 'sev', 'rag', NULL, 'lag', NULL, 'cha', 'ket', 'sur', 'pud', NULL, '2024-12-09 09:44:08', '2024-12-09 09:44:08', 1),
(23, 27, 'lag,ket', NULL, NULL, 'cha', 'san', NULL, NULL, 'sev', 'vya', NULL, 'pud,sur', 'chu', 'lag,pud', 'rag', NULL, 'san', 'sur', NULL, 'cha', NULL, NULL, NULL, 'ket', 'vay', '2024-12-09 10:06:19', '2024-12-09 10:06:19', 1),
(24, 28, 'lag,san,cha,ket', NULL, NULL, 'sev,chu', NULL, 'sur', NULL, 'pud', 'gu', NULL, NULL, 'rag', 'cha', NULL, NULL, 'rag', NULL, 'pud', 'sev', 'gu', 'sur,ket', 'chu,san', NULL, 'lag', '2024-12-09 10:21:21', '2024-12-09 10:21:21', 1),
(25, 29, 'chu', NULL, 'sur,pud,ket', 'cha', 'san', 'sev', NULL, NULL, 'lag,man', NULL, 'rag', 'vya', 'sur', 'vya', NULL, 'pud,ket,lag', 'cha,sur', 'man', NULL, NULL, 'sev,rag', 'san', NULL, NULL, '2024-12-09 10:30:40', '2024-12-09 10:30:40', 1),
(26, 30, NULL, 'lag,vya,chu,san', 'sur,pud,sev', NULL, NULL, 'rag', 'ket', NULL, NULL, NULL, 'cha', NULL, NULL, NULL, 'sev', 'pud', 'cha', 'lag,rag', 'sur,ket', NULL, NULL, 'vya,chu', 'san', NULL, '2024-12-09 10:46:39', '2024-12-09 10:46:39', 1),
(27, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-11 10:35:06', '2024-12-11 10:35:06', 1),
(28, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-11 10:59:39', '2024-12-11 10:59:39', 1),
(29, 35, NULL, NULL, 'sev', 'ket,cha', NULL, 'lag,pud', 'san', 'sur,gu,rag', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sur', NULL, NULL, NULL, NULL, 'cha,pud,san', 'ket,gu', NULL, 'lag', '2024-12-11 11:20:51', '2024-12-11 11:23:06', 1),
(30, 36, 'ket,san', 'cha', 'man', NULL, NULL, NULL, NULL, 'sev', 'gu', NULL, 'lag,sur,pud', 'rag,chu', NULL, 'rag', 'sev', NULL, 'chu', NULL, 'lag,sur', NULL, 'cha,pud', NULL, 'ket,san', 'gu', '2024-12-11 14:03:03', '2024-12-11 14:03:03', 1),
(31, 37, 'sur,sev,ket', 'pud', 'chu', NULL, 'san', NULL, 'lag', NULL, 'gu', NULL, 'cha', 'rag', 'chu', NULL, NULL, 'san,cha,pud', 'sur,lag', 'rag', 'ket', NULL, 'sev', NULL, 'gu', NULL, '2024-12-11 14:41:42', '2024-12-11 14:41:42', 1),
(32, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-12 05:40:25', '2024-12-12 05:40:25', 1),
(33, 39, 'vya', 'san,lag', 'chu', 'pud,chu,sev', 'san,ket', NULL, NULL, 'rag', NULL, NULL, NULL, NULL, NULL, NULL, 'sur', 'san,lag,ket', NULL, NULL, 'pud', 'vya,sev', 'ket', 'cha', NULL, 'chu', '2024-12-12 07:30:11', '2024-12-12 07:30:11', 1),
(34, 40, 'san', NULL, NULL, NULL, 'ket', NULL, 'gu', 'rag', 'sev,chu', 'pud', 'sur', 'lag', NULL, 'ket', NULL, 'sur', NULL, 'lag,gu,sev', 'cha,pud', 'chu', NULL, NULL, 'san,rag', NULL, '2024-12-12 09:48:12', '2024-12-12 09:48:12', 1),
(35, 41, 'lag', 'san', NULL, NULL, 'gu,ket', NULL, NULL, 'sev,rag', NULL, 'cha', NULL, 'sur,pud,chu', NULL, 'sur,sev,pud', 'rag', 'gu,san', 'cha', 'chu', 'lag', NULL, NULL, 'ket', NULL, NULL, '2024-12-12 10:42:25', '2024-12-12 10:42:25', 1),
(36, 42, 'san,man', NULL, NULL, NULL, 'vya,ket', NULL, NULL, 'rag', 'cha', 'lag,sur,pudchu', NULL, 'sev', NULL, 'rag', 'vya', NULL, 'san', NULL, 'sev', 'sur,pud', NULL, 'lag,man', 'cha,sur,ket', NULL, '2024-12-12 11:00:31', '2024-12-12 11:00:31', 1),
(37, 43, 'pud,sev,san', 'lag', NULL, 'cha', 'sur,vya,ket', NULL, 'chu', 'rag,man', NULL, NULL, NULL, NULL, 'chu', 'man', 'sur,lag', 'cha', 'vya,san,ket', NULL, NULL, 'pud,rag', NULL, NULL, NULL, 'sev', '2024-12-12 11:17:11', '2024-12-12 11:17:11', 1),
(38, 44, 'vya,san', NULL, NULL, NULL, NULL, 'rag', 'ch,sur,pud,chu,ket', NULL, NULL, NULL, 'sev', 'lag', 'lag,rag,san', NULL, NULL, NULL, 'sur,pud', 'vya,chu', NULL, NULL, NULL, NULL, 'sev', 'cha,ket', '2024-12-12 11:31:07', '2024-12-12 11:31:07', 1),
(39, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-16 09:32:04', '2024-12-16 09:32:04', 1),
(40, 20, NULL, 'ket', NULL, NULL, 'lag,san', NULL, NULL, 'sur,cha', 'man', NULL, 'gu,chu,rag', 'pud', 'sev,gu', 'pud,rag', NULL, NULL, 'lag', NULL, NULL, 'cha', 'man', 'chu,san', 'ket', 'sur', '2024-12-16 09:46:32', '2024-12-18 07:29:23', 1),
(41, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-16 11:28:23', '2024-12-16 11:28:23', 1),
(42, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-16 11:30:31', '2024-12-16 11:30:31', 1),
(43, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-17 06:02:10', '2024-12-17 06:02:10', 1),
(44, 46, 'lag,ket', NULL, NULL, NULL, 'san', NULL, 'cha', 'sev', 'vya', NULL, 'sur,pud', 'chu,rag', 'chu', 'rag', 'sev', 'san', 'lag', NULL, NULL, NULL, NULL, 'sur,pud', 'vya,ket', 'cha', '2024-12-17 07:14:10', '2024-12-17 07:14:10', 1),
(45, 47, NULL, 'ket', NULL, 'san,man', 'san', NULL, NULL, 'sur', NULL, 'gu', 'sev,rag', 'pud,chu', 'chu', NULL, 'ket', 'san', NULL, NULL, 'sev', 'pud', 'sur', 'gu,rag', 'cha,man', NULL, '2024-12-17 08:03:44', '2024-12-17 08:03:44', 1),
(46, 49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-17 09:39:13', '2024-12-17 09:39:13', 1),
(47, 48, NULL, NULL, 'ket', NULL, NULL, 'lag', 'san', 'chu', NULL, 'cha,rag', 'sev', 'sur,pud,vya', NULL, 'ket', 'chu', NULL, 'sur', 'san', NULL, 'cha', 'lag', NULL, 'sev,rag', 'pud,vya', '2024-12-17 09:57:38', '2024-12-17 09:57:38', 1),
(48, 50, NULL, 'gu,san', NULL, NULL, NULL, 'rag', 'ket', 'chu', 'sev', NULL, 'pud', 'lag,sur,cha', NULL, 'sev', 'cha,ket', 'chu,gu,lag', NULL, 'sur', 'pud', NULL, NULL, 'rag', 'san', NULL, '2024-12-17 10:18:52', '2024-12-17 10:18:52', 1),
(49, 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-17 10:36:16', '2024-12-17 10:36:16', 1),
(50, 52, 'san', NULL, NULL, NULL, 'gu,ket', NULL, NULL, 'sev,rag', 'cha', NULL, 'lag', 'sur,pud,chu', 'lag,san', 'sur,sev', 'rag', 'gu', 'chu', 'pud', NULL, NULL, 'cha', 'ket', NULL, NULL, '2024-12-17 10:49:34', '2024-12-17 10:49:34', 1),
(51, 53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-17 11:11:11', '2024-12-17 11:11:11', 1),
(52, 54, 'cha', NULL, 'sev', 'ket', NULL, 'pud', 'san', 'sur,vya,chu', NULL, 'lag', NULL, NULL, 'sur,san,rag', NULL, NULL, NULL, NULL, 'sev', NULL, 'lag', NULL, 'vya,pud,cha', 'ket', 'chu', '2024-12-17 11:21:26', '2024-12-17 11:26:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `liked_profiles`
--

CREATE TABLE `liked_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `liked_profile` bigint(20) UNSIGNED DEFAULT NULL,
  `liked_flag` int(11) DEFAULT NULL,
  `unliked_profile` bigint(20) UNSIGNED DEFAULT NULL,
  `unliked_flag` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `flag` int(11) DEFAULT 1 COMMENT '1=pending, 2, accepted, 3, rejected\r\n\r\n',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `liked_profiles`
--

INSERT INTO `liked_profiles` (`id`, `member_id`, `liked_profile`, `liked_flag`, `unliked_profile`, `unliked_flag`, `is_active`, `flag`, `created_at`, `updated_at`) VALUES
(108, 1, 5, 1, NULL, 0, 1, 2, '2026-02-03 00:45:11', '2026-02-03 02:49:59'),
(109, 1, 10, 1, NULL, 0, 1, 1, '2026-02-03 01:54:59', '2026-02-03 01:54:59'),
(110, 5, 1, 1, NULL, 0, 1, 2, '2026-02-03 04:18:13', '2026-02-03 04:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `liked_statuses`
--

CREATE TABLE `liked_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `verify_flag` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `contact_status` varchar(255) DEFAULT NULL,
  `marriage_date` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` varchar(255) DEFAULT NULL,
  `association_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `raasi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `star_id` bigint(20) UNSIGNED DEFAULT NULL,
  `permanent_state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `permanent_city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `permanent_taulk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by_relation` varchar(100) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `otp` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `verify_by` tinyint(1) DEFAULT 0,
  `subscribe_flag` tinyint(1) DEFAULT 0,
  `marriage_status` enum('married','unmarried') DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `subcaste` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `otherlanguage` varchar(255) DEFAULT NULL,
  `mothertongue` varchar(255) DEFAULT NULL,
  `maritalstatus` tinyint(1) DEFAULT 0,
  `children` tinyint(1) DEFAULT 0,
  `height` int(11) DEFAULT NULL,
  `familystatus` varchar(255) DEFAULT NULL,
  `familytype` varchar(255) DEFAULT NULL,
  `familyvalue` varchar(255) DEFAULT NULL,
  `family_god` varchar(255) DEFAULT NULL,
  `village_temple` varchar(255) DEFAULT NULL,
  `disability` tinyint(1) DEFAULT 0,
  `caste` varchar(255) DEFAULT NULL,
  `dosham` varchar(250) DEFAULT NULL,
  `doshamdetail` varchar(250) DEFAULT NULL,
  `hours` varchar(255) DEFAULT NULL,
  `mins` varchar(255) DEFAULT NULL,
  `am_pm` varchar(255) DEFAULT NULL,
  `horoscope_image` text DEFAULT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `annualincome` varchar(100) DEFAULT NULL,
  `worklocation` text DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `taluk` varchar(50) DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `door_no` varchar(255) DEFAULT NULL,
  `land_mark` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `permanent_village` varchar(255) DEFAULT NULL,
  `permanent_pincode` varchar(255) DEFAULT NULL,
  `permanent_door_no` varchar(255) DEFAULT NULL,
  `permanent_land_mark` text DEFAULT NULL,
  `about_you` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `user_id`, `profile_id`, `association_id`, `profile_created_by`, `raasi_id`, `star_id`, `permanent_state_id`, `permanent_city_id`, `permanent_taulk_id`, `created_by_relation`, `name`, `gender`, `mobile`, `email`, `otp`, `dob`, `age`, `verify_by`, `subscribe_flag`, `marriage_status`, `rating`, `religion`, `subcaste`, `language`, `otherlanguage`, `mothertongue`, `maritalstatus`, `children`, `height`, `familystatus`, `familytype`, `familyvalue`, `family_god`, `village_temple`, `disability`, `caste`, `dosham`, `doshamdetail`, `hours`, `mins`, `am_pm`, `horoscope_image`, `birth_place`, `education`, `occupation`, `annualincome`, `worklocation`, `state`, `city`, `taluk`, `village`, `pincode`, `door_no`, `land_mark`, `permanent_address`, `permanent_village`, `permanent_pincode`, `permanent_door_no`, `permanent_land_mark`, `about_you`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, NULL, 6, 23, 1, 37, 207, 'Myself', 'NARESH', 'male', '9841334532', 'naresh@gmail.com', '797841', '1995-08-01', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Ulaganatha Swemi(Anaikulam)', NULL, 0, 'Nadar', NULL, NULL, '9', '3', 'PM', '1733241952.png', 'chennai', NULL, NULL, NULL, NULL, '1', '2', '14', 'Thiruvottiyur', '600019', NULL, NULL, '2', 'Reddiarpatti', '627753', NULL, NULL, NULL, 1, '2024-12-03 10:27:35', '2025-01-08 06:08:28'),
(2, 2, NULL, 1, NULL, 2, 5, 1, 37, 209, 'Myself', 'MUTHU GANESH', 'male', '9841380582', 'muthuganesh@gmail.com', '484882', '1996-12-22', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Ayyavali', NULL, 0, 'Nadar', NULL, NULL, '12', '58', 'PM', '1733286494.png', 'Thisayanvilai', NULL, NULL, NULL, NULL, '1', '2', '17', 'Kandhappa Street', '600007', '21/10', '21/10 Kandhappa Street,purasawalkam', '2', 'Naduvakkurichi', '628653', NULL, NULL, NULL, 0, '2024-12-03 22:55:38', '2026-02-04 06:53:23'),
(3, 3, NULL, 1, NULL, 6, 25, NULL, NULL, NULL, 'Myself', 'PRAVEENKUMAR', 'male', '9841384582', 'praveen@gmail.com', '831325', '1996-06-25', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Sri Vembaththu Ayyanr', NULL, 0, 'Nadar', NULL, NULL, 'Select', '0', 'Select', '1733290071.png', 'Chennai', NULL, NULL, NULL, NULL, '1', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-03 23:53:57', '2024-12-13 07:57:29'),
(4, 4, NULL, 1, NULL, 8, 35, NULL, NULL, NULL, 'Myself', 'MANOJ KUMAR', 'male', '9841384582', 'Manojkumar@gmail.com', '736299', '1999-01-01', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, 'Select', '0', 'Select', '1733295581.png', NULL, NULL, NULL, NULL, NULL, '1', '2', '21', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-04 00:34:25', '2024-12-04 02:11:15'),
(5, 5, NULL, 1, NULL, 2, 7, NULL, NULL, NULL, 'Myself', 'PIRAIMATHI', 'female', '7639425279', 'piraimathi@brokenglass.co.in', '153255', '1990-03-20', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, 'Select', '0', 'Select', '1733462692.png', 'Surandai', NULL, NULL, NULL, NULL, '1', '37', '204', 'Kurumbalaperi', '627808', '9/244', '9/244 ayan kurumbalaperi street,Kurumbalaperi', '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-06 05:15:33', '2024-12-13 09:41:59'),
(6, 6, NULL, 1, NULL, 7, 30, NULL, NULL, NULL, 'Myself', 'GUNASEKAR', 'male', '9841384582', 'Gunasekar123@gmail.com', '964879', '1996-05-03', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, '5', '5', 'AM', '1733473544.png', 'Chennai', NULL, NULL, NULL, NULL, '1', '2', NULL, 'Kandanchavadi', '600096', '13', 'Nehru Street,\r\nKandanchavadi,Chennai-600096.', '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-06 07:42:25', '2024-12-06 08:58:52'),
(7, 7, NULL, 1, NULL, 9, 38, 1, 23, 285, 'Myself', 'LINGESHWAR M.S', 'male', '9444494597', 'lingeshwar@gmail.com', '948410', '1995-04-21', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, 'Select', '0', 'Select', '1733475012.png', NULL, NULL, NULL, NULL, NULL, '1', '2', '13', 'Washermanpet', '600081', '770/96', '770/96 T.H.Road, New Washermanpet,chennai-81', '2', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-06 08:43:13', '2024-12-13 10:09:46'),
(8, 8, NULL, 1, NULL, 5, 20, NULL, NULL, NULL, 'Myself', 'SWETHA', 'female', '9442639975', 'swetha123@gmail.com', '142872', '2001-05-03', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Arunchunai kaththa Ayyanar', NULL, 0, 'Nadar', NULL, NULL, 'Select', '0', 'Select', '1733479439.png', 'Pullanayakkan patti', NULL, NULL, NULL, NULL, '1', '31', NULL, 'Kallakurichi', '606202', '33b/4c', 'Napol street,\r\nPeriyar Dippo,Kallakurichi-606202', '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-06 09:54:50', '2024-12-13 10:16:23'),
(9, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Myself', 'AKSHAYA', NULL, '9171000555', 'akshaya@gmail.com', '875543', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-06 10:55:49', '2024-12-06 10:55:49'),
(10, 13, NULL, 1, NULL, 8, 36, 1, 2, 15, 'Myself', 'AKSHAYA', 'female', '9171000555', 'akshaya@gmail.cm', '513991', '2001-09-20', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, 'Select', '0', 'Select', '1733482951.png', NULL, NULL, NULL, NULL, NULL, '1', '32', '304', NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-06 10:57:23', '2024-12-06 11:12:49'),
(11, 14, NULL, 1, NULL, 3, 12, NULL, NULL, NULL, 'Myself', 'GUGA PRIYA', 'female', '8870330700', 'gugapriya@gmail.com', '752366', '2001-06-22', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, 'Select', '0', 'Select', '1733483592.png', 'Chengalpattu', NULL, NULL, NULL, NULL, '1', '23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-06 11:08:16', '2024-12-06 11:20:17'),
(12, 15, NULL, 1, NULL, 10, 40, 1, 23, 278, 'Myself', 'JEYASRI', 'female', '9841383582', 'jeyasri@gamil.com', '278262', '2001-09-30', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Sri Suyappulinga swamy', NULL, 0, 'Nadar', NULL, NULL, '1', '45', 'AM', '1733500705.png', 'Chennai', NULL, NULL, NULL, NULL, '1', '34', '6', NULL, NULL, NULL, NULL, '2', 'kadambur', NULL, NULL, NULL, NULL, 1, '2024-12-06 15:49:36', '2024-12-06 16:12:26'),
(13, 16, NULL, 1, NULL, 12, 52, NULL, NULL, NULL, 'Myself', 'SHIVA SANKAR', 'male', '9597010771', 'shivasankar123@gmail.com', '205452', '1994-12-10', NULL, 0, 0, NULL, NULL, NULL, 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '8', '17', 'PM', '1733548490.png', 'Kundrathur,Chennai.', NULL, NULL, NULL, NULL, '1', '8', '87', 'Kundrathur', '600069', NULL, 'Kundrathur,chennai.', '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-07 05:08:20', '2024-12-07 05:22:47'),
(14, 17, NULL, 1, NULL, 12, 52, 1, 18, 158, 'Myself', 'AKASHPONNUSAMY', 'male', '9841384582', 'akashponnusamy@gmail.com', '433176', '1995-03-11', NULL, 0, 0, NULL, NULL, NULL, 'select', NULL, NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '7', '29', 'PM', '1733549037.png', NULL, NULL, NULL, NULL, NULL, '1', '2', '28', NULL, NULL, NULL, NULL, '2', 'Sayalgudi', NULL, NULL, NULL, NULL, 1, '2024-12-07 05:20:13', '2024-12-13 11:06:13'),
(15, 18, NULL, 1, NULL, 9, 37, NULL, NULL, NULL, 'Myself', 'VIGNESH PRABHU', 'male', '9841384582', 'vigneshprabhu123@gmail.com', '776181', '1995-10-23', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Aalankovil ulagamatha Periya Pandaram swamigal,Sivakasi', NULL, 0, 'Nadar', NULL, NULL, '8', '16', 'PM', '1733550196.png', NULL, NULL, NULL, NULL, NULL, '1', '2', '13', 'Thandaiyarpet', '600081', NULL, 'IrattaiKulai Sandhu Veedu,\r\nThandaiyarpet,Chennai.', '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-07 05:37:43', '2024-12-13 11:15:20'),
(16, 19, NULL, 1, NULL, 7, 28, NULL, NULL, NULL, 'Myself', 'RAJAN', 'male', '9841384582', 'rajan@gmail.com', '760351', '1995-09-26', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, 'Select', '0', 'Select', '1733551924.png', 'chennai', NULL, NULL, NULL, NULL, '1', '23', '278', 'Melaseithalai', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-07 06:02:31', '2024-12-13 11:21:11'),
(17, 20, NULL, 1, NULL, 9, 37, NULL, NULL, NULL, 'Myself', 'BALAMURUGAN RP', 'male', '9841384582', 'balamurugan123@gmail.com', '490631', '1994-10-10', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, '9', '30', 'PM', '1733552271.png', 'Chennai', NULL, NULL, NULL, NULL, '1', '2', '13', 'Washermenpet', '600021', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-07 06:13:46', '2024-12-16 10:30:04'),
(18, 21, NULL, 1, NULL, 4, 18, 1, 2, 22, 'Myself', 'KARTHIK@KARTHIKEYAN', 'male', '9941925306', 'karthik@gmail.com', '238937', '1995-12-12', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Karuppasamy', NULL, 0, 'Nadar', NULL, NULL, '10', '35', 'AM', '1733555110.png', 'chennai', NULL, NULL, NULL, NULL, '1', '23', '283', 'Maaviladai', '628907', NULL, NULL, '2', 'T nagar', '600017', '43/20', '43/20,Nallapa Vaathiyar Street,T nagar,Chennai-600017.', NULL, 1, '2024-12-07 06:36:10', '2024-12-18 06:00:01'),
(19, 22, NULL, 1, NULL, 4, 17, 1, 6, 61, 'Myself', 'HARISH R', 'male', '9841384582', 'harish123@gmail.com', '166829', '1995-11-14', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Kothali Karuppasamy,kayatharu.', NULL, 0, 'Nadar', NULL, NULL, '3', '45', 'AM', '1733555929.png', 'Chennai', NULL, NULL, NULL, NULL, '1', '2', NULL, NULL, NULL, NULL, NULL, '2', 'Vathruvarpatti', '624215', NULL, NULL, NULL, 1, '2024-12-07 07:16:17', '2024-12-07 07:28:21'),
(20, 23, NULL, 1, NULL, 5, 20, NULL, NULL, NULL, 'Myself', 'M. NANDHINI', 'female', '8798767898', 'nandhini@gmail.com', '965198', '1994-09-05', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, '6', '13', 'PM', '1734506849.png', 'Tiruchendur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-07 12:14:54', '2024-12-18 07:27:29'),
(21, 24, NULL, 1, NULL, 6, 26, 1, 23, 280, 'Myself', 'RAJESH KUMAR', 'male', '9841384582', 'rajesh123@gmail.com', '473533', '1996-05-02', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Kamatchi amman ,chiththavanayakkanpatti', NULL, 0, 'Nadar', NULL, NULL, 'Select', '0', 'Select', '1733636278.png', NULL, NULL, NULL, NULL, NULL, '1', '23', '283', 'Cholapuram', '614902', NULL, NULL, '2', 'Kovilpatti', '628501', NULL, NULL, NULL, 1, '2024-12-08 05:34:10', '2024-12-08 05:46:31'),
(22, 25, NULL, 1, NULL, 7, 30, NULL, NULL, NULL, 'Myself', 'KUMARAVEL', 'male', '9841384582', 'kumaravel123@gmail.com', '205893', '1995-02-20', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Ulagamatha Periya pandara swamigal-sivakasi.', NULL, 0, 'Nadar', NULL, NULL, '1', '10', 'PM', '1733722112.png', 'Chennai', NULL, NULL, NULL, NULL, '1', '2', '13', 'Rayapuram', '600013', '2/1', 'Kamarajar Park Street,Rayapuram,Chennai-600 013.', '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-09 05:20:54', '2024-12-16 10:02:13'),
(23, 26, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Myself', 'SIVARANJANI', 'female', '9444388749', 'sivaranjani123@gmail.com', '903095', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-09 07:37:22', '2024-12-16 10:10:34'),
(24, 31, NULL, 1, NULL, 8, 35, 1, 32, 307, 'Myself', 'SIVARANJANI', 'female', '9444388749', 'sivaranjani@gmail.com', '286080', '1995-05-16', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '3', '47', 'AM', '1733730514.png', NULL, NULL, NULL, NULL, NULL, '1', '2', NULL, 'West Tambaram', '600045', NULL, 'West Tambaram,Chennai--600 045.', '2', 'Thiruthangal', '626123', NULL, NULL, NULL, 1, '2024-12-09 07:43:10', '2024-12-16 10:50:00'),
(25, 32, NULL, 1, NULL, 1, 1, 1, 2, 20, 'Myself', 'RASIKA', 'female', '9841384582', 'rasika123@gmail.com', '862454', '1995-12-03', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Karkuvel Ayyanar', NULL, 0, 'Nadar', NULL, NULL, '3', '20', 'PM', '1733734453.png', 'Chennai', NULL, NULL, NULL, NULL, '1', '23', '278', 'Aadhanur', '628213', NULL, NULL, '2', 'Nungambakkam', '600034', NULL, NULL, NULL, 1, '2024-12-09 08:50:53', '2024-12-09 09:19:28'),
(26, 33, NULL, 1, NULL, 8, NULL, NULL, NULL, NULL, 'Myself', 'MRUDHULAPANDIYAN', 'male', '9841384582', 'mrudhulapandiyan@gmail.com', '914292', '1998-08-02', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Ayyanar and Pathrakaliamman', NULL, 0, 'Nadar', NULL, NULL, '8', '5', 'Select', '1733737348.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-09 09:39:46', '2024-12-09 09:46:31'),
(27, 34, NULL, 1, NULL, 3, 12, 1, 2, 17, 'Myself', 'SATHYA PRIYA', 'female', '9841384582', 'sathyapriya@gmail.com', '862232', '1996-10-31', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, '5', '5', 'PM', '1733738655.png', NULL, NULL, NULL, NULL, NULL, '1', '25', NULL, 'Perumpanai,ittamozhi', '627853', NULL, NULL, '2', 'Purasaiwalkam', '600084', NULL, NULL, NULL, 1, '2024-12-09 10:00:38', '2024-12-09 10:12:04'),
(28, 35, NULL, 1, NULL, 12, 54, NULL, NULL, NULL, 'Myself', 'RAAGAPRIYA', 'female', '9841384582', 'raagapriya@gmail.com', '469425', '1996-08-04', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, '9', '20', 'PM', '1733739579.png', 'chennai', NULL, NULL, NULL, NULL, '1', '2', '17', 'Old vannarpet', '600084', NULL, 'Old vannarpet,chennai', '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-09 10:17:14', '2024-12-09 10:23:42'),
(29, 36, NULL, 1, NULL, 3, 12, NULL, NULL, NULL, 'Myself', 'KIRTHIKA', 'female', '9841384582', 'kirthika@gmail.com', '814821', '1993-05-24', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, '8', '38', 'PM', '1733740137.png', 'Chennai', NULL, NULL, NULL, NULL, '1', '25', '228', 'Puliyankulam', '627352', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-09 10:26:43', '2024-12-09 10:33:56'),
(30, 37, NULL, 1, NULL, 7, 30, 1, 2, 24, 'Myself', 'ROSHINI PONNARASAN', 'female', '9444351060', 'roshini@gmail.com', '247773', '2000-05-17', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Thandapathu ayyanar', NULL, 0, 'Nadar', NULL, NULL, '4', '38', 'AM', '1733741111.png', 'Madurai', NULL, NULL, NULL, NULL, '1', '12', NULL, NULL, NULL, NULL, NULL, '2', 'Virugambakkam', NULL, NULL, NULL, NULL, 1, '2024-12-09 10:41:00', '2024-12-09 10:50:47'),
(31, 38, NULL, 1, NULL, 10, 44, NULL, NULL, NULL, 'Myself', 'KAVICHITHRAA', 'female', '9962628717', 'kavichithraa@gmail.com', '388606', '1994-09-17', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Aindhu veetu swamy', NULL, 0, 'Nadar', NULL, NULL, '12', '46', 'AM', NULL, 'Chennai', NULL, NULL, NULL, NULL, '1', '2', '22', 'Sri Raangammal Kovil Street', '600021', '23/10', '23/10,Sri Raangammal Kovil Street,Chennai-600021.', '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-11 10:19:59', '2024-12-18 06:17:54'),
(32, 42, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Myself', 'VARSHINI', 'female', '9841384582', 'varshini@gmail.com', '901848', '1992-08-24', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, 'Select', '0', 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-11 10:25:41', '2024-12-18 05:45:04'),
(33, 43, NULL, 1, NULL, 7, 30, 1, 27, 250, 'Myself', 'RATHISINDHUJA', 'female', '9840426346', 'rathi@gmail.com', '304485', '1996-05-03', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, '2', '49', 'AM', '1733913195.png', 'Chennai', NULL, NULL, NULL, NULL, '1', '23', '281', 'Kaatunaayagal', '628712', NULL, NULL, '2', 'Kovur', '600128', NULL, NULL, NULL, 1, '2024-12-11 10:28:11', '2024-12-11 10:44:03'),
(34, 44, NULL, 1, NULL, 10, 44, 1, 2, 13, 'Myself', 'KAVICHITHRAA', 'female', '9841384582', 'kavichithra@gmail.com', '756214', '1994-09-17', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, '12', '46', 'AM', '1733914776.png', NULL, NULL, NULL, NULL, NULL, '1', '32', NULL, NULL, NULL, NULL, NULL, '2', 'SRI RANGAMAAL KOVIL STREET', '600021', '23/10', '23/10,SRI RANGAMAAL KOVIL STREET,CHENNAI-600021.', NULL, 1, '2024-12-11 10:50:31', '2024-12-18 06:08:05'),
(35, 46, NULL, 1, NULL, 3, 12, NULL, NULL, NULL, 'Myself', 'VARSHINISELAPALAM', 'female', '9841384582', 'varshini123@gmail.com', '769818', '1992-08-24', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, '3', '55', 'AM', '1733916041.png', 'Chennai', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-11 11:17:07', '2024-12-16 11:56:04'),
(36, 47, NULL, 1, NULL, 1, 3, 1, 34, 5, 'Myself', 'MATHUMEENA', 'female', '9841384582', 'mathumeena@gmail.com', '161216', '1996-10-28', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, '6', '10', 'AM', '1733925647.png', 'Chennai', NULL, NULL, NULL, NULL, '1', '32', '307', 'Thiruthangal', '626130', NULL, NULL, '2', 'Pallavaram', '600043', NULL, NULL, NULL, 1, '2024-12-11 13:58:21', '2024-12-17 04:25:28'),
(37, 48, NULL, 1, NULL, 7, NULL, NULL, NULL, NULL, 'Myself', 'TEJASWI', 'female', '9841384582', 'tejaswi@gmail.com', '202458', '1996-04-07', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '12', '59', 'AM', '1733927937.png', 'Chennai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-11 14:20:43', '2024-12-17 04:27:13'),
(38, 49, NULL, 1, NULL, 11, NULL, 1, 23, 283, 'Myself', 'KANIIMALAR', 'female', '9940495500', 'kaniimalar@gmail.com', '692043', '1998-11-26', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Arunchunai Kaththa Ayyanar', NULL, 0, 'Nadar', NULL, NULL, 'Select', '0', 'Select', '1733981964.png', 'Chennai', NULL, NULL, NULL, NULL, '1', '2', '25', 'Nanganallur', '600061', NULL, NULL, '2', 'Reddiapatti', '628907', NULL, NULL, NULL, 1, '2024-12-12 05:34:35', '2024-12-12 05:49:27'),
(39, 50, NULL, 1, NULL, 11, 46, 1, 2, NULL, 'Myself', 'KEERTHANA', 'female', '9441358958', 'keerthana@gmail.com', '284636', '1998-07-13', NULL, 0, 0, NULL, NULL, NULL, 'select', 'tamil', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '12', '50', 'AM', '1733988519.png', 'Chennai', NULL, NULL, NULL, NULL, '1', '32', '304', 'Aruppankulam', '626101', NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-12 07:17:06', '2024-12-12 07:36:38'),
(40, 51, NULL, 1, NULL, 2, 4, NULL, NULL, NULL, 'Myself', 'AARTHI', 'female', '9566228598', 'aarthi@gmail.com', '130314', '1997-11-15', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, '3', '50', 'AM', '1733996769.png', NULL, NULL, NULL, NULL, NULL, '1', '2', '26', 'Pallikaranai', '600100', 'Plot 28', 'Plot 28,munseep colony,Pallikaranai,chennai-600 100.', '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-12 09:38:57', '2024-12-12 09:56:51'),
(41, 52, NULL, 1, NULL, 8, 36, 1, 2, 26, 'Myself', 'DHIVYAJOTHI', 'female', '9840150311', 'dhivyajothi@gmail.com', '649832', '1998-09-27', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Muthu sastha, Kurumbur.', NULL, 0, 'Nadar', NULL, NULL, '6', '55', 'PM', '1733999895.png', NULL, NULL, NULL, NULL, NULL, '1', '18', '158', NULL, '623701', NULL, NULL, '2', 'Pallikaranai', '600100', 'No 5', 'No 5,Kovalan nagar,1st main road,\r\nPallikaranai ,Chennai-600 100.', NULL, 1, '2024-12-12 10:33:59', '2024-12-12 10:47:15'),
(42, 53, NULL, 1, NULL, 9, 38, 1, 2, 20, 'Myself', 'VALARMATHI', 'female', '9841775298', 'valarmathi@gmail.com', '862335', '1998-11-23', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Melmandai pethanachi amman,Kulathur.', NULL, 0, 'Nadar', NULL, NULL, '6', '45', 'AM', '1734001149.png', 'Chennai', NULL, NULL, NULL, NULL, '1', '23', '283', 'Kulathur', '628907', NULL, NULL, '2', 'Nungambakkam', '600034', '19', '19,Noor veerasamy street,Nungambakkam,Chennai-600034', NULL, 1, '2024-12-12 10:55:53', '2024-12-12 11:06:32'),
(43, 54, NULL, 1, NULL, 3, 12, NULL, NULL, NULL, 'Myself', 'HARISHMTHA', 'female', '9841384582', 'harishmitha@gmail.com', '418009', '1998-03-08', NULL, 0, 0, NULL, NULL, NULL, 'select', 'tamil', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '8', '40', 'AM', '1734002086.png', 'chennai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-12 11:10:19', '2024-12-12 11:14:46'),
(44, 55, NULL, 1, NULL, 10, 44, 1, 21, 189, 'Myself', 'KEERTHIKA', 'female', '9629829575', 'keerthika@gmail.com', '161639', '1999-01-19', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '10', '38', 'PM', '1734002974.png', NULL, NULL, NULL, NULL, NULL, '1', '20', '183', 'illupaiyur', '630609', NULL, NULL, '2', 'villar', '613006', NULL, '1907,SR colony, thillai nagar, villar ,thanjavur-613006', NULL, 1, '2024-12-12 11:26:41', '2024-12-12 11:35:43'),
(45, 56, NULL, 1, NULL, 6, 25, NULL, NULL, NULL, 'Myself', 'AATHESWAR', 'male', '9841384582', 'aatheswar@gmail.com', '256065', '1995-02-19', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, '4', '37', 'AM', '1734415326.png', 'sivakasi', NULL, NULL, NULL, NULL, '1', '32', '307', 'Thangappa nagar,Sivakasi', '626189', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-17 05:55:31', '2024-12-17 06:30:38'),
(46, 57, NULL, 1, NULL, 10, 45, NULL, NULL, NULL, 'Myself', 'ATHIMOOLAM', 'male', '9443120493', 'athimoolam@gmail.com', '960792', '1996-10-21', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, '5', '15', 'PM', '1734419559.png', 'Thoothukudi', NULL, NULL, NULL, NULL, '1', '8', '83', 'Apparav street', '631501', '99/1', 'old no.32-A,New no.99/1,Apparav street,Kanchpuram-631501', '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-17 06:44:20', '2024-12-17 07:21:55'),
(47, 58, NULL, 1, NULL, 3, 10, NULL, NULL, NULL, 'Myself', 'SIDDHARTHA ABIMANYU', 'male', '9841384582', 'siddhartha@gmail.com', '513682', '1995-09-17', NULL, 0, 0, NULL, NULL, NULL, 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '5', '3', 'AM', '1734422479.png', 'chennai', NULL, NULL, NULL, NULL, '1', '37', '207', 'erstwhile Nellai', '627001', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-17 07:31:08', '2024-12-17 08:09:43'),
(48, 59, NULL, 1, NULL, 8, 35, NULL, NULL, NULL, 'Myself', 'GOUTHAMARAJAN', 'male', '9841606273', 'gouthamarajan@gmail.com', '843740', '1993-09-21', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, '2', '38', 'PM', '1734429353.png', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, 'Old Perungalathur', '630063', '10', '10,4th street,old perungalathur,chennai-600063', '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-17 08:58:25', '2024-12-17 10:10:15'),
(49, 60, NULL, 1, NULL, 12, 53, NULL, NULL, NULL, 'Myself', 'NAVEEN', 'male', '9444875960', 'naveen@gmail.com', '737944', '1994-10-17', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Sri Periya Pirattiamman', NULL, 0, 'Nadar', NULL, NULL, '11', '38', 'PM', '1734428347.png', 'Aeral', NULL, NULL, NULL, NULL, '1', '23', '287', 'Kulaiyankarisal', '628103', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-17 09:14:54', '2024-12-17 09:44:44'),
(50, 61, NULL, 1, NULL, 6, 25, 1, 2, 22, 'Myself', 'SARAVANAN', 'male', '9600018700', 'saravanan@gmail.com', '120524', '1999-10-09', NULL, 0, 0, NULL, NULL, NULL, 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '6', '4', 'AM', '1734430639.png', 'sivakasi', NULL, NULL, NULL, NULL, '1', '32', '307', 'Perapatti', '626189', NULL, NULL, '2', 'Ashok Nagar', '600083', NULL, NULL, NULL, 1, '2024-12-17 10:13:25', '2024-12-17 10:23:48'),
(51, 62, NULL, 1, NULL, 2, 7, NULL, NULL, NULL, 'Myself', 'VIGNESH', 'male', '9841384582', 'vignesh@gmail.com', '931239', NULL, NULL, 0, 0, NULL, NULL, NULL, 'select', 'tamil', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'Select', '0', 'Select', NULL, NULL, NULL, NULL, NULL, NULL, '1', '32', '310', 'Pudhu patti', '625528', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-17 10:30:34', '2024-12-17 10:39:37'),
(52, 63, NULL, 1, NULL, 9, 39, 1, 25, 228, 'Myself', 'UMESH', 'male', '9003078513', 'umesh@gmail.com', '253996', '1998-10-30', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, '8', '29', 'AM', '1734432492.png', 'chennai', NULL, NULL, NULL, NULL, '1', '2', '15', 'Vyasarpadi', '600039', '24A', '24A,Nesavalar colony street,vyasarpadi-600039', '2', 'Mukudal', '627358', NULL, NULL, NULL, 1, '2024-12-17 10:45:25', '2024-12-17 10:56:12'),
(53, 64, NULL, 1, NULL, 2, 6, 1, 18, 158, 'Myself', 'VIGNESHRAJA', 'male', '9840150311', 'vigneshraja@gmail.com', '598703', '1992-12-08', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Nadar', NULL, NULL, '10', '42', 'PM', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2', NULL, 'Pallikaranai', '600100', NULL, NULL, '2', 'Kadaladi', NULL, NULL, NULL, NULL, 1, '2024-12-17 11:07:41', '2024-12-17 11:17:24'),
(54, 65, NULL, 1, NULL, 12, 53, 1, 2, NULL, 'Myself', 'ADITYA', 'male', '9841384582', 'aditya@gmail.com', '750716', '1992-08-17', NULL, 0, 0, NULL, NULL, 'Hindu', 'select', 'tamil,english', NULL, 'Tamil', 0, 0, NULL, NULL, NULL, NULL, 'Rakkatchi Amman, Ayyaneri (Near Kovilpatti)', NULL, 0, 'Nadar', NULL, NULL, '12', '44', 'PM', '1734434482.jpg', 'Madurai', NULL, NULL, NULL, NULL, '1', '23', '280', 'Ayya kottai', NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-17 11:12:28', '2024-12-17 11:32:05'),
(55, 71, 'GNM66726', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Daughter', 'SELVARANI', NULL, '8438106462', 'rajselvarani143@gmail.com', '710458', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-02-02 00:07:33', '2026-02-02 00:07:33'),
(56, 73, 'GNM78118', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Self', 'Arun Kumar', 'male', '9876543210', 'arun.kumar@example.com', NULL, '1996-08-14', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-02-09 05:00:41', '2026-02-09 23:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `member_activity_logs`
--

CREATE TABLE `member_activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `body_type` varchar(255) DEFAULT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `flag` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `upprove_date` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `upproved_by` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_activity_logs`
--

INSERT INTO `member_activity_logs` (`id`, `member_id`, `body_type`, `profile_id`, `flag`, `message`, `upprove_date`, `user_id`, `upproved_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 5, 2, 'NARESH requested PIRIMATHI profile', '2026-02-03', 5, '1', 2, '2024-12-06 08:00:27', '2026-02-03 02:06:29'),
(2, 6, NULL, 5, 2, 'GUNASEKAR requested PIRIMATHI profile', '2024-12-06', 5, '1', 2, '2024-12-06 09:29:26', '2024-12-06 09:57:43'),
(3, 1, NULL, 5, 3, 'NARESH requested PIRAIMATHI Viewprofile', NULL, 5, NULL, 1, '2026-02-03 00:10:34', '2026-02-03 00:10:34'),
(4, 1, NULL, 10, 3, 'NARESH requested AKSHAYA Viewprofile', NULL, 13, NULL, 1, '2026-02-03 01:54:52', '2026-02-03 01:54:52'),
(5, 1, NULL, 8, 4, 'NARESH requested SWETHA photo', NULL, 8, NULL, 1, '2026-02-03 01:55:37', '2026-02-03 01:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `member_addional_details`
--

CREATE TABLE `member_addional_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `body_type` varchar(255) DEFAULT NULL,
  `height_id` bigint(20) UNSIGNED NOT NULL,
  `weight_id` bigint(20) UNSIGNED NOT NULL,
  `disablitiy` tinyint(1) NOT NULL DEFAULT 0,
  `eating_habit` tinyint(1) NOT NULL DEFAULT 0,
  `drinking_habit` tinyint(1) NOT NULL DEFAULT 0,
  `smoking_habit` tinyint(1) NOT NULL DEFAULT 0,
  `about_you` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_addional_details`
--

INSERT INTO `member_addional_details` (`id`, `member_id`, `body_type`, `height_id`, `weight_id`, `disablitiy`, `eating_habit`, `drinking_habit`, `smoking_habit`, `about_you`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 21, 0, 0, 0, 0, 0, NULL, 1, '2024-12-03 10:43:54', '2024-12-03 10:43:54'),
(2, 2, NULL, 25, 0, 0, 0, 0, 0, NULL, 1, '2024-12-03 23:03:10', '2024-12-03 23:03:10'),
(3, 3, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-04 00:01:18', '2024-12-04 00:01:18'),
(4, 4, NULL, 25, 0, 1, 2, 1, 1, 'Arulmigu Maalai Kaari Amman,Kadaladi-RAmanathapuram District.Nuclear Family.We have own house in chennai near to Airport.Settled in Chennai 40years.', 1, '2024-12-04 01:56:44', '2024-12-04 01:56:44'),
(5, 5, 'Slim', 13, 19, 1, 1, 0, 0, 'Piraimathi Testing', 1, '2024-12-06 05:48:48', '2024-12-07 12:11:21'),
(6, 6, NULL, 21, 0, 0, 0, 0, 0, NULL, 1, '2024-12-06 08:40:11', '2024-12-06 08:40:11'),
(7, 7, NULL, 21, 0, 0, 0, 0, 0, NULL, 1, '2024-12-06 09:06:09', '2024-12-06 09:06:09'),
(8, 8, NULL, 23, 0, 0, 0, 0, 0, NULL, 1, '2024-12-06 10:38:12', '2024-12-06 10:38:12'),
(9, 10, NULL, 25, 0, 0, 0, 0, 0, NULL, 1, '2024-12-06 11:08:09', '2024-12-06 11:08:09'),
(10, 11, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-06 11:16:43', '2024-12-06 11:16:43'),
(11, 12, NULL, 22, 0, 0, 0, 0, 0, NULL, 1, '2024-12-06 16:05:32', '2024-12-06 16:05:32'),
(12, 13, 'Average', 21, 0, 0, 0, 0, 0, NULL, 1, '2024-12-07 05:19:18', '2024-12-07 05:19:18'),
(13, 14, NULL, 25, 0, 0, 0, 0, 0, NULL, 1, '2024-12-07 05:27:57', '2024-12-07 05:27:57'),
(14, 15, NULL, 25, 0, 0, 0, 0, 0, NULL, 1, '2024-12-07 05:48:30', '2024-12-07 05:48:30'),
(15, 16, NULL, 25, 0, 0, 0, 0, 0, NULL, 1, '2024-12-07 06:16:22', '2024-12-07 06:16:22'),
(16, 17, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-07 06:22:01', '2024-12-07 06:22:01'),
(17, 19, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-07 07:21:40', '2024-12-07 07:21:40'),
(18, 21, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-08 05:40:00', '2024-12-08 05:40:00'),
(19, 22, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-09 05:34:44', '2024-12-09 05:34:44'),
(20, 24, NULL, 21, 0, 0, 0, 0, 0, NULL, 1, '2024-12-09 07:49:21', '2024-12-09 07:49:21'),
(21, 25, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-09 09:12:15', '2024-12-09 09:12:15'),
(22, 26, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-09 09:44:35', '2024-12-09 09:44:35'),
(23, 27, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-09 10:06:35', '2024-12-09 10:06:35'),
(24, 28, NULL, 25, 0, 0, 0, 0, 0, NULL, 1, '2024-12-09 10:21:37', '2024-12-09 10:21:37'),
(25, 29, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-09 10:30:53', '2024-12-09 10:30:53'),
(26, 30, NULL, 23, 0, 0, 0, 0, 0, NULL, 1, '2024-12-09 10:47:01', '2024-12-09 10:47:01'),
(27, 33, NULL, 25, 0, 0, 0, 0, 0, NULL, 1, '2024-12-11 10:35:51', '2024-12-11 10:35:51'),
(28, 34, NULL, 25, 0, 0, 0, 0, 0, NULL, 1, '2024-12-11 11:00:56', '2024-12-11 11:00:56'),
(29, 35, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-11 11:23:28', '2024-12-11 11:23:28'),
(30, 36, NULL, 25, 0, 0, 0, 0, 0, NULL, 1, '2024-12-11 14:04:09', '2024-12-11 14:04:09'),
(31, 37, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-11 14:42:09', '2024-12-11 14:42:09'),
(32, 38, NULL, 22, 0, 0, 0, 0, 0, NULL, 1, '2024-12-12 05:43:03', '2024-12-12 05:43:03'),
(33, 39, NULL, 25, 0, 0, 0, 0, 0, NULL, 1, '2024-12-12 07:31:34', '2024-12-12 07:31:34'),
(34, 40, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-12 09:49:24', '2024-12-12 09:49:24'),
(35, 41, NULL, 23, 0, 0, 0, 0, 0, NULL, 1, '2024-12-12 10:43:03', '2024-12-12 10:43:03'),
(36, 42, NULL, 24, 0, 0, 0, 0, 0, NULL, 1, '2024-12-12 11:01:45', '2024-12-12 11:01:45'),
(37, 43, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-12 11:17:27', '2024-12-12 11:17:27'),
(38, 44, NULL, 24, 0, 0, 0, 0, 0, NULL, 1, '2024-12-12 11:31:42', '2024-12-12 11:31:42'),
(39, 18, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-16 09:32:33', '2024-12-16 09:32:33'),
(40, 20, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-16 09:46:35', '2024-12-16 09:46:35'),
(41, 31, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-16 11:28:26', '2024-12-16 11:28:26'),
(42, 45, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-17 06:04:58', '2024-12-17 06:04:58'),
(43, 46, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-17 07:15:27', '2024-12-17 07:15:27'),
(44, 47, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-17 08:04:03', '2024-12-17 08:04:03'),
(45, 49, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-17 09:40:22', '2024-12-17 09:40:22'),
(46, 48, NULL, 0, 0, 0, 1, 0, 0, NULL, 1, '2024-12-17 09:59:13', '2024-12-17 09:59:13'),
(47, 50, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-17 10:19:01', '2024-12-17 10:19:01'),
(48, 51, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-17 10:36:20', '2024-12-17 10:36:20'),
(49, 52, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-17 10:50:02', '2024-12-17 10:50:02'),
(50, 53, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-17 11:13:03', '2024-12-17 11:13:03'),
(51, 54, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-17 11:28:02', '2024-12-17 11:28:02'),
(52, 32, NULL, 0, 0, 0, 0, 0, 0, NULL, 1, '2024-12-18 05:46:10', '2024-12-18 05:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `member_hobbies`
--

CREATE TABLE `member_hobbies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `otherhobbies` varchar(255) DEFAULT NULL,
  `music` varchar(255) DEFAULT NULL,
  `othermusic` varchar(255) DEFAULT NULL,
  `sports` varchar(255) DEFAULT NULL,
  `othersports` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_hobbies`
--

INSERT INTO `member_hobbies` (`id`, `member_id`, `hobbies`, `otherhobbies`, `music`, `othermusic`, `sports`, `othersports`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-03 11:03:22', '2024-12-03 11:03:22'),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-03 23:31:57', '2024-12-03 23:31:57'),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-04 00:17:28', '2024-12-04 00:17:28'),
(4, 4, '1,2,3,6', NULL, NULL, NULL, NULL, NULL, 1, '2024-12-04 02:19:29', '2024-12-04 02:19:29'),
(5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-06 06:01:58', '2024-12-06 06:01:58'),
(6, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-06 09:07:25', '2024-12-06 09:07:25'),
(7, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-06 09:50:35', '2024-12-06 09:50:35'),
(8, 8, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-06 10:53:41', '2024-12-06 10:53:41'),
(9, 11, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-06 11:20:52', '2024-12-06 11:20:52'),
(10, 10, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-06 11:27:25', '2024-12-06 11:27:25'),
(11, 12, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-06 16:17:15', '2024-12-06 16:17:15'),
(12, 13, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-07 05:24:18', '2024-12-07 05:24:18'),
(13, 14, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-07 05:56:21', '2024-12-07 05:56:21'),
(14, 15, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-07 05:59:39', '2024-12-07 05:59:39'),
(15, 16, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-07 06:28:00', '2024-12-07 06:28:00'),
(16, 17, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-07 06:31:57', '2024-12-07 06:31:57'),
(17, 19, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-07 07:33:26', '2024-12-07 07:33:26'),
(18, 21, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-08 05:48:47', '2024-12-08 05:48:47'),
(19, 22, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-09 05:54:49', '2024-12-09 05:54:49'),
(20, 24, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-09 08:04:02', '2024-12-09 08:04:02'),
(21, 25, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-09 09:20:26', '2024-12-09 09:20:26'),
(22, 27, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-09 10:12:32', '2024-12-09 10:12:32'),
(23, 28, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-09 10:24:23', '2024-12-09 10:24:23'),
(24, 29, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-09 10:34:22', '2024-12-09 10:34:22'),
(25, 30, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-09 10:50:59', '2024-12-09 10:50:59'),
(26, 33, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-11 10:45:00', '2024-12-11 10:45:00'),
(27, 34, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-11 11:10:56', '2024-12-11 11:10:56'),
(28, 35, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-11 11:29:31', '2024-12-11 11:29:31'),
(29, 36, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-11 14:09:46', '2024-12-11 14:09:46'),
(30, 37, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-11 14:44:58', '2024-12-11 14:44:58'),
(31, 38, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-12 05:50:39', '2024-12-12 05:50:39'),
(32, 39, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-12 07:53:50', '2024-12-12 07:53:50'),
(33, 40, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-12 09:57:59', '2024-12-12 09:57:59'),
(34, 41, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-12 10:50:31', '2024-12-12 10:50:31'),
(35, 42, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-12 11:08:01', '2024-12-12 11:08:01'),
(36, 43, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-12 11:20:27', '2024-12-12 11:20:27'),
(37, 44, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-12 11:36:22', '2024-12-12 11:36:22'),
(38, 26, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-16 10:59:23', '2024-12-16 10:59:23'),
(39, 45, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-17 06:34:35', '2024-12-17 06:34:35'),
(40, 46, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-17 07:24:32', '2024-12-17 07:24:32'),
(41, 47, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-17 08:12:22', '2024-12-17 08:12:22'),
(42, 49, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-17 09:47:18', '2024-12-17 09:47:18'),
(43, 48, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-17 10:10:25', '2024-12-17 10:10:25'),
(44, 50, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-17 10:25:55', '2024-12-17 10:25:55'),
(45, 51, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-17 10:42:27', '2024-12-17 10:42:27'),
(46, 52, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-17 10:56:21', '2024-12-17 10:56:21'),
(47, 53, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-17 11:19:33', '2024-12-17 11:19:33'),
(48, 54, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-17 11:34:01', '2024-12-17 11:34:01'),
(49, 32, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-18 05:49:04', '2024-12-18 05:49:04'),
(50, 18, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-18 06:04:19', '2024-12-18 06:04:19'),
(51, 31, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-18 06:20:44', '2024-12-18 06:20:44'),
(52, 20, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-18 07:38:19', '2024-12-18 07:38:19');

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
(1, '2014_09_08_150958_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_09_08_150903_create_user_otp_verifies_table', 1),
(7, '2024_09_08_151042_create_routes_table', 1),
(8, '2024_09_08_151048_create_permissions_table', 1),
(9, '2024_09_08_151459_create_settings_table', 1),
(10, '2024_09_23_170830_create_states_table', 2),
(11, '2024_09_23_171007_create_cities_table', 2),
(12, '2024_09_23_171142_create_countries_table', 2),
(13, '2024_09_23_171225_create_dosam_details_table', 2),
(14, '2024_09_23_171449_create_education_table', 2),
(15, '2024_09_23_173129_create_heights_table', 2),
(16, '2024_09_23_173255_create_hobbies_table', 2),
(17, '2024_09_23_173601_create_languages_table', 2),
(18, '2024_09_23_174005_create_occupations_table', 2),
(19, '2024_09_23_174145_create_upload_files_table', 2),
(20, '2024_09_23_175442_create_weights_table', 2),
(21, '2024_09_23_175620_create_raasis_table', 2),
(22, '2024_09_23_175742_create_stars_table', 2),
(23, '2024_09_23_175901_create_subscription_amounts_table', 2),
(24, '2024_09_23_180122_create_talukas_table', 2),
(25, '2024_09_23_180430_create_transaction_logs_table', 2),
(26, '2024_09_29_165037_create_members_table', 2),
(27, '2024_09_29_171500_create_education_details_table', 2),
(28, '2024_09_29_172050_create_family_details_table', 2),
(29, '2024_09_29_173319_create_member_hobbies_table', 2),
(30, '2024_09_29_174300_create_photos_table', 2),
(31, '2024_09_29_174935_create_member_addional_details_table', 2),
(32, '2024_09_29_180731_create_member_activity_logs_table', 2),
(33, '2024_09_30_043244_create_partner_information_table', 2),
(34, '2024_09_30_045109_create_liked_profiles_table', 2),
(38, '2024_10_04_185023_add_association_id_to_members_table', 3),
(39, '2024_10_06_154236_add_village_temple_to_members_table', 4),
(40, '2024_10_15_140429_add_horoscope_address_to_members_table', 5),
(41, '2024_10_15_142911_add_star_id_address_id_to_members_table', 6),
(42, '2024_10_16_065452_change_column_to_members_table', 7),
(43, '2024_10_16_053441_change_column_type_members_table', 8),
(44, '2024_10_16_100601_add_eating_habit_to_member_addional_details_table', 9),
(45, '2024_10_17_084759_add_taluk_to_taulks_table', 10),
(46, '2024_10_17_120358_add_occuption_to_table_education_details', 11),
(47, '2024_10_18_065310_remove_columnn_education_details_table', 12),
(48, '2024_10_18_071256_add_state_columnn_to_education_details_table', 13),
(49, '2024_10_18_091647_add_other_hobbies_member_hobbies_table', 14),
(50, '2024_10_18_153347_remove_hobbies_id_member_hobbies_table', 15),
(51, '2024_10_18_153656_add_hobbies_id_member_hobbies_table', 16),
(52, '2024_10_19_070429_add_age_to_partner_information_table', 17),
(53, '2024_10_20_135356_remove_mother_tongue_partner_information_table', 18),
(54, '2024_10_20_135809_add_religion_to_partner_information_table', 19),
(55, '2024_10_21_060112_remov_weight_to_partner_information_table', 20),
(56, '2024_10_21_061147_remove_star_id_to_partner_information_table', 21),
(57, '2024_10_21_091444_create_relative_table', 22),
(58, '2024_10_21_095354_add_is_active_to_relative_table', 23),
(59, '2024_10_22_071559_add_contact_no_to_family_details', 24),
(60, '2024_11_06_085027_create_horoscope_detail', 25),
(61, '2024_11_06_092115_add_is_active_horoscope_detail_table', 26),
(62, '2024_11_07_060815_add_raasi_id_stars_table', 27),
(63, '2024_11_10_092146_create_search_log_table', 28),
(64, '2024_11_27_094310_create_user_log_table', 29),
(65, '2024_11_27_102355_drop_user_log_table', 30),
(66, '2024_11_27_110929_alter_column_type_in_member_activity_logs', 31),
(67, '2024_11_28_070421_add_status_member_activity_logs_table', 32);

-- --------------------------------------------------------

--
-- Table structure for table `occupations`
--

CREATE TABLE `occupations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `year_income` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partner_information`
--

CREATE TABLE `partner_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `age` int(11) DEFAULT NULL,
  `age_from` varchar(255) DEFAULT NULL,
  `height_id` bigint(20) UNSIGNED NOT NULL,
  `height_id_from` bigint(20) UNSIGNED DEFAULT NULL,
  `marital_status` enum('married','unmarried') DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `mother_tongue` varchar(255) DEFAULT NULL,
  `caste` varchar(255) DEFAULT NULL,
  `star` varchar(255) DEFAULT NULL,
  `rassi` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `dosam` varchar(255) DEFAULT NULL,
  `income` varchar(255) DEFAULT NULL,
  `about_you` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partner_information`
--

INSERT INTO `partner_information` (`id`, `member_id`, `age`, `age_from`, `height_id`, `height_id_from`, `marital_status`, `religion`, `mother_tongue`, `caste`, `star`, `rassi`, `education`, `dosam`, `income`, `about_you`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '0', 0, 0, NULL, 'Hindu', 'Tamil', 'Nadar', '', '', '', 'No', NULL, NULL, 1, '2024-12-03 11:05:17', '2024-12-03 11:05:17'),
(2, 2, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '18,35,2,38,17,54,7,48,30,12,43,53', '1,2,3,4,5,6,7,8,9,10,11,12', '', NULL, NULL, 'Working Women', 1, '2024-12-03 23:37:38', '2024-12-03 23:39:28'),
(3, 3, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-04 00:21:17', '2024-12-04 00:21:17'),
(4, 4, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-04 02:20:17', '2024-12-04 02:20:17'),
(5, 5, 27, '29', 13, 21, NULL, 'Hindu', 'Tamil', 'Nadar', '1,4,9', '1,2,3', 'BE,MBA,MCA,ME,Mcs', NULL, NULL, 'Piraimathi Testing', 1, '2024-12-06 06:15:07', '2024-12-06 06:15:07'),
(6, 6, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-06 09:11:44', '2024-12-06 09:11:44'),
(7, 7, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-06 09:51:11', '2024-12-06 09:51:11'),
(8, 8, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-06 10:53:55', '2024-12-06 10:53:55'),
(9, 11, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-06 11:21:31', '2024-12-06 11:21:31'),
(10, 10, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, 'Looking for chennai based BrideGroom', 1, '2024-12-06 11:30:07', '2024-12-06 11:30:07'),
(11, 12, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-06 16:18:52', '2024-12-06 16:18:52'),
(12, 13, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-07 05:24:39', '2024-12-07 05:24:39'),
(13, 14, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-07 05:57:04', '2024-12-07 05:57:04'),
(14, 15, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', 'BE,MBBS,MBA,MCA,B.Tech,BA,MA,ME,Mcs,B.plan', NULL, NULL, 'A girl with any educational degree and a light skin tone.', 1, '2024-12-07 06:04:06', '2024-12-07 06:04:06'),
(15, 16, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-07 06:29:20', '2024-12-07 06:29:20'),
(16, 17, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-07 06:32:15', '2024-12-07 06:32:15'),
(17, 19, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '1,3,4,5,6,11,8,9,10', '1,2,3,7,12', '', NULL, NULL, NULL, 1, '2024-12-07 07:36:32', '2024-12-16 09:43:54'),
(18, 21, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-08 05:49:58', '2024-12-08 05:49:58'),
(19, 22, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-09 05:55:10', '2024-12-09 05:55:10'),
(20, 24, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-09 08:04:08', '2024-12-09 08:04:08'),
(21, 25, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-09 09:24:17', '2024-12-09 09:24:17'),
(22, 27, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-09 10:12:37', '2024-12-09 10:12:37'),
(23, 28, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-09 10:24:28', '2024-12-09 10:24:28'),
(24, 29, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-09 10:34:27', '2024-12-09 10:34:27'),
(25, 30, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-09 10:51:03', '2024-12-09 10:51:03'),
(26, 33, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-11 10:45:06', '2024-12-11 10:45:06'),
(27, 34, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-11 11:11:00', '2024-12-11 11:11:00'),
(28, 35, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-11 11:29:36', '2024-12-11 11:29:36'),
(29, 36, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, 'Only grooms in Chennai who are in business', 1, '2024-12-11 14:17:59', '2024-12-11 14:17:59'),
(30, 37, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-11 14:45:04', '2024-12-11 14:45:04'),
(31, 38, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-12 05:50:59', '2024-12-12 05:50:59'),
(32, 39, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-12 07:54:04', '2024-12-12 07:54:04'),
(33, 40, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, 'looking for a groom well studied and  a good family background', 1, '2024-12-12 10:00:13', '2024-12-12 10:00:13'),
(34, 41, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-12 10:50:36', '2024-12-12 10:50:36'),
(35, 42, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-12 11:08:11', '2024-12-12 11:08:11'),
(36, 43, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-12 11:20:32', '2024-12-12 11:20:32'),
(37, 44, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-12 11:36:33', '2024-12-12 11:36:33'),
(38, 26, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-16 10:59:27', '2024-12-16 10:59:27'),
(39, 45, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-17 06:34:41', '2024-12-17 06:34:41'),
(40, 46, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-17 07:24:36', '2024-12-17 07:24:36'),
(41, 47, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-17 08:12:27', '2024-12-17 08:12:27'),
(42, 49, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-17 09:47:21', '2024-12-17 09:47:21'),
(43, 48, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-17 10:10:28', '2024-12-17 10:10:28'),
(44, 50, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-17 10:26:00', '2024-12-17 10:26:00'),
(45, 51, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-17 10:42:37', '2024-12-17 10:42:37'),
(46, 52, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-17 10:56:25', '2024-12-17 10:56:25'),
(47, 53, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-17 11:19:37', '2024-12-17 11:19:37'),
(48, 54, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-17 11:34:04', '2024-12-17 11:34:04'),
(49, 32, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-18 05:49:07', '2024-12-18 05:49:07'),
(50, 18, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-18 06:04:22', '2024-12-18 06:04:22'),
(51, 31, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-18 06:20:48', '2024-12-18 06:20:48'),
(52, 20, 0, '0', 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2024-12-18 07:38:22', '2024-12-18 07:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `route_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-09-08 18:35:48', '2024-09-08 18:35:48'),
(2, 1, 1, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(3, 1, 2, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(4, 1, 3, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(5, 1, 4, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(6, 1, 5, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(7, 1, 6, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(8, 1, 7, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(9, 1, 8, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(10, 1, 9, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(11, 1, 10, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(12, 1, 11, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(13, 1, 12, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(14, 1, 13, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(15, 1, 14, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(16, 1, 15, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(17, 1, 16, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(18, 1, 17, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(19, 1, 18, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(20, 1, 19, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(21, 1, 20, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(22, 1, 21, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(23, 1, 22, '2024-09-11 18:05:07', '2024-09-11 18:05:07'),
(24, 1, 24, '2024-09-14 04:25:33', '2024-09-14 04:25:33'),
(25, 1, 25, '2024-09-14 04:25:33', '2024-09-14 04:25:33'),
(26, 1, 26, '2024-09-14 04:25:33', '2024-09-14 04:25:33'),
(27, 1, 27, '2024-09-14 04:25:33', '2024-09-14 04:25:33'),
(28, 1, 28, '2024-09-14 04:25:33', '2024-09-14 04:25:33'),
(29, 1, 29, '2024-09-14 04:25:33', '2024-09-14 04:25:33'),
(30, 1, 23, '2024-09-14 04:48:12', '2024-09-14 04:48:12'),
(31, 1, 30, '2024-09-14 04:48:12', '2024-09-14 04:48:12'),
(32, 1, 31, '2024-09-14 04:48:12', '2024-09-14 04:48:12'),
(33, 1, 32, '2024-09-14 04:48:12', '2024-09-14 04:48:12'),
(34, 3, 33, '2024-09-14 04:57:46', '2024-09-14 04:57:46'),
(35, 3, 34, '2024-09-14 04:57:46', '2024-09-14 04:57:46'),
(36, 1, 37, '2024-09-16 10:49:33', '2024-09-16 10:49:33'),
(37, 4, 33, '2024-10-04 12:08:22', '2024-10-04 12:08:22'),
(38, 4, 34, '2024-10-04 12:08:22', '2024-10-04 12:08:22'),
(39, 4, 35, '2024-10-04 12:08:22', '2024-10-04 12:08:22'),
(40, 4, 36, '2024-10-04 12:08:22', '2024-10-04 12:08:22'),
(41, 5, 33, '2024-10-04 13:08:20', '2024-10-04 13:08:20'),
(42, 5, 34, '2024-10-04 13:08:20', '2024-10-04 13:08:20'),
(43, 5, 35, '2024-10-04 13:08:20', '2024-10-04 13:08:20'),
(44, 5, 36, '2024-10-04 13:08:20', '2024-10-04 13:08:20');

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(4, 'App\\Models\\User', 1, 'mobile-app', '602f7918c46f5011d09a6ec931d82019b65fa75b512e794f601986dc7a1594de', '[\"*\"]', '2026-02-11 06:16:10', NULL, '2026-02-11 06:05:57', '2026-02-11 06:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `photo_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `raasis`
--

CREATE TABLE `raasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raasis`
--

INSERT INTO `raasis` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Mesham', 1, NULL, NULL),
(2, 'Vrishabam', 1, NULL, NULL),
(3, 'Mithunam', 1, NULL, NULL),
(4, 'Kadakam', 1, NULL, NULL),
(5, 'Simmam', 1, NULL, NULL),
(6, 'Kanni', 1, NULL, NULL),
(7, 'Thulam', 1, NULL, NULL),
(8, 'Vrishchikam', 1, NULL, NULL),
(9, 'Dhanus', 1, NULL, NULL),
(10, 'Makaram', 1, NULL, NULL),
(11, 'Kumbham', 1, NULL, NULL),
(12, 'Meenam', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `relative`
--

CREATE TABLE `relative` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `first_relative_name` varchar(255) DEFAULT NULL,
  `first_relative_relation` varchar(255) DEFAULT NULL,
  `first_relative_bussiness` varchar(255) DEFAULT NULL,
  `first_relative_number` varchar(20) DEFAULT NULL,
  `second_relative_name` varchar(255) DEFAULT NULL,
  `second_relative_relation` varchar(255) DEFAULT NULL,
  `second_relative_bussiness` varchar(255) DEFAULT NULL,
  `second_relative_number` varchar(20) DEFAULT NULL,
  `third_relative_name` varchar(255) DEFAULT NULL,
  `third_relative_relation` varchar(255) DEFAULT NULL,
  `third_relative_bussiness` varchar(255) DEFAULT NULL,
  `third_relative_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relative`
--

INSERT INTO `relative` (`id`, `member_id`, `first_relative_name`, `first_relative_relation`, `first_relative_bussiness`, `first_relative_number`, `second_relative_name`, `second_relative_relation`, `second_relative_bussiness`, `second_relative_number`, `third_relative_name`, `third_relative_relation`, `third_relative_bussiness`, `third_relative_number`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 1, 'Ulaganatha Pandian', 'Father', 'Business', '9444267372', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-03 11:06:34', '2024-12-13 07:46:48', 1),
(2, 2, 'Yogeshwaran', 'Others', 'B.E(Computer Science))', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-03 23:39:24', '2024-12-13 07:51:50', 1),
(3, 3, 'Ananthi R', 'Mother', 'House wife', '9043655449', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-04 00:25:27', '2024-12-04 00:25:27', 1),
(4, 4, 'None', 'Others', 'None', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-04 02:21:43', '2024-12-04 02:21:43', 1),
(5, 5, 'Muruagan', 'Father', 'Business', '6382682513', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-06 06:16:42', '2024-12-06 06:16:42', 1),
(6, 6, 'Thangamani N', 'Mother', 'House wife', '7845964624', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-06 09:17:45', '2024-12-06 09:17:45', 1),
(7, 7, 'Lingakumar', 'Father', 'M.T.C(Government)', '9444715450', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-06 09:55:00', '2024-12-13 10:15:28', 1),
(8, 8, 'Brother', 'Others', 'Plastic Gunny and mundy', '9442639975', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-06 10:56:11', '2024-12-06 10:59:50', 1),
(9, 11, 'Maya Krishnan', 'Father', 'Business', '9994527447', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-06 11:22:40', '2024-12-06 11:22:58', 1),
(10, 10, 'Anitha', 'Mother', 'House Wife', '8939403579', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-06 11:32:09', '2024-12-06 11:32:09', 1),
(11, 13, 'K vijayababu', 'Others', 'Senior manager,Capgemini,Chennai.', '9597010771', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-07 05:26:20', '2024-12-07 05:26:20', 1),
(12, 14, 'Thanigai', 'Others', 'Thanigai thirumana thagaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-07 05:58:12', '2024-12-13 11:10:17', 1),
(13, 15, 'Meena kumari', 'Mother', 'House wife', '9042328732', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-07 06:06:57', '2024-12-07 06:06:57', 1),
(14, 16, 'Thanigai', 'Others', 'Thirumana thagaval maiyyam', '9841384558', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-07 06:30:52', '2024-12-13 11:23:48', 1),
(15, 17, 'Thanigai', 'Others', 'Thirumana Thakaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-07 06:34:50', '2024-12-07 06:34:50', 1),
(16, 19, 'Rani', 'Mother', 'House wife', '9566615798', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-07 07:37:08', '2024-12-07 07:37:08', 1),
(17, 21, 'Thanigai', 'Others', 'thanigai thiruman thagaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-08 05:51:12', '2024-12-08 05:51:12', 1),
(18, 22, 'Thanigai', 'Others', 'thirumana thagaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-09 05:55:34', '2024-12-16 10:04:51', 1),
(19, 24, 'Kamaraj R', 'Father', 'Rice Merchant', '7358553805', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-09 08:05:18', '2024-12-09 08:05:18', 1),
(20, 25, 'Thanigai', 'Others', 'Thirumana thakaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-09 09:24:39', '2024-12-09 09:28:11', 1),
(21, 27, 'Thanigai', 'Others', 'thirumana thakaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-09 10:13:33', '2024-12-09 10:13:33', 1),
(22, 28, 'Thanigai', 'Others', 'Thanigai thirumana thakaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-09 10:24:55', '2024-12-09 10:24:55', 1),
(23, 29, 'Thanigai', 'Others', 'thirumana thakaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-09 10:37:26', '2024-12-09 10:37:26', 1),
(24, 30, 'Ponnarasan', 'Father', 'Business', '9976635456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-09 10:51:40', '2024-12-09 10:51:40', 1),
(25, 33, 'Arunachalasamy', 'Father', 'business', '9444493549', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-11 10:46:38', '2024-12-11 10:46:38', 1),
(26, 34, 'Saajivignesha', 'Others', 'Pilot in Indigo airlines', '6374908023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-11 11:12:03', '2024-12-11 11:12:03', 1),
(27, 35, 'Thanigai', 'Others', 'Thirumana thagaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-11 11:30:30', '2024-12-11 11:30:30', 1),
(28, 36, 'Thanigai', 'Others', 'Thirumana thagaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-11 14:18:40', '2024-12-11 14:18:40', 1),
(29, 37, 'Thanigai', 'Others', 'Thirumana thagaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-11 14:45:48', '2024-12-11 14:45:48', 1),
(30, 38, 'Kulanthai swamy', 'Father', 'Business', '9940495500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-12 05:51:46', '2024-12-12 05:51:46', 1),
(31, 39, 'Chamuthiram', 'Father', 'Business', '9441358958', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-12 08:09:35', '2024-12-12 08:09:35', 1),
(32, 40, 'Kasi rajan K', 'Father', 'Business', '9566228598', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-12 10:01:02', '2024-12-12 10:01:02', 1),
(33, 41, 'Ponmani P', 'Mother', 'House wife', '9600019697', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-12 10:51:23', '2024-12-12 10:51:23', 1),
(34, 42, 'Muthu Lakshmi', 'Mother', 'House wife', '8925305194', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-12 11:08:42', '2024-12-12 11:08:42', 1),
(35, 43, 'Thanigai', 'Others', 'Thirumana thagaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-12 11:21:28', '2024-12-12 11:21:28', 1),
(36, 44, 'Maheswari', 'Mother', 'house wife', '9629829575', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-12 11:37:01', '2024-12-12 11:37:01', 1),
(37, 12, 'Thanigai', 'Others', 'Thirumana thagaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-13 10:55:32', '2024-12-13 10:55:32', 1),
(38, 45, 'Thanigai', 'Others', 'Thirumana thagaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-17 06:35:18', '2024-12-17 06:35:18', 1),
(39, 46, 'Kartheesan Nadar', 'Father', 'Business', '7708030802', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-17 07:25:21', '2024-12-17 07:25:21', 1),
(40, 47, 'Thanigai', 'Others', 'Thirumana thagaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-17 08:13:11', '2024-12-17 08:13:11', 1),
(41, 49, 'Rajasekar Nadar', 'Father', 'Thanigai Thirumana thagaval maiyyam', '9444875960', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-17 09:48:23', '2024-12-17 09:48:23', 1),
(42, 48, 'Thilagarajan', 'Father', 'Business', '9841606273', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-17 10:11:10', '2024-12-17 10:11:10', 1),
(43, 50, 'Ganeshan Nadar', 'Father', 'Business', '9600018700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-17 10:26:36', '2024-12-17 10:26:36', 1),
(44, 51, 'Thanigai', 'Others', 'Thirumana thagaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-17 10:43:10', '2024-12-17 10:43:10', 1),
(45, 52, 'Sugumar', 'Father', 'Business', '9003078513', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-17 10:57:00', '2024-12-17 10:57:00', 1),
(46, 53, 'Pandi selvam', 'Father', 'Business', '9840150311', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-17 11:22:05', '2024-12-17 11:22:05', 1),
(47, 54, 'Thanigai', 'Others', 'thirumana thagaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-17 11:34:33', '2024-12-17 11:34:33', 1),
(48, 32, 'Thanigai', 'Others', 'Thirumana thagaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-18 05:49:39', '2024-12-18 05:49:39', 1),
(49, 18, 'VijayaRaj', 'Father', 'Business', '9176385306', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-18 06:05:07', '2024-12-18 06:05:07', 1),
(50, 31, 'Jothy', 'Father', 'Retired from Qatar Gas', '6374908023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-18 06:21:36', '2024-12-18 06:21:36', 1),
(51, 20, 'Thanigai', 'Others', 'Thirumana thagaval maiyyam', '9841384582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-18 07:38:49', '2024-12-18 07:38:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 1, '2024-09-08 13:04:34', '2024-09-08 13:04:34'),
(2, 'admin', 1, '2024-09-08 13:04:34', '2024-09-08 13:04:34'),
(3, 'user', 1, '2024-09-08 13:04:34', '2024-09-08 13:04:34'),
(4, 'member', 1, '2024-10-04 12:08:22', '2024-10-04 12:08:22'),
(5, 'Association Member', 1, '2024-10-04 13:08:20', '2024-10-04 13:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `name`, `path`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'app.main.dashboard', 'app.main.dashboard', 1, '2024-09-08 18:35:17', '2024-09-08 18:35:17'),
(2, 'app.users.list', 'app.users.list', 1, '2024-09-11 17:56:30', '2024-09-11 17:56:30'),
(3, 'app.users.add', 'app.users.add', 1, '2024-09-11 17:56:54', '2024-09-11 17:56:54'),
(4, 'app.users.save', 'app.users.save', 1, '2024-09-11 17:57:12', '2024-09-11 17:57:12'),
(5, 'app.users.edit', 'app.users.edit', 1, '2024-09-11 17:57:29', '2024-09-11 17:57:29'),
(6, 'app.users.update', 'app.users.update', 1, '2024-09-11 17:57:48', '2024-09-11 17:57:48'),
(7, 'app.users.status', 'app.users.status', 1, '2024-09-11 17:58:06', '2024-09-11 17:58:06'),
(8, 'app.users.userActivityList', 'app.users.userActivityList', 1, '2024-09-11 17:59:00', '2024-09-11 17:59:00'),
(9, 'app.users.userActivityView', 'app.users.userActivityView', 1, '2024-09-11 17:59:16', '2024-09-11 17:59:16'),
(10, 'app.roles.list', 'app.roles.list', 1, '2024-09-11 17:59:42', '2024-09-11 17:59:42'),
(11, 'app.roles.add', 'app.roles.add', 1, '2024-09-11 17:59:52', '2024-09-11 17:59:52'),
(12, 'app.roles.save', 'app.roles.save', 1, '2024-09-11 18:00:08', '2024-09-11 18:00:08'),
(13, 'app.roles.edit', 'app.roles.edit', 1, '2024-09-11 18:00:26', '2024-09-11 18:00:26'),
(14, 'app.roles.update', 'app.roles.update', 1, '2024-09-11 18:00:41', '2024-09-11 18:00:41'),
(15, 'app.roles.status', 'app.roles.status', 1, '2024-09-11 18:01:00', '2024-09-11 18:01:00'),
(16, 'app.routes.list', 'app.routes.list', 1, '2024-09-11 18:01:20', '2024-09-11 18:01:20'),
(17, 'app.routes.add', 'app.routes.add', 1, '2024-09-11 18:01:34', '2024-09-11 18:01:34'),
(18, 'app.routes.save', 'app.routes.save', 1, '2024-09-11 18:01:48', '2024-09-11 18:01:48'),
(19, 'app.routes.edit', 'app.routes.edit', 1, '2024-09-11 18:02:05', '2024-09-11 18:02:05'),
(20, 'app.routes.update', 'app.routes.update', 1, '2024-09-11 18:02:20', '2024-09-11 18:02:20'),
(21, 'app.routes.status', 'app.routes.status', 1, '2024-09-11 18:03:03', '2024-09-11 18:03:03'),
(22, 'app.routes.migrate', 'app.routes.migrate', 1, '2024-09-11 18:03:16', '2024-09-11 18:03:16'),
(23, 'app.main.maintenance', 'matrimony/maintenance', 1, '2024-09-11 12:51:50', '2024-09-11 12:51:50'),
(24, 'app.settings.list', 'settings/list', 1, '2024-09-11 12:51:50', '2024-09-11 12:51:50'),
(25, 'app.settings.add', 'settings/add', 1, '2024-09-11 12:51:50', '2024-09-11 12:51:50'),
(26, 'app.settings.save', 'settings/add', 1, '2024-09-11 12:51:50', '2024-09-11 12:51:50'),
(27, 'app.settings.edit', 'settings/edit/{id}', 1, '2024-09-11 12:51:50', '2024-09-11 12:51:50'),
(28, 'app.settings.update', 'settings/edit/{id}', 1, '2024-09-11 12:51:50', '2024-09-11 12:51:50'),
(29, 'app.settings.status', 'settings/status/{id}/{type}', 1, '2024-09-11 12:51:50', '2024-09-11 12:51:50'),
(30, 'app.users.search', 'app.users.search', 1, '2024-09-14 04:45:48', '2024-09-14 04:45:48'),
(31, 'app.roles.search', 'app.roles.search', 1, '2024-09-14 04:46:12', '2024-09-14 04:46:12'),
(32, 'app.routes.search', 'app.routes.search', 1, '2024-09-14 04:47:38', '2024-09-14 04:47:38'),
(33, 'app.v2.landing_page', 'v2/cc-support/landing', 1, '2024-09-14 04:49:34', '2024-09-14 04:49:34'),
(34, 'app.v2.main_summary', 'v2/cc-support/summary', 1, '2024-09-14 04:49:34', '2024-09-14 04:49:34'),
(35, 'app.v2.contact_page', 'contact', 1, '2024-09-16 10:48:45', '2024-09-16 10:48:45'),
(36, 'app.v2.about_page', 'about', 1, '2024-09-16 10:48:45', '2024-09-16 10:48:45'),
(37, 'app.settings.search', 'app.settings.search', 1, '2024-09-16 10:49:14', '2024-09-16 10:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `search_log`
--

CREATE TABLE `search_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `age` varchar(100) DEFAULT NULL,
  `age1` varchar(100) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `height2` varchar(255) DEFAULT NULL,
  `re_religion` varchar(100) DEFAULT NULL,
  `mother_tongue` varchar(100) DEFAULT NULL,
  `subcaste` varchar(100) DEFAULT NULL,
  `star` varchar(100) DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `income` varchar(100) DEFAULT NULL,
  `showprofilewith` varchar(100) DEFAULT NULL,
  `dontshow` varchar(100) DEFAULT NULL,
  `key_age` varchar(100) DEFAULT NULL,
  `key_age1` varchar(100) DEFAULT NULL,
  `key_height` varchar(100) DEFAULT NULL,
  `key_height1` varchar(100) DEFAULT NULL,
  `key_word` varchar(100) DEFAULT NULL,
  `key_showprofilewith` varchar(100) DEFAULT NULL,
  `key_dontshow` varchar(100) DEFAULT NULL,
  `matrimony_id` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `search_log`
--

INSERT INTO `search_log` (`id`, `member_id`, `age`, `age1`, `height`, `height2`, `re_religion`, `mother_tongue`, `subcaste`, `star`, `education`, `income`, `showprofilewith`, `dontshow`, `key_age`, `key_age1`, `key_height`, `key_height1`, `key_word`, `key_showprofilewith`, `key_dontshow`, `matrimony_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 5, '5', NULL, '6', NULL, 'Hindu', 'Malayalam', '4', '1,3', '2,3,4', '30,000-60,000', NULL, NULL, NULL, NULL, NULL, NULL, 'Thoothukudi', NULL, NULL, '3', 1, '2024-12-06 06:29:53', '2025-01-04 07:25:01'),
(2, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tenkasi', NULL, NULL, '1', 1, '2024-12-06 09:26:00', '2024-12-06 09:32:57'),
(3, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'infosys', NULL, NULL, NULL, 1, '2024-12-06 11:00:40', '2024-12-06 11:00:40'),
(4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, '9', 1, '2024-12-09 05:06:25', '2025-01-08 06:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stars`
--

CREATE TABLE `stars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `raasi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stars`
--

INSERT INTO `stars` (`id`, `raasi_id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ashwini', 1, NULL, NULL),
(2, 1, 'Bharani', 1, NULL, NULL),
(3, 1, 'Kruthika (I Padha)', 1, NULL, NULL),
(4, 2, 'Kruthika (II Padha)', 1, NULL, NULL),
(5, 2, 'Kruthika (III Padha)', 1, NULL, NULL),
(6, 2, 'Kruthika (IV  Padha)', 1, NULL, NULL),
(7, 2, 'Rohini', 1, NULL, NULL),
(8, 2, 'Mrugaseersham (I Padha)', 1, NULL, NULL),
(9, 2, 'Mrugaseersham (II Padha)', 1, NULL, NULL),
(10, 3, 'Mrugaseersham (III  Padha)', 1, NULL, NULL),
(11, 3, 'Mrugaseersham ( IV Padha)', 1, NULL, NULL),
(12, 3, 'Thiruvathirai', 1, NULL, NULL),
(13, 3, 'Punarpoosam (I Padha)', 1, NULL, NULL),
(14, 3, 'Punarpoosam ( II Padha)', 1, NULL, NULL),
(15, 3, 'Punarpoosam ( III Padha)', 1, NULL, NULL),
(16, 4, 'Punarpoosam (IV Padha)', 1, NULL, NULL),
(17, 4, 'Pusam', 1, NULL, NULL),
(18, 4, 'Aayilyam', 1, NULL, NULL),
(19, 5, 'Makam', 1, NULL, NULL),
(20, 5, 'Puram', 1, NULL, NULL),
(21, 5, 'Uthram (I Padha)', 1, NULL, NULL),
(22, 6, 'Uthram (II Padha)', 1, NULL, NULL),
(23, 6, 'Uthram (III Padha)', 1, NULL, NULL),
(24, 6, 'Uthram (IV Padha)', 1, NULL, NULL),
(25, 6, 'Hastham', 1, NULL, NULL),
(26, 6, 'Chithra  (I Padha)', 1, NULL, NULL),
(27, 6, 'Chithra (II Padha)', 1, NULL, NULL),
(28, 7, 'Chithra (III Padha)', 1, NULL, NULL),
(29, 7, 'Chithra (IV Padha)', 1, NULL, NULL),
(30, 7, 'Swathi', 1, NULL, NULL),
(31, 7, 'Visakam (I Padha)', 1, NULL, NULL),
(32, 7, 'Visakam (II Padha)', 1, NULL, NULL),
(33, 7, 'Visakam (III Padha)', 1, NULL, NULL),
(34, 8, 'Visakam (IV Padha)', 1, NULL, NULL),
(35, 8, 'Anusham', 1, NULL, NULL),
(36, 8, 'Kettai', 1, NULL, NULL),
(37, 9, 'Moolam', 1, NULL, NULL),
(38, 9, 'Pooradam', 1, NULL, NULL),
(39, 9, 'Uthradam  (I Padha)', 1, NULL, NULL),
(40, 10, 'Uthradam  (II Padha)', 1, NULL, NULL),
(41, 10, 'Uthradam  (III Padha)', 1, NULL, NULL),
(42, 10, 'Uthradam  (IV Padha)', 1, NULL, NULL),
(43, 10, 'Thiruvonam', 1, NULL, NULL),
(44, 10, 'Avittam (I Padha)', 1, NULL, NULL),
(45, 10, 'Avittam (II Padha)', 1, NULL, NULL),
(46, 11, 'Avittam (III Padha)', 1, NULL, NULL),
(47, 11, 'Avittam (IV Padha)', 1, NULL, NULL),
(48, 11, 'Sadayam', 1, NULL, NULL),
(49, 11, 'Poorattathi (I Padha)', 1, NULL, NULL),
(50, 11, 'Poorattathi (II Padha)', 1, NULL, NULL),
(51, 11, 'Poorattathi (III Padha)', 1, NULL, NULL),
(52, 12, 'Poorattathi  (IV Padha)', 1, NULL, NULL),
(53, 12, 'Uthirattathi', 1, NULL, NULL),
(54, 12, 'Revati', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'TamilNadu', 1, NULL, NULL),
(2, 'Kerala', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_amounts`
--

CREATE TABLE `subscription_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `expiry_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `talukas`
--

CREATE TABLE `talukas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `talukas`
--

INSERT INTO `talukas` (`id`, `state_id`, `city_id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Ariyalur', 1, NULL, NULL),
(2, 1, 1, 'Udayarpalayam', 1, NULL, NULL),
(3, 1, 1, 'Andimadam', 1, NULL, NULL),
(4, 1, 1, 'Sendurai', 1, NULL, NULL),
(5, 1, 34, 'Pallavaram', 1, NULL, NULL),
(6, 1, 34, 'Tambaram', 1, NULL, NULL),
(7, 1, 34, 'Vandalur', 1, NULL, NULL),
(8, 1, 34, 'Chengalpattu', 1, NULL, NULL),
(9, 1, 34, 'Tiruporur', 1, NULL, NULL),
(10, 1, 34, 'Tirukalukundram', 1, NULL, NULL),
(11, 1, 34, 'Maduranthakam', 1, NULL, NULL),
(12, 1, 34, 'Cheyyur', 1, NULL, NULL),
(13, 1, 2, 'Tondiarpet', 1, NULL, NULL),
(14, 1, 2, 'Tiruvottiyur', 1, NULL, NULL),
(15, 1, 2, 'Perambur', 1, NULL, NULL),
(16, 1, 2, 'Madhavaram', 1, NULL, NULL),
(17, 1, 2, 'Purasawalkam', 1, NULL, NULL),
(18, 1, 2, 'Ambattur', 1, NULL, NULL),
(19, 1, 2, 'Ayanavaram', 1, NULL, NULL),
(20, 1, 2, 'Egmore', 1, NULL, NULL),
(21, 1, 2, 'Aminjikarai', 1, NULL, NULL),
(22, 1, 2, 'Mambalam', 1, NULL, NULL),
(23, 1, 2, 'Maduravoyal', 1, NULL, NULL),
(24, 1, 2, 'Guindy', 1, NULL, NULL),
(25, 1, 2, 'Alandur', 1, NULL, NULL),
(26, 1, 2, 'Sholinganallur', 1, NULL, NULL),
(27, 1, 2, 'Mylapore', 1, NULL, NULL),
(28, 1, 2, 'Velachery', 1, NULL, NULL),
(29, 1, 3, 'Mettupalayam', 1, NULL, NULL),
(30, 1, 3, 'Coimbatore North', 1, NULL, NULL),
(31, 1, 3, 'Annur', 1, NULL, NULL),
(32, 1, 3, 'Coimbatore South', 1, NULL, NULL),
(33, 1, 3, 'Perur', 1, NULL, NULL),
(34, 1, 3, 'Madukkarai', 1, NULL, NULL),
(35, 1, 3, 'Sulur', 1, NULL, NULL),
(36, 1, 3, 'Pollachi', 1, NULL, NULL),
(37, 1, 3, 'Kinathukadau', 1, NULL, NULL),
(38, 1, 3, 'Valparai', 1, NULL, NULL),
(39, 1, 3, 'Anaimalai', 1, NULL, NULL),
(40, 1, 4, 'Panruti', 1, NULL, NULL),
(41, 1, 4, 'Cuddalore', 1, NULL, NULL),
(42, 1, 4, 'Kurinjipadi', 1, NULL, NULL),
(43, 1, 4, 'Chidambaram', 1, NULL, NULL),
(44, 1, 4, 'Kattumannarkoil', 1, NULL, NULL),
(45, 1, 4, 'Bhuvanagiri', 1, NULL, NULL),
(46, 1, 4, 'Srimushanam', 1, NULL, NULL),
(47, 1, 4, 'Vridachalam', 1, NULL, NULL),
(48, 1, 4, 'Titakudi', 1, NULL, NULL),
(49, 1, 4, 'Vepur', 1, NULL, NULL),
(50, 1, 5, 'Harur', 1, NULL, NULL),
(51, 1, 5, 'Pappireddipatti', 1, NULL, NULL),
(52, 1, 5, 'Dharmapuri', 1, NULL, NULL),
(53, 1, 5, 'Palacode', 1, NULL, NULL),
(54, 1, 5, 'Pennagaram', 1, NULL, NULL),
(55, 1, 5, 'Nallampalli', 1, NULL, NULL),
(56, 1, 5, 'Karimangalam', 1, NULL, NULL),
(57, 1, 6, 'Dindigul East', 1, NULL, NULL),
(58, 1, 6, 'Dindigul West', 1, NULL, NULL),
(59, 1, 6, 'Natham', 1, NULL, NULL),
(60, 1, 6, 'Attur', 1, NULL, NULL),
(61, 1, 6, 'Nilakottai', 1, NULL, NULL),
(62, 1, 6, 'Palani', 1, NULL, NULL),
(63, 1, 6, 'Oddanchatram', 1, NULL, NULL),
(64, 1, 6, 'Vedasandur', 1, NULL, NULL),
(65, 1, 6, 'Gujiliamparai', 1, NULL, NULL),
(66, 1, 6, 'Kodaikanal', 1, NULL, NULL),
(67, 1, 7, 'Erode', 1, NULL, NULL),
(68, 1, 7, 'Perundurai', 1, NULL, NULL),
(69, 1, 7, 'Modakkurichi', 1, NULL, NULL),
(70, 1, 7, 'Kodumudi', 1, NULL, NULL),
(71, 1, 7, 'Gobichettipalayam', 1, NULL, NULL),
(72, 1, 7, 'Sathyamangalam', 1, NULL, NULL),
(73, 1, 7, 'Bhavani', 1, NULL, NULL),
(74, 1, 7, 'Anthiyur', 1, NULL, NULL),
(75, 1, 7, 'Thalavadi', 1, NULL, NULL),
(76, 1, 7, 'Nambiyur', 1, NULL, NULL),
(77, 1, 33, 'Tirukoilur', 1, NULL, NULL),
(78, 1, 33, 'Ulundurpet', 1, NULL, NULL),
(79, 1, 33, 'Kallakkurichi', 1, NULL, NULL),
(80, 1, 33, 'Sankarapuram', 1, NULL, NULL),
(81, 1, 33, 'Chinnasalem', 1, NULL, NULL),
(82, 1, 33, 'Kalvarayan Malai', 1, NULL, NULL),
(83, 1, 8, 'Kancheepuram', 1, NULL, NULL),
(84, 1, 8, 'Walajabad', 1, NULL, NULL),
(85, 1, 8, 'Uthiramerur', 1, NULL, NULL),
(86, 1, 8, 'Sriperumbudur', 1, NULL, NULL),
(87, 1, 8, 'Kundrathur', 1, NULL, NULL),
(88, 1, 9, 'Agasteeswaram', 1, NULL, NULL),
(89, 1, 9, 'Thovalai', 1, NULL, NULL),
(90, 1, 9, 'Kalkulam', 1, NULL, NULL),
(91, 1, 9, 'Vilavancode', 1, NULL, NULL),
(92, 1, 9, 'Tiruvattar', 1, NULL, NULL),
(93, 1, 9, 'Killiyur', 1, NULL, NULL),
(94, 1, 10, 'Karur', 1, NULL, NULL),
(95, 1, 10, 'Aravakurichi', 1, NULL, NULL),
(96, 1, 10, 'Pugalur', 1, NULL, NULL),
(97, 1, 10, 'Manmangalam', 1, NULL, NULL),
(98, 1, 10, 'Kulithalai', 1, NULL, NULL),
(99, 1, 10, 'Krishnarayapuram', 1, NULL, NULL),
(100, 1, 10, 'Kadavur', 1, NULL, NULL),
(101, 1, 11, 'Krishnagiri', 1, NULL, NULL),
(102, 1, 11, 'Pochampalli', 1, NULL, NULL),
(103, 1, 11, 'Uthangarai', 1, NULL, NULL),
(104, 1, 11, 'Bargur', 1, NULL, NULL),
(105, 1, 11, 'Hosur', 1, NULL, NULL),
(106, 1, 11, 'Denkanikottai', 1, NULL, NULL),
(107, 1, 11, 'Shoolagiri', 1, NULL, NULL),
(108, 1, 11, 'Anchetty', 1, NULL, NULL),
(109, 1, 12, 'Madurai North', 1, NULL, NULL),
(110, 1, 12, 'Madurai West', 1, NULL, NULL),
(111, 1, 12, 'Vadipatti', 1, NULL, NULL),
(112, 1, 12, 'Usilampatti', 1, NULL, NULL),
(113, 1, 12, 'Peraiyur', 1, NULL, NULL),
(114, 1, 12, 'Melur', 1, NULL, NULL),
(115, 1, 12, 'Madurai East', 1, NULL, NULL),
(116, 1, 12, 'Madurai South', 1, NULL, NULL),
(117, 1, 12, 'Tirumangalam', 1, NULL, NULL),
(118, 1, 12, 'Tirupparnakundram', 1, NULL, NULL),
(119, 1, 12, 'Kallikudi', 1, NULL, NULL),
(120, 1, 51, 'Mayiladuthurai', 1, NULL, NULL),
(121, 1, 51, 'Sirkali', 1, NULL, NULL),
(122, 1, 51, 'Kutthalam', 1, NULL, NULL),
(123, 1, 51, 'Tharangambadi', 1, NULL, NULL),
(124, 1, 13, 'Nagapattinam', 1, NULL, NULL),
(125, 1, 13, 'Kilvelur', 1, NULL, NULL),
(126, 1, 13, 'Tirukkuvalai', 1, NULL, NULL),
(127, 1, 13, 'Vedaranyam', 1, NULL, NULL),
(128, 1, 14, 'Namakkal', 1, NULL, NULL),
(129, 1, 14, 'Rasipuram', 1, NULL, NULL),
(130, 1, 14, 'Senthamangalam', 1, NULL, NULL),
(131, 1, 14, 'Kollimalai', 1, NULL, NULL),
(132, 1, 14, 'Mohanur', 1, NULL, NULL),
(133, 1, 14, 'Paramathi Velur', 1, NULL, NULL),
(134, 1, 14, 'Thiruchengode', 1, NULL, NULL),
(135, 1, 14, 'Kumarapalayam', 1, NULL, NULL),
(136, 1, 16, 'Perambalur', 1, NULL, NULL),
(137, 1, 16, 'Alathur', 1, NULL, NULL),
(138, 1, 16, 'Veppanthattai', 1, NULL, NULL),
(139, 1, 16, 'Kunnam', 1, NULL, NULL),
(140, 1, 17, 'Pudukkottai', 1, NULL, NULL),
(141, 1, 17, 'Alangudi', 1, NULL, NULL),
(142, 1, 17, 'Gandarvakottai', 1, NULL, NULL),
(143, 1, 17, 'Tirumayam', 1, NULL, NULL),
(144, 1, 17, 'Karambakkudi', 1, NULL, NULL),
(145, 1, 17, 'Illuppur', 1, NULL, NULL),
(146, 1, 17, 'Kulathur', 1, NULL, NULL),
(147, 1, 17, 'Ponnamaravathi', 1, NULL, NULL),
(148, 1, 17, 'Viralimalai', 1, NULL, NULL),
(149, 1, 17, 'Aranthangi', 1, NULL, NULL),
(150, 1, 17, 'Avadaiyarkoil', 1, NULL, NULL),
(151, 1, 17, 'Manamelkudi', 1, NULL, NULL),
(152, 1, 18, 'Ramanathapuram', 1, NULL, NULL),
(153, 1, 18, 'Tiruvadanai', 1, NULL, NULL),
(154, 1, 18, 'Rameswaram', 1, NULL, NULL),
(155, 1, 18, 'Kilakarai', 1, NULL, NULL),
(156, 1, 18, 'Rajasingamangalam', 1, NULL, NULL),
(157, 1, 18, 'Paramakudi', 1, NULL, NULL),
(158, 1, 18, 'Kadaladi', 1, NULL, NULL),
(159, 1, 18, 'Mudukulathur', 1, NULL, NULL),
(160, 1, 18, 'Kamuthi', 1, NULL, NULL),
(161, 1, 35, 'Walajah', 1, NULL, NULL),
(162, 1, 35, 'Arcot', 1, NULL, NULL),
(163, 1, 35, 'Kalavai', 1, NULL, NULL),
(164, 1, 35, 'Sholinghur', 1, NULL, NULL),
(165, 1, 35, 'Arakkonam', 1, NULL, NULL),
(166, 1, 35, 'Nemili', 1, NULL, NULL),
(167, 1, 19, 'Salem', 1, NULL, NULL),
(168, 1, 19, 'Salem West', 1, NULL, NULL),
(169, 1, 19, 'Salem South', 1, NULL, NULL),
(170, 1, 19, 'Yercaud', 1, NULL, NULL),
(171, 1, 19, 'Valapady', 1, NULL, NULL),
(172, 1, 19, 'Attur', 1, NULL, NULL),
(173, 1, 19, 'Gangavalli', 1, NULL, NULL),
(174, 1, 19, 'Pethanaickenpalayam', 1, NULL, NULL),
(175, 1, 19, 'Mettur', 1, NULL, NULL),
(176, 1, 19, 'Omalur', 1, NULL, NULL),
(177, 1, 19, 'Kadayampatti', 1, NULL, NULL),
(178, 1, 19, 'Sankari', 1, NULL, NULL),
(179, 1, 19, 'Edappadi', 1, NULL, NULL),
(180, 1, 20, 'Sivaganga', 1, NULL, NULL),
(181, 1, 20, 'Ilayangudi', 1, NULL, NULL),
(182, 1, 20, 'Kalayarkovil', 1, NULL, NULL),
(183, 1, 20, 'Manamadurai', 1, NULL, NULL),
(184, 1, 20, 'Tiruppuvanam', 1, NULL, NULL),
(185, 1, 20, 'Devakottai', 1, NULL, NULL),
(186, 1, 20, 'Tirupathur', 1, NULL, NULL),
(187, 1, 20, 'Karaikudi', 1, NULL, NULL),
(188, 1, 20, 'Sigampunari', 1, NULL, NULL),
(189, 1, 21, 'Thanjavur', 1, NULL, NULL),
(190, 1, 21, 'Thiruvaiyaru', 1, NULL, NULL),
(191, 1, 21, 'Budalur', 1, NULL, NULL),
(192, 1, 21, 'Orathanadu', 1, NULL, NULL),
(193, 1, 21, 'Kumbakonam', 1, NULL, NULL),
(194, 1, 21, 'Papanasam', 1, NULL, NULL),
(195, 1, 21, 'Tiruvidaimarudur', 1, NULL, NULL),
(196, 1, 21, 'Pattukkottai', 1, NULL, NULL),
(197, 1, 21, 'Peravurani', 1, NULL, NULL),
(198, 1, 15, 'Kotagiri', 1, NULL, NULL),
(199, 1, 15, 'Coonoor', 1, NULL, NULL),
(200, 1, 15, 'Kundah', 1, NULL, NULL),
(201, 1, 15, 'Udhagamandalam', 1, NULL, NULL),
(202, 1, 15, 'Gudalur', 1, NULL, NULL),
(203, 1, 15, 'Panthalur', 1, NULL, NULL),
(204, 1, 37, 'Tenkasi', 1, NULL, NULL),
(205, 1, 37, 'kadayanallur', 1, NULL, NULL),
(206, 1, 37, 'Shenkottai', 1, NULL, NULL),
(207, 1, 37, 'Alangulam', 1, NULL, NULL),
(208, 1, 37, 'Veerakeralamputhur', 1, NULL, NULL),
(209, 1, 37, 'Sankarankovil', 1, NULL, NULL),
(210, 1, 37, 'Thiruvengadam', 1, NULL, NULL),
(211, 1, 37, 'Sivagiri', 1, NULL, NULL),
(212, 1, 22, 'Periyakulam', 1, NULL, NULL),
(213, 1, 22, 'Theni', 1, NULL, NULL),
(214, 1, 22, 'Andipatti', 1, NULL, NULL),
(215, 1, 22, 'Uthamapalayam', 1, NULL, NULL),
(216, 1, 22, 'Bodinayakanur', 1, NULL, NULL),
(217, 1, 24, 'Tiruchirappalli West', 1, NULL, NULL),
(218, 1, 24, 'Tiruchirappalli East', 1, NULL, NULL),
(219, 1, 24, 'Tiruverumbur', 1, NULL, NULL),
(220, 1, 24, 'Srirangam', 1, NULL, NULL),
(221, 1, 24, 'Manapparai', 1, NULL, NULL),
(222, 1, 24, 'Marungapuri', 1, NULL, NULL),
(223, 1, 24, 'Musiri', 1, NULL, NULL),
(224, 1, 24, 'Thuraiyur', 1, NULL, NULL),
(225, 1, 24, 'Thottiyam', 1, NULL, NULL),
(226, 1, 24, 'Lalgudi', 1, NULL, NULL),
(227, 1, 24, 'Manachanallur', 1, NULL, NULL),
(228, 1, 25, 'Tirunelveli', 1, NULL, NULL),
(229, 1, 25, 'Manur', 1, NULL, NULL),
(230, 1, 25, 'Palayamkottai', 1, NULL, NULL),
(231, 1, 25, 'Cheranmahadevi', 1, NULL, NULL),
(232, 1, 25, 'Ambasamuduram', 1, NULL, NULL),
(233, 1, 25, 'Tisaiyanvilai', 1, NULL, NULL),
(234, 1, 25, 'Nanguneri', 1, NULL, NULL),
(235, 1, 25, 'Radhapuram', 1, NULL, NULL),
(236, 1, 36, 'Natrampalli', 1, NULL, NULL),
(237, 1, 36, 'Tirupattur', 1, NULL, NULL),
(238, 1, 36, 'Ambur', 1, NULL, NULL),
(239, 1, 36, 'Vaniyambadi', 1, NULL, NULL),
(240, 1, 26, 'Tiruppur North', 1, NULL, NULL),
(241, 1, 26, 'Tiruppur South', 1, NULL, NULL),
(242, 1, 26, 'Avinashi', 1, NULL, NULL),
(243, 1, 26, 'Uthukuli', 1, NULL, NULL),
(244, 1, 26, 'Palladam', 1, NULL, NULL),
(245, 1, 26, 'Dharapuram', 1, NULL, NULL),
(246, 1, 26, 'Kangayam', 1, NULL, NULL),
(247, 1, 26, 'Udumalaipettai', 1, NULL, NULL),
(248, 1, 26, 'Madathukulam', 1, NULL, NULL),
(249, 1, 27, 'Avadi', 1, NULL, NULL),
(250, 1, 27, 'Poonamallee', 1, NULL, NULL),
(251, 1, 27, 'Tiruvallur', 1, NULL, NULL),
(252, 1, 27, 'Uthukottai', 1, NULL, NULL),
(253, 1, 27, 'Ponneri', 1, NULL, NULL),
(254, 1, 27, 'Gummidipoondi', 1, NULL, NULL),
(255, 1, 27, 'Tiruttani', 1, NULL, NULL),
(256, 1, 27, 'Pallipattu', 1, NULL, NULL),
(257, 1, 27, 'RK Pet', 1, NULL, NULL),
(258, 1, 28, 'Tiruvannamalai', 1, NULL, NULL),
(259, 1, 28, 'Chengam', 1, NULL, NULL),
(260, 1, 28, 'Thandarampattu', 1, NULL, NULL),
(261, 1, 28, 'Kilpennathur', 1, NULL, NULL),
(262, 1, 28, 'Arani', 1, NULL, NULL),
(263, 1, 28, 'Polur', 1, NULL, NULL),
(264, 1, 28, 'Kalasapakkam', 1, NULL, NULL),
(265, 1, 28, 'Jamunamarathur', 1, NULL, NULL),
(266, 1, 28, 'Cheyyar', 1, NULL, NULL),
(267, 1, 28, 'Vandavasi', 1, NULL, NULL),
(268, 1, 28, 'Chettupattu', 1, NULL, NULL),
(269, 1, 28, 'Vembakkam', 1, NULL, NULL),
(270, 1, 29, 'Tiruvarur', 1, NULL, NULL),
(271, 1, 29, 'Kudavasal', 1, NULL, NULL),
(272, 1, 29, 'Nannilam', 1, NULL, NULL),
(273, 1, 29, 'Valangaiman', 1, NULL, NULL),
(274, 1, 29, 'Needamangalam', 1, NULL, NULL),
(275, 1, 29, 'Tiruthuraipoondi', 1, NULL, NULL),
(276, 1, 29, 'Mannargudi', 1, NULL, NULL),
(277, 1, 29, 'Koothanallur', 1, NULL, NULL),
(278, 1, 23, 'Thoothukudi', 1, NULL, NULL),
(279, 1, 23, 'Tiruvaikuntam', 1, NULL, NULL),
(280, 1, 23, 'Kovilpatti', 1, NULL, NULL),
(281, 1, 23, 'Ottapidaram', 1, NULL, NULL),
(282, 1, 23, 'Ettayapuram', 1, NULL, NULL),
(283, 1, 23, 'Vilathikulam', 1, NULL, NULL),
(284, 1, 23, 'Kayathar', 1, NULL, NULL),
(285, 1, 23, 'Tiruchendur', 1, NULL, NULL),
(286, 1, 23, 'Sathankulam', 1, NULL, NULL),
(287, 1, 23, 'Eral', 1, NULL, NULL),
(288, 1, 30, 'Vellore', 1, NULL, NULL),
(289, 1, 30, 'Anaicut', 1, NULL, NULL),
(290, 1, 30, 'Katpadi', 1, NULL, NULL),
(291, 1, 30, 'Gudiyatham', 1, NULL, NULL),
(292, 1, 30, 'Peranambattu', 1, NULL, NULL),
(293, 1, 30, 'K V Kuppam', 1, NULL, NULL),
(294, 1, 31, 'Villupuram', 1, NULL, NULL),
(295, 1, 31, 'Vanur', 1, NULL, NULL),
(296, 1, 31, 'Vikkiravandi', 1, NULL, NULL),
(297, 1, 31, 'Tiruvennainallur', 1, NULL, NULL),
(298, 1, 31, 'Kandachipuram', 1, NULL, NULL),
(299, 1, 31, 'Thindivanam', 1, NULL, NULL),
(300, 1, 31, 'Gingee', 1, NULL, NULL),
(301, 1, 31, 'Marakkanam', 1, NULL, NULL),
(302, 1, 31, 'Melmalaianur', 1, NULL, NULL),
(303, 1, 32, 'Virudhunagar', 1, NULL, NULL),
(304, 1, 32, 'Arupukottai', 1, NULL, NULL),
(305, 1, 32, 'Kariapatti', 1, NULL, NULL),
(306, 1, 32, 'Tiruchuli', 1, NULL, NULL),
(307, 1, 32, 'Sivakasi', 1, NULL, NULL),
(308, 1, 32, 'Srivilliputhur', 1, NULL, NULL),
(309, 1, 32, 'Watrap', 1, NULL, NULL),
(310, 1, 32, 'Sattur', 1, NULL, NULL),
(311, 1, 32, 'Vembakkottai', 1, NULL, NULL),
(312, 1, 32, 'Rajapalayam', 1, NULL, NULL),
(313, 2, 49, 'Neyyattinkara', 1, NULL, NULL),
(314, 2, 49, 'Kattakkada', 1, NULL, NULL),
(315, 2, 49, 'Nedumangadu', 1, NULL, NULL),
(316, 2, 49, 'Thiruvananthapuram', 1, NULL, NULL),
(317, 2, 49, 'Chirayinkeezhu', 1, NULL, NULL),
(318, 2, 49, 'Varkala', 1, NULL, NULL),
(319, 2, 43, 'Kollam', 1, NULL, NULL),
(320, 2, 43, 'Kunnathoor', 1, NULL, NULL),
(321, 2, 43, 'Karunagappally', 1, NULL, NULL),
(322, 2, 43, 'Kottarakkara', 1, NULL, NULL),
(323, 2, 43, 'Punalur', 1, NULL, NULL),
(324, 2, 43, 'Pathanapuram', 1, NULL, NULL),
(325, 2, 48, 'Adoor', 1, NULL, NULL),
(326, 2, 48, 'Konni', 1, NULL, NULL),
(327, 2, 48, 'Kozhencherry ', 1, NULL, NULL),
(328, 2, 48, 'Ranni', 1, NULL, NULL),
(329, 2, 48, 'Mallappally', 1, NULL, NULL),
(330, 2, 48, 'Thiruvalla', 1, NULL, NULL),
(331, 2, 38, 'Chenganoor', 1, NULL, NULL),
(332, 2, 38, 'Mavelikkara', 1, NULL, NULL),
(333, 2, 38, 'Karthikappally', 1, NULL, NULL),
(334, 2, 38, 'Kuttanad', 1, NULL, NULL),
(335, 2, 38, '	Ambalappuzha', 1, NULL, NULL),
(336, 2, 38, 'Cherthala', 1, NULL, NULL),
(337, 2, 44, 'Changanasserry', 1, NULL, NULL),
(338, 2, 44, 'Kottayam', 1, NULL, NULL),
(339, 2, 44, 'Vaikom', 1, NULL, NULL),
(340, 2, 44, 'Meenachil', 1, NULL, NULL),
(341, 2, 44, 'Kanjirappally', 1, NULL, NULL),
(342, 2, 40, 'Peermade', 1, NULL, NULL),
(343, 2, 40, 'Udumbanchola ', 1, NULL, NULL),
(344, 2, 40, 'Idukki', 1, NULL, NULL),
(345, 2, 40, 'Thodupuzha', 1, NULL, NULL),
(346, 2, 40, 'Devikulam', 1, NULL, NULL),
(347, 2, 39, 'Kothamangalam', 1, NULL, NULL),
(348, 2, 39, 'Muvattupuzha', 1, NULL, NULL),
(349, 2, 39, 'Kunnathunad', 1, NULL, NULL),
(350, 2, 39, 'Kanayannur', 1, NULL, NULL),
(351, 2, 39, 'Kochi', 1, NULL, NULL),
(352, 2, 39, 'North Paravur', 1, NULL, NULL),
(353, 2, 39, 'Aluva', 1, NULL, NULL),
(354, 2, 50, 'Chalakudy', 1, NULL, NULL),
(355, 2, 50, 'Mukundapuram', 1, NULL, NULL),
(356, 2, 50, 'Kodungallur', 1, NULL, NULL),
(357, 2, 50, 'Thrissur', 1, NULL, NULL),
(358, 2, 50, 'Chavakkad', 1, NULL, NULL),
(359, 2, 50, 'Kunnamkulam', 1, NULL, NULL),
(360, 2, 50, 'Thalapilly', 1, NULL, NULL),
(361, 2, 47, 'Alathoor', 1, NULL, NULL),
(362, 2, 47, 'Chittur', 1, NULL, NULL),
(363, 2, 47, 'Palakkad', 1, NULL, NULL),
(364, 2, 47, 'Pattambi', 1, NULL, NULL),
(365, 2, 47, 'Ottappalam', 1, NULL, NULL),
(366, 2, 47, 'Mannarkkad', 1, NULL, NULL),
(367, 2, 46, 'Perinthalmanna', 1, NULL, NULL),
(368, 2, 46, 'Nilambur', 1, NULL, NULL),
(369, 2, 46, 'Eranad', 1, NULL, NULL),
(370, 2, 46, 'Kondotty', 1, NULL, NULL),
(371, 2, 46, 'Ponnani', 1, NULL, NULL),
(372, 2, 46, 'Tirur', 1, NULL, NULL),
(373, 2, 46, 'Tirurangadi', 1, NULL, NULL),
(374, 2, 45, 'Kozhikode', 1, NULL, NULL),
(375, 2, 45, 'Thamarassery', 1, NULL, NULL),
(376, 2, 45, 'Koyilandy', 1, NULL, NULL),
(377, 2, 45, 'Vatakara', 1, NULL, NULL),
(378, 2, 51, 'Vythiri ', 1, NULL, NULL),
(379, 2, 51, 'Sulthan Bathery', 1, NULL, NULL),
(380, 2, 51, 'Mananthavady', 1, NULL, NULL),
(381, 2, 41, 'Thalassery ', 1, NULL, NULL),
(382, 2, 41, 'Iritty ', 1, NULL, NULL),
(383, 2, 41, 'Kannur ', 1, NULL, NULL),
(384, 2, 41, 'Taliparamba ', 1, NULL, NULL),
(385, 2, 41, 'Payyannur ', 1, NULL, NULL),
(386, 2, 42, 'Hosdurg ', 1, NULL, NULL),
(387, 2, 42, 'Vellarikundu ', 1, NULL, NULL),
(388, 2, 42, 'Kasaragod ', 1, NULL, NULL),
(389, 2, 42, 'Manjeswaram (Uppala) ', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_logs`
--

CREATE TABLE `transaction_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `signature_hash` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `response_message` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upload_files`
--

CREATE TABLE `upload_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `file_size` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `last_login` datetime DEFAULT NULL,
  `failed_attempts` int(11) DEFAULT 0,
  `password_expired` tinyint(1) DEFAULT 0,
  `last_failed_attempt` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `username`, `email`, `mobile_number`, `email_verified_at`, `password`, `is_active`, `last_login`, `failed_attempts`, `password_expired`, `last_failed_attempt`, `remember_token`, `api_token`, `otp`, `created_at`, `updated_at`) VALUES
(1, 4, 'NARESH', NULL, 'naresh@gmail.com', NULL, NULL, '$2y$12$pACGJ11noiwbpO21RqkiZenzFrOe.UOS3nGuu8aX4TdDg/cKqbcF2', 1, '2026-02-10 05:52:03', 0, 0, '2026-02-03 04:30:01', 'GxPRTvYQqhq76X8kr4v3wW0UIkW1lg2YHuWBnPKOIFcasAsoRnpG2LjU0Yk8', NULL, NULL, '2024-12-03 10:27:34', '2026-02-10 00:22:03'),
(2, 4, 'MUTHU GANESH', NULL, 'muthuganesh@gmail.com', NULL, NULL, '$2y$12$rHptdsb8IWvj4mKXrYJ8OuEjedPPophZzJUuSgZQfPqDUsHKLA0MW', 0, '2024-12-13 07:48:13', 0, 0, NULL, NULL, NULL, NULL, '2024-12-03 22:55:38', '2026-02-04 06:53:23'),
(3, 4, 'PRAVEENKUMAR', NULL, 'praveen@gmail.com', NULL, NULL, '$2y$12$BRN82dY/6QaWIMASRmkpbuAPe8cNC/ELCOcRzWCgzDW/5gZGbzBCi', 1, '2024-12-13 07:52:37', 0, 0, NULL, NULL, NULL, NULL, '2024-12-03 23:53:56', '2024-12-13 07:52:37'),
(4, 4, 'MANOJ KUMAR', NULL, 'Manojkumar@gmail.com', NULL, NULL, '$2y$12$5Eb6MQ1U2AUdgWx2zvO6yOmhwPNI3dxC6V0bZsfU97.yKBPRyB2Pu', 1, '2024-12-13 08:00:30', 0, 0, NULL, NULL, NULL, NULL, '2024-12-04 00:34:25', '2024-12-13 08:00:30'),
(5, 4, 'PIRIMATHI', NULL, 'piraimathi@brokenglass.co.in', NULL, NULL, '$2y$12$BomB7yursKRpSWHiHsnjru3jCF8clH5RVNcaqleO/XU.9/KtCrlvW', 1, '2026-02-03 10:01:13', 0, 0, '2026-02-03 00:58:21', NULL, NULL, NULL, '2024-12-06 05:15:32', '2026-02-03 04:31:13'),
(6, 4, 'GUNASEKAR', NULL, 'Gunasekar123@gmail.com', NULL, NULL, '$2y$12$/IszIMwgcDjPX.YDWC58Mu9u93e88vnEDKXRB31rxrIMduNchHEuW', 1, '2024-12-13 09:46:33', 0, 0, '2024-12-06 09:40:24', NULL, NULL, NULL, '2024-12-06 07:42:25', '2024-12-13 09:46:33'),
(7, 4, 'LINGESHWEAR M.S', NULL, 'lingeshwear@gmail.com', NULL, NULL, '$2y$12$EOzSTD1KlVfZcEKCG9Mcf.9/rv/xkBMlsXtGEFYTXg7yYWwcENuc.', 1, '2024-12-13 10:14:33', 0, 0, NULL, NULL, NULL, NULL, '2024-12-06 08:43:13', '2024-12-13 10:14:33'),
(8, 4, 'SWETHA A', NULL, 'swetha123@gmail.com', NULL, NULL, '$2y$12$EgRc1pKc40SGP6.fIUg4zeQszgKxP5CZ7rDPMq9FJ/ddNWeD1QBxO', 1, '2024-12-13 10:16:08', 0, 0, NULL, NULL, NULL, NULL, '2024-12-06 09:54:50', '2024-12-13 10:16:08'),
(9, 4, 'AKSHAYA', NULL, 'akshaya@gmail.com', NULL, NULL, '$2y$12$TGfG3zDMP7jpFoYDhGyryuP4TfAT8./pou11VFnsksfFY4Iyw526m', 1, '2024-12-13 10:40:10', 0, 0, NULL, NULL, NULL, NULL, '2024-12-06 10:55:48', '2024-12-13 10:40:10'),
(13, 4, 'AKSHAYA', NULL, 'akshaya@gmail.cm', NULL, NULL, '$2y$12$fQZGGV4H7v9Gpa8dSGCta.sho0vifTd9T.W1lZms0OVP3YkJWna0u', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, '2024-12-06 10:57:22', '2024-12-06 10:57:23'),
(14, 4, 'GUGA PRIYA', NULL, 'gugapriya@gmail.com', NULL, NULL, '$2y$12$p6lMPXAMHoMyNBoijm2Ld.4CCzKwsqAGGmasrpGZ.ONSYTGrcQKQa', 1, '2024-12-13 10:44:38', 0, 0, NULL, NULL, NULL, NULL, '2024-12-06 11:08:15', '2024-12-13 10:44:38'),
(15, 4, 'JEYASRI', NULL, 'jeyasri@gamil.com', NULL, NULL, '$2y$12$OcJCt9DPtPs68qAm18anc.RQuMzdiXQBTKotZ.nmEo4qtzaI2je4O', 1, '2024-12-13 10:52:05', 0, 0, '2024-12-07 05:08:30', NULL, NULL, NULL, '2024-12-06 15:49:35', '2024-12-13 10:52:05'),
(16, 4, 'SHIVA SANKAR', NULL, 'shivasankar123@gmail.com', NULL, NULL, '$2y$12$inXry/dnUCr43DeVgCKMEeKI5ZYlI4VKxXoKslpwH9k5KMhICYrEC', 1, '2024-12-13 10:56:34', 0, 0, NULL, NULL, NULL, NULL, '2024-12-07 05:08:20', '2024-12-13 10:56:34'),
(17, 4, 'AKASHPONNUSAMY', NULL, 'akashponnusamy@gmail.com', NULL, NULL, '$2y$12$rMCGYGrzf27tjkzQSNYOV.OC8H1gd4qkT1nJV1OPXA64v3o6m4ixm', 1, '2024-12-13 11:05:22', 0, 0, '2024-12-10 05:27:00', NULL, NULL, NULL, '2024-12-07 05:20:13', '2024-12-13 11:05:22'),
(18, 4, 'VIGNESH PRABHU', NULL, 'vigneshprabhu123@gmail.com', NULL, NULL, '$2y$12$d0fe7mCqTwPMOk8rNDCXru4SDU4i1o3WeFlF1rVXabVv9VxK6LX4q', 1, '2024-12-13 11:11:56', 0, 0, NULL, NULL, NULL, NULL, '2024-12-07 05:37:42', '2024-12-13 11:11:56'),
(19, 4, 'RAJAN', NULL, 'rajan@gmail.com', NULL, NULL, '$2y$12$isM3b8QrC/rNVdZ8YpfineL/W1R5h3BKqkCyUHbJIdiLNnbp1KGpW', 1, '2024-12-13 11:20:59', 0, 0, NULL, NULL, NULL, NULL, '2024-12-07 06:02:30', '2024-12-13 11:20:59'),
(20, 4, 'BALAMURUGAN RP', NULL, 'balamurugan123@gmail.com', NULL, NULL, '$2y$12$e3cU8gCCVEmALJ3cOnnbuuqubTZG3knUQSSU37dCV9Fui5cBUH0yK', 1, '2024-12-16 09:20:46', 0, 0, '2024-12-16 09:08:20', NULL, NULL, NULL, '2024-12-07 06:13:45', '2024-12-16 09:20:46'),
(21, 4, 'KARTHIK@KARTHIKEYAN', NULL, 'karthik@gmail.com', NULL, NULL, '$2y$12$Bez/E5adbKefTCY6cOjRtOAnVqFMGbxL6YQkncqCWz8I8GrkV4lHm', 1, '2024-12-18 05:50:40', 0, 0, '2024-12-10 05:26:22', NULL, NULL, NULL, '2024-12-07 06:36:09', '2024-12-18 05:50:40'),
(22, 4, 'HARISH R', NULL, 'harish123@gmail.com', NULL, NULL, '$2y$12$o5oAQ0ovUCavvT8Z9ZbE5.XPJys1BfOwrNsXekpvXPvKNH8MSwFjS', 1, '2024-12-16 09:35:16', 0, 0, NULL, NULL, NULL, NULL, '2024-12-07 07:16:17', '2024-12-16 09:35:16'),
(23, 4, 'M. NANDHINI', NULL, 'nandhini@gmail.com', NULL, NULL, '$2y$12$BJ9jhsGWTOrsKYZeh3Uzyu7n0yVL00KPkWKSDyyih64X5Cpxr/hSa', 1, '2024-12-18 07:23:21', 0, 0, NULL, NULL, NULL, NULL, '2024-12-07 12:14:54', '2024-12-18 07:23:21'),
(24, 4, 'RAJESH KUMAR', NULL, 'rajesh123@gmail.com', NULL, NULL, '$2y$12$2gY18DO32s8FR7q0jGG3SOLK9kywu02ZEHPIyf8IO4jZ0K69jiOQG', 1, '2024-12-16 09:48:16', 0, 0, NULL, NULL, NULL, NULL, '2024-12-08 05:34:10', '2024-12-16 09:48:16'),
(25, 4, 'KUMARAVEL', NULL, 'kumaravel123@gmail.com', NULL, NULL, '$2y$12$mq06VS66v2HRnjvBvf3vHezRUogy46rHMnMyyvfB1I5O588Xi5ZyO', 1, '2024-12-16 10:06:02', 0, 0, NULL, NULL, NULL, NULL, '2024-12-09 05:20:54', '2024-12-16 10:06:02'),
(26, 4, 'SIVARANJANI', NULL, 'sivaranjani123@gmail.com', NULL, NULL, '$2y$12$y0RM1zwp99XLDpj2A2JrNuCJ.H4S.xHoW2aRNdd1NO9lqvDzAf8.q', 1, '2024-12-16 10:09:05', 0, 0, NULL, NULL, NULL, NULL, '2024-12-09 07:37:22', '2024-12-16 10:09:05'),
(31, 4, 'SIVARANJANI', NULL, 'sivaranjani@gmail.com', NULL, NULL, '$2y$12$aV9Q1.TAYLJAHgBcrdzDsOj7dN78o7Yw3b3NJvJosOZA08Ac04SHO', 1, '2024-12-16 10:42:24', 0, 0, '2024-12-16 10:41:18', NULL, NULL, NULL, '2024-12-09 07:43:10', '2024-12-16 10:42:24'),
(32, 4, 'RASIKA', NULL, 'rasika123@gmail.com', NULL, NULL, '$2y$12$QLUc6VH2KtFXgIZJTUeJHOl.CDu7jm9EEAct0lgZchloJOEQnQ5nq', 1, '2024-12-16 10:44:11', 0, 0, '2024-12-16 10:42:38', NULL, NULL, NULL, '2024-12-09 08:50:53', '2024-12-16 10:44:11'),
(33, 4, 'MRUDHULAPANDIYAN', NULL, 'mrudhulapandiyan@gmail.com', NULL, NULL, '$2y$12$6cDao3/x4XI6Ksl8tNW.9uffCpfsq1dI9OQxshAt8XCD.9FXXf0LO', 1, '2024-12-16 10:55:20', 0, 0, '2024-12-09 10:15:18', NULL, NULL, NULL, '2024-12-09 09:39:46', '2024-12-16 10:55:20'),
(34, 4, 'SATHYA PRIYA', NULL, 'sathyapriya@gmail.com', NULL, NULL, '$2y$12$LGhjvOWeenLrEy1Uct2NL.5MIpI6zshzW5LHEuhJmWl6CLUhmcgqS', 1, '2024-12-16 11:02:11', 0, 0, '2024-12-16 11:01:21', NULL, NULL, NULL, '2024-12-09 10:00:37', '2024-12-16 11:02:11'),
(35, 4, 'RAAGAPRIYA', NULL, 'raagapriya@gmail.com', NULL, NULL, '$2y$12$1UqN9fa.KCPq1WiLZYyeKu08DDLpoQfvH1C9setV1PdlWgiXTYHzu', 1, '2024-12-16 11:03:47', 0, 0, NULL, NULL, NULL, NULL, '2024-12-09 10:17:14', '2024-12-16 11:03:47'),
(36, 4, 'KIRTHIKA', NULL, 'kirthika@gmail.com', NULL, NULL, '$2y$12$ogwqEJYKbq0IGzHQonKvDubYOejhE62ES/.FQ0tXMugiJCcF5aaR2', 1, '2024-12-16 11:10:08', 0, 0, NULL, NULL, NULL, NULL, '2024-12-09 10:26:42', '2024-12-16 11:10:08'),
(37, 4, 'ROSHINI PONNARASAN', NULL, 'roshini@gmail.com', NULL, NULL, '$2y$12$HkoI/YXvMCxrRRUA3UDpu.i9CHnKsuPcOylXNTomElc.GWyeI4Tae', 1, '2024-12-16 11:27:01', 0, 0, '2024-12-16 11:14:05', NULL, NULL, NULL, '2024-12-09 10:41:00', '2024-12-16 11:27:01'),
(38, 4, 'KAVICHITHRAA', NULL, 'kavichithraa@gmail.com', NULL, NULL, '$2y$12$3K012e8T4wy.XbDa40zYYutIfD0ny99KXqXIKrUgrftkC4CIX4ae2', 1, '2024-12-18 06:10:00', 0, 0, '2024-12-18 06:09:35', NULL, NULL, NULL, '2024-12-11 10:19:59', '2024-12-18 06:10:00'),
(42, 4, 'VARSHINI', NULL, 'varshini@gmail.com', NULL, NULL, '$2y$12$KofBLaDa7CCvZHCPEP7gCOUcZyl7pywFz7SRoqbeqLgxB8LLvdIl.', 1, '2024-12-18 05:36:50', 0, 0, '2024-12-18 05:36:21', NULL, NULL, NULL, '2024-12-11 10:25:41', '2024-12-18 05:36:50'),
(43, 4, 'RATHISINDHUJA', NULL, 'rathi@gmail.com', NULL, NULL, '$2y$12$CghSoPjW/2WGIvSonMTSjuUNU.28EAi8S4YbhZi8MQHGC8ZELk0EO', 1, '2024-12-16 11:31:02', 0, 0, NULL, NULL, NULL, NULL, '2024-12-11 10:28:11', '2024-12-16 11:31:02'),
(44, 4, 'KAVICHITHRAA', NULL, 'kavichithra@gail.com', NULL, NULL, '$2y$12$io9LB17J7qlV5EVUmCI3/OqElFX7glAvtc8E5PUDVkER5Fdt9xS8e', 1, '2024-12-18 06:08:52', 0, 0, NULL, NULL, NULL, NULL, '2024-12-11 10:50:31', '2024-12-18 06:08:52'),
(46, 4, 'VARSHINISELAPALAM', NULL, 'varshini123@gmail.com', NULL, NULL, '$2y$12$4JphAZ9OaVdzcjpKUbbkNOyEyN.N83w3n861uZ3D1rwlRds/LbXKC', 1, '2024-12-16 11:51:43', 0, 0, '2024-12-16 11:50:13', NULL, NULL, NULL, '2024-12-11 11:17:07', '2024-12-16 11:51:43'),
(47, 4, 'MATHUMEENA', NULL, 'mathumeena@gmail.com', NULL, NULL, '$2y$12$Leemv52eKQgPKehS51gFxuxCQsoWXS8JAYb7NZMAYoqQ2Hnh7LFSO', 1, '2024-12-17 04:23:46', 0, 0, '2024-12-17 04:23:14', NULL, NULL, NULL, '2024-12-11 13:58:20', '2024-12-17 04:23:46'),
(48, 4, 'TEJASWI', NULL, 'tejaswi@gmail.com', NULL, NULL, '$2y$12$jmBYz9MrerSOaoaVIZ3wxOwOeb7DelKDRU5m0YSkCQi2c/iVDSx12', 1, '2024-12-17 04:27:02', 0, 0, NULL, NULL, NULL, NULL, '2024-12-11 14:20:43', '2024-12-17 04:27:02'),
(49, 4, 'KANIIMALAR', NULL, 'kaniimalar@gmail.com', NULL, NULL, '$2y$12$EDD1u/51srxpKdMQ4XTciebgBtB1Rqj5fMjLZ8l1Stdg1ctDpnxJ.', 1, '2024-12-17 05:13:34', 0, 0, '2024-12-17 04:33:32', NULL, NULL, NULL, '2024-12-12 05:34:34', '2024-12-17 05:13:34'),
(50, 4, 'KEERTHANA', NULL, 'keerthana@gmail.com', NULL, NULL, '$2y$12$tOtic2Q82EsW4BBotKbz3uUI3SFDZE4KK/nXr/UBXxb4FZ2gmhMYK', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, '2024-12-12 07:17:06', '2024-12-12 07:17:06'),
(51, 4, 'AARTHI', NULL, 'aarthi@gmail.com', NULL, NULL, '$2y$12$xjkS8c4MXhT6Q0KYkSunB.pgsrkjyfUNDjOm.P2br.lZ0aKMwH5kq', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, '2024-12-12 09:38:57', '2024-12-12 09:38:57'),
(52, 4, 'DHIVYAJOTHI', NULL, 'dhivyajothi@gmail.com', NULL, NULL, '$2y$12$kNjBJUrrEUnkB3svwmZyI.Akx.pO9gN41zqvSFAGi.waPNy8jKh3G', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, '2024-12-12 10:33:59', '2024-12-12 10:33:59'),
(53, 4, 'VALARMATHI', NULL, 'valarmathi@gmail.com', NULL, NULL, '$2y$12$vwcx9AxETwqoigPF9u6ixeMZogn210o74BjVwC/43pcnvzCjKVGP.', 1, NULL, 1, 0, '2024-12-13 06:22:41', NULL, NULL, NULL, '2024-12-12 10:55:52', '2024-12-13 06:22:41'),
(54, 4, 'HARISHMTHA', NULL, 'harishmitha@gmail.com', NULL, NULL, '$2y$12$DOdOQ87OZJdWi.Jsok4GreMrcKCHMSaue2vAkBGCEDjymcFJOFxli', 1, NULL, 2, 0, '2024-12-13 06:14:21', NULL, NULL, NULL, '2024-12-12 11:10:18', '2024-12-13 06:14:21'),
(55, 4, 'KEERTHIKA', NULL, 'keerthika@gmail.com', NULL, NULL, '$2y$12$M/GixthvHyT0VmzhsujAzORRSgoIdWUkFDXEhA7n5NXRoA5cE2ucK', 1, NULL, 2, 0, '2024-12-13 06:24:18', NULL, NULL, NULL, '2024-12-12 11:26:41', '2024-12-13 06:24:18'),
(56, 4, 'AATHESWAR', NULL, 'aatheswar@gmail.com', NULL, NULL, '$2y$12$2V87sg.DYz7AapGiVQH3c.ufnQPB3yjVx3XxLhujyOtWkJBFAFFL6', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, '2024-12-17 05:55:31', '2024-12-17 05:55:31'),
(57, 4, 'ATHIMOOLAM', NULL, 'athimoolam@gmail.com', NULL, NULL, '$2y$12$mjvMPb4koCFYGN0/I33Y3.B.4kV.zA9dT3tQX2Y4n4Ao5d4MoOcny', 1, NULL, 2, 0, '2024-12-17 07:32:52', NULL, NULL, NULL, '2024-12-17 06:44:20', '2024-12-17 07:32:52'),
(58, 4, 'SIDDHARTHA ABIMANYU', NULL, 'siddhartha@gmail.com', NULL, NULL, '$2y$12$DmgQZs1YkpP98tKZj7gMqe35mKcTFQVHHT0idiKB6dtL49XS5ZBL.', 1, '2024-12-17 07:52:50', 0, 0, '2024-12-17 07:36:20', NULL, NULL, NULL, '2024-12-17 07:31:08', '2024-12-17 07:52:50'),
(59, 4, 'GOUTHAMARAJAN', NULL, 'gouthamarajan@gmail.com', NULL, NULL, '$2y$12$OpnsvH8O1yapciEzhgkS1.8R5IyfPVoIuck1e6mdVJGyIj5fJg0Wm', 1, '2024-12-17 09:49:03', 0, 0, NULL, NULL, NULL, NULL, '2024-12-17 08:58:25', '2024-12-17 09:49:03'),
(60, 4, 'NAVEEN', NULL, 'naveen@gmail.com', NULL, NULL, '$2y$12$v0EszuitMYs.H8U6LVsufuqkyZ/p1FAIciJct9Wy57qRWztlbNrma', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, '2024-12-17 09:14:53', '2024-12-17 09:14:54'),
(61, 4, 'SARAVANAN', NULL, 'saravanan@gmail..com', NULL, NULL, '$2y$12$W7CFZ0JepyZ5maZq3sNI/.lUmXqwdogAxyiYdWTdaHpPYE/WBG/0u', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, '2024-12-17 10:13:25', '2024-12-17 10:13:25'),
(62, 4, 'VIGNESH', NULL, 'vignesh@gmail.com', NULL, NULL, '$2y$12$CK3ucSM7wtPhPOpJeWpol.iCTuarKyX5XoVOTtYISILawAoKGmluW', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, '2024-12-17 10:30:34', '2024-12-17 10:30:34'),
(63, 4, 'UMESH', NULL, 'umesh@gmail.com', NULL, NULL, '$2y$12$UZra0s9q4lXJhzDnRGbxme2ZeRIDbo7mmfsFF4s7Aq/zp6UNaTq9W', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, '2024-12-17 10:45:25', '2024-12-17 10:45:25'),
(64, 4, 'VIGNESHRAJA', NULL, 'vigneshraja@gmail.com', NULL, NULL, '$2y$12$xj0av3yeIAu4syIFTls3euQoDkV/GWBoU0ojkofPRkL9DGSzPxvuS', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, '2024-12-17 11:07:41', '2024-12-17 11:07:41'),
(65, 4, 'ADITYA', NULL, 'aditya@gmail.com', NULL, NULL, '$2y$12$ya3SCuqDmcRhKZ7PG37akO0TsIqHeCOCn32ChuYOw3m3gv6GXm8xK', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, '2024-12-17 11:12:28', '2024-12-17 11:12:28'),
(66, 4, 'SELVARNI', NULL, 'rajselvarani14@gmail.com', '8906789090', NULL, '$2y$12$pgn2OZz4OZysjtOIB2Wnbe0Q/m19rMXNp7AKigRuUbQt/JrGuS94O', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, '2026-01-22 04:25:33', '2026-01-22 04:25:33'),
(68, 4, 'SELVARANI', NULL, 'rajselvarani1@gmail.com', '8438106462', NULL, '$2y$12$4omIo13mxoKFkPC3ginMxeKpTZOqC6aTQiZG45uDTTQQSMdKWM4nO', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, '2026-02-02 00:03:07', '2026-02-02 00:03:07'),
(71, 4, 'SELVARANI', NULL, 'rajselvarani143@gmail.com', '8438106462', NULL, '$2y$12$O8BzqZ6g90zY9q6HwWWAQepeV5epuXuyZF1YnlGy8jwOGLJf5jcwu', 1, NULL, 0, 0, NULL, NULL, NULL, 710458, '2026-02-02 00:06:58', '2026-02-02 00:06:58'),
(72, 2, 'Bahavani', NULL, 'rajselvarani1434@gmail.com', NULL, NULL, '$2y$12$/CVMy2/d7NMzfFaC6FjnN.Kycb9g6swIwOsaHluqh3axZfYGXDwj2', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, '2026-02-04 03:01:46', '2026-02-04 03:01:46'),
(73, 4, 'Naresh', NULL, 'naresh@test.com', '9876543210', NULL, '$2y$12$VG2dBvli35PrsVxCmwP5Q.dYTAygQKUxB6uIU.qMSV0jyhZXIPYxu', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, '2026-02-09 04:55:31', '2026-02-09 05:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_otp_verifies`
--

CREATE TABLE `user_otp_verifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `otp_code` varchar(255) DEFAULT NULL,
  `otp_type` enum('send','resend') DEFAULT 'send',
  `delivery_time` timestamp NULL DEFAULT NULL,
  `delivery_status` tinyint(1) DEFAULT 0,
  `otp_verify_status` tinyint(1) DEFAULT 0,
  `otp_verified_time` timestamp NULL DEFAULT NULL,
  `otp_invalid_attempts` int(11) DEFAULT 0,
  `otp_expired_attempts` int(11) DEFAULT 0,
  `otp_expired` tinyint(1) DEFAULT 0,
  `page_expired` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weights`
--

CREATE TABLE `weights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weights`
--

INSERT INTO `weights` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(0, 'Select', 1, NULL, NULL),
(1, '30KG', 1, NULL, NULL),
(2, '31KG', 1, NULL, NULL),
(3, '32KG', 1, NULL, NULL),
(4, '33KG', 1, NULL, NULL),
(5, '34KG', 1, NULL, NULL),
(6, '35KG', 1, NULL, NULL),
(7, '36KG', 1, NULL, NULL),
(8, '37KG', 1, NULL, NULL),
(9, '38KG', 1, NULL, NULL),
(10, '39KG', 1, NULL, NULL),
(11, '40KG', 1, NULL, NULL),
(12, '41KG', 1, NULL, NULL),
(13, '42KG', 1, NULL, NULL),
(14, '43KG', 1, NULL, NULL),
(15, '44KG', 1, NULL, NULL),
(16, '45KG', 1, NULL, NULL),
(17, '46KG', 1, NULL, NULL),
(18, '47KG', 1, NULL, NULL),
(19, '48KG', 1, NULL, NULL),
(20, '49KG', 1, NULL, NULL),
(21, '50KG', 1, NULL, NULL),
(22, '51KG', 1, NULL, NULL),
(23, '52KG', 1, NULL, NULL),
(24, '53KG', 1, NULL, NULL),
(25, '54KG', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `associations`
--
ALTER TABLE `associations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `association_user_id_foreign` (`user_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosam_details`
--
ALTER TABLE `dosam_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_details`
--
ALTER TABLE `education_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_details_education_id_foreign` (`education_id`),
  ADD KEY `education_details_member_id_foreign` (`member_id`),
  ADD KEY `education_details_state_id_foreign` (`state_id`),
  ADD KEY `education_details_city_id_foreign` (`city_id`),
  ADD KEY `education_details_taulk_id_foreign` (`taulk_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `family_details`
--
ALTER TABLE `family_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_details_member_id_foreign` (`member_id`);

--
-- Indexes for table `heights`
--
ALTER TABLE `heights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horoscope_detail`
--
ALTER TABLE `horoscope_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `horoscope_detail_member_id_foreign` (`member_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liked_profiles`
--
ALTER TABLE `liked_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `liked_profiles_member_id_foreign` (`member_id`),
  ADD KEY `liked_profiles_liked_profile_foreign` (`liked_profile`),
  ADD KEY `liked_profiles_unliked_profile_foreign` (`unliked_profile`);

--
-- Indexes for table `liked_statuses`
--
ALTER TABLE `liked_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `liked_statuses_member_id_foreign` (`member_id`),
  ADD KEY `liked_statuses_profile_id_foreign` (`profile_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_user_id_foreign` (`user_id`),
  ADD KEY `members_profile_created_by_foreign` (`profile_created_by`),
  ADD KEY `members_association_id_foreign` (`association_id`),
  ADD KEY `members_raasi_id_foreign` (`raasi_id`),
  ADD KEY `members_star_id_foreign` (`star_id`),
  ADD KEY `members_permanent_state_id_foreign` (`permanent_state_id`),
  ADD KEY `members_permanent_city_id_foreign` (`permanent_city_id`),
  ADD KEY `members_permanent_taulk_id_foreign` (`permanent_taulk_id`);

--
-- Indexes for table `member_activity_logs`
--
ALTER TABLE `member_activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_activity_logs_member_id_foreign` (`member_id`),
  ADD KEY `member_activity_logs_profile_id_foreign` (`profile_id`),
  ADD KEY `member_activity_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `member_addional_details`
--
ALTER TABLE `member_addional_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_addional_details_member_id_foreign` (`member_id`),
  ADD KEY `member_addional_details_height_id_foreign` (`height_id`),
  ADD KEY `member_addional_details_weight_id_foreign` (`weight_id`);

--
-- Indexes for table `member_hobbies`
--
ALTER TABLE `member_hobbies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_hobbies_member_id_foreign` (`member_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occupations`
--
ALTER TABLE `occupations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_information`
--
ALTER TABLE `partner_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partner_information_member_id_foreign` (`member_id`),
  ADD KEY `partner_information_height_id_foreign` (`height_id`),
  ADD KEY `partner_information_height_id_from_foreign` (`height_id_from`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_role_id_foreign` (`role_id`),
  ADD KEY `permissions_route_id_foreign` (`route_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_member_id_foreign` (`member_id`),
  ADD KEY `photos_photo_id_foreign` (`photo_id`);

--
-- Indexes for table `raasis`
--
ALTER TABLE `raasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relative`
--
ALTER TABLE `relative`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relative_member_id_foreign` (`member_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `routes_name_unique` (`name`);

--
-- Indexes for table `search_log`
--
ALTER TABLE `search_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `search_log_member_id_foreign` (`member_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stars`
--
ALTER TABLE `stars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stars_raasi_id_foreign` (`raasi_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_amounts`
--
ALTER TABLE `subscription_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talukas`
--
ALTER TABLE `talukas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `talukas_state_id_foreign` (`state_id`),
  ADD KEY `talukas_city_id_foreign` (`city_id`);

--
-- Indexes for table `transaction_logs`
--
ALTER TABLE `transaction_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_files`
--
ALTER TABLE `upload_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_otp_verifies`
--
ALTER TABLE `user_otp_verifies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `associations`
--
ALTER TABLE `associations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosam_details`
--
ALTER TABLE `dosam_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `education_details`
--
ALTER TABLE `education_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_details`
--
ALTER TABLE `family_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `heights`
--
ALTER TABLE `heights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `horoscope_detail`
--
ALTER TABLE `horoscope_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `liked_profiles`
--
ALTER TABLE `liked_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `liked_statuses`
--
ALTER TABLE `liked_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `member_activity_logs`
--
ALTER TABLE `member_activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member_addional_details`
--
ALTER TABLE `member_addional_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `member_hobbies`
--
ALTER TABLE `member_hobbies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `occupations`
--
ALTER TABLE `occupations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partner_information`
--
ALTER TABLE `partner_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raasis`
--
ALTER TABLE `raasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `relative`
--
ALTER TABLE `relative`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `search_log`
--
ALTER TABLE `search_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stars`
--
ALTER TABLE `stars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscription_amounts`
--
ALTER TABLE `subscription_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `talukas`
--
ALTER TABLE `talukas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;

--
-- AUTO_INCREMENT for table `transaction_logs`
--
ALTER TABLE `transaction_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload_files`
--
ALTER TABLE `upload_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user_otp_verifies`
--
ALTER TABLE `user_otp_verifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weights`
--
ALTER TABLE `weights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `associations`
--
ALTER TABLE `associations`
  ADD CONSTRAINT `association_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `education_details`
--
ALTER TABLE `education_details`
  ADD CONSTRAINT `education_details_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `education_details_education_id_foreign` FOREIGN KEY (`education_id`) REFERENCES `educations` (`id`),
  ADD CONSTRAINT `education_details_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `education_details_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`),
  ADD CONSTRAINT `education_details_taulk_id_foreign` FOREIGN KEY (`taulk_id`) REFERENCES `talukas` (`id`);

--
-- Constraints for table `family_details`
--
ALTER TABLE `family_details`
  ADD CONSTRAINT `family_details_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `horoscope_detail`
--
ALTER TABLE `horoscope_detail`
  ADD CONSTRAINT `horoscope_detail_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `liked_profiles`
--
ALTER TABLE `liked_profiles`
  ADD CONSTRAINT `liked_profiles_liked_profile_foreign` FOREIGN KEY (`liked_profile`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `liked_profiles_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `liked_profiles_unliked_profile_foreign` FOREIGN KEY (`unliked_profile`) REFERENCES `members` (`id`);

--
-- Constraints for table `liked_statuses`
--
ALTER TABLE `liked_statuses`
  ADD CONSTRAINT `liked_statuses_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `liked_statuses_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_association_id_foreign` FOREIGN KEY (`association_id`) REFERENCES `associations` (`id`),
  ADD CONSTRAINT `members_permanent_city_id_foreign` FOREIGN KEY (`permanent_city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `members_permanent_state_id_foreign` FOREIGN KEY (`permanent_state_id`) REFERENCES `states` (`id`),
  ADD CONSTRAINT `members_permanent_taulk_id_foreign` FOREIGN KEY (`permanent_taulk_id`) REFERENCES `talukas` (`id`),
  ADD CONSTRAINT `members_profile_created_by_foreign` FOREIGN KEY (`profile_created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `members_raasi_id_foreign` FOREIGN KEY (`raasi_id`) REFERENCES `raasis` (`id`),
  ADD CONSTRAINT `members_star_id_foreign` FOREIGN KEY (`star_id`) REFERENCES `stars` (`id`),
  ADD CONSTRAINT `members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `member_activity_logs`
--
ALTER TABLE `member_activity_logs`
  ADD CONSTRAINT `member_activity_logs_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `member_activity_logs_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `member_activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `member_addional_details`
--
ALTER TABLE `member_addional_details`
  ADD CONSTRAINT `member_addional_details_height_id_foreign` FOREIGN KEY (`height_id`) REFERENCES `heights` (`id`),
  ADD CONSTRAINT `member_addional_details_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `member_addional_details_weight_id_foreign` FOREIGN KEY (`weight_id`) REFERENCES `weights` (`id`);

--
-- Constraints for table `member_hobbies`
--
ALTER TABLE `member_hobbies`
  ADD CONSTRAINT `member_hobbies_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `partner_information`
--
ALTER TABLE `partner_information`
  ADD CONSTRAINT `partner_information_height_id_foreign` FOREIGN KEY (`height_id`) REFERENCES `heights` (`id`),
  ADD CONSTRAINT `partner_information_height_id_from_foreign` FOREIGN KEY (`height_id_from`) REFERENCES `heights` (`id`),
  ADD CONSTRAINT `partner_information_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `permissions_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`);

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `photos_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `upload_files` (`id`);

--
-- Constraints for table `relative`
--
ALTER TABLE `relative`
  ADD CONSTRAINT `relative_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `search_log`
--
ALTER TABLE `search_log`
  ADD CONSTRAINT `search_log_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `stars`
--
ALTER TABLE `stars`
  ADD CONSTRAINT `stars_raasi_id_foreign` FOREIGN KEY (`raasi_id`) REFERENCES `raasis` (`id`);

--
-- Constraints for table `talukas`
--
ALTER TABLE `talukas`
  ADD CONSTRAINT `talukas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `talukas_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_otp_verifies`
--
ALTER TABLE `user_otp_verifies`
  ADD CONSTRAINT `user_otp_verifies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
