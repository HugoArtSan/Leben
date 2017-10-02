<?php
   include "libreria.lib.php";
   include "database.lib.php";

class buscarID
{

   public function __construct() {

   }

   public function buscarID($idpersonal) {
   $buscara=StrToUpper($buscara);
    $con=conectar();
	  $sql="SELECT idpersonal, nombre, direccion, email, asunto, estado, supervisor, bitacora FROM personal WHERE idpersonal = '$idpersonal'";
      $result = pg_query($con,$sql);
	  $datos_array = array();

    while ($row = pg_fetch_array($result)){
  		$nombre   = $row["nombre"];
  		$direccion = $row["direccion"];
  		$email = $row["email"];
      $idpersonal = $row["idpersonal"];
      $asunto = $row["asunto"];
      $estado = $row["estado"];
      $supervisor = $row["supervisor"];
      $bitacora = $row["bitacora"];


  		$datos_array[] = array("nombre"=> $nombre, "direccion"=> $direccion, "email"=> $email, "asunto"=> $asunto, "estado"=> $estado, "supervisor"=> $supervisor, "bitacora"=> $bitacora);

  		$datos = array("datos" => $datos_array);
    }
		//$datos_array[] = array("nombre" => 'juanelo', "direccion" => 'monte limbo #13');
		//$datos_array[] = array("nombre" => 'petronila', "direccion" => 'puerto la soledad #71');

	  pg_close($con);
      return $datos;

   }
}

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


$idpersonal = obten("idPers");

header('Content-Type: application/json');
$algo = new buscarID();

echo json_encode($algo->buscarID($idpersonal));

?>
