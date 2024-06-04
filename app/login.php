<?php 
 if ($_POST) {
	$codigo = $_POST['usu_codigo'];
	$contraseña = $_POST['usu_password'];
  if ($_POST['usu_codigo'] != "" && $_POST['usu_password'] != "") {
    include_once("includes/funciones.php");
    $sql = "SELECT * FROM usuarios WHERE usu_codigo='" . $codigo . "' AND usu_estado='Activo' AND usu_password='" . $contraseña . "'";
    if ($res = consulta_sql($sql)) {
      $_SESSION['usu'] = $res[0];
      consulta_sql("UPDATE usuarios SET usu_ult_acceso='" . date("d/m/Y H:i:s") . "' WHERE usu_codigo='" . $codigo . "' AND usu_estado='Activo' AND usu_password='" . $contraseña . "'");
      header("location:home.php");
    } else {
      $_SESSION['usu'] = false;
      header("location:home.php");
      $mensaje = "<b>Datos incorrectos!</b> Intente nuevamente.";
      echo $mensaje;
      $css_alert = "danger";
    }
  }
}

?>
