INSERT INTO detalle_renta (id_Vehiculo,cantidad) VALUES (5, 25);

SELECT id_detalleRenta INTO @rent_det from detalle_renta order by id_detalleRenta DESC limit 1;

SELECT 2 INTO @tiporent;
SELECT 5 INTO @idveh_price_choose;


IF @tiporent = 1 THEN
    SELECT costos.precio_dia INTO @cost_prec from costos
    INNER JOIN vehiculos on costos.id_costo = vehiculos.economico
    WHERE costos.id_costo = vehiculos.economico
    AND Vehiculos.id_Vehiculo = @idveh_price_choose
    limit 1;
END;
IF @tiporent = 2 THEN
    SELECT costos.precio_sem INTO @cost_prec from costos
    INNER JOIN vehiculos on costos.id_costo = vehiculos.economico
    WHERE costos.id_costo = vehiculos.economico
    AND Vehiculos.id_Vehiculo = @idveh_price_choose
    limit 1;
END;
IF @tiporent = 3 THEN
    SELECT costos.precio_mes INTO @cost_prec from costos
    INNER JOIN vehiculos on costos.id_costo = vehiculos.economico
    WHERE costos.id_costo = vehiculos.economico
    AND Vehiculos.id_Vehiculo = @idveh_price_choose
    limit 1;
END;

INSERT INTO renta (id_cliente,id_detalleRenta,total,fecha)
VALUES (1, (select @rent_det), (SELECT @cost_prec * 25), CURDATE(), CURDATE(), CURDATE())

SELECT * FROM detalle_renta
SELECT * from renta