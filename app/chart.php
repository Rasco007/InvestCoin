<?php
session_start();
if (!$_SESSION["usu"]) header("location:./");

/*var_dump($_SESSION["usu"]["usu_mail"]);*/

include_once("includes/funciones.php");

foreach ($_GET as $key => $value) $$key = $value;

if ($_GET) {
     $symbol = $_GET['symbol'];
}
   


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
  
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Charts</h4>
                            </div>
                            
                            <div class="card-body">
                                  <div class="container-fluid">
                                      <div class="row">
                                          <div class="col-md-12">

                                            
                                            <div class="grafico">
                                                <!-- TradingView Widget BEGIN -->
                                                
                                                    <div class="tradingview-widget-container">
                                                      <div id="tradingview_54395"></div>
                                                      <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/symbols/BTCUSDT/" rel="noopener" target="_blank"></a> by TradingView</div>
                                                      <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                                                      <script type="text/javascript">
                                                      new TradingView.widget(
                                                      {
                                                      "width": 680,
                                                      "height": 610,
                                                      "symbol": "BTCUSDT",
                                                      "interval": "D",
                                                      "timezone": "Etc/UTC",
                                                      "theme": "dark",
                                                      "style": "1",
                                                      "locale": "in",
                                                      "toolbar_bg": "#f1f3f6",
                                                      "enable_publishing": false,
                                                      "allow_symbol_change": true,
                                                      "container_id": "tradingview_54395"
                                                    }
                                                      );
                                                      </script>
                                                    </div>
                                                    <!-- TradingView Widget END -->
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