--CONSULTA DE VEHICULOS
select vehiculos.id_vehiculo as 'ROW0', vehiculos.tipo_unidad as 'ROW1', vehiculos.modelo as 'ROW2',
Cat_Clase_Vehiculo.descripcion as 'ROW3', Cat_Tipo.descripcion as 'ROW4',
Cat_Adaptacion.descripcion as 'ROW5', vehiculos.placas as 'ROW6',
vehiculos.economico as 'ROW7', vehiculos.numero_serie as 'ROW8', vehiculos.carga_uti as 'ROW9',
costos.precio_dia as 'ROW10', costos.precio_sem as 'ROW11', costos.precio_mes as 'ROW12'
from vehiculos
INNER JOIN Cat_Clase_Vehiculo on vehiculos.id_Cat_Clase_Vehiculo = Cat_Clase_Vehiculo.id_Cat_Clase_Vehiculo
INNER JOIN Cat_Tipo on vehiculos.id_Cat_Tipo = Cat_Tipo.id_Cat_Tipo
INNER JOIN Cat_Adaptacion on vehiculos.id_Cat_Adaptacion = Cat_Adaptacion.id_Cat_Adaptacion
INNER JOIN Costos on vehiculos.id_Costo = Costos.id_Costo

--CONSULTA DE MANTENIMIENTOS
select detalle_mantenimiento.id_detalleMantenimiento as 'ID',
mantenimiento.nombre_mantenimiento as 'NAME', mantenimiento.precio as 'COST',
vehiculos.tipo_unidad as 'VEHICLE',
detalle_mantenimiento.fecha as 'DATE'
from detalle_mantenimiento
INNER JOIN mantenimiento on detalle_mantenimiento.id_mantenimiento = mantenimiento.id_mantenimiento
INNER JOIN vehiculos on detalle_mantenimiento.id_vehiculo = vehiculos.id_Vehiculo

-- CONSULTA DE RENTAS
select clientes.nombre as 'NAME', clientes.appaterno as 'FSURNAME',
clientes.apmaterno as 'MSURNAME', vehiculos.tipo_unidad as 'CAR', vehiculos.economico as 'ECON',
detalle_renta.cantidad as 'QUANTITY', renta.total as 'TOTAL',
renta.fecha as 'DATE'
from renta
INNER JOIN clientes on renta.id_cliente = clientes.id_cliente
INNER JOIN detalle_renta on renta.id_detalleRenta = detalle_renta.id_detalleRenta
INNER JOIN vehiculos on detalle_renta.id_Vehiculo = vehiculos.id_Vehiculo