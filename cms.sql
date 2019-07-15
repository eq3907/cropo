-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019-07-01 09:42:17
-- 伺服器版本： 10.3.16-MariaDB
-- PHP 版本： 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `cms`
--

-- --------------------------------------------------------

--
-- 資料表結構 `clear`
--

CREATE TABLE `clear` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `ad_mail` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `clear`
--

INSERT INTO `clear` (`id`, `name`, `email`, `gender`, `tel`, `ad_mail`) VALUES
(1, '王小明', 'abc@yahoo.com.tw', '男', '3345678', '允許購物'),
(2, '王大明', 'abc@yahoo.com.tw', '男', '3345678', '允許購物'),
(3, '王小明', 'abc@yahoo.com.tw', '男', '3345678', '允許購物'),
(4, '王小明', 'abc@yahoo.com.tw', '男', '3345678', '允許購物'),
(5, '王小明', 'abc@yahoo.com.tw', '男', '3345678', '允許購物');

-- --------------------------------------------------------

--
-- 資料表結構 `company`
--

CREATE TABLE `company` (
  `id` int(11) UNSIGNED NOT NULL COMMENT ' 公司編號',
  `company_name` varchar(20) NOT NULL COMMENT '公司名稱',
  `company_tel` varchar(20) NOT NULL COMMENT '公司電話',
  `company_fax` varchar(20) NOT NULL COMMENT '公司傳真',
  `company_address` varchar(100) NOT NULL COMMENT '公司地址',
  `company_tax_id_number` varchar(20) NOT NULL COMMENT '公司統編',
  `company_brief` text NOT NULL COMMENT '公司簡述',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='公司資訊紀錄表';

--
-- 傾印資料表的資料 `company`
--

INSERT INTO `company` (`id`, `company_name`, `company_tel`, `company_fax`, `company_address`, `company_tax_id_number`, `company_brief`, `updated_at`, `created_at`) VALUES
(1, 'company_name', 'company_tel', 'company_fax', 'company_address', '12345678', 'company_brief', '2019-06-17 01:16:39', '2019-06-10 00:00:12'),
(2, '1', '567732987523', '1', '1', '54345346', 'erg4eh', '2019-06-13 02:15:10', '2019-06-09 21:14:38'),
(3, '2', '2', '2', '2', '2dfd', '2', '2019-06-13 02:15:20', '2019-06-09 21:22:28'),
(4, '5', '5', '5', '5', '5', '5', '2019-06-13 02:15:25', '2019-06-09 21:22:48'),
(5, '1', '2', '3', '4', '5', '6', '2019-06-13 02:15:28', '2019-06-09 22:16:29'),
(6, 'rqwwqw', '555', '53453', '2626', '23456', '234232', '2019-06-13 02:15:31', '2019-06-10 02:00:15'),
(7, '4', '4', '5', '5', '5', '5', '2019-06-13 02:15:35', '2019-06-09 23:56:38'),
(8, '查理王', '(02)27208889', '(02) 27598791', '臺北市信義區市府路1號中央區9樓', '3345678', 'huvvouvyfyo54y3hy3h', '2019-06-13 02:15:38', '2019-06-10 00:10:21'),
(9, '查理王QQQQQ', '(02)27208889', '1241241124124', '臺北市信義區市府路1號中央區9樓', '3345678', '325t3434y34y34y', '2019-06-13 00:12:21', '2019-06-13 00:12:21');

-- --------------------------------------------------------

--
-- 資料表結構 `contact_person`
--

CREATE TABLE `contact_person` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '編號',
  `cid` int(11) UNSIGNED DEFAULT NULL COMMENT '公司編號',
  `name` varchar(8) NOT NULL COMMENT '聯絡人姓名',
  `tel` varchar(20) NOT NULL COMMENT '聯絡人電話',
  `mail` varchar(80) NOT NULL COMMENT '聯絡人電子郵件',
  `brief` text NOT NULL COMMENT '簡述',
  `headshot` text NOT NULL COMMENT '大頭照',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='聯絡人紀錄表';

--
-- 傾印資料表的資料 `contact_person`
--

INSERT INTO `contact_person` (`id`, `cid`, `name`, `tel`, `mail`, `brief`, `headshot`, `updated_at`, `created_at`) VALUES
(1, 1, '王小明', '8246527436', '7863457674567', 't44', 'Koala.jpg.jpg', '2019-06-27 21:48:57', '2019-06-10 23:09:51'),
(2, 5, '王小強', '8246527436', '7863457674567', '2343', 'Wooden_block_Y.png.png', '2019-06-18 08:24:01', '2019-06-10 23:24:49'),
(3, 3, 'rrrrr', '8246527436', 'ddt@yahoo.com.tw', 'ABC', 'Wooden_block_Y.png.png', '2019-06-12 18:16:46', '2019-06-11 01:23:45'),
(4, 7, '王小明', '8246527436', 'ddt@yahoo.com.tw', 'ABC', 'sg_0JuchG5Sq6.jpg.jpg', '2019-06-18 08:24:06', '2019-06-11 01:25:37'),
(6, 8, '王小明', '3345678', 'ddt@yahoo.com.tw', 'fgfgfgfgfgff', 'sg_0JuchG5Sq6.jpg.jpg', '2019-06-13 00:29:31', '2019-06-11 01:26:16'),
(7, 1, '王小明ff', '3242', '2324', '234234', 'sg_0JuchG5Sq6.jpg.jpg', '2019-06-13 02:16:08', '2019-06-12 01:31:01'),
(8, 1, 'ABC', '127', 'ddt@yahoo.com.tw', 'ABC', 'sg_0JuchG5Sq6.jpg.jpg', '2019-06-13 00:29:59', '2019-06-12 17:36:11'),
(9, 6, 'a', 'a', 'a', 'AAAAAAAAAA', 'Wooden_block_Y.png.png', '2019-06-12 21:48:33', '2019-06-12 18:13:27'),
(10, 2, '王小明', '8888888', '3233', 'ythr4h4ej', 'Wooden_block_Y.png.png', '2019-06-12 18:29:40', '2019-06-12 18:29:40'),
(11, 4, '王小明', '3223', 'ddt@yahoo.com.tw', 'ffffffffffff', 'sg_0JuchG5Sq6.jpg.jpg', '2019-06-12 20:02:23', '2019-06-12 20:02:23'),
(12, 9, '王小明qqqqq', '8246527436', 'ddt@yahoo.com.tw', 'gggggg', 'sg_0JuchG5Sq6.jpg.jpg', '2019-06-13 00:13:13', '2019-06-13 00:13:13');

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_28_073746_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'edit cms', 'web', '2019-06-28 01:47:32', '2019-06-28 01:47:32');

-- --------------------------------------------------------

--
-- 資料表結構 `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'writer', 'web', '2019-06-28 01:47:32', '2019-06-28 01:47:32');

-- --------------------------------------------------------

--
-- 資料表結構 `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `users`
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
-- 已傾印資料表的索引
--

--
-- 資料表索引 `clear`
--
ALTER TABLE `clear`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `contact_person`
--
ALTER TABLE `contact_person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- 資料表索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- 資料表索引 `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- 資料表索引 `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- 資料表索引 `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `clear`
--
ALTER TABLE `clear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT ' 公司編號', AUTO_INCREMENT=66;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `contact_person`
--
ALTER TABLE `contact_person`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '編號', AUTO_INCREMENT=126;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- 資料表的限制式 `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- 資料表的限制式 `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
