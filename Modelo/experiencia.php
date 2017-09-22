<?php
require_once 'db.php';

/**
 * Clase encargada de las consultas a la tabla experiencia.
 */
class Experiencia extends db
{

  function __construct()
  {
    parent::__construct();
  }

  function experienciaCV(){
    //Construimos la consulta
    $sql="SELECT * from experienciaprofesional";
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

  function borrarExp($id){
        $sql="DELETE FROM experienciaprofesional WHERE id_experiencia=".$id."";
        echo $sql;
        $borrarexp=$this->realizarConsulta($sql);
        if ($borrarexp=!NULL) {
              return true;
        }else {
              return false;
        }
      }

  function ActualizarExperiencia($anyoi, $anyof, $empresa, $texto, $id)
  {
    $sql="UPDATE experienciaprofesional SET anyoinicio='".$anyoi."', anyofinal='".$anyof."', empresa='".$empresa."', texto='".$texto."' WHERE id_experiencia=".$id;
    $actualizarexp=$this->realizarConsulta($sql);
    if ($actualizarexp=!false) {
      return true;
    }else {
      return false;
    }
  }
}

 ?>
