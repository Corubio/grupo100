<!DOCTYPE html>
<html>
<body>

<h2>Permisos:</h2>

<?php
  $id = $_GET["pid"];
?>

<form action="./consulta_permiso.php" method="get">
  <?php echo '<input type="hidden" value="$id">'; ?>

  <label for="tipo">Eliga tipo de Instalacion</label>
  <select name="tipo" id="tipo">
    <option value="muelle">Muelle</option>
    <option value="astillero">Astillero</option>
  </select>

  <label for="fecha_in">Fecha Ingreso</label>
  <input type="date" id="fecha_in" name="fecha_in">

  <label for="fecha_out">Fecha Salida</labe>
  <input type="date" id="fecha_out" name="fecha_out">

  <label for="patente">Ingrese patente del barco</label>
  <input type="text" id="patente" name="patente">

  <input type="reset" value="Reset">
  <input type="submit" value="Realizar Solicitud">
</form>



<br><a href="../puertos.php">Volver</a>

</body>
</html>