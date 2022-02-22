<?php 
include_once('user_dao.php');
$usdao = new UserDAO();
echo $usdao->updateUserPass($_POST['idu'], password_hash($_POST['senha'], PASSWORD_DEFAULT));

 ?>