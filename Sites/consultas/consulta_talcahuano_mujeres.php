<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $query = "SELECT * FROM pokemones WHERE tipo='$var';";
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
