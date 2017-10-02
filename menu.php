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