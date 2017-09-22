<?php
require_once 'seguridad/seguridad.php';
$sesion= new Seguridad();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Contacto</title>
  </head>
  <body>
    <nav>
      <?php
        if (isset($_SESSION['usuario']) && $_SESSION['usuario']==1) {
          echo "<a href='index.php'>Inicio</a>";
          echo "<a href='logout.php'>         Cerrar sesion</a>";
        }elseif (isset($_SESSION['usuario']) && $_SESSION['usuario']!=1) {
          echo "<a href='index.php'>Inicio</a>";
          echo "<a href='contacto.php'>           Contacto</a>";
          echo "<a href='logout.php'>           Cerrar sesion</a>";
        }else {
          echo "<a href='index.php'>Inicio</a>";
          echo "<a href='login.php'>          Login.</a>";
          echo "<a href='contacto.php'>           Contacto</a>";
          echo "<a href='registro.php'>         Registrarse</a>";
        }
      ?>
    </nav>
    <form class="" action="contacto.php" method="post">
      <br>
      <legend><b>Contacta con nosotros</b></legend>
      <br><br>
      Nombre: <input type="text" name="nombre"> <br><br>
      Correo electronico: <input type="text" name="correo"> <br><br>
      Texto:<br> <textarea name="texto" rows="8" cols="80"></textarea> <br><br>

      <input type="submit" name="enviar" value="Enviar">


      <?php

      if (isset($_POST['enviar']) && isset($_POST['nombre']) && isset($_POST['correo'])) {
        echo "Correo enviado correctamente";
      }


       ?>

    </form>
  </body>
</html>
