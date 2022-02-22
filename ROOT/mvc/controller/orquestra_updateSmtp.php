<?php 
include_once("conection.php");
include_once("orquestra_dao.php");
$orqsdao = new OrquestraDAO();

$smtp = isset($_POST['orqsmtp']) ? $_POST['orqsmtp'] : '';
$port = isset($_POST['orqport']) ? $_POST['orqport'] : '';
$user = isset($_POST['orquser']) ? $_POST['orquser'] : '';
$pass = isset($_POST['orqpass']) ? $_POST['orqpass'] : '';
$ssl = isset($_POST['checkssl']) ? 1 : 0;

echo $orqsdao->updateSmtp($smtp, $port, $user, $pass, $checkssl);

 ?>