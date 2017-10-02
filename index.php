<?php
session_save_path("sessiones");
session_start();
//session_set_cookie_params(10);
   include "database.lib.php";
   include "objetos.lib.php";
   include "libreria.lib.php";
   


if(obten("session_usuario")=='activa'){
echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL= principal.php">';
}else{

echo' <html>

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
        <script>
          function keyPress(e)
          {
          if (!e) e = window.event; // needed for cross browser compatibility
          //alert(e.keyCode); // You want 13 here , so 
            if (e.keyCode == 13){
              forma.submit();

            }

          // return true; or false, if you want to cancel event

          }
          </script>
        <body>
          <form action="session.php" method="post" id="forma" name="forma">
          <div id="div_Login" class="container col-md-offset-4 col-md-4">
            <div class="panel panel-success panel-responsive">
              <div class="panel-heading text-center">:: Bienvenido ::
              </div>
              <div class="panel-body">

              <img src="css\images\logo_entrada.jpg" class="center-block img-responsive img-thumbnail" style="border-radius: 50px" >

                <form class="form-inline" role="form">
                  <div class="container col-md-12">
                    <div class="table-responsive">
                      <table id="tablaPagos" class="table table-condensed">
                        <tbody>
                          <tr>
                            <td colspan="6">
                              <div class="col-md-4 col-xs-2"> <h4>Nombre </h4></div>
                              <div class="col-md-6 col-xs-4"> <input class="logueo form-control input-md"  type="text" name="nombreInicio" > </div>
                          </tr>
                            <tr>
                              <td colspan="6">
                                <div class="col-md-4 col-xs-2"> <h4>Contraseña </h4></div>
                                <div class="col-md-6 col-xs-4"> <input class="logueo form-control input-md"  type="password" name="passInicio" onkeydown="keyPress()"> </div>
                              </td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="container col-md-offset-4 col-md-4">
                    <p align="center">
                      <button onclick="forma.submit();"  class="btn btn-success btn-lg" type="button">Iniciar Sesion</button>
                     
                    </p>
                  </div>
                </form>
              </div>
            </div>
          </div>

          </form>
        </body>
</html>
';
}
?>


