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
  <title>:: MEDISA - Abrir Caja ::</title>
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
  <dt   align="center" class="bg-success">  :: Abrir Caja ::</dt >
  <div id="clave" class="col-md-offset-4 col-md-5 panel panel-success table-responsive"> 
    <table  align="center" class="table  table-responsive  ">
      <tbody>
        <tr>
          <td></td>
          <td>Usuario</td>
          <td><b>Prueba</b></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td>Fecha</td>
          <td>
              <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
          </td>
          <td></td>
        </tr>


        <tr>
          <td></td>
          <td>Hora</td>
          <td>
            <input class="form-control" type="time" value="13:45:00" id="example-time-input">
          </td>
          <td></td>
        </tr>
      
        <tr>
          <td></td>
          <td>Cajero</td>
          <td>
            <select class="form-control" name="cajero" id="cajero">
              <option value=""></option>
              <option value="AUXILIAR">AUXILIAR DE MOSTRADOR</option>
              <option value="">Prueba</option>
            </select>
          </td>
          <td></td>
        </tr> 
        <tr>
          <td></td>
          <td>Turno</td>
          <td>
            <select class="form-control" name="turno" id="turno">
              <option selected="" value=""></option>
              <option value="M">Matutino</option>
              <option value="V">Vespertino</option>
              <option value="N">Nocturno</option>
            </select>
          </td>
            <td></td>
        </tr>
        <tr>
          <td></td>
          <td>Fondo</td>
          <td> <input class="form-control" type="number" value="0" id="example-number-input">
          </td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

  <button onclick="guardar();" class="btn btn-info center-block " type="button">
    <span class="glyphicon glyphicon-floppy-save"></span> Guardar</button>
       


</div><!--Contenedor-->
  <p align="center">
     <img src="imagenes/loguito_medisa.jpg">
  </p>

</body>
</html>