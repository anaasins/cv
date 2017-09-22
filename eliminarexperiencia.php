<?php
include 'Modelo/experiencia.php';
$experiencia=new Experiencia();
$borrarexp=$experiencia->borrarExp($_GET["id"]);
if($borrarexp==true){
  header('Location: index.php');
}else{
  echo "Error al borrar";
}
 ?>
