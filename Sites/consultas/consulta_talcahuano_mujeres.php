<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $busqueda = $_POST["lugar_elegido"];

  $query = "SELECT * FROM(SELECT buques.bid, buques.nombre, buques.id_capitan, personal.nombre, personal.genero, personal.edad,
    personal.nacionalidad, personal.numero_pasaporte FROM buques INNER JOIN personal ON buques.id_capitan = personal.pid
    WHERE personal.genero = 'mujer') AS a, (SELECT buques.bid, atraques.puerto FROM buques INNER JOIN atraques 
    ON buques.bid = atraques.bid WHERE UPPER(atraques.puerto) LIKE UPPER('%$busqueda%')) AS b WHERE a.bid = b.bid;";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table>
    <tr>
      <th>ID personal</th>
      <th>ID buque</th>
      <th>Nombre</th>
      <th>Genero</th>
      <th>Edad</th>
      <th>Nacionalidad</th>
      <th>Número de pasaporte</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
