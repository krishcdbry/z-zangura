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