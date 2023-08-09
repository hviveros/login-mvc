/*
Sistema Login de acceso
*/

DROP DATABASE IF EXISTS up_login_mvc;

CREATE DATABASE IF NOT EXISTS up_login_mvc;

USE up_login_mvc;

/*tabla usuario*/
CREATE TABLE usuario(
    id_usuario INT(4) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    nick VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
)ENGINE=InnoDB;

/*tabla contenido*/
CREATE TABLE contenido(
    id_contenido INT(4) PRIMARY KEY AUTO_INCREMENT,
    contenido VARCHAR(100) NOT NULL
)ENGINE=InnoDB;

/*tabla permiso*/
CREATE TABLE permiso(
    id_permiso INT(4) PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT(4) NOT NULL,
    contenido_id INT(4) NOT NULL,
    nivel INT(2) DEFAULT 0,
    FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario) ON UPDATE CASCADE ON DELETE RESTRICT,
	FOREIGN KEY (contenido_id) REFERENCES contenido (id_contenido) ON UPDATE CASCADE ON DELETE RESTRICT
)ENGINE=InnoDB;

/*tabla categoria*/
CREATE TABLE categoria(
    id_categoria INT(4) PRIMARY KEY AUTO_INCREMENT,
    categoria VARCHAR(100) NOT NULL
)ENGINE=InnoDB;

/*tabla producto*/
CREATE TABLE producto(
    id_producto INT(5) PRIMARY KEY AUTO_INCREMENT,
    producto VARCHAR(100) NOT NULL,
    categoria_id INT(4) NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES categoria (id_categoria) ON UPDATE CASCADE ON DELETE RESTRICT
)ENGINE=InnoDB;

/*insertar datos*/
INSERT INTO `usuario` (`id_usuario`, `nombre`, `nick`, `password`) VALUES
(1, 'Tyrion Lannister', 'usuario1', '122b738600a0f74f7c331c0ef59bc34c'),
(2, 'Robb Stark',       'usuario2', '2fb6c8d2f3842a5ceaa9bf320e649ff0'),
(3, 'Oberyn Martell',   'usuario3', '5a54c609c08a0ab3f7f8eef1365bfda6'),
(4, 'Arya Stark',       'usuario4', '0ddd0fbf933b170eb6d90987a67d0a5d'),
(5, 'Jon Snow',         'usuario5', '0b65933df3421cf1bdf4ff082ffc8901'),
(6, 'Robert Baratheon', 'usuario6', '101617c6d22ee89e6326d01a7d7c38da');

INSERT INTO `contenido` (`id_contenido`, `contenido`) VALUES
(1, 'producto'),
(2, 'categoria');

#niveles
#   1   ver        X          X            X        ==> SUSCRIPTOR
#   2   ver     insertar    editar         X        ==> EDITOR
#   3   ver     insertar    editar      eliminar    ==> ADMINISTRADOR

INSERT INTO `permiso` (`id_permiso`, `usuario_id`,`contenido_id`,`nivel`) VALUES
(1,     1,  1,  3), (2,     1,  2,  3), 
(3,     2,  1,  2), (4,     2,  2,  2), 
(5,     3,  1,  1), (6,     3,  2,  1),
(7,     4,  1,  3), (8,     4,  2,  1), 
(9,     5,  1,  1), (10,    5,  2,  3), 
(11,    6,  1,  0), (12,    6,  2,  0);

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'electronica'),
(2, 'mueble');

INSERT INTO `producto` (`id_producto`, `producto`, `categoria_id`) VALUES
(1, 'tv led lg 55 smart', 1),
(2, 'home theater samsung 5.1', 1);