ALTER TABLE `phpshop_delivery` ADD `yandex_region_id` int(11) DEFAULT '0';
ALTER TABLE `phpshop_delivery` ADD `yandex_delivery_points` text;

ALTER TABLE `phpshop_products` ADD `price_yandex_dbs` float DEFAULT '0';