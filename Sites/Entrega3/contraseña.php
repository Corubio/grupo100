<?php
  session_start();
  $usuario = $_SESSION['usuario'];
  echo "Deseas cambiar la contraseña de ".$usuario."?";
  ?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <body>
  <form action="/~grupo100/Entrega3/perfil/cambio_contraseña.php" method="post">
  <input id="antigua" type="password" name="antigua" data-constraints="@Required @password">
  <label for="antigua">Ingrese su contraseña actual</label>
  <div class="col-md-11">
  <br>
  <input id="nueva" type="password" name="nueva" data-constraints="@Required @password">
  <label for="nueva">Ingrese su nueva contraseña</label>
  </div>
  <div class="col-md-11">
  <br>
  <input id="nueva2" type="password" name="nueva2" data-constraints="@Required @password">
  <label for="nueva2">Ingrese su nueva contraseña nuevamente</label>
  </div>
  </div>
  <div class="col-md-11">
  <br>
  <input type="submit" value="Cambiar" >
  </div>
  </form>
  <li><a href="sesion.php">Volver</a></li>
  </body>
</html>