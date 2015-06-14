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