<?php
  session_start();
  ?>
<?php
  require("../acciones/conectar.php");
    $query = "SELECT navieras.nombre FROM navieras;";
    $result = $db -> prepare($query);
    $result -> execute();
    $log = $result -> fetchAll();
  ?>
<?php
  foreach ($log as $naviera) {
    echo '<form action="/~grupo100/Entrega3/consultas/naviera_consultada.php" method="post>
          <input id="naviera" name="naviera" value='.$naviera[0].'>
          <input type="submit" value='.$naviera[0].'>
          </form>';
  }
  ?>