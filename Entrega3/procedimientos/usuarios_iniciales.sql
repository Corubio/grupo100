CREATE OR REPLACE FUNCTION crear_usuario_inicial(uid INT, nombre VARCHAR(100), edad INT, sexo VARCHAR(100), pasaporte VARCHAR(100), nacionalidad VARCHAR(100), contraseña VARCHAR(100)) 
RETURNS void AS
$$
BEGIN
    SELECT FLOOR(RANDOM()*(99999999-10000000)+10000000) AS 'contraseña',
    SELECT MAX(usuarios.uid) AS 'ultima id',
    INSERT INTO usuarios('ultima id' + 1, nombre, edad, sexo, pasaporte, nacionalidad, 'contraseña');
END
$$ language plpgsql