ALTER TABLE `phpshop_modules_ozonseller_system` ADD `type` enum('1','2') NOT NULL default '1';
ALTER TABLE `phpshop_modules_ozonseller_system` ADD `warehouse_id`  VARCHAR(255) NOT NULL;
ALTER TABLE `phpshop_products` ADD `export_ozon_id` int(11) DEFAULT 0;