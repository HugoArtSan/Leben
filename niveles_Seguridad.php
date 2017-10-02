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

     echo interfazBar($con,"");
     pg_close($con);


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







<div class="container col-md-12   "> 
<dt   align="center" class="bg-success">  :: Niveles de seguridad ::</dt >
  <div id="clave" class="col-md-3 table-responsive "> 
    <div class="container col-md-12 panel panel-success bg-success">
      <table id="Tnivel" class="table table-hover table-inverse table-responsive">
        <thead>
          <tr >
            <th>Eliminar </th>
            <th>Clave</th>
            <th>Nombre</th>
            
          </tr>
        </thead>

        <tbody>
        </tbody>

      </table>
    </div><!--Div niveles-->

    <dt  align="center"  class="bg-success">Agregar Niveles</dt >

    <div id="agregarNivel" class="col-md-12 panel panel-success">
      <div class="col-md-12">
        <div class="col-md-4 ">
          <h5>Codigo</h5>
        </div>
        <div class="col-xs-6">
          <input id="codigoNivel" type="text" class="input-sm container form-control" maxlength="3" placeholder="">
        </div>
      </div>
      <div class="col-md-12">
        <div class="col-md-4 ">
          <h5>Descripcion</h5>
        </div>
        <div class="col-xs-8">
          <input id="NivelDescripcion" type="text" class="input-sm container form-control" maxlength="15" placeholder="">
        </div>
      </div>
      <div align="center">
        <button  id="crearNivel" onclick="nuevoNivel();" class="btn btn-success" type="button">
        <span class="glyphicon glyphicon-plus"></span> Crear</button>
      </div>
    </div><!--Div de agregar nivel-->
    
  </div><!--Div barra izq-->
  <div id="datosNiveles" class="col-md-9 panel panel-success table-responsive"> 
    <div class="container col-md-12 panel panel-success ">
        <dt align="center">Nivel de seguridad </dt >
        <div align="center" class=" col-md-offset-3 col-md-9">       
          <div class="col-xs-2">
            <p>Clave</p>
            <input id="ClaveT" type="text" class="input-sm container form-control" maxlength="3" id="codigoNivel" placeholder="">
          </div>

          <div class="col-xs-4">
            <p>Descripcion</p>
            <input id="descripcion" type="text" class="input-sm container form-control" maxlength="15" id="codigoNivel" placeholder="">
          </div>

          <div class="col-xs-3">
            <p>Modifico</p>
            <input id="Modifico" type="text" class="input-sm container form-control" maxlength="15" id="codigoNivel" placeholder="" value= "">
          </div>
        </div><!-- Clave, descripcion nivel de 
        seguridad-->
        </div> <!--DIV datos niveles-->

        <dt align="center">PERMISOS DE NIVEL</dt >
        <div class="container col-md-12">
          <p>Seleccione los niveles de permisos que desea en el perfil</p>
          <form>
          <dt>Administracion</dt>
          
            <div class="checkbox bg-info">
              <label><input id="permiso1" type="checkbox" value="ConfiguracionGeneral">Configuracion General</label>
            </div>

            <div class="checkbox">
              <label><input id="permiso2" type="checkbox" value="DatosEmpresa">Datos de la Empresa</label>
            </div>

            <div class="checkbox bg-info">
              <label><input id="permiso3" type="checkbox" value="Aparatos">Aparatos</label>
            </div>

            <div class="checkbox">
              <label><input id="permiso4" type="checkbox" value="Cabinas" >Cabinas</label>
            </div>

            <div class="checkbox bg-info">
              <label><input id="permiso5" type="checkbox" value="Clientes">Clientes</label>
            </div>

            <div class="checkbox">
              <label><input id="permiso6" type="checkbox" value="Especialidades">Especialidades</label>
            </div>

            <div class="checkbox bg-info">
              <label><input id="permiso7" type="checkbox" value="Grupos" >Grupos</label>
            </div>

            <div class="checkbox">
              <label><input id="permiso8" type="checkbox" value="HorariosInactividad" >Horarios de Inactividad</label>
            </div>

            <div class="checkbox bg-info">
              <label><input id="permiso9" type="checkbox" value="Impresoras">Impresoras</label>
            </div>

            <div class="checkbox">
              <label><input id="permiso10" type="checkbox" value="Impuestos">Impuestos</label>
            </div>

            <div class="checkbox bg-info">
              <label><input id="permiso11" type="checkbox" value="Paquetes" >Paquetes</label>
            </div>

            <div class="checkbox">
              <label><input id="permiso12" type="checkbox" value="Personal" >Personal</label>
            </div>

            <div class="checkbox bg-info">
              <label><input id="permiso13" type="checkbox" value="Servicios" >Servicios</label>
            </div>

            <div class="checkbox">
              <label><input id="permiso14" type="checkbox" value="Tarjetas" >Tarjetas</label>
            </div>

            <dt>Inventarios</dt>

            <div class="checkbox bg-info">
              <label><input id="permiso15" type="checkbox" value="Almacenes" >Almacenes</label>
            </div>

            <div class="checkbox">
              <label><input id="permiso16" type="checkbox" value="Familias" >Familias</label>
            </div>

            <div class="checkbox bg-info">
              <label><input id="permiso17" type="checkbox" value="Lineas" >Lineas</label>
            </div>

            <div class="checkbox">
              <label><input id="permiso18" type="checkbox" value="Productos" >Productos</label>
            </div>

            <div class="checkbox bg-info">
              <label><input id="permiso19" type="checkbox" value="EntradasSalidas" >Entradas y Salidas diversas</label>
            </div>

            <div class="checkbox">
              <label><input id="permiso20" type="checkbox" value="Kits" >Kits</label>
            </div>

            <div class="checkbox bg-info">
              <label><input id="permiso21" type="checkbox" value="Compras" >Compras</label>
            </div>

            <div class="checkbox">
              <label><input id="permiso22" type="checkbox" value="Proveedores" >Proveedores</label>
            </div>

            <div class="checkbox bg-info">
              <label><input id="permiso23" type="checkbox" value="Traspasos" >Traspasos</label>
            </div>
            <div class="checkbox">
              <label><input id="permiso24" type="checkbox" value="Tomafisica" >Toma fisica</label>
            </div>
            <div class="checkbox bg-info">
              <label><input id="permiso25" type="checkbox" value="boxReporteInventarios" >Reportes de inventarios</label>
            </div>

            <dt>Reservaciones</dt>

            <div class="checkbox bg-info">
              <label><input id="permiso26" type="checkbox" value="Reservaciones" >Reservaciones</label>
            </div>

            <div class="checkbox ">
              <label><input id="permiso27" type="checkbox" value="MapaCitas" >Ver mapa de citas</label>
            </div>

            <dt>Punto de venta</dt>

            <div class="checkbox bg-info">
              <label><input id="permiso28" type="checkbox" value="CobranzaVenta" >Cobranza y venta</label>
            </div>

            <div class="checkbox ">
              <label><input id="permiso29" type="checkbox" value="Cancelaciones" >Cancelaciones</label>
            </div>

            <div class="checkbox bg-info">
              <label><input id="permiso30" type="checkbox" value="Facturacion" >Facturacion</label>
            </div>

            <div class="checkbox ">
              <label><input id="permiso31" type="checkbox" value="MovimientosCaja" >Movimientos de caja</label>
            </div>

            <div class="checkbox bg-info">
              <label><input id="permiso32" type="checkbox" value="ReportesVentas" >Reportes de ventas</label>
            </div>


            <div class="checkbox ">
              <label><input id="permiso33" type="checkbox" value="Provisionamiento" >Provisionamiento</label>
            </div>

            <dt>Cobranza</dt>

            <div class="checkbox bg-info">
              <label><input id="permiso34" type="checkbox" value="Pagos" >Pagos</label>
            </div>

            <div class="checkbox ">
              <label><input id="permiso35" type="checkbox" value="Saldos" >Saldos</label>
            </div>

            <dt>Seguridad</dt>


            <div class="checkbox bg-info">
              <label><input id="permiso36" type="checkbox" value="NivelesSeguridad" >Niveles seguridad</label>
            </div>

            <div class="checkbox ">
              <label><input id="permiso37" type="checkbox" value="Usuarios" >Usuarios</label>
            </div>

            <div class="checkbox bg-info">
              <label><input id="permiso38" type="checkbox" value="Respaldos" >Respaldos</label>
            </div>

          </form>
          <div align="center">
            <button  id="guardarNivel" onclick="guardarNivel();" class="btn btn-success" type="button">
            <span class="glyphicon glyphicon-floppy-save""></span> Guardar</button>
          </div>

        </div> <!--Div checkbox-->
        
      </div><!--Div niveles-->

