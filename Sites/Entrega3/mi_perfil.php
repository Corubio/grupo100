<?php
  session_start();
  $usuario = $_SESSION['usuario'];
  $edad = $_SESSION['edad'];
  $sexo = $_SESSION['sexo'];
  $pasaporte = $_SESSION['pasaporte'];
  $nacionalidad = $_SESSION['nacionalidad'];
  $buque = $_SESSION['buque'];
  $patente = $_SESSION['patente'];
  $tipo = $_SESSION['tipo'];
  $naviera = $_SESSION['naviera'];
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
  echo "Buque: ".$buque."";
  echo "<br>";
  echo "Patente: ".$patente."";
  echo "<br>";
  echo "Tipo: ".$tipo."";
  echo "<br>";
  echo "Naviera: ".$naviera."";
  echo "<br>";
  ?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <body>
  <br>
  <a href="sesion.php">Volver</a> 
  </body>
</html>