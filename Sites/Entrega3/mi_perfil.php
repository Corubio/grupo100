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
  $proximo = $_SESSION['proximo'];
  $previos = $_SESSION['previos'];
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
  echo "Proximo Itinerario: ".$proximo."";
  echo "<br>";
  echo "Ultimos puertos: ".$previos."";
  ?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <body>
  <br>
  <li><a href="sesion.php">Volver</a></li>
  <li><a href="contraseña.php">Cambiar contraseña</a></li>
  </body>
</html>