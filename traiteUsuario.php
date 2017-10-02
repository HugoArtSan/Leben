<?php
   include "libreria.lib.php";
   include "database.lib.php";

class buscarUsuarios
{

   public function __construct() {

   }

   public function buscarAlgo($accion, $buscaraNombre, $buscarUsuario, $idU) {
    $buscaraNombre=StrToUpper($buscaraNombre);
    $buscarUsuario=StrToUpper($buscarUsuario);
    $con=conectar();
    if($accion == 1){
      //LIMITES RANGO Y CANTIDAD
      $cantidad=5;
      $rango=0;
      $cuantos=0;

      $sql="SELECT id, login, nombre, nivel_seguridad, observaciones, modifico FROM r_usuarios  WHERE ( (upper(login) LIKE '$buscarUsuario%') OR  (upper(nombre) LIKE '$buscaraNombre%'))  order by id desc  LIMIT '$cantidad' OFFSET '$rango'";

      $result = pg_query($con,$sql);
      $datos_array = array();

      while ($row = pg_fetch_array($result)){
        $cuantos++;
        $id = $row["id"];
        $login = $row["login"];
        $nombre = $row["nombre"];
        $nivel_seguridad = $row["nivel_seguridad"];
        $observaciones = $row["observaciones"];
        $modifico = $row["modifico"];

        $datos_array[] = array("id"=> $id, "login"=> $login, "nombre"=> $nombre, "nivel_seguridad"=> $nivel_seguridad, "observaciones"=> $observaciones, "modifico" =>$modifico, "cuantos"=>$cuantos);
        $datos = array("datos" => $datos_array);
      }

    }//Accion 1: Buscar USUARIOS


	  pg_close($con);
    return $datos;

   }
}



header('Content-Type: application/json');
$algo = new buscarUsuarios();
$buscaraNombre=obten("buscaraNombre");
$buscarUsuario=obten("buscarUsuario");
$accion=obten("accion");
$idU=obten("idU");


echo json_encode($algo->buscarAlgo($accion, $buscaraNombre, $buscarUsuario, $idU));

?>
