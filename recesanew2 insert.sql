

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

INSERT INTO Cat_DEstatus values
(1,'Existe'),
(2,'No Existe'),

INSERT INTO Cat_VEstatus values
(1,'Disponible'),
(2,'Rentado'),
(3,'En Mantenimiento');

INSERT INTO clientes values
(1,'Ramon Antonio', 'Sanchez', 'Madrid', '621724753', 'fogavip792@diratu.com', 'colonia arandanos calle saucos 13', 'BECP931215634', 'CAVJ770826HQRHGS69','484060542', '367280047'),
(2,'Orlando', 'Cota', 'Limon', '8197809142', 'sabogi5944@diratu.com', 'colonia arandanos calle saucos 13', 'OACL960312UJ0', 'SOPM770826MSPTNR82', '639899737', '617512389'),
(3,'Jazmin', 'Murillo', 'Peralta', '16625102', 'lexefih882@dmonies.com', 'colonia arandanos calle saucos 13', 'JAMP200913U48', 'RARJ770826MQTMDS74', '177987121', '752085713'),
(4,'Pablo Ernesto', 'Salazar', 'Carrillo', '6624620854', 'sabogi5944@diratu.com', 'colonia arandanos calle saucos 13', 'PASC981201QC7','RUSJ770826MVZZLS79', '849428595', '474880339'),
(5,'Fernanda', 'Alondra', 'Salazar', '4979581', 'homan75804@diratu.com', 'colonia arandanos calle saucos 13','FESC040418155', 'OIFD770826MBCRLG39', '602847200', '602782355'),
(6,'Eliot Sebastian', 'Salazar', 'Murillo', '041495544', 'sabogi5944@diratu.com', 'colonia arandanos calle saucos 13', 'EISM220712KU7', 'GOCF770826HSLMRR16', '391538237', '341214872'),
(7,'Michelle', 'Sanchez', 'Limon', '5408741671', 'homan75804@diratu.com', 'colonia arandanos calle saucos 13', 'MISL960712D78', 'MERS770826MNLNSN92', '277123875', '174455742');

insert into costos values
(1, 2125, 1973, 1823),
(2, 2614, 2423, 2232),
(3, 3175, 2938, 2700),
(4, 4128, 3840, 3553),
(5, 4235, 3950, 3665),
(6, 6325, 5866, 5407),
(7, 3175, 2936, 2697),
(8, 4472, 4126, 3781),
(9, 5440, 5043, 4647),
(10, 5546, 5152, 4758);

INSERT INTO mantenimiento values
(1,'Preventivo'),
(2,'Correctivo');

INSERT INTO vehiculos values
(1, 'Cargo Van 1.5 Ton.', 'Peugeot Manager', 1, 1, 1, 'test01', 1, "V-01", 1.5, 1, 1, 1),
(2, 'Cargo Van 3.0 Ton.', 'Peugeot Manager', 1, 1, 1, 'test02',2, "V-02", 3, 2, 1, 1),
(3, 'F 450 Ford 4.0 Ton.', 'F 450', 2, 2, 2, 'test03', 3, "V-03", 4, 3, 1, 1),
(4, 'Camión Seco 7.0 Ton.', 'Rabón LP', 2, 3, 2, 'test04', 4, "V-04", 7, 4, 1, 1),
(5, 'Camión Seco 10.0 Ton.', 'Rabón', 3, 4, 2, 'test05', 5, "V-05", 10, 5, 1, 1),
(6, 'Tracto Quinta Rueda 52.0 Ton.', 'Tracto Prostar', 4, 5, 2, 'test06', 6, "V-06", 52.0, 6, 1, 1),
(7, 'Panel Refrigerado 3.0 Ton.', 'Peugeot Manager', 2, 1, 4, 'test07', 7, "V-07", 3, 7, 1, 1),
(8, 'Camión Refrigerado 5.0 Ton.', 'City Star 5 (JAC)', 2, 1, 5, 'test08', 8, "V-08", 5, 8, 1, 1),
(9, 'Camión Refrigerado 7.0 Ton.', 'Rabón LP', 2, 3, 5, 'test09', 9, "V-09", 7, 9, 1, 1),
(10, 'Camión Refrigerado 10.0 Ton.', '4300 Rabon', 3, 4, 5, 'test10', 10, "V-10", 7, 10, 1, 1);

INSERT INTO detalle_mantenimiento values
(1,2,1, 2500,'2022-11-21','2022-11-21', '2022-11-30'),
(2,2,7, 1600,'2022-11-23','2022-11-23', '2022-11-29'),
(3,1,5, 350,'2022-11-29','2022-11-29', '2022-12-7');

INSERT INTO detalle_renta values
(1,1,532),
(2,3,567),
(3,2,345),
(4,5,14),
(5,4,6);

INSERT INTO renta values
(1,1,31232, '2022-11-20', '2022-11-20', '2022-11-25'),
(2,3,332423, '2022-11-22', '2022-11-22', '2022-11-29'),
(3,2,1234, '2022-11-27', '2022-11-27', '2022-12-27'),
(4,5,4345, '2022-11-30', '2022-11-30', '2022-12-7'),
(5,4,4566, '2022-12-5', '2022-12-5', '2022-12-25');

select * from renta