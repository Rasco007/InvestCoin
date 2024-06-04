<?php
session_start();
if (!$_SESSION["usu"]) header("location:./");

var_dump($_SESSION["usu"]["idUsuario"]);

include_once("includes/funciones.php");

foreach ($_POST as $key => $value) $$key = $value;


$mensaje = array("IN", "Complete todos los campos");


?>

<!DOCTYPE html>
<html lang="es">



<?php include_once('head.html'); ?>

<body class="">

  <div class="wrapper ">


    <!--  SIDEBAR -->
    <?php include_once('sidebar.php'); ?>


    <div class="main-panel">
      <!-- Navbar -->

      <?php include_once('navbar.php'); ?>
      <!-- End Navbar -->

      <div class="content">
        <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                          
                      <div class="container-fluid inicio">
                      <input class="idUsuario"type="hidden" name="accion" value="<?php echo $_SESSION["usu"]["idUsuario"]  ?>">

                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Trading</h4>
                            </div>
                            
                            <div class="card-body">
                                  <div class="container-fluid">
                                      <div class="row">
                                          <div class="col-md-12">

                                          <table class="table">
                                              <thead>
                                                <tr>
                                                  <th scope="col">Moneda</th>
                                                  <th style="padding-left: 15%;"scope="col">Saldo</th>
                                                  <th scope="col">Trade</th>
                                                </tr>
                                              </thead>
                                            </table>

                                            <div class="limiter-card-billetera">
                                              <!--
                                              <div class=" mt-3 container-billetera">
                                                <div class="contenido-billetera clearfix">
                                                  <div class="nav-billetera">
                                                     <div class="clearfix texto-billetera">
                                                            <img class="imagen-moneda" src="assets/img/monedas/BTC.png" alt="AVATAR">
                                                             <a class="comprar"><button class="btn-comprar">Comprar</button></a>

                                                            <p class="nombre-moneda">Bitcoin</p>
                                                            <p class="dinero">0.00000</p>
                                                          </div>
                                                  </div>
                                                  
                                          
                                                </div>
                                              </div>
                                              <div class=" mt-3 container-billetera">
                                                  <div class="contenido-billetera clearfix">
                                                    <div class="nav-billetera">
                                                       <div class="clearfix texto-billetera">
                                                              <img class="imagen-moneda" src="assets/img/monedas/BTC.png" alt="AVATAR">
                                                               <a class="comprar"><button class="btn-comprar">Comprar</button></a>
  
                                                              <p class="nombre-moneda">Bitcdasdasoin</p>
                                                              <p class="dinero">0.00000</p>
                                                            </div>
                                                    </div>
                                                    
                                            
                                                  </div>
                                                </div>-->
                                            </div>

                                        
                                            
                                          </div>
                                      </div>
                                  </div>
                              </div>
                        </div>
                        

                      </div>
                    </div>
      

              </div>
        </div>
      </div>
    </div>
    <?php include_once('scripts.html'); ?>
    <?php include_once('scriptstabla.html') ?>
    
    <script src="assets/js/crypto-js/crypto-js.js"></script>
    <script src="assets/js/binance-billetera.js?v=<?php echo time(); ?>"></script>
    <script src="includes/date.js"></script>
    <script src="https://www.cryptohopper.com/widgets/js/script?v=<?php echo time(); ?>"></script>
    <footer><div class="cryptohopper-web-widget" data-id="2" data-theme="dark" data-ticker_position="footer"></div></footer>

</body>

</html>