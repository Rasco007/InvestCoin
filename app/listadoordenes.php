<?php
session_start();
if (!$_SESSION["usu"]) header("location:./");
include_once("includes/funciones.php");

foreach ($_POST as $key => $value) $$key = $value;

$mensaje = array("IN", "Complete todos los campos");


?>

<!DOCTYPE html>
<html lang="es">

<?php include_once('head.html'); ?>

<body class="">
  <div class="wrapper ">

    <script type="text/javascript" src="activar_menu.js"></script>
    <?php include_once('sidebar.php'); ?>



    <div class="main-panel">
      <!-- Navbar -->
      <?php include_once('navbar.php'); ?>

      <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="col-md-12">
          <div class="d-sm-flex align-items-center justify-content-between ">
            <h3 class="font-weight"></h3>
          </div>
        </div>


        <div class="card" style="margin-top:6.3em">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Listado de Ordenes
            </h4>

          </div>
          <div class="card-body">
            <div class="pull-right">
              <a class="btn btn-dark "  href="orden.php"><i class="fa fa-plus-circle" style="padding-right: 3px"></i> Solicitar nueva orden</a>
            </div>

            <div class="table-responsive">



              <?php

              if ($_SESSION['usu']['usu_nivel'] == 'A') {
                $sql = "SELECT c.usu_nombre as cliente, o.idOrden, o.fechamin1 , o.inversion 
               FROM usuarios c, ordenes o 
               WHERE o.idcliente=c.idUsuario";
              } else {
                $sql = "SELECT c.usu_nombre as cliente, o.* FROM ordenes o INNER JOIN usuarios c ON o.idCliente=c.idUsuario WHERE o.idCliente = '" . $_SESSION['usu']['idUsuario'] . "'";
              }
              if ($res = consulta_sql($sql)) {


                echo '

                <table class="table table-bordered table-hover table-responsive-md"  id="dataTable" style="width:100%">
           
                <thead style="background: black;color: white;">
                <tr>
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Inversion</th> 
                                <th><button type="button" style="padding: 3px; margin:1px" class="btn btn-xs btn-danger" onclick="window.open(\'orden.php?id=' . $x['idOrden'] . '\',\'_self\')" data-toggle="tooltip" data-placement="top" title="VER"><i class="fa fa-plus"></i> </button></th>                           
                              </tr>
                            </thead>
                            <tbody>
          				   ';
              }
        
              foreach ($res as $x) {

                echo '
                 <tr class="text-center">
                    <td>' . $x['fechamin1'] . '</td>
                    <td>' . $x['cliente'] . '</td> 
                    <td>' . $x['inversion'] . '</td> 
                    <td>
                    <button type="button" style="padding: 3px; margin:1px" class="btn btn-xs btn-warning" onclick="window.open(\'orden.php?id=' . $x['idOrden'] . '\',\'_self\')" data-toggle="tooltip" data-placement="top" title="VER"><i class="fa fa-eye"></i> </button>
                    </td>
                </tr>
                ';
              }
              ?>
              

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once('scripts.html'); ?>
  <?php include_once('scriptstabla.html'); ?>

  <script>
    $(document).ready(function() {
      var table = $('#dataTable').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        pageLength: 25,
        buttons: [{
            extend: 'copy',
            text: 'Copiar'
          },
          'excel',
          {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            pageSize: 'LEGAL',

          }
        ],

        language: {
          url: 'https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json',
          buttons: {
            copyTitle: 'Copiado al Portapapeles',
            copySuccess: {
              _: '%d lineas copiadas',
              1: '1 linea copiada'
            }
          }
        }
      });

      table.buttons().container()
        .appendTo('#dataTable_wrapper .col-md-6:eq(0)');

    });
  </script>
</body>

</html>