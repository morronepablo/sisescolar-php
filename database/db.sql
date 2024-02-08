
CREATE TABLE roles (

   id_rol               INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
   nombre_rol           VARCHAR (191) NOT NULL UNIQUE KEY, -- Reduced length

   fyh_creacion         DATETIME NULL,
   fyh_actualizacion    DATETIME NULL,
   estado               VARCHAR (11)

)ENGINE=InnoDB;

INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES ('ADMINISTRADOR','2024-02-06 17:09:00','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES ('DIRECTOR ACADÉMICO','2024-02-06 17:09:00','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES ('DIRECTOR ADMINISTRATIVO','2024-02-06 17:09:00','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES ('CONTADOR','2024-02-06 17:09:00','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES ('SECRETARIA','2024-02-06 17:09:00','1');

CREATE TABLE usuarios (

    id_usuario          INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombres             VARCHAR (255) NOT NULL,
    rol_id              INT (11) NOT NULL,
    email               VARCHAR (191) NOT NULL UNIQUE KEY, -- Reduced length
    password            TEXT NOT NULL,

    fyh_creacion        DATETIME NULL,
    fyh_actualizacion   DATETIME NULL,
    estado              VARCHAR (11),

    FOREIGN KEY (rol_id) REFERENCES roles (id_rol) on delete cascade on update cascade

)ENGINE=InnoDB;

-- Contraseña administrador: 12345678
INSERT INTO usuarios  (nombres,rol_id,email,password,fyh_creacion,estado)
VALUES  ('Pablo Morrone','1','admin@admin.com','$2y$10$L8FLw76xaijs3Xp5/VgNEeR..E2/Dv.dx2Il6ESSJGtSCv5qPT8OW','2023-12-28 20:29:10','1')


CREATE TABLE configuracion_instituciones (

  id_config_institucion     INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_institucion        VARCHAR (255) NOT NULL,
  logo                      VARCHAR (255) NULL,
  direccion                 VARCHAR (255) NOT NULL,
  telefono                  VARCHAR (100) NULL,
  celular                   VARCHAR (100) NULL,
  correo                    VARCHAR (255) NULL,

  fyh_creacion              DATETIME NULL,
  fyh_actualizacion         DATETIME NULL,
  estado                    VARCHAR (11)


)ENGINE=InnoDB;

INSERT INTO configuracion_instituciones  (nombre_institucion,logo,direccion,telefono,celular,correo,fyh_creacion,estado)
VALUES  ('Morrone Web Scholl','logo.jpg','El Arreo 220 - La Reja (1738)','11-38669097','11-38669097','morronescholl@gmail.com','2023-12-28 20:29:10','1')


CREATE TABLE gestiones (

     id_gestion             INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
     gestion                VARCHAR (255) NOT NULL,

     fyh_creacion           DATETIME NULL,
     fyh_actualizacion      DATETIME NULL,
     estado                 VARCHAR (11)


)ENGINE=InnoDB;

INSERT INTO gestiones  (gestion,fyh_creacion,estado)
VALUES  ('GESTION 2023','2023-12-28 20:29:10','1')


CREATE TABLE niveles (

  id_nivel            INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  gestion_id          INT (11) NOT NULL,
  nivel               VARCHAR (255) NOT NULL,
  turno               VARCHAR (255) NOT NULL,

  fyh_creacion        DATETIME NULL,
  fyh_actualizacion   DATETIME NULL,
  estado              VARCHAR (11),

  FOREIGN KEY (gestion_id) REFERENCES gestiones (id_gestion) on delete cascade on update cascade

)ENGINE=InnoDB;

INSERT INTO niveles  (gestion_id,nivel,turno,fyh_creacion,estado)
VALUES  ('1','INICIAL','MAÑANA','2023-12-28 20:29:10','1')
