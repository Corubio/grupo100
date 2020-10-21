<body>

<?php
  require("conectar.php");
	  $usuario = $_POST["usuario"];
	  $contraseña = $_POST["contraseña"];

 	  $query = "SELECT count(*) FROM usuarios WHERE nombre='$usuario' AND contraseña='$contraseña';";
	  $result = $db -> prepare($query);
	  $result -> execute();
    $log = $result -> fetchAll();
  ?>

<?php
  session_start();
  $_SESSION['nombre'] = $usuario;
  ?>

<?php
foreach ($log as $intento) {
  if ($intento[0] == '1') {
    header('Location:');
  } else {
    header('Location: http://codd.ing.puc.cl/~grupo100/Entrega3/ingresar_conerror.php');
  }
}
  ?>