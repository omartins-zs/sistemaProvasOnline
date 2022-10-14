
CREATE DATABASE sistema_quiz_prova;

CREATE TABLE `sistema_quiz_prova`.`questoes` ( `questao_id` INT NOT NULL , `questao` TEXT NOT NULL , PRIMARY KEY (`questao_id`)) ENGINE = InnoDB;


CREATE TABLE `sistema_quiz_prova`.`escolhas` ( `id` INT NOT NULL AUTO_INCREMENT , `questao_id` INT NOT NULL , `correto` TINYINT(1) NOT NULL DEFAULT '0' , `escolha` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

INSERT INTO `questoes` (`questao_id`, `questao`) VALUES
(1, 'Para que serve o PHP?'),
(2, 'Aonde o PHP é interpretado?');

INSERT INTO `escolhas` (`id`, `questao_id`, `correto`, `escolha`) VALUES (NULL, '2', '1', 'Servidor'), (NULL, '2', '0', 'Cliente'), (NULL, '2', '0', 'Navegador'), (NULL, '1', '1', 'PHP é uma linguagem de programação voltada para o desenvolvimento de aplicações para a web e para criar sites'), (NULL, '1', '0', 'Para criar estilos das páginas HTML'), (NULL, '1', '0', 'Para editar arquivos \'.txt\'');