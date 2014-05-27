CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `code` varchar(1024) NOT NULL,
  `description` longtext,
  `tags` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);