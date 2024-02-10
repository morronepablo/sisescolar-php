
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
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES ('DOCENTE','2024-02-06 17:09:00','1');

CREATE TABLE usuarios (

      id_usuario          INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      rol_id              INT (11) NOT NULL,
      email               VARCHAR (191) NOT NULL UNIQUE KEY, -- Reduced length
      password            TEXT NOT NULL,

      fyh_creacion        DATETIME NULL,
      fyh_actualizacion   DATETIME NULL,
      estado              VARCHAR (11),

      FOREIGN KEY (rol_id) REFERENCES roles (id_rol) on delete no action on update cascade

)ENGINE=InnoDB;

-- Contraseña administrador: 12345678
INSERT INTO `usuarios` (`id_usuario`, `rol_id`, `email`, `password`, `fyh_creacion`, `fyh_actualizacion`, `estado`)
VALUES (1, 1, 'admin@admin.com', '$2y$10$stDgJaxvsgpBtrkXcV0uA.kuFWG5hf1e37puH9ovcjIorg9ooadNe', '2024-02-08 21:43:46', NULL, '1');


CREATE TABLE personas (

    id_persona             INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usuario_id             INT (11) NOT NULL,
    nombres                VARCHAR (50) NOT NULL,
    apellidos              VARCHAR (50) NOT NULL,
    ci                     VARCHAR (20) NOT NULL,
    fecha_nacimiento       VARCHAR (20) NOT NULL,
    profesion              VARCHAR (50) NOT NULL,
    direccion              VARCHAR (255) NOT NULL,
    celular                VARCHAR (20) NOT NULL,

    fyh_creacion           DATETIME NULL,
    fyh_actualizacion      DATETIME NULL,
    estado                 VARCHAR (11),

    FOREIGN KEY (usuario_id) REFERENCES usuarios (id_usuario) on delete no action on update cascade


)ENGINE=InnoDB;

INSERT INTO personas  (usuario_id,nombres,apellidos,ci,fecha_nacimiento,profesion,direccion,celular,fyh_creacion,estado)
VALUES  ('1','Pablo Martín','Morrone','12345678','14/08/1971','Desarrollador Web Fullstack','El Arreo 220 - (1738) La Reja','1138669097','2024-01-28 20:29:10','1');


CREATE TABLE administrativos (

    id_administrativo      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id             INT (11) NOT NULL,

    fyh_creacion           DATETIME NULL,
    fyh_actualizacion      DATETIME NULL,
    estado                 VARCHAR (11),

    FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade


)ENGINE=InnoDB;


CREATE TABLE docentes (

    id_docente             INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id             INT (11) NOT NULL,
    especialidad           VARCHAR (255) NOT NULL,
    antiguedad             VARCHAR (50) NOT NULL,

    fyh_creacion           DATETIME NULL,
    fyh_actualizacion      DATETIME NULL,
    estado                 VARCHAR (11),

    FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade


)ENGINE=InnoDB;


CREATE TABLE estudiantes (

    id_estudiante          INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id             INT (11) NOT NULL,

    fyh_creacion           DATETIME NULL,
    fyh_actualizacion      DATETIME NULL,
    estado                 VARCHAR (11),

    FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade


)ENGINE=InnoDB;



CREATE TABLE ppffs (

    ppff                   INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id             INT (11) NOT NULL,

    fyh_creacion           DATETIME NULL,
    fyh_actualizacion      DATETIME NULL,
    estado                 VARCHAR (11),

    FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade


)ENGINE=InnoDB;


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
VALUES  ('Morrone Web Scholl','logo.jpg','El Arreo 220 - La Reja (1738)','11-38669097','11-38669097','morronescholl@gmail.com','2023-12-28 20:29:10','1');


CREATE TABLE gestiones (

    id_gestion             INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gestion                VARCHAR (255) NOT NULL,

    fyh_creacion           DATETIME NULL,
    fyh_actualizacion      DATETIME NULL,
    estado                 VARCHAR (11)


)ENGINE=InnoDB;

INSERT INTO gestiones  (gestion,fyh_creacion,estado)
VALUES  ('GESTION 2024','2024-01-28 20:29:10','1');


CREATE TABLE niveles (

     id_nivel            INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
     gestion_id          INT (11) NOT NULL,
     nivel               VARCHAR (255) NOT NULL,
     turno               VARCHAR (255) NOT NULL,

     fyh_creacion        DATETIME NULL,
     fyh_actualizacion   DATETIME NULL,
     estado              VARCHAR (11),

     FOREIGN KEY (gestion_id) REFERENCES gestiones (id_gestion) on delete no action on update cascade

)ENGINE=InnoDB;

INSERT INTO niveles  (gestion_id,nivel,turno,fyh_creacion,estado)
VALUES  ('1','INICIAL','MAÑANA','2024-01-28 20:29:10','1');


CREATE TABLE grados (

    id_grado            INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nivel_id            INT (11) NOT NULL,
    curso               VARCHAR (255) NOT NULL,
    paralelo            VARCHAR (255) NOT NULL,

    fyh_creacion        DATETIME NULL,
    fyh_actualizacion   DATETIME NULL,
    estado              VARCHAR (11),

    FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade

)ENGINE=InnoDB;

INSERT INTO grados  (nivel_id,curso,paralelo,fyh_creacion,estado)
VALUES  ('1','INICIAL - 1','A','2024-01-28 20:29:10','1');


CREATE TABLE materias (

    id_materia             INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_materia         VARCHAR (255) NOT NULL,

    fyh_creacion           DATETIME NULL,
    fyh_actualizacion      DATETIME NULL,
    estado                 VARCHAR (11)


)ENGINE=InnoDB;

INSERT INTO materias  (nombre_materia,fyh_creacion,estado)
VALUES  ('MATEMÁTICA','2024-01-28 20:29:10','1');