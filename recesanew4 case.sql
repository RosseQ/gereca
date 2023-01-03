SET @dummyday1 = 5;
SET @tiporent = 1;
SET @daycalc = 0;
SELECT
CASE
    WHEN @tiporent = 1 THEN
        @dummyday1 * 1
    WHEN @tiporent = 2 THEN
        @dummyday1 * 7
    WHEN @tiporent = 3 THEN
        @dummyday1 * 30
    ELSE 0
END
INTO @daycalc;

INSERT INTO detalle_renta (id_Vehiculo,cantidad) VALUES (5, (select @daycalc));

SELECT id_detalleRenta INTO @rent_det from detalle_renta order by id_detalleRenta DESC limit 1;

SET @idveh_price_choose = 1;

SELECT
CASE
    WHEN @tiporent = 1 THEN
        costos.precio_dia 
    WHEN @tiporent = 2 THEN
        costos.precio_sem
    WHEN @tiporent = 3 THEN
        costos.precio_mes
    ELSE 0
END
INTO @cost_prec from costos
INNER JOIN vehiculos on costos.id_costo = vehiculos.economico
WHERE costos.id_costo = vehiculos.economico
AND Vehiculos.id_Vehiculo = @idveh_price_choose
limit 1;

INSERT INTO renta (id_cliente,id_detalleRenta,total,fecha_registro,fecha_hecho,fecha_regreso)
VALUES (1, (select @rent_det), (SELECT @cost_prec * @dummyday1),
CURDATE(), CURDATE(), date_add(CURDATE(), INTERVAL @daycalc DAY));

SELECT * from renta;
SELECT * FROM detalle_renta;