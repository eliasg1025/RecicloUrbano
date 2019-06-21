-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema ReciclaUrbano
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ReciclaUrbano
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ReciclaUrbano` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `ReciclaUrbano` ;

-- -----------------------------------------------------
-- Table `ReciclaUrbano`.`TipoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReciclaUrbano`.`TipoUsuario` (
  `idTipoUsuario` INT NOT NULL AUTO_INCREMENT,
  `tipoUsuario` VARCHAR(45) NOT NULL,
  `caracteristicas` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ReciclaUrbano`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReciclaUrbano`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `dni` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `fechaNacimiento` VARCHAR(45) NOT NULL,
  `distrito` VARCHAR(45) NOT NULL,
  `correoElectronico` VARCHAR(45) NOT NULL,
  `TipoUsuario_idTipoUsuario` INT NOT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX `fk_Usuario_TipoUsuario1_idx` (`TipoUsuario_idTipoUsuario` ASC) ,
  CONSTRAINT `fk_Usuario_TipoUsuario1`
    FOREIGN KEY (`TipoUsuario_idTipoUsuario`)
    REFERENCES `ReciclaUrbano`.`TipoUsuario` (`idTipoUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ReciclaUrbano`.`Telefono`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReciclaUrbano`.`Telefono` (
  `idTelefono` INT NOT NULL AUTO_INCREMENT,
  `telefono` VARCHAR(9) NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idTelefono`),
  INDEX `fk_Telefono_Usuario_idx` (`Usuario_idUsuario` ASC) ,
  CONSTRAINT `fk_Telefono_Usuario`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `ReciclaUrbano`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ReciclaUrbano`.`Conductor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReciclaUrbano`.`Conductor` (
  `idConductor` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `edad` INT NOT NULL,
  `fechaVencimiento` DATE NOT NULL,
  PRIMARY KEY (`idConductor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ReciclaUrbano`.`Recojo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReciclaUrbano`.`Recojo` (
  `idRecojo` INT NOT NULL AUTO_INCREMENT,
  `fechaRecojo` DATE NOT NULL,
  `horaInicio` TIME NOT NULL,
  `horaFin` TIME NOT NULL,
  `pesoTotalRecojo` FLOAT NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  `Conductor_idConductor` INT NOT NULL,
  PRIMARY KEY (`idRecojo`),
  INDEX `fk_Recojo_Usuario1_idx` (`Usuario_idUsuario` ASC) ,
  INDEX `fk_Recojo_Conductor1_idx` (`Conductor_idConductor` ASC) ,
  CONSTRAINT `fk_Recojo_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `ReciclaUrbano`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Recojo_Conductor1`
    FOREIGN KEY (`Conductor_idConductor`)
    REFERENCES `ReciclaUrbano`.`Conductor` (`idConductor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
