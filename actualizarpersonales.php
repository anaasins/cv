
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar datos personales.</title>
  </head>
  <body>
    <nav>
      <?php
        if (isset($_SESSION['usuario']) && $_SESSION['usuario']==1) {
          echo "<a href='index.php'>Inicio</a>";

        }elseif (isset($_SESSION['usuario']) && $_SESSION['usuario']!=1) {
          echo "<a href='index.php'>Inicio</a>";
          echo "<a href=''>Contacto</a>";
        }else {
          echo "<a href='index.php'>Inicio</a>";
        }
      ?>
    </nav>
    <form class="" action="actualizarpersonales.php" method="post">
      <fieldset>
        <legend>Actualizar datos personales.</legend>
        Foto(url): <input type="text" name="foto" value="<?=$_GET["foto"]?>"> <br><br>
        Nombre: <input type="text" name="nombre" value="<?=$_GET["nombre"]?>"> <br><br>
        Apellidos: <input type="text" name="apellidos" value="<?=$_GET["apellidos"]?>"> <br><br>
        Direccion: <input type="text" name="direccion" value="<?=$_GET["direccion"]?>"> <br><br>
        Telefono: <input type="text" name="telefono" value="<?=$_GET["telefono"]?>"> <br><br>
        Correo: <input type="text" name="correo" value="<?=$_GET["correo"]?>"> <br><br>
        Facebook: <input type="text" name="redes" value="<?=$_GET["redes"]?>"> <br><br>
        <input type="hidden" name="id_personal" value="<?=$_GET["id_personal"]?>">
        <input type="submit" name="Actualizar" value="Actualizar">
      </fieldset>
    </form>
    <?php
      include 'Modelo/personales.php';
      $personal=new Personales();
      if (isset($_POST['foto']) && isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['direccion']) && isset($_POST['telefono']) && isset($_POST['correo']) && isset($_POST['redes'])) {
        $actualizar=$personal->actualizarDatos($_POST['foto'], $_POST['nombre'], $_POST['apellidos'], $_POST['direccion'], $_POST['correo'], $_POST['telefono'], $_POST['redes']);
        if ($actualizar==true) {
          header('Location: index.php');
        }else {
          echo "Error al actualizar. Intentalo de nuevo.";
        }
      }
     ?>
  </body>
</html>
