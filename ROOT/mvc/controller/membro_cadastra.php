<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/PHPMailer/init_mailer.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/mvc/model/membro.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/mvc/model/user.php');

include_once('membro_dao.php');
include_once('user_dao.php');
include_once('social_dao.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once($_SERVER['DOCUMENT_ROOT'].'/PHPMailer/src/PHPMailer.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/PHPMailer/src/Exception.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/PHPMailer/src/SMTP.php');

$memdao = new MembroDAO();
$usdao = new UserDAO();
$socdao = new SocialDAO();

$msg_erro = "";
$user = new User();

$vert = '';
if (isset($_POST['vertente'])) {
	$array_vert = $_POST['vertente'];
	$vert = implode(';', $array_vert);
}

$user->setUser($_POST['nome']);
$pass = $_POST['senha'];
$user->setPass(password_hash($pass, PASSWORD_DEFAULT));
$user->setNaccess($_POST['nivelAcesso']);
$user->setAtivo(1);

$existuser = $usdao->verifExistUser($user->getUser());
if($existuser > 0){
	$newuser = $user->getUser()."".$existuser;
	$user->setUser($newuser);
}

$iduser = $usdao->insertUser($user);
if(!is_numeric($iduser)){
	$msg_erro = $iduser;
}else{
	$idsocial = $socdao->insertEmptySocial();
	if (!is_numeric($idsocial)) {
		$usdao->deleteUserById($iduser);
		$msg_erro = $idsocial;
	}else{
		$membro = new Membro();

		$membro->setNome($_POST['nome']);
		$membro->setSnome($_POST['snome']);
		$membro->setEmail($_POST['email']);
		$membro->setTel(preg_replace("/\D+/", "",$_POST['tel']));
		$membro->setCidade($_POST['cidade']);
		$membro->setLogradouro($_POST['logradouro']);
		$membro->setBairro($_POST['bairro']);
		$membro->setNumero($_POST['numero']);
		$membro->setCep(preg_replace("/\D+/", "",$_POST['cep']));
		$membro->setEstado($_POST['estado']);
		$membro->setIdCargo($_POST['cargo']);
		$membro->setIdUser($iduser);
		$membro->setIdSocial($idsocial);
		$membro->setIdInstrumento(null);
		$membro->setFotoPerfil('default_avatar.png');
		$membro->setFreelancer($_POST['freelancer']);
		$membro->setVisivel(0);
		$membro->setNivelAfinidade($_POST['nivelAfinidade']);
		$membro->setAtivo(1);
		$membro->setIdVertente($vert);

		$newmembro = $memdao->insertMembro($membro);

		if(!is_numeric($newmembro)){
			$usdao->deleteUserById($iduser);
			$socdao->deleteSocial($idsocial);
			$msg_erro = $newmembro;
		}
		else{
			$msg_erro = 1;

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
			    //QUEM EST?? ENVIADO (REMETENTE)
			    $mail->setFrom(MAIL_FROM_CADASTRO, MAIL_FROM_NAME);
			    //QUEM EST?? RECEBENDO (DESTINAT??RIO)
			    $mail->addAddress($membro->getEmail(), $membro->getNome());
			    //SE E-MAIL ACEITA HTML
			    $mail->isHTML(true);
			    //ASSUNTO DO E-MAIL
			    $mail->Subject = 'Bem Vindo ?? OPM - Login e Senha de Acesso ?? area do M??sico!';
			    //CORPO DO E-MAIL
			    $mail->CharSet = "UTF-8";
			    $mail->Body = '<div align="center">
			    	<h1>Ol?? '.$membro->getNome().', Bem Vindo ??</h1>
			    	<img alt="OPM" src="cid:logo">
			    	</div>
			    	<br>
			    	<h3>Seu usu??rio para a ??rea de membro j?? est?? pronto!</h3>
			    	<h4>Utilize as seguintes credenciais:</h4>
			    	<p><b>Usu??rio:</b> '.$user->getUser().'<br>
			    	<b>Senha:</b> '.$pass.'</p>
			    	<br>
			    	<br>
			    	Acesse: <a href="'.SITE_NAME.'">'.SITE_NAME.'</a> para acessar o seu perfil!';
			    //CASO N??O ACEITE HTML
			    $mail->AltBody = 'Ol?? '.$membro->getNome().', Bem Vindo ?? OPM - Orquestra Popular da Mantiqueira!\r\n
			    	Seu usu??rio para a ??rea de membro j?? est?? pronto!\r\n
			    	\r\nUtilize as seguintes credenciais:\r\n
			    	Usu??rio: '.$user->getUser().'\r\n
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
		}
	}
}
echo $msg_erro;

?>