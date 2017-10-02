<?php
   include "libreria.lib.php";
   include "database.lib.php";

class Algo
{

   public function __construct() {

   }

   public function buscarAlgo($buscaraNombre, $buscaraLugar, $buscaraEstado) {
    $buscaraNombre=StrToUpper($buscaraNombre);
    $buscaraLugar=StrToUpper($buscaraLugar);
    $buscaraEstado=StrToUpper($buscaraEstado);
    $con=conectar();
//LIMITES RANGO Y CANTIDAD
    $cantidad=10;
    $rango=0;
    $sql="SELECT idpersonal, nombre, direccion, email,  fecha, asunto, estado, supervisor, bitacora FROM personal  WHERE ( (upper(nombre) LIKE '$buscaraNombre%') AND  (upper(direccion) LIKE '$buscaraLugar%') AND  (upper(estado) LIKE '$buscaraEstado%') )order by idpersonal desc  LIMIT '$cantidad' OFFSET '$rango'";

   

  /*  $sql3="SELECT idpersonal, nombre, direccion, email,  fecha, asunto, estado, supervisor, bitacora FROM personal  WHERE upper(estado) LIKE '$buscara%' order by idpersonal desc  LIMIT '$cantidad' OFFSET '$rango'";
*/

    $result = pg_query($con,$sql);

    $datos_array = array();
    while ($row = pg_fetch_array($result)){
      $cuantos++;
      $nombre   = $row["nombre"];
      $direccion = $row["direccion"];
      $email = $row["email"];
      $idpersonal = $row["idpersonal"];
      $fecha = $row["fecha"];
      $asunto = $row["asunto"];
      $estado = $row["estado"];
      $supervisor = $row["supervisor"];
      $bitacora = $row["bitacora"];



      $datos_array[] = array("nombre"=> $nombre, "direccion"=> $direccion, "email"=> $email, "idpersonal"=>        $idpersonal, "fecha"=> $fecha, "asunto"=> $asunto, "estado"=> $estado, "supervisor"=> $supervisor, "bitacora"=> $bitacora, "cuantos"=>$cuantos);

      $datos = array("datos" => $datos_array);
    }
        

    
		//$datos_array[] = array("nombre" => 'juanelo', "direccion" => 'monte limbo #13');
		//$datos_array[] = array("nombre" => 'petronila', "direccion" => 'puerto la soledad #71');

	  pg_close($con);
    return $datos;

   }
}



header('Content-Type: application/json');
$algo = new Algo();
$buscaraNombre=obten("buscaraNombre");
$buscaraLugar=obten("buscaraLugar");
$buscaraEstado=obten("buscaraEstado");

echo json_encode($algo->buscarAlgo($buscaraNombre, $buscaraLugar, $buscaraEstado));

?>
