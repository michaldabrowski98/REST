CREATE TABLE IF NOT EXISTS `usersx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT 'nazwa uzytkownika',
  `birthdate` int(11) NOT NULL DEFAULT '0' COMMENT 'data urodzin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=3 ;

INSERT INTO `usersx` (`id`, `name`, `birthdate`) VALUES
(1, 'Radek', 960158834),
(2, 'Maciek', 379122434);