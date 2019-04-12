-- -----------------------------------------------------
-- Schema test
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 ;
USE `test` ;

-- -----------------------------------------------------
-- Table `test`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `test`.`user` (
  `iduser` INT(11) NOT NULL,
  `username` VARCHAR(45) NULL DEFAULT NULL,
  `pw` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `test`.`comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `test`.`comment` (
  `idcomment` INT(11) NOT NULL AUTO_INCREMENT,
  `txt` VARCHAR(45) CHARACTER SET 'latin1' NOT NULL,
  `userID` INT(11) NOT NULL,
  PRIMARY KEY (`idcomment`),
  INDEX `userID_idx` (`userID` ASC) VISIBLE,
  CONSTRAINT `userId`
    FOREIGN KEY (`userID`)
    REFERENCES `test`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;
