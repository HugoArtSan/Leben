<?php
	session_save_path("sessiones");
	session_start();
   include "libreria.lib.php";
   include "database.lib.php";


class Algo
{

   public function __construct() {

   }

   public function buscarAlgo($nombre, $pass) {

    $nombr=StrToUpper($nombre);
    $pas=StrToUpper($pass);

    $con=conectar();

    $sqlnom="SELECT nombre FROM r_usuarios WHERE login = '$nombr'";
	$compnom=pg_este($sqlnom, 'nombre', $con ); 
	$sqlpas="SELECT pass FROM r_usuarios WHERE pass = '$pas'";
	$compass=pg_este($sqlpas, 'pass', $con ); 

	if($compnom == $nombr && $compass == $pas){

		$sql="SELECT nivel_seguridad FROM r_usuarios WHERE ((login = '$nombr') AND (pass = '$pas'))";
		$seguridad=pg_este($sql, 'nivel_seguridad', $con ); 

	    $sql2="SELECT permisos FROM r_niveles_seguridad WHERE clave ='$seguridad'";
		$permisos=pg_este($sql2, 'permisos', $con );


	}else if ($compnom == $nombr){
			$seguridad="PASSWORD"; 
		}else{
			$permisos="USUARIO";
		}
	

	$datos_array = array();
	$datos_array[] = array("seguridad"=> $seguridad, "permisos"=> $permisos);
	$datos = array("datos" => $datos_array);
 

     
	/*
	if($consulta != "validado"){

	echo"<script language=javascript>
		alert('$permisos')</script>"
	echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL= index.php">';
	}else{
		echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL= principal.php">';
	}
    
    $_SESSION['session_jefazo'] = 'no_activa';
    $_SESSION['login_jefazo'] = "";
    $_SESSION['nombre_jefazo'] = "";
    $_SESSION['permisos_jefazo'] = "";

      echo"<script language=javascript>
          alert ('no')
        </script>";
      echo'<META HTTP-EQUIV="Refresh" CONTENT="0;URL= index.php">';
      }else{
        echo'<META HTTP-EQUIV="Refresh" CONTENT="0;URL= principal.php">';
      }

    

    */
    

	 pg_close($con);
   	 return $datos;

   }
}



header('Content-Type: application/json');
$algo = new Algo();
$pass=obten("pass");
$nombre=obten("nombre");

echo json_encode($algo->buscarAlgo($nombre, $pass));

?>
