CREATE TABLE `esgi`.`user` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `firstname` VARCHAR(30) NOT NULL , 
    `lastname` VARCHAR(30) NOT NULL , 
    `email` VARCHAR(255) NOT NULL , 
    `password` VARCHAR(255) NOT NULL , 
    `country` CHAR(2) NOT NULL , PRIMARY KEY (`id`)
) ENGINE = InnoDB;
