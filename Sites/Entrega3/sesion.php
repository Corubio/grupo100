<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <body>
  <?php
    session_start();
    $usuario = $_SESSION['usuario'];
    echo "Bienvenido a Puertos y Navieras ".$usuario."";
  ?>
  <h2 data-wow-delay=".1s">Que deseas hacer?</h2>
  <li><a href="/perfil/perfil.php">Mi perfil</a></li>
  <li><a href="/perfil/cambio_contraseña.php">Cambiar contraseña</a></li>
  <li><a href="/consultas/navieras_buques.php">Consultar por navieras y buques</a></li>
  <li><a href="/consultas/puertos.php">Consultar por puertos</a></li>
  </body>
</html>