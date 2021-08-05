-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2021 at 06:54 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) NOT NULL,
  `activity` varchar(100) DEFAULT NULL,
  `table` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` varchar(50) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `rel_id` int(11) DEFAULT NULL,
  `current_URL` varchar(255) DEFAULT NULL,
  `description` text,
  `is_customer_log` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `activity`, `table`, `user_id`, `user_ip`, `user_agent`, `rel_id`, `current_URL`, `description`, `is_customer_log`, `created_at`, `updated_at`) VALUES
(1, 'Update', 'user_types', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 5, 'http://127.0.0.1:8000/admin/user_types/store', NULL, 0, '2021-08-05 06:17:01', '2021-08-05 06:17:01'),
(2, 'Update', 'modules', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 10, 'http://127.0.0.1:8000/admin/modules/store', NULL, 0, '2021-08-05 06:41:41', '2021-08-05 06:41:41'),
(3, 'Update', 'modules', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 10, 'http://127.0.0.1:8000/admin/modules/store', NULL, 0, '2021-08-05 06:43:12', '2021-08-05 06:43:12'),
(4, 'Update', 'modules', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 10, 'http://127.0.0.1:8000/admin/modules/store', NULL, 0, '2021-08-05 06:43:20', '2021-08-05 06:43:20'),
(5, 'Update', 'modules', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 10, 'http://127.0.0.1:8000/admin/modules/store', NULL, 0, '2021-08-05 06:44:59', '2021-08-05 06:44:59'),
(6, 'Update', 'user_types', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 5, 'http://127.0.0.1:8000/admin/user_types/store', NULL, 0, '2021-08-05 06:45:46', '2021-08-05 06:45:46'),
(7, 'Update', 'user_types', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 5, 'http://127.0.0.1:8000/admin/user_types/store', NULL, 0, '2021-08-05 06:45:49', '2021-08-05 06:45:49'),
(8, 'Update', 'modules', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 10, 'http://127.0.0.1:8000/admin/modules/store', NULL, 0, '2021-08-05 06:45:56', '2021-08-05 06:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `developer_logs`
--

CREATE TABLE `developer_logs` (
  `id` bigint(20) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `description` text,
  `table` varchar(100) DEFAULT NULL,
  `table_id` bigint(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` varchar(50) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `current_URL` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Resolved') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `icon` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordering` tinyint(4) NOT NULL DEFAULT '100',
  `show_on_menu` tinyint(1) NOT NULL DEFAULT '1',
  `actions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module`, `title`, `parent_id`, `icon`, `image`, `ordering`, `show_on_menu`, `actions`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dashboards', 'Dashboard', 0, 'statistics.png', '3428dashboard (1).png', 1, 1, 'counter_cards|user_statistics|income_expense|modules', 'Active', NULL, '2021-08-03 06:11:12'),
