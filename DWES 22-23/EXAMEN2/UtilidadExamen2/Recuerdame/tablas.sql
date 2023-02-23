DROP DATABASE IF EXISTS recuerdame;
CREATE DATABASE IF NOT EXISTS recuerdame;
USE recuerdame;

CREATE TABLE usuarios (
    id int auto_increment PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellidos VARCHAR(255) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL unique,
    fecha_nacimiento DATE NOT NULL
);

CREATE TABLE token (
    id INT auto_increment PRIMARY KEY,
    id_usuario INT,
    valor VARCHAR(255),
    expiracion DATETIME DEFAULT (NOW() + INTERVAL 7 DAY), -- no consigo que vaya con variable
    CONSTRAINT fk_id_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

CREATE TABLE foto (
    id INT auto_increment PRIMARY KEY,
    id_usuario INT,
    foto VARCHAR(255),
    CONSTRAINT fk_id_usuario_2 FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);


INSERT INTO usuarios(nombre,apellidos,contrasena,correo,fecha_nacimiento) VALUES('Pepe','Flores Gallardo','Abcd12345','pepe@gmail.com','1999-10-10');