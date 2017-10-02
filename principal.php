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
  <title>::MEDISA - Principal ::</title>

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

<div id="div1" class="container col-md-12 panel panel-danger panel-responsive  ">
 <dt align="center" class="bg-success">:: Principal::</dt >
  <!-- seccion de bitacola
<div class="col-md-2 panel panel-success ">     

  <p>Nombre</p>
  <p align="center">
  <input type="text" class="input-sm form-control" id="BuscarNombre" placeholder="BuscarNombre">

  <p>Lugar</p>
  <p align="center">
  <input type="text" class="input-sm form-control" id="BuscarLugar" placeholder="BuscarLugar">
  <p>Estado</p>
  <select class="input-sm form-control " id="BuscarEstado" >
    <option></option>
      <option>Pendiente</option>
      <option>Listo</option>
      <option>Recado</option>
      <option>Trabajando</option>
    </select>


  <button id="butt_buscar" onclick="buscar(1);" class="btn btn-info center-block" type="button">
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
      <button  id="butt_nuevo" onclick="nuevo();" class="btn btn-success" type="button">
      <span class="glyphicon glyphicon-plus-sign"></span> Nuevo</button>
      <button id="butt_imprimir" onclick="imprimir();" class="btn btn-success" type="button">
      <span class="glyphicon glyphicon-print"></span> Imprimir</button>
      <button id="butt_excel" onclick="excel();" class="btn btn-success" type="button">
      <span class="glyphicon glyphicon-th"></span> Excel</button>
    </div>
    
    </ul>

    <div id="datostabla" class="col-md-12 panel panel-info table-responsive ">
    <table id="Tdatos" class="table table-hover table-responsive ">
      <thead>
        <tr>
          <th>Eliminar</th>
          <th id="tablaFecha" onclick="ordenarTabla(11);">Fecha</th>
          <th id="tablaNombre" onclick="ordenarTabla(1);">Nombre</th>
          <th id="tablaDireccion" onclick="ordenarTabla(2);">Lugar</th>
          <th id="tablaEmail" onclick="ordenarTabla(3);">Contacto</th>
          <th id="tablaAsunto">Asunto</th>
          <th id="tablaEstado" onclick="ordenarTabla(12);">Estado</th>
          <th id="tablaSupervisor" onclick="ordenarTabla(13);">Supervisor</th>
          <th id="tablaBitacola">Bitacola</th>
         <th style="visibility:hidden;"> <-- OCULTAR Cuantos </th>
        </tr>
      </thead>

      <tbody>
      </tbody>

    </table>
    </div>
  </div>

</div>

<div id="div2" class="container col-md-12 panel panel-warning panel-responsive ">
  <div class="col-md-8 col-md-offset-2 panel panel-info dropdown">
    <table class="table table-hover ">

      <th>Formulario</th>
      <tbody>
        <tr>
          <td>Nombre</td>
          <td>
            <input type="text" class="form-control" id="newNombre" placeholder="Nombre">
          </td>
        </tr>
        <tr>
          <td>Lugar</td>
          <td>
            <input type="text" class="form-control" id="newDireccion" placeholder="Direccion">
          </td>
        </tr>
        <tr>
          <td>Contacto</td>
          <td>
            <input type="text" class="form-control" id="newEmail" placeholder="Contacto">
          </td>
        </tr>
         <tr>
          <td>Asunto</td>
          <td>
            <input type="text" class="form-control" id="newAsunto" placeholder="Asunto">
          </td>
        </tr>
         <tr>
          <td>Estado</td>
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
          <td>Supervisor</td>
          <td>
            <input type="text" class="form-control" id="newSupervisor" placeholder="Supervisor">
          </td>
        </tr>
        <tr>
          <td>Bitacora</td>
          <td>
            <input type="text" class="form-control" id="newBitacora" placeholder="Bitacora">
          </td>
        </tr>



      </tbody>
    </table>
    <p align="center">
      <button id="botonNuevo" onclick="agrega();" class="btn btn-success"  type="button">
      <span class="glyphicon glyphicon-floppy-save"></span> Guardar</button>

      <button id="botonModificar" onclick="modificardat();" class="btn btn-success"  type="button">
      <span class="glyphicon glyphicon-floppy-save"></span> Guardar Cambio</button>


      <button onclick="regresar();" class="btn btn-success" type="button">
      <span class="glyphicon glyphicon-share-alt"></span> Regresar</button>
     </p>


  </div>


</div>
-->

  <p align="center">
     <img src="imagenes/loguito_medisa.jpg">
  </p>

</body>

</html>


<script language="javascript">

var ren=0;
var eli;

$("#div2").hide();
$("#cuantos").hide();
$("#inicio").hide();

