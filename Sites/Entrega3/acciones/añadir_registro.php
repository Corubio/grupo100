<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("conectar.php");
    $nombre = $_POST["usuario"];
    $edad = $_POST["edad"];
    $sexo = $_POST["sexo"];
    $pasaporte = $_POST["pasaporte"];
    $nacionalidad = $_POST["nacionalidad"];
	  $contraseña = $_POST["contraseña"];

    $query = "SELECT count(*) FROM usuarios WHERE nombre = '$nombre';";
    $query2 = "SELECT MAX(uid) FROM usuarios";
	  $result = $db -> prepare($query);
	  $result -> execute();
    $log = $result -> fetchAll();
    $result2 = $db2 -> prepare($query);
	  $result2 -> execute();
    $log2 = $result2 -> fetchAll();
  session_start();
  $_SESSION['nombre'] = $nombre;
  ?>

<?php
foreach ($log2 as $intento) {
    $uid = $intento[0] + 1;
} 
foreach ($log as $intento) {
  if ($intento[0] == '1') {
    header('Location: http://codd.ing.puc.cl/~grupo100/Entrega3/registrar_conerror.php');
  } else {
    $usuario_servidor2 = 'grupo100';
    $contraseña_servidor2 = 'abcabcab1';
    $base_servidor2 = 'grupo100e3';

    $con = pg_connect("host=localhost dbname=$base_servidor2 user=$usuario_servidor2 password=$contraseña_servidor2")
    or die ("Could not connect to server\n");

    pg_query("BEGIN") or die("Could not start transaction\n");
    $res1 = pg_query("INSERT INTO usuarios VALUES('$uid', '$nombre', $edad, '$sexo', '$pasaporte', '$nacionalidad', '$contraseña');");
    pg_query("COMMIT");
    header('Location:');
  }
}
  ?>