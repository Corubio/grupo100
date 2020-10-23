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
  foreach ($log as $datos) {
    $_SESSION['edad'] = $datos[2];
    $_SESSION['sexo'] = $datos[3];
    $_SESSION['pasaporte'] = $datos[4];
    $_SESSION['nacionalidad'] = $datos[5];
    header('Location: http://codd.ing.puc.cl/~grupo100/Entrega3/mi_perfil.php');
  }
  ?>