$("#tablaCuantos").hide();
buscar();

function nuevo(){
  $("#div2").show();
  $("#div1").hide();
  $("#botonModificar").hide();
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
  $("#botonNuevo").hide();
  $("#botonModificar").show();
  $("#div2").show();
  $("#div1").hide();
  $("#newNombre").val("");
  $("#newDireccion").val("");
  $("#newEmail").val("");
  $("#newAsunto").val("");
  $("#newEstado").val("");
  $("#newSupervisor").val("");
  $("#newBitacora").val("");

};
function regresar(){
  $("#div2").hide();
  $("#div1").show();
  $("#cuantos").hide();
  $("#inicio").hide();

  $("#tablaCuantos").hide();
  buscar();

}

function buscar() {

  $('#BuscarNombre').focus();
  buscaraNombre=$('#BuscarNombre').val();
  buscaraLugar=$('#BuscarLugar').val();
  buscaraEstado=$('#BuscarEstado').val();
  
  nom="nombre";
  dir="direccion";
  ema="email";
  fecha="fecha";
  asunto="asunto";
  estado="estado";
  supervisor="supervisor";
  bitacora="bitacora";
  $("#Tdatos > tbody").empty();

  $.get('traiteAlgo.php?', {'buscaraNombre': buscaraNombre, 'buscaraLugar': buscaraLugar, 'buscaraEstado': buscaraEstado}, function(data, status, request){
 // $.get('traiteAlgo.php?buscara='+buscara, function(data, status, request){
    data.datos.forEach(function(reg) {
      nom=reg.nombre;
      dir=reg.direccion;
      ema=reg.email;
      idPer=reg.idpersonal;
      cuant=reg.cuantos;
      fecha=reg.fecha;
      asunto=reg.asunto;
      estado=reg.estado;
      supervisor=reg.supervisor;
      bitacora=reg.bitacora;

      mostrarDatos(nom, dir, ema, idPer, cuant, fecha, asunto, estado, supervisor, bitacora);

    });
  });

}

var sentidoOrden =0;
var ordenIDTabla =0;
var ordenDeTabla =1;
function ordenarTabla(ordenarPor) {
  ordenDeTabla=ordenarPor;
 // alert(ordenDeTabla);
  if(sentidoOrden>=2){
    sentidoOrden=0;      
  } 

  sentidoOrden ++;
    if(sentidoOrden>1){
    ordenDeTabla=ordenDeTabla+3;
  //alert(ordenDeTabla);
  }
   
  rango=0;
  $("#Tdatos > tbody").empty();
  $.get('ordenaAlgo.php',  {'ordenDeTabla': ordenDeTabla, 'rango': rango}, function(data, status, request){
    data.datos.forEach(function(reg) {
      nom=reg.nombre;
      dir=reg.direccion;
      ema=reg.email;
      idPer=reg.idpersonal;
      cuant=reg.cuantos;
      fecha=reg.fecha;
      asunto=reg.asunto;
      estado=reg.estado;
      supervisor=reg.supervisor;
      bitacora=reg.bitacora;
      mostrarDatos(nom, dir, ema, idPer, cuant, fecha, asunto, estado, supervisor, bitacora);

    });
  });


  ordenIDTabla=1;
  
 

}

