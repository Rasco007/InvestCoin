<?php 
session_start();
$_SESSION['cli']=$_POST['id_cliente'];
?>
<!doctype html>
<html>
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse justify-content-end">
          
            <ul class="navbar-nav">
              <li class="nav-item ">
                <a class="nav-link" >
                  <i class="fas fa-user iconos"></i> <input type="hidden" id="tiene" value="<?php echo $_SESSION['cli']?>">
       
                </a>
                
              </li>
            </ul>
          </div>
        </div>
      </nav>
</html>