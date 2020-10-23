<?php
  session_start();
  $usuario = $_SESSION['usuario'];
  $edad = $_SESSION['edad'];
  $sexo = $_SESSION['sexo'];
  $pasaporte = $_SESSION['pasaporte'];
  $nacionalidad = $_SESSION['nacionalidad'];
  echo "Nombre: ".$usuario."\n";
  echo "Edad: ".$edad."\n";
  echo "Sexo: ".$sexo."\n";
  echo "Pasaporte: ".$pasaporte."\n";
  echo "Nacionalidad: ".$nacionalidad."\n";
  ?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <body>
  <a href="sesion.php">Volver</a> 
  </body>
</html>