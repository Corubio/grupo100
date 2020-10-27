<!DOCTYPE html>
<html>
<body>

<h2>Permisos:</h2>

<?php
  $id = $_GET["pid"];
?>

<form action="./consulta_permiso.php" method="get">
  <?php echo '<input type="hidden" value="'.$id.'">'; ?>
<table>
  <tr>
  <label for="tipo">Eliga tipo de Instalacion</label>
  <select name="tipo" id="tipo">
    <option value="muelle">Muelle</option>
    <option value="astillero">Astillero</option>
  </select>
  </tr>

  <tr>
  <label for="fecha_in">Fecha Ingreso</label>
  <input type="date" id="fecha_in" name="fecha_in">
  </tr>

  <tr>
  <label for="fecha_out">Fecha Salida</labe>
  <input type="date" id="fecha_out" name="fecha_out">
  </tr>

  <tr>
  <label for="patente">Ingrese patente del barco</label>
  <input type="text" id="patente" name="patente">
  </tr>

  <tr>
  <input type="reset" value="Reset">
  <input type="submit" value="Realizar Solicitud">
  </tr>
</table>
</form>



<br><a href="../puertos.php">Volver</a>

</body>
</html>