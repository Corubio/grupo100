<?php include('templates/error.png');   ?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <body>
  <section>    
  <h3>Iniciar Sesion</h3>
  <br>
  <img src='templates/error.png'/>
  <br>
  <a href="registrar.php">Crea un usuario</a>
  <br>
  <br>
  <form action="/~grupo100/Entrega3/acciones/validar.php" method="post">
  <input id="usuario" type="text" name="usuario" data-constraints="@Required">
  <label for="usuario">Usuario</label>
  <div class="col-md-11">
  <br>
  <input id="contraseña" type="password" name="contraseña" data-constraints="@Required @password">
  <label for="contraseña">Contraseña</label>
  </div>
  <br>
  <div class="col-md-11">
  <input type="submit" value="Ingresar">
  </div>
  </form>
  </section>
  </body>
</html>