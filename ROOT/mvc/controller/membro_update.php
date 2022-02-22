<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/mvc/model/membro.php');
include_once('membro_dao.php');

$membrodao = new MembroDAO();

$membro = new Membro();

$membro->setId($_POST['idmembro']);
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

if (isset($_POST['cargo'])) $membro->setIdCargo($_POST['cargo']);
else $membro->setIdCargo($_POST['cargohidden']);

if (isset($_POST['nivelAfinidade'])) $membro->setNivelAfinidade($_POST['nivelAfinidade']);
else $membro->setNivelAfinidade($_POST['nafihidden']);


$vert = '';
$array_vert = array('');
if(isset($_POST['vertente'])){
$array_vert = $_POST['vertente'];
$vert = implode(';', $array_vert);
}
$membro->setIdVertente($vert);

$atv = 0;
if(isset($_POST['checkvis'])){
	$atv = 1;
	if($_POST['checkvis'] == 0)
		$atv = 0;
}


$membro->setVisivel($atv);

echo $membrodao->updateMembro_me($membro); 
?>