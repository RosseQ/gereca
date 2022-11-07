create database Proyecto_Recesa

use Proyecto_Recesa

create table Cat_Clase_Vehiculo
(
	id_Cat_Clase_Vehiculo int not null auto_increment,
	descripcion varchar(50),
	primary key (id_Cat_Clase_Vehiculo)
);
create table Cat_Tipo
(
	id_Cat_Tipo int not null auto_increment,
	descripcion varchar(50),
	primary key (id_Cat_Tipo)
);
create table Cat_Adaptacion
(
	id_Cat_Adaptacion int not null auto_increment,
	descripcion varchar(50),
	primary key (id_Cat_Adaptacion)
);
create table Cat_Tipo_Renta
(
	id_Cat_Tipo_Renta int not null auto_increment,
	descripcion varchar(50),
	primary key (id_Cat_Tipo_Renta)
);
create table Vehiculos
(
	id_Vehiculo int not null,
	tipo_unidad varchar (50),
	modelo varchar(50),
	id_Cat_Clase_Vehiculo int,
	id_Cat_Tipo int,
	id_Cat_Adaptacion int,
	placas varchar(7),
	primary key (id_Vehiculo),
	Foreign key (id_Cat_Clase_Vehiculo) references Cat_Clase_Vehiculo (id_Cat_Clase_Vehiculo),
	Foreign key (id_Cat_Tipo) references Cat_Tipo (id_Cat_Tipo),
	Foreign key (id_Cat_Adaptacion) references Cat_Adaptacion (id_Cat_Adaptacion)
);
create table Ingresos
(
	id_Ingresos int not null auto_increment,
	id_Vehiculo int not null,
	id_Cat_Tipo_Renta int not null,
	dias int,
	tarifa float(100,2),
	costmantenimiento float(100,2),
	totalneto float(100,2),
	fecha_ingreso date,
	primary key (id_Ingresos),
	foreign key (id_Vehiculo) references Vehiculos (id_Vehiculo),
	foreign key (id_Cat_Tipo_Renta) references Cat_Tipo_Renta (id_Cat_Tipo_Renta)
);

insert into Cat_Clase_Vehiculo (descripcion)
values
('Ultra Ligero'),
('Ligero'),
('Mediano'),
('Pesado');

select * from Cat_Clase_Vehiculo

insert into Cat_Tipo (descripcion)
values
('Cargo Van'),
('Camión'),
('Rabón LP'),
('Rabón'),
('Tractocamión');

select * from Cat_Tipo

insert into Cat_Adaptacion (descripcion)
values
('Panel Seco.'),
('Caja Seca.'),
('Quinta Rueda.'),
('Panel Refrigerado.'),
('Caja Refrigerada.');

--drop table Cat_Adaptacion
select * from Cat_Adaptacion

insert into Cat_Tipo_Renta (descripcion)
values
('Dia'),
('Semana'),
('Mes');

select * from Cat_Tipo_Renta

insert into Vehiculos
values
(1, 'Cargo Van 1.5 Ton.', 'Peugeot Manager', 1, 1, 1, 'test01'),
(2, 'Cargo Van 3.0 Ton.', 'Peugeot Manager', 1, 1, 1, 'test02'),
(3, 'F 450 Ford 4.0 Ton.', 'F 450', 2, 2, 2, 'test03'),
(4, 'Camión Seco 7.0 Ton.', 'Rabón LP', 2, 3, 2, 'test04'),
(5, 'Camión Seco 10.0 Ton.', 'Rabón', 3, 4, 2, 'test05'),
(6, 'Tracto Quinta Rueda 52.0 Ton.', 'Tracto Prostar', 4, 5, 2, 'test06'),
(7, 'Panel Refrigerado 3.0 Ton.', 'Peugeot Manager', 2, 1, 4, 'test07'),
(8, 'Camión Refrigerado 5.0 Ton.', 'City Star 5 (JAC)', 2, 1, 5, 'test08'),
(9, 'Camión Refrigerado 7.0 Ton.', 'Rabón LP', 2, 3, 5, 'test09'),
(10, 'Camión Refrigerado 7.0 Ton.', 'Rabón LP', 3, 4, 5, 'test10');

select * from Vehiculos

insert into Ingresos (id_Vehiculo, id_Cat_Tipo_Renta, dias, tarifa, costmantenimiento, totalneto, fecha_ingreso) values
(1,1,30,6000,1500, tarifa - costmantenimiento, DATE_FORMAT(CURDATE(), '%Y-%m-%d'));

select * from Ingresos;

--drop table Ingresos

--delete from Ingresos where id_Ingresos = 2;