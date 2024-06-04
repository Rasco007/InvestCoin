<?php
session_start();
if (!$_SESSION["usu"]) header("location:./");

/*var_dump($_SESSION["usu"]["usu_mail"]);*/

include_once("includes/funciones.php");

foreach ($_POST as $key => $value) $$key = $value;


$mensaje = array("IN", "Complete todos los campos");
  $id = $_SESSION['usu']['idUsuario'];



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
                                        <!--#404075-->
                                        <?php if ($_SESSION['usu']['usu_nivel'] == 'C') {m ?>
                                        <div class="css-t2xboy">
                                            <div class="css-1iocsoa">
                                                <div class="css-bndo3n">
                                                    <div class="css-vurnku">
                                                        <h1 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji','Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';'data-bn-type='text"class="css-au8uqh">Bienvenidos a InvestCoin</h1>
                                                    </div>
                                                    <h3 data-bn-type="text" class="css-1gmkfzs">podes comprar y vender criptomonedas muy fácilmente.</h3>
                                                    <div class="css-hwzmrg">
                                                        
                                                    <form  action='trade.php'>
                                                        <button data-bn-type='button' aria-label='trade' class='btn-trade-ahora'>Tradear ahora</button>
                                                    </form>
                                                    
                                                    </div>
                                                </div>
                                                <div class="css-1kra1dh"></div></div></div><?php } ?>

                                    <?php if ($_SESSION['usu']['usu_nivel'] == 'A') {m ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <a href="listadoclientes.php">
                                                    <div class="card text-center">
                                                        <div class="text-center">

                                                            <img class="card-img-top img-fluid" src="assets/img/036-id card.png">
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-title"><strong>Clientes</strong></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="listadoperfiles.php">
                                                    <div class="card text-center">
                                                        <div class="text-center">

                                                            <img class="card-img-top img-fluid" src="assets/img/027-focus.png">
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-title"><strong>Perfiles</strong></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        
                                  
                                </div>
                                <?php } ?>
                                </div>
                            
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">CryptoCharts</h4>
                                </div>
                                <div class="card-body">
                                    <div class="container-fluid">
                                  
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="cryptohopper-web-widget" data-id="4" data-chart_color="#eda836" data-text_color="#f5f2f2" data-background_color="#474040" data-coins="bitcoin,ethereum,tether,binance-coin,ripple,dogecoin,litecoin,dai,safemoon" data-theme="midnight" data-realtime="on"></div>
                                            </div>
                                        </div>
                                </div>
                                </div>
                            </div>
                            <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">Latest News</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="container-fluid">
                                      
                                            <div class="row">
                                                <div class="col-md-12">
                                                <div class="cryptohopper-web-widget" data-id="5" ></div>                                                </div>
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


    <script src="includes/date.js"></script>
    <script src="https://www.cryptohopper.com/widgets/js/script"></script>
    <footer><div class="cryptohopper-web-widget" data-id="2" data-theme="dark" data-ticker_position="footer"></div></footer>

</body>

</html>