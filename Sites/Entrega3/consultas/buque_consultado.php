<?php
  $naviera = $_GET['buque'];
  ?>
<?php
  require("../acciones/conectar.php");
    $query = "SELECT buques.nombre, buques.tipo, buques.patente FROM buques WHERE buques.nid=$naviera ORDER BY buques.tipo DESC;";
    $result = $db -> prepare($query);
    $result -> execute();
    $log = $result -> fetchAll();
  echo "nombre, patente, tipo", "<br>";
  foreach ($log as $buque) {
    echo "".$buque[0].", ".$buque[2].", ".$buque[1]."";
    echo "<br>";
  }
  echo '<br><a href="navieras_buques.php">Volver</a>';
  ?>