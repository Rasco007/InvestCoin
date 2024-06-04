<?php
error_reporting(0);
date_default_timezone_set('America/Argentina/Buenos_Aires');
foreach ($_GET as $k => $v) $_GET[$k] = mb_detect_encoding($v, 'UTF-8', true) ? $v : utf8_encode($v);
@session_start();

function consulta_sql($sql)
{
	if (!$sql) return false;
	if ($_SERVER['SERVER_NAME'] == "localhost")
		$link = new mysqli('localhost', 'root', null, 'investcoin');
	else $link = new mysqli("192.168.0.63", "invertcoin1", "Laboulaye2021", "investcoin");

	if ($link->connect_errno) echo "Falló la conexión con MySQL: (" . $link->connect_errno . ") " . $link->connect_error;
	$res = $link->query($sql);
	if (stristr(substr($sql, 0, 6), "SELECT")) {
		if ($res->num_rows > 0) {
			while ($row = $res->fetch_assoc()) {
				foreach ($row as $k => $v) $row[$k] = str_replace("´", "'", mb_detect_encoding($v, 'UTF-8', true) ? $v : utf8_encode($v));
				$array_result[] = $row;
			}
			return $array_result;
			
		} else {
			return false;
		}
	}
	
	if ($res) {
		return true;
	} else {
		return false;
	}
}
function trabajarImagen($archivo, $tamaño){
	$fp = fopen($archivo, "rb");
	$contenido = fread($fp, $tamaño);
	$contenido = addslashes($contenido);
	fclose($fp); 
	return $contenido;
}
function getPerfilCliente($id)
{
	$res = consulta_sql("SELECT idPerfil FROM clientes WHERE idCliente=$id");
	$idPerfil = $res[0]['idPerfil'];
	return $idPerfil;
}


