CREATE OR REPLACE FUNCTION insertar_persona (nombre varchar, edad int, sexo varchar, pasaporte varchar, nacionalidad varchar, contraseña varchar)
RETURNS void AS
$$
BEGIN
    INSERT INTO Personas VALUES (nombre, edad, sexo, pasaporte, nacionalidad);
END
$$ language plpgsql