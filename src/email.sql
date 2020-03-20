-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2020 at 12:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `email`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `deleted` int(255) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `phone`, `email`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'amit sharma', '9987776656', 'amitsharma@nimapinfotech.com', 0, '2019-11-02 11:52:44', '2019-11-02 06:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `reporting_name` varchar(255) DEFAULT NULL,
  `reporting_contact` varchar(255) DEFAULT NULL,
  `reporting_email` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_email` varchar(255) DEFAULT NULL,
  `hr_name` varchar(255) DEFAULT NULL,
  `hr_contact` varchar(100) DEFAULT NULL,
  `hr_email` varchar(100) DEFAULT NULL,
  `Interviewer_name` varchar(255) DEFAULT NULL,
  `Interviewer_contact` varchar(100) DEFAULT NULL,
  `Interviewer_email` varchar(100) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `address_map_link` text DEFAULT NULL,
  `need_timesheet` varchar(100) DEFAULT NULL,
  `need_machine` varchar(100) DEFAULT NULL,
  `aggrement_sign` varchar(100) DEFAULT NULL,
  `weekend_working` varchar(100) DEFAULT NULL,
  `first_invoice` varchar(100) DEFAULT NULL,
  `is_invoice_need` varchar(100) DEFAULT NULL,
  `invoice_date` varchar(100) DEFAULT NULL,
  `credit_period` varchar(100) DEFAULT NULL,
  `gst` varchar(100) DEFAULT NULL,
  `pan` varchar(100) DEFAULT NULL,
  `billing_address` varchar(100) DEFAULT NULL,
  `operational_address` varchar(100) DEFAULT NULL,
  `holidays` varchar(100) DEFAULT NULL,
  `pf_proof` varchar(100) DEFAULT NULL,
  `tan` varchar(100) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `invoice_client` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_name`, `reporting_name`, `reporting_contact`, `reporting_email`, `account_name`, `account_email`, `hr_name`, `hr_contact`, `hr_email`, `Interviewer_name`, `Interviewer_contact`, `Interviewer_email`, `url`, `address`, `address_map_link`, `need_timesheet`, `need_machine`, `aggrement_sign`, `weekend_working`, `first_invoice`, `is_invoice_need`, `invoice_date`, `credit_period`, `gst`, `pan`, `billing_address`, `operational_address`, `holidays`, `pf_proof`, `tan`, `deleted`, `invoice_client`, `created_at`, `updated_at`) VALUES
