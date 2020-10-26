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
    echo '<li><a href = naviera_consultada.php>'.$naviera['nombre'].'</a></li>';
    echo '<form action="/~grupo100/Entrega3/consulta/naviera_consultada.php" method="post>
          <input id="naviera" value='.$naviera['nombre'].'>
          <input type="submit" value='.$naviera['nombre'].'>
          </form>';
  }
  ?>