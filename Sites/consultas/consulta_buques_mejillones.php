<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $lugar = $_POST["lugar_elegido_buque"];
  $buque = $_POST["buque_elegido"];

  $query = "SELECT * FROM(SELECT a.entrada, a.salida FROM(SELECT * FROM buques INNER JOIN 
    atraques ON buques.bid = atraques.bid WHERE UPPER(buques.nombre) LIKE UPPER('%$buque%')) 
    AS a WHERE UPPER(a.puerto) LIKE UPPER('%$lugar%')) AS b, (SELECT buques.bid, buques.nid,
    buques.nombre, buques.patente, buques.pais_origen, buques.tipo, buques.id_capitan, atraques.puerto,
    atraques.entrada, atraques.salida FROM buques INNER JOIN atraques ON buques.bid = atraques.bid 
    WHERE UPPER(atraques.puerto) LIKE UPPER('%$lugar%')) AS c WHERE c.entrada BETWEEN b.entrada 
    AND b.salida OR c.salida BETWEEN b.entrada AND b.salida;";
	$result = $db -> prepare($query);
	$result -> execute();
	$buques = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Fecha Entrada Buque Solicitado</th>
      <th>Fecha Salida Buque Solicitado</th>
      <th>ID Buque</th>
      <th>ID Naviera</th>
      <th>Nombre Buque</th>
      <th>Patente</th>
      <th>País</th>
      <th>Tipo</th>
      <th>ID Capitán</th>
      <th>Puerto</th>
      <th>Fecha Entrada</th>
      <th>Fecha Salida</th>
    </tr>
  <?php
	foreach ($buques as $b) {
      echo "<tr><td>$b[0]</td><td>$b[1]</td><td>$b[2]</td><td>$b[3]</td><td>$b[4]</td><td>$b[5]</td><td>$b[6]</td><td>$b[7]
      </td><td>$b[8]</td><td>$b[9]</td><td>$b[10]</td><td>$b[11]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
