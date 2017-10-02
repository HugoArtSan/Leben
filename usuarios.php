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
     echo interfazBar();
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>::MEDISA - Usuarios :</title>

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
  <dt   align="center" class="bg-success">:: Usuarios ::</dt >
  <div id="buscarUsuarios" class="col-md-2 panel panel-success ">

    <p>Usuario</p>
    <p align="center">
    <input type="text" class="input-sm form-control" id="buscarNombre" placeholder="">
    <p>Nombre</p>
    <p align="center">
      <input type="text" class="input-sm form-control" id="buscarUsuarios" placeholder="">
      <button id="butt_buscar" onclick="buscarUsuarios();" class="btn btn-info" type="button">
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
        <button id="butt_excel" onclick="prueba();" class="btn btn-success" type="button">
        <span class="glyphicon glyphicon-th"></span> Excel</button>
      </div>
    </ul>

    <div id="datosUsuarios" class="col-md-12 panel panel-info table-responsive ">
      <table id="Tdatos" class="table table-hover ">
        <thead>
          <tr>
            <th><input type="checkbox" value="" > Eliminar</th>
            <th id="tablaUsuario" onclick="ordenarTabla(1);">Usuario</th>
            <th id="tablaNombre" onclick="ordenarTabla(2);">Nombre</th>
            <th id="tablaNivel" onclick="ordenarTabla(3);">Nivel</th>
            <th id="tablaObservaciones" onclick="ordenarTabla(11);">Observaciones</th>
            <th id="tablaModifico" onclick="ordenarTabla(11);">Modifico</th>
           <!-- <th style="visibility:hidden;">Cuantos </th>-->
          </tr>
        </thead>

        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="nuevoUsuario" class="container col-md-12 panel panel-warning panel-responsive ">
  <div class="col-md-8 col-md-offset-2 panel panel-info dropdown">
    <table  class="table table-hover ">
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
          <td>Password</td>
          <td>
            <input type="password" class="form-control" id="contrasenia" placeholder="">
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
          <td >
            <select id="nivelseleccion"  class="form-control" >
              <option ></option>
              <tbody >
              </tbody>
            </select>          
          </td>
        </tr>
         <tr>
          <td>Observaciones</td>
          <td>
            <input type="text" class="form-control" id="Observaciones" placeholder="" value="">
          </td>
        </tr>
      </tbody>
    </table>

    <p align="center">
      <button id="botonNuevo" onclick="agregarUsuario();" class="btn btn-success"  type="button">
      <span class="glyphicon glyphicon-floppy-save"></span>Guardar</button>
      
      <button id="botonModificar" onclick="modificardat();" class="btn btn-success"  type="button">
      <span class="glyphicon glyphicon-floppy-save"></span> Guardar Cambio</button>
      
      <button onclick="regresarUsuarios();" class="btn btn-success" type="button">
      <span class="glyphicon glyphicon-share-alt"></span> Regresar</button>
     </p>
  </div>
</div>

</body>
</html>

<script language="javascript">
var ren=0;
var arreglo='';
var inicio=0;
buscarUsuarios();
niveles_Seguridad();
$("#nuevoUsuario").hide();

function regresar(){
    location.href="usuarios.php";
}

function nuevoUsuario(){
  $("#nuevoUsuario").show();
  $("#usuario").hide();
  $("#buscarUsuario").hide();
  $("#Tabulador").hide();
  $("#botonModificar").hide();
  $("#buscarUsuarios").hide();
  $("#botonNuevo").show();
  if(inicio==0){
    mostrarDatos();
    inicio=1;
  }
}

function modificar(){
  $("#nuevoUsuario").show();
  $("#usuario").hide();
  $("#buscarUsuario").hide();
  $("#Tabulador").hide();
  $("#botonModificar").hide();
  $("#buscarUsuarios").hide();
  $("#botonNuevo").hide();
  $("#botonModificar").show();
  if(inicio==0){
    mostrarDatos();
    inicio=1;
  }
}



function niveles_Seguridad(){
  accion=1;
  clave=0;
  $.get('traiteNivel.php', {'accion': accion, 'clave': clave},  function(data, status, request){
    data.datos.forEach(function(reg) {
      Clave=reg.clave;
      separar(Clave);
    });
  });
}

function separar(Clave){
    arreglo=arreglo+Clave+'|';
}

function mostrarDatos(){
    x=-1;
    separar="|";
    opcion=arreglo.split(separar);
    while( x<3){
      x++;
      mostrar=opcion[x];
      if(mostrar != ''){
      }
    }
}

function regresarUsuarios(){
  $("#nuevoUsuario").hide();
  $("#usuario").show();
  $("#buscarUsuario").show();
  $("#Tabulador").show();
  $("#botonModificar").show();
  $("#buscarUsuarios").show(); 

  $('#newLogin').val("");
  $('#newNombre').val("");
  $('#contrasenia').val("");
  $('#confirmar').val("");
  $('#nivelseleccion').val("");
  $('#Observaciones').val("");
  mostrarDatos();
}

function agregarUsuario(){
  usuario=$('#newLogin').val();
  nombre=$('#newNombre').val();
  pass=$('#contrasenia').val();
  confirmar=$('#confirmar').val();
  nivel_seguri=$('#nivelseleccion').val();
  nivel_seguri=nivel_seguri.toString();
  observaciones=$('#Observaciones').val();
  if(pass == confirmar){    
    data = {usuario: usuario, pass: pass, nombre: nombre, nivel_seguri: nivel_seguri, observaciones: observaciones}
    var data = JSON.stringify(data);
       $.ajax({
           url: 'guardaUsuario.php',
           type: 'POST',
           data: data,
           headers: {'Content-Type': 'application/x-www-form-urlencoded'},
           success: function(data) {
          //alert($.trim(data))
            if($.trim(data)=='"OK"'){
                alert("Dato Guardado");
                regresar();

            }else if($.trim(data)=='"Login"'){
                    alert("El Login ya existe");
                  } 
                  else{
                      alert("Ocurrio un error");
                     // alert(data);
                  }
           }
       });
  }else{
    alert("La password no coincide");
  }
}

