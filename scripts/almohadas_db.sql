-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema almohadas_db
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema almohadas_db
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `almohadas_db` ;

-- -----------------------------------------------------
-- Schema almohadas_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `almohadas_db` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema tienda_db
-- -----------------------------------------------------
USE `almohadas_db` ;

-- -----------------------------------------------------
-- Table `almohadas_db`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `almohadas_db`.`categoria` ;

CREATE TABLE IF NOT EXISTS `almohadas_db`.`categoria` (
  `id_categoria` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(250) NULL DEFAULT NULL,
  `eliminado` TINYINT(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id_categoria`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `almohadas_db`.`producto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `almohadas_db`.`producto` ;

CREATE TABLE IF NOT EXISTS `almohadas_db`.`producto` (
  `id_producto` INT(11) NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(45) NULL DEFAULT NULL,
  `fecha_creacion` DATETIME NULL DEFAULT NULL,
  `fecha_actualizacion` DATETIME NULL DEFAULT NULL,
  `eliminado` TINYINT(4) NULL DEFAULT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(250) NULL DEFAULT NULL,
  `precio` DECIMAL(6,2) NOT NULL,
  `img` VARCHAR(45) NULL DEFAULT NULL,
  `id_categoria` INT(11) NOT NULL,
  PRIMARY KEY (`id_producto`),
  CONSTRAINT `fk_Producto_categoria1`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `almohadas_db`.`categoria` (`id_categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `almohadas_db`.`rol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `almohadas_db`.`rol` ;

CREATE TABLE IF NOT EXISTS `almohadas_db`.`rol` (
  `id_rol` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `descripcion` VARCHAR(45) NULL DEFAULT NULL,
  `eliminado` TINYINT(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id_rol`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `almohadas_db`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `almohadas_db`.`usuario` ;

CREATE TABLE IF NOT EXISTS `almohadas_db`.`usuario` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` DATETIME NULL DEFAULT NULL,
  `fecha_actualizacion` DATETIME NULL DEFAULT NULL,
  `eliminado` TINYINT(4) NULL DEFAULT 0,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `apellido` VARCHAR(50) NULL DEFAULT NULL,
  `ci` VARCHAR(10) NULL DEFAULT NULL,
  `direccion` VARCHAR(100) NULL DEFAULT NULL,
  `celular` VARCHAR(45) NULL DEFAULT NULL,
  `id_rol` INT(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `fk_Usuario_rol1`
    FOREIGN KEY (`id_rol`)
    REFERENCES `almohadas_db`.`rol` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `almohadas_db`.`comprobante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `almohadas_db`.`comprobante` ;

CREATE TABLE IF NOT EXISTS `almohadas_db`.`comprobante` (
  `id_comprobante` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `cantidad` INT NULL,
  `serie` VARCHAR(45) NULL,
  PRIMARY KEY (`id_comprobante`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `almohadas_db`.`ventas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `almohadas_db`.`ventas` ;

CREATE TABLE IF NOT EXISTS `almohadas_db`.`ventas` (
  `id_venta`  INT NOT NULL AUTO_INCREMENT,
  `fecha_creacion` DATETIME NULL DEFAULT NULL,
  `eliminado` TINYINT(4) NULL DEFAULT NULL,
  `subtotal` DECIMAL(6,2) NULL,
  `descuento` DECIMAL(6,2) NULL DEFAULT NULL,
  `total` DECIMAL(6,2) NULL DEFAULT NULL,
  `fecha_entrega` DATETIME NULL,
  `referencia` VARCHAR(45) NULL DEFAULT NULL,
  `serie` VARCHAR(45) NULL,
  `num_documento` VARCHAR(45) NULL,
  `comprobante_id_comprobante` INT NOT NULL,
  `id_usuario` INT(11) NOT NULL,
  `id_cliente` INT NULL,
  PRIMARY KEY (`id_venta`),
  CONSTRAINT `fk_reserva_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `almohadas_db`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reserva_comprobante1`
    FOREIGN KEY (`comprobante_id_comprobante`)
    REFERENCES `almohadas_db`.`comprobante` (`id_comprobante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `almohadas_db`.`detalle`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `almohadas_db`.`detalle` ;

CREATE TABLE IF NOT EXISTS `almohadas_db`.`detalle` (
  `id_producto` INT(11) NOT NULL,
  `id_venta` INT(11) NOT NULL,
  `precio` INT(11) NULL DEFAULT NULL,
  `cantidad` DECIMAL(6,2) NULL DEFAULT NULL,
  `importe` DECIMAL(6,2) NULL DEFAULT NULL,
  `img` VARCHAR(45) NULL,
  `fecha_creacion` DATETIME NULL DEFAULT NULL,
  `eliminado` TINYINT(4) NULL DEFAULT 0,
  PRIMARY KEY (`id_producto`, `id_venta`),
  CONSTRAINT `fk_producto_has_reserva_producto1`
    FOREIGN KEY (`id_producto`)
    REFERENCES `almohadas_db`.`producto` (`id_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_has_reserva_reserva1`
    FOREIGN KEY (`id_venta`)
    REFERENCES `almohadas_db`.`ventas` (`id_venta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
