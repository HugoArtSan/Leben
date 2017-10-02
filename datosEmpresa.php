<?php
session_save_path("sessiones");
session_start();

   include "database.lib.php";
   include "objetos.lib.php";
   include "libreria.lib.php";
   include "navbar.lib.php";

   $alerta=obten("session_usuario");
   $usuarioActivo=obten("login_usuario");

   if($alerta!="activa"){
    echo'<META HTTP-EQUIV="Refresh" CONTENT="0;URL= index.php">';
    echo"<script language=javascript>
            alert ('Inicia Sesion')
          </script>";
   }
    $con=conectar();

     echo interfazBar();
     pg_close($con);

?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>:: Datos de la Empresa ::</title>

  <link rel="stylesheet" href="bootstrap/css/bootstrap15.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css"> 
  

  <script src="js/jquery.js"></script>

  <script src="bootstrap/js/bootstrap.js"></script>
  <script src="bootstrap/js/bootstrap-submenu.min.js"></script>
  <script src="bootstrap/js/bootstrap-modal.js"></script>
  <script src="bootstrap/js/bootbox.js"></script>

  <link rel="stylesheet" href="css/jquery-ui.css" />
  <script type="text/javascript" src="js/jquery-ui.js"></script>
  <script language="javascript">
  
  function nobackbutton(){
     window.location.hash="no-back-button";
     window.location.hash="Again-No-back-button" //chrome
     window.onhashchange=function(){window.location.hash="no-back-button";}
  }
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>  

<div class="container col-md-12 panel panel-danger panel-responsive  "> 
  <dt   align="center" class="bg-success">  :: Datos de la empresa ::</dt >
  <div id="clave" class="col-md-offset-3 col-md-5 panel panel-success table-responsive "> 

    <div class=" col-md-4 panel panel-success table-responsive ">
      <div>
        <p>Nombre</p>
      </div>
      <div>
        <p>Direccion</p>  
      </div>
      <div>
        <p>RFC</p>  
      </div>
      <div>
        <p>Codigo postal</p>  
      </div>
      <div>
        <p>Ciudad</p>  
      </div>
      <div>
        <p>Estado</p>  
      </div>
      <div>
        <p>Telefonos</p>  
      </div>
      <div>
        <p>Imagen de portada</p>  
      </div>
      <div>
        <p>Modifico</p>  
      </div>

    </div> <!--Columna 1-->
        
    <div  class=" panel panel-success table-responsive row">
      <div>
        <input type="text" class="form-control input-sm" id="nombre" placeholder="">
      </div>
      <div>
        <input type="text" class="form-control input-sm" id="Direccion" placeholder="">
      </div>
      <div>
        <input type="text" class="form-control input-sm" id="RFC" placeholder="">
      </div>
      <div>
        <input type="text" class="form-control input-sm" id="CP" placeholder="">
      </div>
      <div>
        <input type="text" class="form-control input-sm" id="Ciudad" placeholder="">
      </div>
      <div>
        <input type="text" class="form-control input-sm" id="Estado" placeholder="">
      </div>
      <div>
        <input type="text" class="form-control input-sm" id="Telefonos" placeholder="">
      </div>
      <div clas="row">
        <td align="left"><input type="file" name="foto"><font face="arial" size="2">800 x 600 px</font></td>
      </div>
      <div>
        <input type="text" class="form-control input-sm" id="Imagen" placeholder="">
      </div>
      




    </div><!--Columna 2-->
    
    <button onclick="guardar();" class="btn btn-info center-block " type="button">
    <span class="glyphicon glyphicon-floppy-save"></span> Guardar</button>
  
  
  </div>


</div><!--Contenedor-->
  <p align="center">
     <img src="imagenes/loguito_medisa.jpg">
  </p>

</body>
</html>