
DROP DATABASE IF EXISTS fotografia; 

CREATE DATABASE fotografia;

USE fotografia;


CREATE TABLE roles(
    ID          BIGINT(20)      NOT NULL AUTO_INCREMENT,
    NOMBRE_ROL  VARCHAR(255)    NOT NULL UNIQUE,

    PRIMARY KEY(ID)
);


INSERT INTO roles(ID, NOMBRE_ROL) VALUES
(1, 'Administrador'),
(2, 'Registrado'),
(3, 'Anonimo');


CREATE TABLE usuarios(
    ID              BIGINT(20)          NOT NULL AUTO_INCREMENT,
    NOMBRE          VARCHAR(255)        NOT NULL,
    APELLIDOS       VARCHAR(255)        NOT NULL,
    EMAIL           VARCHAR(60)         NOT NULL UNIQUE,
    DIRECCION       VARCHAR(255)        NOT NULL,
    TELEFONO        VARCHAR(9)          NOT NULL UNIQUE,
    CONTRASENHA     VARCHAR(255)     NOT NULL,
    ROL_USUARIO BIGINT(20)          NOT NULL,

    PRIMARY KEY(ID),
    FOREIGN KEY (ROL_USUARIO) REFERENCES Roles(ID)
);

INSERT INTO usuarios(ID,NOMBRE,APELLIDOS,EMAIL,DIRECCION,TELEFONO,CONTRASENHA,ROL_USUARIO) VALUES
(1,'admin','administrador','admin@gmail.com','avenida galicia',123456789,'81dc9bdb52d04dc20036dbd8313ed055',1),
(2,'prueba','registrado','prueba@gmail.com','galicia',145423678,'81dc9bdb52d04dc20036dbd8313ed055',2);

CREATE TABLE servicios (
    ID              BIGINT(20)      NOT NULL AUTO_INCREMENT,
    NOMBRE_SERVICIO VARCHAR(255)    NOT NULL,
    PRECIO_SERVICIO DECIMAL(5,2)    NOT NULL,
    DESCRIPCION     VARCHAR(255)    NOT NULL,

    PRIMARY KEY (ID)
    
);


INSERT INTO servicios(ID, NOMBRE_SERVICIO, PRECIO_SERVICIO,DESCRIPCION) VALUES
(1, 'Sesión_Interior',200,'Sesión en lugares interiores'),
(2, 'Sesión_Exterior',350,'Sesión en cualquier sitio exterior'),
(3, 'Sesión_Estudio', 400, 'Sesión en un estudio totalmente preparado'),
(4, 'Edición_de_fotografías', 100, 'Curso de 3 dias en el que aprender a editar fotografias');




CREATE TABLE reservas (
    NUM_RESERVA    BIGINT(20) NOT NULL AUTO_INCREMENT,
    ID_USUARIO     BIGINT(20) NOT NULL,
    FECHA_RESERVA  timestamp NOT NULL DEFAULT current_timestamp(),
    ID_SERVICIO    BIGINT(20) NOT NULL,


    PRIMARY KEY(NUM_RESERVA),
    FOREIGN KEY(ID_USUARIO) REFERENCES Usuarios(ID),
    FOREIGN KEY(ID_SERVICIO) REFERENCES Servicios(ID)
);






CREATE TABLE imagen_Perfil(
    ID              BIGINT(20)      NOT NULL AUTO_INCREMENT,
    IMAGEN_USUARIO  VARCHAR(255)    NOT NULL,

    PRIMARY KEY(ID)
);



CREATE TABLE imagenes_usuario(
    ID          BIGINT(20)      NOT NULL AUTO_INCREMENT,
    IMAGENES    VARCHAR(255)    NOT NULL,
    ID_USUARIO  BIGINT(20)      NOT NULL,

    PRIMARY KEY(ID),
    FOREIGN KEY(ID_USUARIO) REFERENCES Usuarios(ID)
);


CREATE TABLE historico(
    INICIO_SESION_HISTORICO DATETIME        NOT NULL
    -- ID_USUARIO              BIGINT(20)  NOT NULL,

    -- FOREIGN KEY(ID_USUARIO) REFERENCES usuarios(ID)
);