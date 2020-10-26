<?php
  session_start();
  ?>
<?php
  require("conectar.php");
    $query = "SELECT navieras.nombre FROM navieras;";
    $result = $db -> prepare($query);
    $result -> execute();
    $log = $result -> fetchAll();
  ?>
<?php
  $_SESSION['naviera_consulta'] = $_GET[$naviera];
  foreach ($log as $naviera) {
    echo '<li><a href = naviera_consultada.php>'.$naviera.'</a></li>';
  }
  ?>