function buscarUsuarios(){
  $('#buscarNombre').focus();
  buscaraNombre=$('#buscarNombre').val();
  buscarUsuario=$('#buscarUsuario').val();
  id="id";
  usur="usuario";
  nom="nombre";
  niv="nivel";
  observ="observaciones";
  modif="modifico";
  accion=1;
  
  $("#Tdatos > tbody").empty();
  $.get('traiteUsuario.php?', {'accion': accion, 'buscaraNombre': buscaraNombre, 'buscarUsuario': buscarUsuario}, function(data, status, request){
    data.datos.forEach(function(reg) {
      id=reg.id;
      usur= reg.login;
      nom= reg.nombre;
      niv= reg.nivel_seguridad;
      observ= reg.observaciones;
      modif= reg.modifico;
      cuant=reg.cuantos;
      mostrarUsuario(id, usur, nom, niv, observ, modif, cuant);

    });
  });
}

function butt_modificar(idU){
  //alert("modificar");  
  modificar();
  eli=idPers;
  accion=2;
  
  $.get('traiteUsuario.php?idPers=', {'accion':accion, 'idU': idU}, function(data, status, request){
     data.datos.forEach(function(reg) {

      $('#newLogin').val(reg.login);
      $('#newNombre').val(reg.nombre);
      $('#contrasenia').val(reg.password);
      $('#confirmar').val(reg.password);
      $('#nivelseleccion').val(reg.nivel);
      $('#Observaciones').val(reg.observaciones);
  
  
     });
   });
}


function butt_eliminar(){
  alert("Eliminar")
}

function mostrarUsuario(idU, usur, nom, niv, observ, modif, cuant){
    ren++;
    temp='<tr class="bg-success  ">'+
        '<td><input type="checkbox" value="" > <button id="b'+idU+'" onclick="butt_eliminar('+idU+', \'nom\');" class="btn btn-danger glyphicon glyphicon-remove-sign" type="button"></button></td>'+
        '<td onclick="butt_modificar('+idU+');">'+usur+'</td>'+
        '<td onclick="butt_modificar('+idU+');">'+nom+'</td>'+
        '<td >'+niv+'</td>'+
        '<td>'+observ+'</td>'+
        '<td>'+modif+'</td>'+
        '<td id="numeroCuantos" style="display:none;">'+cuant+'</td>'+
        '</td>';
  $("#Tdatos > Tbody").append(temp);
}
var rango=0;
var bandera=0;
var contadorRegistro;
var siguiente=0;
var conteoRegistros;
prueba();
var contadorRegistro;

function prueba(){
  var nombre='usuarios';
  $("#Tdatos > tbody").empty();
  $.get('ejemplo.php?', {'nombre': nombre}, function(data, status, request){
    data.datos.forEach(function(reg) {
      contadorRegistro=reg.count;
    });
  }); 
}

function tabulador(siguiente) {
prueba();
  if (siguiente==0) {
      rango=0;
      bandera=0;
  } else if(siguiente==1){
      if(bandera>0){
        bandera--;
        rango=(bandera*5);
      }
      if(bandera<=0){
        bandera=0;
        rango=(bandera*5);
      }
  } else if(siguiente==2){
    pivote=Math.trunc(contadorRegistro/5);
      if(bandera<pivote){
        bandera++;
        rango=(bandera*5);
      }
  } else if(siguiente==3){
      bandera = Math.trunc(contadorRegistro/5);
      pivote=Math.trunc(contadorRegistro-5);
      if(bandera<pivote){
        rango=(bandera*5);
        bandera--;
      }
    }
    tabular(rango);  
}

var vieneDe="usuarios";
function tabular(rango){
  if(ordenIDTabla == 0){
    $("#Tdatos > tbody").empty();
    $.get('ordenaAlgo.php',  {'ordenDeTabla': ordenDeTabla, 'rango': rango}, function(data, status, request){
      data.datos.forEach(function(reg) {
        login=reg.login;
        usur= reg.login;
        nom= reg.nombre;
        niv= reg.nivel_seguridad;
        observ= reg.observaciones;
        modif= reg.modifico;
        cuant=reg.cuantos;
        mostrarUsuario(login, usur, nom, niv, observ, modif, cuant);
      });
    });
  }

  if(ordenIDTabla == 1){
    $("#Tdatos > tbody").empty();
    $.get('ordenaAlgo.php',  {'ordenDeTabla': ordenDeTabla, 'rango': rango}, function(data, status, request){
      data.datos.forEach(function(reg) {
        id=reg.id;
        usur= reg.login;
        nom= reg.nombre;
        niv= reg.nivel_seguridad;
        observ= reg.observaciones;
        modif= reg.modifico;
        cuant=reg.cuantos;
        mostrarUsuario(id, usur, nom, niv, observ, modif, cuant);
      });
    });
  }
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
      id=reg.id;
      usur= reg.login;
      nom= reg.nombre;
      niv= reg.nivel_seguridad;
      observ= reg.observaciones;
      modif= reg.modifico;
      cuant=reg.cuantos;
      mostrarUsuario(id, usur, nom, niv, observ, modif, cuant);
    });
  });
  ordenIDTabla=1;
}

</script>
