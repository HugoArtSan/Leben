<?php
session_save_path("sessiones");
session_start();
   include "libreria.lib.php";
   include "database.lib.php";

class Guardador
{

   public function __construct() {

   }

   public function guardaDato($nombre, $direccion, $email, $asunto, $estado, $supervisor, $bitacora) {

	  $con=conectar();

	  $rc="OK";
      pg_query($con,"BEGIN") or $rc="FAIL";

	  $sql = "insert into personal (nombre, direccion, email, asunto, estado, supervisor, bitacora ) values('$nombre', '$direccion', '$email', '$asunto', '$estado', '$supervisor', '$bitacora')";

	  pg_query($con,$sql) or $rc="FAIL";

     pg_query($con,"COMMIT");

	  //sleep(3);
     return $rc;

   }
}


$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$G = new Guardador();


$nombre = $request->nombre;
$direccion = $request->direccion;
$email = $request->email;
$asunto = $request->asunto;
$estado = $request->estado;
$supervisor = $request->supervisor;
$bitacora = $request->bitacora;

echo json_encode($G->guardaDato($nombre, $direccion, $email, $asunto, $estado, $supervisor, $bitacora));

?>
