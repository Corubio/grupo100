<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $busqueda = $_POST["puerto_elegido"];
  $año = $_POST["año_elegido"];
  echo "$año 0101 00:00:00";
  $query = "SELECT * FROM buques INNER JOIN atraques ON buques.bid = atraques.bid
   WHERE UPPER(atraques.puerto) LIKE UPPER('%$busqueda%') AND entrada BETWEEN $año'0101 00:00:00' AND $año'1231 23:59:59';";
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