<?php
  session_start();
  $usuario = $_SESSION['usuario'];
  $edad = $_SESSION['edad'];
  $sexo = $_SESSION['sexo'];
  $pasaporte = $_SESSION['pasaporte'];
  $nacionalidad = $_SESSION['nacionalidad'];
  echo "Nombre: ".$usuario."";
  echo "<br>";
  echo "Edad: ".$edad."";
  echo "<br>";
  echo "Sexo: ".$sexo."";
  echo "<br>";
  echo "Pasaporte: ".$pasaporte."";
  echo "<br>";
  echo "Nacionalidad: ".$nacionalidad."";
  echo "<br>";
  ?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <body>
  <a href="sesion.php">Volver</a> 
  </body>
</html>