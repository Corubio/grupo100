<?php
  session_start();
  $usuario = $_SESSION['usuario'];
  echo "Bienvenido(a) a Puertos y Navieras ".$usuario."";
  ?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <body>
  <h2 data-wow-delay=".1s">Que deseas hacer?</h2>
  <form action="/~grupo100/Entrega3/perfil/perfil.php" method="post">
  <li><input type="submit" value="Mi perfil" ></li>
  </form>
  <form action="/~grupo100/Entrega3//consultas/navieras_buques.php" method="post">
  <li><input type="submit" value="Consultar por navieras y buques" ></li>
  </form>
  <li><a href="/consultas/puertos.php">Consultar por puertos</a></li>
  <li><a href="index.php">Cerrar Sesion</a></li>
  </body>
</html>