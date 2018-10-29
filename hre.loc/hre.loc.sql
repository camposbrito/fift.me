-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema hre.loc
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema hre.loc
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `Equipamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Equipamento` ;

CREATE TABLE IF NOT EXISTS `Equipamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Produto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Produto` ;

CREATE TABLE IF NOT EXISTS `Produto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Operacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Operacao` ;

CREATE TABLE IF NOT EXISTS `Operacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Estado` ;

CREATE TABLE IF NOT EXISTS `Estado` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Descricao` VARCHAR(45) NOT NULL,
  `BloqOperacao` CHAR(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TAG`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TAG` ;



-- -----------------------------------------------------
-- Table `hre.loc`.`TAG`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TAG` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `rfid` VARCHAR(45) NULL,
  `Operador_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_TAG_Operador1_idx` (`Operador_id` ASC) ,
  CONSTRAINT `fk_TAG_Operador1`
    FOREIGN KEY (`Operador_id`)
    REFERENCES `hre.loc`.`Operador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Perfil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Perfil` ;

CREATE TABLE IF NOT EXISTS `Perfil` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Operador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Operador` ;

CREATE TABLE IF NOT EXISTS `Operador` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Descricao` VARCHAR(45) NOT NULL,
  `Perfil_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Operador_Perfil1_idx` (`Perfil_id` ASC) ,
  CONSTRAINT `fk_Operador_Perfil1`
    FOREIGN KEY (`Perfil_id`)
    REFERENCES `hre.loc`.`Perfil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `Turno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Turno` ;

CREATE TABLE IF NOT EXISTS `Turno` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Descricao` VARCHAR(45) NULL,
  `DataIni` DATETIME NOT NULL,
  `DataFin` DATETIME NULL,
  `QtdePecas` INT NOT NULL,
  `Equipamento_id` INT NOT NULL,
  `Estado_id` INT NOT NULL,
  `Produto_id` INT NOT NULL,
  `Operacao_id` INT NOT NULL,
  `PecasProducao` INT NULL,
  `RefugosProducao` INT NOT NULL,
  `RefugosFundicao` INT NOT NULL,
  `PecasPreparacao` INT NULL,
  `RefugosPreparacao` INT NOT NULL,
  `Operador_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Turno_Equipamento1_idx` (`Equipamento_id` ASC) ,
  INDEX `fk_Turno_Produto1_idx` (`Produto_id` ASC) ,
  INDEX `fk_Turno_Operacao1_idx` (`Operacao_id` ASC) ,
  INDEX `fk_Turno_Estado1_idx` (`Estado_id` ASC) ,
  INDEX `fk_Turno_Operador1_idx` (`Operador_id` ASC) ,
  CONSTRAINT `fk_Turno_Equipamento1`
    FOREIGN KEY (`Equipamento_id`)
    REFERENCES `Equipamento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Turno_Produto1`
    FOREIGN KEY (`Produto_id`)
    REFERENCES `Produto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Turno_Operacao1`
    FOREIGN KEY (`Operacao_id`)
    REFERENCES `Operacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Turno_Estado1`
    FOREIGN KEY (`Estado_id`)
    REFERENCES `Estado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Turno_Operador1`
    FOREIGN KEY (`Operador_id`)
    REFERENCES `Operador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TipoOcorrencia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TipoOcorrencia` ;

CREATE TABLE IF NOT EXISTS `TipoOcorrencia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Producao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Producao` ;

CREATE TABLE IF NOT EXISTS `Producao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Turno_id` INT NOT NULL,
  `DataIni` DATETIME NULL,
  `DataFin` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Producao_Turno1_idx` (`Turno_id` ASC) ,
  CONSTRAINT `fk_Producao_Turno1`
    FOREIGN KEY (`Turno_id`)
    REFERENCES `Turno` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Ocorrencia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Ocorrencia` ;

CREATE TABLE IF NOT EXISTS `Ocorrencia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `TipoOcorrencia_id` INT NOT NULL,
  `Producao_id` INT NOT NULL,
  `Descricao` VARCHAR(45) NOT NULL,
  `DataIni` DATETIME NULL,
  `DataFin` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Ocorrencia_TipoOcorrencia1_idx` (`TipoOcorrencia_id` ASC) ,
  INDEX `fk_Ocorrencia_Producao1_idx` (`Producao_id` ASC) ,
  CONSTRAINT `fk_Ocorrencia_TipoOcorrencia1`
    FOREIGN KEY (`TipoOcorrencia_id`)
    REFERENCES `TipoOcorrencia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Ocorrencia_Producao1`
    FOREIGN KEY (`Producao_id`)
    REFERENCES `Producao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Metodos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Metodos` ;

CREATE TABLE IF NOT EXISTS `Metodos` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `classe` VARCHAR(50) NULL DEFAULT NULL,
  `metodo` VARCHAR(50) NULL DEFAULT NULL,
  `identificacao` VARCHAR(100) NULL DEFAULT NULL,
  `privado` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 33
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Permissoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Permissoes` ;

CREATE TABLE IF NOT EXISTS `Permissoes` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `metodos_id` INT(11) UNSIGNED NOT NULL,
  `Perfil_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_permissoes_metodos_idx` (`metodos_id` ASC) ,
  INDEX `fk_permissoes_Perfil1_idx` (`Perfil_id` ASC) ,
  CONSTRAINT `fk_permissoes_metodos`
    FOREIGN KEY (`metodos_id`)
    REFERENCES `Metodos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permissoes_Perfil1`
    FOREIGN KEY (`Perfil_id`)
    REFERENCES `hre.loc`.`Perfil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 956
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
