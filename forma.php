<?php
session_start();
   include "database.lib.php";
   include "objetos.lib.php";   
   include "libreria.lib.php";   
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

 
			<div class="container  col-md-12">   
			<div class="table-responsive">
			  <table id="tablaPagos" class="table table-condensed">			
				 <tbody>
				 <tr>
					<td colspan="6">
					  <div class="col-md-1 col-xs-2"> <h4>Login </h4></div>
					  <div class="col-md-2 col-xs-4"> <input type="text" id="login" value="" class="form-control input-md"> </div>
			     </tr>
				 <tr>
					<td colspan="6">
					  <div class="col-md-1 col-xs-2"> <h4>Nombre </h4></div>
					  <div class="col-md-2 col-xs-4"> <input type="text" id="nombre" value="" class="form-control input-md"> </div>
					</td>
			     </tr>
				 </tbody>		 
		      </table>
			</div>
			</div>

	<div class="container col-md-offset-4 col-md-4">
		<p align="center">
		     <button id="botonazo" onclick="guarda();" class="btn btn-warning btn-lg" type="button">Guarda</button>
		</p>	  
	</div>	


</body>
</html>


<script language="javascript">



function guarda(){
	login=$('#login').val();
	nombre=$('#nombre').val();
	
	//alert(login);
	data = { login: login, nombre: nombre}
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
		      $('#login').val('');
			  $('#nombre').val('');
		   }else{
		      alert("Ocurrio un error");
		   }
        }
    });
}



</script>