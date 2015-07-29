ALTER TABLE  `z_shops` ADD  `twitter_url` VARCHAR( 255 ) NULL AFTER  `website` ,
ADD  `facebook_url` VARCHAR( 255 ) NULL AFTER  `twitter_url` ,
ADD  `other_Details` VARCHAR( 1000 ) NULL AFTER  `facebook_url` ;

ALTER TABLE  `z_shops` CHANGE  `adress`  `address` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;

ALTER TABLE  `z_shops` CHANGE  `type`  `type` ENUM(  'Normal',  'Economical',  'High',  'Elite',  'Luxury' ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT  'Normal';

ALTER TABLE  `z_shops` ADD  `size` ENUM(  'Small',  'Medium',  'Big',  '' ) NOT NULL DEFAULT  'Small' AFTER  `type` ;





ALTER TABLE  `z_shops` ADD  `online_delivery` TINYINT( 3 ) NOT NULL DEFAULT  '0' AFTER  `landmark` ,
ADD  `min_price` INT( 25 ) NOT NULL DEFAULT  '0' AFTER  `online_delivery` ,
ADD  `max_price` INT( 25 ) NOT NULL DEFAULT  '0' AFTER  `min_price` ;

ALTER TABLE  `z_shops` ADD  `timings_from` VARCHAR( 255 ) NOT NULL AFTER  `online_delivery` ,
ADD  `timings_to` VARCHAR( 255 ) NOT NULL AFTER  `timings_from` ;

ALTER TABLE  `z_shops` ADD  `shop_email` VARCHAR( 255 ) NULL AFTER  `is_active` ;

ALTER TABLE  `z_shops` CHANGE  `other_Details`  `other_details` VARCHAR( 1000 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;

CREATE TABLE `z_shops_map` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `latitude` varchar(255) NOT NULL,
 `longitude` varchar(255) NOT NULL,
 `created_at` datetime NOT NULL,
 `last_updated_at` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

ALTER TABLE  `z_shops` ADD  `map_id` INT NOT NULL AFTER  `location_id` ;
ALTER TABLE  `z_shops` ADD INDEX (  `map_id` ) ;
ALTER TABLE  `z_shops` ADD FOREIGN KEY (  `map_id` ) REFERENCES  `zangura_main_db`.`z_shops_map` (`id`) ON DELETE CASCADE ON UPDATE CASCADE ;
ALTER TABLE  `z_locations` DROP  `latitude` ,
DROP  `longitude` ;

