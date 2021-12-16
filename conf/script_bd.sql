CREATE SCHEMA `ifc` ;

CREATE TABLE `ifc`.`salto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `nota1` DOUBLE NULL,
  `nota2` DOUBLE NULL,
  `nota3` DOUBLE NULL,
  `nota4` DOUBLE NULL,
  `nota5` DOUBLE NULL,
  `nascimento` DATE NULL,
  PRIMARY KEY (`id`));

INSERT INTO `ifc`.`salto` (`nome`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nascimento`) VALUES ('João', '10', '9', '6.5', '4.5', '10', '2000-12-12');
INSERT INTO `ifc`.`salto` (`nome`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nascimento`) VALUES ('Hannah', '9', '10', '4.5', '7', '2', '1978-07-09');
INSERT INTO `ifc`.`salto` (`nome`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nascimento`) VALUES ('Lívia', '7', '5', '5', '7', '3.5', '1973-03-05');
INSERT INTO `ifc`.`salto` (`nome`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nascimento`) VALUES ('Curvello', '8.5', '6', '8', '7', '7', '1962-11-23');
INSERT INTO `ifc`.`salto` (`nome`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nascimento`) VALUES ('Cristhian', '8', '5', '9', '10', '6', '1999-12-03');
