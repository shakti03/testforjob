-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2015 at 08:30 PM
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
-- Table structure for table `chapters`
--

CREATE TABLE IF NOT EXISTS `chapters` (
`id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'TCS', '2015-02-03 21:45:28', '2015-02-03 21:45:28'),
(2, 'C++', '2015-02-03 21:45:28', '2015-02-03 21:45:28'),
(3, 'C++', '2015-02-03 21:45:28', '2015-02-03 21:45:28'),
(4, 'C++', '2015-02-03 21:45:29', '2015-02-03 21:45:29'),
(5, 'C++', '2015-02-03 21:45:29', '2015-02-03 21:45:29'),
(6, 'C++', '2015-02-03 21:45:29', '2015-02-03 21:45:29'),
(7, 'WIPRO', '2015-02-03 21:45:29', '2015-02-03 21:45:29'),
(8, 'C++', '2015-02-03 21:45:29', '2015-02-03 21:45:29'),
(9, 'C++', '2015-02-03 21:45:29', '2015-02-03 21:45:29'),
(10, 'C++', '2015-02-03 21:45:29', '2015-02-03 21:45:29'),
(11, 'C++', '2015-02-03 21:45:29', '2015-02-03 21:45:29'),
(12, 'C++', '2015-02-03 21:45:29', '2015-02-03 21:45:29'),
(13, 'C++', '2015-02-03 21:45:29', '2015-02-03 21:45:29'),
(14, 'Infosys', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(15, 'C++', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(16, '-', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(17, '-', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(18, '-', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(19, '-', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(20, '-', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(21, '-', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(22, '-', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(23, '-', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(24, '-', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(25, '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(26, '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(27, '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(28, '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(29, '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(30, '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(31, '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(32, '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(33, '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(34, '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(35, NULL, '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(36, NULL, '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(37, NULL, '2015-02-03 21:45:32', '2015-02-03 21:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `difficulty_levels`
--

CREATE TABLE IF NOT EXISTS `difficulty_levels` (
`id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `test_type_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `difficulty_levels`
--

INSERT INTO `difficulty_levels` (`id`, `name`, `test_type_id`, `created_at`, `updated_at`) VALUES
(1, 'Beginner', 1, NULL, NULL),
(2, 'Intermediate', 1, NULL, NULL),
(3, 'Advanced', 1, NULL, NULL),
(4, 'Expert', 1, NULL, NULL);

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
-- Table structure for table `objective_questions`
--

CREATE TABLE IF NOT EXISTS `objective_questions` (
`id` int(11) NOT NULL,
  `test_type_id` int(11) DEFAULT NULL,
  `question_no` int(11) DEFAULT NULL,
  `difficulty_level` enum('beginner','advanced') DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `question` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `option_a` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `option_b` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `option_c` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `option_d` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `objective_questions`
--

INSERT INTO `objective_questions` (`id`, `test_type_id`, `question_no`, `difficulty_level`, `subject_id`, `company_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'beginner', 2, 1, 'Which of the following type of class allows only one object of it to be created?', 'A. Virtual class', 'B. Abstract class\n', '\nC. Singleton class\n', '\nD. Friend class', 'C', '2015-02-03 21:45:28', '2015-02-03 21:45:28'),
(2, 1, NULL, 'beginner', 3, 1, ' \nWhich of the following is not a type of constructor?\n\n', ' \n\n\nA. Copy constructor\n-', ' \n\nB. Friend constructor\n-', 'C. Default constructor\n', '\nD. Parameterized constructor-', 'B', '2015-02-03 21:45:28', '2015-02-03 21:45:28'),
(3, 1, NULL, 'beginner', 4, 1, ' \nWhich of the following statements is correct?\n\n', 'A. Base class pointer cannot point to derived class.\n', 'B. Derived class pointer cannot point to base class.\n', 'C. Pointer to derived class cannot be created.\n.----', 'D. Pointer to base class cannot be created-', 'B', '2015-02-03 21:45:29', '2015-02-03 21:45:29'),
(4, 1, NULL, 'beginner', 5, 1, 'Which of the following is not the member of class?\n\n-', 'A. Static function\n', 'B. Friend function\n--', 'C. Const function\n-', 'D. Virtual function-', 'B', '2015-02-03 21:45:29', '2015-02-03 21:45:29'),
(5, 1, NULL, 'beginner', 6, 1, 'Which of the following concepts means determining at runtime what method to invoke?\n\n', 'A. Data hiding', 'B. Dynamic Typing', 'C. Dynamic binding-', 'D. Dynamic loading--', 'c', '2015-02-03 21:45:29', '2015-02-03 21:45:29'),
(6, 1, NULL, 'beginner', 8, 7, '  \nWhich of the following term is used for a function defined inside a class?\n-', '\nA. Member Variable\n', 'B. Member function\n', 'C. Class function\n', 'D. Classic function', 'B', '2015-02-03 21:45:29', '2015-02-03 21:45:29'),
(7, 1, NULL, 'beginner', 9, 7, 'Which of the following concept of oops allows compiler to insert arguments in a function call if it is not specified?\n\n', 'A. Call by value\n', 'B. Call by reference\n', 'C. Default arguments\n-', 'D. Call by pointer', 'C', '2015-02-03 21:45:29', '2015-02-03 21:45:29'),
(8, 1, NULL, 'beginner', 10, 7, ' \nHow many instances of an abstract class can be created?\n\n', 'A. 1 \n', 'B.5', 'C.13', 'D.0', 'D', '2015-02-03 21:45:29', '2015-02-03 21:45:29'),
(9, 1, NULL, 'beginner', 11, 7, 'Which of the following cannot be friend?\n\n', 'A. Function\n', 'B. Class\n', 'C. Object\n', 'D. Operator function', 'C', '2015-02-03 21:45:29', '2015-02-03 21:45:29'),
(10, 1, NULL, 'beginner', 12, 7, 'Which of the following concepts of OOPS means exposing only necessary information to client?\n\n', 'A. Encapsulation\n', 'B. Abstraction\n', 'C. Data hiding\n', 'D. Data binding', 'C', '2015-02-03 21:45:29', '2015-02-03 21:45:29'),
(11, 1, NULL, 'beginner', 13, 7, ' \nWhy reference is not same as a pointer?\n\n', 'A. A reference can never be null.\n', 'B. A reference once established cannot be changed.\n', 'C. Reference doesn''t need an explicit dereferencing mechanism.\n', 'D. All of the above.', 'D', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(12, 1, NULL, 'beginner', 15, 14, '\ncout is a/an __________ .\n\n', 'A. operator\n', ' B. function\n', '\nC. object ', ' D. macro-', 'C', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(13, 1, NULL, 'beginner', 16, 14, 'Which of the following concepts provides facility of using object of one class inside another class?\n\n', 'A. Encapsulation ', 'B. Abstraction\n', '\nC. Composition', ' D. Inheritance', 'C', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(14, 1, NULL, 'beginner', 17, 14, '  \nHow many types of polymorphisms are supported by C++?\n\n', 'A. 1 ', ' B. 2\n', '\nC. 3', ' D. 4', 'B', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(15, 1, NULL, 'beginner', 18, 14, '  \nWhich of the following is an abstract data type?\n\n', 'A. int ', ' B. double\n', '\nC. string ', ' D. Class', 'D', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(16, 1, NULL, 'beginner', 19, 14, '  \nWhich of the following concepts means adding new components to a program as it runs?\n\n', 'A. Data hiding\n', 'B. Dynamic typing\n', 'C. Dynamic binding\n-', 'D. Dynamic loading', 'D', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(17, 1, NULL, 'beginner', 20, 14, 'Which of the following statement is correct?\n\n', 'A. A constructor is called at the time of declaration of an object.\n', 'B. A constructor is called at the time of use of an object.\n', 'C. A constructor is called at the time of declaration of a class.\n', 'D. A constructor is called at the time of use of a class', 'A', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(18, 1, NULL, 'beginner', 21, 14, 'Which of the following correctly describes overloading of functions?\n\n', 'A. Virtual polymorphism\n', 'B. Transient polymorphism\n', 'C. Ad-hoc polymorphism\n', 'D. Pseudo polymorphism', 'C', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(19, 1, NULL, 'beginner', 22, 14, 'Which of the following approach is adapted by C++?\n\n', 'A. Top-down \n', 'B.Bottom-up', 'C. Right-left-', ' D. Left-right', 'B', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(20, 1, NULL, 'beginner', 23, 14, 'What happens when we try to compile the class definition in following code snippet?class Birds {};\nclass Peacock : protected Birds {};', 'A. It will not compile because class body of Birds is not defined.\n', 'B. It will not compile because class body of Peacock is not defined.\n', 'C. It will not compile because a class cannot be protectedly inherited from other class.\n', 'D. It will compile succesfully.-', 'D', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(21, 1, NULL, '', 24, 16, NULL, NULL, '-', '-', '-', 'D', '2015-02-03 21:45:30', '2015-02-03 21:45:30'),
(22, 1, NULL, '', 25, 16, NULL, NULL, '-', '-', '-', '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(23, 1, NULL, '', 26, 16, NULL, NULL, '-', '-', '-', '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(24, 1, NULL, '', 27, 16, NULL, NULL, '-', '-', '-', '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(25, 1, NULL, '', 28, 16, NULL, NULL, '-', '-', '-', '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(26, 1, NULL, '', 29, 16, NULL, '-', '-', '-', '-', '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(27, 1, NULL, 'advanced', 30, 16, NULL, '-', '-', '-', '-', '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(28, 1, NULL, 'advanced', 31, 16, NULL, '-', '-', '-', '-', '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(29, 1, NULL, 'advanced', 32, 16, NULL, '-', '-', '-', '-', '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(30, 1, NULL, 'advanced', 33, 16, NULL, '-', '-', '-', '-', '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(31, 1, NULL, 'advanced', 34, 16, NULL, '-', '-', '-', '-', '-', '2015-02-03 21:45:31', '2015-02-03 21:45:31'),
(32, 1, NULL, 'advanced', 36, 35, NULL, NULL, NULL, NULL, NULL, NULL, '2015-02-03 21:45:32', '2015-02-03 21:45:32'),
(33, 1, NULL, 'advanced', 37, 35, NULL, NULL, NULL, NULL, NULL, NULL, '2015-02-03 21:45:32', '2015-02-03 21:45:32');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `description`, `permission`, `protected`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '_superadmin', 0, '2014-12-15 12:27:14', '2014-12-15 12:27:14'),
(2, 'user editor', '_user-editor', 0, '2014-12-15 12:27:14', '2014-12-15 12:27:14'),
(3, 'group editor', '_group-editor', 0, '2014-12-15 12:27:14', '2014-12-15 12:27:14'),
(4, 'permission editor', '_permission-editor', 0, '2014-12-15 12:27:14', '2014-12-15 12:27:14'),
(5, 'profile type editor', '_profile-editor', 0, '2014-12-15 12:27:14', '2014-12-15 12:27:14');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test_history`
--

CREATE TABLE IF NOT EXISTS `test_history` (
`id` int(11) NOT NULL,
  `active_test` varchar(500) DEFAULT NULL,
  `answers` varchar(500) DEFAULT NULL,
  `viewed` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `test_option` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `test_option_id` int(11) DEFAULT NULL COMMENT 'subject_id/company id',
  `test_index` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `test_history`
--

INSERT INTO `test_history` (`id`, `active_test`, `answers`, `viewed`, `user_id`, `test_option`, `test_option_id`, `test_index`, `created_at`, `updated_at`) VALUES
(1, '[3,4,5,2,1]', '{"1":"a"}', '[3,4,1]', 2, 'companies', 1, 1, '2015-02-03 21:45:58', '2015-02-03 21:46:13'),
(2, '[2,4,5,3,1]', '{"2":"B","4":"B","5":"C","3":"D"}', '[2,4,5,3]', 2, 'companies', 1, 1, '2015-02-03 21:49:39', '2015-02-03 21:54:35'),
(3, '[4,2,3,1,5]', '{"4":"a"}', '[4]', 2, 'companies', 1, 1, '2015-02-04 13:03:46', '2015-02-04 13:03:56'),
(4, '[27]', NULL, '[27]', 2, 'companies', 16, 2, '2015-02-04 20:44:29', '2015-02-04 20:44:29'),
(5, '[3,4,1,5,2]', '{"2":"a"}', '[3,4,1,5,2]', 2, 'companies', 1, 1, '2015-02-04 20:46:03', '2015-02-04 20:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `test_types`
--

CREATE TABLE IF NOT EXISTS `test_types` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `test_types`
--

INSERT INTO `test_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'aptitude', '2015-01-11 18:40:32', '2015-01-11 18:40:32'),
(2, 'technical', '2015-01-11 18:40:32', '2015-01-11 18:40:32'),
(3, 'HR', '2015-01-11 18:40:42', '2015-01-11 18:40:42');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `banned`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `protected`, `created_at`, `updated_at`) VALUES
(2, 'shaktisingh03@gmail.com', '$2y$10$0PfS95r5aXvua9QegoK2T.KD9MPbib006lSAz0FEMjP9FJF/E2QUW', NULL, 1, 0, NULL, '2014-12-20 13:14:01', '2015-02-05 13:59:16', '$2y$10$BMGXlWPbHboVohUvB0wqUe7Kq.Z7DTAchvJ8rNHYHM.HGWQtU4grq', NULL, 0, '2014-12-20 13:13:21', '2015-02-05 13:59:16'),
(3, 'nitin@gmail.com', '$2y$10$l3zAgIFkLyWT8rFCLBdWSeBIoCeDVzjMXZtBKSZhkrqGsD3IXoTS2', '{"_group-editor":1}', 1, 0, NULL, NULL, '2015-01-18 01:39:13', '$2y$10$htOz8H2r8tSPp/nIzsqFC.xkYWm.L80VsbREM/OB58IAdDJMtttSe', NULL, 0, '2015-01-18 01:08:20', '2015-01-18 01:39:13');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `code`, `vat`, `first_name`, `last_name`, `phone`, `state`, `city`, `country`, `zip`, `address`, `avatar`, `created_at`, `updated_at`) VALUES
(2, 2, NULL, NULL, 'shakti', 'singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-12-20 13:13:21', '2014-12-20 13:13:21'),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-01-18 01:08:20', '2015-01-18 01:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
`id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `link`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'video1', 'https://www.youtube.com/embed/Xn6xXBxCym0', 'http://i1.ytimg.com/vi/Xn6xXBxCym0/default.jpg', NULL, NULL),
(2, 'video2', 'https://www.youtube.com/embed/x07XGXCBUeg', 'http://i1.ytimg.com/vi/x07XGXCBUeg/default.jpg', NULL, NULL),
(3, 'video3', 'https://www.youtube.com/embed/tdTqyalsLt8', 'http://i1.ytimg.com/vi/tdTqyalsLt8/default.jpg', NULL, NULL),
(4, 'video4', 'https://www.youtube.com/embed/kXbu1VoR1oY', 'http://i1.ytimg.com/vi/kXbu1VoR1oY/default.jpg', NULL, NULL),
(5, 'vidoo5', 'https://www.youtube.com/embed/Xn6xXBxCym0', 'http://i1.ytimg.com/vi/Xn6xXBxCym0/default.jpg', NULL, NULL),
(6, 'Video', 'https://www.youtube.com/embed/14wqBA5Q1yc', 'http://i1.ytimg.com/vi/14wqBA5Q1yc/default.jpg', '2015-01-25 00:30:54', '2015-01-25 00:30:54'),
(7, 'Video', 'https://www.youtube.com/embed/14wqBA5Q1yc', 'http://i1.ytimg.com/vi/14wqBA5Q1yc/default.jpg', '2015-01-25 00:31:55', '2015-01-25 00:31:55'),
(8, 'Video', 'https://www.youtube.com/embed/2xldxo8lENI', 'http://i1.ytimg.com/vi/2xldxo8lENI/default.jpg', '2015-01-25 00:34:22', '2015-01-25 00:34:22'),
(9, 'My video', 'https://www.youtube.com/embed/09R8_2nJtjg', 'http://i1.ytimg.com/vi/09R8_2nJtjg/default.jpg', '2015-01-25 01:34:23', '2015-01-25 01:34:23'),
(10, 'Sample Video', 'https://www.youtube.com/embed/OPf0YbXqDm0', 'http://i1.ytimg.com/vi/OPf0YbXqDm0/default.jpg', '2015-01-25 01:52:19', '2015-01-25 01:52:19'),
(11, 'banjara song', 'https://www.youtube.com/embed/rci4uMUYs0U', 'http://i1.ytimg.com/vi/rci4uMUYs0U/default.jpg', '2015-01-25 08:18:54', '2015-01-25 08:18:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `difficulty_levels`
--
ALTER TABLE `difficulty_levels`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Indexes for table `objective_questions`
--
ALTER TABLE `objective_questions`
 ADD PRIMARY KEY (`id`), ADD FULLTEXT KEY `question` (`question`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
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
-- Indexes for table `test_history`
--
ALTER TABLE `test_history`
 ADD PRIMARY KEY (`id`);

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
-- Indexes for table `videos`
--
ALTER TABLE `videos`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `difficulty_levels`
--
ALTER TABLE `difficulty_levels`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `objective_questions`
--
ALTER TABLE `objective_questions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test_history`
--
ALTER TABLE `test_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `test_types`
--
ALTER TABLE `test_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
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
