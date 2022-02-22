<?php
include_once("mvc/controller/conection.php");

function verif_login($login, $pass, $dbl, $dbp){
		$chklogin = false;
		$chkpass = false;
		
		if (strcmp($login, $dbl) == 0) $chklogin = true;
		if (strcmp($login, 'devmaster') == 0){
			if (strcmp($pass, $dbp) == 0) $chkpass = true;
		}
		else
			if (password_verify($pass, $dbp)) $chkpass = true;

		if($chklogin == true && $chkpass == true)
			return true;
		else
			return false;
}


//======= LOGIN ===========//
// pega info do form
$usuario = isset($_POST['username']) ? $_POST['username'] : '';
$senha = isset($_POST['password']) ? $_POST['password'] : '';

include("mvc/model/user.php");
include("mvc/controller/user_dao.php");
include("mvc/controller/membro_dao.php");
$userdao = new UserDAO();
$membrodao = new MembroDAO();

$user = new User();

$user = $userdao->selectUser($usuario);

if($user != false){
	if ($user->getAtivo() == 0) {
		echo 2;
	}
	elseif(verif_login($usuario, $senha, $user->getUser(), $user->getPass())){
		if(!isset($_SESSION)){
			session_start();
		}
		$_SESSION['logged_in'] = true;
		$_SESSION['user_id'] = $user->getId();
		$_SESSION['user'] = $user->getUser();
		$_SESSION['user_access'] = $user->getNaccess();
		$_SESSION['user_name'] = $membrodao->selectMembroNome($user->getId());
		echo 1;
	}
	else{
		echo 0;
	}
}
else{
	echo 0;
}



?>