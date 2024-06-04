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
            <h4 class="card-title ">Listado de Clientes
            </h4>

          </div>
          <div class="card-body">
            <div class="pull-right">
              <a class="btn btn-dark " href="clientes.php"><i class="fa fa-plus-circle" style="padding-right: 3px"></i> Agregar Cliente</a>
            </div>

            <div class="table-responsive">



              <?php


              $sql = "SELECT c.idCliente, c.nombre, c.dni, c.billetera, p.perfil, c.estado, c.observacion
                from clientes c, perfil p
                where p.idPerfil= c.idPerfil";


              if ($res = consulta_sql($sql)) {


                echo '

                <table class="table table-bordered table-hover table-responsive-md"  id="dataTable" style="width:100%">
           
                <thead style="background: black;color: white;">
                <tr>
                                <th>Nombre y Apellido</th>
                                <th>DNI</th>
                                <th>Billetera</th> 
                                <th>Perfil</th> 
                                <th>Estado</th> 
                                <th>Observaciones</th>
                                <th></th>                           
                              </tr>
                            </thead>
                            <tbody>
          				   ';
              }

              foreach ($res as $x) {
                if ($x['estado'] == 'Activo') {
                  $estad = '<i class="fa fa-check-circle" style="color: green; font-size:2em"></i>';
                } else {
                  $estad = '<i class="fa fa-times-circle" style="color: red; font-size:2em"></i>';
                }
                echo '
                 <tr class="text-center">
                    <td>' . $x['nombre'] . '</td>
                    <td>' . $x['dni'] . '</td> 
                    <td>' . $x['billetera'] . '</td> 
                    <td>' . $x['perfil'] . '</td> 
                    <td >' . $estad . '</td> 
                    <td>' . $x['observacion'] . '</td> 
                    <td>
                    <button type="button" style="padding: 3px; margin:1px" class="btn btn-xs btn-warning" onclick="window.open(\'clientes.php?id=' . $x['idCliente'] . '\',\'_self\')" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i> </button>
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