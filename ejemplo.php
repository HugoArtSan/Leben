<?php
session_save_path("sessiones");
session_start();
   include "database.lib.php";
   include "objetos.lib.php";
   include "libreria.lib.php";

?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>::MEDISA - Niveles de Seguridad::</title>

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


<div id="menu"  class="navbar col-md-12 ">   
<nav class="navbar navbar-responsive navbar-default navbar-fixed-top" role="navigation">

  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header container col-md-1 ">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
    </button>
    <a class="navbar-brand" href="#">Logotipo</a>
  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->

  <div class="navbar-header container col-md-11 ">
    <ul class="nav navbar-nav">

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Administracion <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
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
          <li class="dropdown-submenu">
                    <a href="#" >More options</a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Second level link</a></li>
                      <li><a href="#">Second level link</a></li>
                    </ul>
                  </li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Inventarios <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="almacenes.php">Almacenes</a></li>
                  <li><a href="lineasAlmacen.php">Lineas</a></li>
                  <li><a href="entradasDiversas.php">Entradas diversas</a></li>
                  <li><a href="salidasDiversas.php">Salidas diversas</a></li>
                  <li><a href="compras.php">Compras</a></li>
                  <li><a href="productos.php">Productos</a></li>
                  <li><a href="proveedores.php">Proveedores</a></li>
                  <li><a href="formulas.php">Formulas</a></li>
                  <li><a href="traspasos">Traspasos</a></li>
                  <li><a href="tomaFisica.php">Toma fisica</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Reportes</a></li>
                  <li><a href="existencias.php">Existencias</a></li>
        </ul>


      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Reservaciones <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="reservaciones.php">Reservaciones</a></li>
          <li><a href="mapaPersonal.php">Mapa de disponibilidad de personal</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Punto de Venta <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><a>Cajas</a></li>
            <li><a href="abrirCaja.php">Abrir caja</a></li>
            <li><a href="cerrarCaja.php">Cerrar caja</a></li>
            <li><a href="consultarCaja.php">Consultar caja</a></li>
            <li><a href="egresosCaja.php">Egresos de caja</a></li>
            <li class="divider"></li>
            <li><a href="cobrar.php">Cobrar</a></li>
            <li><a href="cancelaciones.php">Cancelaciones</a></li>
            <li class="divider"></li>
            <li><a>Reportes</a></li>
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
      </li>


      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Cobranza <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="pagos.php">Pagos</a></li>
          <li><a href="saldos.php">Saldos</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Seguridad <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="niveles_seguridad.php">Niveles de seguridad</a></li>
          <li><a href="usuarios.php">Usuarios</a></li>
        </ul>
      </li>

    </ul>

 
    <ul class="nav navbar-nav navbar-right">
      <li><a href="cerrar.php"">Salir </a></li>

    </ul>
  </div>


</nav>

</div><!--Menu-->



</body>
</html>