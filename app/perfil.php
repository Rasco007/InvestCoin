<?php
session_start();
if (!$_SESSION["usu"]) header("location:./");
include_once("includes/funciones.php");

$id = $_REQUEST["id"];

if ($_POST && !empty($_POST)) {
  foreach ($_POST as $x => $v) $$x = $v;
}



if ($_POST["accion"] == "G" && $id != "") {
  $sql = "UPDATE perfil SET
                    perfil='$perfil',
                    minOr1='$minOr1',
                    maxOr1='$maxOr1',
                    minOr2='$minOr2',
                    maxOr2='$maxOr2',
                    minOr3='$minOr3',
                    maxOr3='$maxOr3',
                    minOr4='$minOr4',
                    maxOr4='$maxOr4',
                    orden1='$orden1',
                    orden2='$orden2',
                    orden3='$orden3',
                    orden4='$orden4'
                  WHERE idPerfil='$id'";

  if (consulta_sql($sql)) {
    $mensaje = array("OK", "Actualización completa");
  } else {
    $mensaje = array("ER", "Complete todos los campos");
  }
}


if ($_POST["accion"] == "G" && $id == "") {

  if (!consulta_sql("SELECT * FROM perfil WHERE programa='$perfil'")) {

    $sql = "INSERT INTO perfil (`perfil`, `orden1`, `orden2`,`orden3`,`orden4`,`minOr1`,`minOr2`,`minOr3`,`minOr4`,`maxOr1`,`maxOr2`,`maxOr3`,`maxOr4`)
          		      VALUES ('$perfil','$orden1','$orden2','$orden3','$orden4','$minOr1','$minOr2','$minOr3','$minOr4','$maxOr1','$maxOr2','$maxOr3','$maxOr4')";

    if (consulta_sql($sql)) {
      $mensaje = array("OK", "Registro completo");
    } else {
      $mensaje = array("ER", "Problemas al registrar, intente nuevamente<br>");
    }
  } else {
    $mensaje = array("ER", "El Programa ya está registrado, intente con otro.");
  }
}



if (!empty($id)) {
  $sql = "SELECT * FROM perfil WHERE idPerfil = '$id'";
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
                  <h2 class="card-title"><?php echo (!empty($id) ? 'Editar Perfil' : 'Alta de Perfil') ?></h2>
                  <p class="card-category">Complete los campos necesarios</p>
                </div>
                <div class="card-body">
                  <form id="frm" action="" target="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="accion" value="">

                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Perfil</label>
                          <input type="text" name="perfil" class="form-control" value="<?php echo $perfil ?>" required>
                        </div>
                      </div>
                    </div>
                    <hr />
                    <div class="text-center">
                      <h5 class="text-info">Orden 1</h5>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">% Orden 1</label>
                          <input type="number" name="orden1" class="form-control" value="<?php echo $orden1 ?>" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">% Minimo</label>
                          <input type="number" name="minOr1" class="form-control" value="<?php echo $minOr1 ?>" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">% Maximo</label>
                          <input type="number" name="maxOr1" class="form-control" value="<?php echo $maxOr1 ?>" required>
                        </div>
                      </div>
                    </div>
                    <hr />
                    <div class="text-center">
                      <h5 class="text-info">Orden 2</h5>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">% Orden 2</label>
                          <input type="number" name="orden2" class="form-control" value="<?php echo $orden2 ?>" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">% Minimo</label>
                          <input type="number" name="minOr2" class="form-control" value="<?php echo $minOr2 ?>" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">% Maximo</label>
                          <input type="number" name="maxOr2" class="form-control" value="<?php echo $maxOr2 ?>" required>
                        </div>
                      </div>
                    </div>
                    <hr />
                    <div class="text-center">
                      <h5 class="text-info">Orden 3</h5>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">% Orden 3</label>
                          <input type="number" name="orden3" class="form-control" value="<?php echo $orden3 ?>" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">% Minimo</label>
                          <input type="number" name="minOr3" class="form-control" value="<?php echo $minOr3 ?>" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">% Maximo</label>
                          <input type="number" name="maxOr3" class="form-control" value="<?php echo $maxOr3 ?>" required>
                        </div>
                      </div>
                    </div>
                    <hr />
                    <div class="text-center">
                      <h5 class="text-info">Orden 4</h5>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">% Orden 4</label>
                          <input type="number" name="orden4" class="form-control" value="<?php echo $orden4 ?>" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">% Minimo</label>
                          <input type="number" name="minOr4" class="form-control" value="<?php echo $minOr4 ?>" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">% Maximo</label>
                          <input type="number" name="maxOr4" class="form-control" value="<?php echo $maxOr4 ?>" required>
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
                          <button type="button" class="btn btn-black" onClick="location.href='listadoperfiles.php'"><i class="fa fa-arrow-left"></i> Volver</button>
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