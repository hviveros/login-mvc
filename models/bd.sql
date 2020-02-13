/*
Sistema Login/Acceso en PHP con MVC - PDO
*/

DROP DATABASE IF EXISTS loginmvc;

CREATE DATABASE IF NOT EXISTS loginmvc;

USE loginmvc;

/*tabla usuario*/
CREATE TABLE usuario(
    id_usuario INT(4) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    nick VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
)ENGINE=InnoDB;

/*tabla pagina*/
CREATE TABLE pagina(
    id_pagina INT(4) PRIMARY KEY AUTO_INCREMENT,
    pagina VARCHAR(100) NOT NULL
)ENGINE=InnoDB;

/*tabla permiso*/
CREATE TABLE permiso(
    id_permiso INT(5) PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT(4) NOT NULL,
    pagina_id INT(4) NOT NULL,
    nivel INT(2) DEFAULT 0,
    FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario) ON UPDATE CASCADE ON DELETE RESTRICT,
	FOREIGN KEY (pagina_id) REFERENCES pagina (id_pagina) ON UPDATE CASCADE ON DELETE RESTRICT
)ENGINE=InnoDB;

/*insersión de datos*/
INSERT INTO `usuario` (`id_usuario`, `nombre`, `nick`, `password`) VALUES
(1, 'Tyrion Lannister', 'usuario1', '122b738600a0f74f7c331c0ef59bc34c'),
(2, 'Robb Stark', 'usuario2', '2fb6c8d2f3842a5ceaa9bf320e649ff0'),
(3, 'Oberyn Martell', 'usuario3', '5a54c609c08a0ab3f7f8eef1365bfda6'),
(4, 'Tormund Giantsbane', 'usuario4', '0ddd0fbf933b170eb6d90987a67d0a5d');

INSERT INTO `pagina` (`id_pagina`, `pagina`) VALUES
(1, 'inicio'),
(2, 'libro'),
(3, 'pelicula'),
(4, 'musica');

INSERT INTO `permiso` (`id_permiso`, `usuario_id`,`pagina_id`,`nivel`) VALUES
(1, 1, 1, 1), (2, 1, 2, 3), (3, 1, 3, 3), (4, 1, 4, 3),
(5, 2, 1, 1), (6, 2, 2, 3), (7, 2, 3, 2), (8, 2, 4, 1),
(9, 3, 1, 1), (10, 3, 2, 0), (11, 3, 3, 1), (12, 3, 4, 2),
(13, 4, 1, 1), (14, 4, 2, 0), (15, 4, 3, 0), (16, 4, 4, 0);