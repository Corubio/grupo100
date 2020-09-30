<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $query = "SELECT buques.bid, buques.nid, buques.nombre, buques.patente, 
    buques.pais_origen, buques.tipo, buques.id_capitan, COUNT(buques.bid) 
    AS trabajadores FROM buques INNER JOIN personal ON buques.bid = personal.bid 
    GROUP BY buques.bid ORDER BY trabajadores DESC LIMIT 1;";
	$result = $db -> prepare($query);
	$result -> execute();
	$buques = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>ID</th>
      <th>ID Naviera</th>
      <th>Nombre</th>
      <th>Cantidad de trabajadores</th>
    </tr>
  <?php
	foreach ($buques as $b) {
  		echo "<tr><td>$b[0]</td><td>$b[1]</td><td>$b[2]</td><td>$b[3]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
