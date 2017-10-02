<?php
   include "libreria.lib.php";
   include "database.lib.php";

class tabulador
{

   public function __construct() {

   }

   public function tabulador($rango) {

    $con=conectar();
    $cantidad=5;
//    $rango=($rango + 3);

    $sql="SELECT idpersonal, nombre, direccion, email FROM personal order by idpersonal desc  LIMIT '$cantidad' OFFSET '$rango'";

    $result = pg_query($con,$sql);
	  $datos_array = array();

    while ($row = pg_fetch_array($result)){
  		$nombre   = $row["nombre"];
  		$direccion = $row["direccion"];
  		$email = $row["email"];
      $idpersonal = $row["idpersonal"];

      $datos_array[] = array("nombre"=> $nombre, "direccion"=> $direccion, "email"=> $email, "idpersonal"=> $idpersonal);

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


$rango = obten("rango");

header('Content-Type: application/json');
$algo = new tabulador();

echo json_encode($algo->tabulador($rango));

?>
