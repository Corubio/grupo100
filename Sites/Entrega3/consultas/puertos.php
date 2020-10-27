<!DOCTYPE html>
<html>
<body>
<?php
  require("../acciones/connectg127.php");
  $query = "SELECT region.nombre, ciudad.nombre, puertos.nombre, puertos.pid
    WHERE region.regid = estaenregion.regid AND estaenregion.ciuid = ciudad.ciuid
      AND ciudad.ciuid = seencuentra.ciuid AND seencuentra.pid = puertos.pid;";
  
  $result = $dbg127 -> prepare($query);
  $result -> execute();
  $fs = $result -> fetchAll();
?>

  <table>
    <tr>
      <th>Region</th>
      <th>Ciudad</th>
      <th>Puerto</th>
      <th>Boton Fecha</th>
      <th>Boton Instalacion</th>
    </tr>

    <?php
      foreach ($fs as $p) {
        echo "<tr>
          <td>$p[0]</td>
          <td>$p[1]</td>
          <td>$p[2]</td>
          <td>
            <form action='./puertos_fecha.php' method='post'>
              <input type='submit' value='Buscar por fechas'>
            </form>
          </td>
          <td>
            <form action='./pedir_permisos.php' method='post'>
              <input type='submit' value='Solicitar Permiso'>
            </form>
          </td>
        </tr>";
      }
    ?>
  </table>

</body>
</html>