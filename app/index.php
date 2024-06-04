<?php
session_start();
include 'db.php';

/* 
if (!empty($_SESSION['usu']) && $_GET['exit']) {
  $_SESSION['usu'] = false;

  header("location:./");
}
if (!empty($_SESSION['usu'])) {
  header("location:home.php");
}
*/

$mensaje = "";
$css_alert = "info1";

/*LOGIN - la idea es hacerlo en login.php */
if ($_POST) {
	$mail = $_POST['usu_mail'];
	$contraseña = $_POST['usu_password'];
  if ($mail != "" && $contraseña != "") {
	include_once("includes/funciones.php");

	$mail=mysqli_real_escape_string($connection,$mail);
	$result= mysqli_query($connection,"SELECT * FROM usuarios WHERE usu_mail='$mail'");
	/*$contraseña_desencriptada = base64_decode($contraseña_encriptada);*/
	$ret = mysqli_fetch_array($result);  
	$contraseña_encriptada = $ret["usu_password"]; 
	$contraseña_desencriptada = base64_decode($contraseña_encriptada);

	var_dump($contraseña_desencriptada);
	var_dump('la contraseña desencriptada es '.$contraseña);
	var_dump('el mail es '.$mail);

	/*para el ADMIN*/
	$sql = "SELECT * FROM usuarios WHERE usu_mail='$mail' and usu_password='$contraseña' and status='1' and usu_nivel ='A'";
	if ($res = consulta_sql($sql)){
		$_SESSION['usu'] = $res[0];
		header("location:home.php");

	}else if ($contraseña == $contraseña_desencriptada) {
		
    $sql = "SELECT * FROM usuarios WHERE usu_mail='$mail' and usu_password='$contraseña_encriptada' and status='1'";
    if ($res = consulta_sql($sql)) {
      $_SESSION['usu'] = $res[0];
      consulta_sql("UPDATE usuarios SET usu_ult_acceso='" . date("d/m/Y H:i:s") . "' WHERE usu_mail='" . $mail . "' AND status=1 AND usu_password='" . $contraseña . "'");
      header("location:home.php");
    } else {
      $_SESSION['usu'] = false;
      $mensaje = "<b>Datos incorrectos!</b> Intente nuevamente.";
	  $css_alert = "danger";
	  }
    }else {
		$_SESSION['usu'] = false;
		$mensaje = "<b>Datos incorrectos!</b> Intente nuevamente.";
		$css_alert = "danger";
	}
  }
}


?>
<!DOCTYPE html>
<html lang="en">
	
<head>
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<title>InvestCoin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="assets/css/mainCrypto.min.css">


</head>

<body>
	<header>
		<div class="cryptohopper-web-widget" data-id="2" data-theme="dark" data-ticker_position="header">
			
		</div>
	</header>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-b-20">
				
				<form name="frm" method="post" class="login100-form validate-form">
					<?php if (!empty($_GET['debug']) == "1" || 1 == 1) { ?>

					<span class="login100-form-avatar">
						<img src="assets\img\avatar-01.jpg" alt="AVATAR">
					</span>


					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate="Ingresar Mail">
						<input class="input100" type="text"  name="usu_mail">
						<span class="focus-input100" data-placeholder="Usuario"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Ingresar Contraseña">
						<input class="input100" type="password" name="usu_password">
						<span class="focus-input100" data-placeholder="Contraseña"></span>
					</div>

					<div class="container-login100-form-btn">
						<button  type="submit" class="login100-form-btn"> Ingresar</button>
					</div>

					<?php } else {
                      echo '<div class="alert alert-warning" style="margin-top:60px">Estamos realizando tareas de mantenimiento, a la brevedad reestableceremos el servicio.</div>';
                    } ?>
					
                    <div class="alert alert-<?php echo $css_alert ?> text-center" role="alert" style="padding:0px 12px; margin-top: 12px;"><?php echo $mensaje ?></div>

					<ul class="login-more ">

						<li class="m-b-8">
							<span class="txt1">Olvidaste tu</span>
							<a href="#" class="txt2">Usuario / Contraseña?</a>
						</li>

						<li>
							<span class="txt1">Todavía no tienes una cuenta?</span>

							<a href="registro.php" class="txt2">Regístrate</a>
						</li>

					</ul>
				</form>

			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assets/js/main.js"></script>
	<script src="assets/js/cryptohopper.js"></script>

	
    <!--<script src="https://www.cryptohopper.com/widgets/js/script"></script>-->
	<?php include_once('scripts.html') ?>
</body>
</html>