function mostrarDatos(nom, dir, ema, idPer, cuant, fecha, asunto, estado, supervisor, bitacora){
  ren++;
  if(estado == 'Listo'){
    temp='<tr onclick="butt_modificar('+idPer+');" class="bg-success  ">'+
        '<td ><button id="b'+idPer+'" onclick="butt_eliminar('+idPer+', \'nom\');" class="btn btn-danger glyphicon glyphicon-remove-sign" type="button"></button></td>'+
        '<td>'+fecha+'</td>'+
        '<td>'+nom+'</td>'+
        '<td>'+dir+'</td>'+
        '<td>'+ema+'</td>'+
        '<td>'+asunto+'</td>'+
        '<td >'+estado+'</td>'+
        '<td>'+supervisor+'</td>'+
        '<td>'+bitacora+'</td>'+
        '<td id="numeroCuantos" style="display:none;">'+cuant+'</td>'+
        '</td>';

  $("#Tdatos > Tbody").append(temp);
} else if(estado == 'Trabajando'){
    temp='<tr onclick="butt_modificar('+idPer+');" class="bg-danger ">'+
        '<td ><button id="b'+idPer+'" onclick="butt_eliminar('+idPer+', \'nom\');" class="btn btn-danger glyphicon glyphicon-remove-sign" type="button"></button></td>'+
        '<td>'+fecha+'</td>'+
        '<td >'+nom+'</td>'+
        '<td>'+dir+'</td>'+
        '<td>'+ema+'</td>'+
        '<td>'+asunto+'</td>'+
        '<td>'+estado+'</td>'+
        '<td>'+supervisor+'</td>'+
        '<td>'+bitacora+'</td>'+
        '<td id="numeroCuantos" style="display:none;">'+cuant+'</td>'+
        '</td>';
  $("#Tdatos > Tbody").append(temp);


} else if(estado == 'Recado'){
  temp='<tr onclick="butt_modificar('+idPer+');" >'+
        '<td ><button id="b'+idPer+'" onclick="butt_eliminar('+idPer+', \'nom\');" class="btn btn-danger glyphicon glyphicon-remove-sign" type="button"></button></td>'+
        '<td>'+fecha+'</td>'+
        '<td >'+nom+'</td>'+
        '<td>'+dir+'</td>'+
        '<td>'+ema+'</td>'+
        '<td>'+asunto+'</td>'+
        '<td>'+estado+'</td>'+
        '<td>'+supervisor+'</td>'+
        '<td>'+bitacora+'</td>'+
        '<td id="numeroCuantos" style="display:none;">'+cuant+'</td>'+
        '</td>';
  $("#Tdatos > Tbody").append(temp);
//btn-danger glyphicon glyphicon-remove-sign" type="button">'AQUI SE VE NOM+idPer+'</button></td>'+

}else{
  temp='<tr onclick="butt_modificar('+idPer+');" class="bg-warning"  >'+
        '<td ><button id="b'+idPer+'" onclick="butt_eliminar('+idPer+', \'nom\');" class="btn btn-danger glyphicon glyphicon-remove-sign" type="button"></button></td>'+
        '<td>'+fecha+'</td>'+
        '<td >'+nom+'</td>'+
        '<td>'+dir+'</td>'+
        '<td>'+ema+'</td>'+
        '<td>'+asunto+'</td>'+
        '<td>'+estado+'</td>'+
        '<td>'+supervisor+'</td>'+
        '<td>'+bitacora+'</td>'+
        '<td id="numeroCuantos" style="display:none;">'+cuant+'</td>'+
        '</td>';
  $("#Tdatos > Tbody").append(temp);

}

  
}




function agrega(){
  
  $("#botonNuevo").hide();
  nombre=$('#newNombre').val();
  direccion=$('#newDireccion').val();
  email=$('#newEmail').val();
  asunto=$('#newAsunto').val();
  estado=$('#newEstado').val();
  supervisor=$('#newSupervisor').val();
  bitacora=$('#newBitacora').val();
  if(nombre == '' && direccion == ''){
    alert("Insertar Nombre o Lugar");
    $("#botonNuevo").show();
  }else if(asunto==''){
    alert("Insertar Asunto");
    $("#botonNuevo").show();
  }else{
  
  
  data = {nombre: nombre, direccion: direccion, email: email, asunto: asunto, estado: estado, supervisor: supervisor, bitacora: bitacora}


  var data = JSON.stringify(data);
     $.ajax({
         url: 'guardaDato.php',
         type: 'POST',
         data: data,
         headers: {'Content-Type': 'application/x-www-form-urlencoded'},
         success: function(data) {
        //alert($.trim(data))
        if($.trim(data)=='"OK"'){
           alert("Dato Guardado");
           regresar();

        }else{
           alert("Ocurrio un error");
           $("#botonNuevo").show();
        }
        
         }
     });
     }

}

function butt_eliminar(ren){
  var vaido = false;
  var valido = confirm("Se borrara este campo");
  if(valido == true){
    alert("El campo se ha borrado");
    eliminar(ren);


  } else if(valido == false){
    location.reload();
    alert("No se efectuaron cambios");
    
  }
  
}

function eliminar(datoB){
  data = {idpersonal: datoB}
  var data = JSON.stringify(data);

     $.ajax({
         url: 'eliminaDato.php',
         type: 'POST',
         data: data,
         headers: {'Content-Type': 'application/x-www-form-urlencoded'},
         success: function(data) {
        //alert($.trim(data))
        if($.trim(data)=='"OK"'){
          // alert("Dato Eliminado");

        }else{
           alert("Ocurrio un error");
        }
        regresar();
         }

     });

}

function butt_modificar(idPers){

modificar();
eli=idPers;
  $("#Tdatos > tbody").empty();
  $.get('buscarID.php?idPers='+idPers, function(data, status, request){
    data.datos.forEach(function(reg) {
      $("#newNombre").val(reg.nombre);
      $("#newDireccion").val(reg.direccion);
      $("#newEmail").val(reg.email);
      $("#newAsunto").val(reg.asunto);
      $("#newEstado").val(reg.estado);
      $("#newSupervisor").val(reg.supervisor);
      $("#newBitacora").val(reg.bitacora);


    });
  });
}
var rango=0;
var bandera=0;
var contadorRegistro;
var siguiente=0;
registros();

