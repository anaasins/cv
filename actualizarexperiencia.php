<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar Experiencia</title>
  </head>
  <body>
    <form class="" action="actualizarexperiencia.php" method="post">
      <fieldset>
        <!--Formulario de actualizar datos. -->
      <legend>Actualizar datos</legend>
      Fecha de Inicio: <input type="text" name="fechainicial" value="<?=$_GET["anyoinicio"]?>"> <br><br>
      Fecha de Finalizacion: <input type="text" name="fechafinal" value="<?=$_GET["anyofinal"]?>"><br><br>
      Empresa: <input type="text" name="empresa" value="<?=$_GET["empresa"]?>"> <br><br>
      Texto: <input type="text" name="texto" value="<?=$_GET["texto"]?>"><br><br>
      <input type="hidden" name="id_experiencia" value="<?=$_GET["id_experiencia"]?>">
      <input type="submit" name="Actualizar" value="Actualizar">
    </fieldset>
    </form>
    <?php
    include '/Modelo/experiencia.php';
    $experiencia = new Experiencia();
    if (isset($_POST['fechainicial']) && isset($_POST['fechafinal']) && isset($_POST['empresa']) && isset($_POST['texto'])) {
      $actualizarexperiencia=$experiencia->ActualizarExperiencia($_POST['fechainicial'], $_POST['fechafinal'], $_POST['empresa'], $_POST['texto'], $_POST['id_experiencia']);
      if ($actualizarexperiencia==true) {
        header('Location: index.php');
      }
    }

    ?>
  </body>
</html>