(1, 'kredence digital resources pvt ltd.', 'ketan', '9820226633', 'ketan@kredence.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://kredence.com/', '4-A1 Court Chambers,, Vitthaldas Thackersey Marg, New Marine Lines, Marine Lines, Mumbai, Maharashtra 400020', 'https://www.google.com/maps?ll=18.93852,72.828729&z=16&t=m&hl=en-US&gl=IN&mapclient=embed&cid=11893418570040154692', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2019-11-02 11:52:26', '2019-11-02 11:52:26'),
(2, 'Neebal technologies', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.neebal.com/', 'Boomerang Building, B1-007, Chandivali Rd, Yadav Nagar, Chandivali, Powai, Mumbai, Maharashtra 400072', 'https://www.google.co.in/maps/place/Neebal+Technologies/@19.1140005,72.8919137,18.51z/data=!4m5!3m4!1s0x3be7c80c0b5ae587:0xb8ff7b0fe9db9b8c!8m2!3d19.1138556!4d72.8925692', 'N', 'N', 'N', 'N', 'N', 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', NULL, 0, 1, '2019-11-02 12:04:23', '2020-03-11 07:47:10'),
(3, 'AZz', 'Ruby Singhh', '9876789877', 'rubyy@az.com', NULL, NULL, 'Pooja Jainn', '1878787877', 'poojaa@az.com', 'Poojaa', NULL, NULL, 'az.com', 'Navi Mumbai', 'https://www.google.com/maps/place/Arizona+Mediaz/@19.0830107,73.0043255,17z/data=!3m1!4b1!4m5!3m4!1s0x3be7c78d8eaaaac9:0x9d35217acc6c45c2!8m2!3d19.0830107!4d73.0065142', 'N', 'N', 'N', 'N', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2020-03-04 05:48:39', '2020-03-04 05:49:39'),
(4, 'Sonatan Bera 1', 'manager name', '0909090901', 'manager@gmail.co', 'account name 1', 'account@gmail.co', 'hr name one', '0990909091', 'hr@gmail.co', 'interview name one', '1090909091', 'interview@gmail.co', 'yahoo.co.in', 'Address 1', 'https://www.google.com/maps/place/Parel,+Mumbai,+Maharashtra,+India/@18.9982862,72.8240711,14z/data=!4m5!3m4!1s0x3be7cefaff143987:0x11a57272db3e78d0!8m2!3d18.9976573!4d72.8375932', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', '5', '1234', '21KOKIJ2323K2K2', 'KOKIJ2323K', 'Billing 1', 'Operational 1', '/docs/Sonatan_Bera_1_Holidays.pdf', 'Y', '11111', 0, 1, '2020-03-05 10:13:25', '2020-03-09 11:09:04'),
(5, 'Sonatan Bera', 'manager', '0909090909', 'manager@gmail.co', 'account name', 'account@gmail.com', 'hr', '0909090909', 'hr@gmail.co', 'interview', '0909090909', 'interview@gmail.co', 'yahoo.com', 'address', 'https://www.google.com/maps/place/Parel,+Mumbai,+Maharashtra,+India/@18.9982862,72.8240711,14z/data=!3m1!4b1!4m5!3m4!1s0x3be7cefaff143987:0x11a57272db3e78d0!8m2!3d18.9976573!4d72.8375932', 'Y', 'N', 'N', 'N', 'N', 'N', '0', '900', 'hjgjkhgj', 'hgbhjbgj', 'billing', 'operational', NULL, 'N', 'jkhgkjgh', 0, 1, '2020-03-09 11:00:29', '2020-03-17 09:05:48'),
(6, 'Sagar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nimapinfotech.com', 'Mumbai', 'https://www.google.com/maps/place/Parel,+Mumbai,+Maharashtra,+India/@18.9982862,72.8240711,14z/data=!3m1!4b1!4m5!3m4!1s0x3be7cefaff143987:0x11a57272db3e78d0!8m2!3d18.9976573!4d72.8375932', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2020-03-11 07:33:35', '2020-03-11 07:33:35'),
(7, 'Ruby', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'arizonamediaz.com', 'Vashi', 'https://www.google.com/maps/place/Parel,+Mumbai,+Maharashtra,+India/@18.9982862,72.8240711,14z/data=!3m1!4b1!4m5!3m4!1s0x3be7cefaff143987:0x11a57272db3e78d0!8m2!3d18.9976573!4d72.8375932', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2020-03-11 07:34:16', '2020-03-11 07:34:16'),
(8, 'Google', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'google.com', 'US', 'https://www.google.com/maps/place/Parel,+Mumbai,+Maharashtra,+India/@18.9982862,72.8240711,14z/data=!3m1!4b1!4m5!3m4!1s0x3be7cefaff143987:0x11a57272db3e78d0!8m2!3d18.9976573!4d72.8375932', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2020-03-11 07:34:48', '2020-03-16 12:18:00'),
(9, 'Wipro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'wipro.co.in', 'Airoli, Navi Mumbai', 'https://www.google.com/maps/place/Parel,+Mumbai,+Maharashtra,+India/@18.9982862,72.8240711,14z/data=!3m1!4b1!4m5!3m4!1s0x3be7cefaff143987:0x11a57272db3e78d0!8m2!3d18.9976573!4d72.8375932', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2020-03-11 07:35:38', '2020-03-11 07:35:38'),
(10, 'Dell', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dell.com', 'na', 'https://www.google.com/maps/place/Parel,+Mumbai,+Maharashtra,+India/@18.9982862,72.8240711,14z/data=!3m1!4b1!4m5!3m4!1s0x3be7cefaff143987:0x11a57272db3e78d0!8m2!3d18.9976573!4d72.8375932', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2020-03-11 07:36:23', '2020-03-17 04:32:48'),
(11, 'HDFC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hdfc.com', 'Mumbai', 'https://www.google.com/maps/place/Parel,+Mumbai,+Maharashtra,+India/@18.9982862,72.8240711,14z/data=!3m1!4b1!4m5!3m4!1s0x3be7cefaff143987:0x11a57272db3e78d0!8m2!3d18.9976573!4d72.8375932', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2020-03-11 07:37:02', '2020-03-14 12:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `id` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `resource` int(11) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `datetime` varchar(100) NOT NULL,
  `mode` varchar(100) DEFAULT NULL,
  `location` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`id`, `client`, `resource`, `contact_person`, `contact`, `datetime`, `mode`, `location`, `address`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'interview name one', '1090909091', '2020.03.11 10:25', NULL, 'Onsite', 'Address 1', 0, '2020-03-10 23:26:30', '2020-03-11 04:56:30'),
(2, 4, 1, 'interview name one', '1090909091', '2020.03.11 10:25', 'F2F', 'Onsite', 'Address 1', 0, '2020-03-10 23:28:24', '2020-03-11 04:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `joininglogs`
--

CREATE TABLE `joininglogs` (
  `id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL DEFAULT 0,
  `client_id` int(11) NOT NULL DEFAULT 0,
  `tech_id` int(11) NOT NULL DEFAULT 0,
  `joining_id` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `joinings`
--

CREATE TABLE `joinings` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `end_date` varchar(100) NOT NULL,
  `creadit_period` varchar(100) NOT NULL,
  `date_of_invoice` varchar(100) NOT NULL,
  `contract_type` varchar(100) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `technology` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_records`
--

CREATE TABLE `monthly_records` (
  `id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `client_id` tinyint(4) NOT NULL,
  `payment` tinyint(4) NOT NULL DEFAULT 0,
  `invoice` tinyint(4) NOT NULL DEFAULT 0,
  `hard_copy` tinyint(4) NOT NULL DEFAULT 0,
  `pf` tinyint(4) NOT NULL DEFAULT 0,
  `timesheet` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nonjoinings`
--

CREATE TABLE `nonjoinings` (
  `id` int(11) NOT NULL,
  `resource` int(11) NOT NULL,
  `clients` int(11) NOT NULL,
  `end_date` varchar(100) NOT NULL,
  `joining_id` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `notes` text NOT NULL,
  `delete` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `notes`, `delete`, `created_at`, `updated_at`) VALUES
(18, 3, 'Sonatan Bera bhjbjb', 1, '2020-03-13 10:23:57', '2020-03-13 10:24:21'),
(19, 3, 'Sonatan Bera 123', 1, '2020-03-13 10:26:24', '2020-03-13 10:26:51'),
(20, 3, 'adsf', 1, '2020-03-13 10:27:13', '2020-03-13 10:27:27'),
(21, 3, '12345', 1, '2020-03-14 12:34:57', '2020-03-16 05:55:14'),
(22, 3, 'fbxdfbsdfsdfdfasdfasdf', 1, '2020-03-14 12:38:29', '2020-03-14 12:38:38'),
(23, 3, 'sdfgasf', 1, '2020-03-16 05:10:15', '2020-03-16 05:10:21'),
(24, 3, 'asfasf', 1, '2020-03-16 05:53:57', '2020-03-16 05:54:56'),
(25, 3, 'Sonatan Notes', 1, '2020-03-16 05:55:08', '2020-03-16 05:55:31'),
(26, 3, 'Sonatan', 1, '2020-03-16 05:55:38', '2020-03-16 10:20:45'),
(27, 3, 'asfasf', 1, '2020-03-16 05:55:53', '2020-03-16 05:59:12'),
(28, 3, 'asfasf', 1, '2020-03-16 05:56:02', '2020-03-16 10:20:53'),
(29, 3, 'My new notes', 1, '2020-03-16 05:56:09', '2020-03-16 10:21:43'),
(30, 3, 'My new notes', 0, '2020-03-16 10:21:55', '2020-03-16 10:21:55'),
(31, 3, 'sdgsdg sdgsdg', 0, '2020-03-17 05:48:33', '2020-03-17 05:48:33'),
(32, 3, 'qweqwed sd asda sdas dsd sdqweq\r\nqweqwed sd asda sdas dsd sdqweqwed\r\nqweqwed sd asda sdas dsd sd\r\nqweqwed sd asda sdas dsd sd', 1, '2020-03-17 10:48:47', '2020-03-17 11:39:25'),
(33, 15, 'hello', 0, '2020-03-18 10:25:11', '2020-03-18 10:25:11');

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
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `exp_date` date NOT NULL,
  `resident_address` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `refer_no` varchar(255) DEFAULT NULL,
  `language` varchar(255) NOT NULL,
  `otherlanguage` varchar(255) NOT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `resume_type` varchar(255) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `on_bench` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `fname`, `lname`, `phone`, `exp_date`, `resident_address`, `email`, `refer_no`, `language`, `otherlanguage`, `resume`, `resume_type`, `deleted`, `created_at`, `updated_at`, `on_bench`) VALUES
(3, 'Pooja', 'Jain', '0909090344', '2020-03-11', 'test', 'pooja@gmail.com', '098', '6,11', 'NA', '/docs/Pooja_Jain_Resume.pdf', 'file', 0, '2020-03-11 08:56:00', '2020-03-13 01:55:29', 1),
(4, 'Sonatan', 'Bera', '0987890987', '2018-10-02', 'Ghatkopar - West', 'sonatan@nimap.com', NULL, '8,2', 'na', '/docs/Sonatan_Bera_Resume.pdf', 'file', 0, '2020-03-13 05:00:55', '2020-03-14 07:26:04', 1),
(5, 'Shubham', 'Balam', '0898989898', '2018-01-09', 'Kalyan', 'shubham@gmail.com', NULL, '6,5,3', 'na', '/docs/Shubham_Balam_Resume.pdf', 'file', 0, '2020-03-13 05:02:11', '2020-03-14 07:48:46', 1),
(6, 'Ashutosh', 'Kori', '0909898980', '2010-09-10', 'Vikhroli', 'ashutosh@gmail.com', NULL, '2,9,10', 'na', '/docs/Ashutosh_Kori_Resume.pdf', 'file', 0, '2020-03-10 05:04:00', '2020-03-16 06:09:10', 1),
(7, 'Nilam', 'Ng', '0989098998', '2017-09-01', 'Navi Mumbai', 'nilam@gmail.com', NULL, '5,8,2', 'NA', '/docs/Nilam_Ng_Resume.pdf', 'file', 0, '2020-03-12 05:05:19', '2020-03-16 06:48:00', 1),
(8, 'Trupti', 'Mule', '0989878909', '2018-01-10', 'Ghatkopar', 'trupti@gmail.com', NULL, '3', 'na', '/docs/Trupti_Mule_Resume.pdf', 'file', 0, '2020-03-11 05:06:26', '2020-03-17 00:53:39', 1),
(9, 'Harshal', 'Jain', '0909090909', '2016-07-01', 'mumbai', 'harshal@nimapinfotech.com', '098', '2', 'CI , HTML, CSS', '/docs/Harshal_Jain_Resume.pdf', 'file', 0, '2020-03-17 05:29:43', '2020-03-17 05:29:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `logo` text NOT NULL,
  `contact` varchar(255) NOT NULL,
  `accountant_email` varchar(100) NOT NULL,
  `cc_email` varchar(100) NOT NULL,
  `salesperson` varchar(100) NOT NULL,
  `from_email` varchar(255) NOT NULL,
  `tech_head_email` varchar(100) NOT NULL,
  `geofence_email` varchar(100) NOT NULL,
  `reminder_email` varchar(100) NOT NULL,
  `reminder_days` varchar(100) NOT NULL,
  `reminder_email2` text NOT NULL,
  `reminder_months` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `address`, `logo`, `contact`, `accountant_email`, `cc_email`, `salesperson`, `from_email`, `tech_head_email`, `geofence_email`, `reminder_email`, `reminder_days`, `reminder_email2`, `reminder_months`, `deleted`, `created_at`, `updated_at`) VALUES
(1, '41, 4th floor A-wing, Todi Industrial Estate Sun Mill compound Road, Lower Parel, Mumbai, Maharashtra 400013', '/docs/logo.png', '070214 31876', 'mahesh@nimapinfotech.com', 'mahesh@nimapinfotech.com,sagar@nimapinfotech.com', 'mahesh@nimapinfotech.com', 'mahesh@nimapinfotech.com', 'mahesh@nimapinfotech.com', 'mahesh@nimapinfotech.com', 'mahesh@nimapinfotech.com,sagar@nimapinfotech.com', '30', 'mahesh@nimapinfotech.com,sagar@nimapinfotech.com', 10, 0, '0000-00-00 00:00:00', '2020-03-18 06:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE `technologies` (
  `id` int(11) NOT NULL,
  `technology` varchar(255) NOT NULL,
  `deleted` int(11) DEFAULT 0,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `technology`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Angualr JS', 0, '2019-11-02 09:19:21.072596', '2019-11-02 03:49:21'),
(2, 'PHP', 0, '2019-10-17 03:39:24.000000', '2019-10-17 03:39:24'),
(3, 'JAVA', 0, '2019-10-17 03:39:35.000000', '2019-10-17 03:39:35'),
(4, '.Net', 0, '2019-10-17 03:39:42.000000', '2019-10-17 03:39:42'),
(5, 'HTML', 0, '2019-10-17 03:39:49.000000', '2019-10-17 03:39:49'),
(6, 'CSS', 0, '2019-10-17 03:39:53.000000', '2019-10-17 03:39:53'),
(7, 'Node Js', 0, '2019-10-17 03:40:04.000000', '2019-10-17 03:40:04'),
(8, 'Javascript', 0, '2019-11-02 03:49:00.000000', '2019-11-02 03:49:00'),
(9, 'Python', 0, '2019-11-02 06:22:57.000000', '2019-11-02 06:22:57'),
(10, 'React JS', 0, '2019-11-02 06:35:03.000000', '2019-11-02 06:35:03'),
(11, 'Flutter', 0, '2020-03-04 00:20:10.000000', '2020-03-04 00:20:10');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sargar', 'sagar@nimapinfotech.com', NULL, '1511919f603e917ae2f763b63c5c15b6', NULL, '2020-02-05 05:52:31', '2020-03-18 04:14:33'),
(2, 'Priyank', 'priyank@nimapinfotech.com', '2020-03-18 11:35:17', '8562ae5e286544710b2e7ebe9858833b', NULL, '2020-02-07 00:29:50', '2020-03-18 05:01:27'),
(3, 'Sonatan Bera', 'sonatan@nimapinfotech.com', '2020-03-18 11:35:33', '39e98420b5e98bfbdc8a619bef7b8f61', NULL, '2020-03-18 04:55:01', '2020-03-18 05:01:15'),
(4, 'Kunal Jagtap', 'kunaljagtap@nimapinfotech.com', '2020-03-18 11:28:11', '39e98420b5e98bfbdc8a619bef7b8f61', NULL, '2020-03-18 11:28:14', '2020-03-18 11:28:15'),
(5, 'Brijesh', 'brijesh@nimapinfotech.com', '2020-03-18 11:28:54', '39e98420b5e98bfbdc8a619bef7b8f61', NULL, '2020-03-18 11:29:08', '2020-03-18 11:29:08'),
(18, 'Sonali', 'sonali@nimapinfotech.com', '2020-03-18 11:29:37', '39e98420b5e98bfbdc8a619bef7b8f61', NULL, '2020-03-18 11:29:40', '2020-03-18 11:29:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joininglogs`
--
ALTER TABLE `joininglogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joinings`
--
ALTER TABLE `joinings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_records`
--
ALTER TABLE `monthly_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nonjoinings`
--
ALTER TABLE `nonjoinings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `interviews`
--
ALTER TABLE `interviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `joininglogs`
--
ALTER TABLE `joininglogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `joinings`
--
ALTER TABLE `joinings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `monthly_records`
--
ALTER TABLE `monthly_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nonjoinings`
--
ALTER TABLE `nonjoinings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
