<?php
  $naviera = $_GET['naviera'];
  ?>
<?php
  require("../acciones/conectar.php");
    $query = "SELECT * FROM buques WHERE buques.nid=$naviera ORDER BY buques.tipo DESC;";
    $result = $db -> prepare($query);
    $result -> execute();
    $log = $result -> fetchAll();
  echo "".$log."<br>";
  foreach ($log as $buque) {
    echo "".$buque."<br>";
  }
  echo '<br><a href="../sesion.php">Volver</a>';
  ?>