</div> <!--DIV 2-->


</body>
</html>
<script language="php">
$usuarioActivo=obten("login_usuario");
//echo"<script language=javascript>  alert ('$usuarioActivo')   </script>"

</script>


<script language="javascript">

  

function guardarNivel(){
  //Guarda el contenido del nivel
  variable="permiso"+1;
  num=1;
  nivel="";

  respaldo="";
  while(num<=38){
    var boxRespaldos=document.getElementById(variable).checked;
    if(boxRespaldos==true){
      respaldo=document.getElementById(variable).value;
      nivel=nivel+respaldo+"|";
    }
    num=num+1;
    variable="permiso"+num;
  }
  //alert(nivel);

  clave=clavemaestra;
  nombre=$('#descripcion').val();
  clave3=$('#ClaveT').val();
  permisos=nivel;

  accion=5;
  if(clave=='' || nombre==''){
    alert("Seleccione un Nivel de Seguridad");
  }else{
    $.get('traiteNivel.php', {'accion': accion, 'clave': clave,'nombre': nombre , 'permisos':permisos, 'clave3':clave3},  function(data, status, request){
      data.datos.forEach(function(reg) {
      });
    });
    alert("Registro Modificado");
    modificarNivel(clavemaestra);
   }

  
}

function nuevoNivel(){
  clave=$('#codigoNivel').val();
  nombre=$('#NivelDescripcion').val();
  permisos="";
  accion=3;
  $('#codigoNivel').val("");
  $('#NivelDescripcion').val("");

  if(clave==''){
    alert("Ingrese datos de nuevo nivel de seguridad");
  }else if(nombre==''){
    alert("Ingrese datos de nuevo nivel de seguridad");
  }else{
    $.get('traiteNivel.php', {'accion': accion, 'clave': clave,'nombre': nombre , 'permisos':permisos},  function(data, status, request){
    data.datos.forEach(function(reg) {
       comprobar=reg.prueba;
       if(comprobar==null){
        alert("Nivel de seguridad creado");
      }else if(comprobar==false){
        alert("Ya existe un nivel con el mismo Codigo");
      }
    });
    });
    
    mostrarNivel();

  }
}


