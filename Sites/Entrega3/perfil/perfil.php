<?php
  session_start();
  $usuario = $_SESSION['usuario'];
  ?>
<?php
  require("../acciones/conectar.php");
    $query = "SELECT * FROM usuarios WHERE nombre='$usuario';";
    $result = $db -> prepare($query);
	  $result -> execute();
    $log = $result -> fetchAll();
  ?>
<?php
  require("../acciones/conectar.php");
    $query2 = "SELECT count(*) FROM usuarios JOIN personal ON usuarios.nombre=personal.nombre RIGHT JOIN buques ON personal.pid = buques.id_capitan RIGHT JOIN navieras ON buques.nid = navieras.nid WHERE usuarios.nombre='$usuario';";
    $result2 = $db -> prepare($query2);
    $result2 -> execute();
    $log2 = $result2 -> fetchAll();
  ?>
<?php
  foreach ($log2 as $capitan) {
  if ($capitan[0] == '1') {
    require("../acciones/conectar.php");
      $query3 = "SELECT (buques.nombre, buques.patente, buques.tipo, navieras.nombre) FROM usuarios JOIN personal ON usuarios.nombre=personal.nombre RIGHT JOIN buques ON personal.pid = buques.id_capitan RIGHT JOIN navieras ON buques.nid = navieras.nid WHERE usuarios.nombre='$usuario';";
      $result3 = $db -> prepare($query3);
      $result3 -> execute();
      $log3 = $result3 -> fetchAll();
    foreach ($log3 as $datos) {
      $_SESSION['buque'] = $datos[0];
      $_SESSION['patente'] = $datos[1];
      $_SESSION['tipo'] = $datos[2];
      $_SESSION['naviera'] = $datos[3];
    }
  } else {
    $_SESSION['buque'] = 'Usted no es capitán';
    $_SESSION['patente'] = 'Usted no es capitán';
    $_SESSION['tipo'] = 'Usted no es capitán';
    $_SESSION['naviera'] = 'Usted no es capitán';
  }
}
  foreach ($log as $datos) {
    $_SESSION['edad'] = $datos[2];
    $_SESSION['sexo'] = $datos[3];
    $_SESSION['pasaporte'] = $datos[4];
    $_SESSION['nacionalidad'] = $datos[5];
    header('Location: http://codd.ing.puc.cl/~grupo100/Entrega3/mi_perfil.php');
  }
  ?>