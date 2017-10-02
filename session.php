<?php
	session_save_path("sessiones");
	session_start();
   	include "libreria.lib.php";
   	include "database.lib.php";

	$_SESSION['prueba']="hola";

  $nombre=strtoupper(obten("nombreInicio"));
	$pass=obten("passInicio");
	
	$con=conectar();
    
   	$validar="invalido";
    $sql="SELECT nombre, pass, nivel_seguridad FROM r_usuarios WHERE upper(login) = '$nombre'";

    $result= pg_query($con,$sql) or die (pg_last_error($con));


    if($row = pg_fetch_array($result)){
    	$validar="usuarioValido";
    	$password=$row["pass"];
    	$usuario=$row["nombre"];
    	$nivel_seguridad=$row["nivel_seguridad"];


    	$sql="SELECT permisos FROM r_niveles_seguridad where clave = '$nivel_seguridad'";

    	$permisos=pg_este($sql, "permisos", $con);

    	if(strtoupper($pass) == strtoupper($password)){
    		$validar="valido";
    		$_SESSION['session_usuario'] = 'activa';
  		  $_SESSION['login_usuario'] = $usuario;
    		$_SESSION['permisos_usuario'] = $permisos;
    		

    	}

    }
    if($validar!="valido"){
    	if($validar=="invalido"){
    		$alerta="No existe el usuario $c_nombr";
    	}
    	if($validar=="usuarioValido"){
    		$alerta="La contraseña es invalida";	
    	}
    	$_SESSION['session_usuario'] = 'no_activa';
  		$_SESSION['login_usuario'] = "";
    	$_SESSION['permisos_usuario'] = "";

    	echo"<script language=javascript>
            alert ('$alerta')
          </script>";
      echo'<META HTTP-EQUIV="Refresh" CONTENT="0;URL= index.php">';

    }else{

    	echo'<META HTTP-EQUIV="Refresh" CONTENT="0;URL= principal.php">';
    }


	 pg_close($con);


?>
