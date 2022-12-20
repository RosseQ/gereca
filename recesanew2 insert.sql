

insert into Cat_Adaptacion (descripcion)
values
('Panel Seco.'),
('Caja Seca.'),
('Quinta Rueda.'),
('Panel Refrigerado.'),
('Caja Refrigerada.');

INSERT INTO Cat_Clase_Vehiculo values
(1,'Ultraligero'),
(2,'Ligero'),
(3,'Mediano'),
(4,'Pesado'),
(5,'Mediano');

INSERT INTO Cat_Tipo values
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

INSERT INTO vehiculos values
(1, 'Cargo Van 1.5 Ton.', 'Peugeot Manager', 1, 1, 1, 'test01', 1, "V-01", 1.5,2000,3000,4000),
(2, 'Cargo Van 3.0 Ton.', 'Peugeot Manager', 1, 1, 1, 'test02',2, "V-02", 3,2000,3000,4000),
(3, 'F 450 Ford 4.0 Ton.', 'F 450', 2, 2, 2, 'test03', 3, "V-03", 4,2000,3000,4000),
(4, 'Camión Seco 7.0 Ton.', 'Rabón LP', 2, 3, 2, 'test04', 4, "V-04", 7,2000,3000,4000),
(5, 'Camión Seco 10.0 Ton.', 'Rabón', 3, 4, 2, 'test05', 5, "V-05", 10,2000,3000,4000),
(6, 'Tracto Quinta Rueda 52.0 Ton.', 'Tracto Prostar', 4, 5, 2, 'test06', 6, "V-06", 52.0,2000,3000,4000),
(7, 'Panel Refrigerado 3.0 Ton.', 'Peugeot Manager', 2, 1, 4, 'test07', 7, "V-07", 3,2000,3000,4000),
(8, 'Camión Refrigerado 5.0 Ton.', 'City Star 5 (JAC)', 2, 1, 5, 'test08', 8, "V-08", 5,2000,3000,4000),
(9, 'Camión Refrigerado 7.0 Ton.', 'Rabón LP', 2, 3, 5, 'test09', 9, "V-09", 7,2000,3000,4000),
(10, 'Camión Refrigerado 7.0 Ton.', 'Rabón LP', 3, 4, 5, 'test10', 10, "V-10", 7,2000,3000,4000);

INSERT INTO detalle_mantenimiento values
(1,2,1, '2022-11-21'),
(2,3,7, '2022-11-23'),
(3,1,5, '2022-11-29');

INSERT INTO detalle_renta values
(1,1,532),
(2,3,567),
(3,2,345),
(4,5,14),
(5,4,6);

INSERT INTO renta values
(1,1,31232, '2022-11-20'),
(2,3,332423, '2022-11-22'),
(3,2,1234, '2022-11-27'),
(4,5,4345, '2022-11-30'),
(5,4,4566, '2022-12-5');