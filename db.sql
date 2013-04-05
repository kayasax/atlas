SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `ecms` DEFAULT CHARACTER SET utf8 ;
USE `ecms` ;

-- -----------------------------------------------------
-- Table `ecms`.`structure`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ecms`.`structure` (
  `id` MEDIUMINT UNSIGNED NOT NULL ,
  `type` VARCHAR(100) NOT NULL ,
  `parent_id` MEDIUMINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecms`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ecms`.`user` (
  `id` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(45) NULL ,
  `password` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecms`.`space`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ecms`.`space` (
  `idspace` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NULL ,
  `parent` MEDIUMINT NOT NULL DEFAULT 1 ,
  `description` TINYTEXT NULL ,
  `createdby` MEDIUMINT UNSIGNED NOT NULL ,
  `creationdate` TIMESTAMP NULL ,
  `lasttouched` TIMESTAMP NULL ,
  `status` VARCHAR(45) NULL ,
  PRIMARY KEY (`idspace`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) ,
  INDEX `fk_space_user1_idx` (`createdby` ASC) ,
  CONSTRAINT `fk_space_user1`
    FOREIGN KEY (`createdby` )
    REFERENCES `ecms`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecms`.`page`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ecms`.`page` (
  `idpage` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `space` MEDIUMINT UNSIGNED NOT NULL ,
  `title` VARCHAR(100) NULL ,
  `intro` TINYTEXT NULL ,
  `content` LONGTEXT NULL ,
  `author` MEDIUMINT UNSIGNED NOT NULL ,
  `creationdate` TIMESTAMP NULL ,
  `lasttouched` TIMESTAMP NULL ,
  `status` TINYINT NULL ,
  `tags` VARCHAR(300) NULL ,
  `version` VARCHAR(5) NULL ,
  PRIMARY KEY (`idpage`) ,
  INDEX `fk_page_space1_idx` (`space` ASC) ,
  CONSTRAINT `fk_page_space`
    FOREIGN KEY (`space` )
    REFERENCES `ecms`.`space` (`idspace` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_page_user`
    FOREIGN KEY (`author` )
    REFERENCES `ecms`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecms`.`revision`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ecms`.`revision` (
  `idpage` MEDIUMINT UNSIGNED NOT NULL ,
  `version` VARCHAR(5) NULL ,
  `content` LONGTEXT NULL ,
  `date` TIMESTAMP NULL ,
  `createdby` MEDIUMINT UNSIGNED NOT NULL ,
  `comment` TINYTEXT NULL ,
  PRIMARY KEY (`idpage`) ,
  INDEX `fk_revision_user1_idx` (`createdby` ASC) ,
  CONSTRAINT `fk_version_page`
    FOREIGN KEY (`idpage` )
    REFERENCES `ecms`.`page` (`idpage` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_revision_user1`
    FOREIGN KEY (`createdby` )
    REFERENCES `ecms`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecms`.`file`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ecms`.`file` (
  `idfile` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `filename` VARCHAR(100) NULL ,
  `mime` VARCHAR(100) NULL ,
  `filedescription` TINYTEXT NULL ,
  `date` DATETIME NULL ,
  `added_by` MEDIUMINT UNSIGNED NOT NULL ,
  `page` MEDIUMINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`idfile`) ,
  INDEX `fk_file_user1_idx` (`added_by` ASC) ,
  INDEX `fk_file_page1_idx` (`page` ASC) ,
  CONSTRAINT `fk_file_user1`
    FOREIGN KEY (`added_by` )
    REFERENCES `ecms`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_file_page1`
    FOREIGN KEY (`page` )
    REFERENCES `ecms`.`page` (`idpage` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'fichiers joints\n';


-- -----------------------------------------------------
-- Table `ecms`.`userprofile`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ecms`.`userprofile` (
  `iduser` MEDIUMINT UNSIGNED NOT NULL ,
  `lastname` VARCHAR(100) NULL ,
  `firstname` VARCHAR(100) NULL ,
  `email` VARCHAR(100) NULL ,
  `status` TINYINT NULL ,
  `lastseen` TIMESTAMP NULL ,
  PRIMARY KEY (`iduser`) ,
  CONSTRAINT `fk_userProfile_user1`
    FOREIGN KEY (`iduser` )
    REFERENCES `ecms`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecms`.`empathy`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ecms`.`empathy` (
  `page` MEDIUMINT UNSIGNED NOT NULL ,
  `user` MEDIUMINT UNSIGNED NOT NULL ,
  `love` ENUM('-1','1') NULL ,
  PRIMARY KEY (`page`) ,
  CONSTRAINT `fk_Empathy_page`
    FOREIGN KEY (`page` )
    REFERENCES `ecms`.`page` (`idpage` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecms`.`tag`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ecms`.`tag` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(128) NOT NULL ,
  `seen` INT NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecms`.`announce`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ecms`.`announce` (
  `idannounce` MEDIUMINT UNSIGNED NOT NULL ,
  `value` MEDIUMTEXT NULL ,
  `createdby` MEDIUMINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`idannounce`) ,
  INDEX `fk_announce_user1_idx` (`createdby` ASC) ,
  CONSTRAINT `fk_announce_user1`
    FOREIGN KEY (`createdby` )
    REFERENCES `ecms`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecms`.`activity`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ecms`.`activity` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `type` VARCHAR(45) NULL ,
  `operator` MEDIUMINT UNSIGNED NOT NULL ,
  `operation` VARCHAR(45) NULL ,
  `date` TIMESTAMP NULL ,
  `url` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_activity_user1_idx` (`operator` ASC) ,
  CONSTRAINT `fk_activity_user1`
    FOREIGN KEY (`operator` )
    REFERENCES `ecms`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `ecms` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
