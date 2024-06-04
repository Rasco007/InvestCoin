<?php
session_start();
if (!$_SESSION["usu"]) header("location:./");
include_once("includes/funciones.php");

$id = $_REQUEST["id"];

if (!empty($id)) {
  $consultaOrdenes = "SELECT * FROM ordenes WHERE idOrden = $id";
  $res = consulta_sql($consultaOrdenes);
  $simbolo = $res[0]["simbolo"];
  foreach ($res[0] as $k => $v) $$k = $v;
}




if (empty($id)) {
  $idCliente = $_SESSION['usu']['idCliente'];
  $idPerfil = getPerfilCliente($idCliente);
  //trae valores del perfil del cliente logueado
  $sql = "SELECT orden1/100 as orden1, minOr1/100 as minOr1, maxOr1/100 as maxOr1, orden2/100 as orden2, minOr2/100 as minOr2, maxOr2/100 as maxOr2, orden3/100 as orden3, minOr3/100 as minOr3, maxOr3/100 as maxOr3, orden4/100 as orden4, minOr4/100 as minOr4, maxOr4/100 as maxOr4 FROM perfil WHERE idPerfil=$idPerfil";
  $res = consulta_sql($sql);
  foreach ($res[0] as $k => $v) $$k = $v;

  //Trae valor del bitcoin, aqui deberia cambiarse por el valor que devuelve la api
  $sql1 = "SELECT valor FROM bitcoinvalorapi";
  $res1 = consulta_sql($sql1);
  $valorBTC = $res1[0]['valor'];

  /*
  //ORDEN 1 - Calculos
  unset($inversionOrden1, $side1, $precioMercado1, $montoCalculo, $precioStop1, $cantidad1, $gananciabruta1, $retab1, $comision1, $recupero1);
  $montoCalculo = $_REQUEST["inversion"];
  $inversionOrden1 = $montoCalculo * $orden1;
  $side1 = number_format($valorBTC * (1 - (number_format($minOr1, 2, '.', ''))), 0, '.', '');
  $precioStop1 = number_format((($valorBTC * (number_format($maxOr1, 2, '.', ''))) + $valorBTC), 0, '.', '');
  $precioMercado1 = number_format(($inversionOrden1 / $side1), 4, '.', '');
  $cantidad1 = number_format(($precioStop1 * $precioMercado1), 2, '.', '');
  $gananciabruta1 = $cantidad1 - $inversionOrden1;
  $retab1 =  number_format(((($cantidad1 / $inversionOrden1) - 1) * 100), 2, '.', '');
  $comision1 = number_format(($gananciabruta1 * 0.1), 2, '.', '');
  $recupero1 = number_format(($cantidad1 - $comision1), 2, '.', '');

  //ORDEN 2 - Calculos
  unset($inversionOrden2, $valorbtcmin2, $tradebtc2, $valorBTCmax2, $outusd2, $gananciabruta2, $retab2, $comision2, $recupero2);


  //calculos
  $inversionOrden2 = $montoCalculo * $orden2;
  $valorbtcmin2 = number_format($valorBTC * (1 - (number_format($minOr2, 2, '.', ''))), 0, '.', '');
  $valorBTCmax2 = number_format((($valorBTC * (number_format($maxOr2, 2, '.', ''))) + $valorBTC), 0, '.', '');
  $tradebtc2 = number_format(($inversionOrden2 / $valorbtcmin2), 4, '.', '');
  $outusd2 = number_format(($valorBTCmax2 * $tradebtc2), 2, '.', '');
  $gananciabruta2 = $outusd2 - $inversionOrden2;
  $retab2 =  number_format(((($outusd2 / $inversionOrden2) - 1) * 100), 2, '.', '');
  $comision2 = number_format(($gananciabruta2 * 0.1), 2, '.', '');
  $recupero2 = number_format(($outusd2 - $comision2), 2, '.', '');


  //ORDEN 3 - Calculos
  unset($inversionOrden3, $valorbtcmin3, $tradebtc3, $valorBTCmax3, $outusd3, $gananciabruta3, $retab3, $comision3, $recupero3);


  //calculos
  $inversionOrden3 = $montoCalculo * $orden3;
  $valorbtcmin3 = number_format($valorBTC * (1 - (number_format($minOr3, 2, '.', ''))), 0, '.', '');
  $valorBTCmax3 = number_format((($valorBTC * (number_format($maxOr3, 2, '.', ''))) + $valorBTC), 0, '.', '');
  $tradebtc3 = number_format(($inversionOrden3 / $valorbtcmin3), 4, '.', '');
  $outusd3 = number_format(($valorBTCmax3 * $tradebtc3), 2, '.', '');
  $gananciabruta3 = $outusd3 - $inversionOrden3;
  $retab3 =  number_format(((($outusd3 / $inversionOrden3) - 1) * 100), 2, '.', '');
  $comision3 = number_format(($gananciabruta3 * 0.1), 2, '.', '');
  $recupero3 = number_format(($outusd3 - $comision3), 2, '.', '');



  //ORDEN 4 - Calculos
  unset($inversionOrden4, $valorbtcmin4, $tradebtc4, $valorBTCmax4, $outusd4, $gananciabruta4, $retab4, $comision4, $recupero4);


  //calculos
  $inversionOrden4 = $montoCalculo * $orden4;
  $valorbtcmin4 = number_format($valorBTC * (1 - (number_format($minOr4, 2, '.', ''))), 0, '.', '');
  $valorBTCmax4 = number_format((($valorBTC * (number_format($maxOr4, 2, '.', ''))) + $valorBTC), 0, '.', '');
  $tradebtc4 = number_format(($inversionOrden4 / $valorbtcmin4), 4, '.', '');
  $outusd4 = number_format(($valorBTCmax4 * $tradebtc4), 2, '.', '');
  $gananciabruta4 = $outusd4 - $inversionOrden4;
  $retab4 =  number_format(((($outusd4 / $inversionOrden4) - 1) * 100), 2, '.', '');
  $comision4 = number_format(($gananciabruta4 * 0.1), 2, '.', '');
  $recupero4 = number_format(($outusd4 - $comision4), 2, '.', '');
*/
}

