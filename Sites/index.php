<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Buques, Navieras y todo sobre ellas </h1>
  <p style="text-align:left;">Encuentra aquí lo necesario para informarte sobre los recorridos marítimos.</p>

  <br>

  <h3 align="center"> Nombre de todas las Navieras</h3>

  <form align="center" action="consultas/consulta_navieras.php" method="post">
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="left"> Buscar todos los buques con la naviera solicitada (Francis Drake S.A)</h3>

  <form align="left" action="consultas/consulta_buques_francis.php" method="post">
    Naviera:
    <input type="text" name="naviera_elegida">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> Buscar los buques que han atracado en algún lugar solicitado (Valparaíso) y un año solicitado (2020)</h3>

  <form align="center" action="consultas/consulta_buques_valparaiso.php" method="post">
    Lugar de atraque:
    <input type="text" name="puerto_elegido">
    <br/>
    Año:
    <input type="text" name="año_elegido">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center">Buscar todos los buques que hayan estado en algún lugar (Mejillones) al mismo tiempo que algún buque (Magnolia)</h3>

  <form align="center" action="consultas/consulta_buques_mejillones.php" method="post">
    Lugar:
    <input type="text" name="lugar_elegido">
    <br/>
    Buque:
    <input type="text" name="buque_elegido">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>
  <h3 align="center"> Buscar todos los capitanes mujeres que han pasado por algún puerto</h3>

  <form align="center" action="consultas/consulta_talcahuano_mujeres.php" method="post">
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres buscar el buque pesquero que tiene más personas trabajando?</h3>

  <form align="center" action="consultas/consulta_buques_max_personas.php" method="post">
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>
  <br>
</body>
</html>
