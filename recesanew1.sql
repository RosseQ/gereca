-- drop database recesanew1;
-- create database recesanew1;
-- use recesanew1;

CREATE TABLE Cat_Adaptacion  (
  id_Cat_Adaptacion int NOT NULL,
  descripcion varchar(255) NULL,
  PRIMARY KEY (id_Cat_Adaptacion)
);


CREATE TABLE Cat_Clase_Vehiculo  (
  id_Cat_Clase_Vehiculo int NOT NULL ,
  descripcion varchar(100) NULL,
  PRIMARY KEY (id_Cat_Clase_Vehiculo)
);


CREATE TABLE Cat_Tipo_unidad  (
  id_Cat_Tipo int NOT NULL,
  descripcion varchar(255) NULL,
  PRIMARY KEY (id_Cat_Tipo)
);

CREATE TABLE Clientes  (
  id_cliente int NOT NULL,
  nombre varchar(50) NULL,
  appaterno varchar(50) NULL,
  apmaterno varchar(50) NULL,
  telefono varchar(20) NULL,
  email varchar(255) NULL,
  rfc varchar(30) NULL,
  PRIMARY KEY (id_cliente)
);

CREATE TABLE costos  (
  id_costo int NOT NULL,
  tipo_prestamo varchar(50),
  precio int,
  PRIMARY KEY (id_costo)
);

CREATE TABLE mantenimiento  (
  id_mantenimiento int NOT NULL,
  nombre_mantenimiento varchar(100) NULL,
  descr varchar(200) NULL,
  precio int NULL,
  PRIMARY KEY (id_mantenimiento)
);

CREATE TABLE detalle_mantenimiento( -- tal vez se borro esta tabla, no me acuerdo que hace o no le encuentro congruencia
  id_detalleMantenimiento int NOT NULL,
  id_mantenimiento int NULL,
  PRIMARY KEY (id_detalleMantenimiento),
  FOREIGN KEY (id_mantenimiento) REFERENCES mantenimiento (id_mantenimiento)
);

CREATE TABLE vehiculos  (
  id_Vehiculo int NOT NULL,
  modelo varchar(255) NULL,
  id_Cat_Clase_Vehiculo int NOT NULL,
  id_Cat_Tipo int NULL,
  id_Cat_Adaptacion int NOT NULL,
  id_detalleMantenimiento int NOT NULL,
  economico int NULL,
  placas int NULL, ---cambiar esto por varchar porque las placas tambien llevan letras
  numero_serie varchar(255) NULL,
  carga_uti float,
  PRIMARY KEY (id_Vehiculo),
  FOREIGN KEY (id_Cat_Tipo) REFERENCES Cat_Tipo_unidad(id_Cat_Tipo),
  FOREIGN KEY (id_Cat_Clase_Vehiculo) REFERENCES Cat_Clase_Vehiculo(id_Cat_Clase_Vehiculo),
  FOREIGN KEY (id_detallemantenimiento) REFERENCES detalle_mantenimiento(id_detalleMantenimiento),
  FOREIGN KEY (id_Cat_Adaptacion) REFERENCES Cat_Adaptacion(id_Cat_Adaptacion)
);

CREATE TABLE detalle_renta  (
  id_detalleRenta int NOT NULL,
  id_vehiculo int NULL,
  id_costo int NULL,
  canitdad int NULL,
  PRIMARY KEY (id_detalleRenta),
  FOREIGN KEY (id_vehiculo) REFERENCES vehiculos (id_vehiculo),
  FOREIGN KEY (id_costo) REFERENCES COSTOS (id_costo)
);

CREATE TABLE renta  (
  id_cliente int NOT NULL,
  id_detalleRenta int NOT NULL,
  total int NULL, -- hacer que se multplique solo aqui o en el programa ya hecho
  FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
  FOREIGN KEY (id_detalleRenta) REFERENCES detalle_renta(id_detalleRenta)
);


INSERT INTO Cat_Adaptacion values
(1,'Panel Seca'),
(2,'Caja Seca'),
(3,'Quinta Rueda'),
(4,'Panel'),
(5,'Panel Seca'),
(6,'Caja Refrigerada'),
(7,'Panel Seca');

INSERT INTO Cat_Clase_Vehiculo values
(1,'Ultraligero'),
(2,'Ligero'),
(3,'Mediano'),
(4,'Pesado'),
(5,'Mediano');

INSERT INTO Cat_Tipo_unidad values
(1,'Cargo Van'),
(2,'Camion'),
(3,'Rabon LP'),
(4,'Rabon'),
(5,'Tractocamión');

INSERT INTO clientes values
(1,'Ramon Antonio', 'Sanchez', 'Madrid', '621724753', 'fogavip792@diratu.com', 'BECP931215634'),
(2,'Orlando', 'Cota', 'Limon', '8197809142', 'sabogi5944@diratu.com', 'OACL960312UJ0'),
(3,'Jazmin', 'Murillo', 'Peralta', '16625102', 'lexefih882@dmonies.com', 'JAMP200913U48'),
(4,'Pablo Ernesto', 'Salazar', 'Carrillo', '6624620854', 'sabogi5944@diratu.com', 'PASC981201QC7'),
(5,'Fernanda', 'Alondra', 'Salazar', '4979581', 'homan75804@diratu.com', 'FESC040418155'),
(6,'Eliot Sebastian', 'Salazar', 'Murillo', '041495544', 'sabogi5944@diratu.com', 'EISM220712KU7'),
(7,'Michelle', 'Sanchez', 'Limon', '5408741671', 'homan75804@diratu.com', 'MISL960712D78');

insert into costos values
(1, 'dia', 2125),
(2, 'semana', 1973),
(3, 'mes', 1823);

INSERT INTO mantenimiento values
(1,'Cambio de aceite', 'cambio de aciete al motor', 5),
(2,'Cambio de llantas', 'cambio de llantas, 16 llantas por camion',150),
(3,'cambio de cableado', 'cambio de cable para evitar corto',30000);

INSERT INTO detalle_mantenimiento values
(1,2),
(2,3),
(3,1);

INSERT INTO vehiculos values
(1,'nissan',2 , 3, 3, 1, 232, 1212, 'sadji332', 227),
(2,'Ford',3 , 1, 3, 1, 5553, 121, '45dfd', 226),
(3,'Chevrolete',1 , 2, 3, 1, 1234, 31234, 'cxcv4', 225),
(4,'nissan',1 , 2, 2, 1, 1223, 1234, 'asddas5', 224),
(5,'nissan',2 , 2, 3, 1, 213, 435, 'asd332', 223);

INSERT INTO detalle_renta values
(1,1,1,532),
(2,3,3,567),
(3,2,1,345),
(4,5,2,14),
(5,4,2,6);

INSERT INTO renta values
(1,1,31232),
(2,3,332423),
(3,2,1234),
(4,5,4345),
(5,4,4566);


--sorry por subirlo tan tarde