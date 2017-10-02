<?php
session_save_path("sessiones");
session_start();
   include "libreria.lib.php";
   include "database.lib.php";

class modificar
{

   public function __construct() {

   }

   public function modificarDato($idpersonal, $nombre, $direccion, $email, $asunto, $estado, $supervisor, $bitacora) {

	  $con=conectar();

	  $rc="OK";
      pg_query($con,"BEGIN") or $rc="FAIL";

	  $sql = "UPDATE personal SET nombre='$nombre', direccion='$direccion', email='$email', asunto='$asunto', 
     estado='$estado', supervisor='$supervisor', bitacora='$bitacora' WHERE idpersonal='$idpersonal' ";

	  pg_query($con,$sql) or $rc="FAIL";

      pg_query($con,"COMMIT");

	  //sleep(3);
      return $rc;

   }
}


$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$G = new modificar();

$idpersonal = $request->idpersonal;
$nombre = $request->nombre;
$direccion = $request->direccion;
$email = $request->email;
$asunto = $request->asunto;
$estado = $request->estado;
$supervisor = $request->supervisor;
$bitacora = $request->bitacora;


$sql = "UPDATE SET personal where idpersonal='$idpersonal'";

echo json_encode($G->modificarDato(
   $idpersonal, $nombre, $direccion, $email, $asunto, $estado, $supervisor, $bitacora));

?>
