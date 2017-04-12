-- MySQL Script generated by MySQL Workbench
-- Tue Apr 11 03:22:25 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema room_reservation_system
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema room_reservation_system
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `room_reservation_system` DEFAULT CHARACTER SET utf8 ;
USE `room_reservation_system` ;

-- -----------------------------------------------------
-- Table `room_reservation_system`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `room_reservation_system`.`user` (
  `use_no` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` VARCHAR(60) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NULL,
  `hash` VARCHAR(32) NOT NULL,
  `status` TINYINT UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`use_no`),
  UNIQUE INDEX `hash_UNIQUE` (`hash` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `room_reservation_system`.`meeting_rooms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `room_reservation_system`.`meeting_rooms` (
  `mee_no` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`mee_no`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `room_reservation_system`.`reservations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `room_reservation_system`.`reservations` (
  `res_no` INT(11) NOT NULL AUTO_INCREMENT,
  `mee_no` INT UNSIGNED NOT NULL,
  `use_no` INT UNSIGNED NOT NULL,
  `date` DATE NOT NULL,
  `hour` INT NOT NULL,
  PRIMARY KEY (`res_no`),
  INDEX `fk_reservations_user_idx` (`use_no` ASC),
  INDEX `fk_reservations_meeting_rooms1_idx` (`mee_no` ASC),
  CONSTRAINT `fk_reservations_user`
    FOREIGN KEY (`use_no`)
    REFERENCES `room_reservation_system`.`user` (`use_no`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservations_meeting_rooms1`
    FOREIGN KEY (`mee_no`)
    REFERENCES `room_reservation_system`.`meeting_rooms` (`mee_no`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
