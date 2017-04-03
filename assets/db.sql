-- -----------------------------------------------------
-- Schema locBucket
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `locBucket` DEFAULT CHARACTER SET utf8 ;
USE `locBucket` ;

-- -----------------------------------------------------
-- Table `locBucket`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locBucket`.`roles` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `locBucket`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locBucket`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  `email` VARCHAR(50) NULL,
  `password` VARCHAR(100) NULL,
  `role_id` INT NULL,
  `birthday` DATE NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_roles_idx` (`role_id` ASC),
  CONSTRAINT `fk_users_roles`
    FOREIGN KEY (`role_id`)
    REFERENCES `locBucket`.`roles` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `locBucket`.`types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locBucket`.`types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `locBucket`.`locations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locBucket`.`locations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `coordinates` VARCHAR(45) NULL,
  `description` TEXT NULL,
  `type_id` INT NULL,
  `cost` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_locations_types1_idx` (`type_id` ASC),
  CONSTRAINT `fk_locations_types1`
    FOREIGN KEY (`type_id`)
    REFERENCES `locBucket`.`types` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `locBucket`.`rankings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locBucket`.`rankings` (
  `user_id` INT NOT NULL,
  `location_id` INT NOT NULL,
  `ranking` INT NULL,
  PRIMARY KEY (`user_id`, `location_id`),
  INDEX `fk_rankings_locations1_idx` (`location_id` ASC),
  CONSTRAINT `fk_rankings_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `locBucket`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_rankings_locations1`
    FOREIGN KEY (`location_id`)
    REFERENCES `locBucket`.`locations` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `locBucket`.`user_locations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locBucket`.`user_locations` (
  `user_id` INT NOT NULL,
  `location_id` INT NOT NULL,
  `order` INT NULL,
  `date_visited` DATE NULL,
  PRIMARY KEY (`user_id`, `location_id`),
  INDEX `fk_user_locations_locations1_idx` (`location_id` ASC),
  CONSTRAINT `fk_user_locations_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `locBucket`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_user_locations_locations1`
    FOREIGN KEY (`location_id`)
    REFERENCES `locBucket`.`locations` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `locBucket`.`located_in`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locBucket`.`located_in` (
  `loc_id` INT NOT NULL,
  `area_id` INT NOT NULL,
  PRIMARY KEY (`loc_id`, `area_id`),
  INDEX `fk_located_in_locations2_idx` (`area_id` ASC),
  CONSTRAINT `fk_located_in_locations1`
    FOREIGN KEY (`loc_id`)
    REFERENCES `locBucket`.`locations` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_located_in_locations2`
    FOREIGN KEY (`area_id`)
    REFERENCES `locBucket`.`locations` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `locBucket`.`pictures`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locBucket`.`pictures` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `loc_id` INT NULL,
  `pic_location` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pictures_locations1_idx` (`loc_id` ASC),
  CONSTRAINT `fk_pictures_locations1`
    FOREIGN KEY (`loc_id`)
    REFERENCES `locBucket`.`locations` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
