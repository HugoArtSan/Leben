<?php
   include "libreria.lib.php";
   include "database.lib.php";

class Algo
{

   public function __construct() {

   }

   public function buscarAlgo() {
     $con=conectar();
     pg_query($con,"BEGIN") or $rc="FAIL";

    $sql="SELECT count (*) FROM personal";
    $result = pg_este($sql,'count' ,$con);

	   pg_close($con);
      return $result;

   }
}

header('Content-Type: application/json');

$algo = new Algo();
echo json_encode($algo->buscarAlgo());

?>
