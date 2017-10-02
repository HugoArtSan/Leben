 <?php
   include "libreria.lib.php";
   include "database.lib.php";
//  $sql1="SELECT idpersonal, nombre, direccion, email FROM personal order by nombre asc  LIMIT '$cantidad' OFFSET '$rango'";
//  $sql2="SELECT idpersonal, nombre, direccion, email FROM personal order by direccion asc  LIMIT '$cantidad' OFFSET '$rango'";
//  $sql3="SELECT idpersonal, nombre, direccion, email FROM personal order by email asc  LIMIT '$cantidad' OFFSET '$rango'";
/*
  if($orden == 1){
      
      $result = pg_query($con,$sql1);  
    } 
    if($orden == 2){
      
      $result = pg_query($con,$sql2);  
    }
    if($orden == 3){
      
      $result = pg_query($con,$sql3);  
    }
*/
class tabulador
{

   public function __construct() {

   }

   public function tabulador($ordenDeTabla, $rango) {

    $con=conectar();
    $cantidad=10;
    $orden=StrToUpper($ordenDeTabla);
    $irA=StrToUpper($rango);
//Falta desendiente y ligarlo con el movimiento del tabulador
//LIMIT '$cantidad' OFFSET 0 nom, dir, ema, idPer, cuant, fecha, asunto, estado, supervisor, bitacora)
 /*

 , fecha, asunto, estado, supervisor, bitacora 
  CREATE TABLE personal( 
  idpersonal serial NOT NULL,
  nombre character varying(255),
  direccion character varying(255),
  email character varying(255),
  cantidad integer,
  fecha timestamp without time zone DEFAULT now(),
  asunto character varying(255),
  estado character varying(50),
  supervisor character varying(255),
  bitacora character varying(750),
  CONSTRAINT personal_pkey PRIMARY KEY (idpersonal));

  */

   //NOMBRE
    $sql1="SELECT idpersonal, nombre, direccion, email, fecha, asunto, estado, supervisor, bitacora FROM personal order by nombre asc LIMIT '$cantidad' OFFSET '$irA' ";
    $sql4="SELECT idpersonal, nombre, direccion, email, fecha, asunto, estado, supervisor, bitacora FROM personal order by nombre desc LIMIT '$cantidad' OFFSET '$irA'";
    //DIRECCION
    $sql2="SELECT idpersonal, nombre, direccion, email, fecha, asunto, estado, supervisor, bitacora FROM personal order by direccion asc LIMIT '$cantidad' OFFSET '$irA' ";
    $sql5="SELECT idpersonal, nombre, direccion, email, fecha, asunto, estado, supervisor, bitacora FROM personal order by direccion desc LIMIT '$cantidad' OFFSET '$irA' ";

    //EMAIL
    $sql3="SELECT idpersonal, nombre, direccion, email, fecha, asunto, estado, supervisor, bitacora FROM personal order by email asc LIMIT '$cantidad' OFFSET '$irA' ";
    $sql6="SELECT idpersonal, nombre, direccion, email, fecha, asunto, estado, supervisor, bitacora FROM personal order by email desc LIMIT '$cantidad' OFFSET '$irA'";

    //FECHA
    $sql11="SELECT idpersonal, nombre, direccion, email, fecha, asunto, estado, supervisor, bitacora FROM personal order by fecha asc LIMIT '$cantidad' OFFSET '$irA' ";
    $sql14="SELECT idpersonal, nombre, direccion, email, fecha, asunto, estado, supervisor, bitacora FROM personal order by fecha desc LIMIT '$cantidad' OFFSET '$irA'";

    //ESTADO
    $sql12="SELECT idpersonal, nombre, direccion, email, fecha, asunto, estado, supervisor, bitacora FROM personal order by estado asc LIMIT '$cantidad' OFFSET '$irA' ";
    $sql15="SELECT idpersonal, nombre, direccion, email, fecha, asunto, estado, supervisor, bitacora FROM personal order by estado desc LIMIT '$cantidad' OFFSET '$irA'";

    //ESTADO
    $sql13="SELECT idpersonal, nombre, direccion, email, fecha, asunto, estado, supervisor, bitacora FROM personal order by supervisor asc LIMIT '$cantidad' OFFSET '$irA' ";
    $sql16="SELECT idpersonal, nombre, direccion, email, fecha, asunto, estado, supervisor, bitacora FROM personal order by supervisor desc LIMIT '$cantidad' OFFSET '$irA'";


 

    switch ($orden) {
    case 0:
        $result = pg_query($con,$sql0);
        break;
    case 1:
        $result = pg_query($con,$sql1);
        break;
    case 2:
        $result = pg_query($con,$sql2);  
        break;
    case 3:
        $result = pg_query($con,$sql3);
        break;
    case 4:
        $result = pg_query($con,$sql4);
        break;
    case 5:
        $result = pg_query($con,$sql5);
        break;
    case 6:
        $result = pg_query($con,$sql6);
        break;
    case 11:
        $result = pg_query($con,$sql11);
        break;
    case 12:
        $result = pg_query($con,$sql12);
        break;
    case 13:
        $result = pg_query($con,$sql13);
        break;
    case 14:
        $result = pg_query($con,$sql14);
        break;
    case 15:
        $result = pg_query($con,$sql15);
        break;
    case 16:
        $result = pg_query($con,$sql16);
        break;


}

    
    $datos_array = array();

    while ($row = pg_fetch_array($result)){
      $nombre   = $row["nombre"];
      $direccion = $row["direccion"];
      $email = $row["email"];
      $idpersonal = $row["idpersonal"];
      $fecha = $row["fecha"];
      $asunto = $row["asunto"];
      $estado = $row["estado"];
      $supervisor = $row["supervisor"];
      $bitacora = $row["bitacora"];
      //fecha, asunto, estado, supervisor, bitacora 

      $datos_array[] = array("nombre"=> $nombre, "direccion"=> $direccion, "email"=> $email, "idpersonal"=> $idpersonal, "fecha"=> $fecha, "asunto"=> $asunto, "estado"=> $estado, "supervisor"=> $supervisor, "bitacora"=> $bitacora );

      $datos = array("datos" => $datos_array);
    }

    //$datos_array[] = array("nombre" => 'juanelo', "direccion" => 'monte limbo #13');
    //$datos_array[] = array("nombre" => 'petronila', "direccion" => 'puerto la soledad #71');

    pg_close($con);
      return $datos;

   }
}

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


$ordenDeTabla = obten("ordenDeTabla");
$rango = obten("rango");

header('Content-Type: application/json');
$algo = new tabulador();

echo json_encode($algo->tabulador($ordenDeTabla, $rango));

?>