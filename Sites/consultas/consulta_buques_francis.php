<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $busqueda = $_POST["naviera_elegida"];
  $busqueda_año = $_POST["año_elegido"];

 	$query = "SELECT * FROM navieras WHERE UPPER(nombre) LIKE UPPER('%$busqueda%');";
	$result = $db -> prepare($query);
	$result -> execute();
	$buques = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>ID</th>
      <th>ID Naviera</th>
      <th>Nombre</th>
      <th>Patente</th>
      <th>País</th>
      <th>Tipo</th>
      <th>ID Capitán</th>
    </tr>
  <?php
	foreach ($buques as $b) {
  		echo "<tr><td>$b[0]</td><td>$b[1]</td><td>$b[2]</td><td>$b[3]</td><td>$b[4]</td><td>$b[5]</td><td>$b[6]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
