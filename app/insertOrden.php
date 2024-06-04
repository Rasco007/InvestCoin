<?php
include_once("includes/funciones.php");
include 'db.php';

$simbolo            =$_POST["symbol"]; 
$side               =$_POST["side"]; 
$quantity           =$_POST["quantity"]; 
$price              =$_POST["price"]; 
$stopPrice          =$_POST["stopPrice"]; 
$stopLimitPrice     =$_POST["stopLimitPrice"]; 
$id                 =$_POST["id"]; 
$fecha              =$_POST["fecha"]; 
$orderListId        =$_POST["orderListId"]; 



$sql = "INSERT INTO ordenes (`idcliente`,`fechamin1`,`simbolo`,`side1`,`precioMercado1`,`precioStop1`,`cantidad1`,`precioStopLimit1`,`orderListId`) 
							VALUES ('$id','$fecha','$simbolo','$side','$price','$stopPrice','$quantity','$stopLimitPrice','$orderListId')";

if ($res = consulta_sql($sql)) {
	
}else{
    $css_alert = "danger";
    $mensaje = "<b>Datos incorrectos!</b> Intente nuevamente.";
    echo "<div class='alert alert-$css_alert text-center' role='alert' style='padding:0px 12px; margin-top: 12px;'> $mensaje </div>";

}




?>
