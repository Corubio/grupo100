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
  echo '<form action="/~grupo100/Entrega3/consultas/naviera_consultada.php" method="post>';
  foreach ($log as $naviera) {
    echo '<input type="radio" id="'.$naviera[0].'" name="naviera" value="'.$naviera[0].'">
          <label for="'.$naviera[0].'">'.$naviera[0].'</label><br>';
  }
  echo '<input type="submit" value="Buscar">';
  echo '</form>';
  ?>