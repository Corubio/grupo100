<?php
  require("../acciones/conectar.php");
    $query = "SELECT DISTINCT navieras.nombre, navieras.nid, buques.tipo FROM navieras JOIN buques ON buques.nid = navieras.nid ORDER BY buques.tipo;";
    $result = $db -> prepare($query);
    $result -> execute();
    $log = $result -> fetchAll();
  ?>
<?php
  echo '<form action="/~grupo100/Entrega3/consultas/naviera_consultada.php" method="get">';
  foreach ($log as $naviera) {
    echo '<input type="radio" id="'.$naviera[1].'" name="naviera" value="'.$naviera[1].'">
          <label for="'.$naviera[1].'">'.$naviera[0].'</label><br>';
  }
  echo '<input type="submit" value="Buscar">';
  echo '</form>';
  echo '<br><a href="../sesion.php">Volver</a>';
  ?>