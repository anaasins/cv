<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="Registro.css">
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
      <p>MI CURRICULUM VITAE</p>
    </header>

    <nav>
      <?php
        if (isset($_SESSION['usuario']) && $_SESSION['usuario']==1) {
          echo "<a href='index.php'>Inicio</a>";
          echo "<a href='logout.php'>Cerrar sesion</a>";
        }elseif (isset($_SESSION['usuario']) && $_SESSION['usuario']!=1) {
          echo "<a href='index.php'>Inicio</a>";
          echo "<a href=''>Contacto</a>";
          echo "<a href='logout.php'>Cerrar sesion</a>";
        }else {
          echo "<a href='index.php'>Inicio</a>";
          echo "<a href='login.php'>Login.</a>";
          echo "<a href=''>Contacto</a>";
        }
      ?>
    </nav>
<p class="texto">Registrate</p>
<!--FORMUARIO REGISTRO-->
    <div id="Contenedor">
<div class="ContentForm">
     <form action="" method="post" name="FormEntrar">
      
       <div class="input-group input-group-lg">
         <span class="input-group-addon" id="sizing-addon1"></span>
         <input type="email" class="form-control" name="correo" placeholder="Correo" id="Correo" aria-describedby="sizing-addon1" required>
       </div>
       <br>
       <div class="input-group input-group-lg">
         <span class="input-group-addon" id="sizing-addon1"></span>
         <input type="password" class="form-control" name="pass" placeholder="*****" aria-describedby="sizing-addon1" required>
       </div>
       <br>
       <div class="input-group input-group-lg">
         <span class="input-group-addon" id="sizing-addon1"></span>
         <input type="password" class="form-control" name="pass2" placeholder="*****" aria-describedby="sizing-addon1" required>
       </div>
       <button class="btn btn-lg btn-primary btn-block btn-signin" id="IngresoLog" type="submit">Entrar</button>
       <div class="opcioncontra"><a href="">Olvidaste tu contraseña?</a></div>
     </form>
     <?php
     if (isset($_POST['correo']) && isset($_POST['pass']) && isset($_POST['pass2'])) {
       if ($_POST['pass']==$_POST['pass2']) {
         //si el usuario rellena todos los campos, llamamos al archivo de la db y creamos el objeto.
         include '\Modelo\usuario.php';
         $usuarios=new Usuario();
         //llamada a la funcion de insertar usuario en la db
         $resultado=$usuarios->registroUsuario($_POST['pass'], $_POST['correo']);
         if ($resultado==null) {
           echo "Error";
         }else {
           //si se inserta con exito, sacamos un mensaje i lo llevamos a login.php
          ?>
          <script type="text/javascript">
            alert("Usuario registrado con exito.");
            window.location="login.php";
          </script>
          <?php
           }
       }else {
         ?>
         <script type="text/javascript">
           alert("Las contraseñas no coinciden.");
           window.location="registro.php";
         </script>
         <?php
       }
  }else {
    echo "Rellena todos los campos";
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
