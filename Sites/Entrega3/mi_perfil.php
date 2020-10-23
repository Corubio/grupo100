<?php
  session_start();
  $usuario = $_SESSION['usuario'];
  $edad = $_SESSION['edad'];
  $sexo = $_SESSION['sexo'];
  $pasaporte = $_SESSION['pasaporte'];
  $nacionalidad = $_SESSION['nacionalidad'];
  echo "Nombre: ".$usuario."";
  echo "Edad: ".$edad."";
  echo "Sexo: ".$sexo."";
  echo "Pasaporte: ".$pasaporte."";
  echo "Nacionalidad: ".$nacionalidad."";
  ?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <body>
  <a href="sesion.php">Volver</a> 
  </body>
</html>