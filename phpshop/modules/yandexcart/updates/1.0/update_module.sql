ALTER TABLE `phpshop_products` ADD `cpa` enum('1','2') DEFAULT '1';
ALTER TABLE `phpshop_products` ADD `fee` int(11) DEFAULT '100';
ALTER TABLE `phpshop_modules_yandexcart_system` ADD `status_cancelled_ucm` int(11);
ALTER TABLE `phpshop_modules_yandexcart_system` ADD `status_cancelled_urd` int(11);
ALTER TABLE `phpshop_modules_yandexcart_system` ADD `status_cancelled_urp` int(11);
ALTER TABLE `phpshop_modules_yandexcart_system` ADD `status_cancelled_urq` int(11);
ALTER TABLE `phpshop_modules_yandexcart_system` ADD `status_cancelled_uu` int(11);
ALTER TABLE `phpshop_modules_yandexcart_system` ADD `region_data` text;
ALTER TABLE `phpshop_delivery` ADD `yandex_enabled` enum('1','2') DEFAULT '1';
ALTER TABLE `phpshop_delivery` ADD `yandex_day` int(11) DEFAULT '2';
ALTER TABLE `phpshop_delivery` ADD `yandex_type` enum('1','2','3') DEFAULT '1';
ALTER TABLE `phpshop_delivery` ADD `yandex_payment` enum('1','2','3') DEFAULT '1';
ALTER TABLE `phpshop_delivery` ADD `yandex_outlet` varchar(255) DEFAULT '';
ALTER TABLE `phpshop_delivery` ADD `yandex_check` enum('1','2') DEFAULT '1';
ALTER TABLE `phpshop_products` ADD `manufacturer_warranty` enum('1','2') DEFAULT '2';
ALTER TABLE `phpshop_products` ADD `sales_notes` varchar(50) DEFAULT '';
ALTER TABLE `phpshop_products` ADD `country_of_origin` varchar(50) DEFAULT '';
ALTER TABLE `phpshop_products` ADD `adult` enum('1','2') DEFAULT '2';
ALTER TABLE `phpshop_products` ADD `delivery` enum('1','2') DEFAULT '1';
ALTER TABLE `phpshop_products` ADD `pickup` enum('1','2') DEFAULT '1';
ALTER TABLE `phpshop_products` ADD `store` enum('1','2') DEFAULT '2';
ALTER TABLE `phpshop_sort_categories` ADD `yandex_param` enum('1','2') DEFAULT '1';
ALTER TABLE `phpshop_sort_categories` ADD `yandex_param_unit` varchar(64) DEFAULT '';