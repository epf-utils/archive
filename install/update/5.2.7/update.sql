ALTER TABLE `phpshop_slider` ADD `servers` varchar(64) default '';
ALTER TABLE `phpshop_servers` ADD `title` varchar(255) default '';
ALTER TABLE `phpshop_servers` ADD `descrip` varchar(255) default '';
ALTER TABLE `phpshop_search_base` ADD `category` int(11) DEFAULT '0';
ALTER TABLE `phpshop_products` ADD `parent2` text;
ALTER TABLE `phpshop_products` ADD `color` varchar(64);

CREATE TABLE IF NOT EXISTS `phpshop_templates_key` (
  `path` varchar(64) NOT NULL DEFAULT '',
  `date` int(11) DEFAULT '0',
  `key` text,
  `verification` varchar(32) DEFAULT '',
  PRIMARY KEY (`path`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

CREATE TABLE IF NOT EXISTS `phpshop_parent_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `enabled` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251;

ALTER TABLE `phpshop_categories` ADD `parent_title` int(11) DEFAULT '0';
ALTER TABLE `phpshop_order_status` ADD `mail_action` ENUM( "0", "1" ) DEFAULT '1';