-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-04-25 03:38:29
-- 服务器版本： 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homestead`
--

-- --------------------------------------------------------

--
-- 表的结构 `extensions`
--

CREATE TABLE `extensions` (
  `id` int(11) UNSIGNED NOT NULL,
  `number` varchar(32) NOT NULL COMMENT '分机号码',
  `password` varchar(255) NOT NULL COMMENT '分机密码',
  `alias_number` varchar(32) DEFAULT NULL COMMENT '外线号码',
  `tenant_id` int(11) NOT NULL COMMENT '租户ID',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `extensions`
--

INSERT INTO `extensions` (`id`, `number`, `password`, `alias_number`, `tenant_id`, `created_at`, `updated_at`) VALUES
(1, '10000', '$2y$10$eYJpic4huDnvoIDkq0Nfo.iIUT4wmvXSZfdU.zoRcvJsMk6aXJP16', '95000', 1, '2017-04-17 04:03:15', '2017-04-19 06:33:59'),
(2, '10001', '$2y$10$eYJpic4huDnvoIDkq0Nfo.iIUT4wmvXSZfdU.zoRcvJsMk6aXJP16', '95000', 1, '2017-04-19 06:30:59', '2017-04-19 06:35:42');

-- --------------------------------------------------------

--
-- 表的结构 `fs_cdr`
--

CREATE TABLE `fs_cdr` (
  `caller_id_name` varchar(30) DEFAULT NULL,
  `caller_id_number` varchar(30) DEFAULT NULL,
  `destination_number` varchar(30) NOT NULL,
  `context` varchar(20) DEFAULT NULL,
  `start_stamp` datetime DEFAULT NULL,
  `answer_stamp` datetime DEFAULT NULL,
  `end_stamp` datetime DEFAULT NULL,
  `duration` int(11) DEFAULT NULL COMMENT '总时间',
  `billsec` int(11) DEFAULT NULL COMMENT '接通时长',
  `hangup_cause` varchar(50) DEFAULT NULL,
  `uuid` varchar(100) DEFAULT NULL,
  `bleg_uuid` varchar(100) DEFAULT NULL,
  `accountcode` varchar(10) DEFAULT NULL,
  `read_codec` varchar(100) DEFAULT NULL,
  `write_codec` varchar(100) DEFAULT NULL,
  `callgroup` varchar(100) NOT NULL,
  `direction` varchar(100) NOT NULL,
  `record_file` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_01_15_105324_create_roles_table', 1),
(4, '2015_01_15_114412_create_role_user_table', 1),
(5, '2015_01_26_115212_create_permissions_table', 1),
(6, '2015_01_26_115523_create_permission_role_table', 1),
(7, '2015_02_09_132439_create_permission_user_table', 1);

-- --------------------------------------------------------

--
-- 表的结构 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `permission_user`
--

CREATE TABLE `permission_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '系统管理员', 3, '2017-04-17 01:02:18', '2017-04-17 01:19:24'),
(2, 'Moderator', 'moderator', '租户管理员', 2, '2017-04-17 01:03:51', '2017-04-17 01:03:51'),
(3, 'User', 'user', '注册用户', 1, '2017-04-17 01:04:26', '2017-04-18 01:33:25');

-- --------------------------------------------------------

--
-- 表的结构 `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-04-19 22:54:56', '2017-04-19 22:54:56'),
(2, 2, 2, '2017-04-19 23:07:47', '2017-04-19 23:07:47'),
(3, 3, 3, '2017-04-19 23:08:28', '2017-04-19 23:08:28');

-- --------------------------------------------------------

--
-- 表的结构 `tenantmeta`
--

CREATE TABLE `tenantmeta` (
  `meta_id` int(11) UNSIGNED NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tenantmeta`
--

