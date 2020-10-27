<!DOCTYPE html>
<html>
<body>

<h3>Recibi:</h3>
<?php
$id = $_POST['id'];
$tipo = $_POST['tipo'];
$fecha_in = $_POST['fecha_in'];
$fecha_out = $_POST['fecha_out'];
$patente = $_POST['patente'];
echo "
<table>
    <tr><td>id</td><td>$id</td></tr>
    <tr><td>tipo</td><td>$tipo</td></tr>
    <tr><td>fecha ingreso</td><td>$fecha_in</td></tr>
    <tr><td>fecha salida</td><td>$fecha_out</td></tr>
    <tr><td>patente</td><td>$patente</td></tr>
</table>
";
?>

<br><a href="./puertos.php">Volver</a>
</body>
</html>