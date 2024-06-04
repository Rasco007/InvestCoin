<?php
include 'db.php';
$msg='';
var_dump('no entra');
var_dump($_GET['code']);

if(!empty($_GET['code']) && isset($_GET['code']))
{
$code=mysqli_real_escape_string($connection,$_GET['code']);
$c=mysqli_query($connection,"SELECT idUsuario FROM usuarios WHERE activation='$code'");
var_dump('entra');
if(mysqli_num_rows($c) > 0)
{
$count=mysqli_query($connection,"SELECT idUsuario FROM usuarios WHERE activation='$code' and status='0'");

if(mysqli_num_rows($count) == 1)
{
mysqli_query($connection,"UPDATE usuarios SET status='1' WHERE activation='$code'");
$msg="Your account is activated"; 
$check='<i class="fas fa fa-check-circle check_icon_verification clearfix"></i>';
$button= '<button  type="submit" class="login100-form-btn m-t-35">  Ingresar a  InvestCoin</button>';
$_SESSION['usu'] = true;
}
else
{
$msg ="Your account is already active, no need to activate again";
$check='<i class="fas fa fa-check-circle check_icon_verification clearfix"></i>';
$button= '<button  type="submit" class="login100-form-btn m-t-35">  Ingresar a  InvestCoin</button>';
$_SESSION['usu'] = true;

}

}
else
{
$msg ="Wrong activation code.";
$check='<i class="fas fa fa-times-circle not_check_icon_verification clearfix"></i>';
$button= '';

}

}
?>
//HTML Part
<?php echo $msg; ?>


<!DOCTYPE html>
<html lang="en">
	
<head>
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<title>InvestCoin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" href="css/main.css?v=<?php echo(rand()); ?>" /> <!--puse asi para que se refresque el css-->

   <!-- <link rel="stylesheet" type="text/css" href="css/main.css">-->
    <!--<link rel="stylesheet" type="text/css" href="css/mainRegistro.css">-->

	<link rel="stylesheet" type="text/css" href="assets/css/mainCrypto.min.css">


</head>

<body>
	
	<div class="limiter-espera-verificacion">
		<div class="container-espera-verificacion">
			<div class="wrap-login100 p-b-20">


				<span class="login100-form-avatar">
						<img src="assets\img\avatar-01.jpg" alt="AVATAR">
					</span>

                    <div class="texto-espera-verificacion">
                        <h3><?php echo $msg; ?></h3>
                        <?php echo $check; ?>

                        <form method="POST" action="http://localhost/app/home.php">
                            <?php echo $button; ?>
                        </form>

                    </div>

			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assets/js/main.js?v=<?php echo(rand()); ?>"></script>

	<script src="assets/js/cryptohopper.js"></script>

	
    <!--<script src="https://www.cryptohopper.com/widgets/js/script"></script>-->
	<?php include_once('scripts.html')?>
</body>


</html>