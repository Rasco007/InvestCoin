<?php

session_start();
if (!$_SESSION["usu"]) header("location:./");
$mail = $_SESSION["usu"]["usu_mail"];
$id = $_SESSION["usu"]["idUsuario"];

include_once("funciones.php");

if($_GET){
    $idUsu = $_GET["id"];

    $sql = "SELECT id_binance FROM usuarios WHERE idUsuario = $idUsu ";
    if ($res = consulta_sql($sql)) {
        $sql = "SELECT bin_mail,bin_api_key,bin_secret_key FROM `Binance` INNER JOIN usuarios ON Binance.bin_id = usuarios.id_binance WHERE usuarios.idUsuario = $idUsu";
        
        if ($res = consulta_sql($sql)) {
            /*var_dump ($res[0]);*/
            header("Access-Control_Allow_Origin:*");
            header("Content-type:application/json");
            echo json_encode($res);
        }
        
    }else{

    }
}


?>
