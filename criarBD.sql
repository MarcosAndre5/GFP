CREATE TABLE `GFP`.`usuarios` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`nome` VARCHAR(100) NOT NULL , 
	`funcao` VARCHAR(45) NULL , 
	`condicao` VARCHAR(45) NULL , 
	`email` VARCHAR(100) NULL , 
	`telefone` VARCHAR(15) NULL , 
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;