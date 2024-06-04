<div class="sidebar" data-color="azure" data-background-color="white">
  <div class="logo">
    <a href="home.php" class="simple-text logo-normal">
      <img src="assets/img/logo-alt.png" width="180" class="img-responsive">
    </a>

  </div>
  <!-- Sidebar  -->

<div class="sidebar-wrapper">
    <ul class="list-group ">
      <a href="home.php" class=" list-group-item list-group-item-action item-menu" style="border: 0px !important">
        <div class="d-flex w-100 justify-content-start align-items-center item-menu">
          <i class="material-icons mr-3">home</i>
          <span class="menu-collapsed">Inicio</span>
        </div>
      </a>

      <a href="listadoordenes.php" class=" list-group-item list-group-item-action item-menu" style="border: 0px !important">
        <div class="d-flex w-100 justify-content-start align-items-center ">
          <i class="material-icons mr-3">request_quote</i>
          <span class="menu-collapsed">Ordenes</span>
        </div>
      </a>

      <!--<a href="listadoniños.php" class=" list-group-item list-group-item-action item-menu" style="border: 0px !important">
        <div class="d-flex w-100 justify-content-start align-items-center ">
          <i class="material-icons mr-3">face</i>
          <span class="menu-collapsed">Niños</span>
        </div>
      </a>
      <a href="listadoadultos.php" class=" list-group-item list-group-item-action item-menu" style="border: 0px !important">
        <div class="d-flex w-100 justify-content-start align-items-center ">
          <i class="material-icons mr-3">supervisor_account</i>
          <span class="menu-collapsed">Adultos</span>
        </div>
      </a>-->
      <?php if ($_SESSION['usu']['usu_nivel'] == 'A') {m ?>
      
      <a href="#submenu3" data-toggle="collapse" aria-expanded="false" class=" list-group-item list-group-item-action flex-column align-items-start item-menu" style="border: 0px !important">
        <div class="d-flex w-100 justify-content-start align-items-center ">
          <i class="material-icons mr-3">manage_accounts</i>
          <span class="menu-collapsed">Administración</span>
          <span class="fa fa-sort-down fa-fw ml-3 mb-1"></span>
        </div>
      </a>

      <div id='submenu3' class="collapse sidebar-submenu">
      
        <a href="listadoperfiles.php" class="list-group-item list-group-item-action" style="border: 0px !important">
          <div class="d-flex w-100 justify-content-start align-items-center item-menu">
            <i class="material-icons mr-3">verified</i>
            <span class="menu-collapsed">Perfiles</span>
          </div>
        </a>
       <!-- <a href="listadovacunas.php" class="list-group-item list-group-item-action" style="border: 0px !important">
          <div class="d-flex w-100 justify-content-start align-items-center item-menu">
            <span class="fas fa-syringe fa-fw mr-3"></span>

            <span class="menu-collapsed">Vacunas</span>
          </div>
        </a>-->
        <a href="listadoclientes.php" class="list-group-item list-group-item-action" style="border: 0px !important">
          <div class="d-flex w-100 justify-content-start align-items-center item-menu">
            <i class="material-icons mr-3">person_add</i>
            <span class="menu-collapsed">Clientes</span>
          </div>
        </a>


      </div>

      <?php } ?>

      <a href="./?exit=true" class=" list-group-item list-group-item-action" style="border: 0px !important">
        <div class="d-flex w-100 justify-content-start align-items-center">
          <i class="material-icons mr-3">exit_to_app</i>
          <span class="menu-collapsed">Salir</span>
        </div>
      </a>

      
    </ul>
    
   
 
  


  </div>
  



</div>


<?php include_once('scripts.html'); ?>


<html>