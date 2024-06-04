<?php
session_start();
if (!$_SESSION["usu"]) header("location:./");
include_once("includes/funciones.php");

$id = $_REQUEST["id"];

if ($_POST && !empty($_POST)) {
  foreach ($_POST as $x => $v) $$x = $v;
}



if ($_POST["accion"] == "G" && $id != "") {
  if ($usu_password_c != "" && $usu_password != $usu_password_c) {
    $mensaje = array("ER", "Las contraseñas no coinciden");
  } else {
    if ($usu_codigo != "") {

      $sql = "UPDATE usuarios SET
                  usu_codigo='$usu_codigo',
                    usu_password='$usu_password',
                    usu_nombre='$usu_nombre',
                    usu_estado='$usu_estado',
                    usu_nivel='$usu_nivel'
                  WHERE usu_codigo='$id'";

      if (consulta_sql($sql)) {
        $mensaje = array("OK", "Actualización completa");
      } else {
        $mensaje = array("ER", "Complete todos los campos");
      }
    }
  }
}
if ($_POST["accion"] == "G" && $id == "") {
  if ($usu_codigo != "" && $usu_password != "") {
    if ($usu_password != $usu_password_c) {
      $mensaje = array("ER", "Las contraseñas no coinciden");
    } else {
      if (!consulta_sql("SELECT * FROM usuarios WHERE usu_codigo='$usu_codigo'")) {

        $sql = "INSERT INTO usuarios (`usu_codigo`,`usu_password`,`usu_nombre`, `usu_estado`,`usu_nivel`)
          		      VALUES ('$usu_codigo','$usu_password','$usu_nombre','$usu_estado','$usu_nivel')";

        if (consulta_sql($sql)) {
          $mensaje = array("OK", "Registro completo");
          $id = $usu_codigo;
        } else {
          $mensaje = array("ER", "Problemas al registrar, intente nuevamente<br>" . $sql);
        }
      } else {
        $mensaje = array("ER", "El nombre de usuario ya está registrado, intente con otro.");
      }
    }
  } else {
    $mensaje = array("ER", "Complete todos los campos");
  }
}


if (!empty($id)) {
  $sql = "SELECT * FROM usuarios WHERE usu_codigo='$id'";
  $res = consulta_sql($sql);
  foreach ($res[0] as $k => $v) $$k = $v;
}


?>

<!DOCTYPE html>
<html lang="es">

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
                  <h2 class="card-title"><?php echo (!empty($id) ? 'Editar Usuario' : 'Alta de Usuario') ?></h2>
                  <p class="card-category">Complete los campos necesarios</p>
                </div>
                <div class="card-body">
                  <form id="frm" action="" target="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="accion" value="">

                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombre</label>
                          <input type="text" name="usu_nombre" class="form-control" value="<?php echo $usu_nombre ?>" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Usuario</label>
                          <input type="text" name="usu_codigo" class="form-control" value="<?php echo $usu_codigo ?>" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <select name="usu_nivel" class="form-control" required>
                            <option value="">Seleccione el tipo de usuario...</option>
                            <option value="A" <?php echo ($usu_nivel == 'A' ? 'selected' : '') ?>> Administrador</option>
                            <option value="S" <?php echo ($usu_nivel == 'S' ? 'selected' : '') ?>> Supervisor</option>
                            <option value="E" <?php echo ($usu_nivel == 'E' ? 'selected' : '') ?>> Empleado</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contraseña</label>
                          <input type="password" class="form-control input" name="usu_password" placeholder="" value="<?php echo $usu_password ?>" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirmar Contraseña</label>
                          <input type="password" class="form-control input" name="usu_password_c" placeholder="" required>
                        </div>
                      </div>

                      

                      <div class="col-md-4">
                        <div class="form-group">
                          <select name="usu_estado" class="form-control" required>
                            <option value="">Seleccione el estado...</option>
                            <option value="Activo" <?php echo ($usu_estado == 'Activo' ? 'selected' : '') ?>> Activo</option>
                            <option value="Inactivo" <?php echo ($usu_estado == 'Inactivo' ? 'selected' : '') ?>> Inactivo</option>
                          </select>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-4">
                        <h5><span class="badge badge-secondary">(*) Opcional</span></h5>
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
                          <button type="button" class="btn btn-black" onClick="location.href='listadousuarios.php'"><i class="fa fa-arrow-left"></i> Volver</button>
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