/*

if ($_POST && !empty($_POST)) {
  foreach ($_POST as $x => $v) $$x = $v;
}
*/

if($_POST){
  $id=$_POST["id"]; //recoger datos de email
$css_alert = "danger";
$mensaje = "<b>Datos incorrectos!</b> Intente nuevamente.";
var_dump($id);

  }
  include_once("includes/verificacionidorden.php");
  

  


?>

<!DOCTYPE html>
<html lang="es">
<style>
  input[type=date]:required:invalid::-webkit-datetime-edit {
    color: transparent;
  }

  input[type=date]:focus::-webkit-datetime-edit {
    color: black !important;
  }
</style>
<?php include_once('head.html'); ?>


<body class="">
  <div class="wrapper ">

    <?php include_once('sidebar.php'); ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include_once('navbar.php'); ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h2 class="card-title"><?php echo (!empty($id) ? 'Editar Orden' : 'Orden') ?></h2>
                </div>
                <div class="card-body">
                  <form id="frm" name="datos">
                    <input type="hidden" name="accion" value="">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="row">
                      <div class="col-md-1 offset-md-2" align="center">
                        <img src="" width="60px" class="img-fluid">
                      </div>
                      
                      <div class="col-md-4 ">
                        <div class="form-group ">
                          <!--
                          <label class="bmd-label-floating">Inversión USD</label>
                          <input type="number" name="inversion" id="inversion" class="form-control" value="<?php echo $inversion ?>" style="font-size: 2em; text-align:center" required <?php echo (empty($id) ? '' : 'readonly') ?>>
                          -->
                        </div>
                      </div>
                      <?php if (empty($id)) { ?>
                        <div class="col-md-1">
                         <!--
                          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Calcular</button>
                          -->
                        </div>
                      <?php } ?>
                    </div>

                    <?php if (empty($id)) { ?>
                      <div class="row">
                        <div class="col-md-3">
                            <div class="col-md-12">
                                <h4>Usuario</h4>
                            </div>
                            <div class="col-md-12">
                              <label class="bmd-label-floating">Id</label>
                              <input type="button" value="106"  id="idUsuario" name ="idUsuario"class="form-control"  style="text-align: left; background-color: #e9ecef;">
                              <label class="bmd-label-floating">DNI</label>
                              <input type="number"  name ="dniUsuario" id="dniUsuario" class="form-control" style="text-align: left; background-color: #e9ecef;" value="<?php echo $dniUsuario ?>">
                            </div>
                            <div class="col-md-12">
                                <div id="comp">
                                </div>
                            </div>
                        </div>
                        <div style = "margin-top: 90px;"class="col-md-3">
                            <button type="button" onclick="enviar()" class="btn btn-primary"><i class="fa fa-check"></i></button>

                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-md-6 offset-md-3 pt-5">
                        <div class="form-group ">
                          <label style = "color: #000;"class="bmd-label-floating">Simbolo (ej: BNBUSDT)</label>
                          <input type="text" name="simbolo" id="simbolo" style="text-align: right; background:#ff9317; color:white;text-align:center" class="form-control" value="<?php echo (empty($id) ? $inversionOrden1 : $simbolo) ?>">
                        </div>
                      </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <h4>Orden 1 - OCO</h4>
                      </div>
                      <div class="col-md-6">
                        <input type="date" name="fechahoy" class="form-control today" style="background:none; border:none; text-align:right" readonly>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 offset-md-3">
                        
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <input type="date" name="fechamim1" id="fechamin1" class="form-control today1" style="background:none; border:none; text-align:center" readonly>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Side (BUY/SELL)</label>
                          <input type="text" id="side1" class="form-control" style="text-align: right; background-color: #e9ecef;" required pattern="BUY|SELL" title="SELL o BUY" value="<?php echo $side1 ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Precio de mercado</label>
                          <input type="number" id="precioMercado1" class="form-control" style="text-align: right;background-color: #e9ecef;" value="<?php  echo 24.000/*$precioMercado1 */?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <input type="date" name="fechamax1" id="fechamax1" class="form-control today2" style="background:none; border:none; text-align:center" readonly>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Precio Stop</label>
                          <input type="number" id="precioStop1" class="form-control" style="text-align: right;background-color: #e9ecef;" value="<?php   echo 40.000/*$precioStop1*/ ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">cantidad (ej: 0.1) </label>
                          <input type="number" id="cantidad1" class="form-control" style="text-align: right;background-color: #e9ecef;" value="<?php echo 0.5 /*$cantidad1*/ ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <input type="date" name="fechamax1" id="fechamax1" class="form-control today3" style="background:none; border:none; text-align:center" readonly>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Precio Stop Limit</label>
                          <input type="number" id="precioStopLimit1" class="form-control" style="text-align: right;background-color: #e9ecef;" value="<?php echo 35.000 /*$precioStopLimit1 */?>">
                        </div>
                      </div>
                    </div>
                    <!--
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Ganancia bruta (USD)</label>
                          <input type="number" id="gananciabruta1" class="form-control" style="text-align: right; background:black; color:white" value="<?php echo $gananciabruta1 ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Rentabilidad (%)</label>
                          <input type="number" id="retab1" class="form-control" style="text-align: right" value="<?php echo $retab1 ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Comisión (USD)</label>
                          <input type="number" id="comision1" class="form-control" style="text-align: right" value="<?php echo $comision1 ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Recupero (USD)</label>
                          <input type="number" id="recupero1" style="text-align: right" class="form-control" value="<?php echo $recupero1 ?>" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 offset-md-4">
                        <div class="form-group">
                          <select name="estado1" id="estado1" class="form-control" required>
                            <option value="Aceptado" <?php echo ($estado == 'Aceptado' ? 'selected' : '') ?>> Aceptado</option>
                            <option value="Rechazado" <?php echo ($estado == 'Rechazado' ? 'selected' : '') ?>> Rechazado</option>
                          </select>
                        </div>
                      </div>
                    </div>-->
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <h4>Orden 2</h4>
                      </div>
                      <div class="col-md-6">
                        <input type="date" name="fechahoy2" class="form-control today3" style="background:none; border:none; text-align:right" readonly>
                      </div>
                    </div>
                    <div class="row">
                      <!--
                      <div class="col-md-6 offset-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">INVERSIÓN (USD)</label>
                          <input type="number" name="orden2" id="orden2" style="text-align: right; background:#ff9317; color:white; text-align:center" class="form-control" value="<?php echo (empty($id) ? $inversionOrden2 : $orden2)   ?>" readonly>
                        </div>
                      </div>-->
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <input type="date" name="fechamim2" id="fechamin2" class="form-control today4" style="background:none; border:none; text-align:center" readonly>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Side (BUY/SELL)</label>
                          <input type="text" id="side2" class="form-control" style="text-align: right; background-color: #e9ecef;" required pattern="BUY|SELL" title="SELL o BUY" value="<?php echo $side2 ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Precio de mercado</label>
                          <input type="number" id="precioMercado2" class="form-control" style="text-align: right;background-color: #e9ecef;" value="<?php  $precioMercado2 ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <input type="date" name="fechamax2" id="fechamax2" class="form-control today5" style="background:none; border:none; text-align:center" readonly>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Precio Stop</label>
                          <input type="number" id="precioStop2" class="form-control" style="text-align: right;background-color: #e9ecef;" value="<?php  $precioStop2 ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">cantidad (ej: 0.1) </label>
                          <input type="number" id="cantidad2" class="form-control" style="text-align: right;background-color: #e9ecef;" value="<?php $cantidad2 ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <input type="date" name="fechamax1" id="fechamax1" class="form-control today3" style="background:none; border:none; text-align:center" readonly>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Precio Stop Limit</label>
                          <input type="number" id="precioStopLimit2" class="form-control" style="text-align: right;background-color: #e9ecef;" value="<?php  $precioStopLimit2 ?>">
                        </div>
                      </div>
                    </div>
                <!--  
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Ganancia bruta (USD)</label>
                          <input type="number" id="gananciabruta2" class="form-control" style="text-align: right; background:black; color:white" value="<?php echo $gananciabruta2 ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Rentabilidad (%)</label>
                          <input type="number" id="retab2" class="form-control" style="text-align: right" value="<?php echo $retab2 ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Comisión (USD)</label>
                          <input type="number" id="comision2" class="form-control" style="text-align: right" value="<?php echo $comision2 ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Recupero (USD)</label>
                          <input type="number" id="recupero2" style="text-align: right" class="form-control" value="<?php echo $recupero2 ?>" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 offset-md-4">
                        <div class="form-group">
                          <select name="estado2" id="estado2" class="form-control" required>
                            <option value="Aceptado" <?php echo ($estado == 'Aceptado' ? 'selected' : '') ?>> Aceptado</option>
                            <option value="Rechazado" <?php echo ($estado == 'Rechazado' ? 'selected' : '') ?>> Rechazado</option>
                          </select>
                        </div>
                      </div>
                    </div>
                -->
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <h4>Orden 3</h4>
                      </div>
                      <div class="col-md-6">
                        <input type="date" name="fechahoy3" class="form-control today8" style="background:none; border:none; text-align:right" readonly>
                      </div>
                    </div>
                    <!--
                    <div class="row">
                      <div class="col-md-6 offset-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">INVERSIÓN (USD)</label>
                          <input type="number" name="orden3" id="orden3" style="text-align: right; background:#ff9317; color:white; text-align:center" class="form-control" value="<?php echo (empty($id) ? $inversionOrden3 : $orden3)   ?>" readonly>
                        </div>
                      </div>
                    </div>-->
                    <div class="row">
                      <div class="col-md-4">
                        <input type="date" name="fechamim3" id="fechamin3" class="form-control today7" style="background:none; border:none; text-align:center" readonly>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Side (BUY/SELL)</label>
                          <input type="text" id="side3" class="form-control" style="text-align: right; background-color: #e9ecef;" required pattern="BUY|SELL" title="SELL o BUY" value="<?php echo $side3 ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Precio de mercado</label>
                          <input type="number" id="precioMercado3" class="form-control" style="text-align: right;background-color: #e9ecef;" value="<?php  $precioMercado3 ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <input type="date" name="fechamax3" id="fechamax3" class="form-control today6" style="background:none; border:none; text-align:center" readonly>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Precio Stop</label>
                          <input type="number" id="precioStop3" class="form-control" style="text-align: right;background-color: #e9ecef;" value="<?php  $precioStop3 ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Precio Stop Limit</label>
                          <input type="number" id="precioStopLimit3" class="form-control" style="text-align: right;background-color: #e9ecef;" value="<?php  $precioStopLimit3 ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <input type="date" name="fechamax1" id="fechamax1" class="form-control today3" style="background:none; border:none; text-align:center" readonly>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Precio Stop Limit</label>
                          <input type="number" id="precioStopLimit3" class="form-control" style="text-align: right;background-color: #e9ecef;" value="<?php  $precioStopLimit3 ?>">
                        </div>
                      </div>
                    </div>
                    <!--
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Ganancia bruta (USD)</label>
                          <input type="number" id="gananciabruta3" class="form-control" style="text-align: right; background:black; color:white" value="<?php echo $gananciabruta3 ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Rentabilidad (%)</label>
                          <input type="number" id="retab3" class="form-control" style="text-align: right" value="<?php echo $retab3 ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Comisión (USD)</label>
                          <input type="number" id="comision3" class="form-control" style="text-align: right" value="<?php echo $comision3 ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Recupero (USD)</label>
                          <input type="number" id="recupero3" style="text-align: right" class="form-control" value="<?php echo $recupero3 ?>" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 offset-md-4">
                        <div class="form-group">
                          <select name="estado3" id="estado3" class="form-control" required>
                            <option value="Aceptado" <?php echo ($estado == 'Aceptado' ? 'selected' : '') ?>> Aceptado</option>
                            <option value="Rechazado" <?php echo ($estado == 'Rechazado' ? 'selected' : '') ?>> Rechazado</option>
                          </select>
                        </div>
                      </div>
                    </div>-->
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <h4>Orden 4</h4>
                      </div>
                      <div class="col-md-6">
                        <input type="date" name="fechahoy4" class="form-control today9" style="background:none; border:none; text-align:right" readonly>
                      </div>
                    </div>
                    <!--
                    <div class="row">
                      <div class="col-md-6 offset-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">INVERSIÓN (USD)</label>
                          <input type="number" name="orden4" id="orden4" style="text-align: right; background:#ff9317; color:white; text-align:center" class="form-control" value="<?php echo (empty($id) ? $inversionOrden4 : $orden4)   ?>" readonly>
                        </div>
                      </div>
                    </div>-->
                    <div class="row">
                      <div class="col-md-4">
                        <input type="date" name="fechamim4" id="fechamin4" class="form-control today10" style="background:none; border:none; text-align:center" readonly>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Side (BUY/SELL)</label>
                          <input type="text" id="side4" class="form-control" style="text-align: right; background-color: #e9ecef;" required pattern="BUY|SELL" title="SELL o BUY" value="<?php echo $side4 ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Precio de mercado</label>
                          <input type="number" id="precioMercado4" class="form-control" style="text-align: right;background-color: #e9ecef;" value="<?php  $precioMercado4 ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <input type="date" name="fechamax4" id="fechamax4" class="form-control today11" style="background:none; border:none; text-align:center" readonly>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="bmd-label-floating">Precio Stop</label>
                          <input type="number" id="precioStop4" class="form-control" style="text-align: right;background-color: #e9ecef;" value="<?php  $precioStop4 ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="bmd-label-floating">Precio Stop Limit</label>
                          <input type="number" id="precioStopLimit4" class="form-control" style="text-align: right;background-color: #e9ecef;" value="<?php  $precioStopLimit4 ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <input type="date" name="fechamax1" id="fechamax1" class="form-control today3" style="background:none; border:none; text-align:center" readonly>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Precio Stop Limit</label>
                          <input type="number" id="precioStopLimit3" class="form-control" style="text-align: right;background-color: #e9ecef;" value="<?php  $precioStopLimit3 ?>">
                        </div>
                      </div>
                    </div>
                    <!--
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Ganancia bruta (USD)</label>
                          <input type="number" id="gananciabruta4" class="form-control" style="text-align: right; background:black; color:white" value="<?php echo $gananciabruta4 ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Rentabilidad (%)</label>
                          <input type="number" id="retab4" class="form-control" style="text-align: right" value="<?php echo $retab4 ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Comisión (USD)</label>
                          <input type="number" id="comision4" class="form-control" style="text-align: right" value="<?php echo $comision4 ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Recupero (USD)</label>
                          <input type="number" id="recupero4" style="text-align: right" class="form-control" value="<?php echo $recupero4 ?>" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 offset-md-4">
                        <div class="form-group">
                          <select name="estado4" id="estado4" class="form-control" required>
                            <option value="Aceptado" <?php echo ($estado == 'Aceptado' ? 'selected' : '') ?>> Aceptado</option>
                            <option value="Rechazado" <?php echo ($estado == 'Rechazado' ? 'selected' : '') ?>> Rechazado</option>
                          </select>
                        </div>
                      </div>
                    </div>-->
                    <div class="row">

                      <div class="col-lg-8" style="margin-bottom:0px">
                        <?php
                        if ($mensaje[0] == "IN") {
                          $tit = "Información!";
                          $css = "warning";
                        }
                        if ($mensaje[0] == "ER") {
                          $tit = "Error!";
                          $css = "danger";
                        }
                        if ($mensaje[0] == "OK") {
                          $tit = "OK!";
                          $css = "success";
                        }
                        ?>
                        <div class="alert alert-<?php echo $css ?>" style="margin-bottom:0px;padding:6px 12px"><strong><?php echo $tit ?></strong> <?php echo $mensaje[1] ?></div>
                      </div>
                      <div class="col-lg-4">
                        <div class="btn-group btn-group-md pull-right">
                          <button type="button" class="btn btn-dark "  onClick="location.href='listadoordenes.php'"><i class="fa fa-arrow-left"></i> Volver</button>
                          <button type="button" class="btn btn-primary" id="guardarOrden"><i class="fa fa-check"></i> <?php echo $id ? 'Actualizar' : 'Registrar' ?></button>
                        </div>
                      </div>

                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>


  </div>

  <?php include_once('scripts.html'); ?>

  

</body>

<script src="assets/js/crypto-js/crypto-js.js"></script>
<script src="assets/js/ajax.js?v=<?php echo time(); ?>"></script>
<script src="assets/js/binance-trade.js?v=<?php echo time(); ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<!--<script src="assets/js/orden.js"></script>-->
<script>
  let today = new Date().toISOString().substr(0, 10);
  document.querySelector(".today").value = today;
  let today1 = new Date().toISOString().substr(0, 10);
  document.querySelector(".today1").value = today1;
  let today2 = new Date().toISOString().substr(0, 10);
  document.querySelector(".today2").value = today2;
  let today3 = new Date().toISOString().substr(0, 10);
  document.querySelector(".today3").value = today3;
  let today4 = new Date().toISOString().substr(0, 10);
  document.querySelector(".today4").value = today4;
  let today5 = new Date().toISOString().substr(0, 10);
  document.querySelector(".today5").value = today5;
  let today6 = new Date().toISOString().substr(0, 10);
  document.querySelector(".today6").value = today6;
  let today7 = new Date().toISOString().substr(0, 10);
  document.querySelector(".today7").value = today7;
  let today8 = new Date().toISOString().substr(0, 10);
  document.querySelector(".today8").value = today8;
  let today9 = new Date().toISOString().substr(0, 10);
  document.querySelector(".today9").value = today9;
  let today10 = new Date().toISOString().substr(0, 10);
  document.querySelector(".today10").value = today10;
  let today11 = new Date().toISOString().substr(0, 10);
  document.querySelector(".today11").value = today11;
</script>

</html>