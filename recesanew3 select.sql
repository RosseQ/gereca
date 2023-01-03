--CONSULTA DE VEHICULOS
select vehiculos.id_vehiculo as 'ROW0', vehiculos.tipo_unidad as 'ROW1', vehiculos.modelo as 'ROW2',
Cat_Clase_Vehiculo.descripcion as 'ROW3', Cat_Tipo.descripcion as 'ROW4',
Cat_Adaptacion.descripcion as 'ROW5', vehiculos.placas as 'ROW6',
vehiculos.economico as 'ROW7', vehiculos.numero_serie as 'ROW8', vehiculos.carga_uti as 'ROW9',
costos.precio_dia as 'ROW10', costos.precio_sem as 'ROW11', costos.precio_mes as 'ROW12'
Cat_VEstatus.descripcion as 'ROW13', Cat_DEstatus.descripcion as 'ROW14'
from vehiculos
INNER JOIN Cat_Clase_Vehiculo on vehiculos.id_Cat_Clase_Vehiculo = Cat_Clase_Vehiculo.id_Cat_Clase_Vehiculo
INNER JOIN Cat_Tipo on vehiculos.id_Cat_Tipo = Cat_Tipo.id_Cat_Tipo
INNER JOIN Cat_Adaptacion on vehiculos.id_Cat_Adaptacion = Cat_Adaptacion.id_Cat_Adaptacion
INNER JOIN Costos on vehiculos.id_Costo = Costos.id_Costo
INNER JOIN Cat_VEstatus on vehiculos.id_VEstatus = Cat_VEstatus.id_VEstatus
INNER JOIN Cat_DEstatus on vehiculos.id_DEstatus = Cat_DEstatus.id_DEstatus
order by vehiculos.economico asc

--CONSULTA DE MANTENIMIENTOS
select detalle_mantenimiento.id_detalleMantenimiento as 'ID',
mantenimiento.nombre_mantenimiento as 'NAME',
vehiculos.tipo_unidad as 'VEHICLE',
detalle_mantenimiento.fecha_hecho as 'DATE_1',
detalle_mantenimiento.fecha_regreso as 'DATE_2',
detalle_mantenimiento.fecha_registro as 'DATE_3'
from detalle_mantenimiento
INNER JOIN mantenimiento on detalle_mantenimiento.id_mantenimiento = mantenimiento.id_mantenimiento
INNER JOIN vehiculos on detalle_mantenimiento.id_vehiculo = vehiculos.id_Vehiculo

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
FROM clientes ORDER BY clientes.id_cliente ASC

SELECT id_Costo from Costos order by id_Costo DESC limit 1;

SET @costov := 0
SELECT id_Costo INTO @costov from Costos order by id_Costo DESC limit 1;
SELECT @costov

SET @rent_det :=0
SELECT id_detalleRenta INTO @rent_det from detalle_renta order by id_detalleRenta DESC limit 1;
select @rent_det

SET @cost_prec :=0
SELECT costos.precio_dia INTO @cost_prec from costos
INNER JOIN vehiculos on costos.id_costo = vehiculos.economico
WHERE costos.id_costo = vehiculos.economico
limit 1;
select @cost_prec

SET @tiporent :=0

SET @idveh_price_choose :=0

CREATE FUNCTION PRICECHOOSE (pricechosen float)
RETURN float(100,2)
BEGIN
    DECLARE pricechoosed
    IF @cost_prec = 1 THEN
        SELECT costos.precio_dia INTO pricechosen from costos
        INNER JOIN vehiculos on costos.id_costo = vehiculos.economico
        WHERE costos.id_costo = vehiculos.economico
        AND Vehiculos.id_Vehiculo = @idveh_price_choose
        limit 1;
    ELSEIF @cost_prec = 2 THEN
        SELECT costos.precio_sem INTO pricechosen from costos
        INNER JOIN vehiculos on costos.id_costo = vehiculos.economico
        WHERE costos.id_costo = vehiculos.economico
        AND Vehiculos.id_Vehiculo = @idveh_price_choose
        limit 1;
    ELSEIF @cost_prec = 3 THEN
        SELECT costos.precio_mes INTO pricechosen from costos
        INNER JOIN vehiculos on costos.id_costo = vehiculos.economico
        WHERE costos.id_costo = vehiculos.economico
        AND Vehiculos.id_Vehiculo = @idveh_price_choose
        limit 1;
    END IF;
    RETURN pricechoosed;
END