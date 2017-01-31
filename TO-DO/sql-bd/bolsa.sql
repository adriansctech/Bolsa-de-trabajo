-- MySQL Script generated by MySQL Workbench
-- mar 31 ene 2017 19:40:31 CET
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bolsadetrabajo
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bolsadetrabajo
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bolsadetrabajo` DEFAULT CHARACTER SET utf8 ;
USE `bolsadetrabajo` ;

-- -----------------------------------------------------
-- Table `bolsadetrabajo`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsadetrabajo`.`usuarios` (
  `mail` VARCHAR(125) NOT NULL,
  `pass` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`mail`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajo`.`tipousuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsadetrabajo`.`tipousuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajo`.`provincia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsadetrabajo`.`provincia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajo`.`poblacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsadetrabajo`.`poblacion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `provincia` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_poblacion_provincia1_idx` (`provincia` ASC),
  CONSTRAINT `fk_poblacion_provincia1`
    FOREIGN KEY (`provincia`)
    REFERENCES `bolsadetrabajo`.`provincia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajo`.`alumnos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsadetrabajo`.`alumnos` (
  `usuarios_mail` VARCHAR(125) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(150) NOT NULL,
  `domicilio` VARCHAR(100) NOT NULL,
  `poblacion` INT NOT NULL,
  `telf` INT(9) NOT NULL,
  `trabajofuera` TINYINT(1) NOT NULL,
  `cvlinkedin` VARCHAR(100) NULL,
  `foto` VARCHAR(255) NULL,
  `valido` TINYINT(1) NOT NULL,
  `informacion` TINYINT(1) NOT NULL,
  PRIMARY KEY (`usuarios_mail`),
  INDEX `fk_alumnos_poblacion1_idx` (`poblacion` ASC),
  INDEX `fk_alumnos_usuarios1_idx` (`usuarios_mail` ASC),
  CONSTRAINT `fk_alumnos_poblacion1`
    FOREIGN KEY (`poblacion`)
    REFERENCES `bolsadetrabajo`.`poblacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumnos_usuarios1`
    FOREIGN KEY (`usuarios_mail`)
    REFERENCES `bolsadetrabajo`.`usuarios` (`mail`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajo`.`departamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsadetrabajo`.`departamentos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `CLITERAL` VARCHAR(30) NOT NULL,
  `VLITERAL` VARCHAR(30) NOT NULL,
  `DepCurt` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajo`.`ciclos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsadetrabajo`.`ciclos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ciclos` VARCHAR(50) NOT NULL,
  `responsable` INT NOT NULL,
  `departamentos` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ciclos_departamentos1_idx` (`departamentos` ASC),
  CONSTRAINT `fk_ciclos_departamentos1`
    FOREIGN KEY (`departamentos`)
    REFERENCES `bolsadetrabajo`.`departamentos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajo`.`idiomas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsadetrabajo`.`idiomas` (
  `id` INT NOT NULL,
  `idioma` VARCHAR(45) NOT NULL,
  `nivel` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajo`.`empresas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsadetrabajo`.`empresas` (
  `usuarios_mail` VARCHAR(125) NOT NULL,
  `cif` VARCHAR(9) NOT NULL,
  `nombre` VARCHAR(70) NOT NULL,
  `actividad` VARCHAR(75) NOT NULL,
  `domicilio` VARCHAR(70) NOT NULL,
  `poblacion` INT NOT NULL,
  `telf` INT(9) NOT NULL,
  `web` VARCHAR(50) NOT NULL,
  `contactonombre` VARCHAR(45) NOT NULL,
  `contactocargo` VARCHAR(45) NOT NULL,
  `contactotelefono` INT(9) NOT NULL,
  `contactomail` VARCHAR(60) NOT NULL,
  `logo` VARCHAR(255) NULL,
  INDEX `fk_empresas_poblacion1_idx` (`poblacion` ASC),
  INDEX `fk_empresas_usuarios1_idx` (`usuarios_mail` ASC),
  PRIMARY KEY (`usuarios_mail`),
  CONSTRAINT `fk_empresas_poblacion1`
    FOREIGN KEY (`poblacion`)
    REFERENCES `bolsadetrabajo`.`poblacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresas_usuarios1`
    FOREIGN KEY (`usuarios_mail`)
    REFERENCES `bolsadetrabajo`.`usuarios` (`mail`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = big5;


-- -----------------------------------------------------
-- Table `bolsadetrabajo`.`contrato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsadetrabajo`.`contrato` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajo`.`responsable`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsadetrabajo`.`responsable` (
  `usuarios_mail` VARCHAR(125) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `telf` INT(9) NOT NULL,
  `foto` VARCHAR(255) NULL,
  INDEX `fk_responsable_usuarios1_idx` (`usuarios_mail` ASC),
  PRIMARY KEY (`usuarios_mail`),
  CONSTRAINT `fk_responsable_usuarios1`
    FOREIGN KEY (`usuarios_mail`)
    REFERENCES `bolsadetrabajo`.`usuarios` (`mail`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajo`.`oferta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsadetrabajo`.`oferta` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `puesto` VARCHAR(65) NOT NULL,
  `contrato` INT NOT NULL,
  `valido` TINYINT(1) NOT NULL,
  `descripcion` VARCHAR(255) NULL,
  `empresas_cif` VARCHAR(9) NOT NULL,
  `responsable` VARCHAR(125) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_oferta_contrato1_idx` (`contrato` ASC),
  INDEX `fk_oferta_empresas1_idx` (`empresas_cif` ASC),
  INDEX `fk_oferta_responsable1_idx` (`responsable` ASC),
  CONSTRAINT `fk_oferta_contrato1`
    FOREIGN KEY (`contrato`)
    REFERENCES `bolsadetrabajo`.`contrato` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_oferta_empresas1`
    FOREIGN KEY (`empresas_cif`)
    REFERENCES `bolsadetrabajo`.`empresas` (`cif`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_oferta_responsable1`
    FOREIGN KEY (`responsable`)
    REFERENCES `bolsadetrabajo`.`responsable` (`usuarios_mail`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = dec8;


-- -----------------------------------------------------
-- Table `bolsadetrabajo`.`oferta_has_idiomas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsadetrabajo`.`oferta_has_idiomas` (
  `oferta` INT NOT NULL,
  `idioma` INT NOT NULL,
  PRIMARY KEY (`oferta`, `idioma`),
  INDEX `fk_oferta_has_idiomas_idiomas1_idx` (`idioma` ASC),
  INDEX `fk_oferta_has_idiomas_oferta1_idx` (`oferta` ASC),
  CONSTRAINT `fk_oferta_has_idiomas_oferta1`
    FOREIGN KEY (`oferta`)
    REFERENCES `bolsadetrabajo`.`oferta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_oferta_has_idiomas_idiomas1`
    FOREIGN KEY (`idioma`)
    REFERENCES `bolsadetrabajo`.`idiomas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajo`.`ciclos_has_alumnos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsadetrabajo`.`ciclos_has_alumnos` (
  `ciclos` INT NOT NULL,
  `alumnos` INT NOT NULL,
  `finicio` DATE NOT NULL,
  `ffin` DATE NOT NULL,
  `nota` INT NOT NULL,
  `varchar` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`ciclos`, `alumnos`),
  INDEX `fk_ciclos_has_alumnos_ciclos1_idx` (`ciclos` ASC),
  CONSTRAINT `fk_ciclos_has_alumnos_ciclos1`
    FOREIGN KEY (`ciclos`)
    REFERENCES `bolsadetrabajo`.`ciclos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajo`.`ciclos_has_oferta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsadetrabajo`.`ciclos_has_oferta` (
  `ciclo` INT NOT NULL,
  `oferta` INT NOT NULL,
  PRIMARY KEY (`ciclo`, `oferta`),
  INDEX `fk_ciclos_has_oferta_oferta1_idx` (`oferta` ASC),
  INDEX `fk_ciclos_has_oferta_ciclos1_idx` (`ciclo` ASC),
  CONSTRAINT `fk_ciclos_has_oferta_ciclos1`
    FOREIGN KEY (`ciclo`)
    REFERENCES `bolsadetrabajo`.`ciclos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ciclos_has_oferta_oferta1`
    FOREIGN KEY (`oferta`)
    REFERENCES `bolsadetrabajo`.`oferta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajo`.`alumnos_has_idiomas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bolsadetrabajo`.`alumnos_has_idiomas` (
  `alumnos_mail` VARCHAR(125) NOT NULL,
  `idiomas_id` INT NOT NULL,
  PRIMARY KEY (`alumnos_mail`, `idiomas_id`),
  INDEX `fk_alumnos_has_idiomas_idiomas1_idx` (`idiomas_id` ASC),
  INDEX `fk_alumnos_has_idiomas_alumnos1_idx` (`alumnos_mail` ASC),
  CONSTRAINT `fk_alumnos_has_idiomas_alumnos1`
    FOREIGN KEY (`alumnos_mail`)
    REFERENCES `bolsadetrabajo`.`alumnos` (`usuarios_mail`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumnos_has_idiomas_idiomas1`
    FOREIGN KEY (`idiomas_id`)
    REFERENCES `bolsadetrabajo`.`idiomas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
