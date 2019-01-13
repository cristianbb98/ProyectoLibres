-- MySQL Workbench Forward Engineering
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS,
FOREIGN_KEY_CHECKS=0;

-- -----------------------------------------------------
-- Schema OLAP_BOOKSHOP
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema OLAP_BOOKSHOP
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `OLAP_BOOKSHOP` DEFAULT CHARACTER SET
utf8 ;
USE `OLAP_BOOKSHOP` ;
-- -----------------------------------------------------
-- Table `OLAP_BOOKSHOP`.`REGION`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OLAP_BOOKSHOP`.`REGION` (
 `REGION_ID` INT NOT NULL,
 `REGION_NAME` VARCHAR(20) NOT NULL,
 PRIMARY KEY (`REGION_ID`))
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `OLAP_BOOKSHOP`.`SUBREGION`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OLAP_BOOKSHOP`.`SUBREGION` (
 `SUBREGION_ID` INT NOT NULL,
 `SUBREGION_NAME` VARCHAR(30) NOT NULL,
 `REGION_ID` INT NOT NULL,
 PRIMARY KEY (`SUBREGION_ID`, `REGION_ID`),
 INDEX `fk_SUBREGION_REGION_idx` (`REGION_ID` ASC) VISIBLE,
 CONSTRAINT `fk_SUBREGION_REGION`
 FOREIGN KEY (`REGION_ID`)
 REFERENCES `OLAP_BOOKSHOP`.`REGION` (`REGION_ID`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION)
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `OLAP_BOOKSHOP`.`WAREHOUSE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OLAP_BOOKSHOP`.`WAREHOUSE` (
 `CODE` INT NOT NULL,
 `SUBREGION_ID` INT NOT NULL,
 PRIMARY KEY (`CODE`, `SUBREGION_ID`),
 INDEX `fk_WAREHOUSE_SUBREGION1_idx` (`SUBREGION_ID` ASC)
VISIBLE,
 CONSTRAINT `fk_WAREHOUSE_SUBREGION1`
 FOREIGN KEY (`SUBREGION_ID`)
 REFERENCES `OLAP_BOOKSHOP`.`SUBREGION` (`SUBREGION_ID`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION)
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `OLAP_BOOKSHOP`.`BOOKS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OLAP_BOOKSHOP`.`BOOKS` (
`ISBN` VARCHAR(11) NOT NULL,
 `TITLE` VARCHAR(45) NULL,
 `PRICE` VARCHAR(45) NULL,
 PRIMARY KEY (`ISBN`))
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `OLAP_BOOKSHOP`.`YEAR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OLAP_BOOKSHOP`.`YEAR` (
 `YEAR_ID` INT NOT NULL,
 `YEAR` YEAR(4) NULL,
 PRIMARY KEY (`YEAR_ID`))
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `OLAP_BOOKSHOP`.`MONTH`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OLAP_BOOKSHOP`.`MONTH` (
 `MONTH_ID` INT NOT NULL,
 `MONTH` VARCHAR(15) NULL,
 `YEAR_ID` INT NOT NULL,
 PRIMARY KEY (`MONTH_ID`, `YEAR_ID`),
 INDEX `fk_MONTH_YEAR1_idx` (`YEAR_ID` ASC) VISIBLE,
 CONSTRAINT `fk_MONTH_YEAR1`
 FOREIGN KEY (`YEAR_ID`)
 REFERENCES `OLAP_BOOKSHOP`.`YEAR` (`YEAR_ID`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION)
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `OLAP_BOOKSHOP`.`DAY`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OLAP_BOOKSHOP`.`DAY` (
 `NUM_DAY` INT NOT NULL,
 `DAY` VARCHAR(45) NOT NULL,
 `DAY_ID` VARCHAR(45) NOT NULL,
 `MONTH_ID` INT NOT NULL,
 PRIMARY KEY (`DAY_ID`, `MONTH_ID`),
 INDEX `fk_DAY_MONTH1_idx` (`MONTH_ID` ASC) VISIBLE,
 CONSTRAINT `fk_DAY_MONTH1`
 FOREIGN KEY (`MONTH_ID`)
 REFERENCES `OLAP_BOOKSHOP`.`MONTH` (`MONTH_ID`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION)
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `OLAP_BOOKSHOP`.`FACTS_TICKET`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OLAP_BOOKSHOP`.`FACTS_TICKET` (
 `SELL_BY_PRODUCT` DOUBLE NOT NULL,
 `TICKET_NUMBER` INT NOT NULL,
 `BOOKS_ISBN` VARCHAR(11)  NOT NULL,
 `WAREHOUSE_CODE` INT NOT NULL,
 `DAY_ID` VARCHAR(45) NOT NULL,
 PRIMARY KEY (`SELL_BY_PRODUCT`, `BOOKS_ISBN`, `WAREHOUSE_CODE`,
`DAY_ID`),
 INDEX `fk_FACTS_TICKET_BOOKS1_idx` (`BOOKS_ISBN` ASC) VISIBLE,
 INDEX `fk_FACTS_TICKET_WAREHOUSE1_idx` (`WAREHOUSE_CODE` ASC)
VISIBLE,
 INDEX `fk_FACTS_TICKET_DAY1_idx` (`DAY_ID` ASC) VISIBLE,
 CONSTRAINT `fk_FACTS_TICKET_BOOKS1`
 FOREIGN KEY (`BOOKS_ISBN`)
 REFERENCES `OLAP_BOOKSHOP`.`BOOKS` (`ISBN`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION,
 CONSTRAINT `fk_FACTS_TICKET_WAREHOUSE1`
 FOREIGN KEY (`WAREHOUSE_CODE`)
 REFERENCES `OLAP_BOOKSHOP`.`WAREHOUSE` (`CODE`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION,
 CONSTRAINT `fk_FACTS_TICKET_DAY1`
 FOREIGN KEY (`DAY_ID`)
 REFERENCES `OLAP_BOOKSHOP`.`DAY` (`DAY_ID`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION)
ENGINE = InnoDB;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