function tabulador(siguiente) {
registros();
  if (siguiente==0) {
      rango=0;
      bandera=0;

  } else if(siguiente==1){
      if(bandera>0){
        bandera--;
        rango=(bandera*10);

      }
      if(bandera<=0){
        bandera=0;
        rango=(bandera*10);
      }


  } else if(siguiente==2){

    pivote=Math.trunc(contadorRegistro/10);
      if(bandera<pivote){
        bandera++;
        rango=(bandera*10);

      }

  } else if(siguiente==3){
    bandera = Math.trunc(contadorRegistro/10);
    pivote=Math.trunc(contadorRegistro-10);
    if(bandera<pivote){
      rango=(bandera*10);
      bandera--;
    }
    //alert(bandera);
    //rango=pivote;
    //bandera--;

    }
    tabular(rango);
/*
if (siguiente==0) {
      rango=0;
      bandera=0;

  } else if(siguiente==1){
      if(bandera>0){
        bandera--;
        rango=(bandera*10);

      }
      if(bandera<=0){
        bandera=0;
        rango=(bandera*10);
      }


  } else if(siguiente==2){

    pivote=Math.trunc(contadorRegistro/10);
      if(bandera<pivote){
        bandera++;
        rango=(bandera*10);

      }

  } else if(siguiente==3){
    bandera = Math.trunc(contadorRegistro/10);
    pivote=Math.trunc(contadorRegistro-10);
    if(bandera<pivote){
      rango=(bandera*10);
      bandera--;
    }
    //alert(bandera);
    //rango=pivote;
    //bandera--;

    }
*/

  
}

function tabular(rango){


  if(ordenIDTabla == 0){
    $("#Tdatos > tbody").empty();
  $.get('ordenaAlgo.php',  {'ordenDeTabla': ordenDeTabla, 'rango': rango}, function(data, status, request){
    data.datos.forEach(function(reg) {
      nom=reg.nombre;
      dir=reg.direccion;
      ema=reg.email;
      idPer=reg.idpersonal;
      cuant=reg.cuantos;
      fecha=reg.fecha;
      asunto=reg.asunto;
      estado=reg.estado;
      supervisor=reg.supervisor;
      bitacora=reg.bitacora;
      mostrarDatos(nom, dir, ema, idPer, cuant, fecha, asunto, estado, supervisor, bitacora);

    });
  });

  }



  if(ordenIDTabla == 1){
    $("#Tdatos > tbody").empty();
  $.get('ordenaAlgo.php',  {'ordenDeTabla': ordenDeTabla, 'rango': rango}, function(data, status, request){
    data.datos.forEach(function(reg) {
      nom=reg.nombre;
      dir=reg.direccion;
      ema=reg.email;
      idPer=reg.idpersonal;
      cuant=reg.cuantos;
      fecha=reg.fecha;
      asunto=reg.asunto;
      estado=reg.estado;
      supervisor=reg.supervisor;
      bitacora=reg.bitacora;
      mostrarDatos(nom, dir, ema, idPer, cuant, fecha, asunto, estado, supervisor, bitacora);

    });
  });

  }
 


}

function registros(){
  data = { nombre: "hi"}
	var data = JSON.stringify(data);
  $.ajax({
          url: 'registros.php',
          type: 'POST',
          data: data,
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          success: function(data) {
  		   //alert($.trim(data))
         contadorRegistro=data;


          }
      });
}

function modificardat(){
    nombre=$('#newNombre').val();
    direccion=$('#newDireccion').val();
    email=$('#newEmail').val();
    asunto=$('#newAsunto').val();
    estado=$('#newEstado').val();
    supervisor=$('#newSupervisor').val();
    bitacora=$('#newBitacora').val();



  

    data = {idpersonal: eli, nombre: nombre, direccion: direccion, email: email, asunto: asunto, estado: estado, supervisor: supervisor, bitacora: bitacora}

    var data = JSON.stringify(data);
       $.ajax({
           url: 'modificarDato.php',
           type: 'POST',
           data: data,
           headers: {'Content-Type': 'application/x-www-form-urlencoded'},
           success: function(data) {
          //alert($.trim(data))
          if($.trim(data)=='"OK"'){
             alert("Dato Modificado");


          }else{
             alert("Ocurrio un error");
          }
           }
       });


  regresar();
  location.reload();
}
function cerrar(){

    location.href="cerrar.php";
    

}

</script>
