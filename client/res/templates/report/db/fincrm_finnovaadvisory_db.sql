-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 20, 2020 at 12:20 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fincrm_finnovaadvisory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `abcd`
--

DROP TABLE IF EXISTS `abcd`;
CREATE TABLE IF NOT EXISTS `abcd` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(249) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `sic_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `campaign_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `test15th_march_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CAMPAIGN_ID` (`campaign_id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_CREATED_AT` (`created_at`,`deleted`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_contact`
--

DROP TABLE IF EXISTS `account_contact`;
CREATE TABLE IF NOT EXISTS `account_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_inactive` tinyint(1) DEFAULT 0,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8549F2709B6B5FBAE7A1254A` (`account_id`,`contact_id`),
  KEY `IDX_8549F2709B6B5FBA` (`account_id`),
  KEY `IDX_8549F270E7A1254A` (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_document`
--

DROP TABLE IF EXISTS `account_document`;
CREATE TABLE IF NOT EXISTS `account_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `document_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A0A768C09B6B5FBAC33F7837` (`account_id`,`document_id`),
  KEY `IDX_A0A768C09B6B5FBA` (`account_id`),
  KEY `IDX_A0A768C0C33F7837` (`document_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_portal_user`
--

DROP TABLE IF EXISTS `account_portal_user`;
CREATE TABLE IF NOT EXISTS `account_portal_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D622EDE7A76ED3959B6B5FBA` (`user_id`,`account_id`),
  KEY `IDX_D622EDE7A76ED395` (`user_id`),
  KEY `IDX_D622EDE79B6B5FBA` (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_target_list`
--

DROP TABLE IF EXISTS `account_target_list`;
CREATE TABLE IF NOT EXISTS `account_target_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_list_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `opted_out` tinyint(1) DEFAULT 0,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_589712AA9B6B5FBAF6C6AFE0` (`account_id`,`target_list_id`),
  KEY `IDX_589712AA9B6B5FBA` (`account_id`),
  KEY `IDX_589712AAF6C6AFE0` (`target_list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `action_history_record`
--

DROP TABLE IF EXISTS `action_history_record`;
CREATE TABLE IF NOT EXISTS `action_history_record` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `data` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `ip_address` varchar(39) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_token_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_log_record_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number` (`number`),
  UNIQUE KEY `UNIQ_5C817D7F96901F54` (`number`),
  KEY `IDX_TARGET` (`target_id`,`target_type`),
  KEY `IDX_USER_ID` (`user_id`),
  KEY `IDX_AUTH_TOKEN_ID` (`auth_token_id`),
  KEY `IDX_AUTH_LOG_RECORD_ID` (`auth_log_record_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70812 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `article_category_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`),
  KEY `IDX_ACCOUNT_ID` (`account_id`),
  KEY `IDX_ARTICLE_CATEGORY_ID` (`article_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

DROP TABLE IF EXISTS `article_category`;
CREATE TABLE IF NOT EXISTS `article_category` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `noofsubcategories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noofarticles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `article_category_parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `articles_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`),
  KEY `IDX_ARTICLE_CATEGORY_PARENT_ID` (`article_category_parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

DROP TABLE IF EXISTS `attachment`;
CREATE TABLE IF NOT EXISTS `attachment` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `source_id` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `role` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storage` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storage_file_path` varchar(260) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `global` tinyint(1) NOT NULL DEFAULT 0,
  `parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `related_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `related_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_SOURCE_ID` (`source_id`),
  KEY `IDX_PARENT` (`parent_type`,`parent_id`),
  KEY `IDX_RELATED` (`related_id`,`related_type`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_log_record`
--

DROP TABLE IF EXISTS `auth_log_record`;
CREATE TABLE IF NOT EXISTS `auth_log_record` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `is_denied` tinyint(1) NOT NULL DEFAULT 0,
  `denial_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_time` double DEFAULT NULL,
  `request_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_method` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portal_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_token_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_PORTAL_ID` (`portal_id`),
  KEY `IDX_USER_ID` (`user_id`),
  KEY `IDX_AUTH_TOKEN_ID` (`auth_token_id`),
  KEY `IDX_IP_ADDRESS` (`ip_address`),
  KEY `IDX_IP_ADDRESS_REQUEST_TIME` (`ip_address`,`request_time`),
  KEY `IDX_REQUEST_TIME` (`request_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_token`
--

DROP TABLE IF EXISTS `auth_token`;
CREATE TABLE IF NOT EXISTS `auth_token` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `token` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hash` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `last_access` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `portal_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_TOKEN` (`token`,`deleted`),
  KEY `IDX_HASH` (`hash`),
  KEY `IDX_USER_ID` (`user_id`),
  KEY `IDX_PORTAL_ID` (`portal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `autofollow`
--

DROP TABLE IF EXISTS `autofollow`;
CREATE TABLE IF NOT EXISTS `autofollow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ENTITY_TYPE` (`entity_type`),
  KEY `IDX_USER_ID` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ayush`
--

DROP TABLE IF EXISTS `ayush`;
CREATE TABLE IF NOT EXISTS `ayush` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `a_b_c_d`
--

DROP TABLE IF EXISTS `a_b_c_d`;
CREATE TABLE IF NOT EXISTS `a_b_c_d` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `call`
--

DROP TABLE IF EXISTS `call`;
CREATE TABLE IF NOT EXISTS `call` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Planned',
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `direction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Outbound',
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_PARENT` (`parent_id`,`parent_type`),
  KEY `IDX_ACCOUNT_ID` (`account_id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_DATE_START_STATUS` (`date_start`,`status`),
  KEY `IDX_DATE_START` (`date_start`,`deleted`),
  KEY `IDX_STATUS` (`status`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`),
  KEY `IDX_ASSIGNED_USER_STATUS` (`assigned_user_id`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `call_contact`
--

DROP TABLE IF EXISTS `call_contact`;
CREATE TABLE IF NOT EXISTS `call_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `call_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT 'None',
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_99C77F0D50A89B2CE7A1254A` (`call_id`,`contact_id`),
  KEY `IDX_99C77F0D50A89B2C` (`call_id`),
  KEY `IDX_99C77F0DE7A1254A` (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `call_lead`
--

DROP TABLE IF EXISTS `call_lead`;
CREATE TABLE IF NOT EXISTS `call_lead` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `call_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lead_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT 'None',
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1F10069750A89B2C55458D` (`call_id`,`lead_id`),
  KEY `IDX_1F10069750A89B2C` (`call_id`),
  KEY `IDX_1F10069755458D` (`lead_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `call_user`
--

DROP TABLE IF EXISTS `call_user`;
CREATE TABLE IF NOT EXISTS `call_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `call_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT 'None',
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_BA12B115A76ED39550A89B2C` (`user_id`,`call_id`),
  KEY `IDX_BA12B115A76ED395` (`user_id`),
  KEY `IDX_BA12B11550A89B2C` (`call_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

DROP TABLE IF EXISTS `campaign`;
CREATE TABLE IF NOT EXISTS `campaign` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Planning',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Email',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `budget` double DEFAULT NULL,
  `mail_merge_only_with_address` tinyint(1) NOT NULL DEFAULT 1,
  `budget_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contacts_template_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `leads_template_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `accounts_template_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `users_template_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_CONTACTS_TEMPLATE_ID` (`contacts_template_id`),
  KEY `IDX_LEADS_TEMPLATE_ID` (`leads_template_id`),
  KEY `IDX_ACCOUNTS_TEMPLATE_ID` (`accounts_template_id`),
  KEY `IDX_USERS_TEMPLATE_ID` (`users_template_id`),
  KEY `IDX_CREATED_AT` (`created_at`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaign_log_record`
--

DROP TABLE IF EXISTS `campaign_log_record`;
CREATE TABLE IF NOT EXISTS `campaign_log_record` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `action` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_date` datetime DEFAULT NULL,
  `data` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string_data` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string_additional_data` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT 'Finnova',
  `created_at` datetime DEFAULT NULL,
  `is_test` tinyint(1) NOT NULL DEFAULT 0,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `campaign_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `queue_item_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_CAMPAIGN_ID` (`campaign_id`),
  KEY `IDX_PARENT` (`parent_id`,`parent_type`),
  KEY `IDX_OBJECT` (`object_id`,`object_type`),
  KEY `IDX_QUEUE_ITEM_ID` (`queue_item_id`),
  KEY `IDX_ACTION_DATE` (`action_date`,`deleted`),
  KEY `IDX_ACTION` (`action`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaign_target_list`
--

DROP TABLE IF EXISTS `campaign_target_list`;
CREATE TABLE IF NOT EXISTS `campaign_target_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_list_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_511AD253F639F774F6C6AFE0` (`campaign_id`,`target_list_id`),
  KEY `IDX_511AD253F639F774` (`campaign_id`),
  KEY `IDX_511AD253F6C6AFE0` (`target_list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaign_target_list_excluding`
--

DROP TABLE IF EXISTS `campaign_target_list_excluding`;
CREATE TABLE IF NOT EXISTS `campaign_target_list_excluding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_list_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_ED6FB4A6F639F774F6C6AFE0` (`campaign_id`,`target_list_id`),
  KEY `IDX_ED6FB4A6F639F774` (`campaign_id`),
  KEY `IDX_ED6FB4A6F6C6AFE0` (`target_list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaign_tracking_url`
--

DROP TABLE IF EXISTS `campaign_tracking_url`;
CREATE TABLE IF NOT EXISTS `campaign_tracking_url` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `campaign_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CAMPAIGN_ID` (`campaign_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case`
--

DROP TABLE IF EXISTS `case`;
CREATE TABLE IF NOT EXISTS `case` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'New',
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Normal',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lead_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `inbound_email_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number` (`number`),
  UNIQUE KEY `UNIQ_7808990496901F54` (`number`),
  KEY `IDX_ACCOUNT_ID` (`account_id`),
  KEY `IDX_LEAD_ID` (`lead_id`),
  KEY `IDX_CONTACT_ID` (`contact_id`),
  KEY `IDX_INBOUND_EMAIL_ID` (`inbound_email_id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_STATUS` (`status`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`),
  KEY `IDX_ASSIGNED_USER_STATUS` (`assigned_user_id`,`status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_contact`
--

DROP TABLE IF EXISTS `case_contact`;
CREATE TABLE IF NOT EXISTS `case_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `case_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E3C11333CF10D4F5E7A1254A` (`case_id`,`contact_id`),
  KEY `IDX_E3C11333CF10D4F5` (`case_id`),
  KEY `IDX_E3C11333E7A1254A` (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_knowledge_base_article`
--

DROP TABLE IF EXISTS `case_knowledge_base_article`;
CREATE TABLE IF NOT EXISTS `case_knowledge_base_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `case_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `knowledge_base_article_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_FE20B41CF10D4F59D68CDED` (`case_id`,`knowledge_base_article_id`),
  KEY `IDX_FE20B41CF10D4F5` (`case_id`),
  KEY `IDX_FE20B419D68CDED` (`knowledge_base_article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_under_discussion`
--

DROP TABLE IF EXISTS `client_under_discussion`;
CREATE TABLE IF NOT EXISTS `client_under_discussion` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating_agency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'CARE',
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latest_rating_date` date DEFAULT NULL,
  `concerned_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_banker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lead_type` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_rs_in_crore` double DEFAULT NULL,
  `amount_rs_in_crore_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating_status` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_under_discussion_new`
--

DROP TABLE IF EXISTS `client_under_discussion_new`;
CREATE TABLE IF NOT EXISTS `client_under_discussion_new` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating_agency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latest_rating_date` date DEFAULT NULL,
  `concerned_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_banker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lead_type` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_rs_in_crore` double DEFAULT NULL,
  `amount_rs_in_crore_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating_status` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `closed_task`
--

DROP TABLE IF EXISTS `closed_task`;
CREATE TABLE IF NOT EXISTS `closed_task` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Open',
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Normal',
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `date_start_date` date DEFAULT NULL,
  `date_end_date` date DEFAULT NULL,
  `date_completed` datetime DEFAULT NULL,
  `parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `abcd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_recurring_series_of_tasks` tinyint(1) NOT NULL DEFAULT 0,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `frequency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Daily',
  `repeat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Every day',
  `weeklyrepeat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Every week',
  `weeklyrepeat_on` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Monday',
  `weeklystart_date` date DEFAULT NULL,
  `weeklyend_date` date DEFAULT NULL,
  `monthly_repeat_on` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '01',
  `monthly_start_date` date DEFAULT NULL,
  `monthly_end_date` date DEFAULT NULL,
  `monthly_repeat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Every Month',
  `number_of_recurring_tasks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `custom_start_date1` date DEFAULT NULL,
  `custom_start_date2` date DEFAULT NULL,
  `custom_start_date3` date DEFAULT NULL,
  `custom_start_date4` date DEFAULT NULL,
  `custom_start_date5` date DEFAULT NULL,
  `custom_start_date6` date DEFAULT NULL,
  `completedat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closedat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`),
  KEY `IDX_PARENT` (`parent_id`,`parent_type`),
  KEY `IDX_ACCOUNT_ID` (`account_id`),
  KEY `IDX_CONTACT_ID` (`contact_id`),
  KEY `IDX_DATE_START_STATUS` (`date_start`,`status`),
  KEY `IDX_DATE_END_STATUS` (`date_end`,`status`),
  KEY `IDX_DATE_START` (`date_start`,`deleted`),
  KEY `IDX_STATUS` (`status`,`deleted`),
  KEY `IDX_ASSIGNED_USER_STATUS` (`assigned_user_id`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `salutation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `account_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `do_not_call` tinyint(1) NOT NULL DEFAULT 0,
  `address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `campaign_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `income_tax_password` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_s_t_password` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `g_s_t_user_i_d` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_contact` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ACCOUNT_ID` (`account_id`),
  KEY `IDX_CAMPAIGN_ID` (`campaign_id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_CREATED_AT` (`created_at`,`deleted`),
  KEY `IDX_FIRST_NAME` (`first_name`,`deleted`),
  KEY `IDX_NAME` (`first_name`,`last_name`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_document`
--

DROP TABLE IF EXISTS `contact_document`;
CREATE TABLE IF NOT EXISTS `contact_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `document_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_424C16E1E7A1254AC33F7837` (`contact_id`,`document_id`),
  KEY `IDX_424C16E1E7A1254A` (`contact_id`),
  KEY `IDX_424C16E1C33F7837` (`document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_meeting`
--

DROP TABLE IF EXISTS `contact_meeting`;
CREATE TABLE IF NOT EXISTS `contact_meeting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meeting_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT 'None',
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6F3AC0B8E7A1254A67433D9C` (`contact_id`,`meeting_id`),
  KEY `IDX_6F3AC0B8E7A1254A` (`contact_id`),
  KEY `IDX_6F3AC0B867433D9C` (`meeting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_opportunity`
--

DROP TABLE IF EXISTS `contact_opportunity`;
CREATE TABLE IF NOT EXISTS `contact_opportunity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `opportunity_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_ED257C69E7A1254A9A34590F` (`contact_id`,`opportunity_id`),
  KEY `IDX_ED257C69E7A1254A` (`contact_id`),
  KEY `IDX_ED257C699A34590F` (`opportunity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_target_list`
--

DROP TABLE IF EXISTS `contact_target_list`;
CREATE TABLE IF NOT EXISTS `contact_target_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_list_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `opted_out` tinyint(1) DEFAULT 0,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E77C5117E7A1254AF6C6AFE0` (`contact_id`,`target_list_id`),
  KEY `IDX_E77C5117E7A1254A` (`contact_id`),
  KEY `IDX_E77C5117F6C6AFE0` (`target_list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `corporate_data_base`
--

DROP TABLE IF EXISTS `corporate_data_base`;
CREATE TABLE IF NOT EXISTS `corporate_data_base` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `concerned_person` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_i_n_no` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_up_capital_rs_in_crore` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charges_rs_in_crore` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `directors` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankers` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_incorporation` date DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `constitution` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry_sector` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_d_iscussion` date DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `corporate_finance_running_cases`
--

DROP TABLE IF EXISTS `corporate_finance_running_cases`;
CREATE TABLE IF NOT EXISTS `corporate_finance_running_cases` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `concerned_person` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stream` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
CREATE TABLE IF NOT EXISTS `currency` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `rate` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_g_t_m_s_e`
--

DROP TABLE IF EXISTS `c_g_t_m_s_e`;
CREATE TABLE IF NOT EXISTS `c_g_t_m_s_e` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `paid_up_capital_amount_rs_in_crore` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_incorporation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concerned_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `database_master`
--

DROP TABLE IF EXISTS `database_master`;
CREATE TABLE IF NOT EXISTS `database_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `database_name` varchar(50) DEFAULT NULL,
  `database_user` varchar(50) DEFAULT NULL,
  `database_password` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `database_retail_loan`
--

DROP TABLE IF EXISTS `database_retail_loan`;
CREATE TABLE IF NOT EXISTS `database_retail_loan` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `salutation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `salary` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_skills` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume_title` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_FIRST_NAME` (`first_name`,`deleted`),
  KEY `IDX_NAME` (`first_name`,`last_name`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_base`
--

DROP TABLE IF EXISTS `data_base`;
CREATE TABLE IF NOT EXISTS `data_base` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `salutation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_base_parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_base_parent1_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_FIRST_NAME` (`first_name`,`deleted`),
  KEY `IDX_NAME` (`first_name`,`last_name`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`),
  KEY `IDX_DATA_BASE_PARENT_ID` (`data_base_parent_id`),
  KEY `IDX_DATA_BASE_PARENT1_ID` (`data_base_parent1_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_base_data_base`
--

DROP TABLE IF EXISTS `data_base_data_base`;
CREATE TABLE IF NOT EXISTS `data_base_data_base` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `left_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `right_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `UNIQ_139D2FCCE26CCE0254976835` (`left_id`,`right_id`),
  KEY `IDX_139D2FCCE26CCE02` (`left_id`),
  KEY `IDX_139D2FCC54976835` (`right_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_base_retail`
--

DROP TABLE IF EXISTS `data_base_retail`;
CREATE TABLE IF NOT EXISTS `data_base_retail` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `salutation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `education` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_FIRST_NAME` (`first_name`,`deleted`),
  KEY `IDX_NAME` (`first_name`,`last_name`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_base_retail_loan`
--

DROP TABLE IF EXISTS `data_base_retail_loan`;
CREATE TABLE IF NOT EXISTS `data_base_retail_loan` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `salutation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_skills` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_FIRST_NAME` (`first_name`,`deleted`),
  KEY `IDX_NAME` (`first_name`,`last_name`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_test`
--

DROP TABLE IF EXISTS `data_test`;
CREATE TABLE IF NOT EXISTS `data_test` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `default_size_limit`
--

DROP TABLE IF EXISTS `default_size_limit`;
CREATE TABLE IF NOT EXISTS `default_size_limit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size` int(11) DEFAULT 0,
  `createdAt` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

DROP TABLE IF EXISTS `demo`;
CREATE TABLE IF NOT EXISTS `demo` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `demo_entity`
--

DROP TABLE IF EXISTS `demo_entity`;
CREATE TABLE IF NOT EXISTS `demo_entity` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
CREATE TABLE IF NOT EXISTS `designation` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `displayin_task`
--

DROP TABLE IF EXISTS `displayin_task`;
CREATE TABLE IF NOT EXISTS `displayin_task` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `file_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `folder_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_FOLDER_ID` (`folder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_document`
--

DROP TABLE IF EXISTS `document_document`;
CREATE TABLE IF NOT EXISTS `document_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `left_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `right_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_57A87B2FE26CCE0254976835` (`left_id`,`right_id`),
  KEY `IDX_57A87B2FE26CCE02` (`left_id`),
  KEY `IDX_57A87B2F54976835` (`right_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_folder`
--

DROP TABLE IF EXISTS `document_folder`;
CREATE TABLE IF NOT EXISTS `document_folder` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_PARENT_ID` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_folder_path`
--

DROP TABLE IF EXISTS `document_folder_path`;
CREATE TABLE IF NOT EXISTS `document_folder_path` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ascendor_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descendor_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ASCENDOR_ID` (`ascendor_id`),
  KEY `IDX_DESCENDOR_ID` (`descendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_lead`
--

DROP TABLE IF EXISTS `document_lead`;
CREATE TABLE IF NOT EXISTS `document_lead` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lead_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8F25ED58C33F783755458D` (`document_id`,`lead_id`),
  KEY `IDX_8F25ED58C33F7837` (`document_id`),
  KEY `IDX_8F25ED5855458D` (`lead_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_master`
--

DROP TABLE IF EXISTS `document_master`;
CREATE TABLE IF NOT EXISTS `document_master` (
  `prefix` varchar(50) NOT NULL DEFAULT 'DM',
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1118 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `document_master_3`
--

DROP TABLE IF EXISTS `document_master_3`;
CREATE TABLE IF NOT EXISTS `document_master_3` (
  `prefix` varchar(50) NOT NULL DEFAULT 'DM',
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1722 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `document_master_old`
--

DROP TABLE IF EXISTS `document_master_old`;
CREATE TABLE IF NOT EXISTS `document_master_old` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folder_id` int(11) DEFAULT NULL,
  `document_name` varchar(500) DEFAULT NULL,
  `document_type` varchar(50) DEFAULT NULL,
  `document_size` varchar(50) DEFAULT NULL,
  `document_content` varchar(5000) DEFAULT NULL,
  `created_user_id` varchar(50) DEFAULT NULL,
  `assigned_user_id` varchar(500) DEFAULT NULL,
  `define_access` varchar(50) DEFAULT NULL,
  `createdAt` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1410 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `document_opportunity`
--

DROP TABLE IF EXISTS `document_opportunity`;
CREATE TABLE IF NOT EXISTS `document_opportunity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `opportunity_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_120F4BDC33F78379A34590F` (`document_id`,`opportunity_id`),
  KEY `IDX_120F4BDC33F7837` (`document_id`),
  KEY `IDX_120F4BD9A34590F` (`opportunity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `d_e_m_o_e_n_t_i_t_y`
--

DROP TABLE IF EXISTS `d_e_m_o_e_n_t_i_t_y`;
CREATE TABLE IF NOT EXISTS `d_e_m_o_e_n_t_i_t_y` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ek_entity`
--

DROP TABLE IF EXISTS `ek_entity`;
CREATE TABLE IF NOT EXISTS `ek_entity` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
CREATE TABLE IF NOT EXISTS `email` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_string` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_to_string` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_name_map` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_replied` tinyint(1) NOT NULL DEFAULT 0,
  `message_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `message_id_internal` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_plain` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_html` tinyint(1) NOT NULL DEFAULT 1,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Archived',
  `has_attachment` tinyint(1) NOT NULL DEFAULT 0,
  `date_sent` datetime DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `is_system` tinyint(1) NOT NULL DEFAULT 0,
  `from_email_address_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sent_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `replied_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_MESSAGE_ID` (`message_id`),
  KEY `IDX_FROM_EMAIL_ADDRESS_ID` (`from_email_address_id`),
  KEY `IDX_PARENT` (`parent_id`,`parent_type`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_SENT_BY_ID` (`sent_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_REPLIED_ID` (`replied_id`),
  KEY `IDX_ACCOUNT_ID` (`account_id`),
  KEY `IDX_DATE_SENT` (`date_sent`,`deleted`),
  KEY `IDX_DATE_SENT_STATUS` (`date_sent`,`status`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_account`
--

DROP TABLE IF EXISTS `email_account`;
CREATE TABLE IF NOT EXISTS `email_account` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `email_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '143',
  `ssl` tinyint(1) NOT NULL DEFAULT 0,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monitored_folders` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'INBOX',
  `sent_folder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_sent_emails` tinyint(1) NOT NULL DEFAULT 0,
  `keep_fetched_emails_unread` tinyint(1) NOT NULL DEFAULT 0,
  `fetch_since` date DEFAULT NULL,
  `fetch_data` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `use_imap` tinyint(1) NOT NULL DEFAULT 1,
  `use_smtp` tinyint(1) NOT NULL DEFAULT 0,
  `smtp_host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_port` int(11) DEFAULT 25,
  `smtp_auth` tinyint(1) NOT NULL DEFAULT 0,
  `smtp_security` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_folder_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EMAIL_FOLDER_ID` (`email_folder_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_address`
--

DROP TABLE IF EXISTS `email_address`;
CREATE TABLE IF NOT EXISTS `email_address` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `lower` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `invalid` tinyint(1) NOT NULL DEFAULT 0,
  `opt_out` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `IDX_LOWER` (`lower`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_email_account`
--

DROP TABLE IF EXISTS `email_email_account`;
CREATE TABLE IF NOT EXISTS `email_email_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_32C12DC3A832C1C937D8AD65` (`email_id`,`email_account_id`),
  KEY `IDX_32C12DC3A832C1C9` (`email_id`),
  KEY `IDX_32C12DC337D8AD65` (`email_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_email_address`
--

DROP TABLE IF EXISTS `email_email_address`;
CREATE TABLE IF NOT EXISTS `email_email_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_address_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_type` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_42B914E6A832C1C959045DAAF19287C2` (`email_id`,`email_address_id`,`address_type`),
  KEY `IDX_42B914E6A832C1C9` (`email_id`),
  KEY `IDX_42B914E659045DAA` (`email_address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_filter`
--

DROP TABLE IF EXISTS `email_filter`;
CREATE TABLE IF NOT EXISTS `email_filter` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_contains` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_global` tinyint(1) NOT NULL DEFAULT 0,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Skip',
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_folder_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_PARENT` (`parent_id`,`parent_type`),
  KEY `IDX_EMAIL_FOLDER_ID` (`email_folder_id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_folder`
--

DROP TABLE IF EXISTS `email_folder`;
CREATE TABLE IF NOT EXISTS `email_folder` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `order` int(11) DEFAULT NULL,
  `skip_notifications` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_inbound_email`
--

DROP TABLE IF EXISTS `email_inbound_email`;
CREATE TABLE IF NOT EXISTS `email_inbound_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `inbound_email_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_41D62720A832C1C9E540AEA2` (`email_id`,`inbound_email_id`),
  KEY `IDX_41D62720A832C1C9` (`email_id`),
  KEY `IDX_41D62720E540AEA2` (`inbound_email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_queue_item`
--

DROP TABLE IF EXISTS `email_queue_item`;
CREATE TABLE IF NOT EXISTS `email_queue_item` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attempt_count` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `sent_at` datetime DEFAULT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_test` tinyint(1) NOT NULL DEFAULT 0,
  `mass_email_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_MASS_EMAIL_ID` (`mass_email_id`),
  KEY `IDX_TARGET` (`target_id`,`target_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_reminder`
--

DROP TABLE IF EXISTS `email_reminder`;
CREATE TABLE IF NOT EXISTS `email_reminder` (
  `er_id` int(11) NOT NULL AUTO_INCREMENT,
  `er_emailTo` varchar(255) DEFAULT NULL,
  `er_emailCc` varchar(255) DEFAULT NULL,
  `er_subject` varchar(255) DEFAULT NULL,
  `er_emailBody` text DEFAULT NULL,
  `er_fileName` varchar(255) DEFAULT NULL,
  `er_fileType` varchar(255) DEFAULT NULL,
  `er_fileSize` varchar(255) DEFAULT NULL,
  `er_sendEmailDate` date DEFAULT NULL,
  `er_sendEmailTime` time DEFAULT NULL,
  `er_sendEmailDateTime` datetime DEFAULT NULL,
  `er_folderName` varchar(255) DEFAULT NULL,
  `er_emailStatus` tinyint(4) DEFAULT NULL COMMENT '0 = Pending, 1 = Sent',
  `er_status` tinyint(4) DEFAULT NULL COMMENT '0 = Inactive, 1 = Active',
  `er_createdBy` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Added by user id',
  `er_createdAt` datetime DEFAULT NULL,
  `er_updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`er_id`)
) ENGINE=InnoDB AUTO_INCREMENT=400 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_reminder`
--

INSERT INTO `email_reminder` (`er_id`, `er_emailTo`, `er_emailCc`, `er_subject`, `er_emailBody`, `er_fileName`, `er_fileType`, `er_fileSize`, `er_sendEmailDate`, `er_sendEmailTime`, `er_sendEmailDateTime`, `er_folderName`, `er_emailStatus`, `er_status`, `er_createdBy`, `er_createdAt`, `er_updatedAt`) VALUES
(1, 'achyut.gaikwad71@gmail.com', 'a.gaikwad@finnovaadvisory.com', 'Email Reminder', '<p>Email Body</p>\r\n', 'Penguins.jpg', 'image/jpeg', '777835', '2019-01-30', '15:00:00', '2019-01-30 15:00:00', 'finnova', 1, 0, '5d78b5d5b1ff35c45', '2019-01-30 10:22:50', NULL),
(3, 'achyut.gaikwad71@gmail.com', 'a.gaikwad@finnovaadvisory.com', 'Reminder', '<p>sadfasdf</p>\r\n', 'Tulips.jpg', 'image/jpeg', '620888', '2019-02-07', '14:30:00', '2019-02-07 14:30:00', NULL, NULL, 1, '5d78b5d5b1ff35c45', '2019-02-07 08:55:27', NULL),
(4, 'uuayush@gmail.com', 'uuayush@gmail.com', 'aszfd', '<p>gvjk kj, ,</p>\r\n', '', '', '0', '2019-02-07', '13:05:00', '2019-02-07 13:05:00', NULL, NULL, 1, '5d78b5d5b1ff35c45', '2019-02-07 09:08:14', NULL),
(5, 'uuayush@gmail.com', 'uuayush@gmail.com', 'efwqfwqf', '<p>gewgwe</p>\r\n', '', '', '0', '2019-02-07', '16:20:00', '2019-02-07 16:20:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-02-07 09:11:43', NULL),
(6, 'achyut.gaikwad71@gmail.com', '', '', '<p>fdgsdg</p>\r\n', '', '', '0', '2019-02-07', '16:05:00', '2019-02-07 16:05:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-02-07 10:30:37', NULL),
(7, 'a.gaikwad@finnovaadvisory.com', '', '', '<p>fajksdf</p>\r\n', '', '', '0', '2019-02-07', '16:10:00', '2019-02-07 16:10:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-02-07 10:32:44', NULL),
(8, 'achyut.gaikwad71@gmail.com', '', '', '<p>Hi</p>\r\n', '', '', '0', '2019-02-08', '10:00:00', '2019-02-08 10:00:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-02-08 04:25:06', NULL),
(9, 'achyut.gaikwad71@gmail.com', 'gachyut88@gmail.com', 'TEST', '<p><br />\r\nHI ACHYUT</p>\r\n', 'Koala.jpg, Lighthouse.jpg', 'image/jpeg', '561276', '2019-03-18', '11:05:00', '2019-03-18 11:05:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-03-18 05:34:09', NULL),
(10, 'achyut.gaikwad71@gmail.com', 'gachyut88@gmail.com', 'TEST', '<p><br />\r\nHI ACHYUT</p>\r\n', 'Koala.jpg, Lighthouse.jpg', 'image/jpeg', '561276', '2019-03-18', '11:10:00', '2019-03-18 11:10:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-03-18 05:36:26', NULL),
(11, 'achyut.gaikwad71@gmail.com', 'gachyut88@gmail.com', 'DEMO', '<p><br />\r\nHI ACHYUT</p>\r\n', 'detail.tpl', 'application/octet-stream', '5997', '2019-03-18', '18:35:00', '2019-03-18 18:35:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-03-18 11:15:42', NULL),
(12, 'a.gaikwad@finnovaadvisory.com', 'achyut.gaikwad71@gmail.com', 'DEMO TEST', '<p><br />\r\nHI ACHYUT</p>\r\n', 'MyChangesInCRM.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', '17278', '2019-03-18', '17:35:00', '2019-03-18 17:35:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-03-18 11:24:13', NULL),
(13, 'a.gaikwad@finnovaadvisory', 'gachyut88@gmail.com', 'DEMO BULK EMAIL TESTING', '<p><br />\r\nHI ACHYUT</p>\r\n', 'abcd.html', 'text/html', '324', '2019-03-18', '17:55:00', '2019-03-18 17:55:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-03-18 11:26:50', NULL),
(14, 'a.gaikwad@finnovaadvisory.com', 'achyut.gaikwad71@gmail.com', 'DEMO', '<p><br />\r\nHI</p>\r\n', 'abcd.html', 'text/html', '324', '2019-03-18', '18:30:00', '2019-03-18 18:30:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-03-18 11:27:55', NULL),
(15, 'a.gaikwad@finnovaadvisory.com', 'achyut.gaikwad71@gmail.com', 'DEMO_CRM', '<p><br />\r\nHI ACHYUT</p>\r\n', 'xyz.html', 'text/html', '111', '2019-03-18', '18:43:00', '2019-03-18 18:43:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-03-18 11:29:21', NULL),
(16, 'achyut.gaikwad71@gmail.com', '', '', '<p><br />\r\nHI ACHYUT</p>\r\n', 'Untitled_123.png', 'image/png', '14482', '2019-03-19', '18:30:00', '2019-03-19 18:30:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-03-19 06:30:25', NULL),
(17, 'achyut.gaikwad71@gmail.com', '', 'DEMO', '<p><br />\r\nHI ACHYUT ONE MORE DEMO</p>\r\n', 'Untitled_123.png', 'image/png', '14482', '2019-03-19', '19:25:00', '2019-03-19 19:25:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-03-19 06:55:14', NULL),
(18, 'achyut.gaikwad71@gmail.com', '', 'DEMO', '<p><br />\r\nHI ACHYUT ONE MORE DEMO</p>\r\n', 'Untitled_123.png', 'image/png', '14482', '2019-03-19', '19:25:00', '2019-03-19 19:25:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-03-19 06:56:11', NULL),
(19, 'achyut.gaikwad71@gmail.com', '', '', '<p><br />\r\nHI ACHYUT</p>\r\n', 'Untitled_123.png', 'image/png', '14482', '2019-03-19', '19:40:00', '2019-03-19 19:40:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-03-19 06:58:34', NULL),
(20, 'achyut.gaikwad71@gmail.com', '', '', '<p><br />\r\nHI ACHYUT</p>\r\n', 'Untitled_123.png', 'image/png', '14482', '2019-03-19', '19:40:00', '2019-03-19 19:40:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-03-19 07:02:15', NULL),
(21, 'achyut.gaikwad71@gmail.com', '', '', '<p><br />\r\nHiii</p>\r\n', 'Untitled_123.png', 'image/png', '14482', '2019-03-19', '18:35:00', '2019-03-19 18:35:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-03-19 07:02:50', NULL),
(22, 'achyut.gaikwad71@gmail.com', '', '', '<p><br />\r\nHHHHH</p>\r\n', 'imageedit_1_2863036919.png', 'image/png', '18535', '2019-03-19', '14:33:00', '2019-03-19 14:33:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-03-19 07:03:51', NULL),
(23, 'achyut.gaikwad71@gmail.com', '', '', '<p>HII</p>\r\n', 'Untitled_123.png', 'image/png', '14482', '2019-03-19', '15:15:00', '2019-03-19 15:15:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-03-19 07:05:12', NULL),
(24, 'achyut.gaikwad71@gmail.com', 'a.gaikwad@finnovaadvisory.com', 'DEMO EMAIL ', '<p>Hi ACHYUT</p>\r\n', 'Screenshot (1).png', 'image/png', '193924', '2019-04-04', '13:10:00', '2019-04-04 13:10:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-04-04 07:33:23', NULL),
(25, 'achyut.gaikwad71@gmail.com', '', 'DEMO', '<p><br />\r\nABCD</p>\r\n', '1.PNG', 'image/png', '19441', '2019-04-15', '13:20:00', '2019-04-15 13:20:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-04-15 07:15:36', NULL),
(26, 'achyut.gaikwad71@gmail.com', '', '', '<p><br />\r\nDEMO</p>\r\n', '5.PNG', 'image/png', '18205', '2019-04-15', '13:05:00', '2019-04-15 13:05:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-04-15 07:26:14', NULL),
(27, 'achyut.gaikwad71@gmail.com', '', '', '<p><br />\r\nDEMO</p>\r\n', '', '', '0', '2019-04-15', '13:05:00', '2019-04-15 13:05:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-04-15 07:28:51', NULL),
(28, 'a.gaikwad@finnovaadvisory.com', '', '', '<p><br />\r\nDDEEMMOO</p>\r\n', '', '', '0', '2019-04-15', '13:10:00', '2019-04-15 13:10:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-04-15 07:30:25', NULL),
(29, 'akagarwal@finnovaadvisory.com', '', 'Test Mail', '<p>This&nbsp;is test mail</p>\r\n', 'Anil Member Card.pdf', 'application/pdf', '144413', '2019-04-16', '13:05:00', '2019-04-16 13:05:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-04-16 07:16:18', NULL),
(30, 'akagarwal@finnovaadvisory.com', '', 'Test', '<p>Test Mail</p>\r\n', 'Anil Member Card.pdf', 'application/pdf', '144413', '2019-04-16', '13:05:00', '2019-04-16 13:05:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-04-16 07:17:43', NULL),
(31, 'shweta@finnovaadvisory.com', '', 'Reminder Mail - SKS Fastners', '<p>Call for Rating</p>\r\n', '', '', '0', '2019-06-05', '11:05:00', '2019-06-05 11:05:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-04-18 09:50:59', NULL),
(32, 'shweta@finnovaadvisory.com', '', 'Meeting for Rating', '<p>As per Conversation with Vijaya,she told me to call in 1st week of May for asking Meeting.</p>\r\n', '', '', '0', '2019-05-02', '10:00:00', '2019-05-02 10:00:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-04-18 11:12:37', NULL),
(33, 'shweta@finnovaadvisory.com', '', 'Meeting for Rating', '<p>As per Conversation with Vijaya,she told me to call in 1st week of May for asking Meeting.</p>\r\n', '', '', '0', '2019-05-02', '10:00:00', '2019-05-02 10:00:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-04-18 11:12:40', NULL),
(34, 'shweta@finnovaadvisory.com', '', 'Meeting for Rating', '<p>As per Conversation with Vijaya,she told me to call in 1st week of May for asking Meeting.</p>\r\n', '', '', '0', '2019-05-02', '10:00:00', '2019-05-02 10:00:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-04-18 11:12:50', NULL),
(35, 'shweta@finnovaadvisory.com', '', 'Meeting for Rating', '<p>As per Conversation with Vijaya,she told me to call in 1st week of May for asking Meeting.</p>\r\n', '', '', '0', '2019-05-02', '10:00:00', '2019-05-02 10:00:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-04-18 11:12:50', NULL),
(36, 'shweta@finnovaadvisory.com', '', 'Enpro Industries Pvt Ltd', '<p>Mr Iyer told me to meet in first week of May....</p>\r\n', '', '', '0', '2019-05-06', '11:00:00', '2019-05-06 11:00:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-04-22 11:53:42', NULL),
(37, 'shweta@finnovaadvisory.com', '', 'Finearc system pvt ltd', '<p>Has to call to CA regarding rating through SMERA</p>\r\n', '', '', '0', '2019-04-27', '11:00:00', '2019-04-27 11:00:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-04-23 06:51:16', NULL),
(38, 'shweta@finnovaadvisory.com', '', 'Parason Machinery India Private Limited', '<p>Mr vipra told me to call tomorrow at 10:30,so he will arrange a call with Mr Malpani,CA</p>\r\n', '', '', '0', '2019-04-24', '10:30:00', '2019-04-24 10:30:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-04-23 08:41:54', NULL),
(39, 'shweta@finnovaadvisory.com', '', 'Pepermint clothing', '<p>ask for meeting</p>\r\n', '', '', '0', '2019-04-29', '10:30:00', '2019-04-29 10:30:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-04-26 08:35:00', NULL),
(40, 'shweta@finnovaadvisory.com', '', 'Pepermint clothing', '<p>ask for meeting&nbsp;</p>\r\n', '', '', '0', '2019-04-29', '10:30:00', '2019-04-29 10:30:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-04-26 08:36:56', NULL),
(41, 'shweta@finnovaadvisory.com', '', 'Maharashtra Biofertilizers', '<p>Call on 6th for meeting</p>\r\n', '', '', '0', '2019-05-06', '10:30:00', '2019-05-06 10:30:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-04-29 12:01:28', NULL),
(42, 'achyut.gaikwad71@gmail.com', 'a.gaikwad@finnovaadvisory.com', 'DEMO', '<p>HI Achyut</p>\r\n', '', '', '0', '2019-05-08', '17:26:00', '2019-05-08 17:26:00', NULL, NULL, 0, '5d78b5d5b1ff35c45', '2019-05-08 05:36:15', NULL),
(45, 'shweta@finnovaadvisory.com', '', 'shell N tubes meeting', '<p>call to mr Mehta for rating meeting</p>\r\n', '', '', '0', '2019-08-01', '10:30:00', '2019-08-01 10:30:00', 'finnovaadvisory', NULL, 0, '0', '2019-05-27 12:58:11', NULL),
(46, 'shweta@finnovaadvisory.com', '', 'shell N tubes meeting', '<p>call for rating meeting</p>\r\n', '', '', '0', '2019-08-01', '10:30:00', '2019-08-01 10:30:00', 'finnovaadvisory', NULL, 0, '0', '2019-05-27 13:10:44', NULL),
(47, 'shweta@finnovaadvisory.com', '', 'shell N tubes meeting', '<p>call for rating meeting</p>\r\n', '', '', '0', '2019-08-01', '10:30:00', '2019-08-01 10:30:00', 'finnovaadvisory', NULL, 0, '0', '2019-05-27 13:10:54', NULL),
(48, 'shweta@finnovaadvisory.com', '', 'Great wall', '<p>Ask for rating</p>\r\n', '', '', '0', '2019-09-03', '10:30:00', '2019-09-03 10:30:00', 'finnovaadvisory', NULL, 0, '0', '2019-05-28 12:01:58', NULL),
(49, 'shweta@finnovaadvisory.com', 'akagarwal@finnovaadvisory.com', 'Nikhil Construction', '<p>I have to call to Mr Kularni ,for seeking an appointment on monday for Rating.</p>\r\n', '', '', '0', '2019-06-08', '10:00:00', '2019-06-08 10:00:00', 'finnovaadvisory', NULL, 0, '0', '2019-06-03 09:50:20', NULL),
(50, 'shweta@finnovaadvisory.com', 'akagarwal@finnovaadvisory.com', 'Nikhil Construction', '<p>We have a meeting today at 11 am&nbsp; with Mr Sandeep kulkarni,CFO of Nikhil Construction regarding Credit Rating.Existing Rating is BB+ from CARE.</p>\r\n', '', '', '0', '2019-06-12', '09:00:00', '2019-06-12 09:00:00', 'finnovaadvisory', NULL, 0, '0', '2019-06-11 06:43:49', NULL),
(51, 'shweta@finnovaadvisory.com', 'akagarwal@finnovaadvisory.com', 'shraddha Energy and Infraprojects pvt ltd', '<p>Today we have a second &nbsp;Meeting with Deshpande sir (CFO)....</p>\r\n', '', '', '0', '2019-06-13', '09:00:00', '2019-06-13 09:00:00', 'finnovaadvisory', NULL, 0, '0', '2019-06-11 07:07:38', NULL),
(52, 'pqr@gmail.com', '', '', '<p>DEMO</p>\r\n', 'Sugar.pdf', 'application/pdf', '3221439', '2019-06-13', '18:30:00', '2019-06-13 18:30:00', 'finnovaadvisory', NULL, 0, '0', '2019-06-13 10:40:49', NULL),
(53, 'shweta@finnovaadvisory.com', '', 'Jaywant sugars ltd', '<p>Has to call for rating</p>\r\n', '', '', '0', '2019-06-24', '10:30:00', '2019-06-24 10:30:00', 'finnovaadvisory', NULL, 0, '0', '2019-06-19 10:35:54', NULL),
(54, 'shweta@finnovaadvisory.com', '', 'Panchshil Infrastructure Holdings Private Limited', '<p>Call for meeting</p>\r\n', '', '', '0', '2019-07-01', '10:30:00', '2019-07-01 10:30:00', 'finnovaadvisory', NULL, 0, '0', '2019-06-24 08:21:34', NULL),
(55, 'shweta@finnovaadvisory.com', '', 'Arihant syncotex', '<p>call to know the CRISIL rating</p>\r\n', '', '', '0', '2019-07-22', '10:30:00', '2019-07-22 10:30:00', 'finnovaadvisory', NULL, 0, '0', '2019-07-04 12:06:18', NULL),
(56, 'shweta@finnovaadvisory.com', '', 'Harsh construction', '<p>call for rating</p>\r\n', '', '', '0', '2019-07-23', '10:30:00', '2019-07-23 10:30:00', 'finnovaadvisory', NULL, 0, '0', '2019-07-08 11:50:47', NULL),
(57, 'shweta@finnovaadvisory.com', '', 'deesan agro', '<p>Has to call to MD for rating</p>\r\n', '', '', '0', '2019-08-01', '10:30:00', '2019-08-01 10:30:00', 'finnovaadvisory', NULL, 0, '0', '2019-07-17 08:20:53', NULL),
(58, 'achyut.gaikwad71@gmail.com', 'a.gaikwad@finnovaadvisory.com', 'Email Reminder', '<p>This is email reminder from FinCRM</p>\r\n', 'imp.pdf', 'application/pdf', '1701753', '2019-08-02', '12:03:00', '2019-08-02 12:03:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-01 07:00:23', NULL),
(59, 'achyut.gaikwad71@gmail.com', 'a.gaikwad@finnovaadvisory.com', 'Email Reminder', '<p>HI ACHYUT</p>\r\n', 'annual_report_2009.pdf', 'application/pdf', '10762150', '2019-08-02', '11:59:00', '2019-08-02 11:59:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-01 07:08:38', NULL),
(60, 'achyut.gaikwad71@gmail.com', 'a.gaikwad@finnovaadvisory.com', 'DEMO12', '<p>DEMO EMAIL REMINDER</p>\r\n', '', '', '0', '2019-08-02', '12:02:00', '2019-08-02 12:02:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-02 04:22:18', NULL),
(61, 'achyut.gaikwad71@gmail.com', 'a.gaikwad@finnovaadvisory.com', 'TEST EMAIL', '<p>Hi THis is email reminder from FINCRM</p>\r\n', 'Jellyfish.jpg, Koala.jpg, Lighthouse - Copy.jpg', 'image/jpeg', '561276', '2019-08-02', '12:05:00', '2019-08-02 12:05:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-02 06:34:40', NULL),
(62, 'a.gaikwad@finnovaadvisory.com', 'achyut.gaikwad71@gmail.com', 'Reminder', '<p>Hi Achyut,</p>\r\n\r\n<p>This is email reminder from FinCRM</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Regards</p>\r\n\r\n<p>FinCRM</p>\r\n', 'Jellyfish.jpg, Koala.jpg, Lighthouse - Copy.jpg, Lighthouse.jpg, paint.png', 'image/png', '21801', '2019-08-02', '12:15:00', '2019-08-02 12:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-02 06:37:34', NULL),
(63, 'a.gaikwad@finnovaadvisory.com', 'achyut.gaikwad71@gmail.com', 'DEMO', '<p>HI ACHYUT</p>\r\n', 'Lighthouse - Copy.jpg', 'image/jpeg', '561276', '2019-08-02', '12:31:00', '2019-08-02 12:31:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-02 06:54:43', NULL),
(64, 'akagarwal@finnovaadvisory.com', '', 'Testttt Mail', '<p>Testttt Mail</p>\r\n', '', '', '0', '2019-08-02', '13:05:00', '2019-08-02 13:05:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-02 07:21:10', NULL),
(65, 'vaibhav.bhosale503@gmail.com', '', 'Testin email reminder', '<p>Done!</p>\r\n', '', '', '0', '2019-08-09', '09:27:00', '2019-08-09 09:27:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-09 03:55:02', NULL),
(66, 'vrushali.finnovaadvisory@gmail.com', 'vaibhav.bhosale503@gmail.com', 'Testing Purpose', '<p>Testinngggggg</p>\r\n', 'manufacture.jpg, marketing.png', 'image/png', '166383', '2019-08-09', '09:37:00', '2019-08-09 09:37:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-09 04:06:04', NULL),
(67, 'vrushali.finnovaadvisory@gmail.com', 'vaibhav.bhosale503@gmail.com', 'Testing Purpose', '<p>hiiiiiiiiiiiiiiiii</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'manufacture.jpg, marketing.png', 'image/png', '166383', '2019-08-09', '09:40:00', '2019-08-09 09:40:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-09 04:07:23', NULL),
(68, 'akagarwal@finnovaadvisory.com', '', 'Reminder', '<p>Please take payment from the company</p>\r\n', '', '', '0', '2019-08-23', '22:14:00', '2019-08-23 22:14:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-23 16:39:26', NULL),
(69, 'achyut.gaikwad71@gmail.com', '', 'DEMO', '<p>TEST EMAIL REMINDER</p>\r\n', '', '', '0', '2019-08-24', '13:18:00', '2019-08-24 13:18:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-24 07:46:17', NULL),
(70, 'achyut.gaikwad71@gmail.com', 'a.gaikwad@finnovaadvisory.com', 'DEMO EMAIL TEST', '<p>HI ACHYUT&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Regard&#39;s&nbsp;</p>\r\n\r\n<p>FinCRM</p>\r\n', 'imp.pdf', 'application/pdf', '1701753', '2019-08-24', '19:45:00', '2019-08-24 19:45:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-24 10:29:47', NULL),
(71, 'vaibhav.bhosale503@gmail.com', '', 'testing', '<p>test</p>\r\n', '', '', '0', '2019-08-27', '09:00:00', '2019-08-27 09:00:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-26 11:13:13', NULL),
(72, 'finance@finnovaadvisory.com', '', 'hi', '<p>no subject</p>\r\n', '', '', '0', '2019-09-01', '15:00:00', '2019-09-01 15:00:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:02:08', NULL),
(73, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-02', '15:00:00', '2019-09-02 15:00:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:35:08', NULL),
(74, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-03', '15:15:00', '2019-09-03 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:43:57', NULL),
(75, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-04', '15:15:00', '2019-09-04 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:44:37', NULL),
(76, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-12-02', '15:15:00', '2019-12-02 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:45:22', NULL),
(77, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-05', '15:00:00', '2019-09-05 15:00:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:45:47', NULL),
(78, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-06', '15:15:00', '2019-09-06 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:46:34', NULL),
(79, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-12-03', '15:15:00', '2019-12-03 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:46:57', NULL),
(80, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-07', '15:15:00', '2019-09-07 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:49:50', NULL),
(81, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '1970-01-01', '15:15:00', '1970-01-01 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:50:13', NULL),
(82, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-06', '15:15:00', '2019-09-06 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:50:44', NULL),
(83, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-08', '15:15:00', '2019-09-08 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:51:09', NULL),
(84, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-08', '15:15:00', '2019-09-08 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:51:51', NULL),
(85, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-09', '15:15:00', '2019-09-09 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:52:22', NULL),
(86, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-10', '15:15:00', '2019-09-10 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:53:06', NULL),
(87, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-11', '15:15:00', '2019-09-11 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:54:07', NULL),
(88, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-12', '15:15:00', '2019-09-12 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:54:27', NULL),
(89, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-13', '15:15:00', '2019-09-13 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:55:05', NULL),
(90, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-14', '15:15:00', '2019-09-14 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:55:23', NULL),
(91, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-15', '15:15:00', '2019-09-15 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:55:42', NULL),
(92, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-16', '15:15:00', '2019-09-16 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:56:03', NULL),
(93, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-17', '15:15:00', '2019-09-17 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:56:22', NULL),
(94, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-18', '15:15:00', '2019-09-18 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:56:40', NULL),
(95, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-19', '15:15:00', '2019-09-19 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:56:58', NULL),
(96, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-09-20', '15:15:00', '2019-09-20 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 07:57:17', NULL),
(97, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing</p>\r\n', '', '', '0', '2019-10-01', '15:15:00', '2019-10-01 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:07:23', NULL),
(98, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-02', '15:15:00', '2019-10-02 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:07:54', NULL),
(99, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-03', '15:15:00', '2019-10-03 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:08:14', NULL),
(100, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-04', '15:15:00', '2019-10-04 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:08:38', NULL),
(101, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-12-12', '15:00:00', '2019-12-12 15:00:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:08:59', NULL),
(102, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-05', '15:15:00', '2019-10-05 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:09:20', NULL),
(103, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-06', '15:15:00', '2019-10-06 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:09:39', NULL),
(104, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing    </p>\r\n', 'ring.png, , ', 'image/png, , ', '2803, 0, ', '2020-01-01', '15:15:00', '2020-01-01 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:10:01', NULL),
(105, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-07', '15:15:00', '2019-10-07 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:14:02', NULL),
(106, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-12-15', '15:15:00', '2019-12-15 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:16:30', NULL),
(107, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp; &nbsp;&nbsp;</p>\r\n', '', '', '0', '2019-10-08', '15:15:00', '2019-10-08 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:17:06', NULL),
(108, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-12-16', '15:15:00', '2019-12-16 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:17:25', NULL),
(109, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-09', '15:15:00', '2019-10-09 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:17:44', NULL),
(110, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-09', '15:15:00', '2019-10-09 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:18:06', NULL),
(111, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-10', '15:15:00', '2019-10-10 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:18:35', NULL),
(112, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-11', '15:15:00', '2019-10-11 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:18:56', NULL),
(113, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-12', '15:15:00', '2019-10-12 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:19:16', NULL),
(114, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-13', '15:15:00', '2019-10-13 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:19:40', NULL),
(115, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-14', '15:15:00', '2019-10-14 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:20:04', NULL),
(116, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-16', '15:15:00', '2019-10-16 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:21:53', NULL),
(117, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-17', '15:15:00', '2019-10-17 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:22:11', NULL),
(118, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-18', '15:15:00', '2019-10-18 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:22:35', NULL),
(119, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-18', '15:15:00', '2019-10-18 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:22:55', NULL),
(120, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-18', '15:15:00', '2019-10-18 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:23:14', NULL),
(121, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-12-13', '15:15:00', '2019-12-13 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:23:34', NULL),
(122, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-19', '15:15:00', '2019-10-19 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:23:53', NULL),
(123, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-10-20', '15:15:00', '2019-10-20 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:24:12', NULL),
(124, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-01', '15:15:00', '2019-11-01 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:35:15', NULL),
(125, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-02', '15:15:00', '2019-11-02 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:35:37', NULL),
(126, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-03', '15:15:00', '2019-11-03 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:35:57', NULL),
(127, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-04', '15:15:00', '2019-11-04 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:36:19', NULL),
(128, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-05', '15:15:00', '2019-11-05 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:36:45', NULL),
(129, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-06', '15:15:00', '2019-11-06 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:37:08', NULL),
(130, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-07', '15:15:00', '2019-11-07 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:37:34', NULL),
(131, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-08', '15:15:00', '2019-11-08 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:37:56', NULL),
(132, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-08', '15:15:00', '2019-11-08 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:38:16', NULL),
(133, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-09', '15:15:00', '2019-11-09 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:38:45', NULL),
(134, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-10', '15:15:00', '2019-11-10 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:39:33', NULL),
(135, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-11', '15:15:00', '2019-11-11 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:41:40', NULL),
(136, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-12', '15:15:00', '2019-11-12 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:43:37', NULL),
(137, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-13', '15:15:00', '2019-11-13 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:44:19', NULL),
(138, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-14', '15:15:00', '2019-11-14 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:44:37', NULL),
(139, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-15', '15:15:00', '2019-11-15 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:44:56', NULL),
(140, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-16', '15:15:00', '2019-11-16 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:45:15', NULL),
(141, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-16', '15:15:00', '2019-11-16 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:45:34', NULL),
(142, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-17', '15:15:00', '2019-11-17 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:45:52', NULL),
(143, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-12-01', '15:15:00', '2019-12-01 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:46:23', NULL),
(144, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-18', '15:15:00', '2019-11-18 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:46:46', NULL),
(145, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-19', '15:15:00', '2019-11-19 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:47:04', NULL),
(146, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-11-20', '15:15:00', '2019-11-20 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:47:23', NULL),
(147, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-12-06', '15:15:00', '2019-12-06 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:51:51', NULL),
(148, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-12-07', '15:15:00', '2019-12-07 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:52:22', NULL),
(149, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-12-08', '15:15:00', '2019-12-08 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:52:53', NULL),
(150, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-12-08', '15:15:00', '2019-12-08 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:54:26', NULL),
(151, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-12-09', '15:15:00', '2019-12-09 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:54:52', NULL),
(152, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-12-10', '15:15:00', '2019-12-10 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:55:11', NULL),
(153, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-12-11', '15:15:00', '2019-12-11 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 08:55:36', NULL),
(154, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-12-17', '15:15:00', '2019-12-17 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:02:30', NULL),
(155, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-12-18', '15:15:00', '2019-12-18 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:02:52', NULL),
(156, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-12-19', '15:15:00', '2019-12-19 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:03:15', NULL),
(157, 'finance@finnovaadvisory.com', '', 'Testing', '<p>Testing&nbsp;&nbsp; &nbsp;</p>\r\n', '', '', '0', '2019-12-20', '15:15:00', '2019-12-20 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:03:35', NULL),
(158, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-01', '15:15:00', '2020-01-01 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:08:17', NULL),
(159, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-02', '15:15:00', '2020-01-02 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:08:32', NULL),
(160, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-03', '15:15:00', '2020-01-03 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:08:48', NULL),
(161, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-04', '15:15:00', '2020-01-04 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:09:03', NULL),
(162, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-05', '15:15:00', '2020-01-05 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:09:19', NULL),
(163, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-06', '15:15:00', '2020-01-06 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:09:37', NULL),
(164, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-07', '15:15:00', '2020-01-07 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:09:52', NULL),
(165, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-09', '15:15:00', '2020-01-09 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:10:20', NULL),
(166, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-08', '15:15:00', '2020-01-08 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:10:34', NULL),
(167, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-10', '15:15:00', '2020-01-10 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:14:11', NULL),
(168, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-11', '15:15:00', '2020-01-11 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:14:31', NULL),
(169, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-12', '15:15:00', '2020-01-12 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:15:31', NULL),
(170, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-13', '15:15:00', '2020-01-13 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:15:48', NULL),
(171, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-14', '15:15:00', '2020-01-14 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:16:07', NULL),
(172, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-15', '15:15:00', '2020-01-15 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:16:25', NULL),
(173, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-16', '15:15:00', '2020-01-16 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:16:42', NULL),
(174, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-17', '15:15:00', '2020-01-17 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:17:01', NULL),
(175, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-18', '15:15:00', '2020-01-18 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:17:21', NULL),
(176, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-19', '15:15:00', '2020-01-19 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:17:39', NULL),
(177, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-01-20', '15:15:00', '2020-01-20 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:17:59', NULL),
(178, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-01', '15:15:00', '2020-02-01 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:18:39', NULL),
(179, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-02', '15:15:00', '2020-02-02 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:18:58', NULL),
(180, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-03', '15:15:00', '2020-02-03 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:19:26', NULL),
(181, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-04', '15:15:00', '2020-02-04 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:19:45', NULL),
(182, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-05', '15:15:00', '2020-02-05 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:20:07', NULL),
(183, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-06', '15:15:00', '2020-02-06 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:20:24', NULL),
(184, 'finance@finnovaadvisory.com', '', '', '', '', '', '0', '2020-02-06', '15:15:00', '2020-02-06 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:20:51', NULL),
(185, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-07', '15:15:00', '2020-02-07 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:21:11', NULL),
(186, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-08', '15:15:00', '2020-02-08 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:21:29', NULL),
(187, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-09', '15:15:00', '2020-02-09 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:21:48', NULL),
(188, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-10', '15:15:00', '2020-02-10 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:22:23', NULL),
(189, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-11', '15:15:00', '2020-02-11 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:22:41', NULL),
(190, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-12', '15:15:00', '2020-02-12 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:23:00', NULL),
(191, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-13', '15:15:00', '2020-02-13 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:23:24', NULL),
(192, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-14', '15:15:00', '2020-02-14 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:24:00', NULL),
(193, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-15', '15:15:00', '2020-02-15 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:24:20', NULL),
(194, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-16', '15:15:00', '2020-02-16 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:24:40', NULL),
(195, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-17', '15:15:00', '2020-02-17 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:25:06', NULL),
(196, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-18', '15:15:00', '2020-02-18 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:25:28', NULL),
(197, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-19', '15:15:00', '2020-02-19 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:25:46', NULL),
(198, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-02-20', '15:15:00', '2020-02-20 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:26:05', NULL),
(199, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-01', '15:15:00', '2020-03-01 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:32:39', NULL),
(200, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-02', '15:15:00', '2020-03-02 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:32:59', NULL),
(201, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-03', '15:15:00', '2020-03-03 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:33:21', NULL),
(202, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-04', '15:15:00', '2020-03-04 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:33:40', NULL),
(203, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-05', '15:15:00', '2020-03-05 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:33:59', NULL),
(204, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-06', '15:15:00', '2020-03-06 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:34:18', NULL),
(205, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-06', '15:15:00', '2020-03-06 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:35:17', NULL),
(206, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-07', '15:15:00', '2020-03-07 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:35:35', NULL),
(207, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-08', '15:15:00', '2020-03-08 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:35:57', NULL),
(208, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-09', '15:15:00', '2020-03-09 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:36:20', NULL),
(209, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-10', '15:15:00', '2020-03-10 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:36:41', NULL),
(210, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-11', '15:15:00', '2020-03-11 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:37:01', NULL),
(211, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-12', '15:15:00', '2020-03-12 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:37:23', NULL),
(212, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-13', '15:15:00', '2020-03-13 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:37:45', NULL),
(213, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-14', '15:15:00', '2020-03-14 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:38:06', NULL),
(214, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-15', '15:15:00', '2020-03-15 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:38:24', NULL),
(215, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-16', '15:15:00', '2020-03-16 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:38:44', NULL),
(216, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-17', '15:15:00', '2020-03-17 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:39:05', NULL),
(217, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-18', '15:15:00', '2020-03-18 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:39:27', NULL),
(218, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-19', '15:15:00', '2020-03-19 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:39:44', NULL),
(219, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-20', '15:15:00', '2020-03-20 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:40:02', NULL),
(220, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-01', '15:15:00', '2020-04-01 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:48:23', NULL),
(221, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-02', '15:15:00', '2020-04-02 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:48:41', NULL),
(222, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-03', '15:15:00', '2020-04-03 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:49:03', NULL),
(223, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-03', '15:15:00', '2020-04-03 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:49:22', NULL),
(224, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-04', '15:15:00', '2020-04-04 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:49:40', NULL),
(225, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-05', '15:15:00', '2020-04-05 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:49:58', NULL),
(226, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-06', '15:15:00', '2020-04-06 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:50:40', NULL),
(227, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-07', '15:15:00', '2020-04-07 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:50:59', NULL),
(228, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-08', '15:15:00', '2020-04-08 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:51:17', NULL),
(229, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-09', '15:15:00', '2020-04-09 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:51:35', NULL),
(230, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-10', '15:15:00', '2020-04-10 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:51:53', NULL),
(231, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-11', '15:15:00', '2020-04-11 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:52:17', NULL),
(232, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-12', '15:15:00', '2020-04-12 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:52:39', NULL),
(233, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-13', '15:15:00', '2020-04-13 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:53:02', NULL),
(234, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-14', '15:15:00', '2020-04-14 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:53:20', NULL),
(235, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-15', '15:15:00', '2020-04-15 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:53:38', NULL),
(236, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-16', '15:15:00', '2020-04-16 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:53:55', NULL),
(237, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-17', '15:15:00', '2020-04-17 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:54:19', NULL),
(238, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-03-18', '15:15:00', '2020-03-18 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:54:38', NULL);
INSERT INTO `email_reminder` (`er_id`, `er_emailTo`, `er_emailCc`, `er_subject`, `er_emailBody`, `er_fileName`, `er_fileType`, `er_fileSize`, `er_sendEmailDate`, `er_sendEmailTime`, `er_sendEmailDateTime`, `er_folderName`, `er_emailStatus`, `er_status`, `er_createdBy`, `er_createdAt`, `er_updatedAt`) VALUES
(239, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-19', '15:15:00', '2020-04-19 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:55:00', NULL),
(240, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-04-20', '15:15:00', '2020-04-20 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 09:55:21', NULL),
(241, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-01', '15:15:00', '2020-05-01 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:09:49', NULL),
(242, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-02', '15:15:00', '2020-05-02 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:10:13', NULL),
(243, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-03', '15:15:00', '2020-05-03 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:10:33', NULL),
(244, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-04', '15:15:00', '2020-05-04 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:10:52', NULL),
(245, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-05', '15:15:00', '2020-05-05 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:11:10', NULL),
(246, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-06', '15:15:00', '2020-05-06 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:11:28', NULL),
(247, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-07', '15:15:00', '2020-05-07 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:11:47', NULL),
(248, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-08', '15:15:00', '2020-05-08 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:12:03', NULL),
(249, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-09', '15:15:00', '2020-05-09 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:12:22', NULL),
(250, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-10', '15:15:00', '2020-05-10 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:12:40', NULL),
(251, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-11', '15:15:00', '2020-05-11 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:13:02', NULL),
(252, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-12', '15:15:00', '2020-05-12 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:13:21', NULL),
(253, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-13', '15:15:00', '2020-05-13 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:13:41', NULL),
(254, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-14', '15:15:00', '2020-05-14 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:14:00', NULL),
(255, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-15', '15:15:00', '2020-05-15 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:14:20', NULL),
(256, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-16', '15:15:00', '2020-05-16 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:14:39', NULL),
(257, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-17', '15:15:00', '2020-05-17 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:14:56', NULL),
(258, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-18', '15:15:00', '2020-05-18 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:15:36', NULL),
(259, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-19', '15:15:00', '2020-05-19 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:16:03', NULL),
(260, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-05-20', '15:15:00', '2020-05-20 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:16:24', NULL),
(261, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-01', '15:15:00', '2020-06-01 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:17:41', NULL),
(262, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-02', '15:15:00', '2020-06-02 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:18:00', NULL),
(263, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-03', '15:15:00', '2020-06-03 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:18:21', NULL),
(264, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-04', '15:15:00', '2020-06-04 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:18:39', NULL),
(265, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-05', '15:15:00', '2020-06-05 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:18:55', NULL),
(266, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-06', '15:15:00', '2020-06-06 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:19:14', NULL),
(267, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-07', '15:15:00', '2020-06-07 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:19:32', NULL),
(268, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-08', '15:15:00', '2020-06-08 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:19:53', NULL),
(269, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-09', '15:15:00', '2020-06-09 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:20:13', NULL),
(270, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-10', '15:15:00', '2020-06-10 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:20:33', NULL),
(271, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-11', '15:15:00', '2020-06-11 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:20:55', NULL),
(272, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-12', '15:15:00', '2020-06-12 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:21:16', NULL),
(273, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-13', '15:15:00', '2020-06-13 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:21:35', NULL),
(274, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-14', '15:15:00', '2020-06-14 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:21:57', NULL),
(275, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-15', '15:15:00', '2020-06-15 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:22:15', NULL),
(276, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-16', '15:15:00', '2020-06-16 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:22:36', NULL),
(277, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-17', '15:15:00', '2020-06-17 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:22:55', NULL),
(278, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-18', '15:15:00', '2020-06-18 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:23:15', NULL),
(279, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-19', '15:15:00', '2020-06-19 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:23:34', NULL),
(280, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-06-20', '15:15:00', '2020-06-20 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:23:57', NULL),
(281, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-02', '15:15:00', '2020-07-02 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:28:50', NULL),
(282, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-01', '15:15:00', '2020-07-01 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:29:09', NULL),
(283, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-03', '15:15:00', '2020-07-03 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:29:26', NULL),
(284, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-04', '15:15:00', '2020-07-04 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:29:45', NULL),
(285, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-05', '15:15:00', '2020-07-05 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:30:02', NULL),
(286, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-06', '15:15:00', '2020-07-06 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:30:21', NULL),
(287, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-07', '15:15:00', '2020-07-07 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:30:40', NULL),
(288, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-08', '15:15:00', '2020-07-08 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:30:58', NULL),
(289, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-09', '15:15:00', '2020-07-09 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:31:19', NULL),
(290, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-10', '15:15:00', '2020-07-10 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:31:38', NULL),
(291, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-11', '15:15:00', '2020-07-11 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:31:56', NULL),
(292, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-12', '15:15:00', '2020-07-12 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:32:14', NULL),
(293, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-13', '15:15:00', '2020-07-13 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:32:31', NULL),
(294, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-14', '15:15:00', '2020-07-14 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:32:50', NULL),
(295, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-15', '15:15:00', '2020-07-15 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:33:08', NULL),
(296, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-16', '15:15:00', '2020-07-16 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:33:27', NULL),
(297, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-17', '15:15:00', '2020-07-17 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:33:47', NULL),
(298, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-18', '15:15:00', '2020-07-18 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:34:04', NULL),
(299, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-19', '15:15:00', '2020-07-19 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:34:21', NULL),
(300, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-07-20', '15:15:00', '2020-07-20 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:34:43', NULL),
(301, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-01', '15:15:00', '2020-08-01 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:35:21', NULL),
(302, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-02', '15:15:00', '2020-08-02 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:35:40', NULL),
(303, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-03', '15:15:00', '2020-08-03 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:35:59', NULL),
(304, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-04', '15:15:00', '2020-08-04 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:36:23', NULL),
(305, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-05', '15:15:00', '2020-08-05 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:36:42', NULL),
(306, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-06', '15:15:00', '2020-08-06 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:37:00', NULL),
(307, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-06', '15:15:00', '2020-08-06 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:37:19', NULL),
(308, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-07', '15:15:00', '2020-08-07 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:37:39', NULL),
(309, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-08', '15:15:00', '2020-08-08 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:38:01', NULL),
(310, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-09', '15:15:00', '2020-08-09 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:38:22', NULL),
(311, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-10', '15:15:00', '2020-08-10 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:38:44', NULL),
(312, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-11', '15:15:00', '2020-08-11 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:39:07', NULL),
(313, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-12', '15:15:00', '2020-08-12 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:39:26', NULL),
(314, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-13', '15:15:00', '2020-08-13 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:39:45', NULL),
(315, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-14', '15:15:00', '2020-08-14 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:40:06', NULL),
(316, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-15', '15:15:00', '2020-08-15 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:40:25', NULL),
(317, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-16', '15:15:00', '2020-08-16 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:40:46', NULL),
(318, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-17', '15:15:00', '2020-08-17 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:41:06', NULL),
(319, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-18', '15:15:00', '2020-08-18 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:41:40', NULL),
(320, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-19', '15:15:00', '2020-08-19 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:42:02', NULL),
(321, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-08-20', '15:15:00', '2020-08-20 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:42:21', NULL),
(322, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-01', '15:15:00', '2020-09-01 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:51:44', NULL),
(323, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-02', '15:15:00', '2020-09-02 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:52:06', NULL),
(324, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-03', '15:15:00', '2020-09-03 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:52:42', NULL),
(325, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-04', '15:15:00', '2020-09-04 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:53:01', NULL),
(326, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-05', '15:15:00', '2020-09-05 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:53:21', NULL),
(327, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-06', '15:15:00', '2020-09-06 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:53:41', NULL),
(328, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-06', '15:15:00', '2020-09-06 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:54:05', NULL),
(329, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-07', '15:15:00', '2020-09-07 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:54:25', NULL),
(330, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-08', '15:15:00', '2020-09-08 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:54:45', NULL),
(331, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-09', '15:15:00', '2020-09-09 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:55:04', NULL),
(332, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-10', '15:15:00', '2020-09-10 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:55:25', NULL),
(333, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-11', '15:15:00', '2020-09-11 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:55:45', NULL),
(334, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-12', '15:15:00', '2020-09-12 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:56:08', NULL),
(335, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-13', '15:15:00', '2020-09-13 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:56:26', NULL),
(336, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-14', '15:15:00', '2020-09-14 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:56:44', NULL),
(337, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-15', '15:15:00', '2020-09-15 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:57:04', NULL),
(338, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-17', '15:15:00', '2020-09-17 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:57:25', NULL),
(339, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-18', '15:15:00', '2020-09-18 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:57:43', NULL),
(340, 'finance@finnovaadvisory.com', '', 'Testing', '', '', '', '0', '2020-09-19', '15:15:00', '2020-09-19 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:58:02', NULL),
(341, 'finance@finnovaadvisory.com', '', 'Testing', '', 'ring.png, , ', 'image/png, , ', '2803, 0, ', '2020-09-20', '15:15:00', '2020-09-20 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-28 10:58:23', NULL),
(342, 'achyut.gaikwad71@gmail.com', 'a.gaikwad@finnovaadvisory.com', 'DEMO EMAIL testing', '<p>Dear Sir,</p>\r\n\r\n<p>HI This is reminder</p>\r\n', '', '', '0', '2019-08-29', '18:30:00', '2019-08-29 18:30:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 05:15:14', NULL),
(343, 'finance@finnovaadvisory.com', '', 'This is email reminder testing', '<p>Testing</p>\r\n', '', '', '0', '2019-08-29', '15:00:00', '2019-08-29 15:00:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 08:25:42', NULL),
(344, 'finance@finnovaadvisory.com', '', 'SMS rminder testing for crm', '<p>Testing</p>\r\n', '', '', '0', '2019-08-29', '15:06:00', '2019-08-29 15:06:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 09:35:57', NULL),
(345, 'finance@finnovaadvisory.com', '', 'This is email reminder testing', '<p>Testing</p>\r\n', '', '', '0', '2019-08-29', '15:10:00', '2019-08-29 15:10:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 09:36:38', NULL),
(346, 'finance@finnovaadvisory.com', '', 'This is email reminder testing', '<p>Hello........</p>\r\n', '', '', '0', '2019-08-29', '14:15:00', '2019-08-29 14:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 09:40:58', NULL),
(347, 'finance@finnovaadvisory.com', '', 'This is email reminder testing', '<p>good afternoon</p>\r\n', '', '', '0', '2019-08-29', '15:13:00', '2019-08-29 15:13:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 09:41:36', NULL),
(348, 'finance@finnovaadvisory.com', '', 'Email reminder testing', '<p>Hiiiiiiiiiii</p>\r\n', '', '', '0', '2019-08-29', '15:15:00', '2019-08-29 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 09:42:26', NULL),
(349, 'finance@finnovaadvisory.com', '', 'testing', '<p>hi</p>\r\n', '', '', '0', '2019-08-29', '15:15:00', '2019-08-29 15:15:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 09:46:14', NULL),
(350, 'finance@finnovaadvisory.com', '', 'testing', '<p>jj</p>\r\n', '', '', '0', '2019-08-29', '15:17:00', '2019-08-29 15:17:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 09:47:23', NULL),
(351, 'finance@finnovaadvisory.com', '', 'testing', '', '', '', '0', '2019-08-29', '15:18:00', '2019-08-29 15:18:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 09:47:44', NULL),
(352, 'finance@finnovaadvisory.com', '', 'testing', '', '', '', '0', '2019-08-29', '15:18:00', '2019-08-29 15:18:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 09:48:09', NULL),
(353, 'finance@finnovaadvisory.com', '', 'testing', '', '', '', '0', '2019-08-29', '15:19:00', '2019-08-29 15:19:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 09:49:36', NULL),
(354, 'finance@finnovaadvisory.com', '', 'testing', '<p>9028600116</p>\r\n', '', '', '0', '2019-08-30', '15:19:00', '2019-08-30 15:19:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 10:13:27', NULL),
(355, 'finance@finnovaadvisory.com', '', 'testing', '', '', '', '0', '2019-08-30', '02:10:00', '2019-08-30 02:10:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 10:38:16', NULL),
(356, 'finance@finnovaadvisory.com', '', 'testing', '', '', '', '0', '2019-08-29', '16:10:00', '2019-08-29 16:10:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 10:39:06', NULL),
(357, 'vrushali.finnovaadvisory@gmail.com', '', 'Demo Testing', '<p>Hiiiiiiiiii</p>\r\n', '', '', '0', '2019-08-29', '16:10:00', '2019-08-29 16:10:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 10:42:11', NULL),
(358, 'finance@finnovaadvisory.com', '', 'Email reminder testing', '<p>Hello</p>\r\n', '', '', '0', '2019-08-29', '16:10:00', '2019-08-29 16:10:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 10:43:07', NULL),
(359, 'akagarwal@finnovaadvisory.com', '', 'Email reminder for testing', '<p>Good Evening</p>\r\n', '', '', '0', '2019-08-29', '16:20:00', '2019-08-29 16:20:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 10:47:54', NULL),
(360, 'akagarwal@finnovaadvisory.com', '', 'Email reminder for testing', '<p>Hello sir, this is reminder mail for testing</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks &amp; Regards</p>\r\n\r\n<p>Rekha Singh</p>\r\n', '', '', '0', '2019-08-29', '16:25:00', '2019-08-29 16:25:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 10:51:03', NULL),
(361, 'rekhasingh772@gmail.com', '', 'Email reminder for testing', '<p>Hello Rekha,, this mail regarding email reminder testing</p>\r\n\r\n<p>Thank you</p>\r\n', '', '', '0', '2019-08-29', '16:25:00', '2019-08-29 16:25:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 10:52:42', NULL),
(362, 'a.gaikwad@finnovaadvisory.com', '', 'Email reminder for testing', '<p>Hello Achyut, this mail regarding email render testing</p>\r\n\r\n<p>Thank you</p>\r\n', '', '', '0', '2019-08-29', '16:30:00', '2019-08-29 16:30:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 10:53:53', NULL),
(363, 'vrushali.finnovaadvisory@gmail.com', '', 'Email reminder for testing', '<p>Hello Vrushali,email reminder testing</p>\r\n', '', '', '0', '2019-08-29', '16:25:00', '2019-08-29 16:25:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 10:54:48', NULL),
(364, 'vaibhav.bhosale503@gmail.com', '', 'Email reminder for testing', '<p>Hello Vaibhav, this mail regarding email reminder testing</p>\r\n\r\n<p>Thank you</p>\r\n', 'BS proprietor format.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', '14546', '2019-08-29', '16:30:00', '2019-08-29 16:30:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 10:56:37', NULL),
(365, 'akagarwal@finnovaadvisory.com', '', 'Email reminder for testing', '<p>Hello sir,</p>\r\n\r\n<p>Please find the attachment</p>\r\n', 'BS proprietor format.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', '14546', '2019-08-29', '16:30:00', '2019-08-29 16:30:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 10:57:36', NULL),
(366, 'a.gaikwad@finnovaadvisory.com', '', 'Email reminder for testing', '<p>Please find the attachment</p>\r\n', 'BS proprietor format.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', '14546', '2019-08-29', '16:35:00', '2019-08-29 16:35:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 10:59:45', NULL),
(367, 'finance@finnovaadvisory.com', '', 'testing', '', '', '', '0', '2019-08-29', '16:33:00', '2019-08-29 16:33:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 11:02:25', NULL),
(368, 'vaibhav.bhosale503@gmail.com', '', 'Email reminder for testing', '<p>ABcdefghijklmn</p>\r\n', 'BS proprietor format.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', '14546', '2019-08-29', '16:40:00', '2019-08-29 16:40:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 11:07:57', NULL),
(369, 'finance@finnovaadvisory.com', '', 'testing', '<p>testing</p>\r\n', '', '', '0', '2019-08-29', '16:38:00', '2019-08-29 16:38:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-29 11:08:25', NULL),
(370, 'finance@finnovaadvisory.com', '', 'testing', '<p>hh</p>\r\n', '', '', '0', '2019-08-30', '09:35:00', '2019-08-30 09:35:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-30 04:03:49', NULL),
(371, 'finance@finnovaadvisory.com', '', 'Email reminder for testing', '<p>This email regarding email reminder testing</p>\r\n\r\n<p>Thank you</p>\r\n', '', '', '0', '2019-08-30', '11:00:00', '2019-08-30 11:00:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-30 05:06:26', NULL),
(372, 'akagarwal@finnovaadvisory.com', '', 'Email Reminder Testing', '<p>Hello sir, Good Morning have a good day</p>\r\n', '', '', '0', '2019-08-30', '12:00:00', '2019-08-30 12:00:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-30 05:07:27', NULL),
(373, 'a.gaikwad@finnovaadvisory.com', '', 'Email Reminder Testing', '<p>Good Mornig Achyut!!!!!!!!!!!!!!!!!!!!!</p>\r\n', '', '', '0', '2019-08-30', '11:00:00', '2019-08-30 11:00:00', 'finnovaadvisory', NULL, 0, '0', '2019-08-30 05:08:40', NULL),
(374, 'finance@finnovaadvisory.com', '', 'Email Reminder Testing', '<p>Hello sir,</p>\r\n\r\n<p>This email for email reminder testing purpose</p>\r\n\r\n<p>Thank You</p>\r\n', '', '', '0', '2019-09-18', '16:00:00', '2019-09-18 16:00:00', 'finnovaadvisory', NULL, 0, '0', '2019-09-18 10:07:11', NULL),
(375, 'finance@finnovaadvisory.com', '', 'hi', '', '', '', '0', '2019-09-18', '19:10:00', '2019-09-18 19:10:00', 'finnovaadvisory', NULL, 0, '0', '2019-09-18 11:17:29', NULL),
(376, 'finance@finnovaadvisory.com', '', 'hello', '', '', '', '0', '2019-09-19', '10:10:00', '2019-09-19 10:10:00', 'finnovaadvisory', NULL, 0, '0', '2019-09-18 11:18:44', NULL),
(377, 'mayank@empre.in', '', 'test', '<p>test</p>\r\n', 'ring.png', 'image/png', '2803', '2020-12-13', '12:00:00', '2020-12-13 12:00:00', 'finnovaadvisory', NULL, 0, '0', '2019-12-13 13:30:36', NULL),
(378, 'mayank@empre.in', '', 'test', '<p>test</p>\r\n', 'ring.png', 'image/png', '2803', '2020-12-12', '12:00:00', '2020-12-12 12:00:00', 'finnovaadvisory', NULL, 0, '0', '2019-12-13 13:31:19', NULL),
(379, 'mayank@empre.in', '', 'test', '<p>test</p>\r\n', 'ring.png', 'image/png', '2803', '2020-12-05', '12:00:00', '2020-12-05 12:00:00', 'finnovaadvisory', NULL, 0, '0', '2019-12-13 13:32:24', NULL),
(380, 'sunil@one.com', 'sunil@one.com', 'Email reminder.', '<p>User : Sunil Jangid</p>\r\n\r\n<p>Email :&nbsp;sunil@one.com</p>\r\n\r\n<p>CC :&nbsp;sunil@one.com<br />\r\n<br />\r\nSubject : Email reminder.</p>\r\n', '0_sample-110.jpg, 1_sample-111.jpg, 2_sample-117.jpg', ', , image/jpeg', '0, 0, 512017', '2019-12-21', '15:00:00', '2019-12-21 15:00:00', '', 0, 1, '5dedf2040d6450716', '2019-12-21 09:46:06', NULL),
(381, 'sunil@three.com', 'sunil@three.com', 'Email reminder.', '<p>User : Sunil Jangid</p>\r\n\r\n<p>Email :&nbsp;sunil@two.com</p>\r\n\r\n<p>CC :&nbsp;sunil@two.com<br />\r\n<br />\r\nSubject : Email reminder.</p>\r\n', '', '', '', '2019-12-21', '22:52:00', '2019-12-21 22:52:00', '', 0, 1, '5dedf2040d6450716', '2019-12-21 10:03:53', NULL),
(382, 'sunil@four.com', 'sunil@four.com', 'Email reminder.', '<p>User : Sunil Jangid</p>\r\n\r\n<p>Email :&nbsp;sunil@three.com</p>\r\n\r\n<p>CC :&nbsp;sunil@three.com<br />\r\n<br />\r\nSubject : Email reminder.</p>\r\n', '0_fall-autumn-red-season.jpg, 1_pexels-photo-248797.jpeg', '', '', '2019-12-21', '22:52:00', '2019-12-21 22:52:00', '', 0, 1, '5dedf2040d6450716', '2019-12-21 10:32:12', NULL),
(383, 'sunil@five.com', 'sunil@five.com', 'Email reminder.', '', '0_fall-autumn-red-season.jpg, 1_pexels-photo-248797.jpeg, 2_pexels-photo-459225.jpeg', '', '', '2019-12-22', '00:00:00', '2019-12-22 00:00:00', '', 0, 1, '5dedf2040d6450716', '2019-12-21 10:34:05', NULL),
(384, 'sunil@six.com', 'sunil@six.com', 'Email remonder.', '', '0_fall-autumn-red-season.jpg, 1_pexels-photo-248797.jpeg, 2_pexels-photo-459225.jpeg', '', '', '2019-12-22', '13:00:00', '2019-12-22 13:00:00', '', 0, 1, '5dedf2040d6450716', '2019-12-21 10:35:39', NULL),
(385, 'sunil@seven.com', 'sunil@seven.com', 'Email reminder.', '', '0_pexels-photo-248797.jpeg', '', '', '2019-12-23', '13:00:00', '2019-12-23 13:00:00', '', 0, 1, '5dedf2040d6450716', '2019-12-21 10:40:28', NULL),
(386, 'sunil@eight.com', 'sunil@eight.com', 'Email reminder.', '', '0_kelly-sikkema-1183750-unsplash.jpg, 1_kelly-sikkema-1224502-unsplash.jpg', '', '', '2019-12-25', '10:51:00', '2019-12-25 10:51:00', '', 0, 1, '5dedf2040d6450716', '2019-12-21 10:50:40', NULL),
(387, 'sunil@ten.com', 'sunil@ten.com', 'Email reminder.', '<p>sunil@ten.comsunil@ten.com</p>\r\n', '0_', '', '', '2019-12-23', '21:55:00', '2019-12-23 21:55:00', '', 0, 1, '5dedf2040d6450716', '2019-12-23 04:58:44', NULL),
(388, 'asd@asd.ads', 'asd@asd.ads', 'Email', '<p>asd@asd.adsasd@asd.adsasd@asd.adsasd@asd.ads</p>\r\n', '0_', '', '', '2019-12-23', '11:00:00', '2019-12-23 11:00:00', '', 0, 1, '5dedf2040d6450716', '2019-12-23 05:15:36', NULL),
(389, 'asd@asd.ads', 'asd@asd.ads', 'Email', '<p>asd@asd.adsasd@asd.adsasd@asd.adsasd@asd.ads</p>\r\n', '0_', '', '', '2019-12-23', '11:00:00', '2019-12-23 11:00:00', '', 0, 1, '5dedf2040d6450716', '2019-12-23 05:16:35', NULL),
(390, 'asd@asd.asd', 'asd@asd.asd', 'SDSD', '', '0_', '', '', '2019-12-23', '23:53:00', '2019-12-23 23:53:00', '', 0, 1, '5dedf2040d6450716', '2019-12-23 05:20:25', NULL),
(391, 'qw@qww.qw', 'qw@qww.qw', 'http://localhost:8080/fincrm/reminder/emailList', '<p><a href=\"http://localhost:8080/fincrm/reminder/emailList\">http://localhost:8080/fincrm/reminder/emailList</a></p>\r\n\r\n<p><a href=\"http://localhost:8080/fincrm/reminder/emailList\">http://localhost:8080/fincrm/reminder/emailList</a></p>\r\n', '', '', '', '2019-12-26', '11:53:00', '2019-12-26 11:53:00', '', 0, 1, '5dedf2040d6450716', '2019-12-23 06:56:02', NULL),
(392, 'asd@sad.asd', 'asd@sad.asd', 'gjkkgjkjgkjgjk', '<p>asdg asg ghsahgasgh sagasgsagsgasagagga</p>\r\n', '0_pexels-photo-248797.jpeg', '', '', '2019-12-24', '22:50:00', '2019-12-24 22:50:00', '', 0, 1, '5dedf2040d6450716', '2019-12-23 06:58:31', NULL),
(393, 'asd@qwe.qwe', 'asd@qwe.qwe', 'qw@.asd.sa', '', '0_fall-autumn-red-season.jpg, 1_pexels-photo-248797.jpeg, 2_pexels-photo-459225.jpeg', '', '', '2019-12-25', '12:55:00', '2019-12-25 12:55:00', '', 0, 1, '5dedf2040d6450716', '2019-12-23 07:00:03', NULL),
(394, 'sdsdf@wer.er', 'sdsdf@wer.er', 'asd fs fasfas gasg a', '', '0_fall-autumn-red-season.jpg, 1_pexels-photo-248797.jpeg', '', '', '2019-12-24', '08:43:00', '2019-12-24 08:43:00', '', 0, 1, '5dedf2040d6450716', '2019-12-23 07:02:56', NULL),
(395, 'sdfa@qwe.sdfs', 'asd@wer.ccs', 'JRHBRVBRB', '', '0_fall-autumn-red-season.jpg, 1_pexels-photo-248797.jpeg, 2_pexels-photo-459225.jpeg', '', '', '2019-12-24', '21:45:00', '2019-12-24 21:45:00', '', 0, 1, '5dedf2040d6450716', '2019-12-23 07:09:46', NULL),
(396, 'sunil@test1.com', 'admin@test.com', 'Termp.', '<p>pleas ignore email&nbsp;</p>\r\n\r\n<p>this email is onlt for testing pitpsoe.</p>\r\n', '0_pexels-photo-248797.jpeg, 1_pexels-photo-459225.jpeg', '', '', '2019-12-25', '10:41:00', '2019-12-25 10:41:00', '', 0, 1, '5dedf2040d6450716', '2019-12-23 07:14:06', NULL),
(397, 'user@one.com', 'user@one.com', 'Email remider.!!', '<p>Email remider.!!</p>\r\n', '0157733748020191226061800_alinenok-G9vRDGA46FY-unsplash.jpg,0157733750120191226061821_zi-nguyen-U5lYNUcKVy4-unsplash.jpg', '', '', '2020-02-01', '12:00:00', '2020-02-01 12:00:00', '', 0, 1, '5dedf2040d6450716', '2019-12-26 06:18:00', '2019-12-26 06:18:21'),
(398, 'asd@test.com', 'asd@test.com', 'Temp email....!', '<p>Temp email..!!</p>\r\n', '', '', '', '2020-01-01', '01:50:00', '2020-01-01 01:50:00', '', 0, 1, '1', '2020-01-01 08:05:40', '2020-01-02 06:58:46'),
(399, 'new@14.com', 'new@14.com', 'new@14.com', '<p>new@14.com</p>\r\n', ',0157897721720200114044657_anton-darius-thesollers-l06JLx9oaCk-unsplash.jpg', '', '', '2020-01-14', '12:00:00', '2020-01-14 12:00:00', '', 0, 1, '1', '2020-01-14 04:46:27', '2020-01-14 04:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `email_reminder1`
--

DROP TABLE IF EXISTS `email_reminder1`;
CREATE TABLE IF NOT EXISTS `email_reminder1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sendEmailDate` date DEFAULT NULL,
  `sendEmailTime` varchar(255) DEFAULT NULL,
  `email_to` varchar(255) DEFAULT '0',
  `email_cc` varchar(255) DEFAULT '0',
  `subject` varchar(255) DEFAULT '0',
  `emailBody` varchar(255) DEFAULT '0',
  `file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `file_size` varchar(255) DEFAULT '0',
  `createdby` varchar(50) DEFAULT NULL,
  `createdat` varchar(50) DEFAULT '0',
  `status` varchar(50) DEFAULT '0',
  `folder_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

DROP TABLE IF EXISTS `email_template`;
CREATE TABLE IF NOT EXISTS `email_template` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_html` tinyint(1) NOT NULL DEFAULT 1,
  `one_off` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `category_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CATEGORY_ID` (`category_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_template_category`
--

DROP TABLE IF EXISTS `email_template_category`;
CREATE TABLE IF NOT EXISTS `email_template_category` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `order` int(11) DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_PARENT_ID` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_template_category_path`
--

DROP TABLE IF EXISTS `email_template_category_path`;
CREATE TABLE IF NOT EXISTS `email_template_category_path` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ascendor_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descendor_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ASCENDOR_ID` (`ascendor_id`),
  KEY `IDX_DESCENDOR_ID` (`descendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_user`
--

DROP TABLE IF EXISTS `email_user`;
CREATE TABLE IF NOT EXISTS `email_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `is_important` tinyint(1) DEFAULT 0,
  `in_trash` tinyint(1) DEFAULT 0,
  `folder_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_12A5F6CCA832C1C9A76ED395` (`email_id`,`user_id`),
  KEY `IDX_12A5F6CCA832C1C9` (`email_id`),
  KEY `IDX_12A5F6CCA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entity1`
--

DROP TABLE IF EXISTS `entity1`;
CREATE TABLE IF NOT EXISTS `entity1` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entity_copy_testing`
--

DROP TABLE IF EXISTS `entity_copy_testing`;
CREATE TABLE IF NOT EXISTS `entity_copy_testing` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entity_email_address`
--

DROP TABLE IF EXISTS `entity_email_address`;
CREATE TABLE IF NOT EXISTS `entity_email_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_address_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `entity_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary` tinyint(1) DEFAULT 0,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9125AB4281257D5D59045DAAC412EE02` (`entity_id`,`email_address_id`,`entity_type`),
  KEY `IDX_9125AB4281257D5D` (`entity_id`),
  KEY `IDX_9125AB4259045DAA` (`email_address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80447 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entity_master`
--

DROP TABLE IF EXISTS `entity_master`;
CREATE TABLE IF NOT EXISTS `entity_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_name` varchar(50) DEFAULT NULL,
  `table_name` varchar(50) DEFAULT NULL,
  `entity_name_original` varchar(50) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `created_by_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `entity_phone_number`
--

DROP TABLE IF EXISTS `entity_phone_number`;
CREATE TABLE IF NOT EXISTS `entity_phone_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `entity_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary` tinyint(1) DEFAULT 0,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_7459056F81257D5D39DFD528C412EE02` (`entity_id`,`phone_number_id`,`entity_type`),
  KEY `IDX_7459056F81257D5D` (`entity_id`),
  KEY `IDX_7459056F39DFD528` (`phone_number_id`)
) ENGINE=InnoDB AUTO_INCREMENT=98903 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entity_team`
--

DROP TABLE IF EXISTS `entity_team`;
CREATE TABLE IF NOT EXISTS `entity_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `team_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `entity_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8C2C1F3481257D5D296CD8AEC412EE02` (`entity_id`,`team_id`,`entity_type`),
  KEY `IDX_8C2C1F3481257D5D` (`entity_id`),
  KEY `IDX_8C2C1F34296CD8AE` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=176499 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entity_test`
--

DROP TABLE IF EXISTS `entity_test`;
CREATE TABLE IF NOT EXISTS `entity_test` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entity_testing`
--

DROP TABLE IF EXISTS `entity_testing`;
CREATE TABLE IF NOT EXISTS `entity_testing` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entity_user`
--

DROP TABLE IF EXISTS `entity_user`;
CREATE TABLE IF NOT EXISTS `entity_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `entity_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C55F6F6281257D5DA76ED395C412EE02` (`entity_id`,`user_id`,`entity_type`),
  KEY `IDX_C55F6F6281257D5D` (`entity_id`),
  KEY `IDX_C55F6F62A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equity`
--

DROP TABLE IF EXISTS `equity`;
CREATE TABLE IF NOT EXISTS `equity` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sector` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_type` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equity_account`
--

DROP TABLE IF EXISTS `equity_account`;
CREATE TABLE IF NOT EXISTS `equity_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `equity_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E6295B079B6B5FBA82C9556E` (`account_id`,`equity_id`),
  KEY `IDX_E6295B079B6B5FBA` (`account_id`),
  KEY `IDX_E6295B0782C9556E` (`equity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `espo_c_r_m_project_customisation`
--

DROP TABLE IF EXISTS `espo_c_r_m_project_customisation`;
CREATE TABLE IF NOT EXISTS `espo_c_r_m_project_customisation` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estimates`
--

DROP TABLE IF EXISTS `estimates`;
CREATE TABLE IF NOT EXISTS `estimates` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `billingaddressgstin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shippingaddressgstin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `gst_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `sub_total` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `g_s_t` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `igst` double DEFAULT NULL,
  `s_g_s_t` double DEFAULT NULL,
  `c_g_s_t` double DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Open',
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sessionid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billfromname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billtoname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placeofsupply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `estimatedate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discounttype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discountoption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discountvalue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discountamount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adjustments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adjustments_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_g_s_t_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discountamount_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discountvalue_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `igst_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_g_s_t_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`),
  KEY `IDX_ACCOUNT_ID` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estimates_items`
--

DROP TABLE IF EXISTS `estimates_items`;
CREATE TABLE IF NOT EXISTS `estimates_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estimate_id` varchar(50) DEFAULT NULL,
  `item_name` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `hsn` varchar(100) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `rate` float(10,2) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `gst_rate` int(11) DEFAULT NULL,
  `igst` float(10,2) NOT NULL DEFAULT 0.00,
  `cgst` float(10,2) NOT NULL DEFAULT 0.00,
  `sgst` float(10,2) NOT NULL DEFAULT 0.00,
  `total` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `discounttype` varchar(50) DEFAULT NULL,
  `discountoption` varchar(50) DEFAULT NULL,
  `discountvalue` varchar(50) DEFAULT NULL,
  `discountamount` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=415 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `estimate_files`
--

DROP TABLE IF EXISTS `estimate_files`;
CREATE TABLE IF NOT EXISTS `estimate_files` (
  `estimate_id` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filepath` varchar(500) DEFAULT NULL,
  `original_filename` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `extension`
--

DROP TABLE IF EXISTS `extension`;
CREATE TABLE IF NOT EXISTS `extension` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `version` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_list` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_installed` tinyint(1) NOT NULL DEFAULT 0,
  `check_version_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `external_account`
--

DROP TABLE IF EXISTS `external_account`;
CREATE TABLE IF NOT EXISTS `external_account` (
  `id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `data` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_delete_request`
--

DROP TABLE IF EXISTS `file_delete_request`;
CREATE TABLE IF NOT EXISTS `file_delete_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) DEFAULT 0,
  `user_id` varchar(50) DEFAULT '0',
  `createdAt` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `folder_master`
--

DROP TABLE IF EXISTS `folder_master`;
CREATE TABLE IF NOT EXISTS `folder_master` (
  `prefix` varchar(50) NOT NULL DEFAULT 'FM',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folder_name` varchar(50) DEFAULT NULL,
  `created_user_id` varchar(50) DEFAULT NULL,
  `assigned_user_id` varchar(50) DEFAULT NULL,
  `define_access` varchar(50) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `folder_master_3`
--

DROP TABLE IF EXISTS `folder_master_3`;
CREATE TABLE IF NOT EXISTS `folder_master_3` (
  `prefix` varchar(50) NOT NULL DEFAULT 'FM',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folder_name` varchar(50) DEFAULT NULL,
  `created_user_id` varchar(50) DEFAULT NULL,
  `assigned_user_id` varchar(50) DEFAULT NULL,
  `define_access` varchar(50) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `folder_master_old`
--

DROP TABLE IF EXISTS `folder_master_old`;
CREATE TABLE IF NOT EXISTS `folder_master_old` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folder_name` varchar(50) DEFAULT NULL,
  `created_user_id` varchar(50) DEFAULT NULL,
  `assigned_user_id` varchar(50) DEFAULT NULL,
  `define_access` varchar(50) DEFAULT NULL,
  `createdAt` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g_n_i_o_s`
--

DROP TABLE IF EXISTS `g_n_i_o_s`;
CREATE TABLE IF NOT EXISTS `g_n_i_o_s` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

DROP TABLE IF EXISTS `import`;
CREATE TABLE IF NOT EXISTS `import` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `file_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `import_entity`
--

DROP TABLE IF EXISTS `import_entity`;
CREATE TABLE IF NOT EXISTS `import_entity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `import_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_imported` tinyint(1) DEFAULT 0,
  `is_updated` tinyint(1) DEFAULT 0,
  `is_duplicate` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `IDX_ENTITY` (`entity_id`,`entity_type`),
  KEY `IDX_IMPORT_ID` (`import_id`),
  KEY `IDX_ENTITY_IMPORT` (`import_id`,`entity_type`)
) ENGINE=InnoDB AUTO_INCREMENT=272803 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inbound_email`
--

DROP TABLE IF EXISTS `inbound_email`;
CREATE TABLE IF NOT EXISTS `inbound_email` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `email_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '143',
  `ssl` tinyint(1) NOT NULL DEFAULT 0,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monitored_folders` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'INBOX',
  `fetch_since` date DEFAULT NULL,
  `fetch_data` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_all_team_users` tinyint(1) NOT NULL DEFAULT 1,
  `sent_folder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_sent_emails` tinyint(1) NOT NULL DEFAULT 0,
  `use_imap` tinyint(1) NOT NULL DEFAULT 1,
  `use_smtp` tinyint(1) NOT NULL DEFAULT 0,
  `smtp_is_shared` tinyint(1) NOT NULL DEFAULT 0,
  `smtp_is_for_mass_email` tinyint(1) NOT NULL DEFAULT 0,
  `smtp_host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_port` int(11) DEFAULT 25,
  `smtp_auth` tinyint(1) NOT NULL DEFAULT 0,
  `smtp_security` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_case` tinyint(1) NOT NULL DEFAULT 0,
  `case_distribution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Direct-Assignment',
  `target_user_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply` tinyint(1) NOT NULL DEFAULT 0,
  `reply_from_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_to_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `assign_to_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `team_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `reply_email_template_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ASSIGN_TO_USER_ID` (`assign_to_user_id`),
  KEY `IDX_TEAM_ID` (`team_id`),
  KEY `IDX_REPLY_EMAIL_TEMPLATE_ID` (`reply_email_template_id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inbound_email_team`
--

DROP TABLE IF EXISTS `inbound_email_team`;
CREATE TABLE IF NOT EXISTS `inbound_email_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inbound_email_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `team_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D2054DE540AEA2296CD8AE` (`inbound_email_id`,`team_id`),
  KEY `IDX_D2054DE540AEA2` (`inbound_email_id`),
  KEY `IDX_D2054D296CD8AE` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `integration`
--

DROP TABLE IF EXISTS `integration`;
CREATE TABLE IF NOT EXISTS `integration` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `data` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billfromname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billingaddressgstin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billtoname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placeofsupply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shippingaddressgstin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimateid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimateno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoiceno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoicedate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyerorderno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duedate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beneficiary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentdate` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `adjustments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discountamount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discountoption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discounttype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discountvalue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentstatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account1_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `account12_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`),
  KEY `IDX_ACCOUNT_ID` (`account_id`),
  KEY `IDX_ACCOUNT1_ID` (`account1_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_files`
--

DROP TABLE IF EXISTS `invoice_files`;
CREATE TABLE IF NOT EXISTS `invoice_files` (
  `invoice_id` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filepath` varchar(500) DEFAULT NULL,
  `original_filename` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

DROP TABLE IF EXISTS `invoice_items`;
CREATE TABLE IF NOT EXISTS `invoice_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `discountamount` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=382 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Pending',
  `execute_time` datetime DEFAULT NULL,
  `service_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `attempts` int(11) DEFAULT NULL,
  `target_id` varchar(48) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_type` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `failed_attempts` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `scheduled_job_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_SCHEDULED_JOB_ID` (`scheduled_job_id`),
  KEY `IDX_EXECUTE_TIME` (`status`,`execute_time`),
  KEY `IDX_STATUS` (`status`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_base_article`
--

DROP TABLE IF EXISTS `knowledge_base_article`;
CREATE TABLE IF NOT EXISTS `knowledge_base_article` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Draft',
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_base_article_knowledge_base_category`
--

DROP TABLE IF EXISTS `knowledge_base_article_knowledge_base_category`;
CREATE TABLE IF NOT EXISTS `knowledge_base_article_knowledge_base_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `knowledge_base_article_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `knowledge_base_category_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_35B2D2AC9D68CDED35AB2003` (`knowledge_base_article_id`,`knowledge_base_category_id`),
  KEY `IDX_35B2D2AC9D68CDED` (`knowledge_base_article_id`),
  KEY `IDX_35B2D2AC35AB2003` (`knowledge_base_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1451 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_base_article_portal`
--

DROP TABLE IF EXISTS `knowledge_base_article_portal`;
CREATE TABLE IF NOT EXISTS `knowledge_base_article_portal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portal_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `knowledge_base_article_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4699F0F0B887E1DD9D68CDED` (`portal_id`,`knowledge_base_article_id`),
  KEY `IDX_4699F0F0B887E1DD` (`portal_id`),
  KEY `IDX_4699F0F09D68CDED` (`knowledge_base_article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_base_category`
--

DROP TABLE IF EXISTS `knowledge_base_category`;
CREATE TABLE IF NOT EXISTS `knowledge_base_category` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `articlecount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorycount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_PARENT_ID` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_base_category_path`
--

DROP TABLE IF EXISTS `knowledge_base_category_path`;
CREATE TABLE IF NOT EXISTS `knowledge_base_category_path` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ascendor_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descendor_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ASCENDOR_ID` (`ascendor_id`),
  KEY `IDX_DESCENDOR_ID` (`descendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=984 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead`
--

DROP TABLE IF EXISTS `lead`;
CREATE TABLE IF NOT EXISTS `lead` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `salutation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'New',
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `opportunity_amount` double DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `do_not_call` tinyint(1) NOT NULL DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opportunity_amount_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `campaign_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_contact_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_opportunity_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lead_type` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactperson` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sourcename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_type` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating_agency` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_rs_in_crore_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_rs_in_crore` double DEFAULT NULL,
  `latest_rating_date` date DEFAULT NULL,
  `rating_status` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_banker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_CAMPAIGN_ID` (`campaign_id`),
  KEY `IDX_CREATED_ACCOUNT_ID` (`created_account_id`),
  KEY `IDX_CREATED_CONTACT_ID` (`created_contact_id`),
  KEY `IDX_CREATED_OPPORTUNITY_ID` (`created_opportunity_id`),
  KEY `IDX_FIRST_NAME` (`first_name`,`deleted`),
  KEY `IDX_NAME` (`first_name`,`last_name`),
  KEY `IDX_STATUS` (`status`,`deleted`),
  KEY `IDX_CREATED_AT` (`created_at`,`deleted`),
  KEY `IDX_CREATED_AT_STATUS` (`created_at`,`status`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`),
  KEY `IDX_ASSIGNED_USER_STATUS` (`assigned_user_id`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead`
--

INSERT INTO `lead` (`id`, `deleted`, `salutation_name`, `first_name`, `last_name`, `title`, `status`, `source`, `industry`, `opportunity_amount`, `website`, `address_street`, `address_city`, `address_state`, `address_country`, `address_postal_code`, `do_not_call`, `description`, `created_at`, `modified_at`, `account_name`, `opportunity_amount_currency`, `created_by_id`, `modified_by_id`, `assigned_user_id`, `campaign_id`, `created_account_id`, `created_contact_id`, `created_opportunity_id`, `lead_type`, `date`, `contactperson`, `sourcename`, `data_type`, `rating_agency`, `reference`, `amount_rs_in_crore_currency`, `amount_rs_in_crore`, `latest_rating_date`, `rating_status`, `present_banker`, `rating`) VALUES
('5bac64496ad8f36b2', 1, '', '', '', '', 'In Process', 'Call', '', 6.45, '', '\"Plot no-c/35/36, midc area,\nShrirampur - 413709, Maharashtra , India\nShrirampur\"', 'Shrirampur', 'Maharashtra', 'India', '413709', 1, 'Spoken with customer he said he will share documents on email. CARE - March 14, 2018 - Rs. 6.45, ', '2018-09-27 05:02:01', '2019-10-18 06:47:01', 'RR Prestress Industries', 'INR', '5b7ab3cb9acb208a0', '1', '5b7ab3cb9acb208a0', NULL, NULL, NULL, NULL, '[\"Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5bac64d21d75f39c7', 1, 'Mr.', 'Ruchir', 'Mittal', '', 'New', '', '', 5.5, '', 'E - 4209-4210, MILLENIUM TEXTILE MARKET RING ROAD SURAT GJ 395002 IN\nSurat', 'surat', 'gujarat', 'india', '395002', 0, 'spoken with client he said he interested to upgrade rating and also I inform to share document in Mail ID  \n August 30, 2018, CARE, B+; Stable, Reaffirmed', '2018-09-27 05:04:18', '2019-10-18 06:47:01', 'Reliable Polyester Pvt. Ltd.', 'INR', '5b7ab41601874f50d', '1', '5b7ab41601874f50d', NULL, NULL, NULL, NULL, '[\"Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5bac76ca6d09e6bb8', 1, 'Mr.', '', '', '', 'New', '', '', NULL, 'sanwariyaimpex@gmail.com', 'Karanj', 'Surat', 'Gujarat', '', '394110', 0, 'he will reach in office and give a call, February 12, 2019, CARE B+; Stable; ISSUER NOT COOPERATING*, 4.76\n', '2018-09-27 06:20:58', '2019-10-18 06:47:01', 'Sanwariya Impex Private Limited', NULL, '5baa1e8fe1a112b3c', '1', '5baa1e8fe1a112b3c', NULL, NULL, NULL, NULL, '[\"Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5bac77e87001329f7', 1, 'Mr.', 'Mukesh', 'Prajapati', '', 'New', '', '', 7.17, 'http://www.rivipac.com/', 'Plot No 46 GAT No 312A&B,266,269,270,275&276, Hissa No 50 Igatpuri Nashik MH 422403 IN\nIgatpuri', 'Nashik', 'Maharashtra', 'India', '422403', 0, 'spoken with client he want approval on email id info@rivipacpolymers.com so after that he will proceed further  ', '2018-09-27 06:25:44', '2019-10-18 06:47:01', 'Rivipac Polymers Pvt. Ltd', 'INR', '5b7ab41601874f50d', '1', '5b7ab41601874f50d', NULL, NULL, NULL, NULL, '[\"Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5bac79b153f6ef828', 1, 'Mr.', 'Rajesh', 'Bansal', '', 'New', '', '', 15, 'http://www.rnricemill.com/', 'Patti Khot, Patti Khot Part, Haryana 136027\nMahasamund', 'Mahasamund', 'HARYANA', 'India', '136027', 0, 'Spoken with client he said any one of our  company  have to visit in his company then only he will share documents and he will proceed further\n\nDecember 25, 2018, 15.00 CARE B; Stable; ISSUER NOT , ', '2018-09-27 06:33:21', '2019-10-18 06:47:01', 'RN Rice Mill', 'INR', '5b7ab41601874f50d', '1', '5b7ab41601874f50d', NULL, NULL, NULL, NULL, '[\"Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5bac7ab75d35add77', 1, '', '', '', NULL, 'New', '', '', NULL, 'santaramltd@gmail.com', '259, 3rd Floor,\nNew Cloth Market, \nOutside Raipur Gate,', 'Ahmedabad', 'Gujarat', '', '380002.', 0, 'yesterday i had words with the receptionist she told that she cannot give a call to concern person and to mail all the information on account@jaimata.com on this mail.', '2018-09-27 06:37:43', '2019-10-18 06:47:01', 'Santaram Spinners Ltd.', NULL, '5baa1e8fe1a112b3c', '1', '5baa1e8fe1a112b3c', NULL, NULL, NULL, NULL, '[\"Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5bac7ad4e1a9b216c', 1, 'Mr.', 'Pankaj', '', NULL, 'New', '', '', 23, '', '\"Plot No. 2, Site No. 37 & 38,\nLocal Shopping Complex,\nBehind Kalkaji Post Office,\nNew Delhi - 110019', '', 'New Delhi', 'India', '110019', 0, 'Spoken with customer he said he want to visit our office after that he will proceed further for credit rating improvement', '2018-09-27 06:38:12', '2019-10-18 06:47:01', 'RSG Foods Pvt. Ltd. ', 'INR', '5b7ab3cb9acb208a0', '1', '5b7ab3cb9acb208a0', NULL, NULL, NULL, NULL, '[\"Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5bac7c6744820bfd1', 1, '', '', '', '', 'New', '', '', NULL, '', '\"RUDRA SOLAR & AQUA INDIA PVT ltd\nAddress: CST No 5710/B, SY No 219, Indraprasth Nagar,3rd Cross , Belgaum 590001\nJalahalli\"', 'Banglore', 'Karnataka', 'India', '590001', 0, 'Spoken with customer regarding credit rating he want know how it will beneficial so he want call back from senior after that he will inform. He want call back after 5 p.m.', '2018-09-27 06:44:55', '2019-10-18 06:47:01', 'Rudra Industries', 'INR', '5b7ab3cb9acb208a0', '1', '5b7ab3cb9acb208a0', NULL, NULL, NULL, NULL, '[\"Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5bac7da7e57f8017c', 1, 'Mr.', 'Hari', 'Krishna', NULL, 'New', '', '', 7.5, '', 'HYDERABAD', '', 'HYDERABAD', '', '', 0, 'Spoken with client he said he will give confirmation tomorrow ', '2018-09-27 06:50:15', '2019-10-18 06:47:01', 'Shilpa Electrification ', 'INR', '5b7ab41601874f50d', '1', '5b908e0de61894653', NULL, NULL, NULL, NULL, '[\"Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5bac81692e28725c3', 1, '', '', '', NULL, 'New', '', '', 16, '', 'HYDERABAD', '', 'HYDERABAD', 'India', '', 0, 'Spoken with client he said he want information on Email ID randing.suchirindia@gmail.com after that he will give confirmation ', '2018-09-27 07:06:17', '2019-10-18 06:47:00', 'Suchirindia Infratech Pvt Ltd.', 'INR', '5b7ab41601874f50d', '1', '5b908e0de61894653', NULL, NULL, NULL, NULL, '[\"Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5bae02c2e0e57e423', 1, '', 'Balkrishna', 'Krishnamachary', NULL, 'New', '', '', 15, '', 'Alandur', '', 'Chennai', '', '600016', 0, 'Asked to call after 2nd October', '2018-09-28 10:30:26', '2019-10-18 06:47:00', 'Krishna Woods Works', 'INR', '5baa1e8fe1a112b3c', '1', '5b908e0de61894653', NULL, NULL, NULL, NULL, '[\"Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5bae04aaea7de7e3e', 1, 'Mr.', 'Ravi', 'Karna', NULL, 'Converted', '', '', 10, '', '806, EROS APARTMENTS 56, NEHRU PLACE NEW DELHI', 'NEW DELHI', 'DELHI', '', '110019', 0, 'Concern person told to mail all the details on email sm@sabmotors.com', '2018-09-28 10:38:34', '2019-10-18 06:47:00', 'Sab Motors Pvt. Ltd.', 'INR', '5baa1e8fe1a112b3c', '1', '5baa1e8fe1a112b3c', NULL, NULL, NULL, NULL, '[\"Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5bae09c76f65c5e6a', 1, 'Mr.', 'Nirav', '', NULL, 'New', '', '', 9.5, '', '', 'Ahmedabad', 'Gujarat', '', '383030', 0, 'client is busy he told to text msg  and he will contact to concern person', '2018-09-28 11:00:23', '2019-10-18 06:47:00', 'Sabar Cotton Pvt. Ltd.', 'INR', '5baa1e8fe1a112b3c', '1', '5baa1e8fe1a112b3c', NULL, NULL, NULL, NULL, '[\"Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5bae0e4d21aee6e0a', 1, 'Mr.', 'Pradeep  Pal', 'Singh', NULL, 'Converted', '', '', 12.5, 'www.marurisuzuki.com', '', 'Ludhiana', 'Punjab', '', '141003', 0, 'Client needs time, he will soon give confirmation', '2018-09-28 11:19:41', '2019-10-18 06:47:00', 'Libra Auto Car Company Ltd.', 'INR', '5baa1e8fe1a112b3c', '1', '5b908e0de61894653', NULL, NULL, NULL, '5d8db833ef67ed509', '[\"Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5bae243327ad0941b', 1, '', '', '', NULL, 'New', '', '', 5.5, '', 'Somsons Colony\n, Malerkotla,', 'Sangrur', 'Punjab', '', '148023', 0, 'client is interested and send text msg of documents he will send documents ', '2018-09-28 12:53:07', '2019-10-18 06:47:00', 'Sangrur Autos (Malerkotla)', 'INR', '5baa1e8fe1a112b3c', '1', '5baa1e8fe1a112b3c', NULL, NULL, NULL, NULL, '[\"Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5baf568f1c03f65f7', 1, 'Mr.', 'Rajesh', 'Agarwal', 'Mr', 'Converted', 'Existing Customer', '', 20000, 'www.BrijKath.com', '', 'Kanpur', 'Uttar Pradesh', 'India', '209203', 0, 'Client asked to call on monday', '2018-09-29 10:40:15', '2019-10-18 06:47:00', 'Brij Katha Industries Pvt. Ltd.', 'INR', '5baa1e8fe1a112b3c', '1', '5baa1e8fe1a112b3c', NULL, '5d821a2a318822f40', '5d821a2a41d152be3', NULL, '[\"Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5bb1de67e4146a1eb', 1, 'Mr.', 'Gaurav', 'Sharma', '', 'Converted', '', '', 10000, 'www.alaynaindustries.com', '', 'Bhopal', 'Madhya Pradesh', 'India', '462041', 0, 'He don\'t want rating for Alayna Industries but he will give the confirmation for rating of new firm (name is not yet declared) as he got rating B+ without any funding', '2018-10-01 08:44:23', '2019-10-18 06:47:00', 'Alayna Indusries', 'INR', '5baa1e8fe1a112b3c', '1', NULL, NULL, '5d821956dcd24409b', NULL, NULL, '[\"Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5bb85e969f186a546', 1, 'Mr.', 'Sidram', 'Sirure', '', 'Converted', '', '', 50000, 'www.sme.in/susheel/', 'T bLOCK pLOT BNO.151 bhosari pimpri chinchwad MIDC', 'pune', '', '', '411039', 0, '', '2018-10-06 07:04:54', '2019-10-18 06:47:00', 'Susheel Engineers', 'INR', '5baa1e8fe1a112b3c', '1', '5baa1e8fe1a112b3c', NULL, NULL, NULL, '5d821910e1b11123f', '[\"Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5d985260d50afcb5e', 1, '', 'Ayush', '', '', 'New', '', '', NULL, '', '', '', '', '', '', 0, '', '2019-10-05 08:20:48', '2019-10-18 06:47:00', 'Ayush', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5d9ecdc4ed91381ef', 1, 'Mr.', 'Test1', 'Test2', '', 'New', '', '', NULL, '', 'JM', 'Pune', 'MH', 'India', '458762', 0, '', '2019-10-10 06:20:52', '2019-10-18 06:47:00', 'Testing Account', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Ashok Pandit', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5d9f0e756be72508d', 1, NULL, '', '', NULL, 'New', 'Public Relations', 'Education', NULL, '', 'JM', 'Pune', 'MH', 'India', '456789', 0, '', '2019-10-10 10:56:53', '2019-10-18 06:47:00', 'Finnova Testing Account', NULL, '5c0d4bf192a286f99', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Anil Agarwal', 'Mayank agarwal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da4089c62a9d8f56', 1, NULL, '', '', NULL, 'Converted', 'Email', 'Computer', NULL, 'it.com', 'MG Road', 'Pune', 'Maharashtra', 'India', '785695', 0, 'test', '2019-10-14 05:33:16', '2019-10-18 06:47:00', 'IT', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'vishnu lokhande', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da4169e25e514a36', 1, NULL, '', '', NULL, 'Converted', '', 'Advertising', NULL, '', '', '', '', '', '', 0, '', '2019-10-14 06:33:02', '2019-10-18 06:47:00', 'Adfactors', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Harshit', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da423488174bc794', 1, NULL, '', '', NULL, 'Converted', '', 'Construction', NULL, '', 'MG Road', 'Pune', 'Maharashtra', 'India', '785695', 0, '', '2019-10-14 07:27:04', '2019-10-18 06:47:00', 'testaccnm', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'ajay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da69865b019e3bab', 1, NULL, '', '', NULL, 'Converted', '', 'Telecommunications', NULL, '', '', '', '', '', '', 0, '', '2019-10-16 04:11:17', '2019-10-18 06:47:00', 'Recruit Desk', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Ahutosh Bhyri', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da960f640ba82eb6', 1, NULL, '', '', NULL, 'New', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 06:51:34', '2019-10-18 06:59:05', 'Chaudhary Enterprises', NULL, '1', '1', '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"CARE\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da960ffe97b25cca', 1, NULL, '', '', NULL, 'New', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 06:51:43', '2019-10-18 06:59:05', 'Cybernet IT Pvt. Ltd.', NULL, '1', '1', '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"CRISIL\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963bdb69c71978', 0, NULL, '', '', NULL, 'New', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 07:03:25', '2019-10-18 07:03:25', 'Chaudhary Enterprises', NULL, '1', NULL, '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Javed', NULL, '[\"Bank Loan\"]', '[\"CARE\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963bdc180c5623', 0, NULL, '', '', NULL, 'New', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 07:03:25', '2019-10-18 07:03:25', 'Sun Graphics', NULL, '1', NULL, '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Mr. Ninad Kulkarni', NULL, '[\"Rating\"]', '[\"CARE\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963bdca352ea6a', 0, NULL, '', '', NULL, 'New', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 07:03:25', '2019-10-18 07:03:25', 'Samarth Tech Engineers', NULL, '1', NULL, '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Mr. Nilkanth Ganer ', NULL, '[\"Rating\"]', '[\"CARE\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963bdd1eee48fb', 0, NULL, '', '', NULL, 'New', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 07:03:25', '2019-10-18 07:03:25', 'Sunny Rubber Products', NULL, '1', NULL, '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Salman', NULL, '[\"Bank Loan\"]', '[\"CARE\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963bdd9bc8d139', 0, NULL, '', '', NULL, 'New', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 07:03:25', '2019-10-18 07:03:25', 'Om Enterprises', NULL, '1', NULL, '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Mr. Yogesh Gadiya', NULL, '[\"Rating\"]', '[\"CRISIL\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963bde174b55f6', 0, NULL, '', '', NULL, 'New', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 07:03:25', '2019-10-18 07:03:25', 'Shree Changbhale Transport', NULL, '1', NULL, '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Yogesh maheshwari', NULL, '[\"Taxation\"]', '[\"ICRA\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963bde96add8b7', 0, NULL, '', '', NULL, 'New', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 07:03:25', '2019-10-18 07:03:25', 'Wadkar Industries', NULL, '1', NULL, '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Sangram Singh', NULL, '[\"Audit\"]', '[\"Brickworks\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963bdf14134556', 0, NULL, '', '', NULL, 'New', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 07:03:25', '2019-10-18 07:03:25', 'Abhinandan Enterprises', NULL, '1', NULL, '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Mr. Abhinandan Gandhi', NULL, '[\"Rating\"]', '[\"Acuite\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963be04df0fd3a', 0, NULL, '', '', NULL, 'Converted', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 07:03:26', '2019-10-18 07:03:26', 'AV Process', NULL, '1', NULL, '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Summet Garg', NULL, '[\"Audit\"]', '[\"Infomerics\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963be0d1315f99', 0, NULL, '', '', NULL, 'New', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 07:03:26', '2019-10-18 07:03:26', 'B.R. Packaging Industries', NULL, '1', NULL, '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Mr. Bharat Shah', NULL, '[\"Rating\"]', '[\"Infomerics\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963be155dd53b5', 0, NULL, '', '', NULL, 'Converted', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 07:03:26', '2019-10-18 07:03:26', 'Ligman Lighting India Private Limited', NULL, '1', NULL, '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Mr. Manoj Khera ', NULL, '[\"Rating\"]', '[\"Infomerics\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963be1d10624de', 0, NULL, '', '', NULL, 'Converted', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 07:03:26', '2019-10-18 07:03:26', 'Nath Enterprises', NULL, '1', NULL, '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Ashok Bhide', NULL, '[\"Bank Loan\"]', '[\"Infomerics\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963be25545950b', 0, NULL, '', '', NULL, 'New', '', '', NULL, 'www.omkk.com', '', 'Pune', '', '', '', 0, '', '2019-10-18 07:03:26', '2019-10-18 07:28:25', 'Om Sai Petroleum', NULL, '1', '1', '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Ramesh Shah', '', '[\"Taxation\"]', '[\"India Rating\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963be2cfe2f37f', 0, NULL, '', '', NULL, 'Converted', 'Email', 'Construction', NULL, '', '', 'Pune', '', '', '', 0, '', '2019-10-18 07:03:26', '2019-10-18 07:06:32', 'Prathamesh Enterprises', NULL, '1', '1', '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Prathamesh Pophale', '', '[\"Rating\"]', '[\"CARE\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963be369024335', 0, NULL, '', '', NULL, 'New', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 07:03:26', '2019-10-18 07:03:26', 'Rajheramb Properties', NULL, '1', NULL, '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Ayush Agarwa', NULL, '[\"Audit\"]', '[\"CARE\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963be3d9537165', 0, NULL, '', '', NULL, 'New', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 07:03:26', '2019-10-18 07:03:26', 'Saya Enterprises', NULL, '1', NULL, '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Mr. Sameer Atar', NULL, '[\"Rating\"]', '[\"CARE\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963be43feb1d47', 0, NULL, '', '', NULL, 'Converted', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 07:03:26', '2019-10-18 07:03:26', 'SBA Metal and Steel Private Limited', NULL, '1', NULL, '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Amit Agarwa', NULL, '[\"Audit\"]', '[\"CARE\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963be4a88946b9', 0, NULL, '', '', NULL, 'Converted', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 07:03:26', '2019-10-18 08:47:00', 'Sharada Erectors Private Limited', NULL, '1', '1', '5bcab4cdd3e28fcb1', NULL, NULL, NULL, NULL, NULL, NULL, 'Rajesh Sharma', NULL, '[\"Audit\"]', '[\"CARE\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963be53f7ff2d8', 0, NULL, '', '', NULL, 'New', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 07:03:26', '2019-10-18 07:03:26', 'Vedic Supercriticals and Biotechnoligies Private L', NULL, '1', NULL, '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Mr. R. S. Deshpande (Director)', NULL, '[\"Rating\"]', '[\"CARE\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da963be5e903b446', 0, NULL, '', '', NULL, 'New', '', '', NULL, NULL, NULL, 'Pune', NULL, NULL, NULL, 0, NULL, '2019-10-18 07:03:26', '2019-10-18 07:03:26', 'Vaibhav Manufacturing Solutions Private Limited', NULL, '1', NULL, '5c0d4bf192a286f99', NULL, NULL, NULL, NULL, NULL, NULL, 'Sambha Kumar', NULL, '[\"Audit\"]', '[\"CARE\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5dbc1974c345a5a4a', 0, NULL, '', '', NULL, 'Converted', '', '', NULL, '', '', '', '', '', '', 0, '', '2019-11-01 11:39:32', '2019-11-01 11:39:32', 'Test Convert Leads to Opportunity 1          ', NULL, '5bcab4cdd3e28fcb1', NULL, '5bcab4cdd3e28fcb1', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5dbd0317c5f91ed01', 0, NULL, '', '', NULL, 'Converted', '', '', NULL, '', '', '', '', '', '', 0, '', '2019-11-02 04:16:23', '2019-11-02 04:16:23', 'Test Lead To Opportunity -1', NULL, '5bcab4cdd3e28fcb1', NULL, '5bcab4cdd3e28fcb1', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5dbd0808e2a31d9ac', 0, NULL, '', '', NULL, 'Converted', '', '', NULL, '', '', '', '', '', '', 0, '', '2019-11-02 04:37:28', '2019-11-02 04:37:28', 'Test Lead To Opportunity 2', NULL, '5bcab4cdd3e28fcb1', NULL, '5bcab4cdd3e28fcb1', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5dbd089f8630f6710', 1, NULL, '', '', NULL, 'Converted', '', '', NULL, '', '', '', '', '', '', 0, '', '2019-11-02 04:39:59', '2019-11-14 10:14:23', 'Test 11', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5dbd08e4a94604097', 1, NULL, '', '', NULL, 'Converted', '', '', NULL, '', '', '', '', '', '', 0, '', '2019-11-02 04:41:08', '2019-11-14 10:14:23', 'Lead To Opportunity', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5dc00dc47d362cdd4', 1, NULL, '', '', NULL, 'Converted', '', '', NULL, '', '', '', '', '', '', 0, '', '2019-11-04 11:38:44', '2019-11-14 10:14:23', 'l2o testing 4/11', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Java', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5dc11cc74e2f46b39', 1, NULL, '', '', NULL, 'Converted', '', '', NULL, '', '', '', '', '', '', 0, '', '2019-11-05 06:55:03', '2019-11-14 10:14:23', 'TEST ON 5/11', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5dc11d0a43775d418', 0, NULL, '', '', NULL, 'Converted', '', '', NULL, '', '', '', '', '', '', 0, '', '2019-11-05 06:56:10', '2019-11-05 06:56:10', 'TEST ON 5/11 By User', NULL, '5bcab4cdd3e28fcb1', NULL, '5bcab4cdd3e28fcb1', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5dc11f690f51093df', 0, NULL, '', '', NULL, 'New', '', '', NULL, 'www.abcd.com', 'Abcd', 'Pune', 'MH', 'INDIA', '411005', 0, '', '2019-11-05 07:06:17', '2019-11-05 07:06:17', 'TEST ON 05/11 1', NULL, '5bcab4cdd3e28fcb1', NULL, '5bcab4cdd3e28fcb1', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5dc14c7b7f4af3290', 0, NULL, '', '', NULL, 'Converted', 'Other', 'Building Materials & Equipment', NULL, 'www.testl2o.com', 'Test Nagar', 'Pune', 'MH', 'IND', '411005', 0, '', '2019-11-05 10:18:35', '2019-11-05 10:18:35', 'TEST L2O ON 5 NOV', NULL, '5bcab4cdd3e28fcb1', NULL, '5bcab4cdd3e28fcb1', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[\"Bank Loan\"]', '[\"CRISIL\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5dc151b161a25a55e', 0, NULL, '', '', NULL, 'Converted', 'Email', '', NULL, 'www.kiran.com', 'KIRAN NAGAR', 'PUNE', 'MH', 'IND', '411002', 0, '', '2019-11-05 10:40:49', '2019-11-05 10:40:49', 'TEST L2O 5 NOV 1', NULL, '5bcab4cdd3e28fcb1', NULL, '5bcab4cdd3e28fcb1', NULL, NULL, NULL, NULL, NULL, NULL, 'KIRAN', '', '[\"Rating\"]', '[\"CRISIL\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5dc50fc9934fcc77c', 0, NULL, '', '', NULL, 'Converted', '', '', NULL, '', '', '', '', '', '', 0, '', '2019-11-08 06:48:41', '2019-11-08 06:48:41', 'Test 1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5dc50ff0b0199e3d0', 1, NULL, '', '', NULL, 'Converted', '', '', NULL, '', '', '', '', '', '', 0, '', '2019-11-08 06:49:20', '2019-11-14 10:14:23', 'test mayank', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'mayank', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5dc540cd86b56a097', 1, NULL, '', '', NULL, 'Converted', '', '', NULL, '', '', '', '', '', '', 0, '', '2019-11-08 10:17:49', '2019-11-14 10:14:23', 'tEST 2', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5dc54199e45a41ff9', 1, NULL, '', '', NULL, 'Converted', '', '', NULL, '', '', '', '', '', '', 0, '', '2019-11-08 10:21:13', '2019-11-14 10:14:23', 'TEST 4', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5dc541f2e2e01c5cc', 1, NULL, '', '', NULL, 'Converted', '', '', NULL, '', '', '', '', '', '', 0, '', '2019-11-08 10:22:42', '2019-11-14 10:14:23', 'TEST5', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5dc8c6e088fc6921c', 0, NULL, '', '', NULL, 'In Process', 'DICCI', 'Manufacturing', NULL, '', 'Sadashiv Peth', 'Pune', 'MH', '', '', 0, 'Project cost is approx 90 lacs. Need to arrange term loan and working capital under Standup India Scheme. Met the client. Existing business is Municipal Contractor. Need to discuss fees with Anil Howalejee', '2019-11-11 02:26:40', '2019-11-14 10:17:14', 'Nirmal Harihat', NULL, '1', '1', '5b79b7bc6b5cfe0c0', NULL, NULL, NULL, NULL, NULL, NULL, 'Nirmal Harihat', 'DICCI', '[\"Bank Loan\"]', '[]', '', NULL, NULL, NULL, NULL, NULL, NULL),
('5dc9270132bfbd79c', 0, NULL, '', '', NULL, 'New', 'Web Site', '', NULL, '', '\"Address: A.B. Road, Labour Colony, Dewas District, ,', 'Amona', 'Madhya Pradesh', 'INDIA', '455001', 0, '', '2019-11-11 09:16:49', '2019-11-12 08:28:33', 'Dewas Metal Sections Limited', NULL, '5be182d5abb2e4d9f', '5be182d5abb2e4d9f', '5be182d5abb2e4d9f', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[\"Rating\"]', '[\"CRISIL\"]', '', 'INR', 20, '2019-09-30', '[\"Unaccepted\"]', '', 'BBB-'),
('5dc9278ec88d4b33d', 0, NULL, '', '', NULL, 'New', 'Web Site', 'Service', NULL, '', 'A/p. Shrigonda Factory,', 'Ahmednagar', 'Maharashtra', 'India', '', 0, '', '2019-11-11 09:19:10', '2019-11-11 09:40:25', 'Sahakar Maharshi Shivajirao Narayanrao Nagawade Sahkari Sakhar Karkhana Ltd', NULL, '5be182d5abb2e4d9f', '1', '5be182d5abb2e4d9f', NULL, NULL, NULL, NULL, NULL, NULL, 'Kachare Sagar-9922927013 (accounts)', '', '[\"Rating\"]', '[\"India Rating\"]', 'site', NULL, NULL, NULL, NULL, NULL, NULL),
('5dc927f2a9e2dbb97', 0, NULL, '', '', NULL, 'New', 'Web Site', 'Service', 10, '', 'Shankarnagar, Akluj, Yeshwantnagar Akluj, Malshiras,  - ,  ,', 'Solapur', 'Maharashtra', 'India', '413118', 0, '', '2019-11-11 09:20:50', '2019-11-12 08:07:23', 'S. M. Shankarrao Mohite Patil S. S. K. Ltd', 'INR', '5be182d5abb2e4d9f', '5be182d5abb2e4d9f', '5be182d5abb2e4d9f', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[\"Rating\"]', '[\"CRISIL\"]', 'Rajendra MD, Inamdar (CFO) - 7720067806', 'INR', 10, '2019-10-29', '[\"Unaccepted\"]', '', 'C'),
('5dca4198b0ff40b93', 0, NULL, '', '', NULL, 'New', '', '', NULL, '', 'NEW NO.3 (OLD NO.14), BAGIRATHI STREET, SRINIVASA AVENUE, R.A.PURAM, CHENNAI-28. CHENNAI Chennai TN 600028 IN', '', '', '', '', 0, '', '2019-11-12 05:22:32', '2019-11-12 08:27:18', 'Adam And Coal Resources Private Limited', NULL, '5c079088802310989', '5c079088802310989', '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, '', 'Internet', '[\"Rating\"]', '[\"CARE\"]', '', 'INR', 25, '2019-11-08', '[\"Unaccepted\"]', NULL, 'BB+'),
('5dca46bbe321f88df', 0, NULL, '', '', NULL, 'New', 'Web Site', 'Manufacturing', NULL, '', 'Office No 507, Eureka Tower,Mindspace Off Link Road, Malad West, Mumbai Mumbai City MH 400064 IN', '', '', '', '', 0, '', '2019-11-12 05:44:27', '2019-11-12 08:26:40', 'K. Patel Phyto Extractions Private Limited', NULL, '5c079088802310989', '5c079088802310989', '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[\"Rating\"]', '[\"CARE\"]', '', 'INR', 24, '2019-11-10', '[\"Unaccepted\"]', NULL, 'BB+'),
('5dca4c0db9a0e7bd0', 0, NULL, '', '', NULL, 'New', '', '', NULL, '', 'ABDUL RAHMANPUR ROAD DIDARGANJ PATNA CITY BR 800009 IN', '', '', '', '', 0, '', '2019-11-12 06:07:09', '2019-11-27 10:22:53', 'Magadh Industries Private Limited', NULL, '5c079088802310989', '5c079088802310989', '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[\"Rating\"]', '[\"ICRA\"]', '', 'INR', 142.23, '2019-11-08', '[\"Unaccepted\"]', NULL, 'BB-'),
('5dca4c83abe6d35f9', 0, NULL, '', '', NULL, 'New', '', 'Shipping', NULL, '', '201/202, Raheja Xion, 2nd Floor, Dr. Babasaheb Ambedkar Road, Near DCP Office Zone III, Byculla (East), Mumbai, Maharashtra 400027', '', '', '', '', 0, '', '2019-11-12 06:09:07', '2019-11-12 08:24:28', 'Samson Maritime Limited', NULL, '5c079088802310989', '5c079088802310989', '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[\"Rating\"]', '[\"ICRA\"]', '', 'INR', 0, '2019-11-11', '[\"Unaccepted\"]', NULL, 'D'),
('5dca4d32de890029d', 0, NULL, '', '', NULL, 'New', '', 'Apparel & Accessories', NULL, '', 'At Post-Dharangaon, Jalgaon Road, Dharangaon Jalgaon, Jalgaon - 425105, Near ACS College', '', '', '', '', 0, '', '2019-11-12 06:12:02', '2019-11-12 08:23:22', 'Shreeji Ginning And Pressing', NULL, '5c079088802310989', '5c079088802310989', '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[\"Rating\"]', '[\"CARE\"]', '', 'INR', 25, '2019-10-30', '[\"Unaccepted\"]', NULL, 'BB'),
('5dca51c860ca01011', 0, NULL, '', '', NULL, 'New', '', '', NULL, '', 'Five star MIDC, Kagal, Kolhapur', '', '', '', '', 0, '', '2019-11-12 06:31:36', '2019-11-12 06:43:52', 'Ambika Industry', NULL, '5c079088802310989', '5c079088802310989', '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, 'Nilesh Vivson', 'Reference', '[\"Rating\"]', '[]', 'Mr.Abhishek (Patidar Boards)', 'INR', 6.15, NULL, '[\"Live\"]', 'Bank Of Baroda', NULL),
('5dca735ec79a339a6', 0, NULL, '', '', NULL, 'New', '', '', NULL, 'http://www.bsindustries.org/', '', '', '', '', '', 0, '', '2019-11-12 08:54:54', '2019-11-12 08:54:54', 'B.S.Industries', NULL, '5be182d5abb2e4d9f', NULL, '5be182d5abb2e4d9f', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '[\"Rating\"]', '[\"CRISIL\"]', '', NULL, NULL, NULL, '[\"Unaccepted\"]', '', ''),
('5dca745fc97aacc2d', 0, NULL, '', '', NULL, 'New', '', '', NULL, '', '\"Address: 117-B, Periyar Nagar, Puliakulam', 'Coimbatore', 'Tamil Nadu', 'INDIA', '641045', 0, '', '2019-11-12 08:59:11', '2019-11-12 08:59:11', 'KCP Engineers Private Limited', NULL, '5be182d5abb2e4d9f', NULL, '5be182d5abb2e4d9f', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '[\"Rating\"]', '[\"CRISIL\"]', '', NULL, NULL, '2019-10-01', '[\"Unaccepted\"]', '', ''),
('5dca74ec18e0b1d51', 0, NULL, '', '', NULL, 'New', '', '', NULL, 'http://isacpl.in/', '\"Address: 100, 104, Nand Vihar, Azad Nagar', 'Hisar', 'Haryana', 'INDIA', '125001', 0, '', '2019-11-12 09:01:32', '2019-11-12 09:01:32', 'Ishwar Singh And Associates Construction Private Limited', NULL, '5be182d5abb2e4d9f', NULL, '5be182d5abb2e4d9f', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '[\"Rating\"]', '[\"CRISIL\"]', '', 'INR', 10, '2019-10-01', '[\"Unaccepted\"]', '', 'BB+'),
('5dca75790878fdd22', 0, NULL, '', '', NULL, 'New', '', '', NULL, '', 'Address: 509 Royal Plaza, New Link Rd, Next to Infiniti Mall  (W,', 'Andheri', 'Maharashtra', 'INDIA', '400053', 0, '', '2019-11-12 09:03:53', '2019-11-12 09:03:53', 'ADN Fire Safety Private Limited', NULL, '5be182d5abb2e4d9f', NULL, '5be182d5abb2e4d9f', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '[\"Rating\"]', '[\"CRISIL\"]', '', 'INR', 10, '2019-10-04', '[\"Unaccepted\"]', '', 'BB+'),
('5dca784cdd98615a3', 0, NULL, '', '', NULL, 'New', '', '', NULL, 'https://www.friendlymotors.in/', '\"Address: No 922 New Kantharaj Urs Road, Ashoka Cir, Lakshmipuram', 'Mysuru', 'Karnataka', 'INDIA', '570004', 0, '', '2019-11-12 09:15:56', '2019-11-12 09:15:56', 'Friendly Motors India Private Limited', NULL, '5be182d5abb2e4d9f', NULL, '5be182d5abb2e4d9f', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '[\"Rating\"]', '[\"CRISIL\"]', '', NULL, NULL, '2019-11-07', '[\"Unaccepted\"]', '', ''),
('5dcb96f07e837f4cf', 0, NULL, '', '', NULL, 'New', '', '', NULL, '', 'BHARAT HOUSE, 5TH FLOOR, BOMBAY SAMACHAR MARG, FORT, Mumbai, Maharashtra, 400001, India', '', '', '', '', 0, '', '2019-11-13 05:38:56', '2019-11-13 05:38:56', 'Batliboi Ltd', NULL, '5c079088802310989', NULL, '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '[\"Rating\"]', '[\"Brickworks\"]', '', 'INR', 52.5, '2019-11-08', '[\"Unaccepted\"]', '', 'B'),
('5dcb9b10938e6d6bd', 0, NULL, '', '', NULL, 'New', '', 'Publishing', NULL, '', '32&33, DODDABALLAPUR INDUSTRIAL AREA NEAR FACTORY CIRCLE BASHETTIHALLI, DODDABALLAPUR, PIN 561203. KA 000000 IN', '', '', '', '', 0, '', '2019-11-13 05:56:32', '2019-11-13 09:07:20', 'Jodhani Papers Private Limited', NULL, '5c079088802310989', '5c079088802310989', '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '[\"Rating\"]', '[\"ICRA\"]', '', 'INR', 150, '2019-10-25', '[\"Unaccepted\"]', '', 'BB+'),
('5dcb9c2825872664d', 0, NULL, '', '', NULL, 'New', '', 'Electric Power', NULL, '', 'Rampur, Jabalpur, Madhya Pradesh 482008', '', '', '', '', 0, '', '2019-11-13 06:01:12', '2019-11-13 06:01:12', 'Madhya Pradesh Power Transmission Co. Ltd.', NULL, '5c079088802310989', NULL, '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '[\"Rating\"]', '[\"ICRA\"]', '', 'INR', 2430, '2019-10-25', '[\"Unaccepted\"]', '', 'B'),
('5dcbe7a9f1b279cbf', 0, NULL, '', '', NULL, 'New', 'Call', '', NULL, 'www.suraj.in', 'Bungalow No. 3, Liberty Society, Phase-I, North Main Road, Koregaon Park,', 'Pune', 'Maharashtra', 'India.', '411001', 0, '', '2019-11-13 11:23:21', '2019-11-19 06:12:25', 'SUROJ BUILDCON PVT. LTD.', NULL, '5be182d5abb2e4d9f', '5be182d5abb2e4d9f', '5be182d5abb2e4d9f', NULL, NULL, NULL, NULL, NULL, NULL, 'Prakash Yelmame (Director), Vedake (FM)', NULL, '[\"Rating\"]', '[\"CRISIL\"]', 'Innovative Vastunirman Private Limited', 'INR', 210, '2019-02-12', '[\"Live\"]', '', 'BBB+'),
('5dccde7877ed7f10e', 0, NULL, '', '', NULL, 'New', '', 'Manufacturing', NULL, '', '301,3rd Floor, Aura Biplex, Above Kalyan Jewellers S. V. Road, Borivali (West) Mumbai Mumbai City MH 400092 IN', '', '', '', '', 0, '', '2019-11-14 04:56:24', '2019-11-14 04:56:24', 'Sudarshan Pharma Industries Limited', NULL, '5c079088802310989', NULL, '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '[\"Rating\"]', '[\"CARE\"]', '', 'INR', 20, '2019-11-13', '[\"Unaccepted\"]', '', 'BB'),
('5dcce014e2c4ae17f', 0, NULL, '', '', NULL, 'New', '', '', NULL, '', '(Formerly known as Kamdhenu Ispat Ltd.)\n2nd Floor, Tower-A, Building No. 9, DLF Cyber City Phase-III, Gurgaon - 122 002 (Haryana)', '', '', '', '', 0, '', '2019-11-14 05:03:16', '2019-11-14 05:03:16', 'Sunil Kumar Agarwal', NULL, '5c079088802310989', NULL, '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '[\"Rating\"]', '[\"Brickworks\"]', '', 'INR', 42, '2019-10-31', '[\"Unaccepted\"]', '', 'BBB+'),
('5dcd298cde9e01484', 0, NULL, '', '', NULL, 'New', 'DICCI', '', NULL, '', '', '', '', '', '', 0, 'Reference DICCI, Anil Sir.  Client is looking for 40 lacs term loan and CC for green filed fisheries project under Standup India Scheme', '2019-11-14 10:16:44', '2019-11-14 10:16:54', 'Prafull Khot', NULL, '1', '1', '5b79b7bc6b5cfe0c0', NULL, NULL, NULL, NULL, NULL, NULL, 'Prafull Khot', NULL, '[\"Bank Loan\"]', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
('5dcd373f00798d128', 0, NULL, '', '', NULL, 'New', '', '', NULL, '', 'Address: Plot No. 8822, Behind Hotel Sai Prathana, Near Vitthal Mandir, Vishrambhag', 'Sangli', 'Maharashtra', '', '416416', 0, '', '2019-11-14 11:15:11', '2019-11-14 11:18:33', 'USK Agro Sciences', NULL, '5be182d5abb2e4d9f', '5be182d5abb2e4d9f', '5be182d5abb2e4d9f', NULL, NULL, NULL, NULL, NULL, NULL, 'Sudhir Patil', NULL, '[\"Rating\"]', '[\"Brickworks\"]', '', 'INR', 10.28, '2019-02-20', '[\"Live\"]', '', 'B+'),
('5dcf85189ea39b674', 0, NULL, '', '', NULL, 'New', '', '', NULL, '', '53 57 KINFRA EPIPKUSUMAGIRI P O KAKKANAD KOCHI ERNAKULAM KL 682030 IN', '', '', '', '', 0, '', '2019-11-16 05:11:52', '2019-11-16 05:11:52', 'Kerafibertex International Pvt. Ltd.', NULL, '5c079088802310989', NULL, '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '[\"Rating\"]', '[\"ICRA\"]', '', NULL, NULL, '2019-11-13', '[\"Unaccepted\"]', '', 'BB+'),
('5dcf8a5207d6601ba', 0, NULL, '', '', NULL, 'New', '', '', NULL, '', 'Palladam Nagar Road, Tirupur - 641664', '', '', '', '', 0, '', '2019-11-16 05:34:10', '2019-11-16 05:34:10', 'Vanitha Textiles', NULL, '5c079088802310989', NULL, '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '[\"Rating\"]', '[\"ICRA\"]', '', 'INR', 26.07, '2019-11-15', '[\"Unaccepted\"]', '', 'BB+'),
('5dcf8b2aa6d944318', 0, NULL, '', '', NULL, 'New', '', '', NULL, '', 'Commerce House-1 Satya Marg, Bodakdev Ahmedabad GJ 380054 IN', '', '', '', '', 0, '', '2019-11-16 05:37:46', '2019-11-16 06:01:59', 'Troikaa Pharmaceuticals Limited', NULL, '5c079088802310989', '5c079088802310989', '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, 'Dipali Shah', NULL, '[\"Rating\"]', '[\"ICRA\"]', '', 'INR', 222.75, '2019-11-15', '[\"Unaccepted\"]', '', 'BBB+'),
('5dd287be09b79dd98', 0, NULL, '', '', NULL, 'New', '', '', NULL, '', '12/3B, Siddharth Tower, Office No. 1003, 10th Floor, Kothrud, Pune-411 029, (MS),', '', '', '', '', 0, '', '2019-11-18 11:59:58', '2019-12-17 08:07:14', 'Kent Intelligent Transportaion Systems India Pvt Ltd', NULL, '5c079088802310989', '5c079088802310989', '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, 'Bipin Bangad', NULL, '[\"Rating\"]', '[\"CRISIL\"]', 'Mr.Bipin Bangad', 'INR', 7.8, '2019-07-23', '[\"Live\"]', 'UCO, Axis Bank', 'BB'),
('5dd3b6f40c0465b13', 0, NULL, '', '', NULL, 'New', '', '', NULL, '', 'Joecons Beach Resort H No 1795/H Benaulim South Goa GA 403716 IN', '', '', '', '', 0, '', '2019-11-19 09:33:40', '2019-11-19 09:34:15', 'Joecons Marine Exports Private Limited', NULL, '5c079088802310989', '5c079088802310989', '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, 'Mr.Dhiraj', NULL, '[\"Rating\"]', '[\"CARE\"]', '', 'INR', 35, '2019-10-19', '[\"Unaccepted\"]', 'Central Bank', 'B+'),
('5dd3b79b9f26378d4', 0, NULL, '', '', NULL, 'New', '', '', NULL, '', 'AL 9 SECTOR 13 GIDA INDUSTRIAL AREA GORAKHPUR UTTAR PRADESH UP 273209 IN', '', '', '', '', 0, '', '2019-11-19 09:36:27', '2019-11-19 09:36:47', 'Azam Rubber Products Limited', NULL, '5c079088802310989', '5c079088802310989', '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '[\"Rating\"]', '[\"ICRA\"]', '', 'INR', 80, '2019-10-16', '[\"Unaccepted\"]', '', 'D'),
('5dd3dd37e5bfa01ba', 0, NULL, '', '', NULL, 'New', '', '', NULL, '', 'Khasra No. 37/19, Ground Floor, Safiabad Road Gali No. 7, Sanjay Colony, Narela New Delhi North West DL 110040 IN', '', '', '', '', 0, '', '2019-11-19 12:16:55', '2019-11-19 12:16:55', 'Intact Transport Private Limited', NULL, '5c079088802310989', NULL, '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '[\"Rating\"]', '[\"ICRA\"]', '', 'INR', 200, '2019-10-04', '[\"Unaccepted\"]', '', 'BB-'),
('5dd4c4a1ef02682a6', 0, NULL, '', '', NULL, 'New', '', '', NULL, '', 'B/126 GHATKOPAR INDUSTRIALESTATE LBS MARG GHATKOPAR-W MUMBAI MH 400086 IN', '', '', '', '', 0, '', '2019-11-20 04:44:17', '2019-11-21 08:59:52', 'Leo Chemo Plast Private Limited', NULL, '5c079088802310989', '5c079088802310989', '5c079088802310989', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '[\"Rating\"]', '[\"ICRA\"]', '', 'INR', 50, '2019-10-24', '[\"Unaccepted\"]', '', 'BB+'),
('5de7741598354bde6', 0, NULL, '', '', NULL, 'New', 'Existing Customer', '', NULL, '', '', '', '', '', '', 0, '', '2019-12-04 08:53:41', '2019-12-09 08:37:33', 'Test Lead to Opportunity', NULL, '5bcab4cdd3e28fcb1', '5d0c73a5ad4e88a90', '5bcab4cdd3e28fcb1', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '[]', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
('5dee07f4663dbdbcb', 0, NULL, '', '', NULL, 'New', 'Partner', '', NULL, '', '', '', '', '', '', 0, '', '2019-12-09 08:38:12', '2019-12-09 08:59:17', 'Testing', NULL, '5d0c73a5ad4e88a90', '5d0c73a5ad4e88a90', '5d0c73a5ad4e88a90', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '[]', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leads_corporate`
--

DROP TABLE IF EXISTS `leads_corporate`;
CREATE TABLE IF NOT EXISTS `leads_corporate` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concerened_person` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leads_corporate_parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `leads_corporate_parent1_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`),
  KEY `IDX_LEADS_CORPORATE_PARENT_ID` (`leads_corporate_parent_id`),
  KEY `IDX_LEADS_CORPORATE_PARENT1_ID` (`leads_corporate_parent1_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leads_corporate_leads_corporate`
--

DROP TABLE IF EXISTS `leads_corporate_leads_corporate`;
CREATE TABLE IF NOT EXISTS `leads_corporate_leads_corporate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `left_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `right_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_265555D7E26CCE0254976835` (`left_id`,`right_id`),
  KEY `IDX_265555D7E26CCE02` (`left_id`),
  KEY `IDX_265555D754976835` (`right_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leads_p_l`
--

DROP TABLE IF EXISTS `leads_p_l`;
CREATE TABLE IF NOT EXISTS `leads_p_l` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `leads_p_l_parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`),
  KEY `IDX_LEADS_P_L_PARENT_ID` (`leads_p_l_parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_meeting`
--

DROP TABLE IF EXISTS `lead_meeting`;
CREATE TABLE IF NOT EXISTS `lead_meeting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meeting_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT 'None',
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_ACDBBD5755458D67433D9C` (`lead_id`,`meeting_id`),
  KEY `IDX_ACDBBD5755458D` (`lead_id`),
  KEY `IDX_ACDBBD5767433D9C` (`meeting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_target_list`
--

DROP TABLE IF EXISTS `lead_target_list`;
CREATE TABLE IF NOT EXISTS `lead_target_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_list_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `opted_out` tinyint(1) DEFAULT 0,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_7041AADD55458DF6C6AFE0` (`lead_id`,`target_list_id`),
  KEY `IDX_7041AADD55458D` (`lead_id`),
  KEY `IDX_7041AADDF6C6AFE0` (`target_list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `l_e_o`
--

DROP TABLE IF EXISTS `l_e_o`;
CREATE TABLE IF NOT EXISTS `l_e_o` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mass_email`
--

DROP TABLE IF EXISTS `mass_email`;
CREATE TABLE IF NOT EXISTS `mass_email` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `store_sent_emails` tinyint(1) NOT NULL DEFAULT 0,
  `opt_out_entirely` tinyint(1) NOT NULL DEFAULT 0,
  `from_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_to_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_to_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `email_template_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `campaign_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `inbound_email_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EMAIL_TEMPLATE_ID` (`email_template_id`),
  KEY `IDX_CAMPAIGN_ID` (`campaign_id`),
  KEY `IDX_INBOUND_EMAIL_ID` (`inbound_email_id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mass_email_target_list`
--

DROP TABLE IF EXISTS `mass_email_target_list`;
CREATE TABLE IF NOT EXISTS `mass_email_target_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mass_email_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_list_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6B9CE04DEF1946ABF6C6AFE0` (`mass_email_id`,`target_list_id`),
  KEY `IDX_6B9CE04DEF1946AB` (`mass_email_id`),
  KEY `IDX_6B9CE04DF6C6AFE0` (`target_list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mass_email_target_list_excluding`
--

DROP TABLE IF EXISTS `mass_email_target_list_excluding`;
CREATE TABLE IF NOT EXISTS `mass_email_target_list_excluding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mass_email_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_list_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4D889BE8EF1946ABF6C6AFE0` (`mass_email_id`,`target_list_id`),
  KEY `IDX_4D889BE8EF1946AB` (`mass_email_id`),
  KEY `IDX_4D889BE8F6C6AFE0` (`target_list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

DROP TABLE IF EXISTS `meeting`;
CREATE TABLE IF NOT EXISTS `meeting` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Planned',
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_PARENT` (`parent_id`,`parent_type`),
  KEY `IDX_ACCOUNT_ID` (`account_id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_DATE_START_STATUS` (`date_start`,`status`),
  KEY `IDX_DATE_START` (`date_start`,`deleted`),
  KEY `IDX_STATUS` (`status`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`),
  KEY `IDX_ASSIGNED_USER_STATUS` (`assigned_user_id`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_user`
--

DROP TABLE IF EXISTS `meeting_user`;
CREATE TABLE IF NOT EXISTS `meeting_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meeting_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT 'None',
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_61622E9BA76ED39567433D9C` (`user_id`,`meeting_id`),
  KEY `IDX_61622E9BA76ED395` (`user_id`),
  KEY `IDX_61622E9B67433D9C` (`meeting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mobile_otp`
--

DROP TABLE IF EXISTS `mobile_otp`;
CREATE TABLE IF NOT EXISTS `mobile_otp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobileNumber` varchar(50) NOT NULL,
  `otp` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `createdAt` varchar(50) NOT NULL,
  `validity_time` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `multiple_document_upload`
--

DROP TABLE IF EXISTS `multiple_document_upload`;
CREATE TABLE IF NOT EXISTS `multiple_document_upload` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Planned',
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_PARENT` (`parent_id`,`parent_type`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_DATE_START_STATUS` (`date_start`,`status`),
  KEY `IDX_DATE_START` (`date_start`,`deleted`),
  KEY `IDX_STATUS` (`status`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`),
  KEY `IDX_ASSIGNED_USER_STATUS` (`assigned_user_id`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `multiple_document_upload_account`
--

DROP TABLE IF EXISTS `multiple_document_upload_account`;
CREATE TABLE IF NOT EXISTS `multiple_document_upload_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `multiple_document_upload_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_DB3DFC919B6B5FBA742F422D` (`account_id`,`multiple_document_upload_id`),
  KEY `IDX_DB3DFC919B6B5FBA` (`account_id`),
  KEY `IDX_DB3DFC91742F422D` (`multiple_document_upload_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `multiple_document_upload_contact`
--

DROP TABLE IF EXISTS `multiple_document_upload_contact`;
CREATE TABLE IF NOT EXISTS `multiple_document_upload_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `multiple_document_upload_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_EA694C0DE7A1254A742F422D` (`contact_id`,`multiple_document_upload_id`),
  KEY `IDX_EA694C0DE7A1254A` (`contact_id`),
  KEY `IDX_EA694C0D742F422D` (`multiple_document_upload_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `multiple_document_upload_document`
--

DROP TABLE IF EXISTS `multiple_document_upload_document`;
CREATE TABLE IF NOT EXISTS `multiple_document_upload_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `multiple_document_upload_lead`
--

DROP TABLE IF EXISTS `multiple_document_upload_lead`;
CREATE TABLE IF NOT EXISTS `multiple_document_upload_lead` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `multiple_document_upload_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_F904792155458D742F422D` (`lead_id`,`multiple_document_upload_id`),
  KEY `IDX_F904792155458D` (`lead_id`),
  KEY `IDX_F9047921742F422D` (`multiple_document_upload_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `multiple_document_upload_multiple_document_upload`
--

DROP TABLE IF EXISTS `multiple_document_upload_multiple_document_upload`;
CREATE TABLE IF NOT EXISTS `multiple_document_upload_multiple_document_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `left_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `right_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B02CF7EBE26CCE0254976835` (`left_id`,`right_id`),
  KEY `IDX_B02CF7EBE26CCE02` (`left_id`),
  KEY `IDX_B02CF7EB54976835` (`right_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `my_leads`
--

DROP TABLE IF EXISTS `my_leads`;
CREATE TABLE IF NOT EXISTS `my_leads` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `concerned_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_rs_in_crore` double DEFAULT NULL,
  `amount_rs_in_crore_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_l_a`
--

DROP TABLE IF EXISTS `m_l_a`;
CREATE TABLE IF NOT EXISTS `m_l_a` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_entity_dated19th_may2019`
--

DROP TABLE IF EXISTS `new_entity_dated19th_may2019`;
CREATE TABLE IF NOT EXISTS `new_entity_dated19th_may2019` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `next_number`
--

DROP TABLE IF EXISTS `next_number`;
CREATE TABLE IF NOT EXISTS `next_number` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `entity_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `field_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` int(11) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `IDX_ENTITY_TYPE` (`entity_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `post` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `is_global` tinyint(1) NOT NULL DEFAULT 0,
  `is_internal` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `related_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `related_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `super_parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `super_parent_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number` (`number`),
  UNIQUE KEY `UNIQ_CFBDFA1496901F54` (`number`),
  KEY `IDX_PARENT` (`parent_id`,`parent_type`),
  KEY `IDX_RELATED` (`related_id`,`related_type`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_SUPER_PARENT` (`super_parent_id`,`super_parent_type`),
  KEY `IDX_CREATED_AT` (`created_at`),
  KEY `IDX_PARENT_AND_SUPER_PARENT` (`parent_id`,`parent_type`,`super_parent_id`,`super_parent_type`)
) ENGINE=InnoDB AUTO_INCREMENT=19476 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `note_portal`
--

DROP TABLE IF EXISTS `note_portal`;
CREATE TABLE IF NOT EXISTS `note_portal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `portal_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_137CC42426ED0855B887E1DD` (`note_id`,`portal_id`),
  KEY `IDX_137CC42426ED0855` (`note_id`),
  KEY `IDX_137CC424B887E1DD` (`portal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `note_team`
--

DROP TABLE IF EXISTS `note_team`;
CREATE TABLE IF NOT EXISTS `note_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `team_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_649AB74726ED0855296CD8AE` (`note_id`,`team_id`),
  KEY `IDX_649AB74726ED0855` (`note_id`),
  KEY `IDX_649AB747296CD8AE` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `note_user`
--

DROP TABLE IF EXISTS `note_user`;
CREATE TABLE IF NOT EXISTS `note_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2DE9C71126ED0855A76ED395` (`note_id`,`user_id`),
  KEY `IDX_2DE9C71126ED0855` (`note_id`),
  KEY `IDX_2DE9C711A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `data` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  `email_is_processed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `related_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `related_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `related_parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `related_parent_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number` (`number`),
  UNIQUE KEY `UNIQ_BF5476CA96901F54` (`number`),
  KEY `IDX_USER_ID` (`user_id`),
  KEY `IDX_RELATED` (`related_id`,`related_type`),
  KEY `IDX_RELATED_PARENT` (`related_parent_id`,`related_parent_type`),
  KEY `IDX_CREATED_AT` (`created_at`),
  KEY `IDX_USER` (`user_id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=13345 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `n_a_n_o`
--

DROP TABLE IF EXISTS `n_a_n_o`;
CREATE TABLE IF NOT EXISTS `n_a_n_o` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `n_i_o_a`
--

DROP TABLE IF EXISTS `n_i_o_a`;
CREATE TABLE IF NOT EXISTS `n_i_o_a` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `n_i_s_c_data`
--

DROP TABLE IF EXISTS `n_i_s_c_data`;
CREATE TABLE IF NOT EXISTS `n_i_s_c_data` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `n_s_i_c_data`
--

DROP TABLE IF EXISTS `n_s_i_c_data`;
CREATE TABLE IF NOT EXISTS `n_s_i_c_data` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating_agency` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concerned_person` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry_sector` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `n_s_i_c_test_data`
--

DROP TABLE IF EXISTS `n_s_i_c_test_data`;
CREATE TABLE IF NOT EXISTS `n_s_i_c_test_data` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating_agency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `office_location`
--

DROP TABLE IF EXISTS `office_location`;
CREATE TABLE IF NOT EXISTS `office_location` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeofoffice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `gstin` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`),
  KEY `IDX_USER_ID` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opportunity`
--

DROP TABLE IF EXISTS `opportunity`;
CREATE TABLE IF NOT EXISTS `opportunity` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `amount` double DEFAULT NULL,
  `stage` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Prospecting',
  `last_stage` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `probability` int(11) DEFAULT NULL,
  `lead_source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `close_date` date DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `amount_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `campaign_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactperson` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ACCOUNT_ID` (`account_id`),
  KEY `IDX_CAMPAIGN_ID` (`campaign_id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_STAGE` (`stage`,`deleted`),
  KEY `IDX_LAST_STAGE` (`last_stage`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`),
  KEY `IDX_CREATED_AT` (`created_at`,`deleted`),
  KEY `IDX_CREATED_AT_STAGE` (`created_at`,`stage`),
  KEY `IDX_ASSIGNED_USER_STAGE` (`assigned_user_id`,`stage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opportunity`
--

INSERT INTO `opportunity` (`id`, `name`, `deleted`, `amount`, `stage`, `last_stage`, `probability`, `lead_source`, `close_date`, `description`, `created_at`, `modified_at`, `amount_currency`, `account_id`, `campaign_id`, `created_by_id`, `modified_by_id`, `assigned_user_id`, `address_street`, `address_city`, `address_state`, `address_country`, `address_postal_code`, `contactperson`, `website`, `industry`) VALUES
('0ayda0wdw0z4c3llq', 'tEST 2', 0, 15, 'Closed Won', 'Closed Won', 10, '', '2019-11-08', '', '2019-11-08 03:48:10', '2019-11-08 03:48:10', NULL, 'rkh7b9gcy82nfwkkg', NULL, '1', NULL, '1', '', '', '', '', '', '', '', ''),
('30gn868pqo28v477p', 'RATING', 0, 100, 'Closed Won', 'Closed Won', 50, '', '2019-11-08', '', '2019-11-08 03:43:01', '2019-11-08 10:14:01', NULL, 'glvdjwlp0nmu1hsua', NULL, '1', '1', '1', '', '', '', '', '', 'mayank', '', ''),
('3ih3hjjzokzgai2gc', 'proadfactor', 0, 10000, 'Closed Won', 'Closed Won', 20, '', '2019-10-14', 'fdgd', '2019-10-14 12:49:27', '2019-10-14 12:49:27', NULL, '6wbkpyksmipirkema', NULL, '1', NULL, '1', '', '', '', '', '', 'Harshit', '', 'Advertising'),
('5cvyywjzxi7bov7i0', 'TEST L2O ON 5 NOV', 0, 45000, 'Closed Won', 'Closed Won', 10, 'Other', '2019-11-05', '', '2019-11-05 03:49:30', '2019-11-05 03:49:30', NULL, 'pdcg7wnx3ct1swllg', NULL, '5bcab4cdd3e28fcb1', NULL, '5bcab4cdd3e28fcb1', 'Test Nagar', 'Pune', 'MH', 'IND', '411005', '', 'www.testl2o.com', 'Building Materials & Equipment'),
('5d821910e1b11123f', 'Sidram Sirure', 0, 50000, 'Prospecting', 'Prospecting', 10, '', '2019-09-19', '', '2019-09-18 11:46:24', '2019-09-18 11:46:46', 'INR', NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5d8db833ef67ed509', 'pradeep pal', 0, 12.5, 'Negotiation', 'Negotiation', 80, '', '2019-09-21', 'Client needs time, he will soon give confirmation', '2019-09-27 07:20:19', '2019-09-27 07:20:19', 'INR', NULL, NULL, '1', NULL, '5b908e0de61894653', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5d9852e6aeab266cd', 'Tester', 1, 1, 'Prospecting', 'Prospecting', 10, '', '2019-10-27', '', '2019-10-05 08:23:02', '2019-10-05 08:23:02', 'INR', '5b719375d2c7c0454', NULL, '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5d9f178cefb69429f', 'Bank CC loan', 0, 2600000, 'Negotiation', 'Negotiation', 80, '', '2019-10-08', '', '2019-10-10 11:35:40', '2019-10-10 11:35:40', 'INR', 'afqfithfpsr4fl2i7', NULL, '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da02281641262454', 'Test 2', 1, 10, 'Prospecting', 'Prospecting', 10, '', '2019-10-12', '', '2019-10-11 06:34:41', '2019-10-11 06:34:41', 'INR', '5b719375d2c7c0454', NULL, '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5da85ec852016374b', '1', 0, 1, 'Closed Won', NULL, 100, '', '2019-10-18', '', '2019-10-17 12:30:00', '2019-10-17 12:31:00', 'INR', NULL, NULL, '1', '1', '1', '', '', '', '', '', NULL, '', NULL),
('5da85ece52bb6907b', '2', 0, 2, 'Closed Lost', NULL, 10, '', '2019-10-27', '', '2019-10-17 12:30:06', '2019-10-17 12:31:58', 'INR', NULL, NULL, '1', '1', '1', '', '', '', '', '', NULL, '', NULL),
('5da85ed4521b10260', '3', 0, 3, 'Prospecting', NULL, 3, '', NULL, '', '2019-10-17 12:30:12', '2019-10-17 12:30:12', 'INR', NULL, NULL, '1', NULL, '1', '', '', '', '', '', NULL, '', NULL),
('5da85edadc225638e', '4', 0, 4, 'Closed Lost', NULL, 1, '', '2019-10-05', '', '2019-10-17 12:30:18', '2019-10-18 11:21:23', 'INR', NULL, NULL, '1', '1', '1', '', '', '', '', '', NULL, '', NULL),
('5da85ee65ea29c1b8', '6', 0, 6, 'Closed Won', NULL, 50, '', '2019-10-19', '', '2019-10-17 12:30:30', '2019-10-18 11:21:04', 'INR', NULL, NULL, '1', '1', '1', '', '', '', '', '', NULL, '', NULL),
('5dee06f22425a65a7', 'Dummy', 0, 150000000, 'Prospecting', 'Prospecting', 10, '', NULL, '', '2019-12-09 08:33:54', '2019-12-09 08:34:31', 'INR', NULL, NULL, '5d0c73a5ad4e88a90', '5d0c73a5ad4e88a90', '5d0c73a5ad4e88a90', '', '', '', '', '', NULL, '', NULL),
('5dee07326490ca1ee', 'Dummy', 0, 125000000, 'Closed Lost', 'Negotiation', 0, '', NULL, '', '2019-12-09 08:34:58', '2019-12-14 06:03:19', 'INR', NULL, NULL, '5d0c73a5ad4e88a90', '5c0d4bf192a286f99', '5d0c73a5ad4e88a90', '', '', '', '', '', NULL, '', NULL),
('5dee077b81daef727', 'dummy', 0, 2000000, 'Prospecting', 'Prospecting', 10, '', NULL, '', '2019-12-09 08:36:11', '2019-12-09 08:36:11', 'INR', NULL, NULL, '5d0c73a5ad4e88a90', NULL, '5d0c73a5ad4e88a90', '', '', '', '', '', NULL, '', NULL),
('5dfca77310a7ed9e8', 'ABCD', 0, 2250000, 'Prospecting', 'Prospecting', 10, '', '2019-12-20', '', '2019-12-20 10:50:27', '2019-12-20 10:50:27', 'INR', '5df70cbb12d63e1ef', NULL, '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('6ockasivn8sl8y2d4', 'Nath Enterprises', 0, 1540000, 'Prospecting', NULL, 10, '', NULL, '', '2019-11-01 05:06:22', '2019-11-01 05:06:22', NULL, 'Nath Enterprises', NULL, '1', NULL, '5c0d4bf192a286f99', '', 'Pune', '', '', '', 'Ashok Bhide', '', ''),
('8cn217p5elgfekdm6', 'Opportunity converted from lead', 0, 100, 'Closed Won', 'Closed Won', 10, '', '2019-11-06', '', '2019-12-04 02:24:42', '2019-12-09 08:41:17', NULL, 'ejoifk8480rbyow7y', NULL, '5bcab4cdd3e28fcb1', '5d0c73a5ad4e88a90', '5bcab4cdd3e28fcb1', '', '', '', '', '', '', '', ''),
('90vjap9oo4kccqyll', 'Nath Enterprises', 0, 16850000, 'Prospecting', NULL, 10, '', NULL, '', '2019-11-01 05:04:53', '2019-11-01 05:04:53', NULL, 'Nath Enterprises', NULL, '1', NULL, '5c0d4bf192a286f99', '', 'Pune', '', '', '', 'Ashok Bhide', '', ''),
('anv22eyuqwym1efnx', 'test', 0, 1100, 'Prospecting', NULL, 10, '', '1970-01-01', '', '2019-10-12 11:45:59', '2019-10-12 11:45:59', NULL, '', NULL, NULL, NULL, NULL, 'JM', 'Pune', 'MH', 'India', '458762', 'Ashok Pandit', '', NULL),
('bnbkb9gn3nvtzy58h', 'TEST L2O 5 NOV 1', 0, 15422, 'Closed Won', 'Closed Won', 10, 'Email', '2019-11-05', '', '2019-11-05 04:11:10', '2019-11-05 04:11:10', NULL, '7kb86grz02swz93fs', NULL, '5bcab4cdd3e28fcb1', NULL, '5bcab4cdd3e28fcb1', 'KIRAN NAGAR', 'PUNE', 'MH', 'IND', '411002', 'KIRAN', 'www.kiran.com', ''),
('c36sql2h8x6acvua1', 'AV Process new', 0, 45000, 'Prospecting', NULL, 10, '', NULL, '', '2019-11-02 05:14:23', '2019-11-02 05:14:23', NULL, 'AV Process', NULL, '1', NULL, '5c0d4bf192a286f99', '', 'Pune', '', '', '', 'Summet Garg', '', ''),
('cfjdg3qwuyz3d8uzc', 'Project Sab Motors Pvt. Ltd.', 0, 100000000, 'Closed Won', 'Closed Won', 20, '', '2019-10-18', '', '2019-10-16 10:39:02', '2019-10-16 05:27:48', 'INR', 't0ext7a4v02d7vod4', NULL, '5baa1e8fe1a112b3c', '1', '5d78b3c5017b1cb41', '806, EROS APARTMENTS 56, NEHRU PLACE NEW DELHI', 'NEW DELHI', 'DELHI', 'India', '110019', 'sab motors', '', ''),
('cy5esq7tjjh01rb13', 'Software Development', 0, 1000000, 'Closed Won', 'Closed Won', 10, 'Email', '2019-10-14', 'test', '2019-10-14 11:04:05', '2019-10-14 06:35:07', 'INR', '01ay8txswar482c45', NULL, '1', '1', '1', 'MG Road', 'Pune', 'Maharashtra', 'India', '785695', 'vishnu lokhande', 'it.com', 'Computer'),
('d4z8q5tr6xsz4k7uu', 'TEST5', 0, 15, 'Closed Won', 'Closed Won', 10, '', '2019-11-08', '', '2019-11-08 03:52:55', '2019-11-11 09:16:17', NULL, 'htx2rpx19ha37hmzm', NULL, '1', '1', '5c079088802310989', '', '', '', '', '', '', '', ''),
('e36nfnsboilrpx7qn', 'Identity Design', 0, 100000000, 'Closed Won', 'Closed Won', 80, '', '2019-10-16', 'Design brand identity for Recruit Desk', '2019-10-16 09:41:55', '2019-10-16 04:13:46', 'INR', 'oabu34zoe4ecfbq52', NULL, '1', '1', '1', '', '', '', '', '', 'Ahutosh Bhyri', '', 'Telecommunications'),
('flp9nyd5nwk1qzoou', 'Bank Term Loan', 0, 10000000, 'Prospecting', NULL, 50, '', '1970-01-01', '', '2019-10-10 04:29:15', '2019-10-10 04:29:15', NULL, 'afqfithfpsr4fl2i7', NULL, NULL, NULL, NULL, 'JM', 'Pune', 'MH', 'India', '456789', 'Anil Agarwal', '', NULL),
('h2m7lti7pb1edhugd', 'prnmtest', 1, 100, 'Prospecting', NULL, 10, '', NULL, '', '2019-10-14 01:15:02', '2019-10-14 07:45:29', NULL, 'testaccnm', NULL, '1', '1', '1', 'MG Road', 'Pune', 'Maharashtra', 'India', '785695', 'ajay', '', 'Construction'),
('hu4ldrwmd146t2yhl', 'Prathamesh Enterprises', 0, 100000, 'Closed Won', 'Closed Won', 80, 'Email', '2019-11-01', 'Can be  a good customer', '2019-10-18 12:38:52', '2019-10-18 12:38:52', NULL, 'erufs36an0srwkybl', NULL, '1', NULL, '5c0d4bf192a286f99', 'Viman Nagar', 'Pune', 'MH', 'India', '411014', 'Prathamesh Pophale', 'www.Prathamesh.com', 'Construction'),
('ieeibe8oat5mt05u3', 'prnmtest', 0, 100, 'Closed Won', NULL, 10, '', '2019-10-21', '', '2019-10-14 01:15:48', '2019-10-14 01:15:48', NULL, 'testaccnm', NULL, '1', NULL, '1', 'MG Road', 'Pune', 'Maharashtra', 'India', '785695', 'ajay', '', 'Construction'),
('jez63xf71ooasaxae', 'TEST ON 5/11', 0, 154000, 'Prospecting', NULL, 10, '', NULL, '', '2019-11-05 12:25:26', '2019-11-05 12:25:26', NULL, 'TEST ON 5/11', NULL, '1', NULL, '1', '', '', '', '', '', '', '', ''),
('kxaa6chc2qt8fw317', 'Project Testing', 0, 20000, 'Prospecting', NULL, 10, '', '2019-10-31', 'Test12345', '2019-10-10 11:56:55', '2019-10-10 11:56:55', NULL, 'ryorneihvftl94zlk', NULL, NULL, NULL, NULL, 'JM', 'Pune', 'MH', 'India', '458762', 'Ashok Pandit', 'test1.com', NULL),
('mncmgbvn5e7x79rsk', 'Test 1', 0, 15, 'Closed Won', 'Closed Won', 10, '', '2019-11-08', '', '2019-11-08 03:46:05', '2019-11-08 03:46:05', NULL, 'hykqqbdw4e7mapz8c', NULL, '1', NULL, '', '', '', '', '', '', '', '', ''),
('njftwgx7kcv3uenvx', 'Project Testing', 1, 20000, 'Prospecting', NULL, 10, '', '2019-10-31', 'Test00', '2019-10-10 11:52:34', '2019-10-10 06:27:15', NULL, 'Testing Account', NULL, NULL, '1', NULL, 'JM', 'Pune', 'MH', 'India', '458762', '', 'test1.com', NULL),
('oaawphh6emq1y7kq3', 'TEST 4', 0, 15422, 'Closed Won', 'Closed Won', 10, '', '2019-11-08', '', '2019-11-08 03:51:28', '2019-11-08 03:51:28', NULL, 'b4ge3ozsntotov1nu', NULL, '1', NULL, '1', '', '', '', '', '', '', '', ''),
('s3kaubngsztdct6bn', 'Lead to Opportunity 12', 0, 548000, 'Closed Won', 'Closed Won', 10, '', '2019-11-04', '', '2019-11-02 10:11:27', '2019-11-02 10:11:27', NULL, '9b6a2sxssluggdzc7', NULL, '1', NULL, '1', '', '', '', '', '', '', '', ''),
('u6j0gmyrrohrg4l27', 'TEST ON  05/11 By User', 0, 15400, 'Closed Won', 'Closed Won', 10, '', '2019-11-08', '', '2019-11-05 12:26:38', '2019-11-05 12:26:38', NULL, '4wneyuhi6bqlhqefj', NULL, '5bcab4cdd3e28fcb1', NULL, '5bcab4cdd3e28fcb1', '', '', '', '', '', '', '', ''),
('uem5ed8uzjp7qhhji', 'TESTING', 0, 1, 'Closed Won', 'Closed Won', 10, '', '2019-11-04', '', '2019-11-04 05:08:58', '2019-11-04 05:08:58', NULL, 'fcsfrxgnq7z8wnnwr', NULL, '1', NULL, '1', '', '', '', '', '', 'Java', '', ''),
('w7bm7i77nvk4s4ryf', 'kddk', 0, 50, 'Prospecting', NULL, 10, '', NULL, '', '2019-11-11 02:51:07', '2019-11-11 02:51:07', NULL, 'kddk', NULL, '5be182d5abb2e4d9f', NULL, '5be182d5abb2e4d9f', '', '', '', '', '', '', '', ''),
('y8xcfku3upikdzvum', 'Test 111', 0, 5000, 'Closed Won', 'Closed Won', 10, '', '2019-11-02', '', '2019-11-02 10:10:12', '2019-11-02 10:10:12', NULL, 'iplml81unpy3ehzad', NULL, '1', NULL, '1', '', '', '', '', '', '', '', ''),
('zjc5y1n7inmv1wmhh', 'kkkl', 0, 20, 'Prospecting', NULL, 10, '', NULL, '', '2020-01-14 02:47:04', '2019-11-11 02:47:04', NULL, 'lkil', NULL, '5be182d5abb2e4d9f', NULL, '5be182d5abb2e4d9f', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `password_change_request`
--

DROP TABLE IF EXISTS `password_change_request`;
CREATE TABLE IF NOT EXISTS `password_change_request` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `request_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_REQUEST_ID` (`request_id`),
  KEY `IDX_USER_ID` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoiceno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billedamount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amountcredited` int(11) DEFAULT NULL,
  `mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Cash',
  `transactionid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tds` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentstatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `createddate` date DEFAULT NULL,
  `pdate` date DEFAULT NULL,
  `paymentdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `paymenttype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`),
  KEY `IDX_ACCOUNT_ID` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phone_number`
--

DROP TABLE IF EXISTS `phone_number`;
CREATE TABLE IF NOT EXISTS `phone_number` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_NAME` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portal`
--

DROP TABLE IF EXISTS `portal`;
CREATE TABLE IF NOT EXISTS `portal` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `custom_id` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `tab_list` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quick_create_list` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `time_zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `time_format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `week_start` int(11) DEFAULT -1,
  `default_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `dashboard_layout` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dashlets_options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `logo_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_logo_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CUSTOM_ID` (`custom_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portal_portal_role`
--

DROP TABLE IF EXISTS `portal_portal_role`;
CREATE TABLE IF NOT EXISTS `portal_portal_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portal_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `portal_role_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B29E22C7B887E1DDD7C6FAB5` (`portal_id`,`portal_role_id`),
  KEY `IDX_B29E22C7B887E1DD` (`portal_id`),
  KEY `IDX_B29E22C7D7C6FAB5` (`portal_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portal_role`
--

DROP TABLE IF EXISTS `portal_role`;
CREATE TABLE IF NOT EXISTS `portal_role` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `data` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_data` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `export_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'not-set',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portal_role_user`
--

DROP TABLE IF EXISTS `portal_role_user`;
CREATE TABLE IF NOT EXISTS `portal_role_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portal_role_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_202456E6D7C6FAB5A76ED395` (`portal_role_id`,`user_id`),
  KEY `IDX_202456E6D7C6FAB5` (`portal_role_id`),
  KEY `IDX_202456E6A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portal_user`
--

DROP TABLE IF EXISTS `portal_user`;
CREATE TABLE IF NOT EXISTS `portal_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portal_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_76511E4B887E1DDA76ED395` (`portal_id`,`user_id`),
  KEY `IDX_76511E4B887E1DD` (`portal_id`),
  KEY `IDX_76511E4A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

DROP TABLE IF EXISTS `preferences`;
CREATE TABLE IF NOT EXISTS `preferences` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professionals_data`
--

DROP TABLE IF EXISTS `professionals_data`;
CREATE TABLE IF NOT EXISTS `professionals_data` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professional_data`
--

DROP TABLE IF EXISTS `professional_data`;
CREATE TABLE IF NOT EXISTS `professional_data` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `salutation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `meeting_date` date DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'CA',
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_FIRST_NAME` (`first_name`,`deleted`),
  KEY `IDX_NAME` (`first_name`,`last_name`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ACCOUNT_ID` (`account_id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_task`
--

DROP TABLE IF EXISTS `project_task`;
CREATE TABLE IF NOT EXISTS `project_task` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Not Started',
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `estimated_effort` double DEFAULT NULL,
  `actual_duration` double DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `project_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_PROJECT_ID` (`project_id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pune`
--

DROP TABLE IF EXISTS `pune`;
CREATE TABLE IF NOT EXISTS `pune` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pune_mumbai_pune`
--

DROP TABLE IF EXISTS `pune_mumbai_pune`;
CREATE TABLE IF NOT EXISTS `pune_mumbai_pune` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating_data`
--

DROP TABLE IF EXISTS `rating_data`;
CREATE TABLE IF NOT EXISTS `rating_data` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating_agency` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concerned_person` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_rs_in_crore` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sector` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calling_status` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sl_no` int(11) NOT NULL AUTO_INCREMENT,
  `date_of_discussion` date DEFAULT NULL,
  `banker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating_status` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outlook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sl_no` (`sl_no`),
  UNIQUE KEY `UNIQ_698B60E6483376D4` (`sl_no`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB AUTO_INCREMENT=10135 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating_new_data`
--

DROP TABLE IF EXISTS `rating_new_data`;
CREATE TABLE IF NOT EXISTS `rating_new_data` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating_agency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outlook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating_status` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_rs_in_crore` double DEFAULT NULL,
  `concerned_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_rs_in_corore` int(11) DEFAULT NULL,
  `amount_rs_in_crore_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating_unaccepted_data`
--

DROP TABLE IF EXISTS `rating_unaccepted_data`;
CREATE TABLE IF NOT EXISTS `rating_unaccepted_data` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating_agency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'CARE',
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_non_acceptance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concerned_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_rs_in_crore` double DEFAULT NULL,
  `amount_rs_in_crore_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating_unaccepted_data_new`
--

DROP TABLE IF EXISTS `rating_unaccepted_data_new`;
CREATE TABLE IF NOT EXISTS `rating_unaccepted_data_new` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating_agency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_non_acceptance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concerned_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_rs_in_crore` double DEFAULT NULL,
  `amount_rs_in_crore_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `red`
--

DROP TABLE IF EXISTS `red`;
CREATE TABLE IF NOT EXISTS `red` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

DROP TABLE IF EXISTS `reminder`;
CREATE TABLE IF NOT EXISTS `reminder` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `remind_at` datetime DEFAULT NULL,
  `start_at` datetime DEFAULT NULL,
  `type` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT 'Popup',
  `seconds` int(11) DEFAULT 0,
  `entity_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_REMIND_AT` (`remind_at`),
  KEY `IDX_START_AT` (`start_at`),
  KEY `IDX_TYPE` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `remove_entity_testing`
--

DROP TABLE IF EXISTS `remove_entity_testing`;
CREATE TABLE IF NOT EXISTS `remove_entity_testing` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `retail_data_base_pune`
--

DROP TABLE IF EXISTS `retail_data_base_pune`;
CREATE TABLE IF NOT EXISTS `retail_data_base_pune` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `salutation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `salary` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_employer` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_skills` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_employer` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_FIRST_NAME` (`first_name`,`deleted`),
  KEY `IDX_NAME` (`first_name`,`last_name`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `retail_data_pune`
--

DROP TABLE IF EXISTS `retail_data_pune`;
CREATE TABLE IF NOT EXISTS `retail_data_pune` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `salutation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `salary` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_employer` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_skills` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_FIRST_NAME` (`first_name`,`deleted`),
  KEY `IDX_NAME` (`first_name`,`last_name`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `assignment_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'not-set',
  `user_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'not-set',
  `portal_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'not-set',
  `group_email_account_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'not-set',
  `export_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'not-set',
  `data_privacy_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'not-set',
  `data` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_data` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_team`
--

DROP TABLE IF EXISTS `role_team`;
CREATE TABLE IF NOT EXISTS `role_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `team_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_7A5FD48BD60322AC296CD8AE` (`role_id`,`team_id`),
  KEY `IDX_7A5FD48BD60322AC` (`role_id`),
  KEY `IDX_7A5FD48B296CD8AE` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_332CA4DDD60322ACA76ED395` (`role_id`,`user_id`),
  KEY `IDX_332CA4DDD60322AC` (`role_id`),
  KEY `IDX_332CA4DDA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `running_cases`
--

DROP TABLE IF EXISTS `running_cases`;
CREATE TABLE IF NOT EXISTS `running_cases` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lead_type` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concerned_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_rating_agency` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latest_rating_date` date DEFAULT NULL,
  `rating_agency_fees` double DEFAULT NULL,
  `rating_agency_fees_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `our_fees` double DEFAULT NULL,
  `our_fees_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_rating_agency_appointed` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_job`
--

DROP TABLE IF EXISTS `scheduled_job`;
CREATE TABLE IF NOT EXISTS `scheduled_job` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scheduling` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_run` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `is_internal` tinyint(1) NOT NULL DEFAULT 0,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_job_log_record`
--

DROP TABLE IF EXISTS `scheduled_job_log_record`;
CREATE TABLE IF NOT EXISTS `scheduled_job_log_record` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `execution_time` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `scheduled_job_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_SCHEDULED_JOB_ID` (`scheduled_job_id`),
  KEY `IDX_TARGET` (`target_id`,`target_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_reminder`
--

DROP TABLE IF EXISTS `sms_reminder`;
CREATE TABLE IF NOT EXISTS `sms_reminder` (
  `sr_id` int(11) NOT NULL AUTO_INCREMENT,
  `sr_mobileNo` varchar(255) DEFAULT NULL,
  `sr_reminderDate` date DEFAULT NULL,
  `sr_reminderTime` time DEFAULT NULL,
  `sr_smsBody` text DEFAULT NULL,
  `sr_folderName` varchar(255) DEFAULT NULL,
  `sr_createdBy` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Added by user id',
  `sr_smsStatus` tinyint(4) DEFAULT NULL COMMENT '0 = Pending, 1 = Sent',
  `sr_status` tinyint(4) DEFAULT NULL COMMENT '0 = Inactive, 1 = Active',
  `sr_createdAt` datetime DEFAULT NULL,
  `sr_sendSmsDateTime` datetime DEFAULT NULL,
  `sr_updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`sr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=989 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_reminder`
--

INSERT INTO `sms_reminder` (`sr_id`, `sr_mobileNo`, `sr_reminderDate`, `sr_reminderTime`, `sr_smsBody`, `sr_folderName`, `sr_createdBy`, `sr_smsStatus`, `sr_status`, `sr_createdAt`, `sr_sendSmsDateTime`, `sr_updatedAt`) VALUES
(138, '9898989898', '2019-05-10', '23:00:00', 'Achyut', 'finnovaadvisory', '1', NULL, NULL, '2019-05-10 13:02:15', '2019-05-10 23:00:00', NULL),
(139, '9898989898', '2019-05-10', '23:00:00', 'Achyut', 'RS', '1', NULL, NULL, '2019-05-10 13:03:35', '2019-05-10 23:00:00', NULL),
(141, '8985689586', '2019-05-10', '21:45:00', 'hii', 'finnovaadvisory', '1', NULL, NULL, '2019-05-10 13:06:06', '2019-05-10 21:45:00', NULL),
(143, '9856324568', '2019-05-10', '20:40:00', 'Hi', 'finnovaadvisory', '1', NULL, NULL, '2019-05-10 13:09:46', '2019-05-10 20:40:00', NULL),
(145, '9881125339', '2019-05-10', '22:50:00', 'sdadas', 'finnovaadvisory', '1', NULL, NULL, '2019-05-10 13:12:50', '2019-05-10 22:50:00', NULL),
(147, '9865321245', '2019-05-30', '19:35:00', 'DEMO', 'finnovaadvisory', '1', NULL, NULL, '2019-05-10 13:14:47', '2019-05-30 19:35:00', NULL),
(190, '9604112088', '2019-08-01', '13:10:00', 'This is reminder from FINCRM', 'finnovaadvisory', '1', NULL, NULL, '2019-08-01 07:09:42', '2019-08-01 13:10:00', NULL),
(191, '9604112088', '2019-08-02', '11:33:00', 'HI ACHYUT THIS IS REMINDER FROM FINCRM', 'finnovaadvisory', '1', NULL, NULL, '2019-08-01 07:51:22', '2019-08-02 11:33:00', NULL),
(192, '9028600116', '2019-08-02', '12:50:00', 'hi Anil Sir', 'finnovaadvisory', '1', NULL, NULL, '2019-08-02 07:18:43', '2019-08-02 12:50:00', NULL),
(193, '8830053502', '2019-08-03', '16:05:00', 'test sms', 'finnovaadvisory', '1', NULL, NULL, '2019-08-03 10:33:04', '2019-08-03 16:05:00', NULL),
(194, '8830053502', '2019-08-03', '16:04:00', 'test sms', 'finnovaadvisory', '1', NULL, NULL, '2019-08-03 10:34:56', '2019-08-03 16:04:00', NULL),
(195, '8830053502', '2019-08-03', '16:06:00', 'test sms at 6 ', 'finnovaadvisory', '1', NULL, NULL, '2019-08-03 10:35:26', '2019-08-03 16:06:00', NULL),
(196, '8830053502', '2019-08-03', '16:10:00', 'test sms at 10', 'finnovaadvisory', '1', NULL, NULL, '2019-08-03 10:39:24', '2019-08-03 16:10:00', NULL),
(197, '8830053502', '2019-08-03', '16:10:00', 'test sms at 111', 'finnovaadvisory', '1', NULL, NULL, '2019-08-03 10:39:35', '2019-08-03 16:10:00', NULL),
(198, '8830053502', '2019-08-03', '16:10:00', 'test sms at 112', 'finnovaadvisory', '1', NULL, NULL, '2019-08-03 10:39:47', '2019-08-03 16:10:00', NULL),
(199, '8830053502', '2019-08-03', '16:10:00', 'test sms at 112jhjkgkgkg', 'finnovaadvisory', '1', NULL, NULL, '2019-08-03 10:39:56', '2019-08-03 16:10:00', NULL),
(200, '8830053502', '2019-08-03', '16:11:00', ',nbnvvvmvnv', 'finnovaadvisory', '2', NULL, NULL, '2019-08-03 10:40:35', '2019-08-03 16:11:00', NULL),
(201, '8830053502', '2019-08-03', '16:12:00', ',nbnvvvmvnvm.bnb,vnvhvgjcgc', 'finnovaadvisory', '2', NULL, NULL, '2019-08-03 10:40:46', '2019-08-03 16:12:00', NULL),
(202, '8830053502', '2019-08-03', '16:13:00', ',nbnvvvmvnvm.bnb,vnvhvgjcgcnngngghghghjfjfjfjfhjf', 'finnovaadvisory', '2', NULL, NULL, '2019-08-03 10:40:58', '2019-08-03 16:13:00', NULL),
(203, '8830053502', '2019-08-03', '16:12:00', ',nbnvvvmvnvm.bnb,vnvhvgjklhjhhkhcgcnngngghghghjfjfjfjfhjf', 'AKGI', '2', NULL, NULL, '2019-08-03 10:41:11', '2019-08-03 16:12:00', NULL),
(204, '9637976611', '2019-08-09', '09:27:00', 'Testing sms reminder', 'AKGI', '2', NULL, NULL, '2019-08-09 03:55:53', '2019-08-09 09:27:00', NULL),
(205, '9284602184', '2019-08-09', '09:40:00', 'Hello\nTesting Purpose', 'AKGI', '2', NULL, NULL, '2019-08-09 04:08:17', '2019-08-09 09:40:00', NULL),
(207, '8208122496', '2019-08-13', '16:20:00', 'fdsggsfgs', 'AKGI', '2', NULL, NULL, '2019-08-13 09:13:10', '2019-08-13 16:20:00', NULL),
(208, '8830053502', '1970-01-01', '22:10:00', 'LUCKY SINGH is an idiot GIRL', 'finnovaadvisory', '2', NULL, NULL, '2019-08-23 16:37:42', '1970-01-01 22:10:00', NULL),
(209, '9545324423', '1970-01-01', '22:10:00', 'LUCKY SINGH is an idiot GIRL', 'finnovaadvisory', '2', NULL, NULL, '2019-08-23 16:38:30', '1970-01-01 22:10:00', NULL),
(210, '8830053502', '1970-01-01', '11:55:00', 'agagdag', 'finnovaadvisory', '2', NULL, NULL, '2019-08-23 16:43:12', '1970-01-01 11:55:00', NULL),
(211, '9028600116', '1970-01-01', '02:50:00', 'akfmakf', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 03:49:30', '1970-01-01 02:50:00', NULL),
(212, '9028600116', '1970-01-01', '02:50:00', 'akfmakf', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 03:54:16', '1970-01-01 02:50:00', NULL),
(213, '9028600116', '1970-01-01', '09:25:00', 'akfmakf', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 03:54:53', '1970-01-01 09:25:00', NULL),
(214, '9028600116', '1970-01-01', '09:25:00', 'akfmakf', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 03:57:26', '1970-01-01 09:25:00', NULL),
(215, '9028600116', '1970-01-01', '09:30:00', 'Test SMS', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 03:57:50', '1970-01-01 09:30:00', NULL),
(216, '9604112088', '2019-08-24', '09:30:00', 'Hi Achyut', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 03:58:22', '2019-08-24 09:30:00', NULL),
(217, '9028600116', '2019-08-24', '09:35:00', 'Test SMS Reminder', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 04:03:56', '2019-08-24 09:35:00', NULL),
(218, '8830053502', '1970-01-01', '11:55:00', 'Test', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 04:24:53', '1970-01-01 11:55:00', NULL),
(219, '8830053502', '1970-01-01', '09:57:00', 'Test', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 04:25:45', '1970-01-01 09:57:00', NULL),
(220, '8830053502', '1970-01-01', '09:58:00', 'Test', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 04:27:29', '1970-01-01 09:58:00', NULL),
(221, '8830053502', '1970-01-01', '10:07:00', 'Test', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 04:36:54', '1970-01-01 10:07:00', NULL),
(222, '8830053502', '1970-01-01', '11:25:00', 'Test', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 05:54:23', '1970-01-01 11:25:00', NULL),
(223, '9028600116', '1970-01-01', '11:38:00', 'New MSG', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 06:06:13', '1970-01-01 11:38:00', NULL),
(224, '9028600116', '2019-08-24', '11:40:00', 'Test SMS Reminder \n\nAAAAAA', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 06:06:19', '2019-08-24 11:40:00', NULL),
(225, '9604112088', '2019-08-24', '11:41:00', 'ABCD', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 06:08:46', '2019-08-24 11:41:00', NULL),
(226, '9028600116', '1970-01-01', '11:45:00', 'New MSGhilhlhkhlk', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 06:13:38', '1970-01-01 11:45:00', NULL),
(227, '8208122496', '2019-08-24', '11:46:00', 'ABCD EFG', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 06:15:29', '2019-08-24 11:46:00', NULL),
(228, '8208122496', '2019-08-24', '11:53:00', 'gfhgfhgfghfhg', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 06:18:51', '2019-08-24 11:53:00', NULL),
(229, '9604112088', '2019-08-24', '13:20:00', 'TEST SMS', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 07:48:24', '2019-08-24 13:20:00', NULL),
(230, '8208122496', '2019-08-24', '18:30:00', 'Hi Achyut', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 10:24:02', '2019-08-24 18:30:00', NULL),
(231, '9604112088', '2019-08-24', '18:30:00', 'Hiiii', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 10:26:50', '2019-08-24 18:30:00', NULL),
(232, '9604112088', '2019-08-24', '19:45:00', 'hi aCHYUT ', 'finnovaadvisory', '2', NULL, NULL, '2019-08-24 10:28:37', '2019-08-24 19:45:00', NULL),
(233, '8830053502', '2019-08-26', '12:58:00', 'testgJHSF,a,jsfb,absfasgasgag', 'finnovaadvisory', '2', NULL, NULL, '2019-08-26 07:27:02', '2019-08-26 12:58:00', NULL),
(234, '9028600116', '2019-08-26', '12:59:00', 'ANIl SMS', 'finnovaadvisory', '2', NULL, NULL, '2019-08-26 07:27:33', '2019-08-26 12:59:00', NULL),
(235, '9637976611', '2019-08-27', '09:00:00', 'test', 'finnovaadvisory', '2', NULL, NULL, '2019-08-26 11:13:54', '2019-08-27 09:00:00', NULL),
(237, '9637976611', '2019-09-02', '13:00:00', 'test', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 08:17:40', '2019-09-02 13:00:00', NULL),
(242, '9545841613', '1970-01-01', '15:00:00', 'Reminder call to client for meeting', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 08:34:14', '1970-01-01 15:00:00', NULL),
(247, '9545841613', '1970-01-01', '14:00:00', 'Call to Mr. Patil and connect with Anil Sir regarding credit rating', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 08:41:22', '1970-01-01 14:00:00', NULL),
(248, '9545841613', '1970-01-01', '15:00:00', 'Reminder call to Mr.Pathak to arrange document require for credit rating', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 08:42:26', '1970-01-01 15:00:00', NULL),
(249, '9545841613', '1970-01-01', '16:00:00', 'Client meeting at client location', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 08:43:24', '1970-01-01 16:00:00', NULL),
(250, '9545841613', '1970-01-01', '13:00:00', 'Testing', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 08:44:48', '1970-01-01 13:00:00', NULL),
(251, '9545841613', '2019-09-18', '08:00:00', 'Testing', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 08:47:03', '2019-09-18 08:00:00', NULL),
(252, '9545841613', '2019-09-02', '13:00:00', 'client meetng', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 08:51:46', '2019-09-02 13:00:00', NULL),
(253, '9545841613', '2019-09-03', '14:00:00', 'Clinet meeting at our office', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 08:52:44', '2019-09-03 14:00:00', NULL),
(254, '9545841613', '2019-09-03', '15:00:00', 'Reminder call to Mr.Patil for document', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 08:54:01', '2019-09-03 15:00:00', NULL),
(255, '9545841613', '2019-09-04', '15:00:00', 'Today Compay profile forward and quotation also to client.', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 08:56:01', '2019-09-04 15:00:00', NULL),
(256, '9545841613', '2019-09-06', '11:00:00', 'Reminder call to Anil sir ', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 08:57:05', '2019-09-06 11:00:00', NULL),
(257, '9545841613', '2019-09-07', '10:00:00', 'Client wants to meeting with us but once call before come ', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 08:58:30', '2019-09-07 10:00:00', NULL),
(258, '9545841613', '2019-09-07', '09:00:00', 'Mr.Pawar come down at our office for meeting', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 08:59:29', '2019-09-07 09:00:00', NULL),
(259, '9545841613', '2019-09-10', '08:01:00', 'confirmation call ', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:00:40', '2019-09-10 08:01:00', NULL),
(260, '9545841613', '2019-09-11', '11:00:00', 'Client Meeting at client location', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:01:29', '2019-09-11 11:00:00', NULL),
(261, '9545841613', '2019-09-12', '10:00:00', 'client meeting out of Pune', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:02:05', '2019-09-12 10:00:00', NULL),
(262, '9545841613', '2019-09-13', '09:00:00', 'call to Mr.Patil ', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:02:39', '2019-09-13 09:00:00', NULL),
(263, '9545841613', '2019-09-14', '13:00:00', 'Client meeting at our office', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:03:12', '2019-09-14 13:00:00', NULL),
(264, '9545841613', '2019-09-16', '13:00:00', 'Client meeting', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:03:53', '2019-09-16 13:00:00', NULL),
(265, '9545841613', '2019-09-17', '11:00:00', 'Client concall', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:04:54', '2019-09-17 11:00:00', NULL),
(266, '9545841613', '2019-09-18', '14:00:00', 'concall', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:05:29', '2019-09-18 14:00:00', NULL),
(267, '9545841613', '2019-09-19', '13:00:00', 'client will come down at office @ 3 pm', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:06:22', '2019-09-19 13:00:00', NULL),
(268, '9545841613', '2019-09-20', '16:00:00', 'Clinet meeting @ 1.00 pm', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:07:10', '2019-09-20 16:00:00', NULL),
(269, '9545841613', '2019-09-21', '17:00:00', 'client meeting at client location@ 5 pm', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:08:26', '2019-09-21 17:00:00', NULL),
(270, '9545841613', '2019-09-23', '13:00:00', 'Meeting with Rating agency', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:09:44', '2019-09-23 13:00:00', NULL),
(271, '9545841613', '2019-10-01', '13:00:00', 'Meeting with Banker', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:10:32', '2019-10-01 13:00:00', NULL),
(272, '9545841613', '2019-10-02', '14:00:00', 'client meeting with rating agency', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:11:41', '2019-10-02 14:00:00', NULL),
(273, '9545841613', '2019-10-03', '14:00:00', 'Meeting with Promotor so once reminder call for confirmation', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:13:32', '2019-10-03 14:00:00', NULL),
(274, '9545841613', '2019-10-04', '15:00:00', 'Meeting with The rating agency at client location', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:14:20', '2019-10-04 15:00:00', NULL),
(275, '9545841613', '2019-10-05', '11:00:00', 'Client Meeting at client location', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:15:22', '2019-10-05 11:00:00', NULL),
(276, '9545841613', '2019-10-07', '11:00:00', 'Call to Mr.Jadhav to connect with their concern person', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:16:30', '2019-10-07 11:00:00', NULL),
(277, '9545841613', '2019-10-08', '09:00:00', 'Meeting with the chairman ', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:17:25', '2019-10-08 09:00:00', NULL),
(278, '9545841613', '2019-10-09', '14:00:00', 'Drop confirmation mail to the client', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:18:06', '2019-10-09 14:00:00', NULL),
(279, '9545841613', '2019-10-10', '10:00:00', 'Clinet meeting', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:18:36', '2019-10-10 10:00:00', NULL),
(280, '9545841613', '2019-10-11', '13:00:00', 'Meeting', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:19:27', '2019-10-11 13:00:00', NULL),
(281, '9545841613', '2019-10-12', '13:00:00', 'Meeting', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:19:58', '2019-10-12 13:00:00', NULL),
(282, '9545841613', '2019-10-14', '11:00:00', 'Reminder call to client', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:20:44', '2019-10-14 11:00:00', NULL),
(283, '9545841613', '2019-10-15', '11:00:00', 'Reminder call', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:21:07', '2019-10-15 11:00:00', NULL),
(284, '9545841613', '2019-10-17', '11:00:00', 'Reminder call', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:21:58', '2019-10-17 11:00:00', NULL),
(285, '9545841613', '2019-10-18', '08:00:00', 'Meeting at 1.pm', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:22:24', '2019-10-18 08:00:00', NULL),
(286, '9545841613', '2019-10-19', '10:00:00', 'Meeting', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:22:49', '2019-10-19 10:00:00', NULL),
(287, '9545841613', '2019-10-21', '15:00:00', 'Meeting', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:23:27', '2019-10-21 15:00:00', NULL),
(288, '9545841613', '2019-10-22', '09:00:00', 'Reminder call', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:23:54', '2019-10-22 09:00:00', NULL),
(289, '9545841613', '2019-10-23', '13:00:00', 'Reminder call', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:24:20', '2019-10-23 13:00:00', NULL),
(290, '9545841613', '2019-10-24', '10:00:00', 'Meeting', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:24:43', '2019-10-24 10:00:00', NULL),
(291, '9545841613', '2019-11-01', '14:00:00', 'Meeting', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:25:34', '2019-11-01 14:00:00', NULL),
(292, '9545841613', '2019-11-02', '11:00:00', 'Meeting', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:26:18', '2019-11-02 11:00:00', NULL),
(293, '9545841613', '2019-11-04', '11:00:00', 'Meeting', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:26:54', '2019-11-04 11:00:00', NULL),
(294, '9545841613', '2019-11-05', '09:00:00', 'Reminder call', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:28:30', '2019-11-05 09:00:00', NULL),
(295, '9545841613', '2019-11-06', '11:00:00', 'meeting', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:29:10', '2019-11-06 11:00:00', NULL),
(296, '9545841613', '2019-11-07', '11:00:00', 'Reminder call', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:30:11', '2019-11-07 11:00:00', NULL),
(297, '9545841613', '2019-11-08', '09:00:00', 'Meeting', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:31:11', '2019-11-08 09:00:00', NULL),
(298, '9545841613', '2019-11-09', '09:00:00', 'Meeting', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:31:56', '2019-11-09 09:00:00', NULL),
(299, '9545841613', '2019-11-11', '10:00:00', 'Meeting', 'finnovaadvisory', '2', NULL, NULL, '2019-08-28 09:32:22', '2019-11-11 10:00:00', NULL),
(300, '9545841613', '2019-11-12', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:32:45', '2019-11-12 11:00:00', NULL),
(301, '9545841613', '2019-11-13', '09:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:33:19', '2019-11-13 09:00:00', NULL),
(302, '9545841613', '2019-11-14', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:33:37', '2019-11-14 11:00:00', NULL),
(303, '9545841613', '2019-11-15', '13:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:34:08', '2019-11-15 13:00:00', NULL),
(304, '9545841613', '2019-11-16', '14:00:00', 'Reminder Call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:34:35', '2019-11-16 14:00:00', NULL),
(305, '9545841613', '2019-11-18', '11:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:34:55', '2019-11-18 11:00:00', NULL),
(306, '9545841613', '2019-11-19', '11:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:35:22', '2019-11-19 11:00:00', NULL),
(307, '9545841613', '2019-11-20', '11:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:35:48', '2019-11-20 11:00:00', NULL),
(308, '9545841613', '2019-11-21', '09:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:36:11', '2019-11-21 09:00:00', NULL),
(309, '9545841613', '2019-11-21', '11:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:36:37', '2019-11-21 11:00:00', NULL),
(310, '9545841613', '2019-11-21', '09:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:37:00', '2019-11-21 09:00:00', NULL),
(311, '9545841613', '2019-12-02', '13:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:37:42', '2019-12-02 13:00:00', NULL),
(312, '9545841613', '2019-12-03', '14:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:38:07', '2019-12-03 14:00:00', NULL),
(313, '9545841613', '2019-12-04', '14:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:38:57', '2019-12-04 14:00:00', NULL),
(314, '9545841613', '2019-12-04', '14:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:40:40', '2019-12-04 14:00:00', NULL),
(315, '9545841613', '2019-12-09', '10:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:41:14', '2019-12-09 10:00:00', NULL),
(316, '9545841613', '2019-12-10', '11:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:41:37', '2019-12-10 11:00:00', NULL),
(317, '9545841613', '2019-12-11', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:42:21', '2019-12-11 11:00:00', NULL),
(318, '9545841613', '2019-12-11', '14:00:00', 'Reminder call to client', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:43:10', '2019-12-11 14:00:00', NULL),
(319, '9545841613', '2019-12-12', '11:00:00', 'Client meeting at client location at 2 pm', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:43:43', '2019-12-12 11:00:00', NULL),
(320, '9545841613', '2019-12-13', '11:00:00', 'Client meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:44:15', '2019-12-13 11:00:00', NULL),
(321, '9545841613', '2019-12-14', '11:00:00', 'Client meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:45:14', '2019-12-14 11:00:00', NULL),
(322, '9545841613', '2019-12-16', '15:00:00', 'Client Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:45:55', '2019-12-16 15:00:00', NULL),
(323, '9545841613', '2019-12-17', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:46:24', '2019-12-17 11:00:00', NULL),
(324, '9545841613', '2019-12-15', '14:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:46:58', '2019-12-15 14:00:00', NULL),
(325, '9545841613', '2019-12-16', '13:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:47:37', '2019-12-16 13:00:00', NULL),
(326, '9545841613', '2019-12-17', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:48:55', '2019-12-17 11:00:00', NULL),
(327, '9545841613', '2019-12-18', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:49:33', '2019-12-18 11:00:00', NULL),
(328, '9545841613', '2019-12-19', '10:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:49:54', '2019-12-19 10:00:00', NULL),
(329, '9545841613', '2019-12-18', '15:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:50:21', '2019-12-18 15:00:00', NULL),
(330, '9545841613', '2019-12-19', '13:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:50:59', '2019-12-19 13:00:00', NULL),
(331, '9545841613', '2019-12-20', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:51:22', '2019-12-20 11:00:00', NULL),
(332, '9545841613', '2020-01-01', '13:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:53:26', '2020-01-01 13:00:00', NULL),
(333, '9545841613', '2020-01-02', '11:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:53:56', '2020-01-02 11:00:00', NULL),
(334, '9545841613', '2020-01-03', '14:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:54:18', '2020-01-03 14:00:00', NULL),
(335, '9545841613', '2020-01-04', '11:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:54:39', '2020-01-04 11:00:00', NULL),
(336, '9545841613', '2020-01-06', '09:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:55:03', '2020-01-06 09:00:00', NULL),
(337, '9545841613', '2020-01-07', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:58:54', '2020-01-07 11:00:00', NULL),
(338, '9545841613', '2020-01-08', '14:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 09:59:30', '2020-01-08 14:00:00', NULL),
(339, '9545841613', '2020-01-09', '11:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:00:04', '2020-01-09 11:00:00', NULL),
(340, '9545841613', '2020-01-10', '15:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:00:25', '2020-01-10 15:00:00', NULL),
(341, '9545841613', '2020-01-11', '14:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:00:52', '2020-01-11 14:00:00', NULL),
(342, '8830053502', '2020-04-03', '01:05:00', 'TEST', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:03:46', '2020-04-03 01:05:00', NULL),
(343, '9545841613', '2020-01-13', '14:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:06:43', '2020-01-13 14:00:00', NULL),
(344, '9545841613', '2020-01-14', '11:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:07:42', '2020-01-14 11:00:00', NULL),
(345, '8830053502', '2019-09-04', '12:10:00', 'TESTTTTT', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:08:28', '2019-09-04 12:10:00', NULL),
(346, '9545841613', '2020-01-15', '14:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:09:26', '2020-01-15 14:00:00', NULL),
(347, '8830053502', '2019-08-28', '15:42:00', 'anillll', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:10:20', '2019-08-28 15:42:00', NULL),
(348, '9545841613', '2020-01-16', '15:00:00', 'Client Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:10:36', '2020-01-16 15:00:00', NULL),
(349, '9545841613', '2020-01-17', '14:00:00', 'Client Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:10:59', '2020-01-17 14:00:00', NULL),
(350, '8830053502', '2019-08-28', '15:44:00', 'anill', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:11:13', '2019-08-28 15:44:00', NULL),
(351, '9545841613', '2020-01-16', '14:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:11:47', '2020-01-16 14:00:00', NULL),
(352, '9545841613', '2020-01-17', '15:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:12:08', '2020-01-17 15:00:00', NULL),
(353, '9028600116', '2019-08-28', '15:45:00', 'anil', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:12:22', '2019-08-28 15:45:00', NULL),
(354, '9545841613', '2020-01-11', '15:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:12:48', '2020-01-11 15:00:00', NULL),
(355, '9545841613', '2020-01-13', '14:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:13:46', '2020-01-13 14:00:00', NULL),
(356, '9028600116', '2019-08-28', '15:45:00', 'SMS Reminder Testing', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:14:01', '2019-08-28 15:45:00', NULL),
(357, '9545841613', '2020-01-14', '13:00:00', 'Reminder call to client', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:14:16', '2020-01-14 13:00:00', NULL),
(358, '9545841613', '2020-02-03', '13:00:00', 'Concall @ 2 pm', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:15:20', '2020-02-03 13:00:00', NULL),
(359, '9545841613', '2020-02-04', '10:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:15:49', '2020-02-04 10:00:00', NULL),
(360, '9545841613', '2020-02-05', '14:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:16:43', '2020-02-05 14:00:00', NULL),
(361, '9545841613', '2020-02-06', '09:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:17:15', '2020-02-06 09:00:00', NULL),
(362, '9545841613', '2020-02-07', '14:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:17:47', '2020-02-07 14:00:00', NULL),
(363, '9545841613', '2020-02-08', '10:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:18:28', '2020-02-08 10:00:00', NULL),
(364, '9545841613', '2020-02-10', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:18:49', '2020-02-10 11:00:00', NULL),
(365, '9604112088', '2019-08-29', '13:05:00', 'Reminder', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:19:14', '2019-08-29 13:05:00', NULL),
(366, '9545841613', '2020-02-11', '14:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:20:56', '2020-02-11 14:00:00', NULL),
(367, '9545841613', '2020-02-12', '14:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:21:31', '2020-02-12 14:00:00', NULL),
(368, '9545841613', '2020-02-13', '11:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:22:15', '2020-02-13 11:00:00', NULL),
(369, '9545841613', '2020-02-14', '10:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:22:40', '2020-02-14 10:00:00', NULL),
(370, '9545841613', '2020-02-15', '08:00:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:23:35', '2020-02-15 08:00:00', NULL),
(371, '9545841613', '2020-02-16', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:24:08', '2020-02-16 11:00:00', NULL),
(372, '9545841613', '2020-02-17', '11:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:24:55', '2020-02-17 11:00:00', NULL),
(373, '9545841613', '2020-02-18', '14:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:25:26', '2020-02-18 14:00:00', NULL),
(374, '9545841613', '2020-02-19', '13:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:25:51', '2020-02-19 13:00:00', NULL),
(375, '9545841613', '2020-02-20', '15:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:26:21', '2020-02-20 15:00:00', NULL),
(376, '9545841613', '2020-02-21', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:27:11', '2020-02-21 11:00:00', NULL),
(377, '9545841613', '2020-02-22', '11:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:27:43', '2020-02-22 11:00:00', NULL),
(378, '9545841613', '2020-02-23', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:28:34', '2020-02-23 11:00:00', NULL),
(379, '9545841613', '2020-03-01', '09:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:35:42', '2020-03-01 09:00:00', NULL),
(380, '9545841613', '2020-03-02', '15:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:36:04', '2020-03-02 15:00:00', NULL),
(381, '9545841613', '2020-03-03', '13:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:36:31', '2020-03-03 13:00:00', NULL),
(382, '9545841613', '2020-03-04', '16:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:37:03', '2020-03-04 16:00:00', NULL),
(383, '9545841613', '2020-03-05', '14:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:37:26', '2020-03-05 14:00:00', NULL),
(384, '9545841613', '2020-03-06', '10:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:37:53', '2020-03-06 10:00:00', NULL),
(385, '9545841613', '2020-03-07', '11:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:38:12', '2020-03-07 11:00:00', NULL),
(386, '9545841613', '2020-03-08', '11:01:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:47:04', '2020-03-08 11:01:00', NULL),
(387, '9545841613', '2020-03-09', '13:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:47:32', '2020-03-09 13:00:00', NULL),
(388, '9545841613', '2020-03-10', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:47:58', '2020-03-10 11:00:00', NULL),
(389, '9545841613', '2020-03-02', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:48:20', '2020-03-02 11:00:00', NULL),
(390, '9545841613', '2020-03-05', '09:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:48:41', '2020-03-05 09:00:00', NULL),
(391, '9545841613', '2020-03-06', '07:45:00', 'Reminder call', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:49:43', '2020-03-06 07:45:00', NULL),
(392, '9545841613', '2020-03-07', '09:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:50:09', '2020-03-07 09:00:00', NULL),
(393, '9545841613', '2020-03-08', '14:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:51:01', '2020-03-08 14:00:00', NULL),
(394, '9545841613', '2020-03-09', '13:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:51:32', '2020-03-09 13:00:00', NULL),
(395, '9545841613', '2020-03-10', '10:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:52:07', '2020-03-10 10:00:00', NULL),
(396, '9545841613', '2020-03-11', '10:59:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:52:33', '2020-03-11 10:59:00', NULL),
(397, '9545841613', '2020-03-12', '15:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:53:27', '2020-03-12 15:00:00', NULL),
(398, '9545841613', '2020-03-13', '14:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:53:50', '2020-03-13 14:00:00', NULL),
(399, '9545841613', '2020-04-01', '14:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:54:57', '2020-04-01 14:00:00', NULL),
(400, '9545841613', '2020-04-01', '13:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:55:27', '2020-04-01 13:00:00', NULL),
(401, '9545841613', '2020-04-02', '15:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:55:48', '2020-04-02 15:00:00', NULL),
(402, '9545841613', '2020-04-03', '16:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:56:22', '2020-04-03 16:00:00', NULL),
(403, '9545841613', '2020-04-04', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:56:42', '2020-04-04 11:00:00', NULL),
(404, '9545841613', '2020-04-05', '13:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:57:06', '2020-04-05 13:00:00', NULL),
(405, '9545841613', '2020-04-06', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:57:28', '2020-04-06 11:00:00', NULL),
(406, '9545841613', '2020-04-07', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:57:56', '2020-04-07 11:00:00', NULL),
(407, '9545841613', '2020-04-08', '11:59:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:58:14', '2020-04-08 11:59:00', NULL),
(408, '9545841613', '2020-04-09', '14:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:58:47', '2020-04-09 14:00:00', NULL),
(409, '9545841613', '2020-04-12', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 10:59:12', '2020-04-12 11:00:00', NULL),
(410, '9545841613', '2020-04-13', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:00:07', '2020-04-13 11:00:00', NULL),
(411, '9545841613', '2020-04-14', '10:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:00:34', '2020-04-14 10:00:00', NULL),
(412, '9545841613', '2020-04-15', '09:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:00:56', '2020-04-15 09:00:00', NULL),
(413, '9545841613', '2020-04-16', '10:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:01:15', '2020-04-16 10:00:00', NULL),
(414, '9545841613', '2020-04-17', '10:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:01:35', '2020-04-17 10:00:00', NULL),
(415, '9545841613', '2020-04-10', '11:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:02:16', '2020-04-10 11:00:00', NULL),
(416, '9545841613', '2020-04-06', '11:01:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:02:32', '2020-04-06 11:01:00', NULL),
(417, '9545841613', '2020-04-14', '11:59:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:03:00', '2020-04-14 11:59:00', NULL),
(418, '9545841613', '2020-04-15', '10:00:00', 'meetig', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:03:19', '2020-04-15 10:00:00', NULL),
(419, '9545841613', '2020-05-01', '14:59:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:22:31', '2020-05-01 14:59:00', NULL),
(420, '9545841613', '2020-05-02', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:22:49', '2020-05-02 11:00:00', NULL),
(421, '9545841613', '2020-05-03', '13:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:23:07', '2020-05-03 13:00:00', NULL),
(422, '9545841613', '2020-05-04', '10:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:23:24', '2020-05-04 10:00:00', NULL),
(423, '9545841613', '2020-05-05', '10:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:23:47', '2020-05-05 10:00:00', NULL),
(424, '9545841613', '2020-05-06', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:24:04', '2020-05-06 11:00:00', NULL),
(425, '9545841613', '2020-05-07', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:24:19', '2020-05-07 11:00:00', NULL),
(426, '9545841613', '2020-05-05', '09:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:24:37', '2020-05-05 09:00:00', NULL),
(427, '9545841613', '2020-05-06', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:24:56', '2020-05-06 11:00:00', NULL),
(428, '9545841613', '2020-05-07', '10:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:25:17', '2020-05-07 10:00:00', NULL),
(429, '9607635635', '2019-09-01', '15:15:00', 'TestingÂ Â  Â ', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:25:37', '2019-09-01 15:15:00', NULL),
(430, '9545841613', '2020-05-08', '10:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:25:43', '2020-05-08 10:00:00', NULL),
(431, '9545841613', '2020-05-05', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:26:06', '2020-05-05 11:00:00', NULL),
(432, '9607635635', '2019-09-02', '15:15:00', 'TestingÂ Â  Â \n\n', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:26:08', '2019-09-02 15:15:00', NULL),
(433, '9545841613', '2020-05-06', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:26:24', '2020-05-06 11:00:00', NULL),
(434, '9607635635', '2019-09-03', '15:15:00', 'TestingÂ Â  Â ', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:26:36', '2019-09-03 15:15:00', NULL),
(435, '9545841613', '2020-05-09', '10:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:26:42', '2020-05-09 10:00:00', NULL),
(436, '9607635635', '2019-09-05', '15:15:00', 'TestingÂ Â  Â ', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:26:56', '2019-09-05 15:15:00', NULL),
(437, '9545841613', '2020-05-10', '10:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:27:00', '2020-05-10 10:00:00', NULL),
(438, '9607635635', '2019-09-07', '15:15:00', 'TestingÂ Â  Â ', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:27:14', '2019-09-07 15:15:00', NULL),
(439, '9545841613', '2020-05-11', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:27:18', '2020-05-11 11:00:00', NULL),
(440, '9545841613', '2020-05-12', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:27:34', '2020-05-12 11:00:00', NULL),
(441, '9607635635', '2019-09-07', '15:15:00', 'TestingÂ Â  Â ', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:27:39', '2019-09-07 15:15:00', NULL),
(442, '9607635635', '2019-09-08', '15:15:00', 'TestingÂ Â  Â ', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:28:15', '2019-09-08 15:15:00', NULL),
(443, '9545841613', '2020-05-13', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:28:16', '2020-05-13 11:00:00', NULL),
(444, '9607635635', '2019-09-09', '15:15:00', 'TestingÂ Â  Â ', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:28:35', '2019-09-09 15:15:00', NULL),
(445, '9545841613', '2020-05-14', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:28:39', '2020-05-14 11:00:00', NULL),
(446, '9545841613', '2020-05-15', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:28:56', '2020-05-15 11:00:00', NULL),
(447, '9607635635', '2019-09-10', '15:15:00', 'TestingÂ Â  Â ', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:28:57', '2019-09-10 15:15:00', NULL),
(448, '9607635635', '2019-09-12', '15:15:00', 'TestingÂ Â  Â ', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:29:16', '2019-09-12 15:15:00', NULL),
(449, '9545841613', '2020-06-01', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:29:41', '2020-06-01 11:00:00', NULL),
(450, '9545841613', '2020-06-09', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:29:56', '2020-06-09 11:00:00', NULL),
(451, '9545841613', '2020-06-03', '13:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:30:14', '2020-06-03 13:00:00', NULL),
(452, '9545841613', '2020-06-02', '10:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:30:42', '2020-06-02 10:00:00', NULL),
(453, '9545841613', '2020-06-04', '14:58:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:31:00', '2020-06-04 14:58:00', NULL),
(454, '9545841613', '2020-06-05', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:31:17', '2020-06-05 11:00:00', NULL),
(455, '9545841613', '2020-06-06', '09:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:31:35', '2020-06-06 09:00:00', NULL),
(456, '9545841613', '2020-06-07', '14:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:31:55', '2020-06-07 14:00:00', NULL),
(457, '9545841613', '2020-06-08', '10:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:32:13', '2020-06-08 10:00:00', NULL),
(458, '9545841613', '2020-06-09', '11:00:00', 'Meeing', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:32:27', '2020-06-09 11:00:00', NULL),
(459, '9545841613', '2020-06-10', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:32:44', '2020-06-10 11:00:00', NULL),
(460, '9545841613', '2020-06-11', '09:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:33:09', '2020-06-11 09:00:00', NULL),
(461, '9607635635', '2019-09-13', '15:15:00', 'TestingÂ Â  Â ', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:33:30', '2019-09-13 15:15:00', NULL),
(462, '9545841613', '2020-06-12', '14:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:33:33', '2020-06-12 14:00:00', NULL),
(463, '9607635635', '2019-09-14', '15:15:00', 'TestingÂ Â  Â ', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:33:50', '2019-09-14 15:15:00', NULL),
(464, '9545841613', '2020-06-13', '15:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:33:52', '2020-06-13 15:00:00', NULL),
(465, '9545841613', '2020-06-14', '10:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:34:09', '2020-06-14 10:00:00', NULL),
(466, '9607635635', '2019-09-15', '15:15:00', 'TestingÂ Â  Â ', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:34:14', '2019-09-15 15:15:00', NULL),
(467, '9545841613', '2020-06-15', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:34:35', '2020-06-15 11:00:00', NULL),
(468, '9545841613', '2020-06-16', '11:00:00', 'Meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:34:53', '2020-06-16 11:00:00', NULL),
(469, '9545841613', '2020-06-17', '11:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:35:36', '2020-06-17 11:00:00', NULL),
(470, '9545841613', '2020-06-18', '13:59:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:36:02', '2020-06-18 13:59:00', NULL),
(471, '9545841613', '2020-06-19', '10:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:36:26', '2020-06-19 10:00:00', NULL),
(472, '9545841613', '2020-07-01', '11:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:40:44', '2020-07-01 11:00:00', NULL),
(473, '9545841613', '2020-07-02', '13:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:41:10', '2020-07-02 13:00:00', NULL),
(474, '9545841613', '2020-07-03', '11:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:41:38', '2020-07-03 11:00:00', NULL),
(475, '9545841613', '2020-07-04', '11:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:42:01', '2020-07-04 11:00:00', NULL),
(476, '9545841613', '2020-07-05', '11:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:42:21', '2020-07-05 11:00:00', NULL),
(477, '9545841613', '2020-07-06', '14:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:42:38', '2020-07-06 14:00:00', NULL),
(478, '9545841613', '2020-07-07', '11:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:43:01', '2020-07-07 11:00:00', NULL),
(479, '9545841613', '2020-07-08', '15:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:43:26', '2020-07-08 15:00:00', NULL),
(480, '9545841613', '2020-07-09', '11:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:44:00', '2020-07-09 11:00:00', NULL),
(481, '9545841613', '2020-07-10', '15:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:44:16', '2020-07-10 15:00:00', NULL),
(482, '9545841613', '2020-07-11', '13:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:44:39', '2020-07-11 13:00:00', NULL),
(483, '9545841613', '2020-07-06', '11:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:44:56', '2020-07-06 11:00:00', NULL),
(484, '9545841613', '2020-07-07', '14:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:45:13', '2020-07-07 14:00:00', NULL),
(485, '9545841613', '2020-07-09', '14:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:45:34', '2020-07-09 14:00:00', NULL),
(486, '9545841613', '2020-07-10', '10:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:45:52', '2020-07-10 10:00:00', NULL),
(487, '9545841613', '2020-07-11', '09:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:46:12', '2020-07-11 09:00:00', NULL),
(488, '9545841613', '2020-07-12', '16:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:46:36', '2020-07-12 16:00:00', NULL),
(489, '9545841613', '2020-07-13', '10:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:46:53', '2020-07-13 10:00:00', NULL),
(490, '9545841613', '2020-07-14', '10:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:47:10', '2020-07-14 10:00:00', NULL),
(491, '9545841613', '2020-07-15', '11:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:47:30', '2020-07-15 11:00:00', NULL),
(492, '9545841613', '2020-08-01', '11:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:48:28', '2020-08-01 11:00:00', NULL),
(493, '9545841613', '2020-08-02', '11:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:48:49', '2020-08-02 11:00:00', NULL),
(494, '9545841613', '2020-08-03', '11:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:49:15', '2020-08-03 11:00:00', NULL),
(495, '9545841613', '2020-08-04', '14:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:49:33', '2020-08-04 14:00:00', NULL),
(496, '9545841613', '2020-08-05', '14:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:50:08', '2020-08-05 14:00:00', NULL),
(497, '9545841613', '2020-08-06', '14:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:50:23', '2020-08-06 14:00:00', NULL),
(498, '9545841613', '2020-08-07', '11:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:50:39', '2020-08-07 11:00:00', NULL),
(499, '9545841613', '2020-08-09', '10:00:00', 'meeting', 'finnovaadvisory', '5dedf2040d6450716', NULL, NULL, '2019-08-28 11:50:59', '2020-08-09 10:00:00', NULL),
(500, '9545841613', '2020-08-10', '11:00:00', 'meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:51:13', '2020-08-10 11:00:00', NULL),
(501, '9545841613', '2020-08-11', '10:00:00', 'meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:51:33', '2020-08-11 10:00:00', NULL),
(502, '9545841613', '2020-08-12', '11:00:00', 'meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:51:49', '2020-08-12 11:00:00', NULL),
(503, '9545841613', '2020-08-13', '11:00:00', 'meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:52:10', '2020-08-13 11:00:00', NULL),
(504, '9545841613', '2020-08-14', '14:00:00', 'meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:52:26', '2020-08-14 14:00:00', NULL),
(505, '9545841613', '2020-08-15', '11:00:00', 'meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:52:42', '2020-08-15 11:00:00', NULL);
INSERT INTO `sms_reminder` (`sr_id`, `sr_mobileNo`, `sr_reminderDate`, `sr_reminderTime`, `sr_smsBody`, `sr_folderName`, `sr_createdBy`, `sr_smsStatus`, `sr_status`, `sr_createdAt`, `sr_sendSmsDateTime`, `sr_updatedAt`) VALUES
(506, '9545841613', '2020-08-16', '11:00:00', 'meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:53:20', '2020-08-16 11:00:00', NULL),
(507, '9545841613', '2020-08-10', '11:00:00', 'meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:53:44', '2020-08-10 11:00:00', NULL),
(508, '9545841613', '2020-08-11', '11:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:54:10', '2020-08-11 11:00:00', NULL),
(509, '9545841613', '2020-08-12', '13:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:54:24', '2020-08-12 13:00:00', NULL),
(510, '9545841613', '2020-08-13', '14:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:54:40', '2020-08-13 14:00:00', NULL),
(511, '9545841613', '2020-08-14', '14:58:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:55:38', '2020-08-14 14:58:00', NULL),
(512, '9545841613', '2020-09-01', '13:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:56:05', '2020-09-01 13:00:00', NULL),
(513, '9545841613', '2020-09-02', '11:59:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:56:18', '2020-09-02 11:59:00', NULL),
(514, '9545841613', '2020-09-03', '13:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:56:33', '2020-09-03 13:00:00', NULL),
(515, '9545841613', '2020-09-04', '09:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:56:48', '2020-09-04 09:00:00', NULL),
(516, '9545841613', '2020-09-05', '11:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:57:09', '2020-09-05 11:00:00', NULL),
(517, '9545841613', '2020-09-06', '11:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:57:24', '2020-09-06 11:00:00', NULL),
(518, '9545841613', '2020-09-07', '10:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:57:37', '2020-09-07 10:00:00', NULL),
(519, '9545841613', '2020-09-08', '11:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:57:51', '2020-09-08 11:00:00', NULL),
(520, '9545841613', '2020-09-09', '11:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:58:05', '2020-09-09 11:00:00', NULL),
(521, '9545841613', '2020-09-10', '09:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:58:26', '2020-09-10 09:00:00', NULL),
(522, '9545841613', '2020-09-11', '10:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:58:40', '2020-09-11 10:00:00', NULL),
(523, '9545841613', '2020-09-12', '10:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:58:58', '2020-09-12 10:00:00', NULL),
(524, '9545841613', '2020-09-13', '11:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:59:12', '2020-09-13 11:00:00', NULL),
(525, '9545841613', '2020-09-14', '11:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:59:30', '2020-09-14 11:00:00', NULL),
(526, '9545841613', '2020-09-15', '11:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:59:45', '2020-09-15 11:00:00', NULL),
(527, '9545841613', '2020-09-16', '11:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 11:59:58', '2020-09-16 11:00:00', NULL),
(528, '9545841613', '2020-09-17', '11:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 12:00:11', '2020-09-17 11:00:00', NULL),
(529, '9545841613', '2020-09-18', '10:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 12:00:24', '2020-09-18 10:00:00', NULL),
(530, '9545841613', '2020-09-19', '11:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 12:00:36', '2020-09-19 11:00:00', NULL),
(531, '9545841613', '2020-09-20', '10:00:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-28 12:00:51', '2020-09-20 10:00:00', NULL),
(532, '9607635635', '2019-11-01', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 04:31:33', '2019-11-01 15:15:00', NULL),
(533, '9607635635', '2019-11-02', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 04:32:00', '2019-11-02 15:15:00', NULL),
(534, '9607635635', '2019-11-03', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 04:32:32', '2019-11-03 15:15:00', NULL),
(535, '9607635635', '2019-11-04', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 04:32:55', '2019-11-04 15:15:00', NULL),
(536, '9607635635', '2019-11-05', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 04:59:46', '2019-11-05 15:15:00', NULL),
(537, '9607635635', '2019-11-06', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:00:16', '2019-11-06 15:15:00', NULL),
(538, '9607635635', '2019-11-08', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:02:08', '2019-11-08 15:15:00', NULL),
(539, '9607635635', '2019-11-09', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:02:28', '2019-11-09 15:15:00', NULL),
(540, '9607635635', '2019-11-10', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:02:49', '2019-11-10 15:15:00', NULL),
(541, '9607635635', '2019-11-11', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:08:34', '2019-11-11 15:15:00', NULL),
(542, '9607635635', '2019-11-12', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:08:52', '2019-11-12 15:15:00', NULL),
(543, '9607635635', '2019-11-13', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:09:09', '2019-11-13 15:15:00', NULL),
(544, '9607635635', '2019-11-14', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:09:26', '2019-11-14 15:15:00', NULL),
(545, '9607635635', '2019-11-15', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:09:46', '2019-11-15 15:15:00', NULL),
(546, '9607635635', '2019-11-16', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:10:08', '2019-11-16 15:15:00', NULL),
(547, '9607635635', '2019-11-17', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:10:27', '2019-11-17 15:15:00', NULL),
(548, '9607635635', '2019-11-18', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:10:44', '2019-11-18 15:15:00', NULL),
(549, '9607635635', '2019-11-18', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:11:03', '2019-11-18 15:15:00', NULL),
(550, '9607635635', '2019-11-19', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:11:21', '2019-11-19 15:15:00', NULL),
(551, '9607635635', '2019-11-20', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:11:47', '2019-11-20 15:15:00', NULL),
(552, '9607635635', '2019-10-01', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:15:28', '2019-10-01 15:15:00', NULL),
(553, '9607635635', '2019-10-02', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:15:43', '2019-10-02 15:15:00', NULL),
(554, '9607635635', '2019-10-03', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:16:03', '2019-10-03 15:15:00', NULL),
(555, '9607635635', '2019-10-04', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:16:17', '2019-10-04 15:15:00', NULL),
(556, '9607635635', '2019-10-05', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:16:33', '2019-10-05 15:15:00', NULL),
(557, '9607635635', '2019-10-06', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:16:50', '2019-10-06 15:15:00', NULL),
(558, '9607635635', '2019-10-07', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:17:05', '2019-10-07 15:15:00', NULL),
(559, '9607635635', '2019-09-10', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:17:58', '2019-09-10 15:15:00', NULL),
(560, '9607635635', '2019-10-10', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:18:15', '2019-10-10 15:15:00', NULL),
(561, '9607635635', '2019-10-11', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:18:35', '2019-10-11 15:15:00', NULL),
(562, '9607635635', '2019-11-10', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:18:52', '2019-11-10 15:15:00', NULL),
(563, '9607635635', '2019-12-01', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:19:10', '2019-12-01 15:15:00', NULL),
(564, '9604112088', '2019-08-29', '10:50:00', 'This is sms reminder testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:19:44', '2019-08-29 10:50:00', NULL),
(565, '9607635635', '1970-01-01', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:33:47', '1970-01-01 15:15:00', NULL),
(566, '9607635635', '1970-01-01', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:34:07', '1970-01-01 15:15:00', NULL),
(567, '9607635635', '1970-01-01', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:34:25', '1970-01-01 15:15:00', NULL),
(568, '9607635635', '1970-01-01', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:34:46', '1970-01-01 15:15:00', NULL),
(569, '9607635635', '1970-01-01', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:35:03', '1970-01-01 15:15:00', NULL),
(570, '9607635635', '1970-01-01', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:35:31', '1970-01-01 15:15:00', NULL),
(571, '9607635635', '1970-01-01', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:36:14', '1970-01-01 15:15:00', NULL),
(572, '9607635635', '1970-01-01', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:36:34', '1970-01-01 15:15:00', NULL),
(573, '9607635635', '2019-08-10', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:37:39', '2019-08-10 15:15:00', NULL),
(574, '9607635635', '2019-12-02', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:38:14', '2019-12-02 15:15:00', NULL),
(575, '9607635635', '2019-03-12', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:43:44', '2019-03-12 15:15:00', NULL),
(576, '9607635635', '2019-04-12', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 05:44:04', '2019-04-12 15:15:00', NULL),
(577, '9607635635', '2019-03-12', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 06:17:23', '2019-03-12 15:15:00', NULL),
(578, '9607635635', '2019-04-12', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 06:17:41', '2019-04-12 15:15:00', NULL),
(579, '9607635635', '2019-05-12', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 06:18:03', '2019-05-12 15:15:00', NULL),
(580, '9607635635', '2019-07-12', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 06:18:26', '2019-07-12 15:15:00', NULL),
(581, '9607635635', '2019-07-12', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 06:18:54', '2019-07-12 15:15:00', NULL),
(582, '9607635635', '2019-07-12', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 06:22:11', '2019-07-12 15:15:00', NULL),
(583, '9607635635', '2019-07-12', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 06:23:11', '2019-07-12 15:15:00', NULL),
(584, '9607635635', '2020-01-01', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 06:55:03', '2020-01-01 15:15:00', NULL),
(585, '9607635635', '2020-02-01', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 06:57:43', '2020-02-01 15:15:00', NULL),
(586, '9607635635', '2020-03-01', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 06:58:19', '2020-03-01 15:15:00', NULL),
(587, '9607635635', '2020-02-01', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 07:20:46', '2020-02-01 15:15:00', NULL),
(588, '9607635635', '2020-03-01', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 07:21:05', '2020-03-01 15:15:00', NULL),
(589, '9604112088', '2020-01-03', '18:30:00', 'ABCD', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:02:10', '2020-01-03 18:30:00', NULL),
(590, '9607635635', '2020-01-03', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:12:26', '2020-01-03 15:15:00', NULL),
(591, '9607635635', '2020-01-04', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:13:10', '2020-01-04 15:15:00', NULL),
(592, '9607635635', '2020-01-05', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:13:31', '2020-01-05 15:15:00', NULL),
(593, '9607635635', '2020-01-06', '03:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:13:51', '2020-01-06 03:15:00', NULL),
(594, '9607635635', '2020-01-07', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:14:15', '2020-01-07 15:15:00', NULL),
(595, '9607635635', '2020-01-08', '15:00:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:14:33', '2020-01-08 15:00:00', NULL),
(596, '9607635635', '2020-01-09', '15:00:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:14:51', '2020-01-09 15:00:00', NULL),
(597, '9607635635', '2020-01-10', '15:00:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:15:09', '2020-01-10 15:00:00', NULL),
(598, '9607635635', '2020-01-11', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:15:25', '2020-01-11 15:15:00', NULL),
(599, '9607635635', '2020-01-12', '15:00:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:15:44', '2020-01-12 15:00:00', NULL),
(600, '9607635635', '2020-01-13', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:16:02', '2020-01-13 15:15:00', NULL),
(601, '9607635635', '2020-01-14', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:16:22', '2020-01-14 15:15:00', NULL),
(602, '9607635635', '2020-01-15', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:16:41', '2020-01-15 15:15:00', NULL),
(603, '9607635635', '2020-01-16', '15:00:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:17:02', '2020-01-16 15:00:00', NULL),
(604, '9607635635', '2020-01-17', '15:00:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:17:20', '2020-01-17 15:00:00', NULL),
(605, '9607635635', '2020-01-18', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:17:37', '2020-01-18 15:15:00', NULL),
(606, '9607635635', '2020-01-19', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:17:57', '2020-01-19 15:15:00', NULL),
(607, '9607635635', '2020-01-20', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:18:19', '2020-01-20 15:15:00', NULL),
(608, '9607635635', '2020-02-01', '15:00:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:18:48', '2020-02-01 15:00:00', NULL),
(609, '9607635635', '2020-02-02', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:22:46', '2020-02-02 15:15:00', NULL),
(610, '9607635635', '2020-02-03', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:23:03', '2020-02-03 15:15:00', NULL),
(611, '9607635635', '2020-02-04', '15:00:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:23:20', '2020-02-04 15:00:00', NULL),
(612, '9607635635', '2020-02-05', '15:00:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:23:38', '2020-02-05 15:00:00', NULL),
(613, '9607635635', '2020-02-06', '15:00:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:23:58', '2020-02-06 15:00:00', NULL),
(614, '9607635635', '2020-02-07', '15:00:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:24:16', '2020-02-07 15:00:00', NULL),
(615, '9607635635', '2020-02-08', '15:00:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:24:51', '2020-02-08 15:00:00', NULL),
(616, '9607635635', '2019-12-03', '15:00:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:25:54', '2019-12-03 15:00:00', NULL),
(617, '9607635635', '2019-12-04', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:26:11', '2019-12-04 15:15:00', NULL),
(618, '9607635635', '2019-12-05', '15:00:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:26:30', '2019-12-05 15:00:00', NULL),
(619, '9607635635', '2019-12-06', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:26:47', '2019-12-06 15:15:00', NULL),
(620, '9607635635', '2019-12-07', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:27:07', '2019-12-07 15:15:00', NULL),
(621, '9607635635', '2019-12-08', '15:15:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:27:36', '2019-12-08 15:15:00', NULL),
(622, '9607635635', '2019-12-09', '15:00:00', 'Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:27:57', '2019-12-09 15:00:00', NULL),
(623, '9607635635', '2019-08-29', '14:00:00', 'Reminder call', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:30:11', '2019-08-29 14:00:00', NULL),
(624, '9028600116', '2019-08-29', '15:15:00', 'Testing MSG', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:31:24', '2019-08-29 15:15:00', NULL),
(625, '9028600116', '2019-08-29', '14:11:00', 'HELLO', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:31:50', '2019-08-29 14:11:00', NULL),
(626, '9545841613', '2019-08-29', '15:00:00', 'Call to Mr.Sushant regarding patiar boards pvt ltd', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:31:52', '2019-08-29 15:00:00', NULL),
(627, '9028600116', '2019-08-29', '14:10:00', 'HI', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:32:12', '2019-08-29 14:10:00', NULL),
(628, '9028600116', '2019-08-29', '16:00:00', 'NICE DAY', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:32:45', '2019-08-29 16:00:00', NULL),
(629, '9028600116', '2019-08-29', '17:00:00', 'GOOD LUCK', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:33:07', '2019-08-29 17:00:00', NULL),
(630, '9545841613', '2019-08-29', '14:12:00', 'Call to Mr.Sanjeev jain - G.N Ship Breaker,regarding documents', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:33:13', '2019-08-29 14:12:00', NULL),
(631, '9028600116', '2019-08-29', '15:00:00', 'NICE DAY', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:33:43', '2019-08-29 15:00:00', NULL),
(632, '9028600116', '2019-08-29', '15:22:00', 'BLOSSOM ', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:34:14', '2019-08-29 15:22:00', NULL),
(633, '9028600116', '2019-08-29', '16:20:00', 'COSMOS ', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:34:38', '2019-08-29 16:20:00', NULL),
(634, '9028600116', '2019-08-29', '18:00:00', 'BLESSED DAY ', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:35:07', '2019-08-29 18:00:00', NULL),
(635, '9028600116', '2019-08-29', '14:13:00', 'SMS reminder Testing 1', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:35:26', '2019-08-29 14:13:00', NULL),
(636, '9028600116', '2019-08-29', '17:25:00', 'GOOD LUCK', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:35:50', '2019-08-29 17:25:00', NULL),
(637, '9028600116', '2019-08-29', '14:15:00', 'SMS reminder Testing 2', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:36:25', '2019-08-29 14:15:00', NULL),
(638, '9604112088', '2019-08-29', '14:08:00', 'SMS reminder Testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:37:50', '2019-08-29 14:08:00', NULL),
(639, '9607635635', '2019-08-29', '14:20:00', 'SMS reminder testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:39:15', '2019-08-29 14:20:00', NULL),
(640, '9545841613', '2019-08-29', '14:21:00', 'SMS reminder testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:39:53', '2019-08-29 14:21:00', NULL),
(641, '9028600116', '2019-08-29', '15:10:00', 'HI', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:42:02', '2019-08-29 15:10:00', NULL),
(642, '9028600116', '2019-08-29', '17:20:00', 'BETTER LUCK', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:43:22', '2019-08-29 17:20:00', NULL),
(643, '9028600116', '2019-08-29', '14:22:00', 'SMS reminder testing 3', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:43:32', '2019-08-29 14:22:00', NULL),
(644, '9028600116', '2019-08-29', '19:34:00', 'HELLO', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:43:43', '2019-08-29 19:34:00', NULL),
(645, '9607635635', '2019-08-29', '14:23:00', 'SMS reminder testing ', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:44:04', '2019-08-29 14:23:00', NULL),
(646, '9028600116', '2019-08-29', '15:00:00', 'Reminder call regarding Patidar Boards, ', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:45:08', '2019-08-29 15:00:00', NULL),
(647, '9028600116', '2019-08-29', '15:15:00', 'ðŸ˜‡ðŸ˜‡', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:45:26', '2019-08-29 15:15:00', NULL),
(648, '9604112088', '2019-08-29', '14:30:00', 'SMS reminder testing 2', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:46:34', '2019-08-29 14:30:00', NULL),
(649, '8208122496', '2019-08-29', '14:25:00', 'SMS reminder testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:48:03', '2019-08-29 14:25:00', NULL),
(650, '9028600116', '2019-08-29', '15:13:00', 'ðŸŒˆ', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:48:41', '2019-08-29 15:13:00', NULL),
(651, '9028600116', '2019-08-29', '14:19:00', 'Reminder call for sree subha sales, how much time to require final rating', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:49:08', '2019-08-29 14:19:00', NULL),
(652, '9607635635', '2019-08-29', '14:21:00', 'SMS reminder testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:50:01', '2019-08-29 14:21:00', NULL),
(653, '9604112088', '2019-08-29', '14:30:00', 'SMS reminder testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:51:17', '2019-08-29 14:30:00', NULL),
(654, '9028600116', '2019-08-29', '14:25:00', 'GOOD DAY', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:51:25', '2019-08-29 14:25:00', NULL),
(655, '9545841613', '2019-08-29', '14:25:00', 'HI', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:51:57', '2019-08-29 14:25:00', NULL),
(656, '9028600116', '2019-08-29', '14:23:00', 'GOOD DAY', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:52:35', '2019-08-29 14:23:00', NULL),
(657, '9545841613', '2019-08-29', '14:31:00', 'SMS reminder testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:52:53', '2019-08-29 14:31:00', NULL),
(658, '9028600116', '2019-08-29', '14:23:00', 'BEST LUCK', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:53:13', '2019-08-29 14:23:00', NULL),
(659, '9607635635', '2019-08-29', '14:32:00', 'SMS reminder testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:53:41', '2019-08-29 14:32:00', NULL),
(660, '9028600116', '2019-08-29', '14:24:00', 'GOOD AFTERNOON ', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:53:58', '2019-08-29 14:24:00', NULL),
(661, '9545841613', '2019-08-29', '14:33:00', 'testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:56:14', '2019-08-29 14:33:00', NULL),
(662, '9545841613', '2019-08-29', '14:34:00', 'Client Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:56:41', '2019-08-29 14:34:00', NULL),
(663, '9545841613', '2019-08-29', '14:35:00', 'Meeting', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:57:23', '2019-08-29 14:35:00', NULL),
(664, '9545841613', '2019-08-29', '14:36:00', 'Client meeting at client location', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 08:58:22', '2019-08-29 14:36:00', NULL),
(665, '9545841613', '2019-08-29', '14:29:00', 'HI', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:00:03', '2019-08-29 14:29:00', NULL),
(666, '9028600116', '2019-08-29', '15:18:00', 'TESTING', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:00:58', '2019-08-29 15:18:00', NULL),
(667, '9545841613', '2019-08-29', '14:36:00', 'Client concall', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:01:06', '2019-08-29 14:36:00', NULL),
(668, '9028600116', '2019-08-29', '14:33:00', 'HI', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:01:36', '2019-08-29 14:33:00', NULL),
(669, '9607635635', '2019-08-29', '14:37:00', 'Hello how are you today', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:02:31', '2019-08-29 14:37:00', NULL),
(670, '9028600116', '2019-08-29', '14:35:00', 'TESTING', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:02:47', '2019-08-29 14:35:00', NULL),
(671, '9607635635', '2019-08-29', '14:38:00', 'Hiiiiii', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:04:44', '2019-08-29 14:38:00', NULL),
(672, '9604112088', '2019-08-29', '14:39:00', 'Hello Achyut, good afternoon', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:05:33', '2019-08-29 14:39:00', NULL),
(673, '8208122496', '2019-08-29', '14:40:00', 'SMS reminde testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:06:22', '2019-08-29 14:40:00', NULL),
(674, '9607635635', '2019-08-29', '14:41:00', 'Good afternoon.....', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:07:01', '2019-08-29 14:41:00', NULL),
(675, '9028600116', '2019-08-29', '14:40:00', 'HI', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:08:02', '2019-08-29 14:40:00', NULL),
(676, '9028600116', '2019-08-29', '14:40:00', 'GOOD DAY', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:10:11', '2019-08-29 14:40:00', NULL),
(677, '9028600116', '2019-08-29', '14:42:00', 'Management discussion with rating ageny and client ', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:10:18', '2019-08-29 14:42:00', NULL),
(678, '9028600116', '2019-08-29', '14:43:00', 'SMS reminder testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:10:47', '2019-08-29 14:43:00', NULL),
(679, '9028600116', '2019-08-29', '14:45:00', 'HII', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:11:20', '2019-08-29 14:45:00', NULL),
(680, '9607635635', '2019-08-29', '14:44:00', 'we have  meeting at 3 pm ', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:12:23', '2019-08-29 14:44:00', NULL),
(681, '9028600116', '2019-08-29', '14:50:00', 'HI', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:13:29', '2019-08-29 14:50:00', NULL),
(682, '9028600116', '2019-08-29', '14:45:00', 'HIII', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:14:46', '2019-08-29 14:45:00', NULL),
(683, '9028600116', '2019-08-29', '14:50:00', 'GOOD', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:15:11', '2019-08-29 14:50:00', NULL),
(684, '8208122496', '2019-08-29', '15:00:00', 'SMS reminder testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:21:00', '2019-08-29 15:00:00', NULL),
(685, '9028600116', '2019-08-29', '14:53:00', 'HIII', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:21:18', '2019-08-29 14:53:00', NULL),
(686, '9028600116', '2019-08-29', '14:54:00', 'HIII', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:21:39', '2019-08-29 14:54:00', NULL),
(687, '9604112088', '2019-08-29', '15:01:00', 'wats up', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:22:07', '2019-08-29 15:01:00', NULL),
(688, '9028600116', '2019-08-29', '15:02:00', 'meeting with rating agency', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:23:54', '2019-08-29 15:02:00', NULL),
(689, '9028600116', '2019-08-29', '14:03:00', 'SMS reminder testing', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:24:30', '2019-08-29 14:03:00', NULL),
(690, '9028600116', '2019-08-29', '14:55:00', 'HIII', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:25:05', '2019-08-29 14:55:00', NULL),
(691, '9028600116', '2019-08-29', '14:57:00', 'HIII', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:25:26', '2019-08-29 14:57:00', NULL),
(692, '9607635635', '2019-08-29', '15:04:00', 'Concall', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:25:50', '2019-08-29 15:04:00', NULL),
(693, '9028600116', '2019-08-29', '14:58:00', 'GOOD DAY', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:25:53', '2019-08-29 14:58:00', NULL),
(694, '9604112088', '2019-08-29', '15:05:00', 'SMS reminder testing for CRM', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:26:36', '2019-08-29 15:05:00', NULL),
(695, '9028600116', '2019-08-29', '14:58:00', 'NICE DAY', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:26:46', '2019-08-29 14:58:00', NULL),
(696, '9545841613', '2019-08-29', '15:06:00', 'Have a nice day', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:27:55', '2019-08-29 15:06:00', NULL),
(697, '9028600116', '2019-08-29', '15:06:00', 'Good afternoon sir, have a good day', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:28:30', '2019-08-29 15:06:00', NULL),
(698, '8208122496', '2019-08-29', '15:07:00', 'Have a nice day', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:29:12', '2019-08-29 15:07:00', NULL),
(699, '9028600116', '2019-08-29', '15:18:00', 'TESTING', 'finnovaadvisory', '4', NULL, NULL, '2019-08-29 09:43:40', '2019-08-29 15:18:00', NULL),
(700, '9028600116', '2019-08-30', '15:19:00', 'con', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 09:55:41', '2019-08-30 15:19:00', NULL),
(701, '9028600116', '2019-08-30', '15:18:00', 'hiii', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:10:23', '2019-08-30 15:18:00', NULL),
(702, '9028600116', '2019-08-30', '15:15:00', 'good', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:10:54', '2019-08-30 15:15:00', NULL),
(703, '9028600116', '2019-08-30', '15:19:00', 'good', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:11:21', '2019-08-30 15:19:00', NULL),
(704, '9028600116', '2019-08-30', '15:19:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:14:03', '2019-08-30 15:19:00', NULL),
(705, '9028600116', '2019-08-30', '15:19:00', 'Good Afternoon', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:14:30', '2019-08-30 15:19:00', NULL),
(706, '9028600116', '2019-08-30', '16:20:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:15:44', '2019-08-30 16:20:00', NULL),
(707, '9028600116', '2019-08-31', '15:15:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:16:08', '2019-08-31 15:15:00', NULL),
(708, '9028600116', '2019-08-31', '15:15:00', 'finnova', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:16:37', '2019-08-31 15:15:00', NULL),
(709, '9028600116', '2019-08-31', '15:19:00', 'sms', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:17:04', '2019-08-31 15:19:00', NULL),
(710, '9028600116', '2019-08-31', '15:18:00', 'fin', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:17:24', '2019-08-31 15:18:00', NULL),
(711, '9028600116', '2019-08-31', '15:19:00', 'ready', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:17:46', '2019-08-31 15:19:00', NULL),
(712, '9028600116', '2019-08-31', '15:19:00', 'ok', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:18:15', '2019-08-31 15:19:00', NULL),
(713, '9028600116', '2019-08-31', '17:25:00', 'finn', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:18:46', '2019-08-31 17:25:00', NULL),
(714, '9028600116', '2019-08-31', '20:40:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:19:15', '2019-08-31 20:40:00', NULL),
(715, '9028600116', '2019-08-31', '18:30:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:19:44', '2019-08-31 18:30:00', NULL),
(716, '9028600116', '2019-09-02', '14:00:00', 'sj', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:20:40', '2019-09-02 14:00:00', NULL),
(717, '9028600116', '2019-09-03', '13:05:00', 'hii', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:21:04', '2019-09-03 13:05:00', NULL),
(718, '9028600116', '2019-09-04', '15:16:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:21:17', '2019-09-04 15:16:00', NULL),
(719, '9028600116', '2019-09-12', '17:23:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:21:38', '2019-09-12 17:23:00', NULL),
(720, '9028600116', '2019-08-29', '15:57:00', 'hiii', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:22:43', '2019-08-29 15:57:00', NULL),
(721, '9028600116', '2019-08-29', '15:58:00', 'gg', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:23:28', '2019-08-29 15:58:00', NULL),
(722, '9028600116', '2019-08-29', '15:58:00', 'hii', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:23:57', '2019-08-29 15:58:00', NULL),
(723, '9028600116', '2019-08-29', '15:58:00', 'hii', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:24:26', '2019-08-29 15:58:00', NULL),
(724, '9028600116', '2019-08-29', '15:58:00', 'ggg', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:24:55', '2019-08-29 15:58:00', NULL),
(725, '9028600116', '2020-05-13', '04:20:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:26:05', '2020-05-13 04:20:00', NULL),
(726, '9028600116', '2020-06-24', '03:20:00', 'hii', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:26:34', '2020-06-24 03:20:00', NULL),
(727, '9028600116', '2020-06-19', '03:15:00', 'good', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:28:06', '2020-06-19 03:15:00', NULL),
(728, '9028600116', '2020-08-21', '15:20:00', 'hii', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:30:15', '2020-08-21 15:20:00', NULL),
(729, '9028600116', '2020-11-03', '05:15:00', 'hiii', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:30:42', '2020-11-03 05:15:00', NULL),
(730, '9028600116', '2020-03-26', '18:35:00', 'hii', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:31:19', '2020-03-26 18:35:00', NULL),
(731, '9028600116', '2020-06-17', '04:20:00', 'hii', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:31:43', '2020-06-17 04:20:00', NULL),
(732, '9028600116', '2020-08-11', '08:45:00', 'hii', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:32:03', '2020-08-11 08:45:00', NULL),
(733, '9028600116', '2019-08-31', '15:15:00', 'hii', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:33:36', '2019-08-31 15:15:00', NULL),
(734, '9028600116', '2019-08-31', '14:10:00', 'hiii', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:33:54', '2019-08-31 14:10:00', NULL),
(735, '9028600116', '2019-08-31', '02:15:00', 'hiii', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:34:11', '2019-08-31 02:15:00', NULL),
(736, '9028600116', '2019-08-31', '02:13:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:34:37', '2019-08-31 02:13:00', NULL),
(737, '9028600116', '2019-08-31', '01:05:00', 'good', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:34:59', '2019-08-31 01:05:00', NULL),
(738, '9028600116', '2019-08-31', '14:05:00', 'good', 'finnovaadvisory', '4', 1, NULL, '2019-08-29 10:35:21', '2019-08-31 14:05:00', NULL),
(739, '9545841613', '2020-04-04', '09:50:00', 'Testing', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:27:35', '2020-04-04 09:50:00', NULL),
(740, '9545841613', '2020-04-05', '07:45:00', 'Thanks', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:28:18', '2020-04-05 07:45:00', NULL),
(741, '9545841613', '2020-04-06', '15:15:00', 'tk', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:28:34', '2020-04-06 15:15:00', NULL),
(742, '9545841613', '2020-04-08', '14:20:00', 'good', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:28:56', '2020-04-08 14:20:00', NULL),
(743, '9545841613', '2020-04-09', '05:33:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:35:45', '2020-04-09 05:33:00', NULL),
(744, '9545841613', '2020-04-10', '15:23:00', 'hallo', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:36:01', '2020-04-10 15:23:00', NULL),
(745, '9545841613', '2020-04-11', '09:50:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:36:20', '2020-04-11 09:50:00', NULL),
(746, '9545841613', '2020-04-12', '08:50:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:36:37', '2020-04-12 08:50:00', NULL),
(747, '9545841613', '2020-04-13', '11:30:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:36:57', '2020-04-13 11:30:00', NULL),
(748, '9545841613', '2020-04-16', '20:48:00', 'yes', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:37:17', '2020-04-16 20:48:00', NULL),
(749, '9545841613', '2020-04-17', '17:25:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:42:38', '2020-04-17 17:25:00', NULL),
(750, '9545841613', '2020-04-18', '19:35:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:42:56', '2020-04-18 19:35:00', NULL),
(751, '9545841613', '2020-04-19', '03:00:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:43:14', '2020-04-19 03:00:00', NULL),
(752, '9545841613', '2020-04-20', '09:50:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:43:29', '2020-04-20 09:50:00', NULL),
(753, '9545841613', '2020-04-07', '04:30:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:43:49', '2020-04-07 04:30:00', NULL),
(754, '9545841613', '2020-04-23', '08:35:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:44:13', '2020-04-23 08:35:00', NULL),
(755, '9545841613', '2020-04-24', '08:25:00', 'jo', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:50:47', '2020-04-24 08:25:00', NULL),
(756, '9545841613', '2020-04-14', '02:06:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:51:07', '2020-04-14 02:06:00', NULL),
(757, '9545841613', '2020-04-06', '18:30:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:51:29', '2020-04-06 18:30:00', NULL),
(758, '9545841613', '2020-04-19', '08:20:00', 'hallo', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:51:53', '2020-04-19 08:20:00', NULL),
(759, '9545841613', '2020-04-25', '10:55:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:52:10', '2020-04-25 10:55:00', NULL),
(760, '9545841613', '2020-03-11', '16:30:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:52:43', '2020-03-11 16:30:00', NULL),
(761, '9545841613', '2020-03-10', '14:30:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:53:00', '2020-03-10 14:30:00', NULL),
(762, '9545841613', '2020-03-13', '17:35:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:53:17', '2020-03-13 17:35:00', NULL),
(763, '9545841613', '2020-03-14', '03:18:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:53:36', '2020-03-14 03:18:00', NULL),
(764, '9545841613', '2020-03-16', '14:15:00', 'jo', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:54:04', '2020-03-16 14:15:00', NULL),
(765, '9545841613', '2020-03-20', '04:25:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 06:54:25', '2020-03-20 04:25:00', NULL),
(766, '9545841613', '2020-05-04', '17:24:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:22:53', '2020-05-04 17:24:00', NULL),
(767, '9545841613', '2020-05-05', '16:30:00', 'hello', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:23:46', '2020-05-05 16:30:00', NULL),
(768, '9545841613', '2020-05-06', '15:15:00', 'go', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:26:05', '2020-05-06 15:15:00', NULL),
(769, '9545841613', '2020-05-07', '20:45:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:26:31', '2020-05-07 20:45:00', NULL),
(770, '9545841613', '2020-05-08', '17:25:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:26:45', '2020-05-08 17:25:00', NULL),
(771, '9545841613', '2020-05-17', '19:45:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:27:08', '2020-05-17 19:45:00', NULL),
(772, '9545841613', '2020-05-21', '04:30:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:27:25', '2020-05-21 04:30:00', NULL),
(773, '9545841613', '2020-05-06', '20:50:00', 'go', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:28:34', '2020-05-06 20:50:00', NULL),
(774, '9545841613', '2020-05-07', '09:25:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:28:57', '2020-05-07 09:25:00', NULL),
(775, '9545841613', '2020-05-10', '10:15:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:29:17', '2020-05-10 10:15:00', NULL),
(776, '9545841613', '2020-05-12', '19:49:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:29:33', '2020-05-12 19:49:00', NULL),
(777, '9545841613', '2020-05-25', '10:55:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:29:59', '2020-05-25 10:55:00', NULL),
(778, '9545841613', '2020-05-18', '08:50:00', 'hello', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:30:20', '2020-05-18 08:50:00', NULL),
(779, '9545841613', '2020-05-10', '05:00:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:30:45', '2020-05-10 05:00:00', NULL),
(780, '9545841613', '2020-05-14', '11:25:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:31:13', '2020-05-14 11:25:00', NULL),
(781, '9545841613', '2020-05-15', '05:20:00', 'Testing', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:43:10', '2020-05-15 05:20:00', NULL),
(782, '9545841613', '2020-05-17', '08:50:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:43:44', '2020-05-17 08:50:00', NULL),
(783, '9545841613', '2020-05-25', '16:25:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:44:05', '2020-05-25 16:25:00', NULL),
(784, '9545841613', '2020-05-28', '09:20:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:44:20', '2020-05-28 09:20:00', NULL),
(785, '9545841613', '2020-05-12', '17:45:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:44:36', '2020-05-12 17:45:00', NULL),
(786, '9545841613', '2020-06-11', '05:25:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:45:15', '2020-06-11 05:25:00', NULL),
(787, '9545841613', '2020-06-15', '08:25:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:45:29', '2020-06-15 08:25:00', NULL),
(788, '9545841613', '2020-06-17', '05:15:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:45:43', '2020-06-17 05:15:00', NULL),
(789, '9545841613', '2020-06-22', '10:55:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:46:06', '2020-06-22 10:55:00', NULL),
(790, '9545841613', '2020-06-25', '09:55:00', 'hello', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:46:26', '2020-06-25 09:55:00', NULL),
(791, '9545841613', '2020-06-27', '04:25:00', 'tk', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:46:54', '2020-06-27 04:25:00', NULL),
(792, '9545841613', '2020-06-17', '02:30:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:54:16', '2020-06-17 02:30:00', NULL),
(793, '9545841613', '2020-06-21', '09:10:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:54:32', '2020-06-21 09:10:00', NULL),
(794, '9545841613', '2020-06-15', '09:17:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:54:51', '2020-06-15 09:17:00', NULL),
(795, '9545841613', '2020-06-18', '16:38:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:55:20', '2020-06-18 16:38:00', NULL),
(796, '9545841613', '2020-06-25', '05:40:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:55:53', '2020-06-25 05:40:00', NULL),
(797, '9545841613', '2020-06-29', '17:35:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:57:28', '2020-06-29 17:35:00', NULL),
(798, '9545841613', '2020-06-15', '06:25:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 07:57:43', '2020-06-15 06:25:00', NULL),
(799, '9545841613', '2020-06-24', '16:20:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:11:53', '2020-06-24 16:20:00', NULL),
(800, '9545841613', '2020-06-24', '16:20:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:11:53', '2020-06-24 16:20:00', NULL),
(801, '9545841613', '2020-06-24', '16:20:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:11:59', '2020-06-24 16:20:00', NULL),
(802, '9545841613', '2020-07-01', '15:20:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:27:20', '2020-07-01 15:20:00', NULL),
(803, '9545841613', '2020-07-02', '17:25:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:27:42', '2020-07-02 17:25:00', NULL),
(804, '9545841613', '2020-07-03', '19:34:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:28:09', '2020-07-03 19:34:00', NULL),
(805, '9545841613', '2020-07-04', '10:50:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:28:35', '2020-07-04 10:50:00', NULL),
(806, '9545841613', '2020-07-05', '06:45:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:28:56', '2020-07-05 06:45:00', NULL),
(807, '9545841613', '2020-07-13', '06:35:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:30:46', '2020-07-13 06:35:00', NULL),
(808, '9545841613', '2020-07-15', '10:50:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:31:13', '2020-07-15 10:50:00', NULL),
(809, '9545841613', '2020-07-22', '03:08:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:31:41', '2020-07-22 03:08:00', NULL),
(810, '9545841613', '2020-07-16', '17:15:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:32:42', '2020-07-16 17:15:00', NULL),
(811, '9545841613', '2020-07-20', '07:50:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:32:56', '2020-07-20 07:50:00', NULL),
(812, '9545841613', '2020-07-23', '09:50:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:36:30', '2020-07-23 09:50:00', NULL),
(813, '9545841613', '2020-07-08', '05:40:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:45:57', '2020-07-08 05:40:00', NULL),
(814, '9545841613', '2020-07-16', '17:45:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:46:14', '2020-07-16 17:45:00', NULL),
(815, '9545841613', '2020-07-23', '18:40:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:46:29', '2020-07-23 18:40:00', NULL),
(816, '9545841613', '2020-07-06', '08:50:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:46:48', '2020-07-06 08:50:00', NULL),
(817, '9545841613', '2020-07-23', '08:50:00', 'ji', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:47:07', '2020-07-23 08:50:00', NULL),
(818, '9545841613', '2020-07-24', '04:25:00', 'go', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:47:22', '2020-07-24 04:25:00', NULL),
(819, '9545841613', '2020-07-25', '04:15:00', 'op', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:47:48', '2020-07-25 04:15:00', NULL),
(820, '9545841613', '2020-07-30', '18:30:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:48:06', '2020-07-30 18:30:00', NULL),
(821, '9545841613', '2020-07-20', '04:10:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 08:48:51', '2020-07-20 04:10:00', NULL),
(822, '9545841613', '2020-07-22', '16:38:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:04:24', '2020-07-22 16:38:00', NULL),
(823, '9545841613', '2020-07-23', '05:25:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:04:56', '2020-07-23 05:25:00', NULL),
(824, '9545841613', '2019-10-15', '16:30:00', '0', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:06:32', '2019-10-15 16:30:00', NULL),
(825, '9545841613', '2019-10-16', '08:48:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:06:47', '2019-10-16 08:48:00', NULL),
(826, '9545841613', '2019-10-24', '06:25:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:07:05', '2019-10-24 06:25:00', NULL),
(827, '9545841613', '2019-10-29', '16:38:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:07:19', '2019-10-29 16:38:00', NULL),
(828, '9545841613', '2019-10-20', '05:20:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:07:31', '2019-10-20 05:20:00', NULL),
(829, '9545841613', '2019-10-24', '10:55:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:07:46', '2019-10-24 10:55:00', NULL),
(830, '9545841613', '2019-10-30', '10:55:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:08:00', '2019-10-30 10:55:00', NULL),
(831, '9545841613', '2019-10-24', '20:10:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:08:15', '2019-10-24 20:10:00', NULL),
(832, '9545841613', '2019-10-27', '03:05:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:08:30', '2019-10-27 03:05:00', NULL),
(833, '9545841613', '2019-12-11', '10:35:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:09:07', '2019-12-11 10:35:00', NULL),
(834, '9545841613', '2019-12-26', '04:50:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:09:25', '2019-12-26 04:50:00', NULL),
(835, '9545841613', '2019-12-17', '06:50:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:09:39', '2019-12-17 06:50:00', NULL),
(836, '9545841613', '2019-12-19', '08:50:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:09:53', '2019-12-19 08:50:00', NULL),
(837, '9545841613', '2019-12-10', '05:15:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:10:11', '2019-12-10 05:15:00', NULL),
(838, '9545841613', '2019-12-20', '04:10:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:10:24', '2019-12-20 04:10:00', NULL),
(839, '9545841613', '2019-12-24', '08:53:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:10:41', '2019-12-24 08:53:00', NULL),
(840, '9545841613', '2019-12-19', '17:30:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:10:57', '2019-12-19 17:30:00', NULL),
(841, '9545841613', '2020-02-13', '05:18:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:11:36', '2020-02-13 05:18:00', NULL),
(842, '9545841613', '2020-02-18', '08:55:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:11:49', '2020-02-18 08:55:00', NULL),
(843, '9545841613', '2020-02-13', '16:10:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:12:03', '2020-02-13 16:10:00', NULL),
(844, '9545841613', '2020-02-19', '08:55:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:12:16', '2020-02-19 08:55:00', NULL),
(845, '9545841613', '2020-02-21', '09:15:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:12:30', '2020-02-21 09:15:00', NULL),
(846, '9545841613', '2020-02-19', '10:55:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:12:44', '2020-02-19 10:55:00', NULL),
(847, '9545841613', '2020-02-28', '16:38:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:12:57', '2020-02-28 16:38:00', NULL),
(848, '9545841613', '2020-02-19', '09:55:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:13:10', '2020-02-19 09:55:00', NULL),
(849, '9545841613', '2020-02-12', '10:05:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:13:22', '2020-02-12 10:05:00', NULL),
(850, '9545841613', '2020-03-19', '09:15:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:13:49', '2020-03-19 09:15:00', NULL),
(851, '9545841613', '2020-03-17', '12:05:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:14:04', '2020-03-17 12:05:00', NULL),
(852, '9545841613', '2020-03-19', '16:10:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:14:19', '2020-03-19 16:10:00', NULL);
INSERT INTO `sms_reminder` (`sr_id`, `sr_mobileNo`, `sr_reminderDate`, `sr_reminderTime`, `sr_smsBody`, `sr_folderName`, `sr_createdBy`, `sr_smsStatus`, `sr_status`, `sr_createdAt`, `sr_sendSmsDateTime`, `sr_updatedAt`) VALUES
(853, '9545841613', '2020-03-23', '06:50:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:14:39', '2020-03-23 06:50:00', NULL),
(854, '9545841613', '2020-03-26', '15:10:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:17:09', '2020-03-26 15:10:00', NULL),
(855, '9545841613', '2020-03-16', '07:50:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:17:22', '2020-03-16 07:50:00', NULL),
(856, '9545841613', '2020-03-19', '06:25:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:17:40', '2020-03-19 06:25:00', NULL),
(857, '9545841613', '2020-03-27', '07:55:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:17:54', '2020-03-27 07:55:00', NULL),
(858, '9545841613', '2020-04-02', '08:55:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:18:12', '2020-04-02 08:55:00', NULL),
(859, '9545841613', '2020-03-18', '05:40:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:18:29', '2020-03-18 05:40:00', NULL),
(860, '9545841613', '2020-03-20', '03:10:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:18:46', '2020-03-20 03:10:00', NULL),
(861, '9545841613', '2020-03-23', '04:25:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:19:03', '2020-03-23 04:25:00', NULL),
(862, '9545841613', '2019-12-11', '04:10:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:24:42', '2019-12-11 04:10:00', NULL),
(863, '9545841613', '2019-12-12', '15:20:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:24:58', '2019-12-12 15:20:00', NULL),
(864, '9545841613', '2019-12-19', '17:15:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:25:11', '2019-12-19 17:15:00', NULL),
(865, '9545841613', '2019-12-22', '04:45:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:25:28', '2019-12-22 04:45:00', NULL),
(866, '9545841613', '2019-12-19', '04:10:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:25:44', '2019-12-19 04:10:00', NULL),
(867, '9545841613', '2019-12-20', '03:20:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:25:59', '2019-12-20 03:20:00', NULL),
(868, '9545841613', '2019-12-24', '16:38:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:26:12', '2019-12-24 16:38:00', NULL),
(869, '9545841613', '2019-12-26', '20:20:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:26:34', '2019-12-26 20:20:00', NULL),
(870, '9545841613', '2019-12-24', '15:20:00', '9545841613', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 09:26:55', '2019-12-24 15:20:00', NULL),
(871, '9028600116', '2019-08-30', '15:44:00', '9028600116', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 10:12:04', '2019-08-30 15:44:00', NULL),
(872, '9028600116', '2019-08-30', '15:48:00', '9028600116', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 10:12:56', '2019-08-30 15:48:00', NULL),
(873, '9028600116', '2019-08-30', '15:57:00', '9028600116', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 10:13:14', '2019-08-30 15:57:00', NULL),
(874, '9028600116', '2019-08-30', '15:58:00', '9028600116', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 10:13:34', '2019-08-30 15:58:00', NULL),
(875, '9028600116', '2019-08-30', '15:52:00', '9028600116', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 10:14:02', '2019-08-30 15:52:00', NULL),
(876, '9028600116', '2019-08-30', '15:50:00', '9028600116', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 10:14:25', '2019-08-30 15:50:00', NULL),
(877, '9028600116', '2019-08-30', '15:50:00', '9028600116', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 10:14:46', '2019-08-30 15:50:00', NULL),
(878, '9028600116', '2019-08-31', '22:45:00', '9028600116', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 10:15:09', '2019-08-31 22:45:00', NULL),
(879, '9028600116', '2019-08-31', '10:45:00', '9028600116', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 10:15:40', '2019-08-31 10:45:00', NULL),
(880, '9028600116', '2019-08-31', '08:43:00', '9028600116', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 10:15:56', '2019-08-31 08:43:00', NULL),
(881, '9028600116', '2019-08-30', '15:50:00', '9028600116', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 10:16:16', '2019-08-30 15:50:00', NULL),
(882, '9028600116', '2019-08-30', '15:50:00', '9028600116', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 10:16:44', '2019-08-30 15:50:00', NULL),
(883, '9607635635', '2019-08-30', '16:05:00', 'Good evening madam', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 10:32:11', '2019-08-30 16:05:00', NULL),
(884, '9607635635', '2019-08-30', '16:10:00', 'Testing', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 10:33:46', '2019-08-30 16:10:00', NULL),
(885, '9545841613', '2019-08-30', '16:15:00', 'This SMS regarding SMS reminder testing', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 10:36:09', '2019-08-30 16:15:00', NULL),
(886, '9028600611', '2019-08-31', '14:50:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-08-30 11:44:37', '2019-08-31 14:50:00', NULL),
(887, '9028600116', '2019-09-03', '09:18:00', 'Good Morning ', 'finnovaadvisory', '4', 1, NULL, '2019-09-03 03:45:22', '2019-09-03 09:18:00', NULL),
(888, '9028600116', '2019-09-03', '09:16:00', 'Good Day', 'finnovaadvisory', '4', 1, NULL, '2019-09-03 03:46:03', '2019-09-03 09:16:00', NULL),
(889, '9028600116', '2019-09-03', '09:20:00', 'Good Luck', 'finnovaadvisory', '4', 1, NULL, '2019-09-03 03:48:00', '2019-09-03 09:20:00', NULL),
(890, '9028600116', '2019-09-03', '09:22:00', 'Nice Day', 'finnovaadvisory', '4', 1, NULL, '2019-09-03 03:48:29', '2019-09-03 09:22:00', NULL),
(891, '9028600116', '2019-09-03', '09:20:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-09-03 03:49:34', '2019-09-03 09:20:00', NULL),
(892, '9028600116', '2019-09-03', '09:20:00', 'hi', 'finnovaadvisory', '4', 1, NULL, '2019-09-03 03:49:57', '2019-09-03 09:20:00', NULL),
(893, '9028600116', '2019-09-03', '09:23:00', 'Best Luck', 'finnovaadvisory', '4', 1, NULL, '2019-09-03 03:50:27', '2019-09-03 09:23:00', NULL),
(894, '9028600116', '2019-09-09', '13:00:00', 'Good Afternoon Sir, Good day', 'finnovaadvisory', '4', 1, NULL, '2019-09-09 05:33:54', '2019-09-09 13:00:00', NULL),
(895, '9028600116', '2019-09-09', '12:00:00', 'Reminder call to Mr.chandrashekhar for Balance sheet', 'finnovaadvisory', '4', 1, NULL, '2019-09-09 05:35:05', '2019-09-09 12:00:00', NULL),
(896, '9028600116', '2019-09-09', '11:10:00', 'Good Morning Sir, Today i call to vaishnavi for Balance sheet but call is busy.', 'finnovaadvisory', '4', 1, NULL, '2019-09-09 05:37:28', '2019-09-09 11:10:00', NULL),
(897, '9028600116', '2019-09-09', '11:30:00', 'Spoke to Mr.Sandeep Upadhyay, for Account statements of March to August.He asking for bill of infomerics to transfer the fund', 'finnovaadvisory', '4', 1, NULL, '2019-09-09 05:41:07', '2019-09-09 11:30:00', NULL),
(898, '9028600116', '2019-09-09', '16:05:00', 'Great job', 'finnovaadvisory', '4', 1, NULL, '2019-09-09 10:35:09', '2019-09-09 16:05:00', NULL),
(899, '9028600116', '2019-09-09', '16:13:00', 'GOOD DAY!', 'finnovaadvisory', '4', 1, NULL, '2019-09-09 10:35:35', '2019-09-09 16:13:00', NULL),
(900, '9028600116', '2019-09-09', '16:15:00', 'NICE DAY', 'finnovaadvisory', '4', 1, NULL, '2019-09-09 10:36:01', '2019-09-09 16:15:00', NULL),
(901, '9028600116', '2019-09-09', '16:25:00', 'GOOD LUCK', 'finnovaadvisory', '4', 1, NULL, '2019-09-09 10:36:22', '2019-09-09 16:25:00', NULL),
(902, '9028600116', '2019-09-09', '17:10:00', 'HI', 'finnovaadvisory', '4', 1, NULL, '2019-09-09 10:36:47', '2019-09-09 17:10:00', NULL),
(903, '9028600116', '2019-09-10', '13:05:00', 'GOOD ', 'finnovaadvisory', '4', 1, NULL, '2019-09-09 10:37:10', '2019-09-10 13:05:00', NULL),
(904, '9028600116', '2019-09-10', '13:05:00', 'FINNOVA', 'finnovaadvisory', '4', 1, NULL, '2019-09-09 10:37:31', '2019-09-10 13:05:00', NULL),
(905, '9028600116', '2019-09-10', '18:15:00', 'LUCKY ', 'finnovaadvisory', '4', 1, NULL, '2019-09-09 10:37:52', '2019-09-10 18:15:00', NULL),
(906, '9028600116', '2019-09-09', '17:30:00', 'SEE YOU TOMORROW ', 'finnovaadvisory', '4', 1, NULL, '2019-09-09 10:38:23', '2019-09-09 17:30:00', NULL),
(907, '9028600116', '2019-09-10', '21:54:00', 'GOOD MORNING FINNOVA', 'finnovaadvisory', '4', 1, NULL, '2019-09-10 04:24:47', '2019-09-10 21:54:00', NULL),
(908, '9028600116', '2019-09-10', '10:05:00', 'HAVE A NICE DAY', 'finnovaadvisory', '4', 1, NULL, '2019-09-10 04:25:09', '2019-09-10 10:05:00', NULL),
(909, '9028600116', '2019-09-10', '10:03:00', 'ENJOY YOUR DAY', 'finnovaadvisory', '4', 1, NULL, '2019-09-10 04:25:40', '2019-09-10 10:03:00', NULL),
(910, '9028600116', '2019-09-10', '10:10:00', 'HI', 'finnovaadvisory', '4', 1, NULL, '2019-09-10 04:26:04', '2019-09-10 10:10:00', NULL),
(911, '9028600116', '2019-09-10', '10:15:00', 'CLAP FOR YOUR SELF', 'finnovaadvisory', '4', 1, NULL, '2019-09-10 04:27:08', '2019-09-10 10:15:00', NULL),
(912, '9028600116', '2019-09-10', '10:30:00', 'GOOD MORNING', 'finnovaadvisory', '4', 1, NULL, '2019-09-10 04:27:36', '2019-09-10 10:30:00', NULL),
(913, '9607635635', '2019-09-18', '16:00:00', 'Client Meeting', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 09:55:41', '2019-09-18 16:00:00', NULL),
(914, '9607635635', '2019-09-18', '15:25:00', 'testing', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 09:57:23', '2019-09-18 15:25:00', NULL),
(915, '9028600116', '2019-09-18', '17:00:00', 'Good Evening sir', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 10:04:46', '2019-09-18 17:00:00', NULL),
(916, '9028600116', '2019-09-18', '16:20:00', 'HAVE A WONDERFUL DAY', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 10:36:46', '2019-09-18 16:20:00', NULL),
(917, '9028600116', '2019-09-18', '16:10:00', 'NICE DAY', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 10:37:11', '2019-09-18 16:10:00', NULL),
(918, '9028600116', '2019-09-18', '16:10:00', 'GOOD LUCK', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 10:37:36', '2019-09-18 16:10:00', NULL),
(919, '9028600116', '2019-09-19', '08:10:00', 'GOOD MORNING FINNOVA', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 10:38:19', '2019-09-19 08:10:00', NULL),
(920, '9028600116', '2019-09-19', '08:05:00', 'WARM UP', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 10:38:51', '2019-09-19 08:05:00', NULL),
(921, '9028600116', '2019-09-19', '08:39:00', 'WORK PLAN', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 10:39:23', '2019-09-19 08:39:00', NULL),
(922, '9028600116', '2019-09-20', '06:15:00', 'PIN', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 10:52:30', '2019-09-20 06:15:00', NULL),
(923, '9028600116', '2019-09-21', '08:20:00', 'GOOD MORNING', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 10:52:52', '2019-09-21 08:20:00', NULL),
(924, '9028600116', '2019-09-21', '10:20:00', 'GOOD MORNING', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 10:53:15', '2019-09-21 10:20:00', NULL),
(925, '9028600116', '2019-09-28', '10:05:00', 'ALL IS WELL', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 10:53:42', '2019-09-28 10:05:00', NULL),
(926, '9028600116', '2019-09-28', '10:05:00', 'ALL IS WELL', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 10:53:42', '2019-09-28 10:05:00', NULL),
(927, '9028600116', '2019-09-30', '09:15:00', 'HI', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 11:07:47', '2019-09-30 09:15:00', NULL),
(928, '9028600116', '2019-10-23', '09:15:00', 'hello', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 11:19:44', '2019-10-23 09:15:00', NULL),
(929, '9028600116', '2019-10-01', '08:30:00', 'GOOD MORNING', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 11:20:23', '2019-10-01 08:30:00', NULL),
(930, '9028600116', '2019-10-02', '08:40:00', 'GOOD DAY', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 11:20:52', '2019-10-02 08:40:00', NULL),
(931, '9028600116', '2019-10-03', '08:35:00', 'GOOD MORNING', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 11:21:15', '2019-10-03 08:35:00', NULL),
(932, '9028600116', '2019-10-04', '08:50:00', 'GOOD MORNING', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 11:21:47', '2019-10-04 08:50:00', NULL),
(933, '9028600116', '2019-10-05', '09:25:00', 'GOOD MORNING', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 11:22:14', '2019-10-05 09:25:00', NULL),
(934, '9028600116', '2019-10-05', '05:40:00', 'OKAY', 'finnovaadvisory', '4', 1, NULL, '2019-09-18 11:25:28', '2019-10-05 05:40:00', NULL),
(935, '9028600116', '2019-09-27', '08:12:00', 'TESTING', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 06:01:37', '2019-09-27 08:12:00', NULL),
(936, '9028600116', '2019-09-25', '17:10:00', 'TESTING', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 06:02:10', '2019-09-25 17:10:00', NULL),
(937, '9028600116', '2019-09-28', '08:10:00', 'TESTING', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 06:02:34', '2019-09-28 08:10:00', NULL),
(938, '9028600116', '2019-10-07', '10:15:00', 'TESTING', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 06:03:20', '2019-10-07 10:15:00', NULL),
(939, '9028600116', '2019-10-10', '08:45:00', 'TESTING', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 06:03:45', '2019-10-10 08:45:00', NULL),
(940, '9028600116', '2019-10-24', '10:10:00', 'TESTING', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 06:04:08', '2019-10-24 10:10:00', NULL),
(941, '9028600116', '2019-09-20', '08:40:00', 'TESTING', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 06:04:34', '2019-09-20 08:40:00', NULL),
(942, '9028600116', '2019-09-21', '10:10:00', 'TESTING', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 06:04:55', '2019-09-21 10:10:00', NULL),
(943, '9028600116', '2019-09-22', '11:25:00', 'TESTING', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 06:05:21', '2019-09-22 11:25:00', NULL),
(944, '9028600116', '2019-09-23', '10:10:00', 'TESTING', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 07:48:24', '2019-09-23 10:10:00', NULL),
(945, '9028600116', '2019-09-26', '06:45:00', 'TESTING', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 07:49:08', '2019-09-26 06:45:00', NULL),
(946, '9028600116', '2019-09-26', '10:15:00', 'TESTING', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 07:49:43', '2019-09-26 10:15:00', NULL),
(947, '9028600116', '2019-09-27', '11:20:00', '9028600116', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 07:50:02', '2019-09-27 11:20:00', NULL),
(948, '9028600116', '2019-09-29', '05:30:00', 'TESTING', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 07:51:32', '2019-09-29 05:30:00', NULL),
(949, '9028600116', '2019-09-29', '10:20:00', 'TESTING !!!', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 07:52:01', '2019-09-29 10:20:00', NULL),
(950, '9028600116', '2019-09-29', '10:20:00', 'GOOD MORNING', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 07:56:27', '2019-09-29 10:20:00', NULL),
(951, '9028600116', '2019-09-29', '05:15:00', '9028600116', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 08:01:28', '2019-09-29 05:15:00', NULL),
(952, '9028600116', '2019-09-19', '15:15:00', '9028600116', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 08:02:13', '2019-09-19 15:15:00', NULL),
(953, '9028600116', '2019-09-19', '16:15:00', '9028600116', 'finnovaadvisory', '4', 1, NULL, '2019-09-19 08:09:43', '2019-09-19 16:15:00', NULL),
(954, '9607635635', '2019-11-27', '11:30:00', 'call to Mr. Azad - Northern Electric Cables Private Limited - ', 'finnovaadvisory', '4', 1, NULL, '2019-11-26 09:37:27', '2019-11-27 11:30:00', NULL),
(955, '9607635635', '2019-11-27', '11:30:00', 'call to Mr. Amit - 7314077763 - Nilshikhaa Projects Limited\n', 'finnovaadvisory', '4', 1, NULL, '2019-11-26 09:59:37', '2019-11-27 11:30:00', NULL),
(956, '9607635635', '2019-11-29', '11:00:00', 'call Nandre - 9881543714, 070-571-46333', 'finnovaadvisory', '4', 1, NULL, '2019-11-26 10:04:39', '2019-11-29 11:00:00', NULL),
(957, '9607635635', '2019-11-27', '10:30:00', 'call to Bashko Engineering Private Limited - 08806555581\n', 'finnovaadvisory', '4', 1, NULL, '2019-11-26 10:14:01', '2019-11-27 10:30:00', NULL),
(958, '9607635635', '2019-11-27', '12:40:00', 'Crescon Projects And Services Private Limited - Shreevijay will available after some time', 'finnovaadvisory', '4', 1, NULL, '2019-11-27 06:37:15', '2019-11-27 12:40:00', NULL),
(959, '9607635635', '2019-11-27', '12:45:00', 'Maps Granito Private Limited -  after some time', 'finnovaadvisory', '4', 1, NULL, '2019-11-27 06:59:52', '2019-11-27 12:45:00', NULL),
(960, '9607635635', '2019-11-27', '12:55:00', 'Air Flow Equipments (India) Private Limited -  after some time', 'finnovaadvisory', '4', 1, NULL, '2019-11-27 07:01:48', '2019-11-27 12:55:00', NULL),
(961, '9607635635', '2019-11-27', '14:10:00', 'Purna S. S. K. Limited -  after some time', 'finnovaadvisory', '4', 1, NULL, '2019-11-27 07:14:11', '2019-11-27 14:10:00', NULL),
(962, '9607635635', '2019-11-28', '11:00:00', 'Scon Projects Private Limited -  call tomorrow 11.00', 'finnovaadvisory', '4', 1, NULL, '2019-11-27 08:54:22', '2019-11-28 11:00:00', NULL),
(963, '9607635635', '2019-11-29', '11:00:00', 'Purna S. S. K. Limited -  call 11.00', 'finnovaadvisory', '4', 1, NULL, '2019-11-27 08:58:53', '2019-11-29 11:00:00', NULL),
(964, '9607635635', '2019-11-28', '11:00:00', 'QRS Retail Limited -  call 11.00', 'finnovaadvisory', '4', 1, NULL, '2019-11-27 09:20:30', '2019-11-28 11:00:00', NULL),
(965, '9607635635', '2019-11-28', '11:30:00', 'Patna Iron Private Limited -  call 11.00', 'finnovaadvisory', '4', 1, NULL, '2019-11-27 09:44:34', '2019-11-28 11:30:00', NULL),
(966, '9607635635', '2019-11-28', '10:30:00', 'Jankalyan Shiksha Vikas Sewa Samiti -  call ', 'finnovaadvisory', '4', 1, NULL, '2019-11-27 10:42:50', '2019-11-28 10:30:00', NULL),
(967, '9607635635', '2019-11-28', '11:25:00', 'Parvati Sweetners and Power Limited', 'finnovaadvisory', '4', 1, NULL, '2019-11-27 10:50:06', '2019-11-28 11:25:00', NULL),
(968, '9607635635', '2019-12-02', '11:00:00', 'Patna Iron Private Limited Rishav - 7782858408', 'finnovaadvisory', '4', 1, NULL, '2019-11-28 06:05:49', '2019-12-02 11:00:00', NULL),
(969, '9607635635', '2019-12-04', '11:05:00', 'VIRENDRA TRADING CO LIMITED', 'finnovaadvisory', '4', 1, NULL, '2019-12-03 10:35:25', '2019-12-04 11:05:00', NULL),
(970, '9607635635', '2019-12-04', '11:05:00', 'USHA CONSTRUCTIONS\n', 'finnovaadvisory', '4', 1, NULL, '2019-12-03 10:39:19', '2019-12-04 11:05:00', NULL),
(971, '9607635635', '2019-12-04', '11:05:00', 'SUNPOWER METALICS PRIVATE LIMITED\n', 'finnovaadvisory', '4', 1, NULL, '2019-12-03 10:49:43', '2019-12-04 11:05:00', NULL),
(972, '9607635635', '2019-12-04', '01:05:00', 'SAI RADHA PHARMA INDIA PRIVATE LIMITED', 'finnovaadvisory', '4', 1, NULL, '2019-12-03 11:11:11', '2019-12-04 01:05:00', NULL),
(973, '9607635635', '2020-07-01', '10:05:00', 'COMMERCIAL SYN BAGS LIMITED', 'finnovaadvisory', '4', 1, NULL, '2019-12-03 11:33:28', '2020-07-01 10:05:00', NULL),
(974, '9545841613', '2019-12-04', '11:00:00', 'Call to Mr.Satpal Nalawade (Samruddhi Industries), regarding credit rating, he will connect with concern person so call @11.00 am', 'finnovaadvisory', '4', 1, NULL, '2019-12-04 04:51:36', '2019-12-04 11:00:00', NULL),
(975, '9607635635', '2019-12-06', '11:00:00', 'Precision Power Products (India) Private Limited', 'finnovaadvisory', '4', 1, NULL, '2019-12-05 08:32:37', '2019-12-06 11:00:00', NULL),
(976, '9607635635', '2019-12-07', '11:00:00', 'Shri Dnyaneshwar Sahakari Sakhar Karkhana Ltd\n', 'finnovaadvisory', '4', 1, NULL, '2019-12-05 12:11:41', '2019-12-07 11:00:00', NULL),
(977, '9607635635', '2019-12-09', '11:00:00', 'Shri Dnyaneshwar Sahakari Sakhar Karkhana Limited\n', 'finnovaadvisory', '4', 1, NULL, '2019-12-07 05:56:31', '2019-12-09 11:00:00', NULL),
(978, '9962646830', '2023-03-18', '15:15:00', 'test', 'finnovaadvisory', '4', 1, NULL, '2019-12-13 13:21:07', '2023-03-18 15:15:00', NULL),
(979, '9962646830', '2023-03-18', '15:15:00', 'test', 'finnovaadvisory', '4', 1, NULL, '2019-12-13 13:26:21', '2023-03-18 15:15:00', NULL),
(980, '9962646830', '2020-03-18', '15:15:00', 'test', 'finnovaadvisory', '4', 1, NULL, '2019-12-13 13:26:43', '2020-03-18 15:15:00', NULL),
(981, '9962646830', '2020-12-15', '15:15:00', 'test', 'finnovaadvisory', '4', 1, NULL, '2019-12-13 13:27:40', '2020-12-15 15:15:00', NULL),
(982, '9962646830', '2020-12-15', '15:15:00', 'test', 'finnovaadvisory', '4', 1, NULL, '2019-12-13 13:28:14', '2020-12-15 15:15:00', NULL),
(983, '9962646830', '2020-12-15', '15:15:00', 'test', 'finnovaadvisory', '4', 1, NULL, '2019-12-13 13:28:37', '2020-12-15 15:15:00', NULL),
(984, '9545841613', '2019-12-17', '11:00:00', ' Dainamic engineers call tomorrow @11 am ', 'finnovaadvisory', '4', 1, NULL, '2019-12-16 12:10:16', '2019-12-17 11:00:00', NULL),
(985, '1234567890', '2020-02-01', '09:49:00', 'please !!! Edited...', '', '4', 1, 1, '2019-12-26 06:18:53', '2020-02-01 09:49:00', '2019-12-26 06:19:18'),
(986, '1234567890', '2019-12-31', '21:05:00', '1234567890\r\nqwerty', '', '1', 0, 1, '2019-12-31 13:20:22', '2019-12-31 21:05:00', NULL),
(987, '2436575454', '2019-12-31', '22:52:00', 'PLEASE IGNORE THIS ONE..!!', '', '1', 0, 1, '2019-12-31 13:34:12', '2019-12-31 22:52:00', '2020-01-01 08:17:31'),
(988, '1234567890', '2020-01-14', '21:45:00', '12345678901234567890', '', '1', 0, 0, '2020-01-14 04:53:43', '2020-01-14 21:45:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subdomain_entry`
--

DROP TABLE IF EXISTS `subdomain_entry`;
CREATE TABLE IF NOT EXISTS `subdomain_entry` (
  `subdomain_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `subdomainName` varchar(200) NOT NULL,
  `space` int(100) NOT NULL,
  `remaningspace` int(100) NOT NULL,
  PRIMARY KEY (`subdomain_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
CREATE TABLE IF NOT EXISTS `subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ENTITY` (`entity_id`,`entity_type`),
  KEY `IDX_USER_ID` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=152578 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_folder_master`
--

DROP TABLE IF EXISTS `sub_folder_master`;
CREATE TABLE IF NOT EXISTS `sub_folder_master` (
  `prefix` varchar(50) NOT NULL DEFAULT 'SFM',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folder_master_id` int(11) DEFAULT NULL,
  `folder_name` varchar(50) DEFAULT NULL,
  `created_user_id` varchar(50) DEFAULT NULL,
  `assigned_user_id` varchar(50) DEFAULT NULL,
  `defineAccess` varchar(50) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_folder_master_3`
--

DROP TABLE IF EXISTS `sub_folder_master_3`;
CREATE TABLE IF NOT EXISTS `sub_folder_master_3` (
  `prefix` varchar(50) NOT NULL DEFAULT 'SFM',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folder_master_id` int(11) DEFAULT NULL,
  `folder_name` varchar(50) DEFAULT NULL,
  `created_user_id` varchar(50) DEFAULT NULL,
  `assigned_user_id` varchar(50) DEFAULT NULL,
  `defineAccess` varchar(50) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_folder_master_old`
--

DROP TABLE IF EXISTS `sub_folder_master_old`;
CREATE TABLE IF NOT EXISTS `sub_folder_master_old` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folder_master_id` int(11) DEFAULT NULL,
  `folder_name` varchar(50) DEFAULT NULL,
  `created_user_id` varchar(50) DEFAULT NULL,
  `assigned_user_id` varchar(50) DEFAULT NULL,
  `defineAccess` varchar(50) DEFAULT NULL,
  `createdAt` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

DROP TABLE IF EXISTS `target`;
CREATE TABLE IF NOT EXISTS `target` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `salutation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `do_not_call` tinyint(1) NOT NULL DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_FIRST_NAME` (`first_name`,`deleted`),
  KEY `IDX_NAME` (`first_name`,`last_name`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `target_list`
--

DROP TABLE IF EXISTS `target_list`;
CREATE TABLE IF NOT EXISTS `target_list` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `campaigns_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_CAMPAIGNS` (`campaigns_id`),
  KEY `IDX_CREATED_AT` (`created_at`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `target_list_user`
--

DROP TABLE IF EXISTS `target_list_user`;
CREATE TABLE IF NOT EXISTS `target_list_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_list_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `opted_out` tinyint(1) DEFAULT 0,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_FCE97B8CA76ED395F6C6AFE0` (`user_id`,`target_list_id`),
  KEY `IDX_FCE97B8CA76ED395` (`user_id`),
  KEY `IDX_FCE97B8CF6C6AFE0` (`target_list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Open',
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Normal',
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `date_start_date` date DEFAULT NULL,
  `date_end_date` date DEFAULT NULL,
  `date_completed` datetime DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_recurring_series_of_tasks` tinyint(1) NOT NULL DEFAULT 0,
  `frequency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Daily',
  `repeat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Every day',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `weeklyrepeat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Every week',
  `weeklyrepeat_on` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Monday',
  `weeklystart_date` date DEFAULT NULL,
  `weeklyend_date` date DEFAULT NULL,
  `monthly_repeat_on` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `monthly_start_date` date DEFAULT NULL,
  `monthly_end_date` date DEFAULT NULL,
  `monthly_repeat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Every Month',
  `number_of_recurring_tasks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `custom_start_date1` date DEFAULT NULL,
  `custom_start_date2` date DEFAULT NULL,
  `custom_start_date3` date DEFAULT NULL,
  `custom_start_date4` date DEFAULT NULL,
  `custom_start_date5` date DEFAULT NULL,
  `custom_start_date6` date DEFAULT NULL,
  `completed_at` date DEFAULT NULL,
  `closed_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_PARENT` (`parent_id`,`parent_type`),
  KEY `IDX_ACCOUNT_ID` (`account_id`),
  KEY `IDX_CONTACT_ID` (`contact_id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_DATE_START_STATUS` (`date_start`,`status`),
  KEY `IDX_DATE_END_STATUS` (`date_end`,`status`),
  KEY `IDX_DATE_START` (`date_start`,`deleted`),
  KEY `IDX_STATUS` (`status`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`),
  KEY `IDX_ASSIGNED_USER_STATUS` (`assigned_user_id`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(250) NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(250) NOT NULL,
  `PostalCode` varchar(30) NOT NULL,
  `Country` varchar(100) NOT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `position_list` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `deleted`, `position_list`, `created_at`) VALUES
('5b7ab9a88c447b79f', 'Data Megha', 0, '[]', '2018-08-20 12:52:56'),
('5b7ab9bd1fbe0d631', 'Data Aarti', 0, '[]', '2018-08-20 12:53:17'),
('5b7b9e9e1db79d5c8', 'Shweta', 0, '[]', '2018-08-21 05:09:50'),
('5b908e2913e10aec2', 'Dhanashree', 0, '[]', '2018-09-06 02:17:13'),
('5c237fed7c973b3ae', 'Marketing', 0, '[]', '2018-12-26 13:19:41'),
('5ccd4ca3d283ce192', 'Espo CRM Team', 0, '[]', '2019-05-04 08:26:11'),
('5d2acf8b50bd7bde1', 'FINCRM', 0, '[]', '2019-07-14 06:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

DROP TABLE IF EXISTS `team_user`;
CREATE TABLE IF NOT EXISTS `team_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_5C722232296CD8AEA76ED395` (`team_id`,`user_id`),
  KEY `IDX_5C722232296CD8AE` (`team_id`),
  KEY `IDX_5C722232A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_user`
--

INSERT INTO `team_user` (`id`, `team_id`, `user_id`, `role`, `deleted`) VALUES
(1, '5b72404fb95622456', '5b7240bb356fff8e2', NULL, 0),
(2, '5b7240095b75a5280', '5b7240bb356fff8e2', NULL, 0),
(3, '5b724024b2ecf8846', '5b7240bb356fff8e2', NULL, 0),
(4, '5b72404412887d719', '5b7240bb356fff8e2', NULL, 0),
(5, '5b724034cbcb30722', '5b7240bb356fff8e2', NULL, 0),
(6, '5b72404fb95622456', '5b79ba9bbc6db9b5f', NULL, 0),
(7, '5b7240095b75a5280', '5b79ba9bbc6db9b5f', NULL, 0),
(8, '5b724024b2ecf8846', '5b79ba9bbc6db9b5f', NULL, 0),
(9, '5b72404412887d719', '5b79ba9bbc6db9b5f', NULL, 0),
(14, '5b7b9e9e1db79d5c8', '5b79ba9bbc6db9b5f', NULL, 0),
(15, '5c237fed7c973b3ae', '5be182d5abb2e4d9f', NULL, 0),
(16, '5c237fed7c973b3ae', '5c079088802310989', NULL, 0),
(17, '5c237fed7c973b3ae', '5c0a135e34a3906de', NULL, 0),
(18, '5ccd4ca3d283ce192', '5cac2802588fb3189', NULL, 0),
(19, '5ccd4ca3d283ce192', '5cac26e8b22bf9a5a', NULL, 0),
(20, '5ccd4ca3d283ce192', '5bcab4cdd3e28fcb1', NULL, 1),
(21, '5ccd4ca3d283ce192', '5d08dda3b8d4918e2', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

DROP TABLE IF EXISTS `template`;
CREATE TABLE IF NOT EXISTS `template` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `body` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left_margin` double DEFAULT 10,
  `right_margin` double DEFAULT 10,
  `top_margin` double DEFAULT 10,
  `bottom_margin` double DEFAULT 25,
  `print_footer` tinyint(1) NOT NULL DEFAULT 0,
  `footer_position` double DEFAULT 15,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `page_orientation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Portrait',
  `page_format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'A4',
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `createdAt1` timestamp NOT NULL DEFAULT current_timestamp(),
  `createdAt2` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test15th_march`
--

DROP TABLE IF EXISTS `test15th_march`;
CREATE TABLE IF NOT EXISTS `test15th_march` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `rating_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test18_7_19_new`
--

DROP TABLE IF EXISTS `test18_7_19_new`;
CREATE TABLE IF NOT EXISTS `test18_7_19_new` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test28_march`
--

DROP TABLE IF EXISTS `test28_march`;
CREATE TABLE IF NOT EXISTS `test28_march` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testinfofdeleteentity`
--

DROP TABLE IF EXISTS `testinfofdeleteentity`;
CREATE TABLE IF NOT EXISTS `testinfofdeleteentity` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

DROP TABLE IF EXISTS `testing`;
CREATE TABLE IF NOT EXISTS `testing` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testing9th_may`
--

DROP TABLE IF EXISTS `testing9th_may`;
CREATE TABLE IF NOT EXISTS `testing9th_may` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testing_entity_demo`
--

DROP TABLE IF EXISTS `testing_entity_demo`;
CREATE TABLE IF NOT EXISTS `testing_entity_demo` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testing_for_removeentity`
--

DROP TABLE IF EXISTS `testing_for_removeentity`;
CREATE TABLE IF NOT EXISTS `testing_for_removeentity` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_29_07_19`
--

DROP TABLE IF EXISTS `test_29_07_19`;
CREATE TABLE IF NOT EXISTS `test_29_07_19` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_demo`
--

DROP TABLE IF EXISTS `test_demo`;
CREATE TABLE IF NOT EXISTS `test_demo` (
  `city` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_demo_29_07`
--

DROP TABLE IF EXISTS `test_demo_29_07`;
CREATE TABLE IF NOT EXISTS `test_demo_29_07` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_entity_18_07_19`
--

DROP TABLE IF EXISTS `test_entity_18_07_19`;
CREATE TABLE IF NOT EXISTS `test_entity_18_07_19` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test__entity_18_07_19`
--

DROP TABLE IF EXISTS `test__entity_18_07_19`;
CREATE TABLE IF NOT EXISTS `test__entity_18_07_19` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_e_s_t_24_07_19`
--

DROP TABLE IF EXISTS `t_e_s_t_24_07_19`;
CREATE TABLE IF NOT EXISTS `t_e_s_t_24_07_19` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `stream` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_e_s_t_i_n_g__d_e_m_o`
--

DROP TABLE IF EXISTS `t_e_s_t_i_n_g__d_e_m_o`;
CREATE TABLE IF NOT EXISTS `t_e_s_t_i_n_g__d_e_m_o` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unique_id`
--

DROP TABLE IF EXISTS `unique_id`;
CREATE TABLE IF NOT EXISTS `unique_id` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `data` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `terminate_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_NAME` (`name`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_TARGET` (`target_id`,`target_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salutation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_portal_user` tinyint(1) NOT NULL DEFAULT 0,
  `is_super_admin` tinyint(1) NOT NULL DEFAULT 0,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `default_team_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pancardno` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadharno` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employeeid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bloodgroup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Not Set',
  `bankname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsccode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_location_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_parent_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DEFAULT_TEAM_ID` (`default_team_id`),
  KEY `IDX_CONTACT_ID` (`contact_id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_OFFICE_LOCATION_ID` (`office_location_id`),
  KEY `IDX_USER_PARENT_ID` (`user_parent_id`),
  KEY `IDX_DESIGNATION_ID` (`designation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `deleted`, `is_admin`, `user_name`, `password`, `salutation_name`, `first_name`, `last_name`, `is_active`, `is_portal_user`, `is_super_admin`, `title`, `gender`, `created_at`, `default_team_id`, `contact_id`, `avatar_id`, `created_by_id`, `designation`, `pancardno`, `aadharno`, `fathername`, `spouse`, `employeeid`, `bloodgroup`, `bankname`, `branch`, `accountno`, `ifsccode`, `office_location_id`, `user_parent_id`, `designation_id`) VALUES
('1', 0, 1, 'admin', 'PlQ/ovMmNIHKzzKszWxdgE6GkMvTq5nB9YJ1YslbmCLXLc9PWK/jf7rDhnJEFeDdbK7BC/n.yBEs5tJEvLjyQ.', '', '', 'Admin', 1, 0, 0, '', '', '2018-08-13 08:53:23', NULL, NULL, '5d2ad2c764eca7aa8', 'system', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, '5b79b7bc6b5cfe0c0', '5d773a92c4f798f74'),
('5b79b7bc6b5cfe0c0', 0, 0, 'anil', 'eBorPdcFnJQmwFTa0Vu74p5MzOO47po3o75kRUxZmDeFhOMli.1mQwVqcWC/WS04rlPlUJUkXXh6L1a9GswNQ1', 'Mr.', 'Anil', 'Agarwal', 1, 0, 0, '', 'Male', '2018-08-19 18:32:28', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, NULL, '5d773aada7cc8b58b'),
('5b79ba9bbc6db9b5f', 0, 0, 'shweta', 'rUUswC1JjwOPwl3FeupZS4tnuyczzLCKuVU7VlrcqUBvZAbHTey391RO8CgUMXhDu9qbRNRi4I/n5A0/6drqF1', 'Mrs.', 'Shweta', 'Shrivastava', 1, 0, 0, '', 'Female', '2018-08-19 18:44:43', '5b7b9e9e1db79d5c8', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5b920351626303658', 1, 0, 'prashant', 'FfvN4GIlvbDOepiawc2o7d5jwMA3nF/H8U58oisjT9tVgoeErJUOwgeSzyOkI1rxb0d9c4KD2fzznGOiFVOq6.', '', 'Prashant', 'Gautam', 1, 0, 0, '', 'Male', '2018-09-07 04:49:21', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5bcab4cdd3e28fcb1', 0, 0, 'gaikwad', 'cx5IpTXIO3l9kevgjnLNQgf2oCEYumyQP6a98X57K9zCfv2wLSJbx4IYD.1Xa40hLo1tyzZF8lqJHgBK.2BZY/', 'Mr.', 'Achyut', 'Gaikwad', 1, 0, 0, '', 'Male', '2018-10-20 04:53:33', '5d2acf8b50bd7bde1', NULL, '5d77473cc8584fd6d', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, '5c0d4bf192a286f99', '5d773a758799dedbb'),
('5be182d5abb2e4d9f', 0, 0, 'jayshree', '93J7FMKlAvr16GkxCX5QtXQyD5XnNsyqrP1czAY6Ij4.hxScy1HQE1p4YufKuDanwg1hXHqcyRdLNasq.czB5/', 'Ms.', 'Jayshree', 'Wangikar', 1, 0, 0, '', 'Female', '2018-11-06 12:02:29', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, '1', '5d773a758799dedbb'),
('5c079088802310989', 0, 0, 'rekha', 'r4p6zV45.99jRqNBe6pFdIEIhSp/OWb.FcydZtTXB9TEpr5K9phkEfIU5JAM1Hg4SqDzhfxwPx2sA6haaXc7p.', 'Mrs.', 'Rekha', 'Singh', 1, 0, 0, '', 'Female', '2018-12-05 08:47:04', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, '1', '5d773a758799dedbb'),
('5c0d4bf192a286f99', 0, 1, 'ayush', 'bAcTXgkuWONzFvhfubN/6No5CF/P2lxvZqvy1xpD/AoFnWmYJ2KmLFiDS7u652AACazglpslp8098rFO2E5LD/', 'Mr.', 'Ayush', 'Agarwal', 1, 0, 0, 'Mr', 'Male', '2018-12-09 17:08:01', '5d2acf8b50bd7bde1', NULL, '5d15a4fa50d3bb0a0', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, '5b79b7bc6b5cfe0c0', '5d773a92c4f798f74'),
('5cac26e8b22bf9a5a', 0, 0, 'vrushali', 'IP6/lJ1m9aKDTzdSNKKxSFx2iTVrHHE40utLdfw1tPnDcXUqgObnH9SORwv0xKS4jxJkIBgF4zHYbmU2AnKz//', 'Ms.', 'Vrushali', 'Mande', 1, 0, 0, '', 'Female', '2019-04-09 05:00:24', '5d2acf8b50bd7bde1', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, '5d0c73a5ad4e88a90', '5d773a758799dedbb'),
('5cb6e0c198606c16b', 1, 0, 'naveen', '4ChC9mdGsz1PjnKEszRXg1T59zGTnD7YIHrMFCIunS2z6E2v32IlqLicueKXVMcqUkMX8UnhKFt5k241JgFHB0', 'Mr.', 'NAVIN', 'CHOUDHARY', 1, 0, 0, '', 'Male', '2019-04-17 08:16:01', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5d087bae8d4257b0d', 0, 0, 'testportal', 'nBTqcY64HVbHc.nbZPgyh5V/tkNB5smi.VzZmRCASy2qj8uLpPD/zOzqK4GBr5FFzdTrt4BSzgUSixNP8jfIY1', 'Mr.', 'Vaibhav', 'B', 1, 1, 0, NULL, '', '2019-06-18 05:50:38', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5d087fdb31801f733', 0, 0, 'account1', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Nilesh', 'Behede', 1, 1, 0, NULL, '', '2019-06-18 06:08:27', NULL, '5ba0edcd36b9cf258', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5d0881fcdf144b4b9', 0, 0, 'account2', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', '', 'Anil', 'DesaiBavdhan Pune', 1, 1, 0, NULL, '', '2019-06-18 06:17:32', NULL, '5b90ed5407930def3', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5d08dda3b8d4918e2', 1, 0, 'vaibhav', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Vaibhav', 'Bhosale', 1, 0, 0, '', 'Male', '2019-06-18 12:48:35', '5d2acf8b50bd7bde1', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, '5c0d4bf192a286f99', '5d773a758799dedbb'),
('5d09cb27a66f90a7f', 0, 0, 'account3', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'virat', 'saxena', 1, 1, 0, NULL, '', '2019-06-19 05:41:59', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d0c73a5ad4e88a90', 0, 1, 'mayank', 'iIw730NLOcznLHvz5lYRAX5.90IQw6uORf6QsstNNV/46xeuDwA.pStIzuzWitLs.1/HpqShwh.1DojTUqnCN0', 'Mr.', 'Mayank', 'Agarwal', 1, 0, 0, '', 'Male', '2019-06-21 06:05:25', NULL, NULL, NULL, '1', '', '', '', '', '', '', 'Not Set', '', '', '', '', NULL, '5b79b7bc6b5cfe0c0', '5d773a92c4f798f74'),
('5d15a5a8b81983f0a', 0, 0, 'useraqua', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'user', 'aqua', 1, 1, 0, NULL, '', '2019-06-28 05:29:12', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5d416e72d5b9b4d53', 0, 0, 'aquatech', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Kiran', 'Patil', 1, 1, 0, NULL, '', '2019-07-31 10:33:22', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5d4bdda8da8ca8e60', 1, 0, 'testuser', 'o1uLWP42Jk6N5ioYWPmD/oDZBE9r9MPvKZwTAsekAeVJwaobdIawZV9sgBfS5WonMSu.BxGQPyEysjCViUIj6/', 'Mr.', 'Test', 'User', 1, 0, 0, '', '', '2019-08-08 08:30:32', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5d4d1a2c8d2cf92bb', 0, 0, 'raja', 'dHYKY/allB6hj.IrGG/5lkVILBTXD56YLwX2hL9ajvSSMTCPU7950jtqYueoyhcWayN9kYJ2Kv0JbhIfZlFkz0', 'Mr.', 'Achyut', 'Gaikwad', 1, 1, 0, NULL, 'Male', '2019-08-09 07:01:00', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5d5a89d1823abacdb', 0, 0, 'uuayush@gmail.com', 'bAcTXgkuWONzFvhfubN/6No5CF/P2lxvZqvy1xpD/AoFnWmYJ2KmLFiDS7u652AACazglpslp8098rFO2E5LD/', 'Mr.', 'Ayush', 'Agarwal', 1, 1, 0, NULL, '', '2019-08-19 11:36:49', NULL, '5d25818b38fa12ba3', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5d5bbf3e485133a7f', 0, 0, 'abcd', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'RAJA', 'Jadhav', 1, 1, 0, NULL, '', '2019-08-20 09:37:02', NULL, NULL, NULL, '1', '', '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d5bd07d93b6fe540', 0, 0, 'ayushtest', 'bAcTXgkuWONzFvhfubN/6No5CF/P2lxvZqvy1xpD/AoFnWmYJ2KmLFiDS7u652AACazglpslp8098rFO2E5LD/', 'Mr.', 'Ayush', 'Agarwal', 1, 1, 0, NULL, '', '2019-08-20 10:50:37', NULL, NULL, NULL, '1', '', '', '', 'Mahendra Agarwal', '', '', 'AB+', '', '', '', '', NULL, NULL, NULL),
('5d7878054527ed2c4', 0, 0, 'vijaya', '.P6j7KRGyNDf194H1tkCh82AP28.a.y02/od7RbyyyzXfbIH4lBe33e9gTs8iE.9YG3pkNd1CCLeqlBoPLhQD/', 'Mrs.', 'VIJAYA', 'Singh', 1, 0, 0, NULL, 'Female', '2019-09-11 04:28:53', NULL, NULL, NULL, '1', NULL, '', '123412358796', 'ABCD', 'GOPAL', 'ABCD', 'B+', 'SBI', 'PUNE', '123456', 'SBI00542', '5d60f3ed4fa0b5176', '5b79b7bc6b5cfe0c0', '5d773a92c4f798f74'),
('5d787de2b1a668e9a', 0, 0, 'usertest', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Fluent', 'India', 1, 1, 0, NULL, 'Male', '2019-09-11 04:53:54', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'EMP-2000', 'Not Set', '', '', '', '', NULL, NULL, '5d773a758799dedbb'),
('5d7884d864d29d25c', 0, 1, 'nagesh', '7e2JSmXy34zYStNOxCzAI0Pji5LFQQmFYpjDAZ25S2ShJedGVXR.VhpHIjtSEvy4RBAEJU.uQGNnL4Rf35mxh1', 'Mr.', 'NAGESH', 'PATIL', 1, 0, 0, NULL, 'Male', '2019-09-11 05:23:36', '5b7ab9bd1fbe0d631', NULL, NULL, '1', NULL, '', '123456789123', 'AKKD', 'RADHA', 'DKDKD', 'O+', 'SBI', 'PUNE', '145623987', 'SBI4562', '5d60f3ed4fa0b5176', '5b79b7bc6b5cfe0c0', '5d773a92c4f798f74'),
('5d7888f5818188028', 0, 0, 'lakhan', 'd9JLH6NaTLAjzT.dNYIbl9jO8r2Sf038sQxThs/zlGELsLYSEA7zAM.wHOSzuSfFw4XSKPKOF7QLiCx9vQlPZ0', 'Mr.', 'LAKHAN', 'GHOSH', 1, 0, 0, NULL, 'Male', '2019-09-11 05:41:09', '5b908e2913e10aec2', NULL, NULL, '1', NULL, '', '456123789123', 'kdksl', 'MEDHA', 'SKSK', 'B-', 'SBI', 'PUNE', '123045', 'SBI0052', '5d60f3ed4fa0b5176', '5b79b7bc6b5cfe0c0', '5d773a92c4f798f74'),
('5d788a225fb36bb5c', 0, 0, 'amol', 'd9JLH6NaTLAjzT.dNYIbl9jO8r2Sf038sQxThs/zlGELsLYSEA7zAM.wHOSzuSfFw4XSKPKOF7QLiCx9vQlPZ0', 'Mr.', 'AMOL', 'PATIL', 1, 0, 0, NULL, 'Male', '2019-09-11 05:46:10', '5b7ab9bd1fbe0d631', NULL, NULL, '1', NULL, '', '013456782123', 'KISHOR', 'PREMA', 'DKSL', 'O-', 'SBI', 'PUNE', '456213', 'SBI1234', '5d60f3ed4fa0b5176', '5b79b7bc6b5cfe0c0', '5d773a92c4f798f74'),
('5d788bf638a229a47', 0, 0, 'prakash', 'bhvvU6BoHSp7vIX2Xo83FYh4YgsxO.JnV10HFHU0cqE1bCQLxlRZ5GyS5/TSrt8QNl.1CmaTAIwxy/FJpGakT1', 'Mr.', 'PRAKASH', 'PATIL', 1, 0, 0, NULL, 'Male', '2019-09-11 05:53:58', '5ccd4ca3d283ce192', NULL, NULL, '1', NULL, '', '456123789125', 'PRABHA', 'RINKU', 'DKSL', 'O-', 'SBI', 'PUNE', '45628', 'SBI4568', '5d60f3ed4fa0b5176', '5b79b7bc6b5cfe0c0', '5d773a92c4f798f74'),
('5d788fdde58c4e79d', 0, 0, 'uber', 'KtKECnHU5IPe.8iQfQ9LrMWMIBnmxCvkanN1KC75iOhbkBVAhShEmRkS6nFw6o137iL7uemrDNR83Yc8mLGh51', 'Mr.', 'UBER', 'SINGH', 1, 0, 0, NULL, 'Male', '2019-09-11 06:10:37', '5b908e2913e10aec2', NULL, NULL, '1', NULL, '', '789456456123', 'RAMA', 'KISHORI', 'DKSL', 'A+', 'IDBI', 'PUNE', '0112233', 'IDBI011', '5d60f3ed4fa0b5176', '5b79b7bc6b5cfe0c0', '5d773a92c4f798f74'),
('5d789463a794eb4c2', 0, 0, 'ramesh', 'k1GOs0BGIdwVeBuAShEFKsOuJom5wBtu1YZIe.6kXmULgTWhzybsi4WfGageMzLcSkYU/BnpOCi8BPFVa8jwk1', 'Mr.', 'RAMESH', 'AGARWAL', 1, 0, 0, NULL, 'Male', '2019-09-11 06:29:55', '5ccd4ca3d283ce192', NULL, NULL, '1', NULL, '', '456123789456', 'RAM', 'RUPA', 'DKSL', 'AB-', 'AXIS', 'PUNE', '002255', 'AXI022', '5d60f3ed4fa0b5176', '5b79b7bc6b5cfe0c0', '5d773a92c4f798f74'),
('5d7894f7061bc9445', 0, 0, 'kishor', 'DJfQGHdsSg2yYICdxXasbwPtR41N5osi6BrKiXg2o.vwWu9B5x6T9iAC93b9/Ztkl/h5abufBHzJ/cCLyGkFg/', 'Mr.', 'KISHOR', 'JAIN', 1, 0, 0, NULL, 'Male', '2019-09-11 06:32:23', '5b7ab9a88c447b79f', NULL, NULL, '1', NULL, '', '963852741963', 'BABAN', 'KISHORI', 'DKSLW', 'AB+', 'UTI', 'PUNE', '753283', 'UT0044', '5d60f3ed4fa0b5176', '5b79b7bc6b5cfe0c0', '5d773a92c4f798f74'),
('5d7895eadfe5d57d6', 0, 0, 'appa', 'RqGe6XeYFhGRftsBAYIML1DcCkui4cZF6Wgj6R5q2G6RGeSFc2aR9R04J6xZPB.3UTVGW0TdB/9qnHo.BRrov.', 'Mr.', 'APPA', 'JADHAV', 1, 0, 0, NULL, 'Male', '2019-09-11 06:36:26', '5ccd4ca3d283ce192', NULL, NULL, '1', NULL, '', '852963741852', 'MADAN', 'SEEMA', 'KDLS', 'O-', 'CBI', 'PUNE', '7898002', 'CB0077', '5d60f3ed4fa0b5176', '5b79b7bc6b5cfe0c0', '5d773a92c4f798f74'),
('5d78a2b4b8d2f7d09', 0, 0, 'vinod', 'vsLPUe01H6FcIiMv0Y7586myw.BDTcHSKSoY7wEmxOBVNGOKei27FYoN6haloGC0cTQjp7rqnOkgoYelsHws0.', 'Mr.', 'VINOD', 'MANE', 1, 0, 0, NULL, 'Male', '2019-09-11 07:31:00', '5b908e2913e10aec2', NULL, NULL, '1', NULL, '', '123456789852', 'GURU', 'GOURI', 'DKSL', 'AB-', 'BOM', 'PUNE', '00558877', 'BO0099', '5d5b6b725fa455a93', '5b79b7bc6b5cfe0c0', '5d773a92c4f798f74'),
('5d78a32e8593a772f', 0, 0, 'ashish', 'uxLLZJEtZKkqgEMbO1XcUduUjfONThPf7N6Q7VbWLJWvZHGHJImSLeF9g853FjlAuZGUvZmVH5XdzqtYhcEhU1', 'Mr.', 'ASHISH', 'KOLE', 1, 0, 0, NULL, 'Male', '2019-09-11 07:33:02', '5ccd4ca3d283ce192', NULL, NULL, '1', NULL, '', '852963741456', 'PRASHANT', 'VIDYA', 'DKSK', 'AB+', 'BOB', 'PUNE', '00442233', 'BO0055', '5d60f3ed4fa0b5176', '5b79b7bc6b5cfe0c0', '5d773a92c4f798f74'),
('5d78a832ebb2249fc', 0, 0, 'sonu', 'JrVlklBzInZMK7rztoDOpqfTrscdwKmrnLR3lobKHShv7GajBA6yNPHf6edJ5N.E8oDWZZKiNkJvz3ljisEPW1', 'Mrs.', 'SONA', 'JOSHI', 1, 0, 0, NULL, 'Female', '2019-09-11 07:54:26', '5d2acf8b50bd7bde1', NULL, NULL, '1', NULL, '', '963741852456', 'PRAKASH', 'PREEMA', 'KDKSL', 'O+', 'COSMOS', 'PUNE', '45247', 'COS452', '5d5b6b725fa455a93', '5b79b7bc6b5cfe0c0', '5d773a92c4f798f74'),
('5d78b2fa3afd81925', 0, 0, 'viraj', 'YUcjq6fqD4SxyQxOdHNd/m2xO1xHYWt/3E9iOEAz8yuRHVxOC350.iCm54rKMgSsqSEFgPdy4VpuhP2ZJxrNx1', 'Mr.', 'VIRAJ', 'JAGTAP', 1, 0, 0, NULL, 'Male', '2019-09-11 08:40:26', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'DKDKS', 'Not Set', '', '', '', '', '5d5b6b725fa455a93', '1', '5d773a758799dedbb'),
('5d78b33b3e037526c', 0, 0, 'vishl', '7T7cURKxNxkJwVgFIzB53BMMvOqwR6tpui3Mixb5apD8Cbq00lpmVeVkXubbRMW7gC3pVWygwEUbZKd0bdPXB.', 'Mr.', 'VISHAL', 'YADAV', 1, 0, 0, NULL, 'Male', '2019-09-11 08:41:31', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'DKSLS', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '1', '5d773a758799dedbb'),
('5d78b3781f83173e5', 0, 0, 'surya', 'lsLAkjTmVFCJfIm6OfuiAfMWdreERLwZlHQA90p5XX9l6oLvtgHW2iBqk95XObEJ9YCngrFsdUdmr3H6MKMxd1', 'Mr.', 'SURYA', 'SWAMI', 1, 0, 0, NULL, 'Male', '2019-09-11 08:42:32', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'DKLW', 'Not Set', '', '', '', '', '5d5b6b725fa455a93', '1', '5d773a758799dedbb'),
('5d78b3c5017b1cb41', 0, 0, 'anandi', '3L4EySE2SqhgzxLF40ZLTN1NNAleRLK5JVTj5qMQ.hKzF8SCNqFgrF247kUj6JCMRmgRHjlyMtPu/GFdbdeoG/', 'Mrs.', 'ANANDI', 'JOSHI', 1, 0, 0, NULL, 'Female', '2019-09-11 08:43:49', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'DKSLW', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '1', '5d773a758799dedbb'),
('5d78b401e3b7458ab', 0, 0, 'tushar', 'OaSvni2tstwH.GpxVTB097763JWK6rnwITWEahJemu3O8T6xARqsw1/NDuTLWXicJDzoRYV9vAHquRM5i/wFW/', 'Mr.', 'TUSHAR', 'JOSHI', 1, 0, 0, NULL, 'Male', '2019-09-11 08:44:49', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'WKEL', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '1', '5d773a758799dedbb'),
('5d78b4404a077989f', 0, 0, 'vailas', 'Q7qW6kKWBvZSu7Gs53mVmZy1eHN33XwP0YUni11LCkyrJ6dGf22AV6rB4Iw8HLYKEFTZ0hHDOL3gJidq3MWgu1', 'Mr.', 'VILAS', 'KULKARNI', 1, 0, 0, NULL, 'Male', '2019-09-11 08:45:52', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'ELWO', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '1', '5d773a758799dedbb'),
('5d78b508d037e7585', 0, 0, 'vidya', 'O5OQJnM2b7jUN3AsxHVxJmi8S2B3RBQOV4zdrb.rHIldSUyICbbsLqRj/glVdaMEUMRX50MVjJ62cDb.GG.d31', 'Mrs.', 'VIDYA', 'NAIK', 1, 0, 0, NULL, 'Female', '2019-09-11 08:49:12', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'EOWIE', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5c0d4bf192a286f99', '5d773a758799dedbb'),
('5d78b541a52d9bab0', 0, 0, 'smita', 'g2D/g7LNfYtqaP54Cn3tMEnLPI3F5rMg2Tdt1FJHF1BaT8.ivcGJ8JIGF4syRPlq5cnkEl2z2EJ.DY622OstN.', 'Mrs.', 'SMITA', 'YOGI', 1, 0, 0, NULL, 'Female', '2019-09-11 08:50:09', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'KELW', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5c0d4bf192a286f99', '5d773a758799dedbb'),
('5d78b581a4e6e3ffd', 0, 0, 'swati', 'K5mMlashYBTir2NCBUyuTBUmp6e3BuLscsGDNpTPQzX3FPH6AXZL0ePTNLw1K7atPsOLersQCmDPtgIld616Z1', 'Mrs.', 'SWATI', 'YADAV', 1, 0, 0, NULL, 'Female', '2019-09-11 08:51:13', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'DKWLE', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5c0d4bf192a286f99', '5d773a758799dedbb'),
('5d78b5d5b1ff35c45', 0, 0, 'yogita', 'CrwQ12AxkiNrV6rS57AMD.kll2U/71ISTTORxtEpq9rWdOMYwA3QP/bSJ9HqQ2tIuMuy/m3L3umACj1bEFlnU/', 'Mrs.', 'YOGITA', 'SWAMI', 1, 0, 0, NULL, 'Female', '2019-09-11 08:52:37', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'DKELW', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5c0d4bf192a286f99', '5d773a758799dedbb'),
('5d78b60e6bbf5e6d1', 0, 0, 'swarja', 'VsCGgV6bGSUgB8Dy.HAoVD0yEmjAhqMex7zQV./AZ0E/Xwd9sKJ6A1wZR7ANO9R81WnrFA4M9HttafTbJHJKB.', 'Mrs.', 'SWARHA', 'TOSHI', 1, 0, 0, NULL, 'Female', '2019-09-11 08:53:34', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'EOWKE', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5c0d4bf192a286f99', '5d773a758799dedbb'),
('5d78b64ceb9467d0a', 0, 0, 'arya', 'THY7c74xEId8h/3HDTfq1g/Epk3pKfE/vJvxp9hNmhDYNaEgEkwTbOCGB7eAJasd1BiLnan1sVQ2FCYC82Ldj0', 'Mrs.', 'ARYA', 'JOSHI', 1, 0, 0, NULL, 'Female', '2019-09-11 08:54:36', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'WPR', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5c0d4bf192a286f99', '5d773a758799dedbb'),
('5d78b694a315e99d4', 0, 0, 'swami', 'M3VWyvoiAGjETzlbZDBrbOVmMvNtLOumUgYhNorfVzVxb2z0GwMPx9dFlSutMe6ln/bSr6scFCcQZHDjl166X/', 'Mr.', 'SWAMI', 'RAJE', 1, 0, 0, NULL, 'Male', '2019-09-11 08:55:48', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'EPWP', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5c0d4bf192a286f99', '5d773a758799dedbb'),
('5d78b6dd039a3102a', 0, 0, 'rosj', 'O/Dy0X13U/OaxSNuX1LzSgi4qqXRxs4iMsO6Eh0bqJpOLwjeAxUux/TTvLdHLqQm487cKq8nEw7DTH9sKxlHA1', 'Mrs.', 'ROJ', 'RAJE', 1, 0, 0, NULL, 'Male', '2019-09-11 08:57:01', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'WPEO', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5d0c73a5ad4e88a90', '5d773a758799dedbb'),
('5d78b7462737510a4', 0, 0, 'rani', 'rzGcNT.61PfgzYAjuVE2/JgrB5pkp60rYCxMX5I3yqE76ev3GzkkdSAPfAEo0uqttJe/weKIIn7raQggxAFMA1', 'Mrs.', 'RANI', 'RAJE', 0, 0, 0, NULL, 'Female', '2019-09-11 08:58:46', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'EKWO', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5d0c73a5ad4e88a90', '5d773a758799dedbb'),
('5d78bc591275fa6d0', 0, 0, 'meera', 'iEPgWEe0InklpCCh7Vd4uS0iSRvna90..MPWozvvDmfm6fiOLk1fJVscjQDZRAMAUPm4XPV9OxFx2wCQkYce71', 'Mrs.', 'MEERA', 'JOSHI', 1, 0, 0, NULL, 'Female', '2019-09-11 09:20:25', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'KELW', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5d0c73a5ad4e88a90', '5d773a758799dedbb'),
('5d78bc98e200f5cf1', 0, 0, 'swatiii', 'oEEKdI7rpwu/d4tsBPyvrEGEnNIcg068Z7NIKfYNJOWv.ESEBwP1WVbfqjNzijczryWWhLKo9hxqrTMN7f5Dl.', 'Mrs.', 'SWATI', 'UMI', 1, 0, 0, NULL, 'Female', '2019-09-11 09:21:28', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'KEWL', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5d0c73a5ad4e88a90', '5d773a758799dedbb'),
('5d78bce587ad19a1b', 0, 0, 'yogesh', 'qj2BD742h4HVcINoKRfnxrpLkf8K.yqJvKXQgfHqVvfzGl1Y5zPIfWd12DJdWboLiUnk41WeAZm2q5q97cJko/', 'Mr.', 'YOGESH', 'MANE', 0, 0, 0, NULL, 'Male', '2019-09-11 09:22:45', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'EKEL', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5d0c73a5ad4e88a90', '5d773a758799dedbb'),
('5d78bd2ea0aac6ff1', 0, 0, 'aryaa', '1OcsnpVbG34pWfGUVDXBuY7k2ucHLv7C864XTvNWHa0.SL6kAYsW5kwBNVX3DVxkl08Fs8P1t0ODCNYb2uFD3.', 'Mrs.', 'ARYA', 'JAGTAP', 1, 0, 0, NULL, 'Female', '2019-09-11 09:23:58', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'EKWL', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5d0c73a5ad4e88a90', '5d773a758799dedbb'),
('5d78bd8f47b335296', 0, 0, 'jeeten', 'QY/tyc1o6TV46ZluWxRy9EJ0UsbKpnqK5huYzV3dmzx6lENV1KOxDbhfhYn5lr.3MxkIJw6PCrH3Ve7NXMyb60', 'Mr.', 'JEETEN', 'SHAH', 1, 0, 0, NULL, 'Male', '2019-09-11 09:25:35', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'KELW', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5d0c73a5ad4e88a90', '5d773a758799dedbb'),
('5d78bdce9d0cf0f48', 0, 0, 'radha', 'muv9nbbAdEVQxRuGktW9B15uKoPcmUWVNVLi6Kaj3zNVEmoaOQZSMg7zUV5CyFNkihTf663aMbZTosXRL0.yA.', 'Mrs.', 'RADHA', 'JSOHI', 1, 0, 0, NULL, 'Female', '2019-09-11 09:26:38', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'EWLEK', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5d0c73a5ad4e88a90', '5d773a758799dedbb'),
('5d78be0d37961bc0b', 0, 0, 'mugdha', 'pDPwVoR8HPuMcxSAvslPj1eVBCANEEThchlXOvygKhOyRoZuvMUow3Tccw.Rdui28MEpLney81Vzrog/ZPHoT.', 'Mrs.', 'MUGHDHA', 'RANE', 1, 0, 0, NULL, 'Female', '2019-09-11 09:27:41', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'EKWL', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5d0c73a5ad4e88a90', '5d773a758799dedbb'),
('5d78be543472f7c1d', 0, 0, 'roni', 'ekYsLOfqLPefbWYF1.lEyHfIdTkLxklGnUcuFqVIpNSpFt670qKldky3XqQG1Dla1IyTZMNV3ZBFtDIyFD6u7.', 'Mr.', 'RONI', 'JHA', 1, 0, 0, NULL, 'Male', '2019-09-11 09:28:52', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'PEKL', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5d0c73a5ad4e88a90', '5d773a758799dedbb'),
('5d7b159f62865224e', 0, 0, 'portal_user1', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Portal', 'User', 1, 1, 0, NULL, '', '2019-09-13 04:05:51', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b1e7358914ce1c', 0, 0, 'britania_industries_pvt_ltd', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Ashok', 'Patil', 1, 1, 0, NULL, 'Male', '2019-09-13 04:43:31', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b205ea6914bcba', 0, 0, 'tata', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Ms.', 'Seema', 'Jadhav', 1, 1, 0, NULL, 'Female', '2019-09-13 04:51:42', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b22d29b439c037', 0, 0, 'top_gear', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Ashwin', 'Patel', 1, 1, 0, NULL, 'Male', '2019-09-13 05:02:10', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b24f611560a6d5', 0, 0, 'goel_ganga', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Ashok', 'Goel', 1, 1, 0, NULL, 'Male', '2019-09-13 05:11:18', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b2641690c5f4c1', 0, 0, 'sanjay_kumar', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Sanjay', 'Kumar', 1, 1, 0, NULL, 'Male', '2019-09-13 05:16:49', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b27137f43b2dd0', 0, 0, 'coffee_day', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Siddharth', 'Malhotra', 1, 1, 0, NULL, 'Male', '2019-09-13 05:20:19', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b281c16f2997f4', 0, 0, 'ujaaj', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Jinesh', 'Gandhi', 1, 1, 0, NULL, 'Male', '2019-09-13 05:24:44', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b292489ee2e989', 0, 0, 'sirohi', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Ms.', 'Seema', 'Dev', 1, 1, 0, NULL, 'Male', '2019-09-13 05:29:08', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b29fc2e773c74f', 0, 0, 'radaang', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Santosh', 'Patil', 1, 1, 0, NULL, 'Male', '2019-09-13 05:32:44', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b2b0b1b89c2966', 0, 0, 'savitri', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Ms.', 'Savitri', 'Devi', 1, 1, 0, NULL, 'Female', '2019-09-13 05:37:15', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b2be1b6eb410bc', 0, 0, 'gp_foods', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Gopal', 'Pawar', 1, 1, 0, NULL, 'Male', '2019-09-13 05:40:49', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b2c66b97789909', 0, 0, 'chirag', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Chirag', 'Jadhav', 1, 1, 0, NULL, 'Male', '2019-09-13 05:43:02', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b30043d5f80748', 0, 0, 'ankur_foods', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Ankur', 'Khabani', 1, 1, 0, NULL, 'Male', '2019-09-13 05:58:28', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b30d9b9d39c304', 0, 0, 'prasad', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Prasad', 'Pathak', 1, 1, 0, NULL, 'Male', '2019-09-13 06:02:01', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b319b2ee8b1f3d', 0, 0, 'samyak', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Ms.', 'Vijaya', 'Jagtap', 1, 1, 0, NULL, 'Female', '2019-09-13 06:05:15', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b3264f22537a27', 0, 0, 'sanskriti', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Ms.', 'Kadambari', 'Wagh', 1, 1, 0, NULL, 'Female', '2019-09-13 06:08:36', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b3452931617be4', 0, 0, 'sri_sastha', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mrs.', 'Vaishali', 'Thorat', 1, 1, 0, NULL, 'Female', '2019-09-13 06:16:50', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b3784cfc545733', 0, 0, 'process_agrochem', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Pawan', 'Kumar', 1, 1, 0, NULL, 'Male', '2019-09-13 06:30:28', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b3baacf1e5f58f', 0, 0, 'goodwill', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Ms.', 'Namrata', 'Shinde', 1, 1, 0, NULL, 'Female', '2019-09-13 06:48:10', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b3c85afefc25dd', 0, 0, 'akanksha', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Ms.', 'Akanksha', 'Mohite', 1, 1, 0, NULL, 'Female', '2019-09-13 06:51:49', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b3d792b986659a', 0, 0, 'stone_galaxy', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Abhay', 'Kumar', 1, 1, 0, NULL, 'Male', '2019-09-13 06:55:53', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b3debd83bd843a', 0, 0, 'warana', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Nagesh', 'Patil', 1, 1, 0, NULL, '', '2019-09-13 06:57:47', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b3e3a547c724b7', 0, 0, 'meet_enter', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Meet', 'Singh', 1, 1, 0, NULL, 'Male', '2019-09-13 06:59:06', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b3f2397e279671', 0, 0, 'anuvab', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Sanjay', 'Khan', 1, 1, 0, NULL, 'Male', '2019-09-13 07:02:59', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b3fa2d472ef40d', 0, 0, 'shree_sai', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Shree', 'Chavan', 1, 1, 0, NULL, 'Male', '2019-09-13 07:05:06', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b470ce3f6c7554', 0, 0, 'mollick', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Ms.', 'Sukhada', 'Despande', 1, 1, 0, NULL, 'Female', '2019-09-13 07:36:44', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b4801784dedb43', 0, 0, 'dream_merchant', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Vaibhav', 'Pawar', 1, 1, 0, NULL, 'Male', '2019-09-13 07:40:49', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b48d5f271a50c8', 0, 0, 'arun', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Arun', 'Nawani', 1, 1, 0, NULL, 'Male', '2019-09-13 07:44:21', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b4a8b2aa2a819d', 0, 0, 'jewel_india', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Ms.', 'Soniya', 'Joshi', 1, 1, 0, NULL, 'Female', '2019-09-13 07:51:39', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b4b5c4b35495cc', 0, 0, 'krishna_diam', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Kapil', 'Sharma', 1, 1, 0, NULL, 'Male', '2019-09-13 07:55:08', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b4bd7833fc87db', 0, 0, 'mj_workshop', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Abhijit', 'sawant', 1, 1, 0, NULL, 'Male', '2019-09-13 07:57:11', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b5a33dfeaceb07', 0, 0, 'raosahebdada_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Raje', 'Mane', 1, 1, 0, NULL, '', '2019-09-13 08:58:27', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b5aa5ab31ccad2', 0, 0, 'laila_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Dinesh', 'Patil', 1, 1, 0, NULL, '', '2019-09-13 09:00:21', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b604e9f9bcd57e', 0, 0, 'nandi_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Suresh', 'Joshi', 1, 1, 0, NULL, '', '2019-09-13 09:24:30', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b60bb822f8b688', 0, 0, 'siddhanath_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Subhash', 'Sales', 1, 1, 0, NULL, 'Male', '2019-09-13 09:26:19', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b610c2b2130ffc', 0, 0, 'shri_shankar', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mrs.', 'Seema', 'Jadhav', 1, 1, 0, NULL, 'Female', '2019-09-13 09:27:40', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b6160da5befc3d', 0, 0, 'dhanashree_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Vijay', 'Rao', 1, 1, 0, NULL, 'Male', '2019-09-13 09:29:04', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b61b9d4a63912f', 0, 0, 'tapti_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mrs.', 'Soni', 'Raje', 1, 1, 0, NULL, 'Female', '2019-09-13 09:30:33', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b620112c6b5798', 0, 0, 'indreshwar_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Tushar', 'Rao', 1, 1, 0, NULL, 'Male', '2019-09-13 09:31:45', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b624acf07bb074', 0, 0, 'indian_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Praveen', 'Jha', 1, 1, 0, NULL, 'Male', '2019-09-13 09:32:58', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b6299e60cd562c', 0, 0, 'trans_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mrs.', 'Madhu', 'Kad', 1, 1, 0, NULL, 'Female', '2019-09-13 09:34:17', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b62ef2c09cf748', 0, 0, 'beta_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mrs.', 'Geeta', 'Pawar', 1, 1, 0, NULL, 'Female', '2019-09-13 09:35:43', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b69e3c7cfebebf', 0, 0, 'shrinivas_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Lakhan', 'Lodha', 1, 1, 0, NULL, 'Male', '2019-09-13 10:05:23', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b6a3e654c64df9', 0, 0, 'raj', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Santosh', 'Chopda', 1, 1, 0, NULL, 'Male', '2019-09-13 10:06:54', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b6a92ada9758ef', 0, 0, 'krishna_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mrs.', 'Kriti', 'Lodha', 1, 1, 0, NULL, 'Female', '2019-09-13 10:08:18', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b6ad7b75a86769', 0, 0, 'chevrox_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Shree', 'Bonda', 1, 1, 0, NULL, 'Male', '2019-09-13 10:09:27', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b6b14303ac834c', 0, 0, 'sujan_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Mohan', 'Parem', 1, 1, 0, NULL, 'Male', '2019-09-13 10:10:28', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b6b4d7e0546d9d', 0, 0, 'mahendra_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Mahend', 'Slek', 1, 1, 0, NULL, 'Male', '2019-09-13 10:11:25', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b6b915bdd13306', 0, 0, 'til_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mrs.', 'Eli', 'Mili', 1, 1, 0, NULL, 'Female', '2019-09-13 10:12:33', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b6bd757a6cb7d0', 0, 0, 'alphageo_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mrs.', 'Komal', 'Singh', 1, 1, 0, NULL, 'Female', '2019-09-13 10:13:43', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b6c2fb5905740b', 0, 0, 'jammu_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mrs.', 'Kavi', 'Mavi', 1, 1, 0, NULL, 'Female', '2019-09-13 10:15:11', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b6c743a69746a4', 0, 0, 'dwarkadhish_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Hemant', 'Pathak', 1, 1, 0, NULL, 'Male', '2019-09-13 10:16:20', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b6cdf02585185f', 0, 0, 'natural_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Suren', 'Ved', 1, 1, 0, NULL, 'Male', '2019-09-13 10:18:07', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b6d260551aa7b8', 0, 0, 'kisanveer_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Govind', 'Shinde', 1, 1, 0, NULL, 'Male', '2019-09-13 10:19:18', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b6d6f8ca299ae8', 0, 0, 'shree_', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Nagesh', 'Patil', 1, 1, 0, NULL, 'Male', '2019-09-13 10:20:31', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7b77c4c11d24321', 0, 0, 'allakh', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Allakh', 'User', 1, 1, 0, NULL, 'Male', '2019-09-13 11:04:36', NULL, NULL, NULL, '1', NULL, '', '', '', '', 'EMP-2001', 'Not Set', '', '', '', '', NULL, NULL, NULL),
('5d7f40f0cafdcc10b', 0, 0, 'fintester', 'bAcTXgkuWONzFvhfubN/6No5CF/P2lxvZqvy1xpD/AoFnWmYJ2KmLFiDS7u652AACazglpslp8098rFO2E5LD/', 'Mr.', 'Ayush', 'Agarwal', 1, 1, 0, NULL, 'Male', '2019-09-16 07:59:44', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', NULL, '5d773a92c4f798f74'),
('5daea025d5b680461', 0, 0, 'rameshraja1', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Ramesh', 'Raja', 1, 1, 0, NULL, 'Male', '2019-10-22 06:22:29', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', '5d5b6b725fa455a93', NULL, '5d773a758799dedbb'),
('5dafd88b2e4b7af59', 0, 0, 'sachin', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Sachin', 'Tendulkar', 1, 1, 0, NULL, 'Male', '2019-10-23 04:35:23', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', '5d5b6b725fa455a93', NULL, '5d773a758799dedbb'),
('5ddb6d5cca92063f8', 0, 0, 'dhananjay', '/hYIfdWQtgiZjw/1X5wW5lKZ6GAecC/jjJ/N0rPHhtXIvSdV2Skbmf1MRp0JCTfIG7ik0HezstoBvJOQjSAv60', 'Mr.', 'Dhananjay', 'Gokhale', 1, 0, 0, NULL, 'Male', '2019-11-25 05:57:48', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5c0d4bf192a286f99', '5d773a758799dedbb'),
('5dde39ed3352747c9', 0, 0, 'rupali', 'G9AtYztHc8UKJS69Uitr2ngJog9K5uI9NExyPeotYbQsQXF89Lajgzt2ErE/K9s/8Vm3kLQLvvB8o6jId7XRm1', 'Ms.', 'Rupali', 'Yadav', 1, 0, 0, NULL, 'Female', '2019-11-27 08:55:09', '5d2acf8b50bd7bde1', NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5d0c73a5ad4e88a90', '5d773a758799dedbb'),
('5de2603367d1260af', 0, 0, 'aniket', 'p1nPMdB5ELo5NHREAI0tqCxe6rLXMjOp91nmmnrXxHBVufE5s2jxVZOry31oq.bd0T8Jz.JEke/ZxRHK2NA51.', 'Mr.', 'Aniket', 'Pawar', 1, 0, 0, NULL, 'Male', '2019-11-30 12:27:31', '5d2acf8b50bd7bde1', NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5d0c73a5ad4e88a90', '5d773a758799dedbb'),
('5dedf2040d6450716', 0, 0, 'sunil', 'n0hpp543F0PGS0TlRPjbZ3Xca6kNeXFbIt4R3SI0j.20G9MHvMHDp62ze3H1VX398bRnyZixn1ooO6ZLY969h0', 'Mr.', 'Sunil', 'Jangid', 1, 0, 0, NULL, 'Male', '2019-12-09 07:04:36', '5d2acf8b50bd7bde1', NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5c0d4bf192a286f99', '5d773a758799dedbb'),
('5def35a8c71aa7723', 0, 0, 'sharad', 'fxWS1/jxqYSqU.ieHxAGXoV6PNsovOwF70nP3N2xa73fgMI3VmDKcaY8n4rQGYrcVn3h/.yronHUkk58Skmmx/', 'Mr.', 'Sharad', 'Suman', 1, 0, 0, NULL, 'Male', '2019-12-10 06:05:28', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', '5d60f3ed4fa0b5176', '5b79b7bc6b5cfe0c0', '5d773a758799dedbb'),
('5df72512497e638aa', 0, 0, 'ratan', 'ykW1EpXIJB/VwQXBKnIgGiNmAbfNzBQvmaJ1iMnOqaa1vRxWmHuv7MOZps/uKOx46rmqrNsorjdyuVZN4i5PP0', 'Mr.', 'Ratan', 'Tata', 1, 1, 0, NULL, '', '2019-12-16 06:32:50', NULL, NULL, NULL, '1', NULL, '', '', '', '', '', 'Not Set', '', '', '', '', NULL, NULL, '5d773a758799dedbb'),
('system', 0, 0, 'system', NULL, NULL, '', 'System', 1, 0, 0, NULL, '', '2019-01-30 04:42:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Not Set', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_firstName` varchar(255) DEFAULT NULL,
  `u_lastName` varchar(255) DEFAULT NULL,
  `u_email` varchar(255) DEFAULT NULL,
  `u_status` tinyint(4) DEFAULT NULL COMMENT '0 = Inactive, 1 = Active',
  `u_createdAt` datetime DEFAULT NULL,
  `u_updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_firstName`, `u_lastName`, `u_email`, `u_status`, `u_createdAt`, `u_updatedAt`) VALUES
(1, 'User', 'One', 'user@one.com', 1, '2019-12-26 00:00:00', NULL),
(2, 'User', 'Two', 'user@two.com', 1, '2019-12-26 00:00:00', NULL),
(3, 'User', 'Three', 'user@three.com', 1, '2019-12-26 00:00:00', NULL),
(4, 'User', 'Four', 'user@four.com', 1, '2019-12-26 00:00:00', NULL),
(5, 'User', 'Five', 'user@five.com', 1, '2019-12-26 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_default_settings`
--

DROP TABLE IF EXISTS `user_default_settings`;
CREATE TABLE IF NOT EXISTS `user_default_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `days` int(11) DEFAULT NULL,
  `space` int(11) DEFAULT NULL,
  `users` int(11) DEFAULT NULL,
  `sms` int(11) DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `plan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

DROP TABLE IF EXISTS `user_registration`;
CREATE TABLE IF NOT EXISTS `user_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '0',
  `company` varchar(50) DEFAULT '0',
  `emailid` varchar(50) DEFAULT '0',
  `phone` varchar(50) DEFAULT '0',
  `domain` varchar(50) DEFAULT '0',
  `space` varchar(50) DEFAULT '0',
  `numberofuser` varchar(50) DEFAULT '0',
  `startDate` varchar(50) DEFAULT '0',
  `endDate` varchar(50) DEFAULT '0',
  `createdat` varchar(50) DEFAULT '0',
  `assigneddbname` varchar(50) NOT NULL,
  `numberofsms` varchar(50) NOT NULL,
  `remaning_sms` int(11) NOT NULL,
  `folderName` varchar(50) NOT NULL,
  `database_name` varchar(250) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `email_status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_sms_limit`
--

DROP TABLE IF EXISTS `user_sms_limit`;
CREATE TABLE IF NOT EXISTS `user_sms_limit` (
  `usl_id` int(11) NOT NULL AUTO_INCREMENT,
  `usl_userId` varchar(30) DEFAULT NULL COMMENT 'User id ',
  `usl_limit` int(11) DEFAULT NULL COMMENT 'Limit in digits only',
  `usl_createdAt` datetime DEFAULT NULL,
  `usl_updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`usl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sms_limit`
--

INSERT INTO `user_sms_limit` (`usl_id`, `usl_userId`, `usl_limit`, `usl_createdAt`, `usl_updatedAt`) VALUES
(1, '1', 100, '2019-12-31 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

DROP TABLE IF EXISTS `user_token`;
CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `token` varchar(80) NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `x_y_z`
--

DROP TABLE IF EXISTS `x_y_z`;
CREATE TABLE IF NOT EXISTS `x_y_z` (
  `id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CREATED_BY_ID` (`created_by_id`),
  KEY `IDX_MODIFIED_BY_ID` (`modified_by_id`),
  KEY `IDX_ASSIGNED_USER_ID` (`assigned_user_id`),
  KEY `IDX_NAME` (`name`,`deleted`),
  KEY `IDX_ASSIGNED_USER` (`assigned_user_id`,`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account` ADD FULLTEXT KEY `IDX_SYSTEM_FULL_TEXT_SEARCH` (`name`);

--
-- Indexes for table `client_under_discussion`
--
ALTER TABLE `client_under_discussion` ADD FULLTEXT KEY `IDX_SYSTEM_FULL_TEXT_SEARCH` (`name`);

--
-- Indexes for table `client_under_discussion_new`
--
ALTER TABLE `client_under_discussion_new` ADD FULLTEXT KEY `IDX_SYSTEM_FULL_TEXT_SEARCH` (`name`);

--
-- Indexes for table `email`
--
ALTER TABLE `email` ADD FULLTEXT KEY `IDX_SYSTEM_FULL_TEXT_SEARCH` (`name`,`body_plain`,`body`);

--
-- Indexes for table `my_leads`
--
ALTER TABLE `my_leads` ADD FULLTEXT KEY `IDX_SYSTEM_FULL_TEXT_SEARCH` (`name`);

--
-- Indexes for table `rating_new_data`
--
ALTER TABLE `rating_new_data` ADD FULLTEXT KEY `IDX_SYSTEM_FULL_TEXT_SEARCH` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
