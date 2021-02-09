-- email reminder 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `email_reminder` (
  `id` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_body` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_cc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_email_date` date DEFAULT NULL,
  `send_email_date_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_email_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `email_reminder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  ADD KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  ADD KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  ADD KEY `IDX_NAME` (`name`,`deleted`),
  ADD KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`);


-- sent email reminder
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `sent_email_reminder` (
  `id` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_body` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_cc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_email_date` date DEFAULT NULL,
  `send_email_date_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_email_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `sent_email_reminder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  ADD KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  ADD KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  ADD KEY `IDX_NAME` (`name`,`deleted`),
  ADD KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`);

  -- s_m_s_reminder
  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `s_m_s_reminder` (
  `id` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reminder_date` date DEFAULT NULL,
  `reminder_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_sms_date_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_body` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `s_m_s_reminder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  ADD KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  ADD KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  ADD KEY `IDX_NAME` (`name`,`deleted`),
  ADD KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`);

 -- send_s_m_s_data
 SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `send_s_m_s_data` (
  `id` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reminder_date` date DEFAULT NULL,
  `reminder_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_sms_date_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_body` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_shoot_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `send_s_m_s_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  ADD KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  ADD KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  ADD KEY `IDX_NAME` (`name`,`deleted`),
  ADD KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`);

-- user_sms_limit
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `user_sms_limit` (
  `usl_id` int(11) NOT NULL,
  `usl_userId` varchar(30) DEFAULT NULL COMMENT 'User id ',
  `usl_limit` int(11) DEFAULT NULL COMMENT 'Limit in digits only',
  `usl_createdAt` datetime DEFAULT current_timestamp(),
  `usl_updatedAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `user_sms_limit`
  ADD PRIMARY KEY (`usl_id`);

ALTER TABLE `user_sms_limit`
  MODIFY `usl_id` int(11) NOT NULL AUTO_INCREMENT;

-- message log
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `message_log` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_domain_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_messages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sent_messages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remaining_messages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_expiry_date` date DEFAULT NULL,
  `sender_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `message_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  ADD KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  ADD KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  ADD KEY `IDX_NAME` (`name`,`deleted`),
  ADD KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`);

-- contact_list
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `contact_list` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `totalcontacts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_emails` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `contact_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  ADD KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  ADD KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  ADD KEY `IDX_NAME` (`name`,`deleted`),
  ADD KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`);

 -- contacts
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `list_id` varchar(250) NOT NULL,
  `user_name` varchar(250) DEFAULT NULL,
  `user_email` varchar(250) DEFAULT NULL,
  `phone` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- my campaings
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `my_campaigns` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `campaigns_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_body` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_sms_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_sms_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domainname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `my_campaigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  ADD KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  ADD KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  ADD KEY `IDX_NAME` (`name`,`deleted`),
  ADD KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`);

-- sent_messages
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `sent_messages` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `campaigns_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_body` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sendsmsdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sendsmstime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_s_m_s_sent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_sent_sms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_delivered_s_m_s` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_not_delivered_s_m_s` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `sent_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  ADD KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  ADD KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  ADD KEY `IDX_NAME` (`name`,`deleted`),
  ADD KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`);

-- sent_bulk_sms
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `sent_bulk_sms` (
  `id` int(11) NOT NULL,
  `sent_message_id` varchar(250) DEFAULT NULL,
  `phones` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT 'Not-Delivered',
  `sent_sms_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sms_shoot_id` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `sent_bulk_sms`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `sent_bulk_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

  -- integrations users
  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `integrations_users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) DEFAULT NULL,
  `lead_sorce` varchar(250) NOT NULL,
  `assigned_user_id` varchar(250) DEFAULT NULL,
  `created_by_id` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `integrations_users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `integrations_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- google_webhook_response
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `google_webhook_response` (
  `id` int(11) NOT NULL,
  `google_key` varchar(250) NOT NULL,
  `campaign_id` varchar(250) NOT NULL,
  `form_id` varchar(250) NOT NULL,
  `lead_id` varchar(250) DEFAULT NULL,
  `google_fields_name` varchar(1024) NOT NULL,
  `google_fields_value` varchar(1024) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `google_webhook_response`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `google_key` (`google_key`);

 ALTER TABLE `google_webhook_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

 -- google_form_fields_mapping
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `google_form_fields_mapping` (
  `id` int(11) NOT NULL,
  `google_key` varchar(250) NOT NULL,
  `google_lead_structure` varchar(250) NOT NULL,
  `crm_leads_structure` varchar(250) NOT NULL,
  `created_by_id` varchar(250) DEFAULT NULL,
  `assigned_by_id` varchar(250) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `google_form_fields_mapping`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `google_form_fields_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


-- export
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `export` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `export`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  ADD KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  ADD KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  ADD KEY `IDX_NAME` (`name`,`deleted`),
  ADD KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`);

-- export result
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `export_result` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `entity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_cron_job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `db_query` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_exported` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `columns` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `export_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  ADD KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  ADD KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  ADD KEY `IDX_NAME` (`name`,`deleted`),
  ADD KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`);

