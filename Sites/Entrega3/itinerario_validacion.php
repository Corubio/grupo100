<?php
  session_start();
  $usuario = $_SESSION['usuario'];
  ?>

<?php
##datos si es capitan o no##
  foreach ($log2 as $capitan) {
  if ($capitan[0] == '1') {
    require("../acciones/conectar.php");
      $query3 = "SELECT buques.nombre, buques.patente, buques.tipo, navieras.nombre AS siguiente FROM usuarios JOIN personal ON usuarios.nombre=personal.nombre JOIN buques ON personal.pid = buques.id_capitan JOIN navieras ON buques.nid = navieras.nid WHERE usuarios.nombre='$usuario';";
      $result3 = $db -> prepare($query3);
      $result3 -> execute();
      $log3 = $result3 -> fetchAll();
    foreach ($log3 as $datos) {
      $_SESSION['buque'] = $datos[0];
      $_SESSION['patente'] = $datos[1];
      $_SESSION['tipo'] = $datos[2];
      $_SESSION['naviera'] = $datos[3];
    }
      $query3 = "SELECT (proximo_itinerario.fecha, proximo_itinerario.siguiente) AS siguiente FROM usuarios JOIN personal ON usuarios.nombre=personal.nombre JOIN buques ON personal.pid = buques.id_capitan JOIN navieras ON buques.nid = navieras.nid JOIN proximo_itinerario ON proximo_itinerario.bid = buques.bid WHERE usuarios.nombre='$usuario' ORDER BY siguiente DESC;";
      $result3 = $db -> prepare($query3);
      $result3 -> execute();
      $log3 = $result3 -> fetchAll();
    if ($log3[0]) {
      $_SESSION['proximo'] = $log3[0][0];
    } else {
      $_SESSION['proximo'] = 'No hay proximo itinerario';
    }
      $query3 = "SELECT atraques.puerto FROM usuarios JOIN personal ON usuarios.nombre=personal.nombre JOIN buques ON personal.pid = buques.id_capitan JOIN navieras ON buques.nid = navieras.nid JOIN atraques ON atraques.bid = buques.bid WHERE usuarios.nombre='$usuario' ORDER BY atraques.salida ASC LIMIT 5;";
      $result3 = $db -> prepare($query3);
      $result3 -> execute();
      $log3 = $result3 -> fetchAll();
      $_SESSION['previos'] = '';
    if ($log3[0]) {
      foreach ($log3 as $puertos) {
        $_SESSION['previos'] = "".$_SESSION['previos']."".$puertos[0].", ";
      }
    } else {
      $_SESSION['previos'] = 'No hay atraques registrados';
    }
  } else {
    $_SESSION['buque'] = 'Usted no es capitán';
    $_SESSION['patente'] = 'Usted no es capitán';
    $_SESSION['tipo'] = 'Usted no es capitán';
    $_SESSION['naviera'] = 'Usted no es capitán';
    $_SESSION['proximo'] = 'Usted no es capitán';
    $_SESSION['previos'] = 'Usted no es capitán';
  }
}

foreach ($log as $datos) {
    $_SESSION['edad'] = $datos[2];
    $_SESSION['sexo'] = $datos[3];
    $_SESSION['pasaporte'] = $datos[4];
    $_SESSION['nacionalidad'] = $datos[5];
    header('Location: http://codd.ing.puc.cl/~grupo100/Entrega3/ingresar_itinerario.php');
  }
  ?>