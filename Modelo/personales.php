<?php
/**
 * Clase de gestion de usuarios
 */
 require_once 'db.php';
class Personales extends db
{

  function __construct()
 {
   parent::__construct();
 }



  function datosCv(){
    //Construimos la consulta
    $sql="SELECT * from datospersonales";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=null){
      //Montamos la tabla de resultados
      $tabla=[];
      while($fila=$resultado->fetch_assoc()){
        $tabla[]=$fila;
      }
      return $tabla;
    }else{
      return null;
    }
  }

 function actualizarDatos($foto, $nombre, $apellidos, $direccion, $correo, $telefono, $redes){
            $sql="UPDATE datospersonales SET nombre='".$nombre."', apellidos='".$apellidos."', foto='".$foto."', direccion='".$direccion."',correo='".$correo."', telefono=".$telefono.", redes_sociales='".$redes."'";
            $actualizarreserva=$this->realizarConsulta($sql);
            if ($actualizarreserva=!false) {
              return true;
            }else {
              return false;
            }
          }

}

 ?>
