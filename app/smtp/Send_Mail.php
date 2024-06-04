<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function Send_Mail($to,$subject,$body)
{
//Load Composer's autoloader
include '/Applications/XAMPP/xamppfiles/htdocs/app/vendor/autoload.php';
/** include  **/
var_dump('entra en el autoload');

//Instantiation and passing `true` enables exceptions
$mail             = new PHPMailer(true);
var_dump('crea un phpMailer');

$mail->isSMTP();
$from             = "santinorascovic@gmail.com";
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "tls://smtp.gmail.com"; // SMTP host
$mail->Port       =  587;                    // set the SMTP port
$mail->Username   = "santinorascovic@gmail.com";  // SMTP  username
$mail->Password   = "zakoneS1";  // SMTP password
$mail->SetFrom($from, 'From Name');
$mail->AddReplyTo($from,'From Name');
$mail->Subject    = $subject;
$mail->MsgHTML($body);
var_dump($to);
$address = $to;
$mail->AddAddress($address, $to);
var_dump('setea al receptor 2');
$mail->Send(); 
var_dump('se manda');

}
?>