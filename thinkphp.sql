CREATE TABLE IF NOT EXISTS `think_data` (   
`id` int(8) unsigned NOT NULL AUTO_INCREMENT,
`data` varchar(255) NOT NULL,   
PRIMARY KEY (`id`) 
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ; 
INSERT INTO `think_data` (`id`, `data`) VALUES 
(1, 'thinkphp'), 
(2, 'php'), 
(3, 'framework');

CREATE TABLE IF NOT EXISTS `think_form` (   
`id` int(8) unsigned NOT NULL AUTO_INCREMENT,   
`title` varchar(255) NOT NULL,   
`content` varchar(255) NOT NULL,
`num` int(8), 
`create_time` int(11) unsigned NOT NULL,   
PRIMARY KEY (`id`) 
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
