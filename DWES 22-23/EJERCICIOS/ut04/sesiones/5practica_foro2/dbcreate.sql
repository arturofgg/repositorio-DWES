CREATE TABLE usuarios {
    id          auto_increment PRIMARY KEY,
    nombre      VARCHAR(255),
    passwd      VARCHAR(255),
    img         VARCHAR(255),
    correo      VARCHAR(255),
    descripcion TEXT
};

CREATE TABLE token {
    ida auto_increment PRIMARY KEY,
    id_usuario  int,
    valor       VARCHAR(255),
    expiracion  DATETIME,
    CONSTRAINT  fk_id_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios[id]
};