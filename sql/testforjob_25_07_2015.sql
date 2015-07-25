-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2015 at 05:40 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testforjob`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_data`
--

CREATE TABLE IF NOT EXISTS `chat_data` (
`id` int(10) NOT NULL,
  `sender` varchar(256) DEFAULT NULL,
  `receiver` varchar(256) DEFAULT NULL,
  `msg` varchar(1000) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `fr_chat_id` int(10) DEFAULT NULL,
  `created_at` varchar(256) DEFAULT NULL,
  `updated_at` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chat_users`
--

CREATE TABLE IF NOT EXISTS `chat_users` (
`id` int(11) NOT NULL,
  `cname` varchar(256) NOT NULL,
  `cemail` varchar(256) NOT NULL,
  `cmob` int(11) NOT NULL,
  `updated_at` varchar(256) NOT NULL,
  `created_at` varchar(256) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
`id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'TCS', '2015-06-14 00:12:10', '2015-06-14 00:12:10'),
(2, 'Wipro', '2015-06-14 00:12:44', '2015-06-14 00:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(2000) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `mobile`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'shakti', 1111111111, 'shaktisingh03@gmail.com', 'test', '2015-06-08 19:21:15', '2015-06-08 19:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_forum`
--

CREATE TABLE IF NOT EXISTS `discussion_forum` (
`id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `discussion_forum`
--

INSERT INTO `discussion_forum` (`id`, `question_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 35, 2, 'Why dynamix loading is not the correct answer for this?', NULL, NULL),
(2, 35, 2, 'Dynamic binding is to make decision of what function is being call at runtime.', NULL, NULL),
(3, 35, 2, 'Test your commetn', NULL, NULL),
(4, 35, 2, 'comment', NULL, NULL),
(5, 35, 2, 'sdfkajsdf', NULL, NULL),
(6, 71, 2, 'commentted', NULL, NULL),
(7, 70, 2, 'comment', NULL, NULL),
(8, 2, 2, 'test comments', NULL, NULL),
(9, 2, 2, 'Is it correct question?', NULL, NULL),
(10, 2, 6, 'commenttt', NULL, NULL),
(11, 1, 6, 'test', NULL, NULL),
(12, 1, 6, 'fasfas', NULL, NULL),
(13, 1, 6, 'testttt', NULL, NULL),
(14, 1, 6, 'adfafa', NULL, NULL),
(15, 2, 6, 'yyyyyy', NULL, NULL),
(16, 2, 6, 'tetete\n', NULL, NULL),
(17, 2, 6, 'test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`, `protected`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '{"_superadmin":1}', 0, '2014-12-15 12:27:14', '2014-12-15 12:27:14'),
(4, 'test-user', NULL, 0, '2015-01-08 12:54:36', '2015-01-08 12:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_02_19_095545_create_users_table', 1),
('2014_02_19_095623_create_user_groups_table', 1),
('2014_02_19_095637_create_groups_table', 1),
('2014_02_19_095645_create_user_throttle_table', 1),
('2014_02_19_160516_create_permission_table', 1),
('2014_02_26_165011_create_user_profile_table', 1),
('2014_05_06_122145_create_profile_field_types', 1),
('2014_05_06_122155_create_profile_field', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
`id` int(10) unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `description`, `permission`, `protected`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '_superadmin', 0, '2014-12-15 12:27:14', '2014-12-15 12:27:14'),
(3, 'group editor', '_group-editor', 0, '2014-12-15 12:27:14', '2014-12-15 12:27:14'),
(4, 'abc', '_abc', 0, '2015-03-20 21:58:22', '2015-03-20 21:58:22'),
(5, 'a123', '_a123', 0, '2015-03-20 21:58:39', '2015-03-20 21:58:39'),
(6, 'a234', '_a234', 0, '2015-03-20 21:58:48', '2015-03-20 21:58:48'),
(7, 'b234', '_b234', 0, '2015-03-20 21:59:00', '2015-03-20 21:59:00'),
(8, 'c123', '_c123', 0, '2015-03-20 21:59:13', '2015-03-20 21:59:13'),
(9, 'd123', '_d123', 0, '2015-03-20 21:59:22', '2015-03-20 21:59:22'),
(10, 'e123', '_e123', 0, '2015-03-20 21:59:32', '2015-03-20 21:59:32'),
(11, 'f123', '_f123', 0, '2015-03-20 21:59:42', '2015-03-20 21:59:42'),
(12, 'g123', '_g123', 0, '2015-03-20 22:00:00', '2015-03-20 22:00:00'),
(13, 'h123', '_h123', 0, '2015-03-20 22:01:14', '2015-03-20 22:01:14'),
(14, 'i123', '_i123', 0, '2015-03-20 22:01:24', '2015-03-20 22:01:24'),
(15, 'j123', '_j123', 0, '2015-03-20 22:01:36', '2015-03-20 22:01:36'),
(16, 'k123', '_k123', 0, '2015-03-20 22:01:45', '2015-03-20 22:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `plan_features`
--

CREATE TABLE IF NOT EXISTS `plan_features` (
`id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `plan_features`
--

INSERT INTO `plan_features` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Unlimited videos', NULL, NULL),
(2, 'Unlimited aptitude test', NULL, NULL),
(3, 'Unlimited objective test', NULL, NULL),
(4, 'Unlimited subjective test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile_field`
--

CREATE TABLE IF NOT EXISTS `profile_field` (
`id` int(10) unsigned NOT NULL,
  `profile_id` int(10) unsigned NOT NULL,
  `profile_field_type_id` int(10) unsigned NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profile_field_type`
--

CREATE TABLE IF NOT EXISTS `profile_field_type` (
`id` int(10) unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'CPP', '2015-06-14 00:12:10', '2015-06-14 00:12:10'),
(2, 'java', '2015-06-14 00:12:44', '2015-06-14 00:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `testplan_features`
--

CREATE TABLE IF NOT EXISTS `testplan_features` (
`id` int(11) NOT NULL,
  `test_plan_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `testplan_features`
--

INSERT INTO `testplan_features` (`id`, `test_plan_id`, `feature_id`, `created_at`, `updated_at`) VALUES
(1, 8, 1, '2015-06-03 01:44:59', '0000-00-00 00:00:00'),
(2, 8, 3, '2015-06-03 01:45:03', '0000-00-00 00:00:00'),
(3, 9, 1, '2015-06-03 01:44:07', '0000-00-00 00:00:00'),
(4, 9, 3, '2015-06-03 01:44:07', '0000-00-00 00:00:00'),
(5, 10, 1, '2015-06-03 02:03:12', '0000-00-00 00:00:00'),
(6, 10, 2, '2015-06-03 02:03:12', '0000-00-00 00:00:00'),
(7, 11, 1, '2015-06-03 02:03:38', '0000-00-00 00:00:00'),
(8, 11, 2, '2015-06-03 02:03:38', '0000-00-00 00:00:00'),
(9, 11, 3, '2015-06-03 02:03:38', '0000-00-00 00:00:00'),
(10, 12, 2, '2015-06-03 02:04:07', '0000-00-00 00:00:00'),
(11, 12, 3, '2015-06-03 02:04:07', '0000-00-00 00:00:00'),
(12, 12, 4, '2015-06-03 02:04:07', '0000-00-00 00:00:00'),
(13, 13, 1, '2015-06-03 02:04:24', '0000-00-00 00:00:00'),
(14, 13, 2, '2015-06-03 02:04:24', '0000-00-00 00:00:00'),
(15, 13, 3, '2015-06-03 02:04:24', '0000-00-00 00:00:00'),
(16, 13, 4, '2015-06-03 02:04:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `test_history`
--

CREATE TABLE IF NOT EXISTS `test_history` (
`id` int(11) NOT NULL,
  `test_slug` varchar(100) DEFAULT NULL,
  `question_ids` varchar(500) NOT NULL,
  `answers` varchar(500) DEFAULT NULL,
  `viewed` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `test_company_id` int(11) NOT NULL,
  `test_subject_id` int(11) NOT NULL,
  `test_difficulty_level` int(11) NOT NULL,
  `test_type` varchar(45) NOT NULL,
  `test_question_type` varchar(45) NOT NULL,
  `end_time` datetime NOT NULL,
  `test_status` enum('skipped','completed') NOT NULL DEFAULT 'skipped',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `test_history`
--

INSERT INTO `test_history` (`id`, `test_slug`, `question_ids`, `answers`, `viewed`, `user_id`, `test_company_id`, `test_subject_id`, `test_difficulty_level`, `test_type`, `test_question_type`, `end_time`, `test_status`, `created_at`, `updated_at`) VALUES
(1, 'tcs-cpp-test', '[2,4,1,5,3]', '{"2":"b","4":"c","1":"b","5":"b","3":"a"}', '[2,4,1,5,3]', 2, 1, 1, 0, 'aptitude', 'objective', '2015-06-14 05:52:19', 'completed', '2015-06-14 00:13:02', '2015-06-14 00:39:06'),
(2, 'tcs-cpp-test', '[2,5,1,4,3]', '{"5":"b"}', '[2,5]', 2, 1, 1, 0, 'aptitude', 'objective', '2015-06-14 06:57:03', 'skipped', '2015-06-14 00:40:54', '2015-06-14 01:27:03'),
(3, 'tcs-cpp-test', '[5,2,1,4,3]', '{"5":"b","2":"c","1":"b","4":"b"}', '[5,2,1,4,3]', 2, 1, 1, 0, 'aptitude', 'objective', '2015-06-14 11:30:26', 'skipped', '2015-06-14 05:59:24', '2015-06-14 06:00:32'),
(4, 'tcs-cpp-test', '[2,1,4,5,3]', '{"2":"b","5":"b","3":"c"}', '[2,1,4,5,3]', 2, 1, 1, 0, 'aptitude', 'objective', '2015-06-15 05:58:59', 'skipped', '2015-06-15 12:28:37', '2015-06-15 12:28:59'),
(5, 'tcs-cpp-test', '[3,2,4,5,1]', '{"3":"b"}', '[3]', 2, 1, 1, 0, 'aptitude', 'objective', '2015-06-15 06:07:10', 'skipped', '2015-06-15 12:37:03', '2015-06-15 12:37:10'),
(6, 'tcs-cpp-test', '[1,3,4,5,2]', NULL, '[1]', 2, 1, 1, 0, 'aptitude', 'objective', '0000-00-00 00:00:00', 'skipped', '2015-06-15 12:53:42', '2015-06-15 12:53:42'),
(7, 'tcs-cpp-test', '[3,5,1,4,2]', '{"3":"c","5":"c"}', '[3,5,1,2]', 2, 1, 1, 0, 'aptitude', 'objective', '2015-06-15 07:04:59', 'skipped', '2015-06-15 13:34:39', '2015-06-15 13:35:06'),
(8, 'tcs-cpp-test', '[5,3,2,4,1]', NULL, '[5,3,2,4,1]', 2, 1, 1, 0, 'aptitude', 'objective', '0000-00-00 00:00:00', 'skipped', '2015-06-18 12:25:56', '2015-06-18 12:26:12'),
(9, 'tcs-cpp-test', '[1,5,3,4,2]', NULL, '[1]', 2, 1, 1, 0, 'aptitude', 'objective', '0000-00-00 00:00:00', 'skipped', '2015-06-18 12:48:47', '2015-06-18 12:48:47'),
(10, 'tcs-cpp-test', '[1,2,3,5,4]', '{"1":"b","2":"c","5":"d"}', '[1,2,3,5,4]', 6, 1, 1, 0, 'aptitude', 'objective', '2015-06-20 04:07:04', 'skipped', '2015-06-20 10:30:39', '2015-06-20 10:39:50'),
(11, 'tcs-cpp-test', '[5,2,1,4,3]', '{"5":"b","3":"b","4":"b","1":"b","2":"b"}', '[5,2,1,3,4]', 6, 1, 1, 0, 'aptitude', 'objective', '2015-06-28 06:00:06', 'completed', '2015-06-28 00:28:32', '2015-06-28 00:38:16'),
(12, 'tcs-cpp-test', '[4,5,3,1,2]', '{"4":"b"}', '[4]', 6, 1, 1, 0, 'aptitude', 'objective', '2015-06-28 04:53:01', 'skipped', '2015-06-28 11:22:52', '2015-06-28 11:23:01'),
(13, 'tcs-cpp-test', '[4,3,1,5,2]', NULL, '[4]', 6, 1, 1, 0, 'aptitude', 'objective', '0000-00-00 00:00:00', 'skipped', '2015-06-28 13:10:58', '2015-06-28 13:10:59'),
(14, 'tcs-cpp-test', '[1,4,3,2,5]', '{"1":"b","4":"c","3":"b","2":"b","5":"b"}', '[1,4,3,2,5]', 6, 1, 1, 0, 'aptitude', 'objective', '2015-07-01 03:03:24', 'completed', '2015-07-01 09:32:23', '2015-07-01 09:33:24'),
(15, 'tcs-cpp-test', '[2,1,5,3,4]', '{"2":"a","1":"c","5":"b","3":"b","4":"b"}', '[2,1,5,3,4]', 6, 1, 1, 0, 'aptitude', 'objective', '2015-07-01 03:33:32', 'completed', '2015-07-01 10:00:43', '2015-07-01 10:03:32'),
(16, 'wipro-java-test', '[9,6,7,8,10]', NULL, '[9,6,7,8,10]', 6, 2, 2, 1, 'aptitude', 'subjective', '0000-00-00 00:00:00', 'skipped', '2015-07-01 12:46:52', '2015-07-01 12:47:31'),
(17, 'tcs-cpp-test', '[2,4,5,3,1]', '{"2":"b"}', '[2,4,5]', 6, 1, 1, 0, 'aptitude', 'objective', '2015-07-01 06:18:32', 'skipped', '2015-07-01 12:48:26', '2015-07-01 12:48:41'),
(18, 'tcs-cpp-test', '[1,4,5,3,2]', NULL, '[1,4,5,3,2]', 6, 1, 1, 0, 'aptitude', 'objective', '0000-00-00 00:00:00', 'skipped', '2015-07-06 10:41:00', '2015-07-06 10:41:12'),
(19, 'tcs-cpp-test', '[4,5,2,3,1]', '{"4":"b","3":"b"}', '[4,5,2,3,1]', 6, 1, 1, 0, 'aptitude', 'objective', '2015-07-14 01:42:13', 'skipped', '2015-07-13 20:11:21', '2015-07-13 20:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `test_plans`
--

CREATE TABLE IF NOT EXISTS `test_plans` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `time` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `test_plans`
--

INSERT INTO `test_plans` (`id`, `name`, `description`, `cost`, `time`, `created_at`, `updated_at`) VALUES
(10, 'FREE', 'Get Free plan', 0, 0.3, '2015-06-02 20:33:12', '2015-06-02 20:33:12'),
(11, 'Plan 1', 'Plan 1', 100, 0.3, '2015-06-02 20:33:38', '2015-06-02 20:33:38'),
(12, 'Plan 2', 'Plan 2', 200, 0.6, '2015-06-02 20:34:07', '2015-06-02 20:34:07'),
(13, 'Plan 3', 'Plan 3', 500, 1, '2015-06-02 20:34:24', '2015-06-02 20:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `test_questions`
--

CREATE TABLE IF NOT EXISTS `test_questions` (
`id` int(11) NOT NULL,
  `test_type` enum('aptitude','technical') NOT NULL,
  `question_type` enum('objective','subjective') NOT NULL,
  `test_name` varchar(100) DEFAULT NULL,
  `test_slug` varchar(100) NOT NULL,
  `difficulty_level` tinyint(4) DEFAULT '0',
  `subject_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `question` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `option_a` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `option_b` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `option_c` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `option_d` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `study_solution` varchar(500) DEFAULT NULL,
  `study_solution_image` varchar(255) DEFAULT NULL,
  `test_plan_ids` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `test_questions`
--

INSERT INTO `test_questions` (`id`, `test_type`, `question_type`, `test_name`, `test_slug`, `difficulty_level`, `subject_id`, `company_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`, `study_solution`, `study_solution_image`, `test_plan_ids`, `created_at`, `updated_at`) VALUES
(1, 'aptitude', 'objective', 'TCS CPP test', 'tcs-cpp-test', 0, 1, 1, 'Which of the following type of class allows only one object of it to be created?', 'A. Virtual class', 'B. Abstract class\n', '\nC. Singleton class\n', '\nD. Friend class', 'C', 'Active class is s afkjasd fkjaslkdf jlaksj flkajs dlfk\n\njfjlasjdf af  faljdflkaj ldsfkjafalsjdflakjs dfl\nkhjskhkjh\nlkjlkj\njljlk\naksdjf alsjd falj sdfkj', NULL, '10', '2015-06-14 00:12:10', '2015-06-14 13:51:13'),
(2, 'aptitude', 'objective', 'TCS CPP test', 'tcs-cpp-test', 0, 1, 1, ' \nWhich of the following is not a type of constructor?\n\n', ' \n\n\nA. Copy constructor\n-', ' \n\nB. Friend constructor\n-', 'C. Default constructor\n', '\nD. Parameterized constructor-', 'B', 'Active class is s afkjasd fkjaslkdf jlaksj flkajs dlfk\n\njfjlasjdf af  faljdflkaj ldsfkjafalsjdflakjs dfl\nkhjskhkjh\nlkjlkj\njljlk\naksdjf alsjd falj sdfkj', NULL, '10', '2015-06-14 00:12:10', '2015-06-14 13:51:13'),
(3, 'aptitude', 'objective', 'TCS CPP test', 'tcs-cpp-test', 0, 1, 1, ' \nWhich of the following statements is correct?\n\n', 'A. Base class pointer cannot point to derived class.\n', 'B. Derived class pointer cannot point to base class.\n', 'C. Pointer to derived class cannot be created.\n.----', 'D. Pointer to base class cannot be created-', 'B', 'Active class is s afkjasd fkjaslkdf jlaksj flkajs dlfk\n\njfjlasjdf af  faljdflkaj ldsfkjafalsjdflakjs dfl\nkhjskhkjh\nlkjlkj\njljlk\naksdjf alsjd falj sdfkj', NULL, '10', '2015-06-14 00:12:10', '2015-06-14 13:51:13'),
(4, 'aptitude', 'objective', 'TCS CPP test', 'tcs-cpp-test', 0, 1, 1, 'Which of the following is not the member of class?\n\n-', 'A. Static function\n', 'B. Friend function\n--', 'C. Const function\n-', 'D. Virtual function-', 'B', 'Active class is s afkjasd fkjaslkdf jlaksj flkajs dlfk\n\njfjlasjdf af  faljdflkaj ldsfkjafalsjdflakjs dfl\nkhjskhkjh\nlkjlkj\njljlk\naksdjf alsjd falj sdfkj', NULL, '10', '2015-06-14 00:12:10', '2015-06-14 13:51:13'),
(5, 'aptitude', 'objective', 'TCS CPP test', 'tcs-cpp-test', 0, 1, 1, 'Which of the following concepts means determining at runtime what method to invoke?\n\n', 'A. Data hiding', 'B. Dynamic Typing', 'C. Dynamic binding-', 'D. Dynamic loading--', 'c', 'Active class is s afkjasd fkjaslkdf jlaksj flkajs dlfk\n\njfjlasjdf af  faljdflkaj ldsfkjafalsjdflakjs dfl\nkhjskhkjh\nlkjlkj\njljlk\naksdjf alsjd falj sdfkj', NULL, '10', '2015-06-14 00:12:10', '2015-06-14 13:51:13'),
(6, 'aptitude', 'subjective', 'Wipro java test', 'wipro-java-test', 1, 2, 2, 'Which of the following type of class allows only one object of it to be created?', NULL, NULL, NULL, NULL, 'A. Virtual class', NULL, NULL, '', '2015-06-14 00:12:44', '2015-06-14 13:48:25'),
(7, 'aptitude', 'subjective', 'Wipro java test', 'wipro-java-test', 0, 2, 2, ' \nWhich of the following is not a type of constructor?\n\n', NULL, NULL, NULL, NULL, ' \n\n\nA. Copy constructor\n-', NULL, NULL, '', '2015-06-14 00:12:44', '2015-06-14 13:48:25'),
(8, 'aptitude', 'subjective', 'Wipro java test', 'wipro-java-test', 1, 2, 2, ' \nWhich of the following statements is correct?\n\n', NULL, NULL, NULL, NULL, 'A. Base class pointer cannot point to derived class.\n', NULL, NULL, '', '2015-06-14 00:12:44', '2015-06-14 13:48:25'),
(9, 'aptitude', 'subjective', 'Wipro java test', 'wipro-java-test', 0, 2, 2, 'Which of the following is not the member of class?\n\n-', NULL, NULL, NULL, NULL, 'A. Static function\n', NULL, NULL, '', '2015-06-14 00:12:44', '2015-06-14 13:48:25'),
(10, 'aptitude', 'subjective', 'Wipro java test', 'wipro-java-test', 1, 2, 2, 'Which of the following concepts means determining at runtime what method to invoke?\n\n', NULL, NULL, NULL, NULL, 'A. Data hiding', NULL, NULL, '', '2015-06-14 00:12:44', '2015-06-14 13:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `test_timings`
--

CREATE TABLE IF NOT EXISTS `test_timings` (
  `test_slug` varchar(100) NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_types`
--

CREATE TABLE IF NOT EXISTS `test_types` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `test_types`
--

INSERT INTO `test_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'aptitude', '2015-01-11 18:40:32', '2015-01-11 18:40:32'),
(2, 'technical', '2015-01-11 18:40:32', '2015-01-11 18:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `banned`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `protected`, `created_at`, `updated_at`) VALUES
(3, 'nitin@gmail.com', '$2y$10$l3zAgIFkLyWT8rFCLBdWSeBIoCeDVzjMXZtBKSZhkrqGsD3IXoTS2', '{"_group-editor":1}', 1, 0, NULL, NULL, '2015-01-18 01:39:13', '$2y$10$htOz8H2r8tSPp/nIzsqFC.xkYWm.L80VsbREM/OB58IAdDJMtttSe', NULL, 0, '2015-01-18 01:08:20', '2015-01-18 01:39:13'),
(4, 'praveen@gmail.com', '$2y$10$5iTrUsZCFU41jNaR30ZOf.6IXnF30nfTYyr.gK/.a76zGDHpaZdUm', NULL, 0, 0, 'gMLDuoCmjtHXKDJ80VlM8YWM2HXbSetDaknjGVuexU', NULL, NULL, NULL, NULL, 0, '2015-02-05 18:05:23', '2015-06-20 10:23:18'),
(5, 'shaktisingh04@gmail.com', '$2y$10$WZsv8sYIQ11NHtKAw3czqOx3kqoGz2vPYGP.y5SE2VJkBJTLIOosS', NULL, 0, 0, 'Wf1zHVR6GdqNT6dMd9iWAPY28inUpqwFTKPPgFTzX4', NULL, NULL, NULL, NULL, 0, '2015-05-17 05:33:35', '2015-05-17 05:33:35'),
(6, 'shaktisingh03@gmail.com', '$2y$10$4D1on0Q1qjuoNe1LAibTr.nNwMYWHTDtOY/5QfIAQvMqne96tCKn.', '{"_superadmin":1}', 1, 0, 'fQJnFUHcKA7S8GxwvLA2sRWE1ev4PJVgVC3rtye3h4', NULL, '2015-07-25 10:07:31', '$2y$10$qfF3m0/u5QHPIiI.VkXkAOEnmkS1I1Pt8MruCH0W/Q4tZyzbTnvZq', NULL, 0, '2015-06-20 10:25:21', '2015-07-25 10:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vat` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` blob,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `code`, `vat`, `first_name`, `last_name`, `phone`, `state`, `city`, `country`, `zip`, `address`, `avatar`, `created_at`, `updated_at`) VALUES
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-01-18 01:08:20', '2015-01-18 01:08:20'),
(4, 4, NULL, NULL, 'shakti', 'singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-02-05 18:05:23', '2015-02-05 18:05:23'),
(5, 5, NULL, NULL, 'shakti', 'singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-05-17 05:33:35', '2015-05-17 05:33:35'),
(6, 6, NULL, NULL, 'shakti', 'singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-06-20 10:25:21', '2015-06-20 10:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_test_plan`
--

CREATE TABLE IF NOT EXISTS `user_test_plan` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_test_plan`
--

INSERT INTO `user_test_plan` (`id`, `user_id`, `plan_id`, `created_at`, `updated_at`) VALUES
(1, 2, 10, '2015-06-14 12:57:54', '2015-06-14 12:57:54'),
(2, 6, 10, '2015-07-13 20:18:20', '2015-07-13 20:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
`id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `video_category_id` int(11) DEFAULT NULL,
  `video_category_value` varchar(255) DEFAULT NULL,
  `test_plan_ids` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `link`, `thumbnail`, `video_category_id`, `video_category_value`, `test_plan_ids`, `created_at`, `updated_at`) VALUES
(2, 'video2', 'https://www.youtube.com/embed/x07XGXCBUeg', 'http://i1.ytimg.com/vi/x07XGXCBUeg/default.jpg', 1, NULL, '12,13', NULL, '2015-06-14 11:31:14'),
(4, 'video4', 'https://www.youtube.com/embed/kXbu1VoR1oY', 'http://i1.ytimg.com/vi/kXbu1VoR1oY/default.jpg', 1, NULL, '12,13', NULL, '2015-06-14 11:31:14'),
(17, 'Java programs', 'https://www.youtube.com/embed/WPvGqX-TXP0', 'http://i1.ytimg.com/vi/WPvGqX-TXP0/default.jpg', 4, NULL, '10', '2015-05-14 20:58:47', '2015-06-14 13:57:57'),
(18, 'megento tutorial', 'https://www.youtube.com/embed/TAe1vdu420U', 'http://i1.ytimg.com/vi/TAe1vdu420U/default.jpg', 5, NULL, '0', '2015-05-24 02:51:32', '2015-05-24 02:51:32'),
(20, 'megento tutorial', 'https://www.youtube.com/embed/dR4lOUKnPgk', 'http://i1.ytimg.com/vi/dR4lOUKnPgk/default.jpg', 5, NULL, '0', '2015-05-24 03:07:00', '2015-05-24 03:07:00'),
(21, 'megento tutorial', 'https://www.youtube.com/embed/dR4lOUKnPgk', 'http://i1.ytimg.com/vi/dR4lOUKnPgk/default.jpg', 5, NULL, '0', '2015-05-24 03:08:40', '2015-05-24 03:08:40'),
(22, 'megento tutorial 3', 'https://www.youtube.com/embed/TAe1vdu420U', 'http://i1.ytimg.com/vi/TAe1vdu420U/default.jpg', 5, NULL, '0', '2015-05-24 03:13:05', '2015-05-24 03:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `video_category`
--

CREATE TABLE IF NOT EXISTS `video_category` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `video_category`
--

INSERT INTO `video_category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Interview', '2015-03-22 09:13:41', '2015-03-22 09:13:41'),
(2, 'Tutorial', '2015-03-22 09:13:41', '2015-03-22 09:13:41'),
(4, 'technical', '2015-03-30 17:08:54', '2015-03-30 17:08:54'),
(5, 'megento', '2015-05-24 08:21:32', '2015-05-24 08:21:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_data`
--
ALTER TABLE `chat_data`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `chat_users`
--
ALTER TABLE `chat_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussion_forum`
--
ALTER TABLE `discussion_forum`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_features`
--
ALTER TABLE `plan_features`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_field`
--
ALTER TABLE `profile_field`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `profile_field_profile_id_profile_field_type_id_unique` (`profile_id`,`profile_field_type_id`), ADD KEY `profile_field_profile_field_type_id_foreign` (`profile_field_type_id`);

--
-- Indexes for table `profile_field_type`
--
ALTER TABLE `profile_field_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testplan_features`
--
ALTER TABLE `testplan_features`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_history`
--
ALTER TABLE `test_history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_plans`
--
ALTER TABLE `test_plans`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_questions`
--
ALTER TABLE `test_questions`
 ADD PRIMARY KEY (`id`), ADD FULLTEXT KEY `question` (`question`);

--
-- Indexes for table `test_types`
--
ALTER TABLE `test_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
 ADD PRIMARY KEY (`id`), ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`), ADD KEY `users_activation_code_index` (`activation_code`), ADD KEY `users_reset_password_code_index` (`reset_password_code`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
 ADD PRIMARY KEY (`id`), ADD KEY `user_profile_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_test_plan`
--
ALTER TABLE `user_test_plan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_category`
--
ALTER TABLE `video_category`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_data`
--
ALTER TABLE `chat_data`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chat_users`
--
ALTER TABLE `chat_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `discussion_forum`
--
ALTER TABLE `discussion_forum`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `plan_features`
--
ALTER TABLE `plan_features`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `profile_field`
--
ALTER TABLE `profile_field`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile_field_type`
--
ALTER TABLE `profile_field_type`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `testplan_features`
--
ALTER TABLE `testplan_features`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `test_history`
--
ALTER TABLE `test_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `test_plans`
--
ALTER TABLE `test_plans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `test_questions`
--
ALTER TABLE `test_questions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `test_types`
--
ALTER TABLE `test_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_test_plan`
--
ALTER TABLE `user_test_plan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `video_category`
--
ALTER TABLE `video_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile_field`
--
ALTER TABLE `profile_field`
ADD CONSTRAINT `profile_field_profile_field_type_id_foreign` FOREIGN KEY (`profile_field_type_id`) REFERENCES `profile_field_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `profile_field_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
ADD CONSTRAINT `user_profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