INSERT INTO `tenantmeta` (`meta_id`, `tenant_id`, `meta_key`, `meta_value`, `created_at`, `updated_at`) VALUES
(1, 1, 'blacklist_number', '95000', NULL, NULL),
(2, 1, 'whilelist_number', '95000', NULL, NULL),
(3, 1, 'week_day', '1', NULL, NULL),
(4, 1, 'work_hour', '9', NULL, NULL),
(5, 1, 'holiday', '2017-05-01', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tenants`
--

CREATE TABLE `tenants` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '租户名称',
  `desc` varchar(255) DEFAULT NULL COMMENT '租户描述',
  `access_number` text COMMENT '呼入小号，用|分割',
  `extrinsic_number` varchar(32) DEFAULT NULL COMMENT '外显号码',
  `gateway` varchar(32) DEFAULT NULL COMMENT '外呼网关',
  `prefix` varchar(32) DEFAULT NULL COMMENT '拨号前缀',
  `welcome_file` varchar(255) DEFAULT NULL COMMENT '欢迎语文件',
  `nonwork_file` varchar(255) DEFAULT NULL COMMENT '非工作时间提示语文件',
  `moh_file` varchar(255) DEFAULT NULL COMMENT '保持音乐文件',
  `blacklist_on` int(1) DEFAULT '0' COMMENT '黑名单开关，0关闭，1开启',
  `whitelist_on` int(1) DEFAULT '0' COMMENT '白名单开关，0关闭，1开启',
  `call_rate` double(11,2) DEFAULT '0.00' COMMENT '费率',
  `call_package` int(1) DEFAULT '0' COMMENT '是否有通话套餐，0表示没有套餐，1表示有套餐',
  `call_package_amount` int(11) DEFAULT '0' COMMENT '包月费用',
  `call_package_minutes` int(11) DEFAULT '0' COMMENT '包月时长',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态，0停机，1服务中',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tenants`
--

INSERT INTO `tenants` (`id`, `name`, `desc`, `access_number`, `extrinsic_number`, `gateway`, `prefix`, `welcome_file`, `nonwork_file`, `moh_file`, `blacklist_on`, `whitelist_on`, `call_rate`, `call_package`, `call_package_amount`, `call_package_minutes`, `status`, `created_at`, `updated_at`) VALUES
(1, '默认租户', 'Default', '4000000000', '95000', 'vos', '46', NULL, NULL, NULL, NULL, NULL, 0.20, NULL, NULL, NULL, 1, '2017-04-17 04:11:48', '2017-04-20 02:02:16');

-- --------------------------------------------------------

--
-- 表的结构 `usermeta`
--

CREATE TABLE `usermeta` (
  `meta_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `usermeta`
--

INSERT INTO `usermeta` (`meta_id`, `user_id`, `meta_key`, `meta_value`, `created_at`, `updated_at`) VALUES
(1, 1, 'blacklist_number', '95000', NULL, NULL),
(2, 1, 'whilelist_number', '95000', NULL, NULL),
(3, 1, 'one_touch_dial', '{\"1\":\"12306\",\"2\":\"12308\"}', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '用户名/登录名',
  `fullname` varchar(255) DEFAULT NULL COMMENT '全名/姓名',
  `email` varchar(255) NOT NULL COMMENT '用户邮箱',
  `password` varchar(255) NOT NULL COMMENT '用户密码',
  `remember_token` varchar(100) DEFAULT NULL,
  `outdial_on` int(1) DEFAULT '0' COMMENT '外拨权限开关，0关闭，1开启',
  `outdial_sched` int(8) DEFAULT '3600' COMMENT '外拨时长限制',
  `divert_on` int(1) NOT NULL DEFAULT '0' COMMENT '来电转移开关，0关闭，1开启无条件转移，2开启无应答或遇忙转移',
  `divert_number` varchar(32) DEFAULT NULL COMMENT '转移至分机或手机号码',
  `blacklist_on` int(1) DEFAULT '0' COMMENT '黑名单开关，0关闭，1开启',
  `whitelist_on` int(1) DEFAULT '0' COMMENT '白名单开关，0关闭，1开启',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态，0停机，1服务中',
  `extension_id` int(11) DEFAULT NULL COMMENT '分机ID',
  `tenant_id` int(11) DEFAULT NULL COMMENT '租户ID',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `fullname`, `email`, `password`, `remember_token`, `outdial_on`, `outdial_sched`, `divert_on`, `divert_number`, `blacklist_on`, `whitelist_on`, `status`, `extension_id`, `tenant_id`, `created_at`, `updated_at`) VALUES
(1, 'webmaster', '网站管理员', 'webmaster@xxx.com', '$2y$10$LVXbfLrm3rhK59atKzzFaetJeH9YyHoWK9umA/xHF8TLScWQ0gn2m', 'cfgop04VFm0X1i7MvuxN9aF6NYu2pNsWJV3hofWDA4bER4nD3lcI6msRMhPg', 0, 3600, 0, NULL, 0, 0, 1, NULL, NULL, '2017-04-16 20:03:15', '2017-04-19 22:54:56'),
(2, 'tenantmaster', '租户管理员', 'tenantmaster@xxx.com', '$2y$10$gGW1Eb.tDo5M2d2UuRrSOuGyGbAfjG.oO8IHgDePN6l7kCTEO9hbm', 'ZHvvLWTKAeOcXyx7ORCakzVhyM5m2T8hSklJNsp4ph6WbYHb87fxHOYXd1Bi', 0, 3600, 0, NULL, 0, 0, 1, 1, 1, '2017-04-17 19:19:45', '2017-04-19 23:07:47'),
(3, 'tester', '测试账号', 'tester@xxx.com', '$2y$10$a6bo34HswqbcZHVydTJpk.h3HGszoi3cn4YkC4Qg9h1YN0KVvug8.', '8obPHoBZL0k5MWgjabJvk55yNmXWF0jQKxtsUpQKcuEZxrE9I3SkEwySbmoK', 0, 3600, 0, NULL, 0, 0, 1, 1, 1, '2017-04-17 19:22:59', '2017-04-19 23:08:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `extensions`
--
ALTER TABLE `extensions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`);

--
-- Indexes for table `fs_cdr`
--
ALTER TABLE `fs_cdr`
  ADD KEY `idx_caller_id_number` (`caller_id_number`) USING BTREE,
  ADD KEY `idx_start_stamp` (`start_stamp`) USING BTREE,
  ADD KEY `idx_uuid` (`uuid`) USING BTREE,
  ADD KEY `idx_destination_number` (`destination_number`) USING BTREE,
  ADD KEY `idx_billsec` (`billsec`) USING BTREE,
  ADD KEY `idx_direction` (`direction`) USING BTREE;

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_index` (`permission_id`),
  ADD KEY `permission_user_user_id_index` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indexes for table `tenantmeta`
--
ALTER TABLE `tenantmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `tenant_id` (`tenant_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`) USING BTREE;

--
-- Indexes for table `usermeta`
--
ALTER TABLE `usermeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `extensions`
--
ALTER TABLE `extensions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `tenantmeta`
--
ALTER TABLE `tenantmeta`
  MODIFY `meta_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `usermeta`
--
ALTER TABLE `usermeta`
  MODIFY `meta_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 限制导出的表
--

--
-- 限制表 `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- 限制表 `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- 限制表 `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
