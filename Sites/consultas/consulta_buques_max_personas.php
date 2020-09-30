<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $query = "SELECT * FROM(SELECT buques.bid, buques.nid, buques.nombre, buques.patente, 
    buques.pais_origen, buques.tipo, buques.id_capitan, COUNT(buques.bid) AS trabajadores 
    FROM buques INNER JOIN personal ON buques.bid = personal.bid GROUP BY buques.bid ORDER 
    BY trabajadores DESC) AS a, (SELECT MAX(c.trabajadores) FROM(SELECT buques.bid, buques.nid, 
    buques.nombre, buques.patente, buques.pais_origen, buques.tipo, buques.id_capitan, 
    COUNT(buques.bid) AS trabajadores FROM buques INNER JOIN personal ON buques.bid = personal.bid 
    GROUP BY buques.bid ORDER BY trabajadores DESC) AS c) AS b WHERE a.trabajadores = b.max;";
	$result = $db -> prepare($query);
	$result -> execute();
	$buques = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>ID Buque</th>
      <th>ID Naviera</th>
      <th>Nombre</th>
      <th>Patente</th>
    </tr>
  <?php
	foreach ($buques as $b) {
  		echo "<tr><td>$b[0]</td><td>$b[1]</td><td>$b[2]</td><td>$b[3]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
