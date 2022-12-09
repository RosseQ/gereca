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

CREATE TABLE detalle_mantenimiento(
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
  placas int NULL,
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
  total int NULL,
  FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
  FOREIGN KEY (id_detalleRenta) REFERENCES detalle_renta(id_detalleRenta)
);