<?php
  try {
    $base_servidor = 'grupo127e3';
    $usuario_servidor = 'grupo127';
    $contraseña_servidor = 'orion127';
    $dbg127 = new PDO("pgsql:dbname=$base_servidor;host=localhost;port=5432;user=$usuario_servidor;password=$contraseña_servidor");
  } catch (Exception $e) {
    echo "No se conectó :( : $e";
  }
?>
