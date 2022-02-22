<?php 

include_once($_SERVER['DOCUMENT_ROOT'].'/PHPMailer/init_mailer.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once($_SERVER['DOCUMENT_ROOT'].'/PHPMailer/src/PHPMailer.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/PHPMailer/src/Exception.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/PHPMailer/src/SMTP.php');

$msg_erro = 0;
$pass = $_POST['pasenha'];
$nome = $_POST['membronome'];
$email = $_POST['membroemail'];
$mail = new PHPMailer(true);
try {
				//CONFIG E-MAIL
	$mail->isSMTP();
	$mail->Host = MAIL_HOST_SMTP;
	$mail->SMTPAuth = MAIL_SMTP_AUTH;    
	$mail->Username = MAIL_USER;  
	$mail->Password = MAIL_PASS;   
	$mail->SMTPSecure = MAIL_SMTP_SECURE_TYPE;
	$mail->Port = MAIL_PORT;
			    //FIM CONFIG E-MAIL;
			    //QUEM ESTÁ ENVIADO (REMETENTE)
	$mail->setFrom(MAIL_FROM_CADASTRO, MAIL_FROM_NAME);
			    //QUEM ESTÁ RECEBENDO (DESTINATÁRIO)
	$mail->addAddress($email, $nome);
			    //SE E-MAIL ACEITA HTML
	$mail->isHTML(true);
			    //ASSUNTO DO E-MAIL
	$mail->Subject = 'OPM - Nova Senha de Acesso à area do Músico!';
			    //CORPO DO E-MAIL
	$mail->CharSet = "UTF-8";
	$mail->Body = '<div align="center">
	<h1>Olá, sua senha foi alterada com sucesso</h1>
	<img alt="OPM" src="cid:logo">
	</div>
	<br>
	<h4>Nova Senha:</h4>
	<b>Senha:</b> '.$pass.'</p>
	<br>
	<br>
	Acesse: <a href="'.SITE_NAME.'">'.SITE_NAME.'</a> para acessar o seu perfil!';
			    //CASO NÃO ACEITE HTML
	$mail->AltBody = 'Olá, sua senha foi alterada com sucesso!\r\n
	\r\nNova Senha:\r\n
	Senha: '.$pass.'\r\n
	\r\n
	\r\n
	Acesse: '.SITE_NAME.' para acessar o seu perfil!';
	$mail->AddEmbeddedImage('../../img/OPM-250px.png', 'logo', 'OPM-250px.png');

			    //ENVIAR
	$mail->send();
} catch (Exception $e) {
	$msg_erro = 2;
			    //$msg_erro = "Message could not be sent. Mailer Error: ".$mail->ErrorInfo.".";
}

if ($msg_erro == 2) {
	echo 'Não foi possível enviar o e-mail<br>Verifique com o membro se o e-mail está correto.';
}
else{
	include_once('user_dao.php');
	$usedao = new UserDAO();
	echo $usedao->updateUserPass($_POST['idu'], password_hash($pass, PASSWORD_DEFAULT));
}

?>