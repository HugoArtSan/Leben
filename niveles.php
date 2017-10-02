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
  <title>:: MEDISA - Bitacora ::</title>
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


   
<div class="container col-md-12 panel panel-danger panel-responsive  ">
 
<div id="menu"  class="container col-md-12 btn-group panel panel-danger panel-responsive  ">    

        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" id="menuAdministracion"
                    data-toggle="dropdown">
              Administracion<span class="caret"></span>
            </button>

            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Aparatos</a></li>
              <li><a href="#">Cabinas</a></li>
              <li><a href="#">Clientes</a></li>
              <li><a href="#">Configuracion General</a></li>
              <li><a href="#">Datos de la empresa</a></li>
              <li><a href="#">Especialidades</a></li>
              <li><a href="#">Lineas</a></li>
              <li><a href="#">Impuestos</a></li>
              <li><a href="#">Paquetes</a></li>
              <li><a href="#">Personal</a></li>
              <li><a href="#">Servicios</a></li>

            </ul>
        </div>

        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" id="menuInventarios"
                    data-toggle="dropdown" aria-expanded="false">
              Inventarios<span class="caret"></span>
            </button>


            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                <li><a href="#">Almacenes</a></li>
                <li><a href="#">Lineas</a></li>
                <li><a href="#">Entradas diversas</a></li>
                <li><a href="#">Salidas diversas</a></li>
                <li><a href="#">Compras</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="#">Proveedores</a></li>
                <li><a href="#">Formulas</a></li>
                <li><a href="#">Traspasos</a></li>
                <li><a href="#">Toma fisica</a></li>

                <li class=" dropdown-submenu ">
                  <a  tabindex="-1" href="#">Reportes</a>
                  <ul class= "dropdown-menu ">
                    <li><a href="#">Existencias</a></li>
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
              <li><a href="#">Reservaciones</a></li>
              <li><a href="#">Mapa de disponibilidad de personal</a></li>
            </ul>
        </div>

        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" id="menuPuntoVenta"
                    data-toggle="dropdown">
              Punto de Venta<span class="caret"></span>
            </button>

            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Cajas</a></li>
              <li class="divider"></li>
              <li><a href="#">Abrir caja</a></li>
              <li><a href="#">Cerrar caja</a></li>
              <li><a href="#">Consultar caja</a></li>
              <li><a href="#">Egresos de caja</a></li>
              <li class="divider"></li>
              
              <li><a href="#">Cobrar</a></li>
              <li><a href="#">Cancelaciones</a></li>
              <li><a href="#">Reportes</a></li>
              <li class="divider"></li>
              <li><a href="#">Puntos de clientes</a></li>
              <li><a href="#">Paquetes y Servicios Vendidos</a></li>
              <li><a href="#">Pagos Realizados</a></li>
              <li><a href="#">Ventas</a></li>
              <li><a href="#">Ventas por especialista</a></li>
              <li><a href="#">Ventas Detallado</a></li>
              <li><a href="#">Ventas Compacto</a></li>
              <li><a href="#">Reumen Paquetes</a></li>
              <li><a href="#">Ventas Productos</a></li>
            </ul>
        </div>

        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" id="menuCobranza"
                    data-toggle="dropdown">
              Cobranza<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Pagos</a></li>
              <li><a href="#">Saldos</a></li>
            </ul>
        </div>     

        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" id="menuSeguridad"
                    data-toggle="dropdown">
              Seguridad<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="">Niveles de seguridad</a></li>
              <li><a href="usuarios.php">Usuarios</a></li>
            </ul>
        </div>
        <div id="salir" class="c col-md-2 ">
            <button  id="butt_cerrar" onclick="cerrar();"  class="btn btn-danger" type="button">
            <span class="glyphicon glyphicon-log-out"></span> Salir</button>
        </div>

             

</div>
<div id="buscarUsuario" class="col-md-2 panel panel-success ">      
  <p>Usuario</p>
  <p align="center">
  <input type="text" class="form-control" id="buscarNombre" splaceholder="Buscar Usuario">

  <p>Nombre</p>
  <p align="center">
  <input type="text" class="form-control" id="buscarUsuario" placeholder="BuscarLugar">

   
  <button id="butt_buscar" onclick="buscar();" class="btn btn-info" type="button">
  <span class="glyphicon glyphicon-search"></span> Buscar</button>
