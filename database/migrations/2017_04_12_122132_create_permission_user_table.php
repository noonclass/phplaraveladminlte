CREATE TABLE `tenants` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name` varchar(255) NOT NULL DEFAULT NULL COMMENT '租户名称' ,
`desc` varchar(255) NULL DEFAULT NULL COMMENT '租户描述' ,
`access_number` text NULL COMMENT '呼入小号，用|分割' ,
`extrinsic_number` varchar(32) NULL DEFAULT NULL COMMENT '外显号码' ,
`gateway` varchar(32) NULL DEFAULT NULL COMMENT '外呼网关' ,
`prefix` varchar(32) NULL DEFAULT NULL COMMENT '拨号前缀' ,
`holiday` text NULL COMMENT '节假日，用|分割' ,
`work_day` varchar(16) NULL DEFAULT '|0|1|2|3|4|5|6|' COMMENT '工作日' ,
`work_hour` varchar(128) NULL DEFAULT '|00|01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20|21|22|23|' COMMENT '工作时间' ,
`work_welcome_file` varchar(255) NULL DEFAULT NULL COMMENT '工作时间欢迎语文件' ,
`non_work_welcome_file` varchar(255) NULL DEFAULT NULL COMMENT '非工作时间欢迎语文件' ,
`call_rate` double(11,2) NULL DEFAULT 0.00 COMMENT '费率' ,
`call_package` int(1) NULL DEFAULT 0 COMMENT '是否有通话套餐，0表示没有套餐，1表示有套餐' ,
`call_package_amount` int(11) NULL DEFAULT 0 COMMENT '包月费用' ,
`call_package_minutes` int(11) NULL DEFAULT 0 COMMENT '包月时长' ,
`status` int(1) NOT NULL DEFAULT 1 COMMENT '状态，0停机，1有效' ,
`created_at` datetime NULL DEFAULT NULL ,
`updated_at` datetime NULL DEFAULT NULL ,
PRIMARY KEY (`id`),
INDEX `id` (`id`) 
);

CREATE TABLE `extensions` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`number` varchar(32) NOT NULL DEFAULT NULL COMMENT '分机号码' ,
`password` varchar(32) NOT NULL DEFAULT NULL COMMENT '分机密码' ,
`alias_number` varchar(16) NULL DEFAULT NULL COMMENT '外线号码' ,
`status` int(1) NOT NULL DEFAULT 1 COMMENT '状态，0停机，1服务中' ,
`tenant_id` int(11) NULL DEFAULT NULL COMMENT '租户ID' ,
`created_at` datetime NULL DEFAULT NULL ,
`updated_at` datetime NULL DEFAULT NULL ,
PRIMARY KEY (`id`),
UNIQUE INDEX `number` (`number`) 
);

CREATE TABLE `users` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name` varchar(255) NOT NULL COMMENT '用户名/登录名' ,
`fullname` varchar(255) NOT NULL COMMENT '全名/姓名' ,
`email` varchar(255) NOT NULL COMMENT '用户邮箱' ,
`password` varchar(255) NOT NULL COMMENT '用户密码' ,
`remember_token` varchar(100) DEFAULT NULL,
`status` int(1) NOT NULL DEFAULT 1 COMMENT '状态，0失效，1有效' ,
`extension_id`  varchar(32) NULL DEFAULT '' COMMENT '分机ID' ,
`tenant_id` int(11) NULL DEFAULT NULL COMMENT '租户ID' ,
`created_at` timestamp NULL DEFAULT NULL ,
`updated_at` timestamp NULL DEFAULT NULL ,
PRIMARY KEY (`id`),
UNIQUE INDEX `name` (`name`) 
);