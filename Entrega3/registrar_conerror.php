<?php include('templates/error.png');   ?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <body>
  <h2>Crea tu usuario</h2>
  <br>
  <img src='templates/error.png'/>
  <br>
  <form action="acciones/añadir_registro.php" method="post">
  <input id="usuario" type="text" name="usuario" data-constraints="@Required">
  <label for="usuario">Usuario</label>
  </div>
  <div class="col-md-11">
  <br>
  <input id="edad" type="text" name="edad" data-constraints="@Required">
  <label for="edad">Edad</label>
  </div>
  <div class="col-md-11">
  <br>
  <input id="sexo" type="text" name="sexo" data-constraints="@Required">
  <label for="sexo">Sexo</label>
  </div>
  <div class="col-md-11">
  <br>
  <input id="pasaporte" type="text" name="pasaporte" data-constraints="@Required">
  <label for="pasaporte">Pasaporte</label>
  </div>
  <div class="col-md-11">
  <br>
  <input id="nacionalidad" type="text" name="nacionalidad" data-constraints="@Required">
  <label for="nacionalidad">Nacionalidad</label>
  </div>
  <div class="col-md-11">
  <br>
  <input id="contraseña" type="password" name="contraseña" data-constraints="@Required @password">
  <label for="contraseña">Contraseña</label>
  </div>
  <div class="col-md-11">
  <br>
  <input type="submit" value="Ingresar">
  </div>
  </body>
</html>