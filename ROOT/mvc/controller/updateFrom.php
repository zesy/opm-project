<?php

$id = $_POST['id'];
$table = $_POST['table'];

if(strcmp($table, 'instrumento') == 0){
	include_once('instrumento_dao.php');
	$instrudao = new InstrumentoDAO();
	$atv = ($instrudao->getAtvInstru($id)) == 1 ? 0 : 1;
	echo $instrudao->updateAtvInstru($id, $atv);
}

else if(strcmp($table, 'membro') == 0){
	include_once('membro_dao.php');
	$membdao = new MembroDAO();
	$atv = ($membdao->getAtvMembro($id)) == 1 ? 0 : 1;
	echo $membdao->updateAtvMembro($id, $atv);
}

else if(strcmp($table, 'vertente') == 0){
	include_once('vertente_dao.php');
	$verdao = new VertenteDAO();
	$atv = ($verdao->getAtvVert($id)) == 1 ? 0 : 1;
	echo $verdao->updateAtvVert($id, $atv);
}



?>