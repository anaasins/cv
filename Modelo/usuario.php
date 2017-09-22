<?php
require_once 'db.php';
/**
 * Clase usuario.
 */
class Usuario extends db
{

  function __construct()
  {
    parent::__construct();
  }

  //funcion insertar usuario en la bd
   function registroUsuario($contraseña, $correo){
     $sql="INSERT INTO usuarios(id_user, pass, correo)
           VALUES (NULL , '".sha1($contraseña)."', '".$correo."')";
     //Realizamos la consulta
     $resultado=$this->realizarConsulta($sql);
     if($resultado!=false){
       //Recogemos el ultimo usuario insertado
       $sql="SELECT * from usuarios ORDER BY id_user DESC";
       //Realizamos la consulta
       $resultado=$this->realizarConsulta($sql);
       if($resultado!=false){
         return $resultado->fetch_assoc();
       }else{
         return null;
       }
     }else{
       return null;
     }
   }

   function LoginUsuario($correo){
     //Construimos la consulta
     $sql="SELECT * from usuarios WHERE correo='".$correo."'";
     //Realizamos la consulta
     $resultado=$this->realizarConsulta($sql);
     if($resultado!=false){
       if($resultado!=false){
         return $resultado->fetch_assoc();
       }else{
         return null;
       }
     }else{
       return null;
     }
   }
}

 ?>