-- document_master_3
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `document_master_3` (
  `prefix` varchar(50) NOT NULL DEFAULT 'DM',
  `id` int(11) NOT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `document_name` varchar(500) DEFAULT NULL,
  `document_type` varchar(50) DEFAULT NULL,
  `document_size` varchar(50) DEFAULT NULL,
  `document_content` varchar(5000) DEFAULT NULL,
  `created_user_id` varchar(50) DEFAULT NULL,
  `assigned_user_id` varchar(500) DEFAULT NULL,
  `define_access` varchar(50) DEFAULT NULL,
  `encryption_key` varchar(200) DEFAULT NULL,
  `encryption_name` varchar(200) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `folder_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `document_master_3`
  ADD PRIMARY KEY (`id`);

 -- folder_master_3
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `folder_master_3` (
  `prefix` varchar(50) NOT NULL DEFAULT 'FM',
  `id` int(11) NOT NULL,
  `folder_name` varchar(50) DEFAULT NULL,
  `created_user_id` varchar(50) DEFAULT NULL,
  `assigned_user_id` varchar(50) DEFAULT NULL,
  `define_access` varchar(50) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `folder_master_3`
  ADD PRIMARY KEY (`id`);

 -- sub_folder_master_3
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `sub_folder_master_3` (
  `prefix` varchar(50) NOT NULL DEFAULT 'SFM',
  `id` int(11) NOT NULL,
  `folder_master_id` int(11) DEFAULT NULL,
  `folder_name` varchar(50) DEFAULT NULL,
  `created_user_id` varchar(50) DEFAULT NULL,
  `assigned_user_id` varchar(50) DEFAULT NULL,
  `defineAccess` varchar(50) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `folder_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- default_size_limit
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `default_size_limit` (
  `id` int(11) NOT NULL,
  `size` int(11) DEFAULT 0,
  `createdAt` varchar(50) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- file_delete_request
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `file_delete_request` (
  `id` int(11) NOT NULL,
  `file_id` int(11) DEFAULT 0,
  `user_id` varchar(50) DEFAULT '0',
  `createdAt` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `file_delete_request`
  ADD PRIMARY KEY (`id`);

-- daily_sheet
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `daily_sheet` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `user_parent_id` varchar(50) NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time NOT NULL,
  `daily_sheet_date` date NOT NULL,
  `working_from` varchar(250) NOT NULL,
  `activity_status` tinyint(4) DEFAULT NULL COMMENT '0=inactive,1=draft,2=pending review, 3= accept, 4= reject ',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modify_at` timestamp NULL DEFAULT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `daily_sheet`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `daily_sheet`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- daily activity
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `daily_activity` (
  `id` int(11) NOT NULL,
  `daily_sheet_id` varchar(50) NOT NULL,
  `activity` text NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `attachment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modify_at` timestamp NULL DEFAULT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `daily_activity`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `daily_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- daily_sheet_feedback
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `daily_sheet_feedback` (
  `id` int(16) NOT NULL,
  `daily_sheet_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `feedback_by` tinyint(4) DEFAULT NULL COMMENT '5=user, 6=parent user',
  `created_at` datetime NOT NULL,
  `modify_at` datetime DEFAULT NULL,
  `feedback_attachment` varchar(230) NOT NULL,
  `feedback_given_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `daily_sheet_feedback`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `daily_sheet_feedback`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;

  -- estimate
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `estimate` (
  `id` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adjustments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `billfromname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billingaddressgstin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billtoname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_g_s_t` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `discountamount` double DEFAULT NULL,
  `discountoption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discounttype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discountvalue` double DEFAULT NULL,
  `g_s_t` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `gst_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `hsn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `igst` double DEFAULT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placeofsupply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `s_g_s_t` double DEFAULT NULL,
  `sessionid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shippingaddressgstin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Open',
  `sub_total` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `estimatedate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billfrompanno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billtopanno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_currency` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_g_s_t_currency` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discountamount_currency` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discountvalue_currency` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `igst_currency` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_currency` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_g_s_t_currency` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total_currency` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_currency` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `estimate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  ADD KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  ADD KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  ADD KEY `IDX_ACCOUNT_ID` (`account_id`),
  ADD KEY `IDX_NAME` (`name`,`deleted`),
  ADD KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`);

-- estimate_files
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `estimate_files` (
  `estimate_id` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `filepath` varchar(500) DEFAULT NULL,
  `original_filename` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `estimate_files`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `estimate_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

 -- estimates_items
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `estimates_items` (
  `id` int(11) NOT NULL,
  `estimate_id` varchar(50) DEFAULT NULL,
  `item_name` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `hsn` varchar(100) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `rate` float(10,2) DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `gst_rate` int(11) DEFAULT NULL,
  `igst` double(10,2) NOT NULL DEFAULT 0.00,
  `cgst` double(10,2) NOT NULL DEFAULT 0.00,
  `sgst` double(10,2) NOT NULL DEFAULT 0.00,
  `total` double(10,2) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `discounttype` varchar(50) DEFAULT NULL,
  `discountoption` varchar(50) DEFAULT NULL,
  `discountvalue` varchar(50) DEFAULT NULL,
  `discountamount` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `estimates_items`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `estimates_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- invoice
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `invoice` (
  `id` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adjustments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `bankname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beneficiary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billfromname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billingaddressgstin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billtoname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyerorderno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discountamount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discountoption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discounttype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discountvalue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duedate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimateid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimateno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoicedate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoiceno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `paymentdate` date DEFAULT NULL,
  `paymentstatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placeofsupply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shippingaddressgstin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double DEFAULT NULL,
  `billfrompan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billtopan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance_currency` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_currency` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account1_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  ADD KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  ADD KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  ADD KEY `IDX_ACCOUNT1_ID` (`account1_id`),
  ADD KEY `IDX_ACCOUNT_ID` (`account_id`),
  ADD KEY `IDX_NAME` (`name`,`deleted`),
  ADD KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`);

  -- invoice_files
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `invoice_files` (
  `invoice_id` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `filepath` varchar(500) DEFAULT NULL,
  `original_filename` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `invoice_files`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `invoice_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

 -- invoice_items
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `invoice_items` (
  `id` int(11) NOT NULL,
  `estimate_id` varchar(50) NOT NULL,
  `invoice_id` varchar(50) NOT NULL,
  `item_name` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `hsn` varchar(100) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `rate` float(10,2) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `gst_rate` int(11) NOT NULL,
  `igst` float(10,2) NOT NULL,
  `cgst` float(10,2) NOT NULL,
  `sgst` float(10,2) NOT NULL,
  `total` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `discounttype` varchar(50) DEFAULT NULL,
  `discountoption` varchar(50) DEFAULT NULL,
  `discountvalue` varchar(50) DEFAULT NULL,
  `discountamount` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `invoice_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

  -- payments
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `payments` (
  `id` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amountcredited` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `billedamount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createddate` date DEFAULT NULL,
  `invoiceno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Cash',
  `paymentdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentstatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `paymenttype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdate` date DEFAULT NULL,
  `tds` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amountcredited_currency` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance_currency` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  ADD KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  ADD KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  ADD KEY `IDX_ACCOUNT` (`account_id`),
  ADD KEY `IDX_NAME` (`name`,`deleted`),
  ADD KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`);

  -- closed task
  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `closed_task` (
  `id` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closedat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completedat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_recurring_series_of_tasks` tinyint(1) NOT NULL DEFAULT 0,
  `custom_start_date1` date DEFAULT NULL,
  `custom_start_date2` date DEFAULT NULL,
  `custom_start_date3` date DEFAULT NULL,
  `custom_start_date4` date DEFAULT NULL,
  `custom_start_date5` date DEFAULT NULL,
  `custom_start_date6` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `frequency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Daily',
  `monthly_end_date` date DEFAULT NULL,
  `monthly_repeat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Every Month',
  `monthly_repeat_on` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '01',
  `monthly_start_date` date DEFAULT NULL,
  `number_of_recurring_tasks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `repeat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Every day',
  `start_date` date DEFAULT NULL,
  `weeklyend_date` date DEFAULT NULL,
  `weeklyrepeat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Every week',
  `weeklyrepeat_on` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Monday',
  `weeklystart_date` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_completed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `closed_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  ADD KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  ADD KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  ADD KEY `IDX_NAME` (`name`,`deleted`),
  ADD KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`);

 -- designation
 SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `designation` (
  `id` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  ADD KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  ADD KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  ADD KEY `IDX_NAME` (`name`,`deleted`),
  ADD KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`);

  -- office location
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `office_location` (
  `id` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gstin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typeofoffice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `office_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  ADD KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  ADD KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  ADD KEY `IDX_NAME` (`name`,`deleted`),
  ADD KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`);

  -- Billing Entity 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `billing_entity` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `panno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udyam_registration_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addressstreet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addresscity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addressstate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addresspostalcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `billing_entity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  ADD KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  ADD KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  ADD KEY `IDX_NAME` (`name`,`deleted`),
  ADD KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`);

-- Billing Entity Bannk Details
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `billing_entity_bankdetails` (
  `id` int(11) NOT NULL,
  `billing_entity_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beneficiary_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifsc_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upi_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `billing_entity_bankdetails`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `billing_entity_bankdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- Billing Entity GST Details
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `billing_entity_gstdetails` (
  `id` int(11) NOT NULL,
  `billing_entity_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst_number` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `billing_entity_gstdetails`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `billing_entity_gstdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;