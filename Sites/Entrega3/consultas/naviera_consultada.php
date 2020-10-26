<?php
  $naviera = $_GET['naviera'];
  ?>
<?php
  require("../acciones/conectar.php");
    $query = "SELECT buques.nombre, buques.tipo, buques.patente FROM buques WHERE buques.nid=$naviera ORDER BY buques.tipo DESC;";
    $result = $db -> prepare($query);
    $result -> execute();
    $log = $result -> fetchAll();
  echo "nombre, tipo, patente", "<br>";
  foreach ($log as $buque) {
    echo "".$buque[0].", ".$buque[1].", ".$buque[2]."";
    echo "<br>";
  }
  echo '<br><a href="../sesion.php">Volver</a>';
  ?>