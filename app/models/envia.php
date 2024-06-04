<?php
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
$captcha=$_POST['g-recaptcha-response'];
$msjCorreo = "Nombre: $nombre<br/>E-Mail: $email<br/>Mensaje: $mensaje";

if(!$captcha){
          echo "<script language='javascript'>alert('Por Favor Ingrese el Captcha');window.location.href = 'http://www.pep-solutions.com.ar#contact';</script>";
          exit;
        }
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcuGhcTAAAAANpsczgl-zftbIUb1qm4cyH0fS6S&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        if($response.success==false)
        {
          echo "<script language='javascript'>alert('Error al enviar, intente nuevamente.');window.location.href = 'http://www.pep-solutions.com.ar';</script>";
        }else
        {
          if ($_POST) {
	require 'phpmailer/PHPMailerAutoload.php';
	$mail = new phpmailer();
	$mail->IsSMTP();
	$mail->SMTPDebug = 0;
	$mail->Debugoutput = "html";
	$mail->Host = "mail.pep-solutions.com.ar"; 
	$mail->Port = 465;
	$mail->SMTPSecure = "ssl";
	$mail->SMTPAuth = true;	
	$mail->Username = "info@pep-solutions.com.ar";
	$mail->Password = "Laboulaye2015";
	$mail->setFrom('info@pep-solutions.com.ar', 'PEP-SOLUTIONS Web');
	$mail->Subject = "Consulta - Web";
	$mail->msgHTML($msjCorreo);
	$mail->AddAddress("info@pep-solutions.com.ar");
	if($mail->Send()){
	  echo "<script language='javascript'>alert('Mensaje enviado, muchas gracias.');window.location.href = 'http://www.pep-solutions.com.ar';</script>";  
	} 
	else{
		echo "<script language='javascript'>alert('Error al enviar, intente nuevamente.');window.location.href = 'http://www.pep-solutions.com.ar';</script>";  
	}
}
}




?>


