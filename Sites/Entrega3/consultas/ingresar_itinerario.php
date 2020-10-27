<?php
  require("../acciones/conectar.php");
    $query = "SELECT DISTINCT buques.nombre FROM buques JOIN personal_definitivo ON buques.id_capitan = personal_definitivo.id;";
    $result = $db -> prepare($query);
    $result -> execute();
    $log = $result -> fetchAll();
  ?>
<?php
  echo '<form action="/~grupo100/Entrega3/consultas/buque_consultado.php" method="get">';
  foreach ($log as $buque) {
    echo '<input type="radio" id="'.$buque[1].'" name="naviera" value="'.$buque[1].'">
          <label for="'.$buque[1].'">'.$buque[0].'</label><br>';
  }
  echo '<input type="submit" value="Ingresar">';
  echo '</form>';
  echo '<br><a href="../sesion.php">Volver</a>';
  ?>
