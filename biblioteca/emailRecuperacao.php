<?php 
use PHPMailer\PHPMailer\PHPMailer;
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";
require "PHPMailer/src/Exception.php";

$mail = new PHPMailer();

$mail->isSMTP();

$email = $_POST['recupera'];

$msg = "MSG para enviar";

$mail->SMTPDebug = 2;

$mail->Host = "smtp.gmail.com";

$mail->Port = 587;

$mail->SMTPSecure = 'tls';

$mail->SMTPAuth = true;

$mail->Username = "vicente.jonas98@gmail.com";
$mail->Password = "XCL7cMnH";


$mail->setFrom('vicente.jonas98@gmail.com', 'Biblioteca');

//$mail->addReplyTo('vicente.jonas98@gmail.com', 'Jonas Vicente');

$mail->addAddress($email);

$mail->Subject = 'Biblioteca';

$mail->msgHTML($msg);

if (!$mail->send()) {
echo "Erro ao enviar o E-mail: " . $mail->ErrorInfo;
} else {
header('Location: login.php?msg=Email de recuperação enviado');
}
?>