CREATE SCHEMA 'locBucket';

CREATE TABLE `locBucket`.`User` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(105) NULL,
  `role_id` INT NULL,
  `birthday` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `locBucket`.`locations` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `coordinates` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `type_id` INT NULL,
  `cost` INT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `locBucket`.`role` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `locBucket`.`type` (
  `id` INT NOT NULL,
  `typename` VARCHAR(45) NULL,
PRIMARY KEY (`id`));

CREATE TABLE `locBucket`.`ranking` (
  `user_id` INT NOT NULL,
  `loc_id` INT NULL,
  `value` INT NULL,
  PRIMARY KEY (`user_id`));

CREATE TABLE `locBucket`.`user_loc` (
  `user_id` INT NOT NULL,
  `loc_id` INT NULL,
  `order` VARCHAR(45) NULL,
  `date_vis` VARCHAR(45) NULL,
 PRIMARY KEY (`user_id`));

CREATE TABLE `locBucket`.`pictures` (
  `loc_id` INT NOT NULL,
  `pic_location` VARCHAR(100) NULL,
 PRIMARY KEY (`loc_id`));

CREATE TABLE `locBucket`.`located_in` (
  `loc_id` INT NOT NULL,
  `area_id` VARCHAR(45) NOT NULL,
PRIMARY KEY (`loc_id`, `area_id`));
