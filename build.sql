SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`PROFILES`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`PROFILES` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`PROFILES` (
  `id` CHAR(36) NOT NULL ,
  `first_name` VARCHAR(45) NOT NULL ,
  `last_name` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(60) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ROLES`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`ROLES` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`ROLES` (
  `id` INT NOT NULL ,
  `role` VARCHAR(20) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`USERS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`USERS` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`USERS` (
  `id` CHAR(36) NOT NULL COMMENT '36' ,
  `username` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `role_id` INT NOT NULL ,
  `profile_id` CHAR(36) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) ,
  INDEX `fk_users_profiles_profile_id` (`profile_id` ASC) ,
  INDEX `fk_users_roles_role_id` (`role_id` ASC) ,
  CONSTRAINT `fk_users_profiles_profile_id`
    FOREIGN KEY (`profile_id` )
    REFERENCES `mydb`.`PROFILES` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_roles_role_id`
    FOREIGN KEY (`role_id` )
    REFERENCES `mydb`.`ROLES` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`DISPOSITION`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`DISPOSITION` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`DISPOSITION` (
  `id` INT NOT NULL ,
  `dispositionstatus` VARCHAR(20) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`FAMILIES`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`FAMILIES` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`FAMILIES` (
  `id` CHAR(36) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `disposition_id` INT NOT NULL ,
  `note` VARCHAR(70) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) ,
  INDEX `fk_families_dispositions_disposition_id` (`disposition_id` ASC) ,
  CONSTRAINT `fk_families_dispositions_disposition_id`
    FOREIGN KEY (`disposition_id` )
    REFERENCES `mydb`.`DISPOSITION` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`PROBLEMS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`PROBLEMS` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`PROBLEMS` (
  `id` CHAR(36) NOT NULL COMMENT '36' ,
  `detail` VARCHAR(70) NOT NULL ,
  `note` VARCHAR(70) NULL ,
  `disposition_id` INT NOT NULL ,
  `user_id` CHAR(36) NOT NULL ,
  `family_id` INT NOT NULL ,
  `modified` DATETIME NULL ,
  `created` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_problems_users_user_id` (`user_id` ASC) ,
  INDEX `fk_problems_disposition_disposition_id` (`disposition_id` ASC) ,
  INDEX `fk_problems_families_problem_id` (`family_id` ASC) ,
  CONSTRAINT `fk_problems_users_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `mydb`.`USERS` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_problems_disposition_disposition_id`
    FOREIGN KEY (`disposition_id` )
    REFERENCES `mydb`.`DISPOSITION` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_problems_families_problem_id`
    FOREIGN KEY (`family_id` )
    REFERENCES `mydb`.`FAMILIES` (`disposition_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`SOLUTIONS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`SOLUTIONS` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`SOLUTIONS` (
  `id` CHAR(36) NOT NULL ,
  `problem_id` CHAR(36) NOT NULL ,
  `detail` VARCHAR(70) NOT NULL ,
  `note` VARCHAR(70) NULL ,
  `disposition_id` INT NOT NULL ,
  `user_id` CHAR(36) NOT NULL ,
  `modified` DATETIME NULL ,
  `created` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_problems_users_user_id` (`user_id` ASC) ,
  INDEX `fk_problems_disposition_disposition_id` (`disposition_id` ASC) ,
  INDEX `fk_solutions_problems_problem_id` (`problem_id` ASC) ,
  CONSTRAINT `fk_problems_users_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `mydb`.`USERS` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_problems_disposition_disposition_id`
    FOREIGN KEY (`disposition_id` )
    REFERENCES `mydb`.`DISPOSITION` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solutions_problems_problem_id`
    FOREIGN KEY (`problem_id` )
    REFERENCES `mydb`.`PROBLEMS` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`USERS_FAMILIES`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`USERS_FAMILIES` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`USERS_FAMILIES` (
  `id` INT NOT NULL ,
  `family_id` CHAR(36) NOT NULL ,
  `user_id` CHAR(36) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `family_id_UNIQUE` (`family_id` ASC) ,
  INDEX `fk_usersfamilies_users_user_id` (`user_id` ASC) ,
  INDEX `fk_usersfamilies_families_family_id` (`family_id` ASC) ,
  CONSTRAINT `fk_usersfamilies_users_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `mydb`.`USERS` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usersfamilies_families_family_id`
    FOREIGN KEY (`family_id` )
    REFERENCES `mydb`.`FAMILIES` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Links users that want to contribute to non-owned problems';


-- -----------------------------------------------------
-- Table `mydb`.`AGENDAS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`AGENDAS` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`AGENDAS` (
  `id` CHAR(36) NOT NULL ,
  `solution_id` CHAR(36) NOT NULL ,
  `ordering` INT NULL ,
  `disposition_id` INT NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_agendas_solutions_solution_id` (`solution_id` ASC) ,
  INDEX `fk_agendas_dispositions_disposition_id` (`disposition_id` ASC) ,
  CONSTRAINT `fk_agendas_solutions_solution_id`
    FOREIGN KEY (`solution_id` )
    REFERENCES `mydb`.`SOLUTIONS` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_agendas_dispositions_disposition_id`
    FOREIGN KEY (`disposition_id` )
    REFERENCES `mydb`.`DISPOSITION` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`MESSAGES`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`MESSAGES` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`MESSAGES` (
  `id` CHAR(36) NOT NULL ,
  `user_id` CHAR(36) NOT NULL ,
  `detail` VARCHAR(45) NULL ,
  `family_id` CHAR(36) NOT NULL ,
  `disposition_id` INT NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_messages_families_familly_id` (`family_id` ASC) ,
  INDEX `fk_messages_users_user_id` (`user_id` ASC) ,
  INDEX `fk_messages_dispositions_disposition_id` (`disposition_id` ASC) ,
  CONSTRAINT `fk_messages_families_familly_id`
    FOREIGN KEY (`family_id` )
    REFERENCES `mydb`.`FAMILIES` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_users_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `mydb`.`USERS` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_dispositions_disposition_id`
    FOREIGN KEY (`disposition_id` )
    REFERENCES `mydb`.`DISPOSITION` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