</p>
</div>

  


  <div id="Tabulador" class="col-md-10 panel panel-info ">
  
    <ul class="pager">
    <div id="222" class=" col-md-offset-1  col-md-3   ">
      <li onclick="tabulador(0);"><a>&laquo;</a></li>
      <li onclick="tabulador(1);"><a>&lt;</a></li>
      <li onclick="tabulador(2);"><a>&gt;</a></li>
      <li onclick="tabulador(3);"><a>&raquo;</a></li>
    </div>
    <div id="333" class="col-md-4 ">
      <button  id="butt_nuevo" onclick="nuevoUsuario();" class="btn btn-success" type="button">
      <span class="glyphicon glyphicon-plus-sign"></span> Nuevo</button>
      <button id="butt_imprimir" onclick="imprimir();" class="btn btn-success" type="button">
      <span class="glyphicon glyphicon-print"></span> Imprimir</button>
      <button id="butt_excel" onclick="excel();" class="btn btn-success" type="button">
      <span class="glyphicon glyphicon-th"></span> Excel</button>
    </div>

    </ul>

    <div id="datostabla" class="col-md-12 panel panel-info table-responsive ">
    <table id="Tdatos" class="table table-hover ">
      <thead>
        <tr>
          <th>Eliminar</th>
          <th id="tablaNombre" onclick="ordenarTabla(1);">Usuario</th>
          <th id="tablaEmail" onclick="ordenarTabla(2);">Nombre</th>
          <th id="tablaAsunto" onclick="ordenarTabla(3);">Nivel</th>
          <th id="tablaAsunto" onclick="ordenarTabla(11);">Modifico</th>
         <!-- <th style="visibility:hidden;">Cuantos </th>-->
        </tr>
      </thead>

      <tbody>
      </tbody>

    </table>
    </div>
  </div>

  <div id="nuevoUsuario" class="container col-md-12 panel panel-warning panel-responsive ">
  <div class="col-md-8 col-md-offset-2 panel panel-info dropdown">
    <table class="table table-hover ">

      <th>Formulario</th>
      <tbody>
        <tr>
          <tr>
            <td>Login</td>
            <td>
              <input type="text" class="form-control" id="newLogin" placeholder="">
            </td>
          </tr>
          <td>Nombre</td>
          <td>
            <input type="text" class="form-control" id="newNombre" placeholder="">
          </td>
        </tr>
        
        <tr>
          <td>Contraseña</td>
          <td>
            <input type="password" class="form-control" id="contraseña" placeholder="">
          </td>
        </tr>
        <tr>
          <td>Confirmar</td>
          <td>
            <input type="password" class="form-control" id="confirmar" placeholder="">
          </td>
        </tr>

         <tr>
          <td>Nivel de Seguridad</td>
          <td>
            <select class="form-control " id="newEstado" >
              <option>Pendiente</option>
              <option>Listo</option>
              <option>Recado</option>
              <option>Trabajando</option>
            </select>
          
          </td>
        </tr>
         <tr>
          <td>Observaciones</td>
          <td>
            <input type="text" class="form-control" id="Observaciones" placeholder="Supervisor">
          </td>
        </tr>
        

      </tbody>
    </table>
    <p align="center">
      <button id="botonNuevo" onclick="agrega();" class="btn btn-success"  type="button">
      <span class="glyphicon glyphicon-floppy-save"></span> Guardar</button>

      <button id="botonModificar" onclick="modificardat();" class="btn btn-success"  type="button">
      <span class="glyphicon glyphicon-floppy-save"></span> Guardar Cambio</button>


      <button onclick="regresarUsuarios();" class="btn btn-success" type="button">
      <span class="glyphicon glyphicon-share-alt"></span> Regresar</button>
     </p>


  </div>


</div>

</div>





</body>
</html>


<script language="javascript">

function regresar(){
    location.href="principal.php";
}
$("#nuevoUsuario").hide();

function nuevoUsuario(){
  $("#nuevoUsuario").show();
  $("#usuario").hide();
  $("#buscarUsuario").hide();
  $("#Tabulador").hide();
  
  $("#botonNuevo").show();
  $("#newNombre").val("");
  $("#newDireccion").val("");
  $("#newEmail").val("");
  $("#newAsunto").val("");
  $("#newEstado").val("Pendiente");
  $("#newSupervisor").val("");
  $("#newBitacora").val("");
}

function modificar(){


};

function regresarUsuarios(){
  $("#nuevoUsuario").hide();
  $("#usuario").show();
  $("#buscarUsuario").show();
  $("#Tabulador").show();
  buscar();

}

</script>
