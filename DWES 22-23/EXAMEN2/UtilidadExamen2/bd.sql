CREATE TABLE examen (
  id INT NOT NULL AUTO_INCREMENT,
  usuarios_examen VARCHAR(50) NOT NULL UNIQUE,
  password_examen VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO examen (usuarios_examen, password_examen) VALUES
('usuario1', 'contraseña1'),
('usuario2', 'contraseña2'),
('usuario3', 'contraseña3');