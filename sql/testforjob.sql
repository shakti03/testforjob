-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2015 at 07:44 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
(9, 2, 2, 'Is it correct question?', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
(7, 'tcs-cpp-test', '[3,5,1,4,2]', '{"3":"c","5":"c"}', '[3,5,1,2]', 2, 1, 1, 0, 'aptitude', 'objective', '2015-06-15 07:04:59', 'skipped', '2015-06-15 13:34:39', '2015-06-15 13:35:06');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `banned`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `protected`, `created_at`, `updated_at`) VALUES
(2, 'shaktisingh03@gmail.com', '$2y$10$QbXnfXhleazI2aI100Cy3e5tPHw5ikHP0goY2O1430imZ9SFnw6Ja', '{"_superadmin":1}', 1, 0, NULL, '2014-12-20 13:14:01', '2015-06-15 12:42:03', '$2y$10$EXE.BDuZAttPhovLugXxReYycKT0i8RGQpuZ3thOZUv6mAFGecaQS', NULL, 0, '2014-12-20 13:13:21', '2015-06-15 12:42:03'),
(3, 'nitin@gmail.com', '$2y$10$l3zAgIFkLyWT8rFCLBdWSeBIoCeDVzjMXZtBKSZhkrqGsD3IXoTS2', '{"_group-editor":1}', 1, 0, NULL, NULL, '2015-01-18 01:39:13', '$2y$10$htOz8H2r8tSPp/nIzsqFC.xkYWm.L80VsbREM/OB58IAdDJMtttSe', NULL, 0, '2015-01-18 01:08:20', '2015-01-18 01:39:13'),
(4, 'praveen@gmail.com', '$2y$10$5iTrUsZCFU41jNaR30ZOf.6IXnF30nfTYyr.gK/.a76zGDHpaZdUm', NULL, 0, 0, 'TymqmkX02VO9jrlA13sWHv3zEIcpcyU8ll60D69BtK', NULL, NULL, NULL, NULL, 0, '2015-02-05 18:05:23', '2015-02-05 18:07:39'),
(5, 'shaktisingh04@gmail.com', '$2y$10$WZsv8sYIQ11NHtKAw3czqOx3kqoGz2vPYGP.y5SE2VJkBJTLIOosS', NULL, 0, 0, 'Wf1zHVR6GdqNT6dMd9iWAPY28inUpqwFTKPPgFTzX4', NULL, NULL, NULL, NULL, 0, '2015-05-17 05:33:35', '2015-05-17 05:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(2, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `code`, `vat`, `first_name`, `last_name`, `phone`, `state`, `city`, `country`, `zip`, `address`, `avatar`, `created_at`, `updated_at`) VALUES
(2, 2, NULL, NULL, 'shakti', 'singh', NULL, NULL, NULL, NULL, NULL, NULL, 0xffd8ffe000104a46494600010100000100010000fffe003b43524541544f523a2067642d6a7065672076312e3020287573696e6720494a47204a50454720763930292c207175616c697479203d2039300affdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc000110800aa00aa03012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00f5910ae08db5208428c6294a819f5a901c8c7702be7d456ccdb5422c2bfdd1cf5a71886470051b82e33d6a54c920678ad1415ef61ddb04b542a495e4d28b65427807e952ab06e71cd296dd9ebc71cf6a5cb6d42eee37c84c6071ee453c4298008e69149c0f971c54a8d83c2f356a29a2ef2b5805a21ebeb9a9bc98d53d7f0a15b71e739a93e55c03f9d6bc896ab5159d855b68c81e9de9c91246b8009a0b88cf5e0d2860467356a288698f5810f5506a54b745e0018a6a363a714ede77649edd2b44a2f425a63c5b82318a95214db8229b1b80327a9a786383c76ad545196a992242b8181f98a708509008193de991c841c1e7dea4570475c1aa51e860db4482dd71c0a516e3006063e94aadc0c7e94f0c3a67f3e2b5e44ed72799bd8416919e4a8a5f253d29c1c67bf1d68f307bfe556a3725369eba1e739dd8ebc7eb4e09b79eb9f4a628001209e94f46dcbe95e16bd4f4d24f51c83f114eddf3f142a74c1a50a726a95d7a0e24abf28edd39a72b8239a84f039a451f3647349eaee68a2af72d2b1ce00f7a767078e7dea3460454b1fcc400319ef5a2d351dbb0e4dd8383da9637393bbad48005391ce7ad282b9f4adacd6a55931fd40e323d290373c0fca81f33e79fa53c28c640e69b6f7172d90a8c3763a13521e0823bd3523dc41e9526c0319eb5aa5d8c9ae8897ebd6a44c018fd6a11f769f1a907713902aa2df5319449492d9ee477a556207bfbd078e9fad2303900f19ef5aa39dad0b10bfe5531c63239c9aaaabb460727e94ef30e7af4e95aad519dada16549dbc7a51927ff00d551a1ce7dea5c1ff26b457e8248f3c8931d7a7bd3c8ddc838a895b04f19a7670bc1c578ad268f47764d19c63279a94b03559650460763cd4735c8b752eedb54773daa6d6348b2d3b6e02b3752f13693a10ff4fd4ad6cd88c859a655247b02726bcf7c63f1d7c3fa269fad4305f03a9dac65523e859c8e0ae7838af86359f1c6a3a9ea77373737924b34cc4bc8e7258fbd6d0a2da6dbb7c84ea763edbf117ed55e11f0e6aefa718af2e5d002658957cbfc096cfe95a567fb49f856f6cd6e62fb4c910fbc2308593eabbb70fae2bf3da6d7e57564918488dea3a7d3d2a6d335d9ec5d658a56461c707a8ae8f651e84fb47d4fd3ef057c43d0bc710b3e957c9332fde8986d75fa835d23b2af18e6bf35fc09f11eebc2de20b5d4ed6768d9181750dc30ee2bef5f03f8f6cbc63a6c5716d731cc1903615be6e4679f4359ce3cb6b1b2927b9dc4671c9a950e0edef9eb55a39d59054ea4374c9acd2b30772c4640c71939cd282325bb76a8d4614e3ae29c8182fcc726b657bd8cfa0fe0f1d69e879238c54247069c80e01fceb5464f52d021b033c53ca92783c55653d47b76a9637e706b5473c9224fb833eb4d605ba707d6a46c30029ad85eb56652d751f1393c36454bcff9150a90c00029df37bd6b7b117b3d0f3d427d79a9036081800d578ce0e49e6951f393dbd6bc3b75b1dcdf42c1600738e2be7afda2fe2f4767657fe1b8ade48c3a006ed64dad9ea30076cd7b378b8de4fa0ddc7a73986f1d084941e50fad7e7b7c448f52b3d76eedb529a49a689c8deec5b78f5e7d6ba29c57c4fa049dd591ccdfea52bc8c5a56727b9358d2dc16273493ce59c8fcaa1104b3b0080927d2b6e66f704b4b21924cdd3a9a7a5c30183dfd6b62c3c3524e996ea6adbf851a35cf5a4a66ca84ed7b1916d70ca41cf1ed5d7f86bc67ac68722c967772db38e8f1b9523f2ae664d35eda4208c63a54b69bd495279eb9cf515b464ee66e16d19f4ffc2ffdab358d16686d3c427fb4ec18e0cb80258fe87a11ec7f3afaefc39e24b3f126976da869f389ecee143a483b8ff1f6afcb9597f76a3bf506bdcff66cf8cb2f81f5c4d2751989d16f5c025cf1039e378f6f5fcfb54ca17d52d4d632e567de30c808c76ab19dd59704aaca194d5d49723da9742df912636b7ad3864ff85461f393d7d29c8c7775e2a96e72b42e18723f1a994e5318a61e869636c6075fa56893e862fb16223d7774f5a76e0c3d8543b9b18c70294361718c7d6b55abb33076b930c0e474a9039c74a846738ed8a70538eb5a24ba9936d3d0f3512f27b54913a98d71e9d2aa2f20e3bfad3edce114630475af1944f4ba96a78cc9038400b952173d335f0dfc69f03cde13b17bcd61f76b57b70e1543023603f7bd874fcebee504227b57cd3fb65787fcfd1747d5a2572f1cad0bed1c0523767f435d11b27615ee7c95a3e91f6f99dd87caa6ba6b5d1a387f840c558f0de98d1582b1182ff3568f93824138c573ca5a9ec50a49453688a08d62180b53940c31b73ef5219ed604cb90a40eac78a58b5ed2df833283d38e6a535b58efbc62ad732b52d304b1310bd075ae5cc622986e1865e3eb5eb1a75843aa28313a48a782a3a8acff00117c3995e092ead002c9cb478ea3dabae9b8b679f88a2dbe689e7114c15994e40072b5b364c52f518f0060e2b225b620b23021c763ed5a56530595378ea0035d71b26790d33f46fe146bff00f090781b44bc63967b64573d72c061bf506bb65932bee2bc7bf66b2c7e1569e18918925c67fdf35eb11b9c7b8ae7b2574742d9169242a79c8cd491ca49aa65fe6a9226c1c8fd2ab4465234a36040cfe34ee84fa55549881cf24fbd4ea430e7a56cbb1cb226ce467ad3d4647a62a256c0e06ec8a11f3ffd7ad92bec6122c2302738a78718e80d42ac493ebe95273ea2b44975327a9e62ac09ce715306da7d8d658bac7539a963bbdcc013906bc84b43d06f5349a71b3a715ccfc418ac2fbc1dac26a312cf66b6cecea4648c29e9ef5acf39c6338e6b2b568e3bfb2b9b598068a6468d97d411834dab6c545dcf80af758bdb42b1c51048546066a6b4d4e4b943f2e5875c533c5d697165a95ddb6d0a22959067b8071567c0ba43b2dc4f2fcc1b0abc71ef58ced147a941ca5351bb303570f2c84c8c767a66aa5abc101566038fef1aecb5cf0d49248c51783eb5ceaf87a653e5b45bc673cf4a57572e74e49e88def0e6b6961711cd0c8bbc1ce15b39af6bf0feab06bf69e6a2043d1d2bc6f47f0fcf22223408154ff0aff5af5bf02e9ff6665411eddc39cfad69ce9cb43ae9c6495a47977c50d0a2d23c48b2dbaed5946e65f7acbf0de8cdad6a914432b1920331ff003d6bbcf8afa15c6a5af40b046cceca1555477cd676ada7c9e0b163671856990f9b33ff00b5c71f87f85757372c743cff0065cf55a7b23e9ffd9abc550ea7e1197465b636d2e9521420b6772b12727df39af67f33d3a9af9f7f66db42b7de20bd1954b810be3d0b02c7f9d7bc2313ce6a22afa99d78a84da459dfc839e2a68dc000f7aa9bb18a78939feb5492dce3917964f9f91ce3353c53f41fccd672c8319ee2a70c33d6b6473b3522933914e38ddc0031ef54a298f7a984a33d4135d0acce69bee5943db3ef4b8aac18039eb8a9bcd07b7e95a5bb909df63c5d6e838ebd3d6956eb07863c0ac95b939c1a709b9c66bc752d0f45ab3360ddb160a4e413deab6a37cb696d34eee0246858b1ec00cd55f3be603df3597e2c865d43c3ba95b424896581d571eb838adb7434ef6ec7cb7e21b4b5bdbd9ee25f9e491cb7e24d58d2e686cd521e1463279ae4b50d4e78af444a48704e735565d42756225c83d8a9ae0716dfbc7b90ab18ec8ee754bcf30148590b760cc39ac1b7d59518abe038ec6b968adee26b813b5cc85c7419e055c9e1611eedc4bf5dc7ad69caa48d9566f548f40d0f5e8c4ca24db8cd7aae95796a208a5888e4f6af9c748b891a4dac70c3b8af4ff09decaf12ab3600e71551b45dd22d54e75a9e8b75616fa8eb16d700ed6461f37af35c5eb1696b7fe32b932a89e142ea633d19f27ffadf95769a39cbc591b883bb3556cfc2537893c796c2d6311e9d6a375f4ea7966272a9f5c7e86b769bb687339c69a7267ad7c19f0fb7877c2e0cc7fd22e984ad91d0630a3f002bd1a3973cf43e95cfd8111aa46380a30056924a38e79ad22b43cb9cdc9f31a6ac49e4e2a41e86a8acd9079e7b5491c9f37355a753964cb6af8fa54aae36f5aabe660d4a1890074ada2ec62fb96a3939e4fbd4be673c9aa7e66de7ad481c3f20f5fd2b45730936f72facac17ad3f7b7ad5157cae33835209f0315ba8a6b531bd8f0712826a51367f0acc12e48e79f5a97cd3eb9c578ebccf51a4d58d149f0cb8a5965f95877354124c95e7a1a9249309922b5577a907ca5f11f476d0fc5fa8c6633b44a5d7dd5b918fc0d72f2b4d75968eddfdc6dafa23e317851357d33fb5624ff4ab45f9c01f7d3ffadd7f3af04bf92558f7459c1ea0573cd72b3d1a52525ab28450df272176e7b36053ee3fb4593055760f51c9a5b169cbee6538ff006ab4a7f32655503af5f6a94d58eb4aeb4645a15b132ee618c1c9aef345b948467b31e0573b65642ded4124076f4ab96a4acca32703d4d559df4346f9558f5ad0ae1842ae5c633d2bd73c29e1eb7d02c9c44a7ceb97f367727259f03f400003e95e3bf0fec5b55bd8118662560c7df1cd7bac3200bc0c7a574a574799889fbca3d8d0b76c60f51eb9ab6931073deb3ad9f38c9c735615c8fa7ad689368e5b9ab1c98c724e6a5f3467dea82c836f07b74a915c9c7a538c4cef734e39320639047e55623704633f95650755c738f4e6ad2cdb46413f4ab4ba1849ee5bdfd0034f5971d3bd558e4ddd4e0fad3958ab039f97a56b1d3639e4ee5c8db238a944871d45554c8eb52e07a66ba61732d2e7cfb13f3c1c9f7a9d64dc38e80f38aa11cb9538e2aca36e5e38f6af163e67aaddb62ca9383d69cd27c9f3738f5a810e462abde6a7059c324b34ab144832cee4003eb5be8b7235dc7dcec9e29237c3c6e0a907b8af963c5ea7c3fae5ee9fda190aa9f51d47e95ea1e2cf8f3a6e9a5a0d2e13a84fd03b7ca99fe67f4af20f13dfcbe22bb92fee9552ea6f99827001f415cf5248ecc3f36ad19ebad329c1e2b4ecb52590659b807a1ae4e689d1fd452ab4a081bc85f6ac9596c74c673ea778756573b430f6c56869664b99d460ae4f19ea6b9bd0446220782dea6bbef0ad9adddd073caaf6addb4b43651737a9ed1f0c6c442cac170238fb7a9af47462dd0e08ae13c11750d8e2296448de5c2a0738dcdc9c0f7c7f2aef176ee18fad6d0d52479988baa8cb509609cd5985896c1f4aab1c819704fcd5611f8e09f6adf4398b4bdc67a54d19c7078a8525e7a0c9e39a51275146a66df62d292c41ede953c529c015521909c118cfbd4a92807935a2dac62cb7e61df9a747365704d5512823683cd3d4ede08c1ed5495cc9d99a51c9f264f414be73fb554494203ce47d2a51923ad6b11c5db73e6e6d7ed2dd4f9930c7b0cd51b9f1e5adb03e5472487d7a0af2bbcb79882d1df5d21cf04ca5bf9e6a803ab46f832c776bdbccf95bf418af9ebcb6475babcc7a55cfc46bc941582111e7a6704d79cfc50f15ea3716715bc9312256e501e38ab76f26a21c0fb3c119233b8c85b6fe181589e28b296fade0662ad2a4877103039a579df565d3f7a5a9cc691a66d6f3a51be56f5ed576ee2dc80739f7abf159491200c8453a4b62c33b4d64dbdcf6e115156473735b763512c0b8e9cd741269bbdb81cfbd325d1881b8608f6a6a52dc6e3629d8bf9436a8e457ab7802d8bc2ae46031f4af32b6b222700f7af6af085b2da5bc085b900135aa6ecae6b15d4ddf13597da3429943147501e3753828e390c2b9cf017c7ad5db5fb3d235a863b88de410f9e8a55f24e01f435d56bd329d2dd55c1e2bcb7e1e5a584ff126c85ebac786261c8e0c9fc22ba6326b73cec559c79bb1f5844e463353c72123ad61beacb6862dd86424ab0279520d5eb7d46de6f9965047bf15d319f43c68555236627214e7a53c3f248391eb5561b918cf0411c54de764003207e95d1a8dbd762ca3e0fcb53a309464707f2ace590abff2ab50ca76e0715514e5a2339791617746723934f593700c32306a12f91834aadb46474ad526b4666e48b5e692338e08a905c1c7de6aa226c03d3d714ff347f92287742b5de87c5722b321c8a6daa6f7e7a0348ac4c2393d053adb8e9c715f3d38eb643849b2ca90931c60e6b3751884b218b81bc707d0ff00faeadb7133638e954f53e0c27be4d4a4db3a212b321b466f28093a8e0e7b53a58d08cf4fc2a67004f371dea271c37d2a795bea7d2c24dc532aaed571c0c7bd4a51482081504bd698ac727934927b366f1b486a5b24774ac7a039aeebc29a92f9cfbdc127a570e7ad69e90489579ad545f460f4d11e8d7d0fda226cc98523d7b570365a2c67c75a52c4e491748d91ec41fe95d7b3b1b26c93d3d6b03c15f378ee02dc90ac466aa37bdae79b8b972d36cf58f17e91617b6cb78d16cba69c65d18a17ea39c119e315cc359db58cf1a8f3b6290d8f3dff00c6ba1f1431fecfd3f93cb8cffdf22b9ff1171271c703a568e6d687cb53937d77b9b76fad2c575bd2f2ee354fba16e1f6e3e84d75fe1df13a6364f7924e18e41940e3db200af21919823727f3ad1b17616d190c41c7ad6919caedae868dca2ec99ef2b2865122b6f4f515347743d707deb9ef043b369d06589cc5ce4f5ad05ff583e86bae33eacd69be74d3e86da5c8719ce31e94a9708010723f1ac9818e1b93d28c938c9ef5d119b95fc84edb1aa274038e697cf4accdc463048a783c55f3b45bf71d91ffd9, '2014-12-20 13:13:21', '2015-06-08 19:53:14'),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-01-18 01:08:20', '2015-01-18 01:08:20'),
(4, 4, NULL, NULL, 'shakti', 'singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-02-05 18:05:23', '2015-02-05 18:05:23'),
(5, 5, NULL, NULL, 'shakti', 'singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-05-17 05:33:35', '2015-05-17 05:33:35');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_test_plan`
--

INSERT INTO `user_test_plan` (`id`, `user_id`, `plan_id`, `created_at`, `updated_at`) VALUES
(1, 2, 10, '2015-06-14 12:57:54', '2015-06-14 12:57:54');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_test_plan`
--
ALTER TABLE `user_test_plan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
