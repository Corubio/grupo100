<?php
  try {
    $base_servidor = 'grupo100e3';
    $usuario_servidor = 'grupo100';
    $contraseña_servidor = 'abcabcab1';
    $db = new PDO("pgsql:dbname=$base_servidor;host=localhost;port=5432;user=$usuario_servidor;password=$contraseña_servidor");
  } catch (Exception $e) {
    echo "No se conectó :( : $e";
  }
?>
