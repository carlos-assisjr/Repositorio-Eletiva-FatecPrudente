-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';



-- -----------------------------------------------------
-- Schema ativ_projeto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ativ_projeto` DEFAULT CHARACTER SET utf8 ;
USE `ativ_projeto` ;

-- -----------------------------------------------------
-- Table `ativ_projeto`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ativ_projeto`.`cliente` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ativ_projeto`.`evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ativ_projeto`.`evento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `data_evento` DATETIME NOT NULL,
  `local` VARCHAR(255) NOT NULL,
  `descricao` TEXT NOT NULL,
  `categoria` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ativ_projeto`.`ingresso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ativ_projeto`.`ingresso` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  `valor` DECIMAL(10,2) NOT NULL,
  `quant` INT(11) NOT NULL,
  `evento_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ingresso_evento1_idx` (`evento_id` ASC) VISIBLE,
  CONSTRAINT `fk_ingresso_evento1`
    FOREIGN KEY (`evento_id`)
    REFERENCES `ativ_projeto`.`evento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ativ_projeto`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ativ_projeto`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ativ_projeto`.`venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ativ_projeto`.`venda` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `data_venda` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `valor_total` DECIMAL(10,2) NOT NULL,
  `ingresso_id` INT(11) NOT NULL,
  `cliente_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_venda_ingresso1_idx` (`ingresso_id` ASC) VISIBLE,
  INDEX `fk_venda_cliente1_idx` (`cliente_id` ASC) VISIBLE,
  CONSTRAINT `fk_venda_cliente1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `ativ_projeto`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_ingresso1`
    FOREIGN KEY (`ingresso_id`)
    REFERENCES `ativ_projeto`.`ingresso` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 46
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
