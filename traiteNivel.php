<?php
  session_save_path("sessiones");
  session_start();
   include "libreria.lib.php";
   include "database.lib.php";

class Algo
{

   public function __construct() {

   }

   public function buscarAlgo($accion, $clave, $nombre, $permisos, $clave3) {
    $modifico=obten("login_usuario");
    
    $con=conectar();
    $cuantos=0;
    if($accion == 1){
      $sql="SELECT id, clave, nombre FROM r_niveles_seguridad ";
      $result = pg_query($con,$sql);
      $datos_array = array();
      while ($row = pg_fetch_array($result)){
        $cuantos++;
        $id   = $row["id"];
        $clave = $row["clave"];
        $nombre = $row["nombre"];
        $datos_array[] = array("id"=> $id, "clave"=> $clave, "nombre"=> $nombre, "cuantos"=>$cuantos);
        $datos = array("datos" => $datos_array);
      }//While

    }else if($accion == 2){
      $sql="SELECT * FROM r_niveles_seguridad WHERE id = '$clave'";
      $result = pg_query($con,$sql);
      $datos_array = array();
      while ($row = pg_fetch_array($result)){
      $permisos   = $row["permisos"];
      $clave = $row["clave"];
      $nombre = $row["nombre"];
      $modifico = $row["modifico"];

      $datos_array[] = array("permisos"=> $permisos, "clave"=> $clave, "nombre"=> $nombre, "modifico"=> $modifico );
      $datos = array("datos" => $datos_array);
    }//While

    }else if($accion == 3){
      $sql = "INSERT INTO r_niveles_seguridad (clave, nombre, permisos, modifico) values('$clave', '$nombre', '$permisos', '$modifico')";
      $result=pg_query($con,$sql);

     
      $prueba=$result;
      $datos_array[] = array("prueba"=> $prueba);
      $datos = array("datos" => $datos_array);

     }else if($accion == 4){
      $sql = "DELETE FROM r_niveles_seguridad  WHERE id = '$clave'";
      $result=pg_query($con,$sql);

      $prueba=$result;
      $datos_array[] = array("prueba"=> $prueba);
      $datos = array("datos" => $datos_array);
  
     }else if($accion == 5){

      $sql = "UPDATE r_niveles_seguridad SET permisos='$permisos', nombre='$nombre', modifico='$modifico', clave='$clave3' WHERE id = '$clave'";
      pg_query($con,$sql);
     }

	  pg_close($con);
    return $datos;

   }
}


header('Content-Type: application/json');
$algo = new Algo();
$accion = obten("accion");
$clave = obten("clave");
$permisos = obten("permisos");
$nombre = obten("nombre");
$clave3 = obten("clave3");

echo json_encode($algo->buscarAlgo($accion, $clave, $nombre, $permisos, $clave3));

?>
