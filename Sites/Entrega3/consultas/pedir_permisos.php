<!DOCTYPE html>
<html>
<body>

<h2>Permisos:</h2>

<?php
  $id = $_POST["pid"];
echo "
<table>
<form action='./consulta_permiso.php' method='post'>
  <tr><td>
  <input type='hidden' id='id' name='id' value='$id'>
  <label for='tipo'>Eliga tipo de Instalacion</label>
  <select name='tipo' id='tipo'>
    <option value='muelle'>Muelle</option>
    <option value='astillero'>Astillero</option>
  </select>
  </td></tr>

  <tr><td>
  <label for='fecha_in'>Fecha Ingreso</label>
  <input type='date' id='fecha_in' name='fecha_in'>
  </td></tr>

  <tr><td>
  <label for='fecha_out'>Fecha Salida</label>
  <input type='date' id='fecha_out' name='fecha_out'>
  </td></tr>

  <tr><td>
  <label for='patente'>Ingrese patente del barco</label>
  <input type='text' id='patente' name='patente'>
  </td></tr>

  <tr><td>
  <input type='reset' value='Reset'>
  <input type='submit' value='Realizar Solicitud'>
  </td></tr>
</table>
</form> ";
?>


<br><a href="./puertos.php">Volver</a>

</body>
</html>