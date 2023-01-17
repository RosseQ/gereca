--CONSULTA DE VEHICULOS
select vehiculos.id_vehiculo as 'ROW0', vehiculos.tipo_unidad as 'ROW1', vehiculos.modelo as 'ROW2',
Cat_Clase_Vehiculo.descripcion as 'ROW3', Cat_Tipo.descripcion as 'ROW4',
Cat_Adaptacion.descripcion as 'ROW5', vehiculos.placas as 'ROW6',
vehiculos.economico as 'ROW7', vehiculos.numero_serie as 'ROW8', vehiculos.carga_uti as 'ROW9',
costos.precio_dia as 'ROW10', costos.precio_sem as 'ROW11', costos.precio_mes as 'ROW12',
Cat_VEstatus.descripcion as 'ROW13'
from vehiculos
INNER JOIN Cat_Clase_Vehiculo on vehiculos.id_Cat_Clase_Vehiculo = Cat_Clase_Vehiculo.id_Cat_Clase_Vehiculo
INNER JOIN Cat_Tipo on vehiculos.id_Cat_Tipo = Cat_Tipo.id_Cat_Tipo
INNER JOIN Cat_Adaptacion on vehiculos.id_Cat_Adaptacion = Cat_Adaptacion.id_Cat_Adaptacion
INNER JOIN Costos on vehiculos.id_Costo = Costos.id_Costo
INNER JOIN Cat_VEstatus on vehiculos.id_VEstatus = Cat_VEstatus.id_VEstatus
order by vehiculos.economico asc

--CONSULTA DE MANTENIMIENTOS
select detalle_mantenimiento.id_detalleMantenimiento as 'ID',
vehiculos.tipo_unidad as 'VEHICLE',
mantenimiento.nombre_mantenimiento as 'TYPE',
vehiculos.economico as 'ECON',
detalle_mantenimiento.costo as 'COST',
detalle_mantenimiento.fecha_hecho as 'DATE_1',
detalle_mantenimiento.fecha_regreso as 'DATE_2',
detalle_mantenimiento.fecha_registro as 'DATE_3'
from detalle_mantenimiento
INNER JOIN mantenimiento on detalle_mantenimiento.id_mantenimiento = mantenimiento.id_mantenimiento
INNER JOIN vehiculos on detalle_mantenimiento.id_vehiculo = vehiculos.id_Vehiculo
order by detalle_mantenimiento.fecha_registro ASC

select * from mantenimiento
select * from detalle_mantenimiento

-- CONSULTA DE RENTAS
select clientes.nombre as 'NAME', clientes.appaterno as 'FSURNAME',
clientes.apmaterno as 'MSURNAME', vehiculos.tipo_unidad as 'CAR', vehiculos.economico as 'ECON',
detalle_renta.cantidad as 'QUANTITY', renta.total as 'TOTAL',
renta.fecha_hecho as 'DATE_1', renta.fecha_regreso as 'DATE_2', renta.fecha_registro as 'DATE_3'
from renta
INNER JOIN clientes on renta.id_cliente = clientes.id_cliente
INNER JOIN detalle_renta on renta.id_detalleRenta = detalle_renta.id_detalleRenta
INNER JOIN vehiculos on detalle_renta.id_Vehiculo = vehiculos.id_Vehiculo

-- CONSULTA DE CLIENTES
SELECT clientes.id_cliente as 'id',
clientes.nombre as 'NAME1', clientes.appaterno as 'NAME2', clientes.appaterno as 'NAME3',
clientes.telefono as 'TEL', clientes.email as 'MAIL', clientes.direccion as 'ADDR',
clientes.rfc as 'RFC', clientes.curp as 'CURP', clientes.num_doc as 'NDOC', clientes.ocr as 'OCR'
FROM clientes ORDER BY clientes.id_cliente ASC;

--CONSULTA VEHICULOS PARA VER SI EXITE RENTA EN INTERVALO DE FECHAS

select * from renta
select * from detalle_renta

select * from renta
where fecha_hecho >= '2022-11-20'
and fecha_hecho <= date_add('2022-11-20', INTERVAL 30 DAY)

select * from renta INNER JOIN detalle_renta on renta.id_detalleRenta = detalle_renta.id_detalleRenta
where fecha_hecho BETWEEN '2023-01-04' and date_add('2023-01-04', INTERVAL 30 DAY)
AND fecha_regreso BETWEEN '2023-01-04' and date_add('2023-01-04', INTERVAL 30 DAY)
AND id_Vehiculo = 7

SELECT date_add('2022-11-20', INTERVAL 1 DAY)

--CONSULTA VEHICULOS PARA VER SI EXITE DETALLE MANTENIMIENTO EN INTERVALO DE FECHAS

select * from detalle_mantenimiento

select * from detalle_mantenimiento
where fecha_hecho BETWEEN '2023-01-04' and date_add('2023-01-04', INTERVAL 30 DAY)
AND fecha_regreso BETWEEN '2023-01-04' and date_add('2023-01-04', INTERVAL 30 DAY)
AND id_Vehiculo = 1

SELECT date_add('2022-11-20', INTERVAL 1 DAY)


---
select * from renta INNER JOIN detalle_renta on renta.id_detalleRenta = detalle_renta.id_detalleRenta
where id_Vehiculo = 2
ORDER BY id_Vehiculo DESC limit 1;