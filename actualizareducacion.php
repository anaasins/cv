<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar educacion</title>
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
    <form class="" action="actualizareducacion.php" method="post">
      <fieldset>
        <!--Formulario de actualizar datos. -->
      <legend>Actualizar datos</legend>
      Fecha de Inicio: <input type="text" name="fechai" value="<?=$_GET["año_inicio"]?>"> <br><br>
      Fecha de Finalizacion: <input type="text" name="fechaf" value="<?=$_GET["año_finalizacion"]?>"><br><br>
      Empresa: <input type="text" name="empresa" value="<?=$_GET["empresa"]?>"> <br><br>
      Texto: <input type="text" name="texto" value="<?=$_GET["texto"]?>"><br><br>
      <input type="hidden" name="id_estudios" value="<?=$_GET["id_estudios"]?>">
      <input type="submit" name="Actualizar" value="Actualizar">
    </fieldset>
    </form>
    <?php
    //incluimos reserva.php y llamamo a la funcion que nos actualizara los datos.
    include '/modelo/educacion.php';
    $educacion=new Educacion();
    if (isset($_POST['fechai']) && isset($_POST['fechaf']) && isset($_POST['empresa']) && isset($_POST['texto'])) {
      $actualizareducacion=$educacion->ActualizarEducacion($_POST['fechai'], $_POST['fechaf'], $_POST['empresa'], $_POST['texto'], $_POST['id_estudios']);
      if ($actualizareducacion==true) {
        header('Location: index.php');
      }
    }
     ?>


  </body>
</html>
