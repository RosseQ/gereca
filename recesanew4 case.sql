INSERT INTO detalle_renta (id_Vehiculo,cantidad) VALUES (5, 25);

SELECT id_detalleRenta INTO @rent_det from detalle_renta order by id_detalleRenta DESC limit 1;

SET @tiporent = 2;
SET @idveh_price_choose = 5;

CASE @tiporent
    WHEN 1 THEN
    SELECT costos.precio_dia INTO @cost_prec from costos
    INNER JOIN vehiculos on costos.id_costo = vehiculos.economico
    WHERE costos.id_costo = vehiculos.economico
    AND Vehiculos.id_Vehiculo = @idveh_price_choose
    limit 1;
    WHEN 2 THEN
    SELECT costos.precio_sem INTO @cost_prec from costos
    INNER JOIN vehiculos on costos.id_costo = vehiculos.economico
    WHERE costos.id_costo = vehiculos.economico
    AND Vehiculos.id_Vehiculo = @idveh_price_choose
    limit 1;
    WHEN 3 THEN
    SELECT costos.precio_mes INTO @cost_prec from costos
    INNER JOIN vehiculos on costos.id_costo = vehiculos.economico
    WHERE costos.id_costo = vehiculos.economico
    AND Vehiculos.id_Vehiculo = @idveh_price_choose
    limit 1;
    ELSE @cost_prec = 0
END;

INSERT INTO renta (id_cliente,id_detalleRenta,total,fecha)
VALUES (1, (select @rent_det), (SELECT @cost_prec * 25), CURDATE(), CURDATE(), CURDATE())

SELECT * FROM detalle_renta
SELECT * from renta