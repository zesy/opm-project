<?php 
include_once("conection.php");
include_once("orquestra_dao.php");
$orqsdao = new OrquestraDAO();

$n = isset($_POST['orqnome']) ? $_POST['orqnome'] : '';
$h = isset($_POST['ohistoria']) ? $_POST['ohistoria'] : '';

echo $orqsdao->updateOrquestra($n, $h);

 ?>