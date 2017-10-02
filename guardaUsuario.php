<?php
session_save_path("sessiones");
session_start();
   include "libreria.lib.php";
   include "database.lib.php";

class Guardador
{

   public function __construct() {

   }

   public function guardaDato($usuario, $pass, $nombre, $nivel_seguri, $observaciones) {
    $modifico=obten("login_usuario");
	  $con=conectar();
    $usuario=strtoupper($usuario);
	  $rc="OK";
    $sqllog="SELECT login FROM r_usuarios WHERE login = '$usuario'";
    $comlog=pg_este($sqllog, 'login', $con ); 

    if($comlog == $usuario){
      $rc="Login";
      return $rc;
      }
    else{
      pg_query($con,"BEGIN") or $rc="FAIL";
  	  $sql = "insert into r_usuarios (login, pass, nombre, nivel_seguridad, observaciones, modifico) values('$usuario', '$pass', '$nombre', '$nivel_seguri', '$observaciones', '$modifico')";
  	  pg_query($con,$sql) or $rc="FAIL";
      pg_query($con,"COMMIT");

  	  //sleep(3);
       return $rc;
    }
   }
}


$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$G = new Guardador();

$usuario = $request->usuario;
$nombre = $request->nombre;
$pass = $request->pass;
$nivel_seguri = $request->nivel_seguri;
$observaciones = $request->observaciones;

echo json_encode($G->guardaDato($usuario, $pass, $nombre, $nivel_seguri, $observaciones));
?>
