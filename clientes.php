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
  <title>:: Clientes ::</title>

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
  <dt   align="center" class="bg-success">  :: Clientes ::</dt >
  <div id="clave" class="col-md-2 panel panel-success table-responsive "> 
    <div class="container col-md-12 panel panel-success bg-success">
      <dt  align="center"  class="bg-success">Busqueda</dt >
   
      <p>Nombre<input type="text" class="input-sm form-control" id="buscarNombre" placeholder=""></p>
      
      <p>Apellidos<input type="text" class="input-sm form-control" id="buscarApellidos" placeholder=""></p>
      
      <p>Ciudad<input type="text" class="input-sm form-control" id="buscarCiudad" placeholder=""></p>

      <p>Estado<input type="text" class="input-sm form-control" id="buscarEstado" placeholder=""></p>
    
      <p>Pais<input type="text" class="input-sm form-control" id="buscarPais" placeholder=""></p>
      <p>Genero
        <select class="input-sm form-control " id="buscarGenero" >
          <option>Todos</option>
          <option>Mujer</option>
          <option>Hombre</option>
        </select>
      </p>

      <p>Mes Cumpleaños
        <select class="input-sm form-control " id="buscarStatus" >
          <option></option>
          <option>Enero</option>
          <option>Febrero</option>
          <option>Marzo</option>
          <option>Abril</option>
          <option>Mayo</option>
          <option>Junio</option>
          <option>Julio</option>
          <option>Agosto</option>
          <option>Septiembre</option>
          <option>Octubre</option>
          <option>Noviembre</option>
          <option>Diciembre</option>
        </select>
      </p>
      

      <button id="butt_buscar" onclick="buscar(1);" class="btn btn-info center-block" type="button">
      <span class="glyphicon glyphicon-search"></span> Buscar</button>

    </div><!--DIV 1-->
      
    
  </div><!--Div barra izq-->
  
  <div id="Tabulador" class="col-md-10 panel panel-info ">
  
    <ul class="pager">
    <div id="tabular" class=" col-md-offset-1  col-md-3   ">
      <li onclick="tabulador(0);"><a>&laquo;</a></li>
      <li onclick="tabulador(1);"><a>&lt;</a></li>
      <li onclick="tabulador(2);"><a>&gt;</a></li>
      <li onclick="tabulador(3);"><a>&raquo;</a></li>
    </div>
    <div id="botones" class="col-md-4 ">
      <button  id="butt_nuevo" onclick="nuevo();" class="btn btn-success" type="button">
      <span class="glyphicon glyphicon-plus-sign"></span> Nuevo</button>
      <button id="butt_imprimir" onclick="imprimir();" class="btn btn-success" type="button">
      <span class="glyphicon glyphicon-print"></span> Imprimir</button>
      <button id="butt_excel" onclick="prueba();" class="btn btn-success" type="button">
      <span class="glyphicon glyphicon-th"></span> Excel</button>
    </div>

    </ul>
  <div id="datosAparatos" class="col-md-12 panel panel-success table-responsive"> 
    
    <table id="Tdatos" class="table table-hover ">
      <thead>
        <tr>
          <th><input type="checkbox" value="" > Eliminar</th>
          <th id="tablaUsuario" onclick="ordenarTabla(1);">Clave</th>
          <th id="tablaApellido" onclick="ordenarTabla(2);">Apellidos</th>
          <th id="tablaNombre" onclick="ordenarTabla(2);">Nombre</th>
          <th id="tablaTelefono" onclick="ordenarTabla(2);">Telefono</th>
          <th id="tablaGenero" onclick="ordenarTabla(11);">Genero</th>
          <th id="tablaCumpleanios" onclick="ordenarTabla(11);">Cumpleaños</th>
          <th id="tablaConsumo" onclick="ordenarTabla(11);">Consumo</th>
          <th id="tablaUltimaVisita" onclick="ordenarTabla(11);">Ult. Visita</th>
          <th id="tablaModifico" onclick="ordenarTabla(11);">Modifico</th>
         <!-- <th style="visibility:hidden;">Cuantos </th>-->

        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

  </div><!--DIV 2-->
  <div align="center" id="nuevoAparato" class="col-md-offset-2 col-md-7 panel panel-success table-responsive"> 
    <table  align="center" class="table  table-responsive  ">
      <tbody>
        <tr>
          <td>Modifico</td>
          <td><b>Prueba</b></td>
          <td>Alta</td>
          <td><b>01/01/2017</b></td>
          <td>Ultima Visita</td>
          <td><b>01/01/2017</b></td>
        </tr>
        <tr>
          <td>Clave</td>
          <td>
            <input type="text" class="input-sm form-control" id="buscarFolio" placeholder="">
          </td>
        </tr>
        

      </tbody>
    </table>
    <button  id="butt_nuevo" onclick="nuevoAparato();" class="btn btn-success" type="button">
    <span class="glyphicon glyphicon-plus-sign"></span> Nuevo</button>
    <button id="butt_imprimir" onclick="regresar();" class="btn btn-success" type="button"> Regresar</button>
  </div><!--DIV 2-->
  
  </div>


</div><!--Contenedor-->


</body>
</html>

<script language="javascript">
$("#nuevoAparato").hide();




  function nuevo(){
      $("#nuevoAparato").show();
      $("#datosAparatos").hide();
      $("#tabular").hide();
      $("#botones").hide();

  }
  function regresar(){
    $("#nuevoAparato").hide();
      $("#datosAparatos").show();
      $("#tabular").show();
      $("#botones").show();
  }
 </script>