<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Biblioteca Marítima </h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre buques y sus recorridos.</p>

  <br>

  <h3 align="center"> ¿Quieres ver el nombre de todas las navieras?</h3>

  <form align="center" action="consultas/consulta_navieras.php" method="post">
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres ver todos los buques con alguna naviera (Francis Drake S.A)?</h3>

  <form align="center" action="consultas/consulta_buques_francis.php" method="post">
    Naviera:
    <input type="text" name="naviera_elegida">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres buscar los buques que han atracado en algún lugar (Valparaíso) y un año (2020)?</h3>

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

  <h3 align="center">¿Quieres ver todos los buques que hayan estado en Mejillones al mismo tiempo que el buque Magnolia?</h3>

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
  <h3 align="center"> ¿Quieres buscar todos los capiteanes mujeres que han pasado por el puerto Talcahuano?</h3>

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
