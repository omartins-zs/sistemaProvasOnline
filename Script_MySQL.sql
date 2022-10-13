
CREATE DATABASE sistema_quiz_prova;

CREATE TABLE `sistema_quiz_prova`.`questoes` ( `questao_id` INT NOT NULL , `questao` TEXT NOT NULL , PRIMARY KEY (`questao_id`)) ENGINE = InnoDB;



CREATE TABLE `sistema_quiz_prova`.`escolhas` ( `id` INT NOT NULL AUTO_INCREMENT , `questao_id` INT NOT NULL , `correto` TINYINT(1) NOT NULL DEFAULT '0' , `escolha` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;