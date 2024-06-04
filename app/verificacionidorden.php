<?php
include_once("includes/funciones.php");
include 'db.php';

$id=$_POST["id"]; //recoger datos de id
$dni=$_POST["dni"]; //recoger datos de dni
$sql = "SELECT * FROM usuarios WHERE idUsuario='$id' and usu_dni='$dni'";
if ($res = consulta_sql($sql)) {
	$result= mysqli_query($connection,"SELECT bin_api_key,bin_secret_key FROM Binance INNER JOIN usuarios ON Binance.bin_id = usuarios.id_binance WHERE usuarios.idUsuario = '$id'");
    $ret = mysqli_fetch_array($result); 

    $apiKey = $ret["bin_api_key"]; 
    $secret_key = $ret["bin_secret_key"]; 
    /*
    $css_alert = "success";
    $mensaje = "<b>Datos correctos!</b>";
    */

    echo "<button  onclick='presiono()' class='btn btn-primary mt-3'><i class='fa fa-check'></i> Hacer Trade</button>";

}else{
    $css_alert = "danger";
    $mensaje = "<b>Datos incorrectos!</b> Intente nuevamente.";
    echo "<div class='alert alert-$css_alert text-center' role='alert' style='padding:0px 12px; margin-top: 12px;'> $mensaje </div>";

}




?>