(2, 'modules', 'Modules', 0, 'cpu.png', 'modules.png', 2, 1, 'add|edit|delete|status|import|export|import_module|export_module', 'Active', NULL, '2021-05-19 21:44:42'),
(4, 'users', 'User Managment', 0, 'teacher.png', 'management.png', 1, 1, 'add|edit|delete|view|status', 'Active', NULL, '2021-05-26 20:29:27'),
(5, 'user_types', 'Role Managment', 0, 'checklist.png', 'icon-management-23.png', 2, 1, 'add|edit|delete', 'Active', NULL, '2021-05-26 20:32:59'),
(6, 'pages', 'Pages', 0, 'coding.png', 'coding.png', 2, 1, 'add|edit|delete|view|duplicate|status', 'Inactive', NULL, '2021-04-21 17:04:41'),
(7, 'banner_management', 'Banners', 0, 'image.png', 'image.png', 3, 1, 'add|edit|delete|status|print', 'Inactive', NULL, '2021-04-17 20:56:04'),
(8, 'email_templates', 'Email Templates', 0, 'email.png', 'email.png', 9, 1, 'add|edit|view|delete|status', 'Inactive', NULL, '2021-04-21 17:04:54'),
(9, 'settings', 'Settings', 0, 'settings.png', 'settings.png', 20, 1, 'update', 'Active', NULL, NULL),
(10, 'activity_log', 'Activity Log', 0, 'configuration.png', 'file.png', 100, 1, 'view', 'Active', NULL, '2021-05-19 21:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `access` enum('Public','Private') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `value`, `access`, `created_at`, `updated_at`) VALUES
(1, 'admin_user_type', '1', 'Private', NULL, NULL),
(2, 'client_type_id', '3', 'Private', NULL, NULL),
(3, 'site_title', 'Lathransoft', 'Public', NULL, NULL),
(4, 'contact_email', '', 'Public', NULL, NULL),
(5, 'admin_title', 'Lathransoft', 'Public', NULL, NULL),
(6, 'facebook_url', 'https://www.facebook.com/', 'Public', NULL, NULL),
(7, 'copyright', '© Copyright 2021', 'Public', NULL, NULL),
(9, 'twitter_url', 'https://twitter.com/', 'Public', NULL, NULL),
(10, 'youtube_url', 'https://www.youtube.com', 'Public', NULL, NULL),
(11, 'phone_number', '', 'Public', NULL, NULL),
(17, 'main_nav', '1', 'Public', NULL, NULL),
(18, 'sticky_menu', '2', 'Public', NULL, NULL),
(19, 'instagram_url', '', 'Public', NULL, NULL),
(20, 'pintrest_url', '', 'Public', NULL, NULL),
(37, 'site_description', '', 'Public', NULL, NULL),
(38, 'front_page', '1', 'Public', NULL, NULL),
(39, 'blog_page', '1', 'Public', NULL, NULL),
(40, 'googleplus_url', '', 'Public', NULL, NULL),
(41, 'address', '', 'Public', NULL, NULL),
(42, 'top_nav', '3', 'Public', NULL, NULL),
(48, 'recaptcha_public_key', '', 'Public', NULL, NULL),
(49, 'recaptcha_private_key', '', 'Public', NULL, NULL),
(50, 'recaptcha_skin', 'red', 'Public', NULL, NULL),
(51, 'validation_types', 'custom[number] = Decimal Number\ncustom[integer] = Integer Number\ncustom[email] = Email\ncustom[url] = URL\ncustom[onlyLetter] = Letters\ncustom[onlyLetterNumber] = Letters (a-z, A-Z) or Numbers (0-9)', 'Public', NULL, NULL),
(52, 'frontend_inputs', 'text = Text Field\ntextarea = Text Area\ndate = Date\nboolean = Yes/No\nmultiselect = Multiple Select\nselect = Dropdown\nprice = Price\nfile = Image File\ndb_select = DB Dropdown\ndb_multiselect = DB Multiple Select', 'Public', NULL, NULL),
(53, 'title_prefix', '', 'Public', NULL, NULL),
(54, 'title_suffix', 'PS', 'Public', NULL, NULL),
(55, 'meta_description', '', 'Public', NULL, NULL),
(56, 'meta_keywords', '', 'Public', NULL, NULL),
(57, 'robots', 'INDEX,FOLLOW', 'Public', NULL, NULL),
(58, 'theme', 'adv', 'Public', NULL, NULL),
(59, 'enable_contact', '1', 'Public', NULL, NULL),
(60, 'recipient_email', '', 'Public', NULL, NULL),
(61, 'contcat_email_template', '', 'Public', NULL, NULL),
(75, 'logo', 'logo.png', 'Public', NULL, NULL),
(76, 'favicon', 'favicon.png', 'Public', NULL, NULL),
(77, 'posts_per_page', '10', 'Public', NULL, NULL),
(78, 'tag_line', '', 'Public', NULL, NULL),
(79, 'url_ext', '.html', 'Public', NULL, NULL),
(80, 'company_address', '', 'Public', NULL, NULL),
(81, 'google_analytics_js', '', 'Public', NULL, NULL),
(82, 'shipping', 'a:5:{s:5:\"title\";s:0:\"\";s:6:\"amount\";s:0:\"\";s:4:\"mode\";s:4:\"Test\";s:7:\"api_key\";s:0:\"\";s:11:\"private_key\";s:0:\"\";}', 'Public', NULL, NULL),
(83, 'gmap_api_key', '', 'Public', NULL, NULL),
(84, 'top_text', '', 'Public', NULL, NULL),
(85, 'fax_number', '', 'Public', NULL, NULL),
(86, 'linkedin_url', '', 'Public', NULL, NULL),
(87, 'latitude', '', 'Public', NULL, NULL),
(88, 'longitude', '', 'Public', NULL, NULL),
(94, 'site_loader', 'Off', 'Public', NULL, NULL),
(95, 'skype_name', '', 'Public', NULL, NULL),
(97, 'password_days', '90', 'Public', NULL, NULL),
(98, 'old_password_limit', '5', 'Public', NULL, NULL),
(99, 'old_password_limit_msg', 'You can not have any of your last 5 passwords', 'Public', NULL, NULL),
(101, 'developer', 'Lathransoft', 'Public', NULL, NULL),
(102, 'admin_logo', 'admin_logo.png', 'Public', NULL, NULL),
(103, 'admin_cc_email', '', 'Public', NULL, NULL),
(104, 'gmap_key', '', 'Public', NULL, NULL),
(105, 'social', '{\"facebook\":null,\"twitter\":null,\"youtube\":null,\"googleplus\":null,\"linkedin\":null,\"instagram\":null,\"pinterest\":null,\"skype\":null,\"whatsapp\":null}', 'Public', NULL, NULL),
(106, 'smtp', '{\"status\":\"0\",\"host\":null,\"user\":null,\"pass\":null,\"port\":null}', 'Public', NULL, NULL),
(107, 'recaptcha', '{\"recaptcha_public_key\":\"\",\"recaptcha_private_key\":\"\",\"recaptcha_skin\":\"red\"}', 'Public', NULL, NULL),
(108, 'labels', '[\"\"]', 'Public', NULL, NULL),
(109, 'supplier_type_id', '4', 'Public', NULL, NULL),
(110, 'agent_type_id', '5', 'Public', NULL, NULL),
(112, 'currency', 'PKR', 'Public', NULL, NULL),
(113, 'weekend', 'weekend', 'Public', NULL, NULL),
(114, 'employee_type_id', '6', 'Public', NULL, NULL),
(115, 'salary_head_id', '11', 'Public', NULL, NULL),
(116, 'cash_mode', '1', 'Public', NULL, NULL),
(117, 'salary_head', '11', 'Public', NULL, NULL),
(120, 'cash_account', '3', 'Public', NULL, NULL),
(121, 'tier', '{\"1\":\"8\",\"2\":\"10\"}', 'Public', NULL, NULL),
(122, 'side_logo', 'side_logo1.png', 'Public', NULL, NULL),
(123, 'tag_line', '', 'Public', NULL, NULL),
(124, 'copyright', '© Copyright 2021', 'Public', NULL, NULL),
(125, 'maintenance_mode', 'Inactive', 'Public', NULL, NULL),
(126, 'google_analytics', '', 'Public', NULL, NULL),
(127, 'contact_email', '', 'Public', NULL, NULL),
(128, 'admin_cc_email', '', 'Public', NULL, NULL),
(129, 'phone_number', '', 'Public', NULL, NULL),
(130, 'fax_number', '', 'Public', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `show_title` tinyint(1) NOT NULL DEFAULT '0',
  `tagline` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Published','Unpublished') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unpublished',
  `thumbnail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `template` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `user_only` text COLLATE utf8_unicode_ci,
  `params` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive','Pending') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Active',
  `email_verified_at` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `photo`, `status`, `email_verified_at`, `username`, `password`, `data`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Naufil', 'Khan', 'naufil.khan@lathran.com', NULL, NULL, NULL, NULL, 'Active', NULL, 'developer', '$2y$10$xo3RnddOaaVrWpvggu8Re.9GjOymIgUchPkrZF2V8E2mKtFe8e4QK', NULL, 'mkViqNU2MC2VfJGc9225REZvUCB7NtGDxr84QnLWtyPlDJauFiSTPCb7qDja', '2021-01-02 05:43:47', '2021-06-26 10:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `for` enum('Frontend','Backend','Both','None') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Both',
  `level` tinyint(4) NOT NULL DEFAULT '100',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `user_type`, `for`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Developer', 'Both', 101, '2019-10-31 21:43:29', '2019-10-31 21:43:29'),
(3, 'Super admin', 'Backend', 100, '2019-10-31 21:43:29', '2021-05-26 23:14:15'),
(4, 'Admin', 'Backend', 100, '2021-05-26 20:44:13', '2021-05-26 23:14:41'),
(5, 'Operations', 'Backend', 100, '2021-05-26 23:16:27', '2021-05-26 23:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_type_module_rel`
--

CREATE TABLE `user_type_module_rel` (
  `user_type_id` bigint(20) NOT NULL,
  `module_id` bigint(20) NOT NULL,
  `actions` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type_module_rel`
--

INSERT INTO `user_type_module_rel` (`user_type_id`, `module_id`, `actions`) VALUES
(1, 6, 'add|edit|delete|view|duplicate|status'),
(1, 7, 'add|edit|delete|status|print'),
(1, 8, 'add|edit|view|delete|status'),
(1, 9, 'update'),
(1, 21, ''),
(1, 17, 'add|edit|delete|status|import|export|import_module|export_module'),
(1, 2, 'add|edit|delete|status|import|export|import_module|export_module'),
(1, 3, ''),
(1, 26, 'add|edit|delete'),
(1, 19, 'add|edit|delete|status|import|export|import_module|export_module'),
(1, 25, 'add|edit|delete'),
(1, 18, 'add|edit|delete|status|import|export|import_module|export_module'),
(1, 28, 'add|edit|delete'),
(1, 5, 'add|edit|delete'),
(1, 4, 'add|edit|delete|view|status'),
(1, 38, ''),
(1, 39, ''),
(1, 37, ''),
(1, 40, 'view'),
(1, 41, ''),
(1, 42, ''),
(3, 1, NULL),
(3, 4, 'add|edit|delete|view|status'),
(3, 9, 'update'),
(3, 10, 'view'),
(3, 15, 'add|edit|delete|status|view'),
(3, 16, 'add|edit|delete|status|import|export|import_module|export_module'),
(3, 20, 'add|edit|delete|status|import|export|import_module|export_module'),
(3, 22, 'add|edit'),
(3, 23, 'add|edit'),
(3, 24, NULL),
(3, 26, 'add|edit|delete'),
(3, 27, 'add|edit|delete'),
(3, 28, 'add|edit|delete'),
(3, 29, 'add|edit|delete'),
(3, 30, 'add|edit|delete'),
(3, 31, NULL),
(3, 32, 'edit'),
(3, 33, 'edit|view'),
(3, 34, 'edit|delete'),
(3, 35, 'view'),
(3, 36, NULL),
(3, 38, NULL),
(3, 39, NULL),
(3, 42, NULL),
(3, 40, 'view'),
(1, 24, 'view'),
(1, 32, 'edit'),
(1, 31, 'view'),
(1, 23, 'add|edit'),
(1, 29, 'add|edit|delete'),
(1, 27, 'add|edit|delete'),
(1, 22, 'add|edit'),
(1, 16, 'add|edit|delete|status|import|export|import_module|export_module'),
(1, 30, 'add|edit|delete'),
(1, 34, 'edit|delete'),
(1, 15, 'add|edit|delete|status|view'),
(1, 36, ''),
(1, 43, ''),
(1, 44, ''),
(1, 46, ''),
(1, 20, 'add|edit|delete|status|import|export|import_module|export_module'),
(1, 35, 'view'),
(1, 47, ''),
(1, 48, ''),
(4, 1, NULL),
(4, 45, NULL),
(4, 46, NULL),
(4, 15, 'status|view'),
(4, 24, 'view'),
(4, 26, 'add|edit|delete'),
(4, 28, 'add|edit|delete'),
(4, 31, 'view'),
(4, 32, 'edit'),
(4, 35, 'view'),
(4, 36, NULL),
(4, 38, NULL),
(4, 39, NULL),
(4, 42, NULL),
(4, 40, 'view'),
(4, 43, NULL),
(4, 16, 'add|edit|delete|status'),
(4, 20, 'add|edit|delete|status'),
(4, 22, 'add|edit'),
(4, 23, 'add|edit'),
(4, 27, 'add|edit|delete'),
(4, 29, 'add|edit|delete'),
(4, 30, 'add|edit|delete'),
(4, 44, NULL),
(4, 33, 'view'),
(4, 34, 'edit|delete'),
(4, 47, NULL),
(4, 48, NULL),
(4, 49, NULL),
(1, 33, 'view'),
(1, 49, ''),
(1, 50, 'view'),
(1, 45, ''),
(1, 1, 'counter_cards|user_statistics|income_expense|modules'),
(5, 1, NULL),
(5, 10, 'view'),
(1, 10, 'view');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developer_logs`
--
ALTER TABLE `developer_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modules_module_unique` (`module`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_url_unique` (`url`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_types_user_type_unique` (`user_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `developer_logs`
--
ALTER TABLE `developer_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
