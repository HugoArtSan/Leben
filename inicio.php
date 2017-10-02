

<?php
session_save_path("sessiones");
session_start();
   include "database.lib.php";
   include "objetos.lib.php";
   include "libreria.lib.php";
if(obten ("session_jefazo")=='activa'){
  echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL= principal.php">';
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>:: MEDISA - HUGO ::</title>
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

  <div id="div_Login" class="container col-md-offset-4 col-md-4">
    <div class="panel panel-primary panel-responsive">
      <div class="panel-heading text-center">:: Bienvenido ::
      </div>
      <div class="panel-body">
        <form class="form-inline" role="form">
          <div class="container col-md-12">
            <div class="table-responsive">
              <table id="tablaPagos" class="table table-condensed">
                <tbody>
                  <tr>
                    <td colspan="6">
                      <div class="col-md-4 col-xs-2"> <h4>Nombre </h4></div>
                      <div class="col-md-6 col-xs-4"> <input type="text" id="nombre" value="" class="form-control input-md"> </div>
                  </tr>
                    <tr>
                      <td colspan="6">
                        <div class="col-md-4 col-xs-2"> <h4>Contraseña </h4></div>
                        <div class="col-md-6 col-xs-4"> <input type="text" id="pass" value="" class="form-control input-md"> </div>
                      </td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="container col-md-offset-4 col-md-4">
            <p align="center">
              <button onclick="buscar();" class="btn btn-warning btn-lg" type="button">Aceptar</button>
              <!--<button onclick="bprueba();" class="btn btn-warning btn-lg" type="button">prueba</button>-->
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>


</body>
</html>


<script language="javascript">


function buscar() {
  nombre=$('#nombre').val();
  pass=$('#pass').val();

  nom="nombre";
  seguridad="pass";
  permisos="email";
  valido=0;
  if (nombre == "" ){
    alert("Ingrese nombre");
  } else if( pass == ""){
    alert("Ingrese Contraseña")
  }else{
    $("#Tdatos > tbody").empty();

    $.get('buscaLogin.php?', {'nombre': nombre, 'pass': pass}, function(data, status, request){
      data.datos.forEach(function(reg) {

        seguridad=reg.seguridad;
        permisos=reg.permisos;
      
        //alert(seguridad);
      
        if(seguridad == "PASSWORD"){
         alert("ERROR EN PASSWORD");
        }
         if(permisos != "" && permisos != "null" && permisos != "USUARIO" && seguridad != "PASSWORD"  ){
          valido=2;
        }

        
        if(permisos == "USUARIO"){
         alert("ERROR EN USUARIO");
        }
        if(valido == 2){
          alert("pasaste");


         redireccionar();
      
      



        }
        
      });
    });
  }
 
}
function redireccionar(){
  window.location="http://localhost/bitacora/principal.php";
}


/*
$seguridad="PASSWORD"; 
      $_SESSION['session_usuario'] = 'no_activa';
      $_SESSION['login_usuario'] = "";
      $_SESSION['nombre_usuario'] = "";
      $_SESSION['permisos_usuario'] = "";

      */
</script>
