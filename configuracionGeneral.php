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
  <title>:: Configuracion General ::</title>

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
  <dt   align="center" class="bg-success">  :: Configuracion General ::</dt >
  <div id="clave" class="col-md-offset-3 col-md-5 panel panel-success table-responsive "> 

    <div class="col-md-offset-4 col-md-4 panel panel-success table-responsive ">
      <div>
        <p>Almacen de ventas</p>
      </div>
      <div>
        <p>Folio Facturas</p>  
      </div>
      <div>
        <p>Folio recibo de pago</p>  
      </div>
      <div>
        <p>Folio reservaciones</p>  
      </div>
      <div>
        <p>Folio venta</p>  
      </div>

    </div> <!--Columna 1-->
        
    <div  class=" col-md-4 panel panel-success table-responsive ">
      <div>
        <select class="input-sm form-control " id="almacen" >
          <option>prueba</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        
      </div>      
      <div>
        <input type="text" class="form-control input-sm" id="folioFacturas" placeholder="">
      </div>
      <div>
        <input type="text" class="form-control input-sm" id="folioRecibo" placeholder="">
      </div>
      <div>
        <input type="text" class="form-control input-sm" id="folioReservaciones" placeholder="">
      </div>
      <div>
        <input type="text" class="form-control input-sm" id="folioVenta" placeholder="">
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