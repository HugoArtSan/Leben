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
  <title>:: MEDISA - Cerrar Cajas ::</title>
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
  <dt   align="center" class="bg-success">  :: Cerrar Cajas ::</dt >
  <div id="clave" class="col-md-2 panel panel-success table-responsive "> 
    <div class="container col-md-12 panel panel-success bg-success">
      <dt  align="center"  class="bg-success">Busqueda</dt >

      <p>Fecha Inicial</p>
        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
      <p>Fecha Final</p>
        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
      
      <p>Turno
        <select class="input-sm form-control " id="buscarStatus" >
          <option>Todos</option>
          <option>Matutino</option>
          <option>Vespertino</option>
          <option>Nocturno</option>
        </select>
      </p>

      <button id="butt_buscar" onclick="buscar();" class="btn btn-info center-block" type="button">
      <span class="glyphicon glyphicon-search"></span> Buscar</button> 

    </div><!--DIV 1-->      
    
  </div><!--Div barra izq-->
  
  <div id="Tabulador" class="col-md-10 panel panel-info ">
  
  <div id="Cajas" class="col-md-12 panel panel-success table-responsive"> 
    
    <table id="Tdatos" class="table table-hover ">
      <thead>
        <tr>
          <th id="tablaFecha" onclick="ordenarTabla(1);">Fecha</th>
          <th id="tablaApertura" onclick="ordenarTabla(2);">Apertura</th>
          <th id="tablaCierre" onclick="ordenarTabla(2);">Cierre</th>
          <th id="tablaCajero" onclick="ordenarTabla(2);">Cajero</th>
          <th id="tablaTurno" onclick="ordenarTabla(11);">Turno</th>
          <th id="tablaFondo" onclick="ordenarTabla(11);">Fondo</th>
          <th id="tablaModifico" onclick="ordenarTabla(11);">Modifico</th>
          <th id="tablaStatus" onclick="ordenarTabla(11);">Status</th>
        </tr>
        <tr>
          <th>ejemplo</th>
          <th>...</th>
          <th>...</th>
          <th>...</th>
          <th>...</th>
          <th>...</th>
          <th>...</th>
          <th>...</th>
        </tr>
        <tr>
          <th>ejemplo</th>
          <th>...</th>
          <th>...</th>
          <th>...</th>
          <th>...</th>
          <th>...</th>
          <th>...</th>
          <th>...</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

  </div><!--DIV 2-->
  <div id="cerrarCaja" class="col-md-12 panel panel-success row">
    <div id="datosCaja" class="col-md-12 panel panel-success ">
      <div class="row col-md-5 panel panel-success ">
        <dt   align="center" class="bg-success"> CAJA </dt >
        <table id="Tdatos" class="table table-hover table-responsive">
          <thead>
            <tr>
              <td>Modifico</td>
              <td><input type="text" class="input-sm form-control" id="buscarFolio" placeholder=""></td>
            </tr>
            <tr>
              <td>Cajero</td>
              <td><input type="text" class="input-sm form-control" id="buscarFolio" placeholder=""></td>
            </tr>
            <tr>
              <td>Fecha</td>
              <td><input class="form-control" type="date" value="2011-08-19" id="example-date-input"></td>
            </tr>
            <tr>
              <td>Apertura</td>
              <td><input class="form-control" type="time" value="13:45:00" id="example-time-input"></td>
            </tr>
            <tr>
              <td>Cierre</td>
              <td><input class="form-control" type="time" value="13:45:00" id="example-time-input"></td>
            </tr>
            <tr>
              <td>Turno</td>
              <td><input type="text" class="input-sm form-control" id="buscarFolio" placeholder=""></td>
            </tr>
            <tr>
              <td>Fondo</td>
              <td><input class="form-control" type="number" value="0" id="example-number-input"></td>
            </tr>
            <tr>
              <td>
                <button onclick="cerrarCaja();" class="btn btn-danger" type="button"> Cerrar Caja</button> 
              </td>
              <td>
                <button onclick="imprimir();" class="btn btn-secondary"  type="button">Imprimir</button>
                <button onclick="regresar();" class="btn btn-secondary" type="button"> Regresar</button>
              </td>           
            </tr>

          </thead>
          <tbody>
          </tbody>
        </table>

      </div>
      <div id="datosCaja" class="row col-md-offset-2  col-md-5 panel panel-success">
        <dt   align="center" class="bg-success"> INGRESOS </dt >
        <table id="Tdatos" class="table table-hover table-responsive">
          <thead>
            <tr>
              <td>Efectivo</td>
              <td><font>1000.10</font>
              </td>
            </tr>
            <tr>
              <td>Cheques</td>
              <td><font>0.00</font></td>
            </tr>
            <tr>
              <td>Puntos</td>
              <td><font>0.00</font></td>
            </tr>
            <tr>
              <td>Cortesias</td>
              <td><font>0.00</font></td>
            </tr>
            <tr>
              <td>Tarjetas</td>
              <td><font>0.00</font></td>
            </tr>

          </thead>
          <tbody>
          </tbody>
        </table>
        <dt   align="center" class="bg-success"> TARJETAS </dt >
        <table id="Tdatos" class="table table-hover table-responsive">
          <thead>
            <tr>
              <td>Tarjetas de Credito </td>
              <td><font>1000.10</font>
              </td>
            </tr>
            <tr>
              <td>Tarjetas de Debito </td>
              <td><font>0.00</font></td>
            </tr>
            
          </thead>
          <tbody>
          </tbody>
        </table>
        <dt   align="center" class="bg-success"> TOTALES </dt >
        <table id="Tdatos" class="table table-hover table-responsive">
          <thead>
            <tr>
              <td>Ingresos INCLUYENDO puntos y cortesias</td>
              <td><font>1000.10</font>
              </td>
            </tr>
            <tr>
              <td>Ingresos SIN INCLUIR puntos y cortesias</td>
              <td><font>0.00</font></td>
            </tr>
            <tr>
              <td>Total Gastos</td>
              <td><font>0.00</font></td>
            </tr>
            <tr>
              <td>Ingresos - Gastos</td>
              <td><font>0.00</font></td>
            </tr>
            
          </thead>
          <tbody>
          </tbody>
        </table>

      </div>

      
    </div>
    <div id="cerrarCaja" class="col-md-12 panel panel-success table-responsive">
      <dt   align="center" class="bg-success">  :: DETALLES ::</dt >
      <table id="Tdatos" class="table table-hover ">
      <thead>
        <tr>
          <th id="tablaFolio" onclick="ordenarTabla(1);">Folio</th>
          <th id="tablaHora" onclick="ordenarTabla(2);">Hora</th>
          <th id="tablaCliente" onclick="ordenarTabla(2);">Cliente</th>
          <th id="tablaGenero(duda)" onclick="ordenarTabla(2);">Genero(duda)</th>
          <th id="tablaFormaPago" onclick="ordenarTabla(11);">Forma pago</th>
          <th id="tablaDetalle" onclick="ordenarTabla(11);">Detalle</th>
          <th id="tablaPago" onclick="ordenarTabla(11);">Pago</th>

        </tr>
        <tr>
          <th>001</th>
          <th>00:00</th>
          <th>-</th>
          <th></th>
          <th>Efectvio</th>
          <th>...</th>
          <th>150.00</th>
        </tr>
        <tr>
          <th>002</th>
          <th>00:00</th>
          <th>-</th>
          <th></th>
          <th>Efectvio</th>
          <th>...</th>
          <th>150.00</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>

    
  </div><!--DIV 2-->
  </div>


</div><!--Contenedor-->


</body>
</html>

<script language="javascript">
$("#cerrarCaja").hide();

  function buscar(){
    reporte=$('#buscarStatus').val();
    
    
    if(reporte == 'Todos'){
      $("#cerrarCaja").show();
      $("#Cajas").hide();
    }else{
      $("#cerrarCaja").hide();
      $("#Cajas").show();
    }
  }
 </script>