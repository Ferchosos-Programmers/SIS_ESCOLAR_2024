CREATE TABLE roles (
    id_rol         INT(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_rol             VARCHAR(255) NOT NULL UNIQUE,
    fyh_creacion        DATETIME NULL,
    fyh_actualizacion   DATETIME NULL,
    estado              VARCHAR(11)
)ENGINE = InnoDB;

CREATE TABLE usuarios (
    id_usuario          INT(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombres             VARCHAR(255) NOT NULL,
    rol_id              INT(11) NOT NULL,
    email               VARCHAR(255) NOT NULL UNIQUE KEY,
    password            TEXT NOT NULL,
    fyh_creacion        DATETIME NULL,
    fyh_actualizacion   DATETIME NULL,
    estado              VARCHAR(11)

    FOREIGN KEY (rol_id) REFERENCES roles (id_rol) ON DELETE NO ACTION ON UPDATE  CASCADE 
)ENGINE = InnoDB;

CREATE TABLE configuracion_instituciones (
    id_config_institucion       INT(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_institucion          VARCHAR(255) NOT NULL,
    logo                        VARCHAR(255) NULL,
    direccion                   VARCHAR(255) NOT NULL,
    telefono                    VARCHAR(9) NULL,
    celular                     VARCHAR(10) NULL,
    correo                      VARCHAR(100) NULL,
    fyh_creacion                DATETIME NULL,
    fyh_actualizacion           DATETIME NULL,
    estado                      VARCHAR(11)
)ENGINE = InnoDB;

CREATE TABLE gestiones (
    id_gestion       INT(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
    anio_lectivo          VARCHAR(255) NOT NULL,
    fyh_creacion                DATETIME NULL,
    fyh_actualizacion           DATETIME NULL,
    estado                      VARCHAR(11)
)ENGINE = InnoDB;

CREATE TABLE niveles (

  id_nivel       INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  gestion_id     INT (11) NOT NULL,
  nivel          VARCHAR (255) NOT NULL,
  jornada        VARCHAR (255) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (gestion_id) REFERENCES gestiones (id_gestion) on delete no action on update cascade

)ENGINE=InnoDB;