<?php
require_once('../includes/funciones.php');
$idCliente = $_SESSION['usu']['idCliente'];
$inversion = $_POST['inversion'];
$orden1 = $_POST['orden1'];
$fechamin1 = $_POST['orden1'];
$valorbtcmin1 = $_POST['valorbtcmin1'];
$tradebtc1 = $_POST['tradebtc1'];
$fechamax1 = $_POST['fechamax1'];
$valorBTCmax1 = $_POST['valorBTCmax1'];
$outusd1 = $_POST['outusd1'];
$gananciabruta1 = $_POST['gananciabruta1'];
$retab1 = $_POST['retab1'];
$comision1 = $_POST['comision1'];
$recupero1 = $_POST['recupero1'];
$estado1 = $_POST['estado1'];

$orden2 = $_POST['orden2'];
$fechamin2 = $_POST['orden2'];
$valorbtcmin2 = $_POST['valorbtcmin2'];
$tradebtc2 = $_POST['tradebtc2'];
$fechamax2 = $_POST['fechamax2'];
$valorBTCmax2 = $_POST['valorBTCmax2'];
$outusd2 = $_POST['outusd2'];
$gananciabruta2 = $_POST['gananciabruta2'];
$retab2 = $_POST['retab2'];
$comision2 = $_POST['comision2'];
$recupero2 = $_POST['recupero2'];
$estado2 = $_POST['estado2'];

$orden3 = $_POST['orden3'];
$fechamin3 = $_POST['orden3'];
$valorbtcmin3 = $_POST['valorbtcmin3'];
$tradebtc3 = $_POST['tradebtc3'];
$fechamax3 = $_POST['fechamax3'];
$valorBTCmax3 = $_POST['valorBTCmax3'];
$outusd3 = $_POST['outusd3'];
$gananciabruta3 = $_POST['gananciabruta3'];
$retab3 = $_POST['retab3'];
$comision3 = $_POST['comision3'];
$recupero3 = $_POST['recupero3'];
$estado3 = $_POST['estado3'];

$orden4 = $_POST['orden4'];
$fechamin4 = $_POST['orden4'];
$valorbtcmin4 = $_POST['valorbtcmin4'];
$tradebtc4 = $_POST['tradebtc4'];
$fechamax4 = $_POST['fechamax4'];
$valorBTCmax4 = $_POST['valorBTCmax4'];
$outusd4 = $_POST['outusd4'];
$gananciabruta4 = $_POST['gananciabruta4'];
$retab4 = $_POST['retab4'];
$comision4 = $_POST['comision4'];
$recupero4 = $_POST['recupero4'];
$estado4 = $_POST['estado4'];


if ($orden1 != '') {
    $insertOrden = "INSERT INTO ordenes 
    (inversion,idCliente,
    orden1,fechamin1,valorbtcmin1,tradebtc1,fechamax1,valorBTCmax1,outusd1,
    gananciabruta1,retab1,comision1,recupero1,estado1, 
    orden2,fechamin2,valorbtcmin2,tradebtc2,fechamax2,valorBTCmax2,outusd2,
    gananciabruta2,retab2,comision2,recupero2 ,estado2,
    orden3,fechamin3,valorbtcmin3,tradebtc3,fechamax3,valorBTCmax3,outusd3,
    gananciabruta3,retab3,comision3,recupero3,estado3,
    orden4,fechamin4,valorbtcmin4,tradebtc4,fechamax4,valorBTCmax4,outusd4,
    gananciabruta4,retab4,comision4,recupero4,estado4)
    VALUES ('$inversion','$idCliente','$orden1',now(),'$valorbtcmin1','$tradebtc1',now(),'$valorBTCmax1','$outusd1',
    '$gananciabruta1','$retab1','$comision1','$recupero1', '$estado1',
    '$orden2',now(),'$valorbtcmin2','$tradebtc2',now(),'$valorBTCmax2','$outusd2',
    '$gananciabruta2','$retab2','$comision2','$recupero2', '$estado2',
    '$orden3',now(),'$valorbtcmin3','$tradebtc3',now(),'$valorBTCmax3','$outusd3',
    '$gananciabruta3','$retab3','$comision3','$recupero3', '$estado3',
    '$orden4',now(),'$valorbtcmin4','$tradebtc4',now(),'$valorBTCmax4','$outusd4',
    '$gananciabruta4','$retab4','$comision4','$recupero4', '$estado4')";
    if (consulta_sql($insertOrden)) {
        $resultado = 1;
    } else {
        echo $insertOrden;
        $resultado = 0;
    }
    echo $resultado;
}
