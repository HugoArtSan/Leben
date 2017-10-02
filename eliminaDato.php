<?php
session_save_path("sessiones");
session_start();
   include "libreria.lib.php";
   include "database.lib.php";

class Guardador
{

   public function __construct() {

   }

   public function eliminaDato($idpersonal) {

	  $con=conectar();

	  $rc="OK";
      pg_query($con,"BEGIN") or $rc="FAIL";

      $sql = "DELETE FROM personal where idpersonal='$idpersonal'";

	  pg_query($con,$sql) or $rc="FAIL";

      pg_query($con,"COMMIT");

	  //sleep(3);
      return $rc;

   }
}


$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$G = new Guardador();


$idpersonal = $request->idpersonal;


echo json_encode($G->eliminaDato($idpersonal));

?>
