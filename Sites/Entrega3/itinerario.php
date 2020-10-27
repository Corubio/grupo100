<?php
  session_start();
  $usuario = $_SESSION['usuario'];
  $buque = $_SESSION['buque']
  ?>
<?php
  require("/acciones/conectar.php");
    $query = "SELECT * FROM usuarios WHERE nombre='$usuario';";
    $result = $db -> prepare($query);
	$result -> execute();
    $log = $result -> fetchAll();
    $fecha = $_POST["fecha"];
    $lugar = $_POST["lugar"];
  ?>
<?php
  require("/acciones/conectar.php");
    $query2 = "SELECT bid FROM buques WHERE nombre='$buque';";
    $result2 = $db -> prepare($query2);
	$result2 -> execute();
    $log2 = $result2 -> fetchAll();
    $bid = $log2[0][0];
  ?>
<?php
  require("/acciones/conectar.php");
    $query3 = 'SELECT MAX(iid) FROM proximo_itinerario;';
    $result3 = $db -> prepare($query3);
	$result3 -> execute();
    $log3 = $result3 -> fetchAll();
    $iid = $log3[0][0] + 1;
  ?>
<?php
  foreach ($log as $datos) {
    require("/acciones/conectar.php");
        $query4 = "INSERT INTO proximo_itinerario VALUES ('$iid', '$bid', '$lugar', '$fecha')";
        $result4 = $db -> prepare($query4);
        $result4 -> execute();
        $log4 = $result4 -> fetchAll();
        $_SESSION['error'] = 'Itinerario agregado con éxito!';
  }
  echo '<br><a href="sesion.php">Volver</a>';
  ?>