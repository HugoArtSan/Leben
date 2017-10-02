<?php
session_save_path("sessiones");
session_start();


   include "database.lib.php";
   include "objetos.lib.php";
   include "libreria.lib.php";
   $alerta=obten("session_usuario");
   if($alerta!="activa"){
    echo'<META HTTP-EQUIV="Refresh" CONTENT="0;URL= index.php">';
    echo"<script language=javascript>
            alert ('Inicia Sesion')
          </script>";
   }

?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>:: MEDISA - Traspasos::</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap15.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap-submenu.min.css">

  <script src="js/jquery.js"></script>

  <script src="bootstrap/js/bootstrap.js"></script>
  <script src="bootstrap/js/bootstrap-submenu.min.js"></script>
  <script src="bootstrap/js/bootstrap-modal.js"></script>
  <script src="bootstrap/js/bootbox.js"></script>

  <link rel="stylesheet" href="css/jquery-ui.css" />
  <script type="text/javascript" src="js/jquery-ui.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head> 
<body>  


<div id="menu"  class="container col-md-12 btn-group panel panel-danger panel-responsive  ">    

      <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" id="Inicio"
                    data-toggle="dropdown">
              Inicio<span class="caret"></span>
            </button>

            <ul class="dropdown-menu" role="menu">
              <li><a href="principal.php">inicio</a></li>
            </ul>
        </div>


        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" id="menuAdministracion"
                    data-toggle="dropdown">
              Administracion<span class="caret"></span>
            </button>

            <ul class="dropdown-menu" role="menu">
              <li><a href="aparatos.php">Aparatos</a></li>
              <li><a href="cabinas.php">Cabinas</a></li>
              <li><a href="clientes.php">Clientes</a></li>
              <li><a href="configuracionGeneral.php">Configuracion General</a></li>
              <li><a href="datosEmpresa.php">Datos de la empresa</a></li>
              <li><a href="especialidades.php">Especialidades</a></li>
              <li><a href="lineas.php">Lineas</a></li>
              <li><a href="impuestos.php">Impuestos</a></li>
              <li><a href="paquetes.php">Paquetes</a></li>
              <li><a href="personal.php">Personal</a></li>
              <li><a href="servicios.php">Servicios</a></li>

            </ul>
        </div>

        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" id="menuInventarios"
                    data-toggle="dropdown" aria-expanded="false">
              Inventarios<span class="caret"></span>
            </button>


            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
              <li><a href="almacenes.php">Almacenes</a></li>
              <li><a href="lineasAlmacen.php">Lineas</a></li>
              <li><a href="entradasDiversas.php">Entradas diversas</a></li>
              <li><a href="salidasDiversas.php">Salidas diversas</a></li>
              <li><a href="compras.php">Compras</a></li>
              <li><a href="productos.php">Productos</a></li>
              <li><a href="proveedores.php">Proveedores</a></li>
              <li><a href="formulas.php">Formulas</a></li>
              <li><a href="traspasos.php">Traspasos</a></li>
              <li><a href="tomaFisica.php">Toma fisica</a></li>

              <li class=" dropdown-submenu ">
                <a  tabindex="-1">Reportes</a>
                <ul class= "dropdown-menu ">
                  <li><a href="existencias.php">Existencias</a></li>
                </ul>           
              </li>
              </ul>
        </div>

        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" id="menuReservaciones"
                    data-toggle="dropdown">
              Reservaciones<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="reservaciones.php">Reservaciones</a></li>
              <li><a href="mapaPersonal.php">Mapa de disponibilidad de personal</a></li>
            </ul>
        </div>

        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" id="menuPuntoVenta"
                    data-toggle="dropdown">
              Punto de Venta<span class="caret"></span>
            </button>

            <ul class="dropdown-menu" role="menu">
              <li><a>Cajas</a></li>
              <li class="divider"></li>
              <li><a href="abrirCaja.php">Abrir caja</a></li>
              <li><a href="cerrarCaja.php">Cerrar caja</a></li>
              <li><a href="consultarCaja.php">Consultar caja</a></li>
              <li><a href="egresosCaja.php">Egresos de caja</a></li>
              <li class="divider"></li>
              
              <li><a href="cobrar.php">Cobrar</a></li>
              <li><a href="cancelaciones.php">Cancelaciones</a></li>
              <li><a>Reportes</a></li>
              <li class="divider"></li>
              <li><a href="puntosClientes.php">Puntos de clientes</a></li>
              <li><a href="paquetesServicios.php">Paquetes y Servicios Vendidos</a></li>
              <li><a href="pagosRealizados.php">Pagos Realizados</a></li>
              <li><a href="ventas.php">Ventas</a></li>
              <li><a href="ventasEspecialista.php">Ventas por especialista</a></li>
              <li><a href="ventasDetallado.php">Ventas Detallado</a></li>
              <li><a href="ventasCompacto.php">Ventas Compacto</a></li>
              <li><a href="resumenPaquetes.php">Reumen Paquetes</a></li>
              <li><a href="ventasProductos.php">Ventas Productos</a></li>
            </ul>
        </div>

        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" id="menuCobranza"
                    data-toggle="dropdown">
              Cobranza<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="pagos.php">Pagos</a></li>
              <li><a href="saldos.php">Saldos</a></li>
            </ul>
        </div>     

        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" id="menuSeguridad"
                    data-toggle="dropdown">
              Seguridad<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="niveles_seguridad.php">Niveles de seguridad</a></li>
              <li><a href="usuarios.php">Usuarios</a></li>
            </ul>
        </div>
        <div id="salir" class=" btn-group ">
            <button  id="butt_cerrar" onclick="cerrar();"  class="btn btn-danger" type="button">
            <span class="glyphicon glyphicon-log-out"></span> Salir</button>
        </div> 
</div><!--Menu-->







<div class="container col-md-12 panel panel-danger panel-responsive  "> 
  <dt   align="center" class="bg-success">  :: Traspasos ::</dt >
  <div id="clave" class="col-md-2 panel panel-success table-responsive "> 
    <div class="container col-md-12 panel panel-success bg-success">
      <dt  align="center"  class="bg-success">Busqueda</dt >
      

      <p>Folio<input type="text" class="input-sm form-control" id="buscarFolio" placeholder=""></p>

      <p>Observacion<input type="text" class="input-sm form-control" id="buscarFolio" placeholder=""></p>

      <p>Fecha</p>
      <p>Del:
       <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
      </p>
      <p>Al:
        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
      </p>
      <p>Reporte
        <select class="input-sm form-control " id="buscarReporte" >
          <option>Compacto</option>
          <option>Detallado</option>
        </select>
      </p>


     

      <button id="butt_buscar" onclick="buscar(1);" class="btn btn-info center-block" type="button">
      <span class="glyphicon glyphicon-search"></span> Buscar</button>

      

    </div><!--DIV 1-->
      
    
  </div><!--Div barra izq-->
  
  <div id="a" class="col-md-10 panel panel-info ">
  
    <ul class="pager">
    <div id="Tabulador" class=" col-md-offset-1  col-md-3   ">
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
  <div id="Compacto" class="col-md-12 panel panel-success table-responsive"> 
    
    <table id="Tdatos" class="table table-hover ">
      <thead>
        <tr>
          <th id="tablaFolio" onclick="ordenarTabla(2);">Folio</th>
          <th id="tablaEntro" onclick="ordenarTabla(2);">Entro en</th>
          <th id="tablaObservacion" onclick="ordenarTabla(2);">Observacion</th>
          <th id="tablaFecha" onclick="ordenarTabla(11);">Fecha</th>
          <th id="tablaHora" onclick="ordenarTabla(11);">Hora</th>
          <th id="tablaModifico" onclick="ordenarTabla(11);">Modifico</th>

        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

  </div><!--DIV 2-->
  <div id="Detallado" class="col-md-12 panel panel-success table-responsive"> 
    
    <table id="Tdatos" class="table table-hover ">
      <thead>
        <tr>
          <th id="tablaFolio" onclick="ordenarTabla(2);">Folio</th>
          <th id="tablaEntro" onclick="ordenarTabla(2);">Entro en</th>
          <th id="tablaObservacion" onclick="ordenarTabla(2);">Observacion</th>
          <th id="tablaFecha" onclick="ordenarTabla(11);">Fecha</th>
          <th id="tablaHora" onclick="ordenarTabla(11);">Hora</th>
          <th id="tablaModifico" onclick="ordenarTabla(11);">Modifico</th>

        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

  </div><!--DIV 2-->
  <div id="almacenes" class="col-md-12 panel panel-success table-responsive"> 
  <dt   align="center" class="bg-success">  :: Configuracion General ::</dt >
  <div id="clave" class="col-md-offset-3 col-md-5 panel panel-success table-responsive "> 

    <div class="col-md-offset-4 col-md-4 panel panel-success table-responsive ">
      <div>
        <p>Sale de: </p>
      </div>
      <div>
        <p>Fntra en: </p>  
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
        <select class="input-sm form-control " id="almacen" >
          <option>prueba</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
        
      </div>      


    </div><!--Columna 2-->

    <div>
      <button onclick="guardar();" class="btn btn-info center-block " type="button">
      <span class="glyphicon glyphicon-floppy-save"></span> Guardar</button>  
      <button onclick="regresar();" class="btn btn-info center-block " type="button">
      <span ></span> Regresar</button>
    </div>
   
      
  
  
  </div>


</div><!--Contenedor-->
   

  </div><!--DIV 2-->
  
  </div>


</div><!--Contenedor-->


</body>
</html>

<script language="javascript">
$("#Detallado").hide();
$("#almacenes").hide();

function nuevo(){
  $("#almacenes").show();
  $("#Compacto").hide();
  $("#Detallado").hide();
  $("#Tabulador").hide();
  $("#botones").hide();
  
  

}
function regresar(){
  $("#almacenes").hide();
  $("#Tabulador").show();
  $("#botones").show();
  buscar();
}

  function buscar(){
    reporte=$('#buscarReporte').val();
    
    
    if(reporte == 'Compacto'){
      $("#Compacto").show();
      $("#Detallado").hide();
    }else{
      $("#Compacto").hide();
      $("#Detallado").show();
    }
  }
 </script>