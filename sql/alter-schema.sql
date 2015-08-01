-- 6/02/15 nitin
CREATE TABLE IF NOT EXISTS `chat_data` (
`id` int(10) NOT NULL,
  `sender` varchar(256) DEFAULT NULL,
  `receiver` varchar(256) DEFAULT NULL,
  `msg` varchar(1000) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `fr_chat_id` int(10) DEFAULT NULL,
  `created_at` varchar(256) DEFAULT NULL,
  `updated_at` varchar(256) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=418 DEFAULT CHARSET=latin1;

ALTER TABLE `chat_data`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);
ALTER TABLE `chat_data`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=418;

CREATE TABLE IF NOT EXISTS `chat_users` (
`id` int(11) NOT NULL,
  `cname` varchar(256) NOT NULL,
  `cemail` varchar(256) NOT NULL,
  `cmob` int(11) NOT NULL,
  `updated_at` varchar(256) NOT NULL,
  `created_at` varchar(256) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;

INSERT INTO `chat_users` (`id`, `cname`, `cemail`, `cmob`, `updated_at`, `created_at`, `status`) VALUES
(166, 'admin', 'admin', 123, '', '', 1);

ALTER TABLE `chat_users`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `chat_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=167; 

-- 8/02/15 shakti

CREATE TABLE IF NOT EXISTS `discussion_forum` (
`id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE `discussion_forum`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `discussion_forum`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `test_history` ADD `test_company_id` INT NOT NULL AFTER `user_id`, ADD `test_subject_id` INT NOT NULL AFTER `test_company_id`, ADD `test_difficulty_level` INT NOT NULL AFTER `test_subject_id`, ADD `test_type` VARCHAR(45) NOT NULL AFTER `test_difficulty_level`, ADD `test_question_type` VARCHAR(45) NOT NULL AFTER `test_type`;
ALTER TABLE `test_history` ADD `end_time` DATETIME NOT NULL AFTER `test_question_type`;
ALTER TABLE `test_history` ADD `test_status` ENUM('skipped','completed') NOT NULL DEFAULT 'skipped' AFTER `end_time`;
ALTER TABLE `test_questions` ADD `test_plan_id` INT NOT NULL AFTER `study_solution_image`;
ALTER TABLE `test_questions` CHANGE `test_plan_id` `test_plan_ids` VARCHAR(255) NOT NULL;
ALTER TABLE `videos` ADD `test_plan_id` INT NOT NULL AFTER `video_category_value`;
ALTER TABLE `videos` CHANGE `test_plan_id` `test_plan_ids` VARCHAR(255) NOT NULL;


-- 01-08-2015---


CREATE TABLE IF NOT EXISTS `degrees` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'M.C.A.', '2015-08-01 18:47:57', '0000-00-00 00:00:00'),
(2, 'B.Sc.(I.T.)', '2015-08-01 18:47:57', '0000-00-00 00:00:00'),
(3, '12th', '2015-08-01 18:48:18', '0000-00-00 00:00:00'),
(4, '10th', '2015-08-01 18:48:18', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;



CREATE TABLE IF NOT EXISTS `user_company` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` varchar(100) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_company`
--

INSERT INTO `user_company` (`id`, `user_id`, `company_id`, `from_date`, `to_date`, `created_at`, `updated_at`) VALUES
(1, 1, '3', '2014-03-01', '2015-08-01', '2015-08-01 18:52:31', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_company`
--
ALTER TABLE `user_company`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_company`
--
ALTER TABLE `user_company`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;

CREATE TABLE IF NOT EXISTS `user_degree` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `degree_id` int(100) NOT NULL,
  `year` int(11) NOT NULL,
  `grade` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_degree`
--

INSERT INTO `user_degree` (`id`, `user_id`, `degree_id`, `year`, `grade`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 2014, 61, '2015-08-01 18:50:05', '0000-00-00 00:00:00'),
(2, 1, 3, 2011, 69, '2015-08-01 18:50:05', '0000-00-00 00:00:00'),
(3, 1, 2, 2008, 70, '2015-08-01 18:50:42', '0000-00-00 00:00:00'),
(4, 1, 1, 2014, 70, '2015-08-01 18:50:42', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_degree`
--
ALTER TABLE `user_degree`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_degree`
--
ALTER TABLE `user_degree`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;

CREATE TABLE IF NOT EXISTS `user_skills` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_skills`
--

INSERT INTO `user_skills` (`id`, `user_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2015-08-01 18:56:33', '0000-00-00 00:00:00'),
(2, 1, 2, '2015-08-01 18:56:38', '0000-00-00 00:00:00'),
(3, 1, 3, '2015-08-01 18:56:42', '0000-00-00 00:00:00'),
(4, 1, 4, '2015-08-01 18:56:45', '0000-00-00 00:00:00'),
(5, 1, 5, '2015-08-01 18:56:49', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;

CREATE TABLE IF NOT EXISTS `technical_skills` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `technical_skills`
--

INSERT INTO `technical_skills` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'C', '2015-08-01 18:53:19', '0000-00-00 00:00:00'),
(2, 'C++', '2015-08-01 18:53:19', '0000-00-00 00:00:00'),
(3, 'Java', '2015-08-01 18:53:31', '0000-00-00 00:00:00'),
(4, 'PHP', '2015-08-01 18:53:31', '0000-00-00 00:00:00'),
(5, 'SQL', '2015-08-01 18:57:10', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `technical_skills`
--
ALTER TABLE `technical_skills`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `technical_skills`
--
ALTER TABLE `technical_skills`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;