<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Contacto</title>
  </head>
  <body>
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
