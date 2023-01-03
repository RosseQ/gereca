
SET @tiporent = 2;
SET @daycalc := 0;
SELECT
CASE
    WHEN @tiporent = 1 THEN
        3 * 1
    WHEN @tiporent = 2 THEN
        3 * 7
    WHEN @tiporent = 3 THEN
        3 * 30
    ELSE 0
END
INTO @daycalc;

SELECT date_add(CURDATE(), INTERVAL @daycalc DAY);