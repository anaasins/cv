<?php
require_once 'seguridad/seguridad.php';
$sesion=new Seguridad();
require_once '\Modelo\usuario.php';
$usuario=new Usuario();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="login.css">
    <meta charset="utf-8">
    <title>PAGINA DE INICIO</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
     <!-- vinculo a bootstrap -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <!-- Temas-->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  </head>
  <body>
    <header>
      <p>MI CURRICULUM VITAE ;)</p>
    </header>

    <nav>
      <?php
        if (isset($_SESSION['usuario']) && $_SESSION['usuario']==1) {
          echo "<a href='index.php'>Inicio</a>";
          echo "<a href='logout.php'>       Cerrar sesion</a>";
        }elseif (isset($_SESSION['usuario']) && $_SESSION['usuario']!=1) {
          echo "<a href='index.php'>Inicio</a>";
          echo "<a href=''>Contacto</a>";
        }else {
          echo "<a href='index.php'>Inicio</a>";
        }
      ?>
    </nav>
<p class="texto">Inicia Sesion</p>
<!--FORMUARIO REGISTRO-->
    <div id="Contenedor">
<div class="ContentForm">
     <form action="" method="post" name="FormEntrar">
       <div class="input-group input-group-lg">
         <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
         <input type="email" class="form-control" name="correo" placeholder="Correo" id="Correo" aria-describedby="sizing-addon1" required>
       </div>
       <br>
       <div class="input-group input-group-lg">
         <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
         <input type="password" name="pass" class="form-control" placeholder="******" aria-describedby="sizing-addon1" required>
       </div>
       <br>
       <br>
       <button class="btn btn-lg btn-primary btn-block btn-signin" id="IngresoLog" type="submit">Entrar</button>
       <div class="opcioncontra"><a href="">Olvidaste tu contraseña?</a></div>
     </form>
     <?php
       if (isset($_POST['correo']) && isset($_POST['pass'])) {

          $registrado=$usuario->LoginUsuario($_POST['correo']);
          if ($registrado!=null) {

            if ($registrado['pass']==sha1($_POST['pass'])) {
              echo "Usuario logueado";
              $sesion->addUsuario($registrado['id_user']);
              header('Location: index.php');
            }else {
              echo "Las contraseñas no coinciden";
            }
          }else {
            echo "Usuario no encontrado.";
          }
       }
      ?>
    </div>
    </div>


    <footer>
      <p>
        ¿Quieres contactar con nosotros? Envia un correo a proyecto@gmail.com.
      </p>

    </footer>
  </body>

</html>
