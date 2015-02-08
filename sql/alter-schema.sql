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