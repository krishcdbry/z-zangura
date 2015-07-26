ALTER TABLE  `z_shops` ADD  `twitter_url` VARCHAR( 255 ) NULL AFTER  `website` ,
ADD  `facebook_url` VARCHAR( 255 ) NULL AFTER  `twitter_url` ,
ADD  `other_Details` VARCHAR( 1000 ) NULL AFTER  `facebook_url` ;

ALTER TABLE  `z_shops` CHANGE  `adress`  `address` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;
