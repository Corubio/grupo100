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
    $antigua = $_POST['antigua'];
    $nueva = $_POST['nueva'];
    $nueva2 = $_POST['nueva2'];
  ?>
<?php
  foreach ($log as $datos) {
      if ($antigua == $datos[6]) {
          if ($nueva == $nueva2) {
            require("../acciones/conectar.php");
              $query2 = "UPDATE usuarios SET contraseña = REPLACE(contraseña, '$antigua', '$nueva') WHERE nombre='$usuario';";
              $result2 = $db -> prepare($query2);
	          $result2 -> execute();
              $log2 = $result2 -> fetchAll();
              $_SESSION['error'] = 'Contraseña cambiada con éxito!';
          } else {
              $_SESSION['error'] = 'Contraseñas nuevas no coinciden';
          }
      } else {
          $_SESSION['error'] = 'Contraseña incorrecta';
      }
    header('Location: http://codd.ing.puc.cl/~grupo100/Entrega3/contraseña_conerror.php');
  }
  ?>