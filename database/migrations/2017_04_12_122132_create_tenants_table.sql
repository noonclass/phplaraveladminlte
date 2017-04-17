--
-- 表的结构 `tenants`
--

CREATE TABLE `tenants` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name` varchar(255) NOT NULL COMMENT '租户名称' ,
`desc` varchar(255) NULL DEFAULT NULL COMMENT '租户描述' ,
`access_number` text NULL COMMENT '呼入小号，用|分割' ,
`extrinsic_number` varchar(32) NULL DEFAULT NULL COMMENT '外显号码' ,
`gateway` varchar(32) NULL DEFAULT NULL COMMENT '外呼网关' ,
`prefix` varchar(32) NULL DEFAULT NULL COMMENT '拨号前缀' ,
`welcome_file` varchar(255) NULL DEFAULT NULL COMMENT '欢迎语文件' ,
`nonwork_file` varchar(255) NULL DEFAULT NULL COMMENT '非工作时间提示语文件' ,
`moh_file` varchar(255) NULL DEFAULT NULL COMMENT '保持音乐文件' ,
`blacklist_on` int(1) NULL DEFAULT 0 COMMENT '黑名单开关，0关闭，1开启' ,
`whitelist_on` int(1) NULL DEFAULT 0 COMMENT '白名单开关，0关闭，1开启' ,
`call_rate` double(11,2) NULL DEFAULT 0.00 COMMENT '费率' ,
`call_package` int(1) NULL DEFAULT 0 COMMENT '是否有通话套餐，0表示没有套餐，1表示有套餐' ,
`call_package_amount` int(11) NULL DEFAULT 0 COMMENT '包月费用' ,
`call_package_minutes` int(11) NULL DEFAULT 0 COMMENT '包月时长' ,
`status` int(1) NOT NULL DEFAULT 1 COMMENT '状态，0停机，1服务中' ,
`created_at` datetime NULL DEFAULT NULL ,
`updated_at` datetime NULL DEFAULT NULL ,
PRIMARY KEY (`id`),
INDEX `id` (`id`) 
);

--
-- 表的结构 `tenantmeta`
--

CREATE TABLE `tenantmeta` (
`meta_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`tenant_id` int(11) NOT NULL ,
`meta_key` varchar(255) DEFAULT NULL,
`meta_value` longtext NULL ,
`created_at` timestamp NULL DEFAULT NULL ,
`updated_at` timestamp NULL DEFAULT NULL ,
PRIMARY KEY (`meta_id`),
INDEX `tenant_id` (`tenant_id`),
INDEX `meta_key` (`meta_key`(191))
);

--
-- 转存表中的数据 `tenantmeta`
--
INSERT INTO `tenantmeta` (`meta_id`, `tenant_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'blacklist_number', '95000'), -- 黑名单中的一个号码
(2, 1, 'whilelist_number', '95000'), -- 白名单中的一个号码
(3, 1, 'week_day', '1'),             -- 工作日,取值范围[0-6],weekday[0]="Sunday"
(4, 1, 'work_hour', '9'),            -- 上班时间,取值范围[0-23]
(5, 1, 'holiday', '2017-05-01');     -- 节假日

--
-- 表的结构 `extensions`
--

CREATE TABLE `extensions` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`number` varchar(32) NOT NULL COMMENT '分机号码' ,
`password` varchar(32) NOT NULL COMMENT '分机密码' ,
`alias_number` varchar(16) NULL DEFAULT NULL COMMENT '外线号码' ,
`tenant_id` int(11) NOT NULL COMMENT '租户ID' ,
`created_at` datetime NULL DEFAULT NULL ,
`updated_at` datetime NULL DEFAULT NULL ,
PRIMARY KEY (`id`),
UNIQUE INDEX `number` (`number`) 
);

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name` varchar(255) NOT NULL COMMENT '用户名/登录名' ,
`fullname` varchar(255) NOT NULL COMMENT '全名/姓名' ,
`email` varchar(255) NOT NULL COMMENT '用户邮箱' ,
`password` varchar(255) NOT NULL COMMENT '用户密码' ,
`remember_token` varchar(100) DEFAULT NULL,
`outdial_on` int(1) NULL DEFAULT 0 COMMENT '外拨权限开关，0关闭，1开启' ,
`outdial_sched` int(8) NULL DEFAULT 3600 COMMENT '外拨时长限制' ,
`divert_on` int(1) NOT NULL DEFAULT 0 COMMENT '来电转移开关，0关闭，1开启无条件转移，2开启无应答或遇忙转移' ,
`divert_number` varchar(32) NULL COMMENT '转移至分机或手机号码' ,
`blacklist_on` int(1) NULL DEFAULT 0 COMMENT '黑名单开关，0关闭，1开启' ,
`whitelist_on` int(1) NULL DEFAULT 0 COMMENT '白名单开关，0关闭，1开启' ,
`status` int(1) NOT NULL DEFAULT 1 COMMENT '状态，0停机，1服务中' ,
`extension_id` int(11) NOT NULL COMMENT '分机ID' ,
`tenant_id` int(11) NOT NULL COMMENT '租户ID' ,
`created_at` timestamp NULL DEFAULT NULL ,
`updated_at` timestamp NULL DEFAULT NULL ,
PRIMARY KEY (`id`),
UNIQUE INDEX `name` (`name`) 
);

--
-- 表的结构 `usermeta`
--

CREATE TABLE `usermeta` (
`meta_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`user_id` int(11) NOT NULL ,
`meta_key` varchar(255) DEFAULT NULL,
`meta_value` longtext NULL ,
`created_at` timestamp NULL DEFAULT NULL ,
`updated_at` timestamp NULL DEFAULT NULL ,
PRIMARY KEY (`meta_id`),
INDEX `user_id` (`user_id`),
INDEX `meta_key` (`meta_key`(191))
);

--
-- 转存表中的数据 `usermeta`
--
INSERT INTO `usermeta` (`meta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'blacklist_number', '95000'), -- 黑名单中的一个号码
(2, 1, 'whilelist_number', '95000'), -- 白名单中的一个号码
(3, 1, 'one_touch_dial', '{"1":"12306","2":"12308"}'); -- 单键拨号配置
