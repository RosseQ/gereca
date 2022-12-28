-- drop database recesanew1;
-- create database recesanew1;
-- use recesanew1;

CREATE TABLE Cat_Adaptacion  (
  id_Cat_Adaptacion int NOT NULL auto_increment,
  descripcion varchar(255) NULL,
  PRIMARY KEY (id_Cat_Adaptacion)
);

CREATE TABLE Cat_Clase_Vehiculo  (
  id_Cat_Clase_Vehiculo int NOT NULL auto_increment,
  descripcion varchar(100) NULL,
  PRIMARY KEY (id_Cat_Clase_Vehiculo)
);

CREATE TABLE Cat_VEstatus  (
  id_VEstatus int NOT NULL auto_increment,
  descripcion varchar(100) NULL,
  PRIMARY KEY (id_VEstatus)
);

CREATE TABLE Cat_Tipo  (
  id_Cat_Tipo int NOT NULL auto_increment,
  descripcion varchar(255) NULL,
  PRIMARY KEY (id_Cat_Tipo)
);

CREATE TABLE usuario  (
  id_usuario int NOT NULL auto_increment,
  uname varchar(255) NULL,
  pword varchar(30) NULL,
  PRIMARY KEY (id_usuario)
);

CREATE TABLE Clientes  (
  id_cliente int NOT NULL auto_increment,
  nombre varchar(50) NULL,
  appaterno varchar(50) NULL,
  apmaterno varchar(50) NULL,
  telefono varchar(20) NULL,
  email varchar(255) NULL,
  rfc varchar(30) NULL,
  PRIMARY KEY (id_cliente)
);

CREATE TABLE mantenimiento  (
  id_mantenimiento int NOT NULL auto_increment,
  nombre_mantenimiento varchar(100) NULL,
  PRIMARY KEY (id_mantenimiento)
);

CREATE TABLE costos  (
  id_Costo int NOT NULL auto_increment,
  precio_dia float(100,2),
  precio_sem float(100,2),
  precio_mes float(100,2),
  PRIMARY KEY (id_Costo)
);

SET FOREIGN_KEY_CHECKS=0;
drop TABLE costos;
SET FOREIGN_KEY_CHECKS=1;


CREATE TABLE vehiculos  (
  id_Vehiculo int NOT NULL auto_increment,
  tipo_unidad varchar(255) NULL,
  modelo varchar(255) NULL,
  id_Cat_Clase_Vehiculo int NOT NULL,
  id_Cat_Tipo int NULL,
  id_Cat_Adaptacion int NOT NULL,
  placas varchar(7),
  economico int NULL,
  numero_serie varchar(255) NULL,
  carga_uti float,
  id_Costo int NOT NULL,
  id_VEstatus int,
  id_DEstatus int,
  PRIMARY KEY (id_Vehiculo),
  FOREIGN KEY (id_Cat_Tipo) REFERENCES Cat_Tipo(id_Cat_Tipo),
  FOREIGN KEY (id_Cat_Clase_Vehiculo) REFERENCES Cat_Clase_Vehiculo(id_Cat_Clase_Vehiculo),
  FOREIGN KEY (id_Costo) REFERENCES costos(id_Costo),
  FOREIGN KEY (id_VEstatus) REFERENCES Cat_VEstatus(id_VEstatus),
  FOREIGN KEY (id_Cat_Adaptacion) REFERENCES Cat_Adaptacion(id_Cat_Adaptacion)
);

CREATE TABLE detalle_mantenimiento(
  id_detalleMantenimiento int NOT NULL auto_increment,
  id_mantenimiento int NULL,
  id_vehiculo int NULL,
  costo float(100,2) NULL,
  fecha_registro date,
  fecha_hecho date,
  fecha_regreso date,
  PRIMARY KEY (id_detalleMantenimiento),
  FOREIGN KEY (id_vehiculo) REFERENCES vehiculos (id_vehiculo),
  FOREIGN KEY (id_mantenimiento) REFERENCES mantenimiento (id_mantenimiento)
);

CREATE TABLE detalle_renta  (
  id_detalleRenta int NOT NULL auto_increment,
  id_vehiculo int NULL,
  cantidad int NULL,
  PRIMARY KEY (id_detalleRenta),
  FOREIGN KEY (id_vehiculo) REFERENCES vehiculos (id_vehiculo)
);

CREATE TABLE renta  (
  id_cliente int NOT NULL,
  id_detalleRenta int NOT NULL,
  total float(100,2) NULL, -- hacer que se multplique solo aqui o en el programa ya hecho
  fecha_registro date,
  fecha_hecho date,
  fecha_regreso date,
  FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
  FOREIGN KEY (id_detalleRenta) REFERENCES detalle_renta(id_detalleRenta)
);