var accion=0;
var clave=0;
var nombre='';
var permisos='';
function mostrarNivel() { //Muestra los perfiles de niveles
  accion=1;
  clave=0;
  $("#Tnivel > tbody").empty();

  $.get('traiteNivel.php', {'accion': accion, 'clave': clave},  function(data, status, request){
    data.datos.forEach(function(reg) {

      id=reg.id;
      Clave=reg.clave;
      Nombre=reg.nombre;
      cuant=ren.cuantos;
      mostrarDatos(id, Clave, Nombre, cuant);

    });
  });

}
var ren=0;
mostrarNivel();

function mostrarDatos(id, Clave, Nombre, cuant){
  ren++;
  temp='<tr class="table-responsive">'+
       '<td ><button id="b'+id+'" onclick="eliminarNivel('+id+', \'Clave\');" class="btn btn-danger glyphicon glyphicon-remove-sign" type="button"></button></td>'+
       '<td onclick="modificarNivel('+id+');" >'+Clave+'</td>'+
       '<td onclick="modificarNivel('+id+');" >'+Nombre+'</td>'+
       '<td id="numeroCuantos" style="display:none;">'+cuant+'</td>'+
       '</td>';
  $("#Tnivel > Tbody").append(temp);
  
}
var clavemaestra;
function modificarNivel(id){ //Muestra los detalles de un perfil de seguridad
  clave=id;
  accion=2;

  $.get('traiteNivel.php', {'accion': accion, 'clave': clave},  function(data, status, request){
    data.datos.forEach(function(reg) {
      permisos=reg.permisos;
      clave2=reg.clave;
      nombre=reg.nombre;
      modifico=reg.modifico;
      marcarPermisos(permisos, clave2, nombre, modifico);
      clavemaestra=id;
 

    });
  });
}

function marcarPermisos(permisos, clave2, nombre, modifico){
  $("#ClaveT").val(clave2);
  $("#descripcion").val(nombre);
  $("#Modifico").val(modifico);
  separar="|";
  arreglo=permisos.split(separar);

  limpiar();
  variable="permiso"+1;
  num=1;
  while(num<=38){
    contador=0;
    valido=1;   
    respaldo=document.getElementById(variable).value;
    while(valido<=38){
      validar=arreglo[contador];  
      if(validar==respaldo){
        document.getElementById(variable).checked = true;
       }
      contador=contador+1;
      valido=valido+1;
    }
  num=num+1;
  variable="permiso"+num;
  }
}

function eliminarNivel(id){
  accion=4;
  clave=id;

  $.get('traiteNivel.php', {'accion': accion, 'clave': clave,'nombre': nombre, 'permisos':permisos},  function(data, status, request){
    data.datos.forEach(function(reg) {
      prueba=reg.prueba;
      if(prueba==null){
        alert("Registro Eliminado");
        $("#ClaveT").val("");
        $("#descripcion").val("");
        $("#Modifico").val("");
        $('#NivelDescripcion').val("");
      }else if(prueba==false){
        alert("No se pueden eliminar Niveles de Seguridad que esten asignados a Usuarios");
      }
    });
  });
  mostrarNivel();
}

function limpiar(){
  variable="permiso"+1;
  num=1
  while(num<=38){
    document.getElementById(variable).checked = false;     
    num=num+1;
    variable="permiso"+num;
  }
}


</script> 
