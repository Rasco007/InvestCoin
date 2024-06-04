<?php
session_start();
if (!$_SESSION["usu"]) header("location:./");
include_once("includes/funciones.php");

$id = $_REQUEST["id"];

if ($_POST && !empty($_POST)) {
  foreach ($_POST as $x => $v) $$x = $v;
}



if ($_POST["accion"] == "G" && $id != "") {
  $sql = "UPDATE clientes SET
                  nombre='$nombre',
                    dni='$dni',
                    billetera='$billetera',
                    idPerfil='$idPerfil',
                    estado='$estado',
                    observacion='$observacion'
                  WHERE idCliente='$id'";

  if (consulta_sql($sql)) {
    $mensaje = array("OK", "Actualización completa");
  } else {
    $mensaje = array("ER", "Complete todos los campos");
  }
}


if ($_POST["accion"] == "G" && $id == "") {

  if (!consulta_sql("SELECT * FROM clientes WHERE dni='$dni'")) {

    $sql = "INSERT INTO clientes (nombre, dni, billetera, idPerfil, estado, observacion)
          	VALUES ('$nombre','$dni', '$billetera', '$idPerfil','$estado','$observacion')";
    if (consulta_sql($sql)) {
      $sql1 = "SELECT max(idCliente) as idCliente FROM clientes";
      $idClienteSql = consulta_sql($sql1);
      $idCliente = $idClienteSql[0]['idCliente'];
      if (consulta_sql($sql1)) {
        $sql2 = "INSERT INTO usuarios (usu_codigo,usu_estado,usu_nombre,usu_password,idCliente, usu_nivel) 
            VALUES ('$dni','Activo','$dni','$dni','$idCliente','C')";
        consulta_sql($sql2);
      } else {
        $mensaje = array("ER", "Problemas al registrar, intente nuevamente<br>");
      }
      $mensaje = array("OK", "Registro completo");
    } else {
      $mensaje = array("ER", "Problemas al registrar, intente nuevamente<br>");
    }
  } else {
    $mensaje = array("ER", "El Cliente ya está registrado, intente con otro.");
  }
}



if (!empty($id)) {
  $sql = "SELECT * FROM clientes WHERE idCliente='$id'";
  $res = consulta_sql($sql);
  foreach ($res[0] as $k => $v) $$k = $v;
}


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
                  <h2 class="card-title"><?php echo (!empty($id) ? 'Editar Cliente' : 'Alta de Cliente') ?></h2>
                  <p class="card-category">Complete los campos necesarios</p>
                </div>
                <div class="card-body">
                  <form id="frm" action="" target="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="accion" value="">

                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombre</label>
                          <input type="text" name="nombre" class="form-control" value="<?php echo $nombre ?>" required>
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">DNI</label>
                          <input type="text" name="dni" class="form-control" value="<?php echo $dni ?>" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <select name="idPerfil" class="form-control">
                            <option value="">Seleccione un Perfil...(*)</option>
                            <?php $sql = "SELECT * FROM perfil";
                            $res = consulta_sql($sql);
                            foreach ($res as $suc) {
                              echo '<option value="' . $suc['idPerfil'] . '" ' . ($idPerfil == $suc['idPerfil'] ? 'selected' : '') . '>' . $suc['perfil'] . '</option>';
                            } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Billetera</label>
                          <input type="text" name="billetera" class="form-control" value="<?php echo $billetera ?>" required>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <select name="estado" class="form-control" required>
                            <option value="Activo" <?php echo ($estado == 'Activo' ? 'selected' : '') ?>> Activo</option>
                            <option value="Inactivo" <?php echo ($estado == 'Inactivo' ? 'selected' : '') ?>> Inactivo</option>
                          </select>
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Observaciones</label>
                          <textarea class="form-control rounded-0" name="observacion" rows="5"><?php echo $observacion ?></textarea>

                        </div>
                      </div>
                    </div>




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
                          <button type="button" class="btn btn-black" onClick="location.href='listadoclientes.php'"><i class="fa fa-arrow-left"></i> Volver</button>
                          <button type="submit" class="btn btn-primary" onclick="frm.accion.value='G'"><i class="fa fa-check"></i> <?php echo $id ? 'Actualizar' : 'Registrar' ?></button>
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

</html>