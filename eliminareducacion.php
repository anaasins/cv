<?php
include 'Modelo/educacion.php';
$estudio=new Educacion();
$borrarestudio=$estudio->borrarEstudio($_GET["id"]);
if($borrarestudio==true){
  header('Location: index.php');
}else{
  echo "Error al borrar";
}
 ?>
