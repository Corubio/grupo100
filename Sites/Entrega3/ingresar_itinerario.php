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
  if ($buque == 'Usted no es capitán') {
    echo "Nombre: ".$usuario."";
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
    echo '<input type="date" name="fecha"> <input type="submit" value="Enviar datos"></p>';
    echo '</form>';
  }
  else {
    echo "No eres capitán, por lo que no puedes realizar esta funcionalidad";
  }
  echo '<br><a href="../sesion.php">Volver</a>';
  ?>
