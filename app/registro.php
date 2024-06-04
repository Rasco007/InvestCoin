<?php
session_start();

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

/*REGISTRO - la idea es hacerlo en registro.php */
	if ($_POST) 
	{
		include_once("includes/funciones.php");
		include 'smtp/Send_Mail.php';
		
		var_dump("se envia por POST");
		/*$codigo = $_POST['usu_codigo'];*/ 
		$nombre = $_POST['usu_nombre'];
		$apellido = $_POST['usu_apellido'];
		$mail = $_POST['usu_mail'];
		$contraseña = $_POST['usu_password'];
		$contraseña_repetida = $_POST['usu_password_repetir'];
		$dni = $_POST['usu_dni'];
		$nivel = "C";
		
		$activation=md5($mail.time());
		$base_url='http://localhost/app/';
		
		/*Agarro dato de las fotos del DNI*/ 
		
		$archivo_foto_delantera = $_FILES['foto_dni_delantera']['tmp_name'];
		$tamanio_foto_delantera = $_FILES["foto_dni_delantera"]["size"];
		$archivo_foto_trasera = $_FILES['foto_dni_trasera']['tmp_name'];
		$tamanio_foto_trasera = $_FILES["foto_dni_trasera"]["size"];
		

		$contenido_foto_delantera = trabajarImagen($archivo_foto_delantera, $tamanio_foto_trasera);
		$contenido_foto_trasera   = trabajarImagen($archivo_foto_trasera, $tamanio_foto_trasera);

		/*Meto en BD*/
	  if ($nombre != "" && $apellido != "" && $contraseña != "" && $mail != "" && $dni != "") 
	  {
		var_dump("usuario y contra no son nulos");
		
		if ($contraseña != $contraseña_repetida) {
			$mensaje = "<b>Las contraseñas no coinciden!</b> Intente nuevamente.";
			$css_alert = "danger";  
		  } else if($contenido_foto_delantera == $contenido_foto_trasera){
				$mensaje = "<b>las fotos del documento son las mismas!</b> Intente nuevamente.";
				$css_alert = "danger";  
			} else {
				$sql = "SELECT * FROM usuarios WHERE usu_mail='$mail'";
				if (!consulta_sql($sql)) 
				{
					$contraseña = base64_encode ($contraseña);// encrypted password
					/*$contraseña = base64_decode($contraseña);*/
					var_dump("no existe usuario existente en BD");
					$sql = "INSERT INTO usuarios (`usu_nombre`,`usu_apellido`,`usu_mail`,`usu_password`,`usu_dni`,`foto_dni_frontal`,`foto_dni_trasera`,`activation`,`usu_nivel`) 
							VALUES ('$nombre','$apellido','$mail','$contraseña','$dni','$contenido_foto_delantera','$contenido_foto_trasera','$activation','$nivel')";
					if (consulta_sql($sql)) 
					{
						var_dump("registro completo");
						$mensaje = "<b>Registro completo.</b>";
						$_SESSION['usu'] = true;
						/*header("location:home.php");*/
						// sending email
						
						$to=$mail;
						$subject="Email verification";
						/*no pude meter imagen del localhost*/
						$body='<img style="width:100px;height:100px" src="https://assets.coingecko.com/coins/images/1/large/bitcoin.png?1547033579"><br/> <br/> Hi, '.$nombre.' We need to make sure you are human. Please verify your email and get started using your Website account. <br/> <br/> <a href="'.$base_url.'activation.php?code='.$activation.'">'.$base_url.'activation.php?code='.$activation.'</a>';


						Send_Mail($to,$subject,$body);
						header("location:esperaverificacion.php");

					}   else{
						var_dump("da False");
						$mensaje =  "No se pudo realizar el registro, intente nuevamente";
					}
				} else {
					var_dump("no");
					$mensaje = "<b>ya existe un usuario con ese mail!</b> Intente nuevamente.";
					$css_alert = "danger";  
				}
		
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
	<link rel="stylesheet" href="css/main.css?v=<?php echo(rand()); ?>" /> <!--puse asi para que se refresque el css-->

   <!-- <link rel="stylesheet" type="text/css" href="css/main.css">-->
    <!--<link rel="stylesheet" type="text/css" href="css/mainRegistro.css">-->

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
				
				<form name="frm" method="post" class="login100-form validate-form" enctype="multipart/form-data">
					<?php if (!empty($_GET['debug']) == "1" || 1 == 1) { ?>

					<span class="login100-form-avatar">
						<img src="assets\img\avatar-01.jpg" alt="AVATAR">
					</span>

                    <div class="registro">
						<h1>Registro</h1>
                    </div>
                    
					

					<div class="wrap-input100 validate-input m-t-35 m-b-35" data-validate="Ingresar Nombre">
						<input class="input100" type="text"  name="usu_nombre">
						<span class="focus-input100" data-placeholder="Nombre"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-35" data-validate="Ingresar Apellido">
						<input class="input100" type="text"  name="usu_apellido">
						<span class="focus-input100" data-placeholder="Apellido"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-35" data-validate="Ingresar Mail">
						<input class="input100" type="email"  name="usu_mail">
						<span class="focus-input100" data-placeholder="Mail"></span>
					</div>
					
					<div class="campo contra wrap-input100 validate-input m-b-35" data-validate="Ingresar Contraseña">
						<input  class="input100" type="password" name="usu_password" id="password">
						<span class="focus-input100" data-placeholder="Contraseña"></span>
						<span class="mostrar"><i class="far fa fa-eye ojo"></i></span>
					</div>

					<div class="campo repetir-contra wrap-input100 validate-input m-b-35" data-validate="Ingresar Contraseña">
						<input  class="input100" type="password" name="usu_password_repetir" id="password1">
						<span class="focus-input100" data-placeholder="Repetir Contraseña"></span>
						<span class="mostrar"><i class="far fa fa-eye ojo"></i></span>
					</div>
					

					<div class="wrap-input100 validate-input m-b-35" data-validate="Ingresar DNI">
						<input class="input100 inputDNI" type="number" min="1000000" name="usu_dni">
						<span class="focus-input100" data-placeholder="DNI"></span>
					</div>

					<div class="pedirDNI clearfix m-b-35">
						<p>parte frontal del DNI</p>
						<div id="imagen-dni"class="imagen-DNI col-md-6 col-sm-6 col-xs-6 validate-input" data-validate="Ingresar Foto delantera del DNI">
							<input id="input-imagen"type="file" class="imagen-DNI-input-file" name="foto_dni_delantera" accept="image/x-png,image/gif,image/jpeg" >
							<div id="div-icono">
								<span class="texto-imagen-dni">Subir Imagen...</span>
							</div>
						</div>
					</div>

					<div class="pedirDNI clearfix m-b-35">
						<p>parte trasera del DNI</p>
						<div id="imagen-dni1"class="imagen-DNI col-md-6 col-sm-6 col-xs-6 validate-input" data-validate="Ingresar Foto delantera del DNI">
							<input id="input-imagen1" type="file" class="imagen-DNI-input-file" name="foto_dni_trasera" accept="image/x-png,image/gif,image/jpeg">
							<div id="div-icono1">
								<span class="texto-imagen-dni1">Subir Imagen...</span>
							</div>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button  type="submit" class="login100-form-btn"> Ingresar</button>
					</div>

					<?php } else {
                      echo '<div class="alert alert-warning" style="margin-top:60px">Estamos realizando tareas de mantenimiento, a la brevedad reestableceremos el servicio.</div>';
                    } ?>
					
                    <div class="alert alert-<?php echo $css_alert ?> text-center" role="alert" style="padding:0px 12px; margin-top: 12px;"><?php echo $mensaje ?></div>

					<ul class="login-more ">

						

						<li>
							<span class="txt1">Ya tienes una cuenta?</span>

							<a href="index.php" class="txt2">Logueate</a>
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
	<script src="assets/js/main.js?v=<?php echo(rand()); ?>"></script>

	<script src="assets/js/cryptohopper.js"></script>

	
    <!--<script src="https://www.cryptohopper.com/widgets/js/script"></script>-->
	<?php include_once('scripts.html')?>
</body>


</html>