SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `zangura_main_db` ;
CREATE SCHEMA IF NOT EXISTS `zangura_main_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `zangura_main_db` ;

-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_users` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_users` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(1000) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `type` ENUM('zangu','vendor','guest') NULL,
  `created_at` DATETIME NULL,
  `last_updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_secure`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_secure` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_secure` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT NOT NULL,
  `is_verified` TINYINT NOT NULL DEFAULT 0,
  `unique_key` VARCHAR(1000) NOT NULL,
  `verification_mail_security_code` VARCHAR(1000) NOT NULL DEFAULT 0,
  `is_forgot_password` TINYINT NOT NULL DEFAULT 0,
  `is_account_blocked` TINYINT NOT NULL DEFAULT 0,
  `invalid_login_attempts` INT(25) NOT NULL DEFAULT 0,
  `invalid_login_attempts_ip` VARCHAR(255) NULL,
  `account_unblock_security_code` VARCHAR(1000) NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_secure_1_idx` (`user_id` ASC),
  CONSTRAINT `fk_z_secure_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `zangura_main_db`.`z_users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_account_mail_status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_account_mail_status` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_account_mail_status` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT NOT NULL,
  `account_status` ENUM('active', 'blocked') NOT NULL DEFAULT 'active',
  `is_verified` ENUM('0','1') NOT NULL DEFAULT '0',
  `is_verification_mail_sent` ENUM('0','1') NOT NULL DEFAULT '0',
  `is_three_day_verification_mail_sent` ENUM('0','1') NOT NULL DEFAULT '0',
  `is_seven_day_verification_mail_sent` ENUM('0','1') NOT NULL DEFAULT '0',
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_acc_ms_1_idx` (`user_id` ASC),
  CONSTRAINT `fk_z_acc_ms_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `zangura_main_db`.`z_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_cities`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_cities` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_cities` (
  `id` INT(25) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_location`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_location` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_location` (
  `id` BIGINT NOT NULL,
  `name` VARCHAR(1000) NOT NULL,
  `latitude` VARCHAR(255) NULL,
  `longitude` VARCHAR(255) NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `last_updated_at_UNIQUE` (`last_updated_at` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_user_details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_user_details` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_user_details` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT NOT NULL,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NULL,
  `mobile_number` VARCHAR(45) NULL,
  `city_id` INT(25) NULL,
  `location_id` BIGINT NULL,
  `profile_pic` VARCHAR(1000) NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_user_details_1_idx` (`user_id` ASC),
  INDEX `fk_z_user_details_2_idx` (`city_id` ASC),
  INDEX `fk_z_user_details_3_idx` (`location_id` ASC),
  CONSTRAINT `fk_z_user_details_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `zangura_main_db`.`z_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_z_user_details_2`
    FOREIGN KEY (`city_id`)
    REFERENCES `zangura_main_db`.`z_cities` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_z_user_details_3`
    FOREIGN KEY (`location_id`)
    REFERENCES `zangura_main_db`.`z_location` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_zangus`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_zangus` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_zangus` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT NOT NULL,
  `follower_count` INT(25) NULL DEFAULT 0,
  `following_count` INT(25) NULL DEFAULT 0,
  `recommended_count` INT(25) NULL DEFAULT 0,
  `saved_shops_count` INT(25) NULL DEFAULT 0,
  `reviews_count` INT(25) NULL DEFAULT 0,
  `rating` INT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_zangus_1_idx` (`user_id` ASC),
  CONSTRAINT `fk_z_zangus_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `zangura_main_db`.`z_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_vendor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_vendor` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_vendor` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT NOT NULL,
  `is_verified_vendor` ENUM('0','1') NOT NULL DEFAULT '0',
  `website` VARCHAR(255) NULL,
  `business_name` VARCHAR(255) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_vendor_1_idx` (`user_id` ASC),
  CONSTRAINT `fk_z_vendor_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `zangura_main_db`.`z_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_sales_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_sales_users` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_sales_users` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `login_id` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `type` ENUM('employee','manager','admin') NOT NULL DEFAULT 'employee',
  `status` ENUM('0','1') NOT NULL DEFAULT '1',
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_shops`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_shops` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_shops` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `is_active` ENUM('0','1') NOT NULL DEFAULT '0',
  `banner` VARCHAR(1000) NOT NULL DEFAULT 'default_shop_image.jpg',
  `type` ENUM('a','b','c') NOT NULL DEFAULT 'a',
  `name` VARCHAR(255) NOT NULL,
  `description` LONGTEXT NULL,
  `discount` INT(255) NULL,
  `offer` VARCHAR(255) NULL,
  `rating` INT NOT NULL DEFAULT 0,
  `views` BIGINT NOT NULL DEFAULT 0,
  `contact_number` VARCHAR(255) NULL,
  `adress` LONGTEXT NULL,
  `pincode` INT NULL,
  `location_id` BIGINT NULL,
  `landmark` BIGINT NULL,
  `shop_status` ENUM('open','opening soon', 'temporary closed', 'closed') NOT NULL DEFAULT 'open',
  `website` VARCHAR(255) NULL,
  `shop_creater_id` BIGINT NOT NULL,
  `is_verified` ENUM('0','1') NOT NULL DEFAULT '0',
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_shops_2_idx` (`location_id` ASC),
  INDEX `fk_z_shops_1_idx` (`shop_creater_id` ASC),
  CONSTRAINT `fk_z_shops_2`
    FOREIGN KEY (`location_id`)
    REFERENCES `zangura_main_db`.`z_location` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_z_shops_1`
    FOREIGN KEY (`shop_creater_id`)
    REFERENCES `zangura_main_db`.`z_sales_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_shop_photos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_shop_photos` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_shop_photos` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `shop_id` BIGINT NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `path` VARCHAR(1000) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_shop_photos_1_idx` (`shop_id` ASC),
  CONSTRAINT `fk_z_shop_photos_1`
    FOREIGN KEY (`shop_id`)
    REFERENCES `zangura_main_db`.`z_shops` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_shop_users_viewed`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_shop_users_viewed` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_shop_users_viewed` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `shop_id` BIGINT NOT NULL,
  `zangu_id` BIGINT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_shop_users_viewed_1_idx` (`shop_id` ASC),
  INDEX `fk_z_shop_users_viewed_2_idx` (`zangu_id` ASC),
  CONSTRAINT `fk_z_shop_users_viewed_1`
    FOREIGN KEY (`shop_id`)
    REFERENCES `zangura_main_db`.`z_shops` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_z_shop_users_viewed_2`
    FOREIGN KEY (`zangu_id`)
    REFERENCES `zangura_main_db`.`z_zangus` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_shop_followers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_shop_followers` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_shop_followers` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `shop_id` BIGINT NOT NULL,
  `zangu_id` BIGINT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_shop_followers_1_idx` (`shop_id` ASC),
  INDEX `fk_z_shop_followers_2_idx` (`zangu_id` ASC),
  CONSTRAINT `fk_z_shop_followers_1`
    FOREIGN KEY (`shop_id`)
    REFERENCES `zangura_main_db`.`z_shops` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_z_shop_followers_2`
    FOREIGN KEY (`zangu_id`)
    REFERENCES `zangura_main_db`.`z_zangus` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_categories` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_categories` (
  `id` INT(25) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_shop_categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_shop_categories` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_shop_categories` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `shop_id` BIGINT NOT NULL,
  `category_id` INT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_shop_categories_1_idx` (`category_id` ASC),
  INDEX `fk_z_shop_categories_2_idx` (`shop_id` ASC),
  CONSTRAINT `fk_z_shop_categories_1`
    FOREIGN KEY (`category_id`)
    REFERENCES `zangura_main_db`.`z_categories` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_z_shop_categories_2`
    FOREIGN KEY (`shop_id`)
    REFERENCES `zangura_main_db`.`z_shops` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_shop_reviews`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_shop_reviews` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_shop_reviews` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `shop_id` BIGINT NOT NULL,
  `zangu_id` BIGINT NOT NULL,
  `review` LONGTEXT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_shop_categories_2_idx` (`shop_id` ASC),
  INDEX `fk_z_shop_categories_10_idx` (`zangu_id` ASC),
  CONSTRAINT `fk_z_shop_reviews_10`
    FOREIGN KEY (`zangu_id`)
    REFERENCES `zangura_main_db`.`z_zangus` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_z_shop_reviews_20`
    FOREIGN KEY (`shop_id`)
    REFERENCES `zangura_main_db`.`z_shops` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_shop_reviews_likes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_shop_reviews_likes` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_shop_reviews_likes` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `review_id` BIGINT NOT NULL,
  `zangu_id` BIGINT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_shop_categories_21_idx` (`zangu_id` ASC),
  CONSTRAINT `fk_z_shop_reviews_likes_1`
    FOREIGN KEY (`review_id`)
    REFERENCES `zangura_main_db`.`z_shop_reviews` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_z_shop_reviews_likes_2`
    FOREIGN KEY (`zangu_id`)
    REFERENCES `zangura_main_db`.`z_zangus` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_shop_items`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_shop_items` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_shop_items` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `shop_id` BIGINT NOT NULL,
  `vendor_id` BIGINT NOT NULL,
  `is_active` ENUM('0','1') NOT NULL DEFAULT '0',
  `name` VARCHAR(255) NOT NULL,
  `category_id` INT NOT NULL,
  `description` VARCHAR(1000) NULL,
  `price` VARCHAR(255) NOT NULL,
  `discount` INT(25) NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_shop_items_1_idx` (`shop_id` ASC),
  INDEX `fk_z_shop_items_2_idx` (`vendor_id` ASC),
  INDEX `fk_z_shop_items_3_idx` (`category_id` ASC),
  CONSTRAINT `fk_z_shop_items_1`
    FOREIGN KEY (`shop_id`)
    REFERENCES `zangura_main_db`.`z_shops` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_z_shop_items_2`
    FOREIGN KEY (`vendor_id`)
    REFERENCES `zangura_main_db`.`z_vendor` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_z_shop_items_3`
    FOREIGN KEY (`category_id`)
    REFERENCES `zangura_main_db`.`z_categories` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_shop_item_photos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_shop_item_photos` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_shop_item_photos` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `shop_item_id` BIGINT NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `path` VARCHAR(1000) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_shop_item_photos_1_idx` (`shop_item_id` ASC),
  CONSTRAINT `fk_z_shop_item_photos_1`
    FOREIGN KEY (`shop_item_id`)
    REFERENCES `zangura_main_db`.`z_shop_items` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_item_colors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_item_colors` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_item_colors` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `item_id` BIGINT NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `code` VARCHAR(100) NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_item_colors_1_idx` (`item_id` ASC),
  CONSTRAINT `fk_z_item_colors_1`
    FOREIGN KEY (`item_id`)
    REFERENCES `zangura_main_db`.`z_shop_items` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_zangu_followers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_zangu_followers` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_zangu_followers` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `zangu_id` BIGINT NOT NULL,
  `follower_zangu_id` BIGINT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_zangu_followers_1_idx` (`zangu_id` ASC),
  INDEX `fk_z_zangu_followers_2_idx` (`follower_zangu_id` ASC),
  CONSTRAINT `fk_z_zangu_followers_1`
    FOREIGN KEY (`zangu_id`)
    REFERENCES `zangura_main_db`.`z_zangus` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_z_zangu_followers_2`
    FOREIGN KEY (`follower_zangu_id`)
    REFERENCES `zangura_main_db`.`z_zangus` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_item_size`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_item_size` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_item_size` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `item_id` BIGINT NOT NULL,
  `size` ENUM('XS','S','M','L','XL','XXL','XXXL') NOT NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_item_colors_1_idx` (`item_id` ASC),
  CONSTRAINT `fk_z_item_size_1`
    FOREIGN KEY (`item_id`)
    REFERENCES `zangura_main_db`.`z_shop_items` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_shops_recommends`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_shops_recommends` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_shops_recommends` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `shop_id` BIGINT NOT NULL,
  `recommender_zangu_id` BIGINT NOT NULL,
  `recommend_to_zangu_id` BIGINT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_shops_recommends_1_idx` (`shop_id` ASC),
  INDEX `fk_z_shops_recommends_2_idx` (`recommender_zangu_id` ASC),
  INDEX `fk_z_shops_recommends_3_idx` (`recommend_to_zangu_id` ASC),
  CONSTRAINT `fk_z_shops_recommends_1`
    FOREIGN KEY (`shop_id`)
    REFERENCES `zangura_main_db`.`z_shops` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_z_shops_recommends_2`
    FOREIGN KEY (`recommender_zangu_id`)
    REFERENCES `zangura_main_db`.`z_zangus` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_z_shops_recommends_3`
    FOREIGN KEY (`recommend_to_zangu_id`)
    REFERENCES `zangura_main_db`.`z_zangus` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_saved_shops`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_saved_shops` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_saved_shops` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `zangu_id` BIGINT NOT NULL,
  `shop_id` BIGINT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_saved_shops_1_idx` (`zangu_id` ASC),
  INDEX `fk_z_saved_shops_2_idx` (`shop_id` ASC),
  CONSTRAINT `fk_z_saved_shops_1`
    FOREIGN KEY (`zangu_id`)
    REFERENCES `zangura_main_db`.`z_zangus` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_z_saved_shops_2`
    FOREIGN KEY (`shop_id`)
    REFERENCES `zangura_main_db`.`z_shops` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_logs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_logs` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_logs` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT NOT NULL,
  `login_count` INT(25) NOT NULL,
  `last_login_ip` VARCHAR(255) NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_logs_1_idx` (`user_id` ASC),
  CONSTRAINT `fk_z_logs_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `zangura_main_db`.`z_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_notifications`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_notifications` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_notifications` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_saved_items`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_saved_items` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_saved_items` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `zangu_id` BIGINT NOT NULL,
  `item_id` BIGINT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_saved_shops_1_idx` (`zangu_id` ASC),
  INDEX `fk_z_saved_shops_20_idx` (`item_id` ASC),
  CONSTRAINT `fk_z_saved_items_1`
    FOREIGN KEY (`zangu_id`)
    REFERENCES `zangura_main_db`.`z_zangus` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_z_saved_items_2`
    FOREIGN KEY (`item_id`)
    REFERENCES `zangura_main_db`.`z_shop_items` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_sales_managers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_sales_managers` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_sales_managers` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `manager_id` BIGINT NOT NULL,
  `employee_id` BIGINT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_sales_managers_1_idx` (`manager_id` ASC),
  INDEX `fk_sales_managers_2_idx` (`employee_id` ASC),
  CONSTRAINT `fk_sales_managers_1`
    FOREIGN KEY (`manager_id`)
    REFERENCES `zangura_main_db`.`z_sales_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_sales_managers_2`
    FOREIGN KEY (`employee_id`)
    REFERENCES `zangura_main_db`.`z_sales_users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zangura_main_db`.`z_vendors_shops`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zangura_main_db`.`z_vendors_shops` ;

CREATE TABLE IF NOT EXISTS `zangura_main_db`.`z_vendors_shops` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `vendor_id` BIGINT NOT NULL,
  `shop_id` BIGINT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `last_updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_z_vendors_shops_1_idx` (`shop_id` ASC),
  INDEX `fk_z_vendors_shops_2_idx` (`vendor_id` ASC),
  CONSTRAINT `fk_z_vendors_shops_1`
    FOREIGN KEY (`shop_id`)
    REFERENCES `zangura_main_db`.`z_shops` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_z_vendors_shops_2`
    FOREIGN KEY (`vendor_id`)
    REFERENCES `zangura_main_db`.`z_